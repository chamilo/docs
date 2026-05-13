# Documentos

La herramienta de documentos es el repositorio de archivos de tu curso. Puedes subir archivos, crear documentos en formato HTML, organizar el contenido en carpetas y dar a los estudiantes acceso a todos los materiales que necesiten.

## Acceder a la Herramienta de Documentos

Abre la herramienta **Documentos** <img src="/.gitbook/assets/icons/mdi-bookshelf.svg" alt="Documentos" data-size="line"> desde la página principal del curso. Verás un explorador de archivos que muestra la carpeta raíz de la biblioteca de documentos de tu curso.

![El explorador de archivos de documentos mostrando carpetas y archivos con iconos de acción](/.gitbook/assets/documents-file-browser.png)

## Subir Archivos

1. Haz clic en el botón **Subir** <img src="/.gitbook/assets/icons/mdi-upload.svg" alt="Subir" data-size="line">
2. Selecciona uno o más archivos desde tu computadora (puedes arrastrar y soltar archivos en el área de carga)
3. Los archivos se suben y aparecen en la carpeta actual

Chamilo admite la mayoría de los tipos de archivo comunes: PDF, documentos de oficina (.docx, .odt), presentaciones (.pptx, .odp), hojas de cálculo (.xlsx, .ods), imágenes (PNG, JPG, SVG, GIF), archivos de audio, archivos de video (incluyendo WEBM), archivos HTML y más.

Algunos formatos podrían estar prohibidos por el administrador del portal mediante una configuración de filtrado de lista blanca/negra en la sección de seguridad de la administración.

Para una mejor legibilidad por parte de los estudiantes, recomendamos subir archivos que un navegador pueda visualizar o abrir sin herramientas adicionales. Esto hace que tu curso sea más portátil y, por lo tanto, más accesible para dispositivos móviles y más legible para personas con capacidades especiales.

## Crear Contenido

Además de subir archivos, puedes crear contenido directamente en Chamilo:

### Páginas Web

1. Haz clic en **Nuevo documento**
2. Usa el editor de texto enriquecido para escribir tu contenido con formato, imágenes, tablas y enlaces
3. Ingresa un **título** para la página
4. Guarda

El editor de texto enriquecido (TinyMCE) ofrece funciones similares a un procesador de texto, incluyendo:

* Formato de texto (negrita, cursiva, encabezados, listas)
* Tablas
* Imágenes (subir o enlazar a imágenes existentes)
* Videos y audio incrustados
* Enlaces a otros recursos
* Edición de código fuente HTML para usuarios avanzados

### Generación de medios con IA

Cuando los asistentes de IA están habilitados en la plataforma, puedes pedirle a la IA que genere una **imagen** o un **video corto** para ilustrar un párrafo en el documento que estás editando. Selecciona un párrafo, abre el diálogo **Generar medios con IA** y la IA producirá un elemento multimedia que puedes revisar e insertar. El diálogo respeta los permisos a nivel de curso y solo aparece en cursos donde la generación de medios con IA está permitida.

### Grabación de Audio

Si tu navegador lo permite, puedes grabar audio directamente dentro de la herramienta de documentos, lo cual es útil para crear instrucciones de audio o contenido para el aprendizaje de idiomas. Esto requiere una configuración HTTPS para Chamilo, ya que la grabación de audio utiliza tecnología que el navegador solo permite si la conexión es segura.

## Organizar con Carpetas

Mantén tu biblioteca de documentos organizada usando carpetas:

1. Haz clic en **Nueva carpeta** <img src="/.gitbook/assets/icons/mdi-folder-plus.svg" alt="Nueva carpeta" data-size="line">
2. Ingresa un nombre para la carpeta
3. Guarda

Puedes crear carpetas anidadas para construir una jerarquía de contenido lógica (por ejemplo, `Módulo 1 > Semana 1 > Lecturas`).

### Mover Archivos

* Localiza tu archivo en la lista
* Haz clic en **Mover** <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Mover" data-size="line">
* Selecciona la carpeta de destino
* Confirma

## Gestionar Documentos

Para cada archivo o carpeta, puedes:

| Acción | Icono | Descripción |
|--------|-------|-------------|
| **Editar** | <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="Editar" data-size="line"> | Renombrar el archivo o editar su contenido (para páginas web) |
| **Eliminar** | <img src="/.gitbook/assets/icons/mdi-delete.svg" alt="Eliminar" data-size="line"> | Eliminar el archivo o carpeta |
| **Descargar** | <img src="/.gitbook/assets/icons/mdi-download-box.svg" alt="Descargar" data-size="line"> | Descargar el archivo a tu computadora |
| **Visibilidad** | <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="Visibilidad" data-size="line"> | Ocultar o mostrar el archivo a los estudiantes |
| **Reemplazar** | <img src="/.gitbook/assets/icons/mdi-file-replace.svg" alt="Reemplazar" data-size="line"> | Reemplazar el archivo con una versión actualizada |
| **Mover** | <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Mover" data-size="line"> | Mover a una carpeta diferente |

Reemplazar un archivo es una función importante cuando usas documentos para construir rutas de aprendizaje, ya que reemplazar el documento permitirá que se actualice sin que los estudiantes pierdan el progreso guardado para ese documento.

### Acciones en Masa

Selecciona varios archivos usando casillas de verificación, luego usa la barra de herramientas para eliminar o descargar todos los elementos seleccionados a la vez.

---
## Integración con OnlyOffice

Si su administrador ha configurado el complemento de **OnlyOffice**, puede editar archivos de Word, Excel y PowerPoint (o LibreOffice) directamente en el navegador sin necesidad de descargarlos. Busque la opción **Editar con OnlyOffice** <img src="/.gitbook/assets/icons/mdi-file-document-edit-outline.svg" alt="OnlyOffice" data-size="line"> al visualizar un archivo compatible.

Los documentos se almacenan en Chamilo; OnlyOffice solo se utiliza para **visualizar** o editar los documentos en el navegador, sin necesidad de herramientas adicionales.

## Archivos en la nube

Si utiliza almacenamiento en la nube (Azure Blob, AWS S3 o Google Cloud) para sus archivos, estos se guardan en la nube, pero puede vincularlos desde aquí. Esto es transparente para usted y sus estudiantes: la herramienta de documentos funciona de la misma manera independientemente del backend de almacenamiento.

## Consejos

* **Organice desde el principio** — Cree la estructura de carpetas antes de cargar contenido para evitar tener que reorganizar más adelante. Si ha creado otros cursos con la estructura adecuada, puede usarlos como plantilla más tarde.
* **Use nombres de archivo descriptivos** — Ayude a los estudiantes a encontrar lo que necesitan con nombres claros y significativos.
* **Oculte el trabajo en progreso** — Utilice el interruptor de visibilidad para ocultar documentos que aún está preparando.
* **Vincule desde rutas de aprendizaje** — Referencie documentos dentro de sus rutas de aprendizaje para crear secuencias de aprendizaje guiadas.
* **Verifique la cuota de disco** — Si su curso tiene un límite de almacenamiento, elimine archivos obsoletos para liberar espacio.