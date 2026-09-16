# SSO-configuratie

Deze pagina behandelt onderwerpen die van toepassing zijn op alle authenticatiemethoden.

## Meerdere providers

U kunt meer dan één authenticatiemethode tegelijk inschakelen. Elke ingeschakelde provider toont een eigen knop op de inlogpagina naast het standaard formulier voor gebruikersnaam/wachtwoord. Gebruikers kiezen hun voorkeursmethode.

Houd het standaardformulier ingeschakeld zodat platformbeheerders altijd kunnen inloggen, ook als een externe provider verkeerd is geconfigureerd.

## Authenticatieprioriteit

Wanneer meerdere methoden actief zijn, controleert het systeem de inloggegevens in deze volgorde:

1. LDAP (als `force_as_login_method` is ingesteld)
2. OAuth2-providers (in de volgorde waarin ze in `authentication.yaml` staan)
3. Interne Chamilo-database

## JWT-tokens voor API-toegang

Chamilo gebruikt JWT (JSON Web Tokens) voor de REST API. De levensduur van tokens en het vernieuwingsgedrag worden geconfigureerd in `config/packages/lexik_jwt_authentication.yaml`. Dit staat los van de SSO-inlogstroom en geldt alleen voor API-clients.

## Probleemoplossing

### Inlogknop verschijnt niet na configuratie

De cache moet na elke wijziging in `authentication.yaml` worden gewist:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### Gebruikers kunnen niet inloggen via SSO

* **Redirect URI komt niet overeen** — De URI die in uw identity provider is geregistreerd, moet exact overeenkomen met `https://your-chamilo-url/connect/<provider>/check`.
* **Klokafwijking** — SSO-tokens zijn tijdgevoelig. Zorg dat de klok van uw server is gesynchroniseerd (NTP).
* **SSL-certificaat** — Chamilo moet het certificaat van de identity provider vertrouwen. Controleer op problemen met zelfondertekende certificaten.
* **Logs** — Raadpleeg `var/log/` en de logs van uw identity provider voor specifieke foutmeldingen.

### Gebruikers worden aangemaakt met de verkeerde rol

Controleer de roltoewijzingsconfiguratie van de provider. Nieuwe gebruikers krijgen standaard de studentenrol, tenzij een groeps- of attribuuttoewijzing hen promoveert.

### Gebruikers bestaan in de provider maar hebben geen toegang tot Chamilo

* Als `allow_create_new_users` false is, moet de gebruiker al een Chamilo-account hebben waarvan het e-mailadres of de gebruikersnaam overeenkomt met de gegevens van de provider.
* Controleer of de gebruiker in Chamilo niet is gedeactiveerd.
* Voor Azure: bekijk `existing_user_verification_order` om te begrijpen hoe Chamilo binnenkomende gebruikers koppelt aan bestaande accounts.