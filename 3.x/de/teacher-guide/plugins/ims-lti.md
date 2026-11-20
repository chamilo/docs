# IMS/LTI Client

IMS/LTI Client <img src="../../.gitbook/assets/icons/mdi-link-variant.svg" alt="IMS/LTI Client" data-size="line"> ermöglicht es Ihnen, ein externes Werkzeug oder einen Inhaltsanbieter aus Ihrem Kurs heraus über den LTI-Standard (Versionen 1.1 und 1.3) zu starten — beispielsweise ein interaktives Lehrbuch eines Verlags, ein spezialisiertes Simulationswerkzeug oder eine andere Plattform, die LTI unterstützt. Chamilo fungiert als startende Plattform; der externe Dienst ist das „Werkzeug“.

## Zugriff auf das Werkzeug

Nach der Aktivierung erscheint in den **Einstellungen** <img src="../../.gitbook/assets/icons/mdi-cog.svg" alt="Settings" data-size="line"> Ihres Kurses eine Schaltfläche **Externe Werkzeuge konfigurieren**. Von dort aus können Sie entweder:

* **Ein neues externes Werkzeug hinzufügen** — Registrieren Sie es selbst: Name, Start-URL, LTI-Version und die Zugangsdaten, die Ihnen der externe Dienst mitgeteilt hat (Client-ID/Schlüssel für LTI 1.3 oder ein Consumer Key und ein Secret für LTI 1.1)
* **Ein vorhandenes globales Werkzeug hinzufügen** — Wenn Ihre Administration bereits ein plattformweites Werkzeug registriert hat, fügen Sie es Ihrem Kurs hinzu, anstatt eine eigene Verbindung einzurichten

Nach dem Hinzufügen erscheint das Werkzeug als reguläres Werkzeug bzw. als Verknüpfung auf der Startseite Ihres Kurses.

## Was Sie konfigurieren können

Bei einem selbst registrierten Werkzeug: ob es in einem iframe oder in einem neuen Fenster geöffnet wird, ob Name, E-Mail-Adresse und Bild der lernenden Person mit dem externen Dienst geteilt werden, benutzerdefinierte Startparameter und (für LTI 1.3) die Unterstützung von Deep Linking. Wenn das Werkzeug den Assignment and Grades Service unterstützt, können Sie außerdem eine verknüpfte Spalte im Notenbuch erstellen, sodass die zurückgemeldeten Ergebnisse in Ihr Chamilo-Notenbuch einfließen.

Bei einem Werkzeug, das aus einer plattformweiten „globalen“ Definition hinzugefügt wurde, können Sie nur diese kursbezogenen Darstellungs- und Datenschutzoptionen anpassen — die Verbindungszugangsdaten selbst gehören der Person, die das Basiswerkzeug registriert hat (in der Regel Ihrer Administration).

## Tipps

* **Beschaffen Sie sich zuerst die Zugangsdaten beim Werkzeuganbieter** — Sie benötigen die Start-URL sowie entweder die Client-/Schlüsselangaben für LTI 1.3 oder einen Consumer Key und ein Secret für LTI 1.1, bevor Sie ein neues Werkzeug registrieren können
* **Gehen Sie bewusst mit geteilten Daten um** — Aktivieren Sie die Weitergabe von Name, E-Mail-Adresse oder Bild einer lernenden Person an einen externen Dienst nur, wenn das Werkzeug diese Angaben tatsächlich benötigt
* **Fragen Sie Ihre Administration nach globalen Werkzeugen** — Wenn dasselbe externe Werkzeug in vielen Kursen verwendet wird, erspart eine plattformweite Registrierung jeder Lehrkraft die separate Konfiguration einer eigenen Verbindung