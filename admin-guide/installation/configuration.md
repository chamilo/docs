# Configurazione

Chamilo 2.0 utilizza variabili di ambiente e file di configurazione Symfony per le sue impostazioni principali. Questa pagina tratta i file di configurazione chiave e le variabili.

## Variabili di Ambiente (.env)

Il file di configurazione principale è `.env` nella directory radice di Chamilo. Questo file contiene impostazioni specifiche per l'ambiente che non dovrebbero essere incluse nel controllo di versione.

Un file predefinito `.env.dist` viene fornito con Chamilo e contiene valori predefiniti documentati. Crea il file `.env` (necessario per avviare l'installazione) per sovrascrivere i valori per il tuo ambiente.

### Variabili Chiave

| Variabile | Descrizione | Esempio |
|----------|-------------|---------|
| `APP_ENV` | L'ambiente dell'applicazione, a livello di Symfony. Usa `prod` per la produzione, `dev` per lo sviluppo, 'test' per i test. | `prod` |
| `APP_SECRET` | Una stringa casuale utilizzata per i token CSRF, la firma dei cookie e altre operazioni crittografiche. Chamilo genera un valore unico per ogni installazione. Non modificarlo. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | L'host del database. Predefinito su localhost | `localhost` |
| `DATABASE_PORT` | La porta del database. Predefinita su 3306 per MySQL/MariaDB | `3306` |
| `DATABASE_NAME` | Il nome del database, come fornito da te al wizard di installazione. | Vedi sotto. |
| `DATABASE_USER` | Il nome utente del database, come fornito da te al wizard di installazione. | Vedi sotto. |
| `DATABASE_PASSWORD` | La password dell'utente del database, come fornita da te al wizard di installazione. | Vedi sotto. |
| `TRUSTED_PROXIES` | (Opzionale) Se ospiti Chamilo dietro un reverse proxy, devi fornire l'IP o gli IP del reverse proxy qui affinché Chamilo possa interpretare correttamente le chiamate e generare risposte. | |

Altre impostazioni in .env vengono modificate relativamente di rado.

Nota che, nelle versioni future, le impostazioni DATABASE_* saranno combinate in una singola variabile `DATABASE_URL`.

La configurazione per l'invio di e-mail viene presentata durante l'installazione, ma può essere modificata successivamente nella sezione `Impostazioni della piattaforma` del pannello di amministrazione.

## Configurazione Symfony (directory config/)

La configurazione a livello di Symfony si trova nella directory `config/`. Questi file YAML controllano il comportamento del framework, le definizioni dei servizi e le impostazioni specifiche dei pacchetti.

Non è frequente dover modificare questi file, e cambiarli può rendere il tuo portale non operativo, quindi ti preghiamo di non tentare di modificarli se devi garantire la disponibilità del sistema.

### File di Configurazione Chiave

| File | Scopo |
|------|---------|
| `config/authentication.yaml` | Configurazione dei metodi di autenticazione. |
| `config/packages/doctrine.yaml` | Configurazione del database e ORM. |
| `config/packages/security.yaml` | Autenticazione, firewall, controllo degli accessi e gerarchie dei ruoli. |
| `config/packages/cache.yaml` | Configurazione dell'adattatore della cache (filesystem, APCu, Redis). |
| `config/packages/framework.yaml` | Impostazioni generali del framework Symfony (sessione, CSRF, router, caching HTTP). |
| `config/packages/twig.yaml` | Configurazione del motore di template. |
| `config/services.yaml` | Definizioni dei servizi dell'applicazione e iniezione delle dipendenze. |

### Sovrascritture Specifiche per Ambiente

Symfony supporta configurazioni per ambiente. I file in `config/packages/prod/` sovrascrivono i valori predefiniti quando `APP_ENV=prod`, e `config/packages/dev/` sovrascrive quando `APP_ENV=dev`.

Ad esempio, `config/packages/prod/monolog.yaml` configura tipicamente un logging meno dettagliato rispetto all'equivalente per lo sviluppo.

Chamilo non definisce alcuna configurazione in `config/packages/prod/` nel software stesso, quindi se desideri personalizzare le impostazioni da `config/packages/*.yaml`, crea semplicemente una copia del file yaml all'interno di quella directory e modifica le impostazioni lì.

## Permessi dei File

Abbiamo fatto sforzi in 2.0+ per garantire che solo una directory necessiti di permessi. Questa è la directory `var/`, e per evitare problemi complessi, impostare l'intera cartella come scrivibile dall'utente di sistema del server web è sufficiente.

Imposta i permessi appropriati sui sistemi basati su Debian:

```bash
# Per sistemi in cui il server web funziona come www-data
chown -R www-data:www-data var/
chmod -R 775 var/
```

## Attività di Configurazione Comuni

### Passare alla Modalità Produzione

```bash
# In .env
APP_ENV=prod
APP_DEBUG=0
```

Quindi svuota e riscalda la cache:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### Configurare i Proxy Fidati

Se Chamilo funziona dietro un reverse proxy o un load balancer, configura i proxy fidati affinché il rilevamento HTTPS e la risoluzione dell'IP del client funzionino correttamente:

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### Configurare l'Archiviazione delle Sessioni

Per impostazione predefinita, le sessioni sono archiviate nel filesystem. Per distribuzioni su più server, configura sessioni supportate da Redis o database:

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

---
## Suggerimenti

* **Non modificare mai direttamente `.env.dist`** -- Utilizza sempre `.env` per le tue personalizzazioni. Il file `.env.dist` potrebbe essere sovrascritto durante gli aggiornamenti.
* **Mantieni `APP_DEBUG=0` in produzione** -- La modalità debug espone informazioni sensibili nelle pagine di errore.
* **Esegui il backup di `.env`** separatamente dal codice sorgente, poiché contiene credenziali ed è escluso dal controllo di versione.