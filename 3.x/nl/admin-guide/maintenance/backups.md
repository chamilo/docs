# Back-ups

Regelmatige back-ups zijn essentieel om uw Chamilo-gegevens te beschermen. Op deze pagina leest u wat u moet back-uppen en hoe.

## Wat te back-uppen

### 1. Database

De Chamilo-database bevat alle platformgegevens: gebruikers, cursussen, tracking, cijfers, berichten en instellingen. Dit is het meest kritieke onderdeel om te back-uppen.

**Back-up maken:**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. Bestanden

Chamilo slaat geüploade bestanden (documenten, afbeeldingen, SCORM-pakketten) op in het bestandssysteem. De belangrijkste mappen om te back-uppen:

* `var/` — Geüploade bestanden en bronnen. Dit omvat `var/certificate-issuer/`, de sleutel die certificaatreferenties en [officiële transcripties](../users/academic-transcripts.md) ondertekent: zonder deze sleutel kunnen de reeds uitgegeven documenten niet langer worden geverifieerd
* `public/plugin/` — Pluginbestanden (alleen als u aangepaste plugins hebt toegevoegd)

Als u cloudopslag gebruikt (S3, Azure Blob), zorg er dan voor dat de back-up/versiebeheer van uw cloudprovider is ingeschakeld.

### 3. Configuratie

* `.env` — Uw omgevingsconfiguratie
* `config/` — Eventuele aangepaste configuratiebestanden

## Back-upschema

| Onderdeel | Aanbevolen frequentie |
|-----------|---------------------|
| Database | Dagelijks |
| Bestanden | Dagelijks of wekelijks (afhankelijk van de uploadactiviteit) |
| Configuratie | Na elke configuratiewijziging |

## Herstel

Een back-up herstellen:

1. Herstel de database vanuit de SQL-dump
2. Herstel de bestandsmappen
3. Herstel de configuratiebestanden
4. Wis de Symfony-cache: `php bin/console cache:clear`

## Tips

* **Automatiseer back-ups** — Gebruik cron-taken om back-ups automatisch uit te voeren
* **Bewaar off-site** — Bewaar back-upkopieën op een aparte server of in cloudopslag
* **Test het herstel** — Test periodiek of u een back-up succesvol kunt herstellen
* **Documenteer uw proces** — Houd schriftelijke instructies bij voor het herstelproces, zodat iedereen in het team dit kan uitvoeren