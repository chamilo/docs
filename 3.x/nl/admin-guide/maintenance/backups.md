# Back-ups

Regelmatige back-ups zijn essentieel om uw Chamilo-gegevens te beschermen. Deze pagina beschrijft wat u moet back-uppen en hoe.

## Wat te back-uppen

### 1. Database

De Chamilo-database bevat alle platformgegevens: gebruikers, cursussen, tracking, cijfers, berichten en instellingen. Dit is het meest kritieke onderdeel om te back-uppen.

**Hoe te back-uppen:**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. Bestanden

Chamilo slaat geüploade bestanden (documenten, afbeeldingen, SCORM-pakketten) op in het bestandssysteem. De belangrijkste mappen om te back-uppen:

* `var/` — Geüploade bestanden en resources
* `public/plugin/` — Pluginbestanden (alleen als u aangepaste plugins hebt toegevoegd)

Als u cloudopslag gebruikt (S3, Azure Blob), zorg er dan voor dat de back-up-/versiebeheerfunctie van uw cloudprovider is ingeschakeld.

### 3. Configuratie

* `.env` — Uw omgevingsconfiguratie
* `config/` — Eventuele aangepaste configuratiebestanden

## Back-upschema

| Component | Aanbevolen frequentie |
|-----------|---------------------|
| Database | Dagelijks |
| Bestanden | Dagelijks of wekelijks (afhankelijk van de uploadactiviteit) |
| Configuratie | Na elke configuratiewijziging |

## Herstel

Om te herstellen vanuit een back-up:

1. Herstel de database vanuit de SQL-dump
2. Herstel de bestandsdirectories
3. Herstel de configuratiebestanden
4. Wis de Symfony-cache: `php bin/console cache:clear`

## Tips

* **Automatiseer back-ups** — Gebruik cronjobs om back-ups automatisch uit te voeren
* **Bewaar off-site** — Bewaar back-upkopieën op een aparte server of in cloudopslag
* **Test het herstel** — Test periodiek of u succesvol kunt herstellen vanuit een back-up
* **Documenteer uw proces** — Houd schriftelijke instructies bij voor het herstelproces, zodat iedereen in het team het kan uitvoeren