# Bestandsintegriteit

*Nieuw in Chamilo 3.0.*

Bestandsintegriteit vergelijkt de bestanden die op uw server zijn geïnstalleerd met een vertrouwde baseline, om toevoegingen, wijzigingen, verwijderingen en permissiewijzigingen te detecteren die u niet verwachtte — het soort verandering dat een geslaagde inbraak, een gecompromitteerde dependency of een onbedoelde handmatige bewerking achterlaat.

## Bestandsintegriteit openen

Klik in het beheerpaneel op **Beveiliging > Bestandsintegriteit**.

## Wat het toont

![De pagina Bestandsintegriteit met informatie over de laatste scan, panelen voor Toegevoegde, Gewijzigde, Verwijderde en Permissies gewijzigde bestanden, een lijst Waarschuwingsgeschiedenis, en Acties om een scan uit te voeren, waarschuwingen te pauzeren of een nieuwe baseline vast te stellen](/.gitbook/assets/admin-security-file-integrity.png)

* **Laatste scan** — Wanneer de meest recente scan is uitgevoerd en hoeveel bestanden daarbij zijn gecontroleerd
* **Toegevoegd / Gewijzigd / Verwijderd** — Bestanden die afwijken van de baseline, geïdentificeerd door SHA-256-checksums te vergelijken (elke lijst is begrensd tot 500 paden, met een opmerking als de volledige lijst langer is — zie het CEF-log hieronder voor de complete lijst)
* **Permissies gewijzigd** — Bestanden waarvan de permissies afwijken van de baseline. Op Linux worden POSIX-modusbits rechtstreeks vergeleken (bijvoorbeeld: een bestand dat world-writable wordt, wordt gemarkeerd); op Windows wordt alleen het alleen-lezen-attribuut bijgehouden, omdat `fileperms()` geen echte NTFS-ACL's weerspiegelt
* **Waarschuwingsgeschiedenis** — Een duurzaam, alleen-toevoegend log van elke scan die iets heeft gevonden (tot de laatste 50). In tegenstelling tot het rapport hierboven wordt deze lijst nooit gewist door een schone scan of een nieuwe baseline, zodat eerdere waarschuwingen zichtbaar blijven, ook nadat de drift die ze signaleerden is opgelost

De controle doorloopt de volledige geïnstalleerde bestandsboom, met uitzondering van de mappen `var/` en `.git/` — met één uitzondering: `.git/config` wordt nog steeds individueel bewaakt, specifiek om te detecteren dat een Git-remote stilzwijgend naar een vijandige server wordt omgeleid. Symbolische koppelingen worden nooit gevolgd, om traversal-lussen of het verlaten van de installatiemap te voorkomen.

Omdat een volledige scan van een grote installatie enkele minuten kan duren, wordt de walk in stukken verdeeld (één map op het hoogste niveau tegelijk) en wordt de voortgang bijgehouden in een lockbestand — zodat de pagina veilig kan worden herladen om de voortgang te controleren, en een gecrashte of afgebroken scan nooit wordt aangezien voor een scan die nog loopt.

## Acties

* **Nu een scan uitvoeren** — Vergelijkt de huidige bestandsboom onmiddellijk met de baseline
* **1 uur pauzeren** — Schort waarschuwingen tijdelijk op (bijvoorbeeld terwijl u een update uitrolt). Vereist dat u uw eigen wachtwoord opnieuw invoert. Tijdens de pauze neemt een scan stilzwijgend de huidige boom als nieuwe baseline over in plaats van te waarschuwen, zodat het pauzervenster sluit zonder achtergebleven waarschuwingen. De maximale pauze is 24 uur
* **Nieuwe baseline vaststellen** — Neemt de huidige bestandsboom over als de nieuwe vertrouwde referentie. Vereist dat u uw eigen wachtwoord opnieuw invoert

Het pauzeren van waarschuwingen of het vaststellen van een nieuwe baseline kan een lopende inbraak verbergen, daarom vereisen beide opnieuw uw wachtwoord — een gekaapte beheersessie alleen is niet voldoende om detectie te dempen terwijl bestanden worden gemanipuleerd.

## Uitvoeren vanuit Cron

Dezelfde controles zijn beschikbaar als consolecommando's, bedoeld om met cron te worden gepland in plaats van vanaf de beheerpagina op een schema te worden uitgevoerd:

```bash
# Scan for drift and alert admins if anything changed
0 3 * * * cd /var/www/chamilo/master && php bin/console app:file-integrity:scan

# Generate or regenerate the baseline (run once after install, or after a manual update)
php bin/console app:file-integrity:baseline

# Pause alerting from the command line (prompts for a global administrator's username and password)
php bin/console app:file-integrity:snooze
```

Als een pauze actief is, herbepaalt `app:file-integrity:scan` stilzwijgend de baseline in plaats van te waarschuwen, in overeenstemming met het gedrag van een scan die vanaf de beheerpagina wordt gestart.

## Instellingen

Eén gerelateerde instelling bevindt zich in **Configuratie-instellingen > Beveiliging**:

* **`file_integrity_check_notify_admins`** — Een lijst met e-mailadressen die moeten worden verwittigd wanneer drift wordt gevonden; indien leeg gelaten, wordt elke Global Administrator verwittigd

## SIEM-integratie

Elke scan schrijft ook CEF-logregels (Common Event Format) naar `var/logs/security/file_integrity.log`, geschikt voor inname door een SIEM (Wazuh, Splunk, QRadar, ArcSight, Elastic/Filebeat en vergelijkbare tools). Elke regel is getagd met een signature-ID die het soort wijziging identificeert:

| Signature | Betekenis |
|-----------|---------|
| `FIM-ADDED` | Er is een nieuw bestand verschenen |
| `FIM-MODIFIED` | De inhoud van een bestand is gewijzigd |
| `FIM-DELETED` | Een bestand is verdwenen |
| `FIM-GITCONFIG` | `.git/config` is gewijzigd (mogelijk gekaapte remote) |
| `FIM-PERMS` | De permissies van een bestand zijn gewijzigd |
| `FIM-TRUNCATED` | Het rapport voor een categorie is begrensd; raadpleeg het log voor de volledige lijst |

## Aanbevolen gebruik

1. Stel een baseline vast direct na de installatie, en opnieuw na elke handmatige update of deployment
2. Plan `app:file-integrity:scan` in cron (bijvoorbeeld 's nachts)
3. Gebruik vóór een gepland onderhoudsvenster waarin bestanden wijzigen (een update, een migratie) **Pauzeren voor 1 uur** in plaats van de cron-job volledig te verwijderen
4. Voer `var/logs/security/file_integrity.log` in uw bestaande logmonitoring of SIEM in, indien u die hebt