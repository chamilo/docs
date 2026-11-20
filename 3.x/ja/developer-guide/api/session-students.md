# セッション受講者登録 API

連携機能は、管理者専用のエンドポイントを使用して、セッション内の学習者を一覧表示、登録、および削除できます。これらの操作は、Chamilo の管理画面におけるセッション登録の動作を使用します。これらは、別のチューター向けワークフローに属する `/api/course-sessions/actions/*` とは区別されます。

## 認証とアクセス

以下のすべての操作には、プラットフォームロール `ROLE_ADMIN` による認証が必要です。セッション管理者であるだけでは、アクセスは**付与されません**。認証方法については、[認証](authentication.md) を参照してください。

マルチ URL 構成では、要求されたセッションは現在のアクセス URL に属している必要があります。そうでない場合、エンドポイントは `404` を返します。

## ルート

| メソッド | エンドポイント | 目的 |
|--------|----------|---------|
| `GET` | `/api/sessions/{id}/students` | このセッションに登録されている学習者のユーザー ID を一覧表示する |
| `POST` | `/api/sessions/{id}/students/subscribe` | 指定した学習者を追加し、既存の学習者は保持する |
| `POST` | `/api/sessions/{id}/students/unsubscribe` | 指定した学習者のみを削除する |

`{id}` を数値のセッション ID に置き換えてください。両方の POST リクエストでは、`userIds` 配列を含む JSON を送信します。

```http
POST /api/sessions/42/students/subscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23] }
```

登録が成功すると、次の構造のレスポンスが返されます。ID はインストール環境によって異なります。

```json
{
  "success": true,
  "applied": [17],
  "alreadyThere": [23],
  "ignored": []
}
```

`applied` には新たに登録された学習者が含まれます。`alreadyThere` には既に登録されている学習者が含まれます。`ignored` には対象外または利用できない ID が一覧表示されます。登録時、Chamilo は追加された学習者をセッションのコースにも登録します。セッションの名簿全体を**置き換えることはありません**。

所属を確認するには、次のようにします。

```http
GET /api/sessions/42/students
Authorization: Bearer <admin-token>
```

```json
{ "userIds": [17, 23] }
```

選択した学習者を削除するには、次のようにします。

```http
POST /api/sessions/42/students/unsubscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17] }
```

登録解除のレスポンスには、`success`、`applied`（削除された ID）、および `ignored`（登録されていなかった ID）が含まれます。他の学習者はセッションに残ります。

## 検証と制限

* `userIds` は数値 ID（整数、または数字のみの文字列）の配列である必要があります。重複する ID は重複排除され、正でない値は除外されます。
* 登録の対象となるユーザーは、存在し、論理削除されておらず、匿名ユーザーまたは人事管理者ではなく、現在のアクセス URL に属している必要があります。
* JSON または `userIds` が欠落している、または形式が不正な場合は、`400 Bad Request` が返されます。
* 存在しない、または範囲外のセッションは `404 Not Found` を返します。管理者権限のない呼び出し元は、これらのルートを使用できません。
* 受講者登録ルートは、`Session` エンティティに対する汎用 CRUD エンドポイントでは**なく**、セッション名簿を置換ドキュメントとして受け付けません。

対応する管理インターフェースについては、[セッションの管理](../../admin-guide/sessions/managing-sessions.md) を参照してください。受講者を登録する前にモデルセッションを複製する場合は、[セッションの複製](session-duplication.md) を参照してください。

**実装:** `src/CoreBundle/Controller/Api/SessionStudentsController.php`。Chamilo LMS のコミット `bdfb2dd661` で追加されました。