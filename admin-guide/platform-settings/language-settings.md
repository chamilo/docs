# Language Settings

Language settings control which languages are available on the platform and how language selection works. Access them from **Administration > Configuration settings > Languages**.

## Platform Default Language

The **default language** is used for:

* The login page and public-facing pages
* New user accounts (unless the user selects a different language at registration)
* System emails when no user-specific language is set
* Fallback when a translation is missing in a user's selected language

Set this to the language most of your users speak.

## Available Languages

Chamilo ships with translations for dozens of languages. You can enable or disable each language individually.

To manage available languages, go to **Administration > Languages**. Each language can be:

| State | Effect |
|-------|--------|
| **Enabled** | Users can select this language from the language selector. |
| **Disabled** | The language is hidden from the selector. Existing users who had this language selected will fall back to the platform default. |

Only enable languages that your organization actually supports. Disabling unused languages reduces clutter in the language selector.

## Sub-Languages

Sub-languages let you customize translations without modifying the original language files. A sub-language inherits all translations from its parent and allows you to override specific strings.

Common use cases:

* **Terminology customization** -- Replace "Course" with "Program" or "Student" with "Participant" to match your organization's vocabulary.
* **Regional variants** -- Create a sub-language for a specific region (e.g., Latin American Spanish based on standard Spanish).
* **Branding** -- Adjust interface text to match your organizational tone.

To create a sub-language:

1. Go to **Administration > Languages**.
2. Click **Create sub-language**.
3. Select the parent language.
4. Give the sub-language a name and ISO code.
5. After creation, click the sub-language to edit individual translation strings.

Sub-languages appear in the language selector alongside regular languages if enabled.

## Language Priority

Chamilo's language resolution is configured through four ordered settings (`language_priority_1` through `language_priority_4`), each of which can be set to one of: `course_lang`, `user_profil_lang`, `user_selected_lang`, or `platform_lang`. Out of the box the defaults resolve in this order:

1. **Course language** (`course_lang`) — the language declared on the course
2. **User profile language** (`user_profil_lang`) — the language stored on the user account
3. **User selected language** (`user_selected_lang`) — the language the user has switched to in the current session
4. **Platform default language** (`platform_lang`) — the platform-wide fallback

You can change these priorities to fit your portal — for example, swap them so that a user's profile language wins over the course's language.

For any given translation string, if the translation is missing in the chosen language, Chamilo falls back to English.

## Tips

* **Disable languages you do not support** -- A long language list confuses users and may lead them to select a poorly translated language.
* **Use sub-languages for terminology** -- Instead of editing translation files directly (which get overwritten on upgrades), create a sub-language to customize terms.
* **Set course languages** when running a multilingual platform so that course navigation matches the language the course is taught in.
