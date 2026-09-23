# CAS-inställningar

Äldre CAS-konfiguration (Central Authentication Service) som förts över från Chamilo 1.x. Se [CAS](../authentication/cas.md) för aktuell status för CAS-autentiseraren i Chamilo 3.x.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > CAS**. Denna kategori innehåller **7 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det när du skriptar via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `cas_activate`

**Aktivera CAS-autentisering**

Aktivering av CAS-autentisering gör det möjligt för användare att autentisera sig med sina CAS-uppgifter.<br/>Gå till <a href='settings.php?category=CAS'>Plugin</a> för att lägga till en konfigurerbar knapp för "CAS-inloggning" på din Chamilo-campus. Du kan också tvinga CAS-autentisering genom att ställa in cas[force_redirect] i app/config/auth.conf.php.

### `cas_add_user_activate`

**Aktivera tillägg av CAS-användare**

Aktivera tillägg av CAS-användare. För att skapa användarkontot från LDAP-katalogen måste tabellerna extldap_config och extldap_user_correspondance fyllas i i app/config/auth.conf.php

### `cas_port`

**Huvudsaklig CAS-serverport**

Porten som används för anslutning till den huvudsakliga CAS-servern

### `cas_protocol`

**Huvudsakligt CAS-serverprotokoll**

Protokollet som används för anslutning till CAS-servern

### `cas_server`

**Huvudsaklig CAS-server**

Detta är den huvudsakliga CAS-servern som används för autentisering (IP-adress eller värdnamn)

### `cas_server_uri`

**Huvudsaklig CAS-server-URI**

Sökvägen till CAS-tjänsten

### `update_user_info_cas_with_ldap`

**Uppdatera kontoinformation för CAS-autentiserade användare från LDAP**

Säkerställer att användarens förnamn, efternamn och e-postadress överensstämmer med aktuella värden i LDAP-katalogen