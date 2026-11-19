# AI-Assisted Course Skills Mapping

Chamilo 3.1 can suggest skills associated with a course and let authorized users review and apply those suggestions to the skills referential and Gradebook. An AI suggestion is **not applied automatically**; it must be selected and approved.

## Generate suggestions

1. Open the relevant course's **AI-assisted skills mapping** page. The application route is `/course/{courseId}/skills`, with the actual course ID replacing `{courseId}`.
2. If the course is part of a session, open the page in the correct session context.
3. Choose an available **AI provider**.
4. Select **Suggest skills for this course** and review the returned results.

AI providers must be available and configured by the platform administration. Suggestions can refer to **Existing skill** entries or recommend a **New skill** under a parent skill. Each entry can include its description, criteria and an explanation of the suggestion.

## Review and approve

1. Read each suggestion critically and compare it to the course objectives and contents.
2. Select only the valid skills using their checkboxes.
3. If you have the required authorization, choose **Add selected skills to referential and Gradebook**.
4. Verify the resulting skills and Gradebook associations in the course.

Users without assignment privileges can review suggestions but cannot attach them. Creating new skills requires platform administrator permissions. Suggestions can expire; generate a fresh set if the application reports that the previous ones are no longer valid.

## Good practice

AI-generated skills are candidates, not authoritative curriculum requirements. Review wording, duplication, parent-skill placement and criteria before approval. Avoid entering confidential learner information into AI prompts.

See [Skills and Assessments](../../admin-guide/skills/skills-assessments.md) and [AI Toolbox](toolbox-ai.md). Implementation: [PR #9409](https://github.com/chamilo/chamilo-lms/pull/9409).
