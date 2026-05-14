# エディター設定

プラットフォーム全体で使用されるリッチテキストエディター（TinyMCE）の設定 — ツールバー、プラグイン、エディター内のAIヘルパー。

これらの設定には **管理 > 設定 > エディター** からアクセスできます。このカテゴリには **26の設定** が含まれており、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に含まれるタイトルとコメントを記載しています。

> コード内の変数名は等幅フォントで表示されています。APIを通じてスクリプトを作成する場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してこれらの設定をグローバルレベルで変更する必要がある場合に使用してください。

## 設定

### `allow_email_editor`

**オンラインEメールエディターの有効化**

このオプションを有効にすると、Eメールアドレスをクリックした際にオンラインエディターが開きます。

### `allow_spellcheck`

**スペルチェック**

スペルチェックを有効にする

### `block_copy_paste_for_students`

**学習者のコピー＆ペーストをブロック**

学習者がWYSIWYGエディターでコピー＆ペーストする機能をブロックする

### `editor_block_image_copy_paste`

**WYSIWYGエディターでの画像のコピー＆ペーストを防止**

エディター内で画像をbase64としてコピー＆ペーストする使用を防止し、データベースが画像で埋まるのを防ぐ。

*デフォルト: `false`*

### `editor_driver_list`

**WYSIWYGファイルドライバーのリスト**

WYSIWYGエディターからファイルにアクセスするためのドライバーの名前を含む配列。

### `editor_settings`

**WYSIWYGエディター設定**

WYSIWYGエディターをグローバルに再設定するための汎用設定配列。

### `enable_iframe_inclusion`

**HTMLエディターでのiframeの許可**

HTMLエディターで任意のiframeを許可すると、ユーザーの編集機能が向上しますが、セキュリティリスクを伴う可能性があります。この機能を有効にする前に、ユーザーが信頼できる（つまり、誰であるかを把握している）ことを確認してください。

### `enable_uploadimage_editor`

**WYSIWYGエディターでの画像のドラッグ＆ドロップを許可**

コンテンツ内でのコピーやドラッグ＆ドロップ時に画像をファイルとしてアップロードする機能を有効にする。

*デフォルト: `false`*

### `enabled_asciisvg`

**AsciiSVGの有効化**

WYSIWYGエディターでAsciiSVGプラグインを有効にし、数学関数からグラフを描画する。

### `enabled_googlemaps`

**Googleマップの有効化**

Googleマップを挿入するボタンを有効にする。事前にファイル main/inc/lib/fckeditor/myconfig.php を編集し、GoogleマップAPIキーを追加していない場合は、完全な有効化は実現されません。

### `enabled_imgmap`

**イメージマップの有効化**

イメージマップを挿入するボタンを有効にする。これにより、画像の特定の領域にURLを関連付け、ホットスポットを作成できます。

### `enabled_insertHtml`

**ウィジェットの挿入を許可**

これにより、VimeoやSlideShareなどのお気に入りの動画やアプリケーション、さまざまなウィジェットやガジェットをウェブページに埋め込むことができます。

### `enabled_mathjax`

**MathJaxの有効化**

数学的な式を視覚化するためにMathJaxライブラリを有効にする。これはASCIIMathMLまたはASCIISVG設定のいずれかが有効になっている場合にのみ有用です。

### `enabled_support_svg`

**SVGファイルの作成と編集**

このオプションを使用すると、SVG（スケーラブルベクターグラフィックス）の多層ファイルをオンラインで作成および編集し、PNG形式の画像としてエクスポートすることができます。

### `enabled_wiris`

**WIRIS数学エディター**

WIRIS数学エディターを有効にする。このプラグインをインストールすると、WIRISエディターとWIRIS CASが利用可能になります。<br/>この有効化は、事前に<a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>CKeditor用のWIRIS PHPプラグイン</a>をダウンロードし、Chamiloのディレクトリ main/inc/lib/javascript/ckeditor/plugins/ にその内容を解凍していない限り、完全には実現されません。<br/>これはWirisがプロプライエタリソフトウェアであり、そのサービスが<a href='http://www.wiris.com/store/who-pays' target='_blank'>商用</a>であるため必要です。プラグインの調整を行うには、configuration.iniファイルを編集するか、Chamiloに同梱されているconfiguration.ini.defaultファイルの内容に置き換えてください。

### `force_wiki_paste_as_plain_text`

**Wikiでのプレーンテキストとしての貼り付けを強制**

これにより、他のテキストからコピーされた多くの隠しタグや不正確または非標準のタグがWikiのテキストを破壊するのを防ぎますが、編集時の一部の機能が失われます。

### `full_editor_toolbar_set`

**完全なWYSIWYGエディターツールバー**

プラットフォーム全体のすべてのWYSIWYGエディターボックスで完全なツールバーを表示する。

*デフォルト: `false`*

### `htmlpurifier_wiki`

**WikiでのHTMLPurifier**

WikiツールでHTML purifierを有効にする（セキュリティが向上しますが、スタイル機能が減少します）

### `include_asciimathml_script`

**システムのすべてのページでMathJaxライブラリを読み込む**

MathMLベースの数学式やASCIIsvgベースの数学グラフィックを「ドキュメント」ツールだけでなく、システムの他の場所でも表示したい場合にこの設定を有効にしてください。

### `math_asciimathML`

**ASCIIMathML数学エディター**

ASCIIMathML数学エディターを有効にする

### `more_buttons_maximized_mode`

**ボタンバーの拡張**

WYSIWYGエディターが最大化されているときにボタンバーを拡張する機能を有効にする

*デフォルト: `true`*

---
### `save_titles_as_html`

**タイトルをHTMLとして保存**

ユーザーがいくつかの場所でタイトルフィールドにHTMLを含めることを許可します。これにより、特にテストの質問などでタイトルのスタイルをある程度設定することができます。

*デフォルト: `false`*

### `translate_html`

**多言語HTMLコンテンツのサポート**

有効にすると、このオプションはユーザーがHTML要素に‘lang’属性を使用して、その要素のコンテンツが書かれている言語を定義することを許可します。異なる‘lang’属性を持つ複数の要素を有効にすると、Chamiloはユーザーの言語でのみコンテンツを表示します。

*デフォルト: `false`*

### `video_context_menu_hidden`

**ビデオプレーヤーのコンテキストメニューを非表示にする**

有効にすると、HTML5ビデオプレーヤーでの右クリックコンテキストメニューが無効になります。

*デフォルト: `false`*

### `video_player_renderers`

**ビデオプレーヤーレンダラー**

YouTube、Vimeo、Facebook、DailyMotion、Twitchメディア用のプレーヤーレンダラーを有効にします。

### `youtube_for_students`

**学習者がYouTubeからビデオを挿入することを許可する**

学習者がYouTubeビデオを挿入できる可能性を有効にします。