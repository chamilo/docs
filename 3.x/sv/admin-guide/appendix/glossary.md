# Ordlista

Nyckeltermer som används i administrationen av Chamilo 3.0.

## Plattformskoncept

| Term | Definition |
|------|------------|
| **Access URL** | I en konfiguration med flera URL:er är varje access URL en separat virtuell portal som delar samma Chamilo-installation och databas. Varje URL kan ha egen varumärkesprofil, användare, kurser och inställningar. |
| **Course** | Den grundläggande innehållsbehållaren i Chamilo. En kurs innehåller läromedel, övningar, forum och andra verktyg. Kurser kan existera fristående eller tilldelas sessioner. |
| **Session** | En tidsbegränsad instans av en eller flera kurser. Sessioner gör det möjligt att leverera samma kursinnehåll till olika grupper av deltagare med separat spårning och oberoende handledare. |
| **Learning path** | En strukturerad sekvens av innehållsobjekt (dokument, övningar, länkar, SCORM-moduler) som guidar deltagare genom materialet i en definierad ordning. |
| **Gradebook** | Ett aggregeringsverktyg som kombinerar poäng från övningar, uppgifter och andra aktiviteter till ett viktat slutbetyg för en kurs. |
| **Skill** | En kompetens eller ett märke som kan tilldelas deltagare när de slutför specifika kurser, övningar eller når tröskelvärden i gradebook. |
| **Extra field** | Ett anpassat datafält som administratörer lägger till för användare, kurser eller sessioner för att fånga organisationsspecifik metadata. |
| **Plugin** | Ett tillägg som ger Chamilo mer funktionalitet utan att kärnkoden ändras. Plugins kan lägga till sidor, verktyg eller integrationer. |
| **Catalog** | En bläddringsbar förteckning över tillgängliga kurser där användare kan läsa beskrivningar och självregistrera sig. |

## Användarroller

| Term | Definition |
|------|------------|
| **Learner (Student)** | Standardanvändarrollen. Kan anmäla sig till kurser och ta del av innehåll. |
| **Teacher (Trainer)** | Kan skapa och hantera kurser, lägga till innehåll och betygsätta deltagare. |
| **Session administrator** | Kan skapa och hantera sessioner och inskrivningar. |
| **Human Resources Manager (HRM)** | Kan visa spårnings- och rapportdata för tilldelade användare. |
| **Portal administrator** | Full åtkomst till alla administrationsfunktioner på plattformen. |
| **Global administrator** | Portaladministratör med åtkomst över alla access URL:er i en konfiguration med flera URL:er. |
| **Tutor** | En roll på sessionsnivå. Sessionshandledare övervakar alla kurser i en session; kurshandledare hanterar en specifik kurs inom en session. Kallades "coach" i Chamilo-versioner före 3.0. |

## Standarder och protokoll

| Term | Definition |
|------|------------|
| **SCORM** | Sharable Content Object Reference Model. En e-lärandestandard för paketering som gör det möjligt att importera och spåra kurser. Chamilo stöder SCORM 1.2 och 2004. |
| **xAPI (Tin Can API)** | En e-lärandespecifikation för att spåra lärandeupplevelser. Bredare än SCORM; den kan registrera aktiviteter som sker utanför LMS:et. xAPI-satser lagras i en Learning Record Store (LRS). |
| **LTI** | Learning Tools Interoperability. En IMS Global-standard som gör det möjligt att bädda in externa verktyg och innehåll i ett LMS. Chamilo stöder LTI 1.1 och 1.3 både som konsument och som leverantör. |
| **SCIM** | System for Cross-domain Identity Management. En standard för att automatisera provisionering och avprovisionering av användare mellan identitetsleverantörer och applikationer. |
| **OAuth2** | Ett auktoriseringsramverk som gör det möjligt för tredjepartsapplikationer att komma åt Chamilo å en användares vägnar utan att dela lösenord. Används för API-åtkomst och SSO-integrationer. |
| **LDAP** | Lightweight Directory Access Protocol. Ett protokoll för att komma åt katalogtjänster (t.ex. Active Directory) för att autentisera användare och synkronisera kontodata. |
| **CAS** | Central Authentication Service. Ett single sign-on-protokoll som gör det möjligt för användare att autentisera sig en gång och få åtkomst till flera applikationer. |
| **JWT** | JSON Web Token. Ett kompakt, signerat tokenformat som används för API-autentisering och sessionshantering. |
| **SAML** | Security Assertion Markup Language. En XML-baserad standard för att utbyta autentiseringsdata mellan en identitetsleverantör och en tjänsteleverantör. |

## Tekniska termer

| Term | Definition |
|------|------------|
| **Symfony** | PHP-ramverket som Chamilo 3.0 är byggt på. Symfony tillhandahåller routing, beroendeinjektion, ORM (Doctrine), mallhantering (Twig) och annan infrastruktur. |
| **Doctrine** | Objekt-relationsmappningen (ORM) som Chamilo använder för att interagera med databasen. Doctrine mappar PHP-objekt till databastabeller. |
| **Twig** | Mallmotorn som används av Symfony och Chamilo för att rendera HTML. |
| **Flysystem** | Ett abstraktionslager för filsystem i PHP. Chamilo använder Flysystem för att stödja lokal lagring, Amazon S3, Azure Blob och Google Cloud Storage utbytbart. |
| **Composer** | PHP:s beroendehanterare. Används för att installera och uppdatera Chamilos PHP-bibliotek. |
| **Mailer DSN** | Data Source Name för e-posttransport. En anslutningssträng som talar om för Symfony hur e-post ska skickas (t.ex. via SMTP, Amazon SES eller Mailjet). |
| **OPcache** | PHP:s inbyggda opcode-cache. Kompilerar PHP-skript till bytecode och cachar dem i minnet, vilket avsevärt förbättrar prestandan. |
| **APCu** | Ett PHP-tillägg som tillhandahåller en användarnivåcache i minnet. Används av Symfony för att cacha metadata och konfiguration. |

## Akronymer

| Acronym | Full Form |
|---------|-----------|
| **LMS** | Learning Management System (lärplattform) |
| **LRS** | Learning Record Store (för xAPI-satser) |
| **SSO** | Single Sign-On (enkel inloggning) |
| **CSV** | Comma-Separated Values (används för import av användare/kurser) |
| **API** | Application Programming Interface |
| **REST** | Representational State Transfer (API-arkitekturstil) |
| **GDPR** | General Data Protection Regulation (EU:s dataskyddsförordning) |
| **HSTS** | HTTP Strict Transport Security |
| **CDN** | Content Delivery Network |
| **DNS** | Domain Name System |
| **SPF** | Sender Policy Framework (e-postautentisering) |
| **DKIM** | DomainKeys Identified Mail (e-postautentisering) |
| **DMARC** | Domain-based Message Authentication, Reporting, and Conformance |