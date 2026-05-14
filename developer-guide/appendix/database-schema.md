# 数据库结构

Chamilo 2.0 将大量的 Doctrine 实体映射到数据库表中。具体数量在不同版本之间会有所变化——请阅读下面列出的实体目录以了解当前状态。

## 实体位置

| 包 | 位置 | 前缀 |
|--------|-------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | 无（例如，`user`, `course`, `session`） |
| CourseBundle | `src/CourseBundle/Entity/` | `c_`（例如，`c_document`, `c_quiz`, `c_lp`） |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## 关键表

### 用户和认证

| 表 | 用途 |
|-------|---------|
| `user` | 用户账户 |
| `access_url` | 多URL门户 |
| `access_url_rel_user` | 用户-门户分配 |
| `usergroup` | 平台范围的用户组 |

### 课程

| 表 | 用途 |
|-------|---------|
| `course` | 课程 |
| `course_category` | 课程分类 |
| `course_rel_user` | 课程注册 |

### 会话

| 表 | 用途 |
|-------|---------|
| `session` | 培训会话 |
| `session_rel_user` | 会话注册 |
| `session_rel_course` | 会话中的课程 |
| `session_rel_course_rel_user` | 每个会话-课程的用户注册 |

### 资源系统

| 表 | 用途 |
|-------|---------|
| `resource_node` | 统一的内容抽象 |
| `resource_file` | 文件附件 |
| `resource_link` | 按上下文的可见性/访问权限 |
| `resource_type` | 资源类型注册表 |

### 课程内容（c_ 前缀）

| 表 | 用途 |
|-------|---------|
| `c_document` | 文档 |
| `c_quiz` | 练习/测试 |
| `c_quiz_question` | 测验问题 |
| `c_quiz_answer` | 问题答案 |
| `c_lp` | 学习路径 |
| `c_lp_item` | 学习路径项目 |
| `c_forum_category` | 论坛分类 |
| `c_forum_forum` | 论坛 |
| `c_forum_thread` | 论坛主题 |
| `c_forum_post` | 论坛帖子 |
| `c_student_publication` | 作业/提交 |
| `c_survey` | 调查 |
| `c_glossary` | 词汇表术语 |
| `c_calendar_event` | 日历事件 |
| `c_attendance` | 考勤表 |

### 跟踪

| 表 | 用途 |
|-------|---------|
| `track_e_login` | 登录跟踪 |
| `track_e_online` | 在线用户跟踪 |
| `track_e_default` | 通用活动跟踪 |
| `gradebook_category` | 成绩簿分类 |
| `gradebook_result` | 成绩 |

### 设置

| 表 | 用途 |
|-------|---------|
| `settings` | 平台设置 |
| `settings_options` | 设置选项定义 |

## 迁移

数据库结构更改通过 `src/CoreBundle/Migrations/` 中的 Doctrine Migrations 进行管理。使用以下命令运行迁移：

```bash
php bin/console doctrine:migrations:migrate
```