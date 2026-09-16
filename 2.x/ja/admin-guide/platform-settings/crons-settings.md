# クロンジョブ設定

Chamiloに同梱されているスケジュールされたジョブ（クロンタスク）の設定。

これらの設定には、**管理 > 設定 > クロンジョブ**からアクセスできます。このカテゴリには**3つの設定**が含まれており、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に記載されているタイトルとコメントとともにリストされています。

> コード内の変数名は等幅フォントで表示されています。APIを介してスクリプトを作成する場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml)を編集してこれらの設定をグローバルレベルで変更する必要がある場合に使用してください。

## 設定

### `cron_remind_course_expiration_activate`

**コース有効期限リマインダークロン**

コース有効期限リマインダークロンを有効にする

*デフォルト: `false`*

### `cron_remind_course_expiration_frequency`

**コース有効期限リマインダークロンの頻度**

リマインダーメールを送信する対象となる、コースの有効期限までの日数

### `cron_remind_course_finished_activate`

**コース終了通知の送信**

コース（セッション）が終了した際に学生にメールを送信するかどうか。この機能を利用するには、クロンタスクの設定が必要です（main/cron/ディレクトリを参照）。

*デフォルト: `false`*