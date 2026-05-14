# Notenbuch (Bewertungen) Einstellungen

Standardwerte, die für das **Notenbuch (Bewertungen)**-Tool gelten — Anzeige von Punktzahlen, Dezimalgenauigkeit, Schwellwerte für Zertifikate und Aggregation.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Notenbuch (Bewertungen)** zu. Diese Kategorie enthält **34 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_gradebook_comments`

**Notenbuch-Kommentare**

Aktivieren Sie Notenbuch-Kommentare, damit Lehrkräfte einen Kommentar zur Gesamtleistung des Lernenden in diesem Kurs hinzufügen können. Der Kommentar wird im PDF-Export für den Lernenden angezeigt.

*Standard: `false`*

### `allow_gradebook_stats`

**Ergebnisse im Notenbuch zwischenspeichern**

Speichern Sie einige der umfangreichen Berechnungen von Durchschnittswerten in zwischengespeicherten Feldern für die Links und Bewertungen, um die Geschwindigkeit (erheblich) zu erhöhen. Der potenzielle Nachteil ist, dass es einige Zeit dauern kann, die Ergebnistabellen des Notenbuchs zu aktualisieren.

*Standard: `false`*

### `gradebook_badge_sidebar`

**Notenbuch-Abzeichen-Seitenleiste**

Erzeugen Sie einen Block im Seitenmenü, in dem einige Abzeichen als zur Genehmigung ausstehend angezeigt werden können. Erfordert, dass Notenbücher hier nach (numerischer) ID aufgelistet werden.

### `gradebook_default_grade_model_id`

**Standard-Bewertungsmodell**

Dieser Wert wird standardmäßig ausgewählt, wenn ein Kurs erstellt wird.

### `gradebook_default_weight`

**Standardgewicht im Notenbuch**

Dieses Gewicht wird standardmäßig in allen Kursen verwendet.

*Standard: `100`*

### `gradebook_dependency`

**Abhängigkeiten zwischen Notenbüchern**

Aktiviert einen Mechanismus für Notenbuch-Abhängigkeiten, der den Nutzern mitteilt, welche anderen Elemente sie zuerst durchlaufen müssen, um das Notenbuch abzuschließen.

*Standard: `false`*

### `gradebook_dependency_mandatory_courses`

**Pflichtkurse für Notenbuch-Abhängigkeiten**

Bei der Verwendung von Abhängigkeiten zwischen Notenbüchern können Sie eine Liste von Pflichtkursen auswählen, die erforderlich sind, bevor ein Notenbuch mit Abhängigkeiten genehmigt wird.

### `gradebook_detailed_admin_view`

**Zusätzliche Spalten im Notenbuch anzeigen**

Zeigen Sie zusätzliche Spalten in der Schüleransicht des Notenbuchs mit der besten Punktzahl aller Schüler, der relativen Position des betrachtenden Schülers und der durchschnittlichen Punktzahl der gesamten Schülergruppe an.

*Standard: `false`*

### `gradebook_display_extra_stats`

**Zusätzliche Statistiken im Notenbuch**

Fügen Sie dem Hauptbericht des Notenbuchs zusätzliche Spalten hinzu (1 = Rangfolge, 2 = beste Punktzahl, 3 = Durchschnitt).

### `gradebook_enable`

**Aktivierung des Bewertungstools**

Das Bewertungstool ermöglicht es Ihnen, Kompetenzen in Ihrer Organisation zu bewerten, indem es Bewertungen von Präsenz- und Online-Aktivitäten in Leistungsberichten zusammenführt. Möchten Sie es aktivieren?

*Standard: `true`*

### `gradebook_enable_grade_model`

**Notenbuch-Modell aktivieren**

Ermöglicht die automatische Erstellung von Notenbuch-Kategorien innerhalb eines Kurses abhängig von den Notenbuch-Modellen.

*Standard: `false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**Fähigkeiten nach Unterkategorie des Notenbuchs aktivieren**

Fähigkeiten werden normalerweise für das Abschließen eines gesamten Notenbuchs vergeben. Durch Aktivieren dieser Option können Fähigkeiten auch Unterabschnitten von Notenbüchern zugeordnet werden.

*Standard: `false`*

### `gradebook_flatview_extrafields_columns`

**Zusätzliche Benutzerfelder in der flachen Ansicht des Notenbuchs**

Fügen Sie die angegebenen Spalten (Array 'variables') zur Hauptergebnistabelle im Notenbuch hinzu.

### `gradebook_hide_graph`

**Notenbuch-Diagramme ausblenden**

Wenn Ihr Portal ressourcenbeschränkt ist, ist das Reduzieren der Generierung dynamischer Notenbuch-Diagramme mit potenziell Tausenden von Ergebnissen eine gute Option.

*Standard: `false`*

### `gradebook_hide_link_to_item_for_student`

**Links zu Elementen im Notenbuch für Lernende ausblenden**

Verhindern Sie, dass Lernende auf Elemente im Notenbuch klicken, indem Sie die Links zu den Elementen entfernen.

*Standard: `false`*

### `gradebook_hide_pdf_report_button`

**Schaltfläche 'PDF-Bericht herunterladen' im Notenbuch ausblenden**

Entfernt die PDF-Export-Schaltfläche aus den Notenbuch-Ansichten für Lernende.

*Standard: `false`*

### `gradebook_hide_table`

**Notenbuch-Tabelle für Lernende ausblenden**

Verkürzen Sie die Ladezeit des Notenbuchs, indem Sie die Ergebnistabelle ausblenden (aber dennoch Zugriff auf Zertifikate, Fähigkeiten usw. gewähren).

*Standard: `false`*

---
### `gradebook_locking_enabled`

**Sperrung von Bewertungen durch Lehrkräfte aktivieren**

Sobald diese Option aktiviert ist, können Lehrkräfte die Bewertung eines Kurses sperren. Dies verhindert jegliche Änderung der Ergebnisse durch die Lehrkraft innerhalb der für die Bewertung verwendeten Ressourcen: Prüfungen, Lernpfade, Aufgaben usw. Die einzige Rolle, die berechtigt ist, eine gesperrte Bewertung wieder freizugeben, ist der Administrator. Die Lehrkraft wird über diese Möglichkeit informiert. Das Sperren und Entsperren von Notenbüchern wird im Bericht über wichtige Aktivitäten des Systems registriert.

*Standard: `false`*

### `gradebook_multiple_evaluation_attempts`

**Mehrere Bewertungsversuche im Notenbuch erlauben**

Ermöglicht das Hinzufügen von Kommentaren zu mehreren Bewertungsversuchen im Notenbuch und in den Ergebnistabellen.

*Standard: `false`*

### `gradebook_number_decimals`

**Anzahl der Dezimalstellen**

Ermöglicht die Festlegung der Anzahl der erlaubten Dezimalstellen in einer Punktzahl.

*Standard: `0`*

### `gradebook_pdf_export_settings`

**Optionen für den PDF-Export des Notenbuchs**

Ändert den PDF-Export für Lernende basierend auf den bereitgestellten Einstellungen ('hide_score_weight', 'hide_feedback_textarea', ...).

### `gradebook_report_score_style`

**Stil der Punktzahlen in Notenbuchberichten**

Fügt eine Konfiguration für den Stil der Punktzahlen im Notenbuch in der flachen Ansicht hinzu. Die Optionen finden Sie in api.lib.php: Beispiele SCORE_DIV = 1, SCORE_PERCENT = 2, usw.

*Standard: `1`*

### `gradebook_score_display_colorsplit`

**Schwellenwert**

Der Schwellenwert (in %), unter dem Punktzahlen rot eingefärbt werden.

*Standard: `50`*

### `gradebook_score_display_custom`

**Kompetenzstufen-Beschriftung**

Aktivieren Sie das Kontrollkästchen, um die Beschriftung von Kompetenzstufen zu ermöglichen.

*Standard: `false`*

### `gradebook_score_display_custom_standalone`

**Benutzerdefinierte Anzeige der Punktzahlen in einer separaten Spalte des Notenbuchs**

Zeigt benutzerdefinierte Kompetenzstufenwerte in einer separaten Spalte in der flachen Ansicht des Notenbuchs an, wenn die benutzerdefinierte Anzeige der Punktzahlen verwendet wird.

*Standard: `false`*

### `gradebook_score_display_upperlimit`

**Anzeige der oberen Punktgrenze**

Aktivieren Sie das Kontrollkästchen, um die obere Grenze der Punktzahl anzuzeigen.

*Standard: `false`*

### `gradebook_use_apcu_cache`

**APCu-Caching verwenden, um das Notenbuch zu beschleunigen**

Verbessert die Geschwindigkeit beim Rendern von Notenbuchberichten für Studierende durch die Verwendung des Doctrine APCU-Cache. APCu ist eine optionale, aber empfohlene PHP-Erweiterung.

*Standard: `true`*

### `gradebook_use_exercise_score_settings_in_categories`

**Testeinstellungen für die Anzeige von Noten verwenden**

Wendet die Einstellungen zur Anzeige der Punktzahlen von Übungen (Prozentsatz vs. Punkte) auf Kategorienoten im Notenbuch an.

*Standard: `true`*

### `gradebook_use_exercise_score_settings_in_total`

**Globale Einstellung zur Anzeige von Punktzahlen im Notenbuch verwenden**

Wendet globale Einstellungen zur Anzeige von Übungspunktzahlen auf die Gesamtpunktzahlberechnungen im Notenbuch an.

*Standard: `false`*

### `hide_gradebook_percentage_user_result`

**Prozentsatz in den besten/durchschnittlichen Notenbuchergebnissen ausblenden**

Entfernt die Prozentsatzanzeige aus den besten/durchschnittlichen Punktzahlenergebnissen, die Lernenden im Notenbuch angezeigt werden.

*Standard: `true`*

### `my_display_coloring`

**Farbanzeige für Punktzahlen im Notenbuch**

Aktiviert die Farbkodierung für eine bessere Sichtbarkeit der Punktzahlen im Notenbuch.

*Standard: `false`*

### `student_publication_to_take_in_gradebook`

**Für das Notenbuch berücksichtigte Aufgabe**

Im Aufgaben-Tool können Studierende mehr als eine Datei hochladen. Falls es für eine einzelne Aufgabe mehr als eine Datei gibt, welche soll bei der Bewertung im Notenbuch berücksichtigt werden? Dies hängt von Ihrer Methodik ab. Verwenden Sie 'first', um den Fokus auf Detailgenauigkeit zu legen (z. B. rechtzeitige Abgabe und zuerst die richtige Arbeit erledigen). Verwenden Sie 'last', um kollaboratives und anpassungsfähiges Arbeiten hervorzuheben.

*Standard: `first`*

### `teachers_can_change_grade_model_settings`

**Lehrkräfte können die Einstellungen des Notenbuchmodells ändern**

Beim Bearbeiten eines Notenbuchs.

*Standard: `true`*

### `teachers_can_change_score_settings`

**Lehrkräfte können die Punktzahleinstellungen des Notenbuchs ändern**

Beim Bearbeiten der Notenbucheinstellungen.

*Standard: `true`*