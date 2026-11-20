# Open Badges 2.0 颁发与验证

Chamilo 3.1 可为已获得的技能发布 **Open Badges 2.0** 凭证，其中包括在 PNG 元数据中嵌入已烘焙断言（baked assertion）的徽章图像。徽章验证使用公开的徽章、断言与颁发者端点。

## 配置颁发者与技能

1. 设置平台的**机构名称**以及有效的**管理员联系邮箱**；颁发者资料要求这两项均已填写。
2. 为技能配置标题、描述与徽章标准。
3. 在适当情况下附加有效的 PNG 徽章图像。若技能没有自定义资源，Chamilo 也可使用其默认徽章图像。
4. 通过常规技能工作流为学习者授予或确认技能的获得。

凭证依赖于已获得的技能关系。已撤销或不再持有的技能断言会被报告为已撤销。技能与徽章资源的作用范围限定于相应的访问 URL。

## 公开验证数据

每次颁发都有一个托管断言。相关 URL 由应用程序的公开根路径派生，包括：

- `main/skills/assertion.php?issue=<issue-id>` — 针对特定技能颁发的 JSON 断言。
- `main/skills/class.php?id=<skill-id>` — 徽章类元数据，包括标准与颁发者引用。
- `main/skills/issuer.php` — 颁发机构资料。
- `main/skills/image.php?id=<skill-id>` — 徽章图像资源。

实际生成的 URL 取决于安装的公开基础路径。断言包含收件人邮箱的加盐哈希，而不是发布明文邮箱地址，并标识颁发者与已获得的技能。徽章 PNG 可在 `openbadges` iTXt 块中包含该断言。

## 验证已颁发的徽章

在未登录会话的情况下打开托管的断言、徽章类与颁发者端点。它们应返回一致且相互关联的凭证。通过该技能支持的导出流程下载已颁发的 PNG，并验证其嵌入的断言与托管表示一致。若技能已被撤销，请检查验证结果是否反映其已撤销状态。

仅包含视觉徽章图案的 PNG **不能**证明凭证有效。请勿将 Open Badges 2.0 颁发与无关的证书或已签名 PDF 功能相混淆。

参见[管理技能](managing-skills.md)与[已签名证书验证](../maintenance/signed-certificate-verification.md)。实现：[PR #9346](https://github.com/chamilo/chamilo-lms/pull/9346)。