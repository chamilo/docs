# Gestione dei Plugin

## Accesso al Gestore dei Plugin

![Il gestore dei plugin che mostra un elenco di plugin disponibili con interruttori di attivazione e opzioni di configurazione](/.gitbook/assets/admin-plugin-manager.png)

Dal pannello di amministrazione, fare clic su **Gestisci plugin** per visualizzare l'elenco dei plugin disponibili.

## Stati dei Plugin

Ogni plugin può trovarsi in uno dei due stati:

* **Attivo** — Il plugin è abilitato e le sue funzionalità sono disponibili sulla piattaforma
* **Inattivo** — Il plugin è installato ma disabilitato

## Attivazione di un Plugin

1. Trovare il plugin nell'elenco
2. Fare clic su **Installa**, quindi su **Abilita** o attivare l'interruttore
3. Configurare le impostazioni del plugin (se applicabile, trovare il pulsante **Configura**)
4. Salvare
5. Se consigliato nel README, abilitarlo in una specifica **regione**

Alcuni plugin aggiungono strumenti ai corsi, nuove pagine alla piattaforma o funzionalità aggiuntive alle caratteristiche esistenti.

## Configurazione di un Plugin

Molti plugin hanno opzioni di configurazione. Dopo aver attivato un plugin:

1. Fare clic sul pulsante **Configura** accanto al plugin
2. Compilare la configurazione richiesta (chiavi API, URL, opzioni, ecc.)
3. Salvare

## Disattivazione di un Plugin

1. Trovare il plugin nell'elenco
2. Fare clic su **Disabilita** o disattivare l'interruttore
3. Le funzionalità del plugin vengono immediatamente rimosse dalla piattaforma, ma il plugin rimane installato e conserva la sua configurazione finché non lo si **Disinstalla**

Disabilitare un plugin non elimina i suoi dati. Se lo si abilita successivamente, i dati saranno ancora disponibili.

## Suggerimenti

* **Attivare solo ciò che serve** — Ogni plugin attivo aggiunge un certo overhead. Mantenere disattivati i plugin non utilizzati.
* **Testare prima della produzione** — Attivare i nuovi plugin prima in un ambiente di test
* **Verificare la compatibilità** — Dopo un aggiornamento di Chamilo, controllare che tutti i plugin attivi funzionino ancora correttamente