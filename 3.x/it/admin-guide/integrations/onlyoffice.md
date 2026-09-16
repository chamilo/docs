# OnlyOffice

L'integrazione **OnlyOffice** consente agli utenti di modificare documenti (Word, Excel, PowerPoint) direttamente nel browser all'interno di Chamilo, senza scaricarli.

## Cosa offre OnlyOffice

* **Modifica dei documenti** — Modifica file .docx, .xlsx, .pptx nel browser
* **Compatibilità dei formati** — Piena compatibilità con i formati Microsoft Office
* **Nessun software desktop necessario** — Tutto avviene nel browser

> La modifica collaborativa in tempo reale dipende dal Document Server di OnlyOffice stesso; il plugin di Chamilo apre e salva i documenti tramite il server, ma non aggiunge né limita tale funzionalità.

## Configurazione

1. Installare **OnlyOffice Document Server** sul proprio server (o utilizzare il servizio cloud OnlyOffice)
2. Nelle impostazioni della piattaforma Chamilo, configurare:
   * **OnlyOffice Document Server URL** — L'indirizzo del proprio server OnlyOffice
   * **Secret key** — Per una comunicazione sicura tra Chamilo e OnlyOffice
3. Abilitare l'integrazione

## Come funziona

Una volta configurata, gli utenti vedono un'opzione **Modifica con OnlyOffice** quando visualizzano i tipi di documento supportati nello strumento Documenti. Facendo clic si apre il documento nell'editor OnlyOffice all'interno dell'interfaccia di Chamilo.

Le modifiche vengono salvate automaticamente nello storage dei documenti di Chamilo.

## Consigli

* **Si raccomanda un server dedicato** — Come BigBlueButton, OnlyOffice Document Server dovrebbe essere eseguito su un server proprio per ottenere le migliori prestazioni
* **HTTPS obbligatorio** — Sia Chamilo sia OnlyOffice devono essere serviti tramite HTTPS affinché l'integrazione funzioni
* **Verificare i formati** — OnlyOffice funziona al meglio con i formati Office (.docx, .xlsx, .pptx). Altri formati possono avere un supporto alla modifica limitato.