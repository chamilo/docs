# Sikkerhetskopier

Regelmessige sikkerhetskopier er avgjørende for å beskytte Chamilo-dataene dine. Denne siden dekker hva som skal sikkerhetskopieres og hvordan.

## Hva som skal sikkerhetskopieres

### 1. Database

Chamilo-databasen inneholder all plattformdata: brukere, kurs, sporing, karakterer, meldinger og innstillinger. Dette er den mest kritiske komponenten å sikkerhetskopiere.

**Slik tar du sikkerhetskopi:**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. Filer

Chamilo lagrer opplastede filer (dokumenter, bilder, SCORM-pakker) i filsystemet. De viktigste katalogene å sikkerhetskopiere:

* `var/` — Opplastede filer og ressurser
* `public/plugin/` — Plugin-filer (kun hvis du har lagt til egendefinerte plugins)

Hvis du bruker skylagring (S3, Azure Blob), må du sørge for at skyleverandørens sikkerhetskopi/versjonering er aktivert.

### 3. Konfigurasjon

* `.env` — Miljøkonfigurasjonen din
* `config/` — Eventuelle egendefinerte konfigurasjonsfiler

## Sikkerhetskopieringsplan

| Komponent | Anbefalt hyppighet |
|-----------|---------------------|
| Database | Daglig |
| Filer | Daglig eller ukentlig (avhengig av opplastingsaktivitet) |
| Konfigurasjon | Etter hver konfigurasjonsendring |

## Gjenoppretting

Slik gjenoppretter du fra en sikkerhetskopi:

1. Gjenopprett databasen fra SQL-dumpen
2. Gjenopprett filkatalogene
3. Gjenopprett konfigurasjonsfilene
4. Tøm Symfony-cachen: `php bin/console cache:clear`

## Tips

* **Automatiser sikkerhetskopier** — Bruk cron-jobber til å kjøre sikkerhetskopier automatisk
* **Lagre eksternt** — Oppbevar sikkerhetskopier på en separat server eller i skylagring
* **Test gjenoppretting** — Test jevnlig at du kan gjenopprette fra en sikkerhetskopi
* **Dokumenter prosessen** — Ha skriftlige instruksjoner for gjenopprettingsprosessen slik at alle i teamet kan utføre den