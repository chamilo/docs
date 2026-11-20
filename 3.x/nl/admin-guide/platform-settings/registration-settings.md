# Registratie-instellingen

Beleid voor zelfregistratie en omleidingen na registratie — wat nieuwe gebruikers wordt gevraagd en waar zij terechtkomen.

Open deze instellingen via **Beheer > Configuratie-instellingen > Registratie**. Deze categorie bevat **21 instellingen**, hieronder vermeld met de titel en het commentaar zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_double_validation_in_registration`

**Dubbele validatie voor het registratieproces**

Toon eenvoudig een bevestigingsverzoek op de registratiepagina voordat de aanmaak van de gebruiker wordt voortgezet.

*Standaard: `false`*


### `allow_fields_inscription`

**Velden beperken die tijdens registratie worden getoond**

Als u slechts enkele van de beschikbare profielvelden wilt tonen, kunt u de array hier aanvullen met de subelementen 'fields' en 'extra_fields', die arrays bevatten met een lijst van de te tonen velden.

### `allow_invitation_registration` **v3**

**Registratie via uitnodigingslinks voor cursussen toestaan**

Indien ingeschakeld, kan een docent/beheerder vanuit het gebruikershulpmiddel van een cursus een eenmalige uitnodigingslink versturen waarmee een niet-geregistreerde persoon het registratieformulier kan bereiken en zich kan registreren, zelfs wanneer algemene zelfregistratie (`allow_registration`) is uitgeschakeld.

*Standaard: `false`*

Zie [Gebruikers inschrijven](../../teacher-guide/assessing-learners/subscribing-users.md#inviting-users-by-email) voor de docentgerichte kant van deze functie.

### `allow_lostpassword`

**Wachtwoord vergeten**

Mogen gebruikers hun vergeten wachtwoord opvragen?

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

Deze optie toont de algemene voorwaarden in het registratieformulier voor nieuwe gebruikers. Moet eerst worden geconfigureerd op de beheerpagina van het portaal.

*Standaard: `false`*

Indien ingeschakeld, kan een platformbeheerder, of een leidinggevende van een cursist, de overeenkomst van een cursist beheren vanaf drie plaatsen: de gebruikersinformatiepagina (**Beheer > Gebruikers**, vervolgens de gebruiker), de trackingpagina van de cursist in **Rapportage** en de cursistenpagina van de globale rapportage (`/reporting/learners/<id>`). De knop is overal dezelfde:

* **Juridische overeenkomst verzenden** stuurt de cursist een bericht, ondertekend met de naam van de afzender, waarin wordt gevraagd de algemene voorwaarden te ondertekenen, met een link naar het adres dat is ingesteld in [`course_validation_terms_and_conditions_url`](course-settings.md#course_validation_terms_and_conditions_url).
* **Juridische overeenkomst verwijderen** verschijnt zodra de cursist heeft geaccepteerd, en verwijdert die acceptatie, zodat de cursist opnieuw wordt gevraagd de algemene voorwaarden te accepteren.


### `hrm_autosubscribe`

**Automatisch inschrijven van humanresourcesmanager**

Cursuscodes gescheiden door `|` (bijvoorbeeld `COURSE001|COURSE002`). Wanneer een HRM inlogt, schrijft Chamilo de gebruiker automatisch in voor de vermelde cursussen zonder de gebruikersrol te wijzigen. De oude instellingsnaam `registration.drh_autosubscribe` blijft herkend voor compatibiliteit.

### `extendedprofile_registration`

**Portfoliovelden bij registratie**

Welke van de volgende portfoliovelden moeten beschikbaar zijn in het gebruikersregistratieproces? Hiervoor moet de portfolio-optie zijn ingeschakeld (zie hierboven).

### `extendedprofile_registrationrequired`

**Verplichte portfoliovelden bij registratie**

Welke van de volgende portfoliovelden zijn *verplicht* in het gebruikersregistratieproces? Hiervoor moet de portfolio-optie zijn ingeschakeld en moet het veld ook beschikbaar zijn in het registratieformulier (zie hierboven).

### `extldap_config`

**LDAP-verbindingsconfiguratie**

Array die host en poort voor de LDAP-server definieert.

### `hide_legal_accept_checkbox`

**Selectievakje voor juridische acceptatie verbergen op de pagina Algemene voorwaarden**

Indien ingesteld op true, verwijdert dit het selectievakje "Ik heb gelezen en accepteer" in de flow van de pagina Algemene voorwaarden.

*Standaard: `false`*


### `platform_unsubscribe_allowed`

**Uitschrijven van het platform toestaan**

Door deze optie in te schakelen, staat u elke gebruiker toe zijn eigen account en alle daaraan gerelateerde gegevens definitief van het platform te verwijderen. Dit is een vrij radicale actie, maar noodzakelijk voor portalen die openstaan voor het publiek waar gebruikers zich zelf kunnen registreren. Er verschijnt een extra item in het gebruikersprofiel om zich na bevestiging uit te schrijven.

*Standaard: `false`*

### `redirect_after_login`

**Omleiding na aanmelding (per profiel)**

Definieer de omleiding per profiel na aanmelding met een JSON-object zoals {"STUDENT":"", "ADMIN":"admin-dashboard"}

*Standaard:*
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

Gebruik de rolsleutel `HRM` in nieuwe omleidingsconfiguraties. Bestaande toewijzingen die `DRH` bevatten, worden nog steeds gelezen voor compatibiliteit; als beide sleutels aanwezig zijn, heeft `HRM` voorrang.

### `required_extra_fields_in_inscription`

**Verplichte extra velden tijdens registratie**

Array van extra veldidentificatoren die tijdens de gebruikersregistratie moeten worden ingevuld.

### `required_profile_fields`

**Verplichte velden tijdens registratie**

Array van profielveldnamen (email, phone, language, official_code) die tijdens de registratie moeten worden opgegeven.

### `send_inscription_msg_to_inbox`

**Welkomstbericht naar e-mail en inbox verzenden**

Standaard wordt het welkomstbericht (met inloggegevens) alleen per e-mail verzonden. Schakel deze optie in om het ook naar de Chamilo-inbox van de gebruiker te verzenden.

*Standaard: `false`*


### `sessionadmin_autosubscribe`

**Automatisch inschrijven van sessiebeheerder**

Automatisch inschrijven van sessiebeheerder - nog niet beschikbaar

### `student_autosubscribe`

**Automatisch inschrijven van cursist**

Automatisch inschrijven van cursist - nog niet beschikbaar

### `teacher_autosubscribe`

**Automatisch inschrijven van docent**

Automatisch inschrijven van docent - nog niet beschikbaar

### `user_hide_never_expire_option`

**Optie 'verloopt nooit' voor gebruikers verbergen**

Verwijder de optie 'verloopt nooit' bij het aanmaken of bewerken van een gebruikersaccount.

*Standaard: `false`*