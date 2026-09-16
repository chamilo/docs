# Glosario

Términos clave utilizados en la administración de Chamilo 3.0.

## Conceptos de la plataforma

| Término | Definición |
|------|------------|
| **Access URL** | En una configuración multi-URL, cada access URL es un portal virtual independiente que comparte la misma instalación y base de datos de Chamilo. Cada URL puede tener su propia identidad visual, usuarios, cursos y ajustes. |
| **Curso** | El contenedor fundamental de contenidos en Chamilo. Un curso alberga materiales de aprendizaje, ejercicios, foros y otras herramientas. Los cursos pueden existir de forma independiente o asignarse a sesiones. |
| **Sesión** | Una instancia acotada en el tiempo de uno o más cursos. Las sesiones permiten impartir el mismo contenido de un curso a distintos grupos de alumnos, con seguimiento separado y tutores independientes. |
| **Itinerario de aprendizaje** | Una secuencia estructurada de elementos de contenido (documentos, ejercicios, enlaces, módulos SCORM) que guía a los alumnos a través del material en un orden definido. |
| **Libro de calificaciones** | Una herramienta de agregación que combina las puntuaciones de ejercicios, tareas y otras actividades en una calificación final ponderada para un curso. |
| **Competencia** | Una competencia o insignia que puede otorgarse a los alumnos al completar cursos o ejercicios concretos, o al alcanzar umbrales del libro de calificaciones. |
| **Campo extra** | Un campo de datos personalizado añadido por los administradores a usuarios, cursos o sesiones para capturar metadatos específicos de la organización. |
| **Plugin** | Una extensión que añade funcionalidad a Chamilo sin modificar el código del núcleo. Los plugins pueden añadir páginas, herramientas o integraciones. |
| **Catálogo** | Un listado navegable de cursos disponibles en el que los usuarios pueden consultar descripciones e inscribirse por sí mismos. |

## Roles de usuario

| Término | Definición |
|------|------------|
| **Alumno (Estudiante)** | El rol de usuario predeterminado. Puede inscribirse en cursos y consumir contenidos. |
| **Profesor (Formador)** | Puede crear y gestionar cursos, añadir contenidos y calificar a los alumnos. |
| **Administrador de sesión** | Puede crear y gestionar sesiones e inscripciones. |
| **Gestor de recursos humanos (HRM)** | Puede consultar datos de seguimiento e informes de los usuarios asignados. |
| **Administrador del portal** | Acceso completo a todas las funciones de administración de la plataforma. |
| **Administrador global** | Administrador del portal con acceso a todas las access URL en una configuración multi-URL. |
| **Tutor** | Un rol a nivel de sesión. Los tutores de sesión supervisan todos los cursos de una sesión; los tutores de curso gestionan un curso concreto dentro de una sesión. Denominado «coach» en las versiones de Chamilo anteriores a 3.0. |

## Estándares y protocolos

| Término | Definición |
|------|------------|
| **SCORM** | Sharable Content Object Reference Model. Un estándar de empaquetado de e-learning que permite importar y hacer seguimiento de cursos. Chamilo admite SCORM 1.2 y 2004. |
| **xAPI (Tin Can API)** | Una especificación de e-learning para el seguimiento de experiencias de aprendizaje. Más amplia que SCORM, puede registrar actividades que ocurren fuera del LMS. Las declaraciones xAPI se almacenan en un Learning Record Store (LRS). |
| **LTI** | Learning Tools Interoperability. Un estándar de IMS Global que permite incrustar herramientas y contenidos externos dentro de un LMS. Chamilo admite LTI 1.1 y 1.3 tanto como consumidor como proveedor. |
| **SCIM** | System for Cross-domain Identity Management. Un estándar para automatizar el aprovisionamiento y desaprovisionamiento de usuarios entre proveedores de identidad y aplicaciones. |
| **OAuth2** | Un marco de autorización que permite a aplicaciones de terceros acceder a Chamilo en nombre de un usuario sin compartir contraseñas. Se utiliza para el acceso a la API y las integraciones SSO. |
| **LDAP** | Lightweight Directory Access Protocol. Un protocolo para acceder a servicios de directorio (p. ej., Active Directory) con el fin de autenticar usuarios y sincronizar datos de cuentas. |
| **CAS** | Central Authentication Service. Un protocolo de inicio de sesión único que permite a los usuarios autenticarse una vez y acceder a varias aplicaciones. |
| **JWT** | JSON Web Token. Un formato de token compacto y firmado utilizado para la autenticación de API y la gestión de sesiones. |
| **SAML** | Security Assertion Markup Language. Un estándar basado en XML para intercambiar datos de autenticación entre un proveedor de identidad y un proveedor de servicios. |

## Términos técnicos

| Término | Definición |
|------|------------|
| **Symfony** | El framework PHP sobre el que está construido Chamilo 3.0. Symfony proporciona enrutamiento, inyección de dependencias, ORM (Doctrine), plantillas (Twig) y otra infraestructura. |
| **Doctrine** | El mapeador objeto-relacional (ORM) que utiliza Chamilo para interactuar con la base de datos. Doctrine mapea objetos PHP a tablas de la base de datos. |
| **Twig** | El motor de plantillas utilizado por Symfony y Chamilo para renderizar HTML. |
| **Flysystem** | Una capa de abstracción del sistema de archivos en PHP. Chamilo utiliza Flysystem para admitir de forma intercambiable almacenamiento local, Amazon S3, Azure Blob y Google Cloud Storage. |
| **Composer** | El gestor de dependencias de PHP. Se utiliza para instalar y actualizar las bibliotecas PHP de Chamilo. |
| **Mailer DSN** | Data Source Name para el transporte de correo electrónico. Una cadena de conexión que indica a Symfony cómo enviar correos (p. ej., mediante SMTP, Amazon SES o Mailjet). |
| **OPcache** | La caché de opcodes integrada de PHP. Compila los scripts PHP a bytecode y los almacena en memoria, mejorando significativamente el rendimiento. |
| **APCu** | Una extensión de PHP que proporciona una caché en memoria a nivel de usuario. Symfony la utiliza para almacenar en caché metadatos y configuración. |

## Acrónimos

| Acrónimo | Forma completa |
|---------|-----------|
| **LMS** | Learning Management System (sistema de gestión del aprendizaje) |
| **LRS** | Learning Record Store (almacén de registros de aprendizaje, para declaraciones xAPI) |
| **SSO** | Single Sign-On (inicio de sesión único) |
| **CSV** | Comma-Separated Values (valores separados por comas; se usa para importaciones de usuarios/cursos) |
| **API** | Application Programming Interface (interfaz de programación de aplicaciones) |
| **REST** | Representational State Transfer (estilo de arquitectura de API) |
| **GDPR** | General Data Protection Regulation (Reglamento General de Protección de Datos de la UE) |
| **HSTS** | HTTP Strict Transport Security |
| **CDN** | Content Delivery Network (red de entrega de contenidos) |
| **DNS** | Domain Name System (sistema de nombres de dominio) |
| **SPF** | Sender Policy Framework (autenticación de correo electrónico) |
| **DKIM** | DomainKeys Identified Mail (autenticación de correo electrónico) |
| **DMARC** | Domain-based Message Authentication, Reporting, and Conformance |