# Gestione delle aule

Le aule in Chamilo sono organizzate sotto le sedi: una sede è un sito fisico e ogni aula appartiene esattamente a una sede.

## Sedi

**Rooms > Branches** gestisce i siti fisici della vostra organizzazione — un edificio, un campus o un ufficio. Le sedi possono essere nidificate (una sede può avere sedi figlie), così da poter modellare qualcosa come "Campus principale > Edificio A."

Campi che è possibile impostare per una sede:

* **Title** e **Description**
* **Parent branch** — Per organizzare le sedi in modo gerarchico
* **IP address** — Facoltativo, per l'identificazione basata sulla rete
* **Latitude / Longitude** — Per la mappatura
* **Download / Upload speed** e **Delay** — Metadati facoltativi sulla qualità della rete
* **Administrator e-mail, name, and phone** — Dati di contatto di chi gestisce quel sito

## Aule

**Rooms > Rooms** gestisce gli spazi prenotabili effettivi all'interno di una sede — in genere un'aula o una sala di formazione. Ogni aula deve appartenere a una sede.

Campi che è possibile impostare per un'aula:

* **Title** e **Description**
* **Branch** — A quale sede appartiene questa aula (obbligatorio)
* **Floor number**
* **Capacity** — Deve essere un numero positivo
* **Geolocation**, **IP address** e **IP mask** — Campi avanzati facoltativi

Ogni aula ha inoltre una vista calendario "Occupation" che mostra le sue prenotazioni e un conteggio dei corsi che la utilizzano.

## Correlati

Per trovare un'aula libera per una fascia oraria specifica invece di scorrere l'elenco, vedere [Ricerca disponibilità aule](room-availability-finder.md).