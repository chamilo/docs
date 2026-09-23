# IMS/LTI-klient

IMS/LTI-klient <img src="../../.gitbook/assets/icons/mdi-link-variant.svg" alt="IMS/LTI-klient" data-size="line"> lar deg starte et eksternt verktøy eller en innholdsleverandør fra innsiden av kurset ditt ved hjelp av LTI-standarden (versjon 1.1 og 1.3) — for eksempel en forlags interaktive lærebok, et spesialisert simuleringsverktøy eller en annen plattform som støtter LTI. Chamilo opptrer som startplattformen; den eksterne tjenesten er «verktøyet».

## Tilgang til verktøyet

Når det er aktivert, vises en **Konfigurer eksterne verktøy**-knapp i kursets **Innstillinger** <img src="../../.gitbook/assets/icons/mdi-cog.svg" alt="Innstillinger" data-size="line">. Derfra kan du enten:

* **Legge til et nytt eksternt verktøy** — Registrer ett selv: navn, start-URL, LTI-versjon og påloggingsopplysningene den eksterne tjenesten ga deg (klient-ID/nøkler for LTI 1.3, eller en forbrukernøkkel og hemmelighet for LTI 1.1)
* **Legge til et eksisterende globalt verktøy** — Hvis administratoren allerede har registrert et plattformomfattende verktøy, kan du legge det til i kurset i stedet for å opprette din egen tilkobling

Når det er lagt til, vises verktøyet som et vanlig verktøy/snarvei på kursets hjemmeside.

## Hva du kan konfigurere

For et verktøy du har registrert selv: om det åpnes i en iframe eller et nytt vindu, om studentens navn, e-post og bilde deles med den eksterne tjenesten, egendefinerte startparametere, og (for LTI 1.3) støtte for Deep Linking. Hvis verktøyet støtter Assignment and Grades Service, kan du også opprette en tilknyttet karakterbokkolonne slik at poengene det rapporterer tilbake, mates inn i Chamilo-karakterboken.

For et verktøy lagt til fra en plattformomfattende «global» definisjon kan du bare justere disse kursnivå-presentasjons- og personvernvalgene — selve tilkoblingsopplysningene tilhører den som registrerte basisverktøyet (vanligvis administratoren din).

## Tips

* **Innhent påloggingsopplysninger fra verktøyleverandøren først** — Du trenger start-URL og enten LTI 1.3-klient-/nøkkeldetaljer eller en LTI 1.1-forbrukernøkkel og hemmelighet før du kan registrere et nytt verktøy
* **Vær bevisst på hva du deler** — Aktiver bare deling av en students navn, e-post eller bilde med en ekstern tjeneste hvis verktøyet faktisk trenger det
* **Spør administratoren om globale verktøy** — Hvis det samme eksterne verktøyet brukes på tvers av mange kurs, unngår en plattformomfattende registrering at hver lærer konfigurerer sin egen tilkobling separat