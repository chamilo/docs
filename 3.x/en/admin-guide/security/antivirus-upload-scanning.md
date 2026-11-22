# Antivirus Upload Scanning

Chamilo 3.1 can optionally scan incoming files with the local ClamAV daemon before protected upload operations publish them. The feature is disabled by default and does not require an additional Composer package. When enabled, a failed scan, a detected threat or a failure to persist the corresponding audit result blocks the guarded upload.

The implementation checks incoming HTTP multipart files, resource and asset storage, document ZIP extraction, SCORM import, and dedicated CStudio, OnlyOffice and PENS upload paths. These are layers of defence, not a guarantee that every legacy or third-party plugin write path is covered. Validate the upload paths used by your institution before enabling the feature in production.

## Install and configure ClamAV

The following example uses Debian/Ubuntu with systemd (tested on Ubuntu 24.04). Adapt service names, filesystem paths and the PHP worker group to your distribution. On a shared server, consider using a dedicated PHP worker group for the installation instead of granting all web applications access to the daemon.

```bash
sudo apt update
sudo apt install clamav clamav-daemon clamav-freshclam clamdscan
sudo systemctl enable --now clamav-freshclam
sudo journalctl -u clamav-freshclam -n 30 --no-pager
```

Wait until the initial signature databases have downloaded successfully. Back up `/etc/clamav/clamd.conf` before editing it. The following example matches the application's default 100 MiB input cap:

```ini
LocalSocket /run/clamav/clamd.ctl
LocalSocketGroup www-data
LocalSocketMode 660
StreamMaxLength 100M
MaxFileSize 100M
MaxScanSize 400M
MaxRecursion 16
MaxFiles 10000
ScanArchive true
AlertExceedsMax true
AlertEncrypted true
```

Update existing directives instead of adding duplicates. Confirm that your installed ClamAV version supports these directives. Set archive inspection limits according to server memory, CPU and permitted upload sizes. A compressed archive can expand beyond the input size cap. Alerts for exceeded limits or encrypted content can cause uploads to be rejected as heuristic detections. They do not guarantee that every unscannable format is detected.

On systems where systemd owns the socket, also configure the socket unit. Run `sudo systemctl edit clamav-daemon.socket` and add:

```ini
[Socket]
SocketUser=clamav
SocketGroup=www-data
SocketMode=0660
```

Apply the configuration during a maintenance window. On a system using socket activation:

```bash
sudo systemctl daemon-reload
sudo systemctl stop clamav-daemon.service clamav-daemon.socket
sudo systemctl start clamav-daemon.socket
sudo systemctl start clamav-daemon.service
sudo systemctl status clamav-daemon clamav-freshclam --no-pager
ls -l /run/clamav/clamd.ctl
```

The example socket should be owned by `clamav:www-data` with mode `0660`. Do not give unrelated users access and never expose clamd to the public Internet. Ensure that freshclam continues to update signatures and that clamd reloads them, using the reload/self-check behaviour supported by the installed version. Consult the [ClamAV documentation](https://docs.clamav.net/) for distribution-specific configuration.

## Configure Chamilo

Deploy the application and apply the standard Chamilo schema/settings updates as described in [Upgrading](../installation/upgrading.md). Existing 3.1 development installations used migration `Chamilo\CoreBundle\Migrations\Schema\V310\Version20261122100000` to create the audit table and the existing settings synchronization migration `Chamilo\CoreBundle\Migrations\Schema\V310\Version20261023140000` to make the setting available. Do not rerun a migration unnecessarily or use a development migration command as a substitute for the normal production upgrade process.

The following optional environment variables are read by the server-side scanner:

| Variable | Default | Purpose |
| --- | --- | --- |
| `CHAMILO_ANTIVIRUS_SOCKET` | `unix:///run/clamav/clamd.ctl` | Local Unix socket, or a loopback TCP endpoint |
| `CHAMILO_ANTIVIRUS_TIMEOUT` | `30` | Time limit in seconds |
| `CHAMILO_ANTIVIRUS_MAX_BYTES` | `104857600` | Maximum input size in bytes (100 MiB) |

Set overrides in the application's server-side environment, not in browser code. Keep the PHP/web server limits, application cap and daemon stream/scan limits consistent. Only Unix sockets and loopback TCP endpoints are supported.

Before enabling scanning, verify the default connection using the actual Chamilo scanner from the Chamilo installation directory:

```bash
sudo -u www-data php <<'PHP'
<?php
require 'vendor/autoload.php';

$scanner = new \Chamilo\CoreBundle\Security\Upload\ClamAvScanner();
$stream = fopen('php://temp', 'w+b');
fwrite($stream, 'Chamilo antivirus clean file test.');
rewind($stream);
$result = $scanner->scan($stream);
fclose($stream);
print_r($result);
exit('clean' === $result['status'] ? 0 : 1);
PHP
```

The expected result contains `status => clean`, an empty threat, a SHA-256 hash and size `34`. This direct constructor test checks the defaults; if you use environment overrides, check the actual web-worker configuration and a real upload as well.

Open **Administration > Settings > Security** (`/admin/settings/security`). Enable **Enable antivirus upload scanning** (`security.antivirus_upload_enabled`) and save. This is a global setting, disabled by default. When disabled, guarded upload paths do not require a scan.

## Antivirus scan report

Open **Administration > Security > Antivirus scan report** (`/admin/antivirus-scans`). Administrators can view the summary counters, filter by scan status, browse the paginated history, refresh it and export up to 10,000 matching rows to CSV. The report and its data/export endpoints are restricted to administrators and scoped to the current Access URL.

| Status | Meaning |
| --- | --- |
| `clean` | ClamAV reported no threat. The guarded upload may proceed, subject to the usual validation. |
| `infected` | ClamAV reported a detection (including configured heuristic alerts). The upload is blocked. |
| `error` | A scan could not be completed successfully. The upload is blocked. |

The separate `antivirus_scan` database table records scan metadata independently of upload transactions. This makes rejected uploads visible even when no resource has been created. The audit includes the file name, size, SHA-256 when available, scanner, outcome, threat, source, user/course/session context, Access URL, scan duration and UTC timestamp. It does not store uploaded file contents.

Counters measure **scan events**, not unique uploads. A ZIP and its extracted entries can produce separate records. Repeated checks of the same path and identical bytes within one request can reuse an approved result. Independent requests are always checked independently. Documents stops automatic retries on HTTP 422 rejections and keeps the upload interface open.

For authorised server/database administrators, this read-only query shows recent records:

```sql
SELECT id, access_url_id, filename, file_size, status,
       threat_name, source, scanned_at, duration_ms
FROM antivirus_scan
ORDER BY id DESC
LIMIT 30;
```

## Test the feature

Use a test course and the harmless [EICAR antivirus test file](https://www.eicar.org/download-anti-malware-testfile/). Do not use real malware. Download the test signature to a controlled test directory on your workstation and prepare a clean text file, a clean ZIP and a ZIP containing the EICAR file.

| Check | Expected result |
| --- | --- |
| Clean text upload with scanning disabled | Accepted as usual; no scan event |
| Clean text upload in Documents or Dropbox with scanning enabled | Accepted; clean scan recorded |
| EICAR upload in Documents or Dropbox | Rejected; detection recorded |
| Clean ZIP in Documents, with and without automatic extraction | Accepted, subject to normal archive validation |
| ZIP containing EICAR, with or without extraction | Rejected before infected content is published |
| Overwrite a clean document with EICAR content using the same filename | Rejected; original document remains intact |
| Clean upload during a ClamAV outage | Rejected; scan error recorded if audit storage remains available |
| Clean upload after service recovery | Accepted again |

As a platform administrator, check the report and CSV output after each operation. As a student, verify that the report is not accessible and that `/admin/antivirus-scans-data` and `/admin/antivirus-scans-export` return HTTP 403.

For the outage check on an isolated test server using socket activation, temporarily stop both units:

```bash
sudo systemctl stop clamav-daemon.service clamav-daemon.socket
```

Attempt a clean upload while the Chamilo setting remains enabled. Restore service immediately after the check, even if the test fails:

```bash
sudo systemctl start clamav-daemon.socket
sudo systemctl start clamav-daemon.service
sudo systemctl status clamav-daemon --no-pager
```

Repeat a clean upload to confirm recovery. Do not deliberately stop the daemon on a production portal for this test.

## Operational considerations

* Check the scan coverage of assignments, messages, SCORM imports and any custom or legacy tools used on the target portal.
* Test encrypted, oversized and deeply nested archives, and verify behaviour across Access URLs.
* Monitor service availability, signature freshness, memory/CPU, timeouts and audit table growth. Establish an institutional retention policy for the audit metadata; there is no automatic retention policy or retrospective scan of previously uploaded files.
* A clean result means no threat was detected by the configured scanner. It is not a guarantee of safety. Keep file-type validation, authorisation and secure storage in place.

Implementation: [PR #9562](https://github.com/chamilo/chamilo-lms/pull/9562) (issue [#3818](https://github.com/chamilo/chamilo-lms/issues/3818)). Real ClamAV, EICAR, Documents, Dropbox, audit logging, five PHPUnit tests and two Playwright report/access scenarios were verified during development. Additional site-specific coverage remains to be tested.
