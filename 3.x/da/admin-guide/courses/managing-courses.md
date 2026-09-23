# Administration af kurser

Som administrator kan du administrere alle kurser på platformen, uanset hvem der har oprettet dem.

## Kursusliste

![Kursuslisten, der viser alle kurser med titel, kode, kategori, tilmeldte brugere og synlighedsstatus](../../.gitbook/assets/admin-course-list.png)

Klik på **Kursusliste** i administrationspanelet for at se alle kurser. Listen viser:

* Kursets titel og kode
* Sprog
* Kategorier
* Synlighedsstatus

Brug værktøjet **Avanceret søgning** til at finde bestemte kurser.

## Oprettelse af et kursus

Som administrator kan du oprette kurser og tildele dem til en hvilken som helst underviser:

1. Klik på **Tilføj kursus** i administrationspanelet
2. Udfyld kursusoplysningerne (titel, kode, kategori, sprog)
3. Tildel en underviser til kurset
4. Gem

Bemærk: I Chamilo 1.11.x blev kursuskoden vist som en del af kursets URL og kunne ikke ændres efter oprettelsen af kurset. Denne adfærd blev ændret fra og med 2.x. Kursuskoden er ikke længere synlig i URL'en, og fremtidige versioner vil muligvis tillade undervisere at ændre kursuskoden efterfølgende, da den bliver mindre afgørende for platformen.

## Administration af et eksisterende kursus

Find et kursus på listen for at få adgang til administrationsmulighederne i kolonnen *Handlinger*:

* **Information** — Vis information om kurset 
* **Kursushjem** — Sender dig direkte til kursets startside 
* **Rapportering** — Se data om engagement og præstation
* **Rediger** — Ændr kursets titel, kategori, synlighed og andre indstillinger
* **Opret en sikkerhedskopi** — Gå til kursets vedligeholdelsessektion, hvor du kan oprette kopier og foretage andre handlinger
* **Tilføj til katalog** — Tilføj dette kursus til kursuskataloget
* **Slet** — Fjern kurset og alt dets indhold permanent

> Sletning af et kursus fjerner alt indhold, kursistdata, karakterer og sporingsoplysninger permanent. Overvej at eksportere kurset først som sikkerhedskopi.

## Massehandlinger

Vælg flere kurser på listen for at udføre batchhandlinger, f.eks. at slette dem. For at eksportere et kursus skal du gå ind i kurset og bruge værktøjet **Vedligeholdelse** — der findes ingen masseeksport på administratorens kursusliste.

## Indstillinger for kurssynlighed

Administratorer kan tilsidesætte den synlighed, som underviserne har angivet:

| Synlighed | Effekt |
|-----------|--------|
| **Offentlig** | Tilgængelig for alle, inklusive anonyme besøgende |
| **Åben** | Tilgængelig for alle brugere, der er logget ind |
| **Privat** | Kun tilmeldte brugere kan tilgå kurset |
| **Lukket** | Ingen kan tilgå kurset (undtagen underviseren og administratorer) |
| **Skjult** | Ingen kan se eller tilgå kurset (undtagen administratorerne) |