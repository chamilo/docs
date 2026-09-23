# Systeem

Het blok **Systeem** op het beheerdashboard groepeert onderhoudstools op serverniveau, de zelf-updateworkflow, hulpprogramma's voor inspectie van opslag/resources en platformbranding.

![Het blok Systeem op het beheerdashboard, met de items Tijdelijke bestanden opschonen, Systeemstatus, Systeemupdate, Kleuren, Bestandsinfo, Resources per type en Pictogrammenlijst](../../.gitbook/assets/admin-system-block.png)

## Het blok Systeem openen

Op het beheerpaneel verschijnt het blok **Systeem** naast de andere dashboardblokken. Klik op een van de koppelingen om de bijbehorende tool te openen.

## Wat zit er in het blok

* **[Systeemtools](system-tools.md)** — Tijdelijke bestanden opschonen, de zelf-updateworkflow uitvoeren, opgeslagen bestanden en resources inspecteren, en de ingebouwde pictogrammenset doorbladeren
* **Systeemstatus** — Behandeld in [Systeemstatus](../maintenance/system-status.md), onder Onderhoud
* **[Branding](branding/README.md)** — Kleurenthema's (de koppeling "Kleuren" in het blok opent dezelfde pagina Kleurenthema's), portalcustomisatie en sjablonen

Twee extra items — **Data filler** en **E-mail tester** — verschijnen alleen wanneer de server een map `tests/` bevat, wat een ontwikkel-/QA-omgeving is, geen productieomgeving. Ze verschijnen niet op een typische productie-installatie; zie [Systeemtools](system-tools.md#development-only-tools) voor wat ze doen wanneer ze aanwezig zijn.