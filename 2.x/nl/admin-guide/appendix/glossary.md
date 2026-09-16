# Woordenlijst

Belangrijke termen die worden gebruikt in de administratie van Chamilo 2.0.

## Platformconcepten

| Term | Definitie |
|------|-----------|
| **Toegangs-URL** | In een multi-URL-opstelling is elke toegangs-URL een afzonderlijke virtuele portal die dezelfde Chamilo-installatie en database deelt. Elke URL kan zijn eigen branding, gebruikers, cursussen en instellingen hebben. |
| **Cursus** | De fundamentele inhoudscontainer in Chamilo. Een cursus bevat leermaterialen, oefeningen, forums en andere hulpmiddelen. Cursussen kunnen onafhankelijk bestaan of worden toegewezen aan sessies. |
| **Sessie** | Een tijdgebonden instantie van een of meer cursussen. Sessies maken het mogelijk om dezelfde cursusinhoud aan verschillende groepen leerlingen aan te bieden met afzonderlijke tracking en onafhankelijke coaches. |
| **Leerpad** | Een gestructureerde reeks inhoudsitems (documenten, oefeningen, links, SCORM-modules) die leerlingen in een bepaalde volgorde door het materiaal leidt. |
| **Cijferboek** | Een aggregatietool die scores van oefeningen, opdrachten en andere activiteiten combineert tot een gewogen eindcijfer voor een cursus. |
| **Vaardigheid** | Een competentie of badge die aan leerlingen kan worden toegekend na het voltooien van specifieke cursussen, oefeningen of het behalen van drempels in het cijferboek. |
| **Extra veld** | Een aangepast gegevensveld dat door beheerders wordt toegevoegd aan gebruikers, cursussen of sessies om organisatiespecifieke metadata vast te leggen. |
| **Plugin** | Een uitbreiding die functionaliteit toevoegt aan Chamilo zonder de kerncode te wijzigen. Plugins kunnen pagina's, tools of integraties toevoegen. |
| **Catalogus** | Een doorbladerbare lijst van beschikbare cursussen waar gebruikers beschrijvingen kunnen bekijken en zich zelf kunnen inschrijven. |

## Gebruikersrollen

| Term | Definitie |
|------|-----------|
| **Leerling (Student)** | De standaard gebruikersrol. Kan zich inschrijven voor cursussen en inhoud consumeren. |
| **Docent (Trainer)** | Kan cursussen maken en beheren, inhoud toevoegen en leerlingen beoordelen. |
| **Sessiebeheerder** | Kan sessies en inschrijvingen maken en beheren. |
| **Human Resources Manager (HRM)** | Kan tracking- en rapportagegegevens bekijken voor toegewezen gebruikers. |
| **Portaalbeheerder** | Volledige toegang tot alle platformbeheermogelijkheden. |
| **Globale beheerder** | Portaalbeheerder met toegang tot alle toegangs-URL's in een multi-URL-opstelling. |
| **Coach/Tutor** | Een rol op sessieniveau. Sessiecoaches houden toezicht op alle cursussen in een sessie; cursuscoaches beheren een specifieke cursus binnen een sessie. Alle verwijzingen naar coaches moeten op lange termijn worden hernoemd naar tutors. |

## Standaarden en Protocollen

| Term | Definitie |
|------|-----------|
| **SCORM** | Sharable Content Object Reference Model. Een e-learning verpakkingsstandaard die het importeren en volgen van cursussen mogelijk maakt. Chamilo ondersteunt SCORM 1.2 en 2004. |
| **xAPI (Tin Can API)** | Een e-learning specificatie voor het volgen van leerervaringen. Breder dan SCORM, kan het activiteiten vastleggen die buiten het LMS plaatsvinden. xAPI-statements worden opgeslagen in een Learning Record Store (LRS). |
| **LTI** | Learning Tools Interoperability. Een IMS Global-standaard die het mogelijk maakt om externe tools en inhoud in een LMS in te bedden. Chamilo ondersteunt LTI 1.1 en 1.3 als zowel consument als aanbieder. |
| **SCIM** | System for Cross-domain Identity Management. Een standaard voor het automatiseren van gebruikersvoorziening en -deactivering tussen identiteitsproviders en toepassingen. |
| **OAuth2** | Een autorisatieframework dat derde partijstoepassingen toegang geeft tot Chamilo namens een gebruiker zonder wachtwoorden te delen. Gebruikt voor API-toegang en SSO-integraties. |
| **LDAP** | Lightweight Directory Access Protocol. Een protocol voor toegang tot directoryservices (bijv. Active Directory) om gebruikers te authenticeren en accountgegevens te synchroniseren. |
| **CAS** | Central Authentication Service. Een single sign-on protocol dat gebruikers in staat stelt om één keer te authenticeren en toegang te krijgen tot meerdere toepassingen. |
| **JWT** | JSON Web Token. Een compact, ondertekend tokenformaat dat wordt gebruikt voor API-authenticatie en sessiebeheer. |
| **SAML** | Security Assertion Markup Language. Een op XML gebaseerde standaard voor het uitwisselen van authenticatiegegevens tussen een identiteitsprovider en een dienstverlener. |

---
## Technische Termen

| Term | Definitie |
|------|-----------|
| **Symfony** | Het PHP-framework waarop Chamilo 2.0 is gebouwd. Symfony biedt routing, dependency injection, ORM (Doctrine), templating (Twig) en andere infrastructuur. |
| **Doctrine** | De object-relationele mapper (ORM) die door Chamilo wordt gebruikt om met de database te communiceren. Doctrine koppelt PHP-objecten aan databasetabellen. |
| **Twig** | De template-engine die door Symfony en Chamilo wordt gebruikt voor het renderen van HTML. |
| **Flysystem** | Een PHP-bestandssysteemabstractielaag. Chamilo gebruikt Flysystem om lokale opslag, Amazon S3, Azure Blob en Google Cloud Storage uitwisselbaar te ondersteunen. |
| **Composer** | De PHP-dependency manager. Wordt gebruikt om PHP-bibliotheken van Chamilo te installeren en bij te werken. |
| **Mailer DSN** | Data Source Name voor het e-mailtransport. Een verbindingsreeks die Symfony instrueert hoe e-mails te verzenden (bijv. via SMTP, Amazon SES of Mailjet). |
| **OPcache** | De ingebouwde opcode-cache van PHP. Compileert PHP-scripts naar bytecode en slaat deze op in het geheugen, wat de prestaties aanzienlijk verbetert. |
| **APCu** | Een PHP-extensie die een gebruikersniveau in-memory cache biedt. Wordt door Symfony gebruikt voor het cachen van metadata en configuratie. |

## Afkortingen

| Afkorting | Volledige Vorm |
|-----------|----------------|
| **LMS** | Learning Management System |
| **LRS** | Learning Record Store (voor xAPI-statements) |
| **SSO** | Single Sign-On |
| **CSV** | Comma-Separated Values (gebruikt voor import van gebruikers/cursussen) |
| **API** | Application Programming Interface |
| **REST** | Representational State Transfer (API-architectuurstijl) |
| **GDPR** | General Data Protection Regulation (EU-wetgeving inzake gegevensbescherming) |
| **HSTS** | HTTP Strict Transport Security |
| **CDN** | Content Delivery Network |
| **DNS** | Domain Name System |
| **SPF** | Sender Policy Framework (e-mailauthenticatie) |
| **DKIM** | DomainKeys Identified Mail (e-mailauthenticatie) |
| **DMARC** | Domain-based Message Authentication, Reporting, and Conformance |