# Installasjonsveiviser

Chamilo 3.0 inkluderer en nettbasert installasjonsveiviser som veileder deg gjennom den innledende oppsettet. Veiviseren kjører automatisk når du åpner plattformen for første gang.

## Før du starter

Sørg for at følgende forutsetninger er oppfylt:

1. Serveren din oppfyller alle [serverkrav](server-requirements.md).
2. Du har lastet ned en pakket (zip eller tar.gz) versjon av Chamilo.
3. Webserveren din er konfigurert til å betjene `public/`-katalogen som dokumentrot.
4. `.env`-filen din finnes og er tom (veiviseren vil veilede databaseoppsettet).

## Trinn 1: Installasjonsspråk

![Installasjonsveiviser trinn 1 — språkvalg](../../.gitbook/assets/install-step1-language.png)

Det første trinnet lar deg velge språket for installasjonsprosessen. Velg ønsket språk fra nedtrekkslisten.

Hvis Chamilo oppdager en eksisterende installasjon (for en oppgradering), vises migreringsstatusen, og det tilbys en oppgraderingsvei i stedet for en nyinstallasjon.

## Trinn 2: Kravkontroll

![Installasjonsveiviser trinn 2 — kravkontroll som viser PHP-versjon, utvidelser og katalogrettigheter](../../.gitbook/assets/install-step2-requirements.png)

Veiviseren sjekker servermiljøet ditt:

* **PHP-versjon** er 8.3, 8.4 eller 8.5
* **Påkrevde PHP-utvidelser** er installert (intl, gd, curl, zip, mbstring, xml, osv.)
* **Anbefalte PHP-innstillinger** — `date.timezone` er konfigurert, tilstrekkelige opplastings-/minnegrenser
* **Katalog- og filrettigheter** — `var/`, `config/` og `public/upload/` er skrivbare for webserveren

Hvis noen krav ikke er oppfylt, viser veiviseren advarsler eller feil. Løs dem før du fortsetter.

## Trinn 3: Lisens

![Installasjonsveiviser trinn 3 — lisensgodkjenning](../../.gitbook/assets/install-step3-license.png)

Dette trinnet viser GNU/GPLv3-lisensen. Du må merke av i avkrysningsboksen **«Jeg godtar»** for å fortsette.

Valgfritt kan du utvide delen **Kontaktinformasjon** for å oppgi opplysninger om organisasjonen din (navn, e-post, selskap, land). Dette er frivillig og hjelper Chamilo-fellesskapet å forstå hvem som bruker plattformen, men gjør det også mulig for oss å kontakte deg *svært sjelden* om arrangementer i nærheten av deg.

## Trinn 4: Databaseinnstillinger

![Installasjonsveiviser trinn 4 — konfigurasjon av databasetilkobling](../../.gitbook/assets/install-step4-database.png)

Oppgi tilkoblingsdetaljene for databasen:

| Felt | Beskrivelse |
|-------|-------------|
| **Databasevert** | Vertsnavn eller IP-adresse til databaseserveren (f.eks. `localhost` eller `127.0.0.1`) |
| **Databaseport** | Standard: 3306 for MySQL/MariaDB |
| **Databasenavn** | Navnet på databasen som skal brukes (kun alfanumeriske tegn og understreker) |
| **Databasebruker** | En databasebruker med fulle rettigheter på den angitte databasen |
| **Databasepassord** | Passordet for databasebrukeren |

Klikk **Sjekk databasetilkobling** for å teste. Veiviseren lar deg ikke fortsette før tilkoblingen er vellykket. Hvis databasen allerede finnes, vises en advarsel.

## Trinn 5: Konfigurasjonsinnstillinger

![Installasjonsveiviser trinn 5 — administratorkonto, portalinnstillinger og e-postkonfigurasjon](../../.gitbook/assets/install-step5-config.png)

Dette trinnet kombinerer opprettelse av administratorkonto, portalinnstillinger og e-postkonfigurasjon.

### Administratorkonto

| Felt | Beskrivelse |
|-------|-------------|
| **Brukernavn** | Administratorens brukernavn |
| **Passord** | Velg et sterkt passord — denne kontoen har full tilgang til plattformen |
| **Fornavn** | Administratorens fornavn |
| **Etternavn** | Administratorens etternavn |
| **E-post** | Brukes til systemvarsler og tilbakestilling av passord |
| **Telefon** | Valgfritt kontaktnummer |

Disse administratordetaljene vil også brukes av Chamilo til å fylle ut kontaktinformasjon for brukerstøtte, så husk å rekonfigurere dette i innstillingene etter at installasjonen er ferdig.

### Portalinnstillinger

| Felt | Beskrivelse |
|-------|-------------|
| **Språk** | Standard grensesnittspråk |
| **Portalnavn** | Navnet på plattformen din (f.eks. «Min organisasjons LMS») |
| **Selskapets kortnavn** | Organisasjonens forkortede navn |
| **Selskapets URL** | Organisasjonens nettsted |
| **Krypteringsmetode** | Algoritme for passordhashing — **bcrypt** anbefales |
| **Tillat selvregistrering** | Ja / Nei / Etter godkjenning |
| **Tillat selvregistrering som kursholder** | Ja / Nei |

### E-postkonfigurasjon

E-postinnstillingene lar deg konfigurere e-posttransport (SMTP, Amazon SES, Mailjet, osv.) og teste e-postlevering. Se [E-postkonfigurasjon](email-configuration.md) for detaljer.

Alle disse innstillingene kan endres senere fra administrasjonspanelet.

## Trinn 6: Siste sjekk før installasjon

![Installasjonsveiviser trinn 6 — gjennomgang av alle innstillinger før installasjon](../../.gitbook/assets/install-step6-review.png)

Dette trinnet viser et sammendrag av alt du har angitt, til gjennomgang:

* Administratorlegitimasjon (passordet er skjult som standard — klikk på øyeikonet for å vise det)
* Portalinnstillinger
* Databaseforbindelsesdetaljer

Gå nøye gjennom opplysningene, og klikk deretter **Installer Chamilo** for å kjøre installasjonen. Veiviseren oppretter alle databasetabeller, fyller inn startedata og konfigurerer plattformen.

## Trinn 7: Installasjon fullført

![Installasjonsveiviser trinn 7 — fullføring med sikkerhetsråd og portallenke](../../.gitbook/assets/install-step7-complete.png)

Når installasjonen er fullført, viser veiviseren:

* **Råd for å komme i gang** — Foreslår at du oppretter ditt første kurs for å utforske plattformen (som administrator må du gjøre dette fra administrasjonspanelet)
* **Sikkerhetsanbefalinger**:
  * Gjør katalogen `config/` skrivebeskyttet (`chmod 0555`)
  * Slett katalogen `public/main/install/`
* En **lenke til portalen din** for å logge inn med administratorlegitimasjonen du nettopp opprettet

## Etter installasjon

Etter at veiviseren er fullført:

* **Fjern eller begrens tilgangen til installasjonsprogrammet** -- Veiviseren skal ikke være tilgjengelig etter installasjon. Chamilo låser den vanligvis automatisk, men kontroller at et nytt besøk til installasjons-URL-en omdirigerer til innloggingssiden.
* **Konfigurer e-postlevering** -- Se [E-postkonfigurasjon](email-configuration.md).
* **Sett opp sikkerhetskopier** -- Før du legger til innhold, konfigurer automatiserte sikkerhetskopier av database og filer (Chamilo tilbyr ingen løsning for dette, men å kopiere mappen var/ og databasen er de to viktigste elementene).
* **Gå gjennom sikkerhetsinnstillinger** -- Se [Sikkerhetsinnstillinger](../platform-settings/security-settings.md).

## Feilsøking

| Problem | Løsning |
|---------|----------|
| Blank side på installasjons-URL | Sjekk PHP-feilloggene. Endre midlertidig til `APP_ENV=dev` i .env for å se feil i nettleseren. |
| Databaseforbindelsen mislykkes | Kontroller legitimasjonen, bekreft at databasen finnes, og sjekk at databaseserveren tillater tilkoblinger fra webserververten. |
| Feil om manglende tillatelse | Sørg for at `var/` er skrivbar for webserverbrukeren. |
| Ressurser lastes ikke (ingen CSS/JS) | Kjør `yarn install && yarn build` for å kompilere frontend-ressurser. |