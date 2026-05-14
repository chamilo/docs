# 表示設定

プラットフォームがユーザーにどのように表示されるか — ホームページのレイアウト、Gravatar、メニュー、ブランディングの動作、その他の視覚的な設定。

これらの設定には **管理 > 設定 > 表示** からアクセスできます。このカテゴリには **24の設定** が含まれており、以下にプラットフォームの設定フィクスチャ (`SettingsCurrentFixtures.php`) に含まれるタイトルとコメントを記載しています。

> コード内の変数名は等幅フォントで表示されています。APIを通じてスクリプトを作成する場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してこれらの設定をグローバルレベルで変更する必要がある場合に使用してください。

## 設定

### `accessibility_font_resize`

**フォントサイズ変更のアクセシビリティ機能**

このオプションを有効にすると、キャンパスの右上部にフォントサイズ変更のオプションが表示されます。これにより、視覚障害を持つユーザーがコース内容をより簡単に読むことができます。

*デフォルト: `false`*

### `display_categories_on_homepage`

**ホームページにカテゴリを表示**

このオプションは、ポータルのホームページにコースカテゴリを表示または非表示にします。

*デフォルト: `false`*

### `enable_help_link`

**ヘルプリンクを有効にする**

ヘルプリンクは画面の右上部に位置しています。

*デフォルト: `true`*

### `gravatar_enabled`

**Gravatarユーザーの写真**

このオプションを有効にすると、ユーザーがローカルで写真を設定していない場合、Gravatarリポジトリから現在のユーザーの写真を検索します。これは、特にユーザーがアクティブなインターネットユーザーである場合、サイトに写真を自動的に入力するのに便利です。Gravatarの写真は、ユーザーのメールアドレスに基づいて簡単に設定できます。詳細は http://en.gravatar.com/ を参照してください。

*デフォルト: `false`*

### `gravatar_type`

**Gravatarアバターの種類**

Gravatarオプションが有効で、ユーザーがGravatarに写真を設定していない場合、このオプションを使用してGravatarが各ユーザーに生成するアバターの種類を選択できます。アバターの種類の例については、<a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a> を確認してください。

*デフォルト: `mm`*

### `hide_complete_name_in_whoisonline`

**「オンライン中のユーザー」で完全なユーザー名を非表示にする**

「オンライン中のユーザー」ページ（有効な場合）では、現在オンライン中の各ユーザーの写真と名前が表示されます。このオプションを有効にすると名前を非表示にします。

*デフォルト: `false`*

### `hide_logout_button`

**ログアウトボタンを非表示にする**

ログアウトボタンを非表示にします。これは通常、外部のログイン/ログアウト方法（例：シングルサインオンのようなもの）を使用する場合にのみ有用です。

*デフォルト: `false`*

### `hide_main_navigation_menu`

**メインナビゲーションメニューを非表示にする**

Chamiloを特定の目的（大規模なオンライン試験など）で使用する場合、サイドメニューを削除することでさらに気を散らす要素を減らすことができます。

*デフォルト: `false`*

### `hide_social_media_links`

**ソーシャルメディアリンクを非表示にする**

一部のページでは、ポータルやコースをソーシャルネットワークで宣伝することができます。この設定を有効にするとリンクが削除されます。

*デフォルト: `false`*

### `order_user_list_by_official_code`

**公式コードでユーザーを並べ替える**

プラットフォーム上のほとんどの学生リストを、姓や名前の代わりに「公式コード」で並べ替えます。

*デフォルト: `false`*

### `pdf_logo_header`

**PDFヘッダーロゴ**

すべてのPDFエクスポートで、通常のポータルロゴの代わりに var/themes/[your-theme]/images/pdf_logo_header.png の画像をPDFヘッダーロゴとして使用するかどうか。

### `show_admin_toolbar`

**管理者ツールバーを表示**

指定されたユーザーロールに対してページの上部にグローバルツールバーを表示します。このツールバーは、WordpressやGoogleの黒いツールバーに非常に似ており、複雑な操作を迅速化し、学習コンテンツのためのスペースを増やすことができますが、一部のユーザーにとっては混乱を招く可能性があります。

*デフォルト: `do_not_show`*

### `show_back_link_on_top_of_tree`

**カテゴリ/コースからの戻るリンクを表示**

コース階層に戻るリンクを表示します。リストの下部には常にリンクが用意されています。

*デフォルト: `false`*

### `show_closed_courses`

**ログインページとポータル開始ページに終了したコースを表示する？**

ログインページとコース開始ページに終了したコースを表示しますか？ポータル開始ページでは、コースの横にアイコンが表示され、各コースに素早く登録できます。これは、ユーザーがログインしており、ポータルにまだ登録していない場合にのみポータルの開始ページに表示されます。

*デフォルト: `false`*

### `show_email_addresses`

**メールアドレスを表示**

ユーザーにメールアドレスを表示します。

*デフォルト: `false`*

### `show_empty_course_categories`

**空のコースカテゴリを表示**

ホームページにコースのカテゴリを表示します。空の場合でも表示されます。

*デフォルト: `true`*

### `show_hot_courses`

**人気コースを表示**

人気コースリストがインデックスページに追加されます。

*デフォルト: `true`*

### `show_number_of_courses`

**コース数を表示**

ホームページのコースカテゴリに各カテゴリのコース数を表示します。

*デフォルト: `false`*

---
### `show_tabs`

**メインメニューエントリー**

メインメニューに表示したいエントリーにチェックを入れてください。

*デフォルト:*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**ロールごとのメインメニューエントリー**

ロールごとにヘッダータブの表示設定を定義します。

*デフォルト: `{}`*

### `showonline`

**オンライン中のユーザー**

オンライン中の人数を表示しますか？

*デフォルト: `world`*

### `table_default_row`

**テーブルのデフォルト行数**

すべてのテーブルでデフォルトで表示する行数を設定します。

*デフォルト: `20`*

### `table_row_list`

**テーブルで提供されるデフォルトのページネーション数**

1ページに表示する行数を増減させるために、テーブルのナビゲーションに表示するオプションを設定します。例: [50, 100, 200, 500]。

*デフォルト: `[10,20,50,100]`*

### `time_limit_whosonline`

**オンライン中のユーザーの時間制限**

最後のアクションから何分間、ユーザーを「オンライン」とみなすかを定義する時間制限です。

*デフォルト: `30`*