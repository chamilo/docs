# OnlyOffice

L'integrazione con **OnlyOffice** consente agli utenti di modificare documenti (Word, Excel, PowerPoint) direttamente nel browser all'interno di Chamilo, senza doverli scaricare.

## Cosa offre OnlyOffice

* **Modifica dei documenti** — Modifica file .docx, .xlsx, .pptx nel browser
* **Compatibilità con i formati** — Piena compatibilità con i formati di Microsoft Office
* **Nessun software desktop necessario** — Tutto funziona nel browser

> La modifica collaborativa in tempo reale dipende dal server di documenti OnlyOffice stesso; il plugin di Chamilo apre e salva i documenti tramite il server, ma non aggiunge né limita questa funzionalità.

## Configurazione

1. Installa il **OnlyOffice Document Server** sul tuo server (o utilizza il servizio cloud di OnlyOffice)
2. Nelle impostazioni della piattaforma Chamilo, configura:
   * **URL del server di documenti OnlyOffice** — L'indirizzo del tuo server OnlyOffice
   * **Chiave segreta** — Per una comunicazione sicura tra Chamilo e OnlyOffice
3. Abilita l'integrazione

## Come funziona

Una volta configurato, gli utenti vedranno un'opzione **Modifica con OnlyOffice** quando visualizzano tipi di documento supportati nello strumento Documenti. Facendo clic su di essa, il documento si aprirà nell'editor di OnlyOffice all'interno dell'interfaccia di Chamilo.

Le modifiche vengono salvate automaticamente nello spazio di archiviazione dei documenti di Chamilo.

## Suggerimenti

* **Server separato consigliato** — Come per BigBlueButton, il server di documenti OnlyOffice dovrebbe essere eseguito su un server dedicato per ottenere le migliori prestazioni
* **HTTPS obbligatorio** — Sia Chamilo che OnlyOffice devono essere serviti tramite HTTPS affinché l'integrazione funzioni
* **Verifica dei formati** — OnlyOffice funziona al meglio con i formati Office (.docx, .xlsx, .pptx). Altri formati potrebbero avere un supporto limitato per la modifica.