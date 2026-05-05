# Documents Settings

Behaviour of the course **Documents** tool — uploads, allowed extensions, sharing, and templates.

Access these settings under **Administration > Configuration settings > Documents**. This category contains **29 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `access_url_specific_files`

**Enable URL-specific files**

When this feature is enabled on a multi-URL configuration, you can go to the main URL and provide URL-specific versions of any file (in the documents tool). The original file will be replaced by the alternative whenever seeing it from a different URL. This allows you to customize each URL even further, while enjoying the advantage of re-using the same courses many times.

*Default: `false`*

### `default_document_quotum`

**Default hard disk space**

What is the available disk space for a course? You can override the quota for specific course through: platform administration > Courses > modify

*Default: `1000`*


### `default_group_quotum`

**Group disk space available**

What is the default hard disk spacde available for a groups documents tool?

*Default: `250`*


### `documents_custom_cloud_link_list`

**Set strict hosts list for cloud links**

The documents tool can integrate links to files in the cloud. The list of cloud services is limited to a hardcoded list, but you can define the ‘links’ array that will contain a list of your own list of services/URLs. The list defined here will replace the default list.

### `documents_default_visibility_defined_in_course`

**Document visibility defined in course**

The default document visibility for all courses

*Default: `false`*

### `documents_hide_download_icon`

**Hide documents download icon**

In the documents tool, hide the download icon from users.

*Default: `false`*


### `enable_x_sendfile_headers`

**Enable X-sendfile headers**

Enable this if you have X-sendfile enabled at the web server level and you want to add the required headers for browsers to pick it up.

*Default: `false`*

### `group_category_document_access`

**Enable sharing options for document inside group category**

When enabled, administrators can set document access and sharing permissions for document groups by category.

*Default: `false`*


### `group_document_access`

**Enable sharing options for group document**

When enabled, document sharing and access permissions can be configured at the group level.

*Default: `false`*


### `pdf_export_watermark_by_course`

**Enable watermark definition by course**

When this option is enabled, teachers can define their own watermark for the documents in their courses.

*Default: `false`*


### `pdf_export_watermark_enable`

**Enable watermark in PDF export**

By enabling this option, you can upload an image or a text that will be automatically added as watermark to all PDF exports of documents on the system.

*Default: `false`*

### `pdf_export_watermark_text`

**PDF watermark text**

This text will be added as a watermark to the documents exports as PDF.

### `permanently_remove_deleted_files`

**Deleted files cannot be restored**

Deleting a file in the documents tool permanently deletes it. The file cannot be restored

*Default: `false`*

### `permissions_for_new_directories`

**Permissions for new directories**

The ability to define the permissions settings to assign to every newly created directory lets you improve security against attacks by hackers uploading dangerous content to your portal. The default setting (0770) should be enough to give your server a reasonable protection level. The given format uses the UNIX terminology of Owner-Group-Others with Read-Write-Execute permissions.

*Default: `0770`*


### `permissions_for_new_files`

**Permissions for new files**

The ability to define the permissions settings to assign to every newly-created file lets you improve security against attacks by hackers uploading dangerous content to your portal. The default setting (0550) should be enough to give your server a reasonable protection level. The given format uses the UNIX terminology of Owner-Group-Others with Read-Write-Execute permissions. If you use Oogie, take care that the user who launch LibreOffice can write files in the course folder.

*Default: `0660`*


### `send_notification_when_document_added`

**Send notification to students when document added**

Whenever someone creates a new item in the documents tool, send a notification to users.

*Default: `false`*


### `show_default_folders`

**Show in documents tool all folders containing multimedia resources supplied by default**

Multimedia file folders containing files supplied by default organized in categories of video, audio, image and flash animations to use in their courses. Although you make it invisible into the document tool, you can still use these resources in the platform web editor.

*Default: `true`*

### `show_documents_preview`

**Show document preview**

Showing previews of the documents in the documents tool will avoid loading a new page just to show a document, but can result unstable with some older browsers or smaller width screens.

*Default: `false`*

### `show_users_folders`

**Show users folders in the documents tool**

This option allows you to show or hide to teachers the folders that the system generates for each user who visits the tool documents or send a file through the web editor. If you display these folders to the teachers, they may make visible or not the learners and allow each learner to have a specific place on the course where not only store documents, but where they can also create and edit web pages and to export to pdf, make drawings, make personal web templates, send files, as well as create, move and delete directories and files and make security copies from their folders. Each user of course have a complete document manager. Also, remember that any user can copy a file that is visible from any folder in the documents tool (whether or not the owner) to his/her portfolios or personal documents area of social network, which will be available for his/her can use it in other courses.

*Default: `true`*

### `students_download_folders`

**Allow learners to download directories**

Allow learners to pack and download a complete directory from the document tool

*Default: `true`*


### `students_export2pdf`

**Allow learners to export web documents to PDF format in the documents and wiki tools**

This feature is enabled by default, but in case of server overload abuse it, or specific learning environments, might want to disable it for all courses.

*Default: `true`*

### `thematic_pdf_orientation`

**PDF orientation for course progress**

In the course progress tool, you can print a PDF of the different elements. Set ‘portrait’ or ‘landscape’ (technical terms) to change it.

*Default: `landscape`*


### `upload_extensions_blacklist`

**Blacklist - setting**

The blacklist is used to filter the files extensions by removing (or renaming) any file which extension figures in the blacklist below. The extensions should figure without the leading dot (.) and separated by semi-column (;) like the following:  exe;com;bat;scr;php. Files without extension are accepted. Letter casing (uppercase/lowercase) doesn't matter.

### `upload_extensions_list_type`

**Type of filtering on document uploads**

Whether you want to use the blacklist or whitelist filtering. See blacklist or whitelist description below for more details.

*Default: `blacklist`*


### `upload_extensions_replace_by`

**Replacement extension**

Enter the extension that you want to use to replace the dangerous extensions detected by the filter. Only needed if you have selected a filter by replacement.

*Default: `dangerous`*


### `upload_extensions_skip`

**Filtering behaviour (skip/rename)**

If you choose to skip, the files filtered through the blacklist or whitelist will not be uploaded to the system. If you choose to rename them, their extension will be replaced by the one defined in the extension replacement setting. Beware that renaming doesn't really protect you, and may cause name collision if several files of the same name but different extensions exist.

*Default: `true`*


### `upload_extensions_whitelist`

**Whitelist - setting**

The whitelist is used to filter the file extensions by removing (or renaming) any file whose extension does *NOT* figure in the whitelist below. It is generally considered as a safer but more restrictive approach to filtering. The extensions should figure without the leading dot (.) and separated by semi-column (;) such as the following:  htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. Files without extension are accepted. Letter casing (uppercase/lowercase) doesn't matter.

### `users_copy_files`

**Allow users to copy files from a course in your personal file area**

Allows users to copy files from a course in your personal file area, visible through the Social Network or through the HTML editor when they are out of a course

*Default: `true`*


### `video_features`

**Video features**

Array of extra features you can enable for the video player in Chamilo. Options include 'speed', which allows you to change the playback speed of a video.

