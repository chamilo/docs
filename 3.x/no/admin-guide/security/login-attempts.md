# Innloggingsforsøk

Rapporten Innloggingsforsøk viser en oversikt over mislykkede innloggingsforsøk, med diagrammer som hjelper deg å oppdage mønstre for brute-force eller credential stuffing.

## Tilgang til Innloggingsforsøk

Fra administrasjonspanelet klikker du **Sikkerhet > Innloggingsforsøk**.

## Hva den viser

![Siden Innloggingsforsøk som viser diagrammer for forsøk per dag, topp-IP-er, mislykkede forsøk per måned, vellykkede kontra mislykkede innlogginger, forsøk per time og unike IP-er per dag, etterfulgt av en tabell over mislykkede innloggingsforsøk](/.gitbook/assets/admin-security-login-attempts.png)

* **Forsøk per dag (siste 7 dager)** — Daglig antall mislykkede forsøk
* **Topp-IP-er (siste 30 dager)** — Hvilke IP-adresser som genererte flest forsøk
* **Mislykkede forsøk per måned (siste 12 måneder)** — Lengre tidstrend
* **Vellykkede kontra mislykkede (siste 30 dager)** — Daglig fordeling av vellykkede versus mislykkede innlogginger
* **Forsøk per time (siste 7 dager)** — Fordeling etter tid på døgnet, nyttig for å oppdage automatiserte/skriptede forsøk
* **Unike IP-er per dag (siste 30 dager)** — Hvor mange distinkte IP-er som forsøkte innlogging hver dag
* **Tabell over mislykkede innloggingsforsøk** — Hvert mislykkede forsøk, med dato, IP-adresse og brukernavnet som ble prøvd

Bruk feltene **Brukernavn**, **IP** og datointervall over diagrammene for å filtrere rapporten.

## Relaterte innstillinger

Denne rapporten er et overvåkingsverktøy; de faktiske brute-force-beskyttelsene konfigureres i [Sikkerhetsinnstillinger](../platform-settings/security-settings.md):

* **Maks innloggingsforsøk før nedlåsing** (`login_max_attempt_before_blocking_account`) — Låser en konto etter for mange mislykkede forsøk
* **CAPTCHA** (`allow_captcha`) og **Tillatt antall CAPTCHA-feil** (`captcha_number_mistakes_to_block_account`) — Senker automatiserte forsøk og låser kontoer som fortsetter å feile CAPTCHA

Se også [Sikkerhetsveiledningen](../appendix/security-guide.md) for brute-force-beskyttelse på servernivå (fail2ban).