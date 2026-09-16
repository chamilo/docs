# 证书设置

当学习者从成绩簿中获得证书时应用的默认设置。

通过 **管理 > 配置设置 > 证书** 访问这些设置。此类别包含 **9 个设置**，以下列出平台设置固定数据 (`SettingsCurrentFixtures.php`) 中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过 API 进行脚本编写或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `add_certificate_pdf_footer`

**在 PDF 证书导出中添加页脚**

启用后，PDF 导出的证书中会添加页脚。

*默认值：`false`*

### `allow_general_certificate`

**启用通用证书**

通用证书是将用户在所修课程中取得的所有成就汇总的证书。

*默认值：`false`*

### `allow_public_certificates`

**允许公开证书**

未注册用户可以查看用户证书。

*默认值：`false`*

### `certificate_filter_by_official_code`

**按官方代码过滤证书**

在证书列表中添加对学生官方代码的过滤条件。

*默认值：`false`*

### `certificate_pdf_orientation`

**证书的 PDF 方向**

为 PDF 证书设置“portrait”（纵向）或“landscape”（横向）（技术术语）。

*默认值：`landscape`*

### `hide_certificate_export_link`

**证书：对所有人隐藏 PDF 导出链接**

启用后，将完全移除导出证书到 PDF 的可能性（对所有用户）。如果启用，此设置包括对学生隐藏该功能。

*默认值：`false`*

### `hide_certificate_export_link_students`

**证书：对学生隐藏导出链接**

如果启用，学生将无法将其证书导出为 PDF。此选项可用是因为根据证书模板的具体 HTML 结构，PDF 导出质量可能较低。在这种情况下，最好仅向学生展示 HTML 证书。

*默认值：`false`*

### `hide_my_certificate_link`

**隐藏“我的证书”链接**

对非管理员用户隐藏证书页面。

*默认值：`false`*

### `session_admin_can_download_all_certificates`

**允许会话管理员下载私人证书**

如果启用，会话管理员可以下载证书，即使这些证书未公开发布。

*默认值：`false`*