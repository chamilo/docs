# ビューとルーティング

Chamiloには、Vue Routerを介して接続された多数のVueビュー（ページレベルのコンポーネント）が用意されています。実際のファイルは `assets/vue/views/` に配置されています。

## ルーターのアーキテクチャ

ルーターは `assets/vue/router/index.js` で定義されており、クリーンなURLを実現するために `createWebHistory` を使用しています。

ルートはモジュール化されており、機能ごとにルートファイルに整理され、メインルーターにインポートされています：

| ルートモジュール | ページ |
|----------------|---------|
| `admin` | 管理ダッシュボードのページ |
| `sessionAdmin` | セッション管理のページ |
| `course` | コース一覧、作成、ホームページ、カタログ |
| `account` | ユーザープロフィールと設定 |
| `personalfile` | 個人ファイルスペース |
| `message` | メッセージ / 受信トレイ |
| `user` | ユーザー管理のページ |
| `usergroup` | ユーザーグループ（クラス）のページ |
| `userreluser` | ユーザー間の関係（友達/フォロワー）のページ |
| `ccalendarevent` | コースカレンダーとスケジュール |
| `ctoolintro` | コースツールの紹介ページ |
| `page` | CMSの静的ページ |
| `pageLayout` | ページレイアウトのラッパー |
| `publicPage` | 公開アクセス可能なページ |
| `social` | ソーシャルネットワークのページ |
| `filemanager` | ファイルマネージャー（コースドキュメントブラウザ） |
| `skill` | スキルと能力のページ |
| `accessurl` | マルチURL（ポータル）管理のページ |
| `branch` | ネットワークの支店 / キャンパスのページ |
| `room` | 仮想ルームのページ |
| `buycourses` | コース購入のページ |
| `documents` | ドキュメント管理 |
| `assignments` | 課題のワークフロー |
| `links` | 外部リンクの管理 |
| `glossary` |  glossaryの管理 |
| `attendance` | 出席追跡 |
| `lp` | 学習パスのプレイヤーおよびエディター |
| `dropbox` | Dropbox / ファイル交換 |
| `blog` | ブログのページ |
| `blogAdmin` | ブログ管理 |
| `coursemaintenance` | コースのバックアップと復元 |
| `catalogue` | コースおよびセッションのカタログ |

## 主要なルート

| パス | ビュー | 説明 |
|---------|--------------|-----------|
| `/` | `AppIndex.vue` (またはカスタム) | アプリケーションのエントリーポイント |
| `/home` | `pages/Home.vue` | プラットフォームのホームページ |
| `/login` | `pages/Login.vue` | ログインページ |
| `/courses` | `views/user/courses/List.vue` | ユーザーが登録しているコース |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | 現在のセッション |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | 過去のセッション |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | 今後のセッション |
| `/course/:id/home` | `views/course/CourseHome.vue` | コースのホームページ |
| `/account/home` | `views/account/Home.vue` | ユーザープロフィール |
| `/admin` | 管理者ビュー | 管理ダッシュボード |
| `/faq` | `pages/Faq.vue` | よくある質問（FAQ）ページ |

## ルートガード

ルーターはナビゲーションガード（`beforeEach` および `afterEach` で宣言）を使用して以下の機能を提供します：

* `useSecurityStore` を通じて認証ステータスを確認し、未認証ユーザーを `/login` にリダイレクトする
* `useCidReqStore` を通じてコースコンテキストを確認する
* SPAナビゲーション中にページタイプのCSSクラスを適用する（Twigの `PageHelper` が完全なページ読み込みで行うことを代替）
* カスタムVueテンプレートのオーバーライドをサポートする — カスタムVueテンプレートが有効になっている場合（`var/vue_templates/pages/AppIndex.vue`）、`/` のエントリーコンポーネントがカスタムの `AppIndex.vue` に置き換えられる

---
## ビューの構成

ビューは `assets/vue/views/` 内に機能ごとに整理されています：

```
views/
├── account/          # ユーザープロフィールと設定
├── admin/            # 管理ページ
├── assignments/      # 課題の提出と評価
├── attendance/       # 出席簿
├── blog/             # ブログの投稿とコメント
├── branch/           # ネットワークキャンパスの管理
├── buycourses/       # コース購入のフロー
├── ccalendarevent/   # コースカレンダー
├── course/           # コース一覧、ホームページ、作成、カタログ
├── coursecategory/   # コースカテゴリーの管理
├── coursemaintenance/# コースのバックアップ/復元
├── ctoolintro/       # ツール紹介ページ
├── documents/        # ドキュメント一覧、作成、メディア生成
├── dropbox/          # Dropbox / ファイル交換
├── filemanager/      # ファイルブラウザ
├── glossary/         #  glossary 一覧と用語管理
├── links/            # 外部リンク
├── lp/               # 学習パスのプレイヤーとエディター
├── message/          # 受信トレイとメッセージ
├── page/             # CMSの静的ページ
├── pageLayout/       # ページレイアウトのラッパー
├── personalfile/     # 個人ファイルスペース
├── room/             # 仮想ルーム
├── sessionadmin/     # セッション管理
├── skill/            # スキルと能力
├── social/           # ソーシャルネットワーク
├── terms/            # 利用規約
├── user/             # ユーザー管理とコース/セッション一覧
├── usergroup/        # ユーザーグループ（クラス）
└── userreluser/      # ユーザー間の関係（友達/フォロワー）
```