# Personalizzare i nomi e le icone degli strumenti del corso

Chamilo 3.1 consente agli editor del corso autorizzati di personalizzare il **nome** e l'**icona SVG** visualizzati per uno strumento nella pagina iniziale del corso. Queste modifiche sono limitate al corso e preservano le destinazioni esistenti degli strumenti.

## Personalizzare uno strumento

1. Aprire la pagina iniziale del corso come utente autorizzato a modificare il corso.
2. Attivare la modalità **Personalizza** nella griglia degli strumenti.
3. Aprire il modulo di personalizzazione dello strumento che si desidera modificare.
4. Inserire il **Nome** desiderato e, se necessario, selezionare un file SVG per l'**Icona**.
5. Selezionare **Salva** e verificare lo strumento aggiornato nella griglia della pagina iniziale.

La personalizzazione degli strumenti è distinta dalle modalità **Ordina**, **Mostra tutto** e **Nascondi tutto** della griglia. La modifica dell'etichetta o dell'icona di uno strumento non crea un nuovo strumento, non ne modifica l'URL sottostante e non concede agli studenti ulteriori autorizzazioni di accesso.

## Requisiti e sicurezza degli SVG

Utilizzare un file SVG proveniente da una fonte attendibile. Chamilo convalida il contenuto SVG caricato e rifiuta i file non sicuri. Se un file viene rifiutato, semplificarlo o riesportarlo come SVG pulito invece di tentare di aggirare la convalida.

Verificare l'icona e il nome risultanti sia come docente sia come studente e accertarsi che un altro corso resti invariato. Gli studenti non possono personalizzare gli strumenti a meno che non dispongano delle autorizzazioni di modifica del corso richieste.

Vedere [Pagina iniziale del corso](course-homepage.md). Implementazione: [PR #9374](https://github.com/chamilo/chamilo-lms/pull/9374).