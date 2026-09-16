# AI-configuratie

Chamilo 2.0 bevat AI-gestuurde functies die geconfigureerd moeten worden voordat ze beschikbaar zijn voor docenten en leerlingen.

## Ondersteunde AI-aanbieders

Chamilo ondersteunt meerdere AI-aanbieders:

| Aanbieder | Mogelijkheden |
|-----------|---------------|
| **DeepSeek** | Tekstgeneratie |
| **Google Gemini** | Tekst-, afbeelding- en videgeneratie |
| **Grok** | Tekst-, afbeelding- en videgeneratie |
| **Mistral** | Tekstgeneratie |
| **OpenAI** | Tekst-, afbeelding- en videgeneratie |

Elke aanbieder kan worden geconfigureerd voor verschillende soorten AI-taken:

* **Tekst** — Gebruikt voor het genereren van oefeningen, leerpaden, AI-beoordeling en de AI-tutor
* **Afbeelding** — Gebruikt voor het genereren van AI-afbeeldingen
* **Video** — Gebruikt voor het genereren van AI-video's (indien ondersteund)
* **Document** — Gebruikt voor AI-documentanalyse

## Configuratiestappen

### 1. API-sleutels verkrijgen

Registreer een account bij de door u gekozen AI-aanbieder en verkrijg een API-sleutel:

* **DeepSeek**: [platform.deepseek.com](https://platform.deepseek.com/)
* **Google Gemini**: Google AI Studio of Google Cloud
* **Grok**: [console.x.ai](https://console.x.ai/)
* **Mistral**: [console.mistral.ai](https://console.mistral.ai/)
* **OpenAI**: [platform.openai.com](https://platform.openai.com/)

### 2. Aanbieders configureren in Chamilo

![De configuratiepagina voor AI-helpers met instellingen voor aanbieders, inclusief velden voor API-sleutel, model en endpoint](/.gitbook/assets/admin-ai-helpers-config.png)

Navigeer in de platforminstellingen naar de sectie **AI Helpers**:

1. **AI-helpers inschakelen** — Schakel de AI-functies globaal in
2. **AI-aanbieders configureren** — Voeg een of meer aanbieders toe met:
   * **Naam van de aanbieder** (deepseek, gemini, grok, mistral, openai)
   * **API-sleutel** — Uw API-sleutel voor de aanbieder
   * **Model** — Het specifieke model dat u wilt gebruiken (bijv. `gpt-4`, `gemini-pro`, `mistral-large`)
   * **API-URL** — De endpoint-URL (vooraf geconfigureerd voor standaardaanbieders)

U kunt meerdere aanbieders configureren. De eerste aanbieder in de configuratie wordt de standaard.

### 3. Functies per cursus inschakelen

AI-functies kunnen op cursusniveau worden in- of uitgeschakeld. Docenten kunnen schakelen tussen:

* **AI Tutor-chatbot** — De AI-assistent voor leerlingen
* **Opdrachtbeoordelaar** — Door AI gegenereerde beoordelingsaanbevelingen
* **Oefeningengenerator** — Door AI gegenereerde quizvragen
* **Leerpadgenerator** — Door AI gegenereerde leervolgordes
* **Afbeelding-/videogenerator** — Door AI gegenereerde afbeeldingen en video's in documenten

Dit maakt het mogelijk dat verschillende cursussen verschillende AI-configuraties gebruiken op basis van hun behoeften.

## Kostenoverwegingen

AI API-aanroepen brengen kosten met zich mee. Overweeg het volgende:

* **Gebruikslimieten instellen** — Monitor en beperk het gebruik van AI API's om kosten te beheersen
* **Modellen verstandig kiezen** — Kleinere, goedkopere modellen kunnen voldoende zijn voor veel educatieve taken
* **Gebruik bijhouden** — Chamilo logt AI-verzoeken om u te helpen het verbruik te monitoren

## Tips

* **Begin met één aanbieder** — Configureer en test één aanbieder voordat u er meer toevoegt
* **Test met een cursus** — Schakel AI-functies eerst in een testcursus in om te controleren of ze werken zoals verwacht
* **Communiceer met docenten** — Laat docenten weten welke AI-functies beschikbaar zijn en hoe ze deze kunnen gebruiken
* **Kwaliteit monitoren** — Controleer regelmatig door AI gegenereerde inhoud om ervoor te zorgen dat deze voldoet aan uw educatieve normen