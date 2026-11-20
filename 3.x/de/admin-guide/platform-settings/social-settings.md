# Einstellungen des sozialen Netzwerks

Verhalten des **sozialen Netzwerks** — Freunde, Gruppen, Pinnwandbeiträge, Fotoalben.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Soziales Netzwerk**. Diese Kategorie enthält **7 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Mehrere Beziehungen zwischen Benutzern

Ein Benutzerpaar kann gleichzeitig **mehr als einen Beziehungstyp** haben. Beispielsweise kann eine Freundschaft neben einer Vorgesetztenbeziehung (`BOSS`) bestehen; das Erfassen eines Typs darf den anderen nicht ersetzen, und das erneute Hinzufügen derselben Beziehung darf keine doppelten Datensätze erzeugen. Dies wurde in [PR #9202](https://github.com/chamilo/chamilo-lms/pull/9202) (Issue #2246) korrigiert.

Dies ist keine neue Einstellung des sozialen Netzwerks und keine automatische Erweiterung der Benutzerrechte. Beziehungstypen, die Plattformrolle des Benutzers und die Zugriffsberechtigungen sind getrennte Konzepte. Wenn nach einem Upgrade soziale Kontakte oder Vorgesetztenverknüpfungen fehlen, prüfen Sie den entsprechenden Beziehungstyp, anstatt davon auszugehen, dass zwischen zwei Konten nur eine Beziehung bestehen kann.

## Einstellungen

### `allow_social_tool`

**Werkzeug für das soziale Netzwerk (Facebook-ähnlich)**

Das Werkzeug für das soziale Netzwerk ermöglicht es Benutzern, Beziehungen zu anderen Benutzern zu definieren und dadurch Freundesgruppen festzulegen. In Verbindung mit dem internen Nachrichtenwerkzeug ermöglicht dieses Werkzeug eine enge Kommunikation mit Freunden innerhalb der Portalumgebung.

*Standard: `true`*

### `allow_students_to_create_groups_in_social`

**Lernenden erlauben, Gruppen im sozialen Netzwerk zu erstellen**

Lernenden erlauben, Gruppen im sozialen Netzwerk zu erstellen

*Standard: `false`*


### `disable_dislike_option`

**„Gefällt mir nicht“ für soziale Beiträge deaktivieren**

Entfernt die Option „Daumen runter“ für Rückmeldungen zu sozialen Beiträgen. Es bleibt nur „Daumen hoch“ (Gefällt mir).

*Standard: `false`*

### `hide_social_groups_block`

**Gruppenblock im sozialen Netzwerk ausblenden**

Entfernt den Gruppenbereich aus der Ansicht des sozialen Netzwerks.

*Standard: `false`*


### `social_enable_messages_feedback`

**Gefällt mir / Gefällt mir nicht für soziale Beiträge**

Ermöglicht Benutzern, Rückmeldungen (Gefällt mir oder Gefällt mir nicht) zu Beiträgen auf der sozialen Pinnwand hinzuzufügen.

*Standard: `false`*

### `social_make_teachers_friend_all`

**Lehrkräfte und Administratoren erscheinen im sozialen Netzwerk als Freunde der Lernenden**

Lässt Lehrkräfte und Administratoren im Modul des sozialen Netzwerks automatisch allen Lernenden als Freunde erscheinen.

*Standard: `false`*


### `social_show_language_flag_in_profile`

**Sprachflagge neben dem Avatar im sozialen Netzwerk anzeigen**

Zeigt die Sprachpräferenz des Benutzers als Flaggensymbol neben dem Avatar in Profilen des sozialen Netzwerks an.

*Standard: `false`*