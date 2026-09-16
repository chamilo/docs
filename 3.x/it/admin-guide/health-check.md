# Controllo di integrità

Il Controllo di integrità è un piccolo blocco nella dashboard di amministrazione che esegue una manciata di verifiche in tempo reale sull'installazione e segnala tutto ciò che richiede attenzione — senza bisogno di esaminare i file di configurazione per individuare le configurazioni errate più comuni.

![Il blocco Controllo di integrità nella dashboard di amministrazione, che mostra lo stato superato/non superato per le impostazioni e-mail, l'assegnazione dell'URL amministratore e i controlli sui permessi dei file](/.gitbook/assets/admin-health-check-block.png)

## Accesso al Controllo di integrità

Dal pannello di amministrazione, il blocco **Controllo di integrità** compare accanto agli altri blocchi della dashboard — non è necessario alcun clic, i risultati sono mostrati direttamente.

## I controlli

* **Impostazioni e-mail** — Verifica che siano configurati una stringa di connessione del mailer e un indirizzo/nome e-mail "from". In caso contrario, collega alle Impostazioni della posta per correggerle.
* **Tutti gli URL hanno almeno un amministratore assegnato** — In un'installazione multi-URL, verifica che ogni URL di accesso abbia almeno un amministratore che possa gestirlo. Se uno non lo ha, collega alla pagina di assegnazione URL di accesso/utente.
* **`.env` non è scrivibile** — `.env` contiene segreti e non dovrebbe essere scrivibile dal server web dopo l'installazione. Segnalato come errore se lo è; collega alla Guida alla sicurezza.
* **`config/` non è scrivibile** — Stesso ragionamento di `.env`: questa directory non dovrebbe essere scrivibile dal web in funzionamento normale. Collega alla Guida alla sicurezza.
* **`var/cache` è scrivibile** — Il controllo opposto: Symfony deve poter scrivere nella propria directory di cache, quindi questo viene segnalato come errore se *non* è scrivibile. Collega alla guida Ottimizzazione delle prestazioni / optimization.
* **La cartella di installazione non è presente** — La cartella `public/main/install` è necessaria solo durante l'installazione e dovrebbe essere rimossa in seguito. Questo viene segnalato come avviso (non come errore grave) se esiste ancora, poiché è un rischio di gravità inferiore rispetto ai due controlli di scrivibilità precedenti. Collega alla Guida alla sicurezza.

## Cosa fare al riguardo

Ogni controllo collega direttamente al punto in cui si corregge il problema sottostante — una pagina di impostazioni o la guida pertinente. Esaminare questo elenco subito dopo l'installazione e periodicamente in seguito (ad esempio, dopo un trasferimento manuale di file o una modifica dei permessi), poiché un controllo superato oggi non garantisce che resti tale. Per una checklist più ampia di hardening in produzione oltre questi sei controlli, consultare la [Guida alla sicurezza](appendix/security-guide.md).