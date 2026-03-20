# Assessment Settings

Assessment settings control how grading, scoring, and certificates work across the platform. Access them from **Administration > Configuration settings > Gradebook** and related sections.

## Gradebook Settings

The gradebook aggregates scores from exercises, assignments, attendance, and learning paths into a single weighted grade per course.

| Setting | Description |
|---------|-------------|
| **Enable gradebook** | Master toggle for the gradebook feature. When disabled, courses do not display aggregate grades. |
| **Gradebook scoring model** | Choose how final scores are calculated. Options include weighted average and simple sum. |
| **Allow teachers to customize weights** | When enabled, teachers can adjust how much each activity contributes to the final grade. |
| **Show gradebook to learners** | Controls whether learners can see the gradebook. When disabled, only teachers and administrators can view it. |
| **Allow multiple gradebooks per course** | When enabled, teachers can create multiple independent gradebooks within a single course (useful for courses with distinct assessment tracks). |

## Scoring Display

| Setting | Description |
|---------|-------------|
| **Score display type** | Controls how scores are shown to learners: **percentage**, **score (e.g., 8/10)**, **letter grade**, or **custom icons**. |
| **Custom score thresholds** | Define letter-grade or icon thresholds. For example: A = 90-100%, B = 80-89%, C = 70-79%. |
| **Show score ranking** | When enabled, learners can see their rank relative to other students in the course. |
| **Pass percentage** | The minimum score percentage required to pass. Used for certificate generation and learning path completion. |

### Configuring Score Display

To set up custom score thresholds:

1. Go to **Administration > Configuration settings > Gradebook**.
2. Enable the custom score display.
3. Define the thresholds and their labels (e.g., "Excellent," "Good," "Pass," "Fail").

These thresholds apply platform-wide. Teachers cannot override them per course.

## Certificate Settings

Certificates are generated automatically when a learner meets the pass criteria in a course's gradebook.

| Setting | Description |
|---------|-------------|
| **Enable certificates** | Allow certificate generation from gradebooks. |
| **Default certificate template** | The HTML template used for certificates. Administrators can customize it with dynamic fields (learner name, course name, date, score). |
| **Show QR code on certificates** | Include a QR code that links to a verification URL, allowing third parties to confirm the certificate's authenticity. |
| **Certificate expiration** | Set an optional expiration period for certificates. Useful for compliance training that requires periodic recertification. |

### Certificate Template Variables

Certificate templates support the following placeholders:

| Variable | Value |
|----------|-------|
| `((user_firstname))` | Learner's first name |
| `((user_lastname))` | Learner's last name |
| `((course_title))` | Course name |
| `((gradebook_grade))` | Final score achieved |
| `((date_certificate))` | Date the certificate was earned |
| `((certificate_link))` | Public verification URL |

Templates are edited in the gradebook configuration or directly in the certificate management area.

## Tips

* **Set a platform-wide pass percentage** as a baseline, then allow teachers to adjust it per course if needed.
* **Use QR codes on certificates** to make verification easy for employers or other institutions.
* **Review scoring display settings** before the platform goes live -- changing from percentage to letter grades after learners have seen their scores causes confusion.
