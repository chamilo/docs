# Confidential Reporting

Chamilo includes an optional **confidential reporting** workflow for submitting concerns about another user to authorised investigators. This is not the ordinary support-ticket tool or a public discussion forum.

## Enable the feature

Open **Administration > Configuration settings > Security** and configure:

| Setting | Default | Purpose |
|---|---|---|
| `security.confidential_reporting_enabled` | `false` | Enable the confidential reporting workflow |
| `security.confidential_reporting_min_reporters` | `2` | Minimum number of distinct reporters (2–10) before an investigation becomes visible |
| `security.confidential_reporting_attachments_enabled` | `true` | Permit evidence attachments |
| `security.confidential_reporting_notifications_enabled` | `false` | Show internal indicators for eligible investigations (no emails) |

The deployment also requires the server's confidential-reporting encryption and private storage to be ready. Chamilo uses the PHP Sodium cryptographic functions and a private encryption key; **retain and back up that key securely**. Losing it may make stored reports unreadable. Do not copy the key into a Git repository. Do not enable the feature before verifying that private key storage and the required database migrations are operational.

## Submitting a report

1. Sign in directly to Chamilo and open **Confidential reporting** (when enabled for the portal).
2. Choose the person concerned, enter a subject and describe the incident.
3. Add evidence if attachments are enabled.
4. Decide whether investigators may see your **name and email** for this specific report. This permission can be withdrawn later.
5. Send the report. Use **My confidential reports** to follow the case and exchange messages with an investigator.

The reporter's identity is **not displayed to investigators by default**. This is a confidentiality control, not a promise of absolute anonymity from the system's operators.

## Investigation permissions and thresholds

Investigations require the dedicated `welfare:investigate` permission and an eligible administrator or HR role. A case becomes available for investigation only after the configured number of **distinct reporters** has been reached for the same target. An investigator cannot investigate a report about themselves. HR access is limited to the users that HR manager follows.

Investigators access **Confidential investigations** to view eligible cases, review evidence and exchange messages. Below-threshold or unauthorised cases are not exposed through the investigation API. Administrative **impersonation** does not provide access to confidential reporting.

## Privacy and operational care

Reports and attached evidence contain sensitive personal data. Restrict investigator permissions, limit backup access, define an appropriate organisational retention policy, and test the workflow with separate reporter, target and investigator accounts. Avoid copying full reports into technical logs or issue trackers.

Implementation: [Confidential reporting #9310](https://github.com/chamilo/chamilo-lms/pull/9310).
