# Skills

The **Skills** block on the administration dashboard groups the tools for defining, organizing, and tracking competency badges ("skills") across the platform. A skill can be awarded automatically when a learner reaches a gradebook threshold, completes specific courses, or manually by a teacher, and can carry a badge-style icon and a level (for example Bronze/Silver/Gold).

![The Skills block on the administration dashboard, listing Skills wheel, Skills import, Manage skills, Manage skills levels, Skills ranking, and Skills and assessments](/.gitbook/assets/admin-skills-block.png)

The entire block only appears if the **Enable skills tool** setting (`skill.allow_skills_tool`, under Configuration Settings > Skills) is turned on — it is enabled by default.

## Accessing the Skills Block

From the administration panel, the **Skills** block appears alongside the other dashboard blocks. Click any of its links to open the corresponding tool.

## What's in the Block

* **[Managing Skills](managing-skills.md)** — Create skills, import them in bulk, and assign each one to a level scale
* **[Skills Wheel](skills-wheel.md)** — A zoomable visual map of the whole skill tree
* **[Skills Ranking](skills-ranking.md)** — A leaderboard of users by skills acquired
* **[Skills and Assessments](skills-assessments.md)** — Link gradebook categories to the skills they award

## Related Settings

A few other settings under Configuration Settings > Skills change who can do what with this block:

* **Allow HR skills management** (`allow_hr_skills_management`) — Lets Human Resources Manager users manage skills alongside administrators
* **Allow private skills** (`allow_private_skills`)
* **Teachers can assign skills** (`skills_teachers_can_assign_skills`)
* **Hide skill levels** (`hide_skill_levels`)
* **Show full skill name on skill wheel** (`show_full_skill_name_on_skill_wheel`)
