# OAuth 2.1-autorisasjonsserver og MCP-klienter

Chamilo kan fungere som en **OAuth-autorisasjonsserver** for klienter som kobler seg til de beskyttede ressursene. Dette er en annen funksjon enn [OAuth2-pålogging](oauth2.md), der Chamilo bruker en ekstern identitetsleverandør for å logge brukere inn.

## Aktiver og konfigurer

Under **Administrasjon > Konfigurasjonsinnstillinger > Sikkerhet**, aktiver `security.oauth_server_enabled`. MCP-tilgang avhenger også av den eksisterende konfigurasjonen `security.mcp_enabled` og brukerens tillatte MCP-rolle.

Serveren eksponerer standardruter for autorisasjon, token, registrering og tilbakekalling (`/oauth/authorize`, `/oauth/token`, `/oauth/register`, `/oauth/revoke`) samt oppdagelsesmetadata. Kun HTTPS bør brukes for produksjonsklienter.

## Registrer en klient

Chamilo støtter offentlige PKCE-klienter med autorisasjonskode og registrerte konfidensielle klienter. Dynamisk klientregistrering (DCR) bruker `/oauth/register` og er hastighetsbegrenset. Innstillingen `security.dynamic_client_registration` er **deaktivert som standard**; endepunktet forblir tilgjengelig for den støttede MCP-registreringsflyten, mens innstillingen styrer de ytterligere klientomfangene som godtas ved registrering. Ikke anta at det å slå innstillingen av eller på gjør vilkårlige beskyttede API-er tilgjengelige.

Registrerte klienter har en serverside-liste over **tillatte ressurser**. For øyeblikket definerer ressursregisteret bare **MCP**-ressursen og omfanget `mcp`. Nye beskyttede ressurser krever eksplisitt serverimplementering og tillatelsesbeslutninger, ikke bare at en ukjent URL legges til i en forespørsel. Chamilo validerer RFC 8707-parameteren `resource` gjennom hele autorisasjons- og tokenhåndteringen.

## Brukersamtykke og revisjon

1. En klient starter en forespørsel om autorisasjonskode med PKCE (`S256`) og det forespurte omfanget/ressursen.
2. Brukeren autentiserer seg med vanlig Chamilo-pålogging om nødvendig.
3. Chamilo viser klientidentiteten, registreringsdetaljene og den forespurte tilgangen på et samtykkeskjermbilde.
4. Brukeren velger **Tillat** eller **Avslå**. En godkjenning registreres som en del av serverens samtykkehistorikk, og informasjon om tidligere godkjenninger kan vises ved senere forespørsler.

Samtykket er knyttet til forespørselen som vises for brukeren. En godkjent forespørsel gir ikke tilgang til andre beskyttede ressurser eller vilkårlig tilgang utover de forespurte tillatelsene.

## Merknader om distribusjon og sikkerhet

OAuth 2.1-oppdateringene innfører et felt for tillatte ressurser for klienter og vedvarende poster for klientsamtykke. Bruk de **spesifikke Chamilo-databasemigrasjonene** som følger med utgivelsen, før du aktiverer den oppdaterte flyten. Hold callback-URL-er og OAuth-klienthemmeligheter private. Klientregistrering gir ikke ubegrenset tilgang til Chamilo-brukere eller -kurs.

Implementeringsreferanse: [OAuth-klientregistrering og samtykke, PR #9231](https://github.com/chamilo/chamilo-lms/pull/9231).