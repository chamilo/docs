# 用語集の設定

コースの **Glossary** ツールの動作です。

これらの設定には **Administration > Configuration settings > Glossary** からアクセスします。このカテゴリには **3 つの設定** が含まれており、プラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に同梱されているタイトルとコメントとともに以下に示します。

> コード内の変数名は等幅フォントで示されています。API 経由でスクリプトを実行する場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してこれらの設定をグローバルに変更する必要がある場合に使用してください。

## 設定

### `allow_remove_tags_in_glossary_export`

**用語集のエクスポート時に HTML タグを削除する**

有効にすると、エクスポート時に用語集の用語定義から HTML タグが削除されます。

*デフォルト: `false`*

### `default_glossary_view`

**用語集のデフォルト表示**

用語集ツールでデフォルトとして使用する表示（'table' または 'list'）を選択します。

*デフォルト: `table`*

### `show_glossary_in_extra_tools`

**追加ツールに用語集の用語を表示する**

ここから、ラーニングパスや演習ツールなどの追加ツールに用語集の用語を追加する方法を設定できます。