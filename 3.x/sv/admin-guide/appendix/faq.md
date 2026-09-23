# FAQ

Vanliga frågor för administratörer av Chamilo 3.0.

## Installation and Setup

**Q: Vilken PHP-version kräver Chamilo 3.0?**
A: PHP 8.3, 8.4 eller 8.5. Se [Serverkrav](../installation/server-requirements.md).

**Q: Kan jag köra Chamilo på delad hosting?**
A: Det är möjligt men rekommenderas inte. Chamilo 3.0 kräver Composer, Node.js i utvecklingsläge och kommandoradsåtkomst för installation och underhåll. En VPS eller en dedikerad server ger en betydligt bättre upplevelse.

**Q: Vilken databas ska jag använda?**
A: MySQL 8.0+ eller MariaDB 10.4+ är de mest använda och bäst testade.

**Q: Kan jag installera Chamilo utan kommandoraden?**
A: Ja, om du använder den paketerade versionen (.zip eller .tar.gz). Annars behöver du kommandoraden för att installera Composer-beroenden, bygga frontend-tillgångar och köra databas-migreringar. Den webbaserade guiden hanterar databasuppsättning och initial konfiguration, men de omgivande stegen kräver skalåtkomst i utvecklingsläge.

## Users and Authentication

**Q: Hur återställer jag en användares lösenord?**
A: Gå till **Administration > User list**, hitta användaren, klicka på redigera och ange ett nytt lösenord. Alternativt kan användaren använda länken "Forgot password" på inloggningssidan (om e-post är konfigurerad).

**Q: Kan jag importera användare i bulk?**
A: Ja. Gå till **Administration > Import users** och ladda upp en CSV- eller XML-fil med användardata. Importen stöder att skapa nya användare och uppdatera befintliga.

**Q: Hur integrerar jag med LDAP eller Active Directory?**
A: Konfigurera LDAP-inställningar i autentiseringskonfigurationen. Se [LDAP](../authentication/ldap.md). Användare synkroniseras vid inloggning eller via schemalagd synkronisering.

**Q: Kan användare tillhöra flera sessioner samtidigt?**
A: Ja. Användare kan vara inskrivna i valfritt antal sessioner samtidigt. Varje session spårar framsteg oberoende.

## Courses and Content

**Q: Hur säkerhetskopierar jag en enskild kurs?**
A: Inne i kursen, gå till **Maintenance > Create a backup**. Detta skapar ett nedladdningsbart arkiv med kursinnehåll och inställningar. Du kan återställa det på samma eller en annan Chamilo-instans.

**Q: Kan jag kopiera en kurs?**
A: Ja. Använd **Administration > Copy course** eller kursens underhållsverktyg inne i kursen. Du kan kopiera innehåll mellan kurser eller skapa en ny kurs från en befintlig.

**Q: Vilka SCORM-versioner stöds?**
A: Chamilo stöder SCORM 1.2. SCORM-paket importeras som lärstigar.

**Q: Hur begränsar jag vem som kan skapa kurser?**
A: Gå till **Administration > Configuration settings > Course** och inaktivera **Allow non administrators (teachers) to create new courses** (`allow_users_to_create_courses`). När inställningen är inaktiverad kan endast administratörer skapa kurser. Alternativt kan du sätta en gräns för hur många kurser en lärare får skapa.

## Performance and Maintenance

**Q: Plattformen är långsam. Vad ska jag kontrollera först?**
A: I ordning efter påverkan: (1) Säkerställ `APP_ENV=prod` och `APP_DEBUG=0` i `.env`. (2) Kontrollera att PHP OPcache är aktiverat. (3) Kontrollera databasprestanda. (4) Se [Prestandajustering](../platform-settings/performance-tuning.md).

**Q: Hur rensar jag cachen?**
A: Kör `php bin/console cache:clear --env=prod` från kommandoraden. Ta inte bort katalogen `var/cache/` manuellt medan programmet körs.

**Q: Hur mycket diskutrymme behöver Chamilo?**
A: Själva programmet behöver cirka 2 GB okomprimerat. Totalt utrymme beror på uppladdat innehåll (dokument, videor, SCORM-paket). Övervaka diskanvändningen och planera därefter.

**Q: Hur sätter jag upp automatiska säkerhetskopior?**
A: Se [Säkerhetskopior](../maintenance/backups.md). Som minimum, schemalägg en daglig databasdump och regelbundna filnivå-säkerhetskopior av uppladdningskatalogen.

## Email

**Q: Användare tar inte emot e-post. Vad ska jag kontrollera?**
A: (1) Verifiera `MAILER_DSN` i `.env`. (2) Kör `php bin/console mailer:test someone@example.com` för att testa. (3) Kontrollera skräppostmappar. (4) Verifiera SPF/DKIM DNS-poster. Se [E-postkonfiguration](../installation/email-configuration.md).

**Q: Kan jag använda Gmail för att skicka e-post?**
A: Ja, för små plattformar eller utveckling. Använd ett applösenord och var medveten om Gmails dagliga sändningsgränser (500 e-postmeddelanden/dag för vanliga konton).

## Security

**Q: Hur tvingar jag HTTPS?**
A: Konfigurera din webbserver att omdirigera HTTP till HTTPS. Aktivera dessutom inställningen "Force HTTPS" under **Administration > Configuration settings > Security**. Se [Säkerhetsinställningar](../platform-settings/security-settings.md).

**Q: Hur blockerar jag brute force-inloggningsattacker?**
A: Konfigurera maximalt antal inloggningsförsök och CAPTCHA i säkerhetsinställningarna. Överväg även att använda fail2ban på servernivå för extra skydd.

**Q: En användare har glömt sitt lösenord och e-post fungerar inte. Hur hjälper jag dem?**
A: Som administratör, redigera användarkontot direkt och ange ett nytt lösenord. Gå till **Administration > User list**, hitta kontot och uppdatera lösenordsfältet.

## Uppgraderingar

**Q: Kan jag uppgradera direkt från Chamilo 2.x till 3.0?**
A: Ja, men det är en större migrering, inte en enkel uppdatering. Se [Uppgradering](../installation/upgrading.md). Testa alltid först på en staging-server.

**Q: Kommer mina plugins att fungera efter uppgradering till 3.0?**
A: Nej. Plugins från 2.x är inte kompatibla med 3.0 och måste skrivas om eller ersättas med motsvarande funktionalitet i 3.0.