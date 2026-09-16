# Soziale-Netzwerk-Einstellungen

Verhalten des **sozialen Netzwerks** — Freunde, Gruppen, Pinnwand-Beiträge, Fotoalben.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Soziales Netzwerk**. Diese Kategorie enthält **7 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_social_tool`

**Soziales-Netzwerk-Werkzeug (Facebook-ähnlich)**

Das soziale Netzwerk ermöglicht es Nutzern, Beziehungen zu anderen Nutzern zu definieren und dadurch Freundesgruppen festzulegen. In Kombination mit dem internen Nachrichtenwerkzeug ermöglicht dieses Werkzeug eine enge Kommunikation mit Freunden innerhalb der Portalumgebung.

*Standard: `true`*

### `allow_students_to_create_groups_in_social`

**Lernenden erlauben, Gruppen im sozialen Netzwerk zu erstellen**

Lernenden erlauben, Gruppen im sozialen Netzwerk zu erstellen

*Standard: `false`*


### `disable_dislike_option`

**„Dislike“ für soziale Beiträge deaktivieren**

Entfernt die Daumen-runter-Option für Rückmeldungen zu sozialen Beiträgen. Es bleibt nur Daumen hoch (Like).

*Standard: `false`*

### `hide_social_groups_block`

**Gruppenblock im sozialen Netzwerk ausblenden**

Entfernt den Gruppenbereich aus der Ansicht des sozialen Netzwerks.

*Standard: `false`*


### `social_enable_messages_feedback`

**Like/Dislike für soziale Beiträge**

Ermöglicht Nutzern, Rückmeldungen (Likes oder Dislikes) zu Beiträgen auf der sozialen Pinnwand hinzuzufügen.

*Standard: `false`*

### `social_make_teachers_friend_all`

**Lehrende und Administratoren sehen Lernende im sozialen Netzwerk als Freunde**

Lehrende und Administratoren erscheinen im Modul soziales Netzwerk automatisch als Freunde aller Lernenden.

*Standard: `false`*


### `social_show_language_flag_in_profile`

**Sprachenflagge neben dem Avatar im sozialen Netzwerk anzeigen**

Zeigt die Sprachpräferenz des Nutzers als Flaggen-Symbol neben dem Avatar in den Profilen des sozialen Netzwerks an.

*Standard: `false`*