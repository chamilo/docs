# 用語集設定

コースの**用語集**ツールの動作設定。

これらの設定には、**管理 > 設定 > 用語集**からアクセスできます。このカテゴリには**3つの設定**が含まれており、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に記載されているタイトルとコメントとともにリストアップされています。

> コード内の変数名は等幅フォントで表示されています。APIを通じてスクリプトを作成する場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml)を編集してこれらの設定をグローバルレベルで変更する必要がある場合に使用してください。

## 設定

### `allow_remove_tags_in_glossary_export`

**用語集エクスポート時にHTMLタグを削除**

有効にすると、用語集の用語定義からHTMLタグがエクスポート時に削除されます。

*デフォルト: `false`*

### `default_glossary_view`

**デフォルトの用語集表示**

用語集ツールでデフォルトとして使用される表示形式（'table' または 'list'）を選択します。

*デフォルト: `table`*

### `show_glossary_in_extra_tools`

**追加ツールで用語集の用語を表示**

ここから、学習パスや演習ツールなどの追加ツールに用語集の用語を追加する方法を設定できます。