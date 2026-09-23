# Søgeindstillinger

Konfiguration af fuldtekstsøgesystemet (Xapian).

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Søgning**. Denne kategori indeholder **3 indstillinger**, som er oplistet nedenfor med den titel og kommentar, der leveres i platformens indstillingsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med fastbreddeskrift. Brug det, når du scriptes via API'et, eller når du skal ændre disse indstillinger på globalt niveau ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `search_enabled`

**Fuldtekstsøgefunktion**

Vælg 'Ja' for at aktivere denne funktion. Den er i høj grad afhængig af Xapian-udvidelsen til PHP, så den vil ikke virke, hvis denne udvidelse ikke er installeret på din server, i version 1.x som minimum.

*Standard: `false`*


### `search_prefilter_prefix`

**Specifikt felt til forfilter**

Denne indstilling lader dig vælge det specifikke felt, der skal bruges ved forfiltersøgning.

### `search_show_unlinked_results`

**Fuldtekstsøgning: vis ikke-tilknyttede resultater**

Når resultaterne af en fuldtekstsøgning vises, hvad skal der gøres med de resultater, som den aktuelle bruger ikke har adgang til?

*Standard: `true`*