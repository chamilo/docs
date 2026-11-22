# Extended Question Bank

The question bank in Chamilo 3.1 extends the existing Exercises tool with question usage statistics, classification, filtering, sorting and bulk score assignment. It is part of Chamilo itself, not an additional plugin, and does not require mandatory extra fields.

## Open the bank

Open **Tests** (Exercises) in a course and use the question bank/question pool action. When editing an exercise, open the existing-question selection view to reuse questions. The general bank is used for managing questions, and the exercise-specific view is used for adding existing questions to a destination exercise.

The destination view shows **Questions in test**, separately from the total matching questions in the bank. Questions already present in the test are identified to help avoid duplicate selection. Reusing a question as a link shares the same question rather than creating an independent copy.

## Filter and classify questions

Use the existing title, category, source exercise, difficulty and question type filters together with any configured question extra fields that are available for filtering. Use sortable columns to order results by title, category, difficulty, score or usage and attempt metrics. The sorting applies to the paginated result set.

Question classification uses existing question extra fields. An administrator can configure appropriate extra fields for questions; only fields enabled for filtering appear in the additional filters, and only changeable fields appear in the classification editor.

In the general bank, select **Edit classification** on an eligible question, edit the permitted values and save. The action is limited to questions in the authorised course/session context. Existing management and recycling actions remain available according to permissions.

## Understand the statistics

| Column | Meaning |
| --- | --- |
| **Occurrences** | Distinct exercises using the question in the relevant course context (including eligible base-course exercises when viewing a session). |
| **Full-score attempts** | Completed, recorded exercise attempts where the question obtained at least its maximum configured score. |
| **Below-full-score attempts** | Completed, recorded attempts where the question obtained less than its maximum score, including partial credit. |

Attempts are grouped per question and exercise attempt, not per answer row. Pending manual correction and questions without a positive maximum score are excluded from the attempt counters. The metrics are scoped to the current course and attempt session context; they are not lifetime, platform-wide statistics or an exact count of individual learners.

## Assign scores in bulk

From the general question bank, select eligible questions and open the bulk score assignment action. Enter a positive score for the correct answer and a zero or negative score for incorrect answers, with at most two decimal places. Confirm the operation, then review the updated question scores.

Bulk scoring applies only to unused, unattempted single-answer questions (type 1) owned by the current course/session context, with exactly one correct answer and at least one incorrect answer. Questions already linked to an exercise, with historical attempts, or shared outside the authorised context cannot be changed through this action. These safeguards protect earlier marks and questions used by other contexts.

If a question is not eligible, review its usage and create a new independent question if necessary instead of changing historical scores.

## Try the workflow

In a test course, create questions with different categories and extra-field values. Add selected questions to an exercise, complete test attempts as a learner, and return to the bank as a teacher. Check that occurrence and completed-attempt figures reflect the test data. Try sorting and filtering, then apply bulk scoring to a separate unused single-answer question and confirm that questions with historical attempts are excluded.

See also [Exercises](exercises.md).

Implementation: [PR #9561](https://github.com/chamilo/chamilo-lms/pull/9561), based on issue [#7042](https://github.com/chamilo/chamilo-lms/issues/7042) and the original contribution by NoSoloRed.
