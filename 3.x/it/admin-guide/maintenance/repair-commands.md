# Comandi di riparazione e conversione

> **Modifica incompatibile.** I comandi di manutenzione riportati di seguito scrivevano nel database non appena venivano eseguiti. Ora sono **in sola lettura (dry-run) per impostazione predefinita** e scrivono solo quando viene specificato `--apply`, seguendo il modello di `chamilo:migration:repair-quiz-relations-from-legacy`.

| Comando | Note |
|---------|-------|
| `chamilo:migration:repair-group-forums-without-item-property` | |
| `chamilo:migration:repair-forum-posts-without-item-property` | |
| `chamilo:migration:repair-quiz-questions-without-resource-node` | |
| `chamilo:migration:repair-gradebook-structure` | |
| `chamilo:migration:repair-translatehtml-language-blocks` | |
| `chamilo:migration:repair-legacy-certificate-history` | |
| `app:multi-url:convert` | nessun `--expected-count` (operazione unica tutto-o-niente) |

## Cosa è cambiato per gli amministratori

1. Eseguire il comando senza opzioni: segnala ciò che farebbe, non scrive nulla e stampa la riga esatta
   `--apply --expected-count=N` da utilizzare.
2. Per scrivere, eseguirlo di nuovo con `--apply --expected-count=N`, dove N è il numero segnalato dall'esecuzione in sola lettura.
   Se il numero di righe che verrebbero modificate differisce da N (i dati sono cambiati nel frattempo), il comando rifiuta
   e non scrive nulla.
3. `--dry-run` è ancora accettato (ora è l'impostazione predefinita e non fa nulla); combinarlo con `--apply` è un errore.
4. Gli script e i job cron che eseguivano questi comandi senza argomenti e si basavano sulla loro scrittura devono ora passare
   `--apply --expected-count=N`. I codici di uscita restano invariati (0 successo, 1 errore, 2 utilizzo non valido).

Esempio:

```bash
php bin/console chamilo:migration:repair-translatehtml-language-blocks
# ... "To write, re-run with --apply --expected-count=12"
php bin/console chamilo:migration:repair-translatehtml-language-blocks --apply --expected-count=12
```

```bash
php bin/console app:multi-url:convert "https://admin.example.com/"          # plan only
php bin/console app:multi-url:convert "https://admin.example.com/" --apply  # convert
```

## Nuovo comando: `app:repair-user-tag-counters`

Ricalcola il contatore di utilizzo (`tag.count`) dei tag a partire dalle righe di relazione che li usano (tag utente, tag dei campi extra,
tag del portfolio). Le versioni precedenti lasciavano che i contatori si disallineassero. Stesso modello: eseguirlo senza opzioni per elencare i tag disallineati
e ottenere la riga `--apply --expected-count=N`, quindi eseguire quella riga per scrivere. Non è coinvolta alcuna migrazione: eseguirlo
quando si desidera risincronizzare i contatori.