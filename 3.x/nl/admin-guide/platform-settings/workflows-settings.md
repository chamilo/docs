# Workflowinstellingen

Doorsnijdende workflowschakelaars — cursusaanmaak, validatie van inschrijvingen, opdrachtworkflows en soortgelijke zaken.

U bereikt deze instellingen via **Beheer > Configuratie-instellingen > Werkstromen**. Deze categorie bevat **23 instellingen**, hieronder vermeld met de titel en het commentaar zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen op globaal niveau moet wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_user_course_subscription_by_course_admin`

**Gebruikersinschrijving voor cursussen toestaan door cursusbeheerder**

Het activeren van deze optie stelt de cursusbeheerder in staat gebruikers in een cursus in te schrijven

*Standaard: `true`*


### `allow_users_to_create_courses`

**Niet-beheerders toestaan cursussen aan te maken**

Niet-beheerders (docenten) toestaan nieuwe cursussen op de server aan te maken

*Standaard: `false`*


### `allow_working_time_edition`

**Bewerken van cursuswerktijd inschakelen**

Schakel deze functie in zodat docenten handmatig de tijd kunnen bijwerken die cursisten in de cursus hebben doorgebracht.

*Standaard: `false`*


### `course_visibility_change_only_admin`

**Wijzigingen van cursuszichtbaarheid alleen voor beheerders**

Verwijder de mogelijkheid voor niet-beheerders om de cursuszichtbaarheid te wijzigen. Zichtbaarheid kan een probleem zijn wanneer er te veel docenten zijn om rechtstreeks te controleren. Het afdwingen van zichtbaarheden stelt de organisatie in staat cursuscatalogi beter te beheren.

*Standaard: `false`*


### `default_menu_entry_for_course_or_session`

**Standaardmenu-item voor cursussen**

Definieer de standaard subelementen van het item 'Cursussen' die worden weergegeven als de gebruiker voor geen enkele cursus of sessie is ingeschreven.

*Standaard: `my_courses`*


### `disable_user_conditions_sender_id`

**Interne ID van de gebruiker die wordt gebruikt om meldingen over uitgeschakelde accounts te verzenden**

Vermijd een te persoonlijke toon naar gebruikers door een 'bot'-account te gebruiken om e-mails te verzenden wanneer hun account om een of andere reden is uitgeschakeld.

*Standaard: `0`*


### `disabled_edit_session_coaches_course_editing_course`

**De mogelijkheid om cursustutoren te bewerken uitschakelen**

Wanneer uitgeschakeld, hebben beheerders geen koppeling om snel tutoren toe te wijzen aan sessiecursussen op de pagina voor het bewerken van de cursus.

*Standaard: `false`*


### `hrm_allow_access_to_all_students`

**HRM kan alle studenten openen vanuit rapportagepagina's**

HRM-gebruikers toestaan alle cursisten te openen vanuit rapportagepagina's. De verouderde sleutel `workflows.drh_allow_access_to_all_students` blijft herkend voor compatibiliteit.

*Standaard: `false`*


### `gamification_mode`

**Gamificatiemodus**

Activeer de sterrenprestatie in leerpaden

### `go_to_course_after_login`

**Ga direct naar de cursus na aanmelden**

Wanneer een gebruiker voor één cursus is ingeschreven, ga direct naar de cursus na aanmelden

*Standaard: `false`*


### `load_term_conditions_section`

**Sectie met gebruiksvoorwaarden laden**

De juridische overeenkomst verschijnt tijdens het aanmelden of bij het betreden van een cursus.

*Standaard: `login`*


### `multiple_url_hide_disabled_settings`

**Uitgeschakelde instellingen in sub-URL's verbergen**

Stel in op ja om instellingen volledig te verbergen in een sub-URL als de instelling is uitgeschakeld in de hoofd-URL (waarbij het veld access_url_changeable = 0)

*Standaard: `false`*


### `plugin_redirection_enabled`

**Omleidingsplug-in inschakelen**

Schakel alleen in als u de Redirection-plug-in gebruikt

*Standaard: `false`*


### `redirect_index_to_url_for_logged_users`

**index.php omleiden naar een opgegeven URL voor geauthenticeerde gebruikers**

Als u de indexpagina niet wilt gebruiken (aankondigingen, populaire cursussen, enz.), kunt u hier het script (vanaf de documentroot) definiëren waarnaar gebruikers worden omgeleid wanneer zij de index proberen te laden.

### `send_all_emails_to`

**Alle e-mails verzenden naar**

Geef een lijst met e-mailadressen aan wie *alle* e-mails die vanaf het platform worden verzonden, zullen worden gestuurd. De e-mails worden naar deze adressen verzonden als zichtbare bestemming.

### `session_admin_user_subscription_search_extra_field_to_search`

**Extra gebruikersveld dat wordt gebruikt om sessies te zoeken en te benoemen**

Deze instelling definieert de sleutel van het extra gebruikersveld (bijv. "company") die wordt gebruikt om gebruikers te zoeken en om de naam van de sessie te bepalen bij het inschrijven van studenten via /admin-dashboard/register.

### `teacher_can_select_course_template`

**Docent kan een cursus als sjabloon selecteren**

Sta toe een cursus als sjabloon te kiezen voor de nieuwe cursus die de docent aanmaakt

*Standaard: `true`*


### `update_student_expiration_x_date`

**Vervaldatum instellen bij eerste aanmelding**

Array die de 'days' en 'months' definieert om de vervaldatum van het account in te stellen wanneer de gebruiker zich voor het eerst aanmeldt.

### `user_edition_extra_field_to_check`

**Een extra veld instellen als trigger voor registratie als voormalige cursist**

Geef hier een label van een extra veld op. Als dit extra veld voor een gebruiker wordt bijgewerkt, wordt een proces geactiveerd om de toegang van deze gebruiker tot cursussen met hetzelfde opgegeven extra veld te controleren.

---
### `user_number_of_days_for_default_expiration_date_per_role`

**Standaard vervaldagen per rol**

Een array van rol => getal die het aantal dagen aangeeft dat een account geldig is vóór de vervaldatum, afhankelijk van de rol.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Automatisch uitschrijven van gebruikers uit cursus/sessie uitschakelen bij uitschrijven uit groep/klas**

[afgeleid] Wanneer een gebruiker uit een groep/klas wordt verwijderd, deze niet automatisch uitschrijven uit gekoppelde cursussen of sessies.

*Standaard: `false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Automatisch uitschrijven van gebruikers uit de cursus uitschakelen bij verwijdering van de cursus uit groep/klas**

[afgeleid] Wanneer een cursus uit een groep/klas wordt verwijderd, gebruikers niet automatisch uitschrijven uit die cursus.

*Standaard: `false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Automatisch uitschrijven van gebruikers uit de sessie uitschakelen bij verwijdering van de sessie uit groep/klas**

[afgeleid] Wanneer een sessie uit een groep/klas wordt verwijderd, gebruikers niet automatisch uitschrijven uit die sessie.

*Standaard: `false`*