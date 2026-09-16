# Autenticazione a due fattori

L'autenticazione a due fattori (2FA) aggiunge un secondo passaggio all'accesso — un codice di 6 cifre da un'app sul telefono, oltre alla password — in modo che conoscere solo la password non basti per accedere all'account.

Questa funzionalità compare solo se l'amministratore l'ha abilitata a livello di piattaforma. Se non la vedi nella pagina del tuo account, non è stata attivata per la tua piattaforma.

## Abilitare la 2FA

1. Apri il **menu dell'avatar** e fai clic su **Il mio profilo**.
2. Fai clic su **Cambia password**.
3. Inserisci la **password attuale**, seleziona la casella **Abilita autenticazione a due fattori (2FA)** e fai clic su **Aggiorna impostazioni**.
4. La pagina si ricarica con un codice QR e il messaggio "Scansiona il codice QR per abilitare la 2FA." Scansionarlo con un'app autenticatore sul telefono (funziona qualsiasi app compatibile TOTP, come Google Authenticator, Microsoft Authenticator o Authy).

![Il modulo Cambia password dopo l'invio, che mostra il codice QR da scansionare e il campo del codice 2FA](/.gitbook/assets/student-2fa-qr-code.png)

5. Inserisci di nuovo la password attuale, insieme al codice di 6 cifre che l'app mostra ora, nel campo **Codice 2FA**, e fai clic ancora una volta su **Aggiorna impostazioni**. Vedrai una conferma che la 2FA è stata attivata.

Selezionare solo la casella non mostra il codice QR — lo vedi solo dopo quel primo invio, e i campi della password vengono svuotati ogni volta che la pagina si ricarica, quindi dovrai reinserire la password attuale anche in questo secondo invio.

## Accedere con la 2FA abilitata

Dopo aver inserito nome utente e password come di consueto, il modulo di accesso mostra un campo extra **Codice 2FA** nella stessa schermata — inserisci il codice attuale di 6 cifre dall'app autenticatore e invia (a questo punto il pulsante recita **Invia codice** invece di **Accedi**).

## Se perdi l'accesso all'app autenticatore

Chamilo non genera codici di backup o di recupero per la 2FA. Se perdi il dispositivo con l'app autenticatore, non potrai produrre tu stesso un codice valido — contatta l'amministratore della piattaforma, che può disabilitare la 2FA sul tuo account così da poterti autenticare di nuovo e, se lo desideri, configurarla su un nuovo dispositivo.

## Disabilitare la 2FA

Torna a **Cambia password**, deseleziona **Abilita autenticazione a due fattori (2FA)**, inserisci la password attuale e invia.

## Consigli

* **Configurala prima di averne bisogno** — abilitare la 2FA richiede un minuto e protegge in modo significativo il tuo account.
* **Tieni l'app autenticatore accessibile** — perderla significa dipendere dall'amministratore per rientrare, poiché non ci sono codici di backup.
* **Non condividere i tuoi codici 2FA** — chiunque abbia la tua password e un codice valido può accedere come te.