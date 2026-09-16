# Glossario

Termini chiave utilizzati nell'amministrazione di Chamilo 3.0.

## Concetti della piattaforma

| Termine | Definizione |
|------|------------|
| **Access URL** | In una configurazione multi-URL, ciascun access URL è un portale virtuale distinto che condivide la stessa installazione e lo stesso database di Chamilo. Ogni URL può avere un proprio branding, utenti, corsi e impostazioni. |
| **Course** | Il contenitore fondamentale dei contenuti in Chamilo. Un corso ospita materiali didattici, esercizi, forum e altri strumenti. I corsi possono esistere in modo indipendente o essere assegnati a sessioni. |
| **Session** | Un'istanza a tempo determinato di uno o più corsi. Le sessioni consentono di erogare gli stessi contenuti del corso a gruppi diversi di discenti, con tracciamento separato e tutor indipendenti. |
| **Learning path** | Una sequenza strutturata di elementi di contenuto (documenti, esercizi, collegamenti, moduli SCORM) che guida i discenti attraverso il materiale in un ordine definito. |
| **Gradebook** | Uno strumento di aggregazione che combina i punteggi di esercizi, compiti e altre attività in un voto finale ponderato per un corso. |
| **Skill** | Una competenza o un badge che può essere assegnato ai discenti al completamento di corsi o esercizi specifici, oppure al raggiungimento di soglie nel gradebook. |
| **Extra field** | Un campo dati personalizzato aggiunto dagli amministratori a utenti, corsi o sessioni per acquisire metadati specifici dell'organizzazione. |
| **Plugin** | Un'estensione che aggiunge funzionalità a Chamilo senza modificare il codice del nucleo. I plugin possono aggiungere pagine, strumenti o integrazioni. |
| **Catalog** | Un elenco consultabile dei corsi disponibili in cui gli utenti possono visualizzare le descrizioni e iscriversi autonomamente. |

## Ruoli utente

| Termine | Definizione |
|------|------------|
| **Learner (Student)** | Il ruolo utente predefinito. Può iscriversi ai corsi e fruire dei contenuti. |
| **Teacher (Trainer)** | Può creare e gestire corsi, aggiungere contenuti e valutare i discenti. |
| **Session administrator** | Può creare e gestire sessioni e iscrizioni. |
| **Human Resources Manager (HRM)** | Può visualizzare i dati di tracciamento e di reportistica per gli utenti assegnati. |
| **Portal administrator** | Accesso completo a tutte le funzionalità di amministrazione della piattaforma. |
| **Global administrator** | Amministratore del portale con accesso a tutti gli access URL in una configurazione multi-URL. |
| **Tutor** | Un ruolo a livello di sessione. I tutor di sessione supervisionano tutti i corsi di una sessione; i tutor di corso gestiscono un corso specifico all'interno di una sessione. Nelle versioni di Chamilo precedenti alla 3.0 era denominato "coach". |

## Standard e protocolli

| Termine | Definizione |
|------|------------|
| **SCORM** | Sharable Content Object Reference Model. Uno standard di confezionamento per l'e-learning che consente di importare e tracciare i corsi. Chamilo supporta SCORM 1.2 e 2004. |
| **xAPI (Tin Can API)** | Una specifica per l'e-learning destinata al tracciamento delle esperienze di apprendimento. Più ampia di SCORM, può registrare attività che avvengono al di fuori dell'LMS. Le istruzioni xAPI sono memorizzate in un Learning Record Store (LRS). |
| **LTI** | Learning Tools Interoperability. Uno standard IMS Global che consente di incorporare strumenti e contenuti esterni all'interno di un LMS. Chamilo supporta LTI 1.1 e 1.3 sia come consumer sia come provider. |
| **SCIM** | System for Cross-domain Identity Management. Uno standard per automatizzare il provisioning e il deprovisioning degli utenti tra identity provider e applicazioni. |
| **OAuth2** | Un framework di autorizzazione che consente ad applicazioni di terze parti di accedere a Chamilo per conto di un utente senza condividere le password. Utilizzato per l'accesso alle API e per le integrazioni SSO. |
| **LDAP** | Lightweight Directory Access Protocol. Un protocollo per accedere a servizi di directory (ad es. Active Directory) al fine di autenticare gli utenti e sincronizzare i dati degli account. |
| **CAS** | Central Authentication Service. Un protocollo di single sign-on che consente agli utenti di autenticarsi una sola volta e di accedere a più applicazioni. |
| **JWT** | JSON Web Token. Un formato di token compatto e firmato utilizzato per l'autenticazione delle API e la gestione delle sessioni. |
| **SAML** | Security Assertion Markup Language. Uno standard basato su XML per lo scambio di dati di autenticazione tra un identity provider e un service provider. |

## Termini tecnici

| Termine | Definizione |
|------|------------|
| **Symfony** | Il framework PHP su cui è basato Chamilo 3.0. Symfony fornisce routing, dependency injection, ORM (Doctrine), templating (Twig) e altra infrastruttura. |
| **Doctrine** | L'object-relational mapper (ORM) utilizzato da Chamilo per interagire con il database. Doctrine mappa gli oggetti PHP alle tabelle del database. |
| **Twig** | Il motore di template utilizzato da Symfony e Chamilo per il rendering dell'HTML. |
| **Flysystem** | Un livello di astrazione del filesystem in PHP. Chamilo utilizza Flysystem per supportare in modo intercambiabile lo storage locale, Amazon S3, Azure Blob e Google Cloud Storage. |
| **Composer** | Il gestore delle dipendenze PHP. Utilizzato per installare e aggiornare le librerie PHP di Chamilo. |
| **Mailer DSN** | Data Source Name per il trasporto della posta elettronica. Una stringa di connessione che indica a Symfony come inviare le e-mail (ad es. tramite SMTP, Amazon SES o Mailjet). |
| **OPcache** | La cache degli opcode integrata in PHP. Compila gli script PHP in bytecode e li memorizza in cache in memoria, migliorando in modo significativo le prestazioni. |
| **APCu** | Un'estensione PHP che fornisce una cache in memoria a livello utente. Utilizzata da Symfony per la cache di metadati e configurazione. |

## Acronimi

| Acronimo | Forma estesa |
|---------|-----------|
| **LMS** | Learning Management System |
| **LRS** | Learning Record Store (per le statement xAPI) |
| **SSO** | Single Sign-On |
| **CSV** | Comma-Separated Values (utilizzato per le importazioni di utenti/corsi) |
| **API** | Application Programming Interface |
| **REST** | Representational State Transfer (stile architetturale delle API) |
| **GDPR** | General Data Protection Regulation (normativa UE sulla privacy dei dati) |
| **HSTS** | HTTP Strict Transport Security |
| **CDN** | Content Delivery Network |
| **DNS** | Domain Name System |
| **SPF** | Sender Policy Framework (autenticazione e-mail) |
| **DKIM** | DomainKeys Identified Mail (autenticazione e-mail) |
| **DMARC** | Domain-based Message Authentication, Reporting, and Conformance |