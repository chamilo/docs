# Grading Electronic

Grading Electronic <img src="../../.gitbook/assets/icons/mdi-export.svg" alt="Grading Electronic" data-size="line"> exporteert de cursisten die voor uw cursus zijn geslaagd, met hun cijferboekscore, naar het bestand dat een externe certificeringsinstantie importeert: een tekstbestand met een vast formaat of een spreadsheet met de deelnemerslijst.

## Het exportblok openen

Zodra dit is ingeschakeld, krijgt de werkbalk van het hulpmiddel **Beoordelingen** (cijferboek) van uw cursus een pictogram **Exporteren**. Klik erop om het blok **Grading Electronic** op dezelfde pagina te tonen; klik er nogmaals op om het te verbergen.

Het blok heeft drie velden:

* **Voorbeeld** — standaard aangevinkt. Zolang het is aangevinkt, wordt er niets opgeslagen: het blok toont alleen wat de export zou bevatten
* **Datumbereik** — de begin- en einddatum van de cursus. De begindatum komt in de kopregel van het tekstbestand, de einddatum is de datum waarop elke cursist is geslaagd
* **Cursus-ID** — de identificatie van de cursus bij de certificeringsinstantie. Deze is vooraf ingevuld met de waarde die voor de vorige export is gebruikt

## De export bekijken

Met **Voorbeeld** aangevinkt biedt het blok één knop **Voorbeeld**. Deze vermeldt elke cursist van de cursus (of van de sessie waarin u zich bevindt) met de score en een status **PASS** of **SKIP**, en toont de inhoud van het tekstbestand. Alleen cursisten die voldoen aan de slaagcriteria van het cijferboek worden gemarkeerd als **PASS**; de anderen worden uit de export weggelaten.

## Het bestand genereren

Schakel **Voorbeeld** uit om de knop **Voorbeeld** te vervangen door twee knoppen:

* **TXT genereren** — downloadt het tekstbestand met vast formaat: een kopregel met het aanbieder-ID, het cursus-ID en de begindatum, daarna één regel per geslaagde cursist
* **XLSX genereren** — downloadt de spreadsheet met de deelnemerslijst, met één rij per geslaagde cursist en de kolommen **FireTRAQ ID**, **First Name**, **Last Name**, **Score**, **Grade**, **Date Earned** en **Comment**

Beide knoppen doen naast het bestand hetzelfde: ze slaan het **Cursus-ID** op voor de volgende export en genereren, als het cijferboek certificaten genereert, het certificaat van elke geslaagde cursist.

## Wat er in de spreadsheet staat

* **FireTRAQ ID** — het ID van de cursist bij de certificeringsinstantie, gelezen uit het profielveld `fcdice_or_acadis_student_id`
* **Score** — de cijferboekscore als een geheel percentage (0 tot 100), ongeacht het totaalgewicht van het cijferboek
* **Grade** — altijd **Pass**, omdat alleen geslaagde cursisten worden geëxporteerd. De cel biedt nog steeds de keuzes **Pass**, **Fail** en **Incomplete** als u het bestand moet bewerken
* **Date Earned** — de einddatum van het datumbereik
* **Comment** — blijft leeg

## Tips

* **Controleer eerst de cursist-ID's** — Een cursist zonder ID in het profiel wordt toch geëxporteerd, met een leeg **FireTRAQ ID**. Gebruik het voorbeeld om hen op te sporen voordat u het bestand genereert
* **Het aanbieder-ID en de cursusuren** komen uit de extra velden van de cursus, ingesteld door uw beheerder toen de plug-in werd geïnstalleerd