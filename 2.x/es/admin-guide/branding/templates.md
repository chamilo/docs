# Plantillas

Chamilo utiliza plantillas para certificados, documentos y correos electrónicos. Puedes personalizar estas plantillas para que se ajusten a la imagen de marca y los requisitos de tu organización.

## Plantillas de Certificados

Las plantillas de certificados definen el diseño y el contenido de los certificados otorgados a los estudiantes que cumplen con los umbrales de calificación en el libro de calificaciones.

### Personalización de una Plantilla de Certificado

Las plantillas de certificados utilizan HTML y CSS con variables de marcador de posición:

| Variable | Reemplazado por |
|----------|-----------------|
| Nombre del estudiante | El nombre completo del estudiante |
| Nombre del curso | El nombre del curso |
| Fecha | La fecha en que se obtuvo el certificado |
| Puntuación | La puntuación final del estudiante |
| Código de barras | Un marcador de posición para código de barras (`((certificate_barcode))`) utilizado para verificación |

### Carga de una Plantilla

1. Navega a la gestión de plantillas de certificados
2. Carga o edita la plantilla HTML
3. Utiliza las variables de marcador de posición donde debe aparecer el contenido dinámico
4. Guarda

## Plantillas de Documentos

Los profesores pueden usar plantillas de documentos al crear contenido en la herramienta de Documentos. Las plantillas proporcionan un diseño inicial para tipos de documentos comunes.

### Gestión de Plantillas de Documentos

1. Navega a la gestión de plantillas en el panel de administración
2. Añade nuevas plantillas subiendo archivos HTML
3. Las plantillas estarán disponibles para los profesores cuando creen nuevos documentos

## Consejos

* **Incluye tu logotipo** — Añade el logotipo de tu organización a las plantillas de certificados para un aspecto profesional
* **Prueba con datos reales** — Previsualiza los certificados con datos reales de los estudiantes antes de implementar la plantilla
* **Mantén las plantillas simples** — Los diseños simples se imprimen mejor y lucen profesionales