# Theming durch Vorlagen

![](../../.gitbook/assets/images14%20%282%29.png) ![](../../.gitbook/assets/images13%20%282%29.png) ![](../../.gitbook/assets/images15%20%282%29.png) Chamilo verwendet seit Version 1.10 die Twig-Templating-Engine für die meisten \(und in Zukunft alle\) seiner Schnittstelle.

Um die Vorlage in Chamilo zu aktualisieren, können Sie eines von zwei Dingen: Definieren Sie einige Vorlagendateien in `main/template/override/` NEU ODER kopieren Sie den `default` -Ordner und ändern Sie eine Zeile in `app/config/configuration.php`, indem Sie folgendermaßen folgende Schritte ausführen:

```text
cd main/template/
cp -r default newtemplate
cd newtemplate
// edit the new template to your heart's contempt
vim ../../app/config/configuration.php
// Find the $_configuration['default_template'] setting and replace
// 'default' by 'newtemplate', then uncomment it (remove the // prefix)
// Finally, refresh the archives (find the « Archive cleanup » option on
// the admin page
```

Auf diese Weise können Sie alles in Ihrer neuen Vorlage bearbeiten, während die ursprüngliche Vorlage verfügbar bleibt, und Sie vermeiden auch, dass Ihre Vorlage während Ihres nächsten Chamilo-Upgrades überschrieben wird.

Es ist jedoch wichtig zu verstehen, dass jede benutzerdefinierte Vorlage beibehalten werden muss: Wenn in Chamilo eine neue TPL-Datei in der Standard/Vorlage erstellt wird, muss diese neue TPL-Datei zu Ihrer benutzerdefinierten Vorlage hinzugefügt werden. Im Falle des override/-Ordners muss, obwohl es nicht erforderlich ist, die entsprechende Datei zu erstellen, dennoch sicherstellen, dass der default./.tpl-Datei keine neuen Informationen hinzugefügt wurden, die sonst nicht in der Überschreibung erscheinen würden. Diese Änderungen können im Verlauf der Änderungen im Verzeichnis default/ auf Github nachverfolgt werden: [https://github.com/chamilo/chamilo-lms/commits/1.11.x/main/template/default](https://github.com/chamilo/chamilo-lms/commits/1.11.x/main/template/default)

Im Verzeichnis _default_ finden Sie die folgenden Verzeichnisse, die wir bei Bedarf erklären \(die meisten von ihnen sind selbsterklärend\).

* Admin
* Tagesordnung
* auth → alles was mit Authentifizierungsformularen und -prozessen zu tun hat
* Kurs\_Beschreibung
* erstellen\_kurs
* Exportieren
* Formular
* Glossar
* index → Homepage für anonyme Nutzer und Ankündigungen
* layout → Kopfzeile, Fußzeile, Banner und mehr sind hier gespeichert
* learnpfad 
* verknüpfen 
* mail\_editor
* Notizbuch
* Seiten
* sozial
* Fertigkeit
* userportal → Liste der Kurse im « My courses » Tab
* arbeiten