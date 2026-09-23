# SSO-konfigurasjon

Denne siden dekker emner som gjelder på tvers av autentiseringsmetoder.

## Flere leverandører

Du kan aktivere mer enn én autentiseringsmetode samtidig. Hver aktiverte leverandør viser sin egen knapp på innloggingssiden ved siden av det vanlige skjemaet for brukernavn/passord. Brukere velger sin foretrukne metode.

Behold det vanlige skjemaet aktivert slik at plattformadministratorer alltid kan logge inn, selv om en ekstern leverandør er feilkonfigurert.

## Autentiseringsprioritet

Når flere metoder er aktive, sjekker systemet legitimasjon i denne rekkefølgen:

1. LDAP (hvis `force_as_login_method` er satt)
2. OAuth2-leverandører (i den rekkefølgen de vises i `authentication.yaml`)
3. Intern Chamilo-database

## JWT-token for API-tilgang

Chamilo bruker JWT (JSON Web Tokens) for sitt REST API. Tokenlevetid og oppdateringsatferd konfigureres i `config/packages/lexik_jwt_authentication.yaml`. Dette er atskilt fra SSO-innloggingsflyten og gjelder kun for API-klienter.

## Feilsøking

### Innloggingsknappen vises ikke etter konfigurasjon

Hurtigbufferen må tømmes etter hver endring i `authentication.yaml`:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### Brukere kan ikke logge inn via SSO

* **Avvik i omdirigerings-URI** — URI-en som er registrert hos identitetsleverandøren din, må nøyaktig samsvare med `https://your-chamilo-url/connect/<provider>/check`.
* **Klokkeforskyvning** — SSO-token er tidsavhengige. Sørg for at serverklokken er synkronisert (NTP).
* **SSL-sertifikat** — Chamilo må stole på identitetsleverandørens sertifikat. Sjekk for problemer med selvsignerte sertifikater.
* **Logger** — Gå gjennom `var/log/` og identitetsleverandørens logger for spesifikke feilmeldinger.

### Brukere opprettes med feil rolle

Sjekk rolletilordningskonfigurasjonen for leverandøren. Nye brukere får som standard studentrollen med mindre en gruppe- eller attributtilordning oppgraderer dem.

### Brukere finnes hos leverandøren, men kan ikke få tilgang til Chamilo

* Hvis `allow_create_new_users` er false, må brukeren allerede ha en Chamilo-konto der e-post eller brukernavn samsvarer med leverandørens data.
* Sjekk at brukeren ikke er deaktivert i Chamilo.
* For Azure, se gjennom `existing_user_verification_order` for å forstå hvordan Chamilo matcher innkommende brukere mot eksisterende kontoer.