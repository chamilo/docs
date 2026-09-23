# Innstillinger for sosialt nettverk

Oppførsel for **sosialt nettverk** — venner, grupper, vegginnlegg, fotoalbum.

Tilgang til disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > Sosialt nettverk**. Denne kategorien inneholder **7 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `allow_social_tool`

**Verktøy for sosialt nettverk (Facebook-lignende)**

Verktøyet for sosialt nettverk lar brukere definere relasjoner til andre brukere og dermed definere vennegrupper. Kombinert med det interne meldingsverktøyet gir dette tett kommunikasjon med venner, inne i portalmiljøet.

*Standard: `true`*

### `allow_students_to_create_groups_in_social`

**Tillat at lærende oppretter grupper i sosialt nettverk**

Tillat at lærende oppretter grupper i sosialt nettverk

*Standard: `false`*


### `disable_dislike_option`

**Deaktiver «mislike» for sosiale innlegg**

Fjern tommel ned-valget for tilbakemelding på sosiale innlegg. Behold kun tommel opp (like).

*Standard: `false`*

### `hide_social_groups_block`

**Skjul gruppeblokk i sosialt nettverk**

Fjerner gruppeseksjonen fra visningen av sosialt nettverk.

*Standard: `false`*


### `social_enable_messages_feedback`

**Like/mislike for sosiale innlegg**

Lar brukere gi tilbakemelding (likes eller mislikes) på innlegg på den sosiale veggen.

*Standard: `false`*

### `social_make_teachers_friend_all`

**Lærere og administratorer ser studenter som venner i sosialt nettverk**

Gjør automatisk at instruktører og administratorer vises som venner for alle studenter i modulen for sosialt nettverk.

*Standard: `false`*


### `social_show_language_flag_in_profile`

**Vis språkflagg ved siden av avatar i sosialt nettverk**

Viser brukerens språkpreferanse som et flaggikon ved siden av avataren i profiler i sosialt nettverk.

*Standard: `false`*