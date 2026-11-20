# MCP (Model Context Protocol)

Chamilo 3.0 eksponerer en MCP-server slik at KI-assistenter og agenter (Claude, ChatGPT-koblinger eller enhver MCP-kompatibel klient) kan handle inne i plattformen på vegne av en autentisert bruker, med brukerens egne tillatelser — det finnes ingen separat tjenestekonto eller forhøyet tilgang.

## Hva MCP tilfører Chamilo

MCP (Model Context Protocol) er en åpen standard som lar KI-klienter kalle et definert sett med «verktøy» eksponert av en server. Chamilos MCP-server er tilgjengelig på ett enkelt endepunkt, `/mcp`, og eksponerer et kuratert sett med lærerrettede verktøy for kursadministrasjon, ikke hele API-flaten.

## Tilgjengelige funksjoner

Hvert kall kjøres som den tilkoblede brukeren, slik at et verktøy kun ser og endrer kurs som brukeren administrerer. Det gjeldende verktøysettet:

| Verktøy | Hva det gjør |
|------|---------------|
| Current user | Returnerer identitet og roller for den autentiserte brukeren |
| Teacher courses | Lister kurs brukeren administrerer som lærer |
| Course overview | Returnerer grunnleggende kursinformasjon og antall ressurser |
| Create course | Oppretter et nytt kurs etter plattformens regler for kursopprettelse |
| Create course assignment | Oppretter en kladd eller publisert innlevering med beskrivelse og maksimal poengsum |
| Create course test | Oppretter en KI-assistert flervalgsprøve fra en emnebeskrivelse eller et eksisterende dokument |
| Get course test response status | Rapporterer hvilke studenter som har svart, er i gang eller venter på en prøve |
| Get user course test score | Returnerer en students siste og beste fullførte poengsum på en prøve |
| Create training satisfaction survey | Oppretter en tilfredshetsundersøkelse med sju spørsmål |
| Create course learning path | Oppretter en læringssti fra sider levert av MCP-klienten |
| List documents | Lister dokumentene i et kurs’ Documents-verktøy |
| Read course document | Returnerer HTML-innhold, tittel og metadata for et redigerbart dokument |
| Edit course document | Erstatter hele HTML-innholdet i et eksisterende redigerbart dokument |
| Create course document | Oppretter et KI-assistert HTML-dokument i rotmappen Documents |
| Create course illustration | Genererer en KI-illustrasjon for et emne og lagrer den som et dokument |
| Illustrate document paragraph | Setter inn et eksisterende bilde eller en video før eller etter et avsnitt i et dokument |
| Find recent course forum activity | Finner nylige, synlige foruminnlegg knyttet til et emne |
| Review course quality | Analyserer et kurs’ læringsstier, dokumenter, prøver, innleveringer og undersøkelser, og returnerer forbedringsanbefalinger |

Denne listen kurateres av Chamilo-kjerneteamet og kan ikke utvides av brukere inne i plattformen — lærere kan ikke legge til egne verktøy.

## Hvordan brukere kobler til

### Personlig MCP API-nøkkel

Hver bruker genererer sin egen nøkkel under **Sosialt nettverk** > **MCP API key**:

![Siden for MCP API-nøkkel, som viser en inaktiv nøkkel, knappen Generate API key og blokken Remote MCP connection med endepunkt-URL og format for Authorization-header](/.gitbook/assets/admin-mcp-api-key.png)

* Ved å klikke **Generate API key** opprettes en nøkkel som vises én gang — Chamilo lagrer deretter kun en maskert versjon, så den fulle nøkkelen må kopieres og lagres sikkert umiddelbart.
* Generering av en ny nøkkel tilbakekaller umiddelbart den forrige.
* Siden viser nøkkelens status (aktiv/inaktiv), MCP-endepunktet som skal konfigureres i klienten, samt opprettelsesdato og dato for siste bruk.
* Panelet **Remote MCP connection** angir nøyaktig hva som skal settes inn i MCP-klienten: endepunkt-URL og en `Authorization: Bearer <your MCP API key>`-header.

Som siden selv merker, autentiserer nøkkelen klienten som den brukerens konto — den gir ingen tillatelser kontoen ikke allerede har.

### OAuth 2.1 (eksterne klienter og koblinger)

For MCP-klienter som støtter OAuth-oppdagelse og dynamisk klientregistrering (i stedet for en manuelt innlimt nøkkel), opptrer Chamilo også som en OAuth 2.1-autorisasjonsserver: klienten oppdager Chamilos endepunkter, registrerer seg selv og omdirigerer brukeren til `/oauth/authorize` for å godkjenne tilgang. Godkjente applikasjoner vises under **Sosialt nettverk** > **Authorized applications**, der brukeren kan tilbakekalle dem de ikke lenger bruker eller kjenner igjen.

## Sikkerhetshensyn

* **Ingen privilegieeskalering.** Hvert MCP-verktøykall og hver OAuth-autorisert app kjører med den tilkoblede brukerens egne Chamilo-tillatelser — en personlig API-nøkkel eller en autorisert app kan aldri gjøre mer enn det brukeren allerede kunne gjøre manuelt.
* **Kun Bearer, med hastighetsbegrensning.** `/mcp` godtar kun et Bearer-legitimasjonsbevis — en personlig MCP API-nøkkel, et OAuth-aksess token, eller (i utvikling) en JWT. Autentiseringsforsøk er hastighetsbegrenset per IP-adresse for å bremse gjetting av legitimasjon.
* **Smal offentlig flate.** Den eneste uautentiserte trafikken `/mcp` godtar er `OPTIONS`-preflight; hvert faktiske kall krever `ROLE_USER`. OAuth-oppdagelse, dynamisk klientregistrering og token-endepunktene er bevisst offentlige, slik OAuth 2.1 / MCP-spesifikasjonene krever — dette gir ikke tilgang i seg selv, det lar bare en klient lære hvordan autoriseringsflyten startes.
* **DNS-rebinding-beskyttelse er bevisst deaktivert for `/mcp`.** Pakken som implementerer MCP begrenser vanligvis endepunktet til `localhost` med mindre en statisk liste over tillatte vertsnavn er konfigurert — en dårlig match for en Chamilo-portal med flere URL-er som er tilgjengelig under mange vertsnavn. Chamilo deaktiverer den sjekken fordi den er redundant her: hver `/mcp`-forespørsel krever allerede et Bearer-legitimasjonsbevis uavhengig av `Host`/`Origin`-headeren, og et DNS-rebinding-angrep (som baserer seg på omgivende, cookie-lignende autentisering som følger med en forfalsket Host) kan ikke forfalske et bearer-token det ikke allerede har.

## Konfigurere MCP-serveren

I motsetning til de fleste integrasjoner i denne veiledningen har MCP ingen innstillingsside i administrasjonspanelet — den konfigureres på filnivå, i `config/packages/mcp.yaml`, og krever skalltilgang til serveren:

| Nøkkel | Formål |
|-----|---------|
| `app`, `version`, `description` | Identitet Chamilo rapporterer til tilkoblede MCP-klienter |
| `client_transports.stdio` / `client_transports.http` | Hvilke transporter som er aktive; Chamilo aktiverer begge som standard |
| `http.path` | MCP HTTP-endepunktet (`/mcp` som standard) |
| `http.allowed_hosts` | DNS-rebinding-vertstillatelsesliste — sett til `false` på Chamilo (se Sikkerhetshensyn ovenfor) |
| `http.session.store`, `.directory`, `.ttl` | Hvor MCP-sesjonstilstand persisteres og hvor lenge |

For å deaktivere MCP-serveren helt, sett `client_transports.http: false` (og `stdio: false` hvis CLI-transporten også skal slås av) og tøm hurtigbufferen:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

## Tips

* Behandle en MCP API-nøkkel som et passord — hvem som helst som har den kan opptre som den brukeren gjennom hvilken som helst MCP-klient.
* Oppfordre brukere til jevnlig å gjennomgå **Autoriserte applikasjoner** og tilbakekalle alt de ikke kjenner igjen.
* Se [AI-konfigurasjon](integrations/ai-configuration.md) for AI-leverandørene som støtter innholdsgenereringsverktøyene (opprettelse av tester, opprettelse av dokumenter, illustrasjoner) listet ovenfor.