# Foreneinstellungen

Verhalten des Kurswerkzeugs **Foren**.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Foren** zu. Diese Kategorie enthält **9 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene durch Bearbeiten von [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) ändern müssen.

## Einstellungen

### `allow_forum_category_language_filter`

**Sprachfilter für Forenkategorien**

Fügen Sie einen Sprachfilter zur Forenansicht hinzu, um nur Kategorien anzuzeigen, die in einer bestimmten Sprache konfiguriert sind. Erfordert die Verwendung des zusätzlichen Feldes 'language' bei der Entität 'forum_category'.

*Standard: `false`*

### `allow_forum_post_revisions`

**Überprüfung von Forenbeiträgen**

Aktivieren Sie diese Option, um die Möglichkeit zu erlauben, eine Überprüfung oder Übersetzung eines eigenen Beitrags im Forum anzufordern. Bei umfassender Konfiguration kann dies genutzt werden, um mit anderen Nutzern in einem Sprachlernforum zusammenzuarbeiten.

*Standard: `false`*

### `community_managers_user_list`

**Liste der Community-Manager**

Geben Sie ein Array von Benutzer-IDs an, die als Community-Manager in dem speziellen Kurs gelten, der als globales Forum ausgewiesen ist. Community-Manager haben zusätzliche Berechtigungen im globalen Forum.

### `default_forum_view`

**Standard-Forenansicht**

Welche Option sollte standardmäßig beim Erstellen eines neuen Forums verwendet werden. Jeder Trainer kann jedoch für jedes einzelne Forum eine andere Ansicht wählen.

*Standard: `flat`*

### `display_groups_forum_in_general_tool`

**Gruppenforen im allgemeinen Forum anzeigen**

Zeigen Sie Gruppenforen im Forenwerkzeug auf Kursebene an. Diese Option ist standardmäßig aktiviert (in diesem Fall wirken die individuellen Sichtbarkeiten der Gruppenforen weiterhin als zusätzliches Kriterium). Wenn deaktiviert, sind Gruppenforen nur über das Gruppenwerkzeug sichtbar, unabhängig davon, ob sie öffentlich sind oder nicht.

*Standard: `true`*

### `forum_fold_categories`

**Forenkategorien einklappen**

Visueller Effekt, um das Ein- und Ausklappen von Forenkategorien zu ermöglichen.

*Standard: `false`*

### `global_forums_course_id`

**Kurs als globales Forum verwenden**

Legen Sie die Kurs-ID (numerisch) eines Kurses fest, der als globales Forum reserviert ist. Dies ersetzt den Link 'Soziale Gruppen' im sozialen Netzwerk durch einen Link zum Forum dieses Kurses.

*Standard: `0`*

### `hide_forum_post_revision_language`

**Sprache für die Überprüfung von Forenbeiträgen ausblenden**

Verbergen Sie die Möglichkeit, einer Überprüfung eines Forenbeitrags eine Sprache zuzuweisen.

*Standard: `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Forenbenachrichtigungen auch vom Basiskurs**

Aktivieren Sie diese Option, um Benachrichtigungen vom Basiskurs-Forum zu ermöglichen, selbst wenn der Kurs über eine Sitzung verfolgt wird.

*Standard: `false`*