# Einstellungen für Aufgaben (Work)

Standardwerte und Verhalten des Werkzeugs **Aufgaben (Studentenveröffentlichungen)**.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Aufgaben (Work)**. Diese Kategorie enthält **12 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_compilatio_tool`

**Compilatio aktivieren**

Compilatio ist ein Anti-Betrugs-Dienst, der Texte zweier Einreichungen vergleicht und meldet, wenn eine hohe Wahrscheinlichkeit besteht, dass der Inhalt (in der Regel Aufgaben) nicht originär ist.

*Standard: `false`*

### `allow_my_student_publication_page`

**Seite „Meine Aufgaben“ aktivieren**

[inferred] Eine eigene Seite aktivieren, auf der Lernende ihre eigenen eingereichten Aufgaben einsehen und verwalten können.

*Standard: `false`*

### `allow_only_one_student_publication_per_user`

**Studierende können nur eine Aufgabe hochladen**

[inferred] Lernende darauf beschränken, nur eine Aufgabe pro Aktivität einzureichen, und so Mehrfacheinreichungen verhindern.

*Standard: `false`*

### `allow_redirect_to_main_page_after_work_upload`

**Nach dem Hochladen oder Kommentieren zur Startseite des Aufgaben-Werkzeugs weiterleiten**

Nach dem Hochladen einer Aufgabe oder dem Hinzufügen eines Kommentars zur Aufgabenliste weiterleiten

*Standard: `false`*

### `assignment_prevent_duplicate_upload`

**Doppelte Uploads in Aufgaben verhindern**

[inferred] Lernende daran hindern, identische Dateien für dieselbe Aufgabeneinreichung hochzuladen.

*Standard: `false`*

### `block_student_publication_add_documents`

**Hinzufügen von Dokumenten zu Aufgaben verhindern**

[inferred] Lernende daran hindern, beim Einreichen von Aufgaben Dokumente hinzuzufügen oder anzuhängen.

*Standard: `false`*

### `block_student_publication_edition`

**Bearbeitung von Aufgaben verhindern**

[inferred] Lernende daran hindern, ihre eingereichten Aufgaben nach der ersten Einreichung zu ändern oder zu aktualisieren.

*Standard: `false`*

### `block_student_publication_score_edition`

**Lehrende daran hindern, Aufgabenbewertungen zu ändern**

[inferred] Lehrende daran hindern, Aufgabenbewertungen zu ändern, nachdem sie erfasst wurden.

*Standard: `false`*

### `compilatio_tool`

**Compilatio-Einstellungen**

Konfigurieren Sie hier die Verbindungsdaten für Compilatio.

### `considered_working_time`

**Zeitaufwand für Aufgaben aktivieren**

Damit können Lehrende einen geschätzten Zeitaufwand (im Format hh:mm:ss) zur Bearbeitung der Aufgabe angeben. Nach Einreichung der Aufgabe und Freigabe durch die Lehrperson (die Aufgabe erhält eine Bewertung) wird dem Lernenden automatisch die entsprechende Zeit zugewiesen.

*Standard: `work_time`*

### `force_download_doc_before_upload_work`

**Download des Dokuments vor dem Hochladen der Aufgabe erzwingen**

Benutzer zwingen, das in der Aufgabendefinition bereitgestellte Dokument herunterzuladen, bevor sie ihre Aufgabe hochladen können.

*Standard: `true`*

### `my_courses_show_pending_work`

**Link zu „ausstehenden“ Aufgaben auf der Seite „Meine Kurse“ anzeigen**

[inferred] Einen Link oder eine Anzahl ausstehender Aufgaben auf der Seite „Meine Kurse“ des Lernenden für den schnellen Zugriff anzeigen.

*Standard: `false`*