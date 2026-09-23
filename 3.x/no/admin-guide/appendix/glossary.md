# Ordliste

Nøkkelbegreper brukt i administrasjon av Chamilo 3.0.

## Plattformkonsepter

| Term | Definisjon |
|------|------------|
| **Access URL** | I et oppsett med flere URL-er er hver access URL en separat virtuell portal som deler samme Chamilo-installasjon og database. Hver URL kan ha egen merkevareprofil, brukere, kurs og innstillinger. |
| **Course** | Den grunnleggende innholdsbeholderen i Chamilo. Et kurs inneholder læringsmateriell, øvelser, forum og andre verktøy. Kurs kan eksistere uavhengig eller tildeles økter. |
| **Session** | En tidsavgrenset instans av ett eller flere kurs. Økter gjør det mulig å levere samme kursinnhold til ulike grupper av lærende med separat sporing og uavhengige veiledere. |
| **Learning path** | En strukturert sekvens av innholdselementer (dokumenter, øvelser, lenker, SCORM-moduler) som veileder lærende gjennom materiell i en definert rekkefølge. |
| **Gradebook** | Et aggregeringsverktøy som kombinerer poeng fra øvelser, innleveringer og andre aktiviteter til en vektet sluttkarakter for et kurs. |
| **Skill** | En kompetanse eller merke som kan tildeles lærende ved fullføring av bestemte kurs, øvelser eller ved oppnåelse av terskler i karakterboken. |
| **Extra field** | Et tilpasset datafelt som administratorer legger til brukere, kurs eller økter for å fange organisasjonsspesifikke metadata. |
| **Plugin** | En utvidelse som tilfører funksjonalitet til Chamilo uten å endre kjernekoden. Plugins kan legge til sider, verktøy eller integrasjoner. |
| **Catalog** | En bla-bar oversikt over tilgjengelige kurs der brukere kan se beskrivelser og melde seg på selv. |

## Brukerroller

| Term | Definisjon |
|------|------------|
| **Learner (Student)** | Standard brukerrolle. Kan melde seg på kurs og konsumere innhold. |
| **Teacher (Trainer)** | Kan opprette og administrere kurs, legge til innhold og vurdere lærende. |
| **Session administrator** | Kan opprette og administrere økter og påmeldinger. |
| **Human Resources Manager (HRM)** | Kan se sporings- og rapportdata for tildelte brukere. |
| **Portal administrator** | Full tilgang til alle administrasjonsfunksjoner på plattformen. |
| **Global administrator** | Portaladministrator med tilgang på tvers av alle access URL-er i et oppsett med flere URL-er. |
| **Tutor** | En rolle på øktnivå. Øktveiledere har oversikt over alle kurs i en økt; kursveiledere administrerer et bestemt kurs innenfor en økt. Kalt «coach» i Chamilo-versjoner før 3.0. |

## Standarder og protokoller

| Term | Definisjon |
|------|------------|
| **SCORM** | Sharable Content Object Reference Model. En e-læringspakkestandard som gjør det mulig å importere og spore kurs. Chamilo støtter SCORM 1.2 og 2004. |
| **xAPI (Tin Can API)** | En e-læringsspesifikasjon for sporing av læringsopplevelser. Bredere enn SCORM, den kan registrere aktiviteter som skjer utenfor LMS-et. xAPI-utsagn lagres i en Learning Record Store (LRS). |
| **LTI** | Learning Tools Interoperability. En IMS Global-standard som gjør det mulig å bygge inn eksterne verktøy og innhold i et LMS. Chamilo støtter LTI 1.1 og 1.3 både som konsument og leverandør. |
| **SCIM** | System for Cross-domain Identity Management. En standard for automatisering av brukerprovisjonering og avprovisjonering mellom identitetsleverandører og applikasjoner. |
| **OAuth2** | Et autoriseringsrammeverk som lar tredjepartsapplikasjoner få tilgang til Chamilo på vegne av en bruker uten å dele passord. Brukes til API-tilgang og SSO-integrasjoner. |
| **LDAP** | Lightweight Directory Access Protocol. En protokoll for tilgang til katalogtjenester (f.eks. Active Directory) for å autentisere brukere og synkronisere kontodata. |
| **CAS** | Central Authentication Service. En enkeltpåloggingsprotokoll som lar brukere autentisere seg én gang og få tilgang til flere applikasjoner. |
| **JWT** | JSON Web Token. Et kompakt, signert tokenformat brukt til API-autentisering og øktadministrasjon. |
| **SAML** | Security Assertion Markup Language. En XML-basert standard for utveksling av autentiseringsdata mellom en identitetsleverandør og en tjenesteleverandør. |

## Tekniske termer

| Term | Definisjon |
|------|------------|
| **Symfony** | PHP-rammeverket som Chamilo 3.0 er bygget på. Symfony tilbyr ruting, avhengighetsinjeksjon, ORM (Doctrine), malmotor (Twig) og annen infrastruktur. |
| **Doctrine** | Objekt-relasjonell mapper (ORM) som Chamilo bruker for å kommunisere med databasen. Doctrine mapper PHP-objekter til databasetabeller. |
| **Twig** | Malmotoren som brukes av Symfony og Chamilo for å rendre HTML. |
| **Flysystem** | Et PHP-abstraksjonslag for filsystemer. Chamilo bruker Flysystem for å støtte lokal lagring, Amazon S3, Azure Blob og Google Cloud Storage om hverandre. |
| **Composer** | PHP-avhengighetsbehandleren. Brukes til å installere og oppdatere Chamilos PHP-biblioteker. |
| **Mailer DSN** | Data Source Name for e-posttransport. En tilkoblingsstreng som forteller Symfony hvordan e-post skal sendes (f.eks. via SMTP, Amazon SES eller Mailjet). |
| **OPcache** | PHPs innebygde opcode-cache. Kompilerer PHP-skript til bytecode og cacher dem i minnet, noe som gir betydelig bedre ytelse. |
| **APCu** | En PHP-utvidelse som gir et brukernivå-cache i minnet. Brukes av Symfony til å cache metadata og konfigurasjon. |

## Forkortelser

| Forkortelse | Full form |
|---------|-----------|
| **LMS** | Learning Management System (læringsplattform) |
| **LRS** | Learning Record Store (for xAPI-utsagn) |
| **SSO** | Single Sign-On (enkel pålogging) |
| **CSV** | Comma-Separated Values (brukes til import av brukere/kurs) |
| **API** | Application Programming Interface |
| **REST** | Representational State Transfer (API-arkitekturstil) |
| **GDPR** | General Data Protection Regulation (EUs personvernforordning) |
| **HSTS** | HTTP Strict Transport Security |
| **CDN** | Content Delivery Network |
| **DNS** | Domain Name System |
| **SPF** | Sender Policy Framework (e-postautentisering) |
| **DKIM** | DomainKeys Identified Mail (e-postautentisering) |
| **DMARC** | Domain-based Message Authentication, Reporting, and Conformance |