# Hantera rum

Rum i Chamilo är organiserade under filialer: en filial är en fysisk plats, och varje rum tillhör exakt en filial.

## Filialer

**Rum > Filialer** hanterar organisationens fysiska platser — en byggnad, ett campus eller ett kontor. Filialer kan nästlas (en filial kan ha underfilialer), så du kan modellera något i stil med "Huvudcampus > Byggnad A."

Fält du kan ange för en filial:

* **Titel** och **Beskrivning**
* **Överordnad filial** — För att organisera filialer hierarkiskt
* **IP-adress** — Valfritt, för nätverksbaserad identifiering
* **Latitud / Longitud** — För kartläggning
* **Nedladdnings-/uppladdningshastighet** och **Fördröjning** — Valfri metadata om nätverkskvalitet
* **Administratörens e-post, namn och telefon** — Kontaktuppgifter för den som ansvarar för platsen

## Rum

**Rum > Rum** hanterar de faktiska bokningsbara utrymmena inom en filial — vanligtvis ett klassrum eller ett utbildningsrum. Varje rum måste tillhöra en filial.

Fält du kan ange för ett rum:

* **Titel** och **Beskrivning**
* **Filial** — Vilken filial rummet tillhör (obligatoriskt)
* **Våningsnummer**
* **Kapacitet** — Måste vara ett positivt tal
* **Geolokalisering**, **IP-adress** och **IP-mask** — Valfria avancerade fält

Varje rum har också en kalendervy för "Beläggning" som visar dess bokningar, samt en räkning av de kurser som använder det.

## Relaterat

För att hitta ett ledigt rum för ett visst tidsintervall i stället för att bläddra i listan, se [Sök rumstillgänglighet](room-availability-finder.md).