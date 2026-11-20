# Sessie-instellingen

Standaardwaarden en gedrag voor **Sessies** — levenscyclus van sessies, toegangstijdvensters voor tutors, zichtbaarheid van cursussen binnen een sessie, en vergelijkbare zaken.

Open deze instellingen via **Beheer > Configuratie-instellingen > Sessies**. Deze categorie bevat **68 instellingen**, hieronder vermeld met de titel en de toelichting zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `add_users_by_coach`

**Tutors toestaan gebruikers te registreren**

Tutors mogen gebruikers op het platform aanmaken en gebruikers aan een sessie inschrijven.

*Standaard: `false`*

### `allow_career_diagram`

**Loopbaandiagrammen inschakelen**

Met loopbaandiagrammen kunt u diagrammen van loopbanen, vaardigheden en cursussen weergeven.

*Standaard: `false`*


### `allow_career_users`

**Loopbaandiagrammen voor gebruikers inschakelen**

Als loopbaandiagrammen zijn ingeschakeld, kunnen gebruikers deze alleen zien (en alleen de diagrammen die overeenkomen met hun studie) als u deze optie inschakelt.

*Standaard: `false`*

### `allow_coach_to_edit_course_session`

**Tutors toestaan te bewerken binnen cursussessies**

Tutors toestaan te bewerken binnen cursussessies

*Standaard: `true`*

### `allow_delete_user_for_session_admin`

**Sessiebeheerders kunnen gebruikers verwijderen**

Sessiebeheerders kunnen gebruikers van het platform verwijderen bij het beheren van hun sessie(s).

*Standaard: `false`*


### `allow_disable_user_for_session_admin`

**Sessiebeheerders kunnen gebruikers uitschakelen**

Sessiebeheerders kunnen gebruikersaccounts uitschakelen om aanmelden te voorkomen, terwijl inschrijvingsgegevens in hun sessie(s) behouden blijven.

*Standaard: `false`*


### `allow_edit_tool_visibility_in_session`

**Bewerken van zichtbaarheid van tools in sessies toestaan**

Bij het gebruik van sessies is het standaardgedrag dat de zichtbaarheid van tools wordt gebruikt zoals gedefinieerd in de basiscursus. Deze instelling wijzigt dat, zodat tutors in sessiecursussen de zichtbaarheid van tools aan hun behoeften kunnen aanpassen.

*Standaard: `true`*

### `allow_redirect_to_session_after_inscription_about`

**Doorverwijzen naar sessie na registratie op de pagina 'Over' van de sessie**

Nieuwe gebruikers automatisch doorverwijzen naar hun sessiepagina nadat zij de registratie hebben voltooid via de pagina Over van een sessie.

*Standaard: `false`*


### `allow_search_diagnostic`

**Diagnose voor het zoeken naar sessies inschakelen**

Tutors toestaan een diagnose te verkrijgen waarmee zij de beste sessies voor cursisten kunnen zoeken.

*Standaard: `false`*


### `allow_session_admin_extra_access`

**Sessiebeheerder heeft toegang tot batchgewijze import, bijwerking en export van gebruikers**

Sessiebeheerders hebben toegang tot functionaliteit voor batchgewijze import, bijwerking en export van gebruikers, naast hun standaardrechten.

*Standaard: `false`*


### `allow_session_admin_login_as_teacher`

**Sessiebeheerders kunnen 'aanmelden als' docenten**

Sessiebeheerders kunnen docentenaccounts nabootsen om cursusinhoud en de ervaring van studenten binnen hun sessie(s) te bekijken.

*Standaard: `false`*


### `allow_session_admin_read_careers`

**Sessiebeheerders kunnen loopbanen bekijken**

[afgeleid] Sessiebeheerders kunnen loopbaantrajecten en promotieworkflows bekijken en openen die gekoppeld zijn aan hun beheerde sessies.

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

**Tutors kunnen studenten aan sessies toewijzen**

Indien ingeschakeld, kunnen cursustutors in sessies nieuwe gebruikers aan hun sessie inschrijven. Deze optie is anders alleen beschikbaar voor beheerders en sessiebeheerders.

*Standaard: `false`*

### `allow_user_session_collapsable`

**Gebruiker toestaan sessies in te klappen in Mijn sessies**

Gebruikers kunnen sessiekaarten of groepen op de pagina Mijn sessies inklappen om visuele rommel te verminderen en de navigatie te verbeteren.

*Standaard: `false`*


### `assignment_base_course_teacher_access_to_all_session`

**Docent van de basiscursus kan opdrachten uit alle sessies zien**

Alle publicaties van cursisten (uit de basiscursus en uit alle sessies) weergeven op de pagina work/pending.php van de basiscursus.

*Standaard: `false`*

### `career_diagram_disclaimer`

**Een disclaimer onder het loopbaandiagram weergeven**

Voeg een disclaimer toe onder het loopbaandiagram. Er moet een taalvariabele met de naam 'Career diagram disclaimer' bestaan in uw subtaal.

*Standaard: `false`*

### `career_diagram_legend`

**Een legenda onder het loopbaandiagram weergeven**

Voeg een loopbaanlegenda toe onder het loopbaandiagram. Er moet een taalvariabele met de naam 'Career diagram legend' bestaan in uw subtaal.

*Standaard: `false`*

### `courses_list_session_title_link`

**Type koppeling voor de sessietitel**

Op de pagina cursussen/sessies kan de sessietitel een van de volgende zijn: 0 = geen koppeling (sessietitel verbergen); 1 = titel koppelen aan een speciale sessiepagina; 2 = koppelen naar de cursus als er slechts één cursus is; 3 = sessietitel maakt de cursuslijst inklapbaar; 4 = geen koppeling (sessietitel tonen).

*Standaard: `1`*

### `default_session_list_view`

**Standaardweergave van de sessielijst**

Selecteer het standaardtabblad dat u wilt zien wanneer u de sessielijst als beheerder opent.

*Standaard: `all`*


### `hrm_can_access_all_session_content`

**HR-directeuren hebben toegang tot alle sessie-inhoud**

Indien ingeschakeld, kunnen HRM-gebruikers inhoud en gebruikers openen in de sessies die zij volgen. De oude sleutel `session.drh_can_access_all_session_content` blijft herkend voor compatibiliteit.

*Standaard: `true`*

### `duplicate_specific_session_content_on_session_copy`

**Het kopiëren van sessiespecifieke inhoud naar een andere sessie inschakelen**

Maakt duplicatie mogelijk van bronnen die in de sessie zijn aangemaakt bij het dupliceren van de sessie.

*Standaard: `false`*


### `email_template_subscription_to_session_confirmation_lost_password`

**Koppeling voor wachtwoordherstel toevoegen aan e-mailmelding van inschrijving voor een sessie**

Neem een koppeling voor wachtwoordherstel op in bevestigingsmails voor inschrijving die naar gebruikers worden verzonden wanneer zij voor een sessie worden ingeschreven.

*Standaard: `false`*


### `email_template_subscription_to_session_confirmation_username`

**Gebruikersnaam toevoegen aan e-mailmelding van inschrijving voor een sessie**

Neem de gebruikersnaam van de gebruiker op in bevestigingsmails voor inschrijving die worden verzonden wanneer zij voor een sessie worden ingeschreven.

*Standaard: `false`*


### `enable_auto_reinscription`

**Automatische herinschrijving inschakelen**

Automatische herinschrijving in- of uitschakelen wanneer de geldigheid van de cursus verloopt. De bijbehorende cronjob moet ook worden geactiveerd.

*Standaard: `false`*


### `enable_session_replication`

**Sessiereplicatie inschakelen**

Automatische sessiereplicatie in- of uitschakelen. De bijbehorende cronjob moet ook worden geactiveerd.

*Standaard: `false`*


### `extend_rights_for_coach`

**Rechten voor tutors uitbreiden**

Schakel deze optie in om tutors dezelfde machtigingen te geven als trainers voor authoringtools.

*Standaard: `false`*

### `hide_courses_in_sessions`

**Cursuslijst in sessies verbergen**

Verberg bij het tonen van het sessieblok op uw cursuspagina de lijst met cursussen binnen die sessie (toon ze alleen op het specifieke sessiescherm).

*Standaard: `false`*

### `hide_reporting_session_list`

**Sessielijst in de rapportagetool verbergen**

Sessies die de cursus bevatten, worden vermeld in de rapportagetool binnen de cursus zelf, wat aanzienlijk gewicht kan toevoegen als dezelfde cursus in honderden sessies wordt gebruikt. Deze optie verwijdert die lijst.

*Standaard: `false`*


### `hide_search_form_in_session_list`

**Zoekformulier in de sessielijst verbergen**

Verwijder het zoekinvoerveld uit de weergave van de sessielijst in de beheerinterface.

*Standaard: `false`*


### `hide_session_graph_in_my_progress`

**Sessiegrafiek in Mijn voortgang verbergen**

Verberg sessievoortgangsgrafieken en visualisaties op de pagina Mijn voortgang in dashboards voor cursisten.

*Standaard: `false`*


### `hide_tab_list`

**Tabbladen op de sessiepagina verbergen**

Verwijder navigatietabbladen van de sessiedetailpagina om de interface te vereenvoudigen.

### `limit_session_admin_list_users`

**Sessiebeheerders hebben geen toegang tot de gebruikerslijst**

Voorkom dat sessiebeheerders toegang hebben tot de globale gebruikerslijst in de beheerinterface.

*Standaard: `false`*


### `limit_session_admin_role`

**Machtigingen van sessiebeheerders beperken**

Indien ingeschakeld, zien de sessiebeheerders alleen het blok Gebruikers met de optie 'Gebruiker toevoegen' en het blok Sessies met de optie 'Sessielijst'.

*Standaard: `false`*

### `my_courses_session_order`

**De standaardsortering van sessies in Mijn sessies wijzigen**

Standaard worden sessies gesorteerd op startdatum. Wijzig dit door een array op te geven van het type ['field' => 'end_date', 'order' => 'desc'].

### `my_courses_view_by_session`

**Mijn cursussen per sessie weergeven**

Schakel een extra pagina 'Mijn cursussen' in waarop sessies als onderdeel van cursussen verschijnen, in plaats van het omgekeerde.

*Standaard: `false`*

### `my_progress_session_show_all_courses`

**Mijn voortgang: cursusdetails in sessie tonen**

Toon alle details van elke cursus in de sessie wanneer op sessiedetails wordt geklikt.

*Standaard: `false`*

### `prevent_session_admins_to_manage_all_users`

**Voorkom dat sessiebeheerders alle gebruikers beheren**

Door deze optie in te schakelen, kunnen sessiebeheerders op de beheerpagina alleen de gebruikers zien die zij zelf hebben aangemaakt.

*Standaard: `false`*

### `remove_session_url`

**Verberg link naar sessiepagina**

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

**Maker-ID van automatisch aangemaakte sessie**

Stel de gebruiker in die als maker van de automatisch aangemaakte sessies wordt gebruikt (om te voorkomen dat elke sessie aan gebruiker '1' wordt toegewezen, wat vaak de portaalbeheerder is).

*Standaard: `1`*


### `session_classes_tab_disable`

**Tabblad klas toevoegen in sessiecursus uitschakelen voor niet-beheerders**

Schakel het tabblad uit om klassen toe te voegen aan een sessiecursus voor niet-beheerders.

*Standaard: `false`*


### `session_coach_access_after_duration_end`

**Sessies op basis van duur altijd beschikbaar voor tutoren**

Anders hebben sessietutoren alleen toegang tot sessies op basis van duur gedurende de actieve duur.

*Standaard: `false`*


### `session_course_ordering`

**Handmatige volgorde van sessiecursussen**

Schakel deze optie in zodat sessiebeheerders de cursussen binnen een sessie handmatig kunnen ordenen. Indien uitgeschakeld, worden cursussen alfabetisch gesorteerd op cursustitel.

*Standaard: `false`*

### `session_course_users_subscription_limited_to_session_users`

**Beperk inschrijvingen voor de cursus tot alleen gebruikers van de sessie**

Beperk de lijst van studenten die kunnen worden ingeschreven in de cursussessie. En schakel registratie uit voor gebruikers in alle cursussen vanaf de pagina Sessie hervatten.

*Standaard: `false`*


### `session_courses_read_only_mode`

**Cursus alleen-lezen instellen in sessie**

Laat docenten sommige cursussen in alleen-lezenmodus zetten wanneer ze via sessies worden geopend. Vink in de cursuseigenschappen de optie 'Cursus vergrendelen in sessie' aan.

*Standaard: `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Verplichte extra velden instellen in het formulier voor het aanmaken van sessies**

Vereis de vermelde velden tijdens het aanmaken van een sessie.

### `session_creation_user_course_extra_field_relation_to_prefill`

**Sessievelden vooraf invullen met gebruikersvelden**

Array van relaties tussen extra gebruikersvelden en extra sessievelden, zodat de sessie vooraf kan worden ingevuld met gegevens die overeenkomen met de gegevens van de gebruiker.

### `session_days_after_coach_access`

**Standaard aantal dagen toegang voor tutor na de sessie**

Standaard aantal dagen dat een tutor toegang heeft tot een sessie na de officiële einddatum van de sessie

### `session_days_before_coach_access`

**Standaard aantal dagen toegang voor tutor vóór de sessie**

Standaard aantal dagen dat een tutor toegang heeft tot een sessie vóór de officiële startdatum van de sessie

### `session_import_settings`

**Opties voor sessie-import**

Array van opties die als standaardparameters worden toegepast bij de CSV/XML-sessie-import.

### `session_list_order`

**Sessies ondersteunen handmatig sorteren**

Schakel handmatig herschikken van sessies in de beheersessielijst in via slepen en neerzetten of een vergelijkbaar mechanisme.

*Standaard: `false`*


### `session_list_show_count_users`

**Toon aantal gebruikers in de sessielijst**

De beheerder kan het aantal gebruikers in elke sessie zien. Dit voegt extra belasting toe aan de sessielijst, dus als u deze vaak gebruikt, overweeg dan zorgvuldig of u de extra wachttijd wilt.

*Standaard: `false`*


### `session_list_view_remaining_days`

**Toon resterende dagen in Mijn sessies**

Indien ingeschakeld, worden de sessiedatums op de pagina "Mijn sessies" vervangen door het aantal resterende dagen.

*Standaard: `false`*

### `session_model_list_field_ordered_by_id`

**Sorteer sessiesjablonen op id in het formulier voor het aanmaken van sessies**

[afgeleid] Sorteer sessiesjablonen op hun numerieke ID in de vervolgkeuzelijst van het formulier voor het aanmaken van sessies in plaats van alfabetisch op naam.

*Standaard: `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Voorkom het legen van de ingeschreven gebruikers bij sessie-inschrijving**

Bij het gebruik van meervoudige inschrijving van cursisten voor een sessie, voorkom het normale gedrag waarbij gebruikers die niet in het rechterpaneel staan worden uitgeschreven wanneer op verzenden wordt geklikt. Behoud alle gebruikers daar.

*Standaard: `false`*


### `show_all_sessions_on_my_course_page`

**Toon alle sessies op de pagina 'Mijn cursussen'**

Indien ingeschakeld, toont deze optie alle sessies van de gebruiker in een kalenderweergave.

*Standaard: `true`*


### `show_session_coach`

**Toon sessietutor**

Toon de naam van de algemene sessietutor in het sessietitelvak in de cursuslijst

*Standaard: `false`*

### `show_session_data`

**Toon titel van sessiegegevens**

Toon opmerking bij sessiegegevens

### `show_session_description`

**Sessiebeschrijving tonen**

Toon de sessiebeschrijving overal waar deze optie is geïmplementeerd (pagina's voor sessietracking, enz.)

*Standaard: `false`*

### `show_simple_session_info`

**Eenvoudige sessie-informatie tonen**

Voeg de tutor en de datums toe aan de ondertitel van de sessie in de sessielijst.

*Standaard: `true`*


### `show_users_in_active_sessions_in_tracking`

**Alleen gebruikers uit actieve sessies tonen in tracking**

Toon alleen gebruikers uit momenteel actieve sessies in de weergaven voor leerlingtracking en rapportage.

*Standaard: `false`*


### `tracking_columns`

**Kolommen voor cursus-sessietracking aanpassen**

Definieer een array van kolommen voor de volgende rapporten: 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Duur van automatisch aangemaakte sessies**

Duur (in dagen) van de automatisch aangemaakte sessies voor één gebruiker. Na afloop kan de gebruiker zich niet opnieuw inschrijven voor dezelfde cursus (er wordt geen andere sessie aangemaakt).

*Standaard: `1095`*


### `user_session_display_mode`

**Weergavemodus van Mijn sessies**

Kies hoe de pagina "Mijn sessies" wordt weergegeven: als een moderne visuele blokweergave (kaart) of in de klassieke lijststijl.

*Standaard: `list`*