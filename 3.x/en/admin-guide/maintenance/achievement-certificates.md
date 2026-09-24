# Achievement Certificates (Batch Generation)

Chamilo can automatically generate a course's achievement certificate for every student who has
completed it — inside a base course and inside any session that reuses it — without a teacher
having to open each course individually. Two console commands cover this, one for a single course
and one for the whole platform, and neither one is a database-heavy operation you have to babysit:
both work in bounded batches, support a dry run, and can be resumed safely if interrupted.

## Platform-wide command

```bash
php bin/console chamilo:gradebook:process-achievement-certificates [options]
```

For every course that has an eligible root gradebook category — top-level, not a sub-category,
with **Generate certificates** enabled — the command evaluates every enrolled student who does not
already have a certificate for that category, and generates one for anyone who has met the
completion requirement. A course can contribute **more than one** context: its base enrollment, and
separately, one context per session that reuses it, since a session can have its own root category
and its own pass threshold.

A course, or one of its session contexts, is skipped — not treated as an error — when it is not
eligible for automated processing: no completion rule configured, more than one eligible root
category for that context (ambiguous, needs a manual choice), or missing certificate-notification
content. The run summary at the end reports how many contexts fell into each case, so nothing is
skipped without being surfaced.

### Completion source

* `--completion-mode=course-rule` (default): uses the completion rule configured for the course.
* `--completion-mode=gradebook`: uses the native gradebook score directly for that context instead.
  Only a context with exactly one eligible root category qualifies in this mode — one with several
  is skipped and reported, to process individually instead (see below).

### Safety options

| Option                     | Purpose                                                                                                                                 |
| --------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`                 | Evaluate and report without creating certificates or sending notifications. Always run this first.                                      |
| `--send-notification`       | Required for a real (non-dry-run) execution. Sends the course's configured internal message and e-mail after each certificate is created. |
| `--sender-id=<id>`          | Active platform administrator used as the notification sender. Required together with `--send-notification`.                            |
| `--limit=<n>`                | Maximum certificates generated (or, in dry-run, reported) in one run. `0` = unlimited. Default `100`.                                    |
| `--scan-limit=<n>`           | Maximum students evaluated in one run, across every course and session. `0` = unlimited. Default `1000`.                                 |
| `--batch-size=<n>`           | Students loaded per database batch within one course/session context. Default `25`.                                                     |
| `--course-batch-size=<n>`    | Courses loaded per database batch. Default `50`.                                                                                         |
| `--after-course-id=<id>`     | Resume scanning after this course ID. Safe to reuse after an interrupted run — a course never regenerates a certificate for a student who already has one. |
| `--user-id=<id>`             | Restrict the run to one student, checked across every eligible course and session — useful to validate behaviour before a platform-wide run. |

### Examples

Dry-run the whole platform first, to see what would be generated:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates --dry-run
```

Real run, notifying students, administrator with ID 1 as the sender:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1
```

Resume an interrupted run after course 480:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1 --after-course-id=480
```

### Scheduling as a cron job

```cron
# Every night at 2 AM
0 2 * * * php /path/to/chamilo/bin/console chamilo:gradebook:process-achievement-certificates --send-notification --sender-id=1 -e prod --no-interaction >> /path/to/chamilo/var/log/achievement-certificates.log 2>&1
```

## Processing one course individually

`chamilo:migration:process-achievement-certificates --course-id=<id>` offers the same dry-run,
notification and pagination options as the platform-wide command, scoped to the base course only
(not its sessions), with an explicit `--category-id` to disambiguate when a course has more than
one eligible root category:

```bash
php bin/console chamilo:migration:process-achievement-certificates \
  --course-id=42 --category-id=7 --dry-run
```

Use it to test a single course before a platform-wide run, or to process a course the platform-wide
run reported as skipped for an ambiguous category.

## Exit codes

Both commands exit with a failure status if at least one certificate generation actually failed
during a real run (check `var/log/dev.log` — or the equivalent production log — for the underlying
error). Contexts skipped for structural reasons (no rule, ambiguous category, missing notification
configuration) do not cause a failure exit code; they are reported in the summary instead.

## Related: learners stuck below 100% on a prerequisite learning path

If a course's completion rule requires a learning path to reach 100%, a learner who finished every
step but never opened the path's final "Congratulations" page stays stuck just under 100% and never
becomes eligible here. See
[Completing Stuck Learning Path Final Items](learning-path-final-items.md) — run it first if
students are missing certificates you'd expect them to have earned.

## Superseded: the legacy cron script

`public/main/cron/add_gradebook_certificates.php` is no longer recommended. It loads every
gradebook result on the platform into memory in a single unbounded query and never releases it
during the loop, so it can exhaust memory on an instance with a non-trivial number of courses or
exercises, and it never sends the "you earned a certificate" notification. Use
`chamilo:gradebook:process-achievement-certificates` instead.
