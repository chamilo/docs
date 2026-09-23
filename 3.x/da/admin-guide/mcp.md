# MCP (Model Context Protocol)

Chamilo 3.0 stiller en MCP-server til rådighed, så AI-assistenter og agenter (Claude, ChatGPT-connectors eller enhver MCP-kompatibel klient) kan handle inde i platformen på vegne af en autentificeret bruger og med den pågældende brugers egne tilladelser — der findes ingen separat servicekonto eller forhøjet adgang.

## Hvad MCP tilføjer til Chamilo

MCP (Model Context Protocol) er en åben standard, der lader AI-klienter kalde et defineret sæt "værktøjer", som en server stiller til rådighed. Chamilos MCP-server nås via et enkelt endepunkt, `/mcp`, og stiller et udvalgt sæt lærerrettede værktøjer til kursusstyring til rådighed frem for hele API-overfladen.

## Tilgængelige funktioner

Hvert kald kører som den tilknyttede bruger, så et værktøj kun nogensinde ser og ændrer kurser, som den bruger administrerer. Det aktuelle værktøjssæt:

| Værktøj | Hvad det gør |
|------|---------------|
| Current user | Returnerer identitet og roller for den autentificerede bruger |
| Teacher courses | Lister kurser, som brugeren administrerer som lærer |
| Course overview | Returnerer grundlæggende kursusoplysninger og antal ressourcer |
| Create course | Opretter et nyt kursus efter platformens regler for kursusoprettelse |
| Create course assignment | Opretter en kladde eller en offentliggjort opgave med en beskrivelse og maksimal score |
| Create course test | Opretter en AI-assisteret multiple choice-test ud fra en emnebeskrivelse eller et eksisterende dokument |
| Get course test response status | Rapporterer, hvilke studerende der har svaret, er i gang eller afventer på en test |
| Get user course test score | Returnerer en studerendes seneste og bedste gennemførte scores på en test |
| Create training satisfaction survey | Opretter en tilfredshedsundersøgelse med syv spørgsmål |
| Create course learning path | Opretter et læringsforløb ud fra sider, som MCP-klienten leverer |
| List documents | Lister dokumenterne i et kursus' Documents-værktøj |
| Read course document | Returnerer HTML-indhold, titel og metadata for et redigerbart dokument |
| Edit course document | Erstatter det fulde HTML-indhold i et eksisterende redigerbart dokument |
| Create course document | Opretter et AI-assisteret HTML-dokument i rodmappen Documents |
| Create course illustration | Genererer en AI-illustration til et emne og gemmer den som et dokument |
| Illustrate document paragraph | Indsætter et eksisterende billede eller en video før eller efter et afsnit i et dokument |
| Find recent course forum activity | Finder nylige, synlige forumindlæg relateret til et emne |
| Review course quality | Analyserer et kursus' læringsforløb, dokumenter, tests, opgaver og undersøgelser og returnerer forbedringsanbefalinger |

Denne liste kurateres af Chamilo-kerneteamet og kan ikke udvides af brugere inde fra platformen — lærere kan ikke tilføje deres egne værktøjer.

## Hvordan brugere opretter forbindelse

### Personlig MCP API-nøgle

Hver bruger genererer sin egen nøgle under **Socialt netværk** > **MCP API-nøgle**:

![Siden MCP API-nøgle, der viser en inaktiv nøgle, knappen Generer API-nøgle og blokken Fjern-MCP-forbindelse med endepunkts-URL og formatet for Authorization-headeren](/.gitbook/assets/admin-mcp-api-key.png)

* Når man klikker på **Generer API-nøgle**, oprettes en nøgle, som vises én gang — Chamilo gemmer derefter kun en maskeret version, så den fulde nøgle skal kopieres og opbevares sikkert med det samme.
* Generering af en ny nøgle tilbagekalder straks den forrige.
* Siden viser nøglens status (aktiv/inaktiv), MCP-endepunktet, der skal konfigureres i klienten, samt oprettelses- og sidst-brugt-datoer.
* Panelet **Fjern-MCP-forbindelse** angiver præcist, hvad der skal indsættes i MCP-klienten: endepunkts-URL'en og en `Authorization: Bearer <your MCP API key>`-header.

Som siden selv bemærker, autentificerer nøglen klienten som den pågældende brugers konto — den giver ikke nogen tilladelse, som kontoen ikke allerede har.

### OAuth 2.1 (fjernklienter og connectors)

For MCP-klienter, der understøtter OAuth-opdagelse og dynamisk klientregistrering (frem for en manuelt indsat nøgle), fungerer Chamilo også som en OAuth 2.1-autorisationsserver: klienten opdager Chamilos endepunkter, registrerer sig selv og omdirigerer brugeren til `/oauth/authorize` for at godkende adgang. Godkendte applikationer vises under **Socialt netværk** > **Autoriserede applikationer**, hvor brugeren kan tilbagekalde dem, de ikke længere bruger eller genkender.

## Sikkerhedsovervejelser

* **Ingen privilegieeskalering.** Hvert MCP-værktøjskald og hver OAuth-autoriseret app kører med den tilsluttende brugers egne Chamilo-rettigheder — en personlig API-nøgle eller en autoriseret app kan aldrig gøre mere, end brugeren allerede kunne gøre manuelt.
* **Kun Bearer, ratebegrænset.** `/mcp` accepterer kun et Bearer-legitimationsbevis — en personlig MCP API-nøgle, et OAuth-adgangstoken eller (under udvikling) et JWT. Autentificeringsforsøg er ratebegrænset pr. IP-adresse for at bremse gætning af legitimationsoplysninger.
* **Smal offentlig overflade.** Den eneste uautentificerede trafik, `/mcp` accepterer, er `OPTIONS`-preflight; hvert egentligt kald kræver `ROLE_USER`. OAuth-discovery, dynamisk klientregistrering og token-endepunkter er bevidst offentlige, som krævet af OAuth 2.1- / MCP-specifikationerne — dette giver ikke adgang i sig selv, det lader kun en klient lære, hvordan autorisationsflowet startes.
* **DNS-rebinding-beskyttelse er bevidst deaktiveret for `/mcp`.** Bundtet, der implementerer MCP, begrænser normalt endepunktet til `localhost`, medmindre en statisk liste over tilladte værtsnavne er konfigureret — en dårlig pasform til en Chamilo-portal med flere URL'er, der kan nås under mange værtsnavne. Chamilo deaktiverer det tjek, fordi det er redundant her: hver `/mcp`-anmodning kræver allerede et Bearer-legitimationsbevis uanset dens `Host`/`Origin`-header, og et DNS-rebinding-angreb (som bygger på omgivende, cookie-lignende autentificering, der følger med en forfalsket Host) kan ikke forfalske et bearer-token, det ikke allerede har.

## Konfiguration af MCP-serveren

I modsætning til de fleste integrationer i denne vejledning har MCP ingen indstillingsside i administrationspanelet — den konfigureres på filniveau, i `config/packages/mcp.yaml`, og kræver shell-adgang til serveren:

| Nøgle | Formål |
|-----|---------|
| `app`, `version`, `description` | Identitet, som Chamilo rapporterer til tilsluttende MCP-klienter |
| `client_transports.stdio` / `client_transports.http` | Hvilke transporter der er aktive; Chamilo aktiverer begge som standard |
| `http.path` | MCP HTTP-endepunktet (`/mcp` som standard) |
| `http.allowed_hosts` | DNS-rebinding-værtsallowlist — sat til `false` på Chamilo (se Sikkerhedsovervejelser ovenfor) |
| `http.session.store`, `.directory`, `.ttl` | Hvor MCP-sessionstilstand persisteres, og hvor længe |

For at deaktivere MCP-serveren helt skal du sætte `client_transports.http: false` (og `stdio: false`, hvis CLI-transporten også skal slås fra) og rydde cachen:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

## Tips

* Behandl en MCP API-nøgle som en adgangskode — enhver, der har den, kan handle som den bruger via enhver MCP-klient.
* Opfordr brugere til periodisk at gennemgå **Autoriserede applikationer** og tilbagekalde alt, de ikke genkender.
* Se [AI-konfiguration](integrations/ai-configuration.md) for de AI-udbydere, der understøtter indholdsgenereringsværktøjerne (oprettelse af tests, oprettelse af dokumenter, illustrationer) nævnt ovenfor.