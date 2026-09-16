# Registrierungseinstellungen

Richtlinie zur Selbstregistrierung und Weiterleitungen nach der Registrierung — welche Angaben neue Benutzer machen müssen und wohin sie gelangen.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Registrierung**. Diese Kategorie enthält **21 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code ist in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Settings

### `allow_double_validation_in_registration`

**Doppelte Bestätigung im Registrierungsprozess**

Zeigt auf der Registrierungsseite einfach eine Bestätigungsabfrage an, bevor mit der Benutzererstellung fortgefahren wird.

*Default: `false`*


### `allow_fields_inscription`

**Angezeigte Felder bei der Registrierung einschränken**

Wenn Sie nur einige der verfügbaren Profilfelder anzeigen möchten, können Sie das Array hier mit den Unterelementen 'fields' und 'extra_fields' ausfüllen, die Arrays mit einer Liste der anzuzeigenden Felder enthalten.

### `allow_invitation_registration` **v3**

**Registrierung über Kurseinladungslinks zulassen**

Wenn aktiviert, kann ein Lehrer/Administrator aus dem Benutzer-Werkzeug eines Kurses einen einmaligen Einladungslink senden, über den eine nicht registrierte Person das Registrierungsformular erreicht und sich registrieren kann, selbst wenn die allgemeine Selbstregistrierung (`allow_registration`) deaktiviert ist.

*Default: `false`*

Siehe [Benutzer einschreiben](../../teacher-guide/assessing-learners/subscribing-users.md#inviting-users-by-email) für die lehrerseitige Darstellung dieser Funktion.

### `allow_lostpassword`

**Passwort vergessen**

Dürfen Benutzer ihr vergessenes Passwort anfordern?

*Default: `true`*

### `allow_registration`

**Registrierung**

Ist die Registrierung als neuer Benutzer erlaubt? Können Benutzer neue Konten anlegen?

*Default: `false`*

### `allow_registration_as_teacher`

**Registrierung als Lehrer**

Kann man sich als Lehrer registrieren (mit der Möglichkeit, Kurse zu erstellen)?

*Default: `false`*

### `allow_terms_conditions`

**Nutzungsbedingungen aktivieren**

Diese Option zeigt die Nutzungsbedingungen im Registrierungsformular für neue Benutzer an. Muss zuerst auf der Portal-Administrationsseite konfiguriert werden.

*Default: `false`*


### `drh_autosubscribe`

**Automatische Einschreibung des Personalverantwortlichen**

Automatische Einschreibung des Personalverantwortlichen – noch nicht verfügbar

### `extendedprofile_registration`

**Portfolio-Felder bei der Registrierung**

Welche der folgenden Felder des Portfolios müssen im Benutzerregistrierungsprozess verfügbar sein? Dies setzt voraus, dass die Portfolio-Option aktiviert ist (siehe oben).

### `extendedprofile_registrationrequired`

**Pflicht-Portfolio-Felder bei der Registrierung**

Welche der folgenden Felder des Portfolios sind im Benutzerregistrierungsprozess *erforderlich*? Dies setzt voraus, dass die Portfolio-Option aktiviert ist und dass das Feld auch im Registrierungsformular verfügbar ist (siehe oben).

### `extldap_config`

**LDAP-Verbindungskonfiguration**

Array, das Host und Port für den LDAP-Server definiert.

### `hide_legal_accept_checkbox`

**Kontrollkästchen zur rechtlichen Annahme auf der Seite der Nutzungsbedingungen ausblenden**

Wenn auf true gesetzt, wird das Kontrollkästchen „Ich habe gelesen und akzeptiere“ im Ablauf der Seite der Nutzungsbedingungen entfernt.

*Default: `false`*


### `platform_unsubscribe_allowed`

**Abmeldung von der Plattform zulassen**

Durch Aktivieren dieser Option erlauben Sie jedem Benutzer, sein eigenes Konto und alle damit verbundenen Daten endgültig von der Plattform zu entfernen. Dies ist eine recht radikale Maßnahme, ist jedoch für öffentlich zugängliche Portale notwendig, auf denen sich Benutzer selbst registrieren können. Im Benutzerprofil erscheint nach Bestätigung ein zusätzlicher Eintrag zur Abmeldung.

*Default: `false`*


### `redirect_after_login`

**Weiterleitung nach der Anmeldung (pro Profil)**

Definieren Sie die Weiterleitung pro Profil nach der Anmeldung mithilfe eines JSON-Objekts wie {"STUDENT":"", "ADMIN":"admin-dashboard"}

*Default:*
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

**Erforderliche Extra-Felder bei der Registrierung**

Array von Extra-Feld-Identifikatoren, die bei der Benutzerregistrierung ausgefüllt werden müssen.

### `required_profile_fields`

**Erforderliche Felder bei der Registrierung**

Array von Profilfeldnamen (email, phone, language, official_code), die bei der Registrierung angegeben werden müssen.

### `send_inscription_msg_to_inbox`

**Willkommensnachricht an E-Mail und Posteingang senden**

Standardmäßig wird die Willkommensnachricht (mit Zugangsdaten) nur per E-Mail gesendet. Aktivieren Sie diese Option, um sie zusätzlich an den Chamilo-Posteingang des Benutzers zu senden.

*Default: `false`*


### `sessionadmin_autosubscribe`

**Automatische Einschreibung des Sitzungsadministrators**

Automatische Einschreibung des Sitzungsadministrators – noch nicht verfügbar

### `student_autosubscribe`

**Automatische Anmeldung von Lernenden**

Automatische Anmeldung von Lernenden – noch nicht verfügbar

### `teacher_autosubscribe`

**Automatische Anmeldung von Lehrenden**

Automatische Anmeldung von Lehrenden – noch nicht verfügbar

### `user_hide_never_expire_option`

**Option „läuft nie ab“ für Benutzer ausblenden**

Die Option „läuft nie ab“ beim Erstellen/Bearbeiten eines Benutzerkontos entfernen.

*Standard: `false`*