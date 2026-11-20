# BuyCourses: Betalningar och återkommande tjänster

Pluginet **BuyCourses** säljer åtkomst till kurser och sessioner och kan erbjuda betalda tjänster. Betalningsmetoder beror på vilka gateways som har konfigurerats för installationen.

## Betalningskonfiguration

Öppna **Administration > Plugins > BuyCourses** och gå till dess betalningskonfigurationsområde. Underhåll gateway-autentiseringsuppgifterna på servern, inte på en sida som riktar sig till deltagare. Befintliga metoder såsom Stripe och PayPal fortsätter att fungera oberoende av BTCPay Server.

### BTCPay Server (köp av kurser och sessioner)

Pluginet stöder även **BTCPay Server** för köp av kurser och sessioner:

1. Aktivera betalningsmetoden BTCPay i BuyCourses-konfigurationen.
2. Ange BTCPay **Server URL**, **Store ID**, **Greenfield API key** och **webhook secret**.
3. Använd betalningskonfigurationens **connection test** för att bekräfta åtkomst till Greenfield API.
4. Konfigurera webhooken på BTCPay-sidan med den webhook-URL som pluginet visar och samma hemlighet.
5. Genomför ett litet testköp innan detta alternativ erbjuds till deltagare.

Köparen omdirigeras till den BTCPay-värdade kassan. Chamilo verifierar webhook-signaturer och hämtar fakturan på nytt för att validera **butik, belopp, valuta och orderuppgifter** innan ordern markeras som betald och köparen registreras. En återkomst i webbläsaren kan stämma av en missad eller fördröjd webhook. Upprepade aviseringar skapar inte dubbel leverans.

Endast verifierade slutförda betalningar (inklusive accepterade överbetalningar och fakturor som uttryckligen markerats som slutförda av en administratör) ger åtkomst. **Partiella, sena, utgångna eller ogiltiga betalningar får inte behandlas som automatiskt fullgjorda**; undantagsbetalningar kräver manuell granskning.

**Befintliga installationer:** Kör pluginets uppdateringsprocedur en gång för att skapa `plugin_buycourses_btcpay_account`. En administratör kan öppna `/plugin/BuyCourses/update.php` eller spara BTCPay-betalningskonfigurationen, vilket också säkerställer att plugin-tabellen finns. Denna uppdatering är specifik för BuyCourses och är inte en global databasmigrering.

BTCPay är **inte** dokumenterad här som en gateway för återkommande tjänster; utgå inte från att den implementerar automatiska prenumerationsförnyelser i stil med Stripe/PayPal.

## Livscykel för återkommande tjänster

Deltagare kan använda **My Services** för att visa sina aktiva återkommande tjänster och sin köp-/betalningshistorik. För tjänster med stödda automatiska förnyelser:

* Varje förnyelsebetalning har en egen historisk post och ett eget kvitto.
* Att avbryta en förnyelse förhindrar framtida debiteringar men lämnar den betalda tjänsten tillgänglig tills den aktuella betalda perioden löper ut.
* Administratörer kan också avbryta förnyelser från **service sales report**.
* En aktiv, väntande eller på annat sätt pågående återkommande prenumeration skyddas mot dubbla köp.
* En utgången eller helt avbruten tjänst kan köpas igen.

**Purchase history** och **payment history** är åtskilda: ett enskilt tjänsteköp kan ha flera förnyelsebetalningar. Dra inte slutsatsen att en förnyad betalning är ett andra köp.

## Betalningstotaler för tjänsteförsäljning

I administratörens **service sales report** hjälper två kolumner till att skilja det ursprungliga orderbeloppet från betalningar som samlats in över tid:

* **Last payment** visar datumet för den senaste registrerade lyckade betalningen för den tjänsteförsäljningen. Om inget betalningsdatum finns tillgängligt visar rapporten ett streck.
* **Total collected** visar det initialt inkasserade köpbeloppet plus registrerade lyckade förnyelsebelopp, formaterat i tjänstens valuta. Det är inte detsamma som priset för en enskild faktureringsperiod.

Beräkningen använder granskningshistoriken för tjänsteförsäljningen, undviker att räkna dubbla förnyelsehändelser och tar hänsyn till den initiala Stripe-prenumerationsdebiteringen utan att räkna den två gånger. För undantagsfall med betalning eller återbetalning, stäm av rapporten mot betalningsleverantören; det visade beloppet är inte en gateway-utbetalning eller en separat återbetalningsreskontra.

## Historiska Stripe-prenumerationer

BuyCourses kan stämma av Stripe-fakturahistorik för äldre återkommande tjänster vars förnyelsetransaktioner inte registrerades fullständigt i pluginets granskningslogg. Vyn **My Services** och tjänsteförsäljningsrapporten kan uppdatera dessa poster och uppdatera den lokalt kända betalda perioden och totalerna. Administratörer bör verifiera undantagsavvikelser i betalningshistoriken mot Stripe i stället för att redigera försäljningar direkt.

## Filtrering av försäljningsrapporter

**Course and session sales report** kan filtreras efter orderstatus, användare, datumintervall eller e-post. Valfria produktfilter låter dig begränsa resultaten efter produkttyp och produktnamn. **Service sales report** stöder statusfiltrering samt sökning på användare/e-post/namn/orderreferens och en sökning på tjänstenamn. Granska de aktiva filtren innan du exporterar eller stämmer av försäljning; de två rapportvyerna har olika filterkontroller.

Se [BuyCourses sales filters PR #9387](https://github.com/chamilo/chamilo-lms/pull/9387).

## Livscykel för prenumerationskopplade kurser och skydd mot radering

BuyCourses kan stänga, dölja och återaktivera kurser som är kopplade till återkommande tjänsteprenumerationer när deras betalstatus ändras. I en tjänsts **Subscription behavior JSON** anger `hide_after_days` fördröjningen efter stängning innan en kurs döljs (standard 30 dagar), medan `delete_after_days` anger fördröjningen efter döljning innan permanent radering. Radering är inaktiverad som standard (`null`); endast ett positivt värde gör en kurs berättigad.

Administratörer kan granska berättigade, väntande och blockerade kurser på `/admin/buycourses/course-lifecycle`. Gränssnittet stöder en icke-destruktiv simulering och riktad radering av **en berättigad kurs per körning**, skyddad av explicit bekräftelse. CLI-processorn `chamilo:buycourses:process-recurring-subscriptions` stöder även `--dry-run`, `--delete-expired` och `--max-deletions` (1–25). Utan `--delete-expired` raderas inte kurser permanent.

**Permanent radering är destruktiv.** Behåll säkerhetskopior och testa först med engångskurser. Behörighetskontroller skyddar aktiva försäljningar, sessionskopplade kurser och inkonsekvent ägarskap; automatisk radering är blockerad för installationer med flera åtkomst-URL:er. Granska samtidigt förnyelse-/raderingsbeteende innan destruktiv rensning schemaläggs i produktion. Se [PR för livscykel för prenumerationskurser #9442](https://github.com/chamilo/chamilo-lms/pull/9442).

## Driftskontroller

Efter uppgradering, testa ett fullständigt kursköp, ett sessionsköp om det säljs, en fördröjd/omspelad webhook, utgångna och partiella BTCPay-fakturor, en automatisk förnyelse och avbokning med åtkomst som varar till slutet av den betalda perioden. Håll autentiseringsuppgifter och webhook-hemligheter borta från skärmbilder, loggar och supportärenden.

## Härdning av betalningar

### Beloppskontroll i gateway (Redsys / Cecabank)

När banken meddelar plattformen att en betalning lyckades jämför BuyCourses beloppet som banken debiterade (i cent, från den signerade aviseringen) med försäljningspriset. Om de skiljer sig åt avvisas aviseringen, försäljningen förblir väntande och en rad `[BuyCourses] Redsys notification refused` eller `[BuyCourses] Cecabank notification refused` skrivs till PHP-felloggen. Normala betalningar påverkas inte.

Om en försäljning förblir väntande trots att köparen betalade, kontrollera loggen: ett pris som ändrats efter att ordern skapades, eller en delbetalning, syns där. Slutför en sådan försäljning manuellt från försäljningsrapporten när den har verifierats.

### Säkerhetstoken

* Kupongformulär (lägg till / konfigurera), formuläret för offentliga plankort och utbetalningsåtgärderna använder samma BuyCourses-administratörstoken som alla andra administratörssidor för insticksmodulen. Ett formulär som lämnats öppet länge fungerar fortfarande så länge sessionen är aktiv; efter utloggning och inloggning igen, ladda om sidan innan du sparar (annars visas meddelandet "Not validated").
* Sidan "begär faktura" (`request_invoice.php`) och webbutlösaren för `process_recurring_subscriptions.php` behöver token i länken (`buycourses_admin_sec_token=...`). Länkar som bokmärkts eller skickats via e-post utan den visar "Not validated". Körning via kommandorad/cron (`php .../process_recurring_subscriptions.php` eller konsolkommandot) är oförändrad och behöver ingen token.
* Framgångssidor (PayPal, Stripe, prenumerationer, tjänster) visar endast en försäljning för den användare som köpte den.
* Utbetalningsåtgärder (PayPal-massbetalning, avbrytande av en utbetalning) är begränsade till plattformsadministratörer (sessionsadministratörer accepteras inte längre) och måste skickas som POST med token.

### Datum

Slutdatumet för en prenumerationsförsäljning beräknas nu alltid i UTC, liksom försäljningsdatumet, oavsett serverns tidszon.

### Begränsningar för flera URL:er

Gränserna för kursskapande och värdskap som tillämpas när en tjänst löper ut följer samma regel som resten av plattformen: en inställning som är låst, eller markerad som inte ändringsbar, på huvud-URL:en kan inte åsidosättas av en annan URL.

Ändringar: [BTCPay #9286](https://github.com/chamilo/chamilo-lms/pull/9286), [återkommande tjänster #9288](https://github.com/chamilo/chamilo-lms/pull/9288), [Stripe-avstämning #9293](https://github.com/chamilo/chamilo-lms/pull/9293), [summor för tjänsteförsäljning #9220](https://github.com/chamilo/chamilo-lms/pull/9220).