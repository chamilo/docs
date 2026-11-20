# Tilpas navne og ikoner for kursusværktøjer

Chamilo 3.1 giver autoriserede kursusredaktører mulighed for at tilpasse det **navn** og det **SVG-ikon**, der vises for et værktøj på en kursusforside. Disse ændringer er begrænset til kurset og bevarer eksisterende værktøjsdestinationer.

## Tilpas et værktøj

1. Åbn kursusforsiden som en bruger, der har tilladelse til at redigere kurset.
2. Aktivér tilstanden **Tilpas** i værktøjsgitteret.
3. Åbn tilpasningsformularen for det værktøj, du vil ændre.
4. Indtast det ønskede **Navn**, og vælg om nødvendigt en **Ikon**-SVG-fil.
5. Vælg **Gem**, og kontrollér det opdaterede værktøj i gitteret på forsiden.

Tilpasning af værktøjer adskiller sig fra gitterets tilstande **Sortér**, **Vis alle** og **Skjul alle**. Ændring af et værktøjs etiket eller ikon opretter ikke et nyt værktøj, ændrer ikke dets underliggende URL og giver ikke kursister yderligere adgang.

## SVG-krav og sikkerhed

Brug en SVG-fil fra en pålidelig kilde. Chamilo validerer uploadet SVG-indhold og afviser usikre filer. Hvis en fil afvises, skal du forenkle den eller eksportere den igen som en ren SVG i stedet for at forsøge at omgå valideringen.

Bekræft det resulterende ikon og navn både som underviser og som kursist, og kontrollér, at et andet kursus forbliver uændret. Kursister kan ikke tilpasse værktøjer, medmindre de har de nødvendige rettigheder til at redigere kurset.

Se [Kursusforside](course-homepage.md). Implementering: [PR #9374](https://github.com/chamilo/chamilo-lms/pull/9374).