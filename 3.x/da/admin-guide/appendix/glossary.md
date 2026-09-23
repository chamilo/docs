# Ordliste

Nøglebegreber, der anvendes i administrationen af Chamilo 3.0.

## Platformkoncepter

| Term | Definition |
|------|------------|
| **Access URL** | I en opsætning med flere URL'er er hver access URL en separat virtuel portal, der deler den samme Chamilo-installation og database. Hver URL kan have sit eget brand, brugere, kurser og indstillinger. |
| **Course** | Den grundlæggende indholdsbeholder i Chamilo. Et kursus rummer læringsmaterialer, øvelser, fora og andre værktøjer. Kurser kan eksistere uafhængigt eller tildeles sessioner. |
| **Session** | En tidsafgrænset instans af ét eller flere kurser. Sessioner gør det muligt at levere det samme kursusindhold til forskellige grupper af lærende med separat sporing og uafhængige tutorer. |
| **Learning path** | En struktureret rækkefølge af indholdselementer (dokumenter, øvelser, links, SCORM-moduler), der fører de lærende gennem materialet i en defineret rækkefølge. |
| **Gradebook** | Et aggregeringsværktøj, der kombinerer scorer fra øvelser, opgaver og andre aktiviteter til en vægtet endelig karakter for et kursus. |
| **Skill** | En kompetence eller et badge, der kan tildeles lærende, når de gennemfører bestemte kurser, øvelser eller når tærskler i gradebook. |
| **Extra field** | Et brugerdefineret datafelt, som administratorer tilføjer til brugere, kurser eller sessioner for at indfange organisationsspecifikke metadata. |
| **Plugin** | En udvidelse, der tilføjer funktionalitet til Chamilo uden at ændre kernekoden. Plugins kan tilføje sider, værktøjer eller integrationer. |
| **Catalog** | En gennemseelig liste over tilgængelige kurser, hvor brugere kan se beskrivelser og tilmelde sig selv. |

## Brugerroller

| Term | Definition |
|------|------------|
| **Learner (Student)** | Standardbrugerrollen. Kan tilmelde sig kurser og forbruge indhold. |
| **Teacher (Trainer)** | Kan oprette og administrere kurser, tilføje indhold og bedømme lærende. |
| **Session administrator** | Kan oprette og administrere sessioner og tilmeldinger. |
| **Human Resources Manager (HRM)** | Kan se sporings- og rapportdata for tildelte brugere. |
| **Portal administrator** | Fuld adgang til alle platformens administrationsfunktioner. |
| **Global administrator** | Portaladministrator med adgang på tværs af alle access URL'er i en opsætning med flere URL'er. |
| **Tutor** | En rolle på sessionsniveau. Sessionstutorer overvåger alle kurser i en session; kurstutorer administrerer et specifikt kursus inden for en session. Kaldt "coach" i Chamilo-versioner før 3.0. |

## Standarder og protokoller

| Term | Definition |
|------|------------|
| **SCORM** | Sharable Content Object Reference Model. En e-læringspakningsstandard, der gør det muligt at importere og spore kurser. Chamilo understøtter SCORM 1.2 og 2004. |
| **xAPI (Tin Can API)** | En e-læringsspecifikation til sporing af læringsoplevelser. Bredere end SCORM; den kan registrere aktiviteter, der finder sted uden for LMS'et. xAPI-udsagn gemmes i et Learning Record Store (LRS). |
| **LTI** | Learning Tools Interoperability. En IMS Global-standard, der gør det muligt at indlejre eksterne værktøjer og indhold i et LMS. Chamilo understøtter LTI 1.1 og 1.3 både som forbruger og udbyder. |
| **SCIM** | System for Cross-domain Identity Management. En standard til automatisering af brugerprovisionering og -deprovisionering mellem identitetsudbydere og applikationer. |
| **OAuth2** | En autorisationsramme, der giver tredjepartsapplikationer adgang til Chamilo på vegne af en bruger uden at dele adgangskoder. Bruges til API-adgang og SSO-integrationer. |
| **LDAP** | Lightweight Directory Access Protocol. En protokol til adgang til katalogtjenester (f.eks. Active Directory) med henblik på at autentificere brugere og synkronisere kontodata. |
| **CAS** | Central Authentication Service. En single sign-on-protokol, der giver brugere mulighed for at autentificere sig én gang og få adgang til flere applikationer. |
| **JWT** | JSON Web Token. Et kompakt, signeret tokenformat, der bruges til API-autentificering og sessionsstyring. |
| **SAML** | Security Assertion Markup Language. En XML-baseret standard til udveksling af autentificeringsdata mellem en identitetsudbyder og en tjenesteudbyder. |

## Tekniske termer

| Term | Definition |
|------|------------|
| **Symfony** | PHP-frameworket, som Chamilo 3.0 er bygget på. Symfony leverer routing, dependency injection, ORM (Doctrine), templating (Twig) og anden infrastruktur. |
| **Doctrine** | Object-relational mapper (ORM), som Chamilo bruger til at interagere med databasen. Doctrine mapper PHP-objekter til databasetabeller. |
| **Twig** | Skabelonmotoren, som Symfony og Chamilo bruger til at rendere HTML. |
| **Flysystem** | Et PHP-abstraktionslag til filsystemer. Chamilo bruger Flysystem til at understøtte lokal lagring, Amazon S3, Azure Blob og Google Cloud Storage på udskiftelig vis. |
| **Composer** | PHP-afhængighedshåndteringen. Bruges til at installere og opdatere Chamilos PHP-biblioteker. |
| **Mailer DSN** | Data Source Name for e-mailtransport. En forbindelsesstreng, der fortæller Symfony, hvordan e-mails skal sendes (f.eks. via SMTP, Amazon SES eller Mailjet). |
| **OPcache** | PHP's indbyggede opcode-cache. Kompilerer PHP-scripts til bytecode og cacher dem i hukommelsen, hvilket forbedrer ydeevnen betydeligt. |
| **APCu** | En PHP-udvidelse, der leverer en bruger-niveau cache i hukommelsen. Bruges af Symfony til caching af metadata og konfiguration. |

## Akronymer

| Acronym | Full Form |
|---------|-----------|
| **LMS** | Learning Management System |
| **LRS** | Learning Record Store (til xAPI-udsagn) |
| **SSO** | Single Sign-On |
| **CSV** | Comma-Separated Values (bruges til import af brugere/kurser) |
| **API** | Application Programming Interface |
| **REST** | Representational State Transfer (API-arkitekturstil) |
| **GDPR** | General Data Protection Regulation (EU-lovgivning om databeskyttelse) |
| **HSTS** | HTTP Strict Transport Security |
| **CDN** | Content Delivery Network |
| **DNS** | Domain Name System |
| **SPF** | Sender Policy Framework (e-mailgodkendelse) |
| **DKIM** | DomainKeys Identified Mail (e-mailgodkendelse) |
| **DMARC** | Domain-based Message Authentication, Reporting, and Conformance |