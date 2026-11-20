# En-til-en-videosamtaler

Chamilo inkluderer valgfri **en-til-en-videosamtale** i den **flytende plattformchatten**. Den bruker nettleserens WebRTC-støtte til å koble sammen to personer som bruker Chamilo. Dette er noe annet enn **Chat-kursverktøyet** og møter opprettet med BigBlueButton eller Zoom.

Denne funksjonen ble introdusert og forbedret for [sak #3777](https://github.com/chamilo/chamilo-lms/issues/3777) i PR-ene [#9102](https://github.com/chamilo/chamilo-lms/pull/9102), [#9110](https://github.com/chamilo/chamilo-lms/pull/9110), [#9112](https://github.com/chamilo/chamilo-lms/pull/9112), [#9127](https://github.com/chamilo/chamilo-lms/pull/9127) og [#9128](https://github.com/chamilo/chamilo-lms/pull/9128).

## Før du starter

* Administratoren må tillate bruk av den flytende plattformchatten og sette **Skjul videochat-alternativet i global chat** (`chat.hide_chat_video`) til **Nei**. Den er skjult som standard. Se [Chat-innstillinger](../admin-guide/platform-settings/chat-settings.md).
* Bruk en nettleser som støtter WebRTC, med tillatelse til å få tilgang til kamera og mikrofon. Medietilgang i nettleseren krever vanligvis HTTPS (eller en klarert lokal utviklingskontekst).
* Vær pålogget og sett chatstatusen din til **online**. Velg en vanlig brukerkontakt; videoknappen vises ikke for en bot eller når funksjonen er deaktivert.
* Den andre brukeren må være tilgjengelig for å motta og godta samtalen.

## Starte en samtale

1. Åpne det **flytende chatpanelet** nederst i Chamilo (ikke kursets egen Chat-side).
2. Velg personen du vil kontakte.
3. I samtaleoverskriften klikker du på kameraikonet **Start videosamtale**.
4. Gi tilgang til kamera og mikrofon når nettleseren ber om det.
5. Samtalen viser **Ringer...** mens Chamilo venter på den andre brukeren. Når vedkommende godtar, endres statusen via **Kobler til...** til **Tilkoblet** etter at peer-tilkoblingen lykkes.

En ubesvart samtale tidsavbrytes i stedet for å fortsette på ubestemt tid. Hvis den andre brukeren avviser eller avbryter, viser chatten en forklarende statusmelding.

## Motta og håndtere en samtale

Når en kontakt ringer, viser den flytende chatten en dialog for **Innkommende videosamtale**. Velg **Godta** for å bli med eller **Avvis** for å avslå. Når du godtar, kan du også bli bedt om tillatelse til å bruke kamera og mikrofon.

Under en samtale kan du **dempe eller slå på mikrofonen**, **slå kameraet av eller på** og **legge på**. En liten forhåndsvisning viser din lokale video, mens hovedområdet viser den andre personen. Når du lukker eller avslutter samtalen, frigjøres de lokale lyd-/videostrømmene.

Dette er en **privat samtale mellom to brukere**, ikke et kursomfattende møte. For å holde en planlagt gruppeøkt med opptak eller samarbeidsverktøy, bruk organisasjonens integrasjon for [videokonferanse](../teacher-guide/collaboration-and-communication/video-conferencing.md).

## Hvis videosamtale ikke er tilgjengelig

* **Ingen Start videosamtale-ikon:** Kontroller plattformens innstilling `chat.hide_chat_video`, om den flytende chatten er tilgjengelig, din online-status og nettleserens WebRTC-støtte.
* **Feil med kamera eller mikrofon:** Tillat medietillatelser i nettleseren, og kontroller at maskinvaren er til stede og ikke brukes av et annet program.
* **Ingen svar:** Be kontakten din om å åpne Chamilo og sjekke tilgjengeligheten. Den utgående forespørselen har en tidsavbrudd.
* **Tilkoblingen mislykkes etter godkjenning:** Prøv et annet nettverk, og kontroller nettlesertillatelser eller brannmurbegrensninger. Den nåværende WebRTC-implementeringen bruker en offentlig STUN-server og konfigurerer ikke et TURN-relé, så tilkoblingen kan mislykkes i restriktive nettverk. Tekstchat kan fortsatt fungere hvis videosignaleringen mislykkes.

Det er ikke nødvendig å konfigurere BigBlueButton eller Zoom for denne funksjonen for direkteanrop; disse integrasjonene gir en egen type møte.