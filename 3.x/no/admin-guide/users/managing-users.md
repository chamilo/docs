# Administrere brukere

Denne siden dekker de daglige oppgavene med å opprette, redigere og administrere brukerkontoer.

## Brukerliste

![Brukerlisten som viser kontoer med kolonner for navn, e-post, rolle og status](../../.gitbook/assets/admin-user-list.png)

Fra administrasjonspanelet klikker du **Brukerliste** for å se alle brukere på plattformen. Listen viser:

* Avatar
* Navn
* Brukernavn
* E-postadresse
* Roller
* Aktiv/inaktiv status
* Registreringsdato
* Dato for siste innlogging

Bruk verktøyet **Avansert søk** for å finne bestemte brukere etter navn, e-post, rolle eller andre kriterier.

## Opprette en bruker

![Skjemaet for opprettelse av bruker med felt for navn, e-post, brukernavn, passord, rolle og språk](../../.gitbook/assets/admin-user-create-form.png)

1. Klikk **Legg til en bruker** fra administrasjonspanelet
2. Fyll inn de påkrevde feltene:
   * **Fornavn** og **Etternavn**
   * **E-post** — Må være unik på plattformen
   * **Brukernavn** — Innloggingsnavnet (må være unikt)
   * **Passord** — Angi et startpassord
   * **Roller** — Velg brukerens plattformrolle(r) (student, lærer, administrator osv.)
   * **Språk** — Brukerens foretrukne grensesnittspråk
3. Fyll eventuelt inn tilleggsfelt:
   * Offisiell kode (f.eks. unik ID i organisasjonen)
   * Telefonnummer
   * Utløpsdato — Deaktiver kontoen automatisk etter en dato
   * Aktiv/inaktiv status
   * Ekstra profilfelt (hvis konfigurert)
4. Lagre

## Importere brukere

![Grensesnittet for brukerimport for opplasting av CSV- eller XML-filer med brukerdata](../../.gitbook/assets/admin-user-import.png)

For masseoppretting av brukere kan du importere brukere fra en fil:

1. Klikk **Importer brukere** fra administrasjonspanelet
2. Last opp en **CSV**- eller **XML**-fil med brukerdata
3. Knytt filkolonnene til Chamilo-brukerfelt
4. Velg hvordan eksisterende brukere skal håndteres (oppdater eller hopp over)
5. Importer

Importfilen bør inneholde kolonner for minst: fornavn, etternavn, e-post, brukernavn og passord.

Merk: Kolonnen **Status** er det eldre navnet for **Rolle** og godtar bare noen få verdier, som 1 for lærer og 5 for student. Videre justering av rollene kan bare gjøres manuelt senere, ved å redigere brukeren.

## Eksportere brukere

Klikk **Eksporter brukere** for å laste ned brukerlisten som en CSV- eller XML-fil. Du kan filtrere hvilke brukere som skal eksporteres etter rolle, registreringsdato eller andre kriterier.

## Redigere en bruker

Klikk på en brukers navn i brukerlisten for å redigere kontoen. Du kan endre:

* Personopplysninger (navn, e-post, telefon)
* Roller
* Passord (tilbakestill)
* Aktiv/inaktiv status
* Utløpsdato
* Ekstra profilfelt

## Slette en bruker

Når du sletter brukere (vanligvis lærere) som har opprettet innhold på plattformen, kan systemet hindre deg i å slette brukerne permanent, og vise en advarsel som forklarer at brukeren fortsatt er knyttet til noen av ressursene. Hvis du bekrefter slettingen, sletter ikke systemet selve innholdet, men knytter det til en nøytral bruker (vi kaller den «Fallback-brukeren») av hensyn til datakonsistens.

For å unngå dette, sjekk brukerdetaljene, slett hvert av kursene deres ett for ett, og slett deretter brukeren.

## Brukerhandlinger

| Handling | Beskrivelse |
|--------|-------------|
| **Deaktiver** | Deaktiver en brukers konto uten å slette den. Brukeren kan ikke logge inn, men dataene bevares. |
| **Aktiver** | Aktiver en tidligere deaktivert konto på nytt. |
| **Logg inn som** | Logg inn på plattformen som denne brukeren (etterligning). Nyttig ved feilsøking. |
| **Anonymiser** | Slett all personlig informasjon på kontoen, slik det er definert i EUs GDPR. |
| **Slett** | Myk sletting av brukerkontoen. Bruk fanen **Slettede brukere** for å slette kontoen og tilknyttede data permanent. |

> **Logg inn som** er en kraftig funksjon. Bruk den ansvarlig og kun til legitime støtteformål.

## Masseoperasjoner

Velg flere brukere i brukerlisten for å utføre massehandlinger:

* Aktiver eller deaktiver flere brukere samtidig
* Slett flere brukere
* Tildel brukere til et kurs eller en økt

## Tips

* **Bruk CSV-import ved store påmeldinger** — Når mange brukere skal tas inn ved starten av et opplæringsprogram, klargjør en CSV-fil og importer i bulk
* **Sett utløpsdatoer** — For midlertidige brukere (workshop-deltakere, prøvebrukere), sett en utløpsdato for automatisk å deaktivere kontoene deres
* **Deaktiver heller enn å slette** — Når en bruker slutter, deaktiver kontoen først. Dette bevarer opplæringsjournalene. Slett bare hvis du er sikker på at dataene ikke lenger trengs.