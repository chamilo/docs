# Oversikt over administrasjonsgrensesnittet

Administrasjonspanelet er kommandosentralen din for å administrere Chamilo-plattformen. Åpne det ved å klikke **Administrasjon** <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> i sidefeltet.

## Administrasjonsdashbord

![Administrasjonsdashbordet som viser funksjonelle blokker for Brukere, Kurs, Sesjoner og Innstillinger](/.gitbook/assets/admin-dashboard-overview.png)

Administrasjonsdashbordet er organisert i funksjonelle blokker. Hver blokk samler relaterte administrasjonsverktøy:

### Brukere

* **Brukerliste** — Vis, søk, rediger og administrer alle brukere på plattformen
* **Legg til en bruker** — Opprett individuelle brukerkontoer
* **Klasser** — Administrer brukerklasser for masseinnmelding i sesjoner

Se kapitlet [Brukere](../users/README.md) for detaljer.

### Kurs

* **Kursliste** — Vis og administrer alle kurs på plattformen
* **Opprett et kurs** — Opprett et nytt kurs
* **Kurskategorier** — Organiser kurs i kategorier for katalogen

Se kapitlet [Kurs](../courses/README.md) for detaljer.

### Sesjoner

* **Sesjonsliste** — Vis og administrer opplæringssesjoner
* **Opprett en sesjon** — Sett opp en ny sesjon med kurs og innmelding
* **Sesjonskategorier** — Organiser sesjoner i kategorier
* **Karrierer og opprykk** — Administrer karriereveier og opprykksarbeidsflyter

Se kapitlet [Sesjoner](../sessions/README.md) for detaljer.

### Plattform

* **Konfigurasjonsinnstillinger**, **Språk**, **Portalnyheter**, **Global agenda**, **Sider**, **Ekstra felt**, **E-postmaler**, **Kategorier for kontaktskjema** og mer — se kapitlet [Plattform](../platform/README.md) for detaljer. Lenken «Konfigurasjonsinnstillinger» er inngangspunktet til det separate kapitlet [Plattforminnstillinger](../platform-settings/README.md).

### Analyse

* **Global statistikk**, **Rapportkatalog**, **Læringsanalyse**, **Kvartalsrapport**, **Rapport over lærertid**, **Bedriftsrapport**, **Spesialeksporter**, **Billetter** — Plattformstatistikk og rapportering; se kapitlet [Analyse](../analytics/README.md) for detaljer

### Ferdigheter

* **Ferdighetshjul**, **Import av ferdigheter**, **Administrer ferdigheter**, **Administrer ferdighetsnivåer**, **Ferdighetsrangering**, **Ferdigheter og vurderinger** — Kompetansebadges knyttet til resultater i karakterboken; se kapitlet [Ferdigheter](../skills/README.md) for detaljer

### System

* **Rydd midlertidige filer**, **Systemstatus**, **Systemoppdatering**, **Farger**, **Filinformasjon**, **Ressurser etter type**, **Listeikoner** — Servervedlikehold, selvoppdatering og merkevarebygging; se kapitlet [System](../system/README.md) for detaljer

### Rom

* **Avdelinger**, **Rom**, **Søk etter romtilgjengelighet** — Fysiske steder og bookbare opplæringsrom; se kapitlet [Rom](../rooms/README.md) for detaljer

### Sikkerhet

* **Aktivitetsrevisjon**, **Påloggingsforsøk**, **Enkel IDS**, **Kontroll av passordstyrke**, **Filintegritet** — Verktøy for sikkerhetsovervåking og revisjon; se kapitlet [Sikkerhet](../security/README.md) for detaljer

### Plugins

* Snarveier til installerte plugins som erklærer en administrasjonsmenyside, pluss generell plugin-administrasjon — se kapitlet [Plugins](../plugins/README.md) for detaljer

### Helsesjekk

* Live bestått/ikke bestått-sjekker (e-postinnstillinger, tildeling av administrasjons-URL, filrettigheter) — se siden [Helsesjekk](../health-check.md) for detaljer

### Andre blokker

* **Chamilo.org**, **Versjonskontroll**, **Profesjonell støtte**, **Nyheter fra Chamilo** — lenker og statuspaneler som henter innhold fra Chamilo-prosjektet; se [Andre administrasjonsblokker](../other-admin-blocks/README.md) for detaljer

Hver seksjon dekkes i detalj i det tilhørende kapitlet i denne veiledningen.

Autentiseringsmetoder som OAuth2, LDAP, CAS og andre eksterne autentiseringsleverandører konfigureres ikke i administrasjonsdashbordet, men i `config/authentication.yaml`.