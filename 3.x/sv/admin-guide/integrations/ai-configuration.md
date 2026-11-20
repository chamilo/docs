# AI-konfiguration

Chamilo 3.0 innehåller AI-drivna funktioner som kräver konfiguration innan de blir tillgängliga för lärare och studerande.

## Stödda AI-leverantörer

Chamilo stöder flera AI-leverantörer:

| Leverantör | Funktioner |
|----------|-------------|
| **DeepSeek** | Textgenerering |
| **Google Gemini** | Generering av text, bild och video |
| **Grok** | Generering av text, bild och video |
| **Mistral** | Textgenerering |
| **OpenAI** | Generering av text, bild och video |

Varje leverantör kan konfigureras för olika typer av AI-uppgifter:

* **Text** — Används för övningsgenerering, generering av lärstigar, AI-bedömning och AI-handledaren
* **Bild** — Används för AI-bildgenerering
* **Video** — Används för AI-videogenerering (där det stöds)
* **Dokument** — Används för AI-dokumentanalys

## Konfigurationssteg

### 1. Skaffa API-nycklar

Registrera ett konto hos den valda AI-leverantören och skaffa en API-nyckel:

* **DeepSeek**: [platform.deepseek.com](https://platform.deepseek.com/)
* **Google Gemini**: Google AI Studio eller Google Cloud
* **Grok**: [console.x.ai](https://console.x.ai/)
* **Mistral**: [console.mistral.ai](https://console.mistral.ai/)
* **OpenAI**: [platform.openai.com](https://platform.openai.com/)

### 2. Konfigurera leverantörer i Chamilo

![Konfigurationssidan för AI-hjälpare som visar leverantörsinställningar med fält för API-nyckel, modell och slutpunkt](/.gitbook/assets/admin-ai-helpers-config.png)

I plattformsinställningarna, gå till avsnittet **AI Helpers**:

1. **Aktivera AI-hjälpare** — Slå på AI-funktionerna globalt
2. **Konfigurera AI-leverantörer** — Lägg till en eller flera leverantörer med:
   * **Leverantörsnamn** (deepseek, gemini, grok, mistral, openai)
   * **API-nyckel** — Din API-nyckel för leverantören
   * **Modell** — Den specifika modell som ska användas (t.ex. `gpt-4`, `gemini-pro`, `mistral-large`)
   * **API-URL** — Slutpunkts-URL:en (förkonfigurerad för standardleverantörer)

Du kan konfigurera flera leverantörer. Den första leverantören i konfigurationen blir standard.

### 3. Aktivera funktioner per kurs

AI-funktioner kan aktiveras eller inaktiveras på kursnivå. Lärare kan växla:

* **AI Tutor-chattbot** — AI-assistenten för studerande
* **Uppgiftsbedömare** — AI-genererad bedömningsrekommendation
* **Övningsgenerator** — AI-genererade quizfrågor
* **Lärstigsgenerator** — AI-genererade lärsekvenser
* **Bild-/videogenerator** — AI-genererade bilder och videor i dokument

Detta gör att olika kurser kan använda olika AI-konfigurationer utifrån sina behov.

## Kostnadsöverväganden

AI-API-anrop medför kostnader. Överväg:

* **Att sätta användningsgränser** — Övervaka och begränsa AI-API-användning för att kontrollera kostnaderna
* **Att välja modeller med omdöme** — Mindre, billigare modeller kan räcka för många pedagogiska uppgifter
* **Att följa upp användning** — Chamilo loggar AI-förfrågningar för att hjälpa dig övervaka förbrukningen

## Tips

* **Börja med en leverantör** — Konfigurera och testa en leverantör innan du lägger till fler
* **Testa med en kurs** — Aktivera AI-funktioner i en testkurs först för att verifiera att de fungerar som förväntat
* **Kommunicera med lärare** — Informera lärare om vilka AI-funktioner som är tillgängliga och hur de används
* **Övervaka kvalitet** — Granska regelbundet AI-genererat innehåll för att säkerställa att det uppfyller era pedagogiska standarder