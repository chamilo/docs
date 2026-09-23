# Registreringsindstillinger

Politik for selvregistrering og omdirigeringer efter registrering — hvad nye brugere bliver bedt om, og hvor de lander.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Registration**. Denne kategori indeholder **21 indstillinger**, som er listet nedenfor med den titel og kommentar, der leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det, når du script’er via API’et, eller når du skal ændre indstillingerne globalt ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `allow_double_validation_in_registration`

**Dobbelt validering i registreringsprocessen**

Vis blot en bekræftelsesanmodning på registreringssiden, før oprettelsen af brugeren fortsætter.

*Default: `false`*


### `allow_fields_inscription`

**Begræns felter vist under registrering**

Hvis du kun vil vise nogle af de tilgængelige profilfelter, kan du udfylde arrayet her med underelementerne 'fields' og 'extra_fields', som indeholder arrays med en liste over de felter, der skal vises.

### `allow_invitation_registration` **v3**

**Tillad registrering via invitationslinks til kurser**

Når indstillingen er aktiveret, kan en underviser/administrator sende et engangs-invitationslink fra et kursus’ Users-værktøj, så en uregistreret person kan nå registreringsformularen og registrere sig, selvom den generelle selvregistrering (`allow_registration`) er deaktiveret.

*Default: `false`*

Se [Tilmelding af brugere](../../teacher-guide/assessing-learners/subscribing-users.md#inviting-users-by-email) for den underviserrettede side af denne funktion.

### `allow_lostpassword`

**Glemt adgangskode**

Må brugere anmode om deres glemte adgangskode?

*Default: `true`*

### `allow_registration`

**Registrering**

Er registrering som ny bruger tilladt? Kan brugere oprette nye konti?

*Default: `false`*

### `allow_registration_as_teacher`

**Registrering som underviser**

Kan man registrere sig som underviser (med mulighed for at oprette kurser)?

*Default: `false`*

### `allow_terms_conditions`

**Aktivér vilkår og betingelser**

Denne indstilling viser Vilkår og betingelser i registreringsformularen for nye brugere. Skal først konfigureres på portalens administrationsside.

*Default: `false`*


### `drh_autosubscribe`

**Automatisk tilmelding for HR-direktør**

Automatisk tilmelding for HR-direktør – endnu ikke tilgængelig

### `extendedprofile_registration`

**Porteføljefelter ved registrering**

Hvilke af følgende felter i porteføljen skal være tilgængelige i brugerregistreringsprocessen? Dette kræver, at porteføljeindstillingen er aktiveret (se ovenfor).

### `extendedprofile_registrationrequired`

**Påkrævede porteføljefelter ved registrering**

Hvilke af følgende felter i porteføljen er *påkrævede* i brugerregistreringsprocessen? Dette kræver, at porteføljeindstillingen er aktiveret, og at feltet også er tilgængeligt i registreringsformularen (se ovenfor).

### `extldap_config`

**LDAP-forbindelseskonfiguration**

Array, der definerer host og port for LDAP-serveren.

### `hide_legal_accept_checkbox`

**Skjul afkrydsningsfelt for juridisk accept på siden Vilkår og betingelser**

Hvis sat til true, fjernes afkrydsningsfeltet "Jeg har læst og accepterer" i forløbet på siden Vilkår og betingelser.

*Default: `false`*


### `platform_unsubscribe_allowed`

**Tillad framelding fra platformen**

Ved at aktivere denne indstilling tillader du enhver bruger endegyldigt at fjerne sin egen konto og alle relaterede data fra platformen. Dette er en ret radikal handling, men den er nødvendig for portaler, der er åbne for offentligheden, hvor brugere kan selvregistrere sig. Der vises et ekstra punkt i brugerprofilen til framelding efter bekræftelse.

*Default: `false`*


### `redirect_after_login`

**Omdirigering efter login (pr. profil)**

Definér omdirigering pr. profil efter login ved hjælp af et JSON-objekt som {"STUDENT":"", "ADMIN":"admin-dashboard"}

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

**Påkrævede ekstra felter under registrering**

Array af identifikatorer for ekstra felter, der skal udfyldes under brugerregistrering.

### `required_profile_fields`

**Påkrævede felter under registrering**

Array af profilfeltnavne (email, phone, language, official_code), der skal angives under registrering.

### `send_inscription_msg_to_inbox`

**Send velkomstbeskeden til e-mail og indbakke**

Som standard sendes velkomstbeskeden (med legitimationsoplysninger) kun via e-mail. Aktivér denne indstilling for også at sende den til brugerens Chamilo-indbakke.

*Default: `false`*


### `sessionadmin_autosubscribe`

**Automatisk tilmelding for sessionsadministrator**

Automatisk tilmelding for sessionsadministrator – endnu ikke tilgængelig

### `student_autosubscribe`

**Automatisk tilmelding af kursister**

Automatisk tilmelding af kursister – endnu ikke tilgængelig

### `teacher_autosubscribe`

**Automatisk tilmelding af undervisere**

Automatisk tilmelding af undervisere – endnu ikke tilgængelig

### `user_hide_never_expire_option`

**Skjul indstillingen 'udløber aldrig' for brugere**

Fjern indstillingen 'udløber aldrig' ved oprettelse/redigering af en brugerkonto.

*Standard: `false`*