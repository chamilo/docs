# CAS-indstillinger

Ældre CAS-konfiguration (Central Authentication Service) overført fra Chamilo 1.x. Se [CAS](../authentication/cas.md) for den aktuelle status for CAS-godkendelsesmodulet i Chamilo 3.x.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > CAS**. Denne kategori indeholder **7 indstillinger**, som er anført nedenfor med den titel og kommentar, der leveres i platformens indstillingsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med fastbreddeskrift. Brug det, når du script'er via API'et, eller når du skal ændre disse indstillinger på globalt niveau ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `cas_activate`

**Aktivér CAS-godkendelse**

Aktivering af CAS-godkendelse giver brugerne mulighed for at logge ind med deres CAS-legitimationsoplysninger.<br/>Gå til <a href='settings.php?category=CAS'>Plugin</a> for at tilføje en konfigurerbar knap til 'CAS-login' på dit Chamilo-campus. Du kan også tvinge CAS-godkendelse ved at indstille cas[force_redirect] i app/config/auth.conf.php.

### `cas_add_user_activate`

**Aktivér tilføjelse af CAS-brugere**

Aktivér tilføjelse af CAS-brugere. For at oprette brugerkontoen ud fra LDAP-kataloget skal extldap_config og extldap_user_correspondance udfyldes i app/config/auth.conf.php

### `cas_port`

**Primær CAS-serverport**

Den port, der skal bruges til at oprette forbindelse til den primære CAS-server

### `cas_protocol`

**Primær CAS-serverprotokol**

Den protokol, der bruges til at oprette forbindelse til CAS-serveren

### `cas_server`

**Primær CAS-server**

Dette er den primære CAS-server, der vil blive brugt til godkendelse (IP-adresse eller værtsnavn)

### `cas_server_uri`

**Primær CAS-server-URI**

Stien til CAS-tjenesten

### `update_user_info_cas_with_ldap`

**Opdater kontooplysninger for CAS-godkendte brugere fra LDAP**

Sikrer, at brugerens fornavn, efternavn og e-mailadresse er de samme som de aktuelle værdier i LDAP-kataloget