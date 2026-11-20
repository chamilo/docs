# Wiki

Met de wiki-tool kunt u samen met uw cursisten webpagina's binnen de cursus maken en bewerken. Dit is nuttig voor groepsprojecten, gedeelde kennisbanken en collaboratieve schrijfoefeningen.

## Hoe de wiki werkt

Een wiki is een verzameling onderling gekoppelde webpagina's die iedereen met de juiste rechten kan bewerken. In Chamilo:

* Elke cursus heeft een eigen wiki
* Pagina's kunnen aan elkaar worden gekoppeld met wiki-achtige links
* Alle bewerkingen worden bijgehouden in een revisiegeschiedenis
* Eerdere versies kunnen worden vergeleken en hersteld

## Een wikipagina maken

1. Open de tool **Wiki** vanaf de startpagina van de cursus
2. Klik op **Een nieuwe pagina toevoegen**
3. Voer een **paginatitel** in
4. Schrijf de pagina-inhoud met de rich-text-editor
5. Opslaan

Om vanuit de editor naar een andere wikipagina te linken, maakt u een koppeling met de titel van de doelpagina.

## Pagina's bewerken

Iedereen met bewerkrechten kan een wikipagina wijzigen:

1. Open de pagina die u wilt bewerken
2. Klik op de knop **Bewerken** <img src="../../.gitbook/assets/icons/mdi-pencil.svg" alt="Bewerken" data-size="line">
3. Breng uw wijzigingen aan in de editor
4. Voeg optioneel een **Opmerkingen**-vermelding toe waarin u beschrijft wat u hebt gewijzigd
5. Opslaan

## Samenwerken met Etherpad (optioneel)

Wanneer een beheerder de Etherpad-integratie inschakelt, opent het bewerken van een **bestaande** wikipagina een gedeelde Etherpad-editor in plaats van het gebruikelijke rich-text-veld. Meerdere geautoriseerde medewerkers kunnen tegelijkertijd aan dezelfde pagina werken.

1. Open een wikipagina en selecteer **Bewerken**.
2. Werk samen in de ingesloten collaboratieve editor. Uw medewerkers moeten ook toestemming hebben om deze wikipagina te bewerken.
3. Selecteer **Opslaan** in Chamilo om een nieuwe wikirevisie te maken op basis van de huidige Etherpad-inhoud.
4. Gebruik de **Revisiegeschiedenis** van de wiki om eerdere opgeslagen versies te vergelijken of te herstellen.

Wijzigingen in Etherpad maken niet automatisch afzonderlijke Chamilo-revisies aan. **Opslaan** is de expliciete momentopnamestap. De beheerder moet Etherpad beschikbaar stellen op **dezelfde origin als Chamilo** (bijvoorbeeld via een reverse-proxypad) om beveiligde ingesloten sessies te ondersteunen. De gewone wiki-editor blijft beschikbaar wanneer de integratie is uitgeschakeld. Het aanmaken van een nieuwe pagina gebruikt het gewone formulier voordat de pagina een bijbehorend collaboratief pad heeft.

Een beheerder configureert `editor.etherpad_enabled`, `editor.etherpad_url` en `editor.etherpad_api_key` onder **Beheer > Configuratie-instellingen > Editor**. Zie [Editorinstellingen](../../admin-guide/platform-settings/editor-settings.md).

## Revisiegeschiedenis

Elke bewerking maakt een nieuwe revisie aan. U kunt:

* **Geschiedenis bekijken** — Een lijst van alle revisies met tijdstempels en auteurs bekijken
* **Versies vergelijken** — Zien wat er tussen twee revisies is gewijzigd
* **Een versie herstellen** — De pagina indien nodig terugzetten naar een eerdere revisie

## De wiki beheren

Als cursusdocent kunt u:

* **Alle pagina's bekijken** — Een lijst van alle wikipagina's in de cursus bekijken
* **Weespagina's zoeken** — Pagina's identificeren waarnaar vanuit geen enkele andere pagina wordt verwezen
* **Gewenste pagina's zoeken** — Pagina's bekijken waarnaar wordt verwezen maar die nog niet bestaan
* **Een pagina vergrendelen voor bewerking** — Alle bewerkingen op een pagina blokkeren terwijl u deze afrondt
* **Zichtbaarheid omschakelen** — Een pagina verbergen voor cursisten
* **Pagina's verwijderen** — Pagina's verwijderen die niet langer nodig zijn
* **Bijdragen volgen** — Statistieken per gebruiker bekijken: meest actieve redacteuren, meest bewerkte pagina's, meest bezochte pagina's
* **Exporteren** — Een wikipagina exporteren naar PDF, of deze naar de tool Documenten sturen

## Tips

* **Gebruik de wiki voor groepsprojecten** — Wijs elke groep een wikipagina toe om gezamenlijk hun oplevering op te bouwen
* **Maak een cursuskennisbank** — Bouw een referentiewiki met kernbegrippen en moedig cursisten aan om bij te dragen
* **Bekijk de bewerkingsgeschiedenis** — Met de revisiegeschiedenis kunt u individuele bijdragen in samenwerkingswerk beoordelen