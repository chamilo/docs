# Exercise Monitoring

Exercise Monitoring <img src="/.gitbook/assets/icons/mdi-camera.svg" alt="Exercise Monitoring" data-size="line"> uses a student's webcam to capture identity photos during a test attempt — a photo of an ID document and a photo of the student's face — for exam-integrity purposes.

## Flagging a Test

Open the test's settings and check the **Exercise Monitoring** option. Once flagged, students attempting that test see a small floating webcam widget and are prompted to capture the two photos before or during their attempt.

## Reviewing Captures

[inferred] Captured photos are reviewed through the reporting screen added by the **[Exercise Focused](exercise-focused.md)** plugin, which this plugin was built alongside — if your platform only has Exercise Monitoring enabled and not Exercise Focused, ask your administrator how captured photos are meant to be reviewed on your installation.

## Things to Know

* **This handles sensitive personal data** — ID document photos are a category of data many institutions and privacy regulations treat with extra care. Confirm with your administrator that this plugin's use fits your institution's data protection obligations before relying on it
* **Photos are retained temporarily** — Your administrator sets a retention period, after which captured photos are automatically deleted
* **This is an early-stage feature** — Expect rough edges; verify the capture flow works as expected in a test run before using it for a real exam
