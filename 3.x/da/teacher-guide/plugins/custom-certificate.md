# Brugerdefineret certifikat

Pluginet Custom Certificate <img src="../../.gitbook/assets/icons/mdi-certificate.svg" alt="Brugerdefineret certifikat" data-size="line"> lader dig erstatte det standard [karakterbogs-certifikat](../assessing-learners/gradebook.md) med dit eget design — logoer, et segl, op til fire signaturbilleder med billedtekster, et baggrundsbillede, margener og indhold opbygget af pladsholder-tags.

## Aktivering for dit kursus

Når din administrator har aktiveret pluginet og angivet en standardskabelon, slår du det til pr. kursus under **Kursusindstillinger**:

* **Custom certificate enable in course** — Aktiverer funktionen for dette kursus
* **Use default custom certificate** — Bruger platformens standardskabelon i stedet for at designe din egen (disse to indstillinger udelukker hinanden; Chamilo advarer dig, hvis du forsøger at aktivere begge)

Dette gør et værktøj til **Certificate setting** tilgængeligt i dit kursus, hvor du designer eller redigerer skabelonen.

## Design af certifikatet

Certifikatredigeringsværktøjet bruger tags, der erstattes med rigtige data, når en lærendes certifikat genereres, for eksempel `((user_firstname))`, `((course_title))`, `((gradebook_grade))` og `((date_certificate))`. Ud over indhold kan du angive:

* Op til tre logoer, et seglbillede og et baggrundsbillede
* Op til fire signaturbilleder, hver med sin egen billedtekst
* Margener samt udstedelses-/ekspeditionsdato og -sted vist på certifikatet

Brug **Certificate** til at forhåndsvise dit design, eller **Delete certificate** til at fjerne et kursus' brugerdefinerede skabelon.

## Tips

* **Studerende ser ingen forskel** — De downloader stadig deres certifikat på den sædvanlige måde fra karakterbogen; det bruger blot din skabelon
* **Forhåndsvis, før du stoler på det** — Tjek forhåndsvisningen med rigtige pladsholderdata for at opdage layoutproblemer, før lærende begynder at generere certifikater
* **Koordinér med din administrator** — Hvis du ønsker en platformsomfattende standardskabelon frem for en engangsløsning pr. kursus, skal det først sættes op af din administrator