# xAPI

**xAPI** (Experience API, también conocida como Tin Can API) es un estándar para el seguimiento de experiencias de aprendizaje. Chamilo puede tanto generar como consumir declaraciones xAPI.

## Qué hace xAPI

xAPI registra las actividades de aprendizaje como **declaraciones** en el formato: «Actor realizó Verbo sobre Objeto». Por ejemplo:

* «Jane completed Module 1»
* «John scored 85% on the Final Exam»
* «Maria watched the Introduction Video»

Estas declaraciones se almacenan en un **Learning Record Store (LRS)**, lo que proporciona un registro exhaustivo de la actividad de aprendizaje.

## Configuración

1. En la configuración de la plataforma, configure el **punto de conexión del LRS**:
   * **LRS URL** — La dirección de su Learning Record Store
   * **LRS authentication** — Credenciales para enviar datos al LRS
2. Active el seguimiento xAPI para las actividades deseadas

## Qué registra Chamilo mediante xAPI

Chamilo puede generar declaraciones xAPI para:

* Acceso y finalización de cursos
* Intentos y puntuaciones de ejercicios
* Progreso de elementos de itinerarios de aprendizaje
* Elementos de portafolio

Otras herramientas (como Documents y Forums) no se emiten actualmente como eventos xAPI por el plugin.

## Casos de uso

* **Seguimiento entre plataformas** — Registrar la actividad de aprendizaje en múltiples herramientas y plataformas en un único LRS
* **Analítica avanzada** — Utilizar las herramientas de analítica del LRS para generar información que va más allá de los informes integrados de Chamilo
* **Informes de cumplimiento** — Generar pistas de auditoría de la finalización de la formación para requisitos normativos