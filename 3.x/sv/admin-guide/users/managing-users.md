# Hantera användare

Den här sidan tar upp de dagliga uppgifterna att skapa, redigera och hantera användarkonton.

## Användarlista

![Användarlistan som visar konton med kolumner för namn, e-post, roll och status](/.gitbook/assets/admin-user-list.png)

Från administrationspanelen klickar du på **Användarlista** för att se alla användare på plattformen. Listan visar:

* Avatar
* Namn
* Användarnamn
* E-postadress
* Roller
* Aktiv/inaktiv status
* Registreringsdatum
* Senaste inloggningsdatum

Använd verktyget **Avancerad sökning** för att hitta specifika användare efter namn, e-post, roll eller andra kriterier.

## Skapa en användare

![Formuläret för att skapa användare med fält för namn, e-post, användarnamn, lösenord, roll och språk](/.gitbook/assets/admin-user-create-form.png)

1. Klicka på **Lägg till en användare** från administrationspanelen
2. Fyll i de obligatoriska fälten:
   * **Förnamn** och **Efternamn**
   * **E-post** — Måste vara unikt på plattformen
   * **Användarnamn** — Inloggningsnamnet (måste vara unikt)
   * **Lösenord** — Ange ett initialt lösenord
   * **Roller** — Välj användarens plattformsroll(er) (student, lärare, admin, etc.)
   * **Språk** — Användarens föredragna gränssnittsspråk
3. Fyll eventuellt i ytterligare fält:
   * Officiell kod (t.ex. unikt ID i organisationen)
   * Telefonnummer
   * Utgångsdatum — Inaktivera kontot automatiskt efter ett datum
   * Aktiv/inaktiv status
   * Extra profilfält (om de är konfigurerade)
4. Spara

## Importera användare

![Gränssnittet för användarimport för att ladda upp CSV- eller XML-filer med användardata](/.gitbook/assets/admin-user-import.png)

För massskapande av användare kan du importera användare från en fil:

1. Klicka på **Importera användare** från administrationspanelen
2. Ladda upp en **CSV**- eller **XML**-fil med användardata
3. Mappa filens kolumner till Chamilo-användarfält
4. Välj hur befintliga användare ska hanteras (uppdatera eller hoppa över)
5. Importera

Importfilen bör innehålla kolumner för åtminstone: förnamn, efternamn, e-post, användarnamn och lösenord.

Obs: Kolumnen **Status** är det äldre namnet för **Roll** och accepterar endast ett fåtal värden, som 1 för lärare, 5 för student. Ytterligare finjustering av rollerna kan endast göras manuellt senare, genom att redigera användaren.

## Exportera användare

Klicka på **Exportera användare** för att ladda ner användarlistan som en CSV- eller XML-fil. Du kan filtrera vilka användare som ska exporteras efter roll, registreringsdatum eller andra kriterier.

## Redigera en användare

Klicka på en användares namn i användarlistan för att redigera deras konto. Du kan ändra:

* Personuppgifter (namn, e-post, telefon)
* Roller
* Lösenord (återställ)
* Aktiv/inaktiv status
* Utgångsdatum
* Extra profilfält

## Ta bort en användare

När du tar bort användare (vanligtvis lärare) som har skapat innehåll på plattformen kan systemet hindra dig från att ta bort användarna permanent och visa ett varningsmeddelande som förklarar att användaren fortfarande är kopplad till vissa resurser. Om du bekräftar borttagningen tar systemet inte bort innehållet i sig utan kopplar det till en neutral användare (vi kallar den "Fallback-användaren") av datakonsistensskäl.

För att undvika detta, kontrollera användaruppgifterna, ta bort var och en av deras kurser en i taget och ta sedan bort användaren.

## Användaråtgärder

| Åtgärd | Beskrivning |
|--------|-------------|
| **Inaktivera** | Inaktivera en användares konto utan att ta bort det. Användaren kan inte logga in men deras data bevaras. |
| **Aktivera** | Återaktivera ett tidigare inaktiverat konto. |
| **Logga in som** | Logga in på plattformen som den här användaren (imitation). Användbart för felsökning. |
| **Anonymisera** | Radera all personlig information på kontot, enligt EU:s GDPR. |
| **Ta bort** | Mjukradera användarkontot. Använd fliken **Borttagna användare** för att ta bort kontot och tillhörande data permanent. |

> **Logga in som** är en kraftfull funktion. Använd den ansvarsfullt och endast för legitima supportändamål.

## Batchåtgärder

Markera flera användare i användarlistan för att utföra batchåtgärder:

* Aktivera eller inaktivera flera användare samtidigt
* Ta bort flera användare
* Tilldela användare till en kurs eller session

## Tips

* **Använd CSV-import för stora inskrivningar** — När många användare ska tas in i början av ett utbildningsprogram, förbered en CSV-fil och importera i bulk
* **Ange utgångsdatum** — För tillfälliga användare (workshopdeltagare, testanvändare), ange ett utgångsdatum för att automatiskt inaktivera deras konton
* **Inaktivera hellre än ta bort** — När en användare slutar, inaktivera först deras konto. Detta bevarar deras utbildningsregister. Ta bara bort om du är säker på att data inte längre behövs.