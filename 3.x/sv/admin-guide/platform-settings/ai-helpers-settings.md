# Inställningar för AI-hjälpare

Konfiguration av AI-hjälparna (textgenerering, bildgenerering, videogenerering, AI-tutor, AI-bedömning). Varje leverantör kan aktiveras per uppgiftstyp. Se även [AI-konfiguration](../integrations/ai-configuration.md).

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > AI-hjälpare**. Denna kategori innehåller **14 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `ai_providers`

**Anslutningsdata för AI-leverantörer**

Konfigurationsdata för anslutning till externa AI-tjänster.

### `content_analyser`

**Innehållsanalysator**

Analyserar läromaterial för att extrahera insikter eller förbättra kvaliteten.

*Standard: `false`*

### `course_analyser`

**Kursanalysator**

Analyserar alla resurser i en eller flera kurser och förtränar AI-modellen att svara på valfri fråga om denna eller dessa kurser (se till att innehållet kan delas med de konfigurerade AI-tjänsterna).

*Standard: `false`*

### `disclose_ai_assistance`

**Redovisa AI-assistans**

Visa en märkning på allt innehåll eller all återkoppling som har genererats eller samgenererats av något AI-system, så att användaren ser att innehållet skapats med hjälp av något AI-system. Uppgifter om vilket AI-system som använts i vilket fall sparas i databasen för revision, men är inte direkt tillgängliga för slutanvändaren.

*Standard: `true`*

### `enable_ai_helpers`

**Aktivera AI-hjälparverktyget**

Aktiverar alla tillgängliga AI-drivna funktioner i plattformen.

*Standard: `false`*

### `exercise_generator`

**Övningsgenerator**

Genererar personliga tester med AI baserat på kursinnehåll.

*Standard: `false`*

### `glossary_terms_generator`

**Generator för ordlistetermer**

Låter lärare begära AI-genererade ordlistetermer i sin kurs. Detta genererar 20 termer baserat på kurstiteln och den allmänna beskrivningen i verktyget för kursbeskrivning. Om det används mer än en gång utesluts termer som redan finns i den ordlistan (se till att innehållet kan delas med de konfigurerade AI-tjänsterna).

*Standard: `false`*

### `image_generator`

**Bildgenerator**

Genererar bilder baserat på prompter eller innehåll med hjälp av AI.

*Standard: `false`*

### `learning_path_generator`

**Generator för lärstigar**

Genererar personliga lärstigar med hjälp av AI-förslag.

*Standard: `false`*

### `open_answers_grader`

**Bedömare av öppna svar**

Bedömer automatiskt öppna svar med hjälp av AI.

*Standard: `false`*

### `task_grader`

**Bedömare av inlämningsuppgifter**

Använder AI för att utvärdera och betygsätta uppladdade inlämningsuppgifter.

*Standard: `false`*

### `tutor_chatbot`

**Tutor-chatbot driven av AI**

Ger studenter en AI-driven handledningsassistent.

*Standard: `false`*

### `video_generator`

**Videogenerator**

Genererar videor baserat på prompter eller innehåll med hjälp av AI (detta kan förbruka många tokens).

*Standard: `false`*

### `wysiwyg_translation_all_languages` **v3**

**Tillåt AI-översättning till alla aktiva språk i WYSIWYG-redigerare**

Låter lärare generera översättningar till alla aktiva plattformsspråk i en WYSIWYG-åtgärd. Detta kan förbruka ett stort antal AI-tokens.

*Standard: `true`*