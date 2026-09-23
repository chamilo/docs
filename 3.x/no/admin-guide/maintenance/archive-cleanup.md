# Opprydding av arkiv

Over tid samler Chamilo opp midlertidige filer i cache- og arkivkatalogene. Regelmessig opprydding forebygger problemer med diskplass.

## Hva som kan ryddes

* **Midlertidige opplastingsfiler** — Filer som genereres under eksport, import og andre operasjoner, samt utdaterte byggefiler fra den eldre frontend
* **Symfony-applikasjonscache** — Kompilert container, bufret konfigurasjon og rutedata. Dette dekkes *ikke* av handlingen i administrasjonspanelet nedenfor — se [Fra kommandolinjen](#from-the-command-line).
* **Øktdata** — Utløpte PHP-øktfiler
* **Loggfiler** — Gamle loggfiler som ikke lenger trengs

## Utføre opprydding

### Fra administrasjonspanelet

Gå til **System > Clean temporary files** i administrasjonspanelet (se [Systemverktøy](../system/system-tools.md#clean-temporary-files)). Den viser hvor mange midlertidige filer som finnes og hvor mye plass de bruker, og lar deg deretter slette alt eller bare filer eldre enn en valgt alder, med forhåndsvisning (dry-run). Den fjerner også utdaterte byggefiler fra den eldre frontend og regenererer kompilerte CSS-ressurser.

Denne handlingen utelater med vilje Symfonys egne cache-kataloger (`var/cache/dev`, `var/cache/prod`, `var/cache/test` og cache-pools), så den vil ikke få en endring i `.env` eller `config/` til å tre i kraft — bruk kommandolinjen til det.

### Fra kommandolinjen

For mer kontroll, og for faktisk å tømme Symfony-applikasjonscachen, bruk Symfony-konsollkommandoer:

```bash
# Clear the Symfony cache
php bin/console cache:clear

# Clear only the production cache
php bin/console cache:clear --env=prod
```

## Tips

* **Planlegg regelmessig opprydding** — Sett opp en ukentlig eller månedlig cron-jobb for å tømme midlertidige filer
* **Overvåk diskbruk** — Hold øye med størrelsen på `var/`-katalogen, ettersom den vokser med cache- og loggfiler
* **Vær forsiktig med logger** — Før du sletter loggfiler, sjekk om de inneholder informasjon du kan trenge ved feilsøking