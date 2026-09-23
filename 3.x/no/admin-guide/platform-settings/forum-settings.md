# Foruminnstillinger

Oppførselen til kursverktøyet **Forums**.

Du finner disse innstillingene under **Administration > Configuration settings > Forums**. Denne kategorien inneholder **9 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `allow_forum_category_language_filter`

**Språkfilter for forumkategorier**

Legg til et språkfilter i forumvisningen for kun å se kategorier konfigurert på et bestemt språk. Krever at ekstrafeltet «language» brukes på entiteten «forum_category».

*Standard: `false`*

### `allow_forum_post_revisions`

**Gjennomgang av foruminnlegg**

Aktiver dette valget for å tillate å be om gjennomgang eller oversettelse av ens innlegg i et forum. Når det er omfattende konfigurert, kan det brukes til å samarbeide med andre brukere i et språklæringsforum.

*Standard: `false`*

### `community_managers_user_list`

**Liste over fellesskapsansvarlige**

Oppgi en tabell med bruker-ID-er som skal regnes som fellesskapsansvarlige i det spesielle kurset som er utpekt som globalt forum. Fellesskapsansvarlige har tilleggsrettigheter i det globale forumet.

### `default_forum_view`

**Standard forumvisning**

Hva som skal være standardvalget når et nytt forum opprettes. Enhver kursleder kan likevel velge en annen visning for hvert enkelt forum

*Standard: `flat`*

### `display_groups_forum_in_general_tool`

**Vis gruppeforum i det generelle forumet**

Vis gruppeforum i forumverktøyet på kursnivå. Dette valget er aktivert som standard (i så fall virker de individuelle synlighetene for gruppeforum fortsatt som et tilleggsvilkår). Hvis det deaktiveres, vil gruppeforum bare være synlige via gruppeverktøyet, enten de er offentlige eller ikke.

*Standard: `true`*

### `forum_fold_categories`

**Slå sammen forumkategorier**

Visuell effekt for å slå sammen/utvide forumkategorier.

*Standard: `false`*

### `global_forums_course_id`

**Bruk kurs som globalt forum**

Angi kurs-ID (numerisk) for et kurs reservert til bruk som globalt forum. Dette erstatter lenken «Social groups» i det sosiale nettverket med en lenke til forumet i det kurset.

*Standard: `0`*

### `hide_forum_post_revision_language`

**Skjul språk for gjennomgang av foruminnlegg**

Skjul muligheten til å tilordne et språk til en gjennomgang av et foruminnlegg.

*Standard: `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Forumvarsler også fra grunnkurset**

Aktiver dette valget for å slå på varsler som kommer fra forumet i grunnkurset, selv om kurset følges gjennom en økt.

*Standard: `false`*