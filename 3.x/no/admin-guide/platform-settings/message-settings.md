# Meldingsinnstillinger

Oppførsel for **Meldinger / Innboks**-systemet.

Disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > Meldinger**. Denne kategorien inneholder **7 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `allow_message_tool`

**Internt meldingsverktøy**

Aktivering av det interne meldingsverktøyet lar brukere sende meldinger til andre brukere på plattformen og ha en meldingsinnboks.

*Standard: `true`*

### `allow_send_message_to_all_platform_users`

**Tillat sending av meldinger til alle plattformbrukere**

Lar deg sende meldinger til hvilken som helst bruker på plattformen, ikke bare vennene dine eller personene som er pålogget akkurat nå.

*Standard: `false`*

### `allow_user_message_tracking`

**Administratorer kan se personlige meldinger**

Tillat administratorer å se personlige meldinger mellom en lærer og en student. Sørg for at du tar med en merknad i vilkårene dine, ettersom dette kan påvirke personvern.

*Standard: `false`*


### `filter_interactivity_messages`

**Lærere kan bare få tilgang til studenters meldinger innenfor øktens tidsramme**

Filtrer meldinger mellom en lærer og en student mellom øktens start- og sluttdatoer

*Standard: `false`*


### `message_max_upload_filesize`

**Maksimal opplastingsfilstørrelse i meldinger**

Maksimal størrelse for filopplastinger i meldingsverktøyet (i byte)

*Standard: `20971520`*

### `private_messages_about_user`

**Tillat private meldinger mellom lærere om en student**

Tillat utveksling av meldinger fra lærere/ledere om en bruker fra sporingsiden til den brukeren.

*Standard: `false`*


### `private_messages_about_user_visible_to_user`

**Tillat at studenter ser meldinger om dem mellom lærere**

Hvis utveksling av meldinger om en bruker er aktivert, vil dette valget la den aktuelle brukeren se meldingene. Dette er for å overholde åpenhetsregler som organisasjonen kan være pålagt å følge.

*Standard: `false`*