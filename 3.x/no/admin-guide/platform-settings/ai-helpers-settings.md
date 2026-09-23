# Innstillinger for AI-hjelpere

Konfigurasjon av AI-hjelperne (tekstgenerering, bildegenerering, videogenerering, AI-veileder, AI-karaktersetting). Hver leverandør kan aktiveres per oppgavetype. Se også [AI-konfigurasjon](../integrations/ai-configuration.md).

Gå til disse innstillingene under **Administrasjon > Konfigurasjonsinnstillinger > AI-hjelpere**. Denne kategorien inneholder **14 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `ai_providers`

**Tilkoblingsdata for AI-leverandører**

Konfigurasjonsdata for tilkobling til eksterne AI-tjenester.

### `content_analyser`

**Innholdsanalysator**

Analyserer læringsmateriell for å hente ut innsikt eller forbedre kvaliteten.

*Standard: `false`*

### `course_analyser`

**Kursanalysator**

Analyserer alle ressurser i ett eller flere kurs og forhåndstrener AI-modellen til å svare på ethvert spørsmål om dette eller disse kursene (sørg for at innholdet kan deles med de konfigurerte AI-tjenestene).

*Standard: `false`*

### `disclose_ai_assistance`

**Oppgi AI-assistanse**

Vis en merkelapp på alt innhold eller all tilbakemelding som er generert eller samgenerert av et AI-system, slik at brukeren ser at innholdet er laget med hjelp av et AI-system. Detaljer om hvilket AI-system som ble brukt i hvert tilfelle lagres i databasen for revisjon, men er ikke direkte tilgjengelige for sluttbrukeren.

*Standard: `true`*

### `enable_ai_helpers`

**Aktiver AI-hjelpeverktøyet**

Aktiverer alle tilgjengelige AI-drevne funksjoner i plattformen.

*Standard: `false`*

### `exercise_generator`

**Øvelsesgenerator**

Genererer personaliserte tester med AI basert på kursinnhold.

*Standard: `false`*

### `glossary_terms_generator`

**Generator for ordlistebegreper**

Lar lærere be om AI-genererte ordlistebegreper i kurset sitt. Dette genererer 20 begreper basert på kurstittelen og den generelle beskrivelsen i verktøyet for kursbeskrivelse. Hvis det brukes mer enn én gang, vil det utelukke begreper som allerede finnes i den ordlisten (sørg for at innholdet kan deles med de konfigurerte AI-tjenestene).

*Standard: `false`*

### `image_generator`

**Bildegenerator**

Genererer bilder basert på ledetekster eller innhold ved hjelp av AI.

*Standard: `false`*

### `learning_path_generator`

**Generator for læringsstier**

Genererer personaliserte læringsstier ved hjelp av AI-forslag.

*Standard: `false`*

### `open_answers_grader`

**Karaktersetter for åpne svar**

Setter automatisk karakter på åpne svar ved hjelp av AI.

*Standard: `false`*

### `task_grader`

**Karaktersetter for innleveringer**

Bruker AI til å vurdere og sette karakter på opplastede innleveringer.

*Standard: `false`*

### `tutor_chatbot`

**Veileder-chatbot drevet av AI**

Gir studentene en AI-drevet veiledningsassistent.

*Standard: `false`*

### `video_generator`

**Videogenerator**

Genererer videoer basert på ledetekster eller innhold ved hjelp av AI (dette kan forbruke mange tokens).

*Standard: `false`*

### `wysiwyg_translation_all_languages` **v3**

**Tillat AI-oversettelse til alle aktive språk i WYSIWYG-redigerere**

Lar lærere generere oversettelser til alle aktive plattformspråk i én WYSIWYG-handling. Dette kan forbruke et stort antall AI-tokens.

*Standard: `true`*