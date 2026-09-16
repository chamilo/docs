# Completing Stuck Learning Path Final Items

A learning path's last step — the "Congratulations" page holding the certificate and skill
blocks — only counts as done once a learner actually opens it. A learner who finishes every other
step but never clicks through to that last page stays stuck just under 100% forever, and since
achievement-certificate eligibility (and skill awarding) is gated on the learning path reaching
100%, they never receive a certificate or skill they have otherwise earned.

```bash
php bin/console chamilo:learning-path:complete-final-items [options]
```

For every learning path on the platform whose last step is of type **Final item**, the command
checks each learner with an in-progress attempt (below 100%) who has completed every other step —
across every course and every session that reuses the learning path. If so, it completes the final
item for them exactly as if they had opened it themselves: it records the same item view, runs the
same progress recalculation, and triggers the same certificate generation and skill awarding a real
visit would.

Like `chamilo:gradebook:process-achievement-certificates` (see
[Achievement Certificates](achievement-certificates.md)), it works in bounded batches, supports a
dry run, and can be resumed safely if interrupted — a learner whose final item is already completed
is never touched again on a later run.

## Options

| Option                 | Purpose                                                                                                            |
| ----------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`             | Evaluate and report without completing anything. Always run this first.                                           |
| `--sender-id=<id>`      | Active platform administrator ID, used as the resource creator when completing a final item triggers certificate generation or skill awarding. Required for a real (non-dry-run) execution. |
| `--limit=<n>`           | Maximum final items completed (or, in dry-run, reported) in one run. `0` = unlimited. Default `500`.              |
| `--scan-limit=<n>`      | Maximum learner progress records scanned in one run, across every learning path. `0` = unlimited. Default `5000`. |
| `--batch-size=<n>`      | Learner progress records loaded per database batch, within one learning path. Default `50`.                       |
| `--lp-batch-size=<n>`   | Learning paths loaded per database batch. Default `50`.                                                            |
| `--after-lp-id=<id>`    | Resume scanning after this learning path ID.                                                                       |

## Examples

Dry-run the whole platform first, to see who would be completed:

```bash
php bin/console chamilo:learning-path:complete-final-items --dry-run
```

Real run, administrator with ID 1 as the resource creator:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1
```

Resume an interrupted run after learning path 480:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1 --after-lp-id=480
```

## Exit codes

The command exits with a failure status if at least one final item actually failed to complete
during a real run — the summary table names the learning path and learner and the reason; the
application log has the full exception. A learner correctly excluded (final item already done, or
another step still incomplete) is not an error and never causes a failure exit code.

## Gradebook score after completion

The score shown for a learning path in the Gradebook table is never stored — it is computed live
from the learner's current progress every time the page loads, so it reflects the 100% immediately,
with no extra step.

A learner's **certificate**, if one already existed before they reached 100% (with an older, lower
score baked into it), only gets its stored score and rendered HTML refreshed if certificate
regeneration itself succeeds when this command completes their final item — the same call an actual
visit would trigger. If certificate generation fails for any reason (see
[Achievement Certificates](achievement-certificates.md) for common causes, e.g. file storage
permissions), the learner's progress still correctly reaches 100% and the Gradebook table still
shows it — only their certificate is left showing the old score, and since the command never
revisits a learner already at 100%, it will not retry on a later run. Regenerate that certificate
manually (the **Generate** action in the Certificates list) once the underlying issue is fixed.

`--sender-id` exists specifically to avoid one common cause of that failure: completing a final
item outside a real request has no logged-in user for the certificate resource to record as its
creator, and generation fails outright without one.
