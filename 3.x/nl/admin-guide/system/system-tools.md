# Systeemhulpmiddelen

Deze pagina behandelt de onderhouds- en inspectiehulpmiddelen van het blok Systeem.

## Tijdelijke bestanden opschonen

**Systeem > Tijdelijke bestanden opschonen** toont hoeveel tijdelijke uploadbestanden er zijn en hoeveel ruimte ze innemen, en laat u ze daarna verwijderen — alles, of alleen bestanden ouder dan een configureerbare leeftijd. Een dry-run-modus laat u eerst bekijken wat er zou worden verwijderd. Dezelfde actie ruimt ook verouderde legacy-buildbestanden op en regenereert gecompileerde CSS-assets.

Deze actie slaat bewust de eigen cachedirectory's van Symfony over (`var/cache/dev`, `var/cache/prod`, `var/cache/test` en cache pools) — ze ruimt alleen losse bestanden op die elders onder `var/cache/` terecht zijn gekomen. Ze pikt **niet** een wijziging op die u in `.env` of onder `config/` hebt aangebracht (bijvoorbeeld het inschakelen van de API-documentatie — zie [De API-documentatie inschakelen](../installation/configuration.md#enable-the-api-documentation)). Daarvoor hebt u shelltoegang nodig om `php bin/console cache:clear` uit te voeren.

## Systeemupdate

**Systeem > Systeemupdate** voert de zelfupdate-workflow van Chamilo rechtstreeks vanuit het beheerderspaneel uit, als een reeks discrete, hervatbare stappen:

1. **Status** — Rapporteert de geïnstalleerde versie en waar de update-/staging-/back-updirectory's zich bevinden, samen met de gebruikte vertrouwde ondertekeningssleutel
2. **Controleren** — Zoekt op of er een nieuwere versie beschikbaar is bij de geconfigureerde updatebron
3. **Verifiëren** — Downloadt het updatepakket en de bijbehorende handtekening, en controleert deze tegen de checksum van het manifest en de vertrouwde publieke sleutel
4. **Preflight** — Valideert systeemvereisten en compatibiliteit voordat er iets wordt gewijzigd
5. **Stage** — Pakt het geverifieerde pakket uit in een geïsoleerde stagingdirectory; er verandert nog niets in de live-installatie
6. **Plan toepassen** — Bouwt een diff van bestanden die moeten worden toegevoegd, vervangen of verwijderd, op basis van het gestagede pakket
7. **Bestanden toepassen** — Kopieert bestanden naar hun plaats. Dit vereist expliciete bevestiging en maakt een back-up van elk overschreven bestand plus een lockbestand dat voorkomt dat een tweede update gelijktijdig draait
8. **Migratieveiligheid / controles na toepassen** — Valideert openstaande databasemigraties en de staat na installatie
9. **Post-apply uitvoeren** — Voert post-apply-consolecommando's uit (zoals databasemigraties), maar alleen als uw serverconfiguratie toestaat ze vanuit de UI uit te voeren, en alleen nadat u een expliciete bevestigingszin hebt getypt en hebt bevestigd dat er een back-up is gemaakt

Langlopende stappen rapporteren de voortgang, zodat de pagina veilig open kan blijven terwijl ze worden voltooid. De combinatie van handtekeningverificatie, staging vóór toepassen, back-ups vóór overschrijven, een concurrency-lock en getypte bevestigingen vóór databasewijzigingen is ontworpen om deze workflow veilig te maken zonder shelltoegang — maar een handmatige back-up vóór het starten blijft goede praktijk; zie [Back-ups](../maintenance/backups.md).

## Bestandsinfo

**Systeem > Bestandsinfo** somt elk geüpload resourcebestand op, doorzoekbaar op naam, met het fysieke pad, of het een wees is (niet gekoppeld aan een cursus of sessie), en hoeveel plaatsen ernaar verwijzen. Vanuit hier kunt u een weesbestand aan een resource koppelen, loskoppelen of verwijderen — nuttig om opslag op te sporen en op te schonen die niet langer tot een cursus behoort.

## Resources per type

**Systeem > Resources per type** laat u een resourcetype kiezen en toont, over alle cursussen en sessies, een geaggregeerd aantal en een lijst van items van dat type, wanneer ze zijn aangemaakt, en (waar van toepassing) welke gebruikers eraan zijn gekoppeld. Gebruik het om vragen te beantwoorden zoals "hoeveel forums bestaan er platformbreed" of "welke cursussen hebben de meeste documenten."

## Pictogrammenlijst

**Systeem > Pictogrammenlijst** is een doorbladerbare catalogus van de ingebouwde pictogrammenset van Chamilo, gegroepeerd per categorie. Het is vooral nuttig bij het ontwikkelen van plug-ins of thema's wanneer u de exacte naam van een pictogram wilt bevestigen, maar het is hier als algemene naslag beschikbaar.

## Alleen-ontwikkelingshulpmiddelen

Er kunnen nog twee items in dit blok verschijnen, maar alleen wanneer de server een directory `tests/` heeft — wat normaal alleen voorkomt op een ontwikkel- of QA-installatie, nooit in productie:

* **Data filler** genereert grote hoeveelheden nepgebruikers, cursussen en online-gebruikersrecords, voor load- of QA-testen.
* **E-mailtester** verstuurt een echte test-e-mail via de geconfigureerde mailer van het platform, om te bevestigen dat uw SMTP-/mailinstellingen daadwerkelijk werken, en toont recente verzendfouten indien aanwezig.

Als u deze twee koppelingen niet ziet, is dat verwacht — het betekent dat uw installatie geen directory `tests/` heeft, wat de normale, juiste staat is voor een productieplatform.