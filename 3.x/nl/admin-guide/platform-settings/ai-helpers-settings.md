# Instellingen voor AI-helpers

Configuratie van de AI-helpers (tekstgeneratie, afbeeldingsgeneratie, videogeneratie, AI-tutor, AI-beoordeling). Elke provider kan per taaktype worden ingeschakeld. Zie ook [AI-configuratie](../integrations/ai-configuration.md).

Open deze instellingen via **Beheer > Configuratie-instellingen > AI-helpers**. Deze categorie bevat **15 instellingen**, hieronder vermeld met de titel en het commentaar zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `ai_providers`

**Verbindingsgegevens van AI-providers**

Configuratiegegevens om verbinding te maken met externe AI-diensten.

### `content_analyser`

**Inhoudsanalyse**

Analyseert leermaterialen om inzichten te extraheren of de kwaliteit te verbeteren.

*Standaard: `false`*

### `course_analyser`

**Cursusanalyse**

Analyseert alle bronnen in één of meerdere cursussen en traint het AI-model vooraf om vragen over deze cursus of cursussen te beantwoorden (zorg ervoor dat inhoud gedeeld mag worden met de geconfigureerde AI-diensten).

*Standaard: `false`*

### `disclose_ai_assistance`

**AI-ondersteuning vermelden**

Toon een label bij inhoud of feedback die is gegenereerd of mede gegenereerd door een AI-systeem, zodat de gebruiker ziet dat de inhoud met hulp van een AI-systeem tot stand is gekomen. Details over welk AI-systeem in welk geval is gebruikt, worden in de database bewaard voor audit, maar zijn niet rechtstreeks toegankelijk voor de eindgebruiker.

*Standaard: `true`*

### `enable_ai_helpers`

**De AI-helpertool inschakelen**

Schakelt alle beschikbare AI-functies op het platform in.

*Standaard: `false`*

### `exercise_generator`

**Oefeningengenerator**

Genereert gepersonaliseerde toetsen met AI op basis van cursusinhoud.

*Standaard: `false`*

### `glossary_terms_generator`

**Generator van glossariumtermen**

Stelt docenten in staat om AI-gegenereerde glossariumtermen voor hun cursus aan te vragen. Dit genereert 20 termen op basis van de cursustitel en de algemene beschrijving in het hulpmiddel voor de cursusbeschrijving. Bij herhaald gebruik worden termen die al in dat glossarium aanwezig zijn uitgesloten (zorg ervoor dat inhoud gedeeld mag worden met de geconfigureerde AI-diensten).

*Standaard: `false`*

### `image_generator`

**Afbeeldingsgenerator**

Genereert afbeeldingen op basis van prompts of inhoud met behulp van AI.

*Standaard: `false`*

### `learning_path_generator`

**Generator van leerpaden**

Genereert gepersonaliseerde leerpaden met behulp van AI-suggesties.

*Standaard: `false`*

### `open_answers_grader`

**Beoordelaar van open antwoorden**

Beoordeelt open antwoorden automatisch met behulp van AI.

*Standaard: `false`*

### `task_grader`

**Beoordelaar van opdrachten**

Gebruikt AI om geüploade opdrachten te evalueren en te beoordelen.

*Standaard: `false`*

### `toolbox`

**AI Toolbox**

Stelt docenten in staat om AI-ondersteunde educatieve toepassingen binnen cursussen te maken en te versiebeheren.

*Standaard: `false`*

### `tutor_chatbot`

**Tutorchatbot aangedreven door AI**

Biedt studenten een door AI aangedreven tutorassistent.

*Standaard: `false`*

### `video_generator`

**Videogenerator**

Genereert video's op basis van prompts of inhoud met behulp van AI (dit kan veel tokens verbruiken).

*Standaard: `false`*

### `wysiwyg_translation_all_languages` **v3**

**AI-vertaling naar alle actieve talen in WYSIWYG-editors toestaan**

Stelt docenten in staat om in één WYSIWYG-actie vertalingen te genereren voor alle actieve platformtalen. Dit kan een groot aantal AI-tokens verbruiken.

*Standaard: `true`*