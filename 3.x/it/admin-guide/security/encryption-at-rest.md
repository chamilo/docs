# Crittografia a riposo per i campi del profilo utente

Chamilo 3.1 può facoltativamente crittografare campi personali selezionati del profilo prima di memorizzarli nel database. Questa prima implementazione riguarda **biography**, **phone** e **address**. La crittografia è **disabilitata per impostazione predefinita** e richiede una chiave di crittografia privata. Non crittografa tutte le informazioni utente e non sostituisce la sicurezza del disco, del database, del trasporto o dei backup.

## Prima di abilitare la crittografia

Solo un amministratore della piattaforma con accesso al server deve eseguire il rollout. Innanzitutto, verificare che l'installazione includa le migrazioni di Chamilo 3.1 per l'archiviazione dei campi crittografati, eseguire un backup recuperabile del database e pianificare un backup sicuro della chiave di crittografia **separatamente dal database**. Testare le procedure di ripristino prima di modificare i dati di produzione.

La chiave è memorizzata in `var/data-at-rest/master.key`, al di fuori della root web pubblica. Non pubblicarla mai, non incollarla in una richiesta di supporto e non eseguirne il commit in Git. La perdita della chiave originale può rendere illeggibili i dati crittografati. Non generare una chiave sostitutiva se dati utente sono già crittografati.

## Inizializzare la chiave

Eseguire il comando una sola volta in modalità anteprima:

```bash
php bin/console chamilo:security:initialize-at-rest-key
```

Se segnala che non esistono dati crittografati e che la chiave può essere predisposta, inizializzarla esplicitamente:

```bash
php bin/console chamilo:security:initialize-at-rest-key --apply
```

Se il comando segnala una chiave compatibile esistente, non viene eseguita alcuna sostituzione. Se esistono righe crittografate ma la chiave è assente o non corrispondente, **interrompere** e recuperare la chiave originale.

## Scegliere i campi protetti

Aprire **Administration > Settings > Security** e selezionare **Biography**, **Phone** e/o **Address** nell'impostazione dei campi utente crittografati. Selezionare solo i campi che si intende proteggere. Le nuove scritture sui campi selezionati usano la crittografia autenticata (libsodium XChaCha20-Poly1305); i record in chiaro preesistenti restano leggibili finché non vengono esplicitamente rielaborati.

## Ispezionare e rielaborare i dati esistenti

I comandi di backfill non modificano i record senza `--apply`. Preferire un singolo utente di QA prima di un lotto più ampio:

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=address --user-id=102
```

Dopo aver verificato la disponibilità della chiave, la selezione dei campi, i backup e l'account di QA, eseguire un pilota intenzionale:

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102 --apply
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102 --apply
```

Sostituire `102` con un ID utente di test effettivo. Per insiemi di dati più ampi, usare l'argomento facoltativo `--batch-size` (1–500), esaminare l'output del comando e il comportamento dell'applicazione e pianificare i lotti durante una finestra di manutenzione. Non eseguire un backfill dell'intero database senza una strategia di rollback collaudata.

## Limitazioni operative

- Questa è la prima fase della crittografia a livello di campo, non una crittografia dell'intero database.
- Le integrazioni e le esportazioni SQL dirette più datate potrebbero non sapere come leggere i valori crittografati; verificarle prima del rollout.
- Un backup del database **senza** una chiave recuperabile corrispondente è insufficiente.
- Non registrare nei log i contenuti grezzi dei campi e non includere materiale della chiave nella diagnostica.
- Il solo rollback del codice dell'applicazione non decrittografa i valori memorizzati.

Vedere [Impostazioni di sicurezza](../platform-settings/security-settings.md) per le opzioni generali di sicurezza della piattaforma. Implementazione: [Chamilo LMS PR #9491](https://github.com/chamilo/chamilo-lms/pull/9491).