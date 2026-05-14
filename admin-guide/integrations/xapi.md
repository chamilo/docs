# xAPI

**xAPI** (Experience API, ook bekend als Tin Can API) is een standaard voor het volgen van leerervaringen. Chamilo kan zowel xAPI-statements genereren als consumeren.

## Wat xAPI doet

xAPI volgt leeractiviteiten als **statements** in het formaat: "Actor deed Werkwoord op Object." Bijvoorbeeld:

* "Jane voltooide Module 1"
* "John scoorde 85% op het Eindtentamen"
* "Maria bekeek de Introductievideo"

Deze statements worden opgeslagen in een **Learning Record Store (LRS)**, wat een uitgebreid overzicht biedt van leeractiviteiten.

## Configuratie

1. Configureer in de platforminstellingen het **LRS-eindpunt**:
   * **LRS URL** — Het adres van uw Learning Record Store
   * **LRS-authenticatie** — Inloggegevens voor het verzenden van gegevens naar de LRS
2. Schakel xAPI-tracking in voor de gewenste activiteiten

## Wat Chamilo volgt via xAPI

Chamilo kan xAPI-statements genereren voor:

* Toegang tot en voltooiing van cursussen
* Pogingen en scores bij oefeningen
* Voortgang van leerpaditems
* Portfolio-items

Andere tools (zoals Documenten en Forums) worden momenteel niet als xAPI-gebeurtenissen uitgezonden door de plugin.

## Gebruiksscenario's

* **Cross-platform tracking** — Volg leeractiviteiten over meerdere tools en platforms in één LRS
* **Geavanceerde analyses** — Gebruik LRS-analysetools om inzichten te genereren die verder gaan dan de ingebouwde rapportages van Chamilo
* **Nalevingsrapportage** — Genereer audittrails van trainingsvoltooiing voor regelgevende vereisten