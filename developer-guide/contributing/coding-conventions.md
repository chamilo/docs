# 编码规范

## PHP

* **标准**：PSR-12 编码风格
* **类型声明**：使用 PHP 8.2 类型声明（参数类型、返回类型、属性类型）
* **严格类型**：所有 PHP 文件应声明 `strict_types=1`
* **命名空间**：遵循 PSR-4 自动加载（例如，`Chamilo\CoreBundle\Entity\User`）
* **Symfony 标准**：遵循 Symfony 的编码标准和最佳实践

## JavaScript/Vue

* **ESLint + Prettier**：代码使用 ESLint 进行检查，并使用 Prettier 进行格式化；配置文件位于项目根目录的 `eslint.config.mjs`。同时启用了 `prettier-plugin-tailwindcss`，用于自动排序 Tailwind 类。
* **组合 API**：对于新组件，使用 Vue 3 的 `<script setup>` 语法
* **TypeScript**：支持 TypeScript；用于类型安全的代码

## CSS

* **Tailwind CSS**：优先使用工具类而非自定义 CSS
* **BEM 命名**：当需要自定义 CSS 时，使用 BEM 命名约定
* **SCSS**：对于复杂的样式表使用 SCSS

## PHP 静态分析和重构工具

项目提供了三种额外工具的配置：

| 工具 | 配置文件 | 用途 |
|------|------------|---------|
| **PHPStan** | `phpstan.neon` | 静态分析（级别 5，扫描 `src/` 和测试目录） |
| **Psalm** | `psalm.xml` | 第二次静态分析；每次推送时在 CI 中运行 |
| **Rector** | `rector.php` | 自动化代码转换和升级 |

通过 composer 快捷方式运行它们：`composer phpstan`，`composer psalm`。完整命令请参见[测试](../contributing/testing.md)。

## 通用规范

* **英文**：所有代码注释、变量名和文档应使用英文
* **翻译**：所有面向用户的文本应使用翻译系统（前端使用 Vue I18n，后端使用 Symfony Translator）
* **禁止魔法值**：使用常量或枚举替代硬编码值