# Gestione delle competenze

Questa pagina descrive le tre voci della dashboard utilizzate per costruire il catalogo delle competenze della piattaforma: importazione massiva delle competenze, gestione delle definizioni delle competenze e assegnazione di ciascuna competenza a una scala di livelli.

## Skills Import

**Skills > Skills import** consente di creare in blocco una gerarchia di competenze a partire da un file CSV o XML, invece di crearle una per una. Ogni riga deve contenere almeno un `id`, un `parent_id` (per costruire l'albero) e un `title`. È disponibile un modello di esempio su cui basare il file.

## Manage Skills

**Skills > Manage skills** è il catalogo principale delle competenze: consente di creare, modificare, abilitare/disabilitare ed eliminare le competenze. Ogni competenza ha un titolo, un codice breve, una descrizione, un'icona e una descrizione opzionale dei criteri (ciò che un discente deve fare per ottenerla). Le competenze possono essere nidificate — una competenza può avere competenze figlie — ed è ciò che visualizza la [Skills Wheel](skills-wheel.md).

## Manage Skills Levels

**Skills > Manage skills levels** è una schermata separata e più ridotta: elenca le competenze esistenti e consente di assegnare ciascuna a un **level profile** — un insieme nominato e ordinato di livelli (ad esempio Bronzo/Argento/Oro) rispetto al quale la competenza viene misurata. In sintesi: usare **Manage skills** per definire che cosa *è* una competenza e **Manage skills levels** per definire su quale scala viene misurata.

## Come vengono assegnate le competenze

Una competenza viene assegnata a un utente (registrata come competenza rilasciata, con una data) attraverso uno dei seguenti percorsi:

* Automaticamente, quando un discente raggiunge la soglia di una categoria del gradebook — configurato nella pagina [Skills and Assessments](skills-assessments.md)
* Automaticamente, al completamento di corsi specifici a cui la competenza è collegata
* Manualmente, da un docente (se è abilitata l'opzione **Teachers can assign skills**) o da un amministratore