# 作业（作品）设置

**作业（学生作品）**工具的默认值和行为。

在**管理 > 配置设置 > 作业（作品）**下访问这些设置。此类别包含**12个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过API进行脚本编写或需要通过编辑[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml)全局更改这些设置时使用它。

## 设置

### `allow_compilatio_tool`

**启用Compilatio**

Compilatio是一种反作弊服务，它比较两次提交之间的文本，并报告内容（通常是作业）是否很可能不是原创的。

*默认值：`false`*

### `allow_my_student_publication_page`

**启用我的作业页面**

[推测] 为学习者启用一个专用页面，以便查看和管理他们提交的作业。

*默认值：`false`*

### `allow_only_one_student_publication_per_user`

**学生只能上传一次作业**

[推测] 限制学习者在每个活动中只能提交一次作业，防止多次提交。

*默认值：`false`*

### `allow_redirect_to_main_page_after_work_upload`

**上传作业或添加评论后重定向到作业工具主页**

在上传作业或添加评论后重定向到作业列表。

*默认值：`false`*

### `assignment_prevent_duplicate_upload`

**防止作业重复上传**

[推测] 阻止学习者在同一作业提交中上传相同的文件。

*默认值：`false`*

### `block_student_publication_add_documents`

**禁止在作业中添加文档**

[推测] 阻止学习者在提交作业时添加或附加文档。

*默认值：`false`*

### `block_student_publication_edition`

**禁止编辑作业**

[推测] 阻止学习者在初次提交后修改或更新已提交的作业。

*默认值：`false`*

### `block_student_publication_score_edition`

**禁止教师修改作业分数**

[推测] 阻止教师在记录作业分数后进行更改。

*默认值：`false`*

### `compilatio_tool`

**Compilatio设置**

在此配置Compilatio连接详细信息。

### `considered_working_time`

**为作业启用时间投入**

这将允许教师为完成作业提供预计的时间投入（格式为hh:mm:ss）。在提交作业并得到教师批准（作业被评分）后，学习者将自动被分配相应的时间。

*默认值：`work_time`*

### `force_download_doc_before_upload_work`

**在上传作业前强制下载文档**

强制用户在上传作业前下载作业定义中提供的文档。

*默认值：`true`*

### `my_courses_show_pending_work`

**在我的课程页面显示“待完成”作业的链接**

[推测] 在学习者的“我的课程”页面上显示待完成作业的链接或数量，以便快速访问。

*默认值：`false`*