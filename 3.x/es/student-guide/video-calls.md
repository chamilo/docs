# Videollamadas individuales

Chamilo incluye de forma opcional las **videollamadas individuales** dentro del **chat flotante de la plataforma**. Utiliza la compatibilidad WebRTC de su navegador para conectar a dos personas que estén usando Chamilo. Esto es distinto de la **herramienta de chat del curso** y de las reuniones creadas con BigBlueButton o Zoom.

Esta función se introdujo y se mejoró para el [issue #3777](https://github.com/chamilo/chamilo-lms/issues/3777) en los PR [#9102](https://github.com/chamilo/chamilo-lms/pull/9102), [#9110](https://github.com/chamilo/chamilo-lms/pull/9110), [#9112](https://github.com/chamilo/chamilo-lms/pull/9112), [#9127](https://github.com/chamilo/chamilo-lms/pull/9127) y [#9128](https://github.com/chamilo/chamilo-lms/pull/9128).

## Antes de empezar

* El administrador debe permitir el uso del chat flotante de la plataforma y establecer **Ocultar la opción de videochat en el chat global** (`chat.hide_chat_video`) en **No**. Está oculta de forma predeterminada. Consulte [Configuración del chat](../admin-guide/platform-settings/chat-settings.md).
* Utilice un navegador compatible con WebRTC, con permiso para acceder a la cámara y al micrófono. El acceso a los medios del navegador suele requerir HTTPS (o un contexto de desarrollo local de confianza).
* Inicie sesión y establezca su estado de chat en **en línea**. Elija un contacto de usuario ordinario; el botón de vídeo no aparece para un bot ni cuando la función está desactivada.
* El otro usuario debe estar disponible para recibir y aceptar la llamada.

## Iniciar una llamada

1. Abra el **panel de chat flotante** en la parte inferior de Chamilo (no la página de chat propia del curso).
2. Seleccione a la persona con la que desea contactar.
3. En el encabezado de la conversación, haga clic en el icono de cámara **Iniciar videollamada**.
4. Conceda acceso a la cámara y al micrófono cuando se lo solicite el navegador.
5. La llamada muestra **Llamando...** mientras Chamilo espera al otro usuario. Cuando acepta, el estado pasa por **Conectando...** hasta **Conectado** una vez que la conexión entre pares se establece correctamente.

Una llamada sin respuesta se agota por tiempo de espera en lugar de continuar indefinidamente. Si el otro usuario rechaza o cancela, el chat muestra un mensaje de estado explicativo.

## Recibir y gestionar una llamada

Cuando un contacto llama, el chat flotante muestra un cuadro de diálogo de **Videollamada entrante**. Elija **Aceptar** para unirse o **Rechazar** para declinar. Al aceptar, también puede solicitarse permiso para usar la cámara y el micrófono.

Durante una llamada puede **silenciar o activar el micrófono**, **encender o apagar la cámara** y **colgar**. Una vista previa pequeña muestra su vídeo local, mientras que el área principal muestra a la otra persona. Al cerrar o finalizar la llamada se liberan los flujos locales de audio y vídeo.

Se trata de una **llamada privada entre dos usuarios**, no de una reunión de todo el curso. Para celebrar una sesión de grupo programada con grabación o herramientas de colaboración, utilice la integración de [Videoconferencia](../teacher-guide/collaboration-and-communication/video-conferencing.md) de su organización.

## Si la videollamada no está disponible

* **No aparece el icono Iniciar videollamada:** Compruebe la configuración `chat.hide_chat_video` de la plataforma, si el chat flotante está disponible, su estado en línea y la compatibilidad WebRTC del navegador.
* **Error de cámara o micrófono:** Permita los permisos de medios en el navegador y compruebe que el hardware está presente y no lo está utilizando otra aplicación.
* **Sin respuesta:** Pida a su contacto que abra Chamilo y compruebe su disponibilidad. La solicitud saliente tiene un tiempo de espera.
* **La conexión falla tras la aceptación:** Pruebe otra red y compruebe los permisos del navegador o las restricciones del cortafuegos. La implementación actual de WebRTC utiliza un servidor STUN público y no configura un relé TURN, por lo que la conectividad puede fallar en redes restrictivas. El chat de texto puede seguir funcionando si falla la señalización de vídeo.

No es necesario configurar BigBlueButton ni Zoom para esta función de llamada directa; esas integraciones ofrecen un tipo de reunión distinto.