# ユーザー作成

`POST /api/access_urls/{id}/user` は、プラットフォームユーザーを作成し、アクセス URL `{id}` に追加します。これは Chamilo 3 における、1.11.x の `webservices/api/v2.php` ウェブサービスの `save_user_json` アクションの後継であり、学習者アカウントを作成する連携（ショップ、人事システム、登録ポータル）向けです。

## アクセス

| 呼び出し元 | 許可 |
|--------|---------|
| `ROLE_ADMIN` | はい |
| `ROLE_SESSION_MANAGER` | はい |
| それ以外 | `403 Forbidden` |

[認証](authentication.md) に記載のとおり、JWT または外部 API キーで認証します。

## リクエスト

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

| フィールド | 必須 | 説明 |
|-------|----------|-------------|
| `username` | はい | 新規ユーザーのログイン名。他のアカウントで既に使用されていないこと（大文字・小文字を区別せずに比較）。 |
| `email` | はい | 有効なメールアドレス。`checkEmailDuplicates` が `true` でない限り、複数のアカウントが同じアドレスを共有できます。 |
| `firstname`, `lastname` | いいえ | 名と姓。 |
| `password` | いいえ | 初期パスワード。空であり、かつ `sendEmail` が `true` の場合、メールにはパスワードを設定するリンクが含まれます。 |
| `locale` | いいえ | インターフェース言語。例: `fr_FR`。既定値はプラットフォームの言語です。 |
| `timezone` | いいえ | 既定値はプラットフォームのタイムゾーンです。 |
| `status` | いいえ | 既定は `5`（学習者）。教師の場合は `1`。 |
| `sendEmail` | いいえ | 既定は `true`。ユーザーにメッセージと、アクセス情報を記載したメールを送信します。 |
| `checkEmailDuplicates` | いいえ | 既定は `false`。`true` の場合、いずれかのアカウントが既にこのメールアドレスを使用していると（大文字・小文字を区別せずに比較）、リクエストは `409 email_already_exists` で拒否されます。`save_user_json` の `check_email_duplicates` パラメータと同じ動作です。 |
| `extraFields` | いいえ | フィールドの変数をキーとするユーザー追加フィールドの値。すべての変数は、既存のユーザー追加フィールドでなければなりません。 |

### 共有メールアドレス

Chamilo はメールアドレスの一意性を要求しません。管理者のユーザー作成フォームは、他のアカウントが既に使用しているアドレスを受け付け、ユーザーインポートは **メールアドレスの一意性を確認** オプションがオンの場合にのみ拒否し、これを変更するプラットフォーム設定はありません。よくある例は、新しい識別子で再登録された学習者が同じアドレスを使い続ける場合です。既存のアドレスをエラーとして扱いたい場合にのみ、`checkEmailDuplicates: true` を送信してください。

**ログインはメールアドレス** 設定が有効な場合、ユーザー名はメールアドレスになるため、ユーザー名のチェックで既に重複は拒否されます。

## レスポンス

`201 Created`。新規ユーザー（`user:read` シリアライゼーショングループ）を返し、その `id` を含みます。

## エラー

| ステータス | 本文 | 発生条件 |
|--------|------|------|
| `401` | | 認証情報がない、または無効 |
| `403` | | 呼び出し元が管理者でもセッション管理者でもない |
| `409` | `{"error": "username_already_exists"}` | ユーザー名が既に使用されている |
| `409` | `{"error": "email_already_exists"}` | `checkEmailDuplicates` が `true` であり、メールアドレスが既に使用されている |
| `422` | | `username` または `email` が欠落している、またはメールアドレスが無効 |

## 実装

* 操作: `src/CoreBundle/Entity/User.php` で宣言された `AccessUrlUser` リソース
* 入力: `src/CoreBundle/Dto/CreateUserOnAccessUrlInput.php`
* コントローラー: `src/CoreBundle/Controller/Api/CreateUserOnAccessUrlAction.php`
* セッション管理者の **学習者を登録** ページ（`/admin-dashboard/register/{courseId}`）は、このエンドポイントを `checkEmailDuplicates: true` で使用するため、アドレスが既に使用されている場合に警告します。