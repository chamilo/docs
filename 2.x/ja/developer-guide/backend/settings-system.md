# 設定システム

Chamiloの設定は、プラットフォームのあらゆる設定可能な側面を定義する一連の設定スキーマ（リリースによって異なる約40個）を通じて管理されています。これらは `src/CoreBundle/Settings/` に存在し、そこにある正確なリストが真実の情報源です。

## 仕組み

設定は以下の通りです：

1. スキーマクラス（`src/CoreBundle/Settings/*SettingsSchema.php`）で**定義**される
2. データベース（`settings_current` テーブル）に**保存**される
3. `SettingsManager` サービスを通じて**アクセス**される
4. 管理ウェブインターフェースを通じて**管理**される

## 設定スキーマ

各スキーマファイルは設定のカテゴリを定義します。主なスキーマは以下の通りです：

| スキーマ | 目的 |
|--------|---------|
| `PlatformSettingsSchema` | 機関情報、タイムゾーン、サーバータイプ、ポータル機能 |
| `SecuritySettingsSchema` | ログイン試行回数、CAPTCHA、パスワードポリシー、HTTPヘッダー、2FA |
| `RegistrationSettingsSchema` | 自己登録、必須フィールド、自動購読 |
| `CourseSettingsSchema` | コース作成のデフォルト、ツール、カタログ |
| `SessionSettingsSchema` | セッションのデフォルト、表示設定 |
| `MailSettingsSchema` | メール設定、DKIM、通知 |
| `AiHelpersSettingsSchema` | AIプロバイダ、AIツールごとの機能トグル |
| `ExerciseSettingsSchema` | クイズの採点、フィードバック、質問オプション |
| `LearningPathSettingsSchema` | 学習パスの表示、前提条件、SCORM設定 |
| `DocumentSettingsSchema` | アップロード制限、許可されるファイルタイプ、ストレージ |
| `DisplaySettingsSchema` | UIタブ、サイドバー項目、テーマ |
| `LanguageSettingsSchema` | 利用可能な言語、デフォルトのロケール |
| `AdminSettingsSchema` | 管理者メール、管理者固有のオプション |

## 設定へのアクセス

PHPコード内では：

```php
// SettingsManagerサービス経由
$value = $settingsManager->getSetting('platform.site_name');

// 従来のコードでは
$value = api_get_setting('platform.site_name');
```

テンプレート内では：

```twig
{# 単一の設定を読み込む #}
{{ chamilo_settings_get('platform.site_name') }}

{# 設定が存在するかどうかを確認する #}
{% if chamilo_settings_has('platform.allow_registration') %}
    ...
{% endif %}

{# すべての設定を配列として取得する #}
{% set settings = chamilo_settings_all() %}
```

## 設定の構造

各設定には以下の要素があります：

* **名前空間** — スキーマカテゴリ（例：`platform`、`security`、`ai_helpers`）
* **変数** — 設定名（例：`site_name`、`allow_registration`）
* **値** — 現在の値
* **タイプ** — データ型（文字列、ブール値、配列など）

## コースレベルの設定

一部の設定はコースレベルで上書き可能です。これらは `src/CourseBundle/Settings/` に定義されており、以下が含まれます：

* コースごとの演習設定
* コースごとの課題設定
* コースごとのAI機能トグル

## マルチURL設定

マルチURL設定では、一部の設定をアクセスURLごとにカスタマイズでき、同じインストールから異なるポータル設定を可能にします。

これらの設定は `settings` テーブルに複数回表示され、異なる `access_url` 値が関連付けられます。デフォルトでは、すべての設定は `access_url=1` に関連付けられています。

## 新しい設定の追加

1. 適切なスキーマクラスに設定定義を追加する
2. デフォルト値を指定する
3. 必要に応じてデータベースマイグレーションを実行する
4. `SettingsManager` を通じて設定にアクセスする