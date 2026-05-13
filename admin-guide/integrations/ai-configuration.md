# Configuración de IA

Chamilo 2.0 incluye funciones impulsadas por IA que requieren configuración antes de estar disponibles para profesores y estudiantes.

## Proveedores de IA Soportados

Chamilo soporta múltiples proveedores de IA:

| Proveedor | Capacidades |
|----------|-------------|
| **DeepSeek** | Generación de texto |
| **Google Gemini** | Generación de texto, imagen y video |
| **Grok** | Generación de texto, imagen y video |
| **Mistral** | Generación de texto |
| **OpenAI** | Generación de texto, imagen y video |

Cada proveedor puede configurarse para diferentes tipos de tareas de IA:

* **Texto** — Utilizado para la generación de ejercicios, generación de rutas de aprendizaje, calificación por IA y el tutor de IA
* **Imagen** — Utilizado para la generación de imágenes por IA
* **Video** — Utilizado para la generación de videos por IA (donde esté soportado)
* **Documento** — Utilizado para el análisis de documentos por IA

## Pasos de Configuración

### 1. Obtener Claves API

Regístrese para obtener una cuenta con el proveedor de IA de su elección y obtenga una clave API:

* **DeepSeek**: [platform.deepseek.com](https://platform.deepseek.com/)
* **Google Gemini**: Google AI Studio o Google Cloud
* **Grok**: [console.x.ai](https://console.x.ai/)
* **Mistral**: [console.mistral.ai](https://console.mistral.ai/)
* **OpenAI**: [platform.openai.com](https://platform.openai.com/)

### 2. Configurar Proveedores en Chamilo

![La página de configuración de ayudantes de IA mostrando los ajustes de proveedores con campos para clave API, modelo y endpoint](/.gitbook/assets/admin-ai-helpers-config.png)

En los ajustes de la plataforma, navegue a la sección **Ayudantes de IA**:

1. **Habilitar ayudantes de IA** — Activar las funciones de IA de manera global
2. **Configurar proveedores de IA** — Agregar uno o más proveedores con:
   * **Nombre del proveedor** (deepseek, gemini, grok, mistral, openai)
   * **Clave API** — Su clave API para el proveedor
   * **Modelo** — El modelo específico a usar (por ejemplo, `gpt-4`, `gemini-pro`, `mistral-large`)
   * **URL de API** — La URL del endpoint (preconfigurada para proveedores estándar)

Puede configurar múltiples proveedores. El primer proveedor en la configuración se convierte en el predeterminado.

### 3. Habilitar Funciones por Curso

Las funciones de IA pueden habilitarse o deshabilitarse a nivel de curso. Los profesores pueden activar o desactivar:

* **Chatbot Tutor de IA** — El asistente de IA para los estudiantes
* **Calificador de tareas** — Recomendación de calificación generada por IA
* **Generador de ejercicios** — Preguntas de cuestionarios generadas por IA
* **Generador de rutas de aprendizaje** — Secuencias de aprendizaje generadas por IA
* **Generador de imágenes/videos** — Imágenes y videos generados por IA en documentos

Esto permite que diferentes cursos utilicen configuraciones de IA distintas según sus necesidades.

## Consideraciones de Costo

Las llamadas a la API de IA tienen costos asociados. Considere:

* **Establecer límites de uso** — Monitorear y limitar el uso de la API de IA para controlar los costos
* **Elegir modelos sabiamente** — Modelos más pequeños y menos costosos pueden ser suficientes para muchas tareas educativas
* **Rastrear el uso** — Chamilo registra las solicitudes de IA para ayudarlo a monitorear el consumo

## Consejos

* **Comience con un proveedor** — Configure y pruebe un proveedor antes de agregar más
* **Pruebe con un curso** — Habilite las funciones de IA en un curso de prueba primero para verificar que funcionen como se espera
* **Comuníquese con los profesores** — Informe a los profesores qué funciones de IA están disponibles y cómo usarlas
* **Monitoree la calidad** — Revise regularmente el contenido generado por IA para asegurarse de que cumpla con sus estándares educativos