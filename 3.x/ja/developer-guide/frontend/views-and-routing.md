# ビューとルーティング

Chamilo には、Vue Router で接続された多数の Vue ビュー（ページレベルのコンポーネント）があります。実際のファイルは `assets/vue/views/` 配下にあります。

## ルーターアーキテクチャ

ルーターは `assets/vue/router/index.js` で定義され、クリーンな URL のために `createWebHistory` を使用します。

ルートはモジュール化されており、機能ごとのルートファイルに整理され、メインルーターにインポートされます。

| ルートモジュール | ページ |
|-------------|-------|
| `admin` | 管理パネルのページ |
| `sessionAdmin` | セッション管理のページ |
| `course` | コース一覧、作成、ホーム、カタログ |
| `account` | ユーザープロフィールと設定 |
| `personalfile` | 個人ファイル領域 |
| `message` | メッセージング / 受信箱 |
| `user` | ユーザー管理ページ |
| `usergroup` | ユーザーグループ（クラス）ページ |
| `userreluser` | ユーザー関係（友達/フォロー）ページ |
| `ccalendarevent` | コースカレンダーとアジェンダ |
| `ctoolintro` | コースツール紹介ページ |
| `page` | 静的 CMS ページ |
| `pageLayout` | ページレイアウトラッパー |
| `publicPage` | 公開アクセス可能なページ |
| `social` | ソーシャルネットワークページ |
| `filemanager` | ファイルマネージャー（コースドキュメントブラウザー） |
| `skill` | スキルとコンピテンシーのページ |
| `accessurl` | マルチ URL（ポータル）管理ページ |
| `branch` | ブランチ / ネットワークキャンパスページ |
| `room` | バーチャルルームページ |
| `buycourses` | コース購入ページ |
| `documents` | ドキュメント管理 |
| `assignments` | 課題ワークフロー |
| `links` | 外部リンク管理 |
| `glossary` | 用語集管理 |
| `attendance` | 出席追跡 |
| `lp` | 学習パスプレーヤーとエディター |
| `dropbox` | ドロップボックス / ファイル交換 |
| `blog` | ブログページ |
| `blogAdmin` | ブログ管理 |
| `coursemaintenance` | コースのバックアップと復元 |
| `catalogue` | コースおよびセッションのカタログ |

## 主要なルート

| パス | ビュー | 説明 |
|------|------|-------------|
| `/` | `AppIndex.vue`（またはカスタム） | アプリケーションのエントリーポイント |
| `/home` | `pages/Home.vue` | プラットフォームのホームページ |
| `/login` | `pages/Login.vue` | ログインページ |
| `/courses` | `views/user/courses/List.vue` | ユーザーが登録しているコース |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | 現在のセッション |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | 過去のセッション |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | 今後のセッション |
| `/course/:id/home` | `views/course/CourseHome.vue` | コースホームページ |
| `/account/home` | `views/account/Home.vue` | ユーザープロフィール |
| `/admin` | 管理ビュー | 管理パネル |
| `/faq` | `pages/Faq.vue` | FAQ ページ |

## ルートガード

ルーターはナビゲーションガード（`beforeEach` および `afterEach` で宣言）を使用して、次を行います。

* `useSecurityStore` で認証状態を確認し、未認証ユーザーを `/login` にリダイレクトする
* `useCidReqStore` でコースコンテキストを検証する
* SPA ナビゲーション中にページ種別の CSS クラスを適用する（フルページ読み込み時に Twig の `PageHelper` が行う処理の代替）
* カスタム Vue テンプレートのオーバーライドをサポートする — カスタム Vue テンプレートが有効な場合（`var/vue_templates/pages/AppIndex.vue`）、`/` のエントリーコンポーネントがカスタムの `AppIndex.vue` に差し替えられる

## ビューの構成

ビューは `assets/vue/views/` にあり、機能ごとに整理されています。

```
views/
├── account/          # User profile and settings
├── admin/            # Admin pages
├── assignments/      # Assignment submission and grading
├── attendance/       # Attendance sheets
├── blog/             # Blog posts and comments
├── branch/           # Network campus management
├── buycourses/       # Course purchase flow
├── ccalendarevent/   # Course calendar
├── course/           # Course list, home, creation, catalog
├── coursecategory/   # Course category management
├── coursemaintenance/# Course backup/restore
├── ctoolintro/       # Tool introduction pages
├── documents/        # Document list, creation, media generation
├── dropbox/          # Dropbox / file exchange
├── filemanager/      # File browser
├── glossary/         # Glossary list and term management
├── links/            # External links
├── lp/               # Learning path player and editor
├── message/          # Inbox and messaging
├── page/             # CMS static pages
├── pageLayout/       # Page layout wrappers
├── personalfile/     # Personal file space
├── room/             # Virtual rooms
├── sessionadmin/     # Session administration
├── skill/            # Skills and competencies
├── social/           # Social network
├── terms/            # Terms of service
├── user/             # User management and course/session lists
├── usergroup/        # User groups (classes)
└── userreluser/      # User relationships (friends/follows)
```