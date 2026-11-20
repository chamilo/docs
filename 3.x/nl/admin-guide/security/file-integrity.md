# Bestandsintegriteit

*Nieuw in Chamilo 3.0.*

Bestandsintegriteit vergelijkt de bestanden die op uw server zijn geïnstalleerd met een vertrouwde basislijn, om toevoegingen, wijzigingen, verwijderingen en wijzigingen in machtigingen te detecteren die u niet verwachtte — het soort wijziging dat een geslaagde inbraak, een gecompromitteerde afhankelijkheid of een foutieve handmatige bewerking zou achterlaten.

## Toegang tot bestandsintegriteit

Klik in het beheerpaneel op **Beveiliging > Bestandsintegriteit**.

## Wat het toont

![De pagina Bestandsintegriteit met informatie over de laatste scan, panelen voor toegevoegde, gewijzigde en verwijderde bestanden en bestanden met gewijzigde machtigingen, een lijst met waarschuwingsgeschiedenis en acties om een scan uit te voeren, waarschuwingen te pauzeren of een nieuwe basislijn vast te stellen](../../.gitbook/assets/admin-security-file-integrity.png)

* **Laatste scan** — Wanneer de meest recente scan is uitgevoerd en hoeveel bestanden deze heeft gecontroleerd
* **Toegevoegd / Gewijzigd / Verwijderd** — Bestanden die afwijken van de basislijn, geïdentificeerd door SHA-256-controlesommen te vergelijken (elke lijst is beperkt tot 500 paden, met een vermelding als de volledige lijst langer is — zie het CEF-logboek hieronder voor de volledige lijst)
* **Machtigingen gewijzigd** — Bestanden waarvan de machtigingen afwijken van de basislijn. Op Linux worden POSIX-modusbits rechtstreeks vergeleken (een bestand dat voor iedereen schrijfbaar wordt, wordt bijvoorbeeld gemarkeerd); op Windows wordt alleen het kenmerk alleen-lezen bijgehouden, omdat `fileperms()` geen echte NTFS-ACL's weergeeft
* **Waarschuwingsgeschiedenis** — Een duurzaam, alleen-toevoegend logboek van elke scan die iets heeft gevonden (tot de laatste 50). In tegenstelling tot het bovenstaande rapport wordt deze lijst nooit gewist door een schone scan of een nieuwe basislijn, zodat eerdere waarschuwingen zichtbaar blijven, ook nadat de afwijking die ze hebben gemarkeerd, is opgelost

De controle doorloopt de volledige geïnstalleerde bestandsboom, met uitzondering van de mappen `var/` en `.git/` — met één uitzondering: `.git/config` wordt nog steeds afzonderlijk bewaakt, specifiek om te detecteren dat een Git-remote stilzwijgend wordt omgeleid naar een vijandige server. Symbolische koppelingen worden nooit gevolgd, om doorloopcycli of het verlaten van de installatiemap te voorkomen.

Omdat een volledige scan van een grote installatie enkele minuten kan duren, wordt de doorloop in delen uitgevoerd (één map op het hoogste niveau tegelijk) en wordt de voortgang bijgehouden in een vergrendelingsbestand — zodat de pagina veilig opnieuw kan worden geladen om de voortgang te controleren, en een vastgelopen of afgebroken scan nooit wordt aangezien voor een scan die nog wordt uitgevoerd.

## Acties

* **Nu een scan uitvoeren** — Vergelijkt de huidige bestandsboom onmiddellijk met de basislijn
* **1 uur pauzeren** — Schort waarschuwingen tijdelijk op (bijvoorbeeld terwijl u een update implementeert). Vereist dat u uw eigen wachtwoord opnieuw invoert. Zolang de pauze actief is, neemt een scan de huidige boom stilzwijgend over als de nieuwe basislijn in plaats van te waarschuwen, zodat het pauzvenster sluit zonder resterende waarschuwingen. De maximale pauze is 24 uur
* **Nieuwe basislijn vaststellen** — Neemt de huidige bestandsboom over als de nieuwe vertrouwde referentie. Vereist dat u uw eigen wachtwoord opnieuw invoert

Het pauzeren van waarschuwingen of het vaststellen van een nieuwe basislijn kan een lopende inbraak verbergen. Daarom vereisen beide handelingen dat u uw wachtwoord opnieuw invoert — een gekaapte beheerderssessie alleen volstaat niet om detectie het zwijgen op te leggen terwijl er met bestanden wordt geknoeid.

## Uitvoeren via cron

Dezelfde controles zijn beschikbaar als consoleopdrachten, bedoeld om via cron te worden gepland in plaats van volgens een schema vanaf de beheerpagina te worden uitgevoerd:

```bash
# Scan for drift and alert admins if anything changed
0 3 * * * cd /var/www/chamilo/master && php bin/console app:file-integrity:scan

# Generate or regenerate the baseline (run once after install, or after a manual update)
php bin/console app:file-integrity:baseline

# Pause alerting from the command line (prompts for a global administrator's username and password)
php bin/console app:file-integrity:snooze
```

Als een pauze actief is, stelt `app:file-integrity:scan` stilzwijgend een nieuwe basislijn vast in plaats van te waarschuwen, overeenkomstig het gedrag van een scan die vanaf de beheerpagina wordt gestart.

## Instellingen

Eén gerelateerde instelling bevindt zich in **Configuratie-instellingen > Beveiliging**:

* **`file_integrity_check_notify_admins`** — Een lijst met e-mailadressen die moeten worden gewaarschuwd wanneer afwijking wordt gevonden; indien leeg gelaten, wordt elke globale beheerder gewaarschuwd

## SIEM-integratie

Elke scan schrijft ook CEF-logregels (Common Event Format) naar `var/logs/security/file_integrity.log`, geschikt voor opname door een SIEM (Wazuh, Splunk, QRadar, ArcSight, Elastic/Filebeat en vergelijkbare tools). Elke regel is voorzien van een signature-ID die het soort wijziging identificeert:

| Handtekening | Betekenis |
|-----------|---------|
| `FIM-ADDED` | Er is een nieuw bestand verschenen |
| `FIM-MODIFIED` | De inhoud van een bestand is gewijzigd |
| `FIM-DELETED` | Een bestand is verdwenen |
| `FIM-GITCONFIG` | `.git/config` is gewijzigd (mogelijke gekaapte remote) |
| `FIM-PERMS` | De machtigingen van een bestand zijn gewijzigd |
| `FIM-TRUNCATED` | Het rapport voor een categorie is beperkt; raadpleeg het logboek voor de volledige lijst |

## Aanbevolen gebruik

1. Stel direct na de installatie een baseline vast, en opnieuw na elke handmatige update of deployment
2. Plan `app:file-integrity:scan` in cron (bijvoorbeeld 's nachts)
3. Gebruik vóór een gepland onderhoudsvenster waarin bestanden worden gewijzigd (een update, een migratie) **Pauzeer gedurende 1 uur** in plaats van de cron-taak volledig te verwijderen
4. Voer `var/logs/security/file_integrity.log` in uw bestaande logmonitoring of SIEM in, indien u die hebt