# Generatore di immagini del corso

Il generatore di immagini del corso basato su IA consente di creare un'immagine in miniatura per il corso direttamente dalla schermata delle impostazioni del corso, senza doverla procurare o progettare autonomamente. Questa è l'immagine mostrata per il corso negli elenchi e nel [catalogo dei corsi](../assessing-learners/subscribing-users.md#self-enrollment-via-the-course-catalog).

## Accesso al generatore

Il pulsante **Genera con IA** <img src="../../.gitbook/assets/icons/mdi-robot.svg" alt="Genera con IA" data-size="line"> è disponibile accanto al campo **Immagine del corso**, a condizione che:

1. Gli assistenti IA siano abilitati a livello di piattaforma
2. Almeno un provider IA configurato sulla piattaforma supporti la generazione di immagini
3. La funzionalità sia consentita nel corso (vedere **Impostazioni degli assistenti IA** in [Impostazioni del corso](../creating-your-course/course-settings.md))

Aprire le **Impostazioni** <img src="../../.gitbook/assets/icons/mdi-cog.svg" alt="Impostazioni" data-size="line"> del corso e scorrere fino al campo **Immagine del corso**:

![Il campo Immagine del corso in Impostazioni del corso, con un pulsante Scegli file e un pulsante Genera con IA sotto di esso](../../.gitbook/assets/course-picture-ai-button.png)

## Come generare un'immagine

1. Fare clic su **Genera con IA**
2. Si apre una finestra di dialogo con un campo **Prompt** precompilato con una descrizione predefinita; modificarlo per descrivere l'illustrazione desiderata, oppure lasciare il valore predefinito così com'è

![La finestra di dialogo Genera con IA che mostra il campo Prompt con il testo predefinito e i pulsanti Annulla/Genera](../../.gitbook/assets/course-picture-ai-modal.png)

3. Fare clic su **Genera** e attendere — la generazione dell'immagine può richiedere alcuni secondi
4. L'immagine generata viene automaticamente inserita nel campo **Immagine del corso**, sostituendo qualsiasi selezione precedente
5. Visualizzarla nel riquadro **Anteprima**, quindi fare clic sul pulsante **Salva** del modulo per applicarla effettivamente al corso — la generazione dell'immagine non la salva da sola

Se il risultato non è soddisfacente, è possibile generare di nuovo con un prompt diverso tutte le volte che si desidera prima di salvare.

## Cosa viene incluso nel prompt

Oltre a quanto si digita, Chamilo aggiunge automaticamente del contesto per aiutare l'IA a produrre un'immagine pertinente e coerente con il marchio:

* Il titolo del corso
* La prima sezione della [Descrizione del corso](../creating-your-course/course-description.md), se compilata — per dare all'IA un'idea dell'argomento effettivo
* Il tema cromatico della piattaforma (primario, secondario, terziario), in modo che l'illustrazione utilizzi colori coerenti con il portale

L'immagine viene generata in stile illustrazione piatta, widescreen (16:9), senza testo leggibile, loghi o persone fotorealistiche — in linea con il formato previsto per una miniatura di corso.

## Consigli

* **Compilare prima una Descrizione del corso** — poiché alimenta il prompt, un corso con una descrizione reale tende a ottenere un'illustrazione più pertinente rispetto a uno senza
* **Essere specifici sullo stile, non sul contenuto** — il titolo e la descrizione del corso ancorano già l'argomento; usare il prompt per indicazioni di stile (atmosfera cromatica, metafora, composizione) piuttosto che ridescrivere il tema
* **Rigenerare invece di accontentarsi** — ogni clic produce un nuovo tentativo senza passaggi aggiuntivi; provare un paio di varianti prima di sceglierne una
* **Ricordarsi di salvare** — il pulsante riempie solo il campo dell'immagine; se si esce senza salvare, l'immagine generata viene persa
* **Se la generazione fallisce, rivolgersi all'amministratore** — una funzionalità disabilitata, un provider di immagini non configurato o una quota mensile di utilizzo IA esaurita producono tutti un messaggio di errore; l'amministratore può verificare la [Configurazione IA](../../admin-guide/integrations/ai-configuration.md)