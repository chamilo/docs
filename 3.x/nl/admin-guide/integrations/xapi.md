# xAPI

**xAPI** (Experience API, ook bekend als Tin Can API) is een standaard voor het vastleggen van leerervaringen. Chamilo kan xAPI-statements zowel genereren als verwerken.

## Wat xAPI doet

xAPI legt leeractiviteiten vast als **statements** in het formaat: "Actor deed Verb op Object." Bijvoorbeeld:

* "Jane completed Module 1"
* "John scored 85% on the Final Exam"
* "Maria watched the Introduction Video"

Deze statements worden opgeslagen in een **Learning Record Store (LRS)** en vormen zo een volledig overzicht van de leeractiviteit.

## Configuratie

1. Configureer in de platforminstellingen het **LRS-eindpunt**:
   * **LRS URL** — Het adres van uw Learning Record Store
   * **LRS-authenticatie** — Referenties voor het verzenden van gegevens naar de LRS
2. Schakel xAPI-tracking in voor de gewenste activiteiten

## Wat Chamilo via xAPI vastlegt

Chamilo kan xAPI-statements genereren voor:

* Cursustoegang en -afronding
* Oefenpogingen en scores
* Voortgang van leerpaditems
* Portfolio-items

Andere tools (zoals Documenten en Forums) worden momenteel niet als xAPI-events door de plugin uitgezonden.

## Gebruiksscenario's

* **Platformoverschrijdende tracking** — Leg leeractiviteit vast over meerdere tools en platformen in één LRS
* **Geavanceerde analyses** — Gebruik LRS-analysetools om inzichten te genereren die verder gaan dan de ingebouwde rapportage van Chamilo
* **Rapportage voor compliance** — Genereer audittrails van trainingsafronding voor wettelijke vereisten