# 练习与学习路径的回收站

Chamilo 3.1 可将已删除的练习作答记录与学习路径跟踪数据归档，以便获得授权的教师在配置的保留期限与访问控制范围内将其恢复。回收站用于保护跟踪数据，不能替代数据库备份。

## 恢复练习作答记录

1. 在已正确选择课程或会话的前提下，打开受影响练习的 **Reporting** 页面。
2. 选择 **Recycle bin**，以显示已归档的作答记录。
3. 确定需要恢复的学习者及其作答记录。
4. 选择 **Restore**，确认后刷新报告，以核对应答内容与分数。

您必须拥有管理练习成绩的权限。当练习被 Gradebook 锁定，或平台限制教师访问成绩时，恢复操作可能会被阻止。

## 恢复学习路径进度

1. 打开目标课程/会话对应的学习路径报告界面。
2. 打开其 **Recycle bin**。
3. 选择该学习者已归档的进度，并执行 **Restore**。
4. 检查已恢复的课时进度以及关联的练习作答记录。

若某次练习作答属于待处理的学习路径归档，请先恢复该学习路径归档。系统会有意阻止单独恢复，以避免进度不一致。

## 保留与清理（管理员）

设置项 `tracking.recycle_bin_retention_hours` 控制归档在多长时间内仍可恢复。初始默认值为 **30 天**（720 小时）。现有安装必须先通过项目的 settings-upsert 迁移同步这一新设置，管理界面才会显示该项。

在不删除任何内容的情况下预览清理：

```bash
php bin/console chamilo:recycle-bin:purge
```

永久删除需要显式指定选项：

```bash
php bin/console chamilo:recycle-bin:purge --execute
```

该命令支持 `--hours`（覆盖保留期限）、`--scan-limit`、`--after-lp-id` 和 `--after-exercise-id`，以便受控处理。仅在核实保留策略与备份安排之后，才应安排执行该命令。仅因启用此功能，并**不会**隐含自动清理计划。

另见 [练习](exercises.md) 与 [学习路径](../adding-content/learning-paths.md)。实现说明：[PR #9383](https://github.com/chamilo/chamilo-lms/pull/9383)。