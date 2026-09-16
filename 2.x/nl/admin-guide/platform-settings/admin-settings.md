# Identiteitsinstellingen Beheerder

Identiteit en contactgegevens van de platformbeheerder. Deze waarden verschijnen in de voettekst van het platform en in sommige door het systeem gegenereerde e-mails.

Toegang tot deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Identiteit Beheerder**. Deze categorie bevat **12 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `administrator_email`

**Portaalbeheerder: e-mail**

Het e-mailadres van de Platformbeheerder (verschijnt in de voettekst aan de linkerkant)

### `administrator_name`

**Portaalbeheerder: Voornaam**

De voornaam van de Platformbeheerder (verschijnt in de voettekst aan de linkerkant)

### `administrator_phone`

**Portaalbeheerder: Telefoonnummer**

Het telefoonnummer van de Platformbeheerder (verschijnt in de voettekst aan de linkerkant)

### `administrator_surname`

**Portaalbeheerder: Achternaam**

De achternaam van de Platformbeheerder (verschijnt in de voettekst aan de linkerkant)

### `chamilo_latest_news`

**Laatste nieuws**

Ontvang het laatste nieuws van Chamilo, inclusief beveiligingslekken en evenementen, direct in uw beheerpaneel. Dit nieuws wordt telkens gecontroleerd op de Chamilo-nieuwsserver wanneer u de beheerpagina laadt en is alleen zichtbaar voor beheerders.

*Standaard: `true`*

### `chamilo_support`

**Chamilo ondersteuningsblok**

Ontvang professionele tips en een eenvoudige manier om contact op te nemen met officiële dienstverleners voor professionele ondersteuning, rechtstreeks van de makers van Chamilo. Dit blok verschijnt op uw beheerpagina, is alleen zichtbaar voor beheerders en wordt vernieuwd telkens wanneer u de beheerpagina laadt.

*Standaard: `true`*

### `max_anonymous_users`

**Meerdere anonieme gebruikers**

Schakel deze optie in om meerdere systeemgebruikers toe te staan voor anonieme gebruikers. Dit is nuttig wanneer u dit platform gebruikt als een openbare vitrine voor sommige cursussen. Het hebben van meerdere anonieme gebruikers maakt het mogelijk om tracking te laten werken gedurende de ervaring van meerdere gebruikers zonder hun gegevens te vermengen (wat hen anders in verwarring zou kunnen brengen).

*Standaard: `0`*

### `redirect_admin_to_courses_list`

**Beheerder doorverwijzen naar cursuslijst**

Het standaardgedrag is om beheerders direct naar het beheerpaneel te sturen (terwijl docenten en studenten naar de cursuslijst of de startpagina van het platform worden gestuurd). Schakel in om de beheerder ook door te verwijzen naar zijn/haar cursuslijst.

*Standaard: `false`*

### `send_inscription_notification_to_general_admin_only`

**Alleen globale beheerder informeren over nieuwe gebruikers**

Wanneer ingeschakeld, ontvangt alleen de globale beheerder e-mailmeldingen over nieuwe gebruikersregistraties in plaats van alle beheerders.

*Standaard: `false`*

### `show_link_request_hrm_user`

**Link tonen om koppeling tussen gebruiker en HRM aan te vragen**

Toon een link op de profielpagina waarmee directeuren van personeelszaken kunnen verzoeken om gekoppeld te worden aan een gebruikersaccount.

*Standaard: `false`*

### `user_status_option_only_for_admin_enabled`

**Rol verbergen voor gewone gebruikers**

Maakt het mogelijk om de rol van gebruikers te verbergen wanneer deze optie op true is ingesteld en de volgende array de bijbehorende rol op 'true' zet.

*Standaard: `false`*

### `user_status_option_show_only_for_admin`

**Bepaal welke rollen verborgen zijn voor gewone gebruikers**

De rollen die op 'true' zijn ingesteld, verschijnen alleen voor beheerders. Andere gebruikers kunnen deze niet zien.