# OAuth 2.1-autorisatieserver en MCP-clients

Chamilo kan fungeren als een **OAuth-autorisatieserver** voor clients die verbinding maken met de beveiligde bronnen. Dit is een andere functie dan [OAuth2-aanmelding](oauth2.md), waarbij Chamilo een externe identiteitsprovider gebruikt om gebruikers aan te melden.

## Inschakelen en configureren

Onder **Beheer > Configuratie-instellingen > Beveiliging** schakelt u `security.oauth_server_enabled` in. MCP-toegang hangt ook af van de bestaande configuratie `security.mcp_enabled` en de toegestane MCP-rol van de gebruiker.

De server biedt standaardroutes voor autorisatie, tokens, registratie en intrekking (`/oauth/authorize`, `/oauth/token`, `/oauth/register`, `/oauth/revoke`) en discovery-metadata. Voor productieclients mag alleen HTTPS worden gebruikt.

## Een client registreren

Chamilo ondersteunt openbare PKCE-clients met autorisatiecode en geregistreerde vertrouwelijke clients. Dynamische clientregistratie (DCR) gebruikt `/oauth/register` en is onderworpen aan een snelheidslimiet. De instelling `security.dynamic_client_registration` is **standaard uitgeschakeld**; het eindpunt blijft beschikbaar voor de ondersteunde MCP-registratiestroom, terwijl de instelling de extra clientscopes bepaalt die bij registratie worden geaccepteerd. Ga er niet van uit dat het inschakelen van de instelling willekeurige beveiligde API's beschikbaar maakt.

Geregistreerde clients hebben een serverzijde-lijst met **toegestane bronnen**. Momenteel definieert het bronnenregister alleen de bron **MCP** en de scope `mcp`. Nieuwe beveiligde bronnen vereisen een expliciete serverimplementatie en beslissingen over machtigingen, niet slechts het toevoegen van een niet-herkende URL aan een verzoek. Chamilo valideert RFC 8707-parameters `resource` tijdens de volledige autorisatie- en tokenafhandeling.

## Gebruikerstoestemming en audit

1. Een client start een autorisatiecodeverzoek met PKCE (`S256`) en de gevraagde scope/bron.
2. De gebruiker authenticeert zich indien nodig met de gewone Chamilo-aanmelding.
3. Chamilo toont de identiteit van de client, de registratiegegevens en de gevraagde toegang op een toestemmingsscherm.
4. De gebruiker kiest **Toestaan** of **Weigeren**. Een goedkeuring wordt vastgelegd als onderdeel van de toestemmingsgeschiedenis van de server, en informatie over eerdere goedkeuringen kan bij latere verzoeken worden weergegeven.

Toestemming is gebonden aan het verzoek dat aan de gebruiker is getoond. Een goedgekeurd verzoek verleent geen andere beveiligde bronnen of willekeurige toegang buiten de gevraagde machtigingen.

## Opmerkingen over implementatie en beveiliging

De OAuth 2.1-updates introduceren een veld voor toegestane bronnen voor clients en persistente records van clienttoestemming. Pas de **specifieke Chamilo-databasemigraties** toe die bij de release worden geleverd voordat u de bijgewerkte stroom inschakelt. Houd callback-URL's en OAuth-clientgeheimen privé. Clientregistratie verleent geen onbeperkte toegang tot Chamilo-gebruikers of -cursussen.

Implementatiereferentie: [OAuth-clientregistratie en toestemming, PR #9231](https://github.com/chamilo/chamilo-lms/pull/9231).