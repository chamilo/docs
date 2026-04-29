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

## Tips

* **Separate server recommended** — Like BigBlueButton, OnlyOffice Document Server should run on its own server for best performance
* **HTTPS required** — Both Chamilo and OnlyOffice should be served over HTTPS for the integration to work
* **Check formats** — OnlyOffice works best with Office formats (.docx, .xlsx, .pptx). Other formats may have limited editing support.
