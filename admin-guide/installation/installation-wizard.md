# Installatiewizard

Chamilo 2.0 bevat een webgebaseerde installatiewizard die u door de initiële configuratie leidt. De wizard start automatisch wanneer u voor de eerste keer toegang krijgt tot het platform.

## Voordat u begint

Zorg ervoor dat aan de volgende voorwaarden is voldaan:

1. Uw server voldoet aan alle [serververeisten](server-requirements.md).
2. U hebt een verpakte (zip of tar.gz) versie van Chamilo gedownload.
3. Uw webserver is geconfigureerd om de map `public/` als documentroot te gebruiken.
4. Uw `.env`-bestand bestaat en is leeg (de wizard zal u begeleiden bij het instellen van de database).

## Stap 1: Installatietaal

![Installatiewizard Stap 1 — taalkeuze](/.gitbook/assets/install-step1-language.png)

In de eerste stap kunt u de taal voor het installatieproces selecteren. Kies uw voorkeurstaal uit het dropdownmenu.

Als Chamilo een bestaande installatie detecteert (voor een upgrade), wordt de migratiestatus weergegeven en wordt een upgrade-pad aangeboden in plaats van een nieuwe installatie.

## Stap 2: Controle van vereisten

![Installatiewizard Stap 2 — controle van vereisten met PHP-versie, extensies en maprechten](/.gitbook/assets/install-step2-requirements.png)

De wizard controleert uw serveromgeving:

* **PHP-versie** is 8.2 of hoger
* **Vereiste PHP-extensies** zijn geïnstalleerd (intl, gd, curl, zip, mbstring, xml, enz.)
* **Aanbevolen PHP-instellingen** — `date.timezone` is geconfigureerd, voldoende upload-/geheugenlimieten
* **Map- en bestandsrechten** — `var/`, `config/` en `public/upload/` zijn beschrijfbaar door de webserver

Als niet aan alle vereisten wordt voldaan, toont de wizard waarschuwingen of fouten. Los deze op voordat u verdergaat.

## Stap 3: Licentie

![Installatiewizard Stap 3 — acceptatie van de licentie](/.gitbook/assets/install-step3-license.png)

In deze stap wordt de GNU/GPLv3-licentie weergegeven. U moet het vakje **"Ik accepteer"** aanvinken om verder te gaan.

Optioneel kunt u de sectie **Contactinformatie** uitklappen om gegevens over uw organisatie te verstrekken (naam, e-mail, bedrijf, land). Dit is vrijwillig en helpt de Chamilo-gemeenschap te begrijpen wie het platform gebruikt, maar stelt ons ook in staat om u *zeer zelden* te contacteren over evenementen in uw buurt.

## Stap 4: Database-instellingen

![Installatiewizard Stap 4 — configuratie van de databaseverbinding](/.gitbook/assets/install-step4-database.png)

Voer uw databaseverbindingsgegevens in:

| Veld | Beschrijving |
|-------|-------------|
| **Databasehost** | De hostnaam of het IP-adres van uw databaseserver (bijv. `localhost` of `127.0.0.1`) |
| **Databasepoort** | Standaard: 3306 voor MySQL/MariaDB |
| **Databasenaam** | De naam van de te gebruiken database (alleen alfanumerieke tekens en underscores) |
| **Databasegebruiker** | Een databasegebruiker met volledige rechten op de opgegeven database |
| **Databasewachtwoord** | Het wachtwoord voor de databasegebruiker |

Klik op **Controleer databaseverbinding** om te testen. De wizard laat u niet verdergaan totdat de verbinding succesvol is. Als de database al bestaat, wordt een waarschuwing weergegeven.

## Stap 5: Configuratie-instellingen

![Installatiewizard Stap 5 — beheerdersaccount, portaalinstellingen en e-mailconfiguratie](/.gitbook/assets/install-step5-config.png)

Deze stap combineert het aanmaken van een beheerdersaccount, portaalinstellingen en e-mailconfiguratie.

### Beheerdersaccount

| Veld | Beschrijving |
|-------|-------------|
| **Inlognaam** | De gebruikersnaam van de beheerder |
| **Wachtwoord** | Kies een sterk wachtwoord — dit account heeft volledige toegang tot het platform |
| **Voornaam** | De voornaam van de beheerder |
| **Achternaam** | De achternaam van de beheerder |
| **E-mail** | Gebruikt voor systeemmeldingen en wachtwoordherstel |
| **Telefoon** | Optioneel contactnummer |

Deze beheerdersgegevens worden door Chamilo ook gebruikt om de ondersteuningscontactgegevens in te vullen, dus zorg ervoor dat u deze na de installatie opnieuw configureert in de instellingen.

### Portaalinstellingen

| Veld | Beschrijving |
|-------|-------------|
| **Taal** | De standaard interfacetaal |
| **Portaalnaam** | De naam van uw platform (bijv. "Mijn Organisatie LMS") |
| **Korte bedrijfsnaam** | De afgekorte naam van uw organisatie |
| **Bedrijfs-URL** | De website van uw organisatie |
| **Versleutelingsmethode** | Algoritme voor wachtwoordhashing — **bcrypt** wordt aanbevolen |
| **Zelfregistratie toestaan** | Ja / Nee / Na goedkeuring |
| **Zelfregistratie als trainer toestaan** | Ja / Nee |

### E-mailconfiguratie

In de sectie voor e-mailinstellingen kunt u het e-mailtransport configureren (SMTP, Amazon SES, Mailjet, enz.) en de e-mailbezorging testen. Zie [E-mailconfiguratie](email-configuration.md) voor meer informatie.

Al deze instellingen kunnen later worden gewijzigd via het beheerderspaneel.

## Stap 6: Laatste Controle Voor Installatie

![Installatiewizard Stap 6 — overzicht van alle instellingen voor installatie](/.gitbook/assets/install-step6-review.png)

Deze stap toont een samenvatting van alles wat u hebt ingevoerd ter controle:

* Beheerdersgegevens (wachtwoord is standaard verborgen — klik op het oogpictogram om het te tonen)
* Portaalinstellingen
* Databaseverbindingsgegevens

Controleer alles zorgvuldig en klik vervolgens op **Chamilo Installeren** om de installatie uit te voeren. De wizard maakt alle databasetabellen aan, vult de initiële gegevens in en configureert het platform.

## Stap 7: Installatie Voltooid

![Installatiewizard Stap 7 — voltooiing met beveiligingsadvies en portaallink](/.gitbook/assets/install-step7-complete.png)

Nadat de installatie succesvol is voltooid, toont de wizard:

* **Aan de slag-advies** — Stelt voor om uw eerste cursus aan te maken om het platform te verkennen (als beheerder moet u dit doen via het beheerderspaneel)
* **Beveiligingsaanbevelingen**:
  * Maak de map `config/` alleen-lezen (`chmod 0555`)
  * Verwijder de map `public/main/install/`
* Een **link naar uw portaal** om in te loggen met de beheerdersgegevens die u zojuist hebt aangemaakt

## Na de Installatie

Na het voltooien van de wizard:

* **Verwijder of beperk toegang tot de installer** -- De wizard mag na de installatie niet meer toegankelijk zijn. Chamilo vergrendelt deze normaal gesproken automatisch, maar controleer of het opnieuw bezoeken van de installatie-URL doorverwijst naar de inlogpagina.
* **Configureer e-mailbezorging** -- Zie [E-mailconfiguratie](email-configuration.md).
* **Stel back-ups in** -- Voordat u inhoud toevoegt, configureert u automatische back-ups van de database en bestanden (Chamilo biedt hiervoor geen oplossing, maar het kopiëren van de map var/ en de database zijn de 2 belangrijkste elementen).
* **Controleer beveiligingsinstellingen** -- Zie [Beveiligingsinstellingen](../platform-settings/security-settings.md).

## Probleemoplossing

| Probleem | Oplossing |
|---------|-----------|
| Lege pagina op installatie-URL | Controleer de PHP-foutlogboeken. Wijzig tijdelijk naar `APP_ENV=dev` in .env om fouten in de browser te zien. |
| Databaseverbinding mislukt | Controleer de inloggegevens, bevestig dat de database bestaat, controleer of de databaseserver verbindingen toestaat vanaf de webserverhost. |
| Toestemming geweigerd-fouten | Zorg ervoor dat `var/` schrijfbaar is door de webservergebruiker. |
| Assets laden niet (geen CSS/JS) | Voer `yarn install && yarn build` uit om frontend-assets te compileren. |