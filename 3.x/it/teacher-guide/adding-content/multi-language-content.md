# Contenuti in più lingue

Chamilo consente di scrivere **più versioni linguistiche dello stesso contenuto in un unico campo** — una sezione della descrizione del corso, un documento, una domanda di un test, un sondaggio — e di far sì che ogni studente veda automaticamente solo la versione scritta nella propria lingua. Si tratta della funzionalità **translate_html**, così chiamata dal parametro della piattaforma che la governa.

Coinvolge tre persone diverse, ciascuna delle quali ne vede un aspetto differente:

* **L'amministratore** deve attivare la funzionalità a livello di piattaforma prima che chiunque possa usarla.
* **Lei (il docente)** scrive le diverse versioni linguistiche, utilizzando un pulsante nell'editor di testo avanzato.
* **Lo studente** ne beneficia senza mai sapere che esiste — vede semplicemente il contenuto nella propria lingua, senza alcuna impostazione da trovare o attivare.

## Abilitazione della funzionalità

Si tratta di un'operazione dell'amministratore, non del docente. In **Amministrazione > Impostazioni di configurazione > Editor**, l'impostazione **Supporto contenuti HTML in più lingue** (`translate_html`) deve essere abilitata. Se non vede il pulsante **Lang ISO** descritto di seguito nella barra degli strumenti dell'editor, è quasi certamente per questo motivo — si rivolga all'amministratore. Vedere [Impostazioni dell'editor](../../admin-guide/platform-settings/editor-settings.md) per il riferimento completo alle impostazioni. Dalla v3.0.0 questa impostazione è abilitata per impostazione predefinita (non era così prima di questa versione), a meno che non abbia aggiornato da una versione precedente in cui l'impostazione era disabilitata.

Disattivare di nuovo questa impostazione non elimina né danneggia i contenuti già scritti in questo modo — vedere [Cosa vedono gli studenti](#what-learners-see) di seguito.

## Scrittura di contenuti in più lingue

La funzionalità è disponibile ovunque sia presente l'editor di testo avanzato completo: sezioni della [descrizione del corso](../creating-your-course/course-description.md), [documenti](documents.md), domande di test e sondaggi, e altro ancora.

1. Scriva (o incolli) il contenuto nella lingua predefinita, come di consueto.
2. Selezioni quel testo, quindi faccia clic sul pulsante **Lang ISO** nella barra degli strumenti dell'editor.

![La barra degli strumenti dell'editor di testo avanzato, con il pulsante "Lang ISO" visibile vicino all'inizio](../../.gitbook/assets/teacher-multilang-editor.png)

3. Dal menu, scelga la lingua in cui ha appena scritto — l'elenco copre ogni lingua attiva sulla piattaforma. Se quella di cui ha bisogno non è elencata, usi **Custom Chamilo ISO code...** in fondo e la digiti (ad es. `en_US`, `fr_FR`, `es`).

![Il menu "Lang ISO" aperto, che elenca ogni lingua attiva della piattaforma più "Add translation to..." e un'opzione per codice personalizzato](../../.gitbook/assets/teacher-multilang-lang-menu.png)

4. Chamilo racchiude la selezione con il tag di quella lingua. Ora scriva (o incolli) la versione della lingua successiva subito dopo, la selezioni e ripeta con una lingua diversa.

Continui per tutte le lingue che desidera coprire. Tutte convivono nello stesso campo — mentre modifica, vedrà ogni versione linguistica una dopo l'altra; solo quando qualcuno *visualizza* effettivamente la pagina Chamilo nasconde tutto tranne la lingua che si applica a quella persona (vedere di seguito).

### Traduzione assistita dall'IA

Se l'amministratore ha configurato un provider di testo IA, lo stesso menu **Lang ISO** offre anche **Add translation to...** in alto. Questo invia il contenuto esistente al modello IA configurato e inserisce un nuovo blocco tradotto automaticamente nella lingua scelta (o in tutte le lingue rimanenti contemporaneamente, se la piattaforma lo consente) — non deve scriverlo lei stessa. I blocchi linguistici esistenti restano intatti e le lingue già presenti sono escluse dall'elenco, quindi usarlo ripetutamente non crea duplicati.

Come per qualsiasi contenuto generato dall'IA, rilegga il risultato — è un modo rapido per ottenere una prima bozza solida in una lingua che magari non parla, non un sostituto della revisione.

## Cosa vedono gli studenti

Ogni studente vede esattamente una versione linguistica: Chamilo prova prima la lingua dell'interfaccia dello studente; se nessuno dei suoi blocchi corrisponde, passa alla lingua del corso, poi alla lingua predefinita della piattaforma; se nessuna di queste corrisponde, mostra la lingua che è stata scritta per prima piuttosto che lasciare il contenuto vuoto. Tutto avviene automaticamente — non c'è nulla da configurare per lo studente, né nulla da configurare per studente da parte sua.

Ecco la stessa sezione della descrizione del corso, vista da tre studenti con lingue di interfaccia diverse — nient'altro del corso è cambiato tra queste tre schermate, solo la lingua del visualizzatore:

![La stessa sezione della descrizione del corso vista da uno studente con l'inglese come lingua dell'interfaccia](../../.gitbook/assets/teacher-multilang-en.png)

![La stessa sezione vista da uno studente con il francese come lingua dell'interfaccia](../../.gitbook/assets/teacher-multilang-fr.png)

![La stessa sezione vista da uno studente con lo spagnolo come lingua dell'interfaccia](../../.gitbook/assets/teacher-multilang-es.png)

### Dietro le quinte

Se si apre la vista **Codice sorgente** di un campo multilingue (il pulsante `<>` nella barra degli strumenti dell'editor), ogni versione linguistica risulta racchiusa in questo modo:

![La vista Codice sorgente, che mostra un blocco che si apre con lang="en_US" class="mce-translatehtml"](../../.gitbook/assets/teacher-multilang-source-view.png)

Ogni versione è racchiusa in un `<div class="mce-translatehtml" lang="...">` (o `<span>`, per una breve frase in linea anziché un intero blocco) — è l'attributo `lang` che Chamilo confronta con la lingua del visualizzatore per decidere cosa mostrare. Vale la pena riconoscere questo nome di classe specifico se si ispeziona il codice sorgente della pagina o si risolvono problemi di contenuti che appaiono errati: **`mce-translatehtml`** è il marcatore da cercare.

Questo spiega anche perché disabilitare `translate_html` nelle impostazioni della piattaforma non compromette nulla di già scritto: l'impostazione controlla soltanto se il pulsante di *authoring* **Lang ISO** compare nell'editor. Il filtraggio lato *visualizzazione* descritto sopra viene eseguito incondizionatamente, quindi i contenuti multilingue già scritti restano filtrati correttamente per ogni visualizzatore anche su una piattaforma in cui un amministratore ha successivamente disattivato il pulsante di authoring.

## I titoli non funzionano in questo modo

Il titolo di un corso, il titolo di un documento, il titolo di un test — si tratta di campi di testo semplice, non di testo formattato, quindi non possono contenere il markup con tag `lang` descritto sopra. Restano un valore unico e neutro indipendentemente da chi li consulta, indipendentemente da quante versioni linguistiche siano state scritte nel contenuto sottostante.

L'unica eccezione: se l'amministratore ha abilitato **Salva i titoli come HTML** (`save_titles_as_html`, anch'esso in **Amministrazione > Impostazioni di configurazione > Editor**) per il campo titolo specifico su cui si sta lavorando, quel campo diventa a sua volta un vero campo HTML e si può applicare la stessa tecnica **Lang ISO** descritta sopra. Si tratta di un caso poco comune, usato soprattutto per le domande dei test — la maggior parte dei titoli sulla piattaforma resta testo semplice.

## Consigli

* **Tenere la lingua di origine per prima** — inserire per prima nel campo la lingua più comune della piattaforma; è il fallback più naturale se si dimentica di etichettare in seguito una lingua più rara.
* **Non nidificare i blocchi di lingua** — scrivere ogni versione come blocco separato e sequenziale; avvolgere un blocco dentro un altro non è supportato e l'editor rimuove attivamente i marcatori nidificati quando se ne inserisce uno nuovo.
* **Una sezione che appare vuota in una lingua** di solito significa che non è mai stato etichettato un blocco per quella lingua (o per il relativo fallback esteso corso/predefinito della piattaforma) — controllare la vista Codice sorgente per le lingue effettivamente presenti.