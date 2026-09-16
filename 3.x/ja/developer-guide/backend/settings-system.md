# 設定システム

Chamilo の設定は、プラットフォームのあらゆる設定可能項目を定義する一連の設定スキーマ（リリースによって異なりますが、約 40 個）によって管理されます。これらは `src/CoreBundle/Settings/` に置かれており、そこにある正確な一覧が信頼できる情報源です。

## 仕組み

設定は次のように扱われます。

1. **定義** — スキーマクラス（`src/CoreBundle/Settings/*SettingsSchema.php`）
2. **保存** — データベース（`settings_current` テーブル）
3. **参照** — `SettingsManager` サービス経由
4. **管理** — 管理用 Web インターフェース経由

## 設定スキーマ

各スキーマファイルは設定のカテゴリを定義します。主なスキーマは次のとおりです。

| Schema | Purpose |
|--------|---------|
| `PlatformSettingsSchema` | 機関情報、タイムゾーン、サーバー種別、ポータル機能 |
| `SecuritySettingsSchema` | ログイン試行、CAPTCHA、パスワードポリシー、HTTP ヘッダー、2FA |
| `RegistrationSettingsSchema` | 自己登録、必須項目、自動登録 |
| `CourseSettingsSchema` | コース作成のデフォルト、ツール、カタログ |
| `SessionSettingsSchema` | セッションのデフォルト、可視性 |
| `MailSettingsSchema` | メール設定、DKIM、通知 |
| `AiHelpersSettingsSchema` | AI プロバイダー、AI ツールごとの機能トグル |
| `ExerciseSettingsSchema` | クイズの採点、フィードバック、設問オプション |
| `LearningPathSettingsSchema` | LP の表示、前提条件、SCORM 設定 |
| `DocumentSettingsSchema` | アップロード上限、許可ファイル種別、ストレージ |
| `DisplaySettingsSchema` | UI タブ、サイドバー項目、テーマ |
| `LanguageSettingsSchema` | 利用可能な言語、デフォルトロケール |
| `AdminSettingsSchema` | 管理者メール、管理者固有のオプション |

## 設定の参照

PHP コード内:

```php
// Via SettingsManager service
$value = $settingsManager->getSetting('platform.site_name');

// In legacy code
$value = api_get_setting('platform.site_name');
```

テンプレート内:

```twig
{# Read a single setting #}
{{ chamilo_settings_get('platform.site_name') }}

{# Check whether a setting exists #}
{% if chamilo_settings_has('platform.allow_registration') %}
    ...
{% endif %}

{# Get all settings as an array #}
{% set settings = chamilo_settings_all() %}
```

## 設定の構造

各設定は次の要素を持ちます。

* **Namespace** — スキーマのカテゴリ（例: `platform`、`security`、`ai_helpers`）
* **Variable** — 設定名（例: `site_name`、`allow_registration`）
* **Value** — 現在の値
* **Type** — データ型（string、boolean、array など）

## コースレベルの設定

一部の設定はコースレベルで上書きできます。これらは `src/CourseBundle/Settings/` で定義され、次を含みます。

* コースごとの演習設定
* コースごとの課題設定
* コースごとの AI 機能トグル

## マルチ URL 設定

マルチ URL 構成では、一部の設定をアクセス URL ごとにカスタマイズでき、同一インストールから異なるポータル構成を実現できます。

それらの設定は `settings` テーブルに、異なる `access_url` 値で複数回現れます。デフォルトでは、すべての設定は `access_url=1` に関連付けられます。

## 新しい設定の追加

1. 適切なスキーマクラスに設定定義を追加する
2. デフォルト値を指定する
3. 必要に応じてデータベースマイグレーションを実行する
4. `SettingsManager` 経由で設定にアクセスする