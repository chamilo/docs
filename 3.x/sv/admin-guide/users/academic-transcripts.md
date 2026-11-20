# Akademiska studieutdrag

Chamilo kan ta fram ett **inofficiellt akademiskt studieutdrag** utifrån en deltagares avslutade, certifierade kurser och låta behörig personal utfärda ett **officiellt signerat studieutdrag**. Funktionen skiljer sig från ett enskilt kursintyg och från dess valfria verifiering på Sepolia-testnätet.

## Aktivera funktionen

Under **Administration > Konfigurationsinställningar > Intyg** aktiverar du **Akademiska studieutdrag** (`certificate.transcript_enabled`). Funktionen är inaktiverad som standard. Granska de ytterligare inställningarna för program, betygsskala, kurstimmar, studentnummer, adress och undertecknare i [Intygsinställningar](../platform-settings/certificate-settings.md#transcript_enabled).

Studieutdraget använder intyg som genereras av **betygsbokens rotkategori** för berättigade kurser och sessioner. Det inkluderar endast kurser inom den aktuella åtkomst-URL:en som deltagaren fortfarande är registrerad på. En kurs utan ett berättigat intyg bidrar inte med någon rad.

Det visade slutbetyget är ett medelvärde av de listade kursernas procentpoäng. GPA är det oviktade medelvärdet av de mappade betygspoängen. Båda beror på vilka kurser som ingår vid visning eller utfärdande.

## Studieutdragets kolumner

| Kolumn | Innehåll |
|--------|---------|
| **Kurs** | Kurskoden, eller kursens avdelningsnamn (`transcript_course_code_source`) |
| **Beskrivning** | Kurstiteln, och sessionstiteln för en kurs som följts i en session |
| **Registrering** | När deltagaren registrerade sig på kursen eller sessionen |
| **Obligatoriska timmar** | Värdet i det extra kursfält som anges i `transcript_hours_extra_field`, eller kursens varaktighet |
| **Slutförandedatum** | Intygets datum |
| **Genomförda timmar** | Den tid deltagaren tillbringat i kursen, eller de obligatoriska timmarna när `transcript_completed_hours_are_required_hours` är aktiverat |
| **Slutbetyg** | Intygets poäng |
| **Betyg** | Bokstaven i `transcript_grading_scale` som motsvarar den poängen |

## Öppna en deltagares studieutdrag

1. Gå till **Administration > Användare > Användarlista** och leta upp deltagaren. Åtgärden **Studieutdrag** är tillgänglig för behöriga administratörer och sessionsadministratörer när funktionen är aktiverad.
2. Alternativt använder du åtgärden **Studieutdrag** från en berättigad deltagares detaljsida för global rapportering.
3. Granska deltagarens kurslista, betyg, datum, timmar, slutbetyg och GPA.
4. Välj **Ladda ned inofficiellt studieutdrag** för en PDF som byggs från deltagarens aktuella uppgifter.

Studieutdragssidan är också direkt tillgänglig på `/transcript?userId=<user-id>` för den som är behörig att komma åt den deltagarens uppgifter. Att känna till URL:en eller användar-ID:t ska inte betraktas som behörighet: åtkomsten kontrolleras på serversidan.

En deltagare kan visa sitt **eget** studieutdrag, men kan inte utfärda eller återkalla ett officiellt. Behöriga utfärdare är:

* Plattforms-/portaladministratörer som agerar inom sitt hanterade område för användare och åtkomst-URL:er.
* HR-ansvariga för deltagare som de följer.
* Sessionsadministratörer för deltagare som är registrerade i en session som de administrerar.

Dessa behörigheter utvärderas per deltagare. Att ha en personalroll i sig ger inte åtkomst till alla studieutdrag.

![En deltagares studieutdrag sett av en administratör, med kurser, slutbetyg, GPA och betygsskala, listan över officiella studieutdrag och signaturbildblocket](../../.gitbook/assets/admin-transcript-user.png)

## Utfärda och verifiera ett officiellt studieutdrag

1. På en behörig deltagares studieutdragssida kontrollerar du de kurser, betyg och personuppgifter som visas.
2. Välj **Utfärda officiellt studieutdrag** och bekräfta. Chamilo sparar en signerad ögonblicksbild av informationen vid det tillfället.
3. Den nya posten visas under **Officiella studieutdrag** med utfärdandedatum och utfärdare.
4. Använd **Ladda ned** för den officiella PDF-filen eller **Verifiera** för att öppna den offentliga verifieringssidan.
5. Vid behov kan en behörig utfärdare **Återkalla** det officiella studieutdraget. Verifieringssidan rapporterar då att det är återkallat.

Varje utfärdat studieutdrag lagras separat: att utfärda en nyare version skriver inte tyst över en tidigare signerad post. Verifieringslänkar följer `/transcripts/verify/<token>` och exponerar även ett `.json`-svar. Den som har verifieringslänken kan kontrollera giltigheten utan att logga in. Håll dessa länkar under lämplig kontroll, eftersom en giltig verifiering exponerar uppgifter från det signerade studieutdraget. Ogiltiga eller återkallade poster presenteras inte som giltiga dokument.

![Den offentliga verifieringssidan för ett giltigt officiellt studieutdrag, med dess uppgifter och kurser](../../.gitbook/assets/admin-transcript-verification.png)

Ett officiellt studieutdrag signeras digitalt av Chamilo med institutionens signeringsnyckel. **Det är inte en blockkedjetransaktion**; Sepolia-funktionen dokumenterar en separat process för autentiseringsuppgifter för betygsboksintyg.

## Signaturbild och uppgifter om undertecknare

En plattformsadministratör kan ladda upp en signaturbild i **PNG eller JPEG** i avsnittet **Signatur för officiella studieutdrag** på en deltagares sida för studieutdrag. Bilden tillhör den aktuella åtkomst-URL:en och används i officiella PDF-filer. Undertecknarens namn och titel hämtas från `certificate.transcript_signatory_name` och `certificate.transcript_signatory_title`.

Endast plattformsadministratörer hanterar signaturbilden; andra behöriga utfärdare av studieutdrag får inte denna behörighet automatiskt. Skydda institutionens signeringsnycklar och den privata lagringen av signaturbilder som en del av portalens rutiner för säkerhetskopiering och åtkomstkontroll. Båda förvaras utanför den publika webbmappen, i `var/certificate-issuer/`, tillsammans med den nyckel som även signerar intyg från betygsboken: inkludera den här mappen i era [säkerhetskopior](../maintenance/backups.md), annars kan varje redan utfärdat studieutdrag och intyg inte längre verifieras.

## Felsökning

* **Länk till studieutdrag saknas:** kontrollera `certificate.transcript_enabled` och den aktuella användarens omfattning.
* **Inga avslutade kurser:** deltagaren behöver ett kvalificerande certifikat från rotbetygsboken och en matchande aktuell kurs-/sessionstillhörighet på denna åtkomst-URL.
* **Felaktigt studentnummer, timmar, betygsbokstäver eller programtitel:** granska de specifika inställningarna `certificate.transcript_*` innan ett officiellt studieutdrag utfärdas.
* **Verifieringen rapporterar ett återkallat eller ogiltigt resultat:** återanvänd inte posten som bevis för ett aktuellt officiellt studieutdrag; behörig personal kan utfärda ett nytt när det är lämpligt.

Se även [Certifikat och färdigheter](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md) och [Mitt studieutdrag](../../student-guide/account-and-security/my-transcript.md).