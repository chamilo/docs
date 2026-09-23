# SSO-konfiguration

Denne side dækker emner, der gælder på tværs af autentificeringsmetoder.

## Flere udbydere

Du kan aktivere mere end én autentificeringsmetode samtidig. Hver aktiveret udbyder viser sin egen knap på login-siden ved siden af den almindelige formular til brugernavn/adgangskode. Brugerne vælger deres foretrukne metode.

Hold den almindelige formular aktiveret, så platformadministratorer altid kan logge ind, selv hvis en ekstern udbyder er fejlkonfigureret.

## Autentificeringsprioritet

Når flere metoder er aktive, tjekker systemet legitimationsoplysninger i denne rækkefølge:

1. LDAP (hvis `force_as_login_method` er sat)
2. OAuth2-udbydere (i den rækkefølge, de vises i `authentication.yaml`)
3. Intern Chamilo-database

## JWT-tokens til API-adgang

Chamilo bruger JWT (JSON Web Tokens) til sit REST API. Tokenlevetid og opdateringsadfærd konfigureres i `config/packages/lexik_jwt_authentication.yaml`. Dette er adskilt fra SSO-loginflowet og gælder kun for API-klienter.

## Fejlfinding

### Login-knappen vises ikke efter konfiguration

Cachen skal tømmes efter hver ændring af `authentication.yaml`:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### Brugere kan ikke logge ind via SSO

* **Uoverensstemmelse i omdirigerings-URI** — Den URI, der er registreret hos din identitetsudbyder, skal nøjagtigt matche `https://your-chamilo-url/connect/<provider>/check`.
* **Urdrift** — SSO-tokens er tidsfølsomme. Sørg for, at din serverur er synkroniseret (NTP).
* **SSL-certifikat** — Chamilo skal have tillid til identitetsudbyderens certifikat. Tjek for problemer med selvsignerede certifikater.
* **Logs** — Gennemgå `var/log/` og din identitetsudbyders logs for specifikke fejlmeddelelser.

### Brugere oprettes med den forkerte rolle

Tjek rollekortlægningskonfigurationen for udbyderen. Nye brugere får som standard studentrollen, medmindre en gruppe- eller attributkortlægning promoverer dem.

### Brugere findes hos udbyderen, men kan ikke tilgå Chamilo

* Hvis `allow_create_new_users` er false, skal brugeren allerede have en Chamilo-konto, hvis e-mail eller brugernavn matcher udbyderens data.
* Tjek, at brugeren ikke er deaktiveret i Chamilo.
* For Azure skal du gennemgå `existing_user_verification_order` for at forstå, hvordan Chamilo matcher indkommende brugere med eksisterende konti.