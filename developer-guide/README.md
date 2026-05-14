# 开发者指南

欢迎阅读 Chamilo 2.0 开发者指南。本指南面向希望了解 Chamilo 架构、通过插件扩展平台、使用 API、自定义界面或为项目做出贡献的开发者。

## 架构概览

Chamilo 2.0 基于以下技术构建：

* **后端**：Symfony 6.4 (PHP 8.2+)，使用 Doctrine ORM 和 API Platform 3.0
* **前端**：Vue 3，搭配 PrimeVue、Pinia 状态管理和 Vue Router
* **构建系统**：通过 Symfony Webpack Encore 使用 Webpack 5，结合 Tailwind CSS
* **认证**：JWT 令牌 (lexik/jwt-authentication-bundle)
* **文件存储**：Flysystem（支持本地、AWS S3、Azure Blob、Google Cloud）

代码库组织为三个 Symfony 包：

| 包名 | 用途 |
|--------|---------|
| **CoreBundle** | 平台核心：用户、设置、资源、管理、AI 提供商、安全 |
| **CourseBundle** | 课程相关功能：文档、练习、学习路径、论坛等 |
| **LtiBundle** | LTI 1.3 集成，用于外部学习工具 |

## 本指南的组织结构

1. **入门** — 技术栈、开发环境设置、项目结构
2. **后端** — Symfony 架构、实体、资源系统、控制器、设置
3. **API** — 通过 API Platform 实现的 REST API、JWT 认证、自定义操作
4. **前端** — Vue 组件、视图、路由、状态管理、构建系统
5. **主题定制** — 颜色主题、CSS/Tailwind、Twig 模板
6. **插件** — 插件架构与开发
7. **贡献** — 编码规范、git 工作流程、测试