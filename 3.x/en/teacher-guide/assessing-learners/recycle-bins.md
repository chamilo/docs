# Recycle Bins for Exercises and Learning Paths

Chamilo 3.1 can archive deleted exercise attempts and learning path tracking data so authorized teachers can restore them, subject to configured retention and access controls. Recycle bins protect tracking data; they are not a substitute for database backups.

## Restore an exercise attempt

1. Open the affected exercise's **Reporting** page with the correct course or session selected.
2. Select **Recycle bin** to display archived attempts.
3. Identify the learner and attempt you need to recover.
4. Select **Restore**, confirm, and refresh the report to verify answers and scores.

You must have permission to manage exercise results. Restoration may be blocked when the exercise is locked by Gradebook or the platform restricts teachers' access to results.

## Restore learning path progress

1. Open the relevant learning path reporting screen for the intended course/session.
2. Open its **Recycle bin**.
3. Select the learner's archived progress and **Restore** it.
4. Check the restored lesson progress and associated exercise attempts.

When an exercise attempt is part of a pending learning path archive, restore the learning path archive first. Individual restoration is deliberately blocked to prevent inconsistent progress.

## Retention and cleanup (administrators)

The setting `tracking.recycle_bin_retention_hours` controls how long archives remain eligible for recovery. The initial default is **30 days** (720 hours). Existing installations must synchronize the new setting through the project's settings-upsert migration before expecting the administration UI to display it.

Preview a cleanup without deleting anything:

```bash
php bin/console chamilo:recycle-bin:purge
```

Permanent deletion requires an explicit option:

```bash
php bin/console chamilo:recycle-bin:purge --execute
```

The command supports `--hours` (retention override), `--scan-limit`, `--after-lp-id` and `--after-exercise-id` for controlled processing. Only schedule it after verifying retention policy and backup arrangements. There is **no implicit automatic purge schedule** merely because the feature is enabled.

See [Exercises](exercises.md) and [Learning Paths](../adding-content/learning-paths.md). Implementation: [PR #9383](https://github.com/chamilo/chamilo-lms/pull/9383).
