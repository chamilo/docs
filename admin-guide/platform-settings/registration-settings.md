# Registratie-instellingen

Beleid voor zelfregistratie en doorverwijzingen na registratie — wat wordt aan nieuwe gebruikers gevraagd en waar komen ze terecht.

Deze instellingen zijn te vinden onder **Beheer > Configuratie-instellingen > Registratie**. Deze categorie bevat **20 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de platforminstellingen (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_double_validation_in_registration`

**Dubbele validatie voor registratieproces**

Toon eenvoudigweg een bevestigingsverzoek op de registratiepagina voordat de gebruikersaanmaak wordt voortgezet.

*Standaard: `false`*

### `allow_fields_inscription`

**Beperk velden die worden getoond tijdens registratie**

Als u slechts enkele van de beschikbare profielvelden wilt tonen, kunt u hier de array aanvullen met subelementen 'fields' en 'extra_fields' die arrays bevatten met een lijst van de weer te geven velden.

### `allow_lostpassword`

**Verloren wachtwoord**

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

Met deze optie worden de Algemene Voorwaarden weergegeven in het registratieformulier voor nieuwe gebruikers. Dit moet eerst worden geconfigureerd op de beheerpagina van het portaal.

*Standaard: `false`*

### `drh_autosubscribe`

**Automatische inschrijving voor personeelsdirecteur**

Automatische inschrijving voor personeelsdirecteur - nog niet beschikbaar

### `extendedprofile_registration`

**Portfoliovelden bij registratie**

Welke van de volgende portfoliovelden moeten beschikbaar zijn in het registratieproces van gebruikers? Dit vereist dat de portfolio-optie is ingeschakeld (zie hierboven).

### `extendedprofile_registrationrequired`

**Verplichte portfoliovelden bij registratie**

Welke van de volgende portfoliovelden zijn *verplicht* in het registratieproces van gebruikers? Dit vereist dat de portfolio-optie is ingeschakeld en dat het veld ook beschikbaar is in het registratieformulier (zie hierboven).

### `extldap_config`

**LDAP-verbindingsconfiguratie**

Array die host en poort voor de LDAP-server definieert.

### `hide_legal_accept_checkbox`

**Verberg acceptatievinkje op pagina Algemene Voorwaarden**

Indien ingesteld op true, wordt het vinkje "Ik heb gelezen en accepteer" verwijderd in de flow van de pagina Algemene Voorwaarden.

*Standaard: `false`*

### `platform_unsubscribe_allowed`

**Uitschrijving van platform toestaan**

Door deze optie in te schakelen, laat u gebruikers toe om hun eigen account en alle gerelateerde gegevens definitief van het platform te verwijderen. Dit is een vrij radicale actie, maar noodzakelijk voor portalen die open zijn voor het publiek waar gebruikers zich automatisch kunnen registreren. Een extra optie verschijnt in het gebruikersprofiel om na bevestiging uit te schrijven.

*Standaard: `false`*

### `redirect_after_login`

**Doorverwijzing na inloggen (per profiel)**

Definieer doorverwijzing per profiel na inloggen met een JSON-object zoals {"STUDENT":"", "ADMIN":"admin-dashboard"}

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

Array van extra veldidentificatoren die tijdens de gebruikersregistratie moeten worden ingevuld.

### `required_profile_fields`

**Verplichte velden tijdens registratie**

Array van profielveldnamen (email, phone, language, official_code) die tijdens de registratie moeten worden opgegeven.

### `send_inscription_msg_to_inbox`

**Stuur het welkomstbericht naar e-mail en inbox**

Standaard wordt het welkomstbericht (met inloggegevens) alleen per e-mail verzonden. Schakel deze optie in om het ook naar de Chamilo-inbox van de gebruiker te sturen.

*Standaard: `false`*

### `sessionadmin_autosubscribe`

**Automatische inschrijving voor sessiebeheerder**

Automatische inschrijving voor sessiebeheerder - nog niet beschikbaar

### `student_autosubscribe`

**Automatische inschrijving voor leerling**

Automatische inschrijving voor leerling - nog niet beschikbaar

### `teacher_autosubscribe`

**Automatische inschrijving voor docent**

Automatische inschrijving voor docent - nog niet beschikbaar

### `user_hide_never_expire_option`

**Verberg 'nooit verlopen' optie voor gebruikers**

Verwijder de optie 'nooit verlopen' bij het aanmaken/bewerken van een gebruikersaccount.

*Standaard: `false`*