# Strumenti della piattaforma

Questa pagina tratta gli elementi rimanenti, di dimensioni minori, nel blocco Gestione della piattaforma.

## Campi extra

**Piattaforma > Campi extra** è un selettore di tipo, non un elenco di campi in sé: mostra ogni tipo di oggetto che supporta campi personalizzati e, cliccando su uno di essi, si accede all'editor dei campi di quel tipo. I tipi disponibili includono: utente, corso, sessione, domanda, percorso formativo (e elemento/vista del percorso formativo), competenza, compito (lavoro), carriera, certificato utente, sondaggio, termini e condizioni, categoria del forum, messaggio del forum, esercizio, tracciamento degli esercizi, annuncio del corso, messaggio, documento, calendario delle presenze, glossario, commento di correzione del lavoro, evento di calendario e portfolio (più gli annunci programmati, se tale funzionalità è abilitata).

Per il caso più comunemente utilizzato — i campi personalizzati del profilo utente — si veda [Profilazione utente](../users/user-profiling.md), che copre la stessa funzionalità sottostante dal lato della gestione utenti.

## Modelli di e-mail

**Piattaforma > Modelli di e-mail** consente di sovrascrivere il testo di specifiche e-mail di sistema (conferma di registrazione, notifiche di iscrizione e simili) senza toccare i file del server. Ogni modello ha un titolo, un **tipo** corrispondente alla specifica e-mail integrata che sovrascrive, il corpo del modello stesso (testo semplice/Twig, non un editor avanzato) e un flag «imposta come predefinito»: solo un modello per tipo può essere il predefinito attivo. I modelli sono limitati per URL di accesso; non esiste un campo separato per lingua, quindi la gestione della lingua per queste e-mail è quella già prevista dal codice circostante.

I modelli vengono resi tramite un ambiente Twig **sandboxato** per motivi di sicurezza: è consentito solo un piccolo insieme di tag e filtri, e gli unici dati disponibili sono l'oggetto `User` del destinatario, referenziato come `user.getEmail()`, `user.getFirstname()` e getter simili (`getId`, `getUsername`, `getLastname`, `getStatus`, `getOfficialCode`, `getPhone`). Qualsiasi cosa al di fuori di tale elenco consentito non genera un errore evidente: viene resa silenziosamente vuota, il che poi ripiega sul modello integrato originale. Mantenete i modelli personalizzati semplici e testateli (usando un vero trigger di registrazione o notifica) dopo la modifica.

## Categorie del modulo di contatto

**Piattaforma > Categorie del modulo di contatto** gestisce il menu a discesa mostrato nel modulo pubblico **Contattaci** del portale. Ogni categoria è semplicemente un titolo e un indirizzo e-mail di destinazione: la categoria scelta dal visitatore determina a quale casella viene instradato il messaggio. Usatela per instradare argomenti diversi (supporto, vendite, ammissioni) a team diversi senza creare moduli separati.

## Scorciatoie alle categorie delle impostazioni

Alcuni elementi del blocco sono semplicemente collegamenti diretti a categorie specifiche di [Impostazioni della piattaforma](../platform-settings/README.md), piuttosto che strumenti separati:

* **Plugin** e **Modelli di sistema** aprono le Impostazioni di configurazione prefiltrate su tali categorie
* **Regioni** fa lo stesso, per le impostazioni delle regioni della piattaforma

## Elementi visibili solo occasionalmente

Una manciata di elementi compare solo quando l'impostazione o il plugin pertinente è attivo, quindi potreste non vederli nella vostra installazione:

* **Termini e condizioni** — compare quando **Consenti termini e condizioni** è abilitato, per gestire il testo che gli utenti devono accettare
* **Notifiche** — compare quando la funzionalità degli eventi di notifica della piattaforma è abilitata
* **CMS**, **Dizionario**, **Giustificazione** — ciascuno legato al proprio plugin opzionale installato e abilitato