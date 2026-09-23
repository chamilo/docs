# Sessioner

Sessioner är en av Chamilos mest kraftfulla funktioner. De gör det möjligt att leverera samma kurser till olika grupper av deltagare vid olika tidpunkter, utan att duplicera kursinnehåll.

![Blocket Sessionhantering på administrationspanelen, med bland annat lista över utbildningssessioner, Lägg till en utbildningssession, sessionskategorier, import-/exportverktyg, karriärer och promotioner samt resurssekvensering](/.gitbook/assets/admin-sessions-block.png)

* **[Hantera sessioner](managing-sessions.md)** — Skapa, konfigurera och hantera utbildningssessioner
* **[Sessionskategorier](session-categories.md)** — Organisera sessioner i kategorier
* **[Karriärer och promotioner](careers-and-promotions.md)** — Definiera karriärvägar och arbetsflöden för promotioner
* **[Klasser](classes.md)** — Hantera deltagarklasser för massinskrivning

## Förstå sessioner

Sessioner är **valfria**. Du kan få din portal att fungera enbart med kurser, men vi rekommenderar **verkligen** att du överväger den extra komplexiteten med sessioner som ett sätt att spara administrationsarbete på lång sikt.

En **kurs** innehåller innehållet (dokument, övningar, lärstigar). En **session** tilldelar den kursen (eller flera kurser) till en specifik grupp av deltagare *under en specifik tidsperiod*.

Denna arkitektur innebär:

* Lärare skapar innehållet en gång i kursen
* Administratörer skapar sessioner för att leverera det innehållet till olika kohorter
* Varje session har sin egen inskrivning, spårningsdata och resultat
* Baskursens innehåll delas, men sessionhandledare kan anpassa vissa element

## När sessioner ska användas

Använd sessioner när:

* Du levererar samma utbildning flera gånger (t.ex. månatliga onboarding-sessioner)
* Du har kohortbaserade program (t.ex. terminsbaserade klasser)
* Du behöver separat spårning per grupp av deltagare
* Du vill att olika handledare ska hantera olika utgåvor av samma kurs