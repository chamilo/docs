# Enquête-instellingen

Standaardwaarden en gedrag van de tool **Surveys**.

Open deze instellingen via **Beheer > Configuratie-instellingen > Surveys**. Deze categorie bevat **12 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code staat in monospace. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `extend_rights_for_coach_on_survey`

**Rechten van tutoren voor enquêtes uitbreiden**

Schakel deze optie in om tutoren toe te staan enquêtes te maken en te bewerken

*Standaard: `true`*


### `hide_survey_edition`

**Bewerken van enquêtes voorkomen**

Voorkom het bewerken van enquêtes voor alle hier vermelde enquêtes (op code). Gebruik * om het bewerken van alle enquêtes te voorkomen.

### `hide_survey_reporting_button`

**Rapportageknop van enquêtes verbergen**

Stelt beheerders in staat de rapportageknop van enquêtes te verbergen wanneer enquêtes worden gebruikt om docenten te bevragen.

*Standaard: `false`*


### `show_pending_survey_in_menu`

**"Openstaande enquêtes" in het menu tonen**

Toon een menu-item waarmee gebruikers hun openstaande enquêtes kunnen openen.

*Standaard: `false`*


### `show_surveys_base_in_sessions`

**Enquêtes van de basiscursus in alle sessiecursussen weergeven**

[inferred] Maak enquêtes van de basiscursus zichtbaar en beschikbaar voor cursisten in alle gerelateerde sessiecursussen.

*Standaard: `false`*


### `survey_additional_teacher_modify_actions`

**Extra acties (als koppelingen) toevoegen aan enquêtelijsten voor docenten**

Voeg acties toe (meestal gekoppeld aan plugins) in de lijst van enquêtes. Gebruik arraysyntaxis ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']].

### `survey_allow_answered_question_edit`

**Docenten toestaan enquêtevragen te bewerken nadat studenten hebben geantwoord**

[inferred] Sta docenten toe enquêtevragen te wijzigen, ook nadat cursisten antwoorden hebben ingediend.

*Standaard: `false`*


### `survey_anonymous_show_answered`

**Docenten toestaan te zien wie heeft geantwoord bij anonieme enquêtes**

Sta docenten toe te zien welke cursisten al een anonieme enquête hebben beantwoord. Dit verschijnt pas wanneer meer dan één gebruiker heeft geantwoord, zodat het moeilijk blijft te achterhalen wie wat heeft geantwoord.

*Standaard: `false`*


### `survey_backwards_enable`

**Knop 'vorige vraag' in enquêtes inschakelen**

[inferred] Schakel een navigatieknop "vorige vraag" in zodat cursisten eerdere enquêtevragen kunnen terugzien.

*Standaard: `false`*


### `survey_duplicate_order_by_name`

**Sorteren op studentnaam bij gebruik van de enquête-duplicatiefunctie**

De enquête-duplicatiefunctie is gericht op docenten en is bedoeld om docenten in volgorde hun waardering over elke student te laten geven. Deze optie sorteert de vragen op de achternaam van de cursist.

*Standaard: `true`*


### `survey_email_sender_noreply`

**Afzender van enquête-e-mail (no-reply)**

Moeten enquête-uitnodigingen het e-mailadres van de tutor gebruiken of het no-reply-adres dat is gedefinieerd in de hoofdconfiguratie?

*Standaard: `coach`* (de keuze "E-mailafzender van de cursustutor" — de opgeslagen waarde is ongewijzigd ten opzichte van eerdere Chamilo-versies, maar de optie is in de interface gelabeld als "tutor")


### `survey_mark_question_as_required`

**Alle enquêtevragen standaard als 'verplicht' markeren**

[inferred] Markeer alle nieuw aangemaakte enquêtevragen standaard automatisch als verplichte antwoorden.

*Standaard: `false`*