# Search Settings

Search settings configure the full-text search engine that allows users to find content across courses. Access them from **Administration > Configuration settings > Search**.

## Full-Text Search Engine

Chamilo 2.0 supports full-text search powered by **Xapian**, an open-source search engine library. When enabled, users can search across course documents, exercise questions, forum posts, and other indexed content.

| Setting | Description |
|---------|-------------|
| **Enable full-text search** | Master toggle for the search functionality. When disabled, users can only browse content through course navigation. |
| **Search engine** | The search backend to use. Xapian is the primary supported engine. |

## Requirements

To use full-text search, you must install the Xapian PHP extension on your server:

* **PHP Xapian extension** -- Install via your system package manager (e.g., `php-xapian` on Debian/Ubuntu).
* **Xapian Omega** (optional) -- Provides additional indexing tools for document formats.

Full-text search does not function without the Xapian extension installed.

## Search Indexing

Content must be indexed before it can be found through search. Indexing processes course content and stores it in the Xapian database.

| Setting | Description |
|---------|-------------|
| **Index on upload** | Automatically index new documents when teachers upload them. |
| **Reindex on edit** | Update the search index when existing content is modified. |
| **Indexable content types** | Select which content types are indexed: documents (PDF, DOCX, HTML), exercises, forum posts, wiki pages. |

### Manual Reindexing

If the search index becomes out of sync, administrators can trigger a full reindex:

1. Go to **Administration > Search**.
2. Click **Reindex all content**.
3. Wait for the process to complete. On large platforms with many courses, this can take significant time.

## Search Scope

| Setting | Description |
|---------|-------------|
| **Search across all courses** | When enabled, search results include content from all courses the user is enrolled in. When disabled, search is limited to the currently active course. |
| **Include session content** | Include content from session-based courses in search results. |
| **Search in document content** | Search within the text of uploaded documents (PDFs, DOCX files), not just filenames. Requires document parsing support. |

## Supported Document Formats

For document content indexing, the following formats can be parsed:

| Format | Requirements |
|--------|-------------|
| **PDF** | `pdftotext` utility (from poppler-utils) |
| **DOCX/XLSX/PPTX** | Built-in PHP parsing |
| **HTML** | Native support |
| **Plain text** | Native support |

Install the required utilities on your server to enable content extraction from these formats.

## Tips

* **Install Xapian early** if you plan to use search -- retroactively indexing a large platform takes more time than indexing incrementally as content is added.
* **Enable "Index on upload"** to keep the search index current without manual intervention.
* **Monitor index size** -- The Xapian database grows with content volume. Ensure adequate disk space on the server.
* **Search is optional** -- Smaller platforms with well-organized course structures may not need full-text search. Evaluate whether your users would benefit from it before investing in the setup.
