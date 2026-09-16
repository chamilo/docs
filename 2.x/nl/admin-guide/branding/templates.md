# Sjablonen

Chamilo gebruikt sjablonen voor certificaten, documenten en e-mails. U kunt deze sjablonen aanpassen aan de huisstijl en vereisten van uw organisatie.

## Certificaatsjablonen

Certificaatsjablonen bepalen de lay-out en inhoud van certificaten die worden toegekend aan leerlingen die voldoen aan de drempels in het cijferboek.

### Een Certificaatsjabloon Aanpassen

Certificaatsjablonen maken gebruik van HTML en CSS met placeholder-variabelen:

| Variabele | Vervangen door |
|-----------|----------------|
| Naam student | De volledige naam van de leerling |
| Cursusnaam | De naam van de cursus |
| Datum | De datum waarop het certificaat is behaald |
| Score | De eindscore van de leerling |
| Barcode | Een placeholder voor een barcode (`((certificate_barcode))`) gebruikt voor verificatie |

### Een Sjabloon Uploaden

1. Navigeer naar het beheer van certificaatsjablonen
2. Upload of bewerk het HTML-sjabloon
3. Gebruik de placeholder-variabelen waar dynamische inhoud moet verschijnen
4. Opslaan

## Documentsjablonen

Docenten kunnen documentsjablonen gebruiken bij het maken van inhoud in de Documenten-tool. Sjablonen bieden een startlay-out voor veelvoorkomende documenttypen.

### Documentsjablonen Beheren

1. Navigeer naar sjabloonbeheer in het administratiepaneel
2. Voeg nieuwe sjablonen toe door HTML-bestanden te uploaden
3. Sjablonen worden beschikbaar voor docenten wanneer zij nieuwe documenten maken

## Tips

* **Voeg uw logo toe** — Voeg het logo van uw organisatie toe aan certificaatsjablonen voor een professionele uitstraling
* **Test met echte gegevens** — Bekijk een voorbeeld van certificaten met echte leerlinggegevens voordat u het sjabloon implementeert
* **Houd sjablonen eenvoudig** — Eenvoudige ontwerpen printen beter en zien er professioneel uit