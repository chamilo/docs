# Certificates Settings

Defaults applied when a learner earns a certificate from the gradebook.

Access these settings under **Administration > Configuration settings > Certificates**. This category contains **9 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `add_certificate_pdf_footer`

**Add footer to PDF certificate exports**

When enabled, a footer is added to PDF exports of certificates.

### `allow_general_certificate`

**Enable general certificate**

A general certificate is a certificate grouping all the accomplishments by the user in the courses (s)he followed.

### `allow_public_certificates`

**Allow public certificates**

User certificates can be view by unregistered users.

### `certificate_filter_by_official_code`

**Certificates filter by official code**

Add a filter on the students official code to the certificates list.

### `certificate_pdf_orientation`

**PDF orientation for certificates**

Set ‘portrait’ or ‘landscape’ (technical terms) for PDF certificates.

### `hide_certificate_export_link`

**Certificates: hide PDF export link for all**

Enable to completely remove the possibility to export certificates to PDF (for all users). If enabled, this includes hiding it from students.

### `hide_certificate_export_link_students`

**Certificates: hide export link from students**

If enabled, students won't be able to export their certificates to PDF. This option is available because, depending on the precise HTML structure of the certificate template, the PDF export might be of low quality. In this case, it is best to only show the HTML certificate to students.

### `hide_my_certificate_link`

**Hide 'my certificate' link**

Hide the certificates page for non-admin users.

### `session_admin_can_download_all_certificates`

**Allow session admins to download private certificates**

If enabled, session administrators can download certificates even if they are not publicly published.

