# Vaardigheden beheren

Deze pagina behandelt de drie dashboarditems waarmee de vaardighedencatalogus van het platform wordt opgebouwd: vaardigheden in bulk importeren, de vaardigheidsdefinities zelf beheren en elke vaardigheid aan een niveauschaal toewijzen.

## Vaardigheden importeren

**Vaardigheden > Vaardigheden importeren** laat u een vaardigheidshiërarchie in bulk aanmaken vanuit een CSV- of XML-bestand, in plaats van vaardigheden één voor één aan te maken. Elke rij heeft minimaal een `id`, een `parent_id` (om de boomstructuur op te bouwen) en een `title` nodig. Er is een voorbeeldsjabloon beschikbaar waarop u uw bestand kunt baseren.

## Vaardigheden beheren

**Vaardigheden > Vaardigheden beheren** is de belangrijkste vaardighedencatalogus: vaardigheden aanmaken, bewerken, in- en uitschakelen en verwijderen. Elke vaardigheid heeft een titel, een korte code, een beschrijving, een pictogram en een optionele criteriabeschrijving (wat een cursist moet doen om deze te behalen). Vaardigheden kunnen genest zijn — een vaardigheid kan onderliggende vaardigheden hebben — wat het [Vaardighedenwiel](skills-wheel.md) visualiseert.

### Verwerfbare vaardigheden versus structurele vaardigheden

Bij het aanmaken of bewerken van een vaardigheid gebruikt u **Verwerfbaar** om aan te geven of cursisten deze daadwerkelijk kunnen behalen. Dit is standaard ingeschakeld. Schakel het uit voor een bovenliggende of organisatorische categorie die alleen bestaat om andere vaardigheden te groeperen: zo'n vaardigheid blijft in de hiërarchie, maar kan niet worden toegekend via handmatige toewijzing of via de workflows van Oefening, Leerpad of Cijferboek. Bestaande vaardigheidsrelaties en hun geschiedenis blijven behouden. Dit gedrag is toegevoegd in [PR #9206](https://github.com/chamilo/chamilo-lms/pull/9206) (issue #8179).

## Handmatige vaardigheidstoewijzing

Wanneer handmatige vaardigheidstoewijzing beschikbaar is voor uw rol, opent u **Vaardigheid toewijzen** voor de gebruiker, selecteert u de **Vaardigheid**, kiest u een **Behaald niveau** wanneer niveaus worden gebruikt, en geeft u de vereiste **Argumentatie** op waarin u uitlegt waarom de vaardigheid wordt toegekend.

Wanneer **Vaardigheden toewijzen aan gebruiker: subvaardigheden automatisch laden** (`manual_assignment_subskill_autoload`) is ingeschakeld, toont de lijst **Vaardigheid** alleen de vaardigheden van het eerste niveau van de boom. Als u er een selecteert, verschijnt een tweede lijst met de subvaardigheden, daarna een derde, enzovoort. Stop op het niveau van de vaardigheid die u wilt toewijzen en laat de volgende lijst leeg; om één niveau omhoog te gaan, wist u de lijst. Een vaardigheid die niet **Verwerfbaar** is, kan worden geselecteerd om de subvaardigheden te bereiken, maar het formulier geeft aan dat deze niet kan worden verworven en laat u deze niet opslaan.

Voor een bestaande handmatige toewijzing die kan worden verwijderd, selecteert u de vaardigheid en klikt u op **Verwijderen**, en bevestigt u vervolgens de actie. Verwijderde toewijzingen tellen niet langer als verworven vaardigheden. Toewijzingen waarvan de bron handmatige verwijdering niet toestaat, bieden deze actie niet aan.

Vanuit de rapportagedetails van een cursist kan een bevoegde gebruiker de **vaardigheidsbadge/koppeling** volgen naar de toewijzingsdetails en vervolgens de bestaande verwijderactie gebruiken wanneer de vaardigheid handmatig is toegewezen. De toewijzingsgeschiedenis blijft beschikbaar na verwijdering en hertoewijzing; het verwijderen van een vaardigheid wist het auditspoor niet. Keer terug naar het cursistenrapport via de beschikbare navigatiekoppeling.

## Vaardigheidsniveaus beheren

**Vaardigheden > Vaardigheidsniveaus beheren** is een apart, kleiner scherm: het toont bestaande vaardigheden en laat u elk daarvan toewijzen aan een **niveauprofiel** — een benoemde, geordende set niveaus (bijvoorbeeld Brons/Zilver/Goud) waartegen de vaardigheid wordt gemeten. Kortom: gebruik **Vaardigheden beheren** om te definiëren wat een vaardigheid *is*, en **Vaardigheidsniveaus beheren** om te definiëren op welke schaal deze wordt gemeten.

### Niveaubeschrijvingen en beschikbare profielen

Afzonderlijke niveaus in een niveauprofiel hebben nu een veld **Beschrijving**, bewerkbaar via **Vaardigheidsniveaus beheren**, naast de niveautitel en de korte titel. De meegeleverde fixtures voor vaardigheidsniveaus definiëren voorbeeldschalen met beschrijvingen voor **CEFR**, het **Dreyfus-model**, de **taxonomie van Bloom** en **SFIA**. Op een bestaande installatie hangt het af van de fixture- en upgradestatus welke profielen aanwezig zijn; ga er niet van uit dat het toevoegen van het veld bestaande profielen automatisch aanmaakt of vervangt.

## Hoe vaardigheden worden toegekend

Een vaardigheid wordt aan een gebruiker toegekend (vastgelegd als een uitgegeven vaardigheid, met een datum) via een van de volgende paden:

* Automatisch, wanneer een cursist de drempel van een cijferboekcategorie haalt — geconfigureerd op de pagina [Vaardigheden en beoordelingen](skills-assessments.md)
* Automatisch, bij het voltooien van specifieke cursussen waaraan de vaardigheid is gekoppeld
* Handmatig, door een docent (als **Docenten kunnen vaardigheden toewijzen** is ingeschakeld) of een beheerder