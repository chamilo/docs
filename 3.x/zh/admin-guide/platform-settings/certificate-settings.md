# 证书设置

学习者从成绩册获得证书时应用的默认设置。

可在 **管理 > 配置设置 > 证书** 下访问这些设置。本类别包含 **11 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `add_certificate_pdf_footer`

**为 PDF 证书导出添加页脚**

启用后，将在证书的 PDF 导出中添加页脚。

*默认值：`false`*

### `add_gradebook_certificates_cron_task_enabled` **v3**

**在 WS 调用时自动生成证书**

启用后，在使用 WSCertificatesList Web 服务时，此选项将确保：若用户在所有课程与学期的成绩册所定义的全部项目中均达到足够分数，则所有证书均已由用户生成（这可能会消耗服务器上相当可观的处理资源）。

*默认值：`false`*

### `allow_certificates_search` **v3**

**允许搜索证书**

允许用户和访客通过顶部栏菜单搜索已生成的证书。

*默认值：`false`*

### `allow_general_certificate`

**启用综合证书**

综合证书是将用户在其所修课程中的全部成就汇总在一起的证书。

*默认值：`false`*

### `allow_public_certificates`

**允许公开证书**

未注册用户可以查看用户证书。

*默认值：`false`*

### `certificate_filter_by_official_code`

**按官方编号筛选证书**

在证书列表中增加按学生官方编号筛选的功能。

*默认值：`false`*

### `certificate_pdf_orientation`

**证书 PDF 方向**

为 PDF 证书设置 ‘portrait’ 或 ‘landscape’（技术术语）。

*默认值：`landscape`*

### `hide_certificate_export_link`

**证书：对所有人隐藏 PDF 导出链接**

启用以彻底取消将证书导出为 PDF 的可能（对所有用户）。若启用，也包括对学生隐藏该功能。

*默认值：`false`*

### `hide_certificate_export_link_students`

**证书：对学生隐藏导出链接**

若启用，学生将无法将其证书导出为 PDF。提供此选项是因为：取决于证书模板的具体 HTML 结构，PDF 导出质量可能较低。在这种情况下，最好仅向学生展示 HTML 证书。

*默认值：`false`*

### `hide_my_certificate_link`

**隐藏“我的证书”链接**

对非管理员用户隐藏证书页面。

*默认值：`false`*

### `session_admin_can_download_all_certificates`

**允许学期管理员下载私有证书**

若启用，即使证书未公开发布，学期管理员也可以下载证书。

*默认值：`false`*

## 另请参阅

证书现在可以设置有效期和到期日期，并支持自动或手动到期提醒。此处不进行配置——有效期是面向教师的成绩册设置，提醒定时任务的开关位于 **定时任务** 类别中。请参阅 [证书与技能](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) 以及 [定时任务设置](crons-settings.md#certificate-expiry-reminders)。