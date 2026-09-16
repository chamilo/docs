# Sistema de Configuraciones

La configuración de Chamilo se gestiona a través de un conjunto de esquemas de configuración (alrededor de 40, variando entre versiones) que definen cada aspecto configurable de la plataforma. Estos se encuentran en `src/CoreBundle/Settings/` — la lista exacta en ese directorio es la fuente de verdad.

## Cómo Funciona

Las configuraciones son:

1. **Definidas** en clases de esquema (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **Almacenadas** en la base de datos (tabla `settings_current`)
3. **Accedidas** a través del servicio `SettingsManager`
4. **Gestionadas** mediante la interfaz web de administración

## Esquemas de Configuración

Cada archivo de esquema define una categoría de configuraciones. Esquemas clave:

| Esquema | Propósito |
|--------|-----------|
| `PlatformSettingsSchema` | Información de la institución, zona horaria, tipo de servidor, características del portal |
| `SecuritySettingsSchema` | Intentos de inicio de sesión, CAPTCHA, política de contraseñas, encabezados HTTP, 2FA |
| `RegistrationSettingsSchema` | Auto-registro, campos obligatorios, suscripción automática |
| `CourseSettingsSchema` | Valores predeterminados para la creación de cursos, herramientas, catálogo |
| `SessionSettingsSchema` | Valores predeterminados de sesiones, visibilidad |
| `MailSettingsSchema` | Configuración de correo electrónico, DKIM, notificaciones |
| `AiHelpersSettingsSchema` | Proveedores de IA, activación de funciones por herramienta de IA |
| `ExerciseSettingsSchema` | Puntuación de cuestionarios, retroalimentación, opciones de preguntas |
| `LearningPathSettingsSchema` | Visualización de rutas de aprendizaje, prerrequisitos, configuraciones SCORM |
| `DocumentSettingsSchema` | Límites de carga, tipos de archivo permitidos, almacenamiento |
| `DisplaySettingsSchema` | Pestañas de la interfaz de usuario, elementos de la barra lateral, tema |
| `LanguageSettingsSchema` | Idiomas disponibles, idioma predeterminado |
| `AdminSettingsSchema` | Correo electrónico del administrador, opciones específicas para administradores |

## Acceso a las Configuraciones

En código PHP:

```php
// A través del servicio SettingsManager
$value = $settingsManager->getSetting('platform.site_name');

// En código legado
$value = api_get_setting('platform.site_name');
```

En plantillas:

```twig
{# Leer una configuración individual #}
{{ chamilo_settings_get('platform.site_name') }}

{# Verificar si existe una configuración #}
{% if chamilo_settings_has('platform.allow_registration') %}
    ...
{% endif %}

{# Obtener todas las configuraciones como un arreglo #}
{% set settings = chamilo_settings_all() %}
```

## Estructura de las Configuraciones

Cada configuración tiene:

* **Espacio de nombres** — La categoría del esquema (por ejemplo, `platform`, `security`, `ai_helpers`)
* **Variable** — El nombre de la configuración (por ejemplo, `site_name`, `allow_registration`)
* **Valor** — El valor actual
* **Tipo** — Tipo de dato (cadena, booleano, arreglo, etc.)

## Configuraciones a Nivel de Curso

Algunas configuraciones pueden ser sobrescritas a nivel de curso. Estas se definen en `src/CourseBundle/Settings/` e incluyen:

* Configuraciones de ejercicios por curso
* Configuraciones de tareas por curso
* Activación de funciones de IA por curso

## Configuraciones Multi-URL

En configuraciones multi-URL, algunas configuraciones pueden personalizarse por URL de acceso, permitiendo diferentes configuraciones de portal desde la misma instalación.

Estas configuraciones aparecerán varias veces en la tabla `settings`, con diferentes valores de `access_url`. Por defecto, todas las configuraciones están asociadas con `access_url=1`.

## Agregar una Nueva Configuración

1. Añadir la definición de la configuración a la clase de esquema correspondiente
2. Proporcionar un valor predeterminado
3. Ejecutar migraciones de base de datos si es necesario
4. Acceder a la configuración a través de `SettingsManager`