# 技术栈

以下描述 Chamilo 3.0 的技术栈。此处所列版本很可能随 Chamilo 新版本发布而变化。版本号采用 [Composer 的版本表示法](https://getcomposer.org/doc/articles/versions.md)，该表示法设定规则，以便在版本方面保留一定灵活性。

计入层级依赖后，Chamilo 使用数百个自由软件库。本列表仅包含我们使用最多、且很可能每周都会影响 Chamilo 开发者工作的那些库。我们感谢所有其他自由软件开发者，他们使我们的工作更轻松、更易维护、也更安全。

## 后端

| 技术 | 版本 | 用途 |
|-----------|---------|---------|
| PHP | 8.3 – 8.5 | 运行时 |
| Symfony | 7.4.* | 框架 |
| Doctrine ORM | ^3.3 | 数据库抽象 |
| API Platform | ^4.2 | REST API 框架 |
| oneup/flysystem-bundle | ~4.0 | 文件存储抽象 |
| vich/uploader-bundle | ^2.8 | 文件上传处理 |
| stof/doctrine-extensions-bundle | ^1.12 | Doctrine 扩展（树形、时间戳、别名） |
| lexik/jwt-authentication-bundle | ^2.20 | JWT 认证 |
| nelmio/cors-bundle | ^2.2 | CORS 头 |
| mpdf/mpdf | ~8.0 | PDF 生成 |
| phpoffice/phpspreadsheet | ~1.16 | Excel/电子表格处理 |
| firebase/php-jwt | ^7.0 | JWT 令牌处理 |
| bigbluebutton/bigbluebutton-api-php | ^2.0 | BigBlueButton 集成 |
| packbackbooks/lti-1p3-tool | ^6.4 | LTI 1.3 实现 |

## 前端

| 技术 | 版本 | 用途 |
|-----------|---------|---------|
| Vue.js | ^3.5 | UI 框架 |
| PrimeVue | ^4.5 | 组件库 |
| Pinia | ^3.0 | 状态管理 |
| Vue Router | ^5.1 | 客户端路由 |
| Vue I18n | ^11.4 | 国际化 |
| Axios | ^1.16 | HTTP 客户端 |
| TinyMCE | ^5.10 | 富文本编辑器 |
| Chart.js | ^4.5 | 图表与可视化 |
| FullCalendar | ^6.1 | 日历组件 |
| Uppy | ^4.5 | 文件上传控件 |

## 构建工具

| 技术 | 版本 | 用途 |
|-----------|---------|---------|
| Composer | ^2.8 | PHP 依赖管理器 |
| Webpack | ^5.107 | 模块打包器 |
| Symfony Webpack Encore | ^5.3 | 面向 Symfony 的 Webpack 封装 |
| Tailwind CSS | ^3.4 | 实用优先的 CSS 框架 |
| Sass | ^1.100 | CSS 预处理器 |
| TypeScript | ^5.9 | 类型安全的 JavaScript |
| ESLint | ^10.0 | 代码检查 |
| Prettier | 3.8 | 代码格式化 |

## 图标

| 库 | 版本 | 用法 |
|---------|---------|-------|
| @mdi/font | 7.4.47 | Material Design Icons（CSS 类 `mdi mdi-*`） |

## 数据库

Chamilo 支持：

* MySQL 5.7+
* MariaDB 10.11.2+

## 云存储

通过 Flysystem 适配器：

* 本地文件系统（默认）
* AWS S3 (`league/flysystem-aws-s3-v3`)
* Azure Blob Storage (`azure-oss/storage-blob-flysystem`)
* Google Cloud Storage (`league/flysystem-google-cloud-storage`)