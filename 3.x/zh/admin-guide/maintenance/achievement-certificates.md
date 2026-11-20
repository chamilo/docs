# 成就证书（批量生成）

Chamilo 可以自动为已完成课程的每位学生生成该课程的成就证书——无论是在基础课程内，还是在复用该课程的任何会话内——而无需教师逐一打开每门课程。两条控制台命令涵盖此功能：一条用于单门课程，一条用于整个平台。二者都不是需要持续看管的数据库密集型操作：它们都以有界批次工作，支持试运行，并且在中断后可以安全恢复。

## 全平台命令

```bash
php bin/console chamilo:gradebook:process-achievement-certificates [options]
```

对于每一门具有符合条件的根成绩册类别的课程——即顶级类别而非子类别，且已启用**生成证书**——该命令会评估尚未拥有该类别证书的每位已注册学生，并为已满足完成要求的任何人生成证书。一门课程可以贡献**不止一个**上下文：其基础注册，以及单独地，每个复用该课程的会话各一个上下文，因为会话可以拥有自己的根类别和自己的及格阈值。

当一门课程或其某个会话上下文不符合自动处理条件时，会被跳过——而不被视为错误：未配置完成规则、该上下文存在多个符合条件的根类别（存在歧义，需要人工选择），或缺少证书通知内容。运行结束时的摘要会报告有多少上下文落入每种情况，因此任何被跳过的情况都会被呈现出来。

### 完成来源

* `--completion-mode=course-rule`（默认）：使用为该课程配置的完成规则。
* `--completion-mode=gradebook`：改为直接使用该上下文的原生成绩册分数。
  在此模式下，仅恰好具有一个符合条件的根类别的上下文才符合条件——具有多个根类别的上下文会被跳过并报告，以便改为单独处理（见下文）。

### 安全选项

| 选项                       | 用途                                                                                                                                 |
| --------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`                 | 评估并报告，但不创建证书或发送通知。请始终先运行此项。                                      |
| `--send-notification`       | 真实（非试运行）执行所必需。在每份证书创建后发送该课程已配置的内部消息和电子邮件。 |
| `--sender-id=<id>`          | 用作通知发送者的活跃平台管理员。须与 `--send-notification` 一起使用。                            |
| `--limit=<n>`                | 单次运行中生成（或在试运行中报告）的证书数量上限。`0` = 无限制。默认 `100`。                                    |
| `--scan-limit=<n>`           | 单次运行中评估的学生数量上限，涵盖每门课程和每个会话。`0` = 无限制。默认 `1000`。                                 |
| `--batch-size=<n>`           | 在一个课程/会话上下文内，每个数据库批次加载的学生数。默认 `25`。                                                     |
| `--course-batch-size=<n>`    | 每个数据库批次加载的课程数。默认 `50`。                                                                                         |
| `--after-course-id=<id>`     | 在此课程 ID 之后恢复扫描。在运行中断后可安全复用——对于已拥有证书的学生，课程绝不会重新生成证书。 |
| `--user-id=<id>`             | 将运行限制为一名学生，并在每门符合条件的课程和每个会话中进行检查——适用于在全平台运行之前验证行为。 |
| `--regenerate-empty`         | 同时处理证书记录存在但未存储证书文件的学生——例如生成中途失败之后——并再次生成该证书。拥有完整证书的学生绝不会被触及。 |

### 示例

先对整个平台进行试运行，以查看将生成哪些内容：

```bash
php bin/console chamilo:gradebook:process-achievement-certificates --dry-run
```

正式运行，并向学生发送通知，以 ID 为 1 的管理员作为发件人：

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1
```

在课程 480 之后恢复一次中断的运行：

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1 --after-course-id=480
```

重新生成记录已存在但文件从未存储的证书（先进行试运行以列出它们）：

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --dry-run
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --send-notification --sender-id=1
```

### 作为 cron 作业调度

```cron
# Every night at 2 AM
0 2 * * * php /path/to/chamilo/bin/console chamilo:gradebook:process-achievement-certificates --send-notification --sender-id=1 -e prod --no-interaction >> /path/to/chamilo/var/log/achievement-certificates.log 2>&1
```

## 单独处理一门课程

`chamilo:migration:process-achievement-certificates --course-id=<id>` 提供与全平台命令相同的试运行、通知和分页选项，但范围仅限于基础课程（不包括其会话），并使用显式的 `--category-id`，以便在一门课程有多个符合条件的根类别时消除歧义：

```bash
php bin/console chamilo:migration:process-achievement-certificates \
  --course-id=42 --category-id=7 --dry-run
```

可在全平台运行之前用它测试单门课程，或处理全平台运行因类别不明确而报告为已跳过的课程。

## 退出代码

如果在正式运行期间至少有一份证书的生成实际失败，两条命令都会以失败状态退出（请查看 `var/log/dev.log`——或等效的生产日志——以了解底层错误）。因结构性原因而跳过的上下文（无规则、类别不明确、缺少通知配置）不会导致失败退出代码；它们会在摘要中报告。

## 相关：学习者在先修学习路径上停留在 100% 以下

如果课程的完成规则要求学习路径达到 100%，已完成每一步但从未打开该路径最后“恭喜”页面的学习者会停留在略低于 100% 的状态，因而永远不会在此处获得资格。请参阅
[完成卡住的学习路径最终项目](learning-path-final-items.md)——如果学生缺少您预期他们已获得的证书，请先运行该操作。

## 已取代：旧版 cron 脚本

不再建议使用 `public/main/cron/add_gradebook_certificates.php`。它会通过一次无界查询将平台上的每个成绩簿结果全部加载到内存中，并在循环期间从不释放，因此在课程或练习数量较多的实例上可能耗尽内存，而且它从不发送“您已获得证书”通知。请改用
`chamilo:gradebook:process-achievement-certificates`。