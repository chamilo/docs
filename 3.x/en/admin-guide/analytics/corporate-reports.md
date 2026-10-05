# Corporate Reports

This page covers six related dashboard entries aimed at organizational reporting rather than day-to-day teaching: quarterly summaries, teacher workload, HR-oriented course reporting, the follow-up of learners by their superiors, the weekly planning of general tutors, and bulk document exports.

## Quarterly Report

**Analytics > Quarterly report** presents a set of summary cards for a given quarter: users registered and connected, courses that exist versus courses actually used, hours of training delivered, certificates generated, sessions by duration, and total disk usage (disk usage only appears on the main portal in a multi-URL setup). Each card loads independently, so the page stays responsive even on a platform with a lot of history.

## Teachers Time Report

**Analytics > Teachers time report** lets you filter by course, session, teacher, and date range to see how much time each teacher has spent. It's meant to track teaching workload and hours — filter it down to a single course or session, or leave it unfiltered for a platform-wide view.

## Corporate Report

**Analytics > Corporate report** is built specifically for HR audiences — it's the one report in this chapter also available to the **Human Resources Manager** and **Student Boss** roles, not just administrators. It lists, per course and per user: e-mail address, hours spent, whether a certificate was generated, completed learning paths, and course progress. It can be scoped to a single session or left platform-wide.

## Student's Superior Follow-up

**Reporting > Admin view > Student's superior follow up** shows one column per **Student Boss** (superior) of the current portal, with the learners assigned to that superior listed underneath. Click a learner's name to open their detailed learner report. The **Language** filter narrows the columns down to superiors using a given interface language.

Platform administrators can assign a learner directly from a superior's column: under **Add learner**, type at least three letters of the learner's name, username or e-mail, pick the learner from the suggestions and click **Add**. The superior receives an internal message announcing the new learner.

> A learner has a single list of superiors, and adding them from this report replaces it: a learner already followed by another superior moves to the superior you add them to.

Only platform administrators get the **Add learner** controls.

## General Tutor Planning

**Reporting > Admin view > General tutor planning** shows, for each session general tutor, when they are busy. It's a single table: one row per tutor with their number of sessions, then one column per week (in `year-week` form, e.g. `2026-14`). The weeks a session covers are highlighted, and the session's name — a link to the session — appears in its first week.

Use the **Start date** and **End date** filters to choose the weeks shown; only sessions starting in that range are listed. Without dates, the table spans every listed session, from the earliest start to the latest end. A session without an end date covers its first week only. The table scrolls sideways when the range covers many weeks.

## Special Exports

**Analytics > Special exports** is a bulk-export tool, not a report: it zips up course documents platform-wide, or for a selected subset of courses (including their session-specific documents). This is a heavy operation on a platform with a lot of course content — it's best run outside peak hours.
