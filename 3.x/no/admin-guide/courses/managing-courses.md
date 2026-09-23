# Administrere kurs

Som administrator kan du administrere alle kurs på plattformen uavhengig av hvem som opprettet dem.

## Kursliste

![Kurslisten som viser alle kurs med tittel, kode, kategori, påmeldte brukere og synlighetsstatus](/.gitbook/assets/admin-course-list.png)

Fra administrasjonspanelet klikker du **Kursliste** for å se alle kurs. Listen viser:

* Kurstittel og kode
* Språk
* Kategorier
* Synlighetsstatus

Bruk verktøyet **Avansert søk** for å finne bestemte kurs.

## Opprette et kurs

Som administrator kan du opprette kurs og tilordne dem til en hvilken som helst lærer:

1. Klikk **Legg til kurs** fra administrasjonspanelet
2. Fyll inn kursdetaljene (tittel, kode, kategori, språk)
3. Tilordne en lærer til kurset
4. Lagre

Merk: I Chamilo 1.11.x ble kurskoden vist som en del av kurs-URL-en, og det var umulig å endre den etter at kurset var opprettet. Denne atferden endret seg fra og med 2.x. Kurskoden er ikke lenger synlig i URL-en, og fremtidige versjoner kan tillate lærere å endre kurskoden i etterkant, ettersom den blir mindre essensiell for plattformen.

## Administrere et eksisterende kurs

Finn et kurs i listen for å få tilgang til administrasjonsalternativer i kolonnen *Handlinger*:

* **Informasjon** — Vis informasjon om kurset 
* **Kurshjem** — Sender deg direkte til kursets hjemmeside 
* **Rapportering** — Se engasjements- og ytelsesdata
* **Rediger** — Endre kurstittel, kategori, synlighet og andre innstillinger
* **Opprett en sikkerhetskopi** — Gå til vedlikeholdsseksjonen for kurset, der du kan opprette kopier og gjøre andre ting
* **Legg til i katalog** — Legg dette kurset til i kurskatalogen
* **Slett** — Fjern kurset og alt innholdet permanent

> Sletting av et kurs fjerner alt innhold, lærerdata, karakterer og sporingsinformasjon permanent. Vurder å eksportere kurset først som en sikkerhetskopi.

## Masseoperasjoner

Velg flere kurs i listen for å utføre batchhandlinger, for eksempel å slette dem. For å eksportere et kurs går du inn i kurset og bruker verktøyet **Vedlikehold** — det finnes ingen masseeksport-handling på administrasjonens kursliste.

## Innstillinger for kurssynlighet

Administratorer kan overstyre synligheten som er satt av lærere:

| Synlighet | Effekt |
|-----------|--------|
| **Offentlig** | Tilgjengelig for alle, inkludert anonyme besøkende |
| **Åpen** | Tilgjengelig for alle innloggede brukere |
| **Privat** | Bare påmeldte brukere kan få tilgang til kurset |
| **Lukket** | Ingen kan få tilgang til kurset (unntatt læreren og administratorer) |
| **Skjult** | Ingen kan se eller få tilgang til kurset (unntatt administratorene) |