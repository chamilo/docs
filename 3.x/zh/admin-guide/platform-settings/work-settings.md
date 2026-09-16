# 作业（Work）设置

**作业（学生作品）** 工具的默认值与行为。

可在 **管理 > 配置设置 > 作业（Work）** 下访问这些设置。此类别包含 **12 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `allow_compilatio_tool`

**启用 Compilatio**

Compilatio 是一项反作弊服务，用于比较两次提交之间的文本，并报告内容（通常为作业）非原创的可能性是否很高。

*默认值：`false`*

### `allow_my_student_publication_page`

**启用“我的作业”页面**

[推断] 为学习者启用专用页面，以便查看和管理自己已提交的作业。

*默认值：`false`*

### `allow_only_one_student_publication_per_user`

**学生只能上传一份作业**

[推断] 限制学习者每个活动只能提交一份作业，防止多次提交。

*默认值：`false`*

### `allow_redirect_to_main_page_after_work_upload`

**上传或评论后重定向到作业工具首页**

上传作业或添加评论后重定向到作业列表

*默认值：`false`*

### `assignment_prevent_duplicate_upload`

**防止作业中的重复上传**

[推断] 阻止学习者为同一作业提交上传相同文件。

*默认值：`false`*

### `block_student_publication_add_documents`

**防止向作业添加文档**

[推断] 防止学习者在提交作业时添加或附加文档。

*默认值：`false`*

### `block_student_publication_edition`

**防止编辑作业**

[推断] 防止学习者在首次提交后修改或更新已提交的作业。

*默认值：`false`*

### `block_student_publication_score_edition`

**防止教师修改作业分数**

[推断] 防止教师在分数已记录后更改作业分数。

*默认值：`false`*

### `compilatio_tool`

**Compilatio 设置**

在此配置 Compilatio 连接详情。

### `considered_working_time`

**为作业启用时间投入**

这将允许教师给出完成作业的预估时间投入（格式为 hh:mm:ss）。在提交作业并经教师批准（作业被评分）后，学习者将自动获得相应时间。

*默认值：`work_time`*

### `force_download_doc_before_upload_work`

**上传作业前强制下载文档**

强制用户在上传作业之前，先下载作业说明中提供的文档。

*默认值：`true`*

### `my_courses_show_pending_work`

**在“我的课程”页面显示指向“待处理”作业的链接**

[推断] 在学习者的“我的课程”页面上显示待处理作业的链接或数量，以便快速访问。

*默认值：`false`*