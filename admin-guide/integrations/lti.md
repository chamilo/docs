# LTI 1.3

**LTI** (Learning Tools Interoperability) è uno standard che consente di integrare strumenti di apprendimento esterni all'interno di Chamilo. La versione 1.3 è l'ultima e la più sicura versione dello standard.

## Cosa permette LTI

Con LTI, è possibile integrare strumenti esterni nei corsi di Chamilo. Esempi:

* Simulazioni interattive
* Strumenti di valutazione specializzati
* Strumenti per la creazione di contenuti
* Laboratori virtuali
* Librerie di contenuti di terze parti

Lo strumento esterno appare in modo fluido all'interno dell'interfaccia di Chamilo.

## Configurazione di uno strumento LTI

### Come Amministratore

1. Accedi alle impostazioni LTI nel pannello di amministrazione
2. **Registra lo strumento esterno** fornendo:
   * **Nome dello strumento** — Un nome descrittivo
   * **URL di accesso** — L'URL di avvio del login OIDC dello strumento esterno
   * **URL di reindirizzamento** — L'URL di lancio a cui lo strumento ritorna dopo il login
   * **Client ID** — Fornito dal fornitore dello strumento
   * **URL del set di chiavi pubbliche (JWKS URL)** — L'endpoint JWKS dello strumento per lo scambio di chiavi di sicurezza
3. Configura il **passaggio dei voti** — Se lo strumento può inviare i voti a Chamilo
4. Salva

### Come Docente

Una volta che uno strumento LTI è stato registrato dall'amministratore, i docenti possono aggiungerlo ai loro corsi:

1. Nel corso, cerca l'opzione per aggiungere uno strumento esterno
2. Seleziona tra gli strumenti LTI registrati
3. Lo strumento appare come strumento del corso nella homepage

## Sicurezza

LTI 1.3 utilizza:

* **OAuth 2.0** per l'autenticazione
* **JSON Web Tokens (JWT)** per la firma dei messaggi
* **Coppie di chiavi pubbliche/private** per la verifica

Ciò significa che le credenziali non vengono mai condivise direttamente tra Chamilo e lo strumento esterno.

## Passaggio dei voti

Gli strumenti LTI possono inviare i voti a Chamilo, che possono essere integrati nel registro dei voti del corso. Questo viene configurato per ogni strumento durante la registrazione.

## Suggerimenti

* **Verifica la compatibilità dello strumento** — Assicurati che lo strumento esterno supporti LTI 1.3 (non solo versioni precedenti)
* **Test in un ambiente di prova** — Prova l'integrazione LTI in un corso di test prima di utilizzarlo in produzione
* **Monitora le prestazioni** — Gli strumenti esterni aggiungono dipendenze di rete. Assicurati che lo strumento sia reattivo e affidabile.