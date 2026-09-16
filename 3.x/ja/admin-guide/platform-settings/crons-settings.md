# Cron Jobs Settings

Chamilo に同梱されているスケジュール済みジョブ（cron タスク）の設定です。

これらの設定には **管理 > 設定 > Cron Jobs** からアクセスします。このカテゴリには **5 つの設定** があり、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に含まれるタイトルとコメントとともに示します。

> コード上の変数名は等幅フォントで示しています。API 経由でスクリプトする場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してグローバルにこれらの設定を変更する必要がある場合に使用してください。

## Settings

### `cron_remind_course_expiration_activate`

**コース有効期限リマインド cron**

コース有効期限リマインド cron を有効にします

*デフォルト: `false`*

### `cron_remind_course_expiration_frequency`

**コース有効期限リマインド cron の頻度**

リマインダーメールを送信する対象とする、コース有効期限までの日数

### `cron_remind_course_finished_activate`

**コース完了通知の送信**

コース（セッション）が終了したときに受講者へメールを送信するかどうか。これには cron タスクの設定が必要です（main/cron/ ディレクトリを参照）。

*デフォルト: `false`*

### `cron_certificate_expiry_reminder_activate`

**証明書有効期限リマインダー cron**

`app:send-certificate-expiry-reminders` cron を有効にします。証明書の有効期限が切れた、またはまもなく切れる学習者にリマインドします。

*デフォルト: `false`*

### `cron_certificate_expiry_reminder_days`

**証明書有効期限リマインダーの期間（日）**

まもなく期限切れとなる証明書をスキャンするデフォルトの日数です。cron を `--days-ahead` 付きで実行しない限り使用されます。

*デフォルト: `30`*

## Certificate Expiry Reminders

成績表の証明書には有効期間（日数）を付与でき、成績表カテゴリごとに設定します — [証明書とスキル](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md) を参照してください。証明書に有効期限がある場合、Chamilo はその期限が近づいたとき（または過ぎたあと）に、メールと内部メッセージで学習者にリマインドできます。

上記の `cron_certificate_expiry_reminder_activate` を有効にしても *機能* がオンになるだけです。リマインダーの実際の送信はコンソールコマンドが行い、OS レベルでスケジュールする必要があります（例: `crontab`）。Chamilo は独自のバックグラウンドスケジューラを実行しません。

```bash
php bin/console app:send-certificate-expiry-reminders
```

有用なオプション:

| Option | Effect |
|--------|--------|
| `--days-ahead=N` | 有効期限の何日前までを対象にするか（デフォルトは `cron_certificate_expiry_reminder_days`） |
| `--force` | 実際にリマインダーを送信します。指定しない場合、コマンドは *送信するであろう* 内容を報告するだけです — cron に組み込む前の確認に安全に実行できます |
| `--resend` | すでに通知済みの証明書／有効期限の組み合わせについても再送信します |
| `--access-url-id=N` | スキャンを 1 つのポータルに制限します（マルチ URL インストール） |
| `--include-unsubscribed-users` | プラットフォームメールの購読を解除した学習者にも通知します |

教員は、この cron を必要とせずに同じリマインダーを手動で送信できます — [証明書とスキル](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) を参照してください。