# Chat Settings

Behaviour of the course **Chat** tool.

Access these settings under **Administration > Configuration settings > Chat**. This category contains **5 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in `monospace`. Use it when scripting via the API or referring to settings in `.env` overrides.

## Settings

### `allow_global_chat`

**Allow global chat**

Users can chat with each other

### `course_chat_restrict_to_coach`

**Restrict course chat to coaches**

Only allow students to talk to the tutors in the course (not other students).

### `hide_chat_video`

**Hide videochat option in global chat**

When enabled, video chat functionality is disabled and unavailable in the global chat tool.

### `save_private_conversations_in_documents`

**Save private conversations in documents**

If enabled, 1:1 private chat messages will be mirrored in the course chat history documents. Recommended to keep disabled for privacy.

### `show_chat_folder`

**Show the history folder of chat conversations**

This will show to theacher the folder that contains all sessions that have been made in the chat, the teacher can make them visible or not learners and use them as a resource

