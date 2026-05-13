# Glosario

Términos clave utilizados en la administración de Chamilo 2.0.

## Conceptos de la Plataforma

| Término | Definición |
|---------|------------|
| **URL de Acceso** | En una configuración multi-URL, cada URL de acceso es un portal virtual separado que comparte la misma instalación y base de datos de Chamilo. Cada URL puede tener su propia marca, usuarios, cursos y configuraciones. |
| **Curso** | El contenedor de contenido fundamental en Chamilo. Un curso contiene materiales de aprendizaje, ejercicios, foros y otras herramientas. Los cursos pueden existir de manera independiente o asignarse a sesiones. |
| **Sesión** | Una instancia limitada en el tiempo de uno o más cursos. Las sesiones permiten que el mismo contenido del curso se entregue a diferentes grupos de aprendices con seguimiento separado y entrenadores independientes. |
| **Ruta de aprendizaje** | Una secuencia estructurada de elementos de contenido (documentos, ejercicios, enlaces, módulos SCORM) que guía a los aprendices a través del material en un orden definido. |
| **Libro de calificaciones** | Una herramienta de agregación que combina puntajes de ejercicios, tareas y otras actividades en una calificación final ponderada para un curso. |
| **Habilidad** | Una competencia o insignia que se puede otorgar a los aprendices al completar cursos específicos, ejercicios o alcanzar umbrales en el libro de calificaciones. |
| **Campo adicional** | Un campo de datos personalizado añadido por los administradores a usuarios, cursos o sesiones para capturar metadatos específicos de la organización. |
| **Plugin** | Una extensión que agrega funcionalidad a Chamilo sin modificar el código principal. Los plugins pueden añadir páginas, herramientas o integraciones. |
| **Catálogo** | Una lista navegable de cursos disponibles donde los usuarios pueden ver descripciones y auto-inscribirse. |

## Roles de Usuario

| Término | Definición |
|---------|------------|
| **Aprendiz (Estudiante)** | El rol de usuario predeterminado. Puede inscribirse en cursos y consumir contenido. |
| **Profesor (Entrenador)** | Puede crear y gestionar cursos, añadir contenido y calificar a los aprendices. |
| **Administrador de sesión** | Puede crear y gestionar sesiones e inscripciones. |
| **Gerente de Recursos Humanos (HRM)** | Puede ver datos de seguimiento e informes para los usuarios asignados. |
| **Administrador del portal** | Acceso completo a todas las funciones de administración de la plataforma. |
| **Administrador global** | Administrador del portal con acceso a todas las URL de acceso en una configuración multi-URL. |
| **Entrenador/Tutor** | Un rol a nivel de sesión. Los entrenadores de sesión supervisan todos los cursos en una sesión; los entrenadores de curso gestionan un curso específico dentro de una sesión. Todas las referencias a entrenadores deberían cambiarse a tutores a largo plazo. |

## Estándares y Protocolos

| Término | Definición |
|---------|------------|
| **SCORM** | Sharable Content Object Reference Model. Un estándar de empaquetado de e-learning que permite importar y rastrear cursos. Chamilo soporta SCORM 1.2 y 2004. |
| **xAPI (Tin Can API)** | Una especificación de e-learning para rastrear experiencias de aprendizaje. Más amplio que SCORM, puede registrar actividades que ocurren fuera del LMS. Las declaraciones xAPI se almacenan en un Learning Record Store (LRS). |
| **LTI** | Learning Tools Interoperability. Un estándar de IMS Global que permite incrustar herramientas y contenido externos dentro de un LMS. Chamilo soporta LTI 1.1 y 1.3 tanto como consumidor como proveedor. |
| **SCIM** | System for Cross-domain Identity Management. Un estándar para automatizar el aprovisionamiento y desaprovisionamiento de usuarios entre proveedores de identidad y aplicaciones. |
| **OAuth2** | Un marco de autorización que permite a aplicaciones de terceros acceder a Chamilo en nombre de un usuario sin compartir contraseñas. Utilizado para acceso a API e integraciones SSO. |
| **LDAP** | Lightweight Directory Access Protocol. Un protocolo para acceder a servicios de directorio (por ejemplo, Active Directory) para autenticar usuarios y sincronizar datos de cuentas. |
| **CAS** | Central Authentication Service. Un protocolo de inicio de sesión único que permite a los usuarios autenticarse una vez y acceder a múltiples aplicaciones. |
| **JWT** | JSON Web Token. Un formato de token compacto y firmado utilizado para autenticación de API y gestión de sesiones. |
| **SAML** | Security Assertion Markup Language. Un estándar basado en XML para intercambiar datos de autenticación entre un proveedor de identidad y un proveedor de servicios. |

---
## Términos Técnicos

| Término | Definición |
|---------|------------|
| **Symfony** | El framework de PHP en el que se basa Chamilo 2.0. Symfony proporciona enrutamiento, inyección de dependencias, ORM (Doctrine), plantillas (Twig) y otra infraestructura. |
| **Doctrine** | El mapeador objeto-relacional (ORM) utilizado por Chamilo para interactuar con la base de datos. Doctrine mapea objetos PHP a tablas de base de datos. |
| **Twig** | El motor de plantillas utilizado por Symfony y Chamilo para renderizar HTML. |
| **Flysystem** | Una capa de abstracción de sistema de archivos en PHP. Chamilo utiliza Flysystem para soportar almacenamiento local, Amazon S3, Azure Blob y Google Cloud Storage de manera intercambiable. |
| **Composer** | El gestor de dependencias de PHP. Se utiliza para instalar y actualizar las bibliotecas PHP de Chamilo. |
| **Mailer DSN** | Nombre de la fuente de datos (Data Source Name) para el transporte de correo electrónico. Una cadena de conexión que indica a Symfony cómo enviar correos electrónicos (por ejemplo, a través de SMTP, Amazon SES o Mailjet). |
| **OPcache** | La caché de opcode integrada en PHP. Compila scripts PHP en bytecode y los almacena en memoria, mejorando significativamente el rendimiento. |
| **APCu** | Una extensión de PHP que proporciona una caché en memoria a nivel de usuario. Utilizada por Symfony para almacenar en caché metadatos y configuraciones. |

## Siglas

| Sigla | Forma Completa |
|-------|----------------|
| **LMS** | Sistema de Gestión de Aprendizaje (Learning Management System) |
| **LRS** | Almacén de Registros de Aprendizaje (Learning Record Store, para declaraciones xAPI) |
| **SSO** | Inicio de Sesión Único (Single Sign-On) |
| **CSV** | Valores Separados por Comas (Comma-Separated Values, utilizado para importaciones de usuarios/cursos) |
| **API** | Interfaz de Programación de Aplicaciones (Application Programming Interface) |
| **REST** | Transferencia de Estado Representacional (Representational State Transfer, estilo de arquitectura de API) |
| **GDPR** | Reglamento General de Protección de Datos (General Data Protection Regulation, ley de privacidad de datos de la UE) |
| **HSTS** | Seguridad de Transporte Estricta HTTP (HTTP Strict Transport Security) |
| **CDN** | Red de Distribución de Contenido (Content Delivery Network) |
| **DNS** | Sistema de Nombres de Dominio (Domain Name System) |
| **SPF** | Marco de Políticas de Remitente (Sender Policy Framework, autenticación de correo electrónico) |
| **DKIM** | Correo Identificado por Claves de Dominio (DomainKeys Identified Mail, autenticación de correo electrónico) |
| **DMARC** | Autenticación, Informes y Conformidad de Mensajes Basados en Dominio (Domain-based Message Authentication, Reporting, and Conformance) |