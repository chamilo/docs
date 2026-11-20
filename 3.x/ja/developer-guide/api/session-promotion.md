# セッションのプロモーション

セッションは**プロモーション**（キャリアのコホート。**管理 > キャリアとプロモーション**で管理）に所属できます。インテグレーションでは、標準の `PATCH /api/sessions/{id}` 操作で設定します。これは 1.11.x の `update_session` ウェブサービスの `promotion_id` パラメータを置き換えるものです。

プロモーションをセッションカテゴリ（`/api/session_categories`）と混同しないでください。これは別のグループ化です。

## アクセス

プラットフォーム管理者（`ROLE_ADMIN`）のみがプロモーションを読み取り、セッションのプロモーションを変更できます。その他のユーザーは `403 Forbidden` を受け取ります。

## プロモーションの検索

プロモーションは読み取り専用で公開されています。作成と編集は引き続き管理画面から行います。

```http
GET /api/promotions
GET /api/promotions/{id}
```

```json
{
  "@id": "/api/promotions/3",
  "id": 3,
  "title": "Accounting 2026",
  "status": 1
}
```

`status` は、有効なプロモーションでは `1`、無効なプロモーションでは `0` です。

## セッションのプロモーションの設定

```http
PATCH /api/sessions/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
```

```json
{ "promotion": "/api/promotions/3" }
```

セッションをプロモーションから切り離すには、`{ "promotion": null }` を送信します。

プロモーションは IRI として指定する必要があります。数値の id、またはどのプロモーションにも一致しない IRI は、`400 Bad Request` で拒否されます。

## セッションのプロモーションの読み取り

`GET /api/sessions/{id}` はプロモーションの IRI を返します。セッションにプロモーションがない場合は、このフィールドを省略します。

```json
{
  "@id": "/api/sessions/42",
  "title": "Accounting basics - October 2026",
  "promotion": "/api/promotions/3"
}
```

[セッションの複製](session-duplication.md) で作成されたセッションは、モデルセッションのプロモーションを保持します。