# Backup

I backup regolari sono essenziali per proteggere i dati di Chamilo. Questa pagina illustra cosa salvare e come farlo.

## Cosa Salvare

### 1. Database

Il database di Chamilo contiene tutti i dati della piattaforma: utenti, corsi, monitoraggio, voti, messaggi e impostazioni. Questo è il componente più critico da salvare.

**Come fare il backup:**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. File

Chamilo memorizza i file caricati (documenti, immagini, pacchetti SCORM) nel filesystem. Le directory principali da salvare sono:

* `var/` — File e risorse caricati
* `public/plugin/` — File dei plugin (solo se hai aggiunto plugin personalizzati)

Se utilizzi un archivio cloud (S3, Azure Blob), assicurati che il backup/versionamento del tuo provider cloud sia abilitato.

### 3. Configurazione

* `.env` — La configurazione dell'ambiente
* `config/` — Eventuali file di configurazione personalizzati

## Pianificazione dei Backup

| Componente | Frequenza consigliata |
|------------|-----------------------|
| Database | Giornaliera |
| File | Giornaliera o settimanale (a seconda dell'attività di caricamento) |
| Configurazione | Dopo ogni modifica alla configurazione |

## Ripristino

Per ripristinare da un backup:

1. Ripristina il database dal dump SQL
2. Ripristina le directory dei file
3. Ripristina i file di configurazione
4. Pulisci la cache di Symfony: `php bin/console cache:clear`

## Consigli

* **Automatizza i backup** — Usa cron job per eseguire i backup automaticamente
* **Conserva fuori sede** — Mantieni copie di backup su un server separato o su un archivio cloud
* **Testa il ripristino** — Verifica periodicamente di poter ripristinare con successo da un backup
* **Documenta il processo** — Conserva istruzioni scritte per il processo di ripristino in modo che chiunque nel team possa eseguirlo