# Einzelgespräche per Video

Chamilo enthält optionale **Einzelgespräche per Video** im **schwebenden Plattform-Chat**. Dabei wird die WebRTC-Unterstützung Ihres Browsers genutzt, um zwei Personen zu verbinden, die Chamilo verwenden. Dies unterscheidet sich vom **Kurswerkzeug Chat** und von Besprechungen, die mit BigBlueButton oder Zoom erstellt werden.

Diese Funktion wurde für [Issue #3777](https://github.com/chamilo/chamilo-lms/issues/3777) eingeführt und in den PRs [#9102](https://github.com/chamilo/chamilo-lms/pull/9102), [#9110](https://github.com/chamilo/chamilo-lms/pull/9110), [#9112](https://github.com/chamilo/chamilo-lms/pull/9112), [#9127](https://github.com/chamilo/chamilo-lms/pull/9127) und [#9128](https://github.com/chamilo/chamilo-lms/pull/9128) verbessert.

## Vor dem Start

* Die Administration muss die Nutzung des schwebenden Plattform-Chats erlauben und **Videochat-Option im globalen Chat ausblenden** (`chat.hide_chat_video`) auf **Nein** setzen. Standardmäßig ist sie ausgeblendet. Siehe [Chat-Einstellungen](../admin-guide/platform-settings/chat-settings.md).
* Verwenden Sie einen Browser, der WebRTC unterstützt, und erteilen Sie die Berechtigung für den Zugriff auf Kamera und Mikrofon. Der Medienzugriff des Browsers erfordert in der Regel HTTPS (oder einen vertrauenswürdigen lokalen Entwicklungskontext).
* Melden Sie sich an und setzen Sie Ihren Chat-Status auf **online**. Wählen Sie einen gewöhnlichen Benutzerkontakt; die Video-Schaltfläche erscheint nicht bei einem Bot oder wenn die Funktion deaktiviert ist.
* Die andere Person muss verfügbar sein, um den Anruf entgegenzunehmen und anzunehmen.

## Einen Anruf starten

1. Öffnen Sie das **schwebende Chat-Panel** am unteren Rand von Chamilo (nicht die eigene Chat-Seite des Kurses).
2. Wählen Sie die Person aus, die Sie kontaktieren möchten.
3. Klicken Sie in der Kopfzeile der Unterhaltung auf das Kamerasymbol **Videoanruf starten**.
4. Erteilen Sie den Zugriff auf Kamera und Mikrofon, wenn Ihr Browser danach fragt.
5. Der Anruf zeigt **Wird angerufen...**, während Chamilo auf die andere Person wartet. Wenn sie annimmt, wechselt der Status über **Verbindung wird hergestellt...** zu **Verbunden**, sobald die Peer-Verbindung erfolgreich ist.

Ein unbeantworteter Anruf läuft nach einer bestimmten Zeit ab, anstatt unbegrenzt fortgesetzt zu werden. Wenn die andere Person ablehnt oder abbricht, zeigt der Chat eine erläuternde Statusmeldung.

## Einen Anruf entgegennehmen und verwalten

Wenn ein Kontakt anruft, zeigt der schwebende Chat einen Dialog **Eingehender Videoanruf**. Wählen Sie **Annehmen**, um beizutreten, oder **Ablehnen**, um abzulehnen. Beim Annehmen kann auch die Berechtigung zur Nutzung von Kamera und Mikrofon abgefragt werden.

Während eines Anrufs können Sie **Ihr Mikrofon stummschalten oder die Stummschaltung aufheben**, **Ihre Kamera ein- oder ausschalten** und **auflegen**. Eine kleine Vorschau zeigt Ihr lokales Video, während der Hauptbereich die andere Person zeigt. Beim Schließen oder Beenden des Anrufs werden die lokalen Audio-/Videostreams freigegeben.

Dies ist ein **privater Anruf zwischen zwei Benutzern**, keine kursweite Besprechung. Für eine geplante Gruppensitzung mit Aufzeichnung oder Werkzeugen zur Zusammenarbeit verwenden Sie die Integration [Videokonferenzen](../teacher-guide/collaboration-and-communication/video-conferencing.md) Ihrer Organisation.

## Wenn Videoanrufe nicht verfügbar sind

* **Kein Symbol „Videoanruf starten“:** Prüfen Sie die Plattformeinstellung `chat.hide_chat_video`, ob der schwebende Chat verfügbar ist, Ihren Online-Status und die WebRTC-Unterstützung des Browsers.
* **Fehler bei Kamera oder Mikrofon:** Erlauben Sie Medienberechtigungen im Browser und prüfen Sie, ob die Hardware vorhanden und nicht von einer anderen Anwendung belegt ist.
* **Keine Antwort:** Bitten Sie Ihren Kontakt, Chamilo zu öffnen und die Verfügbarkeit zu prüfen. Die ausgehende Anfrage hat ein Zeitlimit.
* **Verbindung schlägt nach der Annahme fehl:** Versuchen Sie ein anderes Netzwerk und prüfen Sie Browserberechtigungen oder Firewall-Einschränkungen. Die aktuelle WebRTC-Implementierung verwendet einen öffentlichen STUN-Server und konfiguriert kein TURN-Relay, sodass die Verbindung in restriktiven Netzwerken fehlschlagen kann. Der Textchat kann weiterhin funktionieren, wenn die Videosignalisierung fehlschlägt.

Für diese Direktanruffunktion müssen BigBlueButton oder Zoom nicht konfiguriert werden; diese Integrationen bieten eine andere Art von Besprechung.