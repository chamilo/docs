# Foren-Einstellungen

Verhalten des Kurswerkzeugs **Foren**.

Diese Einstellungen erreichen Sie unter **Administration > Konfigurationseinstellungen > Foren**. Diese Kategorie enthält **16 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Festbreitenschrift angezeigt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_forum_category_language_filter`

**Sprachfilter für Forenkategorien**

Fügen Sie der Forenansicht einen Sprachfilter hinzu, um nur Kategorien anzuzeigen, die in einer bestimmten Sprache konfiguriert sind. Erfordert die Verwendung des Zusatzfelds „language“ für die Entität „forum_category“.

*Standard: `false`*

### `allow_forum_post_revisions`

**Überprüfung von Forenbeiträgen**

Aktivieren Sie diese Option, um die Anforderung einer Überprüfung oder einer Übersetzung des eigenen Beitrags in einem Forum zu ermöglichen. Bei umfangreicher Konfiguration kann sie zur Zusammenarbeit mit anderen Benutzern in einem Forum zum Sprachenlernen verwendet werden.

*Standard: `false`*

### `community_managers_user_list`

**Liste der Community-Manager**

Geben Sie ein Array von Benutzer-IDs an, die im speziellen Kurs, der als globales Forum festgelegt ist, als Community-Manager gelten. Community-Manager verfügen im globalen Forum über zusätzliche Berechtigungen.

### `default_forum_view`

**Standard-Forenansicht**

Welche Option beim Erstellen eines neuen Forums standardmäßig gelten soll. Jede Lehrkraft kann jedoch für jedes einzelne Forum eine andere Ansicht wählen.

*Standard: `flat`*

### `display_groups_forum_in_general_tool`

**Gruppenforen im allgemeinen Forum anzeigen**

Gruppenforen im Forenwerkzeug auf Kursebene anzeigen. Diese Option ist standardmäßig aktiviert (in diesem Fall wirken die individuellen Sichtbarkeiten der Gruppenforen weiterhin als zusätzliches Kriterium). Wenn sie deaktiviert ist, sind Gruppenforen nur über das Gruppenwerkzeug sichtbar, unabhängig davon, ob sie öffentlich sind oder nicht.

*Standard: `true`*

### `first_reply_min_words`

**Mindestwortzahl für die erste Forenantwort**

Mindestlänge einer Antwort, wenn der Benutzer noch keinen vorherigen Beitrag im selben Forenthread hat. Eine kürzere Antwort wird mit einer Meldung abgelehnt, die dieses Minimum und die Anzahl der Wörter in der Antwort angibt. Es zählen nur die Wörter des Textes, nicht seine Formatierung. Dies gilt für jeden Benutzer, der auf einen Thread antwortet, nicht jedoch für den Eröffnungsbeitrag eines neuen Threads. Setzen Sie den Wert auf 0, um Antworten beliebiger Länge zuzulassen.

*Standard: `0`*

### `forum_fold_categories`

**Forenkategorien einklappen**

Visueller Effekt zum Ein- und Ausklappen von Forenkategorien.

*Standard: `false`*

### `forum_participation_can_be_modified_in_course`

**Einstellungen zur Forenbeteiligung können pro Kurs geändert werden**

Wenn diese Option aktiviert ist, können Lehrkräfte im Abschnitt Forum der Kurseinstellungen festlegen, ob ihr Kurs Thread-Antworten ausblendet, bis der Lernende einen Beitrag veröffentlicht, ob die Kategoriebeschreibung in Threads angezeigt wird und wie viele Beiträge die Fortschrittsleiste zur Beteiligung erwartet, anstatt den Plattformeinstellungen zu folgen.

*Standard: `false`*

### `global_forums_course_id`

**Kurs als globales Forum verwenden**

Legen Sie die Kurs-ID (numerisch) eines Kurses fest, der als globales Forum verwendet werden soll. Dadurch wird der Link „Soziale Gruppen“ im sozialen Netzwerk durch einen Link zum Forum dieses Kurses ersetzt.

*Standard: `0`*

### `hide_forum_post_revision_language`

**Sprache der Überprüfung von Forenbeiträgen ausblenden**

Die Möglichkeit ausblenden, einer Überprüfung eines Forenbeitrags eine Sprache zuzuweisen.

*Standard: `false`*

### `show_category_description_in_thread`

**Beschreibung der Forenkategorie in Threads anzeigen**

Den Kategorietitel und eine gekürzte Beschreibung über jedem Thread anzeigen, wobei bei einer langen Beschreibung **Weiterlesen** verfügbar ist.

*Standard: `false`*

### `show_thread_replies_after_participation`

**Thread-Antworten erst nach Beteiligung anzeigen**

Für Lernende wird nur der Eröffnungsbeitrag eines Threads zurückgegeben, bis sie selbst einen Beitrag verfassen. Administratoren, Lehrkräfte, Sitzungsbetreuer und Gruppentutoren sehen weiterhin alle Beiträge; Beiträge, die auf Moderation warten, zählen zur Beteiligung.

*Standard: `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Forenbenachrichtigungen auch aus dem Basiskurs**

Aktivieren Sie diese Option, um Benachrichtigungen aus dem Forum des Basiskurses zu ermöglichen, auch wenn der Kurs über eine Sitzung verfolgt wird.

*Standard: `false`*

### `subsequent_reply_min_words`

**Mindestwortzahl für nachfolgende Forenantworten**

Mindestlänge einer Antwort, wenn der Benutzer bereits einen Beitrag im selben Forenthread hat, um beispielsweise eine ausführliche erste Antwort zu verlangen und kürzere Folgeantworten zuzulassen. Eine kürzere Antwort wird mit einer Meldung abgelehnt, die dieses Minimum und die Anzahl der Wörter in der Antwort angibt. Setzen Sie den Wert auf 0, um Antworten beliebiger Länge zuzulassen.

*Standard: `0`*

### `thread_max_posts_for_non_admins`

**Maximale Anzahl der in einem Forenthread angezeigten Beiträge**

Zeigen Sie nur diese Anzahl von Beiträgen jedes Forenthreads jedem Benutzer an, der kein Plattformadministrator ist, einschließlich Lehrkräften, sowie allen Personen innerhalb eines Lernpfads. In der Thread-Ansicht und der verschachtelten Ansicht gilt die Begrenzung für die Antworten auf jeden Beitrag. Die Beiträge bleiben in der Reihenfolge der Ansicht erhalten: die ersten oder, innerhalb eines Lernpfads, die neuesten, wobei die neuesten Beiträge zuerst erscheinen. Setzen Sie den Wert auf 0, um alle Beiträge anzuzeigen. Die Thread-Liste und die Forensuche sind nicht begrenzt.

*Standard: `0`*

### `thread_participation_progress_posts`

**Erforderliche Beiträge zum Abschließen eines Forenthreads**

Anzahl der Beiträge von Lernenden, die erforderlich sind, damit der Fortschrittsbalken 100 % erreicht. Moderierte Beiträge, die auf Freigabe warten, werden mitgezählt. Setzen Sie den Wert auf `0`, um den Balken auszublenden. Dies ist unabhängig von der Anforderung eines einzelnen Beitrags zum Anzeigen anderer Antworten.

*Standard: `0`*