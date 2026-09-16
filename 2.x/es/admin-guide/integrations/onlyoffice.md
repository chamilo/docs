# OnlyOffice

La integración de **OnlyOffice** permite a los usuarios editar documentos (Word, Excel, PowerPoint) directamente en el navegador dentro de Chamilo, sin necesidad de descargarlos.

## Qué ofrece OnlyOffice

* **Edición de documentos** — Edita archivos .docx, .xlsx, .pptx en el navegador
* **Compatibilidad de formatos** — Compatibilidad total con los formatos de Microsoft Office
* **Sin necesidad de software de escritorio** — Todo funciona en el navegador

> La edición colaborativa en tiempo real depende del propio OnlyOffice Document Server; el plugin de Chamilo abre y guarda documentos a través del servidor, pero no añade ni restringe esa capacidad.

## Configuración

1. Instala **OnlyOffice Document Server** en tu servidor (o utiliza el servicio en la nube de OnlyOffice)
2. En los ajustes de la plataforma Chamilo, configura:
   * **URL del OnlyOffice Document Server** — La dirección de tu servidor OnlyOffice
   * **Clave secreta** — Para una comunicación segura entre Chamilo y OnlyOffice
3. Habilita la integración

## Cómo funciona

Una vez configurado, los usuarios verán una opción de **Editar con OnlyOffice** al visualizar tipos de documentos compatibles en la herramienta de Documentos. Al hacer clic, el documento se abrirá en el editor de OnlyOffice dentro de la interfaz de Chamilo.

Los cambios se guardan automáticamente en el almacenamiento de documentos de Chamilo.

## Consejos

* **Servidor separado recomendado** — Al igual que BigBlueButton, se recomienda que OnlyOffice Document Server se ejecute en su propio servidor para un mejor rendimiento
* **HTTPS requerido** — Tanto Chamilo como OnlyOffice deben servirse a través de HTTPS para que la integración funcione
* **Verifica los formatos** — OnlyOffice funciona mejor con formatos de Office (.docx, .xlsx, .pptx). Otros formatos pueden tener soporte de edición limitado.