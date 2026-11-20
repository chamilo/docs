# 用户创建

`POST /api/access_urls/{id}/user` 会创建一个平台用户，并将其添加到访问 URL `{id}`。它是 Chamilo 3 对 1.11.x `webservices/api/v2.php` Web 服务中 `save_user_json` 操作的替代，适用于创建学员账户的集成场景（商店、人力资源系统、注册门户）。

## 访问权限

| 调用方 | 是否允许 |
|--------|---------|
| `ROLE_ADMIN` | 是 |
| `ROLE_SESSION_MANAGER` | 是 |
| 其他任何人 | `403 Forbidden` |

使用 JWT 或外部 API 密钥进行身份验证，详见 [身份验证](authentication.md)。

## 请求

```http
POST /api/access_urls/1/user
Authorization: Bearer <token>
Content-Type: application/json
```

```json
{
  "username": "jdoe-20261022",
  "email": "jane.doe@example.com",
  "firstname": "Jane",
  "lastname": "Doe",
  "password": "S3cret!pass",
  "sendEmail": true,
  "extraFields": { "my_user_field": "value" }
}
```

| 字段 | 是否必填 | 说明 |
|-------|----------|-------------|
| `username` | 是 | 新用户的登录名。不得已被其他账户使用（比较时不区分大小写）。 |
| `email` | 是 | 有效的电子邮件地址。多个账户可以共用同一地址，除非 `checkEmailDuplicates` 为 `true`。 |
| `firstname`、`lastname` | 否 | 名和姓。 |
| `password` | 否 | 初始密码。当该字段为空且 `sendEmail` 为 `true` 时，电子邮件中会包含用于设置密码的链接，而不是直接给出密码。 |
| `locale` | 否 | 界面语言，例如 `fr_FR`。默认使用平台语言。 |
| `timezone` | 否 | 默认使用平台时区。 |
| `status` | 否 | 默认为 `5`（学员）；`1` 表示教师。 |
| `sendEmail` | 否 | 默认为 `true`。向用户发送一条消息和一封包含其访问信息的电子邮件。 |
| `checkEmailDuplicates` | 否 | 默认为 `false`。为 `true` 时，若已有任何账户使用该电子邮件地址（比较时不区分大小写），请求将被拒绝并返回 `409 email_already_exists`。行为与 `save_user_json` 的 `check_email_duplicates` 参数相同。 |
| `extraFields` | 否 | 以字段变量为键的用户扩展字段值。每个变量都必须是已存在的用户扩展字段。 |

### 共用电子邮件地址

Chamilo 不要求电子邮件地址唯一：管理员的用户创建表单会接受已被其他账户使用的地址；用户导入仅在勾选其 **检查唯一电子邮件** 选项时才会拒绝该地址；平台也没有可更改此行为的设置。常见情形是学员以新标识重新注册，但仍保留同一地址。仅当您的集成希望将已存在的地址视为错误时，才发送 `checkEmailDuplicates: true`。

启用 **登录名为电子邮件** 设置后，用户名即为电子邮件地址，因此用户名检查本身就会拒绝重复项。

## 响应

`201 Created`，并返回新用户（`user:read` 序列化组），其中包括其 `id`。

## 错误

| 状态 | 响应体 | 发生时机 |
|--------|------|------|
| `401` | | 未提供凭据或凭据无效 |
| `403` | | 调用方既不是管理员，也不是会话管理员 |
| `409` | `{"error": "username_already_exists"}` | 用户名已被使用 |
| `409` | `{"error": "email_already_exists"}` | `checkEmailDuplicates` 为 `true`，且该电子邮件地址已被使用 |
| `422` | | 缺少 `username` 或 `email`，或电子邮件地址无效 |

## 实现

* 操作：在 `src/CoreBundle/Entity/User.php` 上声明的 `AccessUrlUser` 资源
* 输入：`src/CoreBundle/Dto/CreateUserOnAccessUrlInput.php`
* 控制器：`src/CoreBundle/Controller/Api/CreateUserOnAccessUrlAction.php`
* 会话管理员的 **注册学员** 页面（`/admin-dashboard/register/{courseId}`）使用此端点，并设置 `checkEmailDuplicates: true`，因此当地址已被使用时会发出警告。