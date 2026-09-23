# OnlyOffice

**OnlyOffice**-integrationen giver brugerne mulighed for at redigere dokumenter (Word, Excel, PowerPoint) direkte i browseren inde i Chamilo, uden at downloade dem.

## Hvad OnlyOffice tilbyder

* **Dokumentredigering** — Rediger .docx-, .xlsx- og .pptx-filer i browseren
* **Formatkompatibilitet** — Fuld kompatibilitet med Microsoft Office-formater
* **Ingen desktopsoftware nødvendig** — Alt kører i browseren

> Realtidssamarbejde om redigering afhænger af selve OnlyOffice Document Server; Chamilos plugin åbner og gemmer dokumenter via serveren, men tilføjer eller begrænser ikke den funktion.

## Konfiguration

1. Installer **OnlyOffice Document Server** på din server (eller brug OnlyOffice-cloudtjenesten)
2. I Chamilos platformindstillinger skal du konfigurere:
   * **OnlyOffice Document Server URL** — Adressen på din OnlyOffice-server
   * **Secret key** — Til sikker kommunikation mellem Chamilo og OnlyOffice
3. Aktivér integrationen

## Sådan fungerer det

Når det er konfigureret, ser brugerne en indstilling **Rediger med OnlyOffice**, når de viser understøttede dokumenttyper i værktøjet Dokumenter. Når de klikker på den, åbnes dokumentet i OnlyOffice-editoren inde i Chamilo-grænsefladen.

Ændringer gemmes automatisk tilbage i Chamilos dokumentlager.

## Tips

* **Separat server anbefales** — Ligesom BigBlueButton bør OnlyOffice Document Server køre på sin egen server for bedst ydeevne
* **HTTPS påkrævet** — Både Chamilo og OnlyOffice bør serveres over HTTPS, for at integrationen kan fungere
* **Tjek formater** — OnlyOffice fungerer bedst med Office-formater (.docx, .xlsx, .pptx). Andre formater kan have begrænset redigeringsunderstøttelse.