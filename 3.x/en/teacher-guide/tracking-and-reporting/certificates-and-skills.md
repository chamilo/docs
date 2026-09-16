# Certificates and Skills

Chamilo allows you to award certificates to learners who meet specific achievement criteria, and to validate skills associated with those achievements.

## How Certificates Work

Certificates are linked to the **Assessments** (also called Gradebook). When a learner's grade meets or exceeds the minimum threshold you define, a certificate becomes available for them to download.

The workflow is:

1. Set up the [Assessments](../assessing-learners/gradebook.md) with your exercises, assignments, and other graded activities
2. Define a **minimum certification score** (e.g., 70%)
3. When a learner reaches that score, they can download their certificate (either within the Assessments tool itself, or from a learning path if you've configured the final step for that). As a teacher, you can also use the **Generate certificates** action in the gradebook to create the PDFs in batch for all eligible learners.

## Certificate Templates

Certificates use templates defined by the platform administrator. The template typically includes:

* The learner's name
* The course name
* The date of completion
* The score achieved
* A QR code or URL for online verification

## Certificate Validity and Expiry

Certificates can be set to expire after a given number of days. In the [Assessments](../assessing-learners/gradebook.md) settings for the root category, once **Generate certificates** is enabled, a **Certificate validity (days)** field appears. Leave it at `0` (the default) for certificates that never expire, or set a number of days for a certificate to expire that many days after it was issued.

Each certificate's own expiry date is computed automatically from that setting when it is generated (or regenerated) — you do not set it certificate by certificate. The **Certificates** list shows an **Expiry date** column for each learner, reading **Never expires** when no validity period applies.

If the category has no validity period configured, you can still set (or change) an individual learner's expiry date by hand: click the pencil **Edit expiry date** button next to their entry and pick a date. This button is only available when the category itself has no validity period — once a validity period is set, expiry dates are managed automatically and can no longer be edited certificate by certificate.

![The Certificate list showing the Expiry date column for three learners](/.gitbook/assets/gradebook-certificates-expiry-dates.png)

### Reminding Learners of an Upcoming or Past Expiry

Open the **Certificates** list for your assessment and click the **Expiring certificates** <img src="/.gitbook/assets/icons/mdi-calendar-clock.svg" alt="Expiring certificates" data-size="line"> button to see which learners' certificates have expired or are about to. The page shows, per learner: the certificate's **Expiry date**, its **Status** (**Expired** or **Expiring soon**), and when a reminder about it was **Last reminder sent** (or **Never**). Use **Days ahead** to widen or narrow how far into the future "expiring soon" looks.

![The Expiring certificates page listing one expired and one soon-to-expire certificate](/.gitbook/assets/gradebook-certificate-expirations.png)

To notify learners yourself:

1. Select the learners you want to remind (or select all)
2. Click **Send notification**
3. Review the preview of the e-mail that will be sent — separate previews are shown for the "expiring soon" and "expired" wording, depending on which of your selected learners fall into each case
4. Confirm by clicking **Send notification** again in the dialog

![The Send notification confirmation dialog previewing the expiring and expired e-mail wording](/.gitbook/assets/gradebook-certificate-expiry-notification.png)

Each learner is notified in their own configured language, both by e-mail and by an internal Chamilo message. Sending again for the same certificate and the same expiry date is safe — Chamilo tracks what was already sent per certificate and won't spam a learner with duplicate reminders unless you explicitly resend.

Administrators can also schedule these same reminders automatically, on a recurring basis, without a teacher having to trigger them by hand — see [Cron Jobs Settings](../../admin-guide/platform-settings/crons-settings.md#certificate-expiry-reminders).

## Skills

Skills represent competencies that learners acquire. In Chamilo:

* Skills can be linked to gradebook achievements
* When a learner earns a certificate, any associated skills are automatically validated
* Skills accumulate on the learner's profile, creating a competency record
* Skills can be organized hierarchically (e.g., "Data Analysis" under "Research Methods")
* Skills can be further evaluated by peers (360° evaluation)

## Viewing Certificate and Skill Status

As a teacher, you can see:

* Which learners have earned certificates in your course
* Which skills have been validated
* Learners' progress toward the certification threshold
* Which certificates have expired or are expiring soon, and whether a reminder was already sent for them

Learners can view their own certificates and validated skills from their profile, and can access the Skills Wheel to check what skills are in demand in their organisation.

## Tips

* **Set clear expectations** — Tell learners at the start of the course what they need to achieve to earn a certificate
* **Use meaningful skill names** — Skills should describe what the learner can do, not just the course name
* **Combine with portfolios** — Encourage learners to add their certificates to their portfolio
* **Extend certificates** — Ask your admin to enable the [Custom Certificate](../plugins/custom-certificate.md) plugin to unleash even more certificate templating power
* **Set a validity period for compliance-driven certifications** — If a certification needs periodic renewal (e.g. safety training), set **Certificate validity (days)** so learners get reminded before it lapses
