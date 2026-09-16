# Impostazioni del corso

Le impostazioni del corso consentono di controllare il comportamento del corso: chi può accedervi, come viene visualizzato e quali funzionalità sono abilitate.

Per accedere alle impostazioni del corso, entrare nel corso e fare clic sull'icona **Impostazioni** <img src="/.gitbook/assets/icons/mdi-cog.svg" alt="Impostazioni" data-size="line"> accanto al pulsante **Passa alla vista studente**.

## Impostazioni generali

### Informazioni sul corso

* **Titolo del corso** — Il nome visualizzato del corso
* **Lingua del corso** — La lingua principale dell'interfaccia del corso
* **Categoria del corso** — La categoria in cui il corso compare nel catalogo
* **Immagine del corso** — Caricare una miniatura che rappresenti il corso negli elenchi dei corsi (verrà ridimensionata in base al contesto)

Il codice del corso (l'identificatore breve e univoco) viene impostato alla creazione del corso e non è modificabile da questa pagina.

Per impostazione predefinita, tutti gli utenti che accedono al corso vedranno l'intera interfaccia di Chamilo nella lingua del corso. Si tratta di una funzionalità immersiva. Gli amministratori possono modificare questo comportamento, ma è possibile modificarlo anche con una delle prime opzioni: **Mostra il corso nella lingua dell'utente** (impostata su No per impostazione predefinita) se si ritiene che ciò renda l'esperienza troppo difficile per gli utenti.

Il dipartimento e l'URL del dipartimento sono campi deprecati. Vengono mantenuti solo per motivi di compatibilità con le versioni precedenti.

Se abilitata, è possibile cambiare lo stile all'interno del corso con l'opzione **Fogli di stile**, utilizzando i fogli di stile esistenti sul portale. Questa opzione è spesso disabilitata dagli amministratori, per un design globale più integrato.

### Quota disco

Ogni corso ha un limite di archiviazione (quota disco) per i file caricati. La quota è impostata dall'amministratore della piattaforma. È possibile visualizzare il limite attuale nelle impostazioni del corso e l'utilizzo corrente nello strumento **Documenti**.

> Se lo spazio sta per esaurirsi, contattare l'amministratore della piattaforma per richiedere un aumento della quota, oppure rimuovere i file inutilizzati dallo strumento Documenti.

### Visibilità del corso

![Le impostazioni di visibilità del corso che mostrano le opzioni pubblico, aperto, registrato e chiuso](/.gitbook/assets/course-settings-visibility.png)

Controllare chi può accedere al corso:

| Impostazione | Descrizione |
|---------|-------------|
| **Pubblico** | Chiunque, inclusi i visitatori anonimi, può accedere al corso |
| **Aperto alla piattaforma** | Tutti gli utenti registrati sulla piattaforma possono accedere al corso |
| **Privato — accesso concesso da utenti privilegiati** | Solo gli utenti esplicitamente iscritti al corso possono accedervi |
| **Chiuso** | Il corso è bloccato; nessuno può accedervi tranne il docente |

#### Impostazioni di iscrizione

A seconda della configurazione della piattaforma, è possibile controllare:

* **Consenti autoiscrizione** — Se i discenti possono iscriversi autonomamente tramite il catalogo dei corsi
* **Consenti auto-disiscrizione** — Se i discenti possono abbandonare il corso autonomamente
* **Password di iscrizione** — Richiedere una password per l'autoiscrizione (utile per limitare l'accesso a un gruppo specifico), ma il livello di sicurezza è basso poiché la stessa password di accesso al corso è condivisa tra tutti gli utenti.

Queste impostazioni riguardano solo l'autoiscrizione. Per il quadro completo — inclusa l'iscrizione di un utente già esistente da parte del docente, o l'invito di qualcuno che non ha ancora un account sulla piattaforma — vedere [Iscrizione degli utenti](../assessing-learners/subscribing-users.md).

### Impostazioni dei documenti

Scegliere se mostrare o nascondere le cartelle di sistema nello strumento **Documenti** (nascoste per impostazione predefinita; nella maggior parte dei casi non sono necessarie e mostrarle potrebbe causare problemi con contenuti nascosti e con i discenti).

### Impostazioni delle notifiche e-mail

Configurare come l'attività del corso attiva le notifiche:

* **Notifiche e-mail per i nuovi contenuti** — Notificare gli utenti iscritti quando si aggiungono nuovi documenti, annunci o altri contenuti

### Impostazioni della chat

Controllare come verrà visualizzato lo strumento **Chat**.

### Impostazioni dei percorsi di apprendimento

* **Abilita i temi del corso** — Consentire ai percorsi di apprendimento di cambiare aspetto (non consigliato per un'esperienza utente integrata)
* **Collegamento di ritorno del percorso di apprendimento** — Decidere dove atterrano gli utenti quando fanno clic sull'icona **Home** in un percorso di apprendimento: l'elenco dei percorsi di apprendimento, la home del corso, *I miei corsi*, *Le mie sessioni* o la home del portale

### Impostazioni dell'avanzamento tematico

Configurare come i messaggi di avanzamento tematico appariranno nella homepage del corso.

### Impostazioni del forum

Controllare il comportamento nello strumento forum di questo corso.

### Impostazioni dei compiti

* **Impostazione predefinita per la visibilità dei file appena pubblicati** — Decidere se i nuovi documenti caricati dai discenti nello strumento **Compiti** sono condivisi con tutti gli altri discenti (No per impostazione predefinita)
* **Consenti ai discenti di eliminare le proprie pubblicazioni** — Consentire ai discenti di eliminare i compiti già caricati (nel caso in cui vogliano caricare una correzione).

### Impostazioni di avvio automatico

Un corso può essere configurato per un comportamento di avvio automatico, che accorcia il percorso degli studenti verso le parti importanti del corso. Se abilitato, gli studenti che accedono al corso verranno inviati direttamente allo strumento selezionato e non vedranno la homepage del corso come passaggio intermedio. È persino possibile selezionare percorsi di apprendimento o esercizi specifici da avviare all’arrivo nel corso. In questo caso, è necessario selezionare l’opzione qui, quindi andare all’elenco dei percorsi di apprendimento o degli esercizi e fare clic sull’icona del razzo <img src="/.gitbook/assets/icons/mdi-rocket-launch.svg" alt="Avvio automatico" data-size="line"> sull’elemento selezionato.

### Impostazioni degli assistenti IA

Questa sezione compare solo se l’amministratore ha abilitato gli strumenti di IA sulla piattaforma. Consente di perfezionare la selezione dei servizi di assistenza IA disponibili attraverso i diversi strumenti della piattaforma Chamilo. Disabilitarli se non si desidera utilizzarli, ma sarebbe probabilmente una cattiva idea, poiché sono molto potenti.

Queste funzionalità sono spiegate nella sezione **Strumenti di IA** di questa guida.

### Strumenti esterni (LTI)

Se abilitato sulla piattaforma, Learning Tools Integration consente di integrare in questo corso attività esterne compatibili, come icone individuali sulla homepage del corso. Trattare LTI esula dallo scopo di questa guida, ma si tratta di un potente sistema di integrazione per i docenti.

### Altro

Sezioni o opzioni aggiuntive potrebbero comparire in questa pagina a seconda delle opzioni e delle versioni di Chamilo.