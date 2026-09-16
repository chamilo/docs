# トラッキング設定

トラッキング関連の既定値 — 何を記録するか、どのレポートを公開するか、時間計算のルール。

これらの設定には **管理 > 設定 > トラッキング** からアクセスします。このカテゴリには **10 件の設定** があり、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に同梱されているタイトルとコメントとともに示します。

> コード上の変数名は等幅で示しています。API 経由でスクリプトする場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してグローバルに変更する場合に使用してください。

## 設定

### `block_my_progress_page`

**「マイ進捗」へのアクセスを禁止する**

オンライン試験などの特定の実装では、ユーザーが「マイ進捗」ページにアクセスできないようにしたい場合があります。

*既定値: `false`*

### `footer_extra_content`

**フッターの追加コンテンツ**

メタタグなどの HTML コードを追加できます

### `header_extra_content`

**ヘッダーの追加コンテンツ**

メタタグなどの HTML コードを追加できます

### `meta_description`

**メタ description**

サイトのヘッダーに OpenGraph Description メタ（og:description）を表示します

### `meta_image_path`

**メタ画像パス**

このメタ画像パスは、Chamilo ディレクトリ内のファイルへのパス（例: home/image.png）で、LMS へのリンクを表示する際に Twitter カードまたは OpenGraph カードに表示されます。Twitter は 120 x 120 ピクセルの画像を推奨しており、場合によっては 120x90 にトリミングされることがあります。

### `meta_title`

**OpenGraph メタ title**

サイトのヘッダーに OpenGraph Title メタ（og:title）を表示します

### `meta_twitter_creator`

**Twitter Creator アカウント**

Twitter Creator は、サイトを作成した*個人*を表す Twitter アカウント（例: @ywarnier）です。このフィールドは任意です。

### `meta_twitter_site`

**Twitter Site アカウント**

Twitter site は、サイトに関連する Twitter アカウント（例: @chamilo_news）です。通常、Twitter creator アカウントよりも一時的なアカウントであるか、個人ではなく組織を表します。Twitter カードのメタフィールドを表示するには、このフィールドが必須です。

### `my_progress_course_tools_order`

**「マイ進捗」ページのツールの順序**

学習者向け「マイ進捗」ページに表示されるツールの順序を変更します。オプションには 'quizzes'、'learning_paths'、'skills' があります。

### `tracking_skip_generic_data`

**学習者の自己トラッキングページで汎用データをスキップする**

「マイ進捗」ページの読み込みに時間がかかりすぎる場合、ユーザー向けの汎用統計の処理を省略できます。その場合はこの設定を有効にしてください。

*既定値: `false`*