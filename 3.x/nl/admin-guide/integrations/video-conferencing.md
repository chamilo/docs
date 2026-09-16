# Videoconferentie

Chamilo integreert met videoconferentieplatforms om livesessies binnen cursussen mogelijk te maken.

## Ondersteunde platforms

### BigBlueButton

**BigBlueButton** (BBB) is een open-source webconferentiesysteem dat is ontworpen voor online leren. Het is de meest gebruikte videoconferentieoplossing met Chamilo.

#### Configuratie

1. Installeer BigBlueButton op een aparte server (zie [BigBlueButton-documentatie](https://docs.bigbluebutton.org/))
2. Gebruik bbb-conf --salt op de BBB-server om de integratiegegevens op te halen
3. Installeer in de Chamilo-platforminstellingen, **Plugins**, de Videoconference-plugin en voer de configuratie in om het volgende in te stellen:
   * **BBB server URL** — Het adres van uw BBB-server
   * **BBB salt/secret** — Het API-geheim van uw BBB-server
4. Opslaan
5. **Schakel** de Videoconference-plugin **in**
6. Sommige speciale functies zijn beschikbaar voor beheerders; zorg er daarom voor dat u deze inschakelt in de regio *admin_page*

#### Functies beschikbaar in Chamilo

* Vergaderingen starten/deelnemen vanuit een cursus
* Automatische ruimtecreatie per cursus
* Opnamen van vergaderingen (indien ingeschakeld)
* Schermdeling, whiteboard, breakout rooms
* Chat naast video

### Zoom

Chamilo kan ook integreren met **Zoom** voor videoconferentie.

#### Configuratie

1. Maak een Zoom-app in de Zoom Marketplace
2. Configureer in Chamilo de Zoom API-referenties
3. Schakel de Zoom-integratie in

#### Hoe het werkt

Wanneer Zoom is geconfigureerd, kunnen docenten Zoom-vergaderingen aanmaken en starten vanuit hun cursus. Cursisten nemen deel via de Chamilo-interface.

## Kiezen tussen BBB en Zoom

| Functie | BigBlueButton | Zoom |
|---------|--------------|------|
| Kosten | Gratis (open-source), maar vereist een eigen server | Vereist een Zoom-abonnement |
| Hosting | Zelf gehost | Cloud-gehost door Zoom |
| Integratiediepte | Diep (gebouwd voor LMS-gebruik) | Standaard |
| Opname | Aan de serverzijde, opgeslagen op uw infrastructuur | Zoom-cloud of lokaal |
| Whiteboard | Ingebouwd | Ingebouwd |
| Breakout rooms | Ja | Ja |

## Tips

* **Aparte server voor BBB** — BigBlueButton moet voor de beste prestaties op een eigen dedicated server draaien, niet op dezelfde server als Chamilo
* **Testen vóór lessen** — Test de videoconferentie-instelling altijd vóór een livesessie
* **Bandbreedte controleren** — Zorg ervoor dat uw server en netwerk het verwachte aantal gelijktijdige gebruikers aankunnen