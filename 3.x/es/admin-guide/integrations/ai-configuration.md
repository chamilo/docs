# Configuración de IA

Chamilo 3.0 incluye funciones impulsadas por IA que requieren configuración antes de estar disponibles para profesores y estudiantes.

## Proveedores de IA compatibles

Chamilo admite varios proveedores de IA:

| Provider | Capabilities |
|----------|-------------|
| **DeepSeek** | Text generation |
| **Google Gemini** | Text, image, video generation |
| **Grok** | Text, image, video generation |
| **Mistral** | Text generation |
| **OpenAI** | Text, image, video generation |

Cada proveedor puede configurarse para distintos tipos de tareas de IA:

* **Texto** — Se utiliza para la generación de ejercicios, la generación de itinerarios de aprendizaje, la calificación con IA y el tutor de IA
* **Imagen** — Se utiliza para la generación de imágenes con IA
* **Vídeo** — Se utiliza para la generación de vídeos con IA (cuando está admitido)
* **Documento** — Se utiliza para el análisis de documentos con IA

## Pasos de configuración

### 1. Obtener claves de API

Regístrese en una cuenta con el proveedor de IA elegido y obtenga una clave de API:

* **DeepSeek**: [platform.deepseek.com](https://platform.deepseek.com/)
* **Google Gemini**: Google AI Studio o Google Cloud
* **Grok**: [console.x.ai](https://console.x.ai/)
* **Mistral**: [console.mistral.ai](https://console.mistral.ai/)
* **OpenAI**: [platform.openai.com](https://platform.openai.com/)

### 2. Configurar proveedores en Chamilo

![La página de configuración de asistentes de IA que muestra los ajustes del proveedor con los campos de clave de API, modelo y endpoint](/.gitbook/assets/admin-ai-helpers-config.png)

En la configuración de la plataforma, vaya a la sección **AI Helpers**:

1. **Activar los asistentes de IA** — Active las funciones de IA de forma global
2. **Configurar proveedores de IA** — Añada uno o más proveedores con:
   * **Nombre del proveedor** (deepseek, gemini, grok, mistral, openai)
   * **Clave de API** — Su clave de API para el proveedor
   * **Modelo** — El modelo concreto que se utilizará (p. ej., `gpt-4`, `gemini-pro`, `mistral-large`)
   * **URL de la API** — La URL del endpoint (preconfigurada para los proveedores estándar)

Puede configurar varios proveedores. El primer proveedor de la configuración se convierte en el predeterminado.

### 3. Activar funciones por curso

Las funciones de IA pueden activarse o desactivarse a nivel de curso. Los profesores pueden activar o desactivar:

* **Chatbot del tutor de IA** — El asistente de IA para los estudiantes
* **Calificador de tareas** — Recomendación de calificación generada por IA
* **Generador de ejercicios** — Preguntas de cuestionario generadas por IA
* **Generador de itinerarios de aprendizaje** — Secuencias de aprendizaje generadas por IA
* **Generador de imágenes/vídeos** — Imágenes y vídeos generados por IA en documentos

Esto permite que distintos cursos utilicen configuraciones de IA diferentes según sus necesidades.

## Consideraciones de coste

Las llamadas a la API de IA tienen costes asociados. Tenga en cuenta:

* **Establecer límites de uso** — Supervise y limite el uso de la API de IA para controlar los costes
* **Elegir los modelos con criterio** — Los modelos más pequeños y económicos pueden ser suficientes para muchas tareas educativas
* **Seguimiento del uso** — Chamilo registra las solicitudes de IA para ayudarle a supervisar el consumo

## Consejos

* **Empiece con un proveedor** — Configure y pruebe un proveedor antes de añadir más
* **Pruebe con un curso** — Active primero las funciones de IA en un curso de prueba para comprobar que funcionan como se espera
* **Comunique a los profesores** — Informe a los profesores de qué funciones de IA están disponibles y cómo utilizarlas
* **Supervise la calidad** — Revise periódicamente el contenido generado por IA para asegurarse de que cumple sus estándares educativos