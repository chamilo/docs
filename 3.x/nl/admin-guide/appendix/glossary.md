# Glossarium

Belangrijke termen in het beheer van Chamilo 3.0.

## Platformconcepten

| Term | Definitie |
|------|------------|
| **Access URL** | In een multi-URL-opstelling is elke access URL een afzonderlijk virtueel portaal dat dezelfde Chamilo-installatie en database deelt. Elke URL kan een eigen huisstijl, gebruikers, cursussen en instellingen hebben. |
| **Course** | De fundamentele inhoudscontainer in Chamilo. Een course bevat leermateriaal, oefeningen, forums en andere tools. Cursussen kunnen zelfstandig bestaan of aan sessies worden toegewezen. |
| **Session** | Een tijdsgebonden instantie van een of meer cursussen. Sessies maken het mogelijk dezelfde cursusinhoud aan verschillende groepen lerenden te leveren, met aparte tracking en onafhankelijke tutors. |
| **Learning path** | Een gestructureerde reeks inhoudsitems (documenten, oefeningen, links, SCORM-modules) die lerenden in een vastgelegde volgorde door het materiaal leidt. |
| **Gradebook** | Een aggregatietool die scores van oefeningen, opdrachten en andere activiteiten combineert tot een gewogen eindcijfer voor een cursus. |
| **Skill** | Een competentie of badge die aan lerenden kan worden toegekend na het voltooien van specifieke cursussen of oefeningen, of bij het behalen van drempels in het gradebook. |
| **Extra field** | Een aangepast gegevensveld dat door beheerders aan gebruikers, cursussen of sessies wordt toegevoegd om organisatiespecifieke metadata vast te leggen. |
| **Plugin** | Een uitbreiding die functionaliteit aan Chamilo toevoegt zonder de kerncode te wijzigen. Plugins kunnen pagina’s, tools of integraties toevoegen. |
| **Catalog** | Een doorzoekbare lijst van beschikbare cursussen waarin gebruikers beschrijvingen kunnen bekijken en zichzelf kunnen inschrijven. |

## Gebruikersrollen

| Term | Definitie |
|------|------------|
| **Learner (Student)** | De standaard gebruikersrol. Kan zich inschrijven voor cursussen en inhoud gebruiken. |
| **Teacher (Trainer)** | Kan cursussen aanmaken en beheren, inhoud toevoegen en lerenden beoordelen. |
| **Session administrator** | Kan sessies en inschrijvingen aanmaken en beheren. |
| **Human Resources Manager (HRM)** | Kan tracking- en rapportagegegevens bekijken voor toegewezen gebruikers. |
| **Portal administrator** | Volledige toegang tot alle platformbeheerfuncties. |
| **Global administrator** | Portal administrator met toegang tot alle access URL’s in een multi-URL-opstelling. |
| **Tutor** | Een rol op sessieniveau. Sessie-tutors houden toezicht op alle cursussen in een sessie; cursus-tutors beheren een specifieke cursus binnen een sessie. In Chamilo-versies vóór 3.0 aangeduid als "coach". |

## Standaarden en protocollen

| Term | Definitie |
|------|------------|
| **SCORM** | Sharable Content Object Reference Model. Een e-learningverpakkingsstandaard waarmee cursussen kunnen worden geïmporteerd en gevolgd. Chamilo ondersteunt SCORM 1.2 en 2004. |
| **xAPI (Tin Can API)** | Een e-learningspecificatie voor het volgen van leerervaringen. Breder dan SCORM; kan activiteiten vastleggen die buiten de LMS plaatsvinden. xAPI-statements worden opgeslagen in een Learning Record Store (LRS). |
| **LTI** | Learning Tools Interoperability. Een IMS Global-standaard waarmee externe tools en inhoud in een LMS kunnen worden ingebed. Chamilo ondersteunt LTI 1.1 en 1.3 zowel als consumer als als provider. |
| **SCIM** | System for Cross-domain Identity Management. Een standaard voor het automatiseren van gebruikersprovisioning en -deprovisioning tussen identity providers en toepassingen. |
| **OAuth2** | Een autorisatieframework waarmee toepassingen van derden namens een gebruiker toegang tot Chamilo kunnen krijgen zonder wachtwoorden te delen. Gebruikt voor API-toegang en SSO-integraties. |
| **LDAP** | Lightweight Directory Access Protocol. Een protocol voor toegang tot directorydiensten (bijv. Active Directory) om gebruikers te authenticeren en accountgegevens te synchroniseren. |
| **CAS** | Central Authentication Service. Een single sign-on-protocol waarmee gebruikers eenmaal authenticeren en toegang krijgen tot meerdere toepassingen. |
| **JWT** | JSON Web Token. Een compact, ondertekend tokenformaat voor API-authenticatie en sessiebeheer. |
| **SAML** | Security Assertion Markup Language. Een XML-gebaseerde standaard voor het uitwisselen van authenticatiegegevens tussen een identity provider en een service provider. |

## Technische termen

| Term | Definitie |
|------|------------|
| **Symfony** | Het PHP-framework waarop Chamilo 3.0 is gebouwd. Symfony biedt routing, dependency injection, ORM (Doctrine), templating (Twig) en andere infrastructuur. |
| **Doctrine** | De object-relational mapper (ORM) die Chamilo gebruikt om met de database te communiceren. Doctrine koppelt PHP-objecten aan databasetabellen. |
| **Twig** | De template-engine die Symfony en Chamilo gebruiken voor het renderen van HTML. |
| **Flysystem** | Een PHP-abstractielaag voor bestandssystemen. Chamilo gebruikt Flysystem om lokale opslag, Amazon S3, Azure Blob en Google Cloud Storage onderling uitwisselbaar te ondersteunen. |
| **Composer** | De PHP-dependency manager. Wordt gebruikt om de PHP-bibliotheken van Chamilo te installeren en bij te werken. |
| **Mailer DSN** | Data Source Name voor het e-mailtransport. Een verbindingsreeks die Symfony vertelt hoe e-mails moeten worden verzonden (bijv. via SMTP, Amazon SES of Mailjet). |
| **OPcache** | De ingebouwde opcode-cache van PHP. Compileert PHP-scripts naar bytecode en slaat deze in het geheugen op, wat de prestaties aanzienlijk verbetert. |
| **APCu** | Een PHP-extensie die een gebruikersniveau-cache in het geheugen biedt. Wordt door Symfony gebruikt voor het cachen van metadata en configuratie. |

## Afkortingen

| Afkorting | Volledige vorm |
|---------|-----------|
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