# Login-forsøg

Rapporten Login-forsøg viser en registrering af mislykkede login-forsøg, med diagrammer der hjælper dig med at opdage mønstre for brute-force eller credential-stuffing.

## Adgang til Login-forsøg

Fra administrationspanelet skal du klikke på **Sikkerhed > Login-forsøg**.

## Hvad den viser

![Siden Login-forsøg med diagrammer for forsøg pr. dag, top-IP'er, mislykkede forsøg pr. måned, succesfulde vs. mislykkede logins, forsøg pr. time og unikke IP'er pr. dag, efterfulgt af en tabel over mislykkede login-forsøg](../../.gitbook/assets/admin-security-login-attempts.png)

* **Forsøg pr. dag (sidste 7 dage)** — Dagligt antal mislykkede forsøg
* **Top-IP'er (sidste 30 dage)** — Hvilke IP-adresser der genererede flest forsøg
* **Mislykkede forsøg pr. måned (sidste 12 måneder)** — Længerevarende tendens
* **Succesfulde vs. mislykkede (sidste 30 dage)** — Daglig opdeling af succesfulde versus mislykkede logins
* **Forsøg pr. time (sidste 7 dage)** — Fordeling over døgnet, nyttig til at opdage automatiserede/scriptede forsøg
* **Unikke IP'er pr. dag (sidste 30 dage)** — Hvor mange forskellige IP'er der forsøgte at logge ind hver dag
* **Tabel over mislykkede login-forsøg** — Hvert mislykket forsøg, med dato, IP-adresse og det brugernavn der blev forsøgt

Brug felterne **Brugernavn**, **IP** og datointerval over diagrammerne til at filtrere rapporten.

## Relaterede indstillinger

Denne rapport er et overvågningsværktøj; de egentlige brute-force-beskyttelser konfigureres i [Sikkerhedsindstillinger](../platform-settings/security-settings.md):

* **Maksimalt antal login-forsøg før nedlukning** (`login_max_attempt_before_blocking_account`) — Låser en konto efter for mange mislykkede forsøg
* **CAPTCHA** (`allow_captcha`) og **Tilladelse til CAPTCHA-fejl** (`captcha_number_mistakes_to_block_account`) — Sænker automatiserede forsøg og låser konti, der bliver ved med at fejle CAPTCHA

Se også [Sikkerhedsguiden](../appendix/security-guide.md) for brute-force-beskyttelse på serverniveau (fail2ban).