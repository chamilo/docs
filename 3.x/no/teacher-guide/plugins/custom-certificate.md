# Tilpasset sertifikat

Programtillegget Tilpasset sertifikat <img src="../../.gitbook/assets/icons/mdi-certificate.svg" alt="Tilpasset sertifikat" data-size="line"> lar deg erstatte det vanlige [karakterboksertifikatet](../assessing-learners/gradebook.md) med ditt eget design — logoer, et segl, opptil fire signaturbilder med bildetekster, et bakgrunnsbilde, marger og innhold bygget av plassholdermerker.

## Slå det på for kurset ditt

Når administratoren har aktivert programtillegget og satt en standardmal, slår du det på per kurs fra **Kursinnstillinger**:

* **Custom certificate enable in course** — Aktiverer funksjonen for dette kurset
* **Use default custom certificate** — Bruker plattformens standardmal i stedet for å designe din egen (disse to alternativene utelukker hverandre; Chamilo advarer deg hvis du prøver å aktivere begge)

Dette gjør et **Sertifikatinnstilling**-verktøy tilgjengelig i kurset ditt, der du designer eller redigerer malen.

## Designe sertifikatet

Sertifikatredigereren bruker merker som erstattes med ekte data når en lærendes sertifikat genereres, for eksempel `((user_firstname))`, `((course_title))`, `((gradebook_grade))` og `((date_certificate))`. I tillegg til innhold kan du angi:

* Opptil tre logoer, et seglbilde og et bakgrunnsbilde
* Opptil fire signaturbilder, hvert med sin egen bildetekst
* Marger og leverings-/ekspedisjonsdato og -sted som vises på sertifikatet

Bruk **Certificate** for å forhåndsvise designet, eller **Delete certificate** for å fjerne et kurs sitt tilpassede mal.

## Tips

* **Studentene ser ingenting annerledes** — De laster fortsatt ned sertifikatet på vanlig måte fra Karakterboken; det bruker bare malen din
* **Forhåndsvis før du stoler på det** — Sjekk forhåndsvisningen med ekte plassholderdata for å fange opp layoutproblemer før lærende begynner å generere sertifikater
* **Koordiner med administratoren din** — Hvis du vil ha en plattformomfattende standardmal i stedet for en engangsløsning per kurs, settes det opp av administratoren først