# Grading Electronic

Grading Electronic <img src="../../.gitbook/assets/icons/mdi-export.svg" alt="Grading Electronic" data-size="line"> eksporterer de kursister, der har bestået dit kursus, med deres karakterbogsscore til den fil, som et eksternt certificeringsorgan importerer: enten en tekstfil i fast format eller et regneark med deltagerlisten.

## Åbning af eksportblokken

Når funktionen er aktiveret, får værktøjslinjen i kursets værktøj **Vurderinger** (karakterbog) et **Eksport**-ikon. Klik på det for at vise blokken **Grading Electronic** på samme side; klik igen for at skjule den.

Blokken har tre felter:

* **Forhåndsvisning** — markeret som standard. Så længe den er markeret, gemmes intet: blokken viser kun, hvad eksporten ville indeholde
* **Datointerval** — kursets start- og slutdato. Startdatoen indgår i tekstfilens overskriftslinje, slutdatoen er den dato, hvor hver kursist bestod
* **Kursus-ID** — kursets identifikator hos certificeringsorganet. Feltet er forudfyldt med den værdi, der blev brugt ved den forrige eksport

## Forhåndsvisning af eksporten

Når **Forhåndsvisning** er markeret, tilbyder blokken en enkelt knap, **Forhåndsvisning**. Den viser alle kursister på kurset (eller i den session, du befinder dig i) med deres score og statussen **PASS** eller **SKIP** og viser indholdet af tekstfilen. Kun kursister, der opfylder karakterbogens beståelseskriterier, markeres med **PASS**; de øvrige udelades fra eksporten.

## Generering af filen

Fjern markeringen af **Forhåndsvisning** for at erstatte knappen **Forhåndsvisning** med to knapper:

* **Generer TXT** — downloader tekstfilen i fast format: en overskriftslinje med udbyder-ID, kursus-ID og startdato og derefter én linje pr. kursist, der har bestået
* **Generer XLSX** — downloader regnearket med deltagerlisten med én række pr. kursist, der har bestået, og kolonnerne **FireTRAQ ID**, **First Name**, **Last Name**, **Score**, **Grade**, **Date Earned** og **Comment**

Begge knapper gør det samme ud over filen: de gemmer **Kursus-ID** til næste eksport, og hvis karakterbogen genererer certifikater, genereres certifikatet for hver kursist, der har bestået.

## Hvad regnearket indeholder

* **FireTRAQ ID** — kursistens ID hos certificeringsorganet, læst fra profilfeltet `fcdice_or_acadis_student_id`
* **Score** — karakterbogsscoren som et helt procenttal (0 til 100), uanset karakterbogens samlede vægt
* **Grade** — altid **Pass**, da kun kursister, der har bestået, eksporteres. Cellen tilbyder stadig valgene **Pass**, **Fail** og **Incomplete**, hvis du har brug for at redigere filen
* **Date Earned** — slutdatoen for datointervallet
* **Comment** — efterlades tom

## Tips

* **Tjek kursist-ID'erne først** — En kursist uden ID i sin profil eksporteres stadig med et tomt **FireTRAQ ID**. Brug forhåndsvisningen til at finde dem, før du genererer filen
* **Udbyder-ID og kursustimer** kommer fra kursets ekstra felter, som administratoren har angivet, da pluginet blev installeret