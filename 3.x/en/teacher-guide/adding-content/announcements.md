# Announcements

The announcements tool lets you send messages to all learners enrolled in your course, or to specific individuals or groups.

Messages sent through announcements are sent to the learners both by e-mail *and* to their Chamilo inbox.

## Creating an Announcement

1. Open the **Announcements** <img src="../../.gitbook/assets/icons/mdi-bullhorn.svg" alt="Announcements" data-size="line"> tool from the course homepage
2. Click the **Add an announcement** icon <img src="../../.gitbook/assets/icons/mdi-bullhorn.svg" alt="Announcements" data-size="line"> again
3. Fill in:
   * **Recipients** — Choose who receives the announcement:
     * All enrolled learners
     * Specific learners
     * Specific groups
   * **Subject** — A subject line for the announcement
   * **Description** — The message body (supports rich text with formatting, links, and images)
   * **Attachment** — An optional attachment sent along with the e-mail
   * **Sending options** — Announcements will be sent by e-mail by default, but you can also choose (if you have the permissions) to send it through all sessions that include this course, to send a copy to yourself or to attach this announcement to a calendar event for the course.
     * When you tick **Add event in course calendar**, set the event's **Start date** and **End date**. Each click on **Add reminder** adds a line where you set how long before the event the reminder is sent (in minutes, hours or days). The reminders can be changed later by editing the event in the course agenda.
4. Save

The **Tags** button lets you identify a series of markers that will be dynamically replaced in the announcement **Content**. These are relatively intuitive, so we'll let you guess what they do.

The **Preview** button is not very intuitive: it allows you to see whom this announcement will be sent to. This acts as a confirmation of the selection of recipients you made above.

## Managing Announcements

* **Edit** <img src="../../.gitbook/assets/icons/mdi-pencil.svg" alt="Edit" data-size="line"> — Modify an existing announcement
* **Delete** <img src="../../.gitbook/assets/icons/mdi-delete.svg" alt="Delete" data-size="line"> — Remove an announcement
* **Visibility** <img src="../../.gitbook/assets/icons/mdi-eye.svg" alt="Visibility" data-size="line"> — Hide or show announcements

Announcements are displayed in reverse chronological order (newest first).

## Mass-mail delivery configuration

Administrators can configure a separate mail transport for course and platform announcement broadcasts. When enabled, this affects how announcement emails are sent; it does not change the announcement editor, recipient choices or the normal transport used by individual notifications.

If delivery differs between individual messages and announcements, ask a platform administrator to check **Administration > Configuration settings > Mail > Mass mailing DSN** (`mail.mailer_dsn_massmailing`). If this optional setting is empty, announcements use the main email transport. See [mass-mail transport PR #9406](https://github.com/chamilo/chamilo-lms/pull/9406).

## Tips

* **Welcome message** — Create an announcement at the start of the course to welcome learners and provide orientation
* **Use email delivery** — For time-sensitive announcements, enable the email option so learners receive the message even if they are not currently logged into the platform
* **Targeted announcements** — Send specific announcements to groups or individuals when the message is not relevant to the entire class
