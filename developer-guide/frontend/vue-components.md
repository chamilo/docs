# Vueコンポーネント

Chamiloには、`assets/vue/components/`内に機能領域ごとに整理された広範なVueコンポーネントセットがあります。

## ベースコンポーネント

`assets/vue/components/basecomponents/`内の`Base*`ファミリーは、Chamilo固有の標準（FloatLabelレイアウト、MDIアイコンを`chamiloIconToClass`経由で使用、一貫したバリデーションメッセージ、Tailwindのスケーリング）を備えたPrimeVueのプリミティブをカプセル化しています。PrimeVueの基盤となるコンポーネントをインポートする前に、常に`Base*`コンポーネントを選択してください。これにより、SPA全体でユーザーインターフェースの一貫性が保たれ、デザインの変更を1つの場所から実装することが可能になります。

コンポーネントは**グローバルには登録されていません**（PrimeVueの唯一のグローバルに登録されたプリミティブは、`BaseTable`内で使用される`Column`です）。各コンポーネントを明示的にインポートしてください：

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

---

### フォームフィールド

ほとんどのコンポーネントは `v-model` を通じて値を受け入れ、アクセシビリティやフローティングラベルのバインディングのために `id` および `label` プロパティを公開し、`isInvalid` / `errorText`（または `messageText`）のペアを通じてバリデーションを表示します。

| コンポーネント                        | ラップ対象                                           | 目的                                                                                                                                                                                            |
|---------------------------------------|------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`                   | `InputText` + `FloatLabel`                           | 単一行のテキストフィールド。`date`/`time`/`datetime-local` の入力フィールドでは静的なラベルに切り替わります（フローティングラベルがネイティブのプレースホルダーと重なるため）。                           |
| `BaseInputTextWithVuelidate.vue`      | `BaseInputText`                                      | Vuelidate 用の薄いアダプター：`$error` を `isInvalid` に転送し、`errors` スロットに `$errors[].$message` をレンダリングします。Vuelidate のフィールドオブジェクトと組み合わせて使用します。            |
| `BaseTextArea.vue`                    | `Textarea` + `FloatLabel`                            | 複数行のテキストフィールド。                                                                                                                                                                            |
| `BaseTextAreaWithVuelidate.vue`       | `BaseTextArea`                                       | `BaseInputTextWithVuelidate` と同じ Vuelidate アダプターパターン。                                                                                                                                     |
| `BaseInputNumber.vue`                 | `InputNumber`                                        | `min` / `max` / `step` および増減ボタンを備えた数値フィールド。                                                                                                                                        |
| `BaseInputTags.vue`                   | （カスタム）                                         | 自由入力のテキストタグ。Enter キーやカンマを押すとタグが追加され、Backspace キーを押すと削除されます。                                                                                              |
| `BaseInputGroup.vue`                  | `InputGroup` + `BaseButton`                          | アクションボタン（検索スタイル）と組み合わせたテキストフィールド。                                                                                                                                       |
| `BaseCheckbox.vue`                    | `Checkbox`                                           | バイナリのチェックボックスまたはラベル付きの値にバインドされたチェックボックス。                                                                                                                         |
| `BaseRadioButtons.vue`                | `RadioButton`                                        | `options: [{label, value}]` 配列によって制御されるラジオボタングループ。                                                                                                                               |
| `BaseToggleButton.vue`                | `BaseButton`                                         | `v-model` を通じてバインドされた 2 状態ボタン（オン/オフのラベルとアイコン）。                                                                                                                          |
| `BaseCalendar.vue`                    | `DatePicker` + `FloatLabel`                          | 日付/日時セレクター。`platform.timepicker_increment` およびユーザーのロケール（`calendarLocales` 経由）を尊重します。                                                                                |
| `BaseColorPicker.vue`                 | ネイティブ `<input type="color">` + `InputText`      | 16 進数テキストへのフォールバックを備えたカラーピッカー。手動入力の 16 進数バリデーションに `colorjs.io` を使用します。                                                                               |
| `BaseRating.vue`                      | `Rating`                                             | 星評価フィールド。                                                                                                                                                                                    |
| `BaseFileUpload.vue`                  | ネイティブ `<input type="file">` + `BaseButton`      | 添付ファイルスタイルのボタンをトリガーする単一ファイルセレクター。                                                                                                                                      |
| `BaseFileUploadMultiple.vue`          | ネイティブ `<input type="file" multiple>` + `BaseButton` | `BaseFileUpload` の複数ファイル対応バリエーション。                                                                                                                                                   |
| `BaseUploader.vue`                    | Uppy `Dashboard`                                     | Uppy のフル機能アップローダー（ウェブカメラ、オーディオ、画像エディター、XHR アップロード）。現在の `appLocale` にリンクされたローカライズを備えています。進捗表示付きの豊富なアップロードに使用し、シンプルな添付には `BaseFileUpload*` を使用します。 |

### 選択とオートコンプリート

| コンポーネント              | 包含する                      | 目的                                                                                                                           |
|-------------------------|-------------------------------|-----------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`        | `Dropdown` + `FloatLabel`     | クリアボタン付きの単一選択ドロップダウンメニュー。                                                                |
| `BaseMultiSelect.vue`   | `MultiSelect` + `FloatLabel`  | 選択したアイテムをチップとして表示する複数選択ドロップダウンメニュー。                                                  |
| `BaseSearchSelect.vue`  | `Dropdown` with `filter`      | 検索ボックスが統合された単一選択ドロップダウンメニュー。仮想スクロールがオプションで、2行のオプションテンプレート（`label` + `sublabel`）をサポート。 |
| `BaseAutocomplete.vue`  | `AutoComplete`                | 非同期オートコンプリート（最小3文字）。単一選択または複数選択をサポートし、チップをカスタマイズするための`chip`スロットを備える。 |
| `BaseUserFinder.vue`    | `BaseTable` + `userService`   | 行選択が可能なページネーション付きユーザー検索テーブル。管理者スタイルのユーザーセレクターが必要な機能で使用。 |

### ボタンとアクション

| コンポーネント                        | 包含する              | 目的                                                                                                                                                                                                                                                                                                                                                     |
|-----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                  | `Button` (PrimeVue) | Chamiloの標準ボタン。`chamiloIconToClass`を通じてアイコンを解決し、`type`をPrimeVueの`severity`/`variant`に正規化。`route`または`toUrl`が提供された場合に内部の`BaseAppLink`をレンダリング（したがって、同じコンポーネントがrouter-link、アンカー、シンプルなボタンのケースを処理）。`type`に受け入れられる値は`validators.js` → `buttonTypeValidator`に記載。 |
| `BaseAdvancedSettingsButton.vue`  | `BaseButton`        | `v-model`を介して挿入された「高度な設定」パネルを切り替える開示ボタン。                                                                                                                                                                                                                                                                           |
| `BaseToolbar.vue`                 | `Toolbar`           | `start` / `end`スロット（または単一のデフォルトスロット）を備えたアクションツールバー。セパレーターのスタイル設定のための`showTopBorder`がオプション。                                                                                                                                                                                                                                       |

---
### 表示とデータ

| コンポーネント            | ラップするもの              | 目的                                                                                                                                                                                         |
|---------------------------|-----------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`           | `DataTable` (PrimeVue)      | Chamiloの標準データテーブル。サーバーサイドモード（`lazy`）、複数列での並べ替え、グローバルフィルター、行選択、ページネーションをサポート。列は子要素として`<Column>`（グローバルに登録済み）を渡す。 |
| `BaseCard.vue`            | `Card`                      | カードのラッパーで、`header`、`title`、`subtitle`、`footer`、およびデフォルト（コンテンツ）のスロットを転送する。                                                                                         |
| `BaseChart.vue`           | `Chart`                     | 円グラフのプリセット。Chart.jsと互換性のある`data`オブジェクトを渡す。                                                                                                                |
| `BaseChip.vue`            | `Chip`                      | `{value, labelField, imageField}`オブジェクトからレンダリングされるチップ。オプションで削除ボタン付き。                                                                                        |
| `BaseTag.vue`             | `Tag`                      | 色付きのタグ。Chamiloの`warning`をPrimeVueの`warn`にマッピング。                                                                                                                      |
| `BaseAvatarList.vue`      | `Avatar` + `BaseUserAvatar` | 超過カウンター（例："+3"）付きのアバターライン。`useAvatarList`で制御。                                                                                                   |
| `BaseUserAvatar.vue`      | `Avatar`                    | 画像のフォールバック、読み込み状態、アクセシブルなラベルを持つユーザーアバター。                                                                                                             |
| `BaseIcon.vue`            | `<i class="mdi …">`         | Chamiloのアイコンレンダラー。オプションでバッジ（テキストまたはアイコン）、ツールチップ、サイズ修飾子を追加。常にChamiloのセマンティック名（例：`"edit"`）を渡し、生のMDIクラスは使用しない。 |
| `BaseIconField.vue`       | `IconField` + `InputText`   | 左側に虫眼鏡アイコンが付いた検索入力フィールド。                                                                                                                                     |
| `BaseDivider.vue`         | `Divider`                   | 水平または垂直の区切り線。オプションでタイトルと配置を指定可能。                                                                                                                               |

---
### ナビゲーションとメニュー

| コンポーネント                 | ラップするもの          | 目的                                                                                                                                                                                 |
|----------------------------|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (ポップアップ)    | `model[]` 内のアイテムでルーターのルートを理解するポップアップメニュー。                                                                                                                         |
| `BaseDropdownMenu.vue`     | (カスタム)              | 軽量なドロップダウントリガーで、単一のオープン協調機能付き（1つを開くと他が閉じる）。                                                                                                   |
| `BaseContextMenu.vue`      | (カスタム)              | 右クリック/位置指定のコンテキストメニュー。`visible` + `position` で制御。                                                                                                 |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | サイドバーで使用されるアコーディオンスタイルのナビゲーションメニュー。モデルから展開されたキーを自動的に追跡。                                                                 |
| `BaseRouteTabs.vue`        | `BaseAppLink` の行      | 各タブがルーターリンクであるタブバー。現在のルートに基づいてアクティブなタブが自動的に強調表示される。                                                                         |
| `BaseAppLink.vue`          | `RouterLink` *または* `<a>` | スマートリンク：`url` が定義されている場合（外部/レガシー）は `<a>` をレンダリングし、そうでなければ Vue Router の `<RouterLink>` を使用。内部リンクと外部リンクの一貫性を保つために、プリミティブの代わりにこれを使用。 |

---
### ダイアログ

`BaseDialog` が基本であり、他のものは確認/キャンセルや削除の一般的なフローのためにその上に構築されています。

| コンポーネント                     | ラップするもの            | 目的                                                                                                                             |
|-------------------------------|---------------------------|---------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | タイトル付きヘッダー（オプションで `headerIcon`）とボディ/フッターにスロットを持つモーダルダイアログ。オープン状態は `defineModel("isVisible")`。 |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | 2つのボタンを持つ確認/キャンセルモーダル。確認タイプ（`type`）（重大度）および `icon` が設定可能。`confirmClicked` / `cancelClicked` を発行。 |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | 「このアイテムを削除してもよろしいですか？」という事前構築済みのモーダルで、確認ボタンは危険としてスタイル設定されています。              |

### エディターとリッチコンテンツ

| コンポーネント            | ラップするもの                                    | 目的                                                                                                                                                              |
|----------------------|-------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (プロジェクトの `components/Editor` 経由) | `FloatLabel`、フォーカス/空の状態追跡、現在のコースコンテキスト（`cidReq`）との統合を備えたリッチテキストエディター。ユーザーが作成するHTMLフィールドに使用。 |

---
### 補助ファイル

| ファイル              | 目的                                                                                                                                                                                                                                                          |
|----------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js`    | セマンティックなアイコン名（`edit`、`delete`、`eye-on`、`courses` など）をMDIのCSSクラスにマッピング。約127のエントリがあります。実行中のインスタンスで `/admin/list-icons` を参照して確認できます。                                                                 |
| `validators.js`      | 共有プロパティバリデーター：`iconValidator`（Chamiloの既知のアイコン名である必要があります）、`sizeValidator`（`normal` / `small` / `large`）、`buttonTypeValidator`（`BaseButton` の許可されたタイプ）。新しい `Base*` コンポーネントを定義する際にこれらをインポートしてください。 |

### Baseコンポーネントの規約

* **v-model via `defineModel()`** — 値（および多くの場合 `isVisible`、`filters`、`selectedItems`）がモデルとして公開されます。`:prop` + `@update:prop` ではなく、`v-model[:name]` で渡してください。
* **フローティングラベル** — ほとんどのフォームフィールドは、PrimeVue の `FloatLabel variant="on"` で入力をラップします。`label`（表示されるテキスト）と `id`（`<label for>` のバインディングに使用）を指定してください。
* **バリデーションメッセージ** — フィールドは `isInvalid` と入力下の小さなメッセージ（コンポーネントに応じて `errorText`、`messageText`、または `smallText`）を公開します。最も一般的なものには Vuelidate 互換のバリエーションが存在します。
* **アイコン** — Chamiloのセマンティック名を渡し、生のMDIクラスは使用しないでください。コンポーネントは `chamiloIconToClass` を通じてこれを解決します。
* **サイズ設定** — `size="normal" | "small" | "large"` が従来のサイズ設定プロパティです（`sizeValidator` を参照）。
* **複製よりも合成** — `BaseDialogDelete` は `BaseDialogConfirmCancel` をラップし、それが `BaseDialog` をラップします。`BaseToggleButton` や `BaseAdvancedSettingsButton` は `BaseButton` をラップします。既存のコンポーネントの繰り返しバリエーションが必要な場合、機能フォルダで再実装するのではなく、新しい `Base*` を合成することを優先してください。

## レイアウトコンポーネント

`components/layout/` に配置されています：

| コンポーネント | 目的 |
|-----------|------------|
| `DashboardLayout.vue` | メインレイアウト：トップバー + サイドバー + コンテンツエリア |
| `Sidebar.vue` | 左側のナビゲーションパネル（折り畳み可能） |
| `TopbarLoggedIn.vue` | ロゴ、受信トレイ、アバター付きのトップバー |

---
## 機能エリアコンポーネント

| ディレクトリ | コンポーネント | 目的 |
|-----------|-----------|---------|
| `course/` | コースカード、カタログフィルター、コースフォーム | コースのリストと管理 |
| `session/` | セッションカード、カタログ | セッションのリスト |
| `assignments/` | 提出リスト、評価モーダル、フォーム | 課題のワークフロー |
| `chat/` | DockedChat、チャットメッセージ | リアルタイムチャットとAIチューター |
| `filemanager/` | CourseDocuments、PersonalFiles | ファイルブラウザと管理 |
| `installer/` | Step1-Step7、EmailSettings | インストールウィザード |
| `social/` | GroupInfoCard、ソーシャル投稿 | ソーシャルネットワーク機能 |
| `attendance/` | AttendanceTable | 出席追跡 |
| `usergroup/` | GroupMembers | ユーザーグループの管理 |

## アイコンシステム

アイコンは **Material Design Icons (MDI)** を唯一のアイコンライブラリとして使用しています：`<i class="mdi mdi-pencil"></i>`

`ChamiloIcons.js` ファイルはセマンティックなマッピングを提供します：

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

コンポーネントは `BaseIcon` を使用するか、`chamiloIconToClass` を参照して一貫してアイコンをレンダリングします。

プラットフォームで利用可能なすべてのアイコンの参照は、実行中のChamiloインスタンスの `/admin/list-icons` で確認できます。

## コンポーネントの標準

* **Composition API** — コンポーネントはVue 3の `<script setup>` 構文を使用します
* **PrimeVueとの統合** — PrimeVueコンポーネント（Button、DataTable、Dialog、Menuなど）の多用
* **AxiosによるAPI呼び出し** — バックエンドAPIへのHTTPリクエスト
* **Vue I18n** — ユーザー向けのすべてのテキストは翻訳キーを使用します