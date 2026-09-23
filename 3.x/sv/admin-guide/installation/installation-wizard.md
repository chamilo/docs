# Installationsguide

Chamilo 3.0 innehåller en webbaserad installationsguide som leder dig genom den inledande konfigurationen. Guiden startar automatiskt när du besöker plattformen för första gången.

## Innan du börjar

Säkerställ att följande förutsättningar är uppfyllda:

1. Din server uppfyller alla [serverkrav](server-requirements.md).
2. Du har laddat ner en paketerad (zip eller tar.gz) version av Chamilo.
3. Din webbserver är konfigurerad att servera katalogen `public/` som dokumentrot.
4. Din `.env`-fil finns och är tom (guiden leder dig genom databasinställningen).

## Steg 1: Installationsspråk

![Installationsguide steg 1 — språkval](../../.gitbook/assets/install-step1-language.png)

Det första steget låter dig välja språk för installationsprocessen. Välj önskat språk i rullgardinsmenyn.

Om Chamilo upptäcker en befintlig installation (för en uppgradering) visas migreringsstatus och ett uppgraderingsalternativ erbjuds i stället för en nyinstallation.

## Steg 2: Kravkontroll

![Installationsguide steg 2 — kravkontroll som visar PHP-version, tillägg och katalogbehörigheter](../../.gitbook/assets/install-step2-requirements.png)

Guiden kontrollerar din servermiljö:

* **PHP-version** är 8.3, 8.4 eller 8.5
* **Nödvändiga PHP-tillägg** är installerade (intl, gd, curl, zip, mbstring, xml, m.fl.)
* **Rekommenderade PHP-inställningar** — `date.timezone` är konfigurerad, tillräckliga gränser för uppladdning/minne
* **Katalog- och filbehörigheter** — `var/`, `config/` och `public/upload/` är skrivbara för webbservern

Om något krav inte är uppfyllt visar guiden varningar eller fel. Åtgärda dem innan du går vidare.

## Steg 3: Licens

![Installationsguide steg 3 — godkännande av licens](../../.gitbook/assets/install-step3-license.png)

Detta steg visar GNU/GPLv3-licensen. Du måste kryssa i kryssrutan **"I accept"** för att fortsätta.

Valfritt kan du expandera avsnittet **Contact information** för att lämna uppgifter om din organisation (namn, e-post, företag, land). Detta är frivilligt och hjälper Chamilo-gemenskapen att förstå vem som använder plattformen, men gör det också möjligt för oss att *mycket sällan* kontakta dig om evenemang i din närhet.

## Steg 4: Databasinställningar

![Installationsguide steg 4 — konfiguration av databasanslutning](../../.gitbook/assets/install-step4-database.png)

Ange dina uppgifter för databasanslutning:

| Fält | Beskrivning |
|-------|-------------|
| **Database host** | Värdnamn eller IP för din databasserver (t.ex. `localhost` eller `127.0.0.1`) |
| **Database port** | Standard: 3306 för MySQL/MariaDB |
| **Database name** | Namnet på databasen som ska användas (endast alfanumeriska tecken och understreck) |
| **Database user** | En databasanvändare med fullständiga behörigheter på den angivna databasen |
| **Database password** | Lösenordet för databasanvändaren |

Klicka på **Check database connection** för att testa. Guiden låter dig inte fortsätta förrän anslutningen lyckas. Om databasen redan finns visas en varning.

## Steg 5: Konfigurationsinställningar

![Installationsguide steg 5 — administratörskonto, portalinställningar och e-postkonfiguration](../../.gitbook/assets/install-step5-config.png)

Detta steg kombinerar skapande av administratörskonto, portalinställningar och e-postkonfiguration.

### Administratörskonto

| Fält | Beskrivning |
|-------|-------------|
| **Login** | Administratörens användarnamn |
| **Password** | Välj ett starkt lösenord — detta konto har full åtkomst till plattformen |
| **First name** | Administratörens förnamn |
| **Last name** | Administratörens efternamn |
| **Email** | Används för systemaviseringar och återställning av lösenord |
| **Phone** | Valfritt kontaktnummer |

Dessa administratörsuppgifter används också av Chamilo för att fylla i kontaktuppgifter för support, så se till att du konfigurerar om detta i inställningarna efter att installationen är avslutad.

### Portalinställningar

| Fält | Beskrivning |
|-------|-------------|
| **Language** | Standardgränssnittets språk |
| **Portal name** | Namnet på din plattform (t.ex. "My Organization LMS") |
| **Company short name** | Din organisations förkortade namn |
| **Company URL** | Din organisations webbplats |
| **Encryption method** | Algoritm för lösenordshashning — **bcrypt** rekommenderas |
| **Allow self-registration** | Yes / No / After approval |
| **Allow self-registration as trainer** | Yes / No |

### E-postkonfiguration

Avsnittet för e-postinställningar låter dig konfigurera e-posttransport (SMTP, Amazon SES, Mailjet, m.fl.) och testa e-postleverans. Se [E-postkonfiguration](email-configuration.md) för mer information.

Alla dessa inställningar kan ändras senare från administrationspanelen.

## Steg 6: Sista kontrollen före installation

![Installationsguiden steg 6 — granskning av alla inställningar före installation](../../.gitbook/assets/install-step6-review.png)

Detta steg visar en sammanfattning av allt du har angett för granskning:

* Administratörsuppgifter (lösenordet är dolt som standard — klicka på ögonikonen för att visa det)
* Portalinställningar
* Databasanslutningsuppgifter

Granska noga och klicka sedan på **Installera Chamilo** för att köra installationen. Guiden skapar alla databastabeller, fyller i inledande data och konfigurerar plattformen.

## Steg 7: Installation slutförd

![Installationsguiden steg 7 — slutförande med säkerhetsråd och portallänk](../../.gitbook/assets/install-step7-complete.png)

När installationen har slutförts utan fel visar guiden:

* **Råd för att komma igång** — Föreslår att du skapar din första kurs för att utforska plattformen (som administratör måste du göra detta från administrationspanelen)
* **Säkerhetsrekommendationer**:
  * Gör katalogen `config/` skrivskyddad (`chmod 0555`)
  * Ta bort katalogen `public/main/install/`
* En **länk till din portal** för att logga in med de administratörsuppgifter du just skapade

## Efter installationen

När du har slutfört guiden:

* **Ta bort eller begränsa åtkomsten till installationsprogrammet** -- Guiden ska inte vara tillgänglig efter installationen. Chamilo låser den vanligtvis automatiskt, men kontrollera att ett nytt besök på installations-URL:en omdirigerar till inloggningssidan.
* **Konfigurera e-postleverans** -- Se [E-postkonfiguration](email-configuration.md).
* **Konfigurera säkerhetskopiering** -- Innan du lägger till innehåll, konfigurera automatiserad säkerhetskopiering av databas och filer (Chamilo tillhandahåller ingen lösning för detta, men att kopiera mappen var/ och databasen är de två viktigaste elementen).
* **Granska säkerhetsinställningar** -- Se [Säkerhetsinställningar](../platform-settings/security-settings.md).

## Felsökning

| Problem | Lösning |
|---------|----------|
| Tom sida vid installations-URL | Kontrollera PHP-felloggar. Ändra tillfälligt till `APP_ENV=dev` i .env för att se fel i webbläsaren. |
| Databasanslutningen misslyckas | Verifiera uppgifterna, bekräfta att databasen finns, kontrollera att databasservern tillåter anslutningar från webbserverns värd. |
| Fel om nekad behörighet | Se till att `var/` är skrivbar för webbserverns användare. |
| Resurser laddas inte (ingen CSS/JS) | Kör `yarn install && yarn build` för att kompilera frontend-resurser. |