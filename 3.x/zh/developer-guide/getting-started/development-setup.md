# 开发环境搭建

## 先决条件

* PHP 8.3、8.4 或 8.5，并启用扩展：intl、gd、curl、zip、mbstring、xml、json、pdo、ldap、exif、bcmath
* Composer
* Node.js 和 npm（或 Yarn — 本项目使用 Yarn 4；确切的固定版本见 `package.json`）
* MySQL 5.7+ 或 MariaDB 10.11+
* Git

## 安装步骤

### 1. 克隆仓库

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. 安装 PHP 依赖

```bash
composer install
```

### 3. 配置环境

仓库随附 `.env.dist` 作为参考。请创建一个空的 `.env` 文件，由 Web 安装程序填充 — 保持为空可确保升级时不会覆盖本地配置：

```bash
touch .env
```

然后使 `.env` 和 `config/` 对 Web 服务器可写，以便安装程序写入本地配置：

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. 安装前端依赖并构建

```bash
# Install JavaScript dependencies
yarn install

# Build frontend assets for development
yarn encore dev

# Or watch for changes during development
yarn encore dev --watch
```

### 5. 启动开发服务器

```bash
symfony server:start
```

或使用 Apache/Nginx，将文档根目录指向 `public/`。

### 6. 设置数据库

在浏览器中访问您的 Chamilo URL，运行基于 Web 的安装向导。

### 7. 生成 JWT 密钥

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. 加固系统

`.env` 文件和 `config/` 目录仅需在安装期间可写。安装完成后请收紧权限：

```bash
sudo chown -R root: .env config/
```

`var/` 目录仍需对 Web 服务器保持可写。


## 构建命令

| 命令 | 用途 |
|---------|---------|
| `yarn encore dev` | 构建开发环境前端 |
| `yarn encore dev --watch` | 构建并监视变更 |
| `yarn encore production` | 构建面向生产的优化资源 |
| `php bin/console cache:clear` | 清除 Symfony 缓存 |

## 开发提示

* 在 `.env` 中设置 `APP_ENV=dev` 和 `APP_DEBUG=1` 以获得详细错误信息
* 开发模式下，页面底部会显示 Symfony 调试工具栏
* 当 `APP_ENABLE_API_ENTRYPOINT=true` 时，可在 `/api` 查看 API 文档（需先清除缓存 — 参见 [配置](../../admin-guide/installation/configuration.md#enable-the-api-documentation)）
* 使用 `yarn encore dev --watch` 可在前端变更时自动重新构建