# Arbeidsflytinnstillinger

Tverrgående arbeidsflytbrytere — kursopprettelse, validering av påmelding, innleveringsarbeidsflyter og lignende.

Disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > Arbeidsflyter**. Denne kategorien inneholder **23 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `allow_user_course_subscription_by_course_admin`

**Tillat kursabonnement av brukere ved kursadministrator**

Aktivering av dette valget vil tillate kursadministrator å abonnere brukere inne i et kurs

*Standard: `true`*


### `allow_users_to_create_courses`

**Tillat ikke-administratorer å opprette kurs**

Tillat ikke-administratorer (lærere) å opprette nye kurs på serveren

*Standard: `false`*


### `allow_working_time_edition`

**Aktiver redigering av arbeidstid i kurs**

Aktiver denne funksjonen for å la lærere manuelt oppdatere tiden elever har brukt i kurset.

*Standard: `false`*


### `course_visibility_change_only_admin`

**Endring av kursynlighet kun for administratorer**

Fjern muligheten for ikke-administratorer til å endre kursynligheten. Synlighet kan være et problem når det er for mange lærere til å styre direkte. Å tvinge synligheter gjør at organisasjonen bedre kan administrere kurskataloger.

*Standard: `false`*


### `default_menu_entry_for_course_or_session`

**Standard menypunkt for kurs**

Definer standard underelementer for «Kurs»-oppføringen som skal vises hvis brukeren ikke er registrert på noe kurs eller noen økt.

*Standard: `my_courses`*


### `disable_user_conditions_sender_id`

**Intern ID for brukeren som brukes til å sende varsler om deaktiverte kontoer**

Unngå å være for personlig med brukere ved å bruke en «bot»-konto til å sende e-post til brukere når kontoen deres deaktiveres av en eller annen grunn.

*Standard: `0`*


### `disabled_edit_session_coaches_course_editing_course`

**Deaktiver muligheten til å redigere kursveiledere**

Når deaktivert, har administratorer ikke en lenke for raskt å tildele veiledere til øktkurs på kursets redigeringsside.

*Standard: `false`*


### `drh_allow_access_to_all_students`

**HRM kan få tilgang til alle studenter fra rapporteringssider**

[inferred] Gi HR/DRH-ledere tilgang til rapporteringssider for alle lærende på tvers av plattformen.

*Standard: `false`*


### `gamification_mode`

**Spillifiseringsmodus**

Aktiver stjerneprestasjoner i læringsstier

### `go_to_course_after_login`

**Gå direkte til kurset etter innlogging**

Når en bruker er registrert i ett kurs, gå direkte til kurset etter innlogging

*Standard: `false`*


### `load_term_conditions_section`

**Last inn seksjonen for vilkår**

Den juridiske avtalen vises under innlogging eller når man går inn i et kurs.

*Standard: `login`*


### `multiple_url_hide_disabled_settings`

**Skjul deaktiverte innstillinger i under-URL-er**

Sett til ja for å skjule innstillinger helt i en under-URL hvis innstillingen er deaktivert i hoved-URL-en (der feltet access_url_changeable = 0)

*Standard: `false`*


### `plugin_redirection_enabled`

**Aktiver omdirigeringsplugin**

Aktiver kun hvis du bruker Redirection-pluginen

*Standard: `false`*


### `redirect_index_to_url_for_logged_users`

**Omdiriger index.php til gitt URL for autentiserte brukere**

Hvis du ikke vil bruke startsiden (kunngjøringer, populære kurs osv.), kan du her definere skriptet (fra dokumentroten) som brukere omdirigeres til når de prøver å laste indeksen.

### `send_all_emails_to`

**Send all e-post til**

Oppgi en liste over e-postadresser som *all* e-post sendt fra plattformen skal sendes til. E-postene sendes til disse adressene som synlig destinasjon.

### `session_admin_user_subscription_search_extra_field_to_search`

**Ekstra brukerfelt brukt til å søke og navngi økter**

Denne innstillingen definerer nøkkelen for det ekstra brukerfeltet (f.eks. «company») som brukes til å søke etter brukere og til å definere navnet på økten når studenter registreres fra /admin-dashboard/register.

### `teacher_can_select_course_template`

**Lærer kan velge et kurs som mal**

Tillat å velge et kurs som mal for det nye kurset læreren oppretter

*Standard: `true`*


### `update_student_expiration_x_date`

**Sett utløpsdato ved første innlogging**

Array som definerer «days» og «months» for å sette kontoens utløpsdato når brukeren logger inn første gang.

### `user_edition_extra_field_to_check`

**Sett et ekstra felt som utløser for registrering som tidligere elev**

Oppgi en etikett for et ekstra felt her. Hvis dette ekstra feltet oppdateres for en bruker, utløses en prosess som sjekker denne brukerens tilgang til kurs med samme gitte ekstra felt.

### `user_number_of_days_for_default_expiration_date_per_role`

**Standard utløpsdager etter rolle**

En tabell av rolle => tall som representerer antall dager en konto har før utløp, avhengig av rollen.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Deaktiver avmelding av bruker fra kurs/økt ved avmelding av bruker fra gruppe/klasse**

[inferred] Når en bruker fjernes fra en gruppe/klasse, skal vedkommende ikke automatisk avmeldes fra tilknyttede kurs eller økter.

*Standard: `false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Deaktiver avmelding av bruker fra kurs når kurs fjernes fra gruppe/klasse**

[inferred] Når et kurs fjernes fra en gruppe/klasse, skal brukere ikke automatisk avmeldes fra det kurset.

*Standard: `false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Deaktiver avmelding av bruker fra økt når økt fjernes fra gruppe/klasse**

[inferred] Når en økt fjernes fra en gruppe/klasse, skal brukere ikke automatisk avmeldes fra den økten.

*Standard: `false`*