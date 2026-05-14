# 开发设置

## 前提条件

* PHP 8.2+，需包含以下扩展：intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js 和 npm（或 Yarn — 项目使用 Yarn 4；具体版本请参见 `package.json` 中的固定版本）
* MySQL 5.7+ 或 MariaDB 10.11+
* Git

## 安装步骤

### 1. 克隆代码库

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. 安装 PHP 依赖

```bash
composer install
```

### 3. 配置环境

代码库中提供了 `.env.dist` 作为参考。创建一个空的 `.env` 文件，Web 安装程序会填充该文件 — 保持为空可确保升级时不会覆盖您的本地配置：

```bash
touch .env
```

然后使 `.env` 和 `config/` 目录对 Web 服务器具有可写权限，以便安装程序可以写入您的本地配置：

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. 安装前端依赖并构建

```bash
# 安装 JavaScript 依赖
yarn install

# 为开发环境构建前端资源
yarn encore dev

# 或在开发过程中监听变化
yarn encore dev --watch
```

### 5. 启动开发服务器

```bash
symfony server:start
```

或者使用 Apache/Nginx 指向 `public/` 目录。

### 6. 设置数据库

通过浏览器访问您的 Chamilo URL，运行基于 Web 的安装向导。

### 7. 生成 JWT 密钥

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. 保护您的系统

`.env` 文件和 `config/` 目录仅在安装期间需要可写权限。安装完成后请保护它们：

```bash
sudo chown -R root: .env config/
```

`var/` 目录需要保持对 Web 服务器的可写权限。

## 构建命令

| 命令 | 用途 |
|---------|---------|
| `yarn encore dev` | 为开发环境构建前端 |
| `yarn encore dev --watch` | 构建并监听变化 |
| `yarn encore production` | 为生产环境优化构建 |
| `php bin/console cache:clear` | 清除 Symfony 缓存 |

## 开发提示

* 在 `.env` 中设置 `APP_ENV=dev` 和 `APP_DEBUG=1` 以获取详细的错误信息
* 在开发模式下，Symfony 调试工具栏会显示在页面底部
* 当 `APP_ENABLE_API_ENTRYPOINT=1` 时，API 文档可在 `/api` 访问
* 使用 `yarn encore dev --watch` 自动重新构建前端更改