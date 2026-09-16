# Glossar

Wichtige Begriffe der Chamilo-3.0-Administration.

## Plattformkonzepte

| Term | Definition |
|------|------------|
| **Access URL** | In einer Multi-URL-Umgebung ist jede Access URL ein eigenes virtuelles Portal, das dieselbe Chamilo-Installation und dieselbe Datenbank nutzt. Jede URL kann über eigenes Branding, eigene Benutzer, Kurse und Einstellungen verfügen. |
| **Course** | Der grundlegende Inhaltscontainer in Chamilo. Ein Kurs enthält Lernmaterialien, Übungen, Foren und weitere Werkzeuge. Kurse können eigenständig existieren oder Sitzungen zugeordnet werden. |
| **Session** | Eine zeitlich begrenzte Instanz eines oder mehrerer Kurse. Sitzungen ermöglichen es, denselben Kursinhalt unterschiedlichen Lernergruppen mit getrenntem Tracking und unabhängigen Tutoren bereitzustellen. |
| **Learning path** | Eine strukturierte Abfolge von Inhaltselementen (Dokumente, Übungen, Links, SCORM-Module), die Lernende in festgelegter Reihenfolge durch das Material führt. |
| **Gradebook** | Ein Aggregationswerkzeug, das Ergebnisse aus Übungen, Aufgaben und anderen Aktivitäten zu einer gewichteten Endnote für einen Kurs zusammenfasst. |
| **Skill** | Eine Kompetenz oder ein Badge, das Lernenden nach Abschluss bestimmter Kurse, Übungen oder beim Erreichen von Gradebook-Schwellenwerten verliehen werden kann. |
| **Extra field** | Ein benutzerdefiniertes Datenfeld, das Administratoren Benutzern, Kursen oder Sitzungen hinzufügen, um organisationsspezifische Metadaten zu erfassen. |
| **Plugin** | Eine Erweiterung, die Chamilo um Funktionen ergänzt, ohne den Kerncode zu verändern. Plugins können Seiten, Werkzeuge oder Integrationen hinzufügen. |
| **Catalog** | Eine durchsuchbare Auflistung verfügbarer Kurse, in der Benutzer Beschreibungen einsehen und sich selbst einschreiben können. |

## Benutzerrollen

| Term | Definition |
|------|------------|
| **Learner (Student)** | Die Standardbenutzerrolle. Kann sich in Kurse einschreiben und Inhalte nutzen. |
| **Teacher (Trainer)** | Kann Kurse erstellen und verwalten, Inhalte hinzufügen und Lernende bewerten. |
| **Session administrator** | Kann Sitzungen und Einschreibungen erstellen und verwalten. |
| **Human Resources Manager (HRM)** | Kann Tracking- und Berichtsdaten für zugewiesene Benutzer einsehen. |
| **Portal administrator** | Voller Zugriff auf alle Administrationsfunktionen der Plattform. |
| **Global administrator** | Portaladministrator mit Zugriff über alle Access URLs in einer Multi-URL-Umgebung. |
| **Tutor** | Eine sitzungsbezogene Rolle. Sitzungstutoren betreuen alle Kurse einer Sitzung; Kurstutoren verwalten einen bestimmten Kurs innerhalb einer Sitzung. In Chamilo-Versionen vor 3.0 als „Coach“ bezeichnet. |

## Standards und Protokolle

| Term | Definition |
|------|------------|
| **SCORM** | Sharable Content Object Reference Model. Ein E-Learning-Paketierungsstandard, der Import und Tracking von Kursen ermöglicht. Chamilo unterstützt SCORM 1.2 und 2004. |
| **xAPI (Tin Can API)** | Eine E-Learning-Spezifikation zur Erfassung von Lernerfahrungen. Umfassender als SCORM, kann sie Aktivitäten außerhalb des LMS aufzeichnen. xAPI-Statements werden in einem Learning Record Store (LRS) gespeichert. |
| **LTI** | Learning Tools Interoperability. Ein IMS-Global-Standard, der das Einbetten externer Werkzeuge und Inhalte in ein LMS ermöglicht. Chamilo unterstützt LTI 1.1 und 1.3 sowohl als Consumer als auch als Provider. |
| **SCIM** | System for Cross-domain Identity Management. Ein Standard zur Automatisierung der Benutzerbereitstellung und -deprovisionierung zwischen Identitätsanbietern und Anwendungen. |
| **OAuth2** | Ein Autorisierungsframework, das Drittanwendungen den Zugriff auf Chamilo im Namen eines Benutzers ohne Passwortweitergabe ermöglicht. Wird für API-Zugriff und SSO-Integrationen genutzt. |
| **LDAP** | Lightweight Directory Access Protocol. Ein Protokoll für den Zugriff auf Verzeichnisdienste (z. B. Active Directory) zur Authentifizierung von Benutzern und zur Synchronisierung von Kontodaten. |
| **CAS** | Central Authentication Service. Ein Single-Sign-on-Protokoll, das es Benutzern ermöglicht, sich einmal zu authentifizieren und auf mehrere Anwendungen zuzugreifen. |
| **JWT** | JSON Web Token. Ein kompaktes, signiertes Tokenformat für API-Authentifizierung und Sitzungsverwaltung. |
| **SAML** | Security Assertion Markup Language. Ein XML-basierter Standard zum Austausch von Authentifizierungsdaten zwischen einem Identitätsanbieter und einem Dienstanbieter. |

## Technische Begriffe

| Term | Definition |
|------|------------|
| **Symfony** | Das PHP-Framework, auf dem Chamilo 3.0 aufbaut. Symfony stellt Routing, Dependency Injection, ORM (Doctrine), Templating (Twig) und weitere Infrastruktur bereit. |
| **Doctrine** | Der Object-Relational Mapper (ORM), den Chamilo für die Interaktion mit der Datenbank verwendet. Doctrine bildet PHP-Objekte auf Datenbanktabellen ab. |
| **Twig** | Die Template-Engine, die von Symfony und Chamilo zum Rendern von HTML verwendet wird. |
| **Flysystem** | Eine PHP-Abstraktionsschicht für Dateisysteme. Chamilo nutzt Flysystem, um lokalen Speicher, Amazon S3, Azure Blob und Google Cloud Storage austauschbar zu unterstützen. |
| **Composer** | Der PHP-Abhängigkeitsmanager. Wird zum Installieren und Aktualisieren der PHP-Bibliotheken von Chamilo verwendet. |
| **Mailer DSN** | Data Source Name für den E-Mail-Transport. Eine Verbindungszeichenfolge, die Symfony mitteilt, wie E-Mails versendet werden (z. B. über SMTP, Amazon SES oder Mailjet). |
| **OPcache** | Der integrierte Opcode-Cache von PHP. Kompiliert PHP-Skripte in Bytecode und speichert sie im Speicher zwischen, wodurch die Leistung deutlich verbessert wird. |
| **APCu** | Eine PHP-Erweiterung, die einen benutzerbezogenen In-Memory-Cache bereitstellt. Wird von Symfony zum Zwischenspeichern von Metadaten und Konfiguration verwendet. |

## Akronyme

| Acronym | Full Form |
|---------|-----------|
| **LMS** | Learning Management System |
| **LRS** | Learning Record Store (für xAPI-Statements) |
| **SSO** | Single Sign-On |
| **CSV** | Comma-Separated Values (wird für Benutzer-/Kursimporte verwendet) |
| **API** | Application Programming Interface |
| **REST** | Representational State Transfer (API-Architekturstil) |
| **GDPR** | General Data Protection Regulation (EU-Datenschutzrecht) |
| **HSTS** | HTTP Strict Transport Security |
| **CDN** | Content Delivery Network |
| **DNS** | Domain Name System |
| **SPF** | Sender Policy Framework (E-Mail-Authentifizierung) |
| **DKIM** | DomainKeys Identified Mail (E-Mail-Authentifizierung) |
| **DMARC** | Domain-based Message Authentication, Reporting, and Conformance |