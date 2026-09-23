# Systemstatus

Siden Systemstatus hjælper dig med at kontrollere, at din Chamilo-server er korrekt konfigureret, og med at identificere potentielle problemer.

## Adgang til Systemstatus

Fra administrationspanelet skal du klikke på **Systemstatus** (eller **Systeminformation**).

## Hvad den viser

![Siden Systemstatus, der viser PHP-konfiguration, databasestatus, filrettigheder og serveroplysninger](/.gitbook/assets/admin-system-status.png)

### PHP-konfiguration

* **PHP-version** — Chamilo 3.0 understøtter PHP 8.3, 8.4 og 8.5
* **Påkrævede udvidelser** — Kontrollerer, at alle nødvendige PHP-udvidelser er installeret
* **PHP-indstillinger** — Verificerer vigtige PHP-indstillinger som hukommelsesgrænse, uploadgrænser og eksekveringstid

### Databasestatus

* **Databaseforbindelse** — Bekræfter, at databasen er tilgængelig
* **Databaseversion** — Viser databaseserverens version

### Filrettigheder

* **Skrivbare mapper** — Kontrollerer, at Chamilo kan skrive til de påkrævede mapper (cache, uploads, logs)

### Serveroplysninger

* **Operativsystem** — Oplysninger om serverens OS
* **Webserver** — Apache, Nginx eller anden
* **Diskplads** — Tilgængelig lagerplads

## Anbefalede kontroller

Udfør disse kontroller regelmæssigt:

* **Efter installation** — Verificér, at alle krav er opfyldt
* **Efter opgraderinger** — Sørg for, at PHP-version og udvidelser stadig er kompatible
* **Når der opstår problemer** — Tjek systemstatus først, når du fejlfinder problemer