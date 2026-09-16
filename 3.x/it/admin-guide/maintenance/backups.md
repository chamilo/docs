# Backup

I backup regolari sono essenziali per proteggere i dati di Chamilo. Questa pagina descrive cosa salvare e come.

## Cosa salvare

### 1. Database

Il database di Chamilo contiene tutti i dati della piattaforma: utenti, corsi, tracciamento, valutazioni, messaggi e impostazioni. È il componente più critico da salvare.

**Come eseguire il backup:**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. File

Chamilo memorizza i file caricati (documenti, immagini, pacchetti SCORM) nel filesystem. Le directory principali da salvare:

* `var/` — File e risorse caricati
* `public/plugin/` — File dei plugin (solo se sono stati aggiunti plugin personalizzati)

Se si utilizza un cloud storage (S3, Azure Blob), assicurarsi che il backup/versioning del provider cloud sia abilitato.

### 3. Configurazione

* `.env` — La configurazione dell'ambiente
* `config/` — Eventuali file di configurazione personalizzati

## Pianificazione dei backup

| Componente | Frequenza consigliata |
|-----------|---------------------|
| Database | Giornaliera |
| File | Giornaliera o settimanale (in base all'attività di caricamento) |
| Configurazione | Dopo ogni modifica alla configurazione |

## Ripristino

Per ripristinare da un backup:

1. Ripristinare il database dal dump SQL
2. Ripristinare le directory dei file
3. Ripristinare i file di configurazione
4. Svuotare la cache di Symfony: `php bin/console cache:clear`

## Consigli

* **Automatizzare i backup** — Utilizzare job cron per eseguire i backup automaticamente
* **Conservare fuori sede** — Tenere copie di backup su un server separato o su cloud storage
* **Verificare il ripristino** — Testare periodicamente che il ripristino da un backup avvenga correttamente
* **Documentare il processo** — Conservare istruzioni scritte per il processo di ripristino, in modo che chiunque nel team possa eseguirlo