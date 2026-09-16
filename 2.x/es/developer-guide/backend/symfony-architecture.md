# Arquitectura de Symfony

## Bundles

Chamilo 2.0 está estructurado en tres bundles de Symfony:

### CoreBundle (`src/CoreBundle/`)

El bundle más grande, que maneja todos los aspectos de la plataforma:

- **Usuarios y autenticación** — Entidad de usuario, roles, tokens JWT, proveedores OAuth2
- **Sistema de recursos** — ResourceNode y ResourceFile (la abstracción unificada de contenido)
- **Configuraciones de la plataforma** — Esquemas de configuración en `src/CoreBundle/Settings/` que cubren todos los aspectos configurables
- **Administración** — Controladores de administración para la gestión de usuarios, cursos, sesiones y plugins
- **Proveedores de IA** — Patrón de fábrica para OpenAI, Gemini, Mistral, DeepSeek, Grok
- **Almacenamiento de archivos** — Adaptadores de almacenamiento basados en Flysystem (local, S3, Azure, GCS)
- **Seguridad** — Votantes, control de acceso, jerarquía de roles
- **Herramientas** — Definiciones de herramientas de curso registradas a través del sistema de herramientas

### CourseBundle (`src/CourseBundle/`)

Todo lo relacionado con el contenido de los cursos:

- **Entidades de contenido** — 101 entidades para documentos, ejercicios, rutas de aprendizaje, foros, glosarios, encuestas, asistencia, blogs, tareas y más
- **Copia de curso** — Importación/exportación con soporte para Common Cartridge 1.3 y formato Moodle
- **Configuraciones de curso** — Esquemas de configuración a nivel de curso

### LtiBundle (`src/LtiBundle/`)

Implementación del estándar LTI 1.3:

- **Registro de plataforma y herramientas** — Gestiona conexiones con herramientas externas
- **Gestión de lanzamiento** — Controladores para el flujo de lanzamiento de LTI
- **Retorno de calificaciones** — Devolución de calificaciones desde herramientas externas a Chamilo

## Contenedor de Servicios

Chamilo utiliza el contenedor de inyección de dependencias de Symfony. Los servicios se configuran en:

- `config/services.yaml` — Definiciones de servicios globales
- Directorio `DependencyInjection/` de cada bundle — Servicios específicos de cada bundle

## Arquitectura de Seguridad

El sistema de seguridad se configura en `config/packages/security.yaml`:

- **Hash de contraseñas** — Soporta bcrypt (por defecto), con migración desde los antiguos SHA1 y MD5
- **Jerarquía de roles** — 18 roles organizados jerárquicamente (ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER; roles adicionales incluyen ROLE_HR, ROLE_INVITEE, ROLE_STUDENT_BOSS, ROLE_SESSION_MANAGER, ROLE_QUESTION_MANAGER)
- **Roles sensibles al contexto** — Roles a nivel de curso (ROLE_CURRENT_COURSE_TEACHER, ROLE_CURRENT_COURSE_STUDENT) se calculan por solicitud en función de la inscripción
- **Firewall** — Autenticación JWT para la API, basada en sesiones para la interfaz web
- **Votantes** — Control de acceso a nivel de recursos mediante votantes de Symfony

## Código Heredado

Algunas funcionalidades aún utilizan código PHP heredado en `public/main/`:

- Renderizado e interacción de ejercicios
- Reproductor de rutas de aprendizaje
- Algunas herramientas de administración

Estas funcionalidades están siendo migradas progresivamente a la arquitectura Symfony+Vue. Las páginas heredadas se sirven a través de una capa de compatibilidad que inicia el kernel de Symfony.