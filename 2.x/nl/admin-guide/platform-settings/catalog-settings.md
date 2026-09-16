# Cursuscatalogusinstellingen

Gedrag van de cursuscatalogus (de openbare lijst waar gebruikers cursussen kunnen bekijken en zich zelfstandig kunnen inschrijven).

Ga naar deze instellingen via **Beheer > Configuratie-instellingen > Cursuscatalogus**. Deze categorie bevat **13 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de platforminstellingen (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_session_auto_subscription`

**Automatische Sessie-inschrijving**

Schakel automatische inschrijving voor sessies in voor gebruikers.

*Standaard: `false`*

### `allow_students_to_browse_courses`

**Studenten Toestaan om te Bladeren**

Sta studenten toe om de cursuscatalogus te bekijken en te filteren.

*Standaard: `true`*

### `course_catalog_display_in_home`

**Catalogus Weergeven op Startpagina**

Toon het cursuscatalogusblok op de startpagina van het platform.

*Standaard: `false`*

### `course_catalog_hide_private`

**Privécursussen Verbergen**

Sluit privécursussen uit van weergave in de catalogus.

*Standaard: `true`*

### `course_catalog_published`

**Cursuscatalogus Publiceren**

Maak de cursuscatalogus beschikbaar voor anonieme gebruikers (het algemene publiek) zonder dat inloggen nodig is.

*Standaard: `false`*

### `course_catalog_settings`

**Cursuscatalogusinstellingen**

JSON-configuratie voor de cursuscatalogus: koppelingsinstellingen, filters, sorteeropties en meer.

### `course_subscription_in_user_s_session`

**Inschrijving in Sessieweergave**

Sta gebruikers toe om zich rechtstreeks vanuit hun sessiepagina in te schrijven voor cursussen.

*Standaard: `false`*

### `hide_public_link`

**Publieke Link Verbergen**

Verwijder de publieke URL-link van cursuskaarten.

*Standaard: `false`*

### `only_show_course_from_selected_category`

**Alleen Overeenkomende Categorieën Tonen in Cursuscatalogus**

Indien niet leeg, worden alleen cursussen uit de opgegeven categorieën weergegeven in de cursuscatalogus.

### `only_show_selected_courses`

**Alleen Geselecteerde Cursussen**

Toon alleen handmatig geselecteerde cursussen in de catalogus.

*Standaard: `false`*

### `session_catalog_settings`

**Sessie-catalogusinstellingen**

JSON-configuratie voor de sessiecatalogus: filters en weergave-opties.

### `show_courses_descriptions_in_catalog`

**Cursusbeschrijvingen Tonen**

Toon cursusbeschrijvingen binnen de cataloguslijst.

*Standaard: `false`*

### `show_courses_sessions`

**Cursussen en Sessies Tonen**

Neem zowel cursussen als sessies op in de catalogusresultaten.

*Standaard: `0`*