# Workflows-instellingen

Overkoepelende workflow-schakelaars — cursusaanmaak, inschrijvingsvalidatie, opdrachtworkflows en vergelijkbare instellingen.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Workflows**. Deze categorie bevat **23 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de instellingen-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_user_course_subscription_by_course_admin`

**Gebruikersinschrijving in cursus door cursusbeheerder toestaan**

Als u deze optie activeert, mag de cursusbeheerder gebruikers in een cursus inschrijven

*Standaard: `true`*


### `allow_users_to_create_courses`

**Niet-beheerders toestaan cursussen aan te maken**

Niet-beheerders (docenten) toestaan nieuwe cursussen op de server aan te maken

*Standaard: `false`*


### `allow_working_time_edition`

**Bewerken van cursuswerktijd inschakelen**

Schakel deze functie in zodat docenten de tijd die lerenden in de cursus hebben doorgebracht handmatig kunnen bijwerken.

*Standaard: `false`*


### `course_visibility_change_only_admin`

**Cursuszichtbaarheid alleen door beheerders wijzigen**

Neem de mogelijkheid weg voor niet-beheerders om de cursuszichtbaarheid te wijzigen. Zichtbaarheid kan een probleem zijn wanneer er te veel docenten zijn om rechtstreeks te controleren. Het afdwingen van zichtbaarheden stelt de organisatie in staat de cursuscatalogi beter te beheren.

*Standaard: `false`*


### `default_menu_entry_for_course_or_session`

**Standaardmenu-item voor cursussen**

Definieer de standaard subelementen van het item 'Cursussen' die worden weergegeven als de gebruiker bij geen enkele cursus of sessie is ingeschreven.

*Standaard: `my_courses`*


### `disable_user_conditions_sender_id`

**Intern ID van de gebruiker die meldingen over uitgeschakelde accounts verstuurt**

Vermijd een te persoonlijke toon naar gebruikers door een 'bot'-account te gebruiken om e-mails te versturen wanneer hun account om een of andere reden is uitgeschakeld.

*Standaard: `0`*


### `disabled_edit_session_coaches_course_editing_course`

**Mogelijkheid om cursustutors te bewerken uitschakelen**

Indien uitgeschakeld hebben beheerders op de pagina voor het bewerken van de cursus geen koppeling om snel tutors aan sessiecursussen toe te wijzen.

*Standaard: `false`*


### `drh_allow_access_to_all_students`

**HRM heeft toegang tot alle studenten via rapportagepagina's**

[afgeleid] Geef HR/DRH-managers toegang tot rapportagepagina's voor alle lerenden op het platform.

*Standaard: `false`*


### `gamification_mode`

**Gamificatiemodus**

Activeer de sterrenprestatie in leerpaden

### `go_to_course_after_login`

**Direct naar de cursus gaan na aanmelden**

Wanneer een gebruiker bij één cursus is ingeschreven, ga na het aanmelden rechtstreeks naar die cursus

*Standaard: `false`*


### `load_term_conditions_section`

**Sectie gebruiksvoorwaarden laden**

De juridische overeenkomst verschijnt tijdens het aanmelden of bij het betreden van een cursus.

*Standaard: `login`*


### `multiple_url_hide_disabled_settings`

**Uitgeschakelde instellingen in sub-URL's verbergen**

Zet op ja om instellingen volledig te verbergen in een sub-URL als de instelling in de hoofd-URL is uitgeschakeld (waar het veld access_url_changeable = 0)

*Standaard: `false`*


### `plugin_redirection_enabled`

**Omleidingsplugin inschakelen**

Alleen inschakelen als u de Redirection-plugin gebruikt

*Standaard: `false`*


### `redirect_index_to_url_for_logged_users`

**index.php omleiden naar opgegeven URL voor aangemelde gebruikers**

Als u de indexpagina (aankondigingen, populaire cursussen, enz.) niet wilt gebruiken, kunt u hier het script (vanaf de document root) opgeven waarnaar gebruikers worden omgeleid wanneer ze de index proberen te laden.

### `send_all_emails_to`

**Alle e-mails verzenden naar**

Geef een lijst van e-mailadressen op waarnaar *alle* e-mails die vanaf het platform worden verstuurd, worden verzonden. De e-mails worden naar deze adressen verzonden als zichtbare bestemming.

### `session_admin_user_subscription_search_extra_field_to_search`

**Extra gebruikersveld gebruikt om sessies te zoeken en te benoemen**

Deze instelling definieert de sleutel van het extra gebruikersveld (bijv. "company") die wordt gebruikt om gebruikers te zoeken en om de naam van de sessie te bepalen bij het inschrijven van studenten via /admin-dashboard/register.

### `teacher_can_select_course_template`

**Docent kan een cursus als sjabloon selecteren**

Toestaan om een cursus als sjabloon te kiezen voor de nieuwe cursus die de docent aanmaakt

*Standaard: `true`*


### `update_student_expiration_x_date`

**Vervaldatum instellen bij eerste aanmelding**

Array die de 'dagen' en 'maanden' definieert om de vervaldatum van het account in te stellen wanneer de gebruiker zich voor het eerst aanmeldt.

### `user_edition_extra_field_to_check`

**Een extra veld instellen als trigger voor registratie als ex-lerende**

Geef hier het label van een extra veld op. Als dit extra veld voor een gebruiker wordt bijgewerkt, wordt een proces gestart om de toegang van deze gebruiker tot cursussen met hetzelfde extra veld te controleren.

### `user_number_of_days_for_default_expiration_date_per_role`

**Standaard vervaldagen per rol**

Een array van rol => getal dat het aantal dagen weergeeft dat een account heeft tot verval, afhankelijk van de rol.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Uitschrijven van gebruiker uit cursus/sessie uitschakelen bij uitschrijven van gebruiker uit groep/klas**

[inferred] Wanneer een gebruiker uit een groep/klas wordt verwijderd, deze niet automatisch uitschrijven uit gekoppelde cursussen of sessies.

*Standaard: `false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Uitschrijven van gebruiker uit cursus uitschakelen bij verwijderen van cursus uit groep/klas**

[inferred] Wanneer een cursus uit een groep/klas wordt verwijderd, gebruikers niet automatisch uitschrijven uit die cursus.

*Standaard: `false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Uitschrijven van gebruiker uit sessie uitschakelen bij verwijderen van sessie uit groep/klas**

[inferred] Wanneer een sessie uit een groep/klas wordt verwijderd, gebruikers niet automatisch uitschrijven uit die sessie.

*Standaard: `false`*