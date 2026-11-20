# BuyCourses: Betalinger og tilbagevendende tjenester

Pluginnet **BuyCourses** sælger adgang til kurser og sessioner og kan tilbyde betalte tjenester. Betalingsmetoder afhænger af, hvilke gateways der er konfigureret for installationen.

## Betalingskonfiguration

Åbn **Administration > Plugins > BuyCourses**, og gå til betalingskonfigurationsområdet. Opbevar gateway-legitimationsoplysningerne på serveren, ikke på en side, der er synlig for kursister. Eksisterende metoder som Stripe og PayPal fungerer fortsat uafhængigt af BTCPay Server.

### BTCPay Server (køb af kurser og sessioner)

Pluginnet understøtter også **BTCPay Server** til køb af kurser og sessioner:

1. Aktivér BTCPay-betalingsmetoden i BuyCourses-konfigurationen.
2. Angiv BTCPay **Server URL**, **Store ID**, **Greenfield API key** og **webhook secret**.
3. Brug betalingskonfigurationens **forbindelsestest** til at bekræfte adgang til Greenfield API.
4. Konfigurér webhooken i BTCPay-enden ved hjælp af den webhook-URL, som pluginnet viser, og den samme hemmelighed.
5. Gennemfør et lille testkøb, før denne mulighed tilbydes kursister.

Køberen omdirigeres til den BTCPay-hostede checkout. Chamilo verificerer webhook-signaturer og henter fakturaen igen for at validere **butik, beløb, valuta og ordreoplysninger**, før ordren markeres som betalt, og køberen tilmeldes. En tilbagevenden via browseren kan afstemme en manglende eller forsinket webhook. Gentagne notifikationer opretter ikke dobbelt opfyldelse.

Kun verificerede afregnede betalinger (herunder accepterede overbetalinger og fakturaer, der udtrykkeligt er markeret som afregnet af en administrator) giver adgang. **Delvise, forsinkede, udløbne eller ugyldige betalinger må ikke behandles som automatisk opfyldt**; ekstraordinære betalinger kræver manuel gennemgang.

**Eksisterende installationer:** Kør pluginnets opdateringsprocedure én gang for at oprette `plugin_buycourses_btcpay_account`. En administrator kan åbne `/plugin/BuyCourses/update.php` eller gemme BTCPay-betalingskonfigurationen, hvilket også sikrer, at plugin-tabellen findes. Denne opdatering er specifik for BuyCourses og er ikke en global databasemigrering.

BTCPay er **ikke** dokumenteret her som en gateway til tilbagevendende tjenester; antag ikke, at den implementerer automatiske abonnementsfornyelser i stil med Stripe/PayPal.

## Livscyklus for tilbagevendende tjenester

Kursister kan bruge **Mine tjenester** til at se deres aktive tilbagevendende tjenester og deres købs-/betalingshistorik. For tjenester med understøttede automatiske fornyelser:

* Hver fornyelsesbetaling har sin egen historiske post og kvittering.
* Annullering af en fornyelse forhindrer fremtidige opkrævninger, men lader den betalte tjeneste være tilgængelig, indtil den aktuelle betalte periode udløber.
* Administratorer kan også annullere fornyelser fra **salgsrapporten for tjenester**.
* Et aktivt, afventende eller på anden måde igangværende tilbagevendende abonnement er beskyttet mod dubletkøb.
* En udløbet eller fuldt annulleret tjeneste kan købes igen.

**Købshistorik** og **betalingshistorik** er adskilte: ét tjenestekøb kan have flere fornyelsesbetalinger. Antag ikke, at en fornyet betaling er et andet køb.

## Betalingstotaler for tjenestesalg

I administratorens **salgsrapport for tjenester** hjælper to kolonner med at skelne det oprindelige ordrebeløb fra betalinger, der er indsamlet over tid:

* **Seneste betaling** viser datoen for den senest registrerede vellykkede betaling for det pågældende tjenestesalg. Hvis ingen betalingsdato er tilgængelig, viser rapporten en tankestreg.
* **Indsamlet i alt** viser det oprindeligt indsamlede købsbeløb plus registrerede vellykkede fornyelsesbeløb, formateret i tjenestens valuta. Det er ikke det samme som prisen for en enkelt faktureringsperiode.

Beregningen bruger revisionshistorikken for tjenestesalget, undgår at tælle dubletfornyelseshændelser og medregner den indledende Stripe-abonnementsopkrævning uden at tælle den to gange. Ved ekstraordinære betalings- eller refusionstilfælde skal rapporten afstemmes med betalingsudbyderen; det viste beløb er ikke en gateway-udbetaling eller en separat refusionsbog.

## Historiske Stripe-abonnementer

BuyCourses kan afstemme Stripe-fakturahistorik for ældre tilbagevendende tjenester, hvis fornyelsestransaktioner ikke blev fuldt registreret i pluginnets revisionslog. Visningen **Mine tjenester** og salgsrapporten for tjenester kan opdatere disse poster og opdatere den lokalt kendte betalte periode og totalerne. Administratorer bør verificere ekstraordinære forskelle i betalingshistorikken mod Stripe i stedet for at redigere salg direkte.

## Filtrering af salgsrapporter

**Salgsrapporten for kurser og sessioner** kan filtreres efter ordrestatus, bruger, datointerval eller e-mail. Valgfrie produktfiltre giver mulighed for at indsnævre resultater efter produkttype og produktnavn. **Salgsrapporten for tjenester** understøtter statusfiltrering samt søgning på bruger/e-mail/navn/ordrereference og søgning på tjenestenavn. Gennemgå de aktive filtre, før salg eksporteres eller afstemmes; de to rapportskærme har forskellige filterkontroller.

Se [BuyCourses-salgsfiltre PR #9387](https://github.com/chamilo/chamilo-lms/pull/9387).

---
## Livscyklus for abonnementsrelaterede kurser og sikkerhedsforanstaltninger ved sletning

BuyCourses kan lukke, skjule og genaktivere kurser, der er knyttet til tilbagevendende tjenesteabonnementer, når deres betalingsstatus ændres. I en tjenestes **Subscription behavior JSON** angiver `hide_after_days` forsinkelsen efter lukning, før et kursus skjules (standard 30 dage), mens `delete_after_days` angiver forsinkelsen efter skjulning, før permanent sletning. Sletning er deaktiveret som standard (`null`); kun en positiv værdi gør et kursus berettiget.

Administratorer kan gennemgå berettigede, afventende og blokerede kurser på `/admin/buycourses/course-lifecycle`. Grænsefladen understøtter en ikke-destruktiv simulering og målrettet sletning af **ét berettiget kursus pr. kørsel**, beskyttet af eksplicit bekræftelse. CLI-processoren `chamilo:buycourses:process-recurring-subscriptions` understøtter også `--dry-run`, `--delete-expired` og `--max-deletions` (1–25). Uden `--delete-expired` sletter den ikke kurser permanent.

**Permanent sletning er destruktiv.** Behold sikkerhedskopier, og test først med kurser, der kan kasseres. Berettigelseskontroller beskytter aktive salg, sessionsknyttede kurser og inkonsistent ejerskab; automatisk sletning er blokeret for installationer med flere adgangs-URL'er. Gennemgå samtidig fornyelses-/sletningsadfærd, før destruktiv oprydning planlægges i produktion. Se [PR #9442 om livscyklus for abonnementskurser](https://github.com/chamilo/chamilo-lms/pull/9442).

## Driftstjek

Efter opgradering skal du teste et komplet kursuskøb, et sessionskøb hvis det sælges, en forsinket/genafspillet webhook, udløbne og delvise BTCPay-fakturaer, en automatisk fornyelse og annullering med adgang, der varer indtil udgangen af den betalte periode. Hold legitimationsoplysninger og webhook-hemmeligheder ude af skærmbilleder, logfiler og supportsager.

## Hærdning af betalinger

### Beløbskontrol i gateway (Redsys / Cecabank)

Når banken meddeler platformen, at en betaling er gennemført, sammenligner BuyCourses det beløb, banken har opkrævet (i cent, fra den signerede notifikation), med salgsprisen. Hvis de afviger, afvises notifikationen, salget forbliver afventende, og en linje `[BuyCourses] Redsys notification refused` eller `[BuyCourses] Cecabank notification refused` skrives til PHP-fejlloggen. Normale betalinger påvirkes ikke.

Hvis et salg forbliver afventende, selvom køberen har betalt, skal du kontrollere loggen: en pris, der er ændret efter ordren blev oprettet, eller en delbetaling, vil fremgå der. Afslut et sådant salg manuelt fra salgsrapporten, når det er verificeret.

### Sikkerhedstokens

* Kuponformularer (tilføj / konfigurer), formularen til offentlige plankort og udbetalingshandlingerne bruger samme BuyCourses-administratortoken som alle andre plugin-administrationssider. En formular, der har stået åben i lang tid, virker stadig, så længe sessionen er aktiv; efter log ud og ind igen skal siden genindlæses før lagring (ellers vises meddelelsen "Not validated").
* Siden "anmod om faktura" (`request_invoice.php`) og webudløseren af `process_recurring_subscriptions.php` kræver tokenet i linket (`buycourses_admin_sec_token=...`). Links, der er bogmærket eller sendt uden det, viser "Not validated". Kørslen via kommandolinje/cron (`php .../process_recurring_subscriptions.php` eller konsolkommandoen) er uændret og kræver intet token.
* Succes-sider (PayPal, Stripe, abonnementer, tjenester) viser kun et salg for den bruger, der købte det.
* Udbetalingshandlinger (PayPal-massebetaling, annullering af en udbetaling) er begrænset til platformsadministratorer (sessionsadministratorer accepteres ikke længere) og skal sendes som POST med tokenet.

### Datoer

Slutdatoen for et abonnementssalg beregnes nu altid i UTC, ligesom salgsdatoen, uanset serverens tidszone.

### Multi-URL-grænser

Grænserne for kursusoprettelse og hosting, der anvendes når en tjeneste udløber, følger samme regel som resten af platformen: en indstilling, der er låst eller markeret som ikke ændrbar på hoved-URL'en, kan ikke tilsidesættes af en anden URL.

Ændringer: [BTCPay #9286](https://github.com/chamilo/chamilo-lms/pull/9286), [tilbagevendende tjenester #9288](https://github.com/chamilo/chamilo-lms/pull/9288), [Stripe-afstemning #9293](https://github.com/chamilo/chamilo-lms/pull/9293), [totaler for tjenestesalg #9220](https://github.com/chamilo/chamilo-lms/pull/9220).