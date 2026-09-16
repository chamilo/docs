# Importación y Exportación de Cursos

Chamilo permite importar y exportar cursos con fines de respaldo, migración y compartición de contenido.

Estas funcionalidades se encuentran dentro del curso, en la herramienta de **Mantenimiento** ubicada bajo el ícono de engranaje en la parte superior de la página principal del curso.

## Exportar un Curso

Los profesores pueden exportar sus propios cursos desde la herramienta de Mantenimiento del curso. Como administrador, puedes exportar cualquier curso:

1. Ingresa al curso
2. Accede a la herramienta de **Mantenimiento del curso**
3. Selecciona **Crear una copia de seguridad**
4. Elige qué incluir (contenido, datos de usuarios, etc.)
5. Descarga el archivo de exportación

La exportación crea un paquete que contiene los documentos, ejercicios, foros, rutas de aprendizaje y configuraciones del curso.

## Importar un Curso

Para importar un curso desde un archivo de exportación de Chamilo:

1. Ingresa al curso
2. Accede a la herramienta de **Mantenimiento del curso**
3. En la sección de **Importar copia de seguridad**, sube el archivo de exportación
4. Elige qué incluir (contenido, datos de usuarios, etc.)
5. Configura las opciones de importación:
   * Si deseas sobrescribir el contenido existente
   * Si deseas incluir datos de usuarios
6. Ejecuta la importación

## Copiar un Curso

Para copiar el contenido de otro curso a tu curso, necesitarás tener creado previamente un curso de origen y un curso de destino.

1. Ingresa al curso de destino
2. Accede a la herramienta de **Mantenimiento del curso**
3. En la sección de **Copiar curso**, selecciona el curso de **Origen**
4. Valida las opciones
5. Haz clic en **Continuar** y sigue las instrucciones

## Common Cartridge

Chamilo soporta el estándar **IMS Common Cartridge 1.3** (IMS CC 1.3) para la interoperabilidad con otros sistemas de gestión de aprendizaje. Puedes:

* **Importar** paquetes Common Cartridge (archivos .imscc)
* **Exportar** contenido del curso en formato Common Cartridge

Esto permite el intercambio de contenido con otras plataformas que soportan el estándar Common Cartridge (Moodle, Canvas, Blackboard, etc.).

## Reciclar un Curso

La función de reciclaje de cursos simplemente te permite conservar la estructura del curso, pero borrar su contenido.

## Eliminar un Curso

Esto eliminará completamente tu curso, incluyendo todo su contenido y la actividad de los usuarios en él.

Para eliminar un curso de forma permanente:

1. Ingresa al curso de destino
2. Accede a la herramienta de **Mantenimiento del curso**
3. En la sección de **Eliminar completamente este curso**, ingresa el código del curso manualmente para confirmar tu intención
4. Valida

Luego serás redirigido a la página principal del portal, ya que el curso ya no existe.

## Importación desde Moodle

Chamilo puede importar copias de seguridad de cursos desde **Moodle**. El importador convierte la estructura de contenido de Moodle al formato de Chamilo, incluyendo cuestionarios, documentos y configuraciones del curso.

> **Trabajo en progreso.** Aunque ya cubre una amplia base, el importador de Moodle no abarca actualmente todos los tipos de actividades y formatos de contenido de Moodle. Trátalo como un punto de partida que aún puede requerir ajustes manuales después de completar la importación. Si detectas algún elemento fallido o faltante en la importación o exportación, por favor repórtalo a través de nuestro [espacio en Github](https://github.com/chamilo/chamilo-lms/issues) haciendo clic en **New issue** en la parte superior y proporcionando tantos detalles como sea posible (incluyendo la copia de seguridad del curso si no es confidencial).

## Consejos

* **Copias de seguridad regulares** — Anima a los profesores a exportar sus cursos periódicamente como respaldo
* **Pruebas de importación** — Al importar contenido desde otra plataforma, prueba la importación en un curso de prueba primero para verificar que todo se transfirió correctamente
* **Portabilidad de contenido** — Usa el formato Common Cartridge cuando necesites compartir contenido con otras plataformas LMS