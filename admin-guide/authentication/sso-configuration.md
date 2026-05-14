# SSO-configuratie

Deze pagina behandelt onderwerpen die van toepassing zijn op verschillende authenticatiemethoden.

## Meerdere aanbieders

U kunt meer dan één authenticatiemethode tegelijk inschakelen. Elke ingeschakelde aanbieder toont een eigen knop op de inlogpagina naast het standaard formulier voor gebruikersnaam/wachtwoord. Gebruikers kiezen hun voorkeursmethode.

Houd het standaardformulier ingeschakeld zodat platformbeheerders altijd kunnen inloggen, zelfs als een externe aanbieder verkeerd is geconfigureerd.

## Authenticatieprioriteit

Wanneer meerdere methoden actief zijn, controleert het systeem de inloggegevens in deze volgorde:

1. LDAP (als `force_as_login_method` is ingesteld)
2. OAuth2-aanbieders (in de volgorde waarin ze verschijnen in `authentication.yaml`)
3. Interne Chamilo-database

## JWT-tokens voor API-toegang

Chamilo gebruikt JWT (JSON Web Tokens) voor zijn REST API. De levensduur van tokens en het vernieuwingsgedrag worden geconfigureerd in `config/packages/lexik_jwt_authentication.yaml`. Dit staat los van de SSO-inlogstroom en geldt alleen voor API-clients.

## Probleemoplossing

### Inlogknop verschijnt niet na configuratie

De cache moet worden geleegd na elke wijziging in `authentication.yaml`:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### Gebruikers kunnen niet inloggen via SSO

* **Redirect URI komt niet overeen** — De URI die is geregistreerd bij uw identiteitsaanbieder moet exact overeenkomen met `https://your-chamilo-url/connect/<provider>/check`.
* **Klokafwijking** — SSO-tokens zijn tijdsgevoelig. Zorg ervoor dat de klok van uw server is gesynchroniseerd (NTP).
* **SSL-certificaat** — Chamilo moet het certificaat van de identiteitsaanbieder vertrouwen. Controleer op problemen met zelfondertekende certificaten.
* **Logboeken** — Bekijk `var/log/` en de logboeken van uw identiteitsaanbieder voor specifieke foutmeldingen.

### Gebruikers worden aangemaakt met de verkeerde rol

Controleer de roltoewijzingsconfiguratie voor de aanbieder. Nieuwe gebruikers krijgen standaard de studentenrol, tenzij een groep- of kenmerktoewijzing hen promoveert.

### Gebruikers bestaan in de aanbieder maar hebben geen toegang tot Chamilo

* Als `allow_create_new_users` op false staat, moet de gebruiker al een Chamilo-account hebben waarvan het e-mailadres of de gebruikersnaam overeenkomt met de gegevens van de aanbieder.
* Controleer of de gebruiker niet is gedeactiveerd in Chamilo.
* Voor Azure, bekijk `existing_user_verification_order` om te begrijpen hoe Chamilo inkomende gebruikers koppelt aan bestaande accounts.