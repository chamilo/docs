# Översikt över administratörsgränssnittet

Administrationspanelen är ditt kommandocenter för att hantera Chamilo-plattformen. Öppna den genom att klicka på **Administration** <img src="../../.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> i sidofältet.

## Administrationsöversikt

![Administrationsöversikten som visar funktionella block för Användare, Kurser, Sessioner och Inställningar](../../.gitbook/assets/admin-dashboard-overview.png)

Administrationsöversikten är organiserad i funktionella block. Varje block grupperar relaterade hanteringsverktyg:

### Användare

* **Användarlista** — Visa, sök, redigera och hantera alla användare på plattformen
* **Lägg till en användare** — Skapa enskilda användarkonton
* **Klasser** — Hantera användarklasser för massinskrivning i sessioner

Se kapitlet [Användare](../users/README.md) för mer information.

### Kurser

* **Kurslista** — Visa och hantera alla kurser på plattformen
* **Skapa en kurs** — Skapa en ny kurs
* **Kurskategorier** — Organisera kurser i kategorier för katalogen

Se kapitlet [Kurser](../courses/README.md) för mer information.

### Sessioner

* **Sessionslista** — Visa och hantera utbildningssessioner
* **Skapa en session** — Konfigurera en ny session med kurser och inskrivning
* **Sessionskategorier** — Organisera sessioner i kategorier
* **Karriärer och promotioner** — Hantera karriärvägar och promotionsarbetsflöden

Se kapitlet [Sessioner](../sessions/README.md) för mer information.

### Plattform

* **Konfigurationsinställningar**, **Språk**, **Portalnyheter**, **Global agenda**, **Sidor**, **Extrafält**, **E-postmallar**, **Kontaktformulärskategorier** och mer — se kapitlet [Plattform](../platform/README.md) för mer information. Länken "Konfigurationsinställningar" är ingången till det separata kapitlet [Plattformsinställningar](../platform-settings/README.md).

### Analys

* **Global statistik**, **Rapportkatalog**, **Lärandeanalys**, **Kvartalsrapport**, **Lärares tidsrapport**, **Företagsrapport**, **Särskilda exporter**, **Ärenden** — Plattformsstatistik och rapportering; se kapitlet [Analys](../analytics/README.md) för mer information

### Färdigheter

* **Färdighetshjul**, **Import av färdigheter**, **Hantera färdigheter**, **Hantera färdighetsnivåer**, **Färdighetsranking**, **Färdigheter och bedömningar** — Kompetensmärken kopplade till resultat i betygsboken; se kapitlet [Färdigheter](../skills/README.md) för mer information

### System

* **Rensa temporära filer**, **Systemstatus**, **Systemuppdatering**, **Färger**, **Filinformation**, **Resurser per typ**, **Lista ikoner** — Serverunderhåll, självuppdatering och varumärkesanpassning; se kapitlet [System](../system/README.md) för mer information

### Rum

* **Filialer**, **Rum**, **Sök rumstillgänglighet** — Fysiska platser och bokningsbara utbildningsrum; se kapitlet [Rum](../rooms/README.md) för mer information

### Säkerhet

* **Aktivitetsgranskning**, **Inloggningsförsök**, **Enkel IDS**, **Kontroll av lösenordsstyrka**, **Filintegritet** — Verktyg för säkerhetsövervakning och granskning; se kapitlet [Säkerhet](../security/README.md) för mer information

### Plugins

* Genvägar till installerade plugins som deklarerar en administratörsmenysida, plus allmän pluginhantering — se kapitlet [Plugins](../plugins/README.md) för mer information

### Hälsokontroll

* Live-kontroller med godkänt/underkänt (e-postinställningar, tilldelning av administratörs-URL, filbehörigheter) — se sidan [Hälsokontroll](../health-check.md) för mer information

### Övriga block

* **Chamilo.org**, **Versionskontroll**, **Professionellt stöd**, **Nyheter från Chamilo** — länkar och statuspaneler som hämtar innehåll från Chamilo-projektet; se [Övriga administratörsblock](../other-admin-blocks/README.md) för mer information

Varje avsnitt behandlas i detalj i motsvarande kapitel i den här guiden.

Autentiseringsmetoder som OAuth2, LDAP, CAS och andra externa autentiseringsleverantörer konfigureras inte i administrationsöversikten utan i `config/authentication.yaml`.