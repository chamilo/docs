# IMS/LTI-Client

IMS/LTI-Client <img src="/.gitbook/assets/icons/mdi-link-variant.svg" alt="IMS/LTI-Client" data-size="line"> ermöglicht es Ihnen, ein externes Tool oder einen Inhaltsanbieter aus Ihrem Kurs heraus über den LTI-Standard (Versionen 1.1 und 1.3) zu starten — beispielsweise das interaktive Lehrbuch eines Verlags, ein spezialisiertes Simulationstool oder eine andere Plattform, die LTI unterstützt. Chamilo fungiert als startende Plattform; der externe Dienst ist das „Tool“.

## Zugriff auf das Tool

Sobald es aktiviert ist, erscheint in den **Einstellungen** <img src="/.gitbook/assets/icons/mdi-cog.svg" alt="Einstellungen" data-size="line"> Ihres Kurses die Schaltfläche **Externe Tools konfigurieren**. Von dort aus können Sie entweder:

* **Ein neues externes Tool hinzufügen** — Registrieren Sie eines selbst: Name, Start-URL, LTI-Version und die Zugangsdaten, die Ihnen der externe Dienst bereitgestellt hat (Client-ID/Schlüssel für LTI 1.3 oder Consumer Key und Secret für LTI 1.1)
* **Ein vorhandenes globales Tool hinzufügen** — Wenn Ihr Administrator bereits ein plattformweites Tool registriert hat, fügen Sie es Ihrem Kurs hinzu, anstatt eine eigene Verbindung zu erstellen

Nach dem Hinzufügen erscheint das Tool als reguläres Tool/Verknüpfung auf Ihrer Kursstartseite.

## Was Sie konfigurieren können

Für ein selbst registriertes Tool: ob es in einem Iframe oder einem neuen Fenster geöffnet wird, ob Name, E-Mail-Adresse und Bild der Lernenden an den externen Dienst übermittelt werden, benutzerdefinierte Startparameter und (für LTI 1.3) Unterstützung für Deep Linking. Wenn das Tool den Assignment and Grades Service unterstützt, können Sie außerdem eine verknüpfte Notenbuch-Spalte anlegen, sodass zurückgemeldete Punktzahlen in Ihr Chamilo-Notenbuch einfließen.

Für ein Tool, das aus einer plattformweiten „globalen“ Definition hinzugefügt wurde, können Sie nur diese kursbezogenen Darstellungs- und Datenschutzoptionen anpassen — die Verbindungsdaten selbst gehören der Person, die das Basistool registriert hat (in der Regel Ihrem Administrator).

## Tipps

* **Holen Sie zuerst die Zugangsdaten beim Tool-Anbieter ein** — Sie benötigen die Start-URL und entweder die Client-/Schlüsseldaten für LTI 1.3 oder einen Consumer Key und ein Secret für LTI 1.1, bevor Sie ein neues Tool registrieren können
* **Seien Sie bewusst, was Sie weitergeben** — Aktivieren Sie die Weitergabe von Name, E-Mail-Adresse oder Bild einer lernenden Person an einen externen Dienst nur, wenn das Tool dies tatsächlich benötigt
* **Fragen Sie Ihren Administrator nach globalen Tools** — Wenn dasselbe externe Tool in vielen Kursen verwendet wird, vermeidet eine plattformweite Registrierung, dass jede Lehrkraft eine eigene Verbindung separat konfiguriert