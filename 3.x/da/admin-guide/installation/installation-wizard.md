# Installationsguide

Chamilo 3.0 indeholder en webbaseret installationsguide, der fører dig gennem den indledende opsætning. Guiden kører automatisk, når du tilgår platformen første gang.

## Før du starter

Sørg for, at følgende forudsætninger er opfyldt:

1. Din server opfylder alle [serverkrav](server-requirements.md).
2. Du har downloadet en pakket (zip eller tar.gz) version af Chamilo.
3. Din webserver er konfigureret til at servicere mappen `public/` som document root.
4. Din `.env`-fil findes og er tom (guiden vil vejlede i databaseopsætningen).

## Trin 1: Installationssprog

![Installationsguide trin 1 — sprogvalg](../../.gitbook/assets/install-step1-language.png)

Det første trin lader dig vælge sproget til installationsprocessen. Vælg dit foretrukne sprog i rullemenuen.

Hvis Chamilo registrerer en eksisterende installation (til en opgradering), vises migreringsstatus, og der tilbydes en opgraderingssti i stedet for en ny installation.

## Trin 2: Kontrol af krav

![Installationsguide trin 2 — kontrol af krav, der viser PHP-version, udvidelser og mappetilladelser](../../.gitbook/assets/install-step2-requirements.png)

Guiden kontrollerer dit servermiljø:

* **PHP-version** er 8.3, 8.4 eller 8.5
* **Påkrævede PHP-udvidelser** er installeret (intl, gd, curl, zip, mbstring, xml osv.)
* **Anbefalede PHP-indstillinger** — `date.timezone` er konfigureret, tilstrækkelige upload-/hukommelsesgrænser
* **Mappe- og filtilladelser** — `var/`, `config/` og `public/upload/` er skrivbare for webserveren

Hvis nogle krav ikke er opfyldt, viser guiden advarsler eller fejl. Løs dem, før du fortsætter.

## Trin 3: Licens

![Installationsguide trin 3 — accept af licens](../../.gitbook/assets/install-step3-license.png)

Dette trin viser GNU/GPLv3-licensen. Du skal markere afkrydsningsfeltet **"I accept"** for at fortsætte.

Du kan valgfrit udvide sektionen **Contact information** for at angive oplysninger om din organisation (navn, e-mail, virksomhed, land). Dette er frivilligt og hjælper Chamilo-fællesskabet med at forstå, hvem der bruger platformen, men giver os også mulighed for *meget sjældent* at kontakte dig om begivenheder tæt på dig.

## Trin 4: Databaseindstillinger

![Installationsguide trin 4 — konfiguration af databaseforbindelse](../../.gitbook/assets/install-step4-database.png)

Angiv dine databaseforbindelsesoplysninger:

| Felt | Beskrivelse |
|-------|-------------|
| **Database host** | Værtsnavnet eller IP-adressen på din databaseserver (f.eks. `localhost` eller `127.0.0.1`) |
| **Database port** | Standard: 3306 for MySQL/MariaDB |
| **Database name** | Navnet på den database, der skal bruges (kun alfanumeriske tegn og understregninger) |
| **Database user** | En databasebruger med fulde rettigheder til den angivne database |
| **Database password** | Adgangskoden til databasebrugeren |

Klik på **Check database connection** for at teste. Guiden lader dig ikke fortsætte, før forbindelsen er vellykket. Hvis databasen allerede findes, vises en advarsel.

## Trin 5: Konfigurationsindstillinger

![Installationsguide trin 5 — administratorkonto, portalindstillinger og e-mailkonfiguration](../../.gitbook/assets/install-step5-config.png)

Dette trin kombinerer oprettelse af administratorkonto, portalindstillinger og e-mailkonfiguration.

### Administratorkonto

| Felt | Beskrivelse |
|-------|-------------|
| **Login** | Administratorens brugernavn |
| **Password** | Vælg en stærk adgangskode — denne konto har fuld adgang til platformen |
| **First name** | Administratorens fornavn |
| **Last name** | Administratorens efternavn |
| **Email** | Bruges til systemmeddelelser og nulstilling af adgangskode |
| **Phone** | Valgfrit kontaktnummer |

Disse administratoroplysninger vil også blive brugt af Chamilo til at udfylde supportkontaktoplysningerne, så sørg for at omkonfigurere det i indstillingerne, efter installationen er afsluttet.

### Portalindstillinger

| Felt | Beskrivelse |
|-------|-------------|
| **Language** | Standardgrænsefladesproget |
| **Portal name** | Navnet på din platform (f.eks. "My Organization LMS") |
| **Company short name** | Din organisations forkortede navn |
| **Company URL** | Din organisations website |
| **Encryption method** | Algoritme til hashing af adgangskoder — **bcrypt** anbefales |
| **Allow self-registration** | Yes / No / After approval |
| **Allow self-registration as trainer** | Yes / No |

### E-mailkonfiguration

Sektionen til e-mailindstillinger lader dig konfigurere mailtransporten (SMTP, Amazon SES, Mailjet osv.) og teste e-maillevering. Se [E-mailkonfiguration](email-configuration.md) for detaljer.

Alle disse indstillinger kan ændres senere fra administrationspanelet.

## Trin 6: Sidste kontrol før installation

![Installationsguiden trin 6 — gennemgang af alle indstillinger før installation](../../.gitbook/assets/install-step6-review.png)

Dette trin viser et overblik over alt, du har indtastet, til gennemgang:

* Administratoroplysninger (adgangskoden er skjult som standard — klik på øje-ikonet for at vise den)
* Portalindstillinger
* Oplysninger om databaseforbindelse

Gennemgå omhyggeligt, og klik derefter på **Install Chamilo** for at udføre installationen. Guiden opretter alle databasetabeller, udfylder indledende data og konfigurerer platformen.

## Trin 7: Installation fuldført

![Installationsguiden trin 7 — fuldførelse med sikkerhedsråd og portallink](../../.gitbook/assets/install-step7-complete.png)

Når installationen er fuldført, viser guiden:

* **Råd til at komme i gang** — Foreslår, at du opretter dit første kursus for at udforske platformen (som administrator skal du gøre dette fra administrationspanelet)
* **Sikkerhedsanbefalinger**:
  * Gør mappen `config/` skrivebeskyttet (`chmod 0555`)
  * Slet mappen `public/main/install/`
* Et **link til din portal**, så du kan logge ind med de administratoroplysninger, du netop har oprettet

## Efter installationen

Når du har gennemført guiden:

* **Fjern eller begræns adgangen til installationsprogrammet** -- Guiden bør ikke være tilgængelig efter installationen. Chamilo låser den typisk automatisk, men kontrollér, at et nyt besøg på installations-URL'en omdirigerer til login-siden.
* **Konfigurer e-maillevering** -- Se [E-mailkonfiguration](email-configuration.md).
* **Opsæt sikkerhedskopier** -- Før du tilføjer indhold, skal du konfigurere automatiske sikkerhedskopier af database og filer (Chamilo stiller ikke en løsning til rådighed for dette, men kopiering af mappen var/ og databasen er de 2 vigtigste elementer).
* **Gennemgå sikkerhedsindstillinger** -- Se [Sikkerhedsindstillinger](../platform-settings/security-settings.md).

## Fejlfinding

| Problem | Løsning |
|---------|----------|
| Tom side ved installations-URL | Tjek PHP-fejllogs. Skift midlertidigt til `APP_ENV=dev` i .env for at se fejl i browseren. |
| Databaseforbindelse mislykkes | Kontrollér legitimationsoplysninger, bekræft at databasen findes, og tjek at databaseserveren tillader forbindelser fra webserverens vært. |
| Fejl om manglende tilladelse | Sørg for, at `var/` er skrivbar for webserverbrugeren. |
| Assets indlæses ikke (ingen CSS/JS) | Kør `yarn install && yarn build` for at kompilere frontend-assets. |