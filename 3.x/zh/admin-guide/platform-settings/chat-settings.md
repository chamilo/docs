# 聊天设置

课程 **聊天** 工具的行为。

可在 **管理 > 配置设置 > 聊天** 下访问这些设置。此类别包含 **5 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `allow_global_chat`

**允许全局聊天**

用户可以彼此聊天

*默认值：`false`*

### `course_chat_restrict_to_coach`

**将课程聊天限制为仅限辅导教师**

仅允许学生与课程中的辅导教师交谈（不能与其他学生交谈）。

*默认值：`false`*

### `hide_chat_video`

**在全局聊天中隐藏视频聊天选项**

启用后，视频聊天功能将被禁用，且在全局聊天工具中不可用。

*默认值：`true`*

### `save_private_conversations_in_documents`

**将私人对话保存到文档中**

若启用，一对一私人聊天消息将镜像保存到课程聊天历史文档中。出于隐私考虑，建议保持禁用。

*默认值：`false`*

### `show_chat_folder`

**显示聊天会话的历史文件夹**

这将向教师显示包含聊天中所有会话的文件夹，教师可将其对学生可见或不可见，并作为资源使用

*默认值：`true`*