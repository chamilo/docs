# Een-op-een-videogesprekken

Chamilo bevat optionele **een-op-een-videogesprekken** in de **zwevende platformchat**. De functie gebruikt de WebRTC-ondersteuning van uw browser om twee personen te verbinden die Chamilo gebruiken. Dit verschilt van de **Chat-cursustool** en van vergaderingen die met BigBlueButton of Zoom zijn gemaakt.

Deze functie is geïntroduceerd en verbeterd voor [issue #3777](https://github.com/chamilo/chamilo-lms/issues/3777) in de PR's [#9102](https://github.com/chamilo/chamilo-lms/pull/9102), [#9110](https://github.com/chamilo/chamilo-lms/pull/9110), [#9112](https://github.com/chamilo/chamilo-lms/pull/9112), [#9127](https://github.com/chamilo/chamilo-lms/pull/9127) en [#9128](https://github.com/chamilo/chamilo-lms/pull/9128).

## Voordat u begint

* De beheerder moet het gebruik van de zwevende platformchat toestaan en **Videogesprekoptie in de globale chat verbergen** (`chat.hide_chat_video`) instellen op **Nee**. De optie is standaard verborgen. Zie [Chatinstellingen](../admin-guide/platform-settings/chat-settings.md).
* Gebruik een browser die WebRTC ondersteunt, met toestemming voor toegang tot de camera en de microfoon. Mediatoegang in de browser vereist doorgaans HTTPS (of een vertrouwde lokale ontwikkelomgeving).
* Meld u aan en stel uw chatstatus in op **online**. Kies een gewoon gebruikerscontact; de videoknop verschijnt niet bij een bot of wanneer de functie is uitgeschakeld.
* De andere gebruiker moet beschikbaar zijn om het gesprek te ontvangen en te accepteren.

## Een gesprek starten

1. Open het **zwevende chatpaneel** onderaan Chamilo (niet de eigen Chat-pagina van de cursus).
2. Selecteer de persoon die u wilt contacteren.
3. Klik in de kop van het gesprek op het camerapictogram **Videogesprek starten**.
4. Verleen toegang tot de camera en de microfoon wanneer uw browser daarom vraagt.
5. Het gesprek toont **Bellen...** terwijl Chamilo wacht op de andere gebruiker. Wanneer die accepteert, verandert de status via **Verbinden...** naar **Verbonden** nadat de peerverbinding is geslaagd.

Een onbeantwoord gesprek verloopt na een time-out in plaats van onbeperkt door te gaan. Als de andere gebruiker weigert of annuleert, toont de chat een verklarend statusbericht.

## Een gesprek ontvangen en beheren

Wanneer een contact belt, toont de zwevende chat een dialoogvenster **Inkomend videogesprek**. Kies **Accepteren** om deel te nemen of **Weigeren** om af te wijzen. Bij accepteren kan ook om toestemming worden gevraagd om uw camera en microfoon te gebruiken.

Tijdens een gesprek kunt u **uw microfoon dempen of het dempen opheffen**, **uw camera in- of uitschakelen** en **ophangen**. Een kleine voorbeeldweergave toont uw lokale video, terwijl het hoofdgebied de andere persoon toont. Door het gesprek te sluiten of te beëindigen worden de lokale audio-/videostreams vrijgegeven.

Dit is een **privégesprek tussen twee gebruikers**, geen cursusbrede vergadering. Om een geplande groepssessie met opname of samenwerkingstools te houden, gebruikt u de [videoconferentie](../teacher-guide/collaboration-and-communication/video-conferencing.md)-integratie van uw organisatie.

## Als videogesprekken niet beschikbaar zijn

* **Geen pictogram Videogesprek starten:** Controleer de platforminstelling `chat.hide_chat_video`, of de zwevende chat beschikbaar is, uw onlinestatus en de WebRTC-ondersteuning van de browser.
* **Fout met camera of microfoon:** Sta mediatoestemmingen toe in de browser en controleer of de hardware aanwezig is en niet door een andere toepassing wordt gebruikt.
* **Geen antwoord:** Vraag uw contactpersoon om Chamilo te openen en de beschikbaarheid te controleren. Het uitgaande verzoek heeft een time-out.
* **Verbinding mislukt na acceptatie:** Probeer een ander netwerk en controleer de browsermachtigingen of firewallbeperkingen. De huidige WebRTC-implementatie gebruikt een openbare STUN-server en configureert geen TURN-relay, waardoor de verbinding op beperkende netwerken kan mislukken. Tekstchat kan nog steeds werken als de videosignalering mislukt.

Het is niet nodig om BigBlueButton of Zoom te configureren voor deze functie voor directe gesprekken; die integraties bieden een ander type vergadering.