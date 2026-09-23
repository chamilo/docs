# Tentativi di accesso

Il report Tentativi di accesso mostra un registro dei tentativi di accesso non riusciti, con grafici che aiutano a individuare schemi di brute-force o credential stuffing.

## Accesso a Tentativi di accesso

Dal pannello di amministrazione, fare clic su **Sicurezza > Tentativi di accesso**.

## Cosa mostra

![La pagina Tentativi di accesso con grafici per i tentativi per giorno, gli IP principali, i tentativi non riusciti per mese, gli accessi riusciti rispetto a quelli non riusciti, i tentativi per ora e gli IP univoci per giorno, seguiti da una tabella dei tentativi di accesso non riusciti](../../.gitbook/assets/admin-security-login-attempts.png)

* **Tentativi per giorno (ultimi 7 giorni)** — Conteggio giornaliero dei tentativi non riusciti
* **IP principali (ultimi 30 giorni)** — Quali indirizzi IP hanno generato il maggior numero di tentativi
* **Tentativi non riusciti per mese (ultimi 12 mesi)** — Andamento a più lungo termine
* **Riusciti rispetto a non riusciti (ultimi 30 giorni)** — Ripartizione giornaliera degli accessi riusciti rispetto a quelli non riusciti
* **Tentativi per ora (ultimi 7 giorni)** — Distribuzione per fascia oraria, utile per individuare tentativi automatizzati/scriptati
* **IP univoci per giorno (ultimi 30 giorni)** — Quanti IP distinti hanno tentato l'accesso ogni giorno
* **Tabella dei tentativi di accesso non riusciti** — Ogni tentativo non riuscito, con data, indirizzo IP e nome utente provato

Utilizzare i campi **Nome utente**, **IP** e intervallo di date sopra i grafici per filtrare il report.

## Impostazioni correlate

Questo report è uno strumento di monitoraggio; le effettive protezioni anti brute-force sono configurate in [Impostazioni di sicurezza](../platform-settings/security-settings.md):

* **Numero massimo di tentativi di accesso prima del blocco** (`login_max_attempt_before_blocking_account`) — Blocca un account dopo troppi tentativi non riusciti
* **CAPTCHA** (`allow_captcha`) e **Tolleranza errori CAPTCHA** (`captcha_number_mistakes_to_block_account`) — Rallentano i tentativi automatizzati e bloccano gli account che continuano a fallire il CAPTCHA

Vedere anche la [Guida alla sicurezza](../appendix/security-guide.md) per la protezione anti brute-force a livello di server (fail2ban).