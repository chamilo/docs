# Impostazioni di Visualizzazione

Come la piattaforma viene mostrata agli utenti — layout della homepage, gravatar, menu, comportamento del branding e simili preferenze visive.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Visualizzazione**. Questa categoria contiene **24 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati predefiniti delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `accessibility_font_resize`

**Funzionalità di accessibilità per il ridimensionamento del font**

Abilita questa opzione per mostrare un set di opzioni di ridimensionamento del font nell'angolo in alto a destra del tuo campus. Ciò consentirà alle persone con disabilità visive di leggere più facilmente i contenuti dei corsi.

*Predefinito: `false`*

### `display_categories_on_homepage`

**Mostra categorie nella home page**

Questa opzione mostrerà o nasconderà le categorie dei corsi nella home page del portale.

*Predefinito: `false`*

### `enable_help_link`

**Abilita link di aiuto**

Il link di aiuto si trova nella parte superiore destra dello schermo.

*Predefinito: `true`*

### `gravatar_enabled`

**Immagini utente Gravatar**

Abilita questa opzione per cercare nel repository di Gravatar le immagini dell'utente corrente, se l'utente non ha definito un'immagine localmente. Questo è utile per riempire automaticamente le immagini sul tuo sito, specialmente se i tuoi utenti sono attivi su internet. Le immagini Gravatar possono essere configurate facilmente, in base all'indirizzo e-mail di un utente, su http://en.gravatar.com/

*Predefinito: `false`*

### `gravatar_type`

**Tipo di avatar Gravatar**

Se l'opzione Gravatar è abilitata e l'utente non ha un'immagine configurata su Gravatar, questa opzione ti permette di scegliere il tipo di avatar che Gravatar genererà per ogni utente. Consulta <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a> per esempi di tipi di avatar.

*Predefinito: `mm`*

### `hide_complete_name_in_whoisonline`

**Nascondi il nome completo in 'chi è online'**

La pagina 'chi è online' (se abilitata) mostrerà un'immagine e un nome per ogni utente attualmente online. Abilita questa opzione per nascondere i nomi.

*Predefinito: `false`*

### `hide_logout_button`

**Nascondi pulsante di logout**

Nascondi il pulsante di logout. Questo è solitamente utile solo quando si utilizza un metodo di login/logout esterno, ad esempio con un sistema di Single Sign On.

*Predefinito: `false`*

### `hide_main_navigation_menu`

**Nascondi menu di navigazione principale**

Quando si utilizza Chamilo per uno scopo specifico (come un esame online di massa), potresti voler ridurre ulteriormente le distrazioni rimuovendo il menu laterale.

*Predefinito: `false`*

### `hide_social_media_links`

**Nascondi link ai social media**

Alcune pagine permettono di promuovere il portale o un corso sui social network. Abilita questa impostazione per rimuovere i link.

*Predefinito: `false`*

### `order_user_list_by_official_code`

**Ordina utenti per codice ufficiale**

Utilizza il 'codice ufficiale' per ordinare la maggior parte delle liste di studenti sulla piattaforma, invece del cognome o del nome.

*Predefinito: `false`*

### `pdf_logo_header`

**Logo intestazione PDF**

Se utilizzare l'immagine in var/themes/[your-theme]/images/pdf_logo_header.png come logo intestazione PDF per tutte le esportazioni PDF (invece del normale logo del portale).

### `show_admin_toolbar`

**Mostra barra degli strumenti amministrativa**

Mostra una barra degli strumenti globale in cima alla pagina per i ruoli utente designati. Questa barra, molto simile alle barre di Wordpress e Google, può davvero velocizzare azioni complesse e migliorare lo spazio disponibile per i contenuti di apprendimento, ma potrebbe confondere alcuni utenti.

*Predefinito: `do_not_show`*

### `show_back_link_on_top_of_tree`

**Mostra link di ritorno da categorie/corsi**

Mostra un link per tornare indietro nella gerarchia dei corsi. Un link è comunque disponibile in fondo alla lista.

*Predefinito: `false`*

### `show_closed_courses`

**Mostrare corsi chiusi nella pagina di login e nella pagina iniziale del portale?**

Mostrare i corsi chiusi nella pagina di login e nella pagina iniziale dei corsi? Nella pagina iniziale del portale apparirà un'icona accanto ai corsi per iscriversi rapidamente a ciascun corso. Questo apparirà solo nella pagina iniziale del portale quando l'utente è loggato e quando l'utente non è ancora iscritto al portale.

*Predefinito: `false`*

### `show_email_addresses`

**Mostra indirizzi email**

Mostra gli indirizzi email agli utenti.

*Predefinito: `false`*

### `show_empty_course_categories`

**Mostra categorie di corsi vuote**

Mostra le categorie di corsi nella homepage, anche se sono vuote.

*Predefinito: `true`*

### `show_hot_courses`

**Mostra corsi popolari**

La lista dei corsi popolari verrà aggiunta nella pagina indice.

*Predefinito: `true`*

### `show_number_of_courses`

**Mostra numero di corsi**

Mostra il numero di corsi in ogni categoria nelle categorie di corsi nella homepage.

*Predefinito: `false`*

---
### `show_tabs`

**Voci del menu principale**

Seleziona le voci che desideri vengano visualizzate nel menu principale.

*Default:*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**Voci del menu principale per ruolo**

Definisci la visibilità delle schede dell'intestazione per ciascun ruolo.

*Default: `{}`*

### `showonline`

**Chi è online**

Mostrare il numero di persone attualmente online?

*Default: `world`*

### `table_default_row`

**Numero predefinito di righe nelle tabelle**

Quante righe dovrebbero essere mostrate di default in tutte le tabelle.

*Default: `20`*

### `table_row_list`

**Numeri di paginazione predefiniti offerti nelle tabelle**

Imposta le opzioni che desideri vengano visualizzate nella navigazione attorno a una tabella per mostrare meno o più righe su una pagina. Ad esempio, [50, 100, 200, 500].

*Default: `[10,20,50,100]`*

### `time_limit_whosonline`

**Limite di tempo per Chi è online**

Questo limite di tempo definisce per quanti minuti dopo la sua ultima azione un utente sarà considerato *online*.

*Default: `30`*