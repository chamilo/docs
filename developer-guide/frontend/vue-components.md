# Vue 组件

Chamilo 拥有一套庞大的 Vue 组件集合，按功能区域组织在 `assets/vue/components/` 目录下。

## 基础组件

`Base*` 系列组件位于 `assets/vue/components/basecomponents/` 目录中，它们封装了 PrimeVue 的基本元素，并应用了 Chamilo 特定的默认设置（FloatLabel 布局、通过 `chamiloIconToClass` 实现的 MDI 图标、一致的验证消息、Tailwind 尺寸调整）。在导入底层的 PrimeVue 组件之前，始终优先使用 `Base*` 组件——这是保持整个 SPA 用户界面一致性的方法，也是从单一位置推出设计变更的方式。

组件**不**是全局注册的（唯一全局注册的 PrimeVue 基本元素是 `Column`，用于 `BaseTable` 内部）。需要明确导入每个组件：

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

### 表单输入控件

大多数控件通过 `v-model` 接受值，暴露 `id` 和 `label` 属性以支持无障碍性和浮动标签绑定，并通过 `isInvalid` / `errorText`（或 `messageText`）组合来显示验证信息。

| 组件                              | 封装对象                                             | 用途                                                                                                                                                                                                 |
|----------------------------------|------------------------------------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`              | `InputText` + `FloatLabel`                           | 单行文本输入。对于 `date`/`time`/`datetime-local` 输入类型，切换为静态标签（以避免浮动标签与原生占位符重叠）。                                                                                 |
| `BaseInputTextWithVuelidate.vue` | `BaseInputText`                                      | 轻量级 Vuelidate 适配器：将 `$error` 转发到 `isInvalid`，并在 `errors` 插槽中渲染 `$errors[].$message`。需与 Vuelidate 字段对象搭配使用。                                                          |
| `BaseTextArea.vue`               | `Textarea` + `FloatLabel`                            | 多行文本输入。                                                                                                                                                                                       |
| `BaseTextAreaWithVuelidate.vue`  | `BaseTextArea`                                       | 与 `BaseInputTextWithVuelidate` 相同的 Vuelidate 适配器模式。                                                                                                                                        |
| `BaseInputNumber.vue`            | `InputNumber`                                        | 数字输入，支持 `min` / `max` / `step` 以及旋转按钮。                                                                                                                                                 |
| `BaseInputTags.vue`              | （自定义）                                           | 自由文本标签芯片；通过回车或逗号添加标签，通过退格键删除标签。                                                                                                                                       |
| `BaseInputGroup.vue`             | `InputGroup` + `BaseButton`                          | 文本输入与操作按钮（搜索样式）组合。                                                                                                                                                                 |
| `BaseCheckbox.vue`               | `Checkbox`                                           | 二进制或值绑定的复选框，带有标签。                                                                                                                                                                   |
| `BaseRadioButtons.vue`           | `RadioButton`                                        | 一组单选按钮，由 `options: [{label, value}]` 数组驱动。                                                                                                                                              |
| `BaseToggleButton.vue`           | `BaseButton`                                         | 双状态按钮（开/关标签和图标），通过 `v-model` 绑定。                                                                                                                                                 |
| `BaseCalendar.vue`               | `DatePicker` + `FloatLabel`                          | 日期/日期时间选择器。遵循 `platform.timepicker_increment` 以及用户的语言环境，通过 `calendarLocales` 设置。                                                                                      |
| `BaseColorPicker.vue`            | 原生 `<input type="color">` + `InputText`            | 颜色选择器，带有十六进制文本回退；使用 `colorjs.io` 验证手动输入的十六进制值。                                                                                                                       |
| `BaseRating.vue`                 | `Rating`                                             | 星级评分输入。                                                                                                                                                                                       |
| `BaseFileUpload.vue`             | 原生 `<input type="file">` + `BaseButton`            | 单文件选择器，触发附件样式按钮。                                                                                                                                                                     |
| `BaseFileUploadMultiple.vue`     | 原生 `<input type="file" multiple>` + `BaseButton`   | `BaseFileUpload` 的多文件变体。                                                                                                                                                                      |
| `BaseUploader.vue`               | Uppy `Dashboard`                                     | 完整的 Uppy 上传器（支持摄像头、音频、图像编辑器、XHR 上传），语言环境与当前 `appLocale` 绑定。适用于带有进度显示的丰富上传；对于简单附件使用 `BaseFileUpload*`。                                  |

### 选择与自动补全

| 组件                     | 封装                         | 用途                                                                                                                               |
|--------------------------|------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`         | `Dropdown` + `FloatLabel`    | 单选下拉菜单，带有可选的清除按钮。                                                                                       |
| `BaseMultiSelect.vue`    | `MultiSelect` + `FloatLabel` | 多选下拉菜单，将所选项显示为芯片样式。                                                                                   |
| `BaseSearchSelect.vue`   | `Dropdown` 带有 `filter`     | 单选下拉菜单，内置搜索框，支持可选的虚拟滚动和双行选项模板（`label` + `sublabel`）。                                      |
| `BaseAutocomplete.vue`   | `AutoComplete`               | 异步自动补全（至少输入3个字符）。支持单选或多选，并提供 `chip` 插槽以自定义芯片样式。                                     |
| `BaseUserFinder.vue`     | `BaseTable` + `userService`  | 分页的用户搜索表格，支持行选择。适用于需要管理员风格的用户选择器功能的场景。                                               |

### 按钮与操作

| 组件                             | 封装                 | 用途                                                                                                                                                                                                                                                                                                                                                     |
|----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                 | `Button` (PrimeVue) | 标准的 Chamilo 按钮。通过 `chamiloIconToClass` 解析图标，将 `type` 标准化为 PrimeVue 的 `severity`/`variant`，当提供 `route` 或 `toUrl` 时渲染内部的 `BaseAppLink`（因此同一个组件可以处理 router-link、anchor 和普通按钮的情况）。支持的 `type` 值列在 `validators.js` → `buttonTypeValidator` 中。 |
| `BaseAdvancedSettingsButton.vue` | `BaseButton`        | 披露按钮，通过 `v-model` 切换插槽中的“高级设置”面板。                                                                                                                                                                                                                                                                           |
| `BaseToolbar.vue`                | `Toolbar`           | 带有 `start` / `end` 插槽（或单个默认插槽）的操作工具栏。可选的 `showTopBorder` 用于分隔线样式。                                                                                                                                                                                                                                       |

### 显示与数据

| 组件                  | 封装                        | 用途                                                                                                                                                                                             |
|----------------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`      | `DataTable` (PrimeVue)      | 标准的 Chamilo 数据表格。支持服务器端模式（`lazy`）、多列排序、全局过滤、行选择和分页。通过 `<Column>` 子组件传递列（全局注册）。 |
| `BaseCard.vue`       | `Card`                      | 卡片包装器，转发 `header`、`title`、`subtitle`、`footer` 和默认（内容）插槽。                                                                                                                    |
| `BaseChart.vue`      | `Chart`                     | 饼图预设。传递一个与 Chart.js 兼容的 `data` 对象。                                                                                                                                              |
| `BaseChip.vue`       | `Chip`                      | 基于 `{value, labelField, imageField}` 对象渲染的芯片，带有可选的删除按钮。                                                                                                                     |
| `BaseTag.vue`        | `Tag`                       | 彩色标签。将 Chamilo 的 `warning` 映射到 PrimeVue 的 `warn`。                                                                                                                                    |
| `BaseAvatarList.vue` | `Avatar` + `BaseUserAvatar` | 带有溢出计数器的头像行（例如 "+3"）；由 `useAvatarList` 驱动。                                                                                                                                  |
| `BaseUserAvatar.vue` | `Avatar`                    | 用户头像，带有图像回退、加载状态和可访问标签。                                                                                                                                                 |
| `BaseIcon.vue`       | `<i class="mdi …">`         | Chamilo 图标渲染器。添加可选的徽章（文本或图标）、工具提示和大小修饰符。始终传递 Chamilo 语义名称（例如 `"edit"`），而不是原始 MDI 类。                                                         |
| `BaseIconField.vue`  | `IconField` + `InputText`   | 带有前置放大镜图标的搜索输入框。                                                                                                                                                               |
| `BaseDivider.vue`    | `Divider`                   | 水平或垂直分隔线，带有可选标题和对齐方式。                                                                                                                                                     |

### 导航与菜单

| 组件                       | 封装                    | 用途                                                                                                                                                                                     |
|----------------------------|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | 弹出菜单，理解 `model[]` 项目中的路由器路由。                                                                                                                                           |
| `BaseDropdownMenu.vue`     | (custom)                | 轻量级下拉触发器，具有单一打开协调（打开一个会关闭其他）。                                                                                                                               |
| `BaseContextMenu.vue`      | (custom)                | 右键/定位上下文菜单，由 `visible` + `position` 控制。                                                                                                                                   |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | 侧边栏中使用的折叠式导航菜单；自动从模型中跟踪展开的键。                                                                                                                                 |
| `BaseRouteTabs.vue`        | `BaseAppLink` row       | 标签栏，每个标签都是一个路由器链接。当前路由会自动高亮活动标签。                                                                                                                         |
| `BaseAppLink.vue`          | `RouterLink` *或* `<a>` | 智能链接：当设置了 `url` 时渲染为 `<a>`（外部/遗留），否则为 Vue Router 的 `<RouterLink>`。使用它代替任一原始组件，以便内部/外部链接保持统一。                                             |

### 对话框

`BaseDialog` 是基础组件，其他组件在其之上构建，用于常见的确认/取消和删除流程。

| 组件                          | 封装                      | 用途                                                                                                                               |
|-------------------------------|---------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | 带有标题头部的模态对话框（可选 `headerIcon`）和插槽式主体/底部。打开状态通过 `defineModel("isVisible")` 控制。                |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | 带有两个按钮的确认/取消模态框。可配置确认按钮的 `type`（严重性）和 `icon`；触发 `confirmClicked` / `cancelClicked` 事件。     |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | 预构建的“您确定要删除此项目吗？”模态框，确认按钮采用危险样式。                                                             |

### 编辑器与富内容

| 组件                 | 封装                                            | 用途                                                                                                                |
|----------------------|-------------------------------------------------|--------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE（通过项目的 `components/Editor`）       | 富文本编辑器，带有 `FloatLabel`，支持焦点/空状态跟踪，并与当前课程上下文（`cidReq`）集成。用于任何用户编写的 HTML 字段。 |

### 辅助工具

| 文件              | 用途                                                                                                                                                                                                 |
|-------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js` | 将语义图标名称（`edit`、`delete`、`eye-on`、`courses` 等）映射到 MDI CSS 类。约 127 个条目。可在运行实例的 `/admin/list-icons` 页面浏览。                                                      |
| `validators.js`   | 共享属性验证器：`iconValidator`（必须是已知的 Chamilo 图标名称），`sizeValidator`（`normal` / `small` / `large`），`buttonTypeValidator`（允许的 `BaseButton` 类型）。在定义新的 `Base*` 组件时导入它们，以遵循这些约定。 |

### Base 组件的通用约定

* **通过 `defineModel()` 实现 v-model** — 值（以及常见的 `isVisible`、`filters`、`selectedItems`）作为模型暴露；使用 `v-model[:name]` 传递，而不是 `:prop` + `@update:prop`。
* **浮动标签** — 大多数表单字段将其输入框封装在 PrimeVue 的 `FloatLabel variant="on"` 中。提供 `label`（显示文本）和 `id`（用于绑定 `<label for>`）。
* **验证消息** — 字段暴露 `isInvalid` 状态，并在输入框下方显示小型消息（根据组件不同，可能为 `errorText`、`messageText` 或 `smallText`）。常见组件提供支持 Vuelidate 的变体。
* **图标** — 传递 Chamilo 语义名称，而不是原始 MDI 类。组件通过 `chamiloIconToClass` 解析它们。
* **尺寸** — `size="normal" | "small" | "large"` 是常规尺寸属性（参见 `sizeValidator`）。
* **组合而非重复** — `BaseDialogDelete` 封装 `BaseDialogConfirmCancel`，后者又封装 `BaseDialog`；`BaseToggleButton` 和 `BaseAdvancedSettingsButton` 封装 `BaseButton`。当需要现有组件的重复变体时，优先在其上组合新的 `Base*`，而不是在功能文件夹中重新实现。

## 布局组件

位于 `components/layout/`：

| 组件                  | 用途                              |
|-----------------------|-----------------------------------|
| `DashboardLayout.vue` | 主布局：顶部栏 + 侧边栏 + 内容区域 |
| `Sidebar.vue`         | 左侧导航面板（可折叠）            |
| `TopbarLoggedIn.vue`  | 顶部栏，包含logo、收件箱、头像     |

## 功能区域组件

| 目录 | 组件 | 用途 |
|-----------|-----------|---------|
| `course/` | 课程卡片、目录过滤器、课程表单 | 课程列表和管理 |
| `session/` | 会话卡片、目录 | 会话列表 |
| `assignments/` | 提交列表、评分弹窗、表单 | 作业流程 |
| `chat/` | DockedChat、聊天消息 | 实时聊天和AI导师 |
| `filemanager/` | CourseDocuments、PersonalFiles | 文件浏览器和管理 |
| `installer/` | Step1-Step7、EmailSettings | 安装向导 |
| `social/` | GroupInfoCard、社交帖子 | 社交网络功能 |
| `attendance/` | AttendanceTable | 出勤跟踪 |
| `usergroup/` | GroupMembers | 用户组管理 |

## 图标系统

图标使用 **Material Design Icons (MDI)** 作为唯一的图标库：`<i class="mdi mdi-pencil"></i>`

`ChamiloIcons.js` 文件提供了语义映射：

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

组件使用 `BaseIcon` 或引用 `chamiloIconToClass` 来一致地渲染图标。

在任何运行中的 Chamilo 实例中，可以在 `/admin/list-icons` 找到平台上所有可用图标的可浏览参考。

## 组件模式

* **组合 API** — 组件使用 Vue 3 的 `<script setup>` 语法
* **PrimeVue 集成** — 大量使用 PrimeVue 组件（Button、DataTable、Dialog、Menu 等）
* **Axios 用于 API 调用** — 向后端 API 发起 HTTP 请求
* **Vue I18n** — 所有面向用户的文本使用翻译键