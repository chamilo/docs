# Messaging Settings

Behaviour of the **Messaging / Inbox** system.

Access these settings under **Administration > Configuration settings > Messaging**. This category contains **7 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `allow_message_tool`

**Internal messaging tool**

Enabling the internal messaging tool allows users to send messages to other users of the platform and to have a messaging inbox.

### `allow_send_message_to_all_platform_users`

**Allow sending messages to any platform user**

Allows you to send messages to any user of the platform, not just your friends or the people currently online.

### `allow_user_message_tracking`

**Admins can see personal messages**

Allow administrators to see personal messages between a teacher and a learner. Please make sure you include a note in your terms and conditions as this might affect privacy protection.

### `filter_interactivity_messages`

**Teachers can access learners messages only within session timeframe**

Filter messages between a teacher and a learner between the session start end dates

### `message_max_upload_filesize`

**Max upload file size in messages**

Maximum size for file uploads in the messaging tool (in Bytes)

### `private_messages_about_user`

**Allow private messages between teachers about a learner**

Allow exchange of messages from teachers/bosses about a user from the tracking page of that user.

### `private_messages_about_user_visible_to_user`

**Allow learners to see messages about them between teachers**

If exchange of messages about a user are enabled, this option will allow the corresponding user to see the messages. This is to comply with rules of transparency the organization may need to comply to.

