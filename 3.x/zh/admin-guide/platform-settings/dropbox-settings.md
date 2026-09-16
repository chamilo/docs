# 投递箱设置

**投递箱（Dropbox）** 文件交换工具的行为。

可在 **管理 > 配置设置 > 投递箱** 下访问这些设置。此类别包含 **8 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `dropbox_allow_group`

**投递箱：允许群组**

用户可以向群组发送文件

*默认值：`true`*

### `dropbox_allow_just_upload`

**投递箱：上传到自己的投递箱空间？**

允许培训师和用户将文档上传到其投递箱，而无需将文档发送给自己

*默认值：`true`*

### `dropbox_allow_mailing`

**投递箱：允许邮寄**

借助邮寄功能，您可以向每位学习者发送个性化文档

*默认值：`false`*

### `dropbox_allow_overwrite`

**投递箱：文档是否可被覆盖**

当用户或培训师上传的文档名称与已有文档相同时，是否可以覆盖原始文档？若选择是，则将失去版本控制机制。

*默认值：`true`*

### `dropbox_allow_student_to_student`

**投递箱：学习者 <-> 学习者**

允许用户向其他用户发送文档（点对点）。用户也可能将此功能用于不太相关的文档（mp3、测验答案等）。若禁用此项，则用户只能向培训师发送文档。

*默认值：`true`*

### `dropbox_hide_course_coach`

**投递箱：隐藏课程辅导教师**

当辅导教师向学生发送文档时，在投递箱中隐藏会话课程辅导教师

*默认值：`false`*

### `dropbox_hide_general_coach`

**在投递箱中隐藏总辅导教师**

当总辅导教师上传文件时，在投递箱工具中隐藏总辅导教师姓名

*默认值：`false`*


### `dropbox_max_filesize`

**投递箱：文档的最大文件大小**

投递箱文档最大可为多大（以 MB 计）？

*默认值：`100000000`*