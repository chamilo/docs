# Configurazione

Chamilo 3.0 utilizza variabili d'ambiente e file di configurazione Symfony per le impostazioni principali. Questa pagina descrive i file e le variabili di configurazione fondamentali.

## Variabili d'ambiente (.env)

Il file di configurazione principale è `.env` nella directory radice di Chamilo. Questo file contiene impostazioni specifiche dell'ambiente che non devono essere committate nel controllo di versione.

Un file `.env.dist` predefinito viene fornito con Chamilo e contiene i valori predefiniti documentati. Creare `.env` (necessario per avviare l'installazione) per sovrascrivere i valori del proprio ambiente.

### Variabili principali

| Variable | Description | Example |
|----------|-------------|---------|
| `APP_ENV` | L'ambiente dell'applicazione, a livello Symfony. Usare `prod` per la produzione, `dev` per lo sviluppo, 'test' per i test. | `prod` |
| `APP_SECRET` | Una stringa casuale usata per i token CSRF, la firma dei cookie e altre operazioni crittografiche. Chamilo genera un valore univoco per ogni installazione. Non modificarlo. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | L'host del database. Il valore predefinito è localhost | `localhost` |
| `DATABASE_PORT` | La porta del database. Il valore predefinito è 3306 per MySQL/MariaDB | `3306` |
| `DATABASE_NAME` | Il nome del database, come indicato nella procedura guidata di installazione. | Vedere sotto. |
| `DATABASE_USER` | Il nome utente del database, come indicato nella procedura guidata di installazione. | Vedere sotto. |
| `DATABASE_PASSWORD` | La password dell'utente del database, come indicata nella procedura guidata di installazione. | Vedere sotto. |
| `TRUSTED_PROXIES` | (Facoltativo) Se si ospita Chamilo dietro un reverse proxy, è necessario indicare qui gli IP del reverse proxy affinché Chamilo possa interpretare le richieste e generare le risposte correttamente. | |
| `APP_ENABLE_API_ENTRYPOINT` | (Facoltativo) Espone la documentazione interattiva dell'API (Swagger/OpenAPI) su `/api`. Disattivato per impostazione predefinita. Richiede lo svuotamento della cache per avere effetto — vedere [Abilitare la documentazione API](#enable-the-api-documentation) di seguito. | `true` |

Le altre impostazioni in .env vengono modificate relativamente di rado.

Si noti che, nelle versioni future, le impostazioni DATABASE_* verranno unificate in un'unica variabile `DATABASE_URL`.

La configurazione dell'invio della posta elettronica viene presentata durante l'installazione, ma può essere modificata in seguito nella sezione `Impostazioni della piattaforma` del cruscotto di amministrazione.

## Configurazione Symfony (directory config/)

La configurazione a livello Symfony si trova nella directory `config/`. Questi file YAML controllano il comportamento del framework, le definizioni dei servizi e le impostazioni specifiche dei pacchetti.

L'intera directory `config/` viene fornita con ogni pacchetto Chamilo e con ogni aggiornamento — a differenza, ad esempio, di `.env`, non è esclusa né preservata in modo speciale durante un aggiornamento. **Qualsiasi modifica apportata direttamente a un file in `config/` o `config/packages/` verrà sovrascritta silenziosamente al successivo aggiornamento di Chamilo.** Vedere [Sovrascritture specifiche dell'ambiente](#environment-specific-overrides) di seguito per il metodo supportato per personalizzare la configurazione senza perdere le modifiche.

Non è frequente dover modificare tali file, e cambiarli può rendere il portale inoperativo, pertanto non tentare di modificarli se è necessario garantire la disponibilità del sistema.

### File di configurazione principali

| File | Purpose |
|------|---------|
| `config/authentication.yaml` | Configurazione dei metodi di autenticazione. |
| `config/packages/doctrine.yaml` | Configurazione del database e dell'ORM. |
| `config/packages/security.yaml` | Autenticazione, firewall, controllo degli accessi e gerarchie dei ruoli. |
| `config/packages/cache.yaml` | Configurazione dell'adattatore di cache (filesystem, APCu, Redis). |
| `config/packages/framework.yaml` | Impostazioni generali del framework Symfony (sessione, CSRF, router, cache HTTP). |
| `config/packages/twig.yaml` | Configurazione del motore di template. |
| `config/services.yaml` | Definizioni dei servizi dell'applicazione e dependency injection. |

### Sovrascritture specifiche dell'ambiente

Symfony supporta la configurazione per ambiente. I file in `config/packages/prod/` sovrascrivono i valori predefiniti quando `APP_ENV=prod`, e `config/packages/dev/` quando `APP_ENV=dev`.

Ad esempio, `config/packages/prod/monolog.yaml` configura in genere una registrazione dei log meno verbosa rispetto all'equivalente di sviluppo.

Chamilo non definisce alcuna configurazione in `config/packages/prod/` nel software stesso, quindi se si desidera personalizzare un'impostazione da `config/packages/*.yaml`, **non modificare il file di base** — creare un file con lo stesso nome in `config/packages/prod/` (o `dev/`/`test/`, in base all'ambiente che si vuole influenzare) contenente solo le chiavi da sovrascrivere, e inserire lì le modifiche.

Questo è importante perché i file di base `config/packages/*.yaml` fanno parte del pacchetto Chamilo: ogni aggiornamento li reinvia e sovrascrive quanto presente, quindi le modifiche apportate direttamente a essi non sopravvivono a un aggiornamento. Poiché Chamilo non fornisce mai nulla in `config/packages/prod/` (né in `dev/`/`test/`), quella directory è al sicuro da sovrascritture da parte di un aggiornamento ed è il luogo supportato in cui conservare le personalizzazioni locali.

## Permessi sui file

Nella versione 2.0+ abbiamo fatto in modo che fosse necessaria l’impostazione dei permessi su una sola directory, e questo resta valido anche nella 3.0. Si tratta della directory `var/`; per evitare problemi complessi, è sufficiente impostare l’intera cartella come scrivibile dall’utente di sistema del server web.

Impostare i permessi in modo appropriato sui sistemi basati su Debian:

```bash
# For systems where the web server runs as www-data
chown -R www-data:www-data var/
chmod -R 775 var/
```

## Attività di configurazione comuni

### Passare alla modalità di produzione

```bash
# In .env
APP_ENV=prod
APP_DEBUG=0
```

Quindi svuotare e preriscaldare la cache:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### Abilitare la documentazione dell’API

```bash
# In .env
APP_ENABLE_API_ENTRYPOINT=true
```

Quindi svuotare la cache affinché la modifica abbia effetto:

```bash
php bin/console cache:clear
```

La documentazione interattiva dell’API (Swagger/OpenAPI) è quindi disponibile all’indirizzo `/api`. Modificare soltanto `.env` non è sufficiente: il valore risolto viene incorporato nella cache compilata di Symfony, quindi `/api` continua a restituire lo stato precedente (abilitato o meno) finché la cache non viene svuotata. L’azione **Sistema > Pulizia dei file temporanei** nel pannello di amministrazione *non* esegue questa operazione — si veda [Strumenti di sistema](../system/system-tools.md#clean-temporary-files) per il motivo — pertanto questa modifica specifica richiede l’accesso alla shell per eseguire `cache:clear`.

### Configurare i proxy attendibili

Se Chamilo è in esecuzione dietro un reverse proxy o un load balancer, configurare i proxy attendibili in modo che il rilevamento di HTTPS e la risoluzione dell’IP del client funzionino correttamente:

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### Configurare l’archiviazione delle sessioni

Per impostazione predefinita, le sessioni sono memorizzate sul filesystem. Per le installazioni multi-server, configurare sessioni basate su Redis o sul database:

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

## Consigli

* **Non modificare mai `.env.dist` direttamente** -- Utilizzare sempre `.env` per le proprie sovrascritture. Il file `.env.dist` può essere sovrascritto durante gli aggiornamenti.
* **Mantenere `APP_DEBUG=0` in produzione** -- La modalità di debug espone informazioni sensibili nelle pagine di errore.
* **Eseguire il backup di `.env`** separatamente dal codice, poiché contiene credenziali ed è escluso dal controllo di versione.