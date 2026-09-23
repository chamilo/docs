# Videokonferanse

Chamilo integreres med videokonferanseplattformer for å muliggjøre livesesjoner i kurs.

## Støttede plattformer

### BigBlueButton

**BigBlueButton** (BBB) er et åpen kildekode-basert webkonferansesystem utviklet for nettbasert læring. Det er den mest brukte videokonferanseløsningen med Chamilo.

#### Konfigurasjon

1. Installer BigBlueButton på en separat server (se [BigBlueButton-dokumentasjonen](https://docs.bigbluebutton.org/))
2. Bruk bbb-conf --salt på BBB-serveren for å hente integrasjonsdetaljene
3. I Chamilo-plattforminnstillingene, **Plugins**, installer Videoconference-pluginen og angi konfigurasjonen for å sette:
   * **BBB server URL** — Adressen til BBB-serveren din
   * **BBB salt/secret** — API-hemmeligheten fra BBB-serveren din
4. Lagre
5. **Aktiver** Videoconference-pluginen
6. Noen spesialfunksjoner er tilgjengelige for administratorer, så sørg for at du aktiverer den i regionen *admin_page*

#### Funksjoner tilgjengelige i Chamilo

* Starte/delta i møter fra et kurs
* Automatisk romoppretting per kurs
* Møteopptak (hvis aktivert)
* Skjermdeling, tavle, grupperom
* Chat ved siden av video

### Zoom

Chamilo kan også integreres med **Zoom** for videokonferanse.

#### Konfigurasjon

1. Opprett en Zoom-app i Zoom Marketplace
2. I Chamilo, konfigurer Zoom API-legitimasjonen
3. Aktiver Zoom-integrasjonen

#### Slik fungerer det

Når Zoom er konfigurert, kan lærere opprette og starte Zoom-møter fra kurset sitt. Deltakere blir med via Chamilo-grensesnittet.

## Valg mellom BBB og Zoom

| Funksjon | BigBlueButton | Zoom |
|---------|--------------|------|
| Kostnad | Gratis (åpen kildekode), men krever egen server | Krever Zoom-abonnement |
| Hosting | Egenhostet | Skyhostet av Zoom |
| Integrasjonsdybde | Dyp (bygget for LMS-bruk) | Standard |
| Opptak | På serversiden, lagret på din infrastruktur | Zoom-sky eller lokalt |
| Tavle | Innebygd | Innebygd |
| Grupperom | Ja | Ja |

## Tips

* **Separat server for BBB** — BigBlueButton bør kjøre på en egen dedikert server for best ytelse, ikke på samme server som Chamilo
* **Test før undervisning** — Test alltid videokonferanseoppsettet før en livesesjon
* **Sjekk båndbredde** — Sørg for at serveren og nettverket kan håndtere forventet antall samtidige brukere