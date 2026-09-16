# アジェンダ設定

**アジェンダ**ツール（カレンダー／イベント）の既定値と動作です。

これらの設定には **管理 > 設定 > アジェンダ** からアクセスします。このカテゴリには **11 件の設定** があり、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に同梱されているタイトルとコメントを示します。

> コード上の変数名は等幅フォントで示しています。API 経由でスクリプトする場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してグローバルに変更する場合に使用してください。

## 設定

### `agenda_colors`

**アジェンダの色**

各イベント種別の HTML カラーコードを設定し、イベント表示時の色を変更します。

### `agenda_legend`

**アジェンダの色凡例**

イベントに使用する色を説明する短い凡例テキストを追加します。

### `agenda_on_hover_info`

**アジェンダのホバー情報**

カーソルを重ねたときのアジェンダ表示をカスタマイズします。アジェンダのコメントおよび／または説明を表示します。

### `agenda_reminders_sender_id`

**アジェンダリマインダーを公式に送信するユーザーの ID**

アジェンダリマインダーメールの送信者として表示されるユーザーを設定します。

*既定値: `0`*

### `allow_agenda_edit_for_hrm`

**HRM ロールにアジェンダイベントの編集または削除を許可する**

コースセッション内のアジェンダイベントの編集／削除を許可することで、HRM にやや広い権限を与えます。

*既定値: `false`*

### `allow_careers_in_global_agenda`

**グローバルカレンダーイベントをキャリアおよびプロモーションと関連付ける**

有効にすると、グローバルカレンダーイベントをキャリアおよびプロモーションと関連付け、対象を絞ったスケジュール設定が可能になります。

*既定値: `false`*

### `allow_personal_agenda`

**個人アジェンダ**

学習者はアジェンダに個人イベントを追加できますか？

*既定値: `true`*

### `default_calendar_view`

**カレンダーの既定表示モード**

カレンダーの既定ビューを変更するには、dayGridMonth、basicWeek、agendaWeek、または agendaDay に設定します。

*既定値: `month`*

### `fullcalendar_settings`

**カレンダーのカスタマイズ**

アジェンダ向けの追加設定で、使用している特定のカレンダーライブラリを構成できます。

### `personal_agenda_show_all_session_events`

**個人アジェンダにすべてのアジェンダイベントを表示する**

期限切れセッションのイベントを非表示にしません。

*既定値: `false`*

### `personal_calendar_show_sessions_occupation`

**個人アジェンダにセッションの占用を表示する**

有効にすると、セッションのスケジュールと占用がユーザーの個人カレンダーに表示されます。

*既定値: `false`*