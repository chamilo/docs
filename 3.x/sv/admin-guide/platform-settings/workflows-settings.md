# Arbetsflödesinställningar

Övergripande växlar för arbetsflöden — kurskapande, validering av inskrivning, arbetsflöden för uppgifter och liknande.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Arbetsflöden**. Denna kategori innehåller **23 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det när du skriptar via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `allow_user_course_subscription_by_course_admin`

**Tillåt kursadministratör att skriva in användare på kurs**

Aktivering av detta alternativ gör det möjligt för kursadministratören att skriva in användare i en kurs

*Standard: `true`*


### `allow_users_to_create_courses`

**Tillåt icke-administratörer att skapa kurser**

Tillåt icke-administratörer (lärare) att skapa nya kurser på servern

*Standard: `false`*


### `allow_working_time_edition`

**Aktivera redigering av arbetstid i kurs**

Aktivera den här funktionen för att låta lärare manuellt uppdatera den tid som lärande har tillbringat i kursen.

*Standard: `false`*


### `course_visibility_change_only_admin`

**Ändringar av kursens synlighet endast för administratörer**

Ta bort möjligheten för icke-administratörer att ändra kursens synlighet. Synlighet kan bli ett problem när det finns för många lärare att styra direkt. Att tvinga synligheter gör det möjligt för organisationen att bättre hantera kurskataloger.

*Standard: `false`*


### `default_menu_entry_for_course_or_session`

**Standardmenyval för kurser**

Definiera standardunderelementen för posten "Kurser" som ska visas om användaren inte är registrerad på någon kurs eller session.

*Standard: `my_courses`*


### `disable_user_conditions_sender_id`

**Internt ID för den användare som används för att skicka aviseringar om inaktiverade konton**

Undvik att vara alltför personlig mot användare genom att använda ett "bot"-konto för att skicka e-post till användare när deras konto av någon anledning inaktiveras.

*Standard: `0`*


### `disabled_edit_session_coaches_course_editing_course`

**Inaktivera möjligheten att redigera kurshandledare**

När detta är inaktiverat har administratörer ingen länk för att snabbt tilldela handledare till sessionskurser på kursredigeringssidan.

*Standard: `false`*


### `drh_allow_access_to_all_students`

**HRM kan komma åt alla studenter från rapportsidor**

[inferred] Ge HR/DRH-chefer åtkomst till rapportsidor för alla lärande på hela plattformen.

*Standard: `false`*


### `gamification_mode`

**Spellifieringsläge**

Aktivera stjärnprestationer i lärstigar

### `go_to_course_after_login`

**Gå direkt till kursen efter inloggning**

När en användare är registrerad på en kurs, gå direkt till kursen efter inloggning

*Standard: `false`*


### `load_term_conditions_section`

**Läs in avsnittet med villkor**

Det juridiska avtalet visas vid inloggning eller när man går in i en kurs.

*Standard: `login`*


### `multiple_url_hide_disabled_settings`

**Dölj inaktiverade inställningar i under-URL:er**

Ange ja för att dölja inställningar helt i en under-URL om inställningen är inaktiverad i huvud-URL:en (där fältet access_url_changeable = 0)

*Standard: `false`*


### `plugin_redirection_enabled`

**Aktivera omdirigeringsplugin**

Aktivera endast om du använder pluginet Redirection

*Standard: `false`*


### `redirect_index_to_url_for_logged_users`

**Omdirigera index.php till given URL för autentiserade användare**

Om du inte vill använda startsidan (meddelanden, populära kurser osv.) kan du här definiera skriptet (från dokumentroten) dit användare omdirigeras när de försöker läsa in index.

### `send_all_emails_to`

**Skicka all e-post till**

Ange en lista med e-postadresser till vilka *all* e-post som skickas från plattformen ska skickas. E-postmeddelandena skickas till dessa adresser som synlig mottagare.

### `session_admin_user_subscription_search_extra_field_to_search`

**Extra användarfält som används för att söka och namnge sessioner**

Denna inställning definierar nyckeln för extra användarfält (t.ex. "company") som används för att söka efter användare och för att definiera sessionens namn när studenter registreras från /admin-dashboard/register.

### `teacher_can_select_course_template`

**Lärare kan välja en kurs som mall**

Tillåt att välja en kurs som mall för den nya kurs som läraren skapar

*Standard: `true`*


### `update_student_expiration_x_date`

**Ange utgångsdatum vid första inloggning**

Array som definierar "days" och "months" för att sätta kontots utgångsdatum när användaren loggar in första gången.

### `user_edition_extra_field_to_check`

**Ange ett extrafält som utlösare för registrering som före detta lärande**

Ange en extrafältsetikett här. Om detta extrafält uppdateras för någon användare utlöses en process som kontrollerar användarens åtkomst till kurser med samma extrafält.

### `user_number_of_days_for_default_expiration_date_per_role`

**Standard utgångsdagar per roll**

En array av roll => antal som representerar antalet dagar ett konto har innan det går ut, beroende på rollen.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Inaktivera avanmälan av användare från kurs/session vid avanmälan av användare från grupp/klass**

[inferred] När en användare tas bort från en grupp/klass, avanmäl dem inte automatiskt från tillhörande kurser eller sessioner.

*Standard: `false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Inaktivera avanmälan av användare från kurs när kurs tas bort från grupp/klass**

[inferred] När en kurs tas bort från en grupp/klass, avanmäl inte automatiskt användare från den kursen.

*Standard: `false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Inaktivera avanmälan av användare från session när session tas bort från grupp/klass**

[inferred] När en session tas bort från en grupp/klass, avanmäl inte automatiskt användare från den sessionen.

*Standard: `false`*