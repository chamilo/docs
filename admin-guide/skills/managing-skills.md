# Managing Skills

This page covers the three dashboard entries used to build up the platform's skill catalog: importing skills in bulk, managing the skill definitions themselves, and assigning each skill to a level scale.

## Skills Import

**Skills > Skills import** lets you bulk-create a skill hierarchy from a CSV or XML file, instead of creating skills one by one. Each row needs at minimum an `id`, a `parent_id` (to build the tree), and a `title`. A sample template is available to base your file on.

## Manage Skills

**Skills > Manage skills** is the main skill catalog: create, edit, enable/disable, and delete skills. Each skill has a title, a short code, a description, an icon, and an optional criteria description (what a learner needs to do to earn it). Skills can be nested — a skill can have child skills — which is what the [Skills Wheel](skills-wheel.md) visualizes.

## Manage Skills Levels

**Skills > Manage skills levels** is a separate, smaller screen: it lists existing skills and lets you assign each one to a **level profile** — a named, ordered set of levels (for example Bronze/Silver/Gold) that the skill is measured against. In short: use **Manage skills** to define what a skill *is*, and **Manage skills levels** to define what scale it's measured on.

## How Skills Get Awarded

A skill is awarded to a user (recorded as an issued skill, with a date) through one of a few paths:

* Automatically, when a learner meets a gradebook category's threshold — configured on the [Skills and Assessments](skills-assessments.md) page
* Automatically, on completing specific courses the skill is linked to
* Manually, by a teacher (if **Teachers can assign skills** is enabled) or an administrator
