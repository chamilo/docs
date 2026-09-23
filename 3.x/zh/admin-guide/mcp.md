# MCP（Model Context Protocol）

Chamilo 3.0 对外提供 MCP 服务器，使 AI 助手与智能体（Claude、ChatGPT 连接器，或任何兼容 MCP 的客户端）能够以已认证用户的身份在平台内执行操作，并使用该用户自身的权限——不存在单独的服务账号，也不会获得提升后的访问权限。

## MCP 为 Chamilo 带来的能力

MCP（Model Context Protocol）是一项开放标准，允许 AI 客户端调用服务器所暴露的一组已定义“工具”。Chamilo 的 MCP 服务器可通过单一端点 `/mcp` 访问，并暴露一组经过筛选的、面向教师的课程管理工具，而非整个 API 表面。

## 可用能力

每一次调用均以已连接用户的身份运行，因此工具只能查看和修改该用户所管理的课程。当前工具集如下：

| 工具 | 功能说明 |
|------|---------------|
| Current user | 返回已认证用户的身份与角色 |
| Teacher courses | 列出用户以教师身份管理的课程 |
| Course overview | 返回基础课程信息及资源数量 |
| Create course | 按照平台的课程创建规则新建课程 |
| Create course assignment | 创建带描述与最高分的草稿或已发布作业 |
| Create course test | 根据主题描述或已有文档，创建由 AI 辅助生成的选择题测验 |
| Get course test response status | 报告哪些学生已作答、正在作答或尚未开始某测验 |
| Get user course test score | 返回某学生对某测验的最新成绩与最佳已完成成绩 |
| Create training satisfaction survey | 创建包含七道题目的满意度调查 |
| Create course learning path | 根据 MCP 客户端提供的页面创建学习路径 |
| List documents | 列出课程“文档”工具中的文档 |
| Read course document | 返回可编辑文档的 HTML 内容、标题与元数据 |
| Edit course document | 替换现有可编辑文档的全部 HTML 内容 |
| Create course document | 在文档根文件夹中创建由 AI 辅助生成的 HTML 文档 |
| Create course illustration | 为某主题生成 AI 插图并保存为文档 |
| Illustrate document paragraph | 在文档某段落之前或之后插入已有图片或视频 |
| Find recent course forum activity | 查找与某主题相关的近期可见论坛帖子 |
| Review course quality | 分析课程的学习路径、文档、测验、作业与调查，并返回改进建议 |

该列表由 Chamilo 核心团队筛选维护，无法在平台内由用户自行扩展——教师不能添加自己的工具。

## 用户如何连接

### 个人 MCP API 密钥

每位用户可在 **社交网络** > **MCP API 密钥** 下生成自己的密钥：

![MCP API 密钥页面，显示未激活的密钥、“生成 API 密钥”按钮，以及包含端点 URL 与 Authorization 请求头格式的远程 MCP 连接区块](../.gitbook/assets/admin-mcp-api-key.png)

* 点击 **生成 API 密钥** 会创建密钥并仅显示一次——此后 Chamilo 只保存掩码版本，因此必须立即复制完整密钥并妥善保存。
* 生成新密钥会立即吊销前一个密钥。
* 页面显示密钥状态（激活/未激活）、需在客户端中配置的 MCP 端点，以及创建日期与最近使用日期。
* **远程 MCP 连接** 面板明确说明应在 MCP 客户端中填写的内容：端点 URL 以及 `Authorization: Bearer <your MCP API key>` 请求头。

正如该页面所述，密钥将客户端认证为该用户的账号——不会授予该账号原本不具备的任何权限。

### OAuth 2.1（远程客户端与连接器）

对于支持 OAuth 发现与动态客户端注册（而非手动粘贴密钥）的 MCP 客户端，Chamilo 同时充当 OAuth 2.1 授权服务器：客户端发现 Chamilo 的端点、自行注册，并将用户重定向至 `/oauth/authorize` 以批准访问。已批准的应用会出现在 **社交网络** > **已授权应用** 下，用户可在此吊销不再使用或不认识的应用。

## 安全注意事项

* **无权限提升。** 每一次 MCP 工具调用以及每一个经 OAuth 授权的应用，均以连接用户自身的 Chamilo 权限运行——个人 API 密钥或已授权应用所能执行的操作，绝不会超出该用户本可手动完成的范围。
* **仅接受 Bearer，并实施速率限制。** `/mcp` 仅接受 Bearer 凭据——个人 MCP API 密钥、OAuth 访问令牌，或（在开发环境中）JWT。身份验证尝试按 IP 地址进行速率限制，以减缓凭据猜测。
* **公开面极窄。** `/mcp` 接受的唯一未认证流量是 `OPTIONS` 预检请求；每一次实际调用都需要 `ROLE_USER`。OAuth 发现、动态客户端注册和令牌端点按 OAuth 2.1 / MCP 规范要求有意保持公开——这本身并不授予访问权限，仅让客户端获知如何启动授权流程。
* **对 `/mcp` 有意禁用 DNS 重绑定保护。** 实现 MCP 的组件通常会将端点限制为 `localhost`，除非配置了允许主机名的静态列表——这并不适合可在多个主机名下访问的多 URL Chamilo 门户。Chamilo 禁用该项检查，因为在此场景下它是多余的：每一个 `/mcp` 请求无论其 `Host`/`Origin` 标头如何，都已经需要 Bearer 凭据；而 DNS 重绑定攻击（依赖随伪造 Host 一并携带的环境式、cookie 风格身份验证）无法伪造其尚未持有的 bearer 令牌。

## 配置 MCP 服务器

与本指南中的大多数集成不同，MCP 没有管理面板设置页——它在文件层面配置，位于 `config/packages/mcp.yaml`，并且需要服务器的 shell 访问权限：

| 键 | 用途 |
|-----|---------|
| `app`、`version`、`description` | Chamilo 向连接的 MCP 客户端报告的身份信息 |
| `client_transports.stdio` / `client_transports.http` | 启用哪些传输方式；Chamilo 默认同时启用二者 |
| `http.path` | MCP HTTP 端点（默认为 `/mcp`） |
| `http.allowed_hosts` | DNS 重绑定主机允许列表——在 Chamilo 上设为 `false`（参见上文“安全注意事项”） |
| `http.session.store`、`.directory`、`.ttl` | MCP 会话状态的持久化位置及保留时长 |

若要完全禁用 MCP 服务器，将 `client_transports.http: false`（若 CLI 传输也应关闭，则同时设置 `stdio: false`）并清除缓存：

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

## 提示

* 将 MCP API 密钥视同密码——任何持有该密钥的人，都可通过任意 MCP 客户端以该用户身份行事。
* 鼓励用户定期查看 **已授权应用** 并撤销任何无法识别的项。
* 支持上文所列内容生成工具（测验创建、文档创建、插图）的 AI 提供商，请参见 [AI 配置](integrations/ai-configuration.md)。