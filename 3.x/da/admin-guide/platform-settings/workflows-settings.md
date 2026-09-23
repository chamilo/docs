# Workflows-indstillinger

Tværgående workflow-kontakter — kursusoprettelse, validering af tilmelding, opgave-workflows og lignende.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Workflows**. Denne kategori indeholder **23 indstillinger**, listet nedenfor med titel og kommentar som de leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Brug det, når du script’er via API’et, eller når du skal ændre disse indstillinger på globalt niveau ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `allow_user_course_subscription_by_course_admin`

**Tillad brugertilmelding til kursus af kursusadministrator**

Aktivering af denne indstilling giver kursusadministratoren mulighed for at tilmelde brugere til et kursus

*Standard: `true`*


### `allow_users_to_create_courses`

**Tillad ikke-administratorer at oprette kurser**

Tillad ikke-administratorer (undervisere) at oprette nye kurser på serveren

*Standard: `false`*


### `allow_working_time_edition`

**Aktivér redigering af kursusarbejdstid**

Aktivér denne funktion for at lade undervisere manuelt opdatere den tid, som kursister har brugt i kurset.

*Standard: `false`*


### `course_visibility_change_only_admin`

**Ændring af kursussynlighed kun for administratorer**

Fjern muligheden for, at ikke-administratorer kan ændre kursussynligheden. Synlighed kan være et problem, når der er for mange undervisere til at styre dem direkte. Tvungen synlighed giver organisationen bedre mulighed for at administrere kursuskataloger.

*Standard: `false`*


### `default_menu_entry_for_course_or_session`

**Standardmenupunkt for kurser**

Definér de standard-underelementer under punktet 'Kurser', der skal vises, hvis brugeren ikke er tilmeldt noget kursus eller nogen session.

*Standard: `my_courses`*


### `disable_user_conditions_sender_id`

**Internt ID for den bruger, der bruges til at sende meddelelser om deaktiverede konti**

Undgå at være for personlig over for brugerne ved at bruge en 'bot'-konto til at sende e-mails til brugere, når deres konto deaktiveres af en eller anden grund.

*Standard: `0`*


### `disabled_edit_session_coaches_course_editing_course`

**Deaktivér muligheden for at redigere kursusvejledere**

Når den er deaktiveret, har administratorer ikke et link til hurtigt at tildele vejledere til sessionskurser på kursusredigeringssiden.

*Standard: `false`*


### `drh_allow_access_to_all_students`

**HRM kan tilgå alle kursister fra rapporteringssider**

[inferred] Giv HR/DRH-ansvarlige adgang til rapporteringssider for alle kursister på hele platformen.

*Standard: `false`*


### `gamification_mode`

**Gamification-tilstand**

Aktivér stjernepræstationer i læringsstier

### `go_to_course_after_login`

**Gå direkte til kurset efter login**

Når en bruger er tilmeldt ét kursus, gå direkte til kurset efter login

*Standard: `false`*


### `load_term_conditions_section`

**Indlæs afsnit om vilkår og betingelser**

Den juridiske aftale vises under login eller ved adgang til et kursus.

*Standard: `login`*


### `multiple_url_hide_disabled_settings`

**Skjul deaktiverede indstillinger i under-URL’er**

Sæt til ja for at skjule indstillinger helt i en under-URL, hvis indstillingen er deaktiveret i hoved-URL’en (hvor feltet access_url_changeable = 0)

*Standard: `false`*


### `plugin_redirection_enabled`

**Aktivér omdirigeringsplugin**

Aktivér kun, hvis du bruger Redirection-pluginnet

*Standard: `false`*


### `redirect_index_to_url_for_logged_users`

**Omdirigér index.php til given URL for autentificerede brugere**

Hvis du ikke vil bruge startsiden (meddelelser, populære kurser osv.), kan du her definere scriptet (fra dokumentroden), som brugere omdirigeres til, når de forsøger at indlæse index.

### `send_all_emails_to`

**Send alle e-mails til**

Angiv en liste over e-mailadresser, som *alle* e-mails sendt fra platformen skal sendes til. E-mailsene sendes til disse adresser som synlig destination.

### `session_admin_user_subscription_search_extra_field_to_search`

**Ekstra brugerfelt brugt til at søge og navngive sessioner**

Denne indstilling definerer nøglen til det ekstra brugerfelt (f.eks. "company"), der bruges til at søge efter brugere og til at definere sessionens navn, når kursister registreres fra /admin-dashboard/register.

### `teacher_can_select_course_template`

**Underviser kan vælge et kursus som skabelon**

Tillad at vælge et kursus som skabelon til det nye kursus, som underviseren opretter

*Standard: `true`*


### `update_student_expiration_x_date`

**Angiv udløbsdato ved første login**

Array, der definerer 'days' og 'months' til at sætte kontoens udløbsdato, når brugeren logger ind første gang.

### `user_edition_extra_field_to_check`

**Angiv et ekstra felt som udløser for registrering som tidligere kursist**

Angiv her et ekstra felt-label. Hvis dette ekstra felt opdateres for en bruger, udløses en proces, der tjekker brugerens adgang til kurser med samme ekstra felt.

### `user_number_of_days_for_default_expiration_date_per_role`

**Standard udløbsdage efter rolle**

Et array af rolle => tal, som angiver antallet af dage, en konto har, før den udløber, afhængigt af rollen.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Deaktiver afmelding af bruger fra kursus/session ved afmelding af bruger fra gruppe/klasse**

[inferred] Når en bruger fjernes fra en gruppe/klasse, skal vedkommende ikke automatisk afmeldes fra tilknyttede kurser eller sessioner.

*Standard: `false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Deaktiver afmelding af bruger fra kursus ved fjernelse af kursus fra gruppe/klasse**

[inferred] Når et kursus fjernes fra en gruppe/klasse, skal brugere ikke automatisk afmeldes fra det pågældende kursus.

*Standard: `false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Deaktiver afmelding af bruger fra session ved fjernelse af session fra gruppe/klasse**

[inferred] Når en session fjernes fra en gruppe/klasse, skal brugere ikke automatisk afmeldes fra den pågældende session.

*Standard: `false`*