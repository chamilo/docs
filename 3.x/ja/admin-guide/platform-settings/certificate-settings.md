# 証明書の設定

成績表から学習者が証明書を取得した際に適用されるデフォルトです。

これらの設定には **管理 > 設定 > 証明書** からアクセスします。このカテゴリには **11 件の設定** が含まれ、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に同梱されているタイトルとコメントとともに示します。

> コード上の変数名は等幅フォントで示しています。API 経由でスクリプトする場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してグローバルに変更する場合に使用してください。

## 設定

### `add_certificate_pdf_footer`

**PDF 証明書エクスポートにフッターを追加**

有効にすると、証明書の PDF エクスポートにフッターが追加されます。

*デフォルト: `false`*

### `add_gradebook_certificates_cron_task_enabled` **v3**

**WS 呼び出し時の証明書自動生成**

有効にし、WSCertificatesList ウェブサービスを使用している場合、すべてのコースおよびセッションの成績表で定義された全項目で十分な得点に達したユーザーについて、すべての証明書が生成済みであることを保証します（サーバー上で相当な処理リソースを消費する可能性があります）。

*デフォルト: `false`*

### `allow_certificates_search` **v3**

**証明書検索を許可**

ユーザーおよび訪問者が、上部バーメニューから生成済み証明書を検索できるようにします。

*デフォルト: `false`*

### `allow_general_certificate`

**総合証明書を有効化**

総合証明書は、ユーザーが受講したコースにおけるすべての成果をまとめた証明書です。

*デフォルト: `false`*

### `allow_public_certificates`

**公開証明書を許可**

未登録ユーザーがユーザーの証明書を閲覧できます。

*デフォルト: `false`*

### `certificate_filter_by_official_code`

**公式コードによる証明書のフィルタ**

証明書一覧に、学生の公式コードによるフィルタを追加します。

*デフォルト: `false`*

### `certificate_pdf_orientation`

**証明書の PDF 向き**

PDF 証明書の向きを ‘portrait’ または ‘landscape’（技術用語）に設定します。

*デフォルト: `landscape`*

### `hide_certificate_export_link`

**証明書: 全員向けに PDF エクスポートリンクを非表示**

有効にすると、証明書を PDF にエクスポートする機能を完全に削除します（全ユーザー対象）。有効な場合、学生からも非表示になります。

*デフォルト: `false`*

### `hide_certificate_export_link_students`

**証明書: 学生からエクスポートリンクを非表示**

有効にすると、学生は証明書を PDF にエクスポートできなくなります。このオプションがあるのは、証明書テンプレートの HTML 構造によっては PDF エクスポートの品質が低くなる場合があるためです。その場合、学生には HTML 証明書のみを表示するのが適切です。

*デフォルト: `false`*

### `hide_my_certificate_link`

**「マイ証明書」リンクを非表示**

管理者以外のユーザー向けに証明書ページを非表示にします。

*デフォルト: `false`*

### `session_admin_can_download_all_certificates`

**セッション管理者が非公開証明書をダウンロードできるようにする**

有効にすると、セッション管理者は公開されていない証明書でもダウンロードできます。

*デフォルト: `false`*

## 関連項目

証明書には有効期間と有効期限を設定でき、自動または手動の期限切れリマインダーも利用できます。これはここでは設定しません。有効期間は教師向けの成績表設定であり、リマインダー cron のオン／オフは **Cron ジョブ** カテゴリにあります。[証明書とスキル](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) および [Cron ジョブの設定](crons-settings.md#certificate-expiry-reminders) を参照してください。