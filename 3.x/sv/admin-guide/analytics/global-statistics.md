# Global statistik

Global statistik är plattformens statistiknav — en meny med plattformsomfattande rapporter grupperade efter ämne, snarare än en enda rapport.

## Åtkomst till Global statistik

Från administrationspanelen klickar du på **Analys > Global statistik**.

## Hur det är organiserat

När sidan öppnas utan att någon rapport är vald visas en meny med tillgänglig statistik, grupperad i Kurser, Användare, System, Socialt och Session. När du väljer en menypost läses den specifika rapporten in på samma sida. Varje rapport är en plattformsomfattande vy endast för administratörer — det finns ingen avgränsning till kurs eller session här; för det, se [Learning Analytics](learning-analytics.md).

## Kurser

* **Kurser** — Totalt antal kurser, uppdelat efter kurskategori
* **Verktygsåtkomst** — Plattformsomfattande antal händelser för verktygsåtkomst (meddelanden, dokument, forum, quiz, chatt och så vidare)
* **Verktygsbaserat resursantal** — Välj ett eller flera verktyg och se varje kurs/session som använder dem, med ett resursantal och datum för senaste uppdatering, sorterat efter användning
* **Senaste åtkomst** — Kurser med datum för senaste åtkomst, begränsat till dem som besökts inom ett konfigurerbart antal dagar (60 som standard)
* **Antal kurser per språk** — Kurser grupperade efter sitt gränssnittsspråk
* **Kursanvändning** — Besöksantal per kurs över rullande perioder (idag, denna vecka, denna månad, 6 månader, 1 år, 2 år, hela tiden), uppdelat mellan besök inom och utanför sessioner

## Användare

* **Antal användare** — Totalt antal utbildare och deltagare på hela plattformen, och samma uppdelning per kurskategori
* **Inloggningar** — Antal inloggningar för idag, de senaste 7 dagarna, de senaste 31 dagarna och hela tiden, både för totala inloggningar och distinkta användare; kan filtreras till en minsta sessionslängd
* **Inloggningar (månad)** — Samma inloggningsdata summerade per kalendermånad genom hela historiken
* **Inloggningar (dag)** — Inloggningstotaler per veckodag, plus en separat uppdelning endast för de senaste 7 dagarna
* **Inloggningar (timme)** — Inloggningstotaler per timme på dygnet, plus en separat uppdelning endast för de senaste 24 timmarna
* **Antal användare (bild)** — Hur många aktiva konton som har laddat upp en profilbild jämfört med hur många som inte har det
* **Inloggningar efter datum** — Varje användares totala anslutningstid (inloggning till utloggning) över ett valt datumintervall, exporterbart till XLS
* **Inte inloggad på ett tag** — Hur många användare som inte har loggat in inom efterföljande fönster (idag, 7 dagar, 31 dagar, 6 månader), och hur många som aldrig har loggat in alls
* **Zombies** — Konton vars senaste inloggning är på eller före ett brytdatum du väljer (det finns ingen fast tröskel — du väljer datumet varje gång), valfritt begränsat till aktiva konton, med knappar för att aktivera, inaktivera eller ta bort de listade kontona direkt
* **Användarstatistik** — Användare registrerade inom ett valt datumintervall, med fullständiga profiluppgifter och sammanfattande diagram, exporterbart till XLS
* **Användare online** — Live-antal av användare som för närvarande är online och användare som för närvarande tar ett quiz, var och en visad över fyra tidsfönster (3, 5, 30 och 120 minuter)
* **Nya användarregistreringar** — Nya registreringar över ett valt datumintervall (dagligen om intervallet är en månad eller kortare, månadsvis med nedbrytning annars), plus en uppdelning av vem som skapade varje konto
* **Kurs-/sessionsprenumerationer per dag** — Prenumerationer kontra avprenumerationer per dag över ett valt datumintervall
* **Dubblettanvändare** — Hittar konton som delar samma namn, e-post eller ett valt profilfältsvärde; låter dig inaktivera, aktivera eller förena (slå ihop) dubbletter — sammanslagning tar permanent bort de konton som slås in i det du behåller

## System

* **Portalstatistik för användarsessioner** — Ett rutnät med användarantal uppdelat efter åtkomst-URL (på portaler med flera URL:er), session och kurs, för ett valt datumintervall, exporterbart till XLS

Posten **Kvartalsrapport** som också visas under System behandlas separat i [Corporate Reports](corporate-reports.md).

## Socialt

* **Antal mottagna meddelanden** — Interna meddelanden mottagna, per användare
* **Antal skickade meddelanden** — Interna meddelanden skickade, per användare
* **Antal kontakter** — Kontakter i det sociala nätverket per användare (exklusive HR-/handledartyp-relationer)

## Session

* **Sessioner efter datum** — Sessioner som börjar eller slutar inom ett valt datumintervall (valfritt filtrerat efter status): antal, genomsnittligt antal sessioner per vecka, genomsnittligt antal användare per session, genomsnittligt antal sessioner per handledare, uppdelningar efter kategori/språk/status, och en tabell med sessionsantal per kurs