# Tutor de IA

El Tutor de IA es un chatbot integrado en Chamilo con el que los estudiantes pueden interactuar para hacer preguntas relacionadas con el curso. Proporciona respuestas instantáneas y contextuales impulsadas por un modelo de lenguaje de gran escala.

## Cómo Funciona

Cuando el Tutor de IA está habilitado para un curso, los estudiantes ven una interfaz de chat donde pueden:

* **Hacer preguntas** sobre el contenido del curso
* **Obtener explicaciones** de los conceptos tratados en el curso
* **Recibir orientación** sin tener que esperar la respuesta del profesor

El Tutor de IA utiliza el contexto del curso para proporcionar respuestas relevantes. Está diseñado para complementar tu enseñanza, no para reemplazarla.

## Habilitar el Tutor de IA

El Tutor de IA requiere dos niveles de configuración:

1. **Nivel de plataforma** — El administrador debe habilitar los asistentes de IA y configurar al menos un proveedor de IA (consulta [Configuración de IA](../../admin-guide/integrations/ai-configuration.md))
2. **Nivel de curso** — El Tutor de IA debe estar habilitado en la configuración del curso (un simple interruptor de encendido/apagado). El proveedor utilizado para el chat es el configurado por el administrador.

## La Interfaz de Chat

![La interfaz de chat del Tutor de IA mostrando una conversación entre un estudiante y la IA](/.gitbook/assets/ai-tutor-chat.png)

El Tutor de IA aparece como un **panel de chat anclado** dentro del curso. Los estudiantes pueden:

* Escribir mensajes y recibir respuestas generadas por la IA
* Ver el historial de sus conversaciones
* Restablecer la conversación para empezar de nuevo

La interfaz de chat muestra el intercambio entre el estudiante y la IA en un formato de mensajería familiar.

## Comportamiento Importante

* **Solo en el contexto del curso** — El Tutor de IA solo está disponible dentro de un curso, no en la plataforma general
* **Deshabilitado durante exámenes** — El Tutor de IA se desactiva automáticamente cuando un estudiante está realizando un ejercicio, para evitar trampas
* **Conversación por estudiante** — Cada estudiante tiene su propia conversación privada con el Tutor de IA, y el contexto del prompt solo incluye los mensajes más recientes
* **Recurso alternativo de proveedor** — Si el proveedor configurado falla, Chamilo recurre a otro proveedor disponible para que el chat siga funcionando

## Como Profesor

Debes tener en cuenta que:

* El Tutor de IA no siempre dará respuestas perfectas — anima a los estudiantes a verificar la información importante
* Puedes revisar el uso del Tutor de IA a través del seguimiento de la plataforma
* El Tutor de IA es un complemento de tu enseñanza, no un sustituto. Úsalo junto con foros, anuncios y mensajería directa para ofrecer un soporte integral a los estudiantes.

## Consejos

* **Establece expectativas** — Informa a los estudiantes al inicio del curso que hay un Tutor de IA disponible y explica cómo usarlo adecuadamente
* **Fomenta el pensamiento crítico** — Recuerda a los estudiantes que piensen de manera crítica sobre las respuestas generadas por la IA
* **Úsalo para preguntas frecuentes** — El Tutor de IA es especialmente útil para manejar preguntas comunes que de otro modo tendrías que responder repetidamente