# Videoconferenties

Chamilo integreert met videoconferentieplatforms om live sessies binnen cursussen mogelijk te maken.

## Ondersteunde Platforms

### BigBlueButton

**BigBlueButton** (BBB) is een open-source webconferentiesysteem dat is ontworpen voor online leren. Het is de meest gebruikte videoconferentieoplossing met Chamilo.

#### Configuratie

1. Installeer BigBlueButton op een aparte server (zie [BigBlueButton documentatie](https://docs.bigbluebutton.org/))
2. Gebruik bbb-conf --salt op de BBB-server om de integratiedetails te verkrijgen
3. Ga in de Chamilo-platforminstellingen naar **Plugins**, installeer de Videoconference-plugin en voer de configuratie in om het volgende in te stellen:
   * **BBB server URL** — Het adres van uw BBB-server
   * **BBB salt/secret** — De API-geheimcode van uw BBB-server
4. Opslaan
5. **Activeer** de Videoconference-plugin
6. Sommige speciale functies zijn beschikbaar voor beheerders, dus zorg ervoor dat u deze activeert in de *admin_page* regio

#### Beschikbare Functies in Chamilo

* Starten/deelnemen aan vergaderingen vanuit een cursus
* Automatische ruimtecreatie per cursus
* Opnames van vergaderingen (indien ingeschakeld)
* Scherm delen, whiteboard, breakout-ruimtes
* Chat naast video

### Zoom

Chamilo kan ook integreren met **Zoom** voor videoconferenties.

#### Configuratie

1. Maak een Zoom-app aan in de Zoom Marketplace
2. Configureer in Chamilo de Zoom API-inloggegevens
3. Activeer de Zoom-integratie

#### Hoe Het Werkt

Wanneer Zoom is geconfigureerd, kunnen docenten Zoom-vergaderingen maken en starten vanuit hun cursus. Leerlingen nemen deel via de Chamilo-interface.

## Kiezen Tussen BBB en Zoom

| Functie | BigBlueButton | Zoom |
|---------|--------------|------|
| Kosten | Gratis (open-source), maar vereist een eigen server | Vereist een Zoom-abonnement |
| Hosting | Zelf gehost | Cloud-gehost door Zoom |
| Integratiediepte | Diepgaand (ontworpen voor LMS-gebruik) | Standaard |
| Opname | Serverzijde, opgeslagen op uw infrastructuur | Zoom-cloud of lokaal |
| Whiteboard | Ingebouwd | Ingebouwd |
| Breakout-ruimtes | Ja | Ja |

## Tips

* **Aparte server voor BBB** — BigBlueButton moet op een eigen dedicated server draaien voor optimale prestaties, niet op dezelfde server als Chamilo
* **Test voor lessen** — Test altijd de videoconferentie-instellingen vóór een live sessie
* **Controleer bandbreedte** — Zorg ervoor dat uw server en netwerk het verwachte aantal gelijktijdige gebruikers aankunnen