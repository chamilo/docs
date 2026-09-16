# Gezondheidscontrole

Gezondheidscontrole is een klein blok op het beheerdersdashboard dat een aantal live controles op uw installatie uitvoert en alles markeert dat aandacht nodig heeft — u hoeft niet door configuratiebestanden te spitten om veelvoorkomende verkeerde instellingen te vinden.

![Het blok Gezondheidscontrole op het beheerdersdashboard, met geslaagd/mislukt-status voor e-mailinstellingen, toewijzing van de beheerder-URL en controles van bestandsrechten](/.gitbook/assets/admin-health-check-block.png)

## Gezondheidscontrole openen

Op het beheerderspaneel verschijnt het blok **Gezondheidscontrole** naast de andere dashboardblokken — er is geen klik nodig, de resultaten worden direct getoond.

## De controles

* **E-mailinstellingen** — Controleert of een mailer-verbindingsreeks en een "from"-e-mail/naam zijn geconfigureerd. Zo niet, dan wordt er een koppeling naar de e-mailinstellingen gegeven om dit te herstellen.
* **Alle URL's hebben minstens één beheerder toegewezen** — Op een installatie met meerdere URL's wordt gecontroleerd of elke toegangs-URL minstens één beheerder heeft die deze kan beheren. Als dat bij één URL niet het geval is, wordt er een koppeling gegeven naar de pagina voor toewijzing van toegangs-URL/gebruiker.
* **`.env` is niet schrijfbaar** — `.env` bevat geheimen en mag na de installatie niet schrijfbaar zijn voor de webserver. Dit wordt als fout gemarkeerd als dat wel het geval is; er wordt een koppeling gegeven naar de Security Guide.
* **`config/` is niet schrijfbaar** — Dezelfde redenering als bij `.env`: deze map mag in normaal bedrijf niet schrijfbaar zijn via het web. Er wordt een koppeling gegeven naar de Security Guide.
* **`var/cache` is schrijfbaar** — De omgekeerde controle: Symfony moet naar de cachemap kunnen schrijven, dus dit wordt als fout gemarkeerd als die *niet* schrijfbaar is. Er wordt een koppeling gegeven naar de gids Performance Tuning / optimalisatie.
* **Installatiemap is niet aanwezig** — De map `public/main/install` is alleen nodig tijdens de installatie en moet daarna worden verwijderd. Dit wordt als waarschuwing (geen harde fout) gemarkeerd als de map nog bestaat, omdat het een lager risico is dan de twee schrijfbaarheidscontroles hierboven. Er wordt een koppeling gegeven naar de Security Guide.

## Wat u ermee moet doen

Elke controle verwijst rechtstreeks naar de plek waar u het onderliggende probleem kunt oplossen — een instellingenpagina of de relevante gids. Loop deze lijst direct na de installatie na, en daarna periodiek (bijvoorbeeld na een handmatige bestandsoverdracht of een wijziging van rechten), omdat een geslaagde controle vandaag niet garandeert dat dat zo blijft. Voor een bredere checklist voor het harden van een productieomgeving, naast deze zes controles, zie de [Security Guide](appendix/security-guide.md).