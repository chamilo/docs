# Grading Electronic

Grading Electronic <img src="../../.gitbook/assets/icons/mdi-export.svg" alt="Grading Electronic" data-size="line"> eksporterer deltakerne som har bestått kurset ditt, med poengsummen fra karakterboken, til filen et eksternt sertifiseringsorgan importerer: enten en tekstfil med fast format eller et regneark med deltakerliste.

## Åpne eksportblokken

Når funksjonen er aktivert, får verktøylinjen i kursets verktøy **Vurderinger** (karakterbok) et **Eksporter**-ikon. Klikk på det for å vise blokken **Grading Electronic** på samme side; klikk på det igjen for å skjule den.

Blokken har tre felt:

* **Forhåndsvisning** — avkrysset som standard. Så lenge den er avkrysset, lagres ingenting: blokken viser bare hva eksporten ville inneholdt
* **Datointervall** — start- og sluttdato for kurset. Startdatoen settes inn i tekstfilens overskriftslinje, sluttdatoen er datoen hver deltaker bestod
* **Kurs-ID** — kursets identifikator hos sertifiseringsorganet. Den er forhåndsutfylt med verdien som ble brukt ved forrige eksport

## Forhåndsvise eksporten

Når **Forhåndsvisning** er avkrysset, tilbyr blokken én enkelt **Forhåndsvisning**-knapp. Den lister opp alle deltakerne i kurset (eller i økten du er i) med poengsum og status **PASS** eller **SKIP**, og viser innholdet i tekstfilen. Bare deltakere som oppfyller karakterbokens kriterier for bestått, merkes med **PASS**; de andre utelates fra eksporten.

## Generere filen

Fjern avkrysningen for **Forhåndsvisning** for å erstatte **Forhåndsvisning**-knappen med to knapper:

* **Generer TXT** — laster ned tekstfilen med fast format: en overskriftslinje med leverandør-ID, kurs-ID og startdato, deretter én linje per deltaker som har bestått
* **Generer XLSX** — laster ned regnearket med deltakerlisten, med én rad per deltaker som har bestått og kolonnene **FireTRAQ ID**, **First Name**, **Last Name**, **Score**, **Grade**, **Date Earned** og **Comment**

Begge knappene gjør det samme i tillegg til filen: de lagrer **Kurs-ID** for neste eksport og, hvis karakterboken genererer sertifikater, genererer sertifikatet til hver deltaker som har bestått.

## Hva regnearket inneholder

* **FireTRAQ ID** — deltakerens ID hos sertifiseringsorganet, lest fra profilfeltet `fcdice_or_acadis_student_id`
* **Score** — poengsummen i karakterboken som et helt prosenttall (0 til 100), uavhengig av karakterbokens totale vekt
* **Grade** — alltid **Pass**, siden bare deltakere som har bestått, eksporteres. Cellen tilbyr likevel valgene **Pass**, **Fail** og **Incomplete** hvis du må redigere filen
* **Date Earned** — sluttdatoen for datointervallet
* **Comment** — står tom

## Tips

* **Sjekk deltaker-ID-ene først** — En deltaker uten ID i profilen eksporteres likevel, med tom **FireTRAQ ID**. Bruk forhåndsvisningen til å oppdage dem før du genererer filen
* **Leverandør-ID og kurstimer** kommer fra kursets tilleggsfelt, som administratoren satte da programtillegget ble installert