# Esportazione sicura della diagnostica di configurazione

Chamilo 3.1 fornisce un report JSON scaricabile per diagnosticare problemi di configurazione senza esportare intenzionalmente valori riservati delle impostazioni. Il report è limitato all'**URL di accesso corrente** e richiede un ruolo di amministratore.

## Scaricare il report

1. Aprire **Amministrazione > Impostazioni** sul portale che si desidera esaminare.
2. Selezionare **Scarica la configurazione per il debug**.
3. Salvare in modo sicuro il file generato `chamilo-configuration-dump.json`.
4. **Esaminare l'intero file prima di inviarlo a chiunque**, anche se sembra essere stato sanificato.

Il report include un timestamp di esportazione, l'ambito dell'URL di accesso, le impostazioni della piattaforma sanificate e lo stato di installazione/attivazione dei plugin, oltre alla configurazione sanificata dei plugin. Si tratta di un'esportazione in sola lettura; scaricarla non modifica le impostazioni di sistema.

## Riservatezza e limiti dell'URL di accesso

I valori sensibili vengono oscurati dal livello di sanificazione. Le impostazioni dei plugin sono trattate come riservate per impostazione predefinita, salvo classificazione esplicita per un'esportazione sicura. Ciononostante, i nomi delle impostazioni, i nomi dei plugin e altri metadati diagnostici possono rivelare dettagli di implementazione; pertanto, distribuire il file solo a personale di supporto di fiducia.

Nelle installazioni multi-URL, il backend verifica che l'URL di accesso risolto corrisponda all'host della richiesta, anziché esportare silenziosamente la configurazione di un altro portale. Confermare l'indirizzo del portale prima di scaricare.

## Risoluzione dei problemi

Se l'esportazione non è disponibile, verificare che l'account disponga di privilegi di amministratore e che il portale richiesto si risolva nel proprio URL di accesso. Esaminare i log del server web e dell'applicazione senza copiare credenziali o informazioni personali nei ticket di supporto.

Vedere [Strumenti di sistema](system-tools.md) e [Impostazioni di sicurezza](../platform-settings/security-settings.md). Implementazione: [PR #9476](https://github.com/chamilo/chamilo-lms/pull/9476).