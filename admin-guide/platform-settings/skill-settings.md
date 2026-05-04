# Skills Settings

Behaviour of the **Skills** system — skills tree, awarding rules, profile integration.

Access these settings under **Administration > Configuration settings > Skills**. This category contains **13 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `allow_hr_skills_management`

**Allow HR skills management**

Allows HR to manage skills

### `allow_private_skills`

**Hide skills from learners**

If enabled, skills can only be visible for admins, teachers (related to a user via a course), and HRM users (if related to a user).

### `allow_skill_rel_items`

**Enable linking skills to items**

This enables a major feature that enables any item to be linked to (and as such to allow acquisition of) a skill. The feature still requires the teacher to confirm the acquisition of the skill, so the acquisition is not automatic.

### `allow_skills_tool`

**Allow Skills tool**

Users can see their skills in the social network and in a block in the homepage.

### `allow_teacher_access_student_skills`

**Allow teachers to access learners' skills**

[inferred] Allow instructors to view and monitor skills acquired by learners in their courses.

### `badge_assignation_notification`

**Send notification to learner when a skill/badge has been acquired**

[inferred] Send notifications to learners when they acquire a new skill or badge achievement.

### `hide_skill_levels`

**Hide skill levels feature**

[inferred] Conceal the skill level hierarchy and level labels in skill-related views.

### `manual_assignment_subskill_autoload`

**Assigning skills to user: sub-skills auto-loading**

When manually assigning skills to a user, the form can be set to automatically offer you to assign a sub-skill instead of the skill you selected.

### `openbadges_backpack`

**OpenBadges backpack URL**

The URL of the OpenBadges backpack server that will be used by default for all users wanting to export their badges. This defaults to the open and free Mozilla Foundation backpack repository: https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**Show full skill name on skill wheel**

On the wheel of skills, it shows the name of the skill when it has short code.

### `skill_levels_names`

**Skill levels names**

Define names for levels of skills as an array of id => name.

### `skills_hierarchical_view_in_user_tracking`

**Show skills as a hierarchical table**

[inferred] Display learner skills as a hierarchical tree structure in progress and reporting pages.

### `skills_teachers_can_assign_skills`

**Allow teachers to set which skills are acquired through their courses**

By default, only admins can decide which skills can be acquired through which course.

