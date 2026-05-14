# Registrierungseinstellungen

Selbstregistrierungsrichtlinien und Weiterleitungen nach der Registrierung – welche Informationen neue Benutzer angeben müssen und wohin sie geleitet werden.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Registrierung** zu. Diese Kategorie enthält **20 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) hinterlegt sind.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_double_validation_in_registration`

**Doppelte Validierung im Registrierungsprozess**

Zeigt einfach eine Bestätigungsanfrage auf der Registrierungsseite an, bevor mit der Erstellung des Benutzers fortgefahren wird.

*Standard: `false`*

### `allow_fields_inscription`

**Einschränkung der während der Registrierung angezeigten Felder**

Wenn Sie nur einige der verfügbaren Profilfelder anzeigen möchten, können Sie hier ein Array mit den Unterelementen 'fields' und 'extra_fields' ergänzen, das Arrays mit einer Liste der anzuzeigenden Felder enthält.

### `allow_lostpassword`

**Passwort vergessen**

Dürfen Benutzer ihr verlorenes Passwort anfordern?

*Standard: `true`*

### `allow_registration`

**Registrierung**

Ist die Registrierung als neuer Benutzer erlaubt? Können Benutzer neue Konten erstellen?

*Standard: `false`*

### `allow_registration_as_teacher`

**Registrierung als Lehrer**

Kann man sich als Lehrer registrieren (mit der Möglichkeit, Kurse zu erstellen)?

*Standard: `false`*

### `allow_terms_conditions`

**Nutzungsbedingungen aktivieren**

Diese Option zeigt die Nutzungsbedingungen im Registrierungsformular für neue Benutzer an. Muss zunächst auf der Verwaltungsseite des Portals konfiguriert werden.

*Standard: `false`*

### `drh_autosubscribe`

**Automatische Registrierung für Personalverantwortliche**

Automatische Registrierung für Personalverantwortliche – noch nicht verfügbar

### `extendedprofile_registration`

**Portfoliofelder bei der Registrierung**

Welche der folgenden Felder des Portfolios sollen im Registrierungsprozess für Benutzer verfügbar sein? Dies setzt voraus, dass die Portfolio-Option aktiviert ist (siehe oben).

### `extendedprofile_registrationrequired`

**Erforderliche Portfoliofelder bei der Registrierung**

Welche der folgenden Felder des Portfolios sind im Registrierungsprozess für Benutzer *erforderlich*? Dies setzt voraus, dass die Portfolio-Option aktiviert ist und dass das Feld auch im Registrierungsformular verfügbar ist (siehe oben).

### `extldap_config`

**LDAP-Verbindungskonfiguration**

Array, das Host und Port für den LDAP-Server definiert.

### `hide_legal_accept_checkbox`

**Kontrollkästchen für rechtliche Zustimmung auf der Seite mit den Nutzungsbedingungen ausblenden**

Wenn auf „true“ gesetzt, wird das Kontrollkästchen „Ich habe gelesen und akzeptiere“ im Ablauf der Seite mit den Nutzungsbedingungen entfernt.

*Standard: `false`*

### `platform_unsubscribe_allowed`

**Abmeldung von der Plattform erlauben**

Durch Aktivieren dieser Option erlauben Sie jedem Benutzer, sein eigenes Konto und alle damit verbundenen Daten endgültig von der Plattform zu entfernen. Dies ist eine drastische Maßnahme, aber notwendig für Portale, die der Öffentlichkeit zugänglich sind und bei denen sich Benutzer selbst registrieren können. Ein zusätzlicher Eintrag erscheint im Benutzerprofil, um die Abmeldung nach Bestätigung durchzuführen.

*Standard: `false`*

### `redirect_after_login`

**Weiterleitung nach dem Login (pro Profil)**

Definieren Sie die Weiterleitung pro Profil nach dem Login mit einem JSON-Objekt wie {"STUDENT":"", "ADMIN":"admin-dashboard"}

*Standard:*
```json
{
  "COURSEMANAGER": "courses",
  "STUDENT": "courses",
  "DRH": "",
  "SESSIONADMIN": "admin-dashboard",
  "STUDENT_BOSS": "main/my_space/student.php",
  "INVITEE": "courses",
  "ADMIN": "admin"
}
```

### `required_extra_fields_in_inscription`

**Erforderliche Zusatzfelder bei der Registrierung**

Array von Zusatzfeld-Identifikatoren, die während der Benutzerregistrierung ausgefüllt werden müssen.

### `required_profile_fields`

**Erforderliche Felder bei der Registrierung**

Array von Profilfeldnamen (E-Mail, Telefon, Sprache, offizieller Code), die bei der Registrierung angegeben werden müssen.

### `send_inscription_msg_to_inbox`

**Willkommensnachricht an E-Mail und Posteingang senden**

Standardmäßig wird die Willkommensnachricht (mit Zugangsdaten) nur per E-Mail gesendet. Aktivieren Sie diese Option, um sie auch an den Chamilo-Posteingang des Benutzers zu senden.

*Standard: `false`*

### `sessionadmin_autosubscribe`

**Automatische Registrierung für Sitzungsadministratoren**

Automatische Registrierung für Sitzungsadministratoren – noch nicht verfügbar

### `student_autosubscribe`

**Automatische Registrierung für Lernende**

Automatische Registrierung für Lernende – noch nicht verfügbar

### `teacher_autosubscribe`

**Automatische Registrierung für Lehrer**

Automatische Registrierung für Lehrer – noch nicht verfügbar

### `user_hide_never_expire_option`

**Option 'läuft nie ab' für Benutzer ausblenden**

Entfernt die Option 'läuft nie ab' beim Erstellen/Bearbeiten eines Benutzerkontos.

*Standard: `false`*