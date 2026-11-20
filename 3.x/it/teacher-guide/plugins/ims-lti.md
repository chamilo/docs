# Client IMS/LTI

Il client IMS/LTI <img src="/.gitbook/assets/icons/mdi-link-variant.svg" alt="Client IMS/LTI" data-size="line"> consente di avviare uno strumento esterno o un fornitore di contenuti dall'interno del corso utilizzando lo standard LTI (versioni 1.1 e 1.3) — ad esempio, un libro di testo interattivo di un editore, uno strumento di simulazione specializzato o un'altra piattaforma che supporta LTI. Chamilo agisce come piattaforma di avvio; il servizio esterno è lo «strumento».

## Accesso allo strumento

Una volta abilitato, nel corso compare un pulsante **Configura strumenti esterni** in **Impostazioni** <img src="/.gitbook/assets/icons/mdi-cog.svg" alt="Impostazioni" data-size="line">. Da lì è possibile:

* **Aggiungere un nuovo strumento esterno** — Registrarlo autonomamente: nome, URL di avvio, versione LTI e le credenziali fornite dal servizio esterno (ID client/chiavi per LTI 1.3, oppure consumer key e secret per LTI 1.1)
* **Aggiungere uno strumento globale esistente** — Se l'amministratore ha già registrato uno strumento a livello di piattaforma, aggiungerlo al corso invece di creare una connessione propria

Una volta aggiunto, lo strumento compare come strumento/scorciatoia regolare nella homepage del corso.

## Cosa è possibile configurare

Per uno strumento registrato autonomamente: se si apre in un iframe o in una nuova finestra, se nome, e-mail e foto del discente vengono condivisi con il servizio esterno, parametri di avvio personalizzati e (per LTI 1.3) il supporto a Deep Linking. Se lo strumento supporta Assignment and Grades Service, è anche possibile creare una colonna del registro valutazioni collegata, in modo che i punteggi restituiti alimentino il registro valutazioni di Chamilo.

Per uno strumento aggiunto da una definizione «globale» a livello di piattaforma, è possibile modificare solo queste opzioni di presentazione e privacy a livello di corso — le credenziali di connessione appartengono a chi ha registrato lo strumento di base (di solito l'amministratore).

## Consigli

* **Ottenere prima le credenziali dal fornitore dello strumento** — Servono l'URL di avvio e i dettagli client/chiave LTI 1.3 oppure una consumer key e un secret LTI 1.1 prima di poter registrare un nuovo strumento
* **Essere deliberati su ciò che si condivide** — Abilitare la condivisione di nome, e-mail o foto del discente con un servizio esterno solo se lo strumento ne ha effettivamente bisogno
* **Chiedere all'amministratore gli strumenti globali** — Se lo stesso strumento esterno è usato in molti corsi, una registrazione a livello di piattaforma evita che ogni docente configuri una connessione propria separatamente