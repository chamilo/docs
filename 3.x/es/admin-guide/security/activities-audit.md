# Auditoría de actividades

El informe de Auditoría de actividades le permite consultar actividades administrativas y de la plataforma importantes, filtradas por tipo de evento. Es el mismo informe subyacente al que antes se accedía desde **Seguimiento > Auditoría de actividad administrativa**; ahora también está vinculado directamente desde el bloque de Seguridad, ya que se trata principalmente de una herramienta de seguridad y rendición de cuentas.

## Acceso a la Auditoría de actividades

Desde el panel de administración, haga clic en **Seguridad > Auditoría de actividades**.

## Qué muestra

![La página de Auditoría de actividades que enumera categorías de tipos de evento como Curso, Sesión, Usuario, Social, Mensaje, Recurso, Wiki y Otros, cada una expandible en tipos de evento individuales](/.gitbook/assets/admin-security-activities-audit.png)

Los eventos se agrupan en categorías:

* **Curso** — Creación, eliminación y cambios de configuración de cursos
* **Sesión** — Creación, eliminación y cambios de inscripción de sesiones y categorías de sesión
* **Usuario** — Creación y eliminación de cuentas, actualizaciones de contraseña, cambios de campos y más
* **Social** — Creación, eliminación y cambios de pertenencia de grupos sociales
* **Mensaje** — Cambios y eliminaciones de datos de mensajes
* **Recurso** — Creación y eliminación de recursos y enlaces a recursos
* **Wiki** — Visualizaciones de páginas wiki
* **Otros** — Todo lo demás, incluida la actividad de plugins, el bloqueo del libro de calificaciones, las eliminaciones de intentos de ejercicios, los intentos de inicio de sesión forzado y los cambios de configuración a nivel de plataforma

Haga clic en un chip de tipo de evento (por ejemplo **Intento de inicio de sesión forzado**) para filtrar el informe hasta una tabla de entradas coincidentes. También puede buscar directamente por palabra clave mediante el campo **Buscar** situado encima de la lista de tipos de evento.

## Casos de uso

* Investigar quién eliminó un curso, una sesión o una cuenta de usuario, y cuándo
* Confirmar si un cambio administrativo concreto (una actualización de configuración, una instalación de plugin) lo realizó un administrador esperado
* Dar seguimiento a los eventos **Intento de inicio de sesión forzado** junto con el informe [Intentos de inicio de sesión](login-attempts.md)