# Personality Questionnaires

Chamilo 3.1 includes personality-style questionnaires in the modern **Surveys** tool. These questionnaires produce a **preference profile**, not a graded exercise or a clinical psychological assessment.

## Create a questionnaire

1. Open the Surveys tool and create a new survey.
2. In its configuration, choose the **personality** survey type.
3. Open **Edit questions** or the survey's question editor.
4. Define **Personality categories** before adding personality questions. Each answer option must belong to a category.
5. Add questions, configure their answers and category assignments, and save your changes.
6. Preview the learner experience before distributing the survey.

Four personality question types are available:

| Type | How learners respond |
| --- | --- |
| Personality choice | Choose among category-associated options |
| Personality agreement | Indicate agreement with presented items |
| Personality scale | Rate items on a five-point scale |
| Personality order | Rank options from most to least preferred |

The configuration includes answer validation and category-based preference scoring. Check each question's options and assignments carefully: an option associated with the wrong category changes the resulting profile.

## View results

After completing the questionnaire, a learner can see **Your personality profile** when the survey returns profile data. The teacher's survey reporting page can show **Personality profile — all learners**. Results are presented with bar/radar visualizations and category scores. Survey duplication preserves personality questionnaire configuration.

## Gradebook and interpretation

Personality questionnaires cannot be graded through Gradebook as ordinary assessments. Explain to learners that results reflect responses to the configured categories, not a diagnosis, pass/fail status or validated personality test. Review privacy and reporting visibility settings before collecting personal responses.

See [Surveys](surveys.md). Implementation: [PR #9468](https://github.com/chamilo/chamilo-lms/pull/9468).
