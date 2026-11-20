# Systeemhulpmiddelen

Deze pagina behandelt de onderhouds- en inspectiehulpprogramma's van het blok Systeem.

## Tijdelijke bestanden opschonen

**Systeem > Tijdelijke bestanden opschonen** toont hoeveel tijdelijke uploadbestanden er bestaan en hoeveel ruimte ze innemen, en laat u ze vervolgens verwijderen — alles, of alleen bestanden ouder dan een configureerbare leeftijd. Een dry-run-modus laat u eerst bekijken wat er verwijderd zou worden. Dezelfde actie ruimt ook verouderde legacy-buildbestanden op en genereert gecompileerde CSS-assets opnieuw.

Deze actie slaat bewust de eigen cachemappen van Symfony over (`var/cache/dev`, `var/cache/prod`, `var/cache/test` en cachepools) — ze ruimt alleen losse bestanden op die elders onder `var/cache/` terecht zijn gekomen. Ze pikt een wijziging die u in `.env` of onder `config/` hebt aangebracht **niet** op (bijvoorbeeld het inschakelen van de API-documentatie — zie [De API-documentatie inschakelen](../installation/configuration.md#enable-the-api-documentation)). Daarvoor hebt u shelltoegang nodig om `php bin/console cache:clear` uit te voeren.

## Systeemupdate

**Systeem > Systeemupdate** voert de zelfupdateworkflow van Chamilo rechtstreeks vanuit het beheerpaneel uit, als een reeks afzonderlijke, hervatbare stappen:

1. **Status** — Rapporteert de geïnstalleerde versie en waar de update-, staging- en back-upmappen zich bevinden, samen met de gebruikte vertrouwde ondertekeningssleutel
2. **Controleren** — Zoekt op of er een nieuwere versie beschikbaar is bij de geconfigureerde updatebron
3. **Verifiëren** — Downloadt het updatepakket en de bijbehorende handtekening, en controleert deze tegen de checksum van het manifest en de vertrouwde publieke sleutel
4. **Preflight** — Valideert systeemvereisten en compatibiliteit voordat er iets wordt gewijzigd
5. **Stage** — Pakt het geverifieerde pakket uit in een geïsoleerde stagingmap; er verandert nog niets in de live-installatie
6. **Toepassingsplan** — Bouwt een diff van bestanden die moeten worden toegevoegd, vervangen of verwijderd, op basis van het gestagede pakket
7. **Bestanden toepassen** — Kopieert bestanden naar hun plaats. Dit vereist expliciete bevestiging en maakt een back-up van elk bestand dat wordt overschreven, plus een lockbestand dat voorkomt dat een tweede update gelijktijdig wordt uitgevoerd
8. **Migratieveiligheid / controles na toepassing** — Valideert openstaande databasemigraties en de status na installatie
9. **Na toepassing uitvoeren** — Voert consoleopdrachten na toepassing uit (zoals databasemigraties), maar alleen als uw serverconfiguratie toestaat dat ze vanuit de gebruikersinterface worden uitgevoerd, en alleen nadat u een expliciete bevestigingszin typt en bevestigt dat er een back-up is gemaakt

Langlopende stappen rapporteren de voortgang, zodat de pagina veilig open kan blijven terwijl ze worden voltooid. De combinatie van handtekeningverificatie, staging vóór toepassing, back-ups vóór overschrijven, een gelijktijdigheidsvergrendeling en getypte bevestigingen vóór databasewijzigingen is ontworpen om deze workflow veilig te maken zonder shelltoegang — maar een handmatige back-up vóór het starten blijft goede praktijk; zie [Back-ups](../maintenance/backups.md).

## Bestandsinfo

**Systeem > Bestandsinfo** toont elk geüpload bronbestand, doorzoekbaar op naam, met het fysieke pad, of het een weesbestand is (niet gekoppeld aan een cursus of sessie) en hoeveel plaatsen ernaar verwijzen. Vanuit hier kunt u een weesbestand aan een bron koppelen, loskoppelen of verwijderen — nuttig om opslag op te sporen en op te schonen die niet langer bij een cursus hoort.

Om te zien waar een bestand daadwerkelijk wordt gebruikt, opent u de details van **Bestandsinfo** en bekijkt u **Bestandslocaties**. Chamilo toont bekende document- of persoonlijke-bestandslocaties met hun paden en, waar van toepassing, koppelingen om die locaties te openen. De details tonen ook afzonderlijk het fysieke bestandspad. Een bestand kan meer dan één locatie hebben; een lege lijst betekent dat er geen document- of persoonlijke-bestandslocatie voor die bron is gevonden. Controleer de locaties voordat u een gedeeld bestand loskoppelt of permanent verwijdert. Zie [PR #9438](https://github.com/chamilo/chamilo-lms/pull/9438).

## Bronnen per type

**Systeem > Bronnen per type** laat u een brontype kiezen en toont, over alle cursussen en sessies heen, een geaggregeerd aantal en een lijst van items van dat type, wanneer ze zijn aangemaakt en (waar van toepassing) welke gebruikers eraan zijn gekoppeld. Gebruik het om vragen te beantwoorden zoals "hoeveel forums bestaan er platformbreed" of "welke cursussen hebben de meeste documenten."

## Pictogrammen weergeven

**Systeem > Pictogrammen weergeven** is een doorbladerbare catalogus van de ingebouwde pictogrammenset van Chamilo, gegroepeerd per categorie. Het is vooral nuttig bij het ontwikkelen van plug-ins of thema's wanneer u de exacte naam van een pictogram wilt bevestigen, maar het wordt hier als algemene referentie aangeboden.

## Hulpmiddelen uitsluitend voor ontwikkeling

Twee extra items kunnen in dit blok verschijnen, maar alleen wanneer op de server een map `tests/` aanwezig is — wat normaal gesproken alleen het geval is bij een ontwikkel- of QA-installatie, nooit in productie:

* **Gegevensvuller** genereert grote hoeveelheden fictieve gebruikers, cursussen en records van online gebruikers, voor belasting- of QA-tests.
* **E-mailtester** verstuurt een echte test-e-mail via de geconfigureerde mailer van het platform, om te bevestigen dat uw SMTP-/mailinstellingen daadwerkelijk werken, en toont recente verzendfouten, indien aanwezig.

Als u deze twee koppelingen niet ziet, is dat te verwachten — dit betekent dat uw installatie geen map `tests/` heeft, wat de normale, correcte toestand is voor een productieplatform.