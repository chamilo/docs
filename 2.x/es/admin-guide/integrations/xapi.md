# xAPI

**xAPI** (Experience API, también conocido como Tin Can API) es un estándar para rastrear experiencias de aprendizaje. Chamilo puede tanto generar como consumir declaraciones xAPI.

## Qué hace xAPI

xAPI rastrea actividades de aprendizaje como **declaraciones** en el formato: "Actor realizó Verbo en Objeto". Por ejemplo:

* "Jane completó el Módulo 1"
* "John obtuvo un 85% en el Examen Final"
* "María vio el Video de Introducción"

Estas declaraciones se almacenan en un **Learning Record Store (LRS)**, proporcionando un registro completo de la actividad de aprendizaje.

## Configuración

1. En la configuración de la plataforma, configure el **punto de conexión LRS**:
   * **URL de LRS** — La dirección de su Learning Record Store
   * **Autenticación de LRS** — Credenciales para enviar datos al LRS
2. Habilite el seguimiento xAPI para las actividades deseadas

## Qué rastrea Chamilo a través de xAPI

Chamilo puede generar declaraciones xAPI para:

* Acceso y finalización de cursos
* Intentos y puntajes en ejercicios
* Progreso en elementos de rutas de aprendizaje
* Elementos de portafolio

Otras herramientas (como Documentos y Foros) no se emiten actualmente como eventos xAPI por el complemento.

## Casos de uso

* **Seguimiento multiplataforma** — Rastrear la actividad de aprendizaje a través de múltiples herramientas y plataformas en un solo LRS
* **Análisis avanzado** — Utilizar herramientas de análisis de LRS para generar conocimientos que van más allá de los informes integrados de Chamilo
* **Informes de cumplimiento** — Generar registros de auditoría de finalización de capacitaciones para requisitos regulatorios