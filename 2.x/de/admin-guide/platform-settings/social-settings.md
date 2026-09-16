# Einstellungen für soziale Netzwerke

Verhalten des **Sozialen Netzwerks** — Freunde, Gruppen, Wandbeiträge, Fotoalben.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Soziales Netzwerk** zu. Diese Kategorie enthält **7 Einstellungen**, die unten mit dem Titel und Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_social_tool`

**Soziales Netzwerk-Tool (ähnlich wie Facebook)**

Das soziale Netzwerk-Tool ermöglicht es Benutzern, Beziehungen zu anderen Benutzern zu definieren und dadurch Freundesgruppen zu erstellen. In Kombination mit dem internen Nachrichtentool ermöglicht dieses Tool eine enge Kommunikation mit Freunden innerhalb der Portalumgebung.

*Standard: `true`*

### `allow_students_to_create_groups_in_social`

**Lernenden erlauben, Gruppen im sozialen Netzwerk zu erstellen**

Erlaubt Lernenden, Gruppen im sozialen Netzwerk zu erstellen.

*Standard: `false`*

### `disable_dislike_option`

**'Dislike'-Option für soziale Beiträge deaktivieren**

Entfernt die Daumen-runter-Option für Feedback zu sozialen Beiträgen. Nur Daumen hoch (Like) bleibt erhalten.

*Standard: `false`*

### `hide_social_groups_block`

**Gruppenblock im sozialen Netzwerk ausblenden**

Entfernt den Gruppenbereich aus der Ansicht des sozialen Netzwerks.

*Standard: `false`*

### `social_enable_messages_feedback`

**Like/Dislike für soziale Beiträge**

Ermöglicht es Benutzern, Feedback (Likes oder Dislikes) zu Beiträgen in der sozialen Wand hinzuzufügen.

*Standard: `false`*

### `social_make_teachers_friend_all`

**Lehrer und Administratoren erscheinen als Freunde von Schülern im sozialen Netzwerk**

Macht Dozenten und Administratoren automatisch zu Freunden aller Schüler im sozialen Netzwerk-Modul.

*Standard: `false`*

### `social_show_language_flag_in_profile`

**Sprachflagge neben dem Avatar im sozialen Netzwerk anzeigen**

Zeigt die Sprachpräferenz des Benutzers als Flaggensymbol neben dem Avatar in den Profilen des sozialen Netzwerks an.

*Standard: `false`*