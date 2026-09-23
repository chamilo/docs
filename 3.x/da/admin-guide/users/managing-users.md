# Administration af brugere

Denne side dækker de daglige opgaver med at oprette, redigere og administrere brugerkonti.

## Brugerliste

![Brugerlisten, der viser konti med kolonner for navn, e-mail, rolle og status](../../.gitbook/assets/admin-user-list.png)

Fra administrationspanelet skal du klikke på **Brugerliste** for at se alle brugere på platformen. Listen viser:

* Avatar
* Navn
* Brugernavn
* E-mailadresse
* Roller
* Aktiv/inaktiv status
* Registreringsdato
* Sidste logindato

Brug værktøjet **Avanceret søgning** til at finde bestemte brugere efter navn, e-mail, rolle eller andre kriterier.

## Oprettelse af en bruger

![Formularen til oprettelse af bruger med felter til navn, e-mail, brugernavn, adgangskode, rolle og sprog](../../.gitbook/assets/admin-user-create-form.png)

1. Klik på **Tilføj en bruger** fra administrationspanelet
2. Udfyld de obligatoriske felter:
   * **Fornavn** og **Efternavn**
   * **E-mail** — Skal være unik på platformen
   * **Brugernavn** — Login-navnet (skal være unikt)
   * **Adgangskode** — Angiv en indledende adgangskode
   * **Roller** — Vælg brugerens platformrolle(r) (studerende, underviser, administrator osv.)
   * **Sprog** — Brugerens foretrukne grænsefladesprog
3. Udfyld eventuelt yderligere felter:
   * Officiel kode (f.eks. unikt ID i organisationen)
   * Telefonnummer
   * Udløbsdato — Deaktiver automatisk kontoen efter en dato
   * Aktiv/inaktiv status
   * Ekstra profilfelter (hvis konfigureret)
4. Gem

## Import af brugere

![Grænsefladen til import af brugere til upload af CSV- eller XML-filer med brugerdata](../../.gitbook/assets/admin-user-import.png)

Til masseoprettelse af brugere kan du importere brugere fra en fil:

1. Klik på **Importer brugere** fra administrationspanelet
2. Upload en **CSV**- eller **XML**-fil med brugerdata
3. Tilknyt filens kolonner til Chamilo-brugerfelter
4. Vælg, hvordan eksisterende brugere skal håndteres (opdater eller spring over)
5. Importér

Importfilen bør mindst indeholde kolonner til: fornavn, efternavn, e-mail, brugernavn og adgangskode.

Bemærk: Kolonnen **Status** er det ældre navn for **Rolle** og accepterer kun få værdier, f.eks. 1 for underviser og 5 for studerende. Yderligere tilpasning af rollerne kan kun ske manuelt senere ved at redigere brugeren.

## Eksport af brugere

Klik på **Eksportér brugere** for at downloade brugerlisten som en CSV- eller XML-fil. Du kan filtrere, hvilke brugere der skal eksporteres, efter rolle, registreringsdato eller andre kriterier.

## Redigering af en bruger

Klik på en brugers navn i brugerlisten for at redigere vedkommendes konto. Du kan ændre:

* Personlige oplysninger (navn, e-mail, telefon)
* Roller
* Adgangskode (nulstil)
* Aktiv/inaktiv status
* Udløbsdato
* Ekstra profilfelter

## Sletning af en bruger

Når du sletter brugere (typisk undervisere), som har oprettet indhold på platformen, kan systemet forhindre dig i at slette brugerne permanent og vise en advarselsmeddelelse om, at brugeren stadig er knyttet til nogle af ressourcerne. Hvis du bekræfter sletningen, sletter systemet ikke selve indholdet, men knytter det til en neutral bruger (vi kalder den "Fallback-brugeren") af hensyn til datakonsistens.

For at undgå dette skal du tjekke brugeroplysningerne, slette hvert af vedkommendes kurser ét ad gangen og derefter slette brugeren.

## Brugerhandlinger

| Handling | Beskrivelse |
|--------|-------------|
| **Deaktivér** | Deaktiverer en brugers konto uden at slette den. Brugeren kan ikke logge ind, men dataene bevares. |
| **Aktivér** | Genaktiverer en tidligere deaktiveret konto. |
| **Log ind som** | Logger ind på platformen som denne bruger (impersonering). Nyttigt til fejlfinding. |
| **Anonymisér** | Sletter alle kontoens personlige oplysninger, som defineret af EU's GDPR. |
| **Slet** | Blød sletning af brugerkontoen. Brug fanen **Slettede brugere** til at slette kontoen og tilknyttede data permanent. |

> **Log ind som** er en kraftfuld funktion. Brug den ansvarligt og kun til legitime supportformål.

## Massehandlinger

Vælg flere brugere i brugerlisten for at udføre massehandlinger:

* Aktivér eller deaktivér flere brugere på én gang
* Slet flere brugere
* Tildel brugere til et kursus eller en session

## Tips

* **Brug CSV-import til store tilmeldinger** — Når mange brugere skal onboardes ved starten af et uddannelsesforløb, skal du forberede en CSV-fil og importere i bulk
* **Angiv udløbsdatoer** — For midlertidige brugere (workshopdeltagere, prøvebrugere) skal du angive en udløbsdato, så deres konti deaktiveres automatisk
* **Deaktivér frem for at slette** — Når en bruger forlader organisationen, skal du først deaktivere kontoen. Det bevarer vedkommendes uddannelsesdata. Slet kun, hvis du er sikker på, at dataene ikke længere er nødvendige.