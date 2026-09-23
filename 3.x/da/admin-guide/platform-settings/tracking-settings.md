# Sporingsindstillinger

Standardindstillinger relateret til sporing — hvad der registreres, hvilke rapporter der vises, og regler for tidsberegning.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Sporing**. Denne kategori indeholder **10 indstillinger**, som er anført nedenfor med titel og kommentar som de leveres i platformens indstillingsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med fastbreddeskrift. Brug det, når du script’er via API’et, eller når du skal ændre disse indstillinger globalt ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `block_my_progress_page`

**Forhindr adgang til 'Min fremgang'**

I specifikke implementeringer som onlineeksaminer kan du ønske at forhindre brugere i at tilgå siden 'Min fremgang'.

*Standard: `false`*

### `footer_extra_content`

**Ekstra indhold i sidefod**

Du kan tilføje HTML-kode som metatags

### `header_extra_content`

**Ekstra indhold i sidehoved**

Du kan tilføje HTML-kode som metatags

### `meta_description`

**Metabeskrivelse**

Dette viser en OpenGraph Description-meta (og:description) i dit websteds sidehoveder

### `meta_image_path`

**Sti til metabillede**

Denne sti til metabillede er stien til en fil inde i din Chamilo-mappe (f.eks. home/image.png), som skal vises i et Twitter-kort eller et OpenGraph-kort, når der vises et link til dit LMS. Twitter anbefaler et billede på 120 x 120 pixels, som nogle gange kan beskæres til 120x90.

### `meta_title`

**OpenGraph-metatitel**

Dette viser en OpenGraph Title-meta (og:title) i dit websteds sidehoveder

### `meta_twitter_creator`

**Twitter Creator-konto**

Twitter Creator er en Twitter-konto (f.eks. @ywarnier), der repræsenterer den *person*, der har oprettet webstedet. Dette felt er valgfrit.

### `meta_twitter_site`

**Twitter Site-konto**

Twitter-webstedet er en Twitter-konto (f.eks. @chamilo_news), der er relateret til dit websted. Det er som regel en mere midlertidig konto end Twitter Creator-kontoen, eller den repræsenterer en enhed (i stedet for en person). Dette felt er påkrævet, hvis du vil have Twitter-kortets metafelter vist.

### `my_progress_course_tools_order`

**Rækkefølge af værktøjer på siden 'Min fremgang'**

Ændr rækkefølgen af værktøjer, der vises på siden 'Min fremgang' for kursister. Muligheder omfatter 'quizzes', 'learning_paths' og 'skills'.

### `tracking_skip_generic_data`

**Spring generiske data over på kursistens selvsporingsside**

Hvis siden 'Min fremgang' tager for lang tid at indlæse, kan du ønske at fjerne behandlingen af generiske statistikker for brugeren. Aktivér i så fald denne indstilling.

*Standard: `false`*