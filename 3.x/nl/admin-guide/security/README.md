# Beveiliging

Het blok **Beveiliging** op het beheerdashboard groepeert de ingebouwde beveiligingsbewakings- en audittools van het platform. Het is gescheiden van [Beveiligingsinstellingen](../platform-settings/security-settings.md), die het beveiligings*beleid* configureren (wachtwoordregels, CAPTCHA, HTTP-beveiligingsheaders, enzovoort) — dit blok biedt u de *rapporten en tools* die het platform bewaken op verdachte activiteit en ongewenste wijzigingen.

![Het blok Beveiliging op het beheerdashboard, met Activiteitenaudit, Aanmeldpogingen, Simple IDS, Wachtwoordsterktecontrole en Bestandsintegriteit](/.gitbook/assets/admin-security-block.png)

Het blok werd geïntroduceerd in Chamilo 2.0 met vier tools en uitgebreid in Chamilo 3.0 met een vijfde, **Bestandsintegriteit**.

## Toegang tot het blok Beveiliging

Vanuit het beheerpaneel verschijnt het blok **Beveiliging** naast de andere dashboardblokken (Gebruikers, Cursussen, Platformbeheer, Systeem, enzovoort). Klik op een van de koppelingen om de bijbehorende tool te openen.

## Wat zit er in het blok

* **[Activiteitenaudit](activities-audit.md)** — Blader door belangrijke administratieve en platformgebeurtenissen (wijzigingen van gebruikers, cursussen, sessies en andere) per gebeurtenistype
* **[Aanmeldpogingen](login-attempts.md)** — Bekijk mislukte en geslaagde aanmeldpogingen, met grafieken en een doorzoekbaar logboek
* **[Simple IDS](simple-ids.md)** — Bekijk verzoeken die zijn gemarkeerd door het ingebouwde, lichtgewicht intrusion detection-systeem van Chamilo
* **[Wachtwoordsterktecontrole](password-strength-checker.md)** — Scan actieve gebruikers op wachtwoorden die overeenkomen met een lijst van veelgebruikte wachtwoorden
* **[Bestandsintegriteit](file-integrity.md)** *(nieuw in Chamilo 3.0)* — Detecteer onverwachte toevoegingen, wijzigingen, verwijderingen of permissiewijzigingen in de geïnstalleerde bestanden

## Wie er toegang toe heeft

Alle vijf tools vereisen toegang als **Portaalbeheerder**. De scan-, pauzeer- en herbaseline-acties van Bestandsintegriteit vereisen daarnaast toegang als **Globale beheerder**, en het pauzeren van waarschuwingen of het vaststellen van een nieuwe baseline vereist dat u uw eigen wachtwoord opnieuw invoert — zie [Bestandsintegriteit](file-integrity.md#actions) voor details.