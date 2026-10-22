# Survey Templates

Administrators can build reusable survey questionnaires and offer them to teachers or assign them directly to courses and sessions. This feature was implemented in [PR #9208](https://github.com/chamilo/chamilo-lms/pull/9208) for [issue #8760](https://github.com/chamilo/chamilo-lms/issues/8760).

## Create and maintain templates

1. In the administration panel, open **Survey templates** and choose **Create**.
2. Enter a title and optional subtitle; configure anonymity, question layout, shuffle, duration, introduction and thank-you text.
3. Save and add or edit the reusable questions in the template's question editor.
4. Enable **Visible as template** if teachers should be able to see and reuse it. An invisible template remains available to the administrator.

Templates belong to the current access URL. Only platform administrators may create, edit or delete the master template. Teachers can use visible templates but cannot change their master definition.

## Reuse a template in a course or session

In an authorised course or session, a teacher can choose a visible template when creating a new survey. The result is a survey in that course context, not a modification of the reusable master template. The teacher can review the questions and follow the usual publishing and invitation workflow.

From the administration template list, an administrator can instead assign a template directly to a selected **course** and, optionally, one of that course's **sessions**. Chamilo checks that the course belongs to the current portal and that the selected session actually contains the course. The teacher interface cannot be used to assign a template to someone else's course or session.

The new survey is not automatically published merely because it was created from a template; review it before inviting participants. See [Surveys](../teacher-guide/assessing-learners/surveys.md) for the standard survey workflow.

## Hide sensitive results from teachers or tutors

When editing an actual survey, a platform administrator can enable **Results hidden from teacher/tutor**. This per-survey restriction is intended for sensitive questionnaires, such as evaluations of teaching staff. Teachers and tutors may still inspect response counts and send reminders, but **cannot open reporting views or export the results**. Platform administrators retain reporting access, subject to other platform settings.

This option differs from the normal **Results visibility** field and from the platform-wide **Hide survey reporting button** setting. Only an administrator can change the restricted-results flag.

## Permissions and scope

* **Administrator:** manage templates, set template visibility, assign to eligible courses/sessions and control restricted result access.
* **Teacher / session teacher:** see and instantiate only visible templates within their authorised course context.
* **Access URLs:** the template catalog and assignment enforce the current access URL; templates from other portals cannot be instantiated across the boundary.

If templates do not appear to teachers, check **Visible as template** and their course/session context. If a template cannot be instantiated, check the global survey-creation restrictions and the intended target course/session.
