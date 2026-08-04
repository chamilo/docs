# Subscribing Users

Before you can assess a learner, they need to be subscribed to your course. Chamilo offers four ways to get someone in, depending on who is doing the subscribing and whether the person already has a platform account.

| Method | Who does it | Needs an existing account? |
|--------|-------------|------------------------------|
| [Administrator Enrollment](#administrator-enrollment) | Platform administrator | Yes |
| [Self-Enrollment via the Course Catalog](#self-enrollment-via-the-course-catalog) | The learner, themselves | Yes |
| [Manual Enrollment via the Users Tool](#manual-enrollment-via-the-users-tool) | Teacher (or course admin) | Yes |
| [Inviting Users by Email](#inviting-users-by-email) | Teacher (or course admin) | **No** |

## Administrator Enrollment

A platform administrator can subscribe any existing user to any course directly from the administration panel — useful for bulk onboarding (e.g. importing a class list) or when a teacher doesn't have the rights to manage enrollment themselves. See the [Courses](../../admin-guide/courses/README.md) section of the Administration Guide.

## Self-Enrollment via the Course Catalog

If your course's [visibility](../creating-your-course/course-settings.md#course-visibility) allows it, learners with a platform account can subscribe themselves by finding your course in **Explore more courses** and clicking to join — no action needed from you. Whether this is available, and whether it requires a password, is controlled by the **Enrollment Settings** in [Course Settings](../creating-your-course/course-settings.md#enrollment-settings).

## Manual Enrollment via the Users Tool

To subscribe someone who already has a platform account but hasn't joined on their own, open your course's **Users** tool and click the **Add users** <img src="/.gitbook/assets/icons/mdi-account-plus.svg" alt="Add users" data-size="line"> icon.

1. Search for the person by name, username, e-mail, or official code
2. Click **Register** on their row, or select several with the checkboxes and use the **Action** menu to register them all at once

![Search results in the Enroll users to course screen, showing a matching learner and a Register button](/.gitbook/assets/course-users-subscribe-search.png)

Only users who aren't already subscribed to the course appear in the results.

> This icon is available to teachers by default. A platform administrator can restrict it to administrators only via the **Allow User Course Subscription By Course Administrator** setting (`allow_user_course_subscription_by_course_admin`) — if you don't see the **Add users** icon, ask your administrator.

## Inviting Users by Email

The three methods above all assume the person already has a platform account. **Course invitations** cover the case where they don't: you send an invitation to an email address, and Chamilo emails that person a one-time link. Opening the link lets them create an account, and as soon as they finish registering they are automatically subscribed to your course — no separate enrollment step needed.

### Accessing the Tool

Open your course's **Users** tool, then click the **Invite by email** <img src="/.gitbook/assets/icons/mdi-email-outline.svg" alt="Invite by email" data-size="line"> icon in the toolbar, next to **Add users**:

![The Users tool toolbar, showing the Add users icon and the Invite by email icon](/.gitbook/assets/course-users-invite-icon.png)

This opens the **Course invitations** page.

### Who Can Send Invitations

* Platform administrators, always.
* In a plain course (not opened in a session): teachers and other users with edit rights on the course.
* In a session: the session's general coach, or a session administrator — not the broader set of course coaches, since sending an invitation here subscribes to the *entire session*, not just this one course.

### Sending an Invitation

1. Enter the recipient's e-mail address in the **Invite by email** form
2. Click **Send invitation**

![The Course invitations page: the invite-by-email form and a table of sent invitations with their status](/.gitbook/assets/course-invitations-list.png)

Every invitation you've sent for this course appears below the form, with its status:

| Status | Meaning |
|--------|---------|
| **Pending** | Sent, not yet used. Still within its validity period. |
| **Accepted** | The recipient registered and was subscribed. |
| **Revoked** | You cancelled it before it was used. |

For a still-pending invitation, the **Actions** column offers:

* **Copy** <img src="/.gitbook/assets/icons/mdi-content-copy.svg" alt="Copy" data-size="line"> — copies the invitation link, in case you'd rather share it yourself (chat, in person) instead of relying on the email.
* **Revoke** <img src="/.gitbook/assets/icons/mdi-account-cancel.svg" alt="Revoke" data-size="line"> — cancels the invitation immediately; the link stops working. An already-accepted invitation cannot be revoked.

> **The invited email address must not already have an account on this platform.** If it does, sending the invitation fails with a message asking you to enroll that existing user directly instead — through [Manual Enrollment via the Users Tool](#manual-enrollment-via-the-users-tool) above.

### Invitations in a Session

If you open the Users tool from a course that is running inside a session, the page shows a reminder that the invitation applies to the whole session, not just this course:

> *This course is opened in a session. Sending an invitation here will subscribe the recipient to the entire session, not just this course.*

This mirrors how enrollment works elsewhere in Chamilo: you subscribe someone to a session as a whole, or to a standalone course, but never to "this one course inside this session" as a separate action.

### What the Invited Person Sees

The email contains a link to the registration page. Opening it:

* Pre-fills and locks the e-mail field to the address you invited — they can't register under a different address with that link.
* Lets them complete registration **even if self-registration is currently disabled platform-wide** — provided your administrator has turned on the **Allow registration via course invitation links** setting (see below). Without it, an invitation link only helps once self-registration is otherwise open.
* Immediately subscribes them to your course (or the session) once they submit the form, and signs them in.

The link is one-time use and expires after 7 days. If it expires or its target invitation is revoked, opening it behaves as if the link never existed.

> The platform-wide **Allow registration via course invitation links** setting (`registration.allow_invitation_registration`) governs whether your invitation link can open registration when general self-registration is turned off. Ask your administrator if invitations don't seem to work on an otherwise closed platform.

## Tips

* **Match the method to the situation** — administrator or self-enrollment for people already using the platform, manual enrollment for a known existing user, invitations for external guests, reviewers, or anyone who doesn't have an account yet.
* **Revoke invitations you no longer need** — an old pending invitation is still a valid, unused link; revoke it if the intended recipient no longer needs access, or if you're unsure whether it reached them.
* **Check with your administrator if a method seems unavailable** — several of these flows (manual enrollment, invitations, self-enrollment) can be restricted or disabled platform-wide.
