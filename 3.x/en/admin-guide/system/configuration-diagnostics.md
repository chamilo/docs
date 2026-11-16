# Safe Configuration Diagnostics Export

Chamilo 3.1 provides a downloadable JSON report for diagnosing configuration problems without intentionally exporting confidential setting values. The report is limited to the **current access URL** and requires an administrator role.

## Download the report

1. Open **Administration > Settings** on the portal you want to inspect.
2. Select **Download configuration for debugging**.
3. Save the generated `chamilo-configuration-dump.json` file securely.
4. **Review the entire file before sending it to anyone**, even if it appears to have been sanitized.

The report includes an export timestamp, access-URL scope, sanitized platform settings, and plugin installation/active state plus sanitized plugin configuration. It is a read-only export; downloading it does not change system settings.

## Confidentiality and access URL boundaries

Sensitive values are redacted by the sanitization layer. Plugin settings are treated as confidential by default unless explicitly classified for safe export. Even so, setting names, plugin names and other diagnostic metadata may reveal implementation details, so distribute the file only to trusted support personnel.

In multi-URL installations, the backend checks that the resolved access URL matches the request host rather than silently exporting another portal's configuration. Confirm the portal address before downloading.

## Troubleshooting

If the export is unavailable, ensure that the account has administrator privileges and that the requested portal resolves to its own access URL. Review web-server and application logs without copying credentials or personal information into support tickets.

See [System Tools](system-tools.md) and [Security settings](../platform-settings/security-settings.md). Implementation: [PR #9476](https://github.com/chamilo/chamilo-lms/pull/9476).
