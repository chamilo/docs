# AI-configuratie

Chamilo 3.0 bevat AI-functies die geconfigureerd moeten worden voordat ze beschikbaar zijn voor docenten en cursisten.

## Ondersteunde AI-providers

Chamilo ondersteunt meerdere AI-providers:

| Provider | Mogelijkheden |
|----------|-------------|
| **DeepSeek** | Tekstgeneratie |
| **Google Gemini** | Tekst-, beeld- en videogeneratie |
| **Grok** | Tekst-, beeld- en videogeneratie |
| **Mistral** | Tekstgeneratie |
| **OpenAI** | Tekst-, beeld- en videogeneratie |

Elke provider kan worden geconfigureerd voor verschillende soorten AI-taken:

* **Tekst** — Gebruikt voor het genereren van oefeningen, het genereren van leerpaden, AI-beoordeling en de AI-tutor
* **Beeld** — Gebruikt voor AI-beeldgeneratie
* **Video** — Gebruikt voor AI-videogeneratie (waar ondersteund)
* **Document** — Gebruikt voor AI-documentanalyse

## Configuratiestappen

### 1. API-sleutels verkrijgen

Registreer een account bij de gekozen AI-provider en verkrijg een API-sleutel:

* **DeepSeek**: [platform.deepseek.com](https://platform.deepseek.com/)
* **Google Gemini**: Google AI Studio of Google Cloud
* **Grok**: [console.x.ai](https://console.x.ai/)
* **Mistral**: [console.mistral.ai](https://console.mistral.ai/)
* **OpenAI**: [platform.openai.com](https://platform.openai.com/)

### 2. Providers configureren in Chamilo

![De configuratiepagina voor AI-helpers met providerinstellingen met velden voor API-sleutel, model en eindpunt](/.gitbook/assets/admin-ai-helpers-config.png)

Ga in de platforminstellingen naar de sectie **AI Helpers**:

1. **AI-helpers inschakelen** — Schakel de AI-functies globaal in
2. **AI-providers configureren** — Voeg een of meer providers toe met:
   * **Providernaam** (deepseek, gemini, grok, mistral, openai)
   * **API-sleutel** — Uw API-sleutel voor de provider
   * **Model** — Het specifieke model dat moet worden gebruikt (bijv. `gpt-4`, `gemini-pro`, `mistral-large`)
   * **API-URL** — De URL van het eindpunt (vooraf geconfigureerd voor standaardproviders)

U kunt meerdere providers configureren. De eerste provider in de configuratie wordt de standaard.

### 3. Functies per cursus inschakelen

AI-functies kunnen op cursusniveau worden in- of uitgeschakeld. Docenten kunnen het volgende in- of uitschakelen:

* **AI-tutorchatbot** — De AI-assistent voor cursisten
* **Opdrachtbeoordelaar** — Door AI gegenereerde beoordelingsaanbeveling
* **Oefeningengenerator** — Door AI gegenereerde quizvragen
* **Leerpadgenerator** — Door AI gegenereerde leersequenties
* **Beeld-/videogenerator** — Door AI gegenereerde afbeeldingen en video's in documenten

Hierdoor kunnen verschillende cursussen verschillende AI-configuraties gebruiken, afhankelijk van hun behoeften.

## Kostenoverwegingen

Aan AI-API-aanroepen zijn kosten verbonden. Overweeg het volgende:

* **Gebruikslimieten instellen** — Monitor en beperk het AI-API-gebruik om de kosten te beheersen
* **Modellen verstandig kiezen** — Kleinere, goedkopere modellen kunnen voor veel onderwijstaken voldoende zijn
* **Gebruik bijhouden** — Chamilo registreert AI-verzoeken zodat u het verbruik kunt monitoren

## Tips

* **Begin met één provider** — Configureer en test één provider voordat u er meer toevoegt
* **Testen met een cursus** — Schakel AI-functies eerst in een testcursus in om te controleren of ze naar verwachting werken
* **Communiceren met docenten** — Laat docenten weten welke AI-functies beschikbaar zijn en hoe ze deze kunnen gebruiken
* **Kwaliteit monitoren** — Beoordeel regelmatig door AI gegenereerde inhoud om te waarborgen dat deze aan uw onderwijsnormen voldoet