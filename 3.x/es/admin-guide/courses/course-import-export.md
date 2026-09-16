# Importación y exportación de cursos

Chamilo admite la importación y exportación de cursos con fines de copia de seguridad, migración e intercambio de contenidos.

Estas funciones se encuentran dentro del curso, en la herramienta **Mantenimiento** situada bajo el icono de engranaje en la parte superior de la página de inicio del curso.

## Exportar un curso

Los profesores pueden exportar sus propios cursos desde la herramienta de mantenimiento del curso. Como administrador, puede exportar cualquier curso:

1. Entre en el curso
2. Acceda a la herramienta **Mantenimiento del curso**
3. Seleccione **Crear una copia de seguridad**
4. Elija qué incluir (contenido, datos de usuarios, etc.)
5. Descargue el archivo de exportación

La exportación crea un paquete que contiene los documentos, ejercicios, foros, itinerarios de aprendizaje y la configuración del curso.

## Importar un curso

Para importar un curso desde un archivo de exportación de Chamilo:

1. Entre en el curso
2. Acceda a la herramienta **Mantenimiento del curso**
3. En la sección **Importar copia de seguridad**, cargue el archivo de exportación
4. Elija qué incluir (contenido, datos de usuarios, etc.)
5. Configure las opciones de importación:
   * Si se debe sobrescribir el contenido existente
   * Si se deben incluir los datos de usuarios
6. Ejecute la importación

## Copiar un curso

Para copiar el contenido de otro curso en el suyo, primero debe existir un curso de origen y un curso de destino.

1. Entre en el curso de destino
2. Acceda a la herramienta **Mantenimiento del curso**
3. En la sección **Copiar curso**, seleccione el curso de **Origen**
4. Valide las opciones
5. Haga clic en **Continuar** y siga las instrucciones

## Common Cartridge

Chamilo admite el estándar **IMS Common Cartridge 1.3** (IMS CC 1.3) para la interoperabilidad con otros sistemas de gestión del aprendizaje. Puede:

* **Importar** paquetes Common Cartridge (archivos .imscc)
* **Exportar** el contenido del curso en formato Common Cartridge

Esto permite el intercambio de contenidos con otras plataformas que admiten el estándar Common Cartridge (Moodle, Canvas, Blackboard, etc.).

## Reciclar un curso

La función de reciclaje de un curso permite simplemente conservar la estructura del curso, pero borrar su contenido.

## Eliminar un curso

Esto borrará por completo su curso, incluidos todos sus contenidos y la actividad de los usuarios en él.

Para eliminar un curso de forma permanente:

1. Entre en el curso de destino
2. Acceda a la herramienta **Mantenimiento del curso**
3. En la sección **Eliminar completamente este curso**, introduzca el código del curso de forma manual para confirmar su intención
4. Valide

A continuación, se le redirige a la página de inicio del portal, porque el curso ya no existe.

## Importación desde Moodle

Chamilo puede importar copias de seguridad de cursos de **Moodle**. El importador convierte la estructura de contenidos de Moodle al formato de Chamilo, incluidos cuestionarios, documentos y ajustes del curso.

> **Trabajo en curso.** Aunque ya cubre una base amplia, el importador de Moodle no cubre actualmente todos los tipos de actividad ni todos los formatos de contenido de Moodle. Trátelo como un punto de partida que aún puede requerir ajustes manuales una vez finalizada la importación. Si detecta algún elemento fallido o ausente en la importación o la exportación, infórmenos a través de nuestro [espacio de Github](https://github.com/chamilo/chamilo-lms/issues) haciendo clic en **New issue** en la parte superior y aportando el mayor número de detalles posible (incluido el propio archivo de copia de seguridad del curso si no es confidencial).

## Consejos

* **Copias de seguridad periódicas** — Anime a los profesores a exportar sus cursos periódicamente como copia de seguridad
* **Probar las importaciones** — Al importar contenido desde otra plataforma, pruebe primero la importación en un curso de prueba para verificar que todo se ha transferido correctamente
* **Portabilidad del contenido** — Utilice el formato Common Cartridge cuando necesite compartir contenido con otras plataformas LMS