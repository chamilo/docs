# CAS-instellingen

Oude CAS (Central Authentication Service) configuratie overgenomen uit Chamilo 1.x. Zie [CAS](../authentication/cas.md) voor de huidige status van de CAS-authenticator in Chamilo 2.x.

Toegang tot deze instellingen vindt u onder **Beheer > Configuratie-instellingen > CAS**. Deze categorie bevat **7 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de platforminstellingen (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `cas_activate`

**CAS-authenticatie inschakelen**

Het inschakelen van CAS-authenticatie stelt gebruikers in staat om zich te authenticeren met hun CAS-inloggegevens.<br/>Ga naar <a href='settings.php?category=CAS'>Plugin</a> om een configureerbare 'CAS Login'-knop toe te voegen voor uw Chamilo-campus. U kunt ook CAS-authenticatie afdwingen door cas[force_redirect] in te stellen in app/config/auth.conf.php.

### `cas_add_user_activate`

**CAS-gebruikers toevoegen inschakelen**

Schakel het toevoegen van CAS-gebruikers in. Om het gebruikersaccount aan te maken vanuit de LDAP-directory, moeten de tabellen extldap_config en extldap_user_correspondance worden ingevuld in app/config/auth.conf.php.

### `cas_port`

**Hoofd CAS-serverpoort**

De poort waarop verbinding wordt gemaakt met de hoofd CAS-server.

### `cas_protocol`

**Hoofd CAS-serverprotocol**

Het protocol waarmee we verbinding maken met de CAS-server.

### `cas_server`

**Hoofd CAS-server**

Dit is de hoofd CAS-server die wordt gebruikt voor de authenticatie (IP-adres of hostnaam).

### `cas_server_uri`

**Hoofd CAS-server URI**

Het pad naar de CAS-service.

### `update_user_info_cas_with_ldap`

**Gebruikersaccountinformatie van CAS-geauthenticeerde gebruikers bijwerken vanuit LDAP**

Zorgt ervoor dat de voornaam, achternaam en e-mailadres van de gebruiker overeenkomen met de huidige waarden in de LDAP-directory.