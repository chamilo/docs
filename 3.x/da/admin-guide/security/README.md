# Sikkerhed

Blokken **Sikkerhed** på administrationsdashboardet samler platformens indbyggede værktøjer til sikkerhedsovervågning og revision. Den er adskilt fra [Sikkerhedsindstillinger](../platform-settings/security-settings.md), som konfigurerer sikkerheds*politik* (adgangskoderegler, CAPTCHA, HTTP-sikkerhedsoverskrifter og så videre) — denne blok giver dig de *rapporter og værktøjer*, der overvåger platformen for mistænkelig aktivitet og uønskede ændringer.

![Blokken Sikkerhed på administrationsdashboardet med Aktivitetsrevision, Login-forsøg, Simple IDS, Kontrol af adgangskodestyrke og Filintegritet](/.gitbook/assets/admin-security-block.png)

Blokken blev introduceret i Chamilo 2.0 med fire værktøjer og udvidet i Chamilo 3.0 med et femte, **Filintegritet**.

## Adgang til blokken Sikkerhed

Fra administrationspanelet vises blokken **Sikkerhed** sammen med de øvrige dashboard-blokke (Brugere, Kurser, Platformadministration, System og så videre). Klik på et af dens links for at åbne det tilsvarende værktøj.

## Indholdet af blokken

* **[Aktivitetsrevision](activities-audit.md)** — Gennemse vigtige administrative og platformhændelser (ændringer af brugere, kurser, sessioner m.m.) efter hændelsestype
* **[Login-forsøg](login-attempts.md)** — Gennemgå mislykkede og vellykkede login-forsøg med diagrammer og en søgbar log
* **[Simple IDS](simple-ids.md)** — Se anmodninger, der er markeret af Chamilos indbyggede, letvægts-intrusion detection-system
* **[Kontrol af adgangskodestyrke](password-strength-checker.md)** — Scan aktive brugere for adgangskoder, der matcher en liste over almindeligt anvendte adgangskoder
* **[Filintegritet](file-integrity.md)** *(nyt i Chamilo 3.0)* — Registrer uventede tilføjelser, ændringer, sletninger eller tilladelsesændringer i de installerede filer

## Hvem har adgang

Alle fem værktøjer kræver adgang som **Portal Administrator**. Scanning, pause og re-baseline-handlinger i Filintegritet kræver desuden adgang som **Global Administrator**, og pause af advarsler eller etablering af en ny baseline kræver, at du indtaster din egen adgangskode igen — se [Filintegritet](file-integrity.md#actions) for detaljer.