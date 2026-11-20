# Profilazione utenti

Chamilo consente di definire campi profilo personalizzati (campi extra) per acquisire informazioni aggiuntive sugli utenti oltre a nome, e-mail e ruolo standard.

## Campi extra del profilo

![L'elenco dei campi extra del profilo che mostra i campi personalizzati con nome, tipo e impostazioni di visibilità](/.gitbook/assets/admin-extra-fields-list.png)

I campi extra consentono di memorizzare metadati specifici della propria organizzazione, ad esempio:

* ID dipendente
* Dipartimento
* Qualifica
* Sede/ufficio
* Numero di telefono
* Identificatori personalizzati

## Creazione dei campi extra

1. Dal pannello di amministrazione, accedere a **Extra fields** o **Profile fields**
2. Fare clic su **Add**
3. Configurare il campo:
   * **Name** — Il titolo del campo mostrato agli utenti
   * **Description** — Descrizione facoltativa
   * **Helper text** — Da mostrare sotto il campo in qualsiasi modulo che lo includa
   * **Field type** — Testo, menu a tendina, data, casella di controllo, ecc.
   * **Field label** — Il nome interno del campo, per l'integrazione con i plugin 
   * **Possible values** — Se il campo è un selettore tra tali valori 
   * **Default value** — Un valore predefinito facoltativo
   * **Visible to self** — Se il campo è visibile sul profilo utente dall'utente stesso
   * **Visible to others** — Se il campo è visibile agli altri utenti della piattaforma
   * **Can change** — Se l'utente può modificare da solo il proprio campo (o se possono farlo solo gli amministratori)
   * **Filter** — Se si tratta di un campo di tipo selettore, se includerlo come filtro nelle pagine amministrative (ad es. per iscrivere gli utenti a corsi o sessioni)
   * **Order** — Se si desidera gestire l'ordine di visualizzazione dei campi, è necessario assegnare un ordine numerico a ciascun campo
   * **Remove on anonymization** — Importante per le norme e le leggi sulla privacy: se l'utente viene anonimizzato ma non eliminato, questo campo deve essere considerato un potenziale contenitore di dati personali identificabili? 
4. Salvare

## Tipi di campo

Il motore dei campi extra supporta un'ampia gamma di tipi di input. Tra i più comuni:

| Type | Description |
|------|-------------|
| **Text** | Un input di testo su una sola riga |
| **Textarea** | Un input di testo su più righe |
| **Radio** | Un gruppo di pulsanti radio a scelta singola |
| **Dropdown / Dropdown multiple** | Un elenco di opzioni predefinite (selezione singola o multipla) |
| **Double select** | Due menu a tendina dipendenti (ad es. paese → città) |
| **Checkbox** | Un interruttore sì/no |
| **Date / Date and time** | Selettore di data o data+ora |
| **Integer** | Un input numerico |
| **Tag** | Più valori di tag in forma libera |
| **File** | Campo di caricamento file |
| **Video URL** | Un URL che punta a un video |
| **Mobile phone number** | Un campo numero di telefono formattato |
| **Timezone** | Un selettore di fuso orario |
| **Social profile** | Un collegamento a un profilo di social network |
| **Divider** | Un separatore visivo all'interno del modulo (nessun valore) |

L'insieme esatto dei tipi utilizzabili dipende dalla versione di Chamilo; il menu a tendina del tipo di campo nella pagina di amministrazione **Extra fields** è la fonte di verità.

## Utilizzo dei campi extra

I campi extra compaiono:

* Nei moduli di creazione (se visibili all'utente stesso) e di modifica dell'utente
* Nelle pagine del profilo utente (se visibili all'utente stesso)
* Nelle importazioni utenti (è possibile includere i valori dei campi extra nelle importazioni CSV)
* Nelle esportazioni e nei report (filtrare o raggruppare in base ai valori dei campi extra)

## Consigli

* **Pianificare prima di creare** — Definire quali informazioni servono prima di creare i campi, poiché modificare i tipi di campo dopo l'inserimento dei dati può essere problematico
* **Usare i menu a tendina per coerenza** — Quando un campo ha un insieme noto di valori possibili, usare un menu a tendina invece del testo libero per garantire la coerenza dei dati
* **Usarli per i report** — I campi extra sono utili per filtrare i report (ad es. «mostra tutti gli utenti del Dipartimento X che hanno completato la Formazione Y»)