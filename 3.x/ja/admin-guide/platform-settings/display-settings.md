# 表示設定

プラットフォームがユーザーにどのように表示されるか — ホームページのレイアウト、gravatar、メニュー、ブランディングの動作、および類似の視覚的な設定です。

これらの設定には **管理 > 設定 > 表示** からアクセスします。このカテゴリには **28 件の設定** が含まれており、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に同梱されているタイトルとコメントとともに記載します。

> コード上の変数名は等幅で示しています。API 経由でスクリプトを書く場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してグローバルにこれらの設定を変更する必要がある場合に使用してください。

## 設定

### `accessibility_font_resize`

**フォントサイズ変更のアクセシビリティ機能**

このオプションを有効にすると、キャンパスの右上にフォントサイズ変更オプションのセットが表示されます。視覚に障害のあるユーザーがコース内容をより読みやすくなります。

*デフォルト: `false`*

### `display_categories_on_homepage`

**ホームページにカテゴリを表示**

このオプションは、ポータルのホームページ上でコースカテゴリを表示または非表示にします

*デフォルト: `false`*

### `enable_help_link`

**ヘルプリンクを有効化**

ヘルプリンクは画面の右上に配置されます

*デフォルト: `true`*

### `gravatar_enabled`

**Gravatar のユーザー画像**

このオプションを有効にすると、ユーザーがローカルで画像を定義していない場合、現在のユーザーの画像を Gravatar リポジトリから検索します。特にユーザーがインターネットを活発に利用している場合、サイト上の画像を自動入力するのに便利です。Gravatar の画像は、ユーザーのメールアドレスに基づいて http://en.gravatar.com/ で簡単に設定できます。

*デフォルト: `false`*

### `gravatar_type`

**Gravatar アバターの種類**

Gravatar オプションが有効で、ユーザーが Gravatar 上に画像を設定していない場合、このオプションで Gravatar が各ユーザーに生成するアバターの種類を選択できます。アバターの種類の例は <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a> を確認してください。

*デフォルト: `mm`*

### `hide_complete_name_in_whoisonline`

**「オンラインのユーザー」で完全なユーザー名を非表示**

「オンラインのユーザー」ページ（有効な場合）は、現在オンラインの各ユーザーについて画像と名前を表示します。このオプションを有効にすると名前が非表示になります。

*デフォルト: `false`*

### `hide_home_top_when_connected` **v3**

**ログイン時にホームページの上部コンテンツを非表示**

プラットフォームのホームページで、このオプションにより、すでにログインしているすべてのユーザーに対して導入ブロックを非表示にできます（例: お知らせのみを残す）。一般的な導入ブロックは、まだログインしていないユーザーには引き続き表示されます。

*デフォルト: `false`*

### `hide_logout_button`

**ログアウトボタンを非表示**

ログアウトボタンを非表示にします。通常、外部のログイン／ログアウト方式を使用する場合、たとえば何らかのシングルサインオンを使用する場合にのみ有用です。

*デフォルト: `false`*

### `hide_main_navigation_menu`

**メインナビゲーションメニューを非表示**

特定の目的（大規模なオンライン試験など）で Chamilo を使用する場合、サイドメニューを削除してさらに注意散漫を減らしたいことがあります。

*デフォルト: `false`*

### `hide_social_media_links`

**ソーシャルメディアリンクを非表示**

一部のページでは、ソーシャルネットワーク上でポータルやコースを宣伝できます。この設定を有効にするとリンクが削除されます。

*デフォルト: `false`*

### `order_user_list_by_official_code`

**公式コードでユーザーを並べ替え**

プラットフォーム上のほとんどの学生リストを、姓や名ではなく「公式コード」で並べ替えます。

*デフォルト: `false`*

### `pdf_logo_header`

**PDF ヘッダーロゴ**

すべての PDF エクスポートで、通常のポータルロゴの代わりに var/themes/[your-theme]/images/pdf_logo_header.png の画像を PDF ヘッダーロゴとして使用するかどうか

### `show_admin_toolbar`

**管理者ツールバーを表示**

指定したユーザーロールに対して、ページ上部にグローバルなツールバーを表示します。このツールバーは Wordpress や Google の黒いツールバーに非常によく似ており、複雑な操作を大幅に高速化し、学習コンテンツに使えるスペースを広げられますが、一部のユーザーには分かりにくいかもしれません

*デフォルト: `do_not_show`*

### `show_administrator_data` **v3**

**フッターにプラットフォーム管理者情報**

フッターにプラットフォーム管理者の情報を表示しますか？

*デフォルト: `true`*

### `show_back_link_on_top_of_tree`

**カテゴリ／コースからの戻るリンクを表示**

コース階層を戻るリンクを表示します。リストの下部にはいずれにせよリンクがあります。

*デフォルト: `false`*

### `show_closed_courses`

**ログインページとポータル開始ページに非公開コースを表示しますか？**

ログインページとコース開始ページに非公開コースを表示しますか？ ポータル開始ページでは、各コースにすばやく登録できるよう、コースの横にアイコンが表示されます。これは、ユーザーがログインしており、かつまだポータルに登録していない場合にのみ、ポータルの開始ページに表示されます。

*デフォルト: `false`*

### `show_email_addresses`

**メールアドレスを表示**

ユーザーにメールアドレスを表示する

*Default: `false`*

### `show_empty_course_categories`

**空のコースカテゴリを表示**

ホームページ上のコースカテゴリを、空であっても表示する

*Default: `true`*

### `show_hot_courses`

**人気コースを表示**

人気コースのリストがインデックスページに追加されます

*Default: `true`*

### `show_number_of_courses`

**コース数を表示**

ホームページのコースカテゴリに、各カテゴリのコース数を表示する

*Default: `false`*

### `show_tabs`

**メインメニュー項目**

メインメニューに表示したい項目を選択してください

*Default:*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**ロール別メインメニュー項目**

ロールごとにヘッダーのタブの表示／非表示を定義します。

*Default: `{}`*

### `show_teacher_data` **v3**

**フッターに講師情報を表示**

フッターに講師の参照情報（氏名および、利用可能な場合はメールアドレス）を表示しますか？

*Default: `true`*

### `show_tutor_data` **v3**

**セッションのチューター情報をフッターに表示します。**

フッターにセッションのチューターの参照情報（氏名および、利用可能な場合はメールアドレス）を表示しますか？

*Default: `true`*

### `showonline`

**オンラインユーザー**

オンライン中の人数を表示しますか？

*Default: `world`*

### `table_default_row`

**テーブルのデフォルト行数**

すべてのテーブルでデフォルトとして表示する行数。

*Default: `20`*

### `table_row_list`

**テーブルのページネーション選択肢**

テーブル周辺のナビゲーションに表示する、1ページあたりの行数の選択肢を設定します。例: [50, 100, 200, 500]。

*Default: `[10,20,50,100]`*

### `time_limit_whosonline`

**オンラインユーザーの時間制限**

この時間制限は、最後の操作から何分後までユーザーを*オンライン*とみなすかを定義します

*Default: `30`*