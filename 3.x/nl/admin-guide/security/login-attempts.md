# Inlogpogingen

Het rapport Inlogpogingen toont een overzicht van mislukte inlogpogingen, met grafieken die u helpen brute-force- of credential-stuffingpatronen te herkennen.

## Inlogpogingen openen

Klik in het beheerpaneel op **Beveiliging > Inlogpogingen**.

## Wat het toont

![De pagina Inlogpogingen met grafieken voor pogingen per dag, top-IP's, mislukte pogingen per maand, geslaagde versus mislukte logins, pogingen per uur en unieke IP's per dag, gevolgd door een tabel met mislukte inlogpogingen](/.gitbook/assets/admin-security-login-attempts.png)

* **Pogingen per dag (laatste 7 dagen)** — Dagelijks aantal mislukte pogingen
* **Top-IP's (laatste 30 dagen)** — Welke IP-adressen de meeste pogingen genereerden
* **Mislukte pogingen per maand (laatste 12 maanden)** — Langetermijntrend
* **Geslaagd versus mislukt (laatste 30 dagen)** — Dagelijkse uitsplitsing van geslaagde versus mislukte logins
* **Pogingen per uur (laatste 7 dagen)** — Verdeling over het tijdstip van de dag, nuttig om geautomatiseerde/gescripte pogingen te herkennen
* **Unieke IP's per dag (laatste 30 dagen)** — Hoeveel verschillende IP's er elke dag inlogpogingen deden
* **Tabel mislukte inlogpogingen** — Elke mislukte poging, met datum, IP-adres en geprobeerde gebruikersnaam

Gebruik de velden **Gebruikersnaam**, **IP** en datumbereik boven de grafieken om het rapport te filteren.

## Gerelateerde instellingen

Dit rapport is een monitoringtool; de daadwerkelijke brute-forcebeveiliging wordt geconfigureerd in [Beveiligingsinstellingen](../platform-settings/security-settings.md):

* **Max. inlogpogingen vóór vergrendeling** (`login_max_attempt_before_blocking_account`) — Vergrendelt een account na te veel mislukte pogingen
* **CAPTCHA** (`allow_captcha`) en **Toegestane CAPTCHA-fouten** (`captcha_number_mistakes_to_block_account`) — Vertraagt geautomatiseerde pogingen en vergrendelt accounts die de CAPTCHA blijven falen

Zie ook de [Beveiligingsgids](../appendix/security-guide.md) voor brute-forcebeveiliging op serverniveau (fail2ban).