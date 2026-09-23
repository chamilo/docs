# OnlyOffice

**OnlyOffice**-integrasjon lar brukere redigere dokumenter (Word, Excel, PowerPoint) direkte i nettleseren i Chamilo, uten å laste dem ned.

## Hva OnlyOffice tilbyr

* **Dokumentredigering** — Rediger .docx-, .xlsx- og .pptx-filer i nettleseren
* **Formatkompatibilitet** — Full kompatibilitet med Microsoft Office-formater
* **Ingen skrivebordsprogramvare nødvendig** — Alt kjører i nettleseren

> Sanntidssamarbeid om redigering avhenger av selve OnlyOffice Document Server; Chamilos programtillegg åpner og lagrer dokumenter via serveren, men verken legger til eller begrenser denne funksjonen.

## Konfigurasjon

1. Installer **OnlyOffice Document Server** på serveren din (eller bruk OnlyOffice-skytjenesten)
2. I Chamilos plattforminnstillinger, konfigurer:
   * **OnlyOffice Document Server URL** — Adressen til OnlyOffice-serveren din
   * **Secret key** — For sikker kommunikasjon mellom Chamilo og OnlyOffice
3. Aktiver integrasjonen

## Slik fungerer det

Når det er konfigurert, ser brukerne et **Rediger med OnlyOffice**-valg når de viser støttede dokumenttyper i Dokumenter-verktøyet. Ved å klikke åpnes dokumentet i OnlyOffice-redigeringsprogrammet i Chamilo-grensesnittet.

Endringer lagres automatisk tilbake til Chamilos dokumentlager.

## Tips

* **Egen server anbefales** — Som BigBlueButton bør OnlyOffice Document Server kjøre på en egen server for best ytelse
* **HTTPS påkrevd** — Både Chamilo og OnlyOffice bør serveres over HTTPS for at integrasjonen skal fungere
* **Sjekk formater** — OnlyOffice fungerer best med Office-formater (.docx, .xlsx, .pptx). Andre formater kan ha begrenset redigeringsstøtte.