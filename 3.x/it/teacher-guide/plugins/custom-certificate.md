# Certificato personalizzato

Il plugin Custom Certificate <img src="../../.gitbook/assets/icons/mdi-certificate.svg" alt="Certificato personalizzato" data-size="line"> consente di sostituire il [certificato del libretto dei voti](../assessing-learners/gradebook.md) standard con un proprio design — loghi, un sigillo, fino a quattro immagini di firma con didascalie, un'immagine di sfondo, i margini e contenuti costruiti a partire da tag segnaposto.

## Attivazione per il corso

Dopo che l'amministratore ha abilitato il plugin e impostato un modello predefinito, attivarlo per ciascun corso da **Impostazioni del corso**:

* **Custom certificate enable in course** — Attiva la funzione per questo corso
* **Use default custom certificate** — Utilizza il modello predefinito della piattaforma invece di progettare il proprio (le due opzioni sono mutuamente esclusive; Chamilo avvisa se si tenta di abilitarle entrambe)

In questo modo nel corso diventa disponibile lo strumento **Certificate setting**, con cui si progetta o si modifica il modello.

## Progettazione del certificato

L'editor del certificato utilizza tag che vengono sostituiti con i dati reali quando viene generato il certificato di un discente, ad esempio `((user_firstname))`, `((course_title))`, `((gradebook_grade))` e `((date_certificate))`. Oltre ai contenuti, è possibile impostare:

* Fino a tre loghi, un'immagine di sigillo e un'immagine di sfondo
* Fino a quattro immagini di firma, ciascuna con la propria didascalia
* I margini e la data e il luogo di rilascio/spedizione mostrati sul certificato

Utilizzare **Certificate** per anteprima del design, oppure **Delete certificate** per rimuovere il modello personalizzato di un corso.

## Consigli

* **Gli studenti non vedono nulla di diverso** — Continuano a scaricare il certificato nel modo consueto dal Gradebook; viene semplicemente utilizzato il vostro modello
* **Anteprima prima di farvi affidamento** — Controllare l'anteprima con dati segnaposto reali per individuare problemi di impaginazione prima che i discenti inizino a generare i certificati
* **Coordinarsi con l'amministratore** — Se si desidera un modello predefinito a livello di piattaforma anziché uno specifico per corso, deve essere configurato prima dall'amministratore