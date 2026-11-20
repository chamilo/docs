# Videochiamate individuali

Chamilo include le **videochiamate individuali** opzionali all'interno della **chat flottante della piattaforma**. Utilizza il supporto WebRTC del browser per collegare due persone che usano Chamilo. È diversa dallo **strumento Chat del corso** e dalle riunioni create con BigBlueButton o Zoom.

Questa funzionalità è stata introdotta e migliorata per la [issue #3777](https://github.com/chamilo/chamilo-lms/issues/3777) nelle PR [#9102](https://github.com/chamilo/chamilo-lms/pull/9102), [#9110](https://github.com/chamilo/chamilo-lms/pull/9110), [#9112](https://github.com/chamilo/chamilo-lms/pull/9112), [#9127](https://github.com/chamilo/chamilo-lms/pull/9127) e [#9128](https://github.com/chamilo/chamilo-lms/pull/9128).

## Prima di iniziare

* L'amministratore deve consentire l'uso della chat flottante della piattaforma e impostare **Nascondi l'opzione di videochat nella chat globale** (`chat.hide_chat_video`) su **No**. È nascosta per impostazione predefinita. Vedere [Impostazioni della chat](../admin-guide/platform-settings/chat-settings.md).
* Utilizzare un browser che supporti WebRTC, con l'autorizzazione ad accedere alla videocamera e al microfono. L'accesso ai contenuti multimediali del browser richiede in genere HTTPS (o un contesto di sviluppo locale attendibile).
* Accedere e impostare lo stato della chat su **online**. Scegliere un contatto utente ordinario; il pulsante video non compare per un bot o quando la funzionalità è disabilitata.
* L'altro utente deve essere disponibile per ricevere e accettare la chiamata.

## Avviare una chiamata

1. Aprire il **pannello della chat flottante** nella parte inferiore di Chamilo (non la pagina Chat del corso).
2. Selezionare la persona da contattare.
3. Nell'intestazione della conversazione, fare clic sull'icona della videocamera **Avvia videochiamata**.
4. Concedere l'accesso alla videocamera e al microfono quando il browser lo richiede.
5. La chiamata mostra **Chiamata in corso...** mentre Chamilo attende l'altro utente. Quando accetta, lo stato passa da **Connessione in corso...** a **Connesso** dopo che la connessione peer ha esito positivo.

Una chiamata senza risposta scade invece di continuare indefinitamente. Se l'altro utente rifiuta o annulla, la chat mostra un messaggio di stato esplicativo.

## Ricevere e gestire una chiamata

Quando un contatto chiama, la chat flottante visualizza una finestra di dialogo **Videochiamata in arrivo**. Scegliere **Accetta** per partecipare o **Rifiuta** per declinare. L'accettazione può anche richiedere l'autorizzazione a usare la videocamera e il microfono.

Durante una chiamata è possibile **disattivare o riattivare il microfono**, **accendere o spegnere la videocamera** e **riagganciare**. Una piccola anteprima mostra il video locale, mentre l'area principale mostra l'altra persona. Chiudere o terminare la chiamata rilascia i flussi audio/video locali.

Si tratta di una **chiamata privata tra due utenti**, non di una riunione per l'intero corso. Per tenere una sessione di gruppo programmata con strumenti di registrazione o collaborazione, utilizzare l'integrazione di [Videoconferenza](../teacher-guide/collaboration-and-communication/video-conferencing.md) della propria organizzazione.

## Se la videochiamata non è disponibile

* **Nessuna icona Avvia videochiamata:** Verificare l'impostazione `chat.hide_chat_video` della piattaforma, se la chat flottante è disponibile, lo stato online e il supporto WebRTC del browser.
* **Errore di videocamera o microfono:** Consentire le autorizzazioni multimediali nel browser e verificare che l'hardware sia presente e non occupato da un'altra applicazione.
* **Nessuna risposta:** Chiedere al contatto di aprire Chamilo e verificare la propria disponibilità. La richiesta in uscita ha un timeout.
* **La connessione non riesce dopo l'accettazione:** Provare un'altra rete e verificare le autorizzazioni del browser o le restrizioni del firewall. L'implementazione WebRTC attuale utilizza un server STUN pubblico e non configura un relay TURN, pertanto la connettività può non riuscire su reti restrittive. La chat testuale può comunque funzionare se la segnalazione video non riesce.

Non è necessario configurare BigBlueButton o Zoom per questa funzionalità di chiamata diretta; tali integrazioni forniscono un tipo di riunione distinto.