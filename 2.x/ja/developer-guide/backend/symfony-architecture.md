# Symfonyアーキテクチャ

## バンドル

Chamilo 2.0は、3つのSymfonyバンドルで構成されています：

### CoreBundle (`src/CoreBundle/`)

最大のバンドルで、プラットフォーム全体に関するすべての事項を扱います：

- **ユーザーと認証** — ユーザーエンティティ、ロール、JWTトークン、OAuth2プロバイダ
- **リソースシステム** — ResourceNodeおよびResourceFile（統一されたコンテンツ抽象化）
- **プラットフォーム設定** — `src/CoreBundle/Settings/`にある設定スキーマで、すべての設定可能な側面をカバー
- **管理** — ユーザー、コース、セッション、プラグイン管理のための管理者コントローラ
- **AIプロバイダ** — OpenAI、Gemini、Mistral、DeepSeek、Grokのためのファクトリーパターン
- **ファイルストレージ** — Flysystemベースのストレージアダプター（ローカル、S3、Azure、GCS）
- **セキュリティ** — 投票者、アクセス制御、ロール階層
- **ツール** — ツールシステムを通じて登録されるコースツール定義

### CourseBundle (`src/CourseBundle/`)

コースコンテンツに特化したすべての内容：

- **コンテンツエンティティ** — ドキュメント、演習、学習パス、フォーラム、用語集、アンケート、出席、ブログ、課題などに関する101のエンティティ
- **コースコピー** — Common Cartridge 1.3およびMoodle形式のサポートを伴うインポート/エクスポート
- **コース設定** — コースレベルの設定スキーマ

### LtiBundle (`src/LtiBundle/`)

LTI 1.3標準の実装：

- **プラットフォームおよびツール登録** — 外部ツール接続の管理
- **起動処理** — LTI起動フローコントローラ
- **成績返却** — 外部ツールからChamiloへの成績返却

## サービスコンテナ

ChamiloはSymfonyの依存性注入コンテナを使用しています。サービスは以下で設定されています：

- `config/services.yaml` — グローバルサービス定義
- 各バンドルの`DependencyInjection/`ディレクトリ — バンドル固有のサービス

## セキュリティアーキテクチャ

セキュリティシステムは`config/packages/security.yaml`で設定されています：

- **パスワードハッシュ** — bcrypt（デフォルト）をサポートし、従来のSHA1およびMD5からの移行も可能
- **ロール階層** — 18のロールが階層的に組織化（ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER; 追加のロールにはROLE_HR、ROLE_INVITEE、ROLE_STUDENT_BOSS、ROLE_SESSION_MANAGER、ROLE_QUESTION_MANAGERが含まれる）
- **コンテキスト依存のロール** — コースレベルのロール（ROLE_CURRENT_COURSE_TEACHER、ROLE_CURRENT_COURSE_STUDENT）は、登録に基づいてリクエストごとに計算される
- **ファイアウォール** — API用のJWT認証、ウェブインターフェース用のセッションベース
- **投票者** — Symfony投票者を通じたリソースレベルのアクセス制御

## レガシーコード

一部の機能は依然として`public/main/`内のレガシーPHPコードを使用しています：

- 演習のレンダリングとインタラクション
- 学習パスプレイヤー
- 一部の管理ツール

これらは徐々にSymfony+Vueアーキテクチャに移行されています。レガシーページは、Symfonyカーネルをブートストラップする互換性レイヤーを通じて提供されています。