# Indstillinger for spørgeskemaer

Standardværdier og adfærd for værktøjet **Surveys**.

Tilgå disse indstillinger under **Administration > Configuration settings > Surveys**. Denne kategori indeholder **12 indstillinger**, som er oplistet nedenfor med den titel og den kommentar, der leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det, når du script’er via API’et, eller når du skal ændre disse indstillinger globalt ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `extend_rights_for_coach_on_survey`

**Udvid rettigheder for tutorer på spørgeskemaer**

Aktivér denne indstilling for at tillade tutorer at oprette og redigere spørgeskemaer

*Standard: `true`*


### `hide_survey_edition`

**Forhindr redigering af spørgeskemaer**

Forhindr redigering af spørgeskemaer for alle spørgeskemaer, der er angivet her (efter kode). Brug * for at forhindre redigering af alle spørgeskemaer.

### `hide_survey_reporting_button`

**Skjul knappen til spørgeskemarapportering**

Giver administratorer mulighed for at skjule knappen til spørgeskemarapportering, hvis spørgeskemaer bruges til at evaluere undervisere.

*Standard: `false`*


### `show_pending_survey_in_menu`

**Vis "Afventende spørgeskemaer" i menuen**

Vis et menupunkt, der giver brugere adgang til deres afventende spørgeskemaer.

*Standard: `false`*


### `show_surveys_base_in_sessions`

**Vis spørgeskemaer fra basiskurset i alle sessionskurser**

[inferred] Gør spørgeskemaer fra basiskurset synlige og tilgængelige for kursister i alle relaterede sessionskurser.

*Standard: `false`*


### `survey_additional_teacher_modify_actions`

**Tilføj yderligere handlinger (som links) til spørgeskemalister for undervisere**

Tilføj handlinger (typisk knyttet til plugins) i listen over spørgeskemaer. Brug arraysyntaks ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']].

### `survey_allow_answered_question_edit`

**Tillad undervisere at redigere spørgeskemaspørgsmål, efter kursister har svaret**

[inferred] Tillad undervisere at ændre spørgeskemaspørgsmål, selv efter at kursister har indsendt svar.

*Standard: `false`*


### `survey_anonymous_show_answered`

**Tillad undervisere at se, hvem der har svaret i anonyme spørgeskemaer**

Tillad undervisere at se, hvilke kursister der allerede har besvaret et anonymt spørgeskema. Dette vises først, når mere end én bruger har svaret, så det fortsat er vanskeligt at identificere, hvem der har svaret hvad.

*Standard: `false`*


### `survey_backwards_enable`

**Aktivér knappen 'forrige spørgsmål' i spørgeskemaer**

[inferred] Aktivér en navigationsknap til "forrige spørgsmål", så kursister kan gennemgå tidligere spørgeskemaspørgsmål.

*Standard: `false`*


### `survey_duplicate_order_by_name`

**Sortér efter kursistnavn ved brug af funktionen til duplikering af spørgeskemaer**

Funktionen til duplikering af spørgeskemaer er rettet mod undervisere og er beregnet til at bede undervisere om at give deres vurdering af hver kursist i rækkefølge. Denne indstilling sorterer spørgsmålene efter kursistens efternavn.

*Standard: `true`*


### `survey_email_sender_noreply`

**Afsender af spørgeskema-e-mail (no-reply)**

Skal invitationer til spørgeskemaer bruge tutorens e-mailadresse eller no-reply-adressen, der er defineret i hovedkonfigurationsafsnittet?

*Standard: `coach`* (valget "Course tutor email sender" — den gemte værdi er uændret i forhold til tidligere Chamilo-versioner, men indstillingen er mærket "tutor" i grænsefladen)


### `survey_mark_question_as_required`

**Markér alle spørgeskemaspørgsmål som 'påkrævede' som standard**

[inferred] Markér automatisk alle nyoprettede spørgeskemaspørgsmål som påkrævede svar som standard.

*Standard: `false`*