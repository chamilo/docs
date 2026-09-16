# 开发者指南

欢迎阅读 Chamilo 3.0 开发者指南。本指南面向希望了解 Chamilo 架构、通过插件扩展平台、使用 API、自定义界面或为项目做出贡献的开发者。

## 架构速览

Chamilo 3.0 基于以下技术构建：

* **后端**：Symfony 7.4（PHP 8.3–8.5），配合 Doctrine ORM 与 API Platform 4
* **前端**：Vue 3，配合 PrimeVue、Pinia 状态管理以及 Vue Router
* **构建系统**：通过 Symfony Webpack Encore 使用 Webpack 5，并配合 Tailwind CSS
* **身份认证**：JWT 令牌（lexik/jwt-authentication-bundle）
* **文件存储**：Flysystem（支持本地、AWS S3、Azure Blob、Google Cloud）

代码库组织为三个 Symfony bundle：

| Bundle | 用途 |
|--------|---------|
| **CoreBundle** | 平台核心：用户、设置、资源、管理、AI 提供商、安全 |
| **CourseBundle** | 课程相关功能：文档、练习、学习路径、论坛等 |
| **LtiBundle** | 面向外部学习工具的 LTI 1.3 集成 |

## 本指南的组织结构

1. **入门** — 技术栈、开发环境搭建、项目结构
2. **后端** — Symfony 架构、实体、资源系统、控制器、设置
3. **API** — 基于 API Platform 的 REST API、JWT 身份认证、自定义操作
4. **前端** — Vue 组件、视图、路由、状态管理、构建系统
5. **主题** — 配色主题、CSS/Tailwind、Twig 模板
6. **插件** — 插件架构与开发
7. **贡献** — 编码规范、git 工作流、测试