# 了解界面

Chamilo 2.0 拥有简洁、现代的界面设计，旨在保持导航的简便性。本页面详细解释了界面的各个部分。

## 顶部栏

![顶部栏，标注了包括logo、收件箱、支持票据和用户头像在内的元素](/.gitbook/assets/top-bar-annotated.png)

顶部栏始终显示在每个页面的顶部。它包含以下内容：

* **平台logo** — 点击它可以随时返回首页。
* **收件箱图标** <img src="/.gitbook/assets/icons/mdi-inbox.svg" alt="收件箱" data-size="line"> — 显示您的消息。红色标记表示有未读消息。点击打开收件箱。
* **支持票据图标** <img src="/.gitbook/assets/icons/mdi-ticket-account.svg" alt="支持" data-size="line"> — 如果管理员启用了此功能，您可以通过它访问支持票据系统。
* **您的头像** — 位于右上角的圆形图像。点击它可以打开下拉菜单，包含指向您的个人资料、账户设置和注销的链接。

## 侧边栏

左侧的侧边栏是您的主要导航工具。它可以折叠以给内容区域腾出更多空间。点击侧边栏右侧边缘的切换箭头可以展开或折叠它。Chamilo 会记住您的偏好。

侧边栏包含以下链接（根据您平台的配置，某些链接可能被隐藏）：

![侧边栏导航面板，处于展开状态，显示所有菜单项](/.gitbook/assets/sidebar-expanded.png)

| 菜单项 | 图标 | 描述 |
|-----------|------|-------------|
| **首页** | <img src="/.gitbook/assets/icons/mdi-home.svg" alt="首页" data-size="line"> | 返回主仪表板 |
| **我的课程** | <img src="/.gitbook/assets/icons/mdi-book-open-page-variant.svg" alt="课程" data-size="line"> | 列出您已注册的所有课程 |
| **我的会话** | <img src="/.gitbook/assets/icons/mdi-google-classroom.svg" alt="会话" data-size="line"> | 列出您的培训会话（当前、过去、即将到来） |
| **探索更多课程** | <img src="/.gitbook/assets/icons/mdi-bookmark-multiple.svg" alt="目录" data-size="line"> | 浏览课程目录以查找新课程 |
| **日程** | <img src="/.gitbook/assets/icons/mdi-calendar-text.svg" alt="日程" data-size="line"> | 您的个人和课程日历 |
| **报告** | <img src="/.gitbook/assets/icons/mdi-chart-box.svg" alt="报告" data-size="line"> | 访问学习者跟踪和课程报告 |
| **社交网络** | <img src="/.gitbook/assets/icons/mdi-sitemap-outline.svg" alt="社交网络" data-size="line"> | 与其他用户联系、发送消息、加入群组 |
| **视频会议** | <img src="/.gitbook/assets/icons/mdi-video.svg" alt="视频" data-size="line"> | 访问实时视频会话（如果已配置） |
| **管理** | <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="管理" data-size="line"> | 平台管理（仅对管理员可见） |

在侧边栏的最底部，您会找到一个**注销**选项，用于在完成操作后快速注销。此选项也可以通过右上角头像图标的下拉菜单访问。如果平台通过外部身份验证方法管理，这些注销选项可能不可用。

## 主内容区域

屏幕中央区域显示当前页面的内容。在顶部，您通常会看到一个**面包屑导航**，显示您在平台中的当前位置（例如：首页 > 摇滚音乐 > 文档）。使用面包屑导航可以返回到上级页面。

## 课程首页

当您进入一门课程时，您会看到**课程首页**。这部分内容在[创建您的课程](../creating-your-course/)章节中有详细介绍，但以下是简要概述：

* **课程标题** — 在顶部显眼位置显示
* **课程简介** — 可选的富文本描述，您可以进行编辑
* **工具网格** — 代表课程工具（文档、练习、论坛等）的图标网格

作为教师，您将看到额外的控制选项：

* **学生视图** <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="学生视图" data-size="line"> — 切换此选项以查看学生视角下的课程
* **编辑简介** <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="编辑" data-size="line"> — 编辑课程简介文本
* **显示全部 / 隐藏全部** — 快速更改所有工具对学生的可见性
* **排序** — 启用拖放功能以重新排列首页上的工具顺序

## 图标颜色

这在 Chamilo 2.0 中仍处于实验阶段，尚未完全完善，但我们尝试在界面中的所有按钮和操作图标上应用以下规则：

* **绿色** 用于创建操作。包括添加、创建、导入、评分、保存和复制内容。
* **蓝色** 用于查看操作。包括导出、查看、预览（在列表或详细视图中）、搜索和下载。
* **橙色** 用于编辑操作。包括编辑、移动、配置、启用/禁用、隐藏和显示。
* **红色** 用于删除/移除操作。包括删除、移除、取消订阅。
* **灰色** 用于取消操作。仅仅是保持现状。

## 响应式设计

Chamilo 2.0 能够适应不同的屏幕尺寸。在移动设备或窄小的浏览器窗口上：

* 侧边栏默认隐藏，可通过点击菜单图标打开
* 课程卡片以单列显示，而非网格布局
* 表格变为可水平滚动

这意味着您和您的学习者可以从手机、平板电脑或电脑访问平台，但可能会体验到略有不同的界面。