# Einstellungen für Aufgaben (Arbeiten)

Standardwerte und Verhalten des Tools **Aufgaben (Studentenveröffentlichungen)**.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Aufgaben (Arbeiten)** zu. Diese Kategorie enthält **12 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_compilatio_tool`

**Compilatio aktivieren**

Compilatio ist ein Anti-Betrugs-Service, der Texte zwischen zwei Einreichungen vergleicht und meldet, ob eine hohe Wahrscheinlichkeit besteht, dass der Inhalt (normalerweise Aufgaben) nicht authentisch ist.

*Standard: `false`*

### `allow_my_student_publication_page`

**Meine Aufgaben-Seite aktivieren**

[abgeleitet] Aktivieren Sie eine dedizierte Seite für Lernende, um ihre eingereichten Aufgaben anzuzeigen und zu verwalten.

*Standard: `false`*

### `allow_only_one_student_publication_per_user`

**Studenten können nur eine Aufgabe hochladen**

[abgeleitet] Beschränken Sie Lernende darauf, pro Aktivität nur eine Aufgabe einzureichen, um mehrfache Einreichungen zu verhindern.

*Standard: `false`*

### `allow_redirect_to_main_page_after_work_upload`

**Nach Hochladen oder Kommentar zur Startseite des Aufgabentools weiterleiten**

Leiten Sie nach dem Hochladen einer Aufgabe oder dem Hinzufügen eines Kommentars zur Aufgabenliste weiter.

*Standard: `false`*

### `assignment_prevent_duplicate_upload`

**Doppelte Uploads bei Aufgaben verhindern**

[abgeleitet] Verhindern Sie, dass Lernende identische Dateien für dieselbe Aufgabeneinreichung hochladen.

*Standard: `false`*

### `block_student_publication_add_documents`

**Hinzufügen von Dokumenten zu Aufgaben verhindern**

[abgeleitet] Verhindern Sie, dass Lernende beim Einreichen von Aufgaben Dokumente hinzufügen oder anhängen.

*Standard: `false`*

### `block_student_publication_edition`

**Bearbeitung von Aufgaben verhindern**

[abgeleitet] Verhindern Sie, dass Lernende ihre eingereichten Aufgaben nach der ersten Einreichung ändern oder aktualisieren.

*Standard: `false`*

### `block_student_publication_score_edition`

**Lehrer daran hindern, Aufgabenbewertungen zu ändern**

[abgeleitet] Verhindern Sie, dass Lehrkräfte Aufgabenbewertungen ändern, nachdem diese eingetragen wurden.

*Standard: `false`*

### `compilatio_tool`

**Compilatio-Einstellungen**

Konfigurieren Sie hier die Verbindungsinformationen für Compilatio.

### `considered_working_time`

**Zeitaufwand für Aufgaben aktivieren**

Dies ermöglicht es Lehrkräften, einen geschätzten Zeitaufwand (im Format hh:mm:ss) anzugeben, um die Aufgabe zu bearbeiten. Nach Einreichung der Aufgabe und Freigabe durch den Lehrer (die Aufgabe erhält eine Bewertung) wird dem Lernenden automatisch die entsprechende Zeit zugewiesen.

*Standard: `work_time`*

### `force_download_doc_before_upload_work`

**Download des Dokuments vor dem Hochladen der Aufgabe erzwingen**

Zwingen Sie Benutzer, das bereitgestellte Dokument in der Aufgabendefinition herunterzuladen, bevor sie ihre Aufgabe hochladen können.

*Standard: `true`*

### `my_courses_show_pending_work`

**Link zu 'ausstehenden' Aufgaben auf der Seite 'Meine Kurse' anzeigen**

[abgeleitet] Zeigen Sie einen Link oder eine Anzahl ausstehender Aufgaben auf der Seite 'Meine Kurse' des Lernenden für schnellen Zugriff an.

*Standard: `false`*