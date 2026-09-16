# Dropbox 设置

**Dropbox** 文件交换工具的行为设置。

在 **管理 > 配置设置 > Dropbox** 下访问这些设置。此类别包含 **8 个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过 API 进行脚本编写或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `dropbox_allow_group`

**Dropbox：允许群组**

用户可以向群组发送文件

*默认值：`true`*

### `dropbox_allow_just_upload`

**Dropbox：上传到自己的 Dropbox 空间？**

允许培训师和用户将文档上传到他们的 Dropbox，而无需将文档发送给自己

*默认值：`true`*

### `dropbox_allow_mailing`

**Dropbox：允许邮件发送**

通过邮件功能，您可以向每位学习者发送个人文档

*默认值：`false`*

### `dropbox_allow_overwrite`

**Dropbox：是否可以覆盖文档**

当用户或培训师上传与已存在文档同名的文档时，是否可以覆盖原始文档？如果选择“是”，则会失去版本控制机制。

*默认值：`true`*

### `dropbox_allow_student_to_student`

**Dropbox：学习者 <-> 学习者**

允许用户向其他用户发送文档（点对点）。用户也可能将此功能用于不太重要的文档（mp3、测试答案等）。如果禁用此功能，则用户只能向培训师发送文档。

*默认值：`true`*

### `dropbox_hide_course_coach`

**Dropbox：隐藏课程教练**

当教练向学生发送文档时，在 Dropbox 中隐藏课程教练

*默认值：`false`*

### `dropbox_hide_general_coach`

**Dropbox 中隐藏总教练**

当总教练上传文件时，在 Dropbox 工具中隐藏总教练姓名

*默认值：`false`*

### `dropbox_max_filesize`

**Dropbox：文档的最大文件大小**

Dropbox 文档的最大大小可以是多少（以 MB 为单位）？

*默认值：`100000000`*