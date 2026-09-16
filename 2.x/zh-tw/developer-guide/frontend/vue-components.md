# Vue 元件

Chamilo 擁有大量 Vue 元件，按功能區域組織於 `assets/vue/components/` 中。

## 基礎元件

`assets/vue/components/basecomponents/` 中的 `Base*` 系列將 PrimeVue 基本元件包裝起來，並套用 Chamilo 專屬的預設值（FloatLabel 佈局、透過 `chamiloIconToClass` 使用 MDI 圖示、一致的驗證訊息、Tailwind 尺寸）。在匯入底層 PrimeVue 元件之前，總是優先使用 `Base*` 元件——這是 SPA 使用者介面保持一致的方式，也是從單一位置推出設計變更的方式。

元件**不會**全域註冊（唯一全域註冊的 PrimeVue 基本元件是 `Column`，用於 `BaseTable` 內部）。請明確匯入每個元件：

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

---
### 表單輸入元件

大多數元件透過 `v-model` 接受值，暴露 `id` + `label` props 以支援無障礙存取/浮動標籤綁定，並透過 `isInvalid` / `errorText`（或 `messageText`）配對來呈現驗證狀態。

| 元件                              | 封裝                                                  | 用途                                                                                                                                                                                              |
|-----------------------------------|-------------------------------------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`               | `InputText` + `FloatLabel`                            | 單行文字輸入。對於 `date`/`time`/`datetime-local` 輸入會切換為靜態標籤（因為浮動標籤會與原生佔位符重疊）。                                                                                       |
| `BaseInputTextWithVuelidate.vue`  | `BaseInputText`                                       | 輕量 Vuelidate 適配器：將 `$error` 轉發至 `isInvalid`，並在 `errors` 插槽中渲染 `$errors[].$message`。與 Vuelidate 欄位物件搭配使用。                                                                   |
| `BaseTextArea.vue`                | `Textarea` + `FloatLabel`                             | 多行文字輸入。                                                                                                                                                                                     |
| `BaseTextAreaWithVuelidate.vue`   | `BaseTextArea`                                        | 與 `BaseInputTextWithVuelidate` 相同的 Vuelidate 適配器模式。                                                                                                                                      |
| `BaseInputNumber.vue`             | `InputNumber`                                         | 帶有 `min` / `max` / `step` 和旋轉按鈕的數字輸入。                                                                                                                                                 |
| `BaseInputTags.vue`               | (custom)                                              | 自由文字標籤晶片；標籤於 Enter/逗號時新增，Backspace 時移除。                                                                                                                                       |
| `BaseInputGroup.vue`              | `InputGroup` + `BaseButton`                           | 搭配動作按鈕（搜尋風格）的文字輸入。                                                                                                                                                                |
| `BaseCheckbox.vue`                | `Checkbox`                                            | 帶有標籤的二元或值綁定核取方塊。                                                                                                                                                                   |
| `BaseRadioButtons.vue`            | `RadioButton`                                         | 由 `options: [{label, value}]` 陣列驅動的單選按鈕群組。                                                                                                                                           |
| `BaseToggleButton.vue`            | `BaseButton`                                          | 透過 `v-model` 綁定的二狀態按鈕（開/關標籤和圖示）。                                                                                                                                                |
| `BaseCalendar.vue`                | `DatePicker` + `FloatLabel`                           | 日期/日期時間選擇器。遵循 `platform.timepicker_increment` 以及使用 `calendarLocales` 的使用者地區設定。                                                                                             |
| `BaseColorPicker.vue`             | native `<input type="color">` + `InputText`           | 帶有十六進位文字備用的顏色選擇器；使用 `colorjs.io` 驗證手動十六進位輸入。                                                                                                                           |
| `BaseRating.vue`                  | `Rating`                                              | 星級評分輸入。                                                                                                                                                                                     |
| `BaseFileUpload.vue`              | native `<input type="file">` + `BaseButton`           | 觸發附件風格按鈕的單檔選擇器。                                                                                                                                                                     |
| `BaseFileUploadMultiple.vue`      | native `<input type="file" multiple>` + `BaseButton`  | `BaseFileUpload` 的多檔變體。                                                                                                                                                                      |
| `BaseUploader.vue`                | Uppy `Dashboard`                                      | 完整的 Uppy 上傳器（網路攝影機、音訊、影像編輯器、XHR 上傳），地區設定連接到目前的 `appLocale`。用於帶進度顯示的豐富上傳；簡單附件請使用 `BaseFileUpload*`。 |

---
### 選擇與自動完成

| 元件                      | 封裝                          | 用途                                                                                                                           |
|---------------------------|-------------------------------|--------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`          | `Dropdown` + `FloatLabel`     | 單選下拉選單，帶有可選的清除按鈕。                                                                                              |
| `BaseMultiSelect.vue`     | `MultiSelect` + `FloatLabel`  | 多選下拉選單，將選取項目顯示為晶片。                                                                                            |
| `BaseSearchSelect.vue`    | `Dropdown` with `filter`      | 單選下拉選單，內建搜尋框、可選虛擬滾動，以及兩行選項範本（`label` + `sublabel`）。                                             |
| `BaseAutocomplete.vue`    | `AutoComplete`                | 非同步自動完成（最少 3 個字元）。支援單選或多選，以及自訂晶片的 `chip` 插槽。                                                  |
| `BaseUserFinder.vue`      | `BaseTable` + `userService`   | 分頁使用者搜尋表格，帶有列選取功能。當功能需要管理員風格的使用者選擇器時使用。                                                 |

### 按鈕與動作

| 元件                              | 封裝                 | 用途                                                                                                                                                                                                                                                                                                                                                     |
|-----------------------------------|----------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                  | `Button` (PrimeVue)  | 標準 Chamilo 按鈕。透過 `chamiloIconToClass` 解析圖示，將 `type` 正規化為 PrimeVue 的 `severity`/`variant`，當提供 `route` 或 `toUrl` 時渲染內部的 `BaseAppLink`（因此同一元件可處理 router-link、錨點及純按鈕情況）。接受的 `type` 值列於 `validators.js` → `buttonTypeValidator`。 |
| `BaseAdvancedSettingsButton.vue`  | `BaseButton`         | 揭露按鈕，透過 `v-model` 切換插槽中的「進階設定」面板。                                                                                                                                                                                                                                                                                                   |
| `BaseToolbar.vue`                 | `Toolbar`            | 動作工具列，帶有 `start` / `end` 插槽（或單一預設插槽）。可選的 `showTopBorder` 用於分隔符樣式。                                                                                                                                                                                                                                                           |

---
### 顯示與資料

| 元件                  | 封裝                     | 用途                                                                                                                                                                                           |
|-----------------------|--------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`       | `DataTable` (PrimeVue)   | 標準 Chamilo 資料表格。支援伺服器端模式 (`lazy`)、多欄位排序、全域篩選、列選擇與分頁。以 `<Column>` 子元件傳遞欄位（全域註冊）。                                     |
| `BaseCard.vue`        | `Card`                   | 卡片封裝元件，轉發 `header`、`title`、`subtitle`、`footer` 與預設（內容）插槽。                                                                                      |
| `BaseChart.vue`       | `Chart`                  | 餅圖預設設定。傳遞 Chart.js 相容的 `data` 物件。                                                                                                                   |
| `BaseChip.vue`        | `Chip`                   | 從 `{value, labelField, imageField}` 物件渲染的晶片，含可選移除按鈕。                                                                                               |
| `BaseTag.vue`         | `Tag`                    | 彩色標籤。將 Chamilo 的 `warning` 對應至 PrimeVue 的 `warn`。                                                                                                     |
| `BaseAvatarList.vue`  | `Avatar` + `BaseUserAvatar` | 含溢位計數器（例如「+3」）的頭像列；由 `useAvatarList` 驅動。                                                                                                      |
| `BaseUserAvatar.vue`  | `Avatar`                 | 使用者頭像，具圖像後備、載入狀態與無障礙標籤。                                                                                                                     |
| `BaseIcon.vue`        | `<i class="mdi …">`      | Chamilo 圖示渲染器。新增可選徽章（文字或圖示）、工具提示與尺寸修飾符。始終傳遞 Chamilo 語意名稱（例如 `"edit"`），而非原始 MDI 類別。                           |
| `BaseIconField.vue`   | `IconField` + `InputText` | 帶有領先放大鏡圖示的搜尋輸入欄位。                                                                                                                               |
| `BaseDivider.vue`     | `Divider`                | 水平或垂直分隔線，含可選標題與對齊方式。                                                                                                                          |

### 導航與選單

| 元件                        | 封裝                | 用途                                                                                                                                                           |
|-----------------------------|---------------------|---------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`              | `Menu` (popup)      | 了解 `model[]` 項目內路由路徑的彈出選單。                                                                                                                   |
| `BaseDropdownMenu.vue`      | (custom)            | 輕量下拉觸發器，具單一開啟協調（開啟一個會關閉其他）。                                                                                                     |
| `BaseContextMenu.vue`       | (custom)            | 右鍵點擊 / 定位的內容選單，由 `visible` + `position` 控制。                                                                                                |
| `BaseSidebarPanelMenu.vue`  | `PanelMenu`         | 用於側邊欄的手風琴式導航選單；自動追蹤模型中的展開鍵值。                                                                                                   |
| `BaseRouteTabs.vue`         | `BaseAppLink` 列    | 各分頁為路由連結的分頁列。根據目前路由自動反白顯示作用中分頁。                                                                                            |
| `BaseAppLink.vue`           | `RouterLink` *or* `<a>` | 智慧連結：當設定 `url` 時渲染 `<a>`（外部/舊版），否則為 Vue Router `<RouterLink>`。取代原始元件以維持內部/外部連結一致性。 |

---
### 對話框

`BaseDialog` 是基礎；其他組件在其之上組合，用於常見的確認/取消和刪除流程。

| 組件                          | 包裝                       | 用途                                                                                                                               |
|-------------------------------|---------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | 具標題標頭（可選 `headerIcon`）和插槽 body/footer 的模態對話框。開啟狀態為 `defineModel("isVisible")`。                              |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | 具兩個按鈕的確認/取消模態對話框。可設定確認 `type`（嚴重性）和 `icon`；發出 `confirmClicked` / `cancelClicked` 事件。                 |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | 預建「您確定要刪除此項目嗎？」模態對話框，具危險樣式的確認按鈕。                                                                     |

### 編輯器與富內容

| 組件                  | 包裝                                                   | 用途                                                                                                                                                                  |
|-----------------------|--------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (經由專案的 `components/Editor`)               | 富文字編輯器，具 `FloatLabel`、焦點/空狀態追蹤，並與目前課程上下文 (`cidReq`) 整合。用於任何使用者編寫的 HTML 欄位。                                       |

### 輔助工具

| 檔案                | 用途                                                                                                                                                                                                                                                          |
|---------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js`   | 將語意圖示名稱（`edit`、`delete`、`eye-on`、`courses`，…）對應至 MDI CSS 類別。約 127 筆項目。在執行中的實例中於 `/admin/list-icons` 瀏覽它們。                                                                                  |
| `validators.js`     | 共用 prop 驗證器：`iconValidator`（必須為已知 Chamilo 圖示名稱）、`sizeValidator`（`normal` / `small` / `large`）、`buttonTypeValidator`（允許的 `BaseButton` 類型）。定義鏡像這些慣例的新 `Base*` 組件時匯入它們。 |

### Base 組件共通慣例

* **v-model 經由 `defineModel()`** — 值（以及常見的 `isVisible`、`filters`、`selectedItems`）暴露為模型；使用 `v-model[:name]` 傳遞，而非 `:prop` + `@update:prop`。
* **浮動標籤** — 大多數表單欄位將其輸入包裝在 PrimeVue `FloatLabel variant="on"` 中。提供 `label`（顯示文字）和 `id`（用於繫結 `<label for>`）。
* **驗證訊息** — 欄位暴露 `isInvalid` 和輸入下方的小訊息（`errorText`、`messageText` 或 `smallText`，視組件而定）。最常見的欄位有 Vuelidate 感知變體。
* **圖示** — 傳遞 Chamilo 語意名稱，而非原始 MDI 類別。組件透過 `chamiloIconToClass` 解析它們。
* **尺寸** — `size="normal" | "small" | "large"` 是慣例尺寸 prop（參見 `sizeValidator`）。
* **組合而非重複** — `BaseDialogDelete` 包裝 `BaseDialogConfirmCancel`，其包裝 `BaseDialog`；`BaseToggleButton` 和 `BaseAdvancedSettingsButton` 包裝 `BaseButton`。當您需要現有組件的重複變體時，優先在其上組合新的 `Base*`，而非在功能資料夾中重新實作。

## 版面組件

位於 `components/layout/`：

| 組件                     | 用途                             |
|--------------------------|----------------------------------|
| `DashboardLayout.vue`    | 主要版面：頂欄 + 側邊欄 + 內容區 |
| `Sidebar.vue`            | 左側導航面板（可收合）           |
| `TopbarLoggedIn.vue`     | 頂欄，具標誌、收件匣、頭像       |

---

---
## 功能區域元件

| 目錄 | 元件 | 用途 |
|-----------|-----------|---------|
| `course/` | 課程卡片、目錄篩選器、課程表單 | 課程清單與管理 |
| `session/` | 工作階段卡片、目錄 | 工作階段清單 |
| `assignments/` | 提交清單、評分模態框、表單 | 作業工作流程 |
| `chat/` | DockedChat、聊天訊息 | 即時聊天與 AI 導師 |
| `filemanager/` | CourseDocuments、PersonalFiles | 檔案瀏覽器與管理 |
| `installer/` | Step1-Step7、EmailSettings | 安裝精靈 |
| `social/` | GroupInfoCard、社群貼文 | 社群網路功能 |
| `attendance/` | AttendanceTable | 出席追蹤 |
| `usergroup/` | GroupMembers | 使用者群組管理 |

## 圖示系統

圖示使用 **Material Design Icons (MDI)** 作為唯一的圖示庫：`<i class="mdi mdi-pencil"></i>`

`ChamiloIcons.js` 檔案提供語義對應：

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

元件使用 `BaseIcon` 或參照 `chamiloIconToClass` 以一致方式呈現圖示。

平台中所有可用圖示的可瀏覽參考可在任何執行中的 Chamilo 實例的 `/admin/list-icons` 找到。

## 元件模式

* **Composition API** — 元件使用 Vue 3 的 `<script setup>` 語法
* **PrimeVue 整合** — 大量使用 PrimeVue 元件 (Button、DataTable、Dialog、Menu 等)
* **Axios 用於 API 呼叫** — 向後端 API 發送 HTTP 請求
* **Vue I18n** — 所有面向使用者的文字使用翻譯鍵值