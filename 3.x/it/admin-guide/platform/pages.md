# Pagine

Pagine è lo strumento integrato di Chamilo, analogo a un CMS, per i blocchi di contenuto che costituiscono le aree pubbliche del portale — la homepage, il piè di pagina, i menu di navigazione e posizionamenti simili — senza dover modificare un file di template.

## Accesso alle Pagine

Dal pannello di amministrazione, fare clic su **Piattaforma > Pagine**.

## Come funzionano le Pagine

Ogni pagina ha:

* **Titolo** e **contenuto** in testo formattato
* Uno **slug**, generato automaticamente dal titolo
* **Abilitata** — se la pagina è attualmente visibile
* **Posizione** — ordinamento tramite trascinamento all'interno della propria categoria
* **Locale** — il contenuto è per lingua: lo stesso posizionamento può contenere una pagina per lingua e il sito ricade sulla lingua predefinita della piattaforma se non esiste una pagina per la lingua del visitatore
* Una **categoria** — è ciò che determina *dove* viene visualizzata la pagina (ad esempio `index`, `home`, `footer_public` o `menu_links`); Chamilo crea automaticamente le categorie di cui ha bisogno

In un'installazione multi-URL (multi-portale), le pagine sono inoltre delimitate per URL di accesso, così ogni portale gestisce i propri contenuti.

## La pagina introduttiva della registrazione

**Piattaforma > Impostazione della pagina di registrazione** è una scorciatoia verso lo stesso sistema Pagine per un posizionamento specifico: il testo introduttivo mostrato sopra il modulo pubblico di iscrizione. È riservato agli amministratori del portale. Facendo clic:

* Si apre la pagina introduttiva esistente per la modifica, se ne esiste già una per l'URL di accesso e la lingua, oppure
* Si crea il posizionamento al volo e si passa direttamente alla creazione del contenuto

Quanto si salva qui viene visualizzato come riquadro informativo direttamente sopra il modulo di registrazione — un luogo naturale per istruzioni, termini specifici dell'organizzazione o contesto che gli utenti potenziali dovrebbero leggere prima di iscriversi. Lasciarla disabilitata (o non crearla mai) per mostrare il modulo di registrazione semplice, senza testo introduttivo.