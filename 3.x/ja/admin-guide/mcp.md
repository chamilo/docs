# MCP (Model Context Protocol)

Chamilo 3.0 は MCP サーバーを公開しており、AI アシスタントおよびエージェント（Claude、ChatGPT コネクタ、または任意の MCP 互換クライアント）が、認証済みユーザーに代わってプラットフォーム内で操作できます。そのユーザー自身の権限が用いられ、別個のサービスアカウントや昇格したアクセスはありません。

## What MCP Adds to Chamilo

MCP（Model Context Protocol）は、AI クライアントがサーバーが公開する定義済みの「ツール」一式を呼び出せるようにするオープン標準です。Chamilo の MCP サーバーは単一のエンドポイント `/mcp` で到達でき、API 全体ではなく、教師向けのコース管理ツールの厳選されたセットを公開します。

## Available Capabilities

すべての呼び出しは接続中のユーザーとして実行されるため、ツールはそのユーザーが管理するコースのみを参照・変更します。現在のツールセットは次のとおりです。

| Tool | What it does |
|------|---------------|
| Current user | 認証済みユーザーの識別情報とロールを返す |
| Teacher courses | ユーザーが教師として管理するコースを一覧表示する |
| Course overview | ベースコースの情報とリソース数を返す |
| Create course | プラットフォームのコース作成ルールに従って新しいコースを作成する |
| Create course assignment | 説明と最高得点を指定して、下書きまたは公開済みの課題を作成する |
| Create course test | トピックの説明または既存ドキュメントから、AI 支援の多肢選択テストを作成する |
| Get course test response status | テストについて、回答済み・進行中・未回答の学生を報告する |
| Get user course test score | テストにおける学生の最新および最良の完了スコアを返す |
| Create training satisfaction survey | 7 問の満足度調査を作成する |
| Create course learning path | MCP クライアントから提供されたページからラーニングパスを作成する |
| List documents | コースの Documents ツール内のドキュメントを一覧表示する |
| Read course document | 編集可能なドキュメントの HTML コンテンツ、タイトル、メタデータを返す |
| Edit course document | 既存の編集可能なドキュメントの HTML コンテンツ全体を置き換える |
| Create course document | ルートの Documents フォルダに AI 支援の HTML ドキュメントを作成する |
| Create course illustration | トピック向けの AI イラストを生成し、ドキュメントとして保存する |
| Illustrate document paragraph | ドキュメント内の段落の前または後に、既存の画像または動画を挿入する |
| Find recent course forum activity | トピックに関連する、最近の表示可能なフォーラム投稿を検索する |
| Review course quality | コースのラーニングパス、ドキュメント、テスト、課題、調査を分析し、改善の推奨事項を返す |

この一覧は Chamilo コアチームが厳選したものであり、プラットフォーム内からユーザーが拡張することはできません。教師が独自のツールを追加することはできません。

## How Users Connect

### Personal MCP API key

各ユーザーは **Social network** > **MCP API key** で自身のキーを生成します。

![The MCP API key page, showing an inactive key, the Generate API key button, and the Remote MCP connection block with the endpoint URL and Authorization header format](/.gitbook/assets/admin-mcp-api-key.png)

* **Generate API key** をクリックするとキーが作成され、一度だけ表示されます。Chamilo はその後マスクされた版のみを保存するため、完全なキーは直ちにコピーして安全に保管する必要があります。
* 新しいキーを生成すると、直前のキーは直ちに無効化されます。
* ページにはキーの状態（active/inactive）、クライアントに設定する MCP エンドポイント、作成日および最終使用日が表示されます。
* **Remote MCP connection** パネルには、MCP クライアントに設定すべき内容が明示されます。エンドポイント URL と `Authorization: Bearer <your MCP API key>` ヘッダーです。

ページ自体が述べているとおり、キーはクライアントをそのユーザーのアカウントとして認証します。アカウントがもともと持っていない権限を付与することはありません。

### OAuth 2.1 (remote clients and connectors)

手動で貼り付けたキーではなく、OAuth のディスカバリと動的クライアント登録をサポートする MCP クライアント向けに、Chamilo は OAuth 2.1 認可サーバーとしても動作します。クライアントは Chamilo のエンドポイントを発見し、自身を登録し、ユーザーを `/oauth/authorize` にリダイレクトしてアクセスを承認させます。承認されたアプリケーションは **Social network** > **Authorized applications** に表示され、ユーザーは不要または認識できないものを取り消せます。

## セキュリティに関する考慮事項

* **権限昇格は発生しません。** すべての MCP ツール呼び出しおよびすべての OAuth 認可済みアプリは、接続しているユーザー自身の Chamilo 権限で実行されます。個人 API キーや認可済みアプリが、そのユーザーが手作業で既に実行できる範囲を超えて動作することはありません。
* **Bearer のみ、レート制限あり。** `/mcp` は Bearer 資格情報のみを受け付けます。個人 MCP API キー、OAuth アクセストークン、または（開発時）JWT です。認証試行は資格情報の推測を遅らせるため、IP アドレスごとにレート制限されます。
* **公開面は狭く保たれます。** `/mcp` が受け付ける未認証トラフィックは `OPTIONS` プリフライトのみであり、実際の呼び出しにはすべて `ROLE_USER` が必要です。OAuth のディスカバリ、動的クライアント登録、およびトークンエンドポイントは、OAuth 2.1 / MCP 仕様の要求どおり意図的に公開されています。これ自体がアクセスを付与するわけではなく、クライアントが認可フローの開始方法を知るためだけに使われます。
* **`/mcp` では DNS リバインディング保護を意図的に無効化しています。** MCP を実装するバンドルは通常、許可ホスト名の静的リストが設定されていない限りエンドポイントを `localhost` に制限します。これは多数のホスト名で到達可能なマルチ URL の Chamilo ポータルには適しません。Chamilo がそのチェックを無効化するのは、ここでは冗長だからです。すべての `/mcp` リクエストは `Host`/`Origin` ヘッダーに関係なく既に Bearer 資格情報を必要とし、DNS リバインディング攻撃（なりすました Host とともに環境依存の Cookie 型認証が乗り込むことに依存する）は、所持していない Bearer トークンを偽造できません。

## MCP サーバーの設定

本ガイドのほとんどの連携とは異なり、MCP には管理パネルの設定ページはありません。ファイルレベル、`config/packages/mcp.yaml` で設定し、サーバーへのシェルアクセスが必要です。

| キー | 目的 |
|-----|---------|
| `app`, `version`, `description` | 接続する MCP クライアントに対して Chamilo が報告する識別情報 |
| `client_transports.stdio` / `client_transports.http` | 有効なトランスポート。Chamilo はデフォルトで両方を有効にします |
| `http.path` | MCP HTTP エンドポイント（デフォルトは `/mcp`） |
| `http.allowed_hosts` | DNS リバインディングのホスト許可リスト。Chamilo では `false` に設定します（上記「セキュリティに関する考慮事項」を参照） |
| `http.session.store`, `.directory`, `.ttl` | MCP セッション状態の保存先と保持期間 |

MCP サーバーを完全に無効化するには、`client_transports.http: false` を設定し（CLI トランスポートもオフにする場合は `stdio: false` も）、キャッシュをクリアします。

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

## ヒント

* MCP API キーはパスワードと同様に扱ってください。所持者は任意の MCP クライアントを通じてそのユーザーとして操作できます。
* ユーザーに **認可済みアプリケーション** を定期的に確認し、認識できないものは取り消すよう促してください。
* 上記に挙げたコンテンツ生成ツール（テスト作成、ドキュメント作成、イラスト）を支える AI プロバイダーについては、[AI の設定](integrations/ai-configuration.md) を参照してください。