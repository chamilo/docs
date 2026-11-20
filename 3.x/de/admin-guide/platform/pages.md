# Seiten

Pages ist Chamilo’s integriertes, CMS-ähnliches Werkzeug für die Inhaltsblöcke, aus denen die öffentlich sichtbaren Bereiche Ihres Portals bestehen — die Startseite, die Fußzeile, Navigationsmenüs und vergleichbare Platzierungen — ohne dass eine Vorlagendatei bearbeitet werden muss.

## Auf Pages zugreifen

Klicken Sie im Administrationsbereich auf **Platform > Pages**.

## Funktionsweise von Pages

Jede Seite hat:

* **Titel** und formatierten **Inhalt**
* einen **Slug**, der automatisch aus dem Titel erzeugt wird
* **Aktiviert** — ob die Seite derzeit sichtbar ist
* **Position** — Reihenfolge per Drag-and-drop innerhalb ihrer Kategorie
* **Locale** — der Inhalt ist sprachspezifisch: dieselbe Platzierung kann eine Seite pro Sprache enthalten, und die Website fällt auf die Standardsprache der Plattform zurück, wenn für die Sprache eines Besuchers keine Seite vorhanden ist
* eine **Kategorie** — sie bestimmt, *wo* die Seite dargestellt wird (zum Beispiel `index`, `home`, `footer_public` oder `menu_links`); Chamilo legt die benötigten Kategorien automatisch an

Bei einer Installation mit mehreren URLs (Multi-Portal) sind Seiten außerdem pro Zugriffs-URL abgegrenzt, sodass jedes Portal seine eigenen Inhalte verwaltet.

## Wo jede Kategorie erscheint

Das Formular zum Erstellen und Bearbeiten von Seiten endet mit zwei Diagrammen, die zeigen, wo die Seiten jeder Kategorie angezeigt werden. Nutzen Sie sie, um die richtige **Kategorie** auszuwählen, bevor Sie den Inhalt verfassen.

![Das Formular zur Seitenbearbeitung mit den Feldern Titel, benutzerfreundliche URL, aktiviert, Kategorie, Sprache und Inhalt, gefolgt von zwei Diagrammen der Anmeldeseite und der Oberfläche angemeldeter Benutzer, deren blaue Bereiche mit den Seitenkategorien index, faq, demo, footer_public, home, menu_links und footer_private beschriftet sind](../../.gitbook/assets/admin-pages-form.png)

* **Anmeldeseite (Besucher, die nicht angemeldet sind)** — die Seiten der Kategorie `index` füllen den Hauptbereich neben dem Anmeldeformular, und die Seiten der Kategorie `footer_public` werden in der Fußzeile angezeigt. Die Kategorien `index`, `faq` und `demo` erscheinen außerdem als Einträge in der oberen Leiste.
* **Oberfläche angemeldeter Benutzer** — die Seiten der Kategorie `home` füllen den Hauptbereich der Startseite. Die Seiten der Kategorie `menu_links` werden im Seitenmenü aufgeführt, und die Seiten der Kategorie `footer_private` werden in der Fußzeile angezeigt.

Die hervorgehobenen blauen Bereiche sind die Stellen, die eine Seite einnehmen kann; die grauen Blöcke gehören zu Chamilo’s eigener Oberfläche, die Seiten nicht ersetzen.

## Kategorien für Menülinks

Zwei Kategorien wandeln ihre aktivierten Seiten in eine Linkliste um (jeder Link zeigt den Seitentitel und öffnet die Seite), anstatt ihren Inhalt an Ort und Stelle darzustellen:

* **`menu_links`** — Links, die allen angezeigt werden: unter dem Anmeldeformular für anonyme Besucher und unten in der linken Seitenleiste für angemeldete Benutzer. Verwenden Sie sie für Inhalte, die jeder Benutzer benötigen kann, etwa rechtliche Hinweise oder Nutzungsbedingungen.
* **`menu_public_links`** — Links, die **nur anonymen Besuchern** angezeigt werden, unter dem Anmeldeformular auf der Startseite und auf der Anmeldeseite. Sie verschwinden, sobald sich der Benutzer anmeldet. Verwenden Sie sie für Inhalte, die sich an potenzielle Benutzer richten, etwa eine Vorstellung der Plattform oder Hinweise zur Beantragung eines Kontos.

Wenn beide Kategorien Seiten enthalten, werden die Links von `menu_links` zuerst aufgeführt.

## Die Einführungsseite zur Registrierung

**Platform > Setting the registration page** ist eine Verknüpfung in dasselbe Pages-System für eine bestimmte Platzierung: den Einführungstext, der über dem öffentlichen Registrierungsformular angezeigt wird. Sie ist Portal-Administratoren vorbehalten. Ein Klick darauf bewirkt eines von beiden:

* Die vorhandene Einführungsseite wird zur Bearbeitung geöffnet, sofern für Ihre Zugriffs-URL und Sprache bereits eine existiert, oder
* Die Platzierung wird spontan angelegt und Sie gelangen direkt zur Erstellung ihres Inhalts

Alles, was Sie hier speichern, wird als Infobox unmittelbar über dem Registrierungsformular dargestellt — ein naheliegender Ort für Anweisungen, organisationsspezifische Bedingungen oder Kontext, den potenzielle Benutzer vor der Registrierung lesen sollten. Lassen Sie sie deaktiviert (oder legen Sie sie nie an), um das einfache Registrierungsformular ohne Einführungstext anzuzeigen.

## Eine Seite in allen Sprachen veröffentlichen

Wählen Sie in der Sprachauswahl des Seiteneditors **Alle Sprachen**, wenn dieselbe Seite unabhängig von der Oberflächensprache des Besuchers sichtbar sein soll. Verwenden Sie stattdessen eine bestimmte Sprache für lokalisierte Inhalte. Vorhandene sprachspezifische Seiten und das Fallback-Verhalten der Locale bleiben erhalten; diese Funktion übersetzt eine Seite nicht automatisch.

Siehe [all-languages pages PR #9398](https://github.com/chamilo/chamilo-lms/pull/9398).

## Mehrere Seiten oder zugehörige Sprachversionen löschen

Die Pages-Liste unterstützt die Auswahl mehrerer Einträge und die Option **Ausgewählte Seiten löschen**. Prüfen Sie die Bestätigungsliste sorgfältig, bevor Sie sie löschen. Beim Löschen einer einzelnen Seite kann Chamilo außerdem Kandidatenseiten in anderen Sprachen anzeigen, sodass Sie zugehörige Versionen ausdrücklich zum Entfernen auswählen können.

Seiten in verschiedenen Sprachen sind **nicht automatisch verknüpft**. Wählen Sie eine ähnlich benannte Seite nur aus, wenn Sie geprüft haben, dass es sich um die richtige Übersetzung oder Entsprechung handelt. Löschungen sind endgültig; prüfen Sie daher die Auswahl und bewahren Sie zuvor eine Kopie wichtiger CMS-Inhalte auf. Siehe [bulk and multilingual page deletion PR #9331](https://github.com/chamilo/chamilo-lms/pull/9331).