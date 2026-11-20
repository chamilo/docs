# BuyCourses: betalingen en terugkerende diensten

De plugin **BuyCourses** verkoopt toegang tot cursussen en sessies en kan betaalde diensten aanbieden. De beschikbare betaalmethoden hangen af van welke gateways voor de installatie zijn geconfigureerd.

## Betalingsconfiguratie

Open **Beheer > Plugins > BuyCourses** en ga naar het configuratiegebied voor betalingen. Bewaar de gatewaygegevens op de server, niet op een pagina die voor cursisten zichtbaar is. Bestaande methoden zoals Stripe en PayPal blijven onafhankelijk van BTCPay Server werken.

### BTCPay Server (aankopen van cursussen en sessies)

De plugin ondersteunt ook **BTCPay Server** voor aankopen van cursussen en sessies:

1. Schakel de BTCPay-betaalmethode in de BuyCourses-configuratie in.
2. Stel de BTCPay-**Server URL**, **Store ID**, **Greenfield API key** en **webhook secret** in.
3. Gebruik de **verbindingstest** van de betalingsconfiguratie om de toegang tot de Greenfield API te bevestigen.
4. Configureer de webhook aan de BTCPay-zijde met de webhook-URL die de plugin toont en met hetzelfde geheim.
5. Voltooi een kleine testaankoop voordat u deze optie aan cursisten aanbiedt.

De koper wordt doorgestuurd naar de door BTCPay gehoste checkout. Chamilo verifieert webhookhandtekeningen en haalt de factuur opnieuw op om de **winkel, het bedrag, de valuta en de ordergegevens** te valideren voordat de order als betaald wordt gemarkeerd en de koper wordt ingeschreven. Een terugkeer via de browser kan een gemiste of vertraagde webhook reconciliëren. Herhaalde meldingen leiden niet tot dubbele uitvoering.

Alleen geverifieerde afgewikkelde betalingen (inclusief geaccepteerde overbetalingen en facturen die door een beheerder expliciet als afgewikkeld zijn gemarkeerd) verlenen toegang. **Gedeeltelijke, te late, verlopen of ongeldige betalingen mogen niet als automatisch uitgevoerd worden behandeld**; uitzonderlijke betalingen vereisen handmatige beoordeling.

**Bestaande installaties:** Voer de updateprocedure van de plugin eenmaal uit om `plugin_buycourses_btcpay_account` aan te maken. Een beheerder kan `/plugin/BuyCourses/update.php` openen of de BTCPay-betalingsconfiguratie opslaan, wat er ook voor zorgt dat de plugintabel bestaat. Deze update is specifiek voor BuyCourses en is geen globale databasemigratie.

BTCPay wordt hier **niet** gedocumenteerd als gateway voor terugkerende diensten; ga er niet van uit dat automatische abonnementsverlengingen in de stijl van Stripe/PayPal worden ondersteund.

## Levenscyclus van terugkerende diensten

Cursisten kunnen **Mijn diensten** gebruiken om hun actieve terugkerende diensten en hun aankoop-/betalingsgeschiedenis te bekijken. Voor diensten met ondersteunde automatische verlengingen geldt het volgende:

* Elke verlengingsbetaling heeft een eigen historisch record en een eigen ontvangstbewijs.
* Het annuleren van een verlenging voorkomt toekomstige afschrijvingen, maar laat de betaalde dienst toegankelijk tot het einde van de huidige betaalde periode.
* Beheerders kunnen verlengingen ook annuleren vanuit het **verkooprapport van diensten**.
* Een actief, in behandeling zijnd of anderszins lopend terugkerend abonnement is beschermd tegen dubbele aankopen.
* Een verlopen of volledig geannuleerde dienst kan opnieuw worden gekocht.

**Aankoopgeschiedenis** en **betalingsgeschiedenis** zijn gescheiden: één aankoop van een dienst kan meerdere verlengingsbetalingen hebben. Leid niet af dat een verlengingsbetaling een tweede aankoop is.

## Betalingstotalen in het verkooprapport van diensten

In het **verkooprapport van diensten** voor beheerders helpen twee kolommen het oorspronkelijke orderbedrag te onderscheiden van betalingen die in de loop van de tijd zijn geïnd:

* **Laatste betaling** toont de datum van de meest recente geregistreerde geslaagde betaling voor die dienstverkoop. Als er geen betalingsdatum beschikbaar is, toont het rapport een streepje.
* **Totaal geïnd** toont het aanvankelijk geïnde aankoopbedrag plus de geregistreerde geslaagde verlengingsbedragen, opgemaakt in de valuta van de dienst. Dit is niet hetzelfde als de prijs van één factureringsperiode.

De berekening gebruikt de auditgeschiedenis van de dienstverkoop, vermijdt het dubbel tellen van verlengingsgebeurtenissen en houdt rekening met de initiële Stripe-abonnementsafschrijving zonder die tweemaal te tellen. Voor uitzonderlijke betalingen of terugbetalingen moet u het rapport reconciliëren met de betalingsprovider; het getoonde bedrag is geen gateway-uitbetaling en geen afzonderlijk terugbetalingsregister.

## Historische Stripe-abonnementen

BuyCourses kan de Stripe-factuurgeschiedenis reconciliëren voor oudere terugkerende diensten waarvan de verlengingstransacties niet volledig in het auditlogboek van de plugin zijn vastgelegd. De weergave **Mijn diensten** en het verkooprapport van diensten kunnen die records vernieuwen en de lokaal bekende betaalde periode en totalen bijwerken. Beheerders moeten uitzonderlijke verschillen in de betalingsgeschiedenis verifiëren tegen Stripe in plaats van verkopen rechtstreeks te bewerken.

## Verkooprapporten filteren

Het **verkooprapport van cursussen en sessies** kan worden gefilterd op orderstatus, gebruiker, datumbereik of e-mailadres. Optionele productfilters laten u de resultaten verfijnen op producttype en productnaam. Het **verkooprapport van diensten** ondersteunt statusfiltering plus zoeken op gebruiker/e-mailadres/naam/orderreferentie en een zoekopdracht op dienstnaam. Controleer de actieve filters voordat u verkopen exporteert of reconcilieert; de twee rapportschermen hebben verschillende filterbesturingselementen.

Zie [BuyCourses-verkoopfilters PR #9387](https://github.com/chamilo/chamilo-lms/pull/9387).

## Levenscyclus van cursussen gekoppeld aan abonnementen en waarborgen bij verwijdering

BuyCourses kan cursussen die gekoppeld zijn aan terugkerende dienstabonnementen sluiten, verbergen en opnieuw activeren wanneer hun betaalstatus wijzigt. In de **Subscription behavior JSON** van een dienst geeft `hide_after_days` de vertraging na sluiting aan voordat een cursus wordt verborgen (standaard 30 dagen), terwijl `delete_after_days` de vertraging na verbergen aangeeft voordat permanente verwijdering plaatsvindt. Verwijdering is standaard uitgeschakeld (`null`); alleen een positieve waarde maakt een cursus in aanmerking komend.

Beheerders kunnen in aanmerking komende, in behandeling zijnde en geblokkeerde cursussen bekijken op `/admin/buycourses/course-lifecycle`. De interface ondersteunt een niet-destructieve simulatie en gerichte verwijdering van **één in aanmerking komende cursus per uitvoering**, beveiligd door expliciete bevestiging. De CLI-processor `chamilo:buycourses:process-recurring-subscriptions` ondersteunt ook `--dry-run`, `--delete-expired` en `--max-deletions` (1–25). Zonder `--delete-expired` worden cursussen niet permanent verwijderd.

**Permanente verwijdering is destructief.** Bewaar back-ups en test eerst met wegwerpcursussen. Geschiktheidscontroles beschermen actieve verkopen, aan sessies gekoppelde cursussen en inconsistente eigendom; automatische verwijdering is geblokkeerd voor installaties met meerdere toegangs-URL's. Beoordeel gelijktijdig verlengings-/verwijderingsgedrag voordat u destructieve opschoning in productie plant. Zie [PR #9442 over de levenscyclus van abonnementscursussen](https://github.com/chamilo/chamilo-lms/pull/9442).

## Operationele controles

Test na een upgrade een volledige cursusaankoop, een sessieaankoop indien verkocht, een vertraagde/opnieuw afgespeelde webhook, verlopen en gedeeltelijke BTCPay-facturen, een automatische verlenging en een annulering waarbij toegang blijft bestaan tot het einde van de betaalde periode. Houd inloggegevens en webhookgeheimen buiten schermafbeeldingen, logboeken en supporttickets.

## Verharding van betalingen

### Bedragcontrole van de gateway (Redsys / Cecabank)

Wanneer de bank het platform meldt dat een betaling is geslaagd, vergelijkt BuyCourses het bedrag dat de bank in rekening heeft gebracht (in centen, uit de ondertekende melding) met de prijs van de verkoop. Als deze verschillen, wordt de melding geweigerd, blijft de verkoop in behandeling en wordt een regel `[BuyCourses] Redsys notification refused` of `[BuyCourses] Cecabank notification refused` naar het PHP-foutlogboek geschreven. Normale betalingen worden niet beïnvloed.

Als een verkoop in behandeling blijft hoewel de koper heeft betaald, controleer dan het logboek: een prijswijziging nadat de bestelling is aangemaakt, of een gedeeltelijke betaling, wordt daar zichtbaar. Rond een dergelijke verkoop handmatig af via het verkooprapport zodra dit is geverifieerd.

### Beveiligingstokens

* Couponformulieren (toevoegen / configureren), het formulier voor openbare plankaarten en de uitbetalingsacties gebruiken hetzelfde BuyCourses-beheertoken als elke andere beheerpagina van de plugin. Een formulier dat lang openstaat, werkt nog steeds zolang de sessie actief is; na uit- en opnieuw inloggen moet u de pagina opnieuw laden voordat u opslaat (anders wordt een bericht "Not validated" getoond).
* De pagina "factuur aanvragen" (`request_invoice.php`) en de webtrigger van `process_recurring_subscriptions.php` hebben het token in de link nodig (`buycourses_admin_sec_token=...`). Links die zonder token als bladwijzer zijn opgeslagen of gemaild, tonen "Not validated". De opdrachtregel-/cron-uitvoering (`php .../process_recurring_subscriptions.php` of de consoleopdracht) is ongewijzigd en heeft geen token nodig.
* Succespagina's (PayPal, Stripe, abonnementen, diensten) tonen een verkoop alleen aan de gebruiker die deze heeft gekocht.
* Uitbetalingsacties (PayPal-massabetaling, een uitbetaling annuleren) zijn beperkt tot platformbeheerders (sessiebeheerders worden niet langer geaccepteerd) en moeten als POST met het token worden verzonden.

### Datums

De einddatum van een abonnementsverkoop wordt nu altijd in UTC berekend, net als de verkoopdatum, ongeacht de tijdzone van de server.

### Limieten voor meerdere URL's

De limieten voor het aanmaken van cursussen en hosting die worden toegepast wanneer een dienst verloopt, volgen dezelfde regel als de rest van het platform: een instelling die op de hoofd-URL is vergrendeld of als niet wijzigbaar is gemarkeerd, kan niet door een andere URL worden overschreven.

Wijzigingen: [BTCPay #9286](https://github.com/chamilo/chamilo-lms/pull/9286), [terugkerende diensten #9288](https://github.com/chamilo/chamilo-lms/pull/9288), [Stripe-afstemming #9293](https://github.com/chamilo/chamilo-lms/pull/9293), [totalen van dienstverkopen #9220](https://github.com/chamilo/chamilo-lms/pull/9220).