# Strumenti di sistema

Questa pagina descrive le utilità di manutenzione e ispezione del blocco Sistema.

## Pulizia dei file temporanei

**Sistema > Pulizia dei file temporanei** mostra quanti file temporanei di caricamento esistono e quanto spazio occupano, quindi consente di eliminarli — tutti, oppure solo quelli più vecchi di un’età configurabile. Una modalità dry-run consente di anteprima di ciò che verrebbe eliminato. La stessa azione rimuove anche i file di build legacy obsoleti e rigenera gli asset CSS compilati.

Questa azione ignora deliberatamente le directory di cache di Symfony (`var/cache/dev`, `var/cache/prod`, `var/cache/test` e i pool di cache) — pulisce solo i file sparsi finiti altrove sotto `var/cache/`. **Non** rileverà una modifica apportata in `.env` o sotto `config/` (ad esempio, l’abilitazione della documentazione API — vedere [Abilitare la documentazione API](../installation/configuration.md#enable-the-api-documentation)). Per questo è necessario l’accesso alla shell per eseguire `php bin/console cache:clear`.

## Aggiornamento di sistema

**Sistema > Aggiornamento di sistema** esegue il flusso di auto-aggiornamento di Chamilo direttamente dal pannello di amministrazione, come una sequenza di passaggi discreti e riprendibili:

1. **Stato** — Riporta la versione installata e dove si trovano le directory di aggiornamento/staging/backup, insieme alla chiave di firma attendibile in uso
2. **Verifica disponibilità** — Controlla se è disponibile una versione più recente dalla fonte di aggiornamento configurata
3. **Verifica** — Scarica il pacchetto di aggiornamento e la relativa firma e li confronta con il checksum del manifesto e la chiave pubblica attendibile
4. **Preflight** — Valida i requisiti di sistema e la compatibilità prima che venga toccato qualsiasi elemento
5. **Stage** — Estrae il pacchetto verificato in una directory di staging isolata; nulla nell’installazione live cambia ancora
6. **Piano di applicazione** — Costruisce un diff dei file da aggiungere, sostituire o rimuovere, in base al pacchetto in staging
7. **Applicazione dei file** — Copia i file in posizione. Richiede una conferma esplicita e crea un backup di ogni file sovrascritto più un file di lock che impedisce l’esecuzione concorrente di un secondo aggiornamento
8. **Sicurezza delle migrazioni / controlli post-applicazione** — Valida le migrazioni del database in sospeso e lo stato post-installazione
9. **Esecuzione post-applicazione** — Esegue i comandi console post-applicazione (ad esempio le migrazioni del database), ma solo se la configurazione del server consente di eseguirli dall’interfaccia e solo dopo aver digitato una frase di conferma esplicita e confermato che è stato effettuato un backup

I passaggi di lunga durata riportano l’avanzamento, così la pagina può essere lasciata aperta in sicurezza mentre completano. La combinazione di verifica della firma, staging prima dell’applicazione, backup prima della sovrascrittura, lock di concorrenza e conferme digitate prima delle modifiche al database è pensata per rendere questo flusso sicuro da eseguire senza accesso alla shell — ma un backup manuale prima di iniziare resta una buona pratica; vedere [Backup](../maintenance/backups.md).

## Informazioni sui file

**Sistema > Informazioni sui file** elenca ogni file di risorsa caricato, ricercabile per nome, mostrando il percorso fisico, se è un orfano (non collegato ad alcun corso o sessione) e in quanti punti è referenziato. Da qui è possibile collegare un file orfano a una risorsa, scollegarlo o eliminarlo — utile per rintracciare e ripulire lo storage che non appartiene più ad alcun corso.

## Risorse per tipo

**Sistema > Risorse per tipo** consente di scegliere un tipo di risorsa e di vedere, in tutti i corsi e le sessioni, un conteggio aggregato e un elenco degli elementi di quel tipo, quando sono stati creati e (ove applicabile) quali utenti sono associati. Serve a rispondere a domande come «quanti forum esistono a livello di piattaforma» o «quali corsi hanno più documenti».

## Elenco icone

**Sistema > Elenco icone** è un catalogo consultabile del set di icone integrate di Chamilo, raggruppato per categoria. È principalmente utile nello sviluppo di plugin o temi quando occorre confermare il nome esatto di un’icona, ma è esposto qui come riferimento generale.

## Strumenti solo per lo sviluppo

Altri due elementi possono comparire in questo blocco, ma solo quando sul server è presente una directory `tests/` — il che normalmente accade solo su un’installazione di sviluppo o QA, mai in produzione:

* **Data filler** genera grandi volumi di utenti, corsi e record di utenti online fittizi, per test di carico o QA.
* **Tester e-mail** invia una vera e-mail di prova tramite il mailer configurato della piattaforma, per confermare che le impostazioni SMTP/posta funzionino, e mostra gli eventuali errori di invio recenti.

Se non vedi questi due collegamenti, è previsto — significa che l’installazione non ha una directory `tests/`, che è lo stato normale e corretto per una piattaforma di produzione.