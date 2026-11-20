# Uitgifte en verificatie van Open Badges 2.0

Chamilo 3.1 kan **Open Badges 2.0**-credentials publiceren voor verworven vaardigheden, inclusief een badgeafbeelding met een ingebakken assertion in de PNG-metadata. Badgeverificatie gebruikt openbare badge-, assertion- en issuer-eindpunten.

## De issuer en vaardigheden configureren

1. Stel de **instellingsnaam** van het platform en een geldig **contact-e-mailadres van de beheerder** in; beide zijn vereist voor het issuerprofiel.
2. Configureer de vaardigheid met een titel, een beschrijving en badgecriteria.
3. Voeg waar passend een geldige PNG-badgeafbeelding toe. Chamilo kan ook de standaardbadgeafbeelding gebruiken als de vaardigheid geen aangepast bestand heeft.
4. Ken de vaardigheid toe aan de cursist of valideer de verwerving ervan via de normale vaardighedenworkflow.

Credentials zijn afhankelijk van de relatie met de verworven vaardigheid. Een assertion voor een ingetrokken of niet langer verworven vaardigheid wordt als ingetrokken gerapporteerd. Vaardigheids- en badgeresources zijn beperkt tot de juiste toegangs-URL.

## Openbare verificatiegegevens

Elke uitgifte heeft een gehoste assertion. De bijbehorende URL's worden afgeleid van de openbare root van de applicatie en omvatten:

- `main/skills/assertion.php?issue=<issue-id>` — JSON-assertion voor een specifieke vaardigheidsuitgifte.
- `main/skills/class.php?id=<skill-id>` — metagegevens van de badgeklasse, inclusief criteria en een verwijzing naar de issuer.
- `main/skills/issuer.php` — profiel van de uitgevende instelling.
- `main/skills/image.php?id=<skill-id>` — resource voor de badgeafbeelding.

De exact gegenereerde URL's zijn afhankelijk van het openbare basispad van de installatie. De assertion bevat een gezouten hash van het e-mailadres van de ontvanger in plaats van het e-mailadres in leesbare vorm te publiceren, en identificeert de issuer en de verworven vaardigheid. De badge-PNG kan de assertion bevatten in een `openbadges`-iTXt-chunk.

## Een uitgegeven badge valideren

Open de eindpunten voor de gehoste assertion, de badgeklasse en de issuer zonder aangemelde sessie. Ze moeten een consistent gekoppelde credential retourneren. Download de uitgegeven PNG via de ondersteunde exportprocedure van de vaardigheid en controleer of de ingebedde assertion overeenkomt met de gehoste weergave. Als de vaardigheid is ingetrokken, controleer dan of de verificatie de ingetrokken status weergeeft.

Een PNG met alleen visuele badge-illustraties bewijst **geen** geldige credential. Verwar de uitgifte van Open Badges 2.0 niet met niet-gerelateerde certificaatfunctionaliteit of functionaliteit voor ondertekende PDF's.

Zie [Vaardigheden beheren](managing-skills.md) en [Verificatie van ondertekende certificaten](../maintenance/signed-certificate-verification.md). Implementatie: [PR #9346](https://github.com/chamilo/chamilo-lms/pull/9346).