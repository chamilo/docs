# Gebruikersprofielinstellingen

Welke velden op het gebruikersprofiel verschijnen, welke de gebruiker kan bewerken, en gerelateerde voorkeuren.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Gebruikersprofiel**. Deze categorie bevat **29 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `account_valid_duration`

**Geldigheid van het account**

Een gebruikersaccount is geldig voor dit aantal dagen na aanmaak

*Standaard: `3660`*


### `add_user_course_information_in_mailto`

**E-mail vooraf invullen met gebruikers- en cursusinformatie in de contactvoettekst**

Onderwerp en berichttekst toevoegen in de mailto:-voettekst.

*Standaard: `false`*


### `allow_show_linkedin_url`

**Weergave van de LinkedIn-URL van de gebruiker toestaan**

Een koppeling toevoegen op het sociale blok van de gebruiker, waarmee het LinkedIn-profiel van de gebruiker kan worden bezocht

### `allow_show_skype_account`

**Weergave van het Skype-account van de gebruiker toestaan**

Een koppeling toevoegen op het sociale blok van de gebruiker waarmee een chat via Skype kan worden gestart

### `allow_social_map_fields`

**Geolocatie van gebruikers op een kaart**

De weergave van een kaart in het sociale netwerk inschakelen waarmee u andere gebruikers kunt lokaliseren. Dit omvat meerdere posities (huidige en bestemming) die als adressen of coördinaten in aparte extra velden moeten worden gedefinieerd. De extra velden moeten hier als een array worden ingesteld.

### `allow_teachers_to_classes`

**Docenten toestaan klassen te beheren**

Stelt docenten in staat klasgroepen en hun lidmaatschap binnen het systeem te beheren.

*Standaard: `false`*


### `allow_user_headings`

**Gebruikersprofilering binnen cursussen toestaan**

Kan een docent extra profielvelden voor cursisten definiëren om aanvullende informatie te verzamelen?

### `allow_users_to_change_email_with_no_password`

**Gebruikers toestaan e-mail te wijzigen zonder wachtwoord**

Bij het wijzigen van de accountgegevens

*Standaard: `false`*

### `changeable_options`

**Velden die gebruikers in hun profiel mogen wijzigen**

Selecteer de velden die gebruikers op hun profielpagina kunnen wijzigen.


### `enable_profile_user_address_geolocalization`

**Geolokalisatie van de gebruiker inschakelen**

Het adresveld van de gebruiker inschakelen en dit op een kaart tonen met geolokalisatiefuncties

### `extended_profile`

**Portfolio**

Als deze instelling is ingeschakeld, kan een gebruiker de volgende (optionele) velden invullen: 'Mijn persoonlijke vrije ruimte', 'Mijn competenties', 'Mijn diploma's', 'Wat ik kan onderwijzen'

*Standaard: `false`*

### `hide_username_in_course_chat`

**Gebruikersnaam verbergen in de cursuschat**

In de cursuschat de gebruikersnaam verbergen. Alleen de namen van personen weergeven.

*Standaard: `false`*


### `hide_username_with_complete_name`

**Gebruikersnaam verbergen wanneer de volledige naam al wordt getoond**

Sommige interne functies geven de gebruikersnaam terug wanneer de volledige naam van de gebruiker wordt geretourneerd. Met deze optie ingeschakeld zorgt u ervoor dat de gebruikersnaam niet verschijnt.

*Standaard: `false`*


### `linkedin_organization_id`

**LinkedIn-organisatie-ID**

Bij het delen van een badge op LinkedIn kunt u een organisatie-ID instellen die verwijst naar de LinkedIn-pagina van uw organisatie (om de organisatie die de badge toekent te koppelen).

*Standaard: `false`*


### `login_is_email`

**E-mailadres als gebruikersnaam gebruiken**

Het e-mailadres gebruiken om in te loggen op het systeem

*Standaard: `false`*

### `my_space_users_items_per_page`

**Standaard aantal items per pagina in mySpace**

Aantal records dat per pagina wordt weergegeven in de trackingsecties van MySpace (gebruikers, werkstatistieken, studentenlijst).

*Standaard: `10`*


### `pass_reminder_custom_link`

**Aangepaste pagina voor wachtwoordherinnering**

Stel uw eigen URL in naar een pagina voor het opnieuw instellen van het wachtwoord. Nuttig bij gebruik van een federatief accountbeheersysteem.

### `profile_fields_visibility`

**Velden zichtbaar op de profielpagina**

Array van velden en of (boolean) ze zichtbaar zijn of niet op de profielpagina van de gebruiker (werkt ook met labels van extra velden).

### `registration_add_helptext_for_2_names`

**Hulp toevoegen om twee namen in te vullen bij registratie**

Hulptekst toevoegen zodat gebruikers twee namen kunnen invoeren in het registratieformulier wanneer dubbele achternamen gebruikelijk zijn.

*Standaard: `false`*


### `send_notification_when_user_added`

**E-mail naar beheerder sturen wanneer een gebruiker is aangemaakt**

E-mailmelding naar de beheerder sturen wanneer een gebruiker wordt aangemaakt.

### `show_conditions_to_user`

**Specifieke registratievoorwaarden tonen**

Meerdere voorwaarden aan de gebruiker tonen tijdens het aanmeldproces. Geef een array op waarvan elk element 'variable' (interne naam van het extra veld), 'display_text' (eenvoudige tekst voor een selectievakje) en 'text_area' (lange tekst van de voorwaarden) bevat.

### `show_official_code_whoisonline`

**Officiële code op 'Wie is online'**

Officiële code tonen op de pagina 'Wie is online', onder de gebruikersnaam.

*Standaard: `false`*

### `show_terms_if_profile_completed`

**Algemene voorwaarden alleen als het profiel volledig is**

Door deze optie in te schakelen, zijn de algemene voorwaarden alleen beschikbaar voor de gebruiker wanneer de extra profielvelden die beginnen met 'terms_' en op zichtbaar zijn ingesteld, zijn ingevuld.

*Standaard: `false`*


### `split_users_upload_directory`

**Uploadmap van gebruikers splitsen**

Op portals met hoge belasting, waar veel gebruikers zijn geregistreerd en hun foto's verzenden, kan de uploadmap (main/upload/users/) te veel bestanden bevatten voor het bestandssysteem (er is melding gemaakt van meer dan 36000 bestanden op een Debian-server). Het wijzigen van deze optie schakelt een splitsing van één niveau van de mappen in de uploadmap in. Er worden 9 mappen gebruikt in de basismap en alle daaropvolgende gebruikersmappen worden in een van deze 9 mappen opgeslagen. Het wijzigen van deze optie heeft geen invloed op de mappenstructuur op schijf, maar wel op het gedrag van de Chamilo-code. Als u deze optie wijzigt, moet u zelf de nieuwe mappen aanmaken en de bestaande mappen op de server verplaatsen. Houd er rekening mee dat u bij het aanmaken en verplaatsen van die mappen de mappen van gebruikers 1 tot 9 naar submappen met dezelfde naam moet verplaatsen. Als u niet zeker bent van deze optie, is het beter deze niet te activeren.

*Standaard: `true`*

### `use_users_timezone`

**Tijdzones van gebruikers inschakelen**

Schakel de mogelijkheid in voor gebruikers om hun eigen tijdzone te selecteren. Eenmaal geconfigureerd kunnen gebruikers deadlines van opdrachten en andere tijdverwijzingen in hun eigen tijdzone zien, wat fouten bij de inlevering vermindert.

*Standaard: `true`*

### `user_import_settings`

**Opties voor gebruikersimport**

Array van opties die als standaardparameters worden toegepast bij de CSV/XML-gebruikersimport.

### `user_search_on_extra_fields`

**Gebruikers zoeken op extra velden in de gebruikerslijst voor beheerders**

Neem de opgegeven extra velden (array van labels van extra velden) vanzelfsprekend op in de gebruikerszoekopdrachten.

### `user_selected_theme`

**Themakeuze door de gebruiker**

Sta gebruikers toe hun eigen visuele thema in hun profiel te selecteren. Dit verandert het uiterlijk van Chamilo voor hen, maar laat de standaardstijl van het portal ongewijzigd. Als aan een specifieke cursus of sessie een specifiek thema is toegewezen, heeft dat voorrang op door de gebruiker gedefinieerde thema's.

*Standaard: `false`*

### `visible_options`

**Lijst van zichtbare velden in het profiel**

Bepaalt welke profielvelden zichtbaar zijn voor gebruikers en anderen.