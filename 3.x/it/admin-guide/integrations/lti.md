# LTI 1.3

**LTI** (Learning Tools Interoperability) è uno standard che consente di incorporare strumenti di apprendimento esterni all'interno di Chamilo. La versione 1.3 è la più recente e la più sicura dello standard.

Questo strumento è raggiungibile anche dal blocco [Piattaforma](../platform/README.md) della dashboard di amministrazione, come **Strumenti esterni (LTI)**.

## Cosa consente LTI

Con LTI è possibile incorporare strumenti esterni nei corsi Chamilo. Esempi:

* Simulazioni interattive
* Strumenti di valutazione specializzati
* Strumenti di authoring dei contenuti
* Laboratori virtuali
* Librerie di contenuti di terze parti

Lo strumento esterno compare in modo fluido all'interno dell'interfaccia di Chamilo.

## Configurazione di uno strumento LTI

### Come amministratore

1. Accedere alle impostazioni LTI nel pannello di amministrazione
2. **Registrare lo strumento esterno** fornendo:
   * **Nome dello strumento** — Un nome descrittivo
   * **Login URL** — L'URL di avvio del login OIDC dello strumento esterno
   * **Redirect URL** — L'URL di avvio a cui lo strumento ritorna dopo il login
   * **Client ID** — Fornito dal fornitore dello strumento
   * **Public keyset URL (JWKS URL)** — L'endpoint JWKS dello strumento per lo scambio delle chiavi di sicurezza
3. Configurare il **grade passback** — Se lo strumento può inviare i voti a Chamilo
4. Salvare

### Come docente

Una volta che uno strumento LTI è stato registrato dall'amministratore, i docenti possono aggiungerlo ai propri corsi:

1. Nel corso, cercare l'opzione per aggiungere uno strumento esterno
2. Selezionare tra gli strumenti LTI registrati
3. Lo strumento compare come strumento del corso nella homepage

## Sicurezza

LTI 1.3 utilizza:

* **OAuth 2.0** per l'autenticazione
* **JSON Web Tokens (JWT)** per la firma dei messaggi
* **Coppie di chiavi pubblica/privata** per la verifica

Ciò significa che le credenziali non vengono mai condivise direttamente tra Chamilo e lo strumento esterno.

## Grade Passback

Gli strumenti LTI possono inviare i voti a Chamilo, che possono essere integrati nel registro dei voti del corso. Questa opzione viene configurata per ogni strumento in fase di registrazione.

## Consigli

* **Verificare la compatibilità dello strumento** — Assicurarsi che lo strumento esterno supporti LTI 1.3 (e non solo le versioni precedenti)
* **Provare in un ambiente sandbox** — Testare l'integrazione LTI in un corso di prova prima di utilizzarla in produzione
* **Monitorare le prestazioni** — Gli strumenti esterni introducono dipendenze di rete. Assicurarsi che lo strumento sia reattivo e affidabile.