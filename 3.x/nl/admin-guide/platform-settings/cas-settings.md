# CAS-instellingen

Legacy CAS-configuratie (Central Authentication Service) overgenomen uit Chamilo 1.x. Zie [CAS](../authentication/cas.md) voor de huidige status van de CAS-authenticator in Chamilo 3.x.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > CAS**. Deze categorie bevat **7 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code staat in monospace. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `cas_activate`

**CAS-authenticatie inschakelen**

Het inschakelen van CAS-authenticatie laat gebruikers toe zich te authenticeren met hun CAS-gegevens.<br/>Ga naar <a href='settings.php?category=CAS'>Plugin</a> om een configureerbare knop 'CAS Login' toe te voegen voor uw Chamilo-campus. U kunt CAS-authenticatie ook forceren door cas[force_redirect] in te stellen in app/config/auth.conf.php.

### `cas_add_user_activate`

**CAS-gebruikersaanmaak inschakelen**

CAS-gebruikersaanmaak inschakelen. Om het gebruikersaccount vanuit de LDAP-directory aan te maken, moeten de tabellen extldap_config en extldap_user_correspondance ingevuld zijn in app/config/auth.conf.php

### `cas_port`

**Poort van de hoofd-CAS-server**

De poort waarmee verbinding wordt gemaakt met de hoofd-CAS-server

### `cas_protocol`

**Protocol van de hoofd-CAS-server**

Het protocol waarmee we verbinding maken met de CAS-server

### `cas_server`

**Hoofd-CAS-server**

Dit is de hoofd-CAS-server die voor de authenticatie wordt gebruikt (IP-adres of hostnaam)

### `cas_server_uri`

**URI van de hoofd-CAS-server**

Het pad naar de CAS-service

### `update_user_info_cas_with_ldap`

**Accountgegevens van CAS-geauthenticeerde gebruikers bijwerken vanuit LDAP**

Zorgt ervoor dat de voornaam, achternaam en het e-mailadres van de gebruiker overeenkomen met de huidige waarden in de LDAP-directory