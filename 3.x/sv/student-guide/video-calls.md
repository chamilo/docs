# Videosamtal en-till-en

Chamilo innehåller valfria **videosamtal en-till-en** i den **flytande plattformschatten**. Funktionen använder webbläsarens WebRTC-stöd för att koppla samman två personer som använder Chamilo. Detta skiljer sig från **kursverktyget Chatt** och från möten som skapas med BigBlueButton eller Zoom.

Den här funktionen introducerades och förbättrades för [ärende #3777](https://github.com/chamilo/chamilo-lms/issues/3777) i PR:erna [#9102](https://github.com/chamilo/chamilo-lms/pull/9102), [#9110](https://github.com/chamilo/chamilo-lms/pull/9110), [#9112](https://github.com/chamilo/chamilo-lms/pull/9112), [#9127](https://github.com/chamilo/chamilo-lms/pull/9127) och [#9128](https://github.com/chamilo/chamilo-lms/pull/9128).

## Innan du börjar

* Administratören måste tillåta användning av den flytande plattformschatten och ställa in **Dölj videochattalternativet i den globala chatten** (`chat.hide_chat_video`) till **Nej**. Alternativet är dolt som standard. Se [Chattinställningar](../admin-guide/platform-settings/chat-settings.md).
* Använd en webbläsare som stöder WebRTC, med behörighet att komma åt kamera och mikrofon. Webbläsarens medieåtkomst kräver vanligtvis HTTPS (eller en betrodd lokal utvecklingskontext).
* Var inloggad och ställ in din chattstatus till **online**. Välj en vanlig användarkontakt; videoknappen visas inte för en bot eller när funktionen är inaktiverad.
* Den andra användaren måste vara tillgänglig för att ta emot och acceptera samtalet.

## Starta ett samtal

1. Öppna den **flytande chattpanelen** längst ned i Chamilo (inte kursens egen Chattsida).
2. Välj den person du vill kontakta.
3. I konversationshuvudet klickar du på kameraikonen **Starta videosamtal**.
4. Bevilja åtkomst till kamera och mikrofon när webbläsaren frågar.
5. Samtalet visar **Ringer...** medan Chamilo väntar på den andra användaren. När de accepterar ändras statusen via **Ansluter...** till **Ansluten** när peer-anslutningen lyckas.

Ett obesvarat samtal avbryts efter en tidsgräns i stället för att fortsätta på obestämd tid. Om den andra användaren avvisar eller avbryter visar chatten ett förklarande statusmeddelande.

## Ta emot och hantera ett samtal

När en kontakt ringer visar den flytande chatten en dialogruta **Inkommande videosamtal**. Välj **Acceptera** för att delta eller **Avvisa** för att avböja. Att acceptera kan också be om behörighet att använda kamera och mikrofon.

Under ett samtal kan du **stänga av eller slå på mikrofonen**, **slå på eller av kameran** och **lägga på**. En liten förhandsvisning visar din lokala video medan huvudområdet visar den andra personen. Att stänga eller avsluta samtalet frigör de lokala ljud-/videoströmmarna.

Detta är ett **privat samtal mellan två användare**, inte ett kursövergripande möte. För att hålla en schemalagd gruppsession med inspelning eller samarbetsverktyg använder du organisationens integration för [videokonferens](../teacher-guide/collaboration-and-communication/video-conferencing.md).

## Om videosamtal inte är tillgängligt

* **Ingen ikon för Starta videosamtal:** Kontrollera plattformens inställning `chat.hide_chat_video`, om den flytande chatten är tillgänglig, din onlinestatus och webbläsarens WebRTC-stöd.
* **Fel med kamera eller mikrofon:** Tillåt mediebehörigheter i webbläsaren och kontrollera att maskinvaran finns och inte används av ett annat program.
* **Inget svar:** Be din kontakt öppna Chamilo och kontrollera sin tillgänglighet. Den utgående förfrågan har en tidsgräns.
* **Anslutningen misslyckas efter acceptans:** Prova ett annat nätverk och kontrollera webbläsarbehörigheter eller brandväggsbegränsningar. Den nuvarande WebRTC-implementeringen använder en offentlig STUN-server och konfigurerar inte en TURN-relä, så anslutningen kan misslyckas i restriktiva nätverk. Textchatt kan fortfarande fungera om videosignaleringen misslyckas.

Det finns inget behov av att konfigurera BigBlueButton eller Zoom för den här funktionen för direktsamtal; dessa integrationer tillhandahåller en separat typ av möte.