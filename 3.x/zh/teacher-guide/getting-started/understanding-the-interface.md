# 了解界面

Chamilo 3.0 拥有简洁、现代的界面，旨在让导航保持简单。本页将详细说明界面的各个部分。

## 顶栏

![带有标注元素的顶栏，包括徽标、收件箱、支持工单和用户头像](../../.gitbook/assets/top-bar-annotated.png)

顶栏始终显示在每个页面的顶部。它包含：

* **平台徽标** — 随时点击即可返回首页。
* **收件箱图标** <img src="../../.gitbook/assets/icons/mdi-inbox.svg" alt="Inbox" data-size="line"> — 显示您的消息。红色徽章表示有未读消息。点击可打开收件箱。
* **支持工单图标** <img src="../../.gitbook/assets/icons/mdi-ticket-account.svg" alt="Support" data-size="line"> — 若管理员已启用，可通过此图标访问支持工单系统。
* **您的头像** — 位于右上角的圆形图像。点击可打开下拉菜单，其中包含个人资料、账户设置和退出登录的链接。

## 侧边栏

左侧侧边栏是您的主要导航。可以将其折叠，以便为内容区域腾出更多空间。点击其右边缘的切换箭头即可展开或折叠。Chamilo 会记住您的偏好。

侧边栏包含以下链接（部分链接可能因平台配置而被隐藏）：

![展开状态下显示全部菜单项的侧边栏导航面板](../../.gitbook/assets/sidebar-expanded.png)

| 菜单项 | 图标 | 说明 |
|-----------|------|-------------|
| **首页** | <img src="../../.gitbook/assets/icons/mdi-home.svg" alt="Home" data-size="line"> | 返回主仪表板 |
| **我的课程** | <img src="../../.gitbook/assets/icons/mdi-book-open-page-variant.svg" alt="Courses" data-size="line"> | 列出您已注册的所有课程 |
| **我的学期** | <img src="../../.gitbook/assets/icons/mdi-google-classroom.svg" alt="Sessions" data-size="line"> | 列出您的培训学期（当前、过去、即将开始） |
| **探索更多课程** | <img src="../../.gitbook/assets/icons/mdi-bookmark-multiple.svg" alt="Catalogue" data-size="line"> | 浏览课程目录以查找新课程 |
| **日程** | <img src="../../.gitbook/assets/icons/mdi-calendar-text.svg" alt="Agenda" data-size="line"> | 您的个人与课程日历 |
| **报告** | <img src="../../.gitbook/assets/icons/mdi-chart-box.svg" alt="Reporting" data-size="line"> | 访问学习者跟踪与课程报告 |
| **社交网络** | <img src="../../.gitbook/assets/icons/mdi-sitemap-outline.svg" alt="Social network" data-size="line"> | 与其他用户联系、发送消息、加入群组 |
| **视频会议** | <img src="../../.gitbook/assets/icons/mdi-video.svg" alt="Video" data-size="line"> | 访问实时视频会话（若已配置） |
| **管理** | <img src="../../.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> | 平台管理（仅管理员可见） |

在侧边栏最底部，您会找到 **退出登录** 选项，以便在完成后快速退出。该选项也可从右上角头像图标的下拉菜单中使用。
如果平台通过外部身份验证方式进行管理，这些退出登录选项可能不可用。

## 主内容区

屏幕中央区域显示当前页面的内容。在顶部，您经常会看到 **面包屑导航**，显示您在平台中的当前位置（例如：首页 > 摇滚音乐 > 文档）。使用面包屑可返回上级页面。

## 课程主页

进入课程后，您会看到 **课程主页**。详细内容见 [创建您的课程](../creating-your-course/) 一节，此处为简要概述：

* **课程标题** — 醒目显示在顶部
* **课程简介** — 可选的富文本描述，您可以编辑
* **工具网格** — 由代表课程工具的图标组成的网格（文档、练习、论坛等）

作为教师，您还会看到额外控件：

* **学生视图** <img src="../../.gitbook/assets/icons/mdi-eye.svg" alt="Student view" data-size="line"> — 切换此项以查看学生所见的课程界面
* **编辑简介** <img src="../../.gitbook/assets/icons/mdi-pencil.svg" alt="Edit" data-size="line"> — 编辑课程简介文本
* **全部显示 / 全部隐藏** — 快速更改所有工具对学生的可见性
* **排序** — 启用拖放以重新排列主页上的工具

## 图标颜色

该功能在 Chamilo 3.0 中仍处于实验阶段，尚未完全实现，但我们正尝试在界面中的所有按钮和操作图标上遵循以下规则：

* **绿色** 用于创建类操作。包括添加、创建、导入、评分、保存和复制内容。
* **蓝色** 用于查看类操作。包括导出、查看、在列表或详情视图中预览、搜索和下载。
* **橙色** 用于编辑类操作。包括编辑、移动、配置、启用/禁用、隐藏和显示。
* **红色** 用于删除/移除类操作。包括删除、移除、取消订阅。
* **灰色** 用于取消类操作。即保持现状、不做更改。

## 响应式设计

Chamilo 3.0 可适配不同屏幕尺寸。在移动设备或较窄的浏览器窗口中：

* 侧边栏默认隐藏，可通过点按菜单图标打开
* 课程卡片以单列显示，而非网格布局
* 表格可横向滚动

这意味着您和学习者可以从手机、平板或电脑访问平台，但界面体验可能会略有不同。