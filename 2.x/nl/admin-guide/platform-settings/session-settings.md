# Sessie-instellingen

Standaardinstellingen en gedrag voor **Sessies** — levenscyclus van sessies, toegangsmomenten voor coaches, cursuszichtbaarheid binnen een sessie en vergelijkbare zaken.

Ga naar deze instellingen via **Beheer > Configuratie-instellingen > Sessies**. Deze categorie bevat **68 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `add_users_by_coach`

**Gebruikers registreren door Coach**

Coach-gebruikers mogen gebruikers aanmaken op het platform en gebruikers inschrijven voor een sessie.

*Standaard: `false`*

### `allow_career_diagram`

**Carrièrediagrammen inschakelen**

Carrièrediagrammen stellen u in staat om diagrammen van carrières, vaardigheden en cursussen weer te geven.

*Standaard: `false`*

### `allow_career_users`

**Carrièrediagrammen inschakelen voor gebruikers**

Als carrièrediagrammen zijn ingeschakeld, kunnen gebruikers deze alleen zien (en alleen de diagrammen die overeenkomen met hun studies) als u deze optie inschakelt.

*Standaard: `false`*

### `allow_coach_to_edit_course_session`

**Coaches toestaan om binnen cursussessies te bewerken**

Coaches toestaan om binnen cursussessies te bewerken.

*Standaard: `true`*

### `allow_delete_user_for_session_admin`

**Sessiebeheerders kunnen gebruikers verwijderen**

Sessiebeheerders kunnen gebruikers van het platform verwijderen bij het beheren van hun sessie(s).

*Standaard: `false`*

### `allow_disable_user_for_session_admin`

**Sessiebeheerders kunnen gebruikers uitschakelen**

Sessiebeheerders kunnen gebruikersaccounts uitschakelen om inloggen te voorkomen terwijl inschrijvingsgegevens in hun sessie(s) behouden blijven.

*Standaard: `false`*

### `allow_edit_tool_visibility_in_session`

**Bewerking van toolzichtbaarheid in sessies toestaan**

Bij het gebruik van sessies is het standaardgedrag om de toolzichtbaarheid te gebruiken zoals gedefinieerd in de basiscursus. Deze instelling wijzigt dat zodat coaches in sessiecursussen de toolzichtbaarheid aan hun behoeften kunnen aanpassen.

*Standaard: `true`*

### `allow_redirect_to_session_after_inscription_about`

**Doorverwijzen naar sessie na registratie op de 'Over'-pagina van de sessie**

Nieuwe gebruikers automatisch doorverwijzen naar hun sessiepagina nadat ze de registratie hebben voltooid via de 'Over'-pagina van een sessie.

*Standaard: `false`*

### `allow_search_diagnostic`

**Diagnose voor sessiezoekopdrachten inschakelen**

Tutoren toestaan om een diagnose te krijgen waarmee ze de beste sessies voor leerlingen kunnen zoeken.

*Standaard: `false`*

### `allow_session_admin_extra_access`

**Sessiebeheerder kan toegang krijgen tot batchgebruikersimport, -update en -export**

Sessiebeheerders kunnen toegang krijgen tot functionaliteit voor batchgebruikersimport, -update en -export naast hun standaardrechten.

*Standaard: `false`*

### `allow_session_admin_login_as_teacher`

**Sessiebeheerders kunnen 'inloggen als' docenten**

Sessiebeheerders kunnen docentaccounts imiteren om cursusinhoud en de studentenervaring binnen hun sessie(s) te bekijken.

*Standaard: `false`*

### `allow_session_admin_read_careers`

**Sessiebeheerders kunnen carrières bekijken**

[afgeleid] Sessiebeheerders kunnen carrièrepaden en promotieworkflows bekijken en openen die gekoppeld zijn aan de door hen beheerde sessies.

*Standaard: `false`*

### `allow_session_admins_to_manage_all_sessions`

**Sessiebeheerders toestaan om alle sessies te zien**

Wanneer deze optie niet is ingeschakeld (standaard), kunnen sessiebeheerders alleen de sessies zien die ze zelf hebben aangemaakt. Dit is verwarrend in een open omgeving waar sessiebeheerders mogelijk ondersteuningstijd moeten delen tussen twee sessies.

*Standaard: `false`*

### `allow_session_course_copy_for_teachers`

**Kopiëren van sessie naar sessie toestaan voor docenten**

Schakel deze optie in om docenten hun inhoud van een cursus in een sessie naar een cursus in een andere sessie te laten kopiëren. Standaard is deze optie alleen beschikbaar voor platformbeheerders.

*Standaard: `false`*

### `allow_teachers_to_create_sessions`

**Docenten toestaan om sessies aan te maken**

Docenten kunnen hun eigen sessies aanmaken, bewerken en verwijderen.

*Standaard: `false`*

### `allow_tutors_to_assign_students_to_session`

**Tutoren kunnen studenten toewijzen aan sessies**

Wanneer ingeschakeld, kunnen cursuscoaches/tutoren in sessies nieuwe gebruikers inschrijven voor hun sessie. Deze optie is anders alleen beschikbaar voor beheerders en sessiebeheerders.

*Standaard: `false`*

### `allow_user_session_collapsable`

**Gebruiker toestaan om sessies in te klappen in Mijn sessies**

Gebruikers kunnen sessiekaarten of -groepen inklappen op de pagina Mijn sessies om visuele rommel te verminderen en de navigatie te verbeteren.

*Standaard: `false`*

### `assignment_base_course_teacher_access_to_all_session`

**Basiscursusdocent kan opdrachten van alle sessies zien**

Toon alle publicaties van leerlingen (van de basiscursus en van alle sessies) op de werk/pending.php-pagina van de basiscursus.

*Standaard: `false`*

---
### `career_diagram_disclaimer`

**Een disclaimer weergeven onder het loopbaandiagram**

Voeg een disclaimer toe onder het loopbaandiagram. Er moet een taalvariabele genaamd 'Career diagram disclaimer' bestaan in uw subtaal.

*Standaard: `false`*

### `career_diagram_legend`

**Een legenda weergeven onder het loopbaandiagram**

Voeg een loopbaanlegenda toe onder het loopbaandiagram. Er moet een taalvariabele genaamd 'Career diagram legend' bestaan in uw subtaal.

*Standaard: `false`*

### `courses_list_session_title_link`

**Type link voor de sessietitel**

Op de cursus-/sessiepagina kan de sessietitel een van de volgende zijn: 0 = geen link (sessietitel verbergen); 1 = titel linken naar een speciale sessiepagina; 2 = linken naar de cursus als er slechts één cursus is; 3 = sessietitel maakt de cursuslijst inklapbaar; 4 = geen link (sessietitel tonen).

*Standaard: `1`*

### `default_session_list_view`

**Standaardweergave van sessielijst**

Selecteer het standaardtabblad dat u wilt zien bij het openen van de sessielijst als beheerder.

*Standaard: `all`*

### `drh_can_access_all_session_content`

**HR-directeuren hebben toegang tot alle sessie-inhoud**

Indien ingeschakeld, krijgen human resources-directeuren toegang tot alle inhoud en gebruikers van de sessies die zij volgen.

*Standaard: `true`*

### `duplicate_specific_session_content_on_session_copy`

**Kopiëren van sessie-specifieke inhoud naar een andere sessie inschakelen**

Maakt het mogelijk om bronnen die in de sessie zijn gemaakt te dupliceren bij het kopiëren van de sessie.

*Standaard: `false`*

### `email_template_subscription_to_session_confirmation_lost_password`

**Link voor wachtwoordherstel toevoegen aan e-mailmelding van inschrijving voor sessie**

Voeg een link voor wachtwoordherstel toe aan de bevestigingsmails voor inschrijving die naar gebruikers worden gestuurd wanneer zij zich inschrijven voor een sessie.

*Standaard: `false`*

### `email_template_subscription_to_session_confirmation_username`

**Gebruikersnaam toevoegen aan e-mailmelding van inschrijving voor sessie**

Voeg de gebruikersnaam van de gebruiker toe aan de bevestigingsmails voor inschrijving die worden gestuurd wanneer zij zich inschrijven voor een sessie.

*Standaard: `false`*

### `enable_auto_reinscription`

**Automatische herinschrijving inschakelen**

Schakel automatische herinschrijving in of uit wanneer de geldigheidsduur van de cursus verloopt. De bijbehorende cron-taak moet ook worden geactiveerd.

*Standaard: `false`*

### `enable_session_replication`

**Sessie-replicatie inschakelen**

Schakel automatische sessie-replicatie in of uit. De bijbehorende cron-taak moet ook worden geactiveerd.

*Standaard: `false`*

### `extend_rights_for_coach`

**Rechten voor coach uitbreiden**

Het activeren van deze optie geeft de coach dezelfde rechten als de trainer op authoring tools.

*Standaard: `false`*

### `hide_courses_in_sessions`

**Cursuslijst in sessies verbergen**

Verberg de lijst met cursussen binnen een sessie wanneer het sessieblok op uw cursuspagina wordt weergegeven (toon ze alleen op het specifieke sessiescherm).

*Standaard: `false`*

### `hide_reporting_session_list`

**Sessielijst in rapportagetool verbergen**

Sessies die de cursus bevatten, worden in de rapportagetool binnen de cursus zelf weergegeven, wat aanzienlijk zwaar kan zijn als dezelfde cursus in honderden sessies wordt gebruikt. Deze optie verwijdert die lijst.

*Standaard: `false`*

### `hide_search_form_in_session_list`

**Zoekformulier in sessielijst verbergen**

Verwijder het zoekveld uit de sessielijstweergave in de beheerinterface.

*Standaard: `false`*

### `hide_session_graph_in_my_progress`

**Sessie grafiek verbergen in Mijn voortgang**

Verberg sessievoortgangsgrafieken en visualisaties op de Mijn voortgang-pagina in de dashboards van leerlingen.

*Standaard: `false`*

### `hide_tab_list`

**Tabbladen op de sessiepagina verbergen**

Verwijder navigatietabbladen van de sessiedetailpagina om de interface te vereenvoudigen.

### `limit_session_admin_list_users`

**Sessiebeheerders toegang tot gebruikerslijst verbieden**

Voorkom dat sessiebeheerders toegang krijgen tot de globale gebruikerslijst in de beheerinterface.

*Standaard: `false`*

### `limit_session_admin_role`

**Rechten van sessiebeheerders beperken**

Indien ingeschakeld, zien sessiebeheerders alleen het Gebruikersblok met de optie 'Gebruiker toevoegen' en het Sessieblok met de optie 'Sessielijst'.

*Standaard: `false`*

### `my_courses_session_order`

**Standaard sortering van sessies in Mijn sessies wijzigen**

Standaard worden sessies gesorteerd op startdatum. Wijzig dit door een array op te geven van het type ['field' => 'end_date', 'order' => 'desc'].

### `my_courses_view_by_session`

**Mijn cursussen weergeven per sessie**

Schakel een extra 'Mijn cursussen'-pagina in waar sessies worden weergegeven als onderdeel van cursussen, in plaats van andersom.

*Standaard: `false`*

### `my_progress_session_show_all_courses`

**Mijn voortgang: toon cursusdetails in sessie**

Toon alle details van elke cursus in een sessie bij het klikken op sessiedetails.

*Standaard: `false`*

### `prevent_session_admins_to_manage_all_users`

**Voorkom dat sessiebeheerders alle gebruikers beheren**

Door deze optie in te schakelen, kunnen sessiebeheerders op de beheerpagina alleen de gebruikers zien die zij zelf hebben aangemaakt.

*Standaard: `false`*

---
### `remove_session_url`

**Link naar sessiepagina verbergen**

Verberg de link naar de sessiepagina in de lijst met sessies.

*Standaard: `false`*


### `session_admins_access_all_content`

**Sessiebeheerders hebben toegang tot alle cursusinhoud**

Sessiebeheerders kunnen alle cursusinhoud binnen hun sessies bekijken, inclusief beperkte of gearchiveerde materialen.

*Standaard: `false`*


### `session_admins_edit_courses_content`

**Sessiebeheerders kunnen cursusinhoud bewerken**

Sessiebeheerders kunnen cursusinhoud (documenten, oefeningen, tools) bewerken in cursussen die aan hun sessies zijn toegewezen.

*Standaard: `false`*


### `session_automatic_creation_user_id`

**Gebruikers-ID van maker van automatisch aangemaakte sessie**

Stel de gebruiker in die wordt gebruikt als maker van de automatisch aangemaakte sessies (om te voorkomen dat elke sessie wordt toegewezen aan gebruiker '1', wat vaak de portaalbeheerder is).

*Standaard: `1`*


### `session_classes_tab_disable`

**Tabblad voor toevoegen van klassen in sessiecursus uitschakelen voor niet-beheerders**

Schakel het tabblad uit om klassen toe te voegen in een sessiecursus voor niet-beheerders.

*Standaard: `false`*


### `session_coach_access_after_duration_end`

**Sessies op basis van duur altijd beschikbaar voor coaches**

Anders hebben sessiecoaches alleen toegang tot sessies op basis van duur tijdens de actieve duur.

*Standaard: `false`*


### `session_course_ordering`

**Handmatige ordening van cursussen in sessie**

Schakel deze optie in om sessiebeheerders in staat te stellen de cursussen binnen een sessie handmatig te ordenen. Indien uitgeschakeld, worden cursussen alfabetisch gesorteerd op cursustitel.

*Standaard: `false`*


### `session_course_users_subscription_limited_to_session_users`

**Inschrijvingen voor cursus beperken tot alleen gebruikers van de sessie**

Beperk de lijst van studenten die zich kunnen inschrijven voor de cursussessie. Schakel ook registratie uit voor gebruikers in alle cursussen vanaf de pagina 'Sessie hervatten'.

*Standaard: `false`*


### `session_courses_read_only_mode`

**Cursus in alleen-lezen modus zetten in sessie**

Laat docenten sommige cursussen in alleen-lezen modus zetten wanneer deze via sessies worden geopend. Vink in de cursusinstellingen de optie 'Cursus vergrendelen in sessie' aan.

*Standaard: `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Verplichte extra velden instellen in sessie-aanmaakformulier**

Vereis de vermelde velden tijdens het aanmaken van een sessie.


### `session_creation_user_course_extra_field_relation_to_prefill`

**Sessievelden vooraf invullen met gebruikersvelden**

Array van relaties tussen extra gebruikersvelden en extra sessievelden, zodat de sessie vooraf kan worden ingevuld met gegevens die overeenkomen met de gebruikersgegevens.


### `session_days_after_coach_access`

**Standaard aantal dagen toegang voor coach na sessie**

Standaard aantal dagen dat een coach toegang heeft tot zijn sessie na de officiële einddatum van de sessie.


### `session_days_before_coach_access`

**Standaard aantal dagen toegang voor coach vóór sessie**

Standaard aantal dagen dat een coach toegang heeft tot zijn sessie vóór de officiële startdatum van de sessie.


### `session_import_settings`

**Opties voor sessie-import**

Array van opties die als standaardparameters worden toegepast bij het importeren van sessies via CSV/XML.


### `session_list_order`

**Sessies ondersteunen handmatige sortering**

Schakel handmatige herschikking van sessies in de beheerderssessielijst in via drag-and-drop of een vergelijkbaar mechanisme.

*Standaard: `false`*


### `session_list_show_count_users`

**Aantal gebruikers tonen in sessielijst**

De beheerder kan het aantal gebruikers in elke sessie zien. Dit voegt extra belasting toe aan de sessielijst, dus overweeg zorgvuldig of je de extra wachttijd wilt als je dit vaak gebruikt.

*Standaard: `false`*


### `session_list_view_remaining_days`

**Resterende dagen tonen in Mijn Sessies**

Indien ingeschakeld, worden de sessiedata op de pagina "Mijn Sessies" vervangen door het aantal resterende dagen.

*Standaard: `false`*


### `session_model_list_field_ordered_by_id`

**Sessiesjablonen sorteren op ID in sessie-aanmaakformulier**

Sorteer sessiesjablonen op hun numerieke ID in de dropdown van het sessie-aanmaakformulier in plaats van alfabetisch op naam.

*Standaard: `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Voorkomen dat lijst met ingeschreven gebruikers wordt geleegd bij sessie-inschrijving**

Bij gebruik van meerdere inschrijvingen van leerlingen voor een sessie, voorkom het normale gedrag waarbij gebruikers die niet in het rechterpaneel staan, worden uitgeschreven bij het indienen. Houd alle gebruikers daar.

*Standaard: `false`*


### `show_all_sessions_on_my_course_page`

**Alle sessies tonen op 'Mijn cursussen' pagina**

Indien ingeschakeld, toont deze optie alle sessies van de gebruiker in een kalenderweergave.

*Standaard: `true`*


### `show_session_coach`

**Sessiecoach tonen**

Toon de naam van de globale sessiecoach in het sessietitelvak in de cursuslijst.

*Standaard: `false`*


### `show_session_data`

**Sessiedata titel tonen**

Toon opmerkingen bij sessiedata.

*Standaard: `false`*


### `show_session_description`

**Sessiebeschrijving tonen**

Toon de sessiebeschrijving overal waar deze optie is geïmplementeerd (sessievolgpagina's, enz.).

*Standaard: `false`*

---
### `show_simple_session_info`

**Toon eenvoudige sessie-informatie**

Voeg de coach en datums toe aan de ondertitel van de sessie in de sessielijst.

*Standaard: `true`*


### `show_users_in_active_sessions_in_tracking`

**Toon alleen gebruikers van actieve sessies in tracking**

Toon alleen gebruikers van momenteel actieve sessies in de tracking- en rapportageweergaven van leerlingen.

*Standaard: `false`*


### `tracking_columns`

**Pas trackingkolommen voor cursus-sessies aan**

Definieer een array van kolommen voor de volgende rapporten: 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Duur van automatisch aangemaakte sessies**

Duur (in dagen) van de automatisch aangemaakte sessies voor één gebruiker. Na afloop kan de gebruiker zich niet opnieuw inschrijven voor dezelfde cursus (er wordt geen andere sessie aangemaakt).

*Standaard: `1095`*


### `user_session_display_mode`

**Weergavemodus van Mijn Sessies**

Kies hoe de pagina "Mijn Sessies" wordt weergegeven: als een moderne visuele blokweergave (kaartweergave) of als de klassieke lijststijl.

*Standaard: `list`*