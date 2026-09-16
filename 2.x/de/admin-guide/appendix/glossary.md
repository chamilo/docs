# Glossar

Wichtige Begriffe, die in der Verwaltung von Chamilo 2.0 verwendet werden.

## Plattformkonzepte

| Begriff | Definition |
|---------|------------|
| **Zugriffs-URL** | In einer Multi-URL-Konfiguration ist jede Zugriffs-URL ein separates virtuelles Portal, das dieselbe Chamilo-Installation und Datenbank nutzt. Jede URL kann eigene Marken, Benutzer, Kurse und Einstellungen haben. |
| **Kurs** | Der grundlegende Inhaltscontainer in Chamilo. Ein Kurs enthält Lernmaterialien, Übungen, Foren und andere Werkzeuge. Kurse können unabhängig existieren oder Sitzungen zugewiesen werden. |
| **Sitzung** | Eine zeitgebundene Instanz eines oder mehrerer Kurse. Sitzungen ermöglichen es, denselben Kursinhalt an verschiedene Lerngruppen mit separater Nachverfolgung und unabhängigen Trainern zu liefern. |
| **Lernpfad** | Eine strukturierte Abfolge von Inhaltselementen (Dokumente, Übungen, Links, SCORM-Module), die Lernende in einer festgelegten Reihenfolge durch das Material führt. |
| **Notenbuch** | Ein Aggregationswerkzeug, das Bewertungen aus Übungen, Aufgaben und anderen Aktivitäten zu einer gewichteten Endnote für einen Kurs zusammenfasst. |
| **Kompetenz** | Eine Fähigkeit oder ein Abzeichen, das Lernenden nach Abschluss bestimmter Kurse, Übungen oder Erreichen von Schwellenwerten im Notenbuch verliehen werden kann. |
| **Zusatzfeld** | Ein benutzerdefiniertes Datenfeld, das von Administratoren zu Benutzern, Kursen oder Sitzungen hinzugefügt wird, um organisationsspezifische Metadaten zu erfassen. |
| **Plugin** | Eine Erweiterung, die Chamilo zusätzliche Funktionen hinzufügt, ohne den Kerncode zu verändern. Plugins können Seiten, Werkzeuge oder Integrationen hinzufügen. |
| **Katalog** | Eine durchsuchbare Liste verfügbarer Kurse, in der Benutzer Beschreibungen anzeigen und sich selbst einschreiben können. |

## Benutzerrollen

| Begriff | Definition |
|---------|------------|
| **Lernender (Student)** | Die Standard-Benutzerrolle. Kann sich in Kurse einschreiben und Inhalte konsumieren. |
| **Lehrer (Trainer)** | Kann Kurse erstellen und verwalten, Inhalte hinzufügen und Lernende bewerten. |
| **Sitzungsadministrator** | Kann Sitzungen und Einschreibungen erstellen und verwalten. |
| **Personalmanager (HRM)** | Kann Nachverfolgungs- und Berichtsdaten für zugewiesene Benutzer einsehen. |
| **Portaladministrator** | Voller Zugriff auf alle Plattform-Administrationsfunktionen. |
| **Globaler Administrator** | Portaladministrator mit Zugriff auf alle Zugriffs-URLs in einer Multi-URL-Konfiguration. |
| **Coach/Tutor** | Eine Rolle auf Sitzungsebene. Sitzungs-Coaches überwachen alle Kurse in einer Sitzung; Kurs-Coaches verwalten einen bestimmten Kurs innerhalb einer Sitzung. Alle Verweise auf Coaches sollten langfristig in Tutoren umbenannt werden. |

## Standards und Protokolle

| Begriff | Definition |
|---------|------------|
| **SCORM** | Sharable Content Object Reference Model. Ein E-Learning-Verpackungsstandard, der es ermöglicht, Kurse zu importieren und zu verfolgen. Chamilo unterstützt SCORM 1.2 und 2004. |
| **xAPI (Tin Can API)** | Eine E-Learning-Spezifikation zur Verfolgung von Lernerfahrungen. Umfassender als SCORM, kann es Aktivitäten aufzeichnen, die außerhalb des LMS stattfinden. xAPI-Statements werden in einem Learning Record Store (LRS) gespeichert. |
| **LTI** | Learning Tools Interoperability. Ein IMS Global-Standard, der es ermöglicht, externe Werkzeuge und Inhalte in ein LMS einzubetten. Chamilo unterstützt LTI 1.1 und 1.3 sowohl als Konsument als auch als Anbieter. |
| **SCIM** | System for Cross-domain Identity Management. Ein Standard zur Automatisierung der Benutzerbereitstellung und -entfernung zwischen Identitätsanbietern und Anwendungen. |
| **OAuth2** | Ein Autorisierungsframework, das Drittanbieter-Anwendungen erlaubt, im Namen eines Benutzers auf Chamilo zuzugreifen, ohne Passwörter weiterzugeben. Wird für API-Zugriff und SSO-Integrationen verwendet. |
| **LDAP** | Lightweight Directory Access Protocol. Ein Protokoll zum Zugriff auf Verzeichnisdienste (z. B. Active Directory), um Benutzer zu authentifizieren und Kontodaten zu synchronisieren. |
| **CAS** | Central Authentication Service. Ein Single-Sign-On-Protokoll, das es Benutzern ermöglicht, sich einmal zu authentifizieren und auf mehrere Anwendungen zuzugreifen. |
| **JWT** | JSON Web Token. Ein kompaktes, signiertes Token-Format, das für API-Authentifizierung und Sitzungsmanagement verwendet wird. |
| **SAML** | Security Assertion Markup Language. Ein XML-basierter Standard zum Austausch von Authentifizierungsdaten zwischen einem Identitätsanbieter und einem Dienstleister. |

---
## Technische Begriffe

| Begriff | Definition |
|---------|------------|
| **Symfony** | Das PHP-Framework, auf dem Chamilo 2.0 basiert. Symfony bietet Routing, Dependency Injection, ORM (Doctrine), Templating (Twig) und weitere Infrastruktur. |
| **Doctrine** | Der Object-Relational Mapper (ORM), der von Chamilo verwendet wird, um mit der Datenbank zu interagieren. Doctrine bildet PHP-Objekte auf Datenbanktabellen ab. |
| **Twig** | Die Template-Engine, die von Symfony und Chamilo zur Darstellung von HTML verwendet wird. |
| **Flysystem** | Eine PHP-Abstraktionsschicht für Dateisysteme. Chamilo nutzt Flysystem, um lokalen Speicher, Amazon S3, Azure Blob und Google Cloud Storage austauschbar zu unterstützen. |
| **Composer** | Der PHP-Dependency-Manager. Wird verwendet, um PHP-Bibliotheken für Chamilo zu installieren und zu aktualisieren. |
| **Mailer DSN** | Data Source Name für den E-Mail-Transport. Eine Verbindungszeichenfolge, die Symfony angibt, wie E-Mails gesendet werden sollen (z. B. über SMTP, Amazon SES oder Mailjet). |
| **OPcache** | Der integrierte Opcode-Cache von PHP. Kompiliert PHP-Skripte in Bytecode und speichert sie im Arbeitsspeicher, was die Leistung erheblich verbessert. |
| **APCu** | Eine PHP-Erweiterung, die einen benutzerdefinierten In-Memory-Cache bereitstellt. Wird von Symfony für das Caching von Metadaten und Konfigurationen verwendet. |

## Abkürzungen

| Abkürzung | Vollform |
|-----------|----------|
| **LMS** | Learning Management System |
| **LRS** | Learning Record Store (für xAPI-Statements) |
| **SSO** | Single Sign-On |
| **CSV** | Comma-Separated Values (wird für Benutzer-/Kursimporte verwendet) |
| **API** | Application Programming Interface |
| **REST** | Representational State Transfer (API-Architekturstil) |
| **GDPR** | General Data Protection Regulation (EU-Datenschutzgesetz) |
| **HSTS** | HTTP Strict Transport Security |
| **CDN** | Content Delivery Network |
| **DNS** | Domain Name System |
| **SPF** | Sender Policy Framework (E-Mail-Authentifizierung) |
| **DKIM** | DomainKeys Identified Mail (E-Mail-Authentifizierung) |
| **DMARC** | Domain-based Message Authentication, Reporting, and Conformance |