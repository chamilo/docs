# Hantera sessioner

## Skapa en session

![Formuläret för att skapa session med fält för namn, datum, handledare, kategori och synlighet](/.gitbook/assets/admin-session-create-form.png)

1. Klicka på **Skapa en session** i administrationspanelen
2. Fyll i sessionsuppgifterna:
   * **Sessionsnamn** — Ett beskrivande namn (t.ex. "Onboarding våren 2026")
   * **Start- och slutdatum** — När sessionen pågår (valfritt — sessioner kan vara öppna utan slutdatum). Det finns 3 uppsättningar datum: Datum att visa, datum för att begränsa deltagares åtkomst och datum för att begränsa handledares åtkomst
   * **Sessionshandledare** — Personen som övervakar hela sessionen
   * **Kategori** — Tilldela till en sessionskategori för organisation
   * **Synlighet** — Styr åtkomst och listningsbeteende
3. **Lägg till kurser** — Välj en eller flera kurser att inkludera i sessionen
4. **Registrera deltagare** — Lägg till enskilda användare eller klasser av användare
5. **Tilldela kurshandledare** — För varje kurs, tilldela en lärare (kurshandledare)
6. Spara

## Sessionsdatum

Sessioner stöder flexibel datumkonfiguration:

| Datum | Syfte |
|------|---------|
| **Visningsstart/-slut** | När sessionen visas i deltagarnas listor |
| **Åtkomststart/-slut** | När deltagare faktiskt kan komma åt sessionsinnehållet |
| **Handledaråtkomst start/slut** | När handledare kan komma åt sessionen (börjar ofta före och slutar efter deltagaråtkomst) |

Detta gör att du kan förbereda sessionen innan deltagarna kommer och hålla handledaråtkomst öppen efter att sessionen avslutats för bedömning och rapportering.

## Sessionslista

![Sessionslistan som visar alla sessioner med namn, datum, antal kurser, antal deltagare och status](/.gitbook/assets/admin-session-list.png)

Sessionslistan visar alla sessioner med:

* Sessionsnamn
* Start- och slutdatum
* Status (aktiv, kommande, avslutad)

Använd sökning och filter för att hitta sessioner efter namn, datum, kategori eller status.

## Redigera en session

Klicka på en session för att redigera:

* Ändra datum, namn eller kategori
* Lägg till eller ta bort kurser
* Ändra kurshandledare
* Lägg till eller ta bort deltagare
* Visa spårningsdata för sessionen

## Registrera användare

![Gränssnittet för sessionsregistrering för att lägga till enskilda användare, klasser eller importera via CSV](/.gitbook/assets/admin-session-enrollment.png)

Du kan registrera användare i en session genom:

* **Individuell registrering** — Sök efter och lägg till enskilda användare
* **Klassregistrering** — Lägg till en hel klass (grupp av fördefinierade användare) på en gång
* **CSV-import** — Ladda upp en fil med användar–session-tilldelningar

## Sessionsåtkomst

Deltagare kommer åt sina sessioner via **Mina sessioner** i sidofältet. Sessioner är organiserade i:

* **Aktuella sessioner** — För närvarande aktiva
* **Tidigare sessioner** — Avslutade
* **Kommande sessioner** — Inte ännu påbörjade

## Tips

* **Planera datum noggrant** — Se till att handledarens åtkomstdatum sträcker sig bortom deltagarnas datum så att handledare kan förbereda och följa upp
* **Använd klasser för återkommande registrering** — Om du ofta registrerar samma grupper, skapa klasser och tilldela dem till sessioner
* **Håll sessionerna organiserade** — Använd kategorier och tydliga namnkonventioner för enkel hantering