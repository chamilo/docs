# Säkerhetskopior

Regelbundna säkerhetskopior är avgörande för att skydda era Chamilo-data. Den här sidan beskriver vad som ska säkerhetskopieras och hur.

## Vad som ska säkerhetskopieras

### 1. Databas

Chamilo-databasen innehåller all plattformsdata: användare, kurser, spårning, betyg, meddelanden och inställningar. Detta är den mest kritiska komponenten att säkerhetskopiera.

**Så här säkerhetskopierar ni:**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. Filer

Chamilo lagrar uppladdade filer (dokument, bilder, SCORM-paket) i filsystemet. De viktigaste katalogerna att säkerhetskopiera:

* `var/` — Uppladdade filer och resurser
* `public/plugin/` — Plugin-filer (endast om ni har lagt till egna plugins)

Om ni använder molnlagring (S3, Azure Blob), se till att molnleverantörens säkerhetskopiering/versionshantering är aktiverad.

### 3. Konfiguration

* `.env` — Er miljökonfiguration
* `config/` — Eventuella anpassade konfigurationsfiler

## Schema för säkerhetskopiering

| Komponent | Rekommenderad frekvens |
|-----------|---------------------|
| Databas | Dagligen |
| Filer | Dagligen eller veckovis (beroende på uppladdningsaktivitet) |
| Konfiguration | Efter varje konfigurationsändring |

## Återställning

Så här återställer ni från en säkerhetskopia:

1. Återställ databasen från SQL-dumpen
2. Återställ filkatalogerna
3. Återställ konfigurationsfilerna
4. Rensa Symfony-cachen: `php bin/console cache:clear`

## Tips

* **Automatisera säkerhetskopior** — Använd cron-jobb för att köra säkerhetskopior automatiskt
* **Lagra utanför platsen** — Behåll säkerhetskopior på en separat server eller i molnlagring
* **Testa återställning** — Testa regelbundet att ni kan återställa från en säkerhetskopia
* **Dokumentera processen** — Behåll skriftliga instruktioner för återställningsprocessen så att vem som helst i teamet kan utföra den