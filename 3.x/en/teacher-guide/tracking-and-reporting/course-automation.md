# Course Automation (Manual Triggers)

The **Automation** section of Course Reporting lets authorized teachers configure actions for the beginning and end of a course. In the current Chamilo 3.1 implementation, the actions are **triggered manually**: do not assume they run automatically on a calendar date or via cron.

## Configure actions

1. Open a course as a teacher or another user allowed to manage course reporting.
2. Open **Reporting** and locate the **Automation** section.
3. Select the event (**Course opens now** or **Course ends now**) and an action type.
4. Supply the target required by that action, then select **Add action**.
5. Review the **Configured actions** list; remove an unwanted entry with its **Delete** action.

Supported actions include publishing or hiding course resources, sending survey invitations, delivering existing certificates and changing course visibility. The available resources, surveys, Gradebook options and visibility values depend on the course and the current user's permissions.

## Run the configured event

Choose **Course opens now** or **Course ends now** and confirm the operation. Inspect the reported result. Chamilo tracks completed executions, prevents duplicate configurations and skips actions that already completed successfully on subsequent runs. A second click should not be treated as a way to resend a completed action.

For certificate delivery, prepare and test the relevant certificate first. For survey invitations, verify that the survey is configured and that the intended learners belong to the current course or session context.

## Important limitations

- This interface provides **manual execution**, not scheduled automation.
- Actions operate within the current course/session context; test access and targets for both contexts where applicable.
- Successfully completed actions are not automatically repeated on later runs.
- At the time of the feature PR, certificate delivery, course visibility changes and session-specific execution were code-reviewed but not functionally verified in that PR. Test them on your installation before relying on them operationally.

See [Course Reports](course-reports.md) and [Certificates and Skills](certificates-and-skills.md). Implementation: [PR #9464](https://github.com/chamilo/chamilo-lms/pull/9464).
