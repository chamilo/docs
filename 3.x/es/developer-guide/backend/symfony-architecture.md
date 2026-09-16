# Arquitectura Symfony

## Bundles

Chamilo 3.0 está estructurado en tres bundles de Symfony:

### CoreBundle (`src/CoreBundle/`)

El bundle más grande, que gestiona todos los aspectos de la plataforma:

* **Usuarios y autenticación** — Entidad User, roles, tokens JWT, proveedores OAuth2
* **Sistema de recursos** — ResourceNode y ResourceFile (la abstracción unificada de contenidos)
* **Configuración de la plataforma** — esquemas de ajustes en `src/CoreBundle/Settings/` que cubren todos los aspectos configurables
* **Administración** — Controladores de administración para la gestión de usuarios, cursos, sesiones y plugins
* **Proveedores de IA** — Patrón Factory para OpenAI, Gemini, Mistral, DeepSeek, Grok
* **Almacenamiento de archivos** — Adaptadores de almacenamiento basados en Flysystem (local, S3, Azure, GCS)
* **Seguridad** — Voters, control de acceso, jerarquía de roles
* **Herramientas** — definiciones de herramientas de curso registradas a través del sistema de herramientas

### CourseBundle (`src/CourseBundle/`)

Todo lo específico del contenido de los cursos:

* **Entidades de contenido** — 101 entidades para documentos, ejercicios, itinerarios de aprendizaje, foros, glosarios, encuestas, asistencia, blogs, tareas y más
* **Copia de cursos** — Importación/exportación con soporte de Common Cartridge 1.3 y formato Moodle
* **Ajustes del curso** — Esquemas de configuración a nivel de curso

### LtiBundle (`src/LtiBundle/`)

Implementación del estándar LTI 1.3:

* **Registro de plataforma y herramienta** — Gestión de conexiones con herramientas externas
* **Gestión del lanzamiento** — Controladores del flujo de lanzamiento LTI
* **Devolución de calificaciones** — Devolución de calificaciones desde herramientas externas a Chamilo

## Contenedor de servicios

Chamilo utiliza el contenedor de inyección de dependencias de Symfony. Los servicios se configuran en:

* `config/services.yaml` — Definiciones globales de servicios
* El directorio `DependencyInjection/` de cada bundle — Servicios específicos del bundle

## Arquitectura de seguridad

El sistema de seguridad se configura en `config/packages/security.yaml`:

* **Hash de contraseñas** — Admite bcrypt (predeterminado), con migración desde SHA1 y MD5 heredados
* **Jerarquía de roles** — 18 roles organizados jerárquicamente (ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER; roles adicionales incluyen ROLE_HR, ROLE_INVITEE, ROLE_STUDENT_BOSS, ROLE_SESSION_MANAGER, ROLE_QUESTION_MANAGER)
* **Roles sensibles al contexto** — Los roles a nivel de curso (ROLE_CURRENT_COURSE_TEACHER, ROLE_CURRENT_COURSE_STUDENT) se calculan por petición según la matrícula
* **Firewall** — Autenticación JWT para la API, basada en sesión para la interfaz web
* **Voters** — Control de acceso a nivel de recurso mediante voters de Symfony

## Código heredado

Algunas funcionalidades siguen utilizando código PHP heredado en `public/main/`:

* Renderizado e interacción de ejercicios
* Reproductor de itinerarios de aprendizaje
* Algunas herramientas de administración

Estas se están migrando progresivamente a la arquitectura Symfony+Vue. Las páginas heredadas se sirven a través de una capa de compatibilidad que arranca el kernel de Symfony.