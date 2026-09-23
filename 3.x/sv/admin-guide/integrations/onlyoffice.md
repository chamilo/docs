# OnlyOffice

**OnlyOffice**-integrationen gör det möjligt för användare att redigera dokument (Word, Excel, PowerPoint) direkt i webbläsaren i Chamilo, utan att ladda ner dem.

## Vad OnlyOffice tillhandahåller

* **Dokumentredigering** — Redigera .docx-, .xlsx- och .pptx-filer i webbläsaren
* **Formatkompatibilitet** — Full kompatibilitet med Microsoft Office-format
* **Ingen skrivbordsprogramvara behövs** — Allt körs i webbläsaren

> Realtidssamarbete vid redigering beror på själva OnlyOffice Document Server; Chamilos plugin öppnar och sparar dokument via servern men varken lägger till eller begränsar den förmågan.

## Konfiguration

1. Installera **OnlyOffice Document Server** på din server (eller använd OnlyOffice molntjänst)
2. I Chamilos plattformsinställningar, konfigurera:
   * **OnlyOffice Document Server URL** — Adressen till din OnlyOffice-server
   * **Secret key** — För säker kommunikation mellan Chamilo och OnlyOffice
3. Aktivera integrationen

## Så fungerar det

När konfigurationen är klar ser användarna ett alternativ **Redigera med OnlyOffice** när de visar stödda dokumenttyper i verktyget Dokument. Ett klick öppnar dokumentet i OnlyOffice-redigeraren inom Chamilo-gränssnittet.

Ändringar sparas automatiskt tillbaka till Chamilos dokumentlagring.

## Tips

* **Separat server rekommenderas** — Precis som BigBlueButton bör OnlyOffice Document Server köras på en egen server för bästa prestanda
* **HTTPS krävs** — Både Chamilo och OnlyOffice bör serveras över HTTPS för att integrationen ska fungera
* **Kontrollera format** — OnlyOffice fungerar bäst med Office-format (.docx, .xlsx, .pptx). Andra format kan ha begränsat redigeringsstöd.