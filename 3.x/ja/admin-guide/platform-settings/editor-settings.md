# エディター設定

プラットフォーム全体で使用されるリッチテキストエディター（TinyMCE）の設定 — ツールバー、プラグイン、エディター内の AI ヘルパー。

これらの設定には **管理 > 設定 > エディター** からアクセスします。このカテゴリには **26 件の設定** が含まれており、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に同梱されているタイトルとコメントとともに列挙します。

> コード上の変数名は等幅フォントで示しています。API 経由でスクリプトを書く場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してグローバルに変更する場合に使用してください。

## 設定

### `allow_email_editor`

**オンラインメールエディターを有効にする**

このオプションを有効にすると、メールアドレスをクリックしたときにオンラインエディターが開きます。

### `allow_spellcheck`

**スペルチェック**

スペルチェックを有効にする

### `block_copy_paste_for_students`

**学習者のコピー＆ペーストをブロックする**

WYSIWYG エディターへの学習者のコピー＆ペーストを禁止します

### `editor_block_image_copy_paste`

**WYSIWYG エディターでの画像のコピー＆ペーストを防止する**

エディター内で画像を base64 としてコピー＆ペーストすることを防ぎ、データベースが画像で肥大化するのを回避します。

*デフォルト: `false`*


### `editor_driver_list`

**WYSIWYG ファイルドライバーの一覧**

WYSIWYG エディターからのファイルアクセス用ドライバー名を含む配列。

### `editor_settings`

**WYSIWYG エディター設定**

WYSIWYG エディターをグローバルに再構成するための汎用設定配列。

### `enable_iframe_inclusion`

**HTML エディターで iframe を許可する**

HTML エディターで任意の iframe を許可するとユーザーの編集能力は向上しますが、セキュリティリスクになる可能性があります。この機能を有効にする前に、ユーザーを信頼できること（誰であるかを把握していること）を確認してください。

### `enable_uploadimage_editor`

**WYSIWYG エディターでの画像のドラッグ＆ドロップを許可する**

コンテンツへのコピー時、またはドラッグ＆ドロップ時に、画像をファイルとしてアップロードできるようにします。

*デフォルト: `false`*


### `enabled_asciisvg`

**AsciiSVG を有効にする**

WYSIWYG エディターで AsciiSVG プラグインを有効にし、数学関数からチャートを描画できるようにします。

### `enabled_googlemaps`

**Google マップを有効にする**

Google マップを挿入するボタンを有効にします。あらかじめファイル main/inc/lib/fckeditor/myconfig.php を編集し、Google マップ API キーを追加していない場合、有効化は完全には完了しません。

### `enabled_imgmap`

**イメージマップを有効にする**

イメージマップを挿入するボタンを有効にします。画像の領域に URL を関連付け、ホットスポットを作成できます。

### `enabled_insertHtml`

**ウィジェットの挿入を許可する**

Vimeo や SlideShare などのお気に入りの動画やアプリケーション、各種ウィジェットやガジェットをウェブページに埋め込めます

### `enabled_mathjax`

**MathJax を有効にする**

数式を表示するために MathJax ライブラリを有効にします。エディターツールバーに数式ボタンが追加され、数式は LaTeX で記述します。[数式](../../teacher-guide/adding-content/math-formulas.md) を参照してください。

### `enabled_support_svg`

**SVG ファイルの作成と編集**

このオプションにより、SVG（Scalable Vector Graphics）の多層ファイルをオンラインで作成・編集し、png 形式の画像に書き出せます。

### `enabled_wiris`

**WIRIS 数式エディター**

WIRIS 数式エディターを有効にします。このプラグインをインストールすると WIRIS エディターと WIRIS CAS が利用できます。<br/>この有効化は、あらかじめ <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>CKeditor 用 WIRIS の PHP プラグイン</a> をダウンロードし、その内容を Chamilo のディレクトリ main/inc/lib/javascript/ckeditor/plugins/ に展開していない場合、完全には完了しません。<br/>これは Wiris がプロプライエタリソフトウェアであり、そのサービスが <a href='http://www.wiris.com/store/who-pays' target='_blank'>商用</a> であるためです。プラグインを調整するには、configuration.ini ファイルを編集するか、Chamilo 同梱の configuration.ini.default の内容で置き換えてください。

### `force_wiki_paste_as_plain_text`

**Wiki でプレーンテキストとして貼り付けを強制する**

他のテキストからコピーされた多くの隠しタグ、不正または非標準のタグが、何度も問題を起こした後に Wiki のテキストを壊すのを防ぎます。ただし、編集時に一部の機能は失われます。

### `full_editor_toolbar_set`

**完全な WYSIWYG エディターツールバー**

プラットフォーム全体のすべての WYSIWYG エディターボックスで完全なツールバーを表示します。

*デフォルト: `false`*


### `htmlpurifier_wiki`

**Wiki での HTMLPurifier**

Wiki ツールで HTML purifier を有効にします（セキュリティは向上しますが、スタイル機能は減少します）

### `include_asciimathml_script`

**すべてのシステムページで Mathjax ライブラリを読み込む**

MathML ベースの数式および ASCIIsvg ベースの数学グラフィックを「ドキュメント」ツールだけでなく、システム内の他の場所でも表示したい場合に、この設定を有効にします。

### `math_asciimathML`

**ASCIIMathML 数式エディター**

ASCIIMathML 数式エディターを有効にする

### `more_buttons_maximized_mode`

**ボタンバーの拡張**

WYSIWYGエディターが最大化されているときに、拡張ボタンバーを有効にします

*デフォルト: `true`*

### `save_titles_as_html`

**タイトルをHTMLとして保存**

複数の場所のタイトル欄にHTMLを含められるようにします。これにより、特にテスト問題などでタイトルにスタイルを適用できます。また、これらの特定のタイトル欄では、下記の `translate_html` と同じ言語別タグ付けを利用できます。プレーンテキストのタイトルではこれを保持できません。

*デフォルト: `false`*

### `translate_html`

**多言語HTMLコンテンツのサポート**

有効にすると、HTML要素に ‘lang’ 属性を使い、その要素の内容がどの言語で書かれているかを定義できます。異なる ‘lang’ 属性を持つ複数の要素を用意すると、Chamiloはユーザーの言語の内容のみを表示します。

*デフォルト: `false`*

この機能の教師向けの詳細な手順については、教師ガイドの [多言語コンテンツ](../../teacher-guide/adding-content/multi-language-content.md) を参照してください。


### `video_context_menu_hidden`

**ビデオプレーヤーのコンテキストメニューを非表示**

有効にすると、HTML5ビデオプレーヤーの右クリックコンテキストメニューが無効になります。

*デフォルト: `false`*


### `video_player_renderers`

**ビデオプレーヤーレンダラー**

YouTube、Vimeo、Facebook、DailyMotion、Twitchのメディア向けプレーヤーレンダラーを有効にします

### `youtube_for_students`

**学習者がYouTubeから動画を挿入できるようにする**

学習者がYoutube動画を挿入できるようにします