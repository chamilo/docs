# Struktur

Damit wir die Vorlagen ändern können, lassen Sie uns verstehen, wie sie funktionieren.

Jede Vorlage hat einen Eintrag in der Tabelle  _system\_template_ in der Datenbank. Schauen wir uns einen bestehenden Datensatz an:

* id: 1: Eine von der Datenbank generierte automatische ID
* title: templatetitleCourseTitle: ein Sprachvariablenname für den anzuzeienden Titel, der in main/lang/\[language\]/trad4all.inc.php. gefunden werden kann. Dies ist auch ein einfacher Titel für einsprachige Portale
* comment: templatetitleCourseTitleDescription: eine Sprachvariable für die Beschreibung
* image: coursetitle.gif: ein Bild, das die Vorlage in der linken Spalte darstellt. Dieses Bild befindet sich in app/home/default\_platform\_document/template\_thumb/
* Inhalt:... der HTML-Inhalt... \(Das Template selbst\)

