# Bedrijfsrapporten

Deze pagina behandelt zes gerelateerde dashboarditems die gericht zijn op organisatorische rapportage in plaats van op het dagelijkse onderwijs: kwartaalsamenvattingen, de werklast van docenten, cursusrapportage voor HR, de opvolging van cursisten door hun leidinggevenden, de weekplanning van algemene tutoren en bulkexport van documenten.

## Kwartaalrapport

**Analyse > Kwartaalrapport** toont een reeks samenvattingskaarten voor een bepaald kwartaal: geregistreerde en verbonden gebruikers, bestaande cursussen versus daadwerkelijk gebruikte cursussen, geleverde trainingsuren, gegenereerde certificaten, sessies naar duur en totaal schijfgebruik (schijfgebruik verschijnt alleen op het hoofdportaal in een multi-URL-configuratie). Elke kaart wordt onafhankelijk geladen, zodat de pagina responsief blijft, ook op een platform met een uitgebreide geschiedenis.

## Tijdsrapport docenten

**Analyse > Tijdsrapport docenten** laat u filteren op cursus, sessie, docent en datumbereik om te zien hoeveel tijd elke docent heeft besteed. Het is bedoeld om de onderwijswerklast en de uren bij te houden — filter tot één cursus of sessie, of laat het ongefilterd voor een platformbreed overzicht.

## Bedrijfsrapport

**Analyse > Bedrijfsrapport** is specifiek gebouwd voor HR-doelgroepen — het is het enige rapport in dit hoofdstuk dat ook beschikbaar is voor de rollen **HR-manager** en **Leidinggevende (Student Boss)**, niet alleen voor beheerders. Het vermeldt, per cursus en per gebruiker: e-mailadres, bestede uren, of een certificaat is gegenereerd, voltooide leerpaden en cursusvoortgang. Het kan worden beperkt tot één sessie of platformbreed worden gelaten.

## Opvolging door de leidinggevende van de cursist

**Rapportage > Beheerdersweergave > Opvolging door de leidinggevende van de cursist** toont één kolom per **Leidinggevende (Student Boss)** (leidinggevende) van het huidige portaal, met daaronder de cursisten die aan die leidinggevende zijn toegewezen. Klik op de naam van een cursist om het gedetailleerde cursistenrapport te openen. Het filter **Taal** beperkt de kolommen tot leidinggevenden die een bepaalde interfacetaal gebruiken.

Platformbeheerders kunnen een cursist rechtstreeks toewijzen vanuit de kolom van een leidinggevende: typ onder **Cursist toevoegen** ten minste drie letters van de naam, gebruikersnaam of het e-mailadres van de cursist, kies de cursist uit de suggesties en klik op **Toevoegen**. De leidinggevende ontvangt een intern bericht waarin de nieuwe cursist wordt aangekondigd.

> Een cursist heeft één enkele lijst van leidinggevenden, en het toevoegen vanuit dit rapport vervangt die lijst: een cursist die al door een andere leidinggevende wordt gevolgd, gaat over naar de leidinggevende aan wie u hem of haar toevoegt.

Alleen platformbeheerders krijgen de bedieningselementen **Cursist toevoegen**.

## Planning algemene tutor

**Rapportage > Beheerdersweergave > Planning algemene tutor** toont voor elke algemene tutor van een sessie wanneer die bezet is. Het is één tabel: één rij per tutor met het aantal sessies, en vervolgens één kolom per week (in de vorm `year-week`, bijv. `2026-14`). De weken die een sessie bestrijkt, worden gemarkeerd, en de naam van de sessie — een koppeling naar de sessie — verschijnt in de eerste week.

Gebruik de filters **Startdatum** en **Einddatum** om de weergegeven weken te kiezen; alleen sessies die in dat bereik starten, worden vermeld. Zonder datums bestrijkt de tabel elke vermelde sessie, van de vroegste start tot het laatste einde. Een sessie zonder einddatum bestrijkt alleen de eerste week. De tabel schuift zijwaarts wanneer het bereik veel weken omvat.

## Speciale exports

**Analyse > Speciale exports** is een hulpmiddel voor bulkexport, geen rapport: het maakt een zipbestand van cursusdocumenten voor het hele platform, of voor een geselecteerde subset van cursussen (inclusief hun sessiespecifieke documenten). Dit is een zware bewerking op een platform met veel cursusinhoud — voer deze bij voorkeur buiten de piekuren uit.