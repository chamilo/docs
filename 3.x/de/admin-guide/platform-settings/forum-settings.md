# Foren-Einstellungen

Verhalten des Kurswerkzeugs **Foren**.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Foren**. Diese Kategorie enthält **9 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_forum_category_language_filter`

**Sprachenfilter für Forenkategorien**

Fügt der Forenansicht einen Sprachenfilter hinzu, sodass nur Kategorien angezeigt werden, die für eine bestimmte Sprache konfiguriert sind. Erfordert die Verwendung des Extrafelds „language“ an der Entität „forum_category“.

*Standard: `false`*

### `allow_forum_post_revisions`

**Überprüfung von Forenbeiträgen**

Aktivieren Sie diese Option, um die Anforderung einer Überprüfung oder Übersetzung des eigenen Beitrags in einem Forum zu ermöglichen. Bei umfangreicher Konfiguration kann dies zur Zusammenarbeit mit anderen Nutzern in einem Forum zum Sprachenlernen genutzt werden.

*Standard: `false`*

### `community_managers_user_list`

**Liste der Community-Manager**

Geben Sie ein Array von Benutzer-IDs an, die in dem als globales Forum festgelegten Sonderkurs als Community-Manager gelten. Community-Manager verfügen im globalen Forum über zusätzliche Rechte.

### `default_forum_view`

**Standardansicht des Forums**

Welche Option soll beim Anlegen eines neuen Forums standardmäßig gelten. Jeder Trainer kann jedoch für jedes einzelne Forum eine andere Ansicht wählen.

*Standard: `flat`*

### `display_groups_forum_in_general_tool`

**Gruppenforen im allgemeinen Forum anzeigen**

Gruppenforen im Foren-Werkzeug auf Kursebene anzeigen. Diese Option ist standardmäßig aktiviert (in diesem Fall wirken die individuellen Sichtbarkeiten der Gruppenforen weiterhin als zusätzliches Kriterium). Ist sie deaktiviert, sind Gruppenforen nur über das Gruppen-Werkzeug sichtbar, unabhängig davon, ob sie öffentlich sind oder nicht.

*Standard: `true`*

### `forum_fold_categories`

**Forenkategorien einklappen**

Visueller Effekt zum Ein- und Ausklappen von Forenkategorien.

*Standard: `false`*

### `global_forums_course_id`

**Kurs als globales Forum verwenden**

Legen Sie die Kurs-ID (numerisch) eines Kurses fest, der als globales Forum reserviert ist. Dadurch wird der Link „Soziale Gruppen“ im sozialen Netzwerk durch einen Link zum Forum dieses Kurses ersetzt.

*Standard: `0`*

### `hide_forum_post_revision_language`

**Sprache der Beitragsüberprüfung ausblenden**

Blendet die Möglichkeit aus, einer Überprüfung eines Forenbeitrags eine Sprache zuzuweisen.

*Standard: `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Forenbenachrichtigungen auch aus dem Basiskurs**

Aktivieren Sie diese Option, um Benachrichtigungen aus dem Forum des Basiskurses zu erhalten, auch wenn der Kurs über eine Session belegt wird.

*Standard: `false`*