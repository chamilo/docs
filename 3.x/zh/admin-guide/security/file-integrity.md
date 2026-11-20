# 文件完整性

*Chamilo 3.0 新增。*

文件完整性会将服务器上已安装的文件与可信基线进行比对，以检测您未预期的新增、修改、删除和权限变更——成功入侵、被攻破的依赖项或误操作的手动编辑通常会留下这类痕迹。

## 访问文件完整性

在管理面板中，单击 **安全 > 文件完整性**。

## 显示内容

![文件完整性页面，显示最近一次扫描信息、新增、已修改、已删除和权限已更改文件的面板、告警历史列表，以及运行扫描、暂停告警或建立新基线的操作](/.gitbook/assets/admin-security-file-integrity.png)

* **最近一次扫描** — 最近一次扫描的运行时间以及检查的文件数量
* **新增 / 已修改 / 已删除** — 与基线不同的文件，通过比较 SHA-256 校验和识别（每个列表最多显示 500 条路径；若完整列表更长会有说明——完整列表请参见下方的 CEF 日志）
* **权限已更改** — 权限与基线不同的文件。在 Linux 上直接比较 POSIX 模式位（例如，文件变为对所有人可写会被标记）；在 Windows 上仅跟踪只读属性，因为 `fileperms()` 无法反映真实的 NTFS ACL
* **告警历史** — 每次发现异常的扫描的持久、仅追加日志（最多保留最近 50 条）。与上方报告不同，该列表不会因一次干净扫描或新基线而被清空，因此即使所标记的偏差已被解决，过往告警仍保持可见

检查会遍历整个已安装文件树，但排除 `var/` 和 `.git/` 目录——有一处例外：仍会单独监视 `.git/config`，专门用于发现 Git 远程被静默改指向恶意服务器的情况。从不跟随符号链接，以避免遍历循环或逃出安装目录。

由于大型安装的完整扫描可能需要数分钟，遍历会分块进行（每次一个顶层目录），进度记录在锁文件中——因此可以安全地重新加载页面以查看进度，崩溃或被终止的扫描也不会被误认为仍在运行。

## 操作

* **立即运行扫描** — 立即将当前文件树与基线进行比较
* **暂停 1 小时** — 临时挂起告警（例如在部署更新期间）。需要重新输入您自己的密码。暂停期间，扫描会静默将当前树采纳为新基线而不告警，从而使暂停窗口结束时不留下残余告警。最长暂停时间为 24 小时
* **建立新基线** — 将当前文件树采纳为新的可信参照。需要重新输入您自己的密码

暂停告警或建立新基线可能掩盖正在进行的入侵，因此两者都需要再次输入密码——仅劫持管理员会话不足以在文件被篡改时让检测静音。

## 通过 Cron 运行

相同检查也可作为控制台命令使用，旨在通过 cron 调度，而不是在管理页面上按计划运行：

```bash
# Scan for drift and alert admins if anything changed
0 3 * * * cd /var/www/chamilo/master && php bin/console app:file-integrity:scan

# Generate or regenerate the baseline (run once after install, or after a manual update)
php bin/console app:file-integrity:baseline

# Pause alerting from the command line (prompts for a global administrator's username and password)
php bin/console app:file-integrity:snooze
```

若暂停处于活动状态，`app:file-integrity:scan` 会静默重新建立基线而不告警，与从管理页面触发的扫描行为一致。

## 设置

一项相关设置位于 **配置设置 > 安全**：

* **`file_integrity_check_notify_admins`** — 发现偏差时要通知的电子邮件地址列表；若留空，则通知每一位全局管理员

## SIEM 集成

每次扫描还会将 CEF（Common Event Format，通用事件格式）日志行写入 `var/logs/security/file_integrity.log`，适合由 SIEM（Wazuh、Splunk、QRadar、ArcSight、Elastic/Filebeat 及类似工具）采集。每行带有标识变更类型的签名 ID：

| Signature | Meaning |
|-----------|---------|
| `FIM-ADDED` | 出现了新文件 |
| `FIM-MODIFIED` | 文件内容已更改 |
| `FIM-DELETED` | 文件已消失 |
| `FIM-GITCONFIG` | `.git/config` 已更改（可能远程被劫持） |
| `FIM-PERMS` | 文件权限已更改 |
| `FIM-TRUNCATED` | 某类别的报告已被截断；完整列表请查阅日志 |

## 推荐用法

1. 在安装完成后立即建立基线，并在每次手动更新或部署之后再次建立
2. 通过 cron 定期调度 `app:file-integrity:scan`（例如每晚执行）
3. 在计划会更改文件的维护窗口（更新、迁移）之前，使用 **暂停 1 小时**，而不是直接移除 cron 任务
4. 若已有日志监控或 SIEM，可将 `var/logs/security/file_integrity.log` 接入其中