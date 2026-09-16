# 証明書設定

成績簿から学習者が証明書を取得する際に適用されるデフォルト設定。

これらの設定には、**管理 > 設定 > 証明書** からアクセスできます。このカテゴリには **9つの設定** が含まれており、以下にプラットフォームの設定フィクスチャ (`SettingsCurrentFixtures.php`) に含まれるタイトルとコメントを記載しています。

> コード内の変数名は等幅フォントで表示されています。APIを通じてスクリプトを作成する場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してグローバルレベルでこれらの設定を変更する際に使用してください。

## 設定

### `add_certificate_pdf_footer`

**PDF証明書エクスポートにフッターを追加**

有効にすると、証明書のPDFエクスポートにフッターが追加されます。

*デフォルト: `false`*

### `allow_general_certificate`

**一般証明書を有効にする**

一般証明書は、ユーザーが受講したコースでのすべての成果をまとめた証明書です。

*デフォルト: `false`*

### `allow_public_certificates`

**公開証明書を許可する**

ユーザーの証明書を未登録のユーザーにも閲覧可能にします。

*デフォルト: `false`*

### `certificate_filter_by_official_code`

**公式コードによる証明書フィルター**

証明書リストに学生の公式コードに基づくフィルターを追加します。

*デフォルト: `false`*

### `certificate_pdf_orientation`

**証明書のPDF向き**

PDF証明書の向きを「portrait（縦）」または「landscape（横）」（技術用語）から設定します。

*デフォルト: `landscape`*

### `hide_certificate_export_link`

**証明書：すべてのユーザーに対してPDFエクスポートリンクを非表示にする**

有効にすると、すべてのユーザーに対して証明書をPDFにエクスポートする機能を完全に削除します（学生からも非表示になります）。

*デフォルト: `false`*

### `hide_certificate_export_link_students`

**証明書：学生からエクスポートリンクを非表示にする**

有効にすると、学生は自分の証明書をPDFにエクスポートできなくなります。このオプションは、証明書テンプレートのHTML構造によってはPDFエクスポートの品質が低くなる場合があるため用意されています。この場合、学生にはHTML証明書のみを表示するのが最適です。

*デフォルト: `false`*

### `hide_my_certificate_link`

**「マイ証明書」リンクを非表示にする**

管理者以外のユーザーに対して証明書ページを非表示にします。

*デフォルト: `false`*

### `session_admin_can_download_all_certificates`

**セッション管理者が非公開証明書をダウンロードすることを許可する**

有効にすると、セッション管理者は公開されていない証明書もダウンロードできるようになります。

*デフォルト: `false`*