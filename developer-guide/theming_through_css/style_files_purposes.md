# Style-Dateien Zwecke

## Die bootstrap.min.css Datei

Bootstrap ist das berüchtigte offene CSS-Stylesheet von Twitter. Es ist ein Behälter für die Best Practices für das Styling und verleiht Ihrer Website ein schönes Aussehen, wenn Sie sie nur einbeziehen.

Die bootstrap.min.css Datei ist eine minimierte \(komprimierte\) Version der Bibliothek.

Sie dürfen die Datei bootstrap.css NICHT ändern, da dies das Original ist, wie es von Twitter bereitgestellt wird, und da wir sie möglicherweise in Zukunft mit neueren Versionen von Twitter aktualisieren.

## Die base.css Datei

Die Datei base.css definiert eine Reihe von CSS-Elementen, die die eigentliche Grundlage für den Rest sind \(obwohl sie selbst auf Bootstrap 3 basiert\). Alles, was einem Portal bietet, dass « Chamilo touch » hier konzentriert ist, daher ist es eine gute Idee, diese Datei \(import\) aus einem spezifischeren CSS zu beziehen.

Sie sollten diese Datei nicht ändern, da dies das Erscheinungsbild anderer in Chamilo verwendeter Stile verändern könnte.

## Die Datei \[theme\] /default.css

Diese Datei ist spezifisch für Ihr CSS-Thema und definiert Elemente, die sehr spezifisch für das allgemeine Erscheinungsbild Ihres Portals sind.

Dies ist die Datei, die Sie aktualisieren müssen, um den Stil Ihrer Chamilo-Installation zu ändern.

Es enthält die Stile für die Kopfzeilenlogos, die Navigationsleiste, die Fußzeile usw. über das, was in base.css definiert wurde.

## Die print.css Datei

Der Stil print.css wird in Chamilo selten verwendet. Es sollte** viel mehr benutzt werden, aber wir müssen zuerst noch ein paar andere Dinge nachholen.

Normalerweise enthält die Datei print.css alle Einzelheiten, um eine Webseite druckbar zu machen \(wie... auf einem Drucker oder in einem PDF\). Auf dieser Seite würden wir gerne Beiträge bekommen.

## Andere Stylesheets in Ihrem Style-Ordner

Einige andere Dateien befinden sich im app/Resources/public/css/themes/\[your-style\]/ -Ordner, z. B. scorm.css, frames.css, dataTable.css und ähnliches. Diese werden nur für bestimmte Teile der Anwendung verwendet und tragen einen Namen, der für die von ihnen abgedeckelte Funktion relativ repräsentativ ist.

## Feature-spezifische Stylesheets

Schließlich gibt es eine Reihe anderer Dateien, die außerhalb des app/Resources/public/css/ -Ordners verfügbar sind. Diese sind funktionsspezifisch und werden im Allgemeinen mit einer neuen kostenlosen Softwarebibliothek oder Funktion zusammengestellt, die wir in Chamilo aufgenommen haben.

Dies ist zum Beispiel bei markdown.css der Fall.

Diese Dateien**sollte** nicht aktualisiert werden, da wir sie in zukünftigen Versionen von Chamilo wahrscheinlich mit neueren Versionen überschreiben werden. Auf Systemebene muss jedoch noch etwas unternommen werden, damit ein benutzerdefinierter Stil danach geladen werden kann.