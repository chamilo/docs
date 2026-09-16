# Vue 组件

Chamilo 在 `assets/vue/components/` 中按功能区域组织了大量 Vue 组件。

## 基础组件

`assets/vue/components/basecomponents/` 中的 `Base*` 系列用 Chamilo 特定的默认值封装 PrimeVue 原语（FloatLabel 布局、通过 `chamiloIconToClass` 使用的 MDI 图标、统一的校验消息、Tailwind 尺寸）。在导入底层 PrimeVue 组件之前，应始终优先使用 `Base*` 组件——这样才能保证 SPA 中的 UI 保持一致，并能够从单一位置推广设计变更。

组件**不会**全局注册（唯一全局注册的 PrimeVue 原语是 `Column`，用于 `BaseTable` 内部）。请显式导入每一个组件：

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

### 表单输入

大多数组件通过 `v-model` 接收值，暴露 `id` + `label` 属性以便无障碍访问/浮动标签绑定，并通过 `isInvalid` / `errorText`（或 `messageText`）配对呈现校验状态。

| 组件                             | 封装                                                 | 用途                                                                                                                                                                                               |
|----------------------------------|------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`              | `InputText` + `FloatLabel`                           | 单行文本输入。对 `date`/`time`/`datetime-local` 输入切换为静态标签（浮动标签会与原生占位符重叠）。                                                                                                 |
| `BaseInputTextWithVuelidate.vue` | `BaseInputText`                                      | 轻量 Vuelidate 适配器：将 `$error` 转发到 `isInvalid`，并在 `errors` 插槽中渲染 `$errors[].$message`。与 Vuelidate 字段对象配对使用。                                                               |
| `BaseTextArea.vue`               | `Textarea` + `FloatLabel`                            | 多行文本输入。                                                                                                                                                                                     |
| `BaseTextAreaWithVuelidate.vue`  | `BaseTextArea`                                       | 与 `BaseInputTextWithVuelidate` 相同的 Vuelidate 适配器模式。                                                                                                                                      |
| `BaseInputNumber.vue`            | `InputNumber`                                        | 带 `min` / `max` / `step` 及微调按钮的数值输入。                                                                                                                                                   |
| `BaseInputTags.vue`              | （自定义）                                           | 自由文本标签芯片；按回车/逗号添加标签，按退格键删除。                                                                                                                                              |
| `BaseInputGroup.vue`             | `InputGroup` + `BaseButton`                          | 与操作按钮配对的文本输入（搜索样式）。                                                                                                                                                             |
| `BaseCheckbox.vue`               | `Checkbox`                                           | 带标签的二元或值绑定复选框。                                                                                                                                                                       |
| `BaseRadioButtons.vue`           | `RadioButton`                                        | 由 `options: [{label, value}]` 数组驱动的单选按钮组。                                                                                                                                              |
| `BaseToggleButton.vue`           | `BaseButton`                                         | 通过 `v-model` 绑定的双态按钮（开/关标签与图标）。                                                                                                                                                 |
| `BaseCalendar.vue`               | `DatePicker` + `FloatLabel`                          | 日期 / 日期时间选择器。遵循 `platform.timepicker_increment`，并通过 `calendarLocales` 使用用户区域设置。                                                                                           |
| `BaseColorPicker.vue`            | 原生 `<input type="color">` + `InputText`            | 带十六进制文本回退的颜色选择器；使用 `colorjs.io` 校验手动输入的十六进制值。                                                                                                                       |
| `BaseRating.vue`                 | `Rating`                                             | 星级评分输入。                                                                                                                                                                                     |
| `BaseFileUpload.vue`             | 原生 `<input type="file">` + `BaseButton`            | 触发附件样式按钮的单文件选择器。                                                                                                                                                                   |
| `BaseFileUploadMultiple.vue`     | 原生 `<input type="file" multiple>` + `BaseButton`   | `BaseFileUpload` 的多文件变体。                                                                                                                                                                    |
| `BaseUploader.vue`               | Uppy `Dashboard`                                     | 完整的 Uppy 上传器（摄像头、音频、图像编辑器、XHR 上传），区域设置绑定到当前 `appLocale`。用于带进度的富上传；简单附件请使用 `BaseFileUpload*`。                                                   |

### 选择与自动完成

| 组件                     | 封装                           | 用途                                                                                                                           |
|------------------------|------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`       | `Dropdown` + `FloatLabel`    | 带可选清除按钮的单选下拉框。                                                                                |
| `BaseMultiSelect.vue`  | `MultiSelect` + `FloatLabel` | 多选下拉框，将已选项显示为芯片（chips）。                                                                      |
| `BaseSearchSelect.vue` | `Dropdown` with `filter`     | 带内置搜索框的单选下拉框，可选虚拟滚动，以及两行选项模板（`label` + `sublabel`）。 |
| `BaseAutocomplete.vue` | `AutoComplete`               | 异步自动完成（最少 3 个字符）。支持单选或多选，以及用于自定义芯片的 `chip` 插槽。                  |
| `BaseUserFinder.vue`   | `BaseTable` + `userService`  | 带行选择的分页用户搜索表格。当功能需要管理风格的用户选择器时使用。                           |

### 按钮与操作

| 组件                               | 封装                  | 用途                                                                                                                                                                                                                                                                                                                                                     |
|----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                 | `Button` (PrimeVue) | 标准 Chamilo 按钮。通过 `chamiloIconToClass` 解析图标，将 `type` 规范化为 PrimeVue 的 `severity`/`variant`；在提供 `route` 或 `toUrl` 时渲染内部 `BaseAppLink`（因此同一组件可处理路由链接、锚点与普通按钮三种情况）。可接受的 `type` 值列于 `validators.js` → `buttonTypeValidator`。 |
| `BaseAdvancedSettingsButton.vue` | `BaseButton`        | 通过 `v-model` 切换插槽中“高级设置”面板的展开按钮。                                                                                                                                                                                                                                                                           |
| `BaseToolbar.vue`                | `Toolbar`           | 带 `start` / `end` 插槽（或单个默认插槽）的操作工具栏。可选 `showTopBorder` 用于分隔线样式。                                                                                                                                                                                                                                       |

### 显示与数据

| 组件                   | 封装                        | 用途                                                                                                                                                                                         |
|----------------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`      | `DataTable` (PrimeVue)      | 标准 Chamilo 数据表格。支持服务端模式（`lazy`）、多列排序、全局筛选、行选择和分页。通过作为子节点传入 `<Column>` 来定义列（已全局注册）。 |
| `BaseCard.vue`       | `Card`                      | 卡片包装器，转发 `header`、`title`、`subtitle`、`footer` 以及默认（内容）插槽。                                                                                                |
| `BaseChart.vue`      | `Chart`                     | 饼图预设。传入与 Chart.js 兼容的 `data` 对象。                                                                                                                                     |
| `BaseChip.vue`       | `Chip`                      | 由 `{value, labelField, imageField}` 对象渲染的 Chip，可选移除按钮。                                                                                                     |
| `BaseTag.vue`        | `Tag`                       | 彩色标签。将 Chamilo 的 `warning` 映射为 PrimeVue 的 `warn`。                                                                                                                               |
| `BaseAvatarList.vue` | `Avatar` + `BaseUserAvatar` | 带头像溢出计数（例如 “+3”）的头像行；由 `useAvatarList` 驱动。                                                                                                                        |
| `BaseUserAvatar.vue` | `Avatar`                    | 用户头像，带图片回退、加载状态和可访问标签。                                                                                                                           |
| `BaseIcon.vue`       | `<i class="mdi …">`         | Chamilo 图标渲染器。可添加可选徽章（文本或图标）、工具提示和尺寸修饰。始终传入 Chamilo 语义名称（例如 `"edit"`），而非原始 MDI 类名。                             |
| `BaseIconField.vue`  | `IconField` + `InputText`   | 带前置放大镜图标的搜索输入框。                                                                                                                                                     |
| `BaseDivider.vue`    | `Divider`                   | 水平或垂直分隔线，可选标题和对齐方式。                                                                                                                              |

### 导航与菜单

| 组件                       | 封装                    | 用途                                                                                                                                                                                 |
|----------------------------|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu`（弹出）          | 弹出菜单，可识别 `model[]` 项中的路由。                                                                                                                       |
| `BaseDropdownMenu.vue`     | （自定义）                | 轻量下拉触发器，带单开协调（打开一个会关闭其他）。                                                                                             |
| `BaseContextMenu.vue`      | （自定义）                | 右键 / 定位上下文菜单，由 `visible` + `position` 控制。                                                                                                            |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | 侧边栏中使用的手风琴式导航菜单；根据模型自动跟踪展开的键。                                                                                             |
| `BaseRouteTabs.vue`        | `BaseAppLink` 行       | 每个标签均为路由链接的标签栏。活动标签会根据当前路由自动高亮。                                                                        |
| `BaseAppLink.vue`          | `RouterLink` *或* `<a>` | 智能链接：设置 `url` 时渲染 `<a>`（外部/旧版），否则渲染 Vue Router 的 `<RouterLink>`。请用它替代任一原始组件，以使内部/外部链接保持一致。 |

### 对话框

`BaseDialog` 是基础组件；其余组件在其上组合，用于常见的确认/取消与删除流程。

| 组件                            | 封装                        | 用途                                                                                                                             |
|-------------------------------|---------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | 带标题栏（可选 `headerIcon`）及插槽化主体/页脚的模态对话框。打开状态通过 `defineModel("isVisible")` 暴露。      |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | 带两个按钮的确认/取消模态框。可配置确认按钮的 `type`（严重程度）和 `icon`；发出 `confirmClicked` / `cancelClicked`。 |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | 预置的“确定要删除此项吗？”模态框，确认按钮采用危险样式。                                   |

### 编辑器与富内容

| 组件                   | 封装                                              | 用途                                                                                                                                                              |
|----------------------|-------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE（通过项目的 `components/Editor`） | 富文本编辑器，带 `FloatLabel`、焦点/空状态跟踪，并与当前课程上下文（`cidReq`）集成。用于任何由用户撰写的 HTML 字段。 |

### 辅助工具

| 文件                | 用途                                                                                                                                                                                                                                                          |
|-------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js` | 将语义化图标名称（`edit`、`delete`、`eye-on`、`courses` 等）映射到 MDI CSS 类。约 127 条。可在运行实例的 `/admin/list-icons` 浏览。                                                                                                  |
| `validators.js`   | 共享的 prop 校验器：`iconValidator`（必须是已知的 Chamilo 图标名）、`sizeValidator`（`normal` / `small` / `large`）、`buttonTypeValidator`（允许的 `BaseButton` 类型）。在定义遵循这些约定的新 `Base*` 组件时导入它们。 |

### Base 组件的通用约定

* **通过 `defineModel()` 使用 v-model** — value（以及常见的 `isVisible`、`filters`、`selectedItems`）作为模型暴露；使用 `v-model[:name]` 传递，而不是 `:prop` + `@update:prop`。
* **浮动标签** — 多数表单字段将输入包裹在 PrimeVue `FloatLabel variant="on"` 中。提供 `label`（显示文本）和 `id`（用于绑定 `<label for>`）。
* **校验消息** — 字段暴露 `isInvalid`，并在输入下方显示简短消息（依组件分别为 `errorText`、`messageText` 或 `smallText`）。最常见的字段存在感知 Vuelidate 的变体。
* **图标** — 传入 Chamilo 语义名称，而非原始 MDI 类。组件通过 `chamiloIconToClass` 解析。
* **尺寸** — `size="normal" | "small" | "large"` 是约定的尺寸 prop（参见 `sizeValidator`）。
* **组合优于重复** — `BaseDialogDelete` 封装 `BaseDialogConfirmCancel`，后者封装 `BaseDialog`；`BaseToggleButton` 和 `BaseAdvancedSettingsButton` 封装 `BaseButton`。当需要现有组件的重复变体时，优先在其上组合新的 `Base*`，而不是在功能目录中重新实现。

## 布局组件

位于 `components/layout/`：

| 组件 | 用途 |
|-----------|---------|
| `DashboardLayout.vue` | 主布局：顶栏 + 侧边栏 + 内容区 |
| `Sidebar.vue` | 左侧导航面板（可折叠） |
| `TopbarLoggedIn.vue` | 带徽标、收件箱、头像的顶栏 |

## 功能领域组件

| 目录 | 组件 | 用途 |
|-----------|-----------|---------|
| `course/` | 课程卡片、目录筛选器、课程表单 | 课程列表与管理 |
| `session/` | 学期卡片、目录 | 学期列表 |
| `assignments/` | 提交列表、评分模态框、表单 | 作业工作流 |
| `chat/` | DockedChat、聊天消息 | 实时聊天与 AI 导师 |
| `filemanager/` | CourseDocuments、PersonalFiles | 文件浏览与管理 |
| `installer/` | Step1-Step7、EmailSettings | 安装向导 |
| `social/` | GroupInfoCard、社交动态 | 社交网络功能 |
| `attendance/` | AttendanceTable | 出勤跟踪 |
| `usergroup/` | GroupMembers | 用户组管理 |

## 图标系统

图标仅使用 **Material Design Icons (MDI)** 作为唯一图标库：`<i class="mdi mdi-pencil"></i>`

`ChamiloIcons.js` 文件提供语义映射：

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

组件通过 `BaseIcon` 或引用 `chamiloIconToClass` 以一致方式渲染图标。

可在任意正在运行的 Chamilo 实例中访问 `/admin/list-icons`，浏览平台中全部可用图标的参考列表。

## 组件模式

* **Composition API** — 组件使用 Vue 3 的 `<script setup>` 语法
* **PrimeVue 集成** — 大量使用 PrimeVue 组件（Button、DataTable、Dialog、Menu 等）
* **Axios 用于 API 调用** — 向后端 API 发起 HTTP 请求
* **Vue I18n** — 所有面向用户的文本均使用翻译键