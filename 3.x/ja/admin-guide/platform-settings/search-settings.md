# 検索設定

全文検索システム（Xapian）の設定です。

これらの設定には **管理 > 設定 > 検索** からアクセスします。このカテゴリには **3 件の設定** があり、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に同梱されているタイトルとコメントとともに示します。

> コード上の変数名は等幅フォントで示しています。API 経由でスクリプトを書く場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してグローバルにこれらの設定を変更する必要がある場合に使用してください。

## 設定

### `search_enabled`

**全文検索機能**

この機能を有効にするには「はい」を選択してください。PHP 向けの Xapian 拡張に強く依存しているため、この拡張がサーバーにインストールされていない場合（最低でもバージョン 1.x）は動作しません。

*デフォルト: `false`*


### `search_prefilter_prefix`

**プリフィルター用の特定フィールド**

このオプションでは、プリフィルター検索タイプで使用する特定フィールドを選択できます。

### `search_show_unlinked_results`

**全文検索: リンクされていない結果を表示**

全文検索の結果を表示する際、現在のユーザーがアクセスできない結果をどのように扱うべきですか？

*デフォルト: `true`*