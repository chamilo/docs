# Sistema de ajustes

La configuración de Chamilo se gestiona mediante un conjunto de esquemas de ajustes (alrededor de 40, que varían entre versiones) que definen cada aspecto configurable de la plataforma. Se encuentran en `src/CoreBundle/Settings/` — la lista exacta de ese directorio es la fuente de verdad.

## Cómo funciona

Los ajustes se:

1. **Definen** en clases de esquema (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **Almacenan** en la base de datos (tabla `settings_current`)
3. **Consultan** a través del servicio `SettingsManager`
4. **Gestionan** mediante la interfaz web de administración

## Esquemas de ajustes

Cada archivo de esquema define una categoría de ajustes. Esquemas principales:

| Schema | Purpose |
|--------|---------|
| `PlatformSettingsSchema` | Información de la institución, zona horaria, tipo de servidor, funcionalidades del portal |
| `SecuritySettingsSchema` | Intentos de inicio de sesión, CAPTCHA, política de contraseñas, cabeceras HTTP, 2FA |
| `RegistrationSettingsSchema` | Autorregistro, campos obligatorios, suscripción automática |
| `CourseSettingsSchema` | Valores por defecto de creación de cursos, herramientas, catálogo |
| `SessionSettingsSchema` | Valores por defecto de sesiones, visibilidad |
| `MailSettingsSchema` | Configuración de correo electrónico, DKIM, notificaciones |
| `AiHelpersSettingsSchema` | Proveedores de IA, interruptores de funcionalidad por herramienta de IA |
| `ExerciseSettingsSchema` | Puntuación de cuestionarios, retroalimentación, opciones de preguntas |
| `LearningPathSettingsSchema` | Visualización de LP, prerrequisitos, ajustes de SCORM |
| `DocumentSettingsSchema` | Límites de subida, tipos de archivo permitidos, almacenamiento |
| `DisplaySettingsSchema` | Pestañas de la IU, elementos de la barra lateral, tema |
| `LanguageSettingsSchema` | Idiomas disponibles, locale por defecto |
| `AdminSettingsSchema` | Correo del administrador, opciones específicas de administración |

## Acceso a los ajustes

En código PHP:

```php
// Via SettingsManager service
$value = $settingsManager->getSetting('platform.site_name');

// In legacy code
$value = api_get_setting('platform.site_name');
```

En plantillas:

```twig
{# Read a single setting #}
{{ chamilo_settings_get('platform.site_name') }}

{# Check whether a setting exists #}
{% if chamilo_settings_has('platform.allow_registration') %}
    ...
{% endif %}

{# Get all settings as an array #}
{% set settings = chamilo_settings_all() %}
```

## Estructura de un ajuste

Cada ajuste tiene:

* **Namespace** — La categoría del esquema (p. ej., `platform`, `security`, `ai_helpers`)
* **Variable** — El nombre del ajuste (p. ej., `site_name`, `allow_registration`)
* **Value** — El valor actual
* **Type** — Tipo de dato (string, boolean, array, etc.)

## Ajustes a nivel de curso

Algunos ajustes pueden sobrescribirse a nivel de curso. Se definen en `src/CourseBundle/Settings/` e incluyen:

* Ajustes de ejercicios por curso
* Ajustes de tareas por curso
* Interruptores de funcionalidades de IA por curso

## Ajustes multi-URL

En instalaciones multi-URL, algunos ajustes pueden personalizarse por URL de acceso, lo que permite distintas configuraciones de portal a partir de la misma instalación.

Esos ajustes aparecerán varias veces en la tabla `settings`, con distintos valores de `access_url`. Por defecto, todos los ajustes están asociados a `access_url=1`.

## Añadir un nuevo ajuste

1. Añada la definición del ajuste a la clase de esquema correspondiente
2. Proporcione un valor por defecto
3. Ejecute las migraciones de base de datos si es necesario
4. Acceda al ajuste mediante `SettingsManager`