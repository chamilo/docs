# OAuth 2.1-autorisationsserver og MCP-klienter

Chamilo kan fungere som en **OAuth-autorisationsserver** for klienter, der opretter forbindelse til dens beskyttede ressourcer. Dette er en anden funktion end [OAuth2-login](oauth2.md), hvor Chamilo bruger en ekstern identitetsudbyder til at logge brugere ind.

## Aktivér og konfigurer

Under **Administration > Konfigurationsindstillinger > Sikkerhed** skal du aktivere `security.oauth_server_enabled`. MCP-adgang afhænger også af den eksisterende konfiguration `security.mcp_enabled` og brugerens tilladte MCP-rolle.

Serveren eksponerer standardruter til autorisation, token, registrering og tilbagekaldelse (`/oauth/authorize`, `/oauth/token`, `/oauth/register`, `/oauth/revoke`) samt discovery-metadata. Kun HTTPS bør anvendes til produktionsklienter.

## Registrer en klient

Chamilo understøtter offentlige PKCE-klienter med autorisationskode og registrerede fortrolige klienter. Dynamisk klientregistrering (DCR) bruger `/oauth/register` og er hastighedsbegrænset. Indstillingen `security.dynamic_client_registration` er **deaktiveret som standard**; slutpunktet forbliver tilgængeligt for det understøttede MCP-registreringsflow, mens indstillingen styrer de yderligere klientscopes, der accepteres ved registrering. Antag ikke, at aktivering af indstillingen gør vilkårlige beskyttede API'er tilgængelige.

Registrerede klienter har en serversideliste over **tilladte ressourcer**. I øjeblikket definerer ressourceregistret kun **MCP**-ressourcen og scopet `mcp`. Nye beskyttede ressourcer kræver eksplicit serverimplementering og tilladelsesbeslutninger, ikke blot tilføjelse af en ukendt URL til en anmodning. Chamilo validerer RFC 8707-parameteren `resource` gennem hele autorisations- og tokenhåndteringen.

## Brugersamtykke og revision

1. En klient starter en anmodning om autorisationskode med PKCE (`S256`) og det anmodede scope/den anmodede ressource.
2. Brugeren autentificerer sig med sit almindelige Chamilo-login, hvis det er nødvendigt.
3. Chamilo viser klientidentiteten, registreringsoplysningerne og den adgang, der anmodes om, på en samtykkeskærm.
4. Brugeren vælger **Tillad** eller **Afvis**. En godkendelse registreres som en del af serverens samtykkehistorik, og oplysninger om tidligere godkendelser kan vises ved senere anmodninger.

Samtykke er bundet til den anmodning, der vises for brugeren. En godkendt anmodning giver ikke adgang til andre beskyttede ressourcer eller vilkårlig adgang ud over de anmodede tilladelser.

## Bemærkninger om udrulning og sikkerhed

OAuth 2.1-opdateringerne introducerer et felt for tilladte ressourcer for klienter og vedvarende registreringer af klientsamtykke. Anvend de **specifikke Chamilo-databasemigrationer**, der følger med udgivelsen, før det opdaterede flow aktiveres. Hold callback-URL'er og OAuth-klienthemmeligheder private. Klientregistrering giver ikke ubegrænset adgang til Chamilo-brugere eller -kurser.

Implementeringsreference: [OAuth-klientregistrering og samtykke, PR #9231](https://github.com/chamilo/chamilo-lms/pull/9231).