# OnlyOffice

**OnlyOffice** 集成允许用户在 Chamilo 中直接于浏览器内编辑文档（Word、Excel、PowerPoint），无需下载。

## OnlyOffice 提供的功能

* **文档编辑** — 在浏览器中编辑 .docx、.xlsx、.pptx 文件
* **格式兼容性** — 与 Microsoft Office 格式完全兼容
* **无需桌面软件** — 全部在浏览器中完成

> 实时协作编辑取决于 OnlyOffice Document Server 本身；Chamilo 的插件通过该服务器打开并保存文档，但不会增加或限制该能力。

## 配置

1. 在您的服务器上安装 **OnlyOffice Document Server**（或使用 OnlyOffice 云服务）
2. 在 Chamilo 平台设置中配置：
   * **OnlyOffice Document Server URL** — 您的 OnlyOffice 服务器地址
   * **Secret key** — 用于 Chamilo 与 OnlyOffice 之间的安全通信
3. 启用该集成

## 工作原理

配置完成后，用户在文档工具中查看受支持的文档类型时，会看到 **使用 OnlyOffice 编辑** 选项。点击后，文档将在 Chamilo 界面内的 OnlyOffice 编辑器中打开。

更改会自动保存回 Chamilo 的文档存储。

## 提示

* **建议使用独立服务器** — 与 BigBlueButton 类似，OnlyOffice Document Server 应运行在独立服务器上以获得最佳性能
* **需要 HTTPS** — Chamilo 与 OnlyOffice 均应通过 HTTPS 提供服务，集成才能正常工作
* **检查格式** — OnlyOffice 对 Office 格式（.docx、.xlsx、.pptx）支持最佳。其他格式的编辑支持可能有限。