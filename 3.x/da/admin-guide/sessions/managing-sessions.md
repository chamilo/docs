# Administration af sessioner

## Oprettelse af en session

![Formularen til oprettelse af session med felter til navn, datoer, tutor, kategori og synlighed](/.gitbook/assets/admin-session-create-form.png)

1. Fra administrationspanelet skal du klikke på **Opret en session**
2. Udfyld sessionsoplysningerne:
   * **Sessionsnavn** — Et beskrivende navn (f.eks. "Onboarding forår 2026")
   * **Start- og slutdatoer** — Hvornår sessionen kører (valgfrit — sessioner kan være uden slutdato). Der er 3 sæt datoer: Datoer til visning, datoer til at begrænse kursisters adgang og datoer til at begrænse tutorers adgang
   * **Sessionstutor** — Den person, der har det overordnede ansvar for hele sessionen
   * **Kategori** — Tildel til en sessionskategori med henblik på organisering
   * **Synlighed** — Styr adgang og visningsadfærd
3. **Tilføj kurser** — Vælg ét eller flere kurser, der skal indgå i sessionen
4. **Tilmeld kursister** — Tilføj individuelle brugere eller klasser af brugere
5. **Tildel kurstutorer** — Tildel for hvert kursus en underviser (kurstutor)
6. Gem

## Sessionsdatoer

Sessioner understøtter fleksibel datokonfiguration:

| Dato | Formål |
|------|---------|
| **Visningsstart/-slut** | Hvornår sessionen vises i kursisternes lister |
| **Adgangsstart/-slut** | Hvornår kursister faktisk kan tilgå sessionens indhold |
| **Tutoradgangsstart/-slut** | Hvornår tutorer kan tilgå sessionen (starter ofte før og slutter efter kursisternes adgang) |

Dette giver dig mulighed for at forberede sessionen, før kursisterne ankommer, og holde tutoradgangen åben efter sessionens afslutning med henblik på bedømmelse og rapportering.

## Sessionsliste

![Sessionslisten, der viser alle sessioner med navn, datoer, antal kurser, antal kursister og status](/.gitbook/assets/admin-session-list.png)

Sessionslisten viser alle sessioner med:

* Sessionsnavn
* Start- og slutdatoer
* Status (aktiv, kommende, afsluttet)

Brug søgning og filtre til at finde sessioner efter navn, dato, kategori eller status.

## Redigering af en session

Klik på en session for at redigere:

* Ændr datoer, navn eller kategori
* Tilføj eller fjern kurser
* Skift kurstutorer
* Tilføj eller fjern kursister
* Se sporingsdata for sessionen

## Tilmelding af brugere

![Sessionsgrænsefladen til tilmelding til at tilføje individuelle brugere, klasser eller importere via CSV](/.gitbook/assets/admin-session-enrollment.png)

Du kan tilmelde brugere til en session ved:

* **Individuel tilmelding** — Søg efter og tilføj individuelle brugere
* **Klasstilmelding** — Tilføj en hel klasse (gruppe af foruddefinerede brugere) på én gang
* **CSV-import** — Upload en fil med bruger-session-tildelinger

## Sessionsadgang

Kursister tilgår deres sessioner via **Mine sessioner** i sidebjælken. Sessioner er organiseret i:

* **Aktuelle sessioner** — I øjeblikket aktive
* **Tidligere sessioner** — Afsluttede
* **Kommende sessioner** — Endnu ikke startet

## Tips

* **Planlæg datoer omhyggeligt** — Sørg for, at tutorernes adgangsdatoer rækker ud over kursisternes datoer, så tutorer kan klargøre og følge op
* **Brug klasser til tilbagevendende tilmelding** — Hvis du ofte tilmelder de samme grupper, skal du oprette klasser og tildele dem til sessioner
* **Hold sessionerne organiserede** — Brug kategorier og klare navnekonventioner for nem administration