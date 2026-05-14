# 视频会议

Chamilo 与视频会议平台集成，以便在课程中启用实时会话。

## 支持的平台

### BigBlueButton

**BigBlueButton** (BBB) 是一个专为在线学习设计的开源网络会议系统。它是与 Chamilo 一起使用最常见的视频会议解决方案。

#### 配置

1. 在单独的服务器上安装 BigBlueButton（参见 [BigBlueButton 文档](https://docs.bigbluebutton.org/)）
2. 在 BBB 服务器上使用 bbb-conf --salt 命令获取集成详情
3. 在 Chamilo 平台设置中，进入 **插件**，安装 Videoconference 插件并输入其配置以设置：
   * **BBB 服务器 URL** — 您的 BBB 服务器地址
   * **BBB salt/secret** — 您的 BBB 服务器的 API 密钥
4. 保存
5. **启用** Videoconference 插件
6. 一些特殊功能对管理员可用，请确保在 *admin_page* 区域中启用它

#### Chamilo 中可用的功能

* 从课程内启动/加入会议
* 每个课程自动创建房间
* 会议录制（如果启用）
* 屏幕共享、白板、分组讨论室
* 视频旁边的聊天

### Zoom

Chamilo 还可以与 **Zoom** 集成用于视频会议。

#### 配置

1. 在 Zoom Marketplace 中创建一个 Zoom 应用
2. 在 Chamilo 中配置 Zoom API 凭据
3. 启用 Zoom 集成

#### 工作原理

当 Zoom 配置完成后，教师可以在他们的课程内创建并启动 Zoom 会议。学习者通过 Chamilo 界面加入会议。

## 在 BBB 和 Zoom 之间选择

| 功能 | BigBlueButton | Zoom |
|---------|--------------|------|
| 成本 | 免费（开源），但需要您自己的服务器 | 需要 Zoom 订阅 |
| 托管 | 自托管 | 由 Zoom 提供云托管 |
| 集成深度 | 深度（专为 LMS 使用设计） | 标准 |
| 录制 | 服务器端，存储在您的基础设施上 | Zoom 云端或本地 |
| 白板 | 内置 | 内置 |
| 分组讨论室 | 是 | 是 |

## 小贴士

* **为 BBB 设置单独的服务器** — BigBlueButton 应在专用的独立服务器上运行以获得最佳性能，不应与 Chamilo 在同一服务器上
* **课前测试** — 在实时会话前始终测试视频会议设置
* **检查带宽** — 确保您的服务器和网络能够处理预期的并发用户数量