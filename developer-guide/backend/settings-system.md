# Settings System

Chamilo's configuration is managed through 43 settings schemas that define every configurable aspect of the platform.

## How It Works

Settings are:

1. **Defined** in schema classes (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **Stored** in the database (`settings_current` table)
3. **Accessed** via the `SettingsManager` service
4. **Managed** through the administration web interface

## Settings Schemas

Each schema file defines a category of settings. Key schemas:

| Schema | Purpose |
|--------|---------|
| `PlatformSettingsSchema` | Institution info, timezone, server type, portal features |
| `SecuritySettingsSchema` | Login attempts, CAPTCHA, password policy, HTTP headers, 2FA |
| `RegistrationSettingsSchema` | Self-registration, required fields, auto-subscribe |
| `CourseSettingsSchema` | Course creation defaults, tools, catalog |
| `SessionSettingsSchema` | Session defaults, visibility |
| `MailSettingsSchema` | Email configuration, DKIM, notifications |
| `AiHelpersSettingsSchema` | AI providers, feature toggles per AI tool |
| `ExerciseSettingsSchema` | Quiz scoring, feedback, question options |
| `LearningPathSettingsSchema` | LP display, prerequisites, SCORM settings |
| `DocumentSettingsSchema` | Upload limits, allowed file types, storage |
| `DisplaySettingsSchema` | UI tabs, sidebar items, theme |
| `LanguageSettingsSchema` | Available languages, default locale |
| `AdminSettingsSchema` | Admin email, admin-specific options |

## Accessing Settings

In PHP code:

```php
// Via SettingsManager service
$value = $settingsManager->getSetting('platform.site_name');

// In legacy code
$value = api_get_setting('platform.site_name');
```

In templates:

```twig
{{ chamilo_setting('platform.site_name') }}
```

## Setting Structure

Each setting has:

* **Namespace** — The schema category (e.g., `platform`, `security`, `ai_helpers`)
* **Variable** — The setting name (e.g., `site_name`, `allow_registration`)
* **Value** — The current value
* **Type** — Data type (string, boolean, array, etc.)

## Course-Level Settings

Some settings can be overridden at the course level. These are defined in `src/CourseBundle/Settings/` and include:

* Exercise settings per course
* Assignment settings per course
* AI feature toggles per course

## Multi-URL Settings

In multi-URL setups, some settings can be customized per access URL, allowing different portal configurations from the same installation.

## Adding a New Setting

1. Add the setting definition to the appropriate schema class
2. Provide a default value
3. Run database migrations if needed
4. Access the setting via `SettingsManager`
