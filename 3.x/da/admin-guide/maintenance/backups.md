# Sikkerhedskopier

Regelmæssige sikkerhedskopier er afgørende for at beskytte dine Chamilo-data. Denne side beskriver, hvad der skal sikkerhedskopieres, og hvordan.

## Hvad der skal sikkerhedskopieres

### 1. Database

Chamilo-databasen indeholder alle platformdata: brugere, kurser, tracking, karakterer, beskeder og indstillinger. Dette er den mest kritiske komponent at sikkerhedskopiere.

**Sådan sikkerhedskopieres:**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. Filer

Chamilo gemmer uploadede filer (dokumenter, billeder, SCORM-pakker) i filsystemet. De vigtigste mapper, der skal sikkerhedskopieres:

* `var/` — Uploadede filer og ressourcer
* `public/plugin/` — Plugin-filer (kun hvis du har tilføjet tilpassede plugins)

Hvis du bruger cloud-lagring (S3, Azure Blob), skal du sikre, at din cloud-udbyders sikkerhedskopiering/versionering er aktiveret.

### 3. Konfiguration

* `.env` — Din miljøkonfiguration
* `config/` — Eventuelle tilpassede konfigurationsfiler

## Sikkerhedskopieringsplan

| Komponent | Anbefalet hyppighed |
|-----------|---------------------|
| Database | Dagligt |
| Filer | Dagligt eller ugentligt (afhængigt af uploadaktivitet) |
| Konfiguration | Efter enhver konfigurationsændring |

## Gendannelse

Sådan gendanner du fra en sikkerhedskopi:

1. Gendan databasen fra SQL-dumpen
2. Gendan filmapperne
3. Gendan konfigurationsfilerne
4. Ryd Symfony-cachen: `php bin/console cache:clear`

## Tips

* **Automatiser sikkerhedskopier** — Brug cron-jobs til at køre sikkerhedskopier automatisk
* **Gem eksternt** — Opbevar sikkerhedskopier på en separat server eller i cloud-lagring
* **Test gendannelse** — Test med jævne mellemrum, at du kan gendanne fra en sikkerhedskopi
* **Dokumentér din proces** — Hold skriftlige instruktioner til gendannelsesprocessen, så alle i teamet kan udføre den