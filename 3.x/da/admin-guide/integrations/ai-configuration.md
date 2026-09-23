# AI-konfiguration

Chamilo 3.0 indeholder AI-drevne funktioner, som kræver konfiguration, før de bliver tilgængelige for undervisere og kursister.

## Understøttede AI-udbydere

Chamilo understøtter flere AI-udbydere:

| Udbyder | Funktioner |
|----------|-------------|
| **DeepSeek** | Tekstgenerering |
| **Google Gemini** | Generering af tekst, billeder og video |
| **Grok** | Generering af tekst, billeder og video |
| **Mistral** | Tekstgenerering |
| **OpenAI** | Generering af tekst, billeder og video |

Hver udbyder kan konfigureres til forskellige typer AI-opgaver:

* **Tekst** — Bruges til opgavegenerering, generering af læringsstier, AI-bedømmelse og AI-tutoren
* **Billede** — Bruges til AI-billedgenerering
* **Video** — Bruges til AI-videogenerering (hvor det understøttes)
* **Dokument** — Bruges til AI-dokumentanalyse

## Konfigurationstrin

### 1. Indhent API-nøgler

Opret en konto hos den valgte AI-udbyder, og indhent en API-nøgle:

* **DeepSeek**: [platform.deepseek.com](https://platform.deepseek.com/)
* **Google Gemini**: Google AI Studio eller Google Cloud
* **Grok**: [console.x.ai](https://console.x.ai/)
* **Mistral**: [console.mistral.ai](https://console.mistral.ai/)
* **OpenAI**: [platform.openai.com](https://platform.openai.com/)

### 2. Konfigurer udbydere i Chamilo

![Konfigurationssiden for AI-hjælpere, der viser udbyderindstillinger med felter til API-nøgle, model og endepunkt](../../.gitbook/assets/admin-ai-helpers-config.png)

I platformindstillingerne skal du gå til sektionen **AI Helpers**:

1. **Aktivér AI-hjælpere** — Slå AI-funktionerne til globalt
2. **Konfigurer AI-udbydere** — Tilføj en eller flere udbydere med:
   * **Udbydernavn** (deepseek, gemini, grok, mistral, openai)
   * **API-nøgle** — Din API-nøgle til udbyderen
   * **Model** — Den specifikke model, der skal bruges (f.eks. `gpt-4`, `gemini-pro`, `mistral-large`)
   * **API-URL** — Endepunkts-URL'en (forudkonfigureret til standardudbydere)

Du kan konfigurere flere udbydere. Den første udbyder i konfigurationen bliver standard.

### 3. Aktivér funktioner pr. kursus

AI-funktioner kan aktiveres eller deaktiveres på kursusniveau. Undervisere kan slå følgende til og fra:

* **AI-tutor-chatbot** — AI-assistenten til kursister
* **Opgavebedømmer** — AI-genereret bedømmelsesanbefaling
* **Øvelsesgenerator** — AI-genererede quizspørgsmål
* **Læringsstigenerator** — AI-genererede læringsforløb
* **Billede-/videogenerator** — AI-genererede billeder og videoer i dokumenter

Dette gør det muligt for forskellige kurser at bruge forskellige AI-konfigurationer ud fra deres behov.

## Omkostningsovervejelser

AI-API-kald er forbundet med omkostninger. Overvej:

* **At sætte forbrugsgrænser** — Overvåg og begræns AI-API-forbruget for at styre omkostningerne
* **At vælge modeller med omtanke** — Mindre og billigere modeller kan være tilstrækkelige til mange pædagogiske opgaver
* **At følge forbruget** — Chamilo logger AI-anmodninger, så du kan overvåge forbruget

## Tips

* **Start med én udbyder** — Konfigurer og test én udbyder, før du tilføjer flere
* **Test med et kursus** — Aktivér AI-funktioner i et testkursus først for at kontrollere, at de virker som forventet
* **Kommuniker med underviserne** — Fortæl underviserne, hvilke AI-funktioner der er tilgængelige, og hvordan de bruges
* **Overvåg kvaliteten** — Gennemgå jævnligt AI-genereret indhold for at sikre, at det lever op til jeres pædagogiske standarder