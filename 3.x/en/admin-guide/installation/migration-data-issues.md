# Migration Data Issue Reports

From Chamilo 3.1, selected legacy migrations can isolate recoverable data inconsistencies and report them, instead of necessarily stopping the entire upgrade. Valid records continue to migrate. This is not a general-purpose repair tool and does not turn all migration errors into warnings.

## What is reported

The initial implementation handles invalid or ambiguous legacy matching-answer references and selected orphan references in historical exercise data. Before modifying affected source rows, the migration records their original identifiers, the reason for the inconsistency and the planned action. Valid data is migrated normally. An unresolved reference is not silently mapped to an arbitrary answer.

Critical database, schema or integrity errors still cause the migration to fail. A report is not proof that an upgrade has completed successfully.

## Review an upgrade

1. Make a tested database and file backup and follow [Upgrading](upgrading.md). Use an isolated copy of the real legacy installation for your first upgrade.
2. Run the supported web installer or CLI upgrade procedure. Review the final status and warnings; check the CLI output for the report summary when using the command line.
3. If the installer displays recoverable data warnings, download the CSV using the reported link as a global administrator. The protected endpoint is `/admin/migration-data-issues/{reportId}`; use the actual report identifier provided during the upgrade. Do not substitute a filesystem path.
4. Review the affected migration, phase, table, course code/ID, question, answer and original reference IDs, reason and planned action. Extra details are preserved in the `details_json` column.
5. Compare affected questions and exercise results with the pre-upgrade backup. Resolve remaining data issues through a reviewed, targeted intervention. Do not rerun migrations blindly or copy identifiers between installations.

## Server-side reports

Private JSON Lines snapshots are stored beneath `var/log/migration-data-issues/` in a directory identified by the database configuration. Pending reports are kept during interrupted upgrades and archived on successful completion. Previously recorded recoverable issues can remain available across resumption of migration phases.

Keep the report directory private and use the same OS account for upgrade retries so that the reports remain accessible. Do not expose this directory through the web server. The CSV download is limited to global administrators and to the current database's report files. Reports contain identifiers, reasons and actions rather than answer text. Store them according to institutional data-handling policy.

## Validation and limitations

The initial implementation was verified with automated tests, isolated MariaDB migration scenarios, simulated installer screens and CSV access checks. A full upgrade of a real Chamilo 1.11 installation was still pending at the time of implementation, so perform a staging upgrade before using this on production data.

Implementation: [PR #9560](https://github.com/chamilo/chamilo-lms/pull/9560), issue [#9462](https://github.com/chamilo/chamilo-lms/issues/9462).
