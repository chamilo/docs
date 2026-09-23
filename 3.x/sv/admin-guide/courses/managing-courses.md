# Hantera kurser

Som administratör kan du hantera alla kurser på plattformen oavsett vem som skapade dem.

## Kurslista

![Kurslistan som visar alla kurser med titel, kod, kategori, inskrivna användare och synlighetsstatus](../../.gitbook/assets/admin-course-list.png)

Från administrationspanelen klickar du på **Kurslista** för att se alla kurser. Listan visar:

* Kurstitel och kod
* Språk
* Kategorier
* Synlighetsstatus

Använd verktyget **Avancerad sökning** för att hitta specifika kurser.

## Skapa en kurs

Som administratör kan du skapa kurser och tilldela dem till valfri lärare:

1. Klicka på **Lägg till kurs** från administrationspanelen
2. Fyll i kursuppgifterna (titel, kod, kategori, språk)
3. Tilldela en lärare till kursen
4. Spara

Obs: I Chamilo 1.11.x visades kurskoden som en del av kursens URL och gick inte att ändra efter att kursen skapats. Detta beteende ändrades från och med 2.x. Kurskoden syns inte längre i URL:en, och framtida versioner kan komma att tillåta lärare att ändra kurskoden i efterhand eftersom den blir mindre väsentlig för plattformen.

## Hantera en befintlig kurs

Hitta en kurs i listan för att komma åt hanteringsalternativ i kolumnen *Åtgärder*:

* **Information** — Visa information om kursen 
* **Kursens startsida** — Tar dig direkt till kursens startsida 
* **Rapportering** — Se data om engagemang och prestation
* **Redigera** — Ändra kurstitel, kategori, synlighet och andra inställningar
* **Skapa en säkerhetskopia** — Gå till kursens underhållssektion, där du kan skapa kopior och göra annat
* **Lägg till i katalog** — Lägg till den här kursen i kurskatalogen
* **Ta bort** — Ta bort kursen och allt dess innehåll permanent

> Att ta bort en kurs tar bort allt innehåll, elevdata, betyg och spårningsinformation permanent. Överväg att exportera kursen först som en säkerhetskopia.

## Massåtgärder

Markera flera kurser i listan för att utföra batchåtgärder, till exempel att ta bort dem. För att exportera en kurs går du in i kursen och använder verktyget **Underhåll** — det finns ingen massåtgärd för export i administratörens kurslista.

## Inställningar för kurssynlighet

Administratörer kan åsidosätta den synlighet som lärare har angett:

| Synlighet | Effekt |
|-----------|--------|
| **Offentlig** | Tillgänglig för alla, inklusive anonyma besökare |
| **Öppen** | Tillgänglig för alla inloggade användare |
| **Privat** | Endast inskrivna användare kan komma åt kursen |
| **Stängd** | Ingen kan komma åt kursen (förutom läraren och administratörer) |
| **Dold** | Ingen kan se eller komma åt kursen (förutom administratörer) |