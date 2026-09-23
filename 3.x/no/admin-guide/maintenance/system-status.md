# Systemstatus

Siden for systemstatus hjelper deg med å verifisere at Chamilo-serveren er korrekt konfigurert og identifisere mulige problemer.

## Tilgang til systemstatus

Fra administrasjonspanelet klikker du **Systemstatus** (eller **Systeminformasjon**).

## Hva den viser

![Siden for systemstatus som viser PHP-konfigurasjon, databasestatus, filrettigheter og serverinformasjon](../../.gitbook/assets/admin-system-status.png)

### PHP-konfigurasjon

* **PHP-versjon** — Chamilo 3.0 støtter PHP 8.3, 8.4 og 8.5
* **Påkrevde utvidelser** — Kontrollerer at alle nødvendige PHP-utvidelser er installert
* **PHP-innstillinger** — Verifiserer viktige PHP-innstillinger som minnegrense, opplastingsgrenser og kjøretid

### Databasestatus

* **Databasetilkobling** — Bekrefter at databasen er tilgjengelig
* **Databaseversjon** — Viser versjonen av databaseserveren

### Filrettigheter

* **Skrivbare kataloger** — Kontrollerer at Chamilo kan skrive til påkrevde kataloger (cache, uploads, logs)

### Serverinformasjon

* **Operativsystem** — Detaljer om serverens OS
* **Webserver** — Apache, Nginx eller annen
* **Diskplass** — Tilgjengelig lagringsplass

## Anbefalte kontroller

Utfør disse kontrollene jevnlig:

* **Etter installasjon** — Verifiser at alle krav er oppfylt
* **Etter oppgraderinger** — Sørg for at PHP-versjon og utvidelser fortsatt er kompatible
* **Når problemer oppstår** — Sjekk systemstatus først når du feilsøker problemer