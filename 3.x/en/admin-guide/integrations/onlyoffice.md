# OnlyOffice

**OnlyOffice** integration allows users to edit documents (Word, Excel, PowerPoint) directly in the browser within Chamilo, without downloading them.

## What OnlyOffice Provides

* **Document editing** — Edit .docx, .xlsx, .pptx files in the browser
* **Format compatibility** — Full compatibility with Microsoft Office formats
* **No desktop software needed** — Everything runs in the browser

> Real-time collaborative editing depends on the OnlyOffice Document Server itself; Chamilo's plugin opens and saves documents through the server but does not add or restrict that capability.

## Configuration

1. Install **OnlyOffice Document Server** on your server (or use the OnlyOffice cloud service)
2. In Chamilo platform settings, configure:
   * **OnlyOffice Document Server URL** — The address of your OnlyOffice server
   * **Secret key** — For secure communication between Chamilo and OnlyOffice
3. Enable the integration

## How It Works

Once configured, users see an **Edit with OnlyOffice** option when viewing supported document types in the Documents tool. Clicking it opens the document in the OnlyOffice editor within the Chamilo interface.

Changes are saved back to Chamilo's document storage automatically.

## Document version refresh and saves

When the document server signals that a newer saved version is available, the Chamilo editor can request an updated **signed document configuration** and use OnlyOffice's file-refresh capability without requiring the user to open another document. Chamilo checks that the refreshed configuration belongs to the same document before switching the editor to its new version.

A **force-save** while editing is still in progress does not advance the document-version key. The final-save callback advances the saved document metadata, so the next opening can use the completed version. This distinction avoids treating an in-progress save as a separate document version.

If a refresh fails, verify that OnlyOffice Document Server can reach the Chamilo file and callback URLs, and check the editor/server logs. Reopen the document only after confirming that work was saved; an interrupted or outdated editor session is not proof that the final version reached Chamilo.

This behavior was corrected in [PR #9178](https://github.com/chamilo/chamilo-lms/pull/9178).

## Tips

* **Separate server recommended** — Like BigBlueButton, OnlyOffice Document Server should run on its own server for best performance
* **HTTPS required** — Both Chamilo and OnlyOffice should be served over HTTPS for the integration to work
* **Check formats** — OnlyOffice works best with Office formats (.docx, .xlsx, .pptx). Other formats may have limited editing support.
