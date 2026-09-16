# Languages

This tool manages which interface languages users can choose from — it does not manage translation strings themselves (those come from the language packs shipped with Chamilo, not from anything editable here).

## Accessing Languages

From the administration panel, click **Platform > Languages**.

## What You Can Do

* **Toggle availability** — Enable or disable each of the shipped languages as a choice on the login page and in user profile settings, with a simple on/off switch per row
* **Set the platform default** — Choose which language is used when no user preference applies; the current default is marked with its own icon and can't be hidden
* **Disable all except the default** — A single bulk action to strip the language picker down to just your platform's default language
* **Edit the native name** — Adjust how a language's own name is displayed (its "original name") in the picker

## Disabling a Language in Use

If you disable a language that active users have already selected as their interface language, Chamilo asks for confirmation and — if you confirm — migrates every affected user to the platform default language. There's no partial state where a user is left with a now-hidden language selected.

## Sub-Languages

If the **Allow sub-languages** setting is enabled, additional actions appear for creating "sub-languages" — partial overrides of a parent language, historically used for regional dialects or organization-specific terminology tweaks. This is a legacy feature; most installations won't need it.
