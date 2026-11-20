# 用户个人资料字段的静态加密

Chamilo 3.1 可选择在将部分个人资料字段写入数据库之前对其进行加密。此首个实现涵盖**个人简介**、**电话**和**地址**。加密**默认处于禁用状态**，且需要一把私有加密密钥。它不会加密全部用户信息，也不能替代磁盘、数据库、传输或备份层面的安全措施。

## 启用加密之前

仅应由具备服务器访问权限的平台管理员执行部署。首先，确认安装已包含用于加密字段存储的 Chamilo 3.1 迁移，制作可恢复的数据库备份，并规划将加密密钥**与数据库分开**进行安全备份。在更改生产数据之前，先测试恢复流程。

密钥存储于 `var/data-at-rest/master.key`，位于公开 Web 根目录之外。切勿将其公开、粘贴到支持请求中，或提交到 Git。丢失原始密钥可能导致已加密数据无法读取。若已有用户数据被加密，请勿生成替换密钥。

## 初始化密钥

先以预览模式运行一次该命令：

```bash
php bin/console chamilo:security:initialize-at-rest-key
```

若报告不存在已加密数据且可以配置密钥，则显式初始化：

```bash
php bin/console chamilo:security:initialize-at-rest-key --apply
```

若命令报告已存在兼容密钥，则不会执行替换。若已存在加密行但密钥缺失或不匹配，请**停止**并恢复原始密钥。

## 选择受保护字段

打开**管理 > 设置 > 安全**，并在加密用户字段设置中选择**个人简介**、**电话**和/或**地址**。仅选择您打算保护的字段。对所选字段的新写入将使用认证加密（libsodium XChaCha20-Poly1305）；旧的明文记录在显式回填之前仍可读取。

## 检查并回填现有数据

回填命令在未使用 `--apply` 时不会修改记录。在扩大批次之前，建议先使用单个 QA 用户：

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=address --user-id=102
```

在确认密钥可用、字段选择、备份以及 QA 账户之后，运行有意安排的试点：

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102 --apply
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102 --apply
```

将 `102` 替换为实际的测试用户 ID。对于较大的数据集，可使用可选的 `--batch-size` 参数（1–500），检查命令输出与应用程序行为，并在维护窗口期间规划批次。在没有经过测试的回滚策略之前，请勿对整个数据库执行回填。

## 运行限制

- 这是字段级加密的第一阶段，并非全库加密。
- 较旧的直接 SQL 集成与导出可能无法读取加密值；部署前请加以验证。
- **没有**对应可恢复密钥的数据库备份是不够的。
- 请勿记录原始字段内容，也勿在诊断信息中包含密钥材料。
- 仅回滚应用程序代码并不会解密已存储的值。

有关一般平台安全选项，请参阅[安全设置](../platform-settings/security-settings.md)。实现：[Chamilo LMS PR #9491](https://github.com/chamilo/chamilo-lms/pull/9491)。