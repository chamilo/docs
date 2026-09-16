# Vue 元件

Chamilo 在 `assets/vue/components/` 中依功能領域組織了大量 Vue 元件。

## 基礎元件

`assets/vue/components/basecomponents/` 中的 `Base*` 系列以 Chamilo 專屬預設值包裝 PrimeVue 原始元件（FloatLabel 版面、透過 `chamiloIconToClass` 的 MDI 圖示、一致的驗證訊息、Tailwind 尺寸）。請一律優先使用 `Base*` 元件，再考慮直接匯入底層 PrimeVue 元件——如此才能讓 SPA 的 UI 保持一致，並能從單一處所推出設計變更。

元件**並未**全域註冊（唯一全域註冊的 PrimeVue 原始元件是 `Column`，用於 `BaseTable` 內部）。請明確匯入每一個元件：

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

### 表單輸入元件

大多數元件透過 `v-model` 接收值，並提供 `id` 與 `label` 屬性以支援無障礙／浮動標籤綁定，驗證狀態則透過 `isInvalid`／`errorText`（或 `messageText`）成對呈現。

| 元件                             | 包裝內容                                             | 用途                                                                                                                                                                                               |
|----------------------------------|------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`              | `InputText` + `FloatLabel`                           | 單行文字輸入。對於 `date`／`time`／`datetime-local` 輸入會改用靜態標籤（浮動標籤會與原生 placeholder 重疊）。                                                                                      |
| `BaseInputTextWithVuelidate.vue` | `BaseInputText`                                      | 輕量 Vuelidate 轉接器：將 `$error` 轉發至 `isInvalid`，並在 `errors` 插槽中呈現 `$errors[].$message`。請與 Vuelidate 欄位物件搭配使用。                                                             |
| `BaseTextArea.vue`               | `Textarea` + `FloatLabel`                            | 多行文字輸入。                                                                                                                                                                                     |
| `BaseTextAreaWithVuelidate.vue`  | `BaseTextArea`                                       | 與 `BaseInputTextWithVuelidate` 相同的 Vuelidate 轉接器模式。                                                                                                                                      |
| `BaseInputNumber.vue`            | `InputNumber`                                        | 數值輸入，支援 `min`／`max`／`step` 與微調按鈕。                                                                                                                                                   |
| `BaseInputTags.vue`              | （自訂）                                             | 自由文字標籤晶片；於 Enter／逗號時新增標籤，於 Backspace 時移除。                                                                                                                                  |
| `BaseInputGroup.vue`             | `InputGroup` + `BaseButton`                          | 文字輸入搭配操作按鈕（搜尋風格）。                                                                                                                                                                 |
| `BaseCheckbox.vue`               | `Checkbox`                                           | 二元或值綁定核取方塊，含標籤。                                                                                                                                                                     |
| `BaseRadioButtons.vue`           | `RadioButton`                                        | 由 `options: [{label, value}]` 陣列驅動的單選按鈕群組。                                                                                                                                            |
| `BaseToggleButton.vue`           | `BaseButton`                                         | 雙狀態按鈕（開／關標籤與圖示），透過 `v-model` 綁定。                                                                                                                                              |
| `BaseCalendar.vue`               | `DatePicker` + `FloatLabel`                          | 日期／日期時間選擇器。遵循 `platform.timepicker_increment`，並透過 `calendarLocales` 套用使用者地區設定。                                                                                          |
| `BaseColorPicker.vue`            | 原生 `<input type="color">` + `InputText`            | 顏色選擇器，附十六進位文字後備；使用 `colorjs.io` 驗證手動輸入的十六進位值。                                                                                                                       |
| `BaseRating.vue`                 | `Rating`                                             | 星級評分輸入。                                                                                                                                                                                     |
| `BaseFileUpload.vue`             | 原生 `<input type="file">` + `BaseButton`            | 單檔選擇器，觸發附件風格按鈕。                                                                                                                                                                     |
| `BaseFileUploadMultiple.vue`     | 原生 `<input type="file" multiple>` + `BaseButton`   | `BaseFileUpload` 的多檔變體。                                                                                                                                                                      |
| `BaseUploader.vue`               | Uppy `Dashboard`                                     | 完整 Uppy 上傳器（網路攝影機、音訊、影像編輯器、XHR 上傳），地區設定對應目前的 `appLocale`。適用於需進度顯示的豐富上傳；簡單附件請使用 `BaseFileUpload*`。                                        |

### 選取與自動完成

| 元件                   | 包裝                          | 用途                                                                                                                           |
|------------------------|------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`       | `Dropdown` + `FloatLabel`    | 單選下拉選單，可選清除按鈕。                                                                                |
| `BaseMultiSelect.vue`  | `MultiSelect` + `FloatLabel` | 多選下拉選單，以晶片（chips）顯示已選項目。                                                                      |
| `BaseSearchSelect.vue` | `Dropdown` with `filter`     | 內建搜尋框的單選下拉選單，可選虛擬捲動，以及兩行選項範本（`label` + `sublabel`）。 |
| `BaseAutocomplete.vue` | `AutoComplete`               | 非同步自動完成（最少 3 個字元）。支援單選或多選，以及用於自訂晶片的 `chip` 插槽。                  |
| `BaseUserFinder.vue`   | `BaseTable` + `userService`  | 具列選取功能的分頁使用者搜尋表格。當功能需要管理風格的使用者挑選器時使用。                           |

### 按鈕與操作

| 元件                             | 包裝                | 用途                                                                                                                                                                                                                                                                                                                                                     |
|----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                 | `Button` (PrimeVue) | 標準 Chamilo 按鈕。透過 `chamiloIconToClass` 解析圖示，將 `type` 正規化為 PrimeVue 的 `severity`/`variant`；當提供 `route` 或 `toUrl` 時會渲染內部的 `BaseAppLink`（因此同一元件可處理 router-link、錨點與一般按鈕）。可接受的 `type` 值列於 `validators.js` → `buttonTypeValidator`。 |
| `BaseAdvancedSettingsButton.vue` | `BaseButton`        | 揭露按鈕，透過 `v-model` 切換插槽中的「進階設定」面板。                                                                                                                                                                                                                                                                           |
| `BaseToolbar.vue`                | `Toolbar`           | 動作工具列，具 `start` / `end` 插槽（或單一預設插槽）。可選 `showTopBorder` 以套用分隔樣式。                                                                                                                                                                                                                                       |

### 顯示與資料

| 元件                   | 包裝                        | 用途                                                                                                                                                                                         |
|----------------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`      | `DataTable` (PrimeVue)      | 標準 Chamilo 資料表格。支援伺服器端模式（`lazy`）、多欄排序、全域篩選、列選取與分頁。欄位以 `<Column>` 子元件傳入（已全域註冊）。 |
| `BaseCard.vue`       | `Card`                      | 卡片包裝器，會轉發 `header`、`title`、`subtitle`、`footer` 以及預設（內容）插槽。                                                                                                |
| `BaseChart.vue`      | `Chart`                     | 圓餅圖預設。傳入相容 Chart.js 的 `data` 物件。                                                                                                                                     |
| `BaseChip.vue`       | `Chip`                      | 由 `{value, labelField, imageField}` 物件渲染的晶片，可選移除按鈕。                                                                                                     |
| `BaseTag.vue`        | `Tag`                       | 彩色標籤。將 Chamilo 的 `warning` 對應至 PrimeVue 的 `warn`。                                                                                                                               |
| `BaseAvatarList.vue` | `Avatar` + `BaseUserAvatar` | 頭像列，含溢出計數（例如「+3」）；由 `useAvatarList` 驅動。                                                                                                                        |
| `BaseUserAvatar.vue` | `Avatar`                    | 使用者頭像，含圖片後援、載入狀態與無障礙標籤。                                                                                                                           |
| `BaseIcon.vue`       | `<i class="mdi …">`         | Chamilo 圖示渲染器。可加上選用徽章（文字或圖示）、工具提示與尺寸修飾。務必傳入 Chamilo 語意名稱（例如 `"edit"`），而非原始 MDI class。                             |
| `BaseIconField.vue`  | `IconField` + `InputText`   | 帶前置放大鏡圖示的搜尋輸入框。                                                                                                                                                     |
| `BaseDivider.vue`    | `Divider`                   | 水平或垂直分隔線，可選標題與對齊方式。                                                                                                                              |

### 導覽與選單

| 元件                       | 包裝                    | 用途                                                                                                                                                                                 |
|----------------------------|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu`（彈出）          | 彈出選單，能理解 `model[]` 項目中的路由器路由。                                                                                                                       |
| `BaseDropdownMenu.vue`     | （自訂）                | 輕量下拉觸發器，具單一開啟協調（開啟一個會關閉其他）。                                                                                             |
| `BaseContextMenu.vue`      | （自訂）                | 右鍵／定位式內容選單，由 `visible` + `position` 控制。                                                                                                            |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | 側邊欄使用的手風琴式導覽選單；會依模型自動追蹤展開的鍵。                                                                                             |
| `BaseRouteTabs.vue`        | `BaseAppLink` 列        | 每個分頁皆為路由器連結的分頁列。作用中分頁會依目前路由自動醒目顯示。                                                                        |
| `BaseAppLink.vue`          | `RouterLink` *或* `<a>` | 智慧連結：當設定 `url` 時渲染 `<a>`（外部／舊版），否則渲染 Vue Router 的 `<RouterLink>`。請用它取代任一原始元件，使內部／外部連結保持一致。 |

### 對話框

`BaseDialog` 為基礎元件；其餘元件則在其上組合，以處理常見的確認／取消與刪除流程。

| 元件                            | 包裝自                      | 用途                                                                                                                             |
|-------------------------------|---------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | 具標題列（可選 `headerIcon`）以及插槽式主體／頁尾的模態對話框。開啟狀態為 `defineModel("isVisible")`。      |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | 具兩個按鈕的確認／取消模態框。可設定確認按鈕的 `type`（嚴重程度）與 `icon`；會發出 `confirmClicked`／`cancelClicked`。 |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | 預建的「您確定要刪除此項目嗎？」模態框，確認按鈕採危險樣式。                                   |

### 編輯器與豐富內容

| 元件                   | 包裝自                                            | 用途                                                                                                                                                              |
|----------------------|-------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE（透過專案的 `components/Editor`） | 具 `FloatLabel`、焦點／空白狀態追蹤，並與目前課程脈絡（`cidReq`）整合的富文字編輯器。適用於任何由使用者撰寫的 HTML 欄位。 |

### 輔助工具

| 檔案                | 用途                                                                                                                                                                                                                                                          |
|-------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js` | 將語意化圖示名稱（`edit`、`delete`、`eye-on`、`courses` 等）對應至 MDI CSS 類別。約 127 筆。可於執行中的實例上透過 `/admin/list-icons` 瀏覽。                                                                                                  |
| `validators.js`   | 共用的 prop 驗證器：`iconValidator`（必須為已知的 Chamilo 圖示名稱）、`sizeValidator`（`normal`／`small`／`large`）、`buttonTypeValidator`（允許的 `BaseButton` 類型）。在定義遵循這些慣例的新 `Base*` 元件時匯入使用。 |

### Base 元件的共通慣例

* **透過 `defineModel()` 的 v-model** — 值（以及常見的 `isVisible`、`filters`、`selectedItems`）以 model 形式對外暴露；請以 `v-model[:name]` 傳遞，而非 `:prop` + `@update:prop`。
* **浮動標籤** — 多數表單欄位會將輸入包在 PrimeVue `FloatLabel variant="on"` 中。請提供 `label`（顯示文字）與 `id`（用於綁定 `<label for>`）。
* **驗證訊息** — 欄位會暴露 `isInvalid`，並在輸入下方顯示簡短訊息（依元件而定為 `errorText`、`messageText` 或 `smallText`）。最常見的欄位另有感知 Vuelidate 的變體。
* **圖示** — 請傳入 Chamilo 語意名稱，而非原始 MDI 類別。元件會透過 `chamiloIconToClass` 解析。
* **尺寸** — `size="normal" | "small" | "large"` 為慣用的尺寸 prop（見 `sizeValidator`）。
* **以組合取代重複** — `BaseDialogDelete` 包裝 `BaseDialogConfirmCancel`，後者再包裝 `BaseDialog`；`BaseToggleButton` 與 `BaseAdvancedSettingsButton` 包裝 `BaseButton`。當您需要既有元件的重複變體時，優先在其上組合新的 `Base*`，而非在功能資料夾中重新實作。

## 版面元件

位於 `components/layout/`：

| 元件 | 用途 |
|-----------|---------|
| `DashboardLayout.vue` | 主版面：頂列 + 側邊欄 + 內容區 |
| `Sidebar.vue` | 左側導覽面板（可收合） |
| `TopbarLoggedIn.vue` | 含標誌、收件匣、頭像的頂列 |

## 功能領域元件

| Directory | Components | Purpose |
|-----------|-----------|---------|
| `course/` | 課程卡片、目錄篩選器、課程表單 | 課程列表與管理 |
| `session/` | 學期卡片、目錄 | 學期列表 |
| `assignments/` | 繳交清單、評分彈窗、表單 | 作業工作流程 |
| `chat/` | DockedChat、聊天訊息 | 即時聊天與 AI 導師 |
| `filemanager/` | CourseDocuments、PersonalFiles | 檔案瀏覽與管理 |
| `installer/` | Step1-Step7、EmailSettings | 安裝精靈 |
| `social/` | GroupInfoCard、社群貼文 | 社群網路功能 |
| `attendance/` | AttendanceTable | 出席追蹤 |
| `usergroup/` | GroupMembers | 使用者群組管理 |

## 圖示系統

圖示僅使用 **Material Design Icons (MDI)** 作為唯一圖示函式庫：`<i class="mdi mdi-pencil"></i>`

`ChamiloIcons.js` 檔案提供語意對應：

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

元件使用 `BaseIcon` 或參照 `chamiloIconToClass` 以一致地呈現圖示。

平台中所有可用圖示的可瀏覽參考，可在任何正在執行的 Chamilo 實例中於 `/admin/list-icons` 找到。

## 元件模式

* **Composition API** — 元件使用 Vue 3 的 `<script setup>` 語法
* **PrimeVue 整合** — 大量使用 PrimeVue 元件（Button、DataTable、Dialog、Menu 等）
* **以 Axios 進行 API 呼叫** — 對後端 API 發出 HTTP 請求
* **Vue I18n** — 所有面向使用者的文字皆使用翻譯鍵