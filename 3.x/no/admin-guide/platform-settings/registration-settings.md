# Registreringsinnstillinger

Selvregistreringspolicy og omdirigeringer etter registrering — hva nye brukere blir spurt om og hvor de lander.

Tilgang til disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > Registrering**. Denne kategorien inneholder **21 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `allow_double_validation_in_registration`

**Dobbel validering for registreringsprosessen**

Vis ganske enkelt en bekreftelsesforespørsel på registreringssiden før brukeropprettelsen fortsetter.

*Standard: `false`*


### `allow_fields_inscription`

**Begrens felt som vises under registrering**

Hvis du bare vil vise noen av de tilgjengelige profilfeltene, kan du fylle ut tabellen her med underelementene 'fields' og 'extra_fields' som inneholder tabeller med en liste over feltene som skal vises.

### `allow_invitation_registration` **v3**

**Tillat registrering via invitasjonslenker til kurs**

Når dette er aktivert, kan en lærer/administrator sende en engangsinvitasjonslenke fra et kurs' Brukere-verktøy som lar en uregistrert person nå registreringsskjemaet og registrere seg selv om generell selvregistrering (`allow_registration`) er deaktivert.

*Standard: `false`*

Se [Påmelding av brukere](../../teacher-guide/assessing-learners/subscribing-users.md#inviting-users-by-email) for den lærerrettede siden av denne funksjonen.

### `allow_lostpassword`

**Glemt passord**

Har brukere lov til å be om glemt passord?

*Standard: `true`*

### `allow_registration`

**Registrering**

Er registrering som ny bruker tillatt? Kan brukere opprette nye kontoer?

*Standard: `false`*

### `allow_registration_as_teacher`

**Registrering som lærer**

Kan man registrere seg som lærer (med mulighet til å opprette kurs)?

*Standard: `false`*

### `allow_terms_conditions`

**Aktiver vilkår og betingelser**

Dette valget viser Vilkår og betingelser i registreringsskjemaet for nye brukere. Må konfigureres først på portalens administrasjonsside.

*Standard: `false`*


### `drh_autosubscribe`

**Automatisk påmelding for HR-direktør**

Automatisk påmelding for HR-direktør – ennå ikke tilgjengelig

### `extendedprofile_registration`

**Porteføljefelt ved registrering**

Hvilke av følgende porteføljefelt skal være tilgjengelige i brukerregistreringsprosessen? Dette krever at porteføljevalget er aktivert (se ovenfor).

### `extendedprofile_registrationrequired`

**Påkrevde porteføljefelt i registrering**

Hvilke av følgende porteføljefelt er *påkrevd* i brukerregistreringsprosessen? Dette krever at porteføljevalget er aktivert og at feltet også er tilgjengelig i registreringsskjemaet (se ovenfor).

### `extldap_config`

**LDAP-tilkoblingskonfigurasjon**

Tabell som definerer vert og port for LDAP-serveren.

### `hide_legal_accept_checkbox`

**Skjul avkrysningsboks for juridisk aksept på siden for vilkår og betingelser**

Hvis satt til true, fjernes avkrysningsboksen «Jeg har lest og godtar» i flyten på siden for vilkår og betingelser.

*Standard: `false`*


### `platform_unsubscribe_allowed`

**Tillat avmelding fra plattformen**

Ved å aktivere dette valget tillater du at enhver bruker definitivt fjerner sin egen konto og alle tilknyttede data fra plattformen. Dette er en ganske radikal handling, men den er nødvendig for portaler som er åpne for allmennheten der brukere kan selvregistrere seg. En ekstra oppføring vises i brukerprofilen for å avmelde etter bekreftelse.

*Standard: `false`*


### `redirect_after_login`

**Omdirigering etter innlogging (per profil)**

Definer omdirigering per profil etter innlogging ved hjelp av et JSON-objekt som {"STUDENT":"", "ADMIN":"admin-dashboard"}

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

**Påkrevde ekstra felt under registrering**

Tabell med identifikatorer for ekstra felt som må fylles ut under brukerregistrering.

### `required_profile_fields`

**Påkrevde felt under registrering**

Tabell med profilfeltnavn (email, phone, language, official_code) som må oppgis under registrering.

### `send_inscription_msg_to_inbox`

**Send velkomstmeldingen til e-post og innboks**

Som standard sendes velkomstmeldingen (med påloggingsinformasjon) kun via e-post. Aktiver dette valget for å sende den til brukerens Chamilo-innboks også.

*Standard: `false`*


### `sessionadmin_autosubscribe`

**Automatisk påmelding for sesjonsadministrator**

Automatisk påmelding for sesjonsadministrator – ennå ikke tilgjengelig

### `student_autosubscribe`

**Automatisk påmelding for lærende**

Automatisk påmelding for lærende – ikke tilgjengelig ennå

### `teacher_autosubscribe`

**Automatisk påmelding for lærere**

Automatisk påmelding for lærere – ikke tilgjengelig ennå

### `user_hide_never_expire_option`

**Skjul alternativet «utløper aldri» for brukere**

Fjern alternativet «utløper aldri» ved oppretting/redigering av en brukerkonto.

*Standard: `false`*