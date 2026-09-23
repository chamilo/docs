# IMS/LTI-klient

IMS/LTI-klient <img src="../../.gitbook/assets/icons/mdi-link-variant.svg" alt="IMS/LTI-klient" data-size="line"> lader dig starte et eksternt værktøj eller en indholdsleverandør inde fra dit kursus ved hjælp af LTI-standarden (version 1.1 og 1.3) — for eksempel en forlags interaktive lærebog, et specialiseret simuleringsværktøj eller en anden platform, der understøtter LTI. Chamilo fungerer som den startende platform; den eksterne tjeneste er "værktøjet".

## Adgang til værktøjet

Når det er aktiveret, vises knappen **Konfigurer eksterne værktøjer** i kursets **Indstillinger** <img src="../../.gitbook/assets/icons/mdi-cog.svg" alt="Indstillinger" data-size="line">. Derfra kan du enten:

* **Tilføje et nyt eksternt værktøj** — Registrer et selv: navn, start-URL, LTI-version og de legitimationsoplysninger, den eksterne tjeneste har givet dig (klient-ID/nøgler til LTI 1.3 eller en forbrugernøgle og hemmelighed til LTI 1.1)
* **Tilføje et eksisterende globalt værktøj** — Hvis din administrator allerede har registreret et platformdækkende værktøj, kan du tilføje det til dit kursus i stedet for at oprette din egen forbindelse

Når det er tilføjet, vises værktøjet som et almindeligt værktøj/genvej på kursets startside.

## Hvad du kan konfigurere

For et værktøj, du selv har registreret: om det åbnes i en iframe eller et nyt vindue, om den studerendes navn, e-mail og billede deles med den eksterne tjeneste, tilpassede startparametre og (for LTI 1.3) understøttelse af Deep Linking. Hvis værktøjet understøtter Assignment and Grades Service, kan du også oprette en tilknyttet karakterbogskolonne, så de scorer, det rapporterer tilbage, indgår i din Chamilo-karakterbog.

For et værktøj tilføjet fra en platformdækkende "global" definition kan du kun justere disse præsentations- og privatlivsindstillinger på kursusniveau — selve forbindelseslegitimationsoplysningerne tilhører den, der registrerede basisværktøjet (normalt din administrator).

## Tips

* **Få legitimationsoplysninger fra værktøjsleverandøren først** — Du skal bruge start-URL'en og enten LTI 1.3-klient-/nøgleoplysninger eller en LTI 1.1-forbrugernøgle og hemmelighed, før du kan registrere et nyt værktøj
* **Vær bevidst om, hvad du deler** — Aktivér kun deling af en studerendes navn, e-mail eller billede med en ekstern tjeneste, hvis værktøjet faktisk har brug for det
* **Spørg din administrator om globale værktøjer** — Hvis det samme eksterne værktøj bruges på tværs af mange kurser, undgår en platformdækkende registrering, at hver underviser konfigurerer sin egen forbindelse separat