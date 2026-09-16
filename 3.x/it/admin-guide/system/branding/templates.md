# Template

Chamilo utilizza i template per certificati, documenti ed e-mail. È possibile personalizzare questi template per adattarli all'identità visiva e ai requisiti della propria organizzazione.

## Template dei certificati

I template dei certificati definiscono il layout e il contenuto dei certificati assegnati ai discenti che raggiungono le soglie del registro delle valutazioni.

### Personalizzazione di un template di certificato

I template dei certificati utilizzano HTML e CSS con variabili segnaposto:

| Variabile | Sostituita con |
|----------|-------------|
| Student name | Il nome completo del discente |
| Course name | Il nome del corso |
| Date | La data in cui è stato ottenuto il certificato |
| Score | Il punteggio finale del discente |
| Barcode | Un segnaposto per il codice a barre (`((certificate_barcode))`) utilizzato per la verifica |

### Caricamento di un template

1. Accedere alla gestione dei template dei certificati
2. Caricare o modificare il template HTML
3. Utilizzare le variabili segnaposto dove deve comparire il contenuto dinamico
4. Salvare

## Template dei documenti

I docenti possono utilizzare i template dei documenti quando creano contenuti nello strumento Documenti. I template forniscono un layout di partenza per i tipi di documento più comuni.

### Gestione dei template dei documenti

1. Accedere alla gestione dei template nel pannello di amministrazione
2. Aggiungere nuovi template caricando file HTML
3. I template diventano disponibili per i docenti quando creano nuovi documenti

## Consigli

* **Includere il logo** — Aggiungere il logo della propria organizzazione ai template dei certificati per un aspetto professionale
* **Provare con dati reali** — Anteprima dei certificati con i dati effettivi dei discenti prima di mettere in produzione il template
* **Mantenere i template semplici** — I design semplici si stampano meglio e hanno un aspetto professionale