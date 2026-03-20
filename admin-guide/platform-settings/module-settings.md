# Module Settings

Module settings let you enable or disable major platform features. Disabling a module hides it from the interface and prevents access to it. Access these settings from **Administration > Configuration settings**.

## Available Modules

| Module | Description | Default |
|--------|-------------|---------|
| **Social Network** | A built-in social networking feature where users can connect, post messages on walls, and form groups. | Enabled |
| **Messaging** | Internal messaging system for direct user-to-user communication. | Enabled |
| **Course Catalog** | Public or authenticated browsing of available courses with self-enrollment. | Enabled |
| **Chat** | Real-time chat within courses. | Enabled |
| **Skills** | A competency management system that allows defining skills, linking them to courses/exercises, and awarding skill badges. | Disabled |
| **Surveys** | Course-level surveys and questionnaires. | Enabled |
| **Glossary** | Term-definition tool within courses. | Enabled |
| **Notebooks** | Personal note-taking tool for learners within a course. | Enabled |
| **Attendance** | Attendance tracking sheets within courses. | Enabled |
| **Wiki** | Collaborative wiki pages within courses. | Enabled |
| **Forum** | Discussion forums within courses. | Enabled |
| **Blog** | Blogging tool within courses. | Enabled |

## How to Enable or Disable a Module

1. Go to **Administration > Configuration settings**.
2. Navigate to the relevant settings category (e.g., "Social" for social network settings, "Course" for course tools).
3. Find the toggle for the module and set it to enabled or disabled.
4. Save your changes. The effect is immediate.

## Impact of Disabling a Module

When a module is disabled:

* Its navigation links and menu entries are hidden from all users.
* API endpoints for that module return access-denied responses.
* Existing data is preserved -- re-enabling the module restores access to previously created content.
* Course tools linked to the module are hidden in all courses.

Disabling a module does not delete any data.

## Social Network Settings

When the social network module is enabled, additional settings are available:

| Setting | Description |
|---------|-------------|
| **Allow social groups** | Let users create and join interest groups. |
| **Allow wall posts** | Let users post on their own and friends' walls. |
| **Allow invitations** | Let users send connection requests to other users. |

## Messaging Settings

| Setting | Description |
|---------|-------------|
| **Allow messaging** | Master toggle for the messaging system. |
| **Allow sending to all platform users** | When enabled, any user can message any other user. When disabled, messaging is limited to contacts or course peers. |
| **Message notification by email** | Send an email notification when a user receives a new internal message. |

## Skills Settings

| Setting | Description |
|---------|-------------|
| **Enable skills module** | Master toggle for the skills/competency system. |
| **Allow teachers to manage skills** | Let teachers define and assign skills within their courses. |
| **Skills displayed on profile** | Show earned skill badges on user profiles. |

## Tips

* **Disable modules you do not use** to keep the interface clean and reduce confusion for users.
* **Social networking** can be valuable for community-driven platforms but may be unnecessary for corporate training environments.
* **Skills** require initial setup (defining the skill tree) to be useful -- enable this module only when you are ready to configure it.
