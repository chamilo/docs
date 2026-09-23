# Språkinställningar

Tillgängliga språk, standardspråk och hur Chamilo avgör vilket språk som ska visas.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Språk**. Denna kategori innehåller **13 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det när du skriptar via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `allow_course_multiple_languages`

**Kurser på flera språk**

Aktivera kurser som hanteras på mer än ett språk. Detta alternativ lägger till en språkväljare på kurssidan så att användare enkelt kan växla, och lägger till ett extrafält `multiple_language` till kurser som möjliggör fjärrhanteringsprocedurer.

*Standard: `false`*


### `allow_use_sub_language`

**Tillåt definition och användning av underspråk**

Genom att aktivera detta alternativ kan du definiera variationer för var och en av de språktermer som används i plattformens gränssnitt, i form av ett nytt språk baserat på och som utökar ett befintligt språk. Du hittar detta alternativ i språksektionen i administrationspanelen.

*Standard: `false`*

### `auto_detect_language_custom_pages`

**Aktivera automatisk språkidentifiering på anpassade sidor**

Om du använder anpassade sidor, aktivera detta om du vill att en språkdetektor där ska visa sidan på användarens webbläsarspråk, eller inaktivera för att tvinga språket till plattformens standardspråk.

*Standard: `true`*


### `language_by_resource` **v3**

**Språk per resurs**

Tillåt att ett specifikt språk tilldelas enskilda resurser.

*Standard: `false`*

### `language_flags_by_country`

**Språkflaggor**

Använd landsflaggor för språk. Detta är inte aktiverat som standard eftersom vissa språk inte är strikt knutna till ett land, vilket kan leda till frustration för vissa användare.

*Standard: `false`*


### `language_priority_1`

**Språk med högsta prioritet**

Primärt språk som väljs när flera språksammanhang är inställda.

*Standard: `course_lang`*


### `language_priority_2`

**Språk med sekundär prioritet**

Sekundärt reservspråk om första prioritet inte är tillgänglig eller utanför sammanhanget.

*Standard: `user_profil_lang`*


### `language_priority_3`

**Språk med tredje prioritet**

Tertiärt reservspråk om högre prioriteringar misslyckas.

*Standard: `user_selected_lang`*


### `language_priority_4`

**Språk med fjärde prioritet**

Sista reservspråksalternativet i prioritetsordning.

*Standard: `platform_lang`*


### `platform_language`

**Plattformens standardspråk**

Huvudspråk, som används som standard när inget användarspråk är inställt.

*Standard: `en`*


### `show_different_course_language`

**Visa kursspråk**

Visa vilket språk varje kurs är på, bredvid kurstiteln, i kurslistan på startsidan

*Standard: `true`*


### `show_language_selector_in_menu`

**Språkväxlare i huvudmenyn**

Visa en språkväljare i huvudmenyn som omedelbart uppdaterar användarens språkpreferens. Detta kan vara användbart i flerspråkiga portaler där deltagare måste växla från ett språk till ett annat för sitt lärande.

*Standard: `true`*


### `template_activate_language_filter`

**Dokumentmallar på flera språk**

Aktivera att dokumentmallar (på plattforms- eller kursnivå) kan konfigureras för specifika språk.

*Standard: `false`*