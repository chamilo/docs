# Gebruikersprofielinstellingen

Welke velden verschijnen op het gebruikersprofiel, welke de gebruiker kan bewerken en gerelateerde voorkeuren.

Toegang tot deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Gebruikersprofiel**. Deze categorie bevat **29 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de platforminstellingen (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `account_valid_duration`

**Geldigheidsduur account**

Een gebruikersaccount is geldig voor dit aantal dagen na aanmaak

*Standaard: `3660`*

### `add_user_course_information_in_mailto`

**Vooraf invullen van e-mail met gebruikers- en cursusinformatie in voettekstcontact**

Voeg onderwerp en inhoud toe aan de mailto: voettekst.

*Standaard: `false`*

### `allow_show_linkedin_url`

**Toestaan om de LinkedIn-URL van de gebruiker te tonen**

Voeg een link toe aan het sociale blok van de gebruiker, waarmee het LinkedIn-profiel van de gebruiker kan worden bezocht

### `allow_show_skype_account`

**Toestaan om het Skype-account van de gebruiker te tonen**

Voeg een link toe aan het sociale blok van de gebruiker waarmee een chat via Skype kan worden gestart

### `allow_social_map_fields`

**Geolocatie van gebruikers op een kaart**

Schakel de weergave van een kaart in het sociale netwerk in, waarmee u andere gebruikers kunt lokaliseren. Dit omvat verschillende posities (huidige en bestemming) die moeten worden gedefinieerd als adressen of coördinaten in afzonderlijke extra velden. De extra velden moeten hier als een array worden ingesteld.

### `allow_teachers_to_classes`

**Docenten toestaan om klassen te beheren**

Stelt docenten in staat om klasgroepen en hun lidmaatschap binnen het systeem te beheren.

*Standaard: `false`*

### `allow_user_headings`

**Gebruikersprofilering binnen cursussen toestaan**

Kan een docent profielvelden voor leerlingen definiëren om aanvullende informatie op te halen?

### `allow_users_to_change_email_with_no_password`

**Gebruikers toestaan om e-mail te wijzigen zonder wachtwoord**

Bij het wijzigen van accountinformatie

*Standaard: `false`*

### `changeable_options`

**Velden die gebruikers mogen wijzigen in hun profiel**

Selecteer de velden die gebruikers kunnen wijzigen op hun profielpagina.

### `enable_profile_user_address_geolocalization`

**Geolocatie van gebruiker inschakelen**

Schakel het adresveld van de gebruiker in en toon dit op een kaart met behulp van geolocatiefuncties

### `extended_profile`

**Portfolio**

Als deze instelling is ingeschakeld, kan een gebruiker de volgende (optionele) velden invullen: 'Mijn persoonlijke open ruimte', 'Mijn competenties', 'Mijn diploma's', 'Wat ik kan onderwijzen'

*Standaard: `false`*

### `hide_username_in_course_chat`

**Gebruikersnaam verbergen in cursuschat**

Verberg de gebruikersnaam in de cursuschat. Toon alleen de namen van personen.

*Standaard: `false`*

### `hide_username_with_complete_name`

**Gebruikersnaam verbergen wanneer de volledige naam al wordt getoond**

Sommige interne functies retourneren de gebruikersnaam bij het weergeven van de volledige naam van de gebruiker. Met deze optie ingeschakeld, zorgt u ervoor dat de gebruikersnaam niet verschijnt.

*Standaard: `false`*

### `linkedin_organization_id`

**LinkedIn Organisatie-ID**

Bij het delen van een badge op LinkedIn kunt u een organisatie-ID instellen die linkt naar de LinkedIn-pagina van uw organisatie (om de organisatie die de badge toekent te koppelen).

*Standaard: `false`*

### `login_is_email`

**E-mail gebruiken als gebruikersnaam**

Gebruik de e-mail om in te loggen op het systeem

*Standaard: `false`*

### `my_space_users_items_per_page`

**Standaard aantal items per pagina in mijnRuimte**

Aantal records dat per pagina wordt weergegeven in de trackingsecties van mijnRuimte (gebruikers, werkstatistieken, studentenlijst).

*Standaard: `10`*

### `pass_reminder_custom_link`

**Aangepaste pagina voor wachtwoordherinnering**

Stel uw eigen URL in voor een pagina voor het opnieuw instellen van een wachtwoord. Handig bij gebruik van een gefedereerd accountbeheersysteem.

### `profile_fields_visibility`

**Velden zichtbaar op profielpagina**

Array van velden en of (boolean) ze zichtbaar zijn of niet op de profielpagina van de gebruiker (werkt ook met labels van extra velden).

### `registration_add_helptext_for_2_names`

**Hulptekst toevoegen voor het invoeren van twee namen bij registratie**

Voeg hulptekst toe voor gebruikers om twee namen in te voeren in het registratieformulier wanneer dubbele achternamen gebruikelijk zijn.

*Standaard: `false`*

### `send_notification_when_user_added`

**E-mail sturen naar beheerder bij aanmaak gebruiker**

Stuur een e-mailmelding naar de beheerder wanneer een gebruiker wordt aangemaakt.

### `show_conditions_to_user`

**Specifieke registratievoorwaarden tonen**

Toon meerdere voorwaarden aan de gebruiker tijdens het aanmeldproces. Geef een array met elk element dat 'variable' (interne naam van extra veld), 'display_text' (eenvoudige tekst voor een selectievakje), 'text_area' (lange tekst van voorwaarden) bevat.

### `show_official_code_whoisonline`

**Officiële code op 'Wie is online'**

Toon de officiële code op de pagina 'Wie is online', onder de gebruikersnaam.

*Standaard: `false`*

---
### `show_terms_if_profile_completed`

**Algemene voorwaarden alleen als profiel voltooid**

Door deze optie in te schakelen, worden de algemene voorwaarden pas beschikbaar voor de gebruiker wanneer de extra profielvelden die beginnen met 'terms_' en zijn ingesteld als zichtbaar, zijn ingevuld.

*Standaard: `false`*

### `split_users_upload_directory`

**Uploadmap van gebruikers splitsen**

Op portals met een hoge belasting, waar veel gebruikers zijn geregistreerd en hun foto's uploaden, kan de uploadmap (main/upload/users/) te veel bestanden bevatten voor het bestandssysteem om te verwerken (er zijn meldingen geweest van meer dan 36.000 bestanden op een Debian-server). Het wijzigen van deze optie activeert een splitsing op één niveau van de mappen in de uploadmap. Er worden 9 mappen gebruikt in de basismap en alle daaropvolgende gebruikersmappen worden opgeslagen in een van deze 9 mappen. Het wijzigen van deze optie heeft geen invloed op de mappenstructuur op de schijf, maar wel op het gedrag van de Chamilo-code. Als u deze optie wijzigt, moet u zelf de nieuwe mappen aanmaken en de bestaande mappen op de server verplaatsen. Houd er rekening mee dat bij het aanmaken en verplaatsen van deze mappen, u de mappen van gebruikers 1 tot 9 moet verplaatsen naar submappen met dezelfde naam. Als u niet zeker bent over deze optie, is het beter om deze niet te activeren.

*Standaard: `true`*

### `use_users_timezone`

**Tijdzones van gebruikers inschakelen**

Maak het mogelijk voor gebruikers om hun eigen tijdzone te selecteren. Eenmaal geconfigureerd, kunnen gebruikers deadlines voor opdrachten en andere tijdreferenties in hun eigen tijdzone zien, wat fouten bij het inleveren zal verminderen.

*Standaard: `true`*

### `user_import_settings`

**Opties voor gebruikersimport**

Array van opties die als standaardparameters worden toegepast bij het importeren van gebruikers via CSV/XML.

### `user_search_on_extra_fields`

**Gebruikers zoeken op extra velden in gebruikerslijst voor beheerders**

Voeg de opgegeven extra velden (array van labels van extra velden) standaard toe aan de zoekopdrachten naar gebruikers.

### `user_selected_theme`

**Themakeuze door gebruiker**

Sta gebruikers toe om hun eigen visuele thema te selecteren in hun profiel. Dit verandert het uiterlijk van Chamilo voor hen, maar laat de standaardstijl van het portaal intact. Als een specifieke cursus of sessie een specifiek thema heeft toegewezen, heeft dit voorrang op door de gebruiker gedefinieerde thema's.

*Standaard: `false`*

### `visible_options`

**Lijst van zichtbare velden in profiel**

Bepaalt welke profielvelden zichtbaar zijn voor gebruikers en anderen.