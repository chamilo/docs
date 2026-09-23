# Enkätinställningar

Standardvärden och beteende för verktyget **Enkäter**.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Enkäter**. Denna kategori innehåller **12 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `extend_rights_for_coach_on_survey`

**Utöka rättigheter för handledare för enkäter**

Aktivera det här alternativet för att tillåta handledare att skapa och redigera enkäter

*Standard: `true`*


### `hide_survey_edition`

**Förhindra redigering av enkäter**

Förhindra redigering av enkäter för alla enkäter som listas här (efter kod). Använd * för att förhindra redigering av alla enkäter.

### `hide_survey_reporting_button`

**Dölj knappen för enkät rapportering**

Tillåter administratörer att dölja knappen för enkät rapportering om enkäter används för att utvärdera lärare.

*Standard: `false`*


### `show_pending_survey_in_menu`

**Visa "Väntande enkäter" i menyn**

Visa ett menyalternativ som låter användare komma åt sina väntande enkäter.

*Standard: `false`*


### `show_surveys_base_in_sessions`

**Visa enkäter från baskursen i alla sessionskurser**

[inferred] Gör enkäter från baskursen synliga och tillgängliga för deltagare i alla relaterade sessionskurser.

*Standard: `false`*


### `survey_additional_teacher_modify_actions`

**Lägg till ytterligare åtgärder (som länkar) i enkätlistor för lärare**

Lägg till åtgärder (vanligtvis kopplade till plugins) i listan över enkäter. Använd arraysyntax ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']].

### `survey_allow_answered_question_edit`

**Tillåt lärare att redigera enkätfrågor efter att studenter har svarat**

[inferred] Tillåt instruktörer att ändra enkätfrågor även efter att deltagare har skickat in svar.

*Standard: `false`*


### `survey_anonymous_show_answered`

**Tillåt lärare att se vem som har svarat i anonyma enkäter**

Tillåt lärare att se vilka deltagare som redan har svarat på en anonym enkät. Detta visas först när mer än en användare har svarat, så det förblir svårt att identifiera vem som svarade vad.

*Standard: `false`*


### `survey_backwards_enable`

**Aktivera knappen "föregående fråga" i enkäter**

[inferred] Aktivera en navigeringsknapp för "föregående fråga" så att deltagare kan granska tidigare enkätfrågor.

*Standard: `false`*


### `survey_duplicate_order_by_name`

**Sortera efter studentnamn vid användning av funktionen för enkät duplicering**

Funktionen för enkät duplicering är inriktad på lärare och är avsedd att be lärare ge sin bedömning av varje student i ordning. Det här alternativet sorterar frågorna efter deltagarens efternamn.

*Standard: `true`*


### `survey_email_sender_noreply`

**Avsändare av enkät-e-post (no-reply)**

Ska enkä tinbjudningar använda handledarens e-postadress eller no-reply-adressen som definieras i huvudkonfigurationsavsnittet?

*Standard: `coach`* (valet "Avsändare av e-post från kurs handledare" — det lagrade värdet är oförändrat från tidigare Chamilo-versioner, men alternativet är märkt "tutor" i gränssnittet)


### `survey_mark_question_as_required`

**Markera alla enkätfrågor som "obligatoriska" som standard**

[inferred] Markera automatiskt alla nyskapade enkätfrågor som obligatoriska svar som standard.

*Standard: `false`*