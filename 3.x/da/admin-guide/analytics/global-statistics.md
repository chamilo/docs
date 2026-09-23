# Globale statistikker

Globale statistikker er platformens statistikhub — en menu med platformdækkende rapporter grupperet efter emne, snarere end en enkelt rapport.

## Adgang til globale statistikker

Fra administrationspanelet skal du klikke på **Analytics > Global statistics**.

## Sådan er det organiseret

Når siden åbnes uden en valgt rapport, vises en menu over tilgængelige statistikker, grupperet i Courses, Users, System, Social og Session. Når du vælger et menupunkt, indlæses den pågældende rapport på samme side. Hver rapport er en platformdækkende visning kun for administratorer — der er ingen afgrænsning til kursus eller session her; se [Learning Analytics](learning-analytics.md) for det.

## Courses

* **Courses** — Samlet antal kurser, opdelt efter kursuskategori
* **Tools access** — Platformdækkende optælling af adgangshændelser til værktøjer (meddelelser, dokumenter, fora, quizzer, chat osv.)
* **Tool-based resource count** — Vælg ét eller flere værktøjer, og se hvert kursus/session der bruger dem, med et ressourceantal og sidst opdateret-dato, sorteret efter brug
* **Latest access** — Kurser med dato for seneste adgang, begrænset til dem der er besøgt inden for et konfigurerbart antal dage (60 som standard)
* **Number of courses by language** — Kurser grupperet efter deres grænsefladesprog
* **Courses usage** — Besøgstal pr. kursus på tværs af rullende perioder (i dag, denne uge, denne måned, 6 måneder, 1 år, 2 år, hele tiden), opdelt mellem besøg inden for og uden for sessioner

## Users

* **Number of users** — Samlet antal undervisere og kursister på hele platformen, og samme opdeling pr. kursuskategori
* **Logins** — Loginantal for i dag, de seneste 7 dage, de seneste 31 dage og hele tiden, både for samlede logins og distinkte brugere; kan filtreres til en minimumssessionsvarighed
* **Logins (Month)** — De samme logindata summeret pr. kalendermåned gennem hele historikken
* **Logins (Day)** — Logintotaler pr. ugedag, plus en separat opdeling kun for de seneste 7 dage
* **Logins (Hour)** — Logintotaler pr. time på døgnet, plus en separat opdeling kun for de seneste 24 timer
* **Number of users (Picture)** — Hvor mange aktive konti der har uploadet et profilbillede versus hvor mange der ikke har
* **Logins by date** — Hver brugers samlede tilsluttede tid (login til logout) over et valgt datointerval, kan eksporteres til XLS
* **Not logged in for some time** — Hvor mange brugere der ikke har logget ind inden for efterfølgende vinduer (i dag, 7 dage, 31 dage, 6 måneder), og hvor mange der aldrig har logget ind
* **Zombies** — Konti hvis seneste login er på eller før en skæringsdato, du vælger (der er ingen fast tærskel — du vælger datoen hver gang), eventuelt begrænset til aktive konti, med knapper til at aktivere, deaktivere eller slette de listede konti direkte
* **Users statistics** — Brugere registreret inden for et valgt datointerval, med fulde profiloplysninger og oversigtsdiagrammer, kan eksporteres til XLS
* **Users online** — Live-tal for brugere der aktuelt er online, og brugere der aktuelt tager en quiz, hver vist på tværs af fire tidsvinduer (3, 5, 30 og 120 minutter)
* **New users registrations** — Nye registreringer over et valgt datointerval (dagligt hvis intervallet er en måned eller mindre, månedligt med drill-down ellers), plus en opdeling af hvem der oprettede hver konto
* **Course/Session subscriptions by day** — Tilmeldinger versus frameldinger pr. dag over et valgt datointerval
* **Duplicate users** — Finder konti der deler samme navn, e-mail eller en valgt profilfeltværdi; lader dig deaktivere, aktivere eller forene (flette) dubletter — fletning sletter permanent de konti der foldes ind i den, du beholder

## System

* **Portal user session stats** — Et gitter af brugerantal opdelt efter adgangs-URL (på portaler med flere URL'er), session og kursus, for et valgt datointerval, kan eksporteres til XLS

Punktet **Quarterly report**, som også vises under System, behandles separat i [Corporate Reports](corporate-reports.md).

## Social

* **Number of messages received** — Interne beskeder modtaget, pr. bruger
* **Number of messages sent** — Interne beskeder sendt, pr. bruger
* **Contacts count** — Sociale netværkskontakter pr. bruger (ekskl. HR-/supervisor-lignende relationer)

## Session

* **Sessions by date** — Sessioner der starter eller slutter inden for et valgt datointerval (valgfrit filtreret efter status): antal, gennemsnitlige sessioner pr. uge, gennemsnitlige brugere pr. session, gennemsnitlige sessioner pr. vejleder, opdelinger efter kategori/sprog/status og en tabel med sessionsantal pr. kursus