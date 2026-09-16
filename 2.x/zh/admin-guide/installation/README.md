# 安装

本节涵盖了在您的服务器上安装和配置 Chamilo 2.0 所需的所有内容。

Chamilo 2.0 是一个基于 Symfony 框架构建的 PHP 应用程序。它可以在大多数基于 Linux 的服务器上运行，也已在 Windows Server 上通过 IIS 安装和运行，并支持 MySQL 和 MariaDB 后端。

## 安装步骤

1. **[服务器要求](server-requirements.md)** — 验证您的服务器是否满足最低要求
2. **[安装向导](installation-wizard.md)** — 运行基于网页的安装向导
3. **[配置](configuration.md)** — 配置环境变量和 Symfony 设置
4. **[云存储](cloud-storage.md)** — 设置云存储后端（可选）
5. **[电子邮件配置](email-configuration.md)** — 配置电子邮件发送
6. **[升级](upgrading.md)** — 从旧版本升级

## 快速概览

基本安装过程如下：

1. 下载或克隆 Chamilo 源代码
2. 如果从源代码准备，使用 Composer 安装 PHP 依赖项
3. 使用 npm/yarn 安装 JavaScript 依赖项并构建前端资源
4. 创建一个空的 `.env` 文件，以便稍后存储数据库凭据和其他设置
5. 更改 *var/*、*config/* 和 *.env* 的权限（需可被 Web 服务器写入）
6. 运行基于网页的安装向导
7. 使用您的第一个管理员账户进行连接
8. 恢复 *config/* 和 *.env* 的权限设置

每个步骤的详细说明请参见上面链接的页面。