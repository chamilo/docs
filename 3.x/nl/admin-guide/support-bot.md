# Supportbot (assistent met beslissingsboom)

De **Supportbot** is een configureerbare ondersteuningsassistent die is opgebouwd uit een vaste beslissingsboom. Deze is geïmplementeerd in [PR #9224](https://github.com/chamilo/chamilo-lms/pull/9224) voor [issue #8754](https://github.com/chamilo/chamilo-lms/issues/8754). Het is **geen generatieve-AI-chatbot**: beheerders schrijven vragen en selecteerbare antwoorden die gebruikers begeleiden naar een uitleg, een pagina of een supportticket.

## Inschakelen

1. Schakel in **Beheer > Configuratie-instellingen > Tickets** de optie `ticket.ticket_support_bot_enabled` in (standaard uitgeschakeld).
2. Open **Beheer > Supportbot** en maak een beslissingsboom als **concept**. Geef een titel op en ten minste één startknooppunt met opties.
3. Definieer de vraag of informatie bij elk knooppunt en koppel de opties aan de volgende actie.
4. Publiceer een geldige boom. Alleen een gepubliceerde boom met een geldig startknooppunt en selecteerbare opties is beschikbaar voor gebruikers.

De engine selecteert de gepubliceerde boom voor de huidige toegangs-URL; de beschikbaarheid is daarom portaalgebonden. Een beheerder moet over `ROLE_ADMIN` beschikken om bomen te beheren.

## Een ondersteuningsstroom ontwerpen

Elke optie kan een van vier acties uitvoeren:

| Actie | Resultaat |
| --- | --- |
| **Naar een ander knooppunt gaan** | Het gesprek voortzetten bij een andere vraag in dezelfde boom |
| **Een koppeling openen** | Koppelen naar een Chamilo-pagina via een relatief pad op dezelfde site, bijvoorbeeld `/tickets` |
| **Gesprek beëindigen** | Het probleem als opgelost markeren en optioneel een afsluitend bericht weergeven |
| **Supportticket aanmaken** | Het gesprek escaleren naar het Tickets-systeem |

Selecteer voor ticketescalatie een **standaardticketproject** en een categorie die bij dat project hoort. Categorieën waarvoor een cursus vereist is, kunnen niet worden gebruikt voor deze escalatie via de supportbot. Het aangemaakte ticket bevat het transcript van de beslissingsboom van de gebruiker, zodat ondersteuningsmedewerkers de keuzes kunnen zien die tot de escalatie hebben geleid.

De editor valideert de boomstructuur vóór publicatie. De versies **Gepubliceerd** en **Gearchiveerd** zijn alleen-lezen; gebruik **Dupliceren** om een nieuw bewerkbaar concept te maken. Het publiceren van een vervanging archiveert de eerder gepubliceerde versie binnen hetzelfde bereik. Vanuit de lijst kunnen beheerders ook een boom importeren of exporteren en de gespreksgeschiedenis bekijken. Een gepubliceerde boom moet worden gearchiveerd voordat deze kan worden verwijderd, en een boom met gespreksgeschiedenis kan niet worden verwijderd.

## Voorbeelden importeren en gesprekken bekijken

Open **Beheer > Supportbot** en selecteer **Importeren**. Het importdialoogvenster biedt **JSON-voorbeeld downloaden** en **CSV-voorbeeld downloaden**. Download een voorbeeld, vervang de vragen en opties door uw eigen inhoud, selecteer vervolgens het bewerkte `.json`- of `.csv`-bestand en importeer het. Elke geïmporteerde boom begint als een **nieuw concept**; controleer het en publiceer het expliciet wanneer het gereed is.

De voorbeelden vereisen geen bestaand ticketproject. Als uw workflow tickets moet aanmaken, configureert u na het importeren het vereiste project en een geschikte categorie.

Gebruik in de boomlijst **Gesprekken bekijken** om gespreksregistraties van een bepaalde boom te inspecteren, ook bomen waarvan het aantal gesprekken nul is. Gespreksgeschiedenissen blijven beperkt tot de betreffende gebruiker en het betreffende portaal. Zie [PR #9419](https://github.com/chamilo/chamilo-lms/pull/9419).

## Hoe gebruikers er toegang toe krijgen

Wanneer de instelling is ingeschakeld en het portaal een geldige gepubliceerde boom heeft, zien aangemelde gebruikers een contact **Supportbot** in de vastgezette chat. Zij antwoorden door de aangeboden opties te kiezen. De bot kan het gesprek als opgelost afhandelen, een pagina op dezelfde site openen, of een ticket aanmaken en de koppeling ernaartoe tonen. Gebruikers kunnen een nieuw gesprek starten nadat een eerder gesprek is beëindigd.

Dit staat los van de **AI-tutor**, die antwoordt op open leervragen. De supportbot volgt uitsluitend de routes en opties die door beheerders zijn geconfigureerd.

## Probleemoplossing en beveiliging

* **Geen bot in de chat:** controleer de Tickets-instelling, of er een boom is gepubliceerd voor het huidige portaal en of het startknooppunt opties heeft.
* **Kan niet publiceren:** controleer ontbrekende knooppunten, onopgeloste bestemmingsknooppunten en ongeldige acties in het concept.
* **Ticket kan niet worden aangemaakt:** controleer het geselecteerde ticketproject en de categorie. Gebruik geen ticketcategorie waarvoor een cursus vereist is.
* **Oudere gesprekken ontbreken:** beheerders kunnen de gespreksgeschiedenis bekijken vanuit de bijbehorende boom; gesprekken zijn gekoppeld aan een gebruiker en een toegangs-URL.

Zie voor de gerelateerde instelling [Ticketsinstellingen](platform-settings/ticket-settings.md).