# Glossary

Key terms used in Chamilo 2.0 administration.

## Platform Concepts

| Term | Definition |
|------|------------|
| **Access URL** | In a multi-URL setup, each access URL is a separate virtual portal sharing the same Chamilo installation and database. Each URL can have its own branding, users, courses, and settings. |
| **Course** | The fundamental content container in Chamilo. A course holds learning materials, exercises, forums, and other tools. Courses can exist independently or be assigned to sessions. |
| **Session** | A time-bound instance of one or more courses. Sessions allow the same course content to be delivered to different groups of learners with separate tracking and independent coaches. |
| **Learning path** | A structured sequence of content items (documents, exercises, links, SCORM modules) that guides learners through material in a defined order. |
| **Gradebook** | An aggregation tool that combines scores from exercises, assignments, and other activities into a weighted final grade for a course. |
| **Skill** | A competency or badge that can be awarded to learners upon completing specific courses, exercises, or achieving gradebook thresholds. |
| **Extra field** | A custom data field added by administrators to users, courses, or sessions to capture organization-specific metadata. |
| **Plugin** | An extension that adds functionality to Chamilo without modifying core code. Plugins can add pages, tools, or integrations. |
| **Catalog** | A browsable listing of available courses where users can view descriptions and self-enroll. |

## User Roles

| Term | Definition |
|------|------------|
| **Learner (Student)** | The default user role. Can enroll in courses and consume content. |
| **Teacher (Trainer)** | Can create and manage courses, add content, and grade learners. |
| **Session administrator** | Can create and manage sessions and enrollments. |
| **Human Resources Manager (HRM)** | Can view tracking and reporting data for assigned users. |
| **Portal administrator** | Full access to all platform administration features. |
| **Global administrator** | Portal administrator with access across all access URLs in a multi-URL setup. |
| **Coach** | A session-level role. Session coaches oversee all courses in a session; course coaches manage a specific course within a session. |

## Standards and Protocols

| Term | Definition |
|------|------------|
| **SCORM** | Sharable Content Object Reference Model. An e-learning packaging standard that allows courses to be imported and tracked. Chamilo supports SCORM 1.2 and 2004. |
| **xAPI (Tin Can API)** | An e-learning specification for tracking learning experiences. Broader than SCORM, it can record activities that happen outside the LMS. xAPI statements are stored in a Learning Record Store (LRS). |
| **LTI** | Learning Tools Interoperability. An IMS Global standard that allows external tools and content to be embedded within an LMS. Chamilo supports LTI 1.1 and 1.3 as both a consumer and provider. |
| **SCIM** | System for Cross-domain Identity Management. A standard for automating user provisioning and deprovisioning between identity providers and applications. |
| **OAuth2** | An authorization framework that allows third-party applications to access Chamilo on behalf of a user without sharing passwords. Used for API access and SSO integrations. |
| **LDAP** | Lightweight Directory Access Protocol. A protocol for accessing directory services (e.g., Active Directory) to authenticate users and synchronize account data. |
| **CAS** | Central Authentication Service. A single sign-on protocol that allows users to authenticate once and access multiple applications. |
| **JWT** | JSON Web Token. A compact, signed token format used for API authentication and session management. |
| **SAML** | Security Assertion Markup Language. An XML-based standard for exchanging authentication data between an identity provider and a service provider. |

## Technical Terms

| Term | Definition |
|------|------------|
| **Symfony** | The PHP framework on which Chamilo 2.0 is built. Symfony provides routing, dependency injection, ORM (Doctrine), templating (Twig), and other infrastructure. |
| **Doctrine** | The object-relational mapper (ORM) used by Chamilo to interact with the database. Doctrine maps PHP objects to database tables. |
| **Twig** | The template engine used by Symfony and Chamilo for rendering HTML. |
| **Flysystem** | A PHP filesystem abstraction layer. Chamilo uses Flysystem to support local storage, Amazon S3, Azure Blob, and Google Cloud Storage interchangeably. |
| **Composer** | The PHP dependency manager. Used to install and update Chamilo's PHP libraries. |
| **Mailer DSN** | Data Source Name for the email transport. A connection string that tells Symfony how to send emails (e.g., via SMTP, Amazon SES, or Mailjet). |
| **OPcache** | PHP's built-in opcode cache. Compiles PHP scripts into bytecode and caches them in memory, significantly improving performance. |
| **APCu** | A PHP extension providing a user-level in-memory cache. Used by Symfony for caching metadata and configuration. |

## Acronyms

| Acronym | Full Form |
|---------|-----------|
| **LMS** | Learning Management System |
| **LRS** | Learning Record Store (for xAPI statements) |
| **SSO** | Single Sign-On |
| **CSV** | Comma-Separated Values (used for user/course imports) |
| **API** | Application Programming Interface |
| **REST** | Representational State Transfer (API architecture style) |
| **GDPR** | General Data Protection Regulation (EU data privacy law) |
| **HSTS** | HTTP Strict Transport Security |
| **CDN** | Content Delivery Network |
| **DNS** | Domain Name System |
| **SPF** | Sender Policy Framework (email authentication) |
| **DKIM** | DomainKeys Identified Mail (email authentication) |
| **DMARC** | Domain-based Message Authentication, Reporting, and Conformance |
