# En-til-en-videoopkald

Chamilo indeholder valgfri **en-til-en-videoopkald** i den **flydende platformchat**. Funktionen bruger din browsers WebRTC-understøttelse til at forbinde to personer, der bruger Chamilo. Det adskiller sig fra **Chat-kursusværktøjet** og fra møder oprettet med BigBlueButton eller Zoom.

Funktionen blev introduceret og forbedret i forbindelse med [issue #3777](https://github.com/chamilo/chamilo-lms/issues/3777) i PR'erne [#9102](https://github.com/chamilo/chamilo-lms/pull/9102), [#9110](https://github.com/chamilo/chamilo-lms/pull/9110), [#9112](https://github.com/chamilo/chamilo-lms/pull/9112), [#9127](https://github.com/chamilo/chamilo-lms/pull/9127) og [#9128](https://github.com/chamilo/chamilo-lms/pull/9128).

## Før du starter

* Administratoren skal tillade brug af den flydende platformchat og sætte **Skjul videochat-mulighed i global chat** (`chat.hide_chat_video`) til **Nej**. Den er skjult som standard. Se [Chatindstillinger](../admin-guide/platform-settings/chat-settings.md).
* Brug en browser, der understøtter WebRTC, med tilladelse til at få adgang til kamera og mikrofon. Browserens medieadgang kræver typisk HTTPS (eller en betroet lokal udviklingskontekst).
* Vær logget ind, og sæt din chatstatus til **online**. Vælg en almindelig brugerkontakt; videoknappen vises ikke for en bot eller når funktionen er deaktiveret.
* Den anden bruger skal være tilgængelig for at modtage og acceptere opkaldet.

## Start af et opkald

1. Åbn det **flydende chatpanel** nederst i Chamilo (ikke kursets egen Chat-side).
2. Vælg den person, du vil kontakte.
3. Klik på kameraikonet **Start videoopkald** i samtalens overskrift.
4. Giv adgang til kamera og mikrofon, når din browser beder om det.
5. Opkaldet viser **Ringer...**, mens Chamilo venter på den anden bruger. Når vedkommende accepterer, skifter status via **Opretter forbindelse...** til **Forbundet**, når peer-forbindelsen lykkes.

Et ubesvaret opkald udløber i stedet for at fortsætte på ubestemt tid. Hvis den anden bruger afviser eller annullerer, viser chatten en forklarende statusmeddelelse.

## Modtagelse og håndtering af et opkald

Når en kontakt ringer, viser den flydende chat en dialogboks med **Indgående videoopkald**. Vælg **Acceptér** for at deltage eller **Afvis** for at afslå. Accept kan også bede om tilladelse til at bruge dit kamera og din mikrofon.

Under et opkald kan du **slå din mikrofon fra eller til**, **tænde eller slukke dit kamera** og **lægge på**. En lille forhåndsvisning viser din lokale video, mens hovedområdet viser den anden person. Når du lukker eller afslutter opkaldet, frigives de lokale lyd-/videostreams.

Dette er et **privat opkald mellem to brugere**, ikke et møde for hele kurset. For at afholde en planlagt gruppesession med optagelse eller samarbejdsværktøjer skal du bruge din organisations integration til [videokonferencer](../teacher-guide/collaboration-and-communication/video-conferencing.md).

## Hvis videoopkald ikke er tilgængeligt

* **Intet ikon til Start videoopkald:** Kontrollér platformens indstilling `chat.hide_chat_video`, om den flydende chat er tilgængelig, din onlinestatus og browserens WebRTC-understøttelse.
* **Fejl med kamera eller mikrofon:** Tillad medietilladelser i browseren, og kontrollér, at hardwaren er til stede og ikke optaget af et andet program.
* **Intet svar:** Bed din kontakt om at åbne Chamilo og tjekke sin tilgængelighed. Den udgående anmodning har en timeout.
* **Forbindelsen mislykkes efter accept:** Prøv et andet netværk, og kontrollér browsertilladelser eller firewallbegrænsninger. Den aktuelle WebRTC-implementering bruger en offentlig STUN-server og konfigurerer ikke et TURN-relay, så forbindelsen kan mislykkes på restriktive netværk. Tekstchat kan stadig fungere, hvis videosignaleringen mislykkes.

Der er ikke behov for at konfigurere BigBlueButton eller Zoom til denne direkte opkaldsfunktion; disse integrationer tilbyder en separat type møde.