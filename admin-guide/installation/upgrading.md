# Aggiornamento

Nota: In questa pagina, utilizziamo 2.0.0 come numero di versione specifico e 2.x per identificare tutte le versioni che iniziano con il numero 2 (2.0.0, 2.0.1, 2.1.0, ecc.).

Il processo di aggiornamento da 1.11.x a 2.x è descritto nel file `public/documentation/installation_guide.html` all'interno del codice di Chamilo. Le informazioni qui riportate sono in gran parte ridondanti. Puoi consultarle online all'indirizzo `https://campus.chamilo.net/documentation/installation_guide.html`. Sebbene abbiamo effettuato numerosi test su migrazioni simili, poiché alcune impostazioni di 1.11.x non erano ancora supportate in 2.0.0, raccomandiamo di attendere la versione 2.1 prima di aggiornare un sistema 1.11.x, oppure di farsi affiancare professionalmente da [fornitori ufficiali di Chamilo](https://chamilo.org/providers) in questa operazione.

## Aggiornamento da 1.11.x a 2.x

L'aggiornamento da Chamilo 1.11.x a 2.x è una **migrazione importante**, non un semplice aggiornamento. Chamilo 2.0 è stato ricostruito sul framework Symfony con uno schema di database ristrutturato, una nuova API e una diversa organizzazione dei file. Pianifica questa migrazione con attenzione e provala su un ambiente di test prima di implementarla in produzione.

### Prima di iniziare

1. **Leggi le note di rilascio** per Chamilo 2.x per comprendere cosa è cambiato, quali sono le novità e quali funzionalità di 1.11.x potrebbero non essere ancora disponibili.
2. **Esegui un backup completo**:
   - Dump completo del database (`mysqldump` o equivalente).
   - Tutti i file nella directory di installazione di Chamilo 1.11.x, in particolare `app/upload/`, `app/courses/` e `main/`.
   - Il file `configuration.php`.
3. **Testa su un server di staging prima.** Non eseguire mai la migrazione direttamente sul server di produzione.
4. **Verifica i requisiti del server.** Chamilo 2.x ha requisiti diversi rispetto a 1.11.x (in particolare, PHP 8.2+). Consulta [Requisiti del server](server-requirements.md).

### Cosa potrebbe richiedere attenzione manuale

| Area | Note |
|------|-------|
| **Plugin personalizzati** | I plugin di 1.11.x non sono compatibili con 2.x. Devono essere riscritti o sostituiti, operazione parzialmente completata in 2.0 e che dovrebbe essere conclusa entro la 2.1 per i plugin ufficiali. |
| **Temi personalizzati** | I temi di 1.11.x non funzionano in 2.x. Ricrea il tuo branding utilizzando il sistema di temi di 2.x. |
| **Modifiche personalizzate al database** | Eventuali modifiche dirette al database al di fuori di Chamilo potrebbero non essere migrate. |
| **Pacchetti SCORM** | I contenuti SCORM dovrebbero essere migrati, ma testa i pacchetti singolarmente per verificarne la riproduzione. |
| **Integrazioni esterne** | Qualsiasi integrazione che utilizza l'API o i servizi web di 1.11.x deve essere aggiornata per utilizzare l'API REST-only di 2.x tramite [API Platform](https://github.com/api-platform/api-platform). |

## Aggiornamento di Chamilo 2.0.x

Gli aggiornamenti minori all'interno del ramo 2.0 sono più semplici.

### Processo di aggiornamento

#### Utilizzo di un pacchetto

1. **Esegui un backup** del database e dei file.

2. **Scarica l'ultima versione 2.0.x** da [chamilo.org](https://chamilo.org/download):

3. **Espandi localmente**

Ad esempio (adatta alla versione scaricata):
   ```bash
   unzip chamilo-2.0.1.zip
   ```

4. **Copia i file sulla tua installazione esistente di Chamilo**
   ```bash
   cp -r chamilo/* [your-chamilo-installation-path]/
   cp -r chamilo/.* [your-chamilo-installation-path]/
   ```

5. **Esegui le migrazioni del database:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Cancella la cache:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Modifica i permessi**

Adatta all'utente del tuo server web:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Verifica** che la piattaforma si carichi correttamente e controlla a campione le funzionalità principali.

#### Utilizzo di Git

Se hai installato Chamilo utilizzando Git, puoi seguire queste istruzioni.

1. **Esegui un backup** del database e dei file.

2. **Aggiorna il codice più recente** (o scarica la nuova versione):
   ```bash
   git pull origin 2.0
   ```

3. **Aggiorna le dipendenze PHP:**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **Aggiorna le dipendenze JavaScript e ricostruisci gli asset:**
   ```bash
   yarn install && yarn build
   ```

5. **Esegui le migrazioni del database:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Cancella la cache:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Modifica i permessi**

Adatta all'utente del tuo server web:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Verifica** che la piattaforma si carichi correttamente e controlla a campione le funzionalità principali.

### Automatizzazione degli aggiornamenti

Per le organizzazioni che gestiscono più istanze di Chamilo, considera di automatizzare il processo di aggiornamento con uno script:

```bash
#!/bin/bash
set -e

# Aggiorna il codice
git pull origin 2.0

# Dipendenze
composer install --no-dev --optimize-autoloader
yarn install && yarn build

# Database
php bin/console doctrine:migrations:migrate --no-interaction

# Cache
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

echo "Aggiornamento completato."
```

---
## Suggerimenti

* **Esegui sempre un backup prima di aggiornare.** Le migrazioni del database non sono reversibili tramite l'interfaccia di Chamilo.
* **Testa prima su un ambiente di staging** -- specialmente per la migrazione da 1.11.x a 2.0, che comporta una significativa trasformazione dei dati.
* **Pianifica gli aggiornamenti durante finestre di manutenzione** quando gli utenti non stanno utilizzando attivamente la piattaforma.
* **Iscriviti alle release su GitHub** su [Github](https://github.com/chamilo/chamilo-lms/releases) utilizzando l'icona della campana per essere avvisato di nuove versioni e patch di sicurezza.
* **Gli aggiornamenti via web** non sono ancora disponibili in Chamilo 2.0, ma questo è un progetto in corso che speriamo di rilasciare presto.