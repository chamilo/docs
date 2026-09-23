# Sporingsinnstillinger

Standardinnstillinger knyttet til sporing — hva som registreres, hvilke rapporter som vises, og regler for tidsberegning.

Tilgang til disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > Sporing**. Denne kategorien inneholder **10 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `block_my_progress_page`

**Hindre tilgang til «Min fremgang»**

I spesifikke implementasjoner som nettbaserte eksamener kan du ønske å hindre brukertilgang til siden «Min fremgang».

*Standard: `false`*

### `footer_extra_content`

**Ekstra innhold i bunntekst**

Du kan legge til HTML-kode som metakoder

### `header_extra_content`

**Ekstra innhold i topptekst**

Du kan legge til HTML-kode som metakoder

### `meta_description`

**Metabeskrivelse**

Dette viser en OpenGraph Description-meta (og:description) i nettstedets topptekster

### `meta_image_path`

**Sti til metabildet**

Denne stien til metabildet er stien til en fil inne i Chamilo-katalogen din (f.eks. home/image.png) som skal vises i et Twitter-kort eller et OpenGraph-kort når en lenke til LMS-et ditt vises. Twitter anbefaler et bilde på 120 x 120 piksler, som noen ganger kan beskjæres til 120x90.

### `meta_title`

**OpenGraph-metatittel**

Dette viser en OpenGraph Title-meta (og:title) i nettstedets topptekster

### `meta_twitter_creator`

**Twitter-konto for opphavsperson**

Twitter Creator er en Twitter-konto (f.eks. @ywarnier) som representerer *personen* som opprettet nettstedet. Dette feltet er valgfritt.

### `meta_twitter_site`

**Twitter-konto for nettstedet**

Twitter-nettstedet er en Twitter-konto (f.eks. @chamilo_news) som er knyttet til nettstedet ditt. Det er vanligvis en mer midlertidig konto enn Twitter-kontoen for opphavsperson, eller den representerer en enhet (i stedet for en person). Dette feltet er påkrevd hvis du vil at Twitter-kortets metafelt skal vises.

### `my_progress_course_tools_order`

**Rekkefølge på verktøy på siden «Min fremgang»**

Endre rekkefølgen på verktøy som vises på siden «Min fremgang» for lærende. Alternativer inkluderer 'quizzes', 'learning_paths' og 'skills'.

### `tracking_skip_generic_data`

**Hopp over generiske data på den lærendes egen sporingsside**

Hvis siden «Min fremgang» tar for lang tid å laste, kan du ønske å fjerne behandlingen av generisk statistikk for brukeren. I så fall aktiverer du denne innstillingen.

*Standard: `false`*