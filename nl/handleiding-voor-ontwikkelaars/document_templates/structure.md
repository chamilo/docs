# Structuur

Laten we begrijpen hoe ze werken, zodat we de sjablonen kunnen wijzigen.Elke sjabloon heeft een vermelding in de tabel _system\_template_ in de database. Laten we eens kijken naar een bestaand record:

* id: 1: een automatisch ID gegenereerd door de database
* title: TemplateTitleCourseTitle: een taalvariabele naam voor de titel die getoond moet worden, kan gevonden worden in main/lang/\[taal\]/trad4all.inc.php. Kan ook een gewone titel zijn voor portals in één taal
* comment: TemplateTitleCourseTitleDescription: een taalvariabele voor de beschrijving
* afbeelding: coursetitle.gif: een afbeelding om de sjabloon in de linkerkolom weer te geven. Deze afbeelding bevindt zich in app/home/default\_platform\ _document/template\_thumb/
* inhoud: ... de HTML-inhoud ... \(de sjabloon zelf \)
