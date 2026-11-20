# Registrierungseinstellungen

Richtlinie zur Selbstregistrierung und Weiterleitungen nach der Registrierung — welche Angaben von neuen Benutzern verlangt werden und wohin sie gelangen.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Registrierung**. Diese Kategorie enthält **21 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Festbreitenschrift angezeigt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_double_validation_in_registration`

**Doppelte Validierung für den Registrierungsprozess**

Zeigt auf der Registrierungsseite einfach eine Bestätigungsanfrage an, bevor die Benutzererstellung fortgesetzt wird.

*Standard: `false`*


### `allow_fields_inscription`

**Bei der Registrierung angezeigte Felder einschränken**

Wenn Sie nur einige der verfügbaren Profilfelder anzeigen möchten, können Sie das Array hier mit den Unterelementen „fields“ und „extra_fields“ vervollständigen, die Arrays mit einer Liste der anzuzeigenden Felder enthalten.

### `allow_invitation_registration` **v3**

**Registrierung über Kurseinladungslinks zulassen**

Wenn diese Option aktiviert ist, kann eine Lehrkraft oder ein Administrator aus dem Benutzerwerkzeug eines Kurses einen einmaligen Einladungslink senden, über den eine nicht registrierte Person das Registrierungsformular erreicht und sich registrieren kann, auch wenn die allgemeine Selbstregistrierung (`allow_registration`) deaktiviert ist.

*Standard: `false`*

Siehe [Benutzer einschreiben](../../teacher-guide/assessing-learners/subscribing-users.md#inviting-users-by-email) für die lehrkraftseitige Darstellung dieser Funktion.

### `allow_lostpassword`

**Passwort vergessen**

Dürfen Benutzer ihr verlorenes Passwort anfordern?

*Standard: `true`*

### `allow_registration`

**Registrierung**

Ist die Registrierung als neuer Benutzer zulässig? Können Benutzer neue Konten erstellen?

*Standard: `false`*

### `allow_registration_as_teacher`

**Registrierung als Lehrkraft**

Kann man sich als Lehrkraft registrieren (mit der Möglichkeit, Kurse zu erstellen)?

*Standard: `false`*

### `allow_terms_conditions`

**Allgemeine Geschäftsbedingungen aktivieren**

Diese Option zeigt die Allgemeinen Geschäftsbedingungen im Registrierungsformular für neue Benutzer an. Sie muss zuerst auf der Portalverwaltungsseite konfiguriert werden.

*Standard: `false`*

Wenn diese Option aktiviert ist, kann ein Plattformadministrator oder ein Vorgesetzter eines Lernenden die Zustimmung eines Lernenden an drei Stellen verwalten: auf der Benutzerinformationsseite (**Administration > Benutzer**, dann der Benutzer), auf der Tracking-Seite des Lernenden unter **Berichterstattung** und auf der Lernendenseite der globalen Berichterstattung (`/reporting/learners/<id>`). Die Schaltfläche ist überall dieselbe:

* **Rechtliche Vereinbarung senden** sendet dem Lernenden eine mit dem Namen des Absenders signierte Nachricht, in der er aufgefordert wird, die Allgemeinen Geschäftsbedingungen zu unterzeichnen, mit einem Link zu der in [`course_validation_terms_and_conditions_url`](course-settings.md#course_validation_terms_and_conditions_url) festgelegten Adresse.
* **Rechtliche Vereinbarung löschen** erscheint, sobald der Lernende zugestimmt hat, und entfernt diese Zustimmung, sodass der Lernende erneut aufgefordert wird, die Allgemeinen Geschäftsbedingungen zu akzeptieren.


### `hrm_autosubscribe`

**Automatische Einschreibung des Personalverantwortlichen**

Durch `|` getrennte Kurscodes (zum Beispiel `COURSE001|COURSE002`). Wenn sich ein Personalverantwortlicher anmeldet, schreibt Chamilo den Benutzer automatisch in die aufgeführten Kurse ein, ohne die Benutzerrolle zu ändern. Der frühere Einstellungsname `registration.drh_autosubscribe` bleibt aus Kompatibilitätsgründen erkannt.

### `extendedprofile_registration`

**Portfoliofelder bei der Registrierung**

Welche der folgenden Portfoliofelder müssen im Benutzerregistrierungsprozess verfügbar sein? Dies setzt voraus, dass die Portfolio-Option aktiviert ist (siehe oben).

### `extendedprofile_registrationrequired`

**Erforderliche Portfoliofelder bei der Registrierung**

Welche der folgenden Portfoliofelder sind im Benutzerregistrierungsprozess *erforderlich*? Dies setzt voraus, dass die Portfolio-Option aktiviert ist und dass das Feld auch im Registrierungsformular verfügbar ist (siehe oben).

### `extldap_config`

**LDAP-Verbindungskonfiguration**

Array, das Host und Port für den LDAP-Server definiert.

### `hide_legal_accept_checkbox`

**Kontrollkästchen zur rechtlichen Zustimmung auf der Seite der Allgemeinen Geschäftsbedingungen ausblenden**

Wenn auf true gesetzt, entfernt das Kontrollkästchen „Ich habe gelesen und akzeptiere“ im Ablauf der Seite der Allgemeinen Geschäftsbedingungen.

*Standard: `false`*


### `platform_unsubscribe_allowed`

**Abmeldung von der Plattform zulassen**

Wenn Sie diese Option aktivieren, erlauben Sie jedem Benutzer, sein eigenes Konto und alle damit verbundenen Daten endgültig von der Plattform zu entfernen. Dies ist eine recht radikale Maßnahme, sie ist jedoch für öffentlich zugängliche Portale erforderlich, auf denen sich Benutzer selbst registrieren können. Im Benutzerprofil erscheint ein zusätzlicher Eintrag, um sich nach einer Bestätigung abzumelden.

*Standard: `false`*

### `redirect_after_login`

**Weiterleitung nach der Anmeldung (pro Profil)**

Definieren Sie die Weiterleitung pro Profil nach der Anmeldung mithilfe eines JSON-Objekts wie {"STUDENT":"", "ADMIN":"admin-dashboard"}

*Standard:*
```json
{
  "COURSEMANAGER": "courses",
  "STUDENT": "courses",
  "HRM": "",
  "SESSIONADMIN": "admin-dashboard",
  "STUDENT_BOSS": "main/my_space/student.php",
  "INVITEE": "courses",
  "ADMIN": "admin"
}
```

Verwenden Sie in neuen Weiterleitungskonfigurationen den Rollenschlüssel `HRM`. Vorhandene Zuordnungen, die `DRH` enthalten, werden aus Kompatibilitätsgründen weiterhin gelesen; wenn beide Schlüssel vorhanden sind, hat `HRM` Vorrang.

### `required_extra_fields_in_inscription`

**Erforderliche Zusatzfelder bei der Registrierung**

Array von Zusatzfeld-Kennungen, die bei der Benutzerregistrierung ausgefüllt werden müssen.

### `required_profile_fields`

**Erforderliche Felder bei der Registrierung**

Array von Profilfeldnamen (email, phone, language, official_code), die bei der Registrierung angegeben werden müssen.

### `send_inscription_msg_to_inbox`

**Willkommensnachricht per E-Mail und in den Posteingang senden**

Standardmäßig wird die Willkommensnachricht (mit Zugangsdaten) nur per E-Mail gesendet. Aktivieren Sie diese Option, um sie zusätzlich in den Chamilo-Posteingang des Benutzers zu senden.

*Standard: `false`*


### `sessionadmin_autosubscribe`

**Automatische Einschreibung des Sitzungsadministrators**

Automatische Einschreibung des Sitzungsadministrators – noch nicht verfügbar

### `student_autosubscribe`

**Automatische Einschreibung des Lernenden**

Automatische Einschreibung des Lernenden – noch nicht verfügbar

### `teacher_autosubscribe`

**Automatische Einschreibung des Lehrenden**

Automatische Einschreibung des Lehrenden – noch nicht verfügbar

### `user_hide_never_expire_option`

**Option „läuft nie ab“ für Benutzer ausblenden**

Entfernt die Option „läuft nie ab“ beim Erstellen oder Bearbeiten eines Benutzerkontos.

*Standard: `false`*