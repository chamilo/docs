# OnlyOffice

La integración de **OnlyOffice** permite a los usuarios editar documentos (Word, Excel, PowerPoint) directamente en el navegador dentro de Chamilo, sin descargarlos.

## Qué ofrece OnlyOffice

* **Edición de documentos** — Edite archivos .docx, .xlsx y .pptx en el navegador
* **Compatibilidad de formatos** — Compatibilidad plena con los formatos de Microsoft Office
* **Sin software de escritorio** — Todo se ejecuta en el navegador

> La edición colaborativa en tiempo real depende del propio OnlyOffice Document Server; el complemento de Chamilo abre y guarda documentos a través del servidor, pero no añade ni restringe esa capacidad.

## Configuración

1. Instale **OnlyOffice Document Server** en su servidor (o utilice el servicio en la nube de OnlyOffice)
2. En la configuración de la plataforma Chamilo, configure:
   * **OnlyOffice Document Server URL** — La dirección de su servidor OnlyOffice
   * **Secret key** — Para una comunicación segura entre Chamilo y OnlyOffice
3. Active la integración

## Cómo funciona

Una vez configurado, los usuarios ven la opción **Edit with OnlyOffice** al visualizar tipos de documento compatibles en la herramienta Documents. Al pulsarla, el documento se abre en el editor de OnlyOffice dentro de la interfaz de Chamilo.

Los cambios se guardan automáticamente en el almacenamiento de documentos de Chamilo.

## Consejos

* **Se recomienda un servidor independiente** — Al igual que BigBlueButton, OnlyOffice Document Server debería ejecutarse en su propio servidor para un mejor rendimiento
* **HTTPS obligatorio** — Tanto Chamilo como OnlyOffice deben servirse a través de HTTPS para que la integración funcione
* **Compruebe los formatos** — OnlyOffice funciona mejor con los formatos de Office (.docx, .xlsx, .pptx). Otros formatos pueden tener un soporte de edición limitado.