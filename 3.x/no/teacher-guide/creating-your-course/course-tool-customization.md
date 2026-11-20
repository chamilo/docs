# Tilpass navn og ikoner for kursverktøy

Chamilo 3.1 lar autoriserte kursredaktører tilpasse **navnet** og **SVG-ikonet** som vises for et verktøy på kursets startside. Disse endringene gjelder kun for kurset og bevarer eksisterende verktøymål.

## Tilpass et verktøy

1. Åpne kursets startside som en bruker som har tillatelse til å redigere kurset.
2. Aktiver **Tilpass**-modus i verktøyrutenettet.
3. Åpne tilpasningsskjemaet for verktøyet du vil endre.
4. Skriv inn ønsket **Navn** og, om nødvendig, velg en **Ikon**-SVG-fil.
5. Velg **Lagre** og kontroller det oppdaterte verktøyet i rutenettet på startsiden.

Tilpasning av verktøy er noe annet enn rutenettets moduser **Sorter**, **Vis alle** og **Skjul alle**. Å endre et verktøys etikett eller ikon oppretter ikke et nytt verktøy, endrer ikke den underliggende URL-en og gir ikke elever ytterligere tilgang.

## SVG-krav og sikkerhet

Bruk en SVG-fil fra en pålitelig kilde. Chamilo validerer opplastet SVG-innhold og avviser usikre filer. Hvis en fil avvises, forenkle eller eksporter den på nytt som en ren SVG i stedet for å prøve å omgå valideringen.

Bekreft det resulterende ikonet og navnet både som lærer og som student, og kontroller at et annet kurs forblir uendret. Studenter kan ikke tilpasse verktøy med mindre de har de nødvendige tillatelsene til å redigere kurset.

Se [Kursets startside](course-homepage.md). Implementering: [PR #9374](https://github.com/chamilo/chamilo-lms/pull/9374).