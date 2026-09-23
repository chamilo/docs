# Videokonference

Chamilo integrerer med videokonferenceplatforme for at muliggøre livesessioner i kurser.

## Understøttede platforme

### BigBlueButton

**BigBlueButton** (BBB) er et open source-webbaseret konferencessystem designet til online læring. Det er den mest almindeligt anvendte videokonferenceløsning med Chamilo.

#### Konfiguration

1. Installér BigBlueButton på en separat server (se [BigBlueButton-dokumentationen](https://docs.bigbluebutton.org/))
2. Brug bbb-conf --salt på BBB-serveren for at hente integrationsoplysningerne
3. I Chamilo-platformindstillingerne, **Plugins**, installér Videoconference-pluginnet og indtast dets konfiguration for at angive:
   * **BBB server URL** — Adressen på din BBB-server
   * **BBB salt/secret** — API-hemmeligheden fra din BBB-server
4. Gem
5. **Aktivér** Videoconference-pluginnet
6. Nogle særlige funktioner er tilgængelige for administratorer, så sørg for at aktivere det i regionen *admin_page*

#### Funktioner tilgængelige i Chamilo

* Start/deltag i møder indefra et kursus
* Automatisk oprettelse af rum pr. kursus
* Mødeoptagelser (hvis aktiveret)
* Skærmdeling, whiteboard, breakout rooms
* Chat ved siden af video

### Zoom

Chamilo kan også integrere med **Zoom** til videokonference.

#### Konfiguration

1. Opret en Zoom-app i Zoom Marketplace
2. Konfigurér Zoom API-legitimationsoplysningerne i Chamilo
3. Aktivér Zoom-integrationen

#### Sådan fungerer det

Når Zoom er konfigureret, kan undervisere oprette og starte Zoom-møder indefra deres kursus. Kursusdeltagere tilslutter sig via Chamilo-grænsefladen.

## Valg mellem BBB og Zoom

| Funktion | BigBlueButton | Zoom |
|---------|--------------|------|
| Omkostning | Gratis (open source), men kræver din egen server | Kræver et Zoom-abonnement |
| Hosting | Selvhostet | Cloud-hostet af Zoom |
| Integrationsdybde | Dyb (bygget til LMS-brug) | Standard |
| Optagelse | Serverside, gemt på din infrastruktur | Zoom-cloud eller lokalt |
| Whiteboard | Indbygget | Indbygget |
| Breakout rooms | Ja | Ja |

## Tips

* **Separat server til BBB** — BigBlueButton bør køre på sin egen dedikerede server for bedst ydeevne, ikke på samme server som Chamilo
* **Test før undervisning** — Test altid videokonferenceopsætningen før en livesession
* **Tjek båndbredde** — Sørg for, at din server og dit netværk kan håndtere det forventede antal samtidige brugere