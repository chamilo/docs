# OnlyOffice

La integración de **OnlyOffice** permite a los usuarios editar documentos (Word, Excel, PowerPoint) directamente en el navegador dentro de Chamilo, sin descargarlos.

## Qué ofrece OnlyOffice

* **Edición de documentos** — Editar archivos .docx, .xlsx y .pptx en el navegador
* **Compatibilidad de formatos** — Compatibilidad total con los formatos de Microsoft Office
* **Sin software de escritorio** — Todo se ejecuta en el navegador

> La edición colaborativa en tiempo real depende del propio OnlyOffice Document Server; el complemento de Chamilo abre y guarda los documentos a través del servidor, pero no añade ni restringe esa capacidad.

## Configuración

1. Instale **OnlyOffice Document Server** en su servidor (o utilice el servicio en la nube de OnlyOffice)
2. En la configuración de la plataforma Chamilo, configure:
   * **URL de OnlyOffice Document Server** — La dirección de su servidor OnlyOffice
   * **Clave secreta** — Para la comunicación segura entre Chamilo y OnlyOffice
3. Active la integración

## Cómo funciona

Una vez configurado, los usuarios ven la opción **Editar con OnlyOffice** al visualizar tipos de documento compatibles en la herramienta Documentos. Al hacer clic, el documento se abre en el editor de OnlyOffice dentro de la interfaz de Chamilo.

Los cambios se guardan automáticamente en el almacenamiento de documentos de Chamilo.

## Actualización de versiones del documento y guardados

Cuando el servidor de documentos indica que hay disponible una versión guardada más reciente, el editor de Chamilo puede solicitar una **configuración de documento firmada** actualizada y utilizar la capacidad de actualización de archivos de OnlyOffice sin que el usuario tenga que abrir otro documento. Chamilo comprueba que la configuración actualizada corresponde al mismo documento antes de cambiar el editor a su nueva versión.

Un **guardado forzado** mientras la edición sigue en curso no avanza la clave de versión del documento. La devolución de llamada del guardado final actualiza los metadatos del documento guardado, de modo que la siguiente apertura puede utilizar la versión completada. Esta distinción evita tratar un guardado en curso como una versión de documento independiente.

Si una actualización falla, compruebe que OnlyOffice Document Server puede alcanzar las URL de archivo y de devolución de llamada de Chamilo, y revise los registros del editor y del servidor. Vuelva a abrir el documento solo después de confirmar que el trabajo se guardó; una sesión del editor interrumpida o desactualizada no demuestra que la versión final haya llegado a Chamilo.

Este comportamiento se corrigió en [PR #9178](https://github.com/chamilo/chamilo-lms/pull/9178).

## Consejos

* **Se recomienda un servidor independiente** — Al igual que BigBlueButton, OnlyOffice Document Server debe ejecutarse en su propio servidor para obtener el mejor rendimiento
* **Se requiere HTTPS** — Tanto Chamilo como OnlyOffice deben servirse a través de HTTPS para que la integración funcione
* **Compruebe los formatos** — OnlyOffice funciona mejor con los formatos de Office (.docx, .xlsx, .pptx). Otros formatos pueden tener un soporte de edición limitado.