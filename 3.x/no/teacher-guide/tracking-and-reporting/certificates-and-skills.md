# Sertifikater og ferdigheter

Chamilo lar deg tildele sertifikater til lærende som oppfyller spesifikke prestasjonskriterier, og å validere ferdigheter knyttet til disse prestasjonene.

## Slik fungerer sertifikater

Sertifikater er knyttet til **Vurderinger** (også kalt Gradebook). Når en lærendes karakter møter eller overstiger den minste terskelen du definerer, blir et sertifikat tilgjengelig for nedlasting.

Arbeidsflyten er:

1. Sett opp [Vurderinger](../assessing-learners/gradebook.md) med øvelsene, innleveringene og andre vurderte aktiviteter
2. Definer en **minimum poengsum for sertifisering** (f.eks. 70 %)
3. Når en lærende når den poengsummen, kan de laste ned sertifikatet sitt (enten i selve Vurderinger-verktøyet, eller fra en læringssti hvis du har konfigurert det siste steget for det). Som lærer kan du også bruke handlingen **Generer sertifikater** i karakterboken for å opprette PDF-ene i batch for alle kvalifiserte lærende.

## Sertifikatmaler

Sertifikater bruker maler definert av plattformadministratoren. Malen inkluderer vanligvis:

* Den lærendes navn
* Kursnavnet
* Datoen for fullføring
* Den oppnådde poengsummen
* En QR-kode eller URL for nettbasert verifisering

## Sertifikatets gyldighet og utløp

Sertifikater kan settes til å utløpe etter et gitt antall dager. I innstillingene for [Vurderinger](../assessing-learners/gradebook.md) for rotkategorien, når **Generer sertifikater** er aktivert, vises feltet **Sertifikatets gyldighet (dager)**. La det stå på `0` (standard) for sertifikater som aldri utløper, eller sett et antall dager for at et sertifikat skal utløpe så mange dager etter at det ble utstedt.

Hvert sertifikats egen utløpsdato beregnes automatisk fra den innstillingen når det genereres (eller regenereres) — du setter den ikke sertifikat for sertifikat. Listen **Sertifikater** viser en kolonne **Utløpsdato** for hver lærende, med teksten **Utløper aldri** når ingen gyldighetsperiode gjelder.

Hvis kategorien ikke har noen gyldighetsperiode konfigurert, kan du likevel sette (eller endre) en individuell lærendes utløpsdato manuelt: klikk på blyantknappen **Rediger utløpsdato** ved siden av oppføringen deres og velg en dato. Denne knappen er bare tilgjengelig når kategorien selv ikke har noen gyldighetsperiode — når en gyldighetsperiode er satt, administreres utløpsdatoer automatisk og kan ikke lenger redigeres sertifikat for sertifikat.

![Sertifikatlisten som viser kolonnen Utløpsdato for tre lærende](../../.gitbook/assets/gradebook-certificates-expiry-dates.png)

### Påminnelse til lærende om kommende eller tidligere utløp

Åpne listen **Sertifikater** for vurderingen din og klikk på knappen **Utløpende sertifikater** <img src="../../.gitbook/assets/icons/mdi-calendar-clock.svg" alt="Utløpende sertifikater" data-size="line"> for å se hvilke lærendes sertifikater som har utløpt eller er i ferd med å utløpe. Siden viser, per lærende: sertifikatets **Utløpsdato**, **Status** (**Utløpt** eller **Utløper snart**), og når en påminnelse om det ble **Sist påminnelse sendt** (eller **Aldri**). Bruk **Dager i forveien** for å utvide eller innsnevre hvor langt inn i fremtiden «utløper snart» ser.

![Siden Utløpende sertifikater som lister ett utløpt og ett snart utløpende sertifikat](../../.gitbook/assets/gradebook-certificate-expirations.png)

For å varsle lærende selv:

1. Velg de lærende du vil minne (eller velg alle)
2. Klikk **Send varsling**
3. Gå gjennom forhåndsvisningen av e-posten som vil bli sendt — separate forhåndsvisninger vises for ordlyden «utløper snart» og «utløpt», avhengig av hvilke av de valgte lærende som faller inn under hvert tilfelle
4. Bekreft ved å klikke **Send varsling** på nytt i dialogen

![Bekreftelsesdialogen Send varsling som forhåndsviser e-postordlyden for utløpende og utløpte](../../.gitbook/assets/gradebook-certificate-expiry-notification.png)

Hver lærende varsles på sitt eget konfigurerte språk, både via e-post og via en intern Chamilo-melding. Å sende på nytt for samme sertifikat og samme utløpsdato er trygt — Chamilo sporer hva som allerede er sendt per sertifikat og vil ikke spamme en lærende med dupliserte påminnelser med mindre du eksplisitt sender på nytt.

Administratorer kan også planlegge de samme påminnelsene automatisk, på gjentakende basis, uten at en lærer må utløse dem manuelt — se [Innstillinger for cron-jobber](../../admin-guide/platform-settings/crons-settings.md#certificate-expiry-reminders).

## Ferdigheter

Ferdigheter representerer kompetanser som lærende tilegner seg. I Chamilo:

* Ferdigheter kan knyttes til prestasjoner i karakterboken
* Når en lærende oppnår et sertifikat, valideres eventuelle tilknyttede ferdigheter automatisk
* Ferdigheter akkumuleres på den lærendes profil og skaper en kompetanseoversikt
* Ferdigheter kan organiseres hierarkisk (f.eks. «Dataanalyse» under «Forskningsmetoder»)
* Ferdigheter kan videre evalueres av jevnaldrende (360°-evaluering)

## Visning av sertifikat- og ferdighetsstatus

Som lærer kan du se:

* Hvilke deltakere som har oppnådd sertifikater i kurset ditt
* Hvilke ferdigheter som er validert
* Deltakernes fremgang mot sertifiseringsterskelen
* Hvilke sertifikater som har utløpt eller snart utløper, og om det allerede er sendt en påminnelse for dem

Deltakere kan se sine egne sertifikater og validerte ferdigheter fra profilen sin, og kan åpne ferdighetshjulet (Skills Wheel) for å sjekke hvilke ferdigheter som er etterspurt i organisasjonen.

## Tips

* **Sett tydelige forventninger** — Fortell deltakerne ved kursstart hva de må oppnå for å få et sertifikat
* **Bruk meningsfulle ferdighetsnavn** — Ferdigheter bør beskrive hva deltakeren kan gjøre, ikke bare kursnavnet
* **Kombiner med porteføljer** — Oppfordre deltakerne til å legge sertifikatene sine inn i porteføljen
* **Utvid sertifikater** — Be administratoren om å aktivere [Custom Certificate](../plugins/custom-certificate.md)-tillegget for enda mer kraftfull sertifikatmaling
* **Sett en gyldighetsperiode for samsvarsstyrte sertifiseringer** — Hvis en sertifisering må fornyes jevnlig (f.eks. sikkerhetsopplæring), sett **Certificate validity (days)** slik at deltakerne får påminnelse før den utløper