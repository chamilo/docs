# Seiten

Seiten ist Chamilos integriertes, CMS-ähnliches Werkzeug für die Inhaltsblöcke, aus denen die öffentlich sichtbaren Bereiche Ihres Portals bestehen — die Startseite, die Fußzeile, Navigationsmenüs und vergleichbare Platzierungen — ohne dass Sie eine Vorlagendatei anfassen müssen.

## Zugriff auf Seiten

Klicken Sie im Administrationsbereich auf **Plattform > Seiten**.

## Funktionsweise von Seiten

Jede Seite verfügt über:

* **Titel** und Rich-Text-**Inhalt**
* Einen **Slug**, der automatisch aus dem Titel erzeugt wird
* **Aktiviert** — ob die Seite derzeit sichtbar ist
* **Position** — per Drag-and-Drop festgelegte Reihenfolge innerhalb ihrer Kategorie
* **Locale** — Inhalte sind sprachabhängig: dieselbe Platzierung kann eine Seite pro Sprache enthalten, und die Website fällt auf die Standardsprache der Plattform zurück, wenn für die Sprache eines Besuchers keine Seite existiert
* Eine **Kategorie** — diese bestimmt, *wo* die Seite gerendert wird (zum Beispiel `index`, `home`, `footer_public` oder `menu_links`); Chamilo legt die benötigten Kategorien automatisch an

Bei einer Installation mit mehreren URLs (mehreren Portalen) sind Seiten außerdem pro Zugriffs-URL abgegrenzt, sodass jedes Portal seine eigenen Inhalte verwaltet.

## Die Registrierungs-Einführungsseite

**Plattform > Registrierungsseite festlegen** ist eine Verknüpfung in dasselbe Seiten-System für eine bestimmte Platzierung: den Einführungstext, der oberhalb des öffentlichen Anmeldeformulars angezeigt wird. Der Zugriff ist auf Portal-Administratoren beschränkt. Ein Klick darauf:

* öffnet die vorhandene Einführungsseite zur Bearbeitung, falls für Ihre Zugriffs-URL und Sprache bereits eine existiert, oder
* legt die Platzierung unmittelbar an und führt Sie direkt zur Erstellung des Inhalts

Was Sie hier speichern, wird als Infobox direkt oberhalb des Registrierungsformulars gerendert — ein natürlicher Ort für Anweisungen, organisationsspezifische Bedingungen oder Kontext, den Interessenten vor der Anmeldung lesen sollten. Lassen Sie sie deaktiviert (oder legen Sie sie nie an), um das schlichte Registrierungsformular ohne Einführungstext anzuzeigen.