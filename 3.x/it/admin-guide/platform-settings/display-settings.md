# Impostazioni di visualizzazione

Come la piattaforma viene mostrata agli utenti — layout della homepage, gravatar, menu, comportamento del branding e analoghe preferenze visive.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Visualizzazione**. Questa categoria contiene **28 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `accessibility_font_resize`

**Funzione di accessibilità per il ridimensionamento del carattere**

Abilitare questa opzione per mostrare un insieme di opzioni di ridimensionamento del carattere in alto a destra del campus. Ciò consentirà alle persone ipovedenti di leggere più facilmente i contenuti dei corsi.

*Predefinito: `false`*

### `display_categories_on_homepage`

**Mostra le categorie nella pagina iniziale**

Questa opzione mostrerà o nasconderà le categorie dei corsi nella pagina iniziale del portale

*Predefinito: `false`*

### `enable_help_link`

**Abilita il collegamento di aiuto**

Il collegamento Aiuto si trova nella parte in alto a destra dello schermo

*Predefinito: `true`*

### `gravatar_enabled`

**Immagini utente Gravatar**

Abilitare questa opzione per cercare nel repository Gravatar le immagini dell'utente corrente, se l'utente non ha definito un'immagine in locale. È un ottimo modo per compilare automaticamente le immagini sul sito, in particolare se gli utenti sono attivi su Internet. Le immagini Gravatar possono essere configurate facilmente, in base all'indirizzo e-mail di un utente, all'indirizzo http://en.gravatar.com/

*Predefinito: `false`*

### `gravatar_type`

**Tipo di avatar Gravatar**

Se l'opzione Gravatar è abilitata e l'utente non ha un'immagine configurata su Gravatar, questa opzione consente di scegliere il tipo di avatar che Gravatar genererà per ciascun utente. Consultare <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a> per esempi di tipi di avatar.

*Predefinito: `mm`*

### `hide_complete_name_in_whoisonline`

**Nascondi il nome utente completo in «chi è online»**

La pagina «chi è online» (se abilitata) mostrerà un'immagine e un nome per ciascun utente attualmente online. Abilitare questa opzione per nascondere i nomi.

*Predefinito: `false`*

### `hide_home_top_when_connected` **v3**

**Nascondi il contenuto superiore nella homepage quando si è connessi**

Nella homepage della piattaforma, questa opzione consente di nascondere il blocco di introduzione (per lasciare, ad esempio, solo gli annunci) per tutti gli utenti già autenticati. Il blocco di introduzione generale continuerà a essere visibile agli utenti non ancora autenticati.

*Predefinito: `false`*

### `hide_logout_button`

**Nascondi il pulsante di disconnessione**

Nasconde il pulsante di disconnessione. Di solito è utile solo quando si utilizza un metodo di accesso/disconnessione esterno, ad esempio un Single Sign On di qualche tipo.

*Predefinito: `false`*

### `hide_main_navigation_menu`

**Nascondi il menu di navigazione principale**

Quando si utilizza Chamilo per uno scopo specifico (come un esame online di massa), si potrebbe voler ridurre ulteriormente le distrazioni rimuovendo il menu laterale.

*Predefinito: `false`*

### `hide_social_media_links`

**Nascondi i collegamenti ai social media**

Alcune pagine consentono di promuovere il portale o un corso sui social network. Abilitare questa impostazione per rimuovere i collegamenti.

*Predefinito: `false`*

### `order_user_list_by_official_code`

**Ordina gli utenti per codice ufficiale**

Utilizzare il «codice ufficiale» per ordinare la maggior parte degli elenchi di studenti sulla piattaforma, invece del cognome o del nome.

*Predefinito: `false`*

### `pdf_logo_header`

**Logo intestazione PDF**

Se utilizzare l'immagine in var/themes/[your-theme]/images/pdf_logo_header.png come logo di intestazione PDF per tutte le esportazioni PDF (invece del logo normale del portale)

### `show_admin_toolbar`

**Mostra la barra degli strumenti di amministrazione**

Mostra una barra degli strumenti globale in cima alla pagina ai ruoli utente designati. Questa barra, molto simile alle barre nere di Wordpress e Google, può accelerare notevolmente le azioni complesse e migliorare lo spazio disponibile per i contenuti didattici, ma potrebbe risultare confusa per alcuni utenti

*Predefinito: `do_not_show`*

### `show_administrator_data` **v3**

**Informazioni sull'amministratore della piattaforma nel piè di pagina**

Mostrare le informazioni sull'amministratore della piattaforma nel piè di pagina?

*Predefinito: `true`*

### `show_back_link_on_top_of_tree`

**Mostra i collegamenti indietro da categorie/corsi**

Mostra un collegamento per tornare indietro nella gerarchia dei corsi. Un collegamento è comunque disponibile in fondo all'elenco.

*Predefinito: `false`*

### `show_closed_courses`

**Mostrare i corsi chiusi nella pagina di accesso e nella pagina iniziale del portale?**

Mostrare i corsi chiusi nella pagina di accesso e nella pagina iniziale dei corsi? Nella pagina iniziale del portale apparirà un'icona accanto ai corsi per iscriversi rapidamente a ciascun corso. Apparirà solo nella pagina iniziale del portale quando l'utente è autenticato e quando l'utente non è ancora iscritto al portale.

*Predefinito: `false`*

### `show_email_addresses`

**Mostra gli indirizzi e-mail**

Mostra gli indirizzi e-mail agli utenti

*Predefinito: `false`*

### `show_empty_course_categories`

**Mostra le categorie di corsi vuote**

Mostra le categorie dei corsi nella homepage, anche se sono vuote

*Predefinito: `true`*

### `show_hot_courses`

**Mostra i corsi in evidenza**

L'elenco dei corsi in evidenza verrà aggiunto nella pagina indice

*Predefinito: `true`*

### `show_number_of_courses`

**Mostra il numero di corsi**

Mostra il numero di corsi in ciascuna categoria nelle categorie dei corsi sulla homepage

*Predefinito: `false`*

### `show_tabs`

**Voci del menu principale**

Seleziona le voci che desideri far comparire nel menu principale

*Predefinito:*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**Voci del menu principale per ruolo**

Definisce la visibilità delle schede dell'intestazione per ruolo.

*Predefinito: `{}`*

### `show_teacher_data` **v3**

**Mostra le informazioni del docente nel piè di pagina**

Mostrare il riferimento al docente (nome e e-mail se disponibili) nel piè di pagina?

*Predefinito: `true`*

### `show_tutor_data` **v3**

**I dati del tutor della sessione sono mostrati nel piè di pagina.**

Mostrare il riferimento al tutor della sessione (nome e e-mail se disponibili) nel piè di pagina?

*Predefinito: `true`*

### `showonline`

**Chi è online**

Visualizzare il numero di persone online?

*Predefinito: `world`*

### `table_default_row`

**Numero predefinito di righe delle tabelle**

Quante righe devono essere mostrate in tutte le tabelle per impostazione predefinita.

*Predefinito: `20`*

### `table_row_list`

**Numeri di paginazione predefiniti offerti nelle tabelle**

Imposta le opzioni che desideri far comparire nella navigazione intorno a una tabella per mostrare meno o più righe in una pagina. es. [50, 100, 200, 500].

*Predefinito: `[10,20,50,100]`*

### `time_limit_whosonline`

**Limite di tempo su Chi è online**

Questo limite di tempo definisce per quanti minuti dopo la sua ultima azione un utente sarà considerato *online*

*Predefinito: `30`*