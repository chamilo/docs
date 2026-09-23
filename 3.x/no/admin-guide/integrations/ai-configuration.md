# AI-konfigurasjon

Chamilo 3.0 inkluderer AI-drevne funksjoner som må konfigureres før de blir tilgjengelige for lærere og studenter.

## Støttede AI-leverandører

Chamilo støtter flere AI-leverandører:

| Leverandør | Funksjoner |
|----------|-------------|
| **DeepSeek** | Tekstgenerering |
| **Google Gemini** | Generering av tekst, bilde og video |
| **Grok** | Generering av tekst, bilde og video |
| **Mistral** | Tekstgenerering |
| **OpenAI** | Generering av tekst, bilde og video |

Hver leverandør kan konfigureres for ulike typer AI-oppgaver:

* **Tekst** — Brukes til oppgavegenerering, generering av læringsstier, AI-vurdering og AI-veilederen
* **Bilde** — Brukes til AI-bildegenerering
* **Video** — Brukes til AI-videogenerering (der det støttes)
* **Dokument** — Brukes til AI-dokumentanalyse

## Konfigurasjonstrinn

### 1. Skaff API-nøkler

Registrer en konto hos den valgte AI-leverandøren og skaff en API-nøkkel:

* **DeepSeek**: [platform.deepseek.com](https://platform.deepseek.com/)
* **Google Gemini**: Google AI Studio eller Google Cloud
* **Grok**: [console.x.ai](https://console.x.ai/)
* **Mistral**: [console.mistral.ai](https://console.mistral.ai/)
* **OpenAI**: [platform.openai.com](https://platform.openai.com/)

### 2. Konfigurer leverandører i Chamilo

![Konfigurasjonssiden for AI-hjelpere som viser leverandørinnstillinger med felt for API-nøkkel, modell og endepunkt](/.gitbook/assets/admin-ai-helpers-config.png)

I plattforminnstillingene, gå til seksjonen **AI Helpers**:

1. **Aktiver AI-hjelpere** — Slå på AI-funksjonene globalt
2. **Konfigurer AI-leverandører** — Legg til én eller flere leverandører med:
   * **Leverandørnavn** (deepseek, gemini, grok, mistral, openai)
   * **API-nøkkel** — API-nøkkelen din for leverandøren
   * **Modell** — Den spesifikke modellen som skal brukes (f.eks. `gpt-4`, `gemini-pro`, `mistral-large`)
   * **API-URL** — Endepunkt-URL-en (forhåndskonfigurert for standardleverandører)

Du kan konfigurere flere leverandører. Den første leverandøren i konfigurasjonen blir standard.

### 3. Aktiver funksjoner per kurs

AI-funksjoner kan aktiveres eller deaktiveres på kursnivå. Lærere kan slå av/på:

* **AI-veileder-chatbot** — AI-assistenten for studenter
* **Oppgavevurderer** — AI-generert vurderingsanbefaling
* **Oppgavegenerator** — AI-genererte quizspørsmål
* **Læringsstigenerator** — AI-genererte læringssekvenser
* **Bilde-/videogenerator** — AI-genererte bilder og videoer i dokumenter

Dette gjør at ulike kurs kan bruke ulike AI-konfigurasjoner ut fra behovene sine.

## Kostnadshensyn

AI-API-kall medfører kostnader. Vurder:

* **Å sette bruksgrenser** — Overvåk og begrens AI-API-bruk for å kontrollere kostnader
* **Å velge modeller med omhu** — Mindre, rimeligere modeller kan være tilstrekkelige for mange pedagogiske oppgaver
* **Å spore bruk** — Chamilo logger AI-forespørsler for å hjelpe deg med å overvåke forbruket

## Tips

* **Start med én leverandør** — Konfigurer og test én leverandør før du legger til flere
* **Test med et kurs** — Aktiver AI-funksjoner i et testkurs først for å verifisere at de fungerer som forventet
* **Kommuniser med lærerne** — Informer lærerne om hvilke AI-funksjoner som er tilgjengelige og hvordan de brukes
* **Overvåk kvalitet** — Gå jevnlig gjennom AI-generert innhold for å sikre at det oppfyller de pedagogiske standardene deres