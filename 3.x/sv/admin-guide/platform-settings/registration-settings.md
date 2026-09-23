# Registreringsinställningar

Policy för självregistrering och omdirigeringar efter registrering — vad nya användare ombeds ange och var de hamnar.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Registrering**. Denna kategori innehåller **21 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det när du skriptar via API:t eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `allow_double_validation_in_registration`

**Dubbel validering för registreringsprocessen**

Visa helt enkelt en bekräftelseförfrågan på registreringssidan innan användarskapandet fortsätter.

*Standard: `false`*


### `allow_fields_inscription`

**Begränsa fält som visas vid registrering**

Om du bara vill visa vissa av de tillgängliga profilfälten kan du komplettera arrayen här med underelementen 'fields' och 'extra_fields' som innehåller arrayer med en lista över de fält som ska visas.

### `allow_invitation_registration` **v3**

**Tillåt registrering via inbjudningslänkar till kurser**

När detta är aktiverat kan en lärare/administratör skicka en engångsinbjudningslänk från en kurs verktyg Användare som låter en oregistrerad person nå registreringsformuläret och registrera sig även när allmän självregistrering (`allow_registration`) är inaktiverad.

*Standard: `false`*

Se [Prenumerera användare](../../teacher-guide/assessing-learners/subscribing-users.md#inviting-users-by-email) för den lärarvända sidan av denna funktion.

### `allow_lostpassword`

**Glömt lösenord**

Får användare begära sitt glömda lösenord?

*Standard: `true`*

### `allow_registration`

**Registrering**

Är registrering som ny användare tillåten? Kan användare skapa nya konton?

*Standard: `false`*

### `allow_registration_as_teacher`

**Registrering som lärare**

Kan man registrera sig som lärare (med möjlighet att skapa kurser)?

*Standard: `false`*

### `allow_terms_conditions`

**Aktivera villkor**

Detta alternativ visar villkoren i registreringsformuläret för nya användare. Behöver konfigureras först på portalens administrationssida.

*Standard: `false`*


### `drh_autosubscribe`

**Automatisk prenumeration för HR-direktör**

Automatisk prenumeration för HR-direktör - ännu inte tillgänglig

### `extendedprofile_registration`

**Portföljfält vid registrering**

Vilka av följande fält i portföljen ska vara tillgängliga i användarens registreringsprocess? Detta kräver att portföljalternativet är aktiverat (se ovan).

### `extendedprofile_registrationrequired`

**Obligatoriska portföljfält vid registrering**

Vilka av följande fält i portföljen är *obligatoriska* i användarens registreringsprocess? Detta kräver att portföljalternativet är aktiverat och att fältet också är tillgängligt i registreringsformuläret (se ovan).

### `extldap_config`

**LDAP-anslutningskonfiguration**

Array som definierar värd och port för LDAP-servern.

### `hide_legal_accept_checkbox`

**Dölj kryssrutan för juridiskt godkännande på sidan Villkor**

Om värdet är true tas kryssrutan "Jag har läst och godkänner" bort i flödet på sidan Villkor.

*Standard: `false`*


### `platform_unsubscribe_allowed`

**Tillåt avregistrering från plattformen**

Genom att aktivera detta alternativ tillåter du vilken användare som helst att definitivt ta bort sitt eget konto och all relaterad data från plattformen. Detta är en ganska radikal åtgärd, men den är nödvändig för portaler som är öppna för allmänheten där användare kan självregistrera sig. En extra post visas i användarprofilen för att avregistrera sig efter bekräftelse.

*Standard: `false`*


### `redirect_after_login`

**Omdirigering efter inloggning (per profil)**

Definiera omdirigering per profil efter inloggning med ett JSON-objekt som {"STUDENT":"", "ADMIN":"admin-dashboard"}

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

**Obligatoriska extrafält vid registrering**

Array med extrafältidentifierare som måste fyllas i vid användarregistrering.

### `required_profile_fields`

**Obligatoriska fält vid registrering**

Array med profilfältnamn (email, phone, language, official_code) som måste anges vid registrering.

### `send_inscription_msg_to_inbox`

**Skicka välkomstmeddelandet till e-post och inkorg**

Som standard skickas välkomstmeddelandet (med inloggningsuppgifter) endast via e-post. Aktivera detta alternativ för att även skicka det till användarens Chamilo-inkorg.

*Standard: `false`*


### `sessionadmin_autosubscribe`

**Automatisk prenumeration för sessionsadministratör**

Automatisk prenumeration för sessionsadministratör - ännu inte tillgänglig

### `student_autosubscribe`

**Automatisk prenumeration för studerande**

Automatisk prenumeration för studerande – ännu inte tillgänglig

### `teacher_autosubscribe`

**Automatisk prenumeration för lärare**

Automatisk prenumeration för lärare – ännu inte tillgänglig

### `user_hide_never_expire_option`

**Dölj alternativet "löper aldrig ut" för användare**

Ta bort alternativet "löper aldrig ut" när ett användarkonto skapas/redigeras.

*Standard: `false`*