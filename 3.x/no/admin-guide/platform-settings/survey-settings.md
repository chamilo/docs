# Undersøkelsesinnstillinger

Standardverdier og atferd for verktøyet **Undersøkelser**.

Tilgang til disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > Undersøkelser**. Denne kategorien inneholder **12 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `extend_rights_for_coach_on_survey`

**Utvid rettigheter for veiledere på undersøkelser**

Aktiver dette valget for å la veiledere opprette og redigere undersøkelser

*Standard: `true`*


### `hide_survey_edition`

**Forhindre redigering av undersøkelser**

Forhindre redigering av alle undersøkelser som er listet her (etter kode). Bruk * for å forhindre redigering av alle undersøkelser.

### `hide_survey_reporting_button`

**Skjul knappen for undersøkelsesrapportering**

Lar administratorer skjule knappen for undersøkelsesrapportering dersom undersøkelser brukes til å kartlegge lærere.

*Standard: `false`*


### `show_pending_survey_in_menu`

**Vis «Ventende undersøkelser» i menyen**

Vis et menyelement som lar brukere få tilgang til ventende undersøkelser.

*Standard: `false`*


### `show_surveys_base_in_sessions`

**Vis undersøkelser fra basiskurset i alle øktkurs**

[inferred] Gjør undersøkelser fra basiskurset synlige og tilgjengelige for deltakere i alle relaterte øktkurs.

*Standard: `false`*


### `survey_additional_teacher_modify_actions`

**Legg til ekstra handlinger (som lenker) i undersøkelseslister for lærere**

Legg til handlinger (vanligvis knyttet til plugins) i listen over undersøkelser. Bruk array-syntaks ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']].

### `survey_allow_answered_question_edit`

**Tillat lærere å redigere undersøkelsesspørsmål etter at studenter har svart**

[inferred] Tillat instruktører å endre undersøkelsesspørsmål selv etter at deltakere har sendt inn svar.

*Standard: `false`*


### `survey_anonymous_show_answered`

**Tillat lærere å se hvem som har svart i anonyme undersøkelser**

Tillat lærere å se hvilke deltakere som allerede har svart på en anonym undersøkelse. Dette vises først når mer enn én bruker har svart, slik at det fortsatt er vanskelig å identifisere hvem som svarte hva.

*Standard: `false`*


### `survey_backwards_enable`

**Aktiver knappen «forrige spørsmål» i undersøkelser**

[inferred] Aktiver en navigasjonsknapp for «forrige spørsmål» slik at deltakere kan gå tilbake til tidligere undersøkelsesspørsmål.

*Standard: `false`*


### `survey_duplicate_order_by_name`

**Sorter etter studentnavn ved bruk av funksjonen for undersøkelsesduplisering**

Funksjonen for undersøkelsesduplisering er rettet mot lærere og er ment å be lærere om å gi sin vurdering av hver student i rekkefølge. Dette valget vil sortere spørsmålene etter deltakerens etternavn.

*Standard: `true`*


### `survey_email_sender_noreply`

**Avsender av undersøkelses-e-post (no-reply)**

Skal undersøkelsesinvitasjoner bruke veilederens e-postadresse eller no-reply-adressen definert i hovedkonfigurasjonsseksjonen?

*Standard: `coach`* (valget «E-postavsender for kursveileder» — den lagrede verdien er uendret fra tidligere Chamilo-versjoner, men valget er merket «veileder» i grensesnittet)


### `survey_mark_question_as_required`

**Merk alle undersøkelsesspørsmål som «påkrevd» som standard**

[inferred] Merk automatisk alle nylig opprettede undersøkelsesspørsmål som påkrevde svar som standard.

*Standard: `false`*