# Trascrizioni accademiche

Chamilo può produrre una **trascrizione accademica non ufficiale** a partire dai corsi completati e certificati di un discente e consentire al personale autorizzato di emettere una **trascrizione ufficiale firmata**. Questa funzionalità è distinta dal certificato di un singolo corso o dalla sua verifica facoltativa sulla testnet Sepolia.

## Abilitare la funzionalità

In **Amministrazione > Impostazioni di configurazione > Certificati**, abilitare **Trascrizioni accademiche** (`certificate.transcript_enabled`). È disabilitata per impostazione predefinita. Consultare le impostazioni aggiuntive relative a programma, scala di valutazione, ore del corso, numero di matricola, indirizzo e firmatario in [Impostazioni dei certificati](../platform-settings/certificate-settings.md#transcript_enabled).

La trascrizione utilizza i certificati generati dalla **categoria radice del registro delle valutazioni** dei corsi e delle sessioni idonei. Include solo i corsi appartenenti all'URL di accesso corrente ai quali il discente è ancora iscritto. Un corso privo di un certificato idoneo non contribuisce con una riga.

Il voto finale visualizzato è la media dei punteggi percentuali dei corsi elencati; il GPA è la media non ponderata dei punti di valutazione mappati. Entrambi dipendono dai corsi inclusi al momento della visualizzazione o dell'emissione.

## Colonne della trascrizione

| Colonna | Contenuto |
|--------|---------|
| **Corso** | Il codice del corso, oppure il nome del dipartimento del corso (`transcript_course_code_source`) |
| **Descrizione** | Il titolo del corso e, per un corso seguito in una sessione, il titolo della sessione |
| **Iscrizione** | Data in cui il discente si è iscritto al corso o alla sessione |
| **Ore richieste** | Il valore del campo extra del corso impostato in `transcript_hours_extra_field`, oppure la durata del corso |
| **Data di completamento** | La data del certificato |
| **Ore completate** | Il tempo trascorso dal discente nel corso, oppure le ore richieste quando `transcript_completed_hours_are_required_hours` è abilitato |
| **Voto finale** | Il punteggio del certificato |
| **Valutazione** | La lettera di `transcript_grading_scale` corrispondente a tale punteggio |

## Accedere alla trascrizione di un discente

1. Andare in **Amministrazione > Utenti > Elenco utenti** e individuare il discente. Un'azione **Trascrizione** è disponibile per gli amministratori autorizzati e gli amministratori di sessione quando la funzionalità è abilitata.
2. In alternativa, utilizzare l'azione **Trascrizione** dalla pagina di dettaglio della reportistica globale di un discente idoneo.
3. Esaminare l'elenco dei corsi del discente, le valutazioni, le date, le ore, il voto finale e il GPA.
4. Selezionare **Scarica trascrizione non ufficiale** per ottenere un PDF generato dai dati correnti del discente.

La pagina della trascrizione è inoltre disponibile direttamente all'indirizzo `/transcript?userId=<user-id>` per chi è autorizzato ad accedere ai dati di quel discente. Non considerare la conoscenza dell'URL o dell'ID utente come un'autorizzazione: l'accesso viene verificato lato server.

Un discente può visualizzare la **propria** trascrizione, ma non può emettere né revocare una trascrizione ufficiale. I soggetti autorizzati all'emissione sono:

* Gli amministratori di piattaforma/portale che operano nell'ambito degli utenti e degli URL di accesso da essi gestiti.
* I responsabili HR per i discenti che seguono.
* Gli amministratori di sessione per i discenti iscritti a una sessione da essi amministrata.

Queste autorizzazioni sono valutate per ciascun discente; il solo possesso di un ruolo di personale non concede l'accesso a ogni trascrizione.

![La trascrizione di un discente visualizzata da un amministratore, con i corsi, il voto finale, il GPA e la scala di valutazione, l'elenco delle trascrizioni ufficiali e il blocco dell'immagine della firma](../../.gitbook/assets/admin-transcript-user.png)

## Emettere e verificare una trascrizione ufficiale

1. Nella pagina della trascrizione di un discente autorizzato, verificare i corsi, le valutazioni e le informazioni personali attualmente visualizzati.
2. Selezionare **Emetti trascrizione ufficiale** e confermare. Chamilo salva un'istantanea firmata delle informazioni in quel momento.
3. La nuova voce compare in **Trascrizioni ufficiali** con la data di emissione e l'emittente.
4. Utilizzare **Scarica** per il PDF ufficiale oppure **Verifica** per aprire la pagina pubblica di verifica.
5. Se necessario, un emittente autorizzato può **Revocare** tale trascrizione ufficiale. La pagina di verifica indicherà quindi che è stata revocata.

Ogni trascrizione emessa viene archiviata separatamente: l'emissione di una versione più recente non riscrive silenziosamente un documento firmato precedente. I collegamenti di verifica seguono il formato `/transcripts/verify/<token>` ed espongono anche una risposta `.json`. Chi dispone del collegamento di verifica può controllare la validità senza effettuare l'accesso; mantenere questi collegamenti adeguatamente controllati, poiché una verifica valida espone i dettagli della trascrizione firmata. I documenti non validi o revocati non vengono presentati come documenti validi.

![La pagina pubblica di verifica di una trascrizione ufficiale valida, con i relativi dettagli e corsi](../../.gitbook/assets/admin-transcript-verification.png)

Una trascrizione ufficiale è firmata digitalmente da Chamilo mediante la chiave di firma dell'istituzione. **Non si tratta di una transazione blockchain**; la funzionalità Sepolia documenta un processo distinto per le credenziali dei certificati del registro delle valutazioni.

---

## Immagine della firma e dati del firmatario

Un amministratore della piattaforma può caricare un'immagine della firma in formato **PNG o JPEG** nella sezione **Firma delle trascrizioni ufficiali** della pagina della trascrizione di un discente. L'immagine appartiene all'URL di accesso corrente e viene utilizzata nei PDF ufficiali. Il nome e il titolo del firmatario provengono da `certificate.transcript_signatory_name` e `certificate.transcript_signatory_title`.

Solo gli amministratori della piattaforma gestiscono l'immagine della firma; gli altri soggetti autorizzati a emettere trascrizioni non ottengono automaticamente questa autorizzazione. Proteggere le chiavi di firma dell'istituzione e l'archivio privato delle immagini di firma nell'ambito delle procedure di backup e di controllo degli accessi del portale. Entrambi sono conservati al di fuori della cartella web pubblica, in `var/certificate-issuer/`, insieme alla chiave che firma anche le credenziali dei certificati del gradebook: includere questa cartella nei [backup](../maintenance/backups.md), altrimenti ogni trascrizione e credenziale già emessa non potrà più essere verificata.

## Risoluzione dei problemi

* **Collegamento alla trascrizione mancante:** verificare `certificate.transcript_enabled` e l'ambito dell'utente corrente.
* **Nessun corso completato:** il discente deve disporre di un certificato idoneo del gradebook radice e di un'iscrizione corrispondente al corso/sessione corrente su questo URL di accesso.
* **Numero di matricola, ore, voti in lettere o titolo del programma non corretti:** rivedere le impostazioni specifiche `certificate.transcript_*` prima di emettere una trascrizione ufficiale.
* **La verifica segnala un risultato revocato o non valido:** non riutilizzare il record come prova di una trascrizione ufficiale corrente; il personale autorizzato può emetterne una nuova quando opportuno.

Vedere anche [Certificati e competenze](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md) e [La mia trascrizione](../../student-guide/account-and-security/my-transcript.md).