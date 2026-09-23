# Personverninnstillinger

Kontroller for personvern og databeskyttelse (GDPR-lignende) — samtykke, dataeksport, forespørsler om sletting av konto og lignende.

Åpne disse innstillingene under **Administrasjon > Konfigurasjonsinnstillinger > Personvern**. Denne kategorien inneholder **6 innstillinger**, listet nedenfor med tittel og kommentar som følger med i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `data_protection_officer_email`

**E-postadresse til personvernombud**

E-postadresse til det utpekte personvernombudet, vist i GDPR-/personvernseksjoner.

### `data_protection_officer_name`

**Navn på personvernombud**

Fullt navn på det utpekte personvernombudet, vist på sider for personopplysninger og personvern.

### `data_protection_officer_role`

**Rolle for personvernombud**

Stillingstittel eller rolle for det utpekte personvernombudet, vist sammen med navnet i personverninformasjon.

### `disable_change_user_visibility_for_public_courses`

**Deaktiver synliggjøring av verktøybrukere i offentlige kurs**

Unngå at noen gjør «brukere»-verktøyet synlig i et offentlig kurs.

*Standard: `true`*

### `disable_gdpr`

**Deaktiver GDPR-funksjoner**

Hvis du allerede håndterer erklæringen om beskyttelse av personopplysninger overfor brukerne et annet sted, kan du trygt deaktivere denne funksjonen.

*Standard: `true`*

### `hide_user_field_from_list`

**Skjul felt fra brukerliste i kurs**

Som standard viser vi alle data om brukere i brukerverktøyet i kurset. Denne tabellen lar deg angi hvilke felt du ikke vil vise. Påvirker bare hovedfelt (ikke ekstra felt).