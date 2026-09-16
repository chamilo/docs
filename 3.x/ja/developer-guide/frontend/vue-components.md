# Vue コンポーネント

Chamilo には、`assets/vue/components/` 内で機能領域ごとに整理された、多数の Vue コンポーネントがあります。

## ベースコンポーネント

`assets/vue/components/basecomponents/` にある `Base*` ファミリーは、PrimeVue のプリミティブを Chamilo 固有のデフォルト（FloatLabel レイアウト、`chamiloIconToClass` 経由の MDI アイコン、一貫したバリデーションメッセージ、Tailwind によるサイズ指定）でラップします。基盤となる PrimeVue コンポーネントを直接インポートする前に、必ず `Base*` コンポーネントを使用してください。これにより SPA 全体で UI の一貫性が保たれ、デザイン変更を一箇所から展開できます。

コンポーネントは**グローバル登録されていません**（グローバル登録されている唯一の PrimeVue プリミティブは、`BaseTable` 内で使用される `Column` です）。それぞれを明示的にインポートしてください。

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

### フォーム入力

ほとんどは `v-model` で値を受け取り、アクセシビリティ／フローティングラベルのバインド用に `id` + `label` プロパティを公開し、`isInvalid` / `errorText`（または `messageText`）の組でバリデーションを表面化します。

| コンポーネント                     | ラップ対象                                             | 用途                                                                                                                                                                                               |
|----------------------------------|------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`              | `InputText` + `FloatLabel`                           | 1行テキスト入力。`date`/`time`/`datetime-local` 入力ではフローティングラベルがネイティブのプレースホルダーと重なるため、静的ラベルに切り替えます。                                      |
| `BaseInputTextWithVuelidate.vue` | `BaseInputText`                                      | 薄い Vuelidate アダプター：`$error` を `isInvalid` に転送し、`errors` スロットに `$errors[].$message` を描画します。Vuelidate のフィールドオブジェクトと組み合わせて使います。                                             |
| `BaseTextArea.vue`               | `Textarea` + `FloatLabel`                            | 複数行テキスト入力。                                                                                                                                                                             |
| `BaseTextAreaWithVuelidate.vue`  | `BaseTextArea`                                       | `BaseInputTextWithVuelidate` と同じ Vuelidate アダプターパターン。                                                                                                                                    |
| `BaseInputNumber.vue`            | `InputNumber`                                        | `min` / `max` / `step` とスピナーボタン付きの数値入力。                                                                                                                                     |
| `BaseInputTags.vue`              | （カスタム）                                             | 自由入力のタグチップ。Enter／カンマでタグを追加し、Backspace で削除します。                                                                                                                       |
| `BaseInputGroup.vue`             | `InputGroup` + `BaseButton`                          | アクションボタンと対になったテキスト入力（検索スタイル）。                                                                                                                                            |
| `BaseCheckbox.vue`               | `Checkbox`                                           | ラベル付きの二値または値バインドのチェックボックス。                                                                                                                                                         |
| `BaseRadioButtons.vue`           | `RadioButton`                                        | `options: [{label, value}]` 配列で駆動するラジオボタングループ。                                                                                                                             |
| `BaseToggleButton.vue`           | `BaseButton`                                         | `v-model` でバインドする二状態ボタン（オン／オフのラベルとアイコン）。                                                                                                                              |
| `BaseCalendar.vue`               | `DatePicker` + `FloatLabel`                          | 日付／日時ピッカー。`platform.timepicker_increment` と、`calendarLocales` 経由のユーザーロケールを尊重します。                                                                                       |
| `BaseColorPicker.vue`            | ネイティブ `<input type="color">` + `InputText`          | 16進テキストフォールバック付きカラーピッカー。手動の16進入力の検証に `colorjs.io` を使用します。                                                                                                               |
| `BaseRating.vue`                 | `Rating`                                             | 星評価入力。                                                                                                                                                                                 |
| `BaseFileUpload.vue`             | ネイティブ `<input type="file">` + `BaseButton`          | 添付スタイルのボタンを起動する単一ファイルピッカー。                                                                                                                                       |
| `BaseFileUploadMultiple.vue`     | ネイティブ `<input type="file" multiple>` + `BaseButton` | `BaseFileUpload` の複数ファイル版。                                                                                                                                                            |
| `BaseUploader.vue`               | Uppy `Dashboard`                                     | フル機能の Uppy アップローダー（ウェブカメラ、音声、画像エディター、XHR アップロード）。ロケールは現在の `appLocale` に接続されます。進捗付きのリッチなアップロードにはこちらを、単純な添付には `BaseFileUpload*` を使います。 |

### 選択とオートコンプリート

| Component              | Wraps                        | Purpose                                                                                                                           |
|------------------------|------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`       | `Dropdown` + `FloatLabel`    | 任意のクリアボタン付きの単一選択ドロップダウン。                                                                                |
| `BaseMultiSelect.vue`  | `MultiSelect` + `FloatLabel` | 選択した項目をチップとして表示する複数選択ドロップダウン。                                                                      |
| `BaseSearchSelect.vue` | `Dropdown` with `filter`     | 組み込みの検索ボックス、任意の仮想スクロール、2行のオプションテンプレート（`label` + `sublabel`）を備えた単一選択ドロップダウン。 |
| `BaseAutocomplete.vue` | `AutoComplete`               | 非同期オートコンプリート（最小3文字）。単一または複数選択に対応し、チップをカスタマイズする `chip` スロットを備える。                  |
| `BaseUserFinder.vue`   | `BaseTable` + `userService`  | 行選択付きのページネーションされたユーザー検索テーブル。機能に管理者向けのユーザーピッカーが必要な場合に使用する。                           |

### ボタンとアクション

| Component                        | Wraps               | Purpose                                                                                                                                                                                                                                                                                                                                                     |
|----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                 | `Button` (PrimeVue) | 標準の Chamilo ボタン。アイコンは `chamiloIconToClass` で解決し、`type` を PrimeVue の `severity` / `variant` に正規化する。`route` または `toUrl` が指定された場合は内部で `BaseAppLink` を描画する（同一コンポーネントでルーターリンク、アンカー、通常のボタンを扱う）。受け入れ可能な `type` の値は `validators.js` → `buttonTypeValidator` に記載されている。 |
| `BaseAdvancedSettingsButton.vue` | `BaseButton`        | `v-model` によりスロットされた「詳細設定」パネルを切り替える開示ボタン。                                                                                                                                                                                                                                                                           |
| `BaseToolbar.vue`                | `Toolbar`           | `start` / `end` スロット（または単一のデフォルトスロット）を持つアクションツールバー。区切りスタイル用の任意の `showTopBorder`。                                                                                                                                                                                                                                       |

### 表示とデータ

| Component            | Wraps                       | Purpose                                                                                                                                                                                         |
|----------------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`      | `DataTable` (PrimeVue)      | Chamilo 標準のデータテーブル。サーバーサイドモード（`lazy`）、複数列ソート、グローバルフィルター、行選択、ページネーションに対応。列はグローバル登録された `<Column>` 子要素として渡す。 |
| `BaseCard.vue`       | `Card`                      | `header`、`title`、`subtitle`、`footer`、およびデフォルト（コンテンツ）スロットを転送するカードラッパー。                                                                                                |
| `BaseChart.vue`      | `Chart`                     | 円グラフのプリセット。Chart.js 互換の `data` オブジェクトを渡す。                                                                                                                                     |
| `BaseChip.vue`       | `Chip`                      | `{value, labelField, imageField}` オブジェクトから描画するチップ。任意の削除ボタン付き。                                                                                                     |
| `BaseTag.vue`        | `Tag`                       | 色付きラベルタグ。Chamilo の `warning` を PrimeVue の `warn` にマッピングする。                                                                                                                               |
| `BaseAvatarList.vue` | `Avatar` + `BaseUserAvatar` | オーバーフローカウンター（例: 「+3」）付きのアバター行。`useAvatarList` で駆動する。                                                                                                                        |
| `BaseUserAvatar.vue` | `Avatar`                    | 画像フォールバック、読み込み状態、アクセシブルなラベルを備えたユーザーアバター。                                                                                                                           |
| `BaseIcon.vue`       | `<i class="mdi …">`         | Chamilo のアイコンレンダラー。任意のバッジ（テキストまたはアイコン）、ツールチップ、サイズ修飾子を追加する。生の MDI クラスではなく、常に Chamilo のセマンティック名（例: `"edit"`）を渡す。                             |
| `BaseIconField.vue`  | `IconField` + `InputText`   | 先頭に虫眼鏡アイコン付きの検索入力。                                                                                                                                                     |
| `BaseDivider.vue`    | `Divider`                   | 水平または垂直の区切り線。任意のタイトルと配置に対応。                                                                                                                              |

### ナビゲーションとメニュー

| Component                  | Wraps                   | Purpose                                                                                                                                                                                 |
|----------------------------|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | `model[]` 内の項目でルータールートを解釈するポップアップメニュー。                                                                                                                       |
| `BaseDropdownMenu.vue`     | (custom)                | 単一オープン連携（1 つを開くと他が閉じる）を備えた軽量なドロップダウントリガー。                                                                                             |
| `BaseContextMenu.vue`      | (custom)                | `visible` と `position` で制御する右クリック／位置指定のコンテキストメニュー。                                                                                                            |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | サイドバーで使うアコーディオン型ナビゲーションメニュー。モデルから展開キーを自動追跡する。                                                                                             |
| `BaseRouteTabs.vue`        | `BaseAppLink` row       | 各タブがルーターリンクであるタブバー。現在のルートに基づきアクティブタブが自動でハイライトされる。                                                                        |
| `BaseAppLink.vue`          | `RouterLink` *or* `<a>` | スマートリンク: `url` が設定されている場合（外部／レガシー）は `<a>` を、それ以外は Vue Router の `<RouterLink>` を描画する。内部／外部リンクを統一するため、いずれのプリミティブの代わりにこれを使う。 |

### ダイアログ

`BaseDialog` が基盤であり、その他は確認／キャンセルおよび削除の一般的なフローのためにその上に構成されます。

| Component                     | Wraps                     | Purpose                                                                                                                             |
|-------------------------------|---------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | タイトル付きヘッダー（任意の `headerIcon`）とスロット化された本文／フッターを持つモーダルダイアログ。開閉状態は `defineModel("isVisible")` です。      |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | 2 つのボタンを持つ確認／キャンセルモーダル。確認の `type`（重要度）と `icon` を設定可能。`confirmClicked` / `cancelClicked` を発行します。 |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | 「この項目を削除してもよろしいですか？」という事前構築モーダルで、危険スタイルの確認ボタンを持ちます。                                   |

### エディターとリッチコンテンツ

| Component            | Wraps                                           | Purpose                                                                                                                                                              |
|----------------------|-------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE（プロジェクトの `components/Editor` 経由） | `FloatLabel`、フォーカス／空状態の追跡、および現在のコースコンテキスト（`cidReq`）との統合を備えたリッチテキストエディター。ユーザーが作成する HTML フィールドにはこれを使用します。 |

### ヘルパー

| File              | Purpose                                                                                                                                                                                                                                                          |
|-------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js` | 意味的なアイコン名（`edit`、`delete`、`eye-on`、`courses`、…）を MDI の CSS クラスに対応付けます。約 127 件。稼働中のインスタンスの `/admin/list-icons` で一覧できます。                                                                                                  |
| `validators.js`   | 共有の prop バリデーター：`iconValidator`（既知の Chamilo アイコン名であること）、`sizeValidator`（`normal` / `small` / `large`）、`buttonTypeValidator`（許可される `BaseButton` の type）。これらの規約に従う新しい `Base*` コンポーネントを定義する際にインポートします。 |

### Base コンポーネント全体の規約

* **`defineModel()` による v-model** — 値（および多くの場合 `isVisible`、`filters`、`selectedItems`）はモデルとして公開されます。`:prop` + `@update:prop` ではなく `v-model[:name]` で渡します。
* **フローティングラベル** — ほとんどのフォームフィールドは入力を PrimeVue の `FloatLabel variant="on"` で包みます。`label`（表示テキスト）と `id`（`<label for>` のバインドに使用）を指定します。
* **検証メッセージ** — フィールドは `isInvalid` と、入力の下に小さなメッセージ（コンポーネントに応じて `errorText`、`messageText`、または `smallText`）を公開します。よく使うものには Vuelidate 対応のバリアントがあります。
* **アイコン** — 生の MDI クラスではなく、Chamilo の意味的な名前を渡します。コンポーネントは `chamiloIconToClass` を通じて解決します。
* **サイズ** — `size="normal" | "small" | "large"` が慣例のサイズ prop です（`sizeValidator` を参照）。
* **重複より合成** — `BaseDialogDelete` は `BaseDialogConfirmCancel` を、それは `BaseDialog` をラップします。`BaseToggleButton` と `BaseAdvancedSettingsButton` は `BaseButton` をラップします。既存コンポーネントの繰り返しバリアントが必要な場合は、機能フォルダーで再実装するのではなく、その上に新しい `Base*` を合成することを優先します。

## レイアウトコンポーネント

`components/layout/` にあります。

| Component | Purpose |
|-----------|---------|
| `DashboardLayout.vue` | メインレイアウト：トップバー + サイドバー + コンテンツ領域 |
| `Sidebar.vue` | 左ナビゲーションパネル（折りたたみ可能） |
| `TopbarLoggedIn.vue` | ロゴ、受信箱、アバター付きのトップバー |

## 機能領域コンポーネント

| Directory | Components | Purpose |
|-----------|-----------|---------|
| `course/` | コースカード、カタログフィルター、コースフォーム | コースの一覧表示と管理 |
| `session/` | セッションカード、カタログ | セッションの一覧表示 |
| `assignments/` | 提出物リスト、採点モーダル、フォーム | 課題ワークフロー |
| `chat/` | DockedChat、チャットメッセージ | リアルタイムチャットおよび AI チューター |
| `filemanager/` | CourseDocuments、PersonalFiles | ファイルブラウザーと管理 |
| `installer/` | Step1-Step7、EmailSettings | インストールウィザード |
| `social/` | GroupInfoCard、ソーシャル投稿 | ソーシャルネットワーク機能 |
| `attendance/` | AttendanceTable | 出欠管理 |
| `usergroup/` | GroupMembers | ユーザーグループ管理 |

## アイコンシステム

アイコンは **Material Design Icons (MDI)** を唯一のアイコンライブラリとして使用します: `<i class="mdi mdi-pencil"></i>`

`ChamiloIcons.js` ファイルはセマンティックなマッピングを提供します:

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

コンポーネントは `BaseIcon` を使用するか、`chamiloIconToClass` を参照して、一貫した方法でアイコンを描画します。

プラットフォームで利用可能なすべてのアイコンの閲覧可能なリファレンスは、稼働中の任意の Chamilo インスタンスの `/admin/list-icons` にあります。

## コンポーネントのパターン

* **Composition API** — コンポーネントは Vue 3 の `<script setup>` 構文を使用します
* **PrimeVue の統合** — PrimeVue コンポーネント（Button、DataTable、Dialog、Menu など）を多用します
* **API 呼び出しに Axios** — バックエンド API への HTTP リクエスト
* **Vue I18n** — ユーザー向けのすべてのテキストは翻訳キーを使用します