# 出席設定

**出席**ツールのデフォルトと動作です。

これらの設定は **管理 > 設定 > 出席** からアクセスします。このカテゴリには **5 件の設定** があり、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に同梱されているタイトルとコメントとともに示します。

> コード上の変数名は等幅で示しています。API 経由でスクリプトする場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してグローバルに変更する場合に使用してください。

## 設定

### `allow_delete_attendance`

**出席: 削除を有効化**

Chamilo のデフォルト動作は、教師が誤って削除してしまう場合に備えて、出席シートを削除せずに非表示にすることです。教師が出席シートを*本当に*削除できるようにするには、このオプションを有効にします。

*デフォルト: `true`*

### `attendance_allow_comments`

**出席シートでのコメントを許可**

教師と学生は、個々の出席（正当化のため）にコメントできます。

*デフォルト: `false`*

### `attendance_calendar_set_duration` **v3**

**出席イベントの所要時間**

出席シート上のイベントの所要時間を定義するオプションです。

*デフォルト: `false`*

### `enable_sign_attendance_sheet`

**出席の署名**

出席を確認するための署名の取得を有効にします。

*デフォルト: `false`*

### `multilevel_grading`

**多段階出席評価を有効化**

単純な出席／欠席ではなく、複数のレベルで出席を評価できるようにします。

*デフォルト: `false`*