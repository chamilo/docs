# 修复与转换命令

> **破坏性变更。** 下列维护命令以往在运行后会立即写入数据库。现在它们**默认只读（试运行）**，仅在指定 `--apply` 时才会写入，遵循 `chamilo:migration:repair-quiz-relations-from-legacy` 的模式。

| 命令 | 说明 |
|---------|-------|
| `chamilo:migration:repair-group-forums-without-item-property` | |
| `chamilo:migration:repair-forum-posts-without-item-property` | |
| `chamilo:migration:repair-quiz-questions-without-resource-node` | |
| `chamilo:migration:repair-gradebook-structure` | |
| `chamilo:migration:repair-translatehtml-language-blocks` | |
| `chamilo:migration:repair-legacy-certificate-history` | |
| `app:multi-url:convert` | 无 `--expected-count`（单一的全有或全无操作） |

## 对管理员而言的变化

1. 不带选项运行命令：它会报告将要执行的操作，不写入任何内容，并打印出应使用的精确
   `--apply --expected-count=N` 行。
2. 若要写入，请再次运行并加上 `--apply --expected-count=N`，其中 N 为只读运行所报告的数量。
   若将要更改的行数与 N 不一致（其间数据已发生变化），命令将拒绝执行
   且不写入任何内容。
3. `--dry-run` 仍被接受（它现在是默认行为，且不执行任何操作）；将其与 `--apply` 组合使用会报错。
4. 以往不带参数运行这些命令并依赖其写入的脚本与 cron 作业，现在必须传入
   `--apply --expected-count=N`。退出码保持不变（0 表示成功，1 表示失败，2 表示用法无效）。

示例：

```bash
php bin/console chamilo:migration:repair-translatehtml-language-blocks
# ... "To write, re-run with --apply --expected-count=12"
php bin/console chamilo:migration:repair-translatehtml-language-blocks --apply --expected-count=12
```

```bash
php bin/console app:multi-url:convert "https://admin.example.com/"          # plan only
php bin/console app:multi-url:convert "https://admin.example.com/" --apply  # convert
```

## 新命令：`app:repair-user-tag-counters`

根据使用标签的关联行（用户标签、附加字段
标签、作品集标签）重新计算标签的使用计数器（`tag.count`）。旧版本会让计数器逐渐偏离。模式相同：不带选项运行以列出已偏离的
标签并获得 `--apply --expected-count=N` 行，然后运行该行以写入。不涉及迁移：在需要
重新同步计数器时运行即可。