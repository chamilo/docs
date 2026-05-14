# Dropbox設定

**Dropbox**ファイル交換ツールの動作設定。

これらの設定には、**管理 > 設定 > Dropbox**からアクセスできます。このカテゴリには**8つの設定**が含まれており、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に記載されているタイトルとコメントを記載しています。

> コード内の変数名は等幅フォントで表示されています。APIを介してスクリプトを作成する場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml)を編集してこれらの設定をグローバルレベルで変更する必要がある場合に使用してください。

## 設定

### `dropbox_allow_group`

**Dropbox：グループを許可**

ユーザーがグループにファイルを送信できるようにする

*デフォルト：`true`*

### `dropbox_allow_just_upload`

**Dropbox：自分のDropboxスペースにアップロード？**

トレーナーやユーザーが、自分自身にドキュメントを送信せずに、自分のDropboxにドキュメントをアップロードすることを許可する

*デフォルト：`true`*

### `dropbox_allow_mailing`

**Dropbox：メール送信を許可**

メール機能を使用して、各学習者に個別のドキュメントを送信できる

*デフォルト：`false`*

### `dropbox_allow_overwrite`

**Dropbox：ドキュメントの上書きを許可**

ユーザーまたはトレーナーが、すでに存在するドキュメントと同じ名前のドキュメントをアップロードした際に、元のドキュメントを上書きできるか？「はい」と答えると、バージョニング機能が失われます。

*デフォルト：`true`*

### `dropbox_allow_student_to_student`

**Dropbox：学習者 <-> 学習者**

ユーザーが他のユーザーにドキュメントを送信することを許可する（ピアツーピア）。ユーザーはこの機能を使用して、重要度の低いドキュメント（mp3、テストの解答など）も送信できます。この機能を無効にすると、ユーザーはトレーナーにのみドキュメントを送信できるようになります。

*デフォルト：`true`*

### `dropbox_hide_course_coach`

**Dropbox：コースコーチを非表示**

コーチが学生にドキュメントを送信した際に、Dropbox内でセッションコースコーチを非表示にする

*デフォルト：`false`*

### `dropbox_hide_general_coach`

**Dropbox：一般コーチを非表示**

一般コーチがファイルをアップロードした際に、Dropboxツール内で一般コーチの名前を非表示にする

*デフォルト：`false`*

### `dropbox_max_filesize`

**Dropbox：ドキュメントの最大ファイルサイズ**

Dropboxのドキュメントの最大サイズ（MB単位）はどのくらいか？

*デフォルト：`100000000`*