# Workflow-instellingen

Cross-functionele workflow-schakelaars — cursuscreatie, inschrijvingsvalidatie, opdrachtworkflows en vergelijkbare functies.

Toegang tot deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Workflows**. Deze categorie bevat **23 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de platforminstellingen (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_user_course_subscription_by_course_admin`

**Gebruikersinschrijving in cursus toestaan door cursusbeheerder**

Activeer deze optie om cursusbeheerders toe te staan gebruikers in een cursus in te schrijven.

*Standaard: `true`*

### `allow_users_to_create_courses`

**Niet-beheerders toestaan cursussen te maken**

Sta niet-beheerders (docenten) toe om nieuwe cursussen op de server aan te maken.

*Standaard: `false`*

### `allow_working_time_edition`

**Bewerking van cursuswerktijd inschakelen**

Schakel deze functie in om docenten handmatig de tijd die leerlingen in de cursus doorbrengen te laten bijwerken.

*Standaard: `false`*

### `course_visibility_change_only_admin`

**Cursuszichtbaarheid wijzigen alleen voor beheerders**

Verwijder de mogelijkheid voor niet-beheerders om de cursuszichtbaarheid te wijzigen. Zichtbaarheid kan een probleem zijn wanneer er te veel docenten zijn om direct te controleren. Het forceren van zichtbaarheid stelt de organisatie in staat om cursuscatalogi beter te beheren.

*Standaard: `false`*

### `default_menu_entry_for_course_or_session`

**Standaard menu-item voor cursussen**

Definieer de standaard subelementen van het menu-item 'Cursussen' die worden weergegeven als de gebruiker niet is ingeschreven voor een cursus of sessie.

*Standaard: `my_courses`*

### `disable_user_conditions_sender_id`

**Interne ID van de gebruiker die wordt gebruikt om meldingen over uitgeschakelde accounts te verzenden**

Voorkom dat u te persoonlijk wordt met gebruikers door een 'bot'-account te gebruiken om e-mails te verzenden naar gebruikers wanneer hun account om een bepaalde reden is uitgeschakeld.

*Standaard: `0`*

### `disabled_edit_session_coaches_course_editing_course`

**Mogelijkheid om cursuscoaches te bewerken uitschakelen**

Wanneer uitgeschakeld, hebben beheerders geen link om snel coaches toe te wijzen aan sessie-cursussen op de cursusbewerkingspagina.

*Standaard: `false`*

### `drh_allow_access_to_all_students`

**HRM heeft toegang tot alle studenten via rapportagepagina's**

[afgeleid] Geef HR/DRH-managers toegang tot rapportagepagina's voor alle leerlingen op het platform.

*Standaard: `false`*

### `gamification_mode`

**Gamificatiemodus**

Activeer de sterrenprestaties in leerpaden.

### `go_to_course_after_login`

**Direct naar de cursus gaan na inloggen**

Wanneer een gebruiker is ingeschreven voor één cursus, ga dan direct naar de cursus na het inloggen.

*Standaard: `false`*

### `load_term_conditions_section`

**Sectie met gebruiksvoorwaarden laden**

De juridische overeenkomst verschijnt tijdens het inloggen of bij het betreden van een cursus.

*Standaard: `login`*

### `multiple_url_hide_disabled_settings`

**Uitgeschakelde instellingen verbergen in sub-URL's**

Stel in op ja om instellingen volledig te verbergen in een sub-URL als de instelling is uitgeschakeld in de hoofd-URL (waar het veld `access_url_changeable` = 0).

*Standaard: `false`*

### `plugin_redirection_enabled`

**Omleidingsplugin inschakelen**

Schakel alleen in als u de Redirection-plugin gebruikt.

*Standaard: `false`*

### `redirect_index_to_url_for_logged_users`

**Index.php omleiden naar opgegeven URL voor ingelogde gebruikers**

Als u de indexpagina (aankondigingen, populaire cursussen, enz.) niet wilt gebruiken, kunt u hier het script (vanaf de documentroot) definiëren waarnaar gebruikers worden omgeleid wanneer ze de index proberen te laden.

### `send_all_emails_to`

**Alle e-mails verzenden naar**

Geef een lijst met e-mailadressen op aan wie *alle* e-mails die vanaf het platform worden verzonden, zullen worden gestuurd. De e-mails worden naar deze adressen verzonden als een zichtbare bestemming.

### `session_admin_user_subscription_search_extra_field_to_search`

**Extra gebruikersveld gebruikt om sessies te zoeken en te benoemen**

Deze instelling definieert de sleutel van het extra gebruikersveld (bijv. "bedrijf") dat wordt gebruikt om gebruikers te zoeken en om de naam van de sessie te definiëren bij het registreren van studenten via /admin-dashboard/register.

### `teacher_can_select_course_template`

**Docent kan een cursus als sjabloon selecteren**

Sta toe om een cursus als sjabloon te kiezen voor de nieuwe cursus die de docent aanmaakt.

*Standaard: `true`*

### `update_student_expiration_x_date`

**Vervaldatum instellen bij eerste inloggen**

Array die de 'dagen' en 'maanden' definieert om de vervaldatum van het account in te stellen wanneer de gebruiker voor het eerst inlogt.

### `user_edition_extra_field_to_check`

**Extra veld instellen als trigger voor registratie als ex-leerling**

Geef hier een extra veldlabel op. Als dit extra veld voor een gebruiker wordt bijgewerkt, wordt een proces gestart om de toegang van deze gebruiker tot cursussen met hetzelfde opgegeven extra veld te controleren.

---
### `user_number_of_days_for_default_expiration_date_per_role`

**Standaard vervaldagen per rol**

Een array van rol => aantal, die het aantal dagen vertegenwoordigt dat een account heeft voordat het verloopt, afhankelijk van de rol.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Gebruikers niet uitschrijven uit cursus/sessie bij uitschrijving uit groep/klas**

[afgeleid] Bij het verwijderen van een gebruiker uit een groep/klas, deze niet automatisch uitschrijven uit gerelateerde cursussen of sessies.

*Standaard: `false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Gebruikers niet uitschrijven uit cursus bij verwijdering van cursus uit groep/klas**

[afgeleid] Wanneer een cursus wordt verwijderd uit een groep/klas, gebruikers niet automatisch uitschrijven uit die cursus.

*Standaard: `false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Gebruikers niet uitschrijven uit sessie bij verwijdering van sessie uit groep/klas**

[afgeleid] Wanneer een sessie wordt verwijderd uit een groep/klas, gebruikers niet automatisch uitschrijven uit die sessie.

*Standaard: `false`*