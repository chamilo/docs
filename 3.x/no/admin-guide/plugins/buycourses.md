# BuyCourses: Betalinger og gjentakende tjenester

**BuyCourses**-pluginen selger tilgang til kurs og sesjoner og kan tilby betalte tjenester. Betalingsmetoder avhenger av hvilke betalingsløsninger som er konfigurert for installasjonen.

## Betalingskonfigurasjon

Åpne **Administrasjon > Plugins > BuyCourses** og gå til betalingskonfigurasjonsområdet. Oppbevar legitimasjonen for betalingsløsningen på serveren, ikke på en side som er synlig for deltakere. Eksisterende metoder som Stripe og PayPal fortsetter å fungere uavhengig av BTCPay Server.

### BTCPay Server (kjøp av kurs og sesjoner)

Pluginen støtter også **BTCPay Server** for kjøp av kurs og sesjoner:

1. Aktiver BTCPay-betalingsmetoden i BuyCourses-konfigurasjonen.
2. Angi BTCPay **Server URL**, **Store ID**, **Greenfield API key** og **webhook secret**.
3. Bruk betalingskonfigurasjonens **tilkoblingstest** for å bekrefte tilgang til Greenfield API.
4. Konfigurer webhooken på BTCPay-siden ved hjelp av webhook-URL-en som vises av pluginen, og den samme hemmeligheten.
5. Fullfør et lite testkjøp før du tilbyr dette alternativet til deltakere.

Kjøperen omdirigeres til den BTCPay-vertsbaserte kassen. Chamilo verifiserer webhook-signaturer og henter fakturaen på nytt for å validere **butikk, beløp, valuta og ordredetaljer** før bestillingen merkes som betalt og kjøperen meldes på. En retur i nettleseren kan avstemme en tapt eller forsinket webhook. Gjentatte varsler oppretter ikke duplisert oppfyllelse.

Kun verifiserte oppgjorte betalinger (inkludert aksepterte overbetalinger og fakturaer som er eksplisitt merket som oppgjort av administrator) gir tilgang. **Delvise, forsinkede, utløpte eller ugyldige betalinger må ikke behandles som automatisk oppfylt**; unntaksbetalinger krever manuell gjennomgang.

**Eksisterende installasjoner:** Kjør pluginens oppdateringsprosedyre én gang for å opprette `plugin_buycourses_btcpay_account`. En administrator kan åpne `/plugin/BuyCourses/update.php` eller lagre BTCPay-betalingskonfigurasjonen, noe som også sikrer at plugin-tabellen finnes. Denne oppdateringen gjelder spesifikt BuyCourses, ikke en global databasemigrering.

BTCPay er **ikke** dokumentert her som en betalingsløsning for gjentakende tjenester; ikke anta at den implementerer automatiske abonnementsfornyelser i stil med Stripe/PayPal.

## Livssyklus for gjentakende tjenester

Deltakere kan bruke **Mine tjenester** til å se sine aktive gjentakende tjenester og sin kjøps-/betalingshistorikk. For tjenester med støttede automatiske fornyelser:

* Hver fornyelsesbetaling har sin egen historiske post og kvittering.
* Å avbryte en fornyelse hindrer fremtidige belastninger, men lar den betalte tjenesten være tilgjengelig til den gjeldende betalte perioden utløper.
* Administratorer kan også avbryte fornyelser fra **rapporten for tjenestesalg**.
* Et aktivt, ventende eller på annen måte levende gjentakende abonnement er beskyttet mot dupliserte kjøp.
* En utløpt eller fullstendig kansellert tjeneste kan kjøpes på nytt.

**Kjøpshistorikk** og **betalingshistorikk** er separate: ett tjenestekjøp kan ha flere fornyelsesbetalinger. Ikke anta at en fornyet betaling er et andre kjøp.

## Betalingssummer for tjenestesalg

I administratorens **rapport for tjenestesalg** hjelper to kolonner med å skille det opprinnelige ordrebeløpet fra betalinger innkrevd over tid:

* **Siste betaling** viser datoen for den siste registrerte vellykkede betalingen for det tjenestesalget. Hvis ingen betalingsdato er tilgjengelig, viser rapporten en strek.
* **Totalt innkrevd** viser det opprinnelige innkrevde kjøpsbeløpet pluss registrerte vellykkede fornyelsesbeløp, formatert i tjenestens valuta. Det er ikke det samme som prisen for én faktureringsperiode.

Beregningen bruker revisjonshistorikken for tjenestesalget, unngår å telle dupliserte fornyelseshendelser og tar hensyn til den opprinnelige Stripe-abonnementsbelastningen uten å telle den to ganger. For unntakstilfeller med betaling eller refusjon, avstem rapporten med betalingsleverandøren; beløpet som vises, er ikke en utbetaling fra betalingsløsningen eller en separat refusjonsreskontro.

## Historiske Stripe-abonnementer

BuyCourses kan avstemme Stripe-fakturahistorikk for eldre gjentakende tjenester der fornyelsestransaksjoner ikke ble fullstendig registrert i pluginens revisjonslogg. Visningen **Mine tjenester** og rapporten for tjenestesalg kan oppdatere disse postene og oppdatere den lokalt kjente betalte perioden og summene. Administratorer bør verifisere avvik i eksepsjonell betalingshistorikk mot Stripe i stedet for å redigere salg direkte.

## Filtrering av salgsrapporter

**Rapporten for kurs- og sesjonssalg** kan filtreres etter ordrestatus, bruker, datoperiode eller e-post. Valgfrie produktfiltre lar deg begrense resultatene etter produkttype og produktnavn. **Rapporten for tjenestesalg** støtter statusfiltrering samt søk på bruker/e-post/navn/ordrereferanse og søk på tjenestenavn. Gjennomgå de aktive filtrene før du eksporterer eller avstemmer salg; de to rapportskjermene har ulike filterkontroller.

Se [BuyCourses-salgsfiltre PR #9387](https://github.com/chamilo/chamilo-lms/pull/9387).

---
## Livssyklus for abonnementsrelaterte kurs og sikringer mot sletting

BuyCourses kan lukke, skjule og reaktivere kurs knyttet til gjentakende tjenesteabonnementer når betalingsstatusen endres. I en tjenestes **Subscription behavior JSON** angir `hide_after_days` forsinkelsen etter lukking før et kurs skjules (standard 30 dager), mens `delete_after_days` angir forsinkelsen etter skjuling før permanent sletting. Sletting er deaktivert som standard (`null`); bare en positiv verdi gjør et kurs kvalifisert.

Administratorer kan gjennomgå kvalifiserte, ventende og blokkerte kurs på `/admin/buycourses/course-lifecycle`. Grensesnittet støtter en ikke-destruktiv simulering og målrettet sletting av **ett kvalifisert kurs per kjøring**, beskyttet av eksplisitt bekreftelse. CLI-prosessoren `chamilo:buycourses:process-recurring-subscriptions` støtter også `--dry-run`, `--delete-expired` og `--max-deletions` (1–25). Uten `--delete-expired` sletter den ikke kurs permanent.

**Permanent sletting er destruktiv.** Ta sikkerhetskopier og test først med engangskurs. Kvalifiseringskontroller beskytter aktive salg, øktkoblede kurs og inkonsistent eierskap; automatisk sletting er blokkert for installasjoner med flere tilgangs-URL-er. Gjennomgå samtidig fornyelses-/slettingsatferd før du planlegger destruktiv opprydding i produksjon. Se [PR for livssyklus for abonnementskurs #9442](https://github.com/chamilo/chamilo-lms/pull/9442).

## Driftssjekker

Etter oppgradering, test et fullstendig kurskjøp, et øktkjøp hvis det selges, en forsinket/gjentatt webhook, utløpte og delvise BTCPay-fakturaer, en automatisk fornyelse, og kansellering med tilgang som varer til slutten av den betalte perioden. Hold legitimasjon og webhook-hemmeligheter unna skjermbilder, logger og supportsaker.

## Herding av betalinger

### Beløpskontroll i betalingsgateway (Redsys / Cecabank)

Når banken varsler plattformen om at en betaling lyktes, sammenligner BuyCourses beløpet banken belastet (i cent, fra den signerte varslingen) med salgsprisen. Hvis de avviker, avvises varslingen, salget forblir ventende, og en linje `[BuyCourses] Redsys notification refused` eller `[BuyCourses] Cecabank notification refused` skrives til PHP-feilloggen. Vanlige betalinger påvirkes ikke.

Hvis et salg forblir ventende selv om kjøperen har betalt, sjekk loggen: en pris som ble endret etter at bestillingen ble opprettet, eller en delbetaling, vil vises der. Fullfør et slikt salg manuelt fra salgsrapporten når det er verifisert.

### Sikkerhetstokener

* Kupongskjemaer (legg til / konfigurer), skjemaet for offentlige plankort og utbetalingshandlingene bruker samme BuyCourses-administratortoken som alle andre administrasjonssider for programtillegget. Et skjema som står åpent lenge, fungerer fortsatt så lenge økten er aktiv; etter utlogging og innlogging igjen, last siden på nytt før lagring (ellers vises meldingen «Not validated»).
* Siden «request invoice» (`request_invoice.php`) og web-utløseren for `process_recurring_subscriptions.php` trenger tokenet i lenken (`buycourses_admin_sec_token=...`). Lenker som ble bokmerket eller sendt på e-post uten det, viser «Not validated». Kjøring via kommandolinje/cron (`php .../process_recurring_subscriptions.php` eller konsollkommandoen) er uendret og trenger ingen token.
* Suksesssider (PayPal, Stripe, abonnementer, tjenester) viser et salg bare til brukeren som kjøpte det.
* Utbetalingshandlinger (PayPal-massebetaling, kansellering av en utbetaling) er begrenset til plattformadministratorer (øktadministratorer godtas ikke lenger) og må sendes som POST med tokenet.

### Datoer

Sluttdatoen for et abonnementssalg beregnes nå alltid i UTC, i likhet med salgsdatoen, uavhengig av serverens tidssone.

### Grenser for flere URL-er

Grensene for kursoppretting og hosting som brukes når en tjeneste utløper, følger samme regel som resten av plattformen: en innstilling som er låst, eller merket som ikke endringsbar, på hoved-URL-en kan ikke overstyres av en annen URL.

Endringer: [BTCPay #9286](https://github.com/chamilo/chamilo-lms/pull/9286), [gjentakende tjenester #9288](https://github.com/chamilo/chamilo-lms/pull/9288), [Stripe-avstemming #9293](https://github.com/chamilo/chamilo-lms/pull/9293), [totaler for tjenestesalg #9220](https://github.com/chamilo/chamilo-lms/pull/9220).