# Enquête-instellingen

Standaardinstellingen en gedrag van de **Enquêtes**-tool.

Deze instellingen zijn toegankelijk via **Beheer > Configuratie-instellingen > Enquêtes**. Deze categorie bevat **12 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de platforminstellingen (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `extend_rights_for_coach_on_survey`

**Uitbreiden van rechten voor coaches bij enquêtes**

Het activeren van deze optie stelt coaches in staat om enquêtes aan te maken en te bewerken.

*Standaard: `true`*

### `hide_survey_edition`

**Enquêtebewerking voorkomen**

Voorkom het bewerken van enquêtes voor alle hier vermelde enquêtes (op basis van code). Gebruik * om het bewerken van alle enquêtes te voorkomen.

### `hide_survey_reporting_button`

**Enquêterapportageknop verbergen**

Stelt beheerders in staat om de rapportageknop voor enquêtes te verbergen als enquêtes worden gebruikt om docenten te beoordelen.

*Standaard: `false`*

### `show_pending_survey_in_menu`

**"Openstaande enquêtes" in menu weergeven**

Toon een menu-item waarmee gebruikers toegang krijgen tot hun openstaande enquêtes.

*Standaard: `false`*

### `show_surveys_base_in_sessions`

**Enquêtes van basiscursus weergeven in alle sessiecursussen**

[inferred] Maak enquêtes van de basiscursus zichtbaar en beschikbaar voor leerlingen in alle gerelateerde sessiecursussen.

*Standaard: `false`*

### `survey_additional_teacher_modify_actions`

**Extra acties (als links) toevoegen aan enquêtelijsten voor docenten**

Voeg acties toe (meestal verbonden met plugins) aan de lijst met enquêtes. Gebruik de array-syntaxis ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']].

### `survey_allow_answered_question_edit`

**Docenten toestaan enquêtevragen te bewerken nadat studenten hebben geantwoord**

[inferred] Sta docenten toe om enquêtevragen te wijzigen, zelfs nadat leerlingen antwoorden hebben ingediend.

*Standaard: `false`*

### `survey_anonymous_show_answered`

**Docenten toestaan te zien wie heeft geantwoord bij anonieme enquêtes**

Sta docenten toe om te zien welke leerlingen al hebben geantwoord op een anonieme enquête. Dit wordt pas weergegeven als meer dan één gebruiker heeft geantwoord, zodat het moeilijk blijft om te identificeren wie wat heeft geantwoord.

*Standaard: `false`*

### `survey_backwards_enable`

**Knop 'vorige vraag' inschakelen in enquêtes**

[inferred] Schakel een navigatieknop "vorige vraag" in om leerlingen in staat te stellen eerdere enquêtevragen te bekijken.

*Standaard: `false`*

### `survey_duplicate_order_by_name`

**Sorteren op studentnaam bij gebruik van enquête-duplicatiefunctie**

De enquête-duplicatiefunctie is gericht op docenten en is bedoeld om docenten te vragen hun waardering over elke student in volgorde te geven. Deze optie sorteert de vragen op de achternaam van de leerling.

*Standaard: `true`*

### `survey_email_sender_noreply`

**Enquête e-mailafzender (no-reply)**

Moeten de enquête-uitnodigingen het e-mailadres van de coach gebruiken of het no-reply-adres dat is gedefinieerd in de hoofdconfiguratiesectie?

*Standaard: `coach`*

### `survey_mark_question_as_required`

**Alle enquêtevragen standaard als 'verplicht' markeren**

[inferred] Markeer automatisch alle nieuw aangemaakte enquêtevragen standaard als verplichte antwoorden.

*Standaard: `false`*