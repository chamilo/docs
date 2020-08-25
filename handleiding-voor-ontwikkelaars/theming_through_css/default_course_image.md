# Standaard cursusafbeelding

Net als bij de standaardvervanging van pictogrammen die in de vorige sectie is beschreven, kan de standaardafbeelding voor de cursus, die in de catalogus of in de rasterweergave van de cursussen wordt weergegeven, worden vervangen.

Om dit te doen, moet u de afbeeldingen main/img/session\_default.png \(400x224 in v1.11.10\) en main/img/session\_default\_small.png \(85x48 in v1.11.10\) nemen dimensies als uitgangspunt, en ontwikkel een nieuw beeld dat daarin past.

Dan, in plaats van de afbeeldingen rechtstreeks in main/img/ te vervangen \(wat de aanpassing tijdens elke latere Chamilo-upgrade zou verwijderen\), kun je die 2 nieuwe afbeeldingen eenvoudig in de hoofdmap van je aangepaste CSS plaatsen.

Als u bijvoorbeeld \(zoals voorgesteld in voorgaande secties\) uw CSS in een map met de naam "myCustomCSS/" hebt geplaatst, zouden de twee afbeeldingen respectievelijk in "myCustomCSS/session\_default.png" en "myCustomCSS/session\_default\_small.png" worden geplaatst.

