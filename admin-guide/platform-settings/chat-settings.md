# 聊天设置

课程**聊天**工具的行为设置。

通过**管理 > 配置设置 > 聊天**访问这些设置。此类别包含**5个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过API进行脚本编写或需要通过编辑[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `allow_global_chat`

**允许全局聊天**

用户可以相互聊天

*默认值：`false`*

### `course_chat_restrict_to_coach`

**限制课程聊天仅限教练**

仅允许学生与课程中的导师交谈（不允许与其他学生交谈）。

*默认值：`false`*

### `hide_chat_video`

**在全局聊天中隐藏视频聊天选项**

启用后，视频聊天功能将在全局聊天工具中被禁用并不可用。

*默认值：`true`*

### `save_private_conversations_in_documents`

**将私人对话保存在文档中**

如果启用，1:1的私人聊天消息将被镜像到课程聊天历史文档中。出于隐私考虑，建议保持禁用。

*默认值：`false`*

### `show_chat_folder`

**显示聊天会话历史文件夹**

这将向教师显示包含聊天中进行的所有会话的文件夹，教师可以选择是否让学习者可见，并将其作为资源使用。

*默认值：`true`*