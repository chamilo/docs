# Sessie-instellingen

Standaardwaarden en gedrag voor **Sessies** — sessielevenscyclus, toegangstijdvensters voor tutoren, zichtbaarheid van cursussen binnen een sessie, en vergelijkbare aspecten.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Sessies**. Deze categorie bevat **68 instellingen**, hieronder vermeld met de titel en toelichting zoals meegeleverd in de instellingen-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `add_users_by_coach`

**Tutoren toestaan gebruikers te registreren**

Tutoren mogen gebruikers op het platform aanmaken en gebruikers inschrijven voor een sessie.

*Standaard: `false`*

### `allow_career_diagram`

**Carrière-diagrammen inschakelen**

Carrière-diagrammen stellen u in staat diagrammen van carrières, vaardigheden en cursussen weer te geven.

*Standaard: `false`*


### `allow_career_users`

**Carrière-diagrammen voor gebruikers inschakelen**

Als carrière-diagrammen zijn ingeschakeld, kunnen gebruikers ze alleen zien (en alleen de diagrammen die overeenkomen met hun studies) als u deze optie inschakelt.

*Standaard: `false`*

### `allow_coach_to_edit_course_session`

**Tutoren toestaan te bewerken binnen cursussessies**

Tutoren toestaan te bewerken binnen cursussessies

*Standaard: `true`*

### `allow_delete_user_for_session_admin`

**Sessiebeheerders kunnen gebruikers verwijderen**

Sessiebeheerders kunnen gebruikers van het platform verwijderen wanneer zij hun sessie(s) beheren.

*Standaard: `false`*


### `allow_disable_user_for_session_admin`

**Sessiebeheerders kunnen gebruikers deactiveren**

Sessiebeheerders kunnen gebruikersaccounts deactiveren om inloggen te voorkomen, terwijl de inschrijvingsgegevens in hun sessie(s) behouden blijven.

*Standaard: `false`*


### `allow_edit_tool_visibility_in_session`

**Bewerken van toolzichtbaarheid in sessies toestaan**

Bij het gebruik van sessies is het standaardgedrag om de toolzichtbaarheid te gebruiken die in de basiscursus is gedefinieerd. Deze instelling wijzigt dat, zodat tutoren in sessiecursussen de toolzichtbaarheid aan hun behoeften kunnen aanpassen.

*Standaard: `true`*

### `allow_redirect_to_session_after_inscription_about`

**Doorverwijzen naar sessie na registratie via de 'Over'-pagina van de sessie**

Nieuwe gebruikers automatisch doorverwijzen naar hun sessiepagina nadat zij de registratie via de Over-pagina van een sessie hebben voltooid.

*Standaard: `false`*


### `allow_search_diagnostic`

**Sessies-zoekdiagnose inschakelen**

Tutoren toestaan een diagnose te verkrijgen waarmee zij de beste sessies voor cursisten kunnen zoeken.

*Standaard: `false`*


### `allow_session_admin_extra_access`

**Sessiebeheerder heeft toegang tot batch-import, -update en -export van gebruikers**

Sessiebeheerders kunnen, naast hun standaardrechten, toegang krijgen tot functionaliteit voor batch-import, -update en -export van gebruikers.

*Standaard: `false`*


### `allow_session_admin_login_as_teacher`

**Sessiebeheerders kunnen 'inloggen als' docenten**

Sessiebeheerders kunnen docentenaccounts imiteren om cursusinhoud en de studentenervaring binnen hun sessie(s) te bekijken.

*Standaard: `false`*


### `allow_session_admin_read_careers`

**Sessiebeheerders kunnen carrières bekijken**

[inferred] Sessiebeheerders kunnen carrièrepaden en promotieworkflows bekijken en openen die gekoppeld zijn aan de sessies die zij beheren.

*Standaard: `false`*


### `allow_session_admins_to_manage_all_sessions`

**Sessiebeheerders toestaan alle sessies te zien**

Wanneer deze optie niet is ingeschakeld (standaard), kunnen sessiebeheerders alleen de sessies zien die zij zelf hebben aangemaakt. Dit is verwarrend in een open omgeving waarin sessiebeheerders mogelijk ondersteuningstijd tussen twee sessies moeten delen.

*Standaard: `false`*

### `allow_session_course_copy_for_teachers`

**Kopiëren van sessie naar sessie voor docenten toestaan**

Schakel deze optie in om docenten hun inhoud te laten kopiëren van een cursus in een sessie naar een cursus in een andere sessie. Standaard is deze optie alleen beschikbaar voor platformbeheerders.

*Standaard: `false`*

### `allow_teachers_to_create_sessions`

**Docenten toestaan sessies aan te maken**

Docenten kunnen hun eigen sessies aanmaken, bewerken en verwijderen.

*Standaard: `false`*

### `allow_tutors_to_assign_students_to_session`

**Tutoren kunnen studenten aan sessies toewijzen**

Wanneer ingeschakeld, kunnen cursustutoren in sessies nieuwe gebruikers inschrijven voor hun sessie. Deze optie is anders alleen beschikbaar voor beheerders en sessiebeheerders.

*Standaard: `false`*

### `allow_user_session_collapsable`

**Gebruiker toestaan sessies in te klappen in Mijn sessies**

Gebruikers kunnen sessiekaarten of groepen op de pagina Mijn sessies inklappen om visuele rommel te verminderen en de navigatie te verbeteren.

*Standaard: `false`*


### `assignment_base_course_teacher_access_to_all_session`

**Docent van de basiscursus kan opdrachten van alle sessies zien**

Alle publicaties van cursisten (van de basiscursus en van alle sessies) weergeven op de pagina work/pending.php van de basiscursus.

*Standaard: `false`*

### `career_diagram_disclaimer`

**Toon een disclaimer onder het loopbaandiagram**

Voeg een disclaimer toe onder het loopbaandiagram. Er moet een taalvariabele met de naam 'Career diagram disclaimer' bestaan in uw subtaal.

*Standaard: `false`*

### `career_diagram_legend`

**Toon een legenda onder het loopbaandiagram**

Voeg een loopbaanlegenda toe onder het loopbaandiagram. Er moet een taalvariabele met de naam 'Career diagram legend' bestaan in uw subtaal.

*Standaard: `false`*

### `courses_list_session_title_link`

**Type koppeling voor de sessietitel**

Op de pagina cursussen/sessies kan de sessietitel een van de volgende zijn: 0 = geen koppeling (sessietitel verbergen) ; 1 = titel koppelen naar een speciale sessiepagina ; 2 = koppelen naar de cursus als er slechts één cursus is ; 3 = sessietitel maakt de cursussenlijst inklapbaar ; 4 = geen koppeling (sessietitel tonen).

*Standaard: `1`*

### `default_session_list_view`

**Standaardweergave sessielijst**

Selecteer het standaardtabblad dat u wilt zien bij het openen van de sessielijst als beheerder.

*Standaard: `all`*


### `drh_can_access_all_session_content`

**HR-directeuren hebben toegang tot alle sessie-inhoud**

Indien ingeschakeld, krijgen humanresourcesdirecteuren toegang tot alle inhoud en gebruikers van de sessies die hij/zij volgt.

*Standaard: `true`*

### `duplicate_specific_session_content_on_session_copy`

**Kopie van sessiespecifieke inhoud naar een andere sessie inschakelen**

Maakt duplicatie mogelijk van resources die in de sessie zijn aangemaakt bij het dupliceren van de sessie.

*Standaard: `false`*


### `email_template_subscription_to_session_confirmation_lost_password`

**Voeg een wachtwoordresetkoppeling toe aan de e-mailmelding van inschrijving bij een sessie**

Neem een wachtwoordresetkoppeling op in bevestigingsmails voor inschrijving die naar gebruikers worden verzonden wanneer zij bij een sessie worden ingeschreven.

*Standaard: `false`*


### `email_template_subscription_to_session_confirmation_username`

**Voeg gebruikersnaam toe aan de e-mailmelding van inschrijving bij een sessie**

Neem de gebruikersnaam van de gebruiker op in bevestigingsmails voor inschrijving die worden verzonden wanneer zij bij een sessie worden ingeschreven.

*Standaard: `false`*


### `enable_auto_reinscription`

**Automatische herinschrijving inschakelen**

Schakel automatische herinschrijving in of uit wanneer de geldigheid van de cursus verloopt. De bijbehorende cronjob moet ook geactiveerd zijn.

*Standaard: `false`*


### `enable_session_replication`

**Sessiereplicatie inschakelen**

Schakel automatische sessiereplicatie in of uit. De bijbehorende cronjob moet ook geactiveerd zijn.

*Standaard: `false`*


### `extend_rights_for_coach`

**Rechten voor tutoren uitbreiden**

Schakel deze optie in om tutoren dezelfde rechten te geven als trainers op auteurstools

*Standaard: `false`*

### `hide_courses_in_sessions`

**Cursussenlijst in sessies verbergen**

Wanneer het sessieblok op uw cursussenpagina wordt getoond, verberg dan de lijst van cursussen binnen die sessie (toon ze alleen binnen het specifieke sessiescherm).

*Standaard: `false`*

### `hide_reporting_session_list`

**Sessielijst in rapportagetool verbergen**

Sessies die de cursus bevatten, worden in de rapportagetool binnen de cursus zelf vermeld, wat aanzienlijk extra gewicht kan geven als dezelfde cursus in honderden sessies wordt gebruikt. Deze optie verwijdert die lijst.

*Standaard: `false`*


### `hide_search_form_in_session_list`

**Zoekformulier in sessielijst verbergen**

Verwijder het zoekinvoerveld uit de sessielijstweergave in de beheerinterface.

*Standaard: `false`*


### `hide_session_graph_in_my_progress`

**Sessiegrafiek in Mijn voortgang verbergen**

Verberg sessievoortgangsgrafieken en visualisaties van de pagina Mijn voortgang in dashboards van cursisten.

*Standaard: `false`*


### `hide_tab_list`

**Tabbladen op de sessiepagina verbergen**

Verwijder navigatietabbladen van de sessiedetailpagina om de interface te vereenvoudigen.

### `limit_session_admin_list_users`

**Sessiebeheerders hebben geen toegang tot de gebruikerslijst**

Voorkom dat sessiebeheerders toegang hebben tot de globale gebruikerslijst in de beheerinterface.

*Standaard: `false`*


### `limit_session_admin_role`

**Rechten van sessiebeheerders beperken**

Indien ingeschakeld, zien de sessiebeheerders alleen het blok Gebruiker met de optie 'Gebruiker toevoegen' en het blok Sessies met de optie 'Sessielijst'.

*Standaard: `false`*

### `my_courses_session_order`

**Wijzig de standaardsortering van sessies in Mijn sessies**

Standaard worden sessies gesorteerd op startdatum. Wijzig dit door een array van het type ['field' => 'end_date', 'order' => 'desc'] op te geven.

### `my_courses_view_by_session`

**Mijn cursussen per sessie bekijken**

Schakel een extra pagina 'Mijn cursussen' in waarop sessies als onderdeel van cursussen verschijnen, in plaats van omgekeerd.

*Standaard: `false`*

### `my_progress_session_show_all_courses`

**Mijn voortgang: cursusdetails in sessie tonen**

Toon alle details van elke cursus in de sessie bij het klikken op sessiedetails.

*Standaard: `false`*


### `prevent_session_admins_to_manage_all_users`

**Voorkom dat sessiebeheerders alle gebruikers beheren**

Door deze optie in te schakelen, kunnen sessiebeheerders op de beheerpagina alleen de gebruikers zien die zij zelf hebben aangemaakt.

*Standaard: `false`*

### `remove_session_url`

**Link naar sessiepagina verbergen**

Verberg de link naar de sessiepagina in de sessielijst.

*Standaard: `false`*


### `session_admins_access_all_content`

**Sessiebeheerders hebben toegang tot alle cursusinhoud**

Sessiebeheerders kunnen alle cursusinhoud binnen hun sessies bekijken, inclusief beperkte of gearchiveerde materialen.

*Standaard: `false`*

### `session_admins_edit_courses_content`

**Sessiebeheerders kunnen cursusinhoud bewerken**

Sessiebeheerders kunnen cursusinhoud (documenten, oefeningen, tools) wijzigen in cursussen die aan hun sessies zijn toegewezen.

*Standaard: `false`*

### `session_automatic_creation_user_id`

**Gebruikers-ID van de maker van automatisch aangemaakte sessies**

Stel de gebruiker in die als maker van automatisch aangemaakte sessies moet worden gebruikt (om te voorkomen dat elke sessie aan gebruiker '1' wordt toegewezen, wat vaak de portaalbeheerder is).

*Standaard: `1`*


### `session_classes_tab_disable`

**Tabblad klas toevoegen in sessiecursus uitschakelen voor niet-beheerders**

Schakel het tabblad om klassen toe te voegen in een sessiecursus uit voor niet-beheerders.

*Standaard: `false`*


### `session_coach_access_after_duration_end`

**Sessies op duur altijd beschikbaar voor tutoren**

Anders hebben sessietutoren alleen toegang tot sessies op duur tijdens de actieve duur.

*Standaard: `false`*


### `session_course_ordering`

**Handmatige volgorde van sessiecursussen**

Schakel deze optie in om sessiebeheerders toe te staan de cursussen binnen een sessie handmatig te ordenen. Indien uitgeschakeld, worden cursussen alfabetisch geordend op cursustitel.

*Standaard: `false`*

### `session_course_users_subscription_limited_to_session_users`

**Inschrijvingen voor de cursus beperken tot alleen gebruikers van de sessie**

Beperk de lijst van studenten die in de sessiecursus kunnen worden ingeschreven. En schakel registratie voor gebruikers in alle cursussen uit vanaf de pagina Sessie hervatten.

*Standaard: `false`*


### `session_courses_read_only_mode`

**Cursus alleen-lezen instellen in sessie**

Laat docenten sommige cursussen in alleen-lezenmodus zetten wanneer ze via sessies worden geopend. Vink in de curseigenschappen de optie 'Cursus vergrendelen in sessie' aan.

*Standaard: `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Verplichte extra velden instellen in het sessieaanmaakformulier**

Vereis de vermelde velden tijdens het aanmaken van een sessie.

### `session_creation_user_course_extra_field_relation_to_prefill`

**Sessievelden vooraf invullen met gebruikersvelden**

Array van relaties tussen extra gebruikersvelden en extra sessievelden, zodat de sessie vooraf kan worden ingevuld met gegevens die overeenkomen met de gegevens van de gebruiker.

### `session_days_after_coach_access`

**Standaard aantal toegangsdagen voor tutoren na de sessie**

Standaard aantal dagen dat een tutor toegang heeft tot een sessie na de officiële einddatum van de sessie

### `session_days_before_coach_access`

**Standaard aantal toegangsdagen voor tutoren vóór de sessie**

Standaard aantal dagen dat een tutor toegang heeft tot een sessie vóór de officiële startdatum van de sessie

### `session_import_settings`

**Opties voor sessie-import**

Array van opties die als standaardparameters worden toegepast bij de CSV/XML-sessie-import.

### `session_list_order`

**Sessies ondersteunen handmatig sorteren**

Schakel handmatig herschikken van sessies in de sessielijst van de administratie in via slepen-en-neerzetten of een vergelijkbaar mechanisme.

*Standaard: `false`*


### `session_list_show_count_users`

**Aantal gebruikers tonen in de sessielijst**

De beheerder kan het aantal gebruikers in elke sessie zien. Dit voegt extra belasting toe aan de sessielijst, dus als u het vaak gebruikt, overweeg dan zorgvuldig of u de extra wachttijd wilt.

*Standaard: `false`*


### `session_list_view_remaining_days`

**Resterende dagen tonen in Mijn sessies**

Indien ingeschakeld, worden de sessiedatums op de pagina "Mijn sessies" vervangen door het aantal resterende dagen.

*Standaard: `false`*

### `session_model_list_field_ordered_by_id`

**Sessiesjablonen sorteren op id in het sessieaanmaakformulier**

[inferred] Sorteer sessiesjablonen op hun numerieke ID in de keuzelijst van het sessieaanmaakformulier in plaats van alfabetisch op naam.

*Standaard: `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Leegmaken van ingeschreven gebruikers bij sessie-inschrijving voorkomen**

Bij het gebruik van meervoudige inschrijving van deelnemers voor een sessie, voorkom het normale gedrag waarbij gebruikers die niet in het rechterpaneel staan, worden uitgeschreven wanneer u op verzenden klikt. Behoud alle gebruikers daar.

*Standaard: `false`*


### `show_all_sessions_on_my_course_page`

**Alle sessies tonen op de pagina 'Mijn cursussen'**

Indien ingeschakeld, toont deze optie alle sessies van de gebruiker in een kalenderweergave.

*Standaard: `true`*


### `show_session_coach`

**Sessietutor tonen**

Toon de naam van de algemene sessietutor in het sessietitelvak in de cursuslijst

*Standaard: `false`*

### `show_session_data`

**Titel sessiegegevens tonen**

Toon commentaar bij sessiegegevens

*Standaard: `false`*

### `show_session_description`

**Sessiebeschrijving tonen**

Toon de sessiebeschrijving waar deze optie is geïmplementeerd (sessievolgpagina's, enz.)

*Standaard: `false`*

### `show_simple_session_info`

**Eenvoudige sessie-informatie tonen**

Voeg de tutor en datums toe aan de sessie-ondertitel in de sessielijst.

*Standaard: `true`*


### `show_users_in_active_sessions_in_tracking`

**Alleen gebruikers van actieve sessies weergeven in tracking**

Toon alleen gebruikers van momenteel actieve sessies in de tracking- en rapportageweergaven van cursisten.

*Standaard: `false`*


### `tracking_columns`

**Kolommen voor cursus-sessie-tracking aanpassen**

Definieer een array van kolommen voor de volgende rapporten: 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Duur van automatisch aangemaakte sessies**

Duur (in dagen) van de sessies voor één gebruiker die automatisch worden aangemaakt. Na het verstrijken kan de gebruiker zich niet meer inschrijven voor dezelfde cursus (er wordt geen andere sessie aangemaakt).

*Standaard: `1095`*


### `user_session_display_mode`

**Weergavemodus Mijn sessies**

Kies hoe de pagina "Mijn sessies" wordt weergegeven: als een moderne visuele blokweergave (kaart) of in de klassieke lijststijl.

*Standaard: `list`*