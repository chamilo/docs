# BuyCourses: pagamenti e servizi ricorrenti

Il plugin **BuyCourses** vende l'accesso a corsi e sessioni e può offrire servizi a pagamento. I metodi di pagamento dipendono dai gateway configurati per l'installazione.

## Configurazione dei pagamenti

Aprire **Amministrazione > Plugin > BuyCourses** e accedere all'area di configurazione dei pagamenti. Conservare le credenziali dei gateway sul server, non in una pagina visibile agli studenti. I metodi esistenti, come Stripe e PayPal, continuano a funzionare indipendentemente da BTCPay Server.

### BTCPay Server (acquisti di corsi e sessioni)

Il plugin supporta anche **BTCPay Server** per gli acquisti di corsi e sessioni:

1. Abilitare il metodo di pagamento BTCPay nella configurazione di BuyCourses.
2. Impostare **Server URL**, **Store ID**, **Greenfield API key** e **webhook secret** di BTCPay.
3. Usare il **connection test** della configurazione dei pagamenti per confermare l'accesso alla Greenfield API.
4. Configurare il webhook sul lato BTCPay usando l'URL del webhook mostrato dal plugin e lo stesso secret.
5. Completare un piccolo acquisto di prova prima di offrire questa opzione agli studenti.

L'acquirente viene reindirizzato al checkout ospitato da BTCPay. Chamilo verifica le firme dei webhook e recupera nuovamente la fattura per convalidare **store, importo, valuta e dettagli dell'ordine** prima di contrassegnare l'ordine come pagato e iscrivere l'acquirente. Un ritorno dal browser può riconciliare un webhook mancato o ritardato. Le notifiche ripetute non creano un adempimento duplicato.

Solo i pagamenti verificati e saldati (inclusi i pagamenti in eccesso accettati e le fatture saldate esplicitamente contrassegnate dall'amministratore) concedono l'accesso. **I pagamenti parziali, in ritardo, scaduti o non validi non devono essere trattati come adempiuti automaticamente**; i pagamenti eccezionali richiedono una revisione manuale.

**Installazioni esistenti:** eseguire una volta la procedura di aggiornamento del plugin per creare `plugin_buycourses_btcpay_account`. Un amministratore può aprire `/plugin/BuyCourses/update.php` oppure salvare la configurazione del pagamento BTCPay, operazione che assicura anche l'esistenza della tabella del plugin. Questo aggiornamento è specifico di BuyCourses e non è una migrazione globale del database.

BTCPay **non** è documentato qui come gateway per i servizi ricorrenti; non si deve presumere che implementi rinnovi automatici degli abbonamenti nello stile di Stripe/PayPal.

## Ciclo di vita dei servizi ricorrenti

Gli studenti possono usare **I miei servizi** per visualizzare i servizi ricorrenti attivi e la cronologia degli acquisti e dei pagamenti. Per i servizi con rinnovi automatici supportati:

* Ogni pagamento di rinnovo ha un proprio record storico e una ricevuta.
* L'annullamento di un rinnovo impedisce gli addebiti futuri, ma lascia il servizio pagato accessibile fino alla scadenza del periodo già pagato.
* Gli amministratori possono inoltre annullare i rinnovi dal **report delle vendite dei servizi**.
* Un abbonamento ricorrente attivo, in sospeso o comunque in corso è protetto dagli acquisti duplicati.
* Un servizio scaduto o completamente annullato può essere acquistato di nuovo.

La **cronologia degli acquisti** e la **cronologia dei pagamenti** sono distinte: un singolo acquisto di un servizio può avere diversi pagamenti di rinnovo. Non si deve dedurre che un pagamento rinnovato sia un secondo acquisto.

## Totali dei pagamenti nelle vendite dei servizi

Nel **report delle vendite dei servizi** dell'amministratore, due colonne aiutano a distinguere l'importo dell'ordine originale dai pagamenti riscossi nel tempo:

* **Ultimo pagamento** mostra la data del pagamento riuscito più recente registrato per quella vendita di servizio. Se non è disponibile alcuna data di pagamento, il report mostra un trattino.
* **Totale riscosso** mostra l'importo iniziale dell'acquisto riscosso più gli importi dei rinnovi riusciti registrati, formattati nella valuta del servizio. Non corrisponde al prezzo di un singolo periodo di fatturazione.

Il calcolo usa la cronologia di audit della vendita del servizio, evita di conteggiare eventi di rinnovo duplicati e tiene conto dell'addebito iniziale dell'abbonamento Stripe senza contarlo due volte. Per casi eccezionali di pagamento o rimborso, riconciliare il report con il fornitore di pagamento; l'importo mostrato non è un payout del gateway né un registro separato dei rimborsi.

## Abbonamenti Stripe storici

BuyCourses può riconciliare la cronologia delle fatture Stripe per i servizi ricorrenti più vecchi le cui transazioni di rinnovo non erano state registrate completamente nel log di audit del plugin. La vista **I miei servizi** e il report delle vendite dei servizi possono aggiornare tali record e aggiornare il periodo pagato e i totali noti localmente. Gli amministratori devono verificare le differenze eccezionali nella cronologia dei pagamenti rispetto a Stripe, anziché modificare direttamente le vendite.

## Filtraggio dei report delle vendite

Il **report delle vendite di corsi e sessioni** può essere filtrato per stato dell'ordine, utente, intervallo di date o e-mail. I filtri opzionali sui prodotti consentono di restringere i risultati per tipo di prodotto e nome del prodotto. Il **report delle vendite dei servizi** supporta il filtraggio per stato, oltre alla ricerca per utente/e-mail/nome/riferimento dell'ordine e alla ricerca per nome del servizio. Verificare i filtri attivi prima di esportare o riconciliare le vendite; le due schermate dei report hanno controlli di filtro diversi.

Vedere [Filtri delle vendite di BuyCourses PR #9387](https://github.com/chamilo/chamilo-lms/pull/9387).

## Ciclo di vita dei corsi collegati agli abbonamenti e salvaguardie per l'eliminazione

BuyCourses può chiudere, nascondere e riattivare i corsi associati agli abbonamenti a servizi ricorrenti in base all'evoluzione del loro stato di pagamento. Nel **Subscription behavior JSON** di un servizio, `hide_after_days` specifica il ritardo dopo la chiusura prima di nascondere un corso (valore predefinito: 30 giorni), mentre `delete_after_days` specifica il ritardo dopo l'occultamento prima dell'eliminazione definitiva. L'eliminazione è disattivata per impostazione predefinita (`null`); solo un valore positivo rende un corso idoneo.

Gli amministratori possono esaminare i corsi idonei, in sospeso e bloccati all'indirizzo `/admin/buycourses/course-lifecycle`. L'interfaccia supporta una simulazione non distruttiva e l'eliminazione mirata di **un corso idoneo per esecuzione**, protetta da una conferma esplicita. Il processore CLI `chamilo:buycourses:process-recurring-subscriptions` supporta inoltre `--dry-run`, `--delete-expired` e `--max-deletions` (1–25). Senza `--delete-expired`, non elimina definitivamente i corsi.

**L'eliminazione definitiva è distruttiva.** Conservare i backup e testare prima con corsi usa e getta. I controlli di idoneità proteggono le vendite attive, i corsi collegati a sessioni e le proprietà incoerenti; l'eliminazione automatica è bloccata per le installazioni con più URL di accesso. Esaminare il comportamento concorrente di rinnovo ed eliminazione prima di pianificare una pulizia distruttiva in produzione. Vedere [PR sul ciclo di vita dei corsi in abbonamento #9442](https://github.com/chamilo/chamilo-lms/pull/9442).

## Controlli operativi

Dopo l'aggiornamento, testare un acquisto completo di un corso, un acquisto di sessione se è in vendita, un webhook ritardato o riprodotto, fatture BTCPay scadute e parziali, un rinnovo automatico e un annullamento con accesso che dura fino alla fine del periodo pagato. Tenere le credenziali e i segreti dei webhook fuori da schermate, registri e ticket di supporto.

## Rafforzamento dei pagamenti

### Controllo dell'importo del gateway (Redsys / Cecabank)

Quando la banca notifica alla piattaforma che un pagamento è riuscito, BuyCourses confronta l'importo addebitato dalla banca (in centesimi, dalla notifica firmata) con il prezzo della vendita. Se differiscono, la notifica viene rifiutata, la vendita resta in sospeso e una riga `[BuyCourses] Redsys notification refused` o `[BuyCourses] Cecabank notification refused` viene scritta nel registro degli errori PHP. I pagamenti normali non sono interessati.

Se una vendita resta in sospeso nonostante l'acquirente abbia pagato, controllare il registro: una modifica del prezzo dopo la creazione dell'ordine, o un pagamento parziale, vi comparirà. Completare manualmente tale vendita dal rapporto delle vendite una volta verificata.

### Token di sicurezza

* I moduli dei coupon (aggiunta / configurazione), il modulo pubblico delle schede dei piani e le azioni di pagamento utilizzano lo stesso token di amministrazione di BuyCourses di ogni altra pagina di amministrazione del plugin. Un modulo lasciato aperto a lungo continua a funzionare finché la sessione è attiva; dopo essersi disconnessi e riconnessi, ricaricare la pagina prima di salvare (altrimenti viene visualizzato un messaggio "Not validated").
* La pagina "richiedi fattura" (`request_invoice.php`) e l'attivazione web di `process_recurring_subscriptions.php` richiedono il token nel collegamento (`buycourses_admin_sec_token=...`). I collegamenti aggiunti ai segnalibri o inviati per posta senza di esso mostrano "Not validated". L'esecuzione da riga di comando/cron (`php .../process_recurring_subscriptions.php` o il comando della console) resta invariata e non richiede alcun token.
* Le pagine di successo (PayPal, Stripe, abbonamenti, servizi) mostrano una vendita solo all'utente che l'ha acquistata.
* Le azioni di pagamento (pagamento di massa PayPal, annullamento di un pagamento) sono riservate agli amministratori della piattaforma (gli amministratori di sessione non sono più accettati) e devono essere inviate come POST con il token.

### Date

La data di fine di una vendita in abbonamento è ora sempre calcolata in UTC, come la data di vendita, indipendentemente dal fuso orario del server.

### Limiti multi-URL

I limiti di creazione dei corsi e di hosting applicati alla scadenza di un servizio seguono la stessa regola del resto della piattaforma: un'impostazione bloccata, o contrassegnata come non modificabile, sull'URL principale non può essere sovrascritta da un altro URL.

Modifiche: [BTCPay #9286](https://github.com/chamilo/chamilo-lms/pull/9286), [servizi ricorrenti #9288](https://github.com/chamilo/chamilo-lms/pull/9288), [riconciliazione Stripe #9293](https://github.com/chamilo/chamilo-lms/pull/9293), [totali delle vendite di servizi #9220](https://github.com/chamilo/chamilo-lms/pull/9220).