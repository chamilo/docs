# Globale retningslinjer for kursinnstillinger

Plattformadministratorer kan definere sentraliserte standardverdier for kursinnstillinger og styre om lærere kan overstyre dem. Retningslinjene gjelder eksisterende kursfunksjonalitet, samtidig som kompatible kursspesifikke konfigurasjoner bevares.

## Åpne siden for retningslinjer

På **hovedtilgangs-URL-en**, åpne **Administrasjon > Innstillinger > Kursinnstillinger**, eller naviger til `/admin/settings/course-settings` på installasjonen din. Denne administrasjonssiden er forbeholdt autoriserte plattformadministratorer på hovedtilgangs-URL-en. Ikke bruk en sekundær portal til å redigere globale retningslinjer.

## Konfigurer en retningslinje

1. Bruk feltet **Søk** hvis du trenger en bestemt nøkkel for kursinnstilling.
2. For hver innstilling, kontroller det nøyaktige variabelnavnet som vises under overskriften.
3. Velg eller fjern **Redigerbar i kurset** for å styre om kursredaktører kan endre den innstillingen.
4. Velg eller skriv inn en **Standardverdi for plattformen**. Noen innstillinger tilbyr en nedtrekksliste med tillatte verdier; andre godtar tekst.
5. Lagre endringene og verifiser den effektive virkemåten i et testkurs.

Innstillinger som gjenbruker samme variabelnavn i ulike kategorier, vises separat der det er nødvendig. Ikke anta at to visuelt like navn styrer samme kursfunksjon.

## Verifiser med to roller

Som administrator, bekreft den lagrede standardverdien og om den er redigerbar. Som kurslærer, åpne den tilsvarende kursinnstillingen og kontroller at den effektive verdien og redigeringsbegrensningen samsvarer med retningslinjen. Test både et eksisterende kurs og et nytt kurs der det er mulig.

Endring av en global standardverdi kan påvirke mange kurs. Vurder konsekvensene før du deaktiverer lærernes overstyringer, og noter de tidligere retningslinjeverdiene slik at de kan gjenopprettes ved behov.

Se [Administrere kurs](managing-courses.md) og [Kursinnstillinger](../../teacher-guide/creating-your-course/course-settings.md). Implementering: [PR #9328](https://github.com/chamilo/chamilo-lms/pull/9328).