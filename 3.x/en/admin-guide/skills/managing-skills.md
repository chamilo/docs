# Managing Skills

This page covers the three dashboard entries used to build up the platform's skill catalog: importing skills in bulk, managing the skill definitions themselves, and assigning each skill to a level scale.

## Skills Import

**Skills > Skills import** lets you bulk-create a skill hierarchy from a CSV or XML file, instead of creating skills one by one. Each row needs at minimum an `id`, a `parent_id` (to build the tree), and a `title`. A sample template is available to base your file on.

## Manage Skills

**Skills > Manage skills** is the main skill catalog: create, edit, enable/disable, and delete skills. Each skill has a title, a short code, a description, an icon, and an optional criteria description (what a learner needs to do to earn it). Skills can be nested — a skill can have child skills — which is what the [Skills Wheel](skills-wheel.md) visualizes.

### Acquirable skills versus structural skills

When creating or editing a skill, use **Acquirable** to indicate whether learners may actually earn it. It is enabled by default. Disable it for a parent or organisational category that exists only to group other skills: such a skill remains in the hierarchy but cannot be awarded through manual assignment, Exercise, Learning Path or Gradebook workflows. Existing skill relationships and their history are retained. This behavior was added in [PR #9206](https://github.com/chamilo/chamilo-lms/pull/9206) (issue #8179).

## Manual Skill Assignment

When manual skill assignment is available for your role, open **Assign skill** for the user, select the **Skill**, choose a **Level acquired** when levels are used, and provide the required **Argumentation** explaining why the skill is being awarded.

For an existing manual assignment that can be removed, select the skill and click **Remove**, then confirm the action. Removed assignments no longer count as acquired skills. Assignments whose source does not allow manual removal do not expose this action.

From a learner's reporting details, an authorised user can follow the **skill badge/link** to the assignment details and then use the existing removal action when the skill was manually assigned. The assignment history remains available after removal and reassignment; removing a skill does not erase its audit trail. Return to the learner report using the available navigation link.

## Manage Skills Levels

**Skills > Manage skills levels** is a separate, smaller screen: it lists existing skills and lets you assign each one to a **level profile** — a named, ordered set of levels (for example Bronze/Silver/Gold) that the skill is measured against. In short: use **Manage skills** to define what a skill *is*, and **Manage skills levels** to define what scale it's measured on.

### Level descriptions and available profiles

Individual levels in a level profile now have a **Description** field, editable from **Manage skills levels** in addition to the level title and short title. The shipped skill-level fixtures define example scales with descriptions for **CEFR**, the **Dreyfus model**, **Bloom's taxonomy** and **SFIA**. On an existing installation, which profiles are present depends on the fixture and upgrade state; do not assume adding the field automatically creates or replaces existing profiles.

## How Skills Get Awarded

A skill is awarded to a user (recorded as an issued skill, with a date) through one of a few paths:

* Automatically, when a learner meets a gradebook category's threshold — configured on the [Skills and Assessments](skills-assessments.md) page
* Automatically, on completing specific courses the skill is linked to
* Manually, by a teacher (if **Teachers can assign skills** is enabled) or an administrator
