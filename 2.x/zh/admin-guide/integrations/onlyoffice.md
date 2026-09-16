# OnlyOffice

**OnlyOffice** 集成允许用户在 Chamilo 中直接在浏览器内编辑文档（Word、Excel、PowerPoint），无需下载。

## OnlyOffice 提供的功能

* **文档编辑** — 在浏览器中编辑 .docx、.xlsx、.pptx 文件
* **格式兼容性** — 完全兼容 Microsoft Office 格式
* **无需桌面软件** — 一切都在浏览器中运行

> 实时协作编辑功能取决于 OnlyOffice Document Server 本身；Chamilo 的插件通过服务器打开和保存文档，但不会增加或限制该功能。

## 配置

1. 在您的服务器上安装 **OnlyOffice Document Server**（或使用 OnlyOffice 云服务）
2. 在 Chamilo 平台设置中配置：
   * **OnlyOffice Document Server URL** — 您的 OnlyOffice 服务器地址
   * **Secret key** — 用于 Chamilo 与 OnlyOffice 之间的安全通信
3. 启用集成

## 工作原理

配置完成后，用户在“文档”工具中查看支持的文档类型时，会看到 **使用 OnlyOffice 编辑** 选项。点击后，文档将在 Chamilo 界面内的 OnlyOffice 编辑器中打开。

更改会自动保存回 Chamilo 的文档存储中。

## 小贴士

* **建议使用独立服务器** — 与 BigBlueButton 类似，OnlyOffice Document Server 应在独立的服务器上运行以获得最佳性能
* **需要 HTTPS** — Chamilo 和 OnlyOffice 都应通过 HTTPS 提供服务，以确保集成正常工作
* **检查格式** — OnlyOffice 对 Office 格式（.docx、.xlsx、.pptx）的支持最佳，其他格式的编辑支持可能有限。