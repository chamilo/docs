# Instellingen van de cursuscatalogus

Gedrag van de cursuscatalogus (de openbare lijst waar gebruikers kunnen bladeren en zichzelf inschrijven).

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Cursuscatalogus**. Deze categorie bevat **13 instellingen**, hieronder vermeld met de titel en toelichting zoals meegeleverd in de instellingen-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_session_auto_subscription`

**Automatische sessie-inschrijving**

Automatische inschrijving van gebruikers voor sessies inschakelen.

*Standaard: `false`*

### `allow_students_to_browse_courses`

**Bladeren door studenten toestaan**

Studenten toestaan om in de cursuscatalogus te bladeren en te filteren.

*Standaard: `true`*

### `course_catalog_display_in_home`

**Catalogus op startpagina weergeven**

Het blok van de cursuscatalogus op de startpagina van het platform tonen.

*Standaard: `false`*

### `course_catalog_hide_private`

**Privécursussen verbergen**

Privécursussen uitsluiten van de weergave in de catalogus.

*Standaard: `true`*

### `course_catalog_published`

**Cursuscatalogus publiceren**

De cursuscatalogus beschikbaar maken voor anonieme gebruikers (het algemene publiek) zonder inloggen.

*Standaard: `false`*

### `course_catalog_settings`

**Instellingen van de cursuscatalogus**

JSON-configuratie voor de cursuscatalogus: linkinstellingen, filters, sorteeropties en meer.

### `course_subscription_in_user_s_session`

**Inschrijving in sessieweergave**

Gebruikers toestaan om zich rechtstreeks vanaf hun sessiepagina voor cursussen in te schrijven.

*Standaard: `false`*

### `hide_public_link`

**Openbare link verbergen**

De openbare URL-link van cursuskaarten verwijderen.

*Standaard: `false`*

### `only_show_course_from_selected_category`

**Alleen overeenkomende categorieën in de cursuscatalogus tonen**

Wanneer dit veld niet leeg is, verschijnen alleen de cursussen uit de opgegeven categorieën in de cursuscatalogus.

### `only_show_selected_courses`

**Alleen geselecteerde cursussen**

Alleen handmatig geselecteerde cursussen in de catalogus tonen.

*Standaard: `false`*

### `session_catalog_settings`

**Instellingen van de sessiecatalogus**

JSON-configuratie voor de sessiecatalogus: filters en weergaveopties.

### `show_courses_descriptions_in_catalog`

**Cursusbeschrijvingen tonen**

Cursusbeschrijvingen in de cataloguslijst weergeven.

*Standaard: `false`*

### `show_courses_sessions`

**Cursussen en sessies tonen**

Zowel cursussen als sessies in de catalogusresultaten opnemen.

*Standaard: `0`*