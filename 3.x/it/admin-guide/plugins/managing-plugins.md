# Gestione dei plugin

## Accesso al gestore dei plugin

![Il gestore dei plugin che mostra un elenco di plugin disponibili con interruttori di attivazione e opzioni di configurazione](../../.gitbook/assets/admin-plugin-manager.png)

Dal pannello di amministrazione, fare clic su **Gestisci plugin** per visualizzare l'elenco dei plugin disponibili.

## Stati dei plugin

Ogni plugin ha uno dei due stati seguenti:

* **Attivo** — Il plugin è abilitato e le sue funzionalità sono disponibili sulla piattaforma
* **Inattivo** — Il plugin è installato ma disabilitato

## Attivazione di un plugin

1. Individuare il plugin nell'elenco
2. Fare clic su **Installa**, quindi su **Abilita** oppure attivarlo con l'interruttore
3. Configurare le impostazioni del plugin (se applicabile, individuare il pulsante **Configura**)
4. Salvare
5. Se consigliato nel README, abilitarlo in una **regione** specifica

Alcuni plugin aggiungono strumenti ai corsi, nuove pagine alla piattaforma o funzionalità aggiuntive a quelle esistenti.

## Configurazione di un plugin

Molti plugin dispongono di opzioni di configurazione. Dopo aver attivato un plugin:

1. Fare clic sul pulsante **Configura** accanto al plugin
2. Compilare la configurazione richiesta (chiavi API, URL, opzioni, ecc.)
3. Salvare

## Disattivazione di un plugin

1. Individuare il plugin nell'elenco
2. Fare clic su **Disabilita** oppure disattivarlo con l'interruttore
3. Le funzionalità del plugin vengono rimosse immediatamente dalla piattaforma, ma il plugin resta installato e mantiene la propria configurazione finché non lo si **Disinstalla**

La disabilitazione di un plugin non elimina i suoi dati. Se lo si abilita in seguito, i dati restano disponibili.

## Consigli

* **Attivare solo ciò che serve** — Ogni plugin attivo aggiunge un certo overhead. Mantenere disattivati i plugin non utilizzati.
* **Testare prima della produzione** — Attivare i nuovi plugin prima in un ambiente di test
* **Verificare la compatibilità** — Dopo un aggiornamento di Chamilo, verificare che tutti i plugin attivi funzionino ancora correttamente