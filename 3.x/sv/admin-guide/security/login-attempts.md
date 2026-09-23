# Inloggningsförsök

Rapporten Inloggningsförsök visar en förteckning över misslyckade inloggningsförsök, med diagram som hjälper dig att upptäcka mönster för brute-force eller credential stuffing.

## Åtkomst till Inloggningsförsök

Från administrationspanelen klickar du på **Säkerhet > Inloggningsförsök**.

## Vad den visar

![Sidan Inloggningsförsök med diagram för försök per dag, topp-IP-adresser, misslyckade försök per månad, lyckade kontra misslyckade inloggningar, försök per timme och unika IP-adresser per dag, följt av en tabell över misslyckade inloggningsförsök](../../.gitbook/assets/admin-security-login-attempts.png)

* **Försök per dag (senaste 7 dagarna)** — Dagligt antal misslyckade försök
* **Topp-IP-adresser (senaste 30 dagarna)** — Vilka IP-adresser som genererade flest försök
* **Misslyckade försök per månad (senaste 12 månaderna)** — Långsiktig trend
* **Lyckade kontra misslyckade (senaste 30 dagarna)** — Daglig uppdelning av lyckade kontra misslyckade inloggningar
* **Försök per timme (senaste 7 dagarna)** — Fördelning över dygnet, användbart för att upptäcka automatiserade/skriptade försök
* **Unika IP-adresser per dag (senaste 30 dagarna)** — Hur många distinkta IP-adresser som försökte logga in varje dag
* **Tabell över misslyckade inloggningsförsök** — Varje misslyckat försök, med datum, IP-adress och det användarnamn som prövades

Använd fälten **Användarnamn**, **IP** och datumintervall ovanför diagrammen för att filtrera rapporten.

## Relaterade inställningar

Denna rapport är ett övervakningsverktyg; det faktiska skyddet mot brute-force konfigureras i [Säkerhetsinställningar](../platform-settings/security-settings.md):

* **Max antal inloggningsförsök före spärr** (`login_max_attempt_before_blocking_account`) — Spärrar ett konto efter för många misslyckade försök
* **CAPTCHA** (`allow_captcha`) och **Tillåtet antal CAPTCHA-fel** (`captcha_number_mistakes_to_block_account`) — Saktar ner automatiserade försök och spärrar konton som fortsätter att misslyckas med CAPTCHA

Se även [Säkerhetsguiden](../appendix/security-guide.md) för brute-force-skydd på servernivå (fail2ban).