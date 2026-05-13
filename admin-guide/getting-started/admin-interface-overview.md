# Descripción General de la Interfaz de Administración

El panel de administración es su centro de control para gestionar la plataforma Chamilo. Acceda a él haciendo clic en **Administración** <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Administración" data-size="line"> en la barra lateral.

## Panel de Administración

![El panel de administración mostrando bloques funcionales para Usuarios, Cursos, Sesiones y Configuraciones](/.gitbook/assets/admin-dashboard-overview.png)

El panel de administración está organizado en bloques funcionales. Cada bloque agrupa herramientas de gestión relacionadas:

### Usuarios

* **Lista de usuarios** — Ver, buscar, editar y gestionar todos los usuarios en la plataforma
* **Agregar un usuario** — Crear cuentas de usuario individuales
* **Grupos de usuarios** — Gestionar grupos de usuarios con fines organizativos
* **Clases** — Gestionar clases de usuarios para la inscripción masiva en sesiones

### Cursos

* **Lista de cursos** — Ver y gestionar todos los cursos en la plataforma
* **Crear un curso** — Crear un nuevo curso
* **Categorías de cursos** — Organizar los cursos en categorías para el catálogo

### Sesiones

* **Lista de sesiones** — Ver y gestionar sesiones de formación
* **Crear una sesión** — Configurar una nueva sesión con cursos e inscripción
* **Categorías de sesiones** — Organizar sesiones en categorías
* **Carreras y promociones** — Gestionar trayectorias profesionales y flujos de promoción

### Configuraciones de la Plataforma

* **Configuraciones** — Acceder al panel de configuraciones completo de la plataforma con categorías para portal, cursos, sesiones, usuarios, seguridad y más

### Complementos

* **Gestionar complementos** — Instalar, activar, configurar y desactivar complementos de la plataforma

### Sistema

* **Estado del sistema** — Verificar la configuración de PHP, el estado de la base de datos y la salud del servidor
* **Limpieza de archivos** — Gestionar archivos temporales y cachés

### Marca

* **Colores** — Personalizar la apariencia visual de la plataforma
* **Personalización del portal** — Configurar la página de inicio del portal, noticias y elementos de marca

Cada sección se detalla en su capítulo correspondiente de esta guía.

Los métodos de autenticación como OAuth2, LDAP, CAS y otros proveedores de autenticación externos no se configuran en el panel de administración, sino en `config/authentication.yaml`.