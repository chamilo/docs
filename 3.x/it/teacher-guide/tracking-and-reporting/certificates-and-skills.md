# Certificati e competenze

Chamilo consente di assegnare certificati ai discenti che soddisfano criteri di conseguimento specifici e di convalidare le competenze associate a tali conseguimenti.

## Come funzionano i certificati

I certificati sono collegati alle **Valutazioni** (dette anche Gradebook). Quando il voto di un discente raggiunge o supera la soglia minima da voi definita, un certificato diventa disponibile per il download.

Il flusso di lavoro è il seguente:

1. Configurate le [Valutazioni](../assessing-learners/gradebook.md) con esercizi, compiti e altre attività valutate
2. Definite un **punteggio minimo di certificazione** (ad es. 70%)
3. Quando un discente raggiunge quel punteggio, può scaricare il proprio certificato (all'interno dello strumento Valutazioni stesso, oppure da un percorso di apprendimento se avete configurato il passaggio finale a tale scopo). Come docente, potete anche usare l'azione **Genera certificati** nel gradebook per creare i PDF in batch per tutti i discenti idonei.

## Modelli di certificato

I certificati utilizzano modelli definiti dall'amministratore della piattaforma. Il modello include in genere:

* Il nome del discente
* Il nome del corso
* La data di completamento
* Il punteggio ottenuto
* Un codice QR o un URL per la verifica online

## Validità e scadenza dei certificati

I certificati possono essere impostati per scadere dopo un determinato numero di giorni. Nelle impostazioni delle [Valutazioni](../assessing-learners/gradebook.md) per la categoria radice, una volta abilitata l'opzione **Genera certificati**, compare il campo **Validità del certificato (giorni)**. Lasciatelo a `0` (il valore predefinito) per certificati che non scadono mai, oppure impostate un numero di giorni affinché il certificato scada quel numero di giorni dopo l'emissione.

La data di scadenza di ciascun certificato viene calcolata automaticamente da tale impostazione al momento della generazione (o della rigenerazione) — non la si imposta certificato per certificato. L'elenco **Certificati** mostra una colonna **Data di scadenza** per ciascun discente, con la dicitura **Non scade mai** quando non si applica alcun periodo di validità.

Se la categoria non ha un periodo di validità configurato, potete comunque impostare (o modificare) a mano la data di scadenza di un singolo discente: fate clic sul pulsante a forma di matita **Modifica data di scadenza** accanto alla relativa voce e scegliete una data. Questo pulsante è disponibile solo quando la categoria stessa non ha un periodo di validità — una volta impostato un periodo di validità, le date di scadenza sono gestite automaticamente e non possono più essere modificate certificato per certificato.

![L'elenco dei certificati che mostra la colonna Data di scadenza per tre discenti](/.gitbook/assets/gradebook-certificates-expiry-dates.png)

### Promemoria ai discenti per una scadenza imminente o già trascorsa

Aprite l'elenco **Certificati** della vostra valutazione e fate clic sul pulsante **Certificati in scadenza** <img src="/.gitbook/assets/icons/mdi-calendar-clock.svg" alt="Certificati in scadenza" data-size="line"> per vedere quali certificati dei discenti sono scaduti o stanno per scadere. La pagina mostra, per ciascun discente: la **Data di scadenza** del certificato, il relativo **Stato** (**Scaduto** o **In scadenza a breve**) e quando è stato inviato l'**Ultimo promemoria** (oppure **Mai**). Usate **Giorni di anticipo** per ampliare o restringere l'orizzonte temporale di "in scadenza a breve".

![La pagina Certificati in scadenza che elenca un certificato scaduto e uno in scadenza a breve](/.gitbook/assets/gradebook-certificate-expirations.png)

Per notificare voi stessi i discenti:

1. Selezionate i discenti a cui inviare il promemoria (oppure selezionate tutti)
2. Fate clic su **Invia notifica**
3. Controllate l'anteprima dell'e-mail che verrà inviata — vengono mostrate anteprime distinte per il testo "in scadenza a breve" e "scaduto", a seconda di quali discenti selezionati rientrano in ciascun caso
4. Confermate facendo di nuovo clic su **Invia notifica** nella finestra di dialogo

![La finestra di conferma Invia notifica con l'anteprima del testo delle e-mail per certificati in scadenza e scaduti](/.gitbook/assets/gradebook-certificate-expiry-notification.png)

Ogni discente viene notificato nella propria lingua configurata, sia via e-mail sia tramite un messaggio interno di Chamilo. Un nuovo invio per lo stesso certificato e la stessa data di scadenza è sicuro — Chamilo tiene traccia di ciò che è già stato inviato per ciascun certificato e non inonderà un discente di promemoria duplicati a meno che non effettuiate esplicitamente un nuovo invio.

Gli amministratori possono anche programmare automaticamente gli stessi promemoria, su base ricorrente, senza che un docente debba attivarli a mano — si veda [Impostazioni dei cron job](../../admin-guide/platform-settings/crons-settings.md#certificate-expiry-reminders).

## Competenze

Le competenze (skills) rappresentano le capacità che i discenti acquisiscono. In Chamilo:

* Le competenze possono essere collegate ai conseguimenti del gradebook
* Quando un discente ottiene un certificato, eventuali competenze associate vengono convalidate automaticamente
* Le competenze si accumulano nel profilo del discente, creando un registro delle capacità
* Le competenze possono essere organizzate in modo gerarchico (ad es. "Analisi dei dati" sotto "Metodi di ricerca")
* Le competenze possono essere ulteriormente valutate dai pari (valutazione a 360°)

## Visualizzazione dello stato di attestati e competenze

In qualità di docente, è possibile visualizzare:

* Quali studenti hanno ottenuto attestati nel proprio corso
* Quali competenze sono state convalidate
* I progressi degli studenti verso la soglia di certificazione
* Quali attestati sono scaduti o stanno per scadere, e se è già stato inviato un sollecito relativo a essi

Gli studenti possono visualizzare i propri attestati e le competenze convalidate dal proprio profilo e possono accedere alla Ruota delle competenze per verificare quali competenze sono richieste nella propria organizzazione.

## Consigli

* **Stabilire aspettative chiare** — Comunicare agli studenti all'inizio del corso cosa devono raggiungere per ottenere un attestato
* **Usare nomi di competenze significativi** — Le competenze devono descrivere ciò che lo studente è in grado di fare, non solo il nome del corso
* **Combinare con i portfolio** — Incoraggiare gli studenti ad aggiungere i propri attestati al portfolio
* **Estendere gli attestati** — Chiedere all'amministratore di abilitare il plugin [Custom Certificate](../plugins/custom-certificate.md) per sbloccare ulteriori potenzialità di personalizzazione dei modelli di attestato
* **Impostare un periodo di validità per le certificazioni legate alla conformità** — Se una certificazione richiede un rinnovo periodico (ad es. formazione sulla sicurezza), impostare **Validità dell'attestato (giorni)** in modo che gli studenti ricevano un sollecito prima della scadenza