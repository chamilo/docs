# MCP (Model Context Protocol)

Chamilo 3.0 exponerar en MCP-server så att AI-assistenter och agenter (Claude, ChatGPT-anslutningar eller vilken MCP-kompatibel klient som helst) kan agera inne i plattformen å en autentiserad användares vägnar, med den användarens egna behörigheter — det finns inget separat tjänstekonto eller förhöjd åtkomst.

## Vad MCP tillför Chamilo

MCP (Model Context Protocol) är en öppen standard som låter AI-klienter anropa en definierad uppsättning "verktyg" som exponeras av en server. Chamilos MCP-server nås via en enda slutpunkt, `/mcp`, och exponerar en utvald uppsättning lärarorienterade verktyg för kursadministration snarare än hela API-ytan.

## Tillgängliga funktioner

Varje anrop körs som den anslutna användaren, så ett verktyg ser och ändrar endast kurser som den användaren administrerar. Den aktuella verktygsuppsättningen:

| Verktyg | Vad det gör |
|------|---------------|
| Current user | Returnerar identitet och roller för den autentiserade användaren |
| Teacher courses | Listar kurser som användaren administrerar som lärare |
| Course overview | Returnerar basinformation om kursen och antal resurser |
| Create course | Skapar en ny kurs enligt plattformens regler för kursskapande |
| Create course assignment | Skapar ett utkast eller en publicerad uppgift med beskrivning och maxpoäng |
| Create course test | Skapar ett AI-assisterat flervalsprov från en ämnesbeskrivning eller ett befintligt dokument |
| Get course test response status | Rapporterar vilka studenter som har svarat, är pågående eller väntar på ett prov |
| Get user course test score | Returnerar en students senaste och bästa slutförda poäng på ett prov |
| Create training satisfaction survey | Skapar en tillfredsställelseenkät med sju frågor |
| Create course learning path | Skapar en lärstig från sidor som tillhandahålls av MCP-klienten |
| List documents | Listar dokumenten i kursens Dokument-verktyg |
| Read course document | Returnerar HTML-innehåll, titel och metadata för ett redigerbart dokument |
| Edit course document | Ersätter hela HTML-innehållet i ett befintligt redigerbart dokument |
| Create course document | Skapar ett AI-assisterat HTML-dokument i rotmappen för Dokument |
| Create course illustration | Genererar en AI-illustration för ett ämne och sparar den som ett dokument |
| Illustrate document paragraph | Infogar en befintlig bild eller video före eller efter ett stycke i ett dokument |
| Find recent course forum activity | Hittar nyligen publicerade, synliga foruminlägg relaterade till ett ämne |
| Review course quality | Analyserar en kurs lärstigar, dokument, prov, uppgifter och enkäter och returnerar förbättringsrekommendationer |

Listan kureras av Chamilo-kärnteamet och är inte utbyggbar av användare inifrån plattformen — lärare kan inte lägga till egna verktyg.

## Hur användare ansluter

### Personlig MCP API-nyckel

Varje användare genererar sin egen nyckel under **Socialt nätverk** > **MCP API-nyckel**:

![Sidan för MCP API-nyckel, som visar en inaktiv nyckel, knappen Generera API-nyckel och blocket Fjärranslutning MCP med slutpunkts-URL och format för Authorization-huvudet](/.gitbook/assets/admin-mcp-api-key.png)

* Ett klick på **Generera API-nyckel** skapar en nyckel och visar den en gång — Chamilo lagrar därefter endast en maskerad version, så den fullständiga nyckeln måste kopieras och lagras säkert omedelbart.
* Att generera en ny nyckel återkallar omedelbart den föregående.
* Sidan visar nyckelns status (aktiv/inaktiv), MCP-slutpunkten som ska konfigureras i klienten samt datum för skapande och senaste användning.
* Panelen **Fjärranslutning MCP** anger exakt vad som ska anges i MCP-klienten: slutpunkts-URL och ett `Authorization: Bearer <your MCP API key>`-huvud.

Som sidan själv påpekar autentiserar nyckeln klienten som det användarkontot — den ger inte någon behörighet som kontot inte redan har.

### OAuth 2.1 (fjärrklienter och anslutningar)

För MCP-klienter som stöder OAuth-upptäckt och dynamisk klientregistrering (snarare än en manuellt inklistrad nyckel) fungerar Chamilo även som en OAuth 2.1-auktoriseringsserver: klienten upptäcker Chamilos slutpunkter, registrerar sig själv och omdirigerar användaren till `/oauth/authorize` för att godkänna åtkomst. Godkända program visas under **Socialt nätverk** > **Auktoriserade program**, där användaren kan återkalla sådana som inte längre används eller inte känns igen.

## Säkerhetsöverväganden

* **Ingen privilegieeskalering.** Varje MCP-verktygsanrop och varje OAuth-auktoriserad app körs med den anslutande användarens egna Chamilo-behörigheter — en personlig API-nyckel eller en auktoriserad app kan aldrig göra mer än vad användaren redan kunde göra för hand.
* **Endast Bearer, med hastighetsbegränsning.** `/mcp` accepterar endast ett Bearer-credential — en personlig MCP API-nyckel, en OAuth-åtkomsttoken eller (i utveckling) en JWT. Autentiseringsförsök hastighetsbegränsas per IP-adress för att sakta ner gissning av credentials.
* **Smal publik yta.** Den enda oautentiserade trafiken `/mcp` accepterar är `OPTIONS`-preflight; varje faktiskt anrop kräver `ROLE_USER`. OAuth-discovery, dynamisk klientregistrering och token-ändpunkterna är avsiktligt publika, som krävs av OAuth 2.1 / MCP-specifikationerna — detta ger inte åtkomst i sig, det låter bara en klient lära sig hur auktoriseringsflödet startas.
* **DNS-rebinding-skydd är avsiktligt inaktiverat för `/mcp`.** Paketet som implementerar MCP begränsar normalt ändpunkten till `localhost` om inte en statisk lista över tillåtna värdnamn är konfigurerad — en dålig passform för en Chamilo-portal med flera URL:er som nås under många värdnamn. Chamilo inaktiverar den kontrollen eftersom den är redundant här: varje `/mcp`-begäran kräver redan ett Bearer-credential oavsett dess `Host`/`Origin`-huvud, och en DNS-rebinding-attack (som förlitar sig på omgivande, cookie-liknande autentisering som följer med en förfalskad Host) kan inte förfalska en bearer-token den inte redan har.

## Konfigurera MCP-servern

Till skillnad från de flesta integrationer i den här guiden har MCP ingen inställningssida i adminpanelen — den konfigureras på filnivå, i `config/packages/mcp.yaml`, och kräver skalåtkomst till servern:

| Nyckel | Syfte |
|-----|---------|
| `app`, `version`, `description` | Identitet som Chamilo rapporterar till anslutande MCP-klienter |
| `client_transports.stdio` / `client_transports.http` | Vilka transporter som är aktiva; Chamilo aktiverar båda som standard |
| `http.path` | MCP HTTP-ändpunkten (`/mcp` som standard) |
| `http.allowed_hosts` | DNS-rebinding-värdallowlist — sätt till `false` på Chamilo (se Säkerhetsöverväganden ovan) |
| `http.session.store`, `.directory`, `.ttl` | Var MCP-sessionstillstånd persistenslagras och hur länge |

För att inaktivera MCP-servern helt, sätt `client_transports.http: false` (och `stdio: false` om även CLI-transporten ska stängas av) och rensa cachen:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

## Tips

* Behandla en MCP API-nyckel som ett lösenord — vem som helst som innehar den kan agera som den användaren via vilken MCP-klient som helst.
* Uppmuntra användare att regelbundet granska **Auktoriserade applikationer** och återkalla allt de inte känner igen.
* Se [AI-konfiguration](integrations/ai-configuration.md) för de AI-leverantörer som stöder verktygen för innehållsgenerering (skapande av test, skapande av dokument, illustrationer) som listas ovan.