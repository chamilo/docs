# 视频会议

Chamilo 可与视频会议平台集成，以便在课程中开展实时会话。

## 支持的平台

### BigBlueButton

**BigBlueButton**（BBB）是一套面向在线学习的开源网络会议系统。它是与 Chamilo 搭配使用最普遍的视频会议方案。

#### 配置

1. 在独立服务器上安装 BigBlueButton（参见 [BigBlueButton 文档](https://docs.bigbluebutton.org/)）
2. 在 BBB 服务器上使用 bbb-conf --salt 获取集成所需信息
3. 在 Chamilo 平台设置的 **Plugins** 中，安装 Videoconference 插件并填写其配置：
   * **BBB server URL** — BBB 服务器地址
   * **BBB salt/secret** — 来自 BBB 服务器的 API 密钥
4. 保存
5. **启用** Videoconference 插件
6. 部分特殊功能仅对管理员开放，请确保在 *admin_page* 区域中启用该插件

#### Chamilo 中可用的功能

* 在课程内开始/加入会议
* 按课程自动创建房间
* 会议录制（若已启用）
* 屏幕共享、白板、分组讨论室
* 与视频并行的聊天

### Zoom

Chamilo 也可与 **Zoom** 集成以开展视频会议。

#### 配置

1. 在 Zoom Marketplace 中创建 Zoom 应用
2. 在 Chamilo 中配置 Zoom API 凭据
3. 启用 Zoom 集成

#### 工作方式

配置 Zoom 后，教师可在课程内创建并启动 Zoom 会议。学习者通过 Chamilo 界面加入。

## 在 BBB 与 Zoom 之间选择

| 功能 | BigBlueButton | Zoom |
|---------|--------------|------|
| 成本 | 免费（开源），但需自备服务器 | 需要 Zoom 订阅 |
| 托管 | 自托管 | 由 Zoom 云托管 |
| 集成深度 | 深度（面向 LMS 使用构建） | 标准 |
| 录制 | 服务端，存储于自有基础设施 | Zoom 云端或本地 |
| 白板 | 内置 | 内置 |
| 分组讨论室 | 是 | 是 |

## 提示

* **为 BBB 使用独立服务器** — BigBlueButton 应运行在专用服务器上以获得最佳性能，不要与 Chamilo 部署在同一台服务器
* **上课前先测试** — 在正式实时会话前务必测试视频会议配置
* **检查带宽** — 确保服务器与网络能够支撑预期的并发用户数