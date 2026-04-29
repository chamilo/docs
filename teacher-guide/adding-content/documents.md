# Documents

The documents tool is your course's file repository. You can upload files, create documents in HTML format, organize content into folders, and give learners access to all the materials they need.

## Accessing the Documents Tool

Open the **Documents** <img src="/.gitbook/assets/icons/mdi-bookshelf.svg" alt="Documents" data-size="line"> tool from the course homepage. You will see a file browser showing the root folder of your course's document library.

![The documents file browser showing folders and files with action icons](/.gitbook/assets/documents-file-browser.png)

## Uploading Files

1. Click the **Upload** <img src="/.gitbook/assets/icons/mdi-upload.svg" alt="Upload" data-size="line"> button
2. Select one or more files from your computer (you can drag and drop files into the upload area)
3. The files are uploaded and appear in the current folder

Chamilo supports most common file types: PDF, office documents (.docx, .odt), presentations (.pptx, .odp), spreadsheets (.xlsx, .ods), images (PNG, JPG, SVG, GIF), audio files, video files (including WEBM), HTML files, and more.

Some formats might be forbidden by the portal administrator through a whitelist/blacklist filtering setting in the security section of the administration.

For better readability by learners, we do recommend uploading files a browser can view or open without additional tools. This makes your course more portable and, as such, more accessible to mobile devices and more readable for people with special abilities.

## Creating Content

In addition to uploading files, you can create content directly in Chamilo:

### Web Pages

1. Click **New document**
2. Use the rich-text editor to write your content with formatting, images, tables, and links
3. Enter a **title** for the page
4. Save

The rich-text editor (TinyMCE) provides word-processor-like features including:

* Text formatting (bold, italic, headings, lists)
* Tables
* Images (upload or link to existing images)
* Embedded videos and audio
* Links to other resources
* HTML source editing for advanced users

### AI media generation

When AI helpers are enabled on the platform, you can ask the AI to generate an **image** or a **short video** to illustrate a paragraph in the document you are editing. Select a paragraph, open the **Generate AI media** dialog, and the AI will produce a media item that you can review and insert. The dialog respects course-level permissions and only appears in courses where AI media generation is allowed.

### Audio Recording

If your browser supports it, you can record audio directly within the documents tool — useful for creating audio instructions or language learning content. This requires an HTTPS configuration for Chamilo, as audio recording uses technology that the browser only allows if the connection is secure.

## Organizing with Folders

Keep your document library organized using folders:

1. Click **New folder** <img src="/.gitbook/assets/icons/mdi-folder-plus.svg" alt="New folder" data-size="line">
2. Enter a folder name
3. Save

You can create nested folders to build a logical content hierarchy (e.g., `Module 1 > Week 1 > Readings`).

### Moving Files

* Locate your file in the list
* Click **Move** <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Move" data-size="line">
* Select the destination folder
* Confirm

## Managing Documents

For each file or folder, you can:

| Action | Icon | Description |
|--------|------|-------------|
| **Edit** | <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="Edit" data-size="line"> | Rename the file or edit its content (for web pages) |
| **Delete** | <img src="/.gitbook/assets/icons/mdi-delete.svg" alt="Delete" data-size="line"> | Remove the file or folder |
| **Download** | <img src="/.gitbook/assets/icons/mdi-download-box.svg" alt="Download" data-size="line"> | Download the file to your computer |
| **Visibility** | <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="Visibility" data-size="line"> | Hide or show the file to learners |
| **Replace** | <img src="/.gitbook/assets/icons/mdi-file-replace.svg" alt="Replace" data-size="line"> | Replace the file with an updated version |
| **Move** | <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Move" data-size="line"> | Move to a different folder |

Replacing a file is an important feature when you use documents to build learning paths, as replacing the document will allow the document to be refreshed without learners loosing the progress saved for that document.

### Bulk Actions

Select multiple files using checkboxes, then use the toolbar to delete or download all selected items at once.

## OnlyOffice Integration

If your administrator has configured the **OnlyOffice** plugin, you can edit Word, Excel, and PowerPoint (or LibreOffice) files directly in the browser without downloading them. Look for the **Edit with OnlyOffice** <img src="/.gitbook/assets/icons/mdi-file-document-edit-outline.svg" alt="OnlyOffice" data-size="line"> option when viewing a supported file.

Documents are stored in Chamilo, OnlyOffice is only used to **view** or edit the documents in the browser, without the need for any additional tool.

## Cloud Files

If you use cloud storage (Azure Blob, AWS S3, or Google Cloud) for your files, these are stored in the cloud but you can link them from here. This is transparent to you and your learners — the document tool works the same way regardless of the storage backend.

## Tips

* **Organize early** — Create your folder structure before uploading content so you don't have to reorganize later. If you have created other courses with the right structure, you can use those courses as template later on
* **Use descriptive file names** — Help learners find what they need with clear, meaningful names
* **Hide work-in-progress** — Use the visibility toggle to hide documents you are still preparing
* **Link from learning paths** — Reference documents within your learning paths to create guided learning sequences
* **Check the disk quota** — If your course has a storage limit, remove outdated files to free up space
