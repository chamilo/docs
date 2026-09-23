# Descripción general de la interfaz de administración

El panel de administración es su centro de mando para gestionar la plataforma Chamilo. Acceda a él haciendo clic en **Administración** <img src="../../.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> en la barra lateral.

## Panel de administración

![El panel de administración mostrando bloques funcionales para Usuarios, Cursos, Sesiones y Configuración](../../.gitbook/assets/admin-dashboard-overview.png)

El panel de administración está organizado en bloques funcionales. Cada bloque agrupa herramientas de gestión relacionadas:

### Users

* **User list** — Ver, buscar, editar y gestionar todos los usuarios de la plataforma
* **Add a user** — Crear cuentas de usuario individuales
* **Classes** — Gestionar clases de usuarios para la inscripción masiva en sesiones

Consulte el capítulo [Usuarios](../users/README.md) para más detalles.

### Courses

* **Course list** — Ver y gestionar todos los cursos de la plataforma
* **Create a course** — Crear un curso nuevo
* **Course categories** — Organizar los cursos en categorías para el catálogo

Consulte el capítulo [Cursos](../courses/README.md) para más detalles.

### Sessions

* **Session list** — Ver y gestionar las sesiones de formación
* **Create a session** — Configurar una sesión nueva con cursos e inscripción
* **Session categories** — Organizar las sesiones en categorías
* **Careers and promotions** — Gestionar itinerarios profesionales y flujos de promoción

Consulte el capítulo [Sesiones](../sessions/README.md) para más detalles.

### Platform

* **Configuration settings**, **Languages**, **Portal news**, **Global agenda**, **Pages**, **Extra fields**, **Mail templates**, **Contact form categories**, y más — consulte el capítulo [Plataforma](../platform/README.md) para más detalles. El enlace «Configuration settings» es el punto de entrada al capítulo independiente [Configuración de la plataforma](../platform-settings/README.md).

### Analytics

* **Global statistics**, **Reports catalog**, **Learning analytics**, **Quarterly report**, **Teachers time report**, **Corporate report**, **Special exports**, **Tickets** — Estadísticas e informes de la plataforma; consulte el capítulo [Analítica](../analytics/README.md) para más detalles

### Skills

* **Skills wheel**, **Skills import**, **Manage skills**, **Manage skills levels**, **Skills ranking**, **Skills and assessments** — Insignias de competencias vinculadas a los resultados del libro de calificaciones; consulte el capítulo [Competencias](../skills/README.md) para más detalles

### System

* **Clean temporary files**, **System status**, **System update**, **Colors**, **File info**, **Resources by type**, **List icons** — Mantenimiento del servidor, autoactualización e imagen corporativa; consulte el capítulo [Sistema](../system/README.md) para más detalles

### Rooms

* **Branches**, **Rooms**, **Room availability finder** — Sedes físicas y aulas de formación reservables; consulte el capítulo [Aulas](../rooms/README.md) para más detalles

### Security

* **Activities audit**, **Login attempts**, **Simple IDS**, **Password strength checker**, **File integrity** — Herramientas de supervisión y auditoría de seguridad; consulte el capítulo [Seguridad](../security/README.md) para más detalles

### Plugins

* Accesos directos a los plugins instalados que declaran una página de menú de administración, además de la gestión general de plugins — consulte el capítulo [Plugins](../plugins/README.md) para más detalles

### Health Check

* Comprobaciones en vivo de superación/fallo (configuración de correo, asignación de URL de administración, permisos de archivos) — consulte la página [Comprobación de estado](../health-check.md) para más detalles

### Other Blocks

* **Chamilo.org**, **Version check**, **Professional support**, **News from Chamilo** — enlaces y paneles de estado que obtienen contenido del proyecto Chamilo; consulte [Otros bloques de administración](../other-admin-blocks/README.md) para más detalles

Cada sección se trata en detalle en el capítulo correspondiente de esta guía.

Los métodos de autenticación como OAuth2, LDAP, CAS y otros proveedores de autenticación externos no se configuran en el panel de administración, sino en `config/authentication.yaml`.