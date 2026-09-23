# Systemstatus

Sidan för systemstatus hjälper dig att kontrollera att din Chamilo-server är korrekt konfigurerad och att identifiera eventuella problem.

## Åtkomst till systemstatus

Från administrationspanelen klickar du på **Systemstatus** (eller **Systeminformation**).

## Vad den visar

![Sidan för systemstatus som visar PHP-konfiguration, databasstatus, filbehörigheter och serverinformation](/.gitbook/assets/admin-system-status.png)

### PHP-konfiguration

* **PHP-version** — Chamilo 3.0 stöder PHP 8.3, 8.4 och 8.5
* **Obligatoriska tillägg** — Kontrollerar att alla nödvändiga PHP-tillägg är installerade
* **PHP-inställningar** — Verifierar viktiga PHP-inställningar som minnesgräns, uppladdningsgränser och körtid

### Databasstatus

* **Databasanslutning** — Bekräftar att databasen är tillgänglig
* **Databasversion** — Visar databasens serverversion

### Filbehörigheter

* **Skrivbara kataloger** — Kontrollerar att Chamilo kan skriva till nödvändiga kataloger (cache, uploads, logs)

### Serverinformation

* **Operativsystem** — Information om serverns OS
* **Webbserver** — Apache, Nginx eller annan
* **Diskutrymme** — Tillgängligt lagringsutrymme

## Rekommenderade kontroller

Utför dessa kontroller regelbundet:

* **Efter installation** — Verifiera att alla krav är uppfyllda
* **Efter uppgraderingar** — Säkerställ att PHP-version och tillägg fortfarande är kompatibla
* **När problem uppstår** — Kontrollera systemstatus först vid felsökning