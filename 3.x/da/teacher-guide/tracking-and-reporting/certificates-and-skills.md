# Certifikater og færdigheder

Chamilo giver dig mulighed for at tildele certifikater til kursister, der opfylder specifikke præstationskriterier, og at validere færdigheder knyttet til disse præstationer.

## Sådan fungerer certifikater

Certifikater er knyttet til **Bedømmelser** (også kaldet Gradebook). Når en kursists karakter opfylder eller overstiger den minimumstærskel, du definerer, bliver et certifikat tilgængeligt for dem at downloade.

Arbejdsgangen er:

1. Opsæt [Bedømmelser](../assessing-learners/gradebook.md) med dine øvelser, opgaver og andre bedømte aktiviteter
2. Definer en **minimumscertificeringsscore** (f.eks. 70 %)
3. Når en kursist når den score, kan de downloade deres certifikat (enten inde i selve Bedømmelser-værktøjet eller fra et læringsforløb, hvis du har konfigureret det sidste trin til det). Som underviser kan du også bruge handlingen **Generér certifikater** i karakterbogen til at oprette PDF'erne i batch for alle berettigede kursister.

## Certifikatskabeloner

Certifikater bruger skabeloner defineret af platformadministratoren. Skabelonen indeholder typisk:

* Kursistens navn
* Kursets navn
* Datoen for gennemførelse
* Den opnåede score
* En QR-kode eller URL til onlineverifikation

## Certifikaters gyldighed og udløb

Certifikater kan indstilles til at udløbe efter et givet antal dage. I indstillingerne for [Bedømmelser](../assessing-learners/gradebook.md) for rod-kategorien vises feltet **Certifikatgyldighed (dage)**, når **Generér certifikater** er aktiveret. Lad det stå på `0` (standard) for certifikater, der aldrig udløber, eller angiv et antal dage, så certifikatet udløber så mange dage efter, at det blev udstedt.

Hvert certifikats egen udløbsdato beregnes automatisk ud fra den indstilling, når det genereres (eller regenereres) — du indstiller den ikke certifikat for certifikat. Listen **Certifikater** viser en kolonne **Udløbsdato** for hver kursist, der viser **Udløber aldrig**, når der ikke gælder nogen gyldighedsperiode.

Hvis kategorien ikke har nogen gyldighedsperiode konfigureret, kan du stadig indstille (eller ændre) en individuel kursists udløbsdato manuelt: klik på blyantknappen **Rediger udløbsdato** ud for deres post og vælg en dato. Denne knap er kun tilgængelig, når kategorien selv ikke har nogen gyldighedsperiode — når en gyldighedsperiode er sat, styres udløbsdatoer automatisk og kan ikke længere redigeres certifikat for certifikat.

![Listen Certifikater, der viser kolonnen Udløbsdato for tre kursister](/.gitbook/assets/gradebook-certificates-expiry-dates.png)

### Påmindelse af kursister om et forestående eller overstået udløb

Åbn listen **Certifikater** for din bedømmelse, og klik på knappen **Udløbende certifikater** <img src="/.gitbook/assets/icons/mdi-calendar-clock.svg" alt="Udløbende certifikater" data-size="line"> for at se, hvilke kursisters certifikater der er udløbet eller er ved at udløbe. Siden viser pr. kursist: certifikatets **Udløbsdato**, dets **Status** (**Udløbet** eller **Udløber snart**) og hvornår en påmindelse om det sidst blev **Sidste påmindelse sendt** (eller **Aldrig**). Brug **Dage i forvejen** til at udvide eller indsnævre, hvor langt ud i fremtiden "udløber snart" kigger.

![Siden Udløbende certifikater, der viser ét udløbet og ét snart udløbende certifikat](/.gitbook/assets/gradebook-certificate-expirations.png)

Sådan underretter du selv kursister:

1. Vælg de kursister, du vil påminde (eller vælg alle)
2. Klik på **Send underretning**
3. Gennemgå forhåndsvisningen af den e-mail, der vil blive sendt — der vises separate forhåndsvisninger for formuleringen "udløber snart" og "udløbet", afhængigt af hvilke af dine valgte kursister der falder ind under hvert tilfælde
4. Bekræft ved at klikke på **Send underretning** igen i dialogen

![Bekræftelsesdialogen Send underretning med forhåndsvisning af e-mailteksten for udløbende og udløbne certifikater](/.gitbook/assets/gradebook-certificate-expiry-notification.png)

Hver kursist underrettes på sit eget konfigurerede sprog, både via e-mail og via en intern Chamilo-besked. At sende igen for det samme certifikat og den samme udløbsdato er sikkert — Chamilo holder styr på, hvad der allerede er sendt pr. certifikat, og spammer ikke en kursist med dublerede påmindelser, medmindre du eksplicit sender igen.

Administratorer kan også planlægge de samme påmindelser automatisk, på tilbagevendende basis, uden at en underviser skal udløse dem manuelt — se [Indstillinger for cron-jobs](../../admin-guide/platform-settings/crons-settings.md#certificate-expiry-reminders).

## Færdigheder

Færdigheder repræsenterer kompetencer, som kursister tilegner sig. I Chamilo:

* Færdigheder kan knyttes til præstationer i karakterbogen
* Når en kursist opnår et certifikat, valideres eventuelle tilknyttede færdigheder automatisk
* Færdigheder akkumuleres på kursistens profil og skaber en kompetenceregistrering
* Færdigheder kan organiseres hierarkisk (f.eks. "Dataanalyse" under "Forskningsmetoder")
* Færdigheder kan yderligere evalueres af peers (360°-evaluering)

## Visning af certifikat- og færdighedsstatus

Som underviser kan du se:

* Hvilke kursister der har opnået certifikater på dit kursus
* Hvilke færdigheder der er blevet valideret
* Kursisternes fremskridt mod certificeringstærsklen
* Hvilke certifikater der er udløbet eller snart udløber, og om der allerede er sendt en påmindelse om dem

Kursister kan se deres egne certifikater og validerede færdigheder fra deres profil og kan tilgå Færdighedshjulet for at tjekke, hvilke færdigheder der er efterspurgte i deres organisation.

## Tips

* **Sæt klare forventninger** — Fortæl kursisterne ved kursusstart, hvad de skal opnå for at få et certifikat
* **Brug meningsfulde færdighedsnavne** — Færdigheder bør beskrive, hvad kursisten kan, og ikke bare kursusnavnet
* **Kombiner med porteføljer** — Opfordr kursister til at tilføje deres certifikater til deres portefølje
* **Udvid certifikater** — Bed din administrator om at aktivere pluginnet [Custom Certificate](../plugins/custom-certificate.md) for at få endnu mere kraftfuld skabelonstyring af certifikater
* **Angiv en gyldighedsperiode for overholdelsesdrevne certificeringer** — Hvis en certificering skal fornyes periodisk (f.eks. sikkerhedstræning), skal du angive **Certifikatgyldighed (dage)**, så kursisterne bliver mindet, før den udløber