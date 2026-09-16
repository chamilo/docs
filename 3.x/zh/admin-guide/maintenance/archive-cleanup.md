# 归档清理

随着时间推移，Chamilo 会在缓存和归档目录中积累临时文件。定期清理可避免磁盘空间问题。

## 可清理的内容

* **临时上传文件** — 导出、导入及其他操作过程中生成的文件，以及过期的旧版前端构建文件
* **Symfony 应用缓存** — 已编译的容器、缓存的配置和路由数据。此项*不*包含在下方管理面板操作中——请参见 [通过命令行](#from-the-command-line)。
* **会话数据** — 已过期的 PHP 会话文件
* **日志文件** — 不再需要的旧日志文件

## 执行清理

### 通过管理面板

在管理面板中前往 **系统 > 清理临时文件**（参见 [系统工具](../system/system-tools.md#clean-temporary-files)）。该功能会报告现有临时文件的数量及其占用空间，然后允许你清除全部文件，或仅清除超过指定时长的文件，并提供试运行预览。它还会清除过期的旧版构建文件并重新生成已编译的 CSS 资源。

此操作有意排除 Symfony 自身的缓存目录（`var/cache/dev`、`var/cache/prod`、`var/cache/test` 以及缓存池），因此不会使 `.env` 或 `config/` 的更改立即生效——请为此使用命令行。

### 通过命令行

若需更精细的控制，并真正清除 Symfony 应用缓存，请使用 Symfony 控制台命令：

```bash
# Clear the Symfony cache
php bin/console cache:clear

# Clear only the production cache
php bin/console cache:clear --env=prod
```

## 提示

* **安排定期清理** — 设置每周或每月的 cron 任务以清理临时文件
* **监控磁盘使用** — 关注 `var/` 目录的大小，因为它会随缓存和日志文件增长
* **谨慎处理日志** — 删除日志文件前，请检查其中是否包含故障排查可能需要的信息