# Sessioner

Sessioner er en af Chamilos mest kraftfulde funktioner. De giver dig mulighed for at levere de samme kurser til forskellige grupper af kursister på forskellige tidspunkter, uden at duplikere kursusindhold.

![Blokken Sessionshåndtering på administrationsdashboardet, der blandt andet viser listen over træningssessioner, Tilføj en træningssession, sessionskategorier, import-/eksportværktøjer, karrierer og promotioner samt ressourcesekvensering](/.gitbook/assets/admin-sessions-block.png)

* **[Håndtering af sessioner](managing-sessions.md)** — Opret, konfigurer og administrer træningssessioner
* **[Sessionskategorier](session-categories.md)** — Organiser sessioner i kategorier
* **[Karrierer og promotioner](careers-and-promotions.md)** — Definer karriereforløb og promotion-arbejdsgange
* **[Klasser](classes.md)** — Administrer kursistklasser til masseindskrivning

## Forståelse af sessioner

Sessioner er **valgfrie**. Du kan få din portal til at fungere alene ved at bruge kurser, men vi anbefaler **virkelig**, at du overvejer den ekstra kompleksitet ved sessioner som en måde at spare administrationsarbejde på i det lange løb.

Et **kursus** indeholder indholdet (dokumenter, øvelser, læringsstier). En **session** tildeler det kursus (eller flere kurser) til en specifik gruppe af kursister *i en specifik tidsperiode*.

Denne arkitektur betyder:

* Undervisere opretter indhold én gang i kurset
* Administratorer opretter sessioner for at levere det indhold til forskellige kohorter
* Hver session har sin egen indskrivning, sporingsdata og resultater
* Det basale kursusindhold er delt, men sessionstutorer kan tilpasse visse elementer

## Hvornår sessioner skal bruges

Brug sessioner, når:

* Du leverer den samme træning flere gange (f.eks. månedlige onboarding-sessioner)
* Du har kohortebaserede programmer (f.eks. semesterbaserede hold)
* Du har brug for separat sporing pr. gruppe af kursister
* Du ønsker, at forskellige tutorere skal administrere forskellige udgaver af det samme kursus