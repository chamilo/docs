# Attendance Settings

Defaults and behaviour of the **Attendance** tool.

Access these settings under **Administration > Configuration settings > Attendance**. This category contains **4 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `allow_delete_attendance`

**Attendances: enable deletion**

The default behaviour in Chamilo is to hide attendance sheets instead of deleting them, just in case the teacher would do it by mistake. Enable this option to allow teachers to *really* delete attendance sheets.

### `attendance_allow_comments`

**Allow comments in attendance sheets**

Teachers and students can comment on each individual attendance (to justify).

### `enable_sign_attendance_sheet`

**Attendance signing**

Enable taking signatures to confirm one's attendance.

### `multilevel_grading`

**Enable Multi-Level Attendance Grading**

Allows grading attendance with multiple levels instead of a simple present/absent system.

