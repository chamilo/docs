# Certificati di conseguimento (generazione in batch)

Chamilo può generare automaticamente il certificato di conseguimento di un corso per ogni studente che lo ha
completato — all'interno di un corso base e all'interno di qualsiasi sessione che lo riutilizza — senza che un docente
debba aprire ciascun corso singolarmente. Due comandi da console coprono questa esigenza, uno per un singolo corso
e uno per l'intera piattaforma, e nessuno dei due è un'operazione pesante sul database da dover sorvegliare:
entrambi lavorano in batch delimitati, supportano una prova a secco e possono essere ripresi in modo sicuro se interrotti.

## Comando a livello di piattaforma

```bash
php bin/console chamilo:gradebook:process-achievement-certificates [options]
```

Per ogni corso che dispone di una categoria radice del registro dei voti idonea — di primo livello, non una sottocategoria,
con **Genera certificati** abilitato — il comando valuta ogni studente iscritto che non
possiede già un certificato per quella categoria e ne genera uno per chiunque abbia soddisfatto il
requisito di completamento. Un corso può contribuire con **più di un** contesto: la sua iscrizione di base e,
separatamente, un contesto per ogni sessione che lo riutilizza, poiché una sessione può avere una propria categoria radice
e una propria soglia di superamento.

Un corso, o uno dei suoi contesti di sessione, viene ignorato — non trattato come un errore — quando non è
idoneo all'elaborazione automatica: nessuna regola di completamento configurata, più di una categoria radice idonea
per quel contesto (ambiguo, richiede una scelta manuale) oppure contenuto di notifica del certificato mancante. Il riepilogo dell'esecuzione alla fine indica quanti contesti rientrano in ciascun caso, così nulla viene
ignorato senza essere segnalato.

### Origine del completamento

* `--completion-mode=course-rule` (predefinito): utilizza la regola di completamento configurata per il corso.
* `--completion-mode=gradebook`: utilizza direttamente il punteggio nativo del registro dei voti per quel contesto.
  In questa modalità è idoneo solo un contesto con esattamente una categoria radice idonea — uno con più categorie
  viene ignorato e segnalato, per essere elaborato singolarmente (vedere sotto).

### Opzioni di sicurezza

| Opzione                     | Scopo                                                                                                                                 |
| --------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`                 | Valuta e segnala senza creare certificati né inviare notifiche. Eseguire sempre questa opzione per prima.                                      |
| `--send-notification`       | Obbligatoria per un'esecuzione reale (non in prova a secco). Invia il messaggio interno e l'e-mail configurati del corso dopo la creazione di ciascun certificato. |
| `--sender-id=<id>`          | Amministratore attivo della piattaforma utilizzato come mittente della notifica. Obbligatorio insieme a `--send-notification`.                            |
| `--limit=<n>`                | Numero massimo di certificati generati (o, in prova a secco, segnalati) in una singola esecuzione. `0` = illimitato. Predefinito `100`.                                    |
| `--scan-limit=<n>`           | Numero massimo di studenti valutati in una singola esecuzione, su tutti i corsi e le sessioni. `0` = illimitato. Predefinito `1000`.                                 |
| `--batch-size=<n>`           | Studenti caricati per batch di database all'interno di un contesto corso/sessione. Predefinito `25`.                                                     |
| `--course-batch-size=<n>`    | Corsi caricati per batch di database. Predefinito `50`.                                                                                         |
| `--after-course-id=<id>`     | Riprende la scansione dopo questo ID corso. Sicuro da riutilizzare dopo un'esecuzione interrotta — un corso non rigenera mai un certificato per uno studente che ne possiede già uno. |
| `--user-id=<id>`             | Limita l'esecuzione a un solo studente, verificato su ogni corso e sessione idonei — utile per convalidare il comportamento prima di un'esecuzione a livello di piattaforma. |
| `--regenerate-empty`         | Elabora anche gli studenti il cui record di certificato esiste ma non contiene un file di certificato memorizzato — ad esempio dopo una generazione interrotta a metà — e genera nuovamente quel certificato. Gli studenti con un certificato completo non vengono mai modificati. |

### Esempi

Eseguire prima una simulazione sull'intera piattaforma, per vedere cosa verrebbe generato:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates --dry-run
```

Esecuzione reale, con notifica agli studenti e l'amministratore con ID 1 come mittente:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1
```

Riprendere un'esecuzione interrotta dopo il corso 480:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1 --after-course-id=480
```

Generare di nuovo i certificati il cui record esiste ma il cui file non è mai stato archiviato (eseguire prima una simulazione
per elencarli):

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --dry-run
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --send-notification --sender-id=1
```

### Pianificazione come cron job

```cron
# Every night at 2 AM
0 2 * * * php /path/to/chamilo/bin/console chamilo:gradebook:process-achievement-certificates --send-notification --sender-id=1 -e prod --no-interaction >> /path/to/chamilo/var/log/achievement-certificates.log 2>&1
```

## Elaborazione di un singolo corso

`chamilo:migration:process-achievement-certificates --course-id=<id>` offre le stesse opzioni di simulazione,
notifica e paginazione del comando a livello di piattaforma, limitate al solo corso di base
(non alle sue sessioni), con un `--category-id` esplicito per disambiguare quando un corso ha più di
una categoria radice idonea:

```bash
php bin/console chamilo:migration:process-achievement-certificates \
  --course-id=42 --category-id=7 --dry-run
```

Usarlo per testare un singolo corso prima di un'esecuzione a livello di piattaforma, oppure per elaborare un corso che l'esecuzione a livello di
piattaforma ha segnalato come ignorato a causa di una categoria ambigua.

## Codici di uscita

Entrambi i comandi terminano con uno stato di errore se almeno una generazione di certificato è effettivamente fallita
durante un'esecuzione reale (controllare `var/log/dev.log` — o il log di produzione equivalente — per l'errore
sottostante). I contesti ignorati per motivi strutturali (nessuna regola, categoria ambigua, configurazione delle notifiche
mancante) non provocano un codice di uscita di errore; vengono invece riportati nel riepilogo.

## Argomento correlato: discenti bloccati sotto il 100% in un percorso di apprendimento prerequisito

Se la regola di completamento di un corso richiede che un percorso di apprendimento raggiunga il 100%, un discente che ha terminato ogni
passaggio ma non ha mai aperto la pagina finale «Congratulazioni» del percorso resta bloccato appena sotto il 100% e non
diventa mai idoneo in questo contesto. Vedere
[Completamento degli elementi finali bloccati di un percorso di apprendimento](learning-path-final-items.md) — eseguirlo prima se
agli studenti mancano certificati che ci si aspetterebbe abbiano conseguito.

## Superato: lo script cron legacy

`public/main/cron/add_gradebook_certificates.php` non è più consigliato. Carica ogni
risultato del registro dei voti della piattaforma in memoria con un'unica query senza limiti e non la rilascia mai
durante il ciclo, quindi può esaurire la memoria su un'istanza con un numero non trascurabile di corsi o
esercizi, e non invia mai la notifica «hai conseguito un certificato». Usare invece
`chamilo:gradebook:process-achievement-certificates`.