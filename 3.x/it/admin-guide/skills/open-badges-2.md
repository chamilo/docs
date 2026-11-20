# Emissione e verifica di Open Badges 2.0

Chamilo 3.1 può pubblicare credenziali **Open Badges 2.0** per le competenze acquisite, inclusa un'immagine del badge che contiene un'assertion incorporata nei metadati PNG. La verifica del badge utilizza endpoint pubblici per il badge, l'assertion e l'issuer.

## Configurare l'issuer e le competenze

1. Impostare il **nome dell'istituzione** della piattaforma e un **indirizzo e-mail di contatto dell'amministratore** valido; entrambi sono richiesti dal profilo dell'issuer.
2. Configurare la competenza con un titolo, una descrizione e i criteri del badge.
3. Allegare, ove opportuno, un'immagine PNG valida del badge. Chamilo può anche utilizzare la propria immagine predefinita del badge se la competenza non dispone di una risorsa personalizzata.
4. Assegnare o convalidare l'acquisizione della competenza per il discente tramite il normale flusso di lavoro delle competenze.

Le credenziali dipendono dalla relazione con la competenza acquisita. Un'assertion relativa a una competenza revocata o non più acquisita viene segnalata come revocata. Le risorse di competenza e di badge sono limitate all'URL di accesso appropriato.

## Dati pubblici di verifica

Ogni emissione dispone di un'assertion ospitata. Gli URL correlati derivano dalla radice pubblica dell'applicazione e includono:

- `main/skills/assertion.php?issue=<issue-id>` — assertion JSON per una specifica emissione di competenza.
- `main/skills/class.php?id=<skill-id>` — metadati della classe del badge, inclusi i criteri e il riferimento all'issuer.
- `main/skills/issuer.php` — profilo dell'istituzione emittente.
- `main/skills/image.php?id=<skill-id>` — risorsa immagine del badge.

Gli URL generati esatti dipendono dal percorso di base pubblico dell'installazione. L'assertion include un hash salato dell'indirizzo e-mail del destinatario invece di pubblicare l'indirizzo e-mail in chiaro, e identifica l'issuer e la competenza acquisita. Il PNG del badge può includere l'assertion in un chunk iTXt `openbadges`.

## Convalidare un badge emesso

Aprire gli endpoint dell'assertion ospitata, della classe del badge e dell'issuer senza una sessione autenticata. Devono restituire una credenziale collegata coerente. Scaricare il PNG emesso tramite il flusso di esportazione supportato dalla competenza e verificare che l'assertion incorporata corrisponda alla rappresentazione ospitata. Se la competenza è revocata, verificare che la verifica ne rifletta lo stato di revoca.

Un PNG con la sola grafica visiva del badge **non** dimostra una credenziale valida. Non confondere l'emissione di Open Badges 2.0 con funzionalità non correlate di certificati o di PDF firmati.

Vedere [Gestione delle competenze](managing-skills.md) e [Verifica dei certificati firmati](../maintenance/signed-certificate-verification.md). Implementazione: [PR #9346](https://github.com/chamilo/chamilo-lms/pull/9346).