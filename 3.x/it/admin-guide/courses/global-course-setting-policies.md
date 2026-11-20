# Politiche globali delle impostazioni dei corsi

Gli amministratori della piattaforma possono definire valori predefiniti centralizzati per le impostazioni dei corsi e controllare se i docenti possono sovrascriverli. Le politiche si applicano alle funzionalità esistenti dei corsi, preservando le configurazioni specifiche del corso compatibili.

## Aprire la pagina delle politiche

Nell'**URL di accesso principale**, aprire **Amministrazione > Impostazioni > Impostazioni del corso**, oppure navigare a `/admin/settings/course-settings` nell'installazione. Questa pagina di amministrazione è riservata agli amministratori della piattaforma autorizzati sull'URL di accesso principale. Non utilizzare un portale secondario per modificare le politiche globali.

## Configurare una politica

1. Utilizzare il campo **Cerca** se è necessaria una chiave specifica delle impostazioni del corso.
2. Per ogni impostazione, verificare il nome esatto della variabile mostrato sotto la relativa intestazione.
3. Selezionare o deselezionare **Modificabile nel corso** per controllare se gli editor del corso possono modificare tale impostazione.
4. Scegliere o immettere un **Valore predefinito della piattaforma**. Alcune impostazioni offrono un menu a discesa dei valori consentiti; altre accettano testo.
5. Salvare le modifiche e verificare il comportamento effettivo in un corso di prova.

Le impostazioni che riutilizzano lo stesso nome di variabile in categorie diverse vengono visualizzate separatamente ove necessario. Non presumere che due nomi visivamente simili controllino la stessa funzionalità del corso.

## Verificare con due ruoli

In qualità di amministratore, confermare il valore predefinito memorizzato e se è modificabile. In qualità di docente del corso, aprire l'impostazione del corso corrispondente e verificare che il valore effettivo e la restrizione di modifica corrispondano alla politica. Testare, ove possibile, sia un corso esistente sia un corso nuovo.

La modifica di un valore predefinito globale può influire su molti corsi. Valutarne l'impatto prima di disabilitare le sovrascritture dei docenti e registrare i valori precedenti della politica, in modo che possano essere ripristinati se necessario.

Vedere [Gestione dei corsi](managing-courses.md) e [Impostazioni del corso](../../teacher-guide/creating-your-course/course-settings.md). Implementazione: [PR #9328](https://github.com/chamilo/chamilo-lms/pull/9328).