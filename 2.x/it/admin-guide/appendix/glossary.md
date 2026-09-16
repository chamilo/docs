# Glossario

Termini chiave utilizzati nell'amministrazione di Chamilo 2.0.

## Concetti della Piattaforma

| Termine | Definizione |
|---------|-------------|
| **URL di Accesso** | In una configurazione multi-URL, ogni URL di accesso è un portale virtuale separato che condivide la stessa installazione e database di Chamilo. Ogni URL può avere il proprio branding, utenti, corsi e impostazioni. |
| **Corso** | Il contenitore fondamentale di contenuti in Chamilo. Un corso include materiali didattici, esercizi, forum e altri strumenti. I corsi possono esistere indipendentemente o essere assegnati a sessioni. |
| **Sessione** | Un'istanza temporale di uno o più corsi. Le sessioni consentono di fornire lo stesso contenuto del corso a diversi gruppi di studenti con tracciamento separato e coach indipendenti. |
| **Percorso di apprendimento** | Una sequenza strutturata di elementi di contenuto (documenti, esercizi, link, moduli SCORM) che guida gli studenti attraverso il materiale in un ordine definito. |
| **Registro dei voti** | Uno strumento di aggregazione che combina i punteggi di esercizi, compiti e altre attività in un voto finale ponderato per un corso. |
| **Competenza** | Una competenza o un badge che può essere assegnato agli studenti al completamento di corsi specifici, esercizi o al raggiungimento di soglie nel registro dei voti. |
| **Campo extra** | Un campo dati personalizzato aggiunto dagli amministratori a utenti, corsi o sessioni per acquisire metadati specifici dell'organizzazione. |
| **Plugin** | Un'estensione che aggiunge funzionalità a Chamilo senza modificare il codice principale. I plugin possono aggiungere pagine, strumenti o integrazioni. |
| **Catalogo** | Un elenco navigabile di corsi disponibili in cui gli utenti possono visualizzare descrizioni e auto-iscriversi. |

## Ruoli Utente

| Termine | Definizione |
|---------|-------------|
| **Studente (Learner)** | Il ruolo utente predefinito. Può iscriversi ai corsi e fruire dei contenuti. |
| **Insegnante (Trainer)** | Può creare e gestire corsi, aggiungere contenuti e valutare gli studenti. |
| **Amministratore di sessione** | Può creare e gestire sessioni e iscrizioni. |
| **Responsabile delle Risorse Umane (HRM)** | Può visualizzare dati di tracciamento e report per gli utenti assegnati. |
| **Amministratore del portale** | Accesso completo a tutte le funzionalità di amministrazione della piattaforma. |
| **Amministratore globale** | Amministratore del portale con accesso a tutti gli URL di accesso in una configurazione multi-URL. |
| **Coach/Tutor** | Un ruolo a livello di sessione. I coach di sessione supervisionano tutti i corsi in una sessione; i coach di corso gestiscono un corso specifico all'interno di una sessione. Tutti i riferimenti ai coach dovrebbero essere rinominati in tutor a lungo termine. |

## Standard e Protocolli

| Termine | Definizione |
|---------|-------------|
| **SCORM** | Sharable Content Object Reference Model. Uno standard di confezionamento per l'e-learning che consente di importare e tracciare i corsi. Chamilo supporta SCORM 1.2 e 2004. |
| **xAPI (Tin Can API)** | Una specifica per l'e-learning per il tracciamento delle esperienze di apprendimento. Più ampia di SCORM, può registrare attività che avvengono al di fuori dell'LMS. Le dichiarazioni xAPI sono archiviate in un Learning Record Store (LRS). |
| **LTI** | Learning Tools Interoperability. Uno standard IMS Global che consente di incorporare strumenti e contenuti esterni all'interno di un LMS. Chamilo supporta LTI 1.1 e 1.3 sia come consumatore che come fornitore. |
| **SCIM** | System for Cross-domain Identity Management. Uno standard per automatizzare il provisioning e il deprovisioning degli utenti tra fornitori di identità e applicazioni. |
| **OAuth2** | Un framework di autorizzazione che consente alle applicazioni di terze parti di accedere a Chamilo per conto di un utente senza condividere password. Utilizzato per l'accesso API e integrazioni SSO. |
| **LDAP** | Lightweight Directory Access Protocol. Un protocollo per accedere ai servizi di directory (ad esempio, Active Directory) per autenticare gli utenti e sincronizzare i dati degli account. |
| **CAS** | Central Authentication Service. Un protocollo di single sign-on che consente agli utenti di autenticarsi una sola volta e accedere a più applicazioni. |
| **JWT** | JSON Web Token. Un formato di token compatto e firmato utilizzato per l'autenticazione API e la gestione delle sessioni. |
| **SAML** | Security Assertion Markup Language. Uno standard basato su XML per lo scambio di dati di autenticazione tra un fornitore di identità e un fornitore di servizi. |

---
## Termini Tecnici

| Termine | Definizione |
|---------|-------------|
| **Symfony** | Il framework PHP su cui è costruito Chamilo 2.0. Symfony fornisce routing, iniezione di dipendenze, ORM (Doctrine), templating (Twig) e altre infrastrutture. |
| **Doctrine** | Il mapper oggetto-relazionale (ORM) utilizzato da Chamilo per interagire con il database. Doctrine mappa oggetti PHP a tabelle del database. |
| **Twig** | Il motore di template utilizzato da Symfony e Chamilo per il rendering HTML. |
| **Flysystem** | Un livello di astrazione del filesystem PHP. Chamilo utilizza Flysystem per supportare indifferentemente l'archiviazione locale, Amazon S3, Azure Blob e Google Cloud Storage. |
| **Composer** | Il gestore di dipendenze PHP. Utilizzato per installare e aggiornare le librerie PHP di Chamilo. |
| **Mailer DSN** | Data Source Name per il trasporto email. Una stringa di connessione che indica a Symfony come inviare email (ad esempio, tramite SMTP, Amazon SES o Mailjet). |
| **OPcache** | La cache di opcode integrata in PHP. Compila gli script PHP in bytecode e li memorizza nella memoria, migliorando significativamente le prestazioni. |
| **APCu** | Un'estensione PHP che fornisce una cache in memoria a livello utente. Utilizzata da Symfony per la memorizzazione in cache di metadati e configurazioni. |

## Acronimi

| Acronimo | Forma Completa |
|----------|----------------|
| **LMS** | Learning Management System (Sistema di Gestione dell'Apprendimento) |
| **LRS** | Learning Record Store (Archivio dei Record di Apprendimento per dichiarazioni xAPI) |
| **SSO** | Single Sign-On (Accesso Unico) |
| **CSV** | Comma-Separated Values (Valori Separati da Virgola, utilizzati per l'importazione di utenti/corsi) |
| **API** | Application Programming Interface (Interfaccia di Programmazione delle Applicazioni) |
| **REST** | Representational State Transfer (Stile di architettura API) |
| **GDPR** | General Data Protection Regulation (Regolamento Generale sulla Protezione dei Dati, legge sulla privacy dell'UE) |
| **HSTS** | HTTP Strict Transport Security (Sicurezza del Trasporto HTTP Rigorosa) |
| **CDN** | Content Delivery Network (Rete di Distribuzione dei Contenuti) |
| **DNS** | Domain Name System (Sistema dei Nomi di Dominio) |
| **SPF** | Sender Policy Framework (Quadro di Politica del Mittente per l'autenticazione email) |
| **DKIM** | DomainKeys Identified Mail (Email Identificata con Chiavi di Dominio per l'autenticazione) |
| **DMARC** | Domain-based Message Authentication, Reporting, and Conformance (Autenticazione, Report e Conformità dei Messaggi Basata sul Dominio) |