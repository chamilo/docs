# Modelli

Chamilo utilizza modelli per certificati, documenti ed email. Puoi personalizzare questi modelli per adattarli al branding e alle esigenze della tua organizzazione.

## Modelli di Certificati

I modelli di certificati definiscono il layout e il contenuto dei certificati assegnati agli studenti che raggiungono le soglie di valutazione nel registro dei voti.

### Personalizzazione di un Modello di Certificato

I modelli di certificati utilizzano HTML e CSS con variabili segnaposto:

| Variabile | Sostituito con |
|----------|-------------|
| Nome dello studente | Il nome completo dello studente |
| Nome del corso | Il nome del corso |
| Data | La data in cui il certificato è stato conseguito |
| Punteggio | Il punteggio finale dello studente |
| Codice a barre | Un segnaposto per il codice a barre (`((certificate_barcode))`) utilizzato per la verifica |

### Caricamento di un Modello

1. Vai alla gestione dei modelli di certificati
2. Carica o modifica il modello HTML
3. Utilizza le variabili segnaposto dove deve apparire il contenuto dinamico
4. Salva

## Modelli di Documenti

Gli insegnanti possono utilizzare modelli di documenti quando creano contenuti nello strumento Documenti. I modelli forniscono un layout di partenza per tipi di documenti comuni.

### Gestione dei Modelli di Documenti

1. Vai alla gestione dei modelli nel pannello di amministrazione
2. Aggiungi nuovi modelli caricando file HTML
3. I modelli diventano disponibili per gli insegnanti quando creano nuovi documenti

## Suggerimenti

* **Includi il tuo logo** — Aggiungi il logo della tua organizzazione ai modelli di certificati per un aspetto professionale
* **Testa con dati reali** — Visualizza l'anteprima dei certificati con dati reali degli studenti prima di distribuire il modello
* **Mantieni i modelli semplici** — Design semplici si stampano meglio e appaiono professionali