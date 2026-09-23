# Oversigt over administrationsgrænsefladen

Administrationspanelet er dit kommandocenter til at administrere Chamilo-platformen. Åbn det ved at klikke på **Administration** <img src="../../.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> i sidepanelet.

## Administrationsdashboard

![Administrationsdashboardet med funktionelle blokke til Brugere, Kurser, Sessioner og Indstillinger](../../.gitbook/assets/admin-dashboard-overview.png)

Administrationsdashboardet er inddelt i funktionelle blokke. Hver blok samler relaterede administrationsværktøjer:

### Brugere

* **Brugerliste** — Se, søg, rediger og administrer alle brugere på platformen
* **Tilføj en bruger** — Opret individuelle brugerkonti
* **Klasser** — Administrer brugerklasser til masseindskrivning i sessioner

Se kapitlet [Brugere](../users/README.md) for detaljer.

### Kurser

* **Kursusliste** — Se og administrer alle kurser på platformen
* **Opret et kursus** — Opret et nyt kursus
* **Kursuskategorier** — Organiser kurser i kategorier til kataloget

Se kapitlet [Kurser](../courses/README.md) for detaljer.

### Sessioner

* **Sessionsliste** — Se og administrer træningssessioner
* **Opret en session** — Opret en ny session med kurser og indskrivning
* **Sessionskategorier** — Organiser sessioner i kategorier
* **Karrierer og forfremmelser** — Administrer karriereforløb og forfremmelsesarbejdsgange

Se kapitlet [Sessioner](../sessions/README.md) for detaljer.

### Platform

* **Konfigurationsindstillinger**, **Sprog**, **Portalnyheder**, **Global kalender**, **Sider**, **Ekstra felter**, **Mailskabeloner**, **Kontaktformular-kategorier** og mere — se kapitlet [Platform](../platform/README.md) for detaljer. Linket "Konfigurationsindstillinger" er indgangen til det separate kapitel [Platformindstillinger](../platform-settings/README.md).

### Analytics

* **Globale statistikker**, **Rapportkatalog**, **Læringsanalytics**, **Kvartalsrapport**, **Rapport over underviseres tid**, **Virksomhedsrapport**, **Særlige eksporter**, **Tickets** — Platformstatistik og rapportering; se kapitlet [Analytics](../analytics/README.md) for detaljer

### Skills

* **Kompetencehjul**, **Import af kompetencer**, **Administrer kompetencer**, **Administrer kompetenceniveauer**, **Kompetencerangering**, **Kompetencer og vurderinger** — Kompetencebadges knyttet til resultater i karakterbogen; se kapitlet [Skills](../skills/README.md) for detaljer

### System

* **Ryd midlertidige filer**, **Systemstatus**, **Systemopdatering**, **Farver**, **Filinfo**, **Ressourcer efter type**, **Vis ikoner** — Servervedligeholdelse, selvopdatering og branding; se kapitlet [System](../system/README.md) for detaljer

### Rooms

* **Afdelinger**, **Lokaler**, **Søgning efter ledighed i lokaler** — Fysiske lokaliteter og bookbare træningslokaler; se kapitlet [Rooms](../rooms/README.md) for detaljer

### Security

* **Aktivitetsrevision**, **Loginforsøg**, **Simple IDS**, **Kontrol af adgangskodestyrke**, **Filintegritet** — Værktøjer til sikkerhedsovervågning og revision; se kapitlet [Security](../security/README.md) for detaljer

### Plugins

* Genveje til installerede plugins, der erklærer en administrationsmenueside, plus generel plugin-administration — se kapitlet [Plugins](../plugins/README.md) for detaljer

### Health Check

* Live bestået/ikke-bestået-tjek (mailindstillinger, tildeling af admin-URL, filrettigheder) — se siden [Health Check](../health-check.md) for detaljer

### Andre blokke

* **Chamilo.org**, **Versionskontrol**, **Professionel support**, **Nyheder fra Chamilo** — links og statuspaneler, der henter indhold fra Chamilo-projektet; se [Andre administrationsblokke](../other-admin-blocks/README.md) for detaljer

Hvert afsnit er dækket i detaljer i det tilsvarende kapitel i denne vejledning.

Godkendelsesmetoder som OAuth2, LDAP, CAS og andre eksterne godkendelsesudbydere konfigureres ikke i administrationsdashboardet, men i `config/authentication.yaml`.