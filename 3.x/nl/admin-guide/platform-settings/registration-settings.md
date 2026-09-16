# Registratie-instellingen

Zelfregistratiebeleid en omleidingen na registratie — wat nieuwe gebruikers wordt gevraagd en waar ze terechtkomen.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Registratie**. Deze categorie bevat **21 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de instellingen-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code staat in monospace. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_double_validation_in_registration`

**Dubbele validatie voor het registratieproces**

Toon eenvoudig een bevestigingsverzoek op de registratiepagina voordat de gebruiker wordt aangemaakt.

*Standaard: `false`*


### `allow_fields_inscription`

**Velden beperken die tijdens registratie worden getoond**

Als u slechts enkele van de beschikbare profielvelden wilt tonen, kunt u hier de array aanvullen met de subelementen 'fields' en 'extra_fields' die arrays bevatten met een lijst van de te tonen velden.

### `allow_invitation_registration` **v3**

**Registratie via uitnodigingslinks van cursussen toestaan**

Indien ingeschakeld kan een docent/beheerder vanuit de tool Gebruikers van een cursus een eenmalige uitnodigingslink versturen waarmee een niet-geregistreerde persoon het registratieformulier kan bereiken en zich kan registreren, zelfs wanneer algemene zelfregistratie (`allow_registration`) is uitgeschakeld.

*Standaard: `false`*

Zie [Gebruikers inschrijven](../../teacher-guide/assessing-learners/subscribing-users.md#inviting-users-by-email) voor de docentgerichte kant van deze functie.

### `allow_lostpassword`

**Wachtwoord vergeten**

Mogen gebruikers hun verloren wachtwoord opvragen?

*Standaard: `true`*

### `allow_registration`

**Registratie**

Is registratie als nieuwe gebruiker toegestaan? Kunnen gebruikers nieuwe accounts aanmaken?

*Standaard: `false`*

### `allow_registration_as_teacher`

**Registratie als docent**

Kan men zich registreren als docent (met de mogelijkheid om cursussen aan te maken)?

*Standaard: `false`*

### `allow_terms_conditions`

**Algemene voorwaarden inschakelen**

Deze optie toont de Algemene voorwaarden in het registratieformulier voor nieuwe gebruikers. Dit moet eerst worden geconfigureerd op de beheerpagina van het portaal.

*Standaard: `false`*


### `drh_autosubscribe`

**Automatisch inschrijven van HR-directeur**

Automatisch inschrijven van HR-directeur - nog niet beschikbaar

### `extendedprofile_registration`

**Portfoliovelden bij registratie**

Welke van de volgende portfoliovelden moeten beschikbaar zijn in het gebruikersregistratieproces? Dit vereist dat de portfolio-optie is ingeschakeld (zie hierboven).

### `extendedprofile_registrationrequired`

**Verplichte portfoliovelden bij registratie**

Welke van de volgende portfoliovelden zijn *verplicht* in het gebruikersregistratieproces? Dit vereist dat de portfolio-optie is ingeschakeld en dat het veld ook beschikbaar is in het registratieformulier (zie hierboven).

### `extldap_config`

**LDAP-verbindingsconfiguratie**

Array die host en poort voor de LDAP-server definieert.

### `hide_legal_accept_checkbox`

**Selectievakje voor juridische aanvaarding verbergen op de pagina Algemene voorwaarden**

Indien ingesteld op true, wordt het selectievakje "Ik heb gelezen en ga akkoord" in de flow van de pagina Algemene voorwaarden verwijderd.

*Standaard: `false`*


### `platform_unsubscribe_allowed`

**Uitschrijven van het platform toestaan**

Door deze optie in te schakelen, staat u elke gebruiker toe om definitief zijn eigen account en alle gerelateerde gegevens van het platform te verwijderen. Dit is een vrij radicale actie, maar noodzakelijk voor portalen die openstaan voor het publiek waar gebruikers zichzelf kunnen registreren. Er verschijnt een extra item in het gebruikersprofiel om na bevestiging uit te schrijven.

*Standaard: `false`*


### `redirect_after_login`

**Omleiding na aanmelden (per profiel)**

Definieer omleiding per profiel na aanmelden met een JSON-object zoals {"STUDENT":"", "ADMIN":"admin-dashboard"}

*Standaard:*
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

**Verplichte extra velden tijdens registratie**

Array van extra-veldidentificatoren die tijdens gebruikersregistratie moeten worden ingevuld.

### `required_profile_fields`

**Verplichte velden tijdens registratie**

Array van profielveldnamen (email, phone, language, official_code) die tijdens registratie moeten worden opgegeven.

### `send_inscription_msg_to_inbox`

**Het welkomstbericht naar e-mail en inbox verzenden**

Standaard wordt het welkomstbericht (met inloggegevens) alleen per e-mail verzonden. Schakel deze optie in om het ook naar de Chamilo-inbox van de gebruiker te sturen.

*Standaard: `false`*


### `sessionadmin_autosubscribe`

**Automatisch inschrijven van sessiebeheerder**

Automatisch inschrijven van sessiebeheerder - nog niet beschikbaar

### `student_autosubscribe`

**Automatische inschrijving van cursisten**

Automatische inschrijving van cursisten - nog niet beschikbaar

### `teacher_autosubscribe`

**Automatische inschrijving van docenten**

Automatische inschrijving van docenten - nog niet beschikbaar

### `user_hide_never_expire_option`

**Optie 'vervalt nooit' voor gebruikers verbergen**

Verwijder de optie 'vervalt nooit' bij het aanmaken/bewerken van een gebruikersaccount.

*Standaard: `false`*