# Anpassat certifikat

Tillägget Custom Certificate <img src="/.gitbook/assets/icons/mdi-certificate.svg" alt="Anpassat certifikat" data-size="line"> låter dig ersätta det vanliga [betygsbokscertifikatet](../assessing-learners/gradebook.md) med din egen design — logotyper, ett sigill, upp till fyra signaturbilder med bildtexter, en bakgrundsbild, marginaler och innehåll uppbyggt av platshållartaggar.

## Aktivera det för din kurs

När administratören har aktiverat tillägget och angett en standardmall slår du på det per kurs från **Kursinställningar**:

* **Custom certificate enable in course** — Aktiverar funktionen för den här kursen
* **Use default custom certificate** — Använder plattformens standardmall i stället för att du designar en egen (dessa två alternativ utesluter varandra; Chamilo varnar om du försöker aktivera båda)

Detta gör verktyget **Certificate setting** tillgängligt i din kurs, där du designar eller redigerar mallen.

## Designa certifikatet

Certifikatredigeraren använder taggar som ersätts med verkliga data när en deltagares certifikat genereras, till exempel `((user_firstname))`, `((course_title))`, `((gradebook_grade))` och `((date_certificate))`. Utöver innehållet kan du ange:

* Upp till tre logotyper, en sigillbild och en bakgrundsbild
* Upp till fyra signaturbilder, var och en med egen bildtext
* Marginaler samt leverans-/utfärdandedatum och plats som visas på certifikatet

Använd **Certificate** för att förhandsgranska din design, eller **Delete certificate** för att ta bort en kurs anpassade mall.

## Tips

* **Studenter ser ingen skillnad** — De laddar fortfarande ner sitt certifikat på vanligt sätt från Betygsboken; det använder bara din mall
* **Förhandsgranska innan du förlitar dig på det** — Kontrollera förhandsgranskningen med verkliga platshållardata för att fånga layoutproblem innan deltagare börjar generera certifikat
* **Samordna med din administratör** — Om du vill ha en plattformsomfattande standardmall i stället för en engångsmall per kurs, ställs det in av administratören först