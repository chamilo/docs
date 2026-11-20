# Supporttickets

De tool **Tickets** is een ingebouwd helpdesksysteem waarmee gebruikers ondersteuningsverzoeken kunnen indienen en de afhandeling ervan kunnen volgen. Afhankelijk van de configuratie van uw platform kunt u het gebruiken als **aanvrager** (tickets indienen namens uzelf of uw cursisten) of als **ondersteuningsmedewerker** (reageren op tickets die aan uw categorie zijn toegewezen).

## Hoe het systeem is georganiseerd

Tickets behoren tot **projecten**, die verder zijn onderverdeeld in **categorieën**. Aan elke categorie kunnen een of meer ondersteuningsmedewerkers worden toegewezen. Wanneer een ticket wordt ingediend, wordt het automatisch doorgestuurd naar een beschikbare medewerker in de geselecteerde categorie.

Standaardcategorieën zijn onder meer:

| Categorie | Beschrijving |
|----------|-------------|
| Inschrijving | Vragen en problemen over inschrijving voor een cursus of sessie |
| Algemene informatie | Algemene vragen over het platform |
| Verzoeken en administratie | Administratieve verzoeken en documentatie |
| Academische incidenten | Problemen met betrekking tot examens, opdrachten of taken |
| Virtuele campus | Technische problemen met het platform |
| Onlinebeoordeling | Problemen met een specifieke cursusbeoordeling (vereist het selecteren van een cursus) |

## De tickettool openen

Als uw beheerder de ticketkoppeling heeft ingeschakeld, verschijnt een ticketpictogram <img src="../.gitbook/assets/icons/mdi-ticket-account.svg" alt="Ticket" data-size="line"> in de bovenste navigatiebalk. Klik erop om rechtstreeks naar het formulier voor het indienen van tickets te gaan.

U kunt uw tickets ook openen via het hoofdmenu onder **Ondersteuning** of **Tickets**, afhankelijk van de configuratie van uw platform.

## Een ticket indienen

Een nieuw ondersteuningsverzoek openen:

1. Klik op **Nieuw ticket** (of op het ticketpictogram in de bovenste balk).
2. Selecteer de **categorie** die het beste bij uw probleem past.
3. Als de categorie dit vereist (bijvoorbeeld Onlinebeoordeling), selecteer dan de betreffende **cursus**.
4. Voer een **onderwerp** in — een korte samenvatting van het probleem.
5. Schrijf uw **bericht** waarin u het probleem gedetailleerd beschrijft.
6. Voeg optioneel bestanden toe (schermafbeeldingen, documenten) om de ondersteuningsmedewerker te helpen het probleem te begrijpen.
7. Klik op **Verzenden**.

Het ticket krijgt een ID en wordt doorgestuurd naar een ondersteuningsmedewerker. U ontvangt een melding wanneer de medewerker reageert.

## Uw tickets volgen

In de ticketlijst ziet u alle tickets die u hebt ingediend en hun huidige status:

| Status | Betekenis |
|--------|---------|
| Nieuw | Zojuist ingediend, nog niet beoordeeld |
| In behandeling | Wordt beoordeeld door een ondersteuningsmedewerker |
| Niet bevestigd | Wacht op bevestiging of aanvullende informatie |
| Doorgestuurd | Overgedragen aan een ander team of een andere medewerker |
| Gesloten | Opgelost |

Klik op een ticket om de volledige conversatie te lezen en een antwoord toe te voegen.

## De maker van het ticket identificeren

In de ticketdetails worden nu de **volledige naam** en de **gebruikersnaam** van de maker weergegeven (indien beschikbaar), samen met hun **Rollen**. De gebruikersnaam helpt personen met vergelijkbare namen te onderscheiden, terwijl de rollabels (bijvoorbeeld Cursist, Docent of Beheerder) context bieden bij een ondersteuningsverzoek. De naam van de maker kan naar het profiel linken wanneer een profiel-URL beschikbaar is.

Deze gegevens worden weergegeven in de ticketweergave; ze verlenen geen extra rechten en wijzigen het eigendom van het ticket niet. Zie [PR #9403](https://github.com/chamilo/chamilo-lms/pull/9403).

## Op een ticket reageren

Zodra een ticket is geopend, wisselen u en de ondersteuningsmedewerker berichten uit binnen dezelfde conversatie. Een antwoord toevoegen:

1. Open het ticket vanuit uw lijst.
2. Scrol naar het antwoordveld onderaan.
3. Schrijf uw reactie en voeg indien nodig bestanden toe.
4. Klik op **Verzenden**.

Beide partijen ontvangen meldingen wanneer een nieuw bericht aan de conversatie wordt toegevoegd.

## Tickets afhandelen als ondersteuningsmedewerker

Als uw beheerder u aan een of meer ticketcategorieën heeft toegewezen, ziet u binnenkomende tickets van cursisten of collega's in uw wachtrij.

Op een toegewezen ticket reageren:

1. Open uw ticketlijst — toegewezen tickets verschijnen naast tickets die u zelf hebt ingediend.
2. Klik op een ticket om het bericht van de aanvrager te lezen.
3. Schrijf een antwoord en klik op **Verzenden**. De ticketstatus wordt automatisch bijgewerkt.
4. Wanneer het probleem is opgelost, wijzigt u de status naar **Gesloten**.

U kunt ook de **prioriteit** van een ticket wijzigen (Laag, Normaal, Hoog) om uw wachtrij beter te prioriteren.

> Toegang tot ticketcategorieën wordt beheerd door de platformbeheerder. Als u als ondersteuningsmedewerker aan een categorie moet worden toegevoegd, neem dan contact op met uw beheerder. Zie [Ticketinstellingen](../admin-guide/platform-settings/ticket-settings.md) in de beheerdershandleiding voor configuratieopties.