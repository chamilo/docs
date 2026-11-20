# Supportärenden

Verktyget **Tickets** är ett inbyggt helpdesksystem som låter användare skicka in supportförfrågningar och följa hur de hanteras. Beroende på hur din plattform är konfigurerad kan du använda det som **beställare** (skicka in ärenden för din egen eller dina deltagares räkning) eller som **supportagent** (besvara ärenden som tilldelats din kategori).

## Hur systemet är organiserat

Ärenden tillhör **projekt**, som i sin tur är indelade i **kategorier**. Varje kategori kan ha en eller flera supportagenter tilldelade. När ett ärende skickas in dirigeras det automatiskt till en tillgänglig agent i den valda kategorin.

Standardkategorier inkluderar:

| Kategori | Beskrivning |
|----------|-------------|
| Enrollment | Frågor och problem om kurs- eller sessionsregistrering |
| General information | Allmänna plattformsfrågor |
| Requests and paperwork | Administrativa förfrågningar och dokumentation |
| Academic Incidents | Problem relaterade till tentor, uppgifter eller arbeten |
| Virtual campus | Tekniska problem med plattformen |
| Online evaluation | Problem med en specifik kursbedömning (kräver att en kurs väljs) |

## Åtkomst till ärendeverktyget

Om din administratör har aktiverat ärendelänken visas en ärendeikon <img src="/.gitbook/assets/icons/mdi-ticket-account.svg" alt="Ärende" data-size="line"> i den övre navigeringslisten. Klicka på den för att gå direkt till formuläret för att skicka in ärenden.

Du kan också nå dina ärenden från huvudmenyn under **Support** eller **Tickets**, beroende på plattformens konfiguration.

## Skicka in ett ärende

Så här öppnar du en ny supportförfrågan:

1. Klicka på **New ticket** (eller ärendeikonen i den övre listen).
2. Välj den **kategori** som bäst stämmer med ditt problem.
3. Om kategorin kräver det (till exempel Online evaluation), välj den relevanta **kursen**.
4. Ange ett **ämne** — en kort sammanfattning av problemet.
5. Skriv ditt **meddelande** som beskriver problemet i detalj.
6. Bifoga valfritt filer (skärmbilder, dokument) som hjälper supportagenten att förstå problemet.
7. Klicka på **Submit**.

Ärendet tilldelas ett ID och dirigeras till en supportagent. Du får en avisering när agenten svarar.

## Följa dina ärenden

I ärendelistan kan du se alla ärenden du har skickat in och deras aktuella status:

| Status | Betydelse |
|--------|---------|
| New | Precis inskickat, ännu inte granskat |
| Pending | Granskas av en supportagent |
| Unconfirmed | Väntar på bekräftelse eller ytterligare information |
| Forwarded | Överfört till ett annat team eller en annan agent |
| Closed | Löst |

Klicka på valfritt ärende för att läsa hela konversationstråden och lägga till ett svar.

## Svara på ett ärende

När ett ärende är öppet utbyter du och supportagenten meddelanden i samma tråd. Så här lägger du till ett svar:

1. Öppna ärendet från din lista.
2. Scrolla till svarsfältet längst ned.
3. Skriv ditt svar och bifoga filer vid behov.
4. Klicka på **Send**.

Båda parter får aviseringar när ett nytt meddelande läggs till i tråden.

## Hantera ärenden som supportagent

Om din administratör har tilldelat dig en eller flera ärendekategorier ser du inkommande ärenden från deltagare eller kollegor i din kö.

Så här svarar du på ett tilldelat ärende:

1. Öppna din ärendelista — tilldelade ärenden visas tillsammans med ärenden du själv har skickat in.
2. Klicka på ett ärende för att läsa beställarens meddelande.
3. Skriv ett svar och klicka på **Send**. Ärendets status uppdateras automatiskt.
4. När problemet är löst, ändra status till **Closed**.

Du kan också ändra **prioritet** för ett ärende (Low, Normal, High) för att hjälpa till att triagera din kö.

> Åtkomst till ärendekategorier styrs av plattformsadministratören. Om du behöver läggas till som supportagent för en kategori, kontakta din administratör. Se administratörsguidens [Tickets Settings](../admin-guide/platform-settings/ticket-settings.md) för konfigurationsalternativ.