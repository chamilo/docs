# Certificaten en vaardigheden

Chamilo stelt u in staat certificaten toe te kennen aan cursisten die aan specifieke prestatiecriteria voldoen, en de vaardigheden te valideren die aan die prestaties zijn gekoppeld.

## Hoe certificaten werken

Certificaten zijn gekoppeld aan de **Beoordelingen** (ook wel Gradebook genoemd). Wanneer het cijfer van een cursist de door u gedefinieerde minimale drempel haalt of overschrijdt, wordt een certificaat beschikbaar dat hij of zij kan downloaden.

De werkwijze is:

1. Stel de [Beoordelingen](../assessing-learners/gradebook.md) in met uw oefeningen, opdrachten en andere beoordeelde activiteiten
2. Definieer een **minimale certificeringsscore** (bijv. 70%)
3. Wanneer een cursist die score bereikt, kan hij of zij het certificaat downloaden (hetzij in de tool Beoordelingen zelf, hetzij vanuit een leerpad als u de laatste stap daarvoor hebt geconfigureerd). Als docent kunt u ook de actie **Certificaten genereren** in het cijferboek gebruiken om de PDF's in batch te maken voor alle in aanmerking komende cursisten.

## Certificaatsjablonen

Certificaten gebruiken sjablonen die door de platformbeheerder zijn gedefinieerd. Het sjabloon bevat doorgaans:

* De naam van de cursist
* De naam van de cursus
* De datum van afronding
* De behaalde score
* Een QR-code of URL voor online verificatie

## Geldigheid en verval van certificaten

Certificaten kunnen zo worden ingesteld dat ze na een bepaald aantal dagen vervallen. In de instellingen van [Beoordelingen](../assessing-learners/gradebook.md) voor de hoofdcategorie verschijnt, zodra **Certificaten genereren** is ingeschakeld, een veld **Geldigheid van het certificaat (dagen)**. Laat het op `0` (de standaardwaarde) staan voor certificaten die nooit vervallen, of stel een aantal dagen in zodat een certificaat zoveel dagen na uitgifte vervalt.

De vervaldatum van elk certificaat wordt automatisch berekend op basis van die instelling wanneer het wordt gegenereerd (of opnieuw gegenereerd) — u stelt die niet per certificaat in. De lijst **Certificaten** toont een kolom **Vervaldatum** voor elke cursist, met de tekst **Vervalt nooit** wanneer er geen geldigheidsperiode van toepassing is.

Als voor de categorie geen geldigheidsperiode is geconfigureerd, kunt u alsnog de vervaldatum van een individuele cursist handmatig instellen (of wijzigen): klik op de potloodknop **Vervaldatum bewerken** naast hun vermelding en kies een datum. Deze knop is alleen beschikbaar wanneer de categorie zelf geen geldigheidsperiode heeft — zodra een geldigheidsperiode is ingesteld, worden vervaldata automatisch beheerd en kunnen ze niet langer per certificaat worden bewerkt.

![De certificaatlijst met de kolom Vervaldatum voor drie cursisten](/.gitbook/assets/gradebook-certificates-expiry-dates.png)

### Cursisten herinneren aan een naderend of verstreken verval

Open de lijst **Certificaten** voor uw beoordeling en klik op de knop **Verlopende certificaten** <img src="/.gitbook/assets/icons/mdi-calendar-clock.svg" alt="Verlopende certificaten" data-size="line"> om te zien van welke cursisten de certificaten zijn verlopen of binnenkort verlopen. De pagina toont per cursist: de **Vervaldatum** van het certificaat, de **Status** (**Verlopen** of **Verloopt binnenkort**), en wanneer er voor het laatst een herinnering over is **Laatste herinnering verzonden** (of **Nooit**). Gebruik **Dagen vooruit** om te verbreden of te versmallen hoe ver in de toekomst “verloopt binnenkort” kijkt.

![De pagina Verlopende certificaten met één verlopen en één binnenkort verlopend certificaat](/.gitbook/assets/gradebook-certificate-expirations.png)

Om cursisten zelf te informeren:

1. Selecteer de cursisten die u wilt herinneren (of selecteer allen)
2. Klik op **Melding verzenden**
3. Controleer de voorvertoning van de e-mail die wordt verzonden — er worden aparte voorvertoningen getoond voor de formulering “verloopt binnenkort” en “verlopen”, afhankelijk van welke van uw geselecteerde cursisten in elk geval vallen
4. Bevestig door in het dialoogvenster opnieuw op **Melding verzenden** te klikken

![Het bevestigingsdialoogvenster Melding verzenden met een voorvertoning van de e-mailtekst voor verlopend en verlopen](/.gitbook/assets/gradebook-certificate-expiry-notification.png)

Elke cursist wordt in de eigen geconfigureerde taal op de hoogte gebracht, zowel per e-mail als via een intern Chamilo-bericht. Opnieuw verzenden voor hetzelfde certificaat en dezelfde vervaldatum is veilig — Chamilo houdt bij wat er al per certificaat is verzonden en zal een cursist niet lastigvallen met dubbele herinneringen, tenzij u expliciet opnieuw verzendt.

Beheerders kunnen dezezelfde herinneringen ook automatisch, op terugkerende basis, inplannen, zonder dat een docent ze handmatig hoeft te activeren — zie [Instellingen voor cronjobs](../../admin-guide/platform-settings/crons-settings.md#certificate-expiry-reminders).

## Vaardigheden

Vaardigheden vertegenwoordigen competenties die cursisten verwerven. In Chamilo:

* Vaardigheden kunnen worden gekoppeld aan prestaties in het cijferboek
* Wanneer een cursist een certificaat behaalt, worden eventuele gekoppelde vaardigheden automatisch gevalideerd
* Vaardigheden accumuleren op het profiel van de cursist en vormen zo een competentiedossier
* Vaardigheden kunnen hiërarchisch worden georganiseerd (bijv. “Data-analyse” onder “Onderzoeksmethoden”)
* Vaardigheden kunnen verder worden beoordeeld door peers (360°-evaluatie)

## Certificaat- en vaardigheidsstatus bekijken

Als docent kunt u zien:

* Welke cursisten certificaten in uw cursus hebben behaald
* Welke vaardigheden zijn gevalideerd
* De voortgang van cursisten richting de certificeringsdrempel
* Welke certificaten zijn verlopen of binnenkort verlopen, en of er al een herinnering voor is verzonden

Cursisten kunnen hun eigen certificaten en gevalideerde vaardigheden bekijken vanuit hun profiel, en kunnen het Skills Wheel openen om te controleren welke vaardigheden in hun organisatie gevraagd zijn.

## Tips

* **Stel duidelijke verwachtingen** — Vertel cursisten aan het begin van de cursus wat ze moeten bereiken om een certificaat te verdienen
* **Gebruik betekenisvolle vaardigheidsnamen** — Vaardigheden moeten beschrijven wat de cursist kan, niet alleen de cursusnaam
* **Combineer met portfolio's** — Moedig cursisten aan hun certificaten aan hun portfolio toe te voegen
* **Breid certificaten uit** — Vraag uw beheerder de plugin [Custom Certificate](../plugins/custom-certificate.md) in te schakelen om nog meer mogelijkheden voor certificaatsjablonen te ontsluiten
* **Stel een geldigheidsperiode in voor compliance-gedreven certificeringen** — Als een certificering periodiek moet worden vernieuwd (bijv. veiligheidstraining), stel **Certificate validity (days)** in zodat cursisten een herinnering krijgen voordat deze vervalt