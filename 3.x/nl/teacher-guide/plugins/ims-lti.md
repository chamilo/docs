# IMS/LTI-client

IMS/LTI-client <img src="../../.gitbook/assets/icons/mdi-link-variant.svg" alt="IMS/LTI-client" data-size="line"> laat u een externe tool of contentaanbieder vanuit uw cursus starten via de LTI-standaard (versies 1.1 en 1.3) — bijvoorbeeld een interactief leerboek van een uitgever, een gespecialiseerde simulatietool of een ander platform dat LTI ondersteunt. Chamilo fungeert als het startende platform; de externe dienst is de "tool".

## De tool openen

Zodra deze is ingeschakeld, verschijnt in de **Instellingen** <img src="../../.gitbook/assets/icons/mdi-cog.svg" alt="Instellingen" data-size="line"> van uw cursus een knop **Externe tools configureren**. Van daaruit kunt u:

* **Een nieuwe externe tool toevoegen** — Zelf één registreren: naam, start-URL, LTI-versie en de inloggegevens die de externe dienst u heeft gegeven (client-ID/sleutels voor LTI 1.3, of een consumer key en secret voor LTI 1.1)
* **Een bestaande globale tool toevoegen** — Als uw beheerder al een platformbrede tool heeft geregistreerd, voegt u die aan uw cursus toe in plaats van zelf een verbinding aan te maken

Na toevoeging verschijnt de tool als een gewone tool/snelkoppeling op de startpagina van uw cursus.

## Wat u kunt configureren

Voor een tool die u zelf hebt geregistreerd: of deze in een iframe of een nieuw venster opent, of de naam, het e-mailadres en de foto van de deelnemer met de externe dienst worden gedeeld, aangepaste startparameters, en (voor LTI 1.3) ondersteuning voor Deep Linking. Als de tool de Assignment and Grades Service ondersteunt, kunt u ook een gekoppelde cijferboekkolom aanmaken zodat scores die terug worden gerapporteerd in het cijferboek van Chamilo terechtkomen.

Voor een tool die is toegevoegd vanuit een platformbrede "globale" definitie kunt u alleen deze presentatie- en privacyopties op cursusniveau aanpassen — de verbindingsgegevens zelf horen bij wie de basistool heeft geregistreerd (meestal uw beheerder).

## Tips

* **Vraag eerst de inloggegevens bij de toolaanbieder op** — U hebt de start-URL en ofwel de client-/sleutelgegevens van LTI 1.3 of een consumer key en secret van LTI 1.1 nodig voordat u een nieuwe tool kunt registreren
* **Wees bewust van wat u deelt** — Schakel het delen van naam, e-mailadres of foto van een deelnemer met een externe dienst alleen in als de tool dat daadwerkelijk nodig heeft
* **Vraag uw beheerder naar globale tools** — Als dezelfde externe tool in veel cursussen wordt gebruikt, voorkomt een platformbrede registratie dat elke docent afzonderlijk een eigen verbinding configureert