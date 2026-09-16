# Notenbuch (Bewertungen) – Einstellungen

Standardwerte, die für das Werkzeug **Notenbuch (Bewertungen)** gelten — Anzeige der Punktzahl, Dezimalgenauigkeit, Schwellenwerte für Zertifikate und Aggregation.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Notenbuch (Bewertungen)**. Diese Kategorie enthält **34 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_gradebook_comments`

**Notenbuch-Kommentare**

Notenbuch-Kommentare aktivieren, damit Lehrende einen Kommentar zur Gesamtleistung des Lernenden in diesem Kurs hinzufügen können. Der Kommentar erscheint im PDF-Export für den Lernenden.

*Standard: `false`*


### `allow_gradebook_stats`

**Ergebnisse im Notenbuch zwischenspeichern**

Einige der umfangreichen Durchschnittsberechnungen in zwischengespeicherten Feldern für die Links und Bewertungen ablegen, um die Geschwindigkeit (erheblich) zu erhöhen. Der mögliche Nachteil ist, dass das Aktualisieren der Ergebnistabellen des Notenbuchs einige Zeit in Anspruch nehmen kann.

*Standard: `false`*

### `gradebook_badge_sidebar`

**Seitenleiste für Notenbuch-Abzeichen**

Einen Block im Seitenmenü erzeugen, in dem einige Abzeichen als ausstehende Freigabe angezeigt werden können. Erfordert, dass Notenbücher hier anhand ihrer (numerischen) ID aufgeführt werden.

### `gradebook_default_grade_model_id`

**Standard-Notenmodell**

Dieser Wert wird beim Anlegen eines Kurses standardmäßig ausgewählt

### `gradebook_default_weight`

**Standardgewichtung im Notenbuch**

Diese Gewichtung wird in allen Kursen standardmäßig verwendet

*Standard: `100`*

### `gradebook_dependency`

**Abhängigkeiten zwischen Notenbüchern**

Aktiviert einen Mechanismus für Notenbuch-Abhängigkeiten, der anzeigt, welche anderen Elemente zuerst durchlaufen werden müssen, um das Notenbuch abzuschließen.

*Standard: `false`*


### `gradebook_dependency_mandatory_courses`

**Pflichtkurse für Notenbuch-Abhängigkeiten**

Bei Verwendung von Abhängigkeiten zwischen Notenbüchern können Sie eine Liste von Pflichtkursen festlegen, die erforderlich sind, bevor ein Notenbuch mit Abhängigkeiten freigegeben wird.

### `gradebook_detailed_admin_view`

**Zusätzliche Spalten im Notenbuch anzeigen**

Zusätzliche Spalten in der Lernendenansicht des Notenbuchs anzeigen mit der besten Punktzahl aller Lernenden, der relativen Position des Lernenden, der den Bericht betrachtet, und der Durchschnittspunktzahl der gesamten Lernendengruppe.

*Standard: `false`*


### `gradebook_display_extra_stats`

**Zusätzliche Statistiken im Notenbuch**

Zusätzliche Spalten zum Hauptbericht des Notenbuchs hinzufügen (1 = Rangfolge, 2 = beste Punktzahl, 3 = Durchschnitt).

### `gradebook_enable`

**Aktivierung des Bewertungswerkzeugs**

Das Bewertungswerkzeug ermöglicht es Ihnen, Kompetenzen in Ihrer Organisation zu bewerten, indem Sie Präsenz- und Online-Aktivitäten in Leistungsberichte zusammenführen. Möchten Sie es aktivieren?

*Standard: `true`*


### `gradebook_enable_grade_model`

**Notenbuch-Modell aktivieren**

Aktiviert die automatische Erstellung von Notenbuch-Kategorien innerhalb eines Kurses abhängig von den Notenbuch-Modellen.

*Standard: `false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**Kompetenzen nach Unterkategorie des Notenbuchs aktivieren**

Kompetenzen werden normalerweise für den Abschluss eines gesamten Notenbuchs vergeben. Durch Aktivieren dieser Option können Kompetenzen Unterabschnitten von Notenbüchern zugeordnet werden.

*Standard: `false`*


### `gradebook_flatview_extrafields_columns`

**Zusätzliche Benutzerfelder in der Flachansicht des Notenbuchs**

Die angegebenen Spalten (Array „variables“) zur Hauptergebnistabelle im Notenbuch hinzufügen.

### `gradebook_hide_graph`

**Notenbuch-Diagramme ausblenden**

Wenn Ihr Portal ressourcenbeschränkt ist, ist die Reduzierung der Erzeugung dynamischer Notenbuch-Diagramme mit potenziell Tausenden von Ergebnissen eine gute Option.

*Standard: `false`*


### `gradebook_hide_link_to_item_for_student`

**Element-Links für Lernende im Notenbuch ausblenden**

Verhindern, dass Lernende auf Elemente im Notenbuch klicken, indem die Links auf den Elementen entfernt werden.

*Standard: `false`*


### `gradebook_hide_pdf_report_button`

**Schaltfläche „PDF-Bericht herunterladen“ im Notenbuch ausblenden**

Entfernt die Schaltfläche für den PDF-Export aus den Notenbuch-Ansichten für Lernende.

*Standard: `false`*


### `gradebook_hide_table`

**Notenbuch-Tabelle für Lernende ausblenden**

Die Ladezeit des Notenbuchs reduzieren, indem die Ergebnistabelle ausgeblendet wird (Zugang zu Zertifikaten, Kompetenzen usw. bleibt jedoch erhalten).

*Standard: `false`*

### `gradebook_locking_enabled`

**Sperren von Bewertungen durch Lehrende aktivieren**

Sobald aktiviert, ermöglicht diese Option das Sperren beliebiger Bewertungen durch die Lehrenden des entsprechenden Kurses. Dadurch wird jede Änderung der Ergebnisse durch den Lehrenden innerhalb der in der Bewertung verwendeten Ressourcen verhindert: Prüfungen, Lernpfade, Aufgaben usw. Die einzige Rolle, die berechtigt ist, eine gesperrte Bewertung zu entsperren, ist der Administrator. Der Lehrende wird über diese Möglichkeit informiert. Das Sperren und Entsperren von Notenbüchern wird im Systembericht wichtiger Aktivitäten protokolliert

*Standard: `false`*

### `gradebook_multiple_evaluation_attempts`

**Mehrere Bewertungsversuche im Notenbuch zulassen**

Ermöglicht das Hinzufügen von Kommentaren zu mehreren Bewertungsversuchen im Notenbuch und in Ergebnistabellen.

*Standard: `false`*


### `gradebook_number_decimals`

**Anzahl der Dezimalstellen**

Ermöglicht die Festlegung der Anzahl der in einer Punktzahl zulässigen Dezimalstellen

*Standard: `0`*

### `gradebook_pdf_export_settings`

**PDF-Exportoptionen für das Notenbuch**

Ändert den PDF-Export für Lernende anhand der angegebenen Einstellungen ('hide_score_weight', 'hide_feedback_textarea', ...)

### `gradebook_report_score_style`

**Punktzahldarstellung in Notenbuchberichten**

Fügt in der Flachansicht eine Konfiguration für den Punktzahlstil des Notenbuchs hinzu. Siehe api.lib.php, um die Optionen zu finden: Beispiele SCORE_DIV = 1, SCORE_PERCENT = 2 usw.

*Standard: `1`*


### `gradebook_score_display_colorsplit`

**Schwellenwert**

Der Schwellenwert (in %), unterhalb dessen Punktzahlen rot eingefärbt werden

*Standard: `50`*


### `gradebook_score_display_custom`

**Beschriftung der Kompetenzstufen**

Aktivieren Sie das Kontrollkästchen, um die Beschriftung der Kompetenzstufen zu aktivieren

*Standard: `false`*


### `gradebook_score_display_custom_standalone`

**Benutzerdefinierte Punktzahlanzeige in der eigenständigen Spalte des Notenbuchs**

Zeigt benutzerdefinierte Kompetenzstufenwerte in einer separaten Spalte der Flachansicht des Notenbuchs an, wenn die benutzerdefinierte Punktzahlanzeige verwendet wird.

*Standard: `false`*


### `gradebook_score_display_upperlimit`

**Obere Punktzahlgrenze anzeigen**

Aktivieren Sie das Kontrollkästchen, um die obere Grenze der Punktzahl anzuzeigen

*Standard: `false`*


### `gradebook_use_apcu_cache`

**APCu-Caching zur Beschleunigung des Notenbuchs verwenden**

Verbessert die Geschwindigkeit beim Rendern von Notenbuch-Studierendenberichten mithilfe des Doctrine-APCU-Caches. APCu ist eine optionale, aber empfohlene PHP-Erweiterung.

*Standard: `true`*


### `gradebook_use_exercise_score_settings_in_categories`

**Testeinstellungen für die Notenanzeige verwenden**

Wendet die Anzeigeeinstellungen für Übungspunktzahlen (Prozent vs. Punkte) auf Kategorienpunktzahlen im Notenbuch an.

*Standard: `true`*


### `gradebook_use_exercise_score_settings_in_total`

**Globale Punktzahlanzeigeeinstellung im Notenbuch verwenden**

Wendet globale Anzeigeeinstellungen für Übungspunktzahlen auf die Berechnung der Gesamtpunktzahl im Notenbuch an.

*Standard: `false`*


### `hide_gradebook_percentage_user_result`

**Prozentangabe in den besten/durchschnittlichen Notenbuchergebnissen ausblenden**

Entfernt die Prozentanzeige aus den Lernenden im Notenbuch angezeigten besten/durchschnittlichen Punktzahlergebnissen.

*Standard: `true`*


### `my_display_coloring`

**Farben für Punktzahlen im Notenbuch anzeigen**

Aktiviert eine Farbcodierung für bessere Sichtbarkeit der Punktzahlen im Notenbuch.

*Standard: `false`*


### `student_publication_to_take_in_gradebook`

**Für das Notenbuch berücksichtigte Aufgabe**

Im Aufgabenwerkzeug können Studierende mehr als eine Datei hochladen. Falls es für eine einzelne Aufgabe mehr als eine Datei gibt, welche soll bei der Rangfolge im Notenbuch berücksichtigt werden? Dies hängt von Ihrer Methodik ab. Verwenden Sie 'first', um den Schwerpunkt auf Sorgfalt zu legen (wie rechtzeitige Abgabe und zuerst die richtige Arbeit). Verwenden Sie 'last', um kollaborative und anpassungsfähige Arbeit hervorzuheben.

*Standard: `first`*


### `teachers_can_change_grade_model_settings`

**Lehrende können die Einstellungen des Notenbuchmodells ändern**

Beim Bearbeiten eines Notenbuchs

*Standard: `true`*


### `teachers_can_change_score_settings`

**Lehrende können die Punktzahleinstellungen des Notenbuchs ändern**

Beim Bearbeiten der Notenbuch-Einstellungen

*Standard: `true`*