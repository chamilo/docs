# Aggiornamento

Nota: in questa pagina utilizziamo 3.0.0 come numero di versione rigoroso e 3.x per identificare tutte le versioni che iniziano con il numero 3 (3.0.0, 3.0.1, 3.1.0, ecc.). La stessa convenzione si applica a 2.x.

Il processo di aggiornamento da 1.11.x è descritto anche nel file `public/documentation/installation_guide.html` all'interno del codice di Chamilo.
Le informazioni qui riportate sono in gran parte ridondanti. È possibile consultarle online all'indirizzo `https://campus.chamilo.net/documentation/installation_guide.html`.

**Aggiornare a 3.0, non a 2.x.** La versione 3.0 è la release corrente e alcune impostazioni di 1.11.x non avevano ancora un equivalente in 2.0.0. Un sistema 1.11.x passa quindi direttamente a 3.0. Abbiamo testato ampiamente migrazioni analoghe, ma ogni piattaforma ha una propria storia: provate prima in un ambiente di test e valutate di farvi accompagnare professionalmente dai [fornitori ufficiali Chamilo](https://chamilo.org/providers) in questa operazione.

## Aggiornamento da 1.11.x a 3.0

L'aggiornamento da Chamilo 1.11.x a 3.0 è una **migrazione maggiore**, non un semplice aggiornamento. Chamilo 2.0 è stato ricostruito sul framework Symfony con uno schema di database ristrutturato, una nuova API e un'organizzazione dei file diversa, e 3.0 prosegue su quella linea. Pianificate con attenzione questa migrazione e provatela in un ambiente di test prima di metterla in produzione.

### Prima di iniziare

1. **Leggete le note di rilascio** di Chamilo 3.x per comprendere cosa è cambiato, cosa è nuovo e quali funzionalità di 1.11.x potrebbero non essere ancora disponibili.
2. **Eseguite un backup completo**:
   - Dump completo del database (`mysqldump` o equivalente).
   - Tutti i file nella directory di installazione di Chamilo 1.11.x, in particolare `app/upload/`, `app/courses/` e `main/`.
   - Il file `configuration.php`.
3. **Provate prima su un server di staging.** Non eseguite mai la migrazione direttamente sul server di produzione.
4. **Verificate i requisiti del server.** Chamilo 3.x ha requisiti diversi rispetto a 1.11.x (in particolare PHP 8.3 o successivo — l'installer rifiuta qualsiasi versione precedente). Vedere [Requisiti del server](server-requirements.md).
5. **Eliminate la tabella `version` dal database 1.11.x.** Questo passaggio è obbligatorio. Chamilo 2.x e versioni successive memorizzano la cronologia delle migrazioni Doctrine in una tabella con quel nome, con altre colonne. Se lasciate al suo posto la tabella di 1.11.x, l'aggiornamento si interrompe immediatamente. La tabella non è necessaria al funzionamento di Chamilo 1.11.x.
6. **Scompattate il nuovo codice in una nuova directory.** I file di 1.11.x restano dove sono. L'installer li legge come origine dei corsi e degli upload e scrive il risultato nel nuovo albero.

### Esecuzione dell'aggiornamento

Potete eseguire l'aggiornamento tramite la procedura guidata web o tramite la riga di comando.

#### Procedura guidata web

1. Puntate il `DocumentRoot` del vostro virtual host alla sottodirectory `public/` del nuovo albero.
2. Aprite il vostro URL. La procedura guidata si avvia, perché il nuovo albero non ha ancora un file `.env`.
3. Al passo 2, selezionate l'opzione di aggiornamento e indicate il percorso radice della vostra installazione 1.11.x.
4. Seguite la procedura guidata fino alla fine.

#### Riga di comando

Impostate `UPDATE_PATH` sulla radice della vostra installazione 1.11.x, quindi eseguite le migrazioni:

```bash
UPDATE_PATH=/path/to/chamilo-1.11 php bin/console doctrine:migrations:migrate --no-interaction
```

Aumentate prima `memory_limit` e `max_execution_time`. La migrazione legge ogni file dei corsi, quindi necessita di molto più delle impostazioni predefinite.

#### Quanto tempo richiede

La durata dipende dalle dimensioni del database e dei file dei corsi. Come punto di riferimento, una piattaforma 1.11.28 con 238 tabelle, 11 corsi, 63 utenti e 1489 file di corso ha richiesto **6 minuti** e 1,7 GB di memoria ed ha eseguito 393 migrazioni. Una grande piattaforma di produzione richiede ore. Pianificate una finestra di manutenzione e consultate il [forum Chamilo](https://chamilo.org) o contattate un [fornitore ufficiale](https://chamilo.org/providers) prima di eseguirla in produzione.

### Cosa potrebbe richiedere attenzione manuale

| Area | Note |
|------|-------|
| **Plugin personalizzati** | I plugin di 1.11.x non funzionano in 2.x o 3.x. Devono essere riscritti o sostituiti. Quelli ufficiali sono stati portati progressivamente a partire da 2.0 — controllate l'elenco dei plugin della vostra versione per vedere quali sono disponibili. |
| **Temi personalizzati** | I temi di 1.11.x non funzionano in 2.x o 3.x. Ricreate il vostro branding utilizzando il sistema di temi di 3.x. |
| **Modifiche personalizzate al database** | Qualsiasi modifica diretta al database al di fuori di Chamilo potrebbe non essere migrata. |
| **Pacchetti SCORM** | I contenuti SCORM dovrebbero migrare, ma testate i pacchetti individualmente per verificarne la riproduzione. |
| **Integrazioni esterne** | Qualsiasi integrazione che utilizzi l'API o i web service di 1.11.x deve essere aggiornata per usare l'API REST-only di 2.x basata su [API Platform](https://github.com/api-platform/api-platform). |

## Aggiornamento da 2.x a 3.0

Questo aggiornamento mantiene la directory esistente e il database esistente. Copiate il nuovo codice sopra l'albero precedente, quindi eseguite le migrazioni, tramite la procedura guidata web o tramite la riga di comando.

### Inizializzare prima la cronologia delle migrazioni

Chamilo installa lo schema del database direttamente dalle definizioni delle entità, quindi un’installazione creata dall’installer contiene lo schema finale ma una **cronologia delle migrazioni vuota**. Le installazioni create prima di Chamilo 3.0 non hanno mai ricevuto tale cronologia. Due elementi ne dipendono:

* `doctrine:migrations:migrate` decide cosa eseguire in base a essa. Con una cronologia vuota tenta di rieseguire ogni migrazione dall’inizio su uno schema già aggiornato.
* L’installer web decide in base a essa se è in attesa un aggiornamento. Con una cronologia vuota rifiuta la richiesta, perché nulla dimostra che un aggiornamento sia dovuto.

Quindi inizializzarla una sola volta e rispettare l’ordine indicato di seguito.

> **Avvertenza: inizializzare la cronologia prima di copiare il nuovo codice.** I comandi contrassegnano ogni migrazione portata dal codice **distribuito** come già eseguita. Se li si esegue dopo aver copiato il codice 3.0, contrassegnano anche le migrazioni 3.0 e l’aggiornamento non viene mai eseguito.

Con la versione corrente ancora in uso, eseguire:

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

Il primo comando crea la tabella della cronologia. Il secondo contrassegna le migrazioni della versione corrente. `doctrine:migrations:version` fallisce da solo se la tabella non esiste ancora, quindi non omettere il primo.

Verificare il risultato:

```bash
php bin/console doctrine:migrations:status
```

`Executed` deve essere uguale a `Available` e `New` deve essere 0. Ora copiare il codice 3.0.

### Eseguire l’aggiornamento

Copiare il nuovo codice, quindi aprire l’URL e seguire la procedura guidata, oppure eseguire le migrazioni da riga di comando:

```bash
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

La procedura guidata web si apre solo mentre le migrazioni sono in attesa. Una volta terminato l’aggiornamento, risponde di nuovo `409 Conflict`, ed è proprio ciò che la protegge: la procedura guidata non ha un login proprio.

## Aggiornamento di Chamilo 3.0.x

Gli aggiornamenti minori all’interno del ramo 3.0 sono più semplici.

### Processo di aggiornamento

#### Uso di un pacchetto

1. **Eseguire il backup** del database e dei file.

2. **Scaricare l’ultima versione 3.0.x** da [chamilo.org](https://chamilo.org/download):

3. **Estrarre in locale**

Ad esempio (adattare alla versione scaricata)
   ```bash
   unzip chamilo-3.0.1.zip
   ```

4. **Copiare i file sull’installazione Chamilo esistente**
   ```bash
   cp -r chamilo/* [your-chamilo-installation-path]/
   cp -r chamilo/.* [your-chamilo-installation-path]/
   ```

5. **Eseguire le migrazioni del database:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Svuotare la cache:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Modificare i permessi**

Adattare all’utente del server web:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Verificare** che la piattaforma si carichi correttamente e controllare a campione le funzionalità principali.

#### Uso di Git

Se Chamilo è stato installato con Git, è possibile seguire invece queste istruzioni.

1. **Eseguire il backup** del database e dei file.

2. **Recuperare il codice più recente** (o scaricare la nuova release):
   ```bash
   git pull origin 3.0
   ```

3. **Aggiornare le dipendenze PHP:**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **Aggiornare le dipendenze JavaScript e ricostruire gli asset:**
   ```bash
   yarn install && yarn build
   ```

5. **Eseguire le migrazioni del database:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Svuotare la cache:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Modificare i permessi**

Adattare all’utente del server web:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Verificare** che la piattaforma si carichi correttamente e controllare a campione le funzionalità principali.

### Automazione degli aggiornamenti

Per le organizzazioni che gestiscono più istanze Chamilo, valutare di automatizzare il processo di aggiornamento con uno script:

```bash
#!/bin/bash
set -e

# Pull code
git pull origin 3.0

# Dependencies
composer install --no-dev --optimize-autoloader
yarn install && yarn build

# Database
php bin/console doctrine:migrations:migrate --no-interaction

# Cache
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

echo "Update complete."
```

## Consigli

* **Eseguire sempre un backup prima dell'aggiornamento.** Le migrazioni del database non sono reversibili tramite l'interfaccia di Chamilo.
* **Provare prima in un ambiente di staging** -- in particolare per la migrazione da 1.11.x a 3.0, che comporta una trasformazione significativa dei dati.
* **Pianificare gli aggiornamenti durante le finestre di manutenzione**, quando gli utenti non stanno utilizzando attivamente la piattaforma.
* **Iscriversi alle release su GitHub** su [Github](https://github.com/chamilo/chamilo-lms/releases) utilizzando l'icona della campanella per ricevere notifiche delle nuove versioni e delle patch di sicurezza.
* **Se la procedura guidata risponde `Chamilo is already installed`**, non ha trovato alcuna migrazione in sospeso. Eseguire `php bin/console doctrine:migrations:status` per verificare. Se `Executed` è 0 su una piattaforma funzionante, la cronologia delle migrazioni non è mai stata inizializzata — vedere [Seed the migration history first](#seed-the-migration-history-first).
* **Il download automatico delle nuove versioni** non è ancora disponibile in Chamilo 3.0, ma si tratta di un progetto in corso che speriamo di rilasciare a breve. L'aggiornamento stesso viene già eseguito dalla procedura guidata web.