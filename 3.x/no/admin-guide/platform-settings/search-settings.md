# Søkeinnstillinger

Konfigurasjon av systemet for fulltekstsøk (Xapian).

Tilgang til disse innstillingene under **Administrasjon > Konfigurasjonsinnstillinger > Søk**. Denne kategorien inneholder **3 innstillinger**, listet nedenfor med tittel og kommentar som leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det ved skripting via API-et eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `search_enabled`

**Funksjon for fulltekstsøk**

Velg «Ja» for å aktivere denne funksjonen. Den er sterkt avhengig av Xapian-utvidelsen for PHP, så dette vil ikke fungere hvis denne utvidelsen ikke er installert på serveren din, i versjon 1.x som minimum.

*Standard: `false`*


### `search_prefilter_prefix`

**Spesifikt felt for forhåndsfilter**

Dette valget lar deg velge det spesifikke feltet som skal brukes ved søketype med forhåndsfilter.

### `search_show_unlinked_results`

**Fulltekstsøk: vis resultater uten tilknytning**

Når resultatene av et fulltekstsøk vises, hva skal gjøres med resultatene som den gjeldende brukeren ikke har tilgang til?

*Standard: `true`*