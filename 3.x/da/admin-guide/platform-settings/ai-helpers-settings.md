# Indstillinger for AI-hjælpere

Konfiguration af AI-hjælperne (tekstgenerering, billedgenerering, videogenerering, AI-tutor, AI-bedømmelse). Hver udbyder kan aktiveres pr. opgavetype. Se også [AI-konfiguration](../integrations/ai-configuration.md).

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > AI-hjælpere**. Denne kategori indeholder **14 indstillinger**, som er oplistet nedenfor med den titel og den kommentar, der leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det, når du script’er via API’et, eller når du skal ændre disse indstillinger på globalt niveau ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `ai_providers`

**Forbindelsesdata for AI-udbydere**

Konfigurationsdata til at forbinde med eksterne AI-tjenester.

### `content_analyser`

**Indholdsanalysator**

Analyserer læringsmaterialer for at udlede indsigter eller forbedre kvaliteten.

*Standard: `false`*

### `course_analyser`

**Kursusanalysator**

Analyserer alle ressourcer i ét eller flere kurser og fortræner AI-modellen til at besvare ethvert spørgsmål om dette eller disse kurser (sørg for, at indholdet kan deles med de konfigurerede AI-tjenester).

*Standard: `false`*

### `disclose_ai_assistance`

**Oplys om AI-assistance**

Vis et mærke på alt indhold eller al feedback, der er genereret eller medgenereret af et AI-system, så brugeren kan se, at indholdet er udarbejdet med hjælp fra et AI-system. Oplysninger om, hvilket AI-system der blev brugt i hvilket tilfælde, opbevares i databasen til revision, men er ikke direkte tilgængelige for slutbrugeren.

*Standard: `true`*

### `enable_ai_helpers`

**Aktivér AI-hjælperværktøjet**

Aktiverer alle tilgængelige AI-drevne funktioner på platformen.

*Standard: `false`*

### `exercise_generator`

**Øvelsesgenerator**

Genererer personlige tests med AI baseret på kursusindhold.

*Standard: `false`*

### `glossary_terms_generator`

**Generator af glossartermer**

Giver undervisere mulighed for at anmode om AI-genererede glossartermer i deres kursus. Dette genererer 20 termer baseret på kursets titel og den generelle beskrivelse i værktøjet til kursusbeskrivelse. Hvis det bruges mere end én gang, udelukkes termer, der allerede findes i den pågældende glossar (sørg for, at indholdet kan deles med de konfigurerede AI-tjenester).

*Standard: `false`*

### `image_generator`

**Billedgenerator**

Genererer billeder baseret på prompts eller indhold ved hjælp af AI.

*Standard: `false`*

### `learning_path_generator`

**Generator af læringsstier**

Genererer personlige læringsstier ved hjælp af AI-forslag.

*Standard: `false`*

### `open_answers_grader`

**Bedømmer af åbne svar**

Bedømmer automatisk åbne svar ved hjælp af AI.

*Standard: `false`*

### `task_grader`

**Bedømmer af afleveringer**

Bruger AI til at evaluere og bedømme uploadede afleveringer.

*Standard: `false`*

### `tutor_chatbot`

**Tutor-chatbot drevet af AI**

Giver studerende en AI-drevet tutorassistent.

*Standard: `false`*

### `video_generator`

**Videogenerator**

Genererer videoer baseret på prompts eller indhold ved hjælp af AI (dette kan forbruge mange tokens).

*Standard: `false`*

### `wysiwyg_translation_all_languages` **v3**

**Tillad AI-oversættelse til alle aktive sprog i WYSIWYG-editorer**

Giver undervisere mulighed for at generere oversættelser til alle aktive platformsprog i én WYSIWYG-handling. Dette kan forbruge et stort antal AI-tokens.

*Standard: `true`*