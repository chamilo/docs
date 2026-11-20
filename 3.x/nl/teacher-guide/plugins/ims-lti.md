# IMS/LTI-client

IMS/LTI-client <img src="../../.gitbook/assets/icons/mdi-link-variant.svg" alt="IMS/LTI-client" data-size="line"> laat u een externe tool of contentprovider starten vanuit uw cursus via de LTI-standaard (versies 1.1 en 1.3) — bijvoorbeeld een interactief leerboek van een uitgever, een gespecialiseerde simulatietool of een ander platform dat LTI ondersteunt. Chamilo fungeert als het startplatform; de externe dienst is de "tool".

## De tool openen

Zodra deze is ingeschakeld, verschijnt een knop **Externe tools configureren** in de **Instellingen** <img src="../../.gitbook/assets/icons/mdi-cog.svg" alt="Instellingen" data-size="line"> van uw cursus. Van daaruit kunt u:

* **Een nieuwe externe tool toevoegen** — Registreer er zelf een: naam, start-URL, LTI-versie en de referenties die de externe dienst u heeft gegeven (client-ID/sleutels voor LTI 1.3, of een consumer key en secret voor LTI 1.1)
* **Een bestaande globale tool toevoegen** — Als uw beheerder al een platformbrede tool heeft geregistreerd, voegt u die toe aan uw cursus in plaats van zelf een verbinding te maken

Zodra de tool is toegevoegd, verschijnt deze als een gewone tool/snelkoppeling op de startpagina van uw cursus.

## Wat u kunt configureren

Voor een tool die u zelf hebt geregistreerd: of deze in een iframe of een nieuw venster wordt geopend, of de naam, het e-mailadres en de foto van de cursist worden gedeeld met de externe dienst, aangepaste startparameters en (voor LTI 1.3) ondersteuning voor Deep Linking. Als de tool de Assignment and Grades Service ondersteunt, kunt u ook een gekoppelde kolom in het cijferboek maken, zodat scores die de tool terugstuurt in uw Chamilo-cijferboek terechtkomen.

Voor een tool die is toegevoegd vanuit een platformbrede "globale" definitie, kunt u alleen deze presentatie- en privacyopties op cursusniveau aanpassen — de verbindingsreferenties zelf behoren toe aan degene die de basistool heeft geregistreerd (meestal uw beheerder).

## Tips

* **Vraag eerst referenties op bij de toolprovider** — U hebt de start-URL en ofwel de client-/sleutelgegevens voor LTI 1.3 of een consumer key en secret voor LTI 1.1 nodig voordat u een nieuwe tool kunt registreren
* **Wees bewust van wat u deelt** — Schakel het delen van de naam, het e-mailadres of de foto van een cursist met een externe dienst alleen in als de tool dit daadwerkelijk nodig heeft
* **Vraag uw beheerder naar globale tools** — Als dezelfde externe tool in veel cursussen wordt gebruikt, voorkomt een platformbrede registratie dat elke docent afzonderlijk een eigen verbinding moet configureren