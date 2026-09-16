# Veelgestelde vragen (FAQ)

Veelgestelde vragen voor Chamilo 2.0-beheerders.

## Installatie en configuratie

**V: Welke PHP-versie vereist Chamilo 2.0?**  
A: PHP 8.2 of hoger. PHP 8.3 wordt aanbevolen. Zie [Serververeisten](../installation/server-requirements.md).

**V: Kan ik Chamilo draaien op gedeelde hosting?**  
A: Het is mogelijk, maar niet aanbevolen. Chamilo 2.0 vereist Composer, Node.js in ontwikkelmodus en toegang tot de opdrachtregel voor installatie en onderhoud. Een VPS of dedicated server biedt een veel betere ervaring.

**V: Welke database moet ik gebruiken?**  
A: MySQL 8.0+ of MariaDB 10.4+ worden het meest gebruikt en zijn het best getest.

**V: Kan ik Chamilo installeren zonder de opdrachtregel?**  
A: Ja, als u de verpakte versie (.zip of .tar.gz) gebruikt. Anders hebt u de opdrachtregel nodig om Composer-afhankelijkheden te installeren, frontend-assets te bouwen en database-migraties uit te voeren. De webgebaseerde wizard regelt de database-installatie en initiële configuratie, maar de omliggende stappen vereisen shell-toegang in ontwikkelmodus.

## Gebruikers en authenticatie

**V: Hoe kan ik het wachtwoord van een gebruiker resetten?**  
A: Ga naar **Beheer > Gebruikerslijst**, zoek de gebruiker, klik op bewerken en stel een nieuw wachtwoord in. Als alternatief kan de gebruiker de link "Wachtwoord vergeten" op de inlogpagina gebruiken (mits e-mail is geconfigureerd).

**V: Kan ik gebruikers in bulk importeren?**  
A: Ja. Ga naar **Beheer > Gebruikers importeren** en upload een CSV- of XML-bestand met gebruikersgegevens. De import ondersteunt het aanmaken van nieuwe gebruikers en het bijwerken van bestaande gebruikers.

**V: Hoe integreer ik met LDAP of Active Directory?**  
A: Configureer de LDAP-instellingen in de authenticatieconfiguratie. Zie [LDAP](../authentication/ldap.md). Gebruikers worden gesynchroniseerd bij inloggen of via een geplande synchronisatie.

**V: Kunnen gebruikers tegelijkertijd aan meerdere sessies deelnemen?**  
A: Ja. Gebruikers kunnen gelijktijdig aan een willekeurig aantal sessies worden ingeschreven. Elke sessie volgt de voortgang onafhankelijk.

## Cursussen en inhoud

**V: Hoe maak ik een back-up van een enkele cursus?**  
A: Ga binnen de cursus naar **Onderhoud > Maak een back-up**. Dit genereert een downloadbaar archief van de cursusinhoud en -instellingen. U kunt dit herstellen op dezelfde of een andere Chamilo-instantie.

**V: Kan ik een cursus kopiëren?**  
A: Ja. Gebruik **Beheer > Cursus kopiëren** of het onderhoudsgereedschap binnen de cursus. U kunt inhoud tussen cursussen kopiëren of een nieuwe cursus maken op basis van een bestaande.

**V: Welke SCORM-versies worden ondersteund?**  
A: Chamilo ondersteunt SCORM 1.2. SCORM-pakketten worden geïmporteerd als leerpaden.

**V: Hoe beperk ik wie cursussen kan aanmaken?**  
A: Ga naar **Beheer > Configuratie-instellingen > Cursus** en schakel **Niet-beheerders (docenten) toestaan om nieuwe cursussen aan te maken** (`allow_users_to_create_courses`) uit. Wanneer dit is uitgeschakeld, kunnen alleen beheerders cursussen aanmaken. Als alternatief kunt u een limiet instellen voor het aantal cursussen dat een docent kan aanmaken.

## Prestaties en onderhoud

**V: Het platform is traag. Wat moet ik eerst controleren?**  
A: In volgorde van impact: (1) Zorg ervoor dat `APP_ENV=prod` en `APP_DEBUG=0` in `.env` staan. (2) Controleer of PHP OPcache is ingeschakeld. (3) Controleer de databaseprestaties. (4) Zie [Prestatie-optimalisatie](../platform-settings/performance-tuning.md).

**V: Hoe leeg ik de cache?**  
A: Voer `php bin/console cache:clear --env=prod` uit vanaf de opdrachtregel. Verwijder de map `var/cache/` niet handmatig terwijl de applicatie actief is.

**V: Hoeveel schijfruimte heeft Chamilo nodig?**  
A: De applicatie zelf heeft ongeveer 2 GB ongecomprimeerde ruimte nodig. De totale ruimte hangt af van geüploade inhoud (documenten, video's, SCORM-pakketten). Houd het schijfgebruik in de gaten en plan dienovereenkomstig.

**V: Hoe stel ik automatische back-ups in?**  
A: Zie [Back-ups](../maintenance/backups.md). Plan minimaal een dagelijkse database-dump en regelmatige back-ups op bestandsniveau van de uploadmap.

## E-mail

**V: Gebruikers ontvangen geen e-mails. Wat moet ik controleren?**  
A: (1) Controleer `MAILER_DSN` in `.env`. (2) Voer `php bin/console mailer:test someone@example.com` uit om te testen. (3) Controleer spammappen. (4) Verifieer SPF/DKIM DNS-records. Zie [E-mailconfiguratie](../installation/email-configuration.md).

**V: Kan ik Gmail gebruiken om e-mails te verzenden?**  
A: Ja, voor kleine platforms of ontwikkeling. Gebruik een App-wachtwoord en wees op de hoogte van Gmail's dagelijkse verzendlimieten (500 e-mails/dag voor reguliere accounts).

## Beveiliging

**V: Hoe dwing ik HTTPS af?**  
A: Configureer uw webserver om HTTP naar HTTPS om te leiden. Schakel daarnaast de instelling "Forceer HTTPS" in onder **Beheer > Configuratie-instellingen > Beveiliging**. Zie [Beveiligingsinstellingen](../platform-settings/security-settings.md).

**V: Hoe blokkeer ik brute-force inlogaanvallen?**  
A: Configureer het maximale aantal inlogpogingen en CAPTCHA in de beveiligingsinstellingen. Overweeg ook fail2ban op serverniveau te gebruiken voor extra bescherming.

**V: Een gebruiker is zijn wachtwoord vergeten en e-mail werkt niet. Hoe kan ik helpen?**  
A: Als beheerder kunt u het gebruikersaccount direct bewerken en een nieuw wachtwoord instellen. Ga naar **Beheer > Gebruikerslijst**, zoek het account en werk het wachtwoordveld bij.

---
## Upgrades

**V: Kan ik direct upgraden van Chamilo 1.11.x naar 2.0?**
A: Ja, maar het betreft een grote migratie, geen eenvoudige update. Zie [Upgraden](../installation/upgrading.md). Test altijd eerst op een staging-server.

**V: Werken mijn plugins na een upgrade naar 2.0?**
A: Nee. Plugins van 1.11.x zijn niet compatibel met 2.0 en moeten opnieuw worden geschreven of vervangen door equivalente functionaliteit in 2.0.