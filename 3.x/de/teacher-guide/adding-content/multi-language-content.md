# Mehrsprachige Inhalte

Chamilo ermöglicht es Ihnen, **mehrere Sprachversionen desselben Inhalts in einem einzigen Feld** zu verfassen — einen Abschnitt der Kursbeschreibung, ein Dokument, eine Testfrage, eine Umfrage — und jeder Lernende sieht automatisch nur die Version in seiner eigenen Sprache. Dies ist die Funktion **translate_html**, benannt nach der Plattformeinstellung, die sie steuert.

Dabei sind drei verschiedene Personen beteiligt, die jeweils eine andere Seite davon sehen:

* **Ihr Administrator** muss die Funktion plattformweit aktivieren, bevor sie jemand nutzen kann.
* **Sie (die Lehrkraft)** schreiben die verschiedenen Sprachversionen mithilfe einer Schaltfläche im Rich-Text-Editor.
* **Der Lernende** profitiert davon, ohne je zu wissen, dass es sie gibt — er sieht den Inhalt einfach in seiner eigenen Sprache, ohne eine Einstellung suchen oder umschalten zu müssen.

## Die Funktion aktivieren

Dies ist eine Aufgabe des Administrators, nicht der Lehrkraft. Unter **Administration > Konfigurationseinstellungen > Editor** muss die Einstellung **Mehrsprachige HTML-Inhalte unterstützen** (`translate_html`) aktiviert sein. Wenn Sie die unten beschriebene Schaltfläche **Lang ISO** in der Editor-Symbolleiste nicht sehen, ist das fast sicher der Grund — fragen Sie Ihren Administrator. Siehe [Editor-Einstellungen](../../admin-guide/platform-settings/editor-settings.md) für die vollständige Einstellungsreferenz. Ab v3.0.0 ist diese Einstellung standardmäßig aktiviert (vor dieser Version war das nicht der Fall), es sei denn, Sie haben von einer früheren Version aktualisiert, in der die Einstellung deaktiviert war.

Das erneute Deaktivieren dieser Einstellung löscht oder beschädigt keine bereits auf diese Weise verfassten Inhalte — siehe [Was Lernende sehen](#what-learners-see) unten.

## Mehrsprachige Inhalte verfassen

Die Funktion steht überall zur Verfügung, wo Sie den vollständigen Rich-Text-Editor haben: Abschnitte der [Kursbeschreibung](../creating-your-course/course-description.md), [Dokumente](documents.md), Test- und Umfragefragen und mehr.

1. Schreiben (oder fügen Sie ein) Sie den Inhalt in Ihrer Standardsprache, wie gewohnt.
2. Markieren Sie diesen Text und klicken Sie dann auf die Schaltfläche **Lang ISO** in der Editor-Symbolleiste.

![Die Symbolleiste des Rich-Text-Editors mit der sichtbaren Schaltfläche „Lang ISO“ nahe dem Anfang](../../.gitbook/assets/teacher-multilang-editor.png)

3. Wählen Sie im Menü die Sprache, in der Sie gerade geschrieben haben — die Liste umfasst jede auf Ihrer Plattform aktive Sprache. Wenn die benötigte nicht aufgeführt ist, verwenden Sie **Custom Chamilo ISO code...** am unteren Rand und geben Sie sie ein (z. B. `en_US`, `fr_FR`, `es`).

![Das geöffnete Menü „Lang ISO“ mit allen aktiven Plattformsprachen sowie „Add translation to...“ und einer Option für einen benutzerdefinierten Code](../../.gitbook/assets/teacher-multilang-lang-menu.png)

4. Chamilo umschließt Ihre Auswahl mit diesem Sprach-Tag. Schreiben (oder fügen Sie ein) Sie nun die Version der nächsten Sprache direkt danach, markieren Sie sie und wiederholen Sie den Vorgang mit einer anderen Sprache.

Fahren Sie fort, so viele Sprachen Sie abdecken möchten. Alle liegen im selben Feld — während Sie bearbeiten, sehen Sie alle Sprachversionen untereinander gestapelt; erst wenn jemand die Seite tatsächlich *ansieht*, blendet Chamilo alles außer der einen Sprache aus, die für ihn gilt (siehe unten).

### KI-unterstützte Übersetzung

Wenn Ihr Administrator einen KI-Textanbieter konfiguriert hat, bietet dasselbe Menü **Lang ISO** oben auch **Add translation to...**. Dadurch wird Ihr vorhandener Inhalt an das konfigurierte KI-Modell gesendet und ein neuer, automatisch übersetzter Block in der von Ihnen gewählten Sprache eingefügt (oder in allen verbleibenden Sprachen auf einmal, falls Ihre Plattform das zulässt) — Sie müssen ihn nicht selbst schreiben. Vorhandene Sprachblöcke bleiben unberührt, und bereits vorhandene Sprachen werden aus der Liste ausgeschlossen, sodass wiederholte Nutzung keine Duplikate erzeugt.

Wie bei jedem KI-generierten Inhalt sollten Sie das Ergebnis Korrektur lesen — es ist ein schneller Weg zu einem soliden ersten Entwurf in einer Sprache, die Sie selbst vielleicht nicht sprechen, kein Ersatz für die Überprüfung.

## Was Lernende sehen

Jeder Lernende sieht genau eine Sprachversion: Chamilo versucht zuerst die eigene Oberflächensprache; wenn keiner Ihrer Blöcke dazu passt, fällt es auf die eigene Sprache des Kurses zurück, dann auf die Standardsprache der Plattform; wenn auch davon keiner passt, zeigt es die Sprache, die Sie zufällig zuerst geschrieben haben, anstatt den Inhalt leer zu lassen. All das geschieht automatisch — der Lernende muss nichts konfigurieren, und Sie müssen auch nichts pro Lernendem konfigurieren.

Hier derselbe Abschnitt der Kursbeschreibung, gesehen von drei Lernenden mit unterschiedlichen Oberflächensprachen — sonst hat sich am Kurs zwischen diesen drei Screenshots nichts geändert, nur die eigene Sprache des Betrachters:

![Derselbe Abschnitt der Kursbeschreibung, gesehen von einem Lernenden mit Englisch als Oberflächensprache](../../.gitbook/assets/teacher-multilang-en.png)

![Derselbe Abschnitt, gesehen von einem Lernenden mit Französisch als Oberflächensprache](../../.gitbook/assets/teacher-multilang-fr.png)

![Derselbe Abschnitt, gesehen von einem Lernenden mit Spanisch als Oberflächensprache](../../.gitbook/assets/teacher-multilang-es.png)

### Unter der Haube

Wenn Sie jemals die **Quellcode**-Ansicht eines mehrsprachigen Feldes öffnen (die Schaltfläche `<>` in der Editor-Symbolleiste), sehen Sie jede Sprachversion etwa so umschlossen:

![Die Quellcode-Ansicht, die einen Block zeigt, der mit lang="en_US" class="mce-translatehtml" öffnet](../../.gitbook/assets/teacher-multilang-source-view.png)

Jede Version ist in ein `<div class="mce-translatehtml" lang="...">` (oder `<span>`, für eine kurze Inline-Phrase statt eines ganzen Blocks) eingeschlossen — dieses `lang`-Attribut ist das, wogegen Chamilo die Sprache des Betrachters abgleicht, um zu entscheiden, was angezeigt wird. Es lohnt sich, diesen spezifischen Klassennamen zu erkennen, wenn Sie jemals den Seitenquelltext prüfen oder Inhalte untersuchen, die falsch aussehen: **`mce-translatehtml`** ist die Markierung, nach der Sie suchen sollten.

Das erklärt auch, warum das Deaktivieren von `translate_html` in den Plattformeinstellungen bereits Geschriebenes nicht zerstört: Die Einstellung steuert nur, ob die **Lang-ISO**-Schaltfläche zum *Verfassen* im Editor erscheint. Die oben beschriebene Filterung auf der *Anzeige*-Seite läuft bedingungslos, sodass zuvor geschriebene mehrsprachige Inhalte für jeden Betrachter korrekt gefiltert bleiben, selbst auf einer Plattform, auf der ein Administrator die Verfasser-Schaltfläche inzwischen ausgeschaltet hat.

## Titel funktionieren nicht auf diese Weise

Der Titel eines Kurses, der Titel eines Dokuments, der Titel eines Tests — das sind einfache Textfelder, kein Rich Text, sodass sie das oben beschriebene `lang`-markierte Markup nicht aufnehmen können. Sie bleiben ein einzelner, neutraler Wert, unabhängig davon, wer sie betrachtet, egal wie viele Sprachversionen Sie in den darunterliegenden Inhalt geschrieben haben.

Die eine Ausnahme: Wenn Ihr Administrator **Titel als HTML speichern** (`save_titles_as_html`, ebenfalls unter **Administration > Konfigurationseinstellungen > Editor**) für das konkrete Titelfeld aktiviert hat, mit dem Sie arbeiten, wird dieses Feld ebenfalls zu einem echten HTML-Feld, und dieselbe oben beschriebene **Lang-ISO**-Technik kann darauf angewendet werden. Das ist unüblich und wird vor allem für Testfragen genutzt — die meisten Titel auf der Plattform bleiben einfacher Text.

## Tipps

* **Die Ausgangssprache zuerst belassen** — setzen Sie die häufigste Sprache Ihrer Plattform zuerst in das Feld; das ist der natürlichste Fallback, falls Sie später vergessen, eine seltenere Sprache zu markieren.
* **Sprachblöcke nicht verschachteln** — schreiben Sie jede Version als eigenen, aufeinanderfolgenden Block; das Einschließen einer Version in eine andere wird nicht unterstützt, und der Editor löst verschachtelte Markierungen aktiv auf, wenn Sie eine neue einfügen.
* **Ein Abschnitt, der in einer Sprache leer wirkt**, bedeutet in der Regel, dass nie ein Block dafür (oder für den erweiterten Kurs-/Plattform-Standard-Fallback) markiert wurde — prüfen Sie in der Quellcode-Ansicht, welche Sprachen tatsächlich vorhanden sind.