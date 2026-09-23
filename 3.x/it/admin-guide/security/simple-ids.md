# Simple IDS

Chamilo include un sistema di rilevamento delle intrusioni (IDS) leggero, integrato nell'applicazione. Ad ogni richiesta, analizza i parametri della query URL, il percorso della richiesta e un paio di intestazioni (`User-Agent`, `Referer`) alla ricerca di firme di attacco comuni — ad esempio payload XSS o pattern di path-traversal — e registra qualsiasi elemento sospetto. La pagina Simple IDS consente di esaminare ciò che è stato segnalato.

I **body** delle richieste non vengono intenzionalmente analizzati, per evitare falsi positivi derivanti dal contenuto degli editor di testo avanzato (il testo dei corsi contiene legittimamente markup simile a HTML/JavaScript).

## Accesso a Simple IDS

Dal pannello di amministrazione, fare clic su **Sicurezza > Simple IDS**.

## Cosa mostra

![La pagina Simple IDS che mostra grafici per eventi per giorno, eventi per tipo e IP di attacco principali, seguiti da una tabella di eventi IDS segnalati con data, IP, tipo di rilevamento, parametro, URI e dettaglio](../../.gitbook/assets/admin-security-simple-ids.png)

* **Eventi per giorno (ultimi 7 giorni)**, **Eventi per tipo (ultimi 30 giorni)** e **IP di attacco principali (ultimi 30 giorni)** — Grafici di sintesi
* **Tabella degli eventi IDS segnalati** — Ogni voce mostra la data, l'IP di origine, il tipo di rilevamento (ad esempio `XSS`), il parametro interessato, l'URI della richiesta e una breve descrizione di ciò che è stato rilevato

Utilizzare i filtri **IP**, tipo di evento e intervallo di date sopra i grafici per restringere i risultati.

## Come funziona

* Ogni richiesta viene analizzata in ingresso; le corrispondenze vengono aggiunte a `var/logs/ids/ids_events.log`
* In uscita, lo stesso subscriber aggiunge all'intestazione della risposta le intestazioni di sicurezza raccomandate da OWASP
* Se il blocco è abilitato, una richiesta che corrisponde a una firma viene interrotta immediatamente con una risposta HTTP 400 invece di raggiungere il codice dell'applicazione

## Configurazione

Simple IDS è controllato da variabili d'ambiente, impostate in `config/packages/chamilo_ids.yaml`:

| Variabile | Scopo |
|----------|---------|
| `IDS_ENABLED` | Attiva o disattiva l'analisi e la registrazione delle richieste |
| `IDS_BLOCK` | Se abilitato, una richiesta rilevata viene rifiutata (HTTP 400) invece di essere solo registrata |
| `IDS_SECURITY_HEADERS` | Controlla se vengono aggiunte le intestazioni di risposta raccomandate da OWASP |

Si tratta di un rilevatore leggero, basato sul best-effort, pensato per intercettare tentativi evidenti di scansione e sfruttamento — non sostituisce un web application firewall (WAF) dedicato per le installazioni ad alto rischio.