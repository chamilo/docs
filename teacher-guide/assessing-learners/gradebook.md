# Assessments

The assessments (previously *gradebook*) aggregates scores from exercises, assignments, and other graded activities into a unified view of each learner's performance. It also controls certificate generation.

## How the Assessments Work

The assessments are weighted scoring systems. You define:

1. **Which activities** contribute to the grade (exercises, assignments, attendance, etc.)
2. **The weight** of each activity (how much it counts toward the final grade)
3. **The minimum certification score** (the threshold for earning a certificate)
4. **A minimum score per activity** — Each activity in the gradebook can have its own **Minimum score**. Learners who score below that minimum on a key activity can be prevented from achieving the objectives and earning the certificate, even if their overall weighted total is otherwise high enough.

Activities can be of 2 types:
* **Classroom activity** (or in-person activity), where grades have to be imported from some other source
* **Online activity** selected from the course, where grades are obtained through the fulfilling of the activity in the course

Chamilo calculates each learner's overall grade based on these weights.

## Setting Up the Assessment

1. Open the **Assessments** <img src="/.gitbook/assets/icons/mdi-certificate.svg" alt="Gradebook" data-size="line"> tool from the course homepage
2. You will see the assessments overview, initially empty

### Adding Activities

1. Click **Add online activity**
2. Choose the type:
   * **Test** — Link a specific exercise from the course
   * **Assignment** — Link a student publication folder
   * **Learning path** — Link learning path completion
   * **Attendance** — Link an attendance sheet
   * **Forum thread** — Link a forum thread (which has to be graded manually)
   * **Survey** — Link a survey
3. Select the specific activity within the chosen type
4. Set the **Weight** for this activity (e.g., 30% for the midterm exam, 40% for the final project)
5. Set the **Minimum score** if applicable
6. Save

The total weight of all activities should add up to 100%.

### Sub-Categories

For complex grading schemes, you can create **sub-categories** to group related activities:

* **Example**: A "Homework" sub-category (weight: 30%) containing five individual assignments each worth 20% of the sub-category
* Sub-categories let you organize the assessment hierarchically while keeping the overall calculation simple

## Viewing Grades

![The gradebook overview table showing learner names, activity scores, and weighted totals](/.gitbook/assets/gradebook-overview.png)

The assessment shows a table with:

* Each learner's name
* Scores for each activity
* The weighted total
* Whether the learner qualifies for a certificate

You can sort by any column to quickly identify top performers or struggling learners.

## Certificates

To enable certificate generation:

1. In the assessment settings, set a **minimum certification score** (e.g., 70%)
2. When a learner's weighted total meets or exceeds this threshold (and they have not failed any per-activity minimum score), they can download their certificate
3. The certificate is generated from a template configured by the platform administrator

See [Certificates and Skills](../tracking-and-reporting/certificates-and-skills.md) for more details.

## Linking to Skills

You can associate **skills** with the assessment. When a learner reaches the set objectives to complete the assessment, they can either get a certificate, get a skill or both. Skills are visible on their profile in the social network space. This builds a competency record over time.

## Exporting Grades

Click the **Export** <img src="/.gitbook/assets/icons/mdi-export.svg" alt="Export" data-size="line"> button to download grades as a spreadsheet. This is useful for:

* Sharing grades with administrative systems
* Performing additional analysis outside Chamilo
* Keeping offline records

## Tips

* **Plan your weights early** — Define the grading scheme at the start of the course so learners know what to expect
* **Use sub-categories for complex courses** — Group assignments, quizzes, and participation into clear categories
* **Set meaningful pass thresholds** — The certification score should reflect actual competency, not just participation
* **Check regularly** — Review the gradebook periodically to ensure all activities are properly linked and scores are being recorded
