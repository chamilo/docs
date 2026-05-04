# Announcements Settings

Behaviour of the course **Announcements** tool — how announcements are sent and scheduled.

Access these settings under **Administration > Configuration settings > Announcements**. This category contains **9 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `allow_careers_in_global_announcements`

**Link global announcements with careers and promotions**

When enabled, global announcements can be associated with careers and promotions for targeted distribution.

### `allow_coach_to_edit_announcements`

**Allow coaches to always edit announcements**

Allow coaches to always edit announcements inside active or past sessions.

### `allow_scheduled_announcements`

**Enable scheduled announcements in sessions**

Allows the sessions managers to set announcements that will be triggered on specific dates or after/before a number of days of start/end of the session. Enabling this feature requires you to setup a cron task.

### `announcements_hide_send_to_hrm_users`

**Hide option to send announcements to HR users**

Remove the checkbox to enable sending announcements to users with HR roles (still requires to confirm in the announcements tool).

### `course_announcement_scheduled_by_date`

**Date-based announcements**

Allow teachers to configure announcements that will be sent at specific dates. This requires you to setup a cron task on cron/course_announcement.php running at least once daily.

### `disable_announcement_attachment`

**Disable attachment to announcements**

Even though attachments in this version are dealt in an elegant way and do not multiply on disk, you might want to disable attachments altogether if you want to avoid excesses.

### `disable_delete_all_announcements`

**Disable button to delete all announcements**

Select 'Yes' to remove the button to delete all announcements, as this can be used by mistake by teachers.

### `hide_announcement_sent_to_users_info`

**Hide 'sent to' in announcements**

Select 'Yes' to avoid showing to whom an announcement has been sent.

### `hide_send_to_hrm_users`

**Hide the option to send an announcement copy to HRM**

In the announcements form, an option normally appears to allow teachers to send a copy of the announcement to the user's HRM. Set this to 'Yes' to remote the option (and *not* send the copy).

