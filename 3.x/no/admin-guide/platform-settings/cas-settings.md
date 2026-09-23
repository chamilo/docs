# CAS-innstillinger

Eldre CAS-konfigurasjon (Central Authentication Service) videreført fra Chamilo 1.x. Se [CAS](../authentication/cas.md) for gjeldende status for CAS-autentikatoren i Chamilo 3.x.

Åpne disse innstillingene under **Administrasjon > Konfigurasjonsinnstillinger > CAS**. Denne kategorien inneholder **7 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `cas_activate`

**Aktiver CAS-autentisering**

Aktivering av CAS-autentisering gjør at brukere kan autentisere seg med CAS-legitimasjonen sin.<br/>Gå til <a href='settings.php?category=CAS'>Plugin</a> for å legge til en konfigurerbar «CAS Login»-knapp for Chamilo-campusen din. Du kan også tvinge CAS-autentisering ved å sette cas[force_redirect] i app/config/auth.conf.php.

### `cas_add_user_activate`

**Aktiver oppretting av CAS-brukere**

Aktiver oppretting av CAS-brukere. For å opprette brukerkontoen fra LDAP-katalogen må tabellene extldap_config og extldap_user_correspondance fylles ut i app/config/auth.conf.php

### `cas_port`

**Hovedport for CAS-server**

Porten som brukes for tilkobling til hoved-CAS-serveren

### `cas_protocol`

**Hovedprotokoll for CAS-server**

Protokollen som brukes for tilkobling til CAS-serveren

### `cas_server`

**Hoved-CAS-server**

Dette er hoved-CAS-serveren som brukes til autentisering (IP-adresse eller vertsnavn)

### `cas_server_uri`

**Hoved-URI for CAS-server**

Banen til CAS-tjenesten

### `update_user_info_cas_with_ldap`

**Oppdater kontoinformasjon for CAS-autentiserte brukere fra LDAP**

Sikrer at brukerens fornavn, etternavn og e-postadresse er de samme som gjeldende verdier i LDAP-katalogen