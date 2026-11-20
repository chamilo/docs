# Veilige export van configuratiediagnostiek

Chamilo 3.1 biedt een downloadbaar JSON-rapport voor het diagnosticeren van configuratieproblemen zonder opzettelijk vertrouwelijke instellingswaarden te exporteren. Het rapport is beperkt tot de **huidige toegangs-URL** en vereist een beheerdersrol.

## Het rapport downloaden

1. Open **Beheer > Instellingen** op het portaal dat u wilt inspecteren.
2. Selecteer **Configuratie downloaden voor foutopsporing**.
3. Sla het gegenereerde bestand `chamilo-configuration-dump.json` veilig op.
4. **Controleer het volledige bestand voordat u het naar iemand verzendt**, ook als het geschoond lijkt te zijn.

Het rapport bevat een exporttijdstempel, het bereik van de toegangs-URL, geschoonde platforminstellingen en de installatie- en actieve status van plugins, plus de geschoonde pluginconfiguratie. Het is een alleen-lezenexport; het downloaden ervan wijzigt de systeeminstellingen niet.

## Vertrouwelijkheid en grenzen van de toegangs-URL

Gevoelige waarden worden door de saneringslaag geredigeerd. Plugininstellingen worden standaard als vertrouwelijk behandeld, tenzij ze expliciet zijn geclassificeerd voor veilige export. Toch kunnen instellingsnamen, pluginnamen en andere diagnostische metagegevens implementatiedetails onthullen; verspreid het bestand daarom alleen onder vertrouwd ondersteuningspersoneel.

Bij installaties met meerdere URL's controleert de backend of de opgeloste toegangs-URL overeenkomt met de host van het verzoek, in plaats van stilzwijgend de configuratie van een ander portaal te exporteren. Bevestig het portaaladres voordat u downloadt.

## Probleemoplossing

Als de export niet beschikbaar is, controleer dan of het account beheerdersrechten heeft en of het opgevraagde portaal naar zijn eigen toegangs-URL verwijst. Bekijk de logboeken van de webserver en de toepassing zonder referenties of persoonsgegevens in ondersteuningstickets te kopiëren.

Zie [Systeemtools](system-tools.md) en [Beveiligingsinstellingen](../platform-settings/security-settings.md). Implementatie: [PR #9476](https://github.com/chamilo/chamilo-lms/pull/9476).