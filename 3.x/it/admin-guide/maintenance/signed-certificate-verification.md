# Verifica dei certificati firmati

Chamilo può emettere **credenziali firmate digitalmente** per i certificati del registro delle valutazioni e, facoltativamente, ancorare un'impronta della credenziale sulla **rete di test Sepolia di Ethereum**. La firma e la pagina di verifica sono distinte dai certificati PDF ordinari.

## Abilitare le credenziali firmate

In **Amministrazione > Impostazioni di configurazione > Certificati**, abilitare `certificate.blockchain_verification_enabled` se l'istituzione intende utilizzare questa funzionalità. È disabilitata per impostazione predefinita. Il portale deve utilizzare HTTPS per l'emissione delle credenziali.

## Il consenso del discente viene prima

Il titolare di un certificato apre **I miei certificati** e sceglie esplicitamente **Approva pubblicazione**. Il consenso riguarda una credenziale verificabile pubblicamente che mostra il nome del titolare, il corso, il punteggio e la data di emissione e, facoltativamente, l'impronta SHA-256 su Sepolia. L'approvazione non è automatica. Il discente può successivamente selezionare **Ritira il consenso**; il ritiro influisce sulla validità visualizzata dalla pagina di verifica, ma **non può cancellare un'impronta blockchain già confermata**.

## Emettere, verificare e revocare

Un amministratore della piattaforma autenticato direttamente può utilizzare l'elenco **Certificati** del registro delle valutazioni per emettere la credenziale firmata una volta che il titolare ha prestato il consenso. Il collegamento di verifica risultante utilizza `/certificates/verify/{token}`; è disponibile anche una risposta di verifica `.json`. La pagina verifica la firma crittografica, il consenso, la revoca, la scadenza e se le informazioni del certificato sottostante corrispondono ancora alla fonte firmata.

Se una credenziale viene revocata, il consenso viene ritirato, il certificato cambia o la firma non è valida, il verificatore indica tale stato invece di segnalare una credenziale valida.

## Ancoraggio facoltativo su Sepolia

Un amministratore può scegliere **Ancora sulla testnet Sepolia** utilizzando un portafoglio del browser supportato oppure **Conferma transazione Sepolia esistente** per riconciliare una transazione in sospeso. Il portafoglio deve essere connesso a Sepolia (chain ID `11155111`). L'applicazione conferma la transazione utilizzando un **endpoint RPC HTTPS di Sepolia** configurato sul server (`CHAMILO_CERTIFICATE_SEPOLIA_RPC_URL`). Non viene accettato alcun URL RPC fornito dalla richiesta.

Viene ancorata solo l'impronta della credenziale; i dati personali non vengono inviati come dati della transazione. Sepolia è una **testnet**. I suoi registri e la sua disponibilità non devono essere presentati come una garanzia di blockchain pubblica di livello produttivo. Conservare in modo sicuro le chiavi dell'istituzione e la configurazione RPC e pianificare le procedure di recupero delle chiavi e di revoca delle credenziali.

Implementazione: [Verifica delle credenziali dei certificati #9298](https://github.com/chamilo/chamilo-lms/pull/9298).