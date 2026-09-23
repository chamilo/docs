# Systemverktyg

Den här sidan beskriver underhålls- och inspektionsverktygen i blocket System.

## Rensa temporära filer

**System > Rensa temporära filer** visar hur många temporära uppladdningsfiler som finns och hur mycket utrymme de tar, och låter dig sedan rensa dem — antingen allt, eller endast filer äldre än en konfigurerbar ålder. Ett dry-run-läge låter dig förhandsgranska vad som skulle raderas. Samma åtgärd rensar även föråldrade äldre byggfiler och regenererar kompilerade CSS-resurser.

Åtgärden hoppar avsiktligt över Symfony:s egna cachekataloger (`var/cache/dev`, `var/cache/prod`, `var/cache/test` och cache pools) — den rensar endast lösa filer som hamnat någon annanstans under `var/cache/`. Den **upptäcker inte** en ändring du gjort i `.env` eller under `config/` (till exempel aktivering av API-dokumentationen — se [Aktivera API-dokumentationen](../installation/configuration.md#enable-the-api-documentation)). För det behöver du skalåtkomst för att köra `php bin/console cache:clear`.

## Systemuppdatering

**System > Systemuppdatering** kör Chamilos självuppdateringsflöde direkt från administrationspanelen, som en sekvens av diskreta, återupptagbara steg:

1. **Status** — Rapporterar den installerade versionen och var katalogerna för uppdatering/staging/säkerhetskopia finns, tillsammans med den betrodda signeringsnyckel som används
2. **Kontroll** — Undersöker om en nyare version finns tillgänglig från den konfigurerade uppdateringskällan
3. **Verifiera** — Hämtar uppdateringspaketet och dess signatur och kontrollerar det mot manifestets kontrollsumma och den betrodda publika nyckeln
4. **Förkontroll** — Validerar systemkrav och kompatibilitet innan något ändras
5. **Stage** — Packar upp det verifierade paketet i en isolerad stagingkatalog; ingenting i den live-installationen ändras ännu
6. **Tillämpa plan** — Bygger en diff över filer som ska läggas till, ersättas eller tas bort, baserat på det stagrade paketet
7. **Tillämpa filer** — Kopierar filer på plats. Detta kräver explicit bekräftelse och skapar en säkerhetskopia av varje fil som skrivs över plus en låsfil som förhindrar att en andra uppdatering körs samtidigt
8. **Migreringssäkerhet / kontroller efter tillämpning** — Validerar väntande databasmigreringar och tillståndet efter installation
9. **Kör efter tillämpning** — Kör konsolkommandon efter tillämpning (till exempel databasmigreringar), men endast om din serverkonfiguration tillåter att de körs från användargränssnittet, och endast efter att du skrivit en explicit bekräftelsefras och bekräftat att en säkerhetskopia har tagits

Långvariga steg rapporterar förlopp så att sidan tryggt kan lämnas öppen medan de slutförs. Kombinationen av signaturverifiering, staging före tillämpning, säkerhetskopior före överskrivning, ett samtidighetslås och inskrivna bekräftelser före databasändringar är utformad för att göra detta flöde säkert att köra utan skalåtkomst — men en manuell säkerhetskopia innan du börjar är fortfarande god praxis; se [Säkerhetskopior](../maintenance/backups.md).

## Filinformation

**System > Filinformation** listar varje uppladdad resursfil, sökbar på namn, och visar dess fysiska sökväg, om den är ett föräldralöst objekt (inte kopplad till någon kurs eller session) och hur många ställen som refererar till den. Härifrån kan du koppla en föräldralös fil till en resurs, koppla loss den eller ta bort den — användbart för att spåra och rensa lagring som inte längre tillhör någon kurs.

## Resurser per typ

**System > Resurser per typ** låter dig välja en resurstyp och se, över varje kurs och session, ett aggregerat antal och en lista över objekt av den typen, när de skapades och (där det är tillämpligt) vilka användare som är kopplade till dem. Använd det för att besvara frågor som "hur många forum finns plattformsövergripande" eller "vilka kurser har flest dokument."

## Lista ikoner

**System > Lista ikoner** är en bläddringsbar katalog över Chamilos inbyggda ikonuppsättning, grupperad efter kategori. Den är främst användbar när du utvecklar plugins eller teman och behöver bekräfta en ikons exakta namn, men den exponeras här som en allmän referens.

## Verktyg endast för utveckling

Ytterligare två objekt kan visas i det här blocket, men endast när servern har en `tests/`-katalog — vilket normalt bara sker på en utvecklings- eller QA-installation, aldrig i produktion:

* **Data filler** genererar stora volymer av fiktiva användare, kurser och poster för onlineanvändare, för last- eller QA-testning.
* **E-posttestare** skickar ett riktigt testmeddelande via plattformens konfigurerade mailer, för att bekräfta att dina SMTP-/e-postinställningar faktiskt fungerar, och visar nyligen misslyckade sändningar om sådana finns.

Om du inte ser dessa två länkar är det förväntat — det betyder att din installation inte har en `tests/`-katalog, vilket är det normala, korrekta tillståndet för en produktionsplattform.