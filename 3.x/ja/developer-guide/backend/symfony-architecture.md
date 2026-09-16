# Symfony Architecture

## Bundles

Chamilo 3.0 は、3 つの Symfony バンドルで構成されています。

### CoreBundle (`src/CoreBundle/`)

プラットフォーム全体に関わる処理を担う、最大のバンドルです。

* **ユーザーと認証** — User エンティティ、ロール、JWT トークン、OAuth2 プロバイダー
* **リソースシステム** — ResourceNode および ResourceFile（統一されたコンテンツ抽象化）
* **プラットフォーム設定** — `src/CoreBundle/Settings/` 内の設定スキーマ。設定可能なあらゆる側面をカバーします
* **管理** — ユーザー、コース、セッション、プラグイン管理用の Admin コントローラー
* **AI プロバイダー** — OpenAI、Gemini、Mistral、DeepSeek、Grok 向けの Factory パターン
* **ファイルストレージ** — Flysystem ベースのストレージアダプター（local、S3、Azure、GCS）
* **セキュリティ** — Voter、アクセス制御、ロール階層
* **ツール** — ツールシステムを通じて登録されるコースツール定義

### CourseBundle (`src/CourseBundle/`)

コースコンテンツに特化したすべてです。

* **コンテンツエンティティ** — ドキュメント、演習、ラーニングパス、フォーラム、用語集、アンケート、出席、ブログ、課題など、101 のエンティティ
* **コースコピー** — Common Cartridge 1.3 および Moodle 形式に対応したインポート／エクスポート
* **コース設定** — コースレベルの設定スキーマ

### LtiBundle (`src/LtiBundle/`)

LTI 1.3 標準の実装です。

* **プラットフォームおよびツール登録** — 外部ツール接続の管理
* **ローンチ処理** — LTI ローンチフローのコントローラー
* **成績パスバック** — 外部ツールから Chamilo へ成績を返す処理

## Service Container

Chamilo は Symfony の依存性注入コンテナを使用します。サービスは次の場所で設定されます。

* `config/services.yaml` — グローバルなサービス定義
* 各バンドルの `DependencyInjection/` ディレクトリ — バンドル固有のサービス

## Security Architecture

セキュリティシステムは `config/packages/security.yaml` で設定されます。

* **パスワードハッシュ** — bcrypt（デフォルト）をサポートし、レガシーの SHA1 および MD5 からの移行にも対応
* **ロール階層** — 階層的に整理された 18 のロール（ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER。追加ロールには ROLE_HR、ROLE_INVITEE、ROLE_STUDENT_BOSS、ROLE_SESSION_MANAGER、ROLE_QUESTION_MANAGER が含まれます）
* **コンテキスト依存ロール** — コースレベルのロール（ROLE_CURRENT_COURSE_TEACHER、ROLE_CURRENT_COURSE_STUDENT）は、登録状況に基づいてリクエストごとに計算されます
* **ファイアウォール** — API 向け JWT 認証、Web インターフェース向けセッションベース認証
* **Voter** — Symfony の Voter によるリソースレベルのアクセス制御

## Legacy Code

一部の機能は、依然として `public/main/` 内のレガシー PHP コードを使用しています。

* 演習のレンダリングとインタラクション
* ラーニングパスプレーヤー
* 一部の管理ツール

これらは段階的に Symfony+Vue アーキテクチャへ移行されています。レガシーページは、Symfony カーネルをブートストラップする互換レイヤー経由で提供されます。