# Instellingen AI-helpers

Configuratie van de AI-helpers (tekstgeneratie, beeldgeneratie, videogeneratie, AI-tutor, AI-beoordeling). Elke provider kan per taaktype worden ingeschakeld. Zie ook [AI-configuratie](../integrations/ai-configuration.md).

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > AI-helpers**. Deze categorie bevat **14 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code staat in monospace. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `ai_providers`

**Verbindingsgegevens AI-providers**

Configuratiegegevens om verbinding te maken met externe AI-diensten.

### `content_analyser`

**Inhoudsanalyser**

Analyseert leermateriaal om inzichten te extraheren of de kwaliteit te verbeteren.

*Standaard: `false`*

### `course_analyser`

**Cursusanalyser**

Analyseert alle bronnen in één of meerdere cursussen en traint het AI-model vooraf om elke vraag over deze cursus of cursussen te beantwoorden (zorg ervoor dat inhoud mag worden gedeeld met de geconfigureerde AI-diensten).

*Standaard: `false`*

### `disclose_ai_assistance`

**AI-ondersteuning kenbaar maken**

Toon een label op alle inhoud of feedback die is gegenereerd of mede-gegenereerd door een AI-systeem, zodat de gebruiker ziet dat de inhoud tot stand is gekomen met hulp van een AI-systeem. Details over welk AI-systeem in welk geval is gebruikt, blijven in de database voor auditdoeleinden, maar zijn niet rechtstreeks toegankelijk voor de eindgebruiker.

*Standaard: `true`*

### `enable_ai_helpers`

**AI-helpertool inschakelen**

Schakelt alle beschikbare AI-functies in het platform in.

*Standaard: `false`*

### `exercise_generator`

**Oefeningengenerator**

Genereert gepersonaliseerde toetsen met AI op basis van cursusinhoud.

*Standaard: `false`*

### `glossary_terms_generator`

**Generator van begrippenlijsttermen**

Stelt docenten in staat om AI-gegenereerde begrippenlijsttermen in hun cursus aan te vragen. Dit genereert 20 termen op basis van de cursustitel en de algemene beschrijving in de tool Cursusbeschrijving. Bij herhaald gebruik worden termen die al in die begrippenlijst staan uitgesloten (zorg ervoor dat inhoud mag worden gedeeld met de geconfigureerde AI-diensten).

*Standaard: `false`*

### `image_generator`

**Beeldgenerator**

Genereert afbeeldingen op basis van prompts of inhoud met behulp van AI.

*Standaard: `false`*

### `learning_path_generator`

**Leerpadengenerator**

Genereert gepersonaliseerde leerpaden met AI-suggesties.

*Standaard: `false`*

### `open_answers_grader`

**Beoordelaar open antwoorden**

Beoordeelt open antwoorden automatisch met AI.

*Standaard: `false`*

### `task_grader`

**Opdrachtenbeoordelaar**

Gebruikt AI om geüploade opdrachten te evalueren en te beoordelen.

*Standaard: `false`*

### `tutor_chatbot`

**Tutor-chatbot aangedreven door AI**

Biedt studenten een AI-gestuurde tutorassistent.

*Standaard: `false`*

### `video_generator`

**Videogenerator**

Genereert video's op basis van prompts of inhoud met behulp van AI (dit kan veel tokens verbruiken).

*Standaard: `false`*

### `wysiwyg_translation_all_languages` **v3**

**AI-vertaling naar alle actieve talen in WYSIWYG-editors toestaan**

Stelt docenten in staat om in één WYSIWYG-actie vertalingen te genereren voor alle actieve platformtalen. Dit kan een groot aantal AI-tokens verbruiken.

*Standaard: `true`*