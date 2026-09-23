# Oprydning af arkiv

Over tid ophober Chamilo midlertidige filer i cache- og arkivmapper. Regelmæssig oprydning forebygger problemer med diskplads.

## Hvad kan ryddes op

* **Midlertidige uploadfiler** — Filer genereret under eksport, import og andre handlinger samt forældede legacy-frontend-buildfiler
* **Symfony-applikationscache** — Kompileret container, cachelagret konfiguration og routingdata. Dette er *ikke* dækket af handlingen i administrationspanelet nedenfor — se [Fra kommandolinjen](#from-the-command-line).
* **Sessionsdata** — Udløbne PHP-sessionsfiler
* **Logfiler** — Gamle logfiler, der ikke længere er nødvendige

## Udførelse af oprydning

### Fra administrationspanelet

Gå til **System > Ryd midlertidige filer** i administrationspanelet (se [Systemværktøjer](../system/system-tools.md#clean-temporary-files)). Den viser, hvor mange midlertidige filer der findes, og hvor meget plads de fylder, og lader dig derefter slette alt eller kun filer ældre end en valgt alder, med en dry-run-forhåndsvisning. Den rydder også forældede legacy-buildfiler og regenererer kompilerede CSS-assets.

Denne handling udelader bevidst Symfonys egne cachemapper (`var/cache/dev`, `var/cache/prod`, `var/cache/test` og cache pools), så den får ikke en ændring i `.env` eller `config/` til at træde i kraft — brug kommandolinjen til det.

### Fra kommandolinjen

For mere kontrol, og for faktisk at rydde Symfony-applikationscachen, skal du bruge Symfony-konsolkommandoer:

```bash
# Clear the Symfony cache
php bin/console cache:clear

# Clear only the production cache
php bin/console cache:clear --env=prod
```

## Tips

* **Planlæg regelmæssige oprydninger** — Opret et ugentligt eller månedligt cron-job til at rydde midlertidige filer
* **Overvåg diskforbrug** — Hold øje med størrelsen på mappen `var/`, da den vokser med cache- og logfiler
* **Vær forsigtig med logs** — Før du sletter logfiler, skal du tjekke, om de indeholder oplysninger, du måtte have brug for til fejlfinding