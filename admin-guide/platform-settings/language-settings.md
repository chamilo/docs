# Languages Settings

Available languages, default language, and how Chamilo resolves which language to display.

Access these settings under **Administration > Configuration settings > Languages**. This category contains **12 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `allow_course_multiple_languages`

**Multiple-language courses**

Enable courses managed in more than one language. This option adds a language selector within the course page to let users switch easily, and adds a 'multiple_language' extra field to courses which allows for remote management procedures.

### `allow_use_sub_language`

**Allow definition and use of sub-languages**

By enabling this option, you will be able to define variations for each of the language terms used in the platform's interface, in the form of a new language based on and extending an existing language. You'll find this option in the languages section of the administration panel.

### `auto_detect_language_custom_pages`

**Enable language auto-detect in custom pages**

If you use custom pages, enable this if you want to have a language detector there present the page in the user's browser language, or disable to force the language to be the default platform language.

### `language_flags_by_country`

**Language flags**

Use country flags for languages. This is not enabled by default because some languages are not strictly attached to a country, which can lead to frustration for some users.

### `language_priority_1`

**Highest priority language**

Primary language selected when multiple language contexts are set.

### `language_priority_2`

**Secondary priority language**

Secondary fallback language if first priority is unavailable or out of context.

### `language_priority_3`

**Third priority language**

Tertiary language fallback if higher priorities fail.

### `language_priority_4`

**Fourth priority language**

Last language fallback option by order of priority.

### `platform_language`

**Default platform language**

Main language, used by default when no user language is set.

### `show_different_course_language`

**Show course languages**

Show the language each course is in, next to the course title, on the homepage courses list

### `show_language_selector_in_menu`

**Language switcher in main menu**

Display a language selector in the main menu that immediately updates the language preference of the user. This can be useful in multilingual portals where learners have to switch from one language to another for their learning.

### `template_activate_language_filter`

**Multiple-language document templates**

Enable document templates (at the platform or course level) to be configured for specific languages.

