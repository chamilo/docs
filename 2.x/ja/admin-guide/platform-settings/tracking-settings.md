# トラッキング設定

トラッキング関連のデフォルト設定 — 記録される内容、公開されるレポート、時間計算ルール。

これらの設定には **管理 > 設定 > トラッキング** からアクセスできます。このカテゴリには **10個の設定** が含まれており、以下にプラットフォームの設定フィクスチャ (`SettingsCurrentFixtures.php`) に含まれるタイトルとコメントを記載しています。

> コード内の変数名は等幅フォントで表示されています。APIを通じてスクリプトを作成する場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してこれらの設定をグローバルレベルで変更する必要がある場合に使用してください。

## 設定

### `block_my_progress_page`

**「マイプログレス」ページへのアクセスを防止**

オンライン試験などの特定の実施形態では、ユーザーが「マイプログレス」ページにアクセスできないようにしたい場合があります。

*デフォルト: `false`*

### `footer_extra_content`

**フッターに追加するコンテンツ**

メタタグなどのHTMLコードを追加できます。

### `header_extra_content`

**ヘッダーに追加するコンテンツ**

メタタグなどのHTMLコードを追加できます。

### `meta_description`

**メタ記述**

サイトのヘッダーにOpenGraph Descriptionメタタグ (og:description) が表示されます。

### `meta_image_path`

**メタ画像パス**

このメタ画像パスは、Chamiloディレクトリ内にあるファイル（例: home/image.png）へのパスで、LMSへのリンクを表示する際にTwitterカードやOpenGraphカードに表示されるべきものです。Twitterは120 x 120ピクセルの画像を推奨しており、場合によっては120x90にトリミングされることがあります。

### `meta_title`

**OpenGraphメタタイトル**

サイトのヘッダーにOpenGraph Titleメタタグ (og:title) が表示されます。

### `meta_twitter_creator`

**Twitterクリエイターアカウント**

Twitterクリエイターは、サイトを作成した*個人*を表すTwitterアカウント（例: @ywarnier）です。このフィールドは任意です。

### `meta_twitter_site`

**Twitterサイトアカウント**

Twitterサイトは、サイトに関連するTwitterアカウント（例: @chamilo_news）です。通常、Twitterクリエイターアカウントよりも一時的なアカウントであるか、個人ではなくエンティティを表します。Twitterカードのメタフィールドを表示させたい場合は、このフィールドが必須です。

### `my_progress_course_tools_order`

**「マイプログレス」ページのツールの順序**

学習者の「マイプログレス」ページに表示されるツールの順序を変更します。オプションには 'quizzes'、'learning_paths'、'skills' があります。

### `tracking_skip_generic_data`

**学習者の自己トラッキングページで汎用データをスキップ**

「マイプログレス」ページの読み込みに時間がかかりすぎる場合、ユーザーの汎用統計情報の処理を削除したいことがあります。その場合はこの設定を有効にしてください。

*デフォルト: `false`*