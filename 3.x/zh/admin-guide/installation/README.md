# 安装

本节涵盖在服务器上安装和配置 Chamilo 3.0 所需的全部内容。

Chamilo 3.0 是基于 Symfony 框架构建的 PHP 应用程序。它可以在大多数基于 Linux 的服务器上运行，也已在配备 IIS 的 Windows Server 上安装并运行，并支持 MySQL 和 MariaDB 后端。

## 安装步骤

1. **[服务器要求](server-requirements.md)** — 确认服务器满足最低要求
2. **[安装向导](installation-wizard.md)** — 运行基于 Web 的安装向导
3. **[配置](configuration.md)** — 配置环境变量和 Symfony 设置
4. **[云存储](cloud-storage.md)** — 设置云存储后端（可选）
5. **[电子邮件配置](email-configuration.md)** — 配置电子邮件投递
6. **[升级](upgrading.md)** — 从先前版本升级

## 快速概览

基本安装流程如下：

1. 下载或克隆 Chamilo 源代码
2. 若从源码准备，使用 Composer 安装 PHP 依赖
3. 使用 npm/yarn 安装 JavaScript 依赖并构建前端资源
4. 创建空的 `.env` 文件，以便稍后存储数据库凭据及其他设置
5. 更改 *var/*、*config/* 和 *.env* 的权限（使 Web 服务器可写）
6. 运行基于 Web 的安装向导
7. 使用您的第一个管理员账户登录
8. 将 *config/* 和 *.env* 的权限改回

各步骤的详细说明见上方链接的页面。