# Hantera tillägg

## Öppna tilläggshanteraren

![Tilläggshanteraren som visar en lista över tillgängliga tillägg med aktiveringsreglage och konfigurationsalternativ](/.gitbook/assets/admin-plugin-manager.png)

Från administrationspanelen klickar du på **Hantera tillägg** för att se listan över tillgängliga tillägg.

## Tilläggsstatus

Varje tillägg har ett av två tillstånd:

* **Aktivt** — Tillägget är aktiverat och dess funktioner är tillgängliga på plattformen
* **Inaktivt** — Tillägget är installerat men inaktiverat

## Aktivera ett tillägg

1. Hitta tillägget i listan
2. Klicka på **Install**, sedan **Enable** eller slå på det
3. Konfigurera tilläggets inställningar (om tillämpligt, hitta knappen **Configure**)
4. Spara
5. Om det rekommenderas i README, aktivera det i en specifik **region**

Vissa tillägg lägger till verktyg i kurser, nya sidor på plattformen eller extra funktionalitet till befintliga funktioner.

## Konfigurera ett tillägg

Många tillägg har konfigurationsalternativ. Efter att du har aktiverat ett tillägg:

1. Klicka på knappen **Configure** bredvid tillägget
2. Fyll i den nödvändiga konfigurationen (API-nycklar, URL:er, alternativ osv.)
3. Spara

## Inaktivera ett tillägg

1. Hitta tillägget i listan
2. Klicka på **Disable** eller slå av det
3. Tilläggets funktioner tas omedelbart bort från plattformen, men tillägget är fortfarande installerat och behåller sin konfiguration tills du **Uninstall** det

Att inaktivera ett tillägg tar inte bort dess data. Om du aktiverar det senare finns data fortfarande kvar.

## Tips

* **Aktivera bara det du behöver** — Varje aktivt tillägg medför viss extra belastning. Håll oanvända tillägg inaktiverade.
* **Testa före produktion** — Aktivera nya tillägg först i en testmiljö
* **Kontrollera kompatibilitet** — Efter uppgradering av Chamilo, kontrollera att alla aktiva tillägg fortfarande fungerar korrekt