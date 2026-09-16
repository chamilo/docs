# Profilazione Utente

Chamilo consente di definire campi di profilo personalizzati (campi extra) per raccogliere informazioni aggiuntive sugli utenti oltre ai dati standard come nome, email e ruolo.

## Campi di Profilo Extra

![Elenco dei campi di profilo extra che mostra i campi personalizzati con nome, tipo e impostazioni di visibilità](/.gitbook/assets/admin-extra-fields-list.png)

I campi extra permettono di memorizzare metadati specifici per la tua organizzazione, come ad esempio:

* ID dipendente
* Dipartimento
* Titolo lavorativo
* Località/ufficio
* Numero di telefono
* Identificativi personalizzati

## Creazione di Campi Extra

1. Dal pannello di amministrazione, vai a **Campi extra** o **Campi di profilo**
2. Clicca su **Aggiungi**
3. Configura il campo:
   * **Nome** — Il titolo del campo mostrato agli utenti
   * **Descrizione** — Descrizione opzionale
   * **Testo di aiuto** — Da mostrare sotto il campo in qualsiasi modulo che lo include
   * **Tipo di campo** — Testo, menu a tendina, data, casella di controllo, ecc.
   * **Etichetta del campo** — Il nome interno del campo, per l'integrazione con i plugin
   * **Valori possibili** — Se il campo è un selettore tra questi valori
   * **Valore predefinito** — Un valore predefinito opzionale
   * **Visibile a sé stesso** — Se il campo è visibile nel profilo utente dall'utente stesso
   * **Visibile agli altri** — Se il campo è visibile agli altri utenti della piattaforma
   * **Modificabile** — Se l'utente può modificare il proprio campo da solo (o se solo gli amministratori possono farlo)
   * **Filtro** — Se questo è un campo di tipo selettore, se includerlo come filtro nelle pagine amministrative (ad esempio per iscrivere utenti a corsi o sessioni)
   * **Ordine** — Se desideri gestire l'ordine di visualizzazione dei campi, dovrai assegnare un ordine numerico a ciascun campo
   * **Rimuovi in caso di anonimizzazione** — Importante per le normative sulla privacy: se l'utente viene anonimizzato ma non eliminato, questo campo dovrebbe essere considerato come potenziale detentore di dati personali identificabili?
4. Salva

## Tipi di Campo

Il motore dei campi extra supporta un'ampia gamma di tipi di input. I più comuni includono:

| Tipo | Descrizione |
|------|-------------|
| **Testo** | Un input di testo a riga singola |
| **Area di testo** | Un input di testo multilinea |
| **Radio** | Un gruppo di opzioni a scelta singola |
| **Menu a tendina / Menu a tendina multiplo** | Un elenco di opzioni predefinite (selezione singola o multipla) |
| **Doppio menu a tendina** | Due menu a tendina dipendenti (ad esempio, paese → città) |
| **Casella di controllo** | Un interruttore sì/no |
| **Data / Data e ora** | Selettore di data o data+ora |
| **Intero** | Un input numerico |
| **Tag** | Valori di tag multipli in forma libera |
| **File** | Campo per il caricamento di file |
| **URL video** | Un URL che punta a un video |
| **Numero di telefono cellulare** | Un campo per numero di telefono formattato |
| **Fuso orario** | Un selettore di fuso orario |
| **Profilo sociale** | Un link a un profilo di social network |
| **Divisore** | Un separatore visivo all'interno del modulo (senza valore) |

L'insieme esatto dei tipi utilizzabili dipende dalla versione di Chamilo; il menu a tendina dei tipi di campo nella pagina di amministrazione **Campi extra** è la fonte di riferimento.

## Utilizzo dei Campi Extra

I campi extra appaiono:

* Nei moduli di creazione utente (se visibili a sé stesso) e modifica
* Nelle pagine del profilo utente (se visibili a sé stesso)
* Nelle importazioni utente (puoi includere valori di campi extra nelle importazioni CSV)
* Nelle esportazioni e nei report (filtra o raggruppa per valori di campi extra)

## Suggerimenti

* **Pianifica prima di creare** — Definisci quali informazioni ti servono prima di creare i campi, poiché cambiare il tipo di campo dopo l'inserimento dei dati può essere problematico
* **Usa menu a tendina per coerenza** — Quando un campo ha un insieme noto di valori possibili, usa un menu a tendina invece di testo libero per garantire la coerenza dei dati
* **Usa per i report** — I campi extra sono utili per filtrare i report (ad esempio, "mostra tutti gli utenti del Dipartimento X che hanno completato la Formazione Y")