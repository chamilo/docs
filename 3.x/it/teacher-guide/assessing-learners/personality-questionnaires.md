# Questionari di personalità

Chamilo 3.1 include questionari di tipo personalità nello strumento moderno **Sondaggi**. Questi questionari producono un **profilo di preferenze**, non un esercizio valutato né una valutazione psicologica clinica.

## Creare un questionario

1. Aprire lo strumento Sondaggi e creare un nuovo sondaggio.
2. Nella sua configurazione, scegliere il tipo di sondaggio **personalità**.
3. Aprire **Modifica domande** o l'editor delle domande del sondaggio.
4. Definire le **Categorie di personalità** prima di aggiungere le domande di personalità. Ogni opzione di risposta deve appartenere a una categoria.
5. Aggiungere le domande, configurare le risposte e le assegnazioni alle categorie, quindi salvare le modifiche.
6. Visualizzare in anteprima l'esperienza del discente prima di distribuire il sondaggio.

Sono disponibili quattro tipi di domande di personalità:

| Tipo | Modalità di risposta dei discenti |
| --- | --- |
| Scelta di personalità | Scegliere tra opzioni associate a categorie |
| Accordo di personalità | Indicare il grado di accordo con gli elementi presentati |
| Scala di personalità | Valutare gli elementi su una scala a cinque punti |
| Ordine di personalità | Classificare le opzioni dalla più alla meno preferita |

La configurazione include la convalida delle risposte e il calcolo del punteggio delle preferenze basato sulle categorie. Verificare attentamente le opzioni e le assegnazioni di ciascuna domanda: un'opzione associata alla categoria errata modifica il profilo risultante.

## Visualizzare i risultati

Dopo aver completato il questionario, un discente può visualizzare **Il tuo profilo di personalità** quando il sondaggio restituisce i dati del profilo. La pagina di report del sondaggio del docente può mostrare **Profilo di personalità — tutti i discenti**. I risultati sono presentati con visualizzazioni a barre/radar e punteggi per categoria. La duplicazione del sondaggio conserva la configurazione del questionario di personalità.

## Gradebook e interpretazione

I questionari di personalità non possono essere valutati tramite il Gradebook come le valutazioni ordinarie. Spiegare ai discenti che i risultati riflettono le risposte alle categorie configurate, non una diagnosi, uno stato di superamento/non superamento o un test di personalità validato. Esaminare le impostazioni di privacy e di visibilità dei report prima di raccogliere risposte personali.

Vedere [Sondaggi](surveys.md). Implementazione: [PR #9468](https://github.com/chamilo/chamilo-lms/pull/9468).