# Videokonferens

Chamilo integrerar med videokonferensplattformar för att möjliggöra livesessioner inom kurser.

## Plattformar som stöds

### BigBlueButton

**BigBlueButton** (BBB) är ett webbkonferenssystem med öppen källkod som är utformat för nätbaserat lärande. Det är den mest använda videokonferenslösningen tillsammans med Chamilo.

#### Konfiguration

1. Installera BigBlueButton på en separat server (se [BigBlueButton-dokumentationen](https://docs.bigbluebutton.org/))
2. Använd bbb-conf --salt på BBB-servern för att hämta integrationsuppgifterna
3. I Chamilo-plattformsinställningarna, **Plugins**, installera pluginet Videoconference och ange dess konfiguration för att ställa in:
   * **BBB server URL** — Adressen till din BBB-server
   * **BBB salt/secret** — API-hemligheten från din BBB-server
4. Spara
5. **Aktivera** pluginet Videoconference
6. Vissa specialfunktioner är tillgängliga för administratörer, så se till att du aktiverar det i regionen *admin_page*

#### Funktioner som är tillgängliga i Chamilo

* Starta/anslut till möten inifrån en kurs
* Automatisk rumsskapande per kurs
* Mötesinspelningar (om aktiverat)
* Skärmdelning, whiteboard, grupprum
* Chatt tillsammans med video

### Zoom

Chamilo kan även integrera med **Zoom** för videokonferens.

#### Konfiguration

1. Skapa en Zoom-app i Zoom Marketplace
2. I Chamilo, konfigurera Zoom API-uppgifterna
3. Aktivera Zoom-integrationen

#### Så fungerar det

När Zoom är konfigurerat kan lärare skapa och starta Zoom-möten inifrån sin kurs. Deltagare ansluter via Chamilo-gränssnittet.

## Att välja mellan BBB och Zoom

| Funktion | BigBlueButton | Zoom |
|---------|--------------|------|
| Kostnad | Gratis (öppen källkod), men kräver en egen server | Kräver en Zoom-prenumeration |
| Hosting | Egenhostad | Molnhostad av Zoom |
| Integrationsdjup | Djup (byggd för LMS-användning) | Standard |
| Inspelning | Serversida, lagras på din infrastruktur | Zoom-moln eller lokalt |
| Whiteboard | Inbyggd | Inbyggd |
| Grupprum | Ja | Ja |

## Tips

* **Separat server för BBB** — BigBlueButton bör köras på en egen dedikerad server för bästa prestanda, inte på samma server som Chamilo
* **Testa före lektioner** — Testa alltid videokonferensuppsättningen före en livesession
* **Kontrollera bandbredd** — Se till att din server och ditt nätverk klarar det förväntade antalet samtidiga användare