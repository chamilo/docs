# Beheerderidentiteitsinstellingen

Identiteit en contactgegevens van de platformbeheerder. Deze waarden verschijnen in de voettekst van het platform en in sommige door het systeem gegenereerde e-mails.

Open deze instellingen onder **Beheer > Configuratie-instellingen > Beheerderidentiteit**. Deze categorie bevat **12 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code staat in monospace. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `administrator_email`

**Portaalbeheerder: e-mail**

Het e-mailadres van de platformbeheerder (verschijnt links in de voettekst)

### `administrator_name`

**Portaalbeheerder: voornaam**

De voornaam van de platformbeheerder (verschijnt links in de voettekst)

### `administrator_phone`

**Portaalbeheerder: telefoonnummer**

Het telefoonnummer van de platformbeheerder (verschijnt links in de voettekst)

### `administrator_surname`

**Portaalbeheerder: achternaam**

De familienaam van de platformbeheerder (verschijnt links in de voettekst)

### `chamilo_latest_news`

**Laatste nieuws**

Ontvang het laatste nieuws van Chamilo, inclusief beveiligingskwetsbaarheden en evenementen, rechtstreeks in uw beheerpaneel. Dit nieuws wordt bij elke keer dat u de beheerpagina laadt gecontroleerd op de Chamilo-nieuwsserver en is alleen zichtbaar voor beheerders.

*Standaard: `true`*

### `chamilo_support`

**Chamilo-ondersteuningsblok**

Ontvang professionele tips en een eenvoudige manier om officiële dienstverleners voor professionele ondersteuning te contacteren, rechtstreeks van de makers van Chamilo. Dit blok verschijnt op uw beheerpagina, is alleen zichtbaar voor beheerders en wordt bij elke keer dat u de beheerpagina laadt vernieuwd.

*Standaard: `true`*

### `max_anonymous_users`

**Meerdere anonieme gebruikers**

Schakel deze optie in om meerdere systeemgebruikers voor anonieme gebruikers toe te staan. Dit is nuttig wanneer u dit platform gebruikt als openbare etalage voor sommige cursussen. Meerdere anonieme gebruikers laten tracking werken gedurende de ervaring voor meerdere gebruikers zonder hun gegevens te vermengen (wat hen anders in verwarring zou kunnen brengen).

*Standaard: `0`*

### `redirect_admin_to_courses_list`

**Beheerder omleiden naar cursuslijst**

Het standaardgedrag is om beheerders rechtstreeks naar het beheerpaneel te sturen (terwijl docenten en studenten naar de cursuslijst of de startpagina van het platform worden gestuurd). Schakel in om de beheerder ook naar zijn/haar cursuslijst om te leiden.

*Standaard: `false`*

### `send_inscription_notification_to_general_admin_only`

**Alleen de globale beheerder op de hoogte stellen van nieuwe gebruikers**

Wanneer ingeschakeld, ontvangt alleen de globale beheerder e-mailmeldingen over nieuwe gebruikersregistraties in plaats van alle beheerders.

*Standaard: `false`*

### `show_link_request_hrm_user`

**Koppeling tonen om een band tussen gebruiker en HRM aan te vragen**

Toon een koppeling op de profielpagina waarmee HR-directeuren kunnen verzoeken om gekoppeld te worden aan een gebruikersaccount.

*Standaard: `false`*

### `user_status_option_only_for_admin_enabled`

**Rol verbergen voor gewone gebruikers**

Maakt het mogelijk gebruikersrollen te verbergen wanneer deze optie op true staat en de volgende array de overeenkomstige rol op 'true' zet.

*Standaard: `false`*

### `user_status_option_show_only_for_admin`

**Bepalen welke rollen verborgen zijn voor gewone gebruikers**

De rollen die op 'true' staan, verschijnen alleen voor beheerders. Andere gebruikers kunnen ze niet zien.