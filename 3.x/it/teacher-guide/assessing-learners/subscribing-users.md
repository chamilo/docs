# Iscrizione degli utenti

Prima di poter valutare un discente, è necessario che sia iscritto al vostro corso. Chamilo offre quattro modalità per far entrare qualcuno, a seconda di chi effettua l'iscrizione e del fatto che la persona abbia già un account sulla piattaforma.

| Metodo | Chi lo esegue | Serve un account esistente? |
|--------|-------------|------------------------------|
| [Iscrizione da parte dell'amministratore](#administrator-enrollment) | Amministratore della piattaforma | Sì |
| [Autoiscrizione tramite il catalogo dei corsi](#self-enrollment-via-the-course-catalog) | Il discente, in autonomia | Sì |
| [Iscrizione manuale tramite lo strumento Utenti](#manual-enrollment-via-the-users-tool) | Docente (o amministratore del corso) | Sì |
| [Invito degli utenti via e-mail](#inviting-users-by-email) | Docente (o amministratore del corso) | **No** |

## Administrator Enrollment

Un amministratore della piattaforma può iscrivere qualsiasi utente esistente a qualsiasi corso direttamente dal pannello di amministrazione — utile per l'onboarding in blocco (ad es. l'importazione di un elenco di classe) o quando un docente non ha i diritti per gestire autonomamente le iscrizioni. Consultate la sezione [Courses](../../admin-guide/courses/README.md) della Guida all'amministrazione.

## Self-Enrollment via the Course Catalog

Se la [visibilità](../creating-your-course/course-settings.md#course-visibility) del vostro corso lo consente, i discenti con un account sulla piattaforma possono iscriversi da soli trovando il vostro corso in **Esplora altri corsi** e facendo clic per unirsi — nessuna azione è richiesta da parte vostra. La disponibilità di questa opzione, e l'eventuale richiesta di una password, sono controllate dalle **Impostazioni di iscrizione** in [Impostazioni del corso](../creating-your-course/course-settings.md#enrollment-settings).

## Manual Enrollment via the Users Tool

Per iscrivere qualcuno che ha già un account sulla piattaforma ma non si è unito autonomamente, aprite lo strumento **Utenti** del vostro corso e fate clic sull'icona **Aggiungi utenti** <img src="../../.gitbook/assets/icons/mdi-account-plus.svg" alt="Aggiungi utenti" data-size="line">.

1. Cercate la persona per nome, nome utente, e-mail o codice ufficiale
2. Fate clic su **Registra** nella relativa riga, oppure selezionate più persone con le caselle di controllo e usate il menu **Azione** per registrarle tutte in una volta

![Risultati della ricerca nella schermata Iscrivi utenti al corso, che mostra un discente corrispondente e un pulsante Registra](../../.gitbook/assets/course-users-subscribe-search.png)

Nei risultati compaiono solo gli utenti che non sono già iscritti al corso.

> Questa icona è disponibile per i docenti per impostazione predefinita. Un amministratore della piattaforma può limitarla ai soli amministratori tramite l'impostazione **Allow User Course Subscription By Course Administrator** (`allow_user_course_subscription_by_course_admin`) — se non vedete l'icona **Aggiungi utenti**, chiedete al vostro amministratore.

## Inviting Users by Email

I tre metodi precedenti presuppongono tutti che la persona abbia già un account sulla piattaforma. Gli **inviti al corso** coprono il caso in cui non lo abbia: si invia un invito a un indirizzo e-mail e Chamilo invia a quella persona un collegamento monouso. Aprendo il collegamento possono creare un account e, non appena completano la registrazione, vengono automaticamente iscritti al vostro corso — senza bisogno di un passaggio di iscrizione separato.

### Accessing the Tool

Aprite lo strumento **Utenti** del vostro corso, quindi fate clic sull'icona **Invita via e-mail** <img src="../../.gitbook/assets/icons/mdi-email-outline.svg" alt="Invita via e-mail" data-size="line"> nella barra degli strumenti, accanto ad **Aggiungi utenti**:

![La barra degli strumenti dello strumento Utenti, che mostra l'icona Aggiungi utenti e l'icona Invita via e-mail](../../.gitbook/assets/course-users-invite-icon.png)

Si apre la pagina **Inviti al corso**.

### Who Can Send Invitations

* Gli amministratori della piattaforma, sempre.
* In un corso semplice (non aperto in una sessione): i docenti e gli altri utenti con diritti di modifica sul corso.
* In una sessione: il coach generale della sessione, o un amministratore di sessione — non l'insieme più ampio dei coach del corso, poiché l'invio di un invito in questo contesto iscrive all'*intera sessione*, non solo a questo corso.

### Invio di un invito

1. Inserire l'indirizzo e-mail del destinatario nel modulo **Invita via e-mail**
2. Fare clic su **Invia invito**

![La pagina Inviti al corso: il modulo invita-via-e-mail e una tabella degli inviti inviati con il relativo stato](../../.gitbook/assets/course-invitations-list.png)

Ogni invito inviato per questo corso compare sotto il modulo, con il relativo stato:

| Stato | Significato |
|--------|---------|
| **In attesa** | Inviato, non ancora utilizzato. Ancora entro il periodo di validità. |
| **Accettato** | Il destinatario si è registrato ed è stato iscritto. |
| **Revocato** | È stato annullato prima di essere utilizzato. |

Per un invito ancora in attesa, la colonna **Azioni** offre:

* **Copia** <img src="../../.gitbook/assets/icons/mdi-content-copy.svg" alt="Copia" data-size="line"> — copia il collegamento dell'invito, nel caso si preferisca condividerlo autonomamente (chat, di persona) invece di affidarsi all'e-mail.
* **Revoca** <img src="../../.gitbook/assets/icons/mdi-account-cancel.svg" alt="Revoca" data-size="line"> — annulla immediatamente l'invito; il collegamento smette di funzionare. Un invito già accettato non può essere revocato.

> **L'indirizzo e-mail invitato non deve già avere un account su questa piattaforma.** In caso contrario, l'invio dell'invito fallisce con un messaggio che chiede di iscrivere direttamente quell'utente esistente — tramite [Iscrizione manuale tramite lo strumento Utenti](#manual-enrollment-via-the-users-tool) sopra.

### Inviti in una sessione

Se si apre lo strumento Utenti da un corso che è in esecuzione all'interno di una sessione, la pagina mostra un promemoria che l'invito si applica all'intera sessione, non solo a questo corso:

> *Questo corso è aperto in una sessione. L'invio di un invito qui iscriverà il destinatario all'intera sessione, non solo a questo corso.*

Ciò rispecchia il funzionamento dell'iscrizione altrove in Chamilo: si iscrive qualcuno a una sessione nel suo insieme, o a un corso autonomo, ma mai a «questo singolo corso all'interno di questa sessione» come azione separata.

### Cosa vede la persona invitata

L'e-mail contiene un collegamento alla pagina di registrazione. Aprendolo:

* Precompila e blocca il campo e-mail sull'indirizzo invitato — non possono registrarsi con un indirizzo diverso tramite quel collegamento.
* Consente di completare la registrazione **anche se l'auto-registrazione è attualmente disabilitata a livello di piattaforma** — purché l'amministratore abbia attivato l'impostazione **Consenti la registrazione tramite collegamenti di invito al corso** (vedere sotto). Senza di essa, un collegamento di invito è utile solo quando l'auto-registrazione è comunque aperta.
* Li iscrive immediatamente al corso (o alla sessione) una volta inviato il modulo e li autentica.

Il collegamento è a uso singolo e scade dopo 7 giorni. Se scade o l'invito di destinazione viene revocato, aprirlo si comporta come se il collegamento non fosse mai esistito.

> L'impostazione a livello di piattaforma **Consenti la registrazione tramite collegamenti di invito al corso** (`registration.allow_invitation_registration`) determina se il collegamento di invito può aprire la registrazione quando l'auto-registrazione generale è disattivata. Chiedere all'amministratore se gli inviti non sembrano funzionare su una piattaforma altrimenti chiusa.

## Consigli

* **Adattare il metodo alla situazione** — amministratore o auto-iscrizione per chi usa già la piattaforma, iscrizione manuale per un utente esistente noto, inviti per ospiti esterni, revisori o chiunque non abbia ancora un account.
* **Revocare gli inviti che non servono più** — un vecchio invito in attesa è ancora un collegamento valido e inutilizzato; revocarlo se il destinatario previsto non ha più bisogno di accesso, o se non si è sicuri che gli sia arrivato.
* **Verificare con l'amministratore se un metodo sembra non disponibile** — diversi di questi flussi (iscrizione manuale, inviti, auto-iscrizione) possono essere limitati o disabilitati a livello di piattaforma.