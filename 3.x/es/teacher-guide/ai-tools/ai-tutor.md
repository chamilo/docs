# Tutor de IA

El Tutor de IA es un chatbot integrado en Chamilo con el que los estudiantes pueden interactuar para obtener respuestas instantáneas generadas por IA. Funciona en dos contextos, con un enfoque distinto en cada uno:

* **Dentro de un curso** — el Tutor de IA se centra en ese curso: responde preguntas sobre su contenido, explica los conceptos que cubre y guía a los estudiantes a través del material.
* **Fuera de un curso** (en la plataforma general) — el Tutor de IA atiende en cambio preguntas genéricas sobre el uso de la plataforma, como cómo encontrar algo o usar una función, en lugar del contenido del curso.

## Cómo funciona

Cuando el Tutor de IA está habilitado para un curso, los estudiantes ven una interfaz de chat en la que pueden:

* **Hacer preguntas** sobre el contenido del curso
* **Obtener explicaciones** de los conceptos cubiertos en el curso
* **Recibir orientación** sin esperar a que el profesor responda

Dentro de un curso, el Tutor de IA utiliza el contexto de ese curso para ofrecer respuestas pertinentes. Está pensado para complementar su docencia, no para sustituirla.

## Habilitar el Tutor de IA

El Tutor de IA requiere dos niveles de configuración:

1. **Nivel de plataforma** — El administrador debe habilitar los asistentes de IA y configurar al menos un proveedor de IA (véase [Configuración de IA](../../admin-guide/integrations/ai-configuration.md))
2. **Nivel de curso** — El Tutor de IA debe habilitarse en la configuración del curso (un simple interruptor de activación/desactivación). El proveedor utilizado para el chat es el configurado por el administrador.

## La interfaz de chat

![La interfaz de chat del Tutor de IA mostrando una conversación entre un estudiante y la IA](../../.gitbook/assets/ai-tutor-chat.png)

El Tutor de IA aparece como un **panel de chat acoplado** dentro del curso. Los estudiantes pueden:

* Escribir mensajes y recibir respuestas generadas por IA
* Ver el historial de su conversación
* Restablecer la conversación para empezar de nuevo

La interfaz de chat muestra el intercambio entre el estudiante y la IA en un formato de mensajería familiar.

## Comportamiento importante

* **Acotado al lugar donde se abre** — Dentro de un curso, el Tutor de IA solo responde sobre ese curso; si se abre desde fuera de cualquier curso, pasa a preguntas generales sobre el uso de la plataforma. El modo de toda la plataforma (fuera del curso) es un interruptor independiente que controla su administrador, distinto del de cada curso.
* **Deshabilitado durante los exámenes** — El Tutor de IA se deshabilita automáticamente cuando un estudiante está realizando un ejercicio, para evitar trampas
* **Conversación por estudiante** — Cada estudiante tiene su propia conversación privada con el Tutor de IA, y el contexto de la indicación (prompt) solo incluye los mensajes más recientes
* **Conmutación por error del proveedor** — Si el proveedor configurado falla, Chamilo pasa a otro proveedor disponible para que el chat siga funcionando

## Como profesor

Debe tener en cuenta que:

* El Tutor de IA no siempre da respuestas perfectas: anime a los estudiantes a verificar la información importante
* Puede revisar el uso del Tutor de IA a través del seguimiento de la plataforma
* El Tutor de IA es un complemento de su docencia, no un sustituto. Úselo junto con foros, anuncios y mensajería directa para un apoyo integral al estudiante.

## Consejos

* **Establezca expectativas** — Informe a los estudiantes al inicio del curso de que hay un Tutor de IA disponible y explique cómo usarlo de forma adecuada
* **Fomente el pensamiento crítico** — Recuerde a los estudiantes que piensen de forma crítica sobre las respuestas generadas por IA
* **Úselo para preguntas frecuentes** — El Tutor de IA es especialmente útil para atender preguntas habituales que de otro modo tendría que responder repetidamente