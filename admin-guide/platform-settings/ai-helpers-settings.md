# Instellingen voor AI-helpers

Configuratie van de AI-helpers (tekstgeneratie, beeldgeneratie, videoproductie, AI-tutor, AI-beoordeling). Elke provider kan per taaktype worden ingeschakeld. Zie ook [AI-configuratie](../integrations/ai-configuration.md).

Toegang tot deze instellingen vindt u onder **Beheer > Configuratie-instellingen > AI-helpers**. Deze categorie bevat **13 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de platforminstellingen (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `ai_providers`

**Verbindingsgegevens voor AI-providers**

Configuratiegegevens om verbinding te maken met externe AI-diensten.

### `content_analyser`

**Inhoudsanalysator**

Analyseert leermaterialen om inzichten te verkrijgen of de kwaliteit te verbeteren.

*Standaard: `false`*

### `course_analyser`

**Cursusanalysator**

Analyseert alle bronnen in een of meerdere cursussen en traint het AI-model vooraf om vragen over deze cursus(sen) te beantwoorden (zorg ervoor dat inhoud gedeeld kan worden met de geconfigureerde AI-diensten).

*Standaard: `false`*

### `disclose_ai_assistance`

**AI-ondersteuning bekendmaken**

Toont een label op alle inhoud of feedback die is gegenereerd of mede-gegenereerd door een AI-systeem, zodat de gebruiker kan zien dat de inhoud met behulp van een AI-systeem is gemaakt. Details over welk AI-systeem in welk geval is gebruikt, worden in de database opgeslagen voor auditdoeleinden, maar zijn niet direct toegankelijk voor de eindgebruiker.

*Standaard: `true`*

### `enable_ai_helpers`

**AI-helpertool inschakelen**

Schakelt alle beschikbare AI-gestuurde functies in het platform in.

*Standaard: `false`*

### `exercise_generator`

**Oefeningengenerator**

Genereert gepersonaliseerde tests met AI op basis van cursusinhoud.

*Standaard: `false`*

### `glossary_terms_generator`

**Generator voor woordenlijsttermen**

Stelt docenten in staat om AI-gegenereerde woordenlijsttermen voor hun cursus aan te vragen. Dit genereert 20 termen op basis van de cursustitel en de algemene beschrijving in het cursusbeschrijvingstool. Bij herhaald gebruik worden termen die al in die woordenlijst staan uitgesloten (zorg ervoor dat inhoud gedeeld kan worden met de geconfigureerde AI-diensten).

*Standaard: `false`*

### `image_generator`

**Beeldgenerator**

Genereert afbeeldingen op basis van prompts of inhoud met behulp van AI.

*Standaard: `false`*

### `learning_path_generator`

**Generator voor leerpaden**

Genereert gepersonaliseerde leerpaden met behulp van AI-suggesties.

*Standaard: `false`*

### `open_answers_grader`

**Beoordelaar van open antwoorden**

Beoordeelt automatisch open vragen met behulp van AI.

*Standaard: `false`*

### `task_grader`

**Beoordelaar van opdrachten**

Gebruikt AI om ingeleverde opdrachten te evalueren en te beoordelen.

*Standaard: `false`*

### `tutor_chatbot`

**Tutor-chatbot aangedreven door AI**

Biedt studenten een AI-gestuurde tutorassistent.

*Standaard: `false`*

### `video_generator`

**Videogenerator**

Genereert video's op basis van prompts of inhoud met behulp van AI (dit kan veel tokens verbruiken).

*Standaard: `false`*