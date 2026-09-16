# Vaardigheden beheren

Deze pagina behandelt de drie dashboardonderdelen waarmee de vaardighedencatalogus van het platform wordt opgebouwd: het in bulk importeren van vaardigheden, het beheren van de vaardigheidsdefinities zelf, en het toewijzen van elke vaardigheid aan een niveauschaal.

## Skills Import

**Skills > Skills import** laat u in bulk een vaardigheidshiërarchie aanmaken vanuit een CSV- of XML-bestand, in plaats van vaardigheden één voor één te creëren. Elke rij heeft minimaal een `id`, een `parent_id` (om de boomstructuur op te bouwen) en een `title` nodig. Er is een voorbeeldsjabloon beschikbaar waarop u uw bestand kunt baseren.

## Manage Skills

**Skills > Manage skills** is de hoofdvaardighedencatalogus: vaardigheden aanmaken, bewerken, in-/uitschakelen en verwijderen. Elke vaardigheid heeft een titel, een korte code, een beschrijving, een pictogram en een optionele criteriabeschrijving (wat een lerende moet doen om de vaardigheid te verdienen). Vaardigheden kunnen genest worden — een vaardigheid kan onderliggende vaardigheden hebben — wat de [Skills Wheel](skills-wheel.md) visualiseert.

## Manage Skills Levels

**Skills > Manage skills levels** is een afzonderlijk, kleiner scherm: het toont bestaande vaardigheden en laat u elke vaardigheid toewijzen aan een **level profile** — een benoemde, geordende reeks niveaus (bijvoorbeeld Brons/Zilver/Goud) waartegen de vaardigheid wordt gemeten. Kort samengevat: gebruik **Manage skills** om te definiëren wat een vaardigheid *is*, en **Manage skills levels** om te definiëren op welke schaal die wordt gemeten.

## Hoe vaardigheden worden toegekend

Een vaardigheid wordt aan een gebruiker toegekend (geregistreerd als een uitgegeven vaardigheid, met een datum) via een van de volgende paden:

* Automatisch, wanneer een lerende de drempel van een gradebookcategorie haalt — geconfigureerd op de pagina [Skills and Assessments](skills-assessments.md)
* Automatisch, bij het voltooien van specifieke cursussen waaraan de vaardigheid is gekoppeld
* Handmatig, door een docent (als **Teachers can assign skills** is ingeschakeld) of een beheerder