# Importación y exportación de cursos

Chamilo permite importar y exportar cursos con fines de copia de seguridad, migración e intercambio de contenidos.

Estas funciones se encuentran dentro del curso, en la herramienta **Mantenimiento**, situada bajo el icono de engranaje en la parte superior de la página de inicio del curso.

## Exportación de un curso

Los profesores pueden exportar sus propios cursos desde la herramienta de mantenimiento del curso. Como administrador, puede exportar cualquier curso:

1. Entre en el curso
2. Acceda a la herramienta **Mantenimiento del curso**
3. Seleccione **Crear una copia de seguridad**
4. Elija qué incluir (contenido, datos de usuario, etc.)
5. Descargue el archivo de exportación

La exportación crea un paquete que contiene los documentos, ejercicios, foros, itinerarios de aprendizaje y la configuración del curso.

## Importación de un curso

Para importar un curso desde un archivo de exportación de Chamilo:

1. Entre en el curso
2. Acceda a la herramienta **Mantenimiento del curso**
3. En la sección **Importar copia de seguridad**, cargue el archivo de exportación
4. Elija qué incluir (contenido, datos de usuario, etc.)
5. Configure las opciones de importación:
   * Si se debe sobrescribir el contenido existente
   * Si se deben incluir los datos de usuario
6. Ejecute la importación

## Copia de un curso

Para copiar el contenido de otro curso en el suyo, primero deben haberse creado un curso de origen y un curso de destino.

1. Entre en el curso de destino
2. Acceda a la herramienta **Mantenimiento del curso**
3. En la sección **Copiar curso**, seleccione el curso de **Origen**
4. Valide las opciones
5. Haga clic en **Continuar** y siga las instrucciones

## Common Cartridge

Chamilo es compatible con el estándar **IMS Common Cartridge 1.3** (IMS CC 1.3) para la interoperabilidad con otros sistemas de gestión del aprendizaje. Puede:

* **Importar** paquetes Common Cartridge (archivos .imscc)
* **Exportar** el contenido del curso en formato Common Cartridge

Esto permite el intercambio de contenidos con otras plataformas compatibles con el estándar Common Cartridge (Moodle, Canvas, Blackboard, etc.).

## Reciclaje de un curso

La función de reciclaje del curso simplemente le permite conservar la estructura del curso, pero borrar su contenido.

## Eliminación de un curso

Esto borrará por completo su curso, incluidos todos sus contenidos y la actividad de los usuarios en él.

Para eliminar un curso de forma permanente:

1. Entre en el curso de destino
2. Acceda a la herramienta **Mantenimiento del curso**
3. En la sección **Eliminar completamente este curso**, introduzca manualmente el código del curso para confirmar su intención
4. Valide

A continuación, se le redirige a la página de inicio del portal, porque el curso ya no existe.

## Importación desde Moodle

Chamilo puede importar copias de seguridad de cursos de **Moodle**. El importador convierte la estructura de contenidos de Moodle al formato de Chamilo, incluidos cuestionarios, documentos y la configuración del curso.

> **Trabajo en curso.** Aunque ya cubre una base amplia, el importador de Moodle no cubre actualmente todos los tipos de actividad ni todos los formatos de contenido de Moodle. Considérelo un punto de partida que aún puede requerir ajustes manuales una vez finalizada la importación. Si detecta algún elemento fallido o ausente en la importación o la exportación, infórmenos a través de nuestro [espacio de GitHub](https://github.com/chamilo/chamilo-lms/issues) haciendo clic en **New issue** en la parte superior y proporcionando tantos detalles como sea posible (incluida la propia copia de seguridad del curso, si no es confidencial).

## Comprobación de las dependencias de copia de seguridad y restauración de cursos (septiembre de 2026)

Las correcciones recientes de la copia de seguridad de cursos de Chamilo y de la importación/exportación MBZ compatible con Moodle mejoran la restauración de los **recursos relacionados**, no solo de la lista de actividades. Al probar un ciclo completo de copia de seguridad, compruebe tanto el contenido importado como los enlaces entre recursos:

1. **Ejercicios:** Abra los cuestionarios restaurados y verifique que las preguntas utilizadas por el cuestionario estén presentes y en el orden esperado. El proceso de exportación ahora tiene en cuenta las dependencias entre el cuestionario y las preguntas, en lugar de asumir que cada pregunta referenciada se seleccionó de forma independiente ([PR #9114](https://github.com/chamilo/chamilo-lms/pull/9114)).
2. **Documentos y vídeos de la lección:** Reproduzca la lección restaurada y abra sus pasos de documento, HTML y vídeo. Las referencias a recursos se contrastan con los recursos importados; una lección puede hacer referencia a un documento que no figuraba en la selección ordinaria de documentos del curso ([PR #9114](https://github.com/chamilo/chamilo-lms/pull/9114)).
3. **Orden del elemento final:** Si la lección original tiene un **elemento final** terminal (por ejemplo, una página de cierre con información del certificado), verifique que permanezca **después de los pasos regulares**. Los archivos procedentes de contenido heredado pueden codificar el paso final con una posición obsoleta; el flujo de exportación/importación normaliza esa posición ([PR #9121](https://github.com/chamilo/chamilo-lms/pull/9121)).
4. **Referencias de foro y libro de calificaciones:** Abra los debates y las publicaciones del foro restaurados y, a continuación, compruebe las entradas de **Evaluaciones (libro de calificaciones)** vinculadas a hilos del foro o a la participación. Los enlaces restaurados deben apuntar al **hilo de destino**, no a un identificador del curso de origen. Esto se mejoró en el importador de foros MBZ ([PR #9143](https://github.com/chamilo/chamilo-lms/pull/9143)).
5. **Prerrequisitos e imágenes:** Compruebe los prerrequisitos de la lección y verifique que los archivos de imagen se muestren como imágenes y no se identifiquen erróneamente como HTML. Las correcciones de importación abordan la reasignación de identificadores y la clasificación de documentos. Una migración independiente repara determinados **cursos de demostración incluidos**; no dé por sentado que repara automáticamente cursos personalizados arbitrarios ([PR #9137](https://github.com/chamilo/chamilo-lms/pull/9137)).

**Verificación recomendada:** Exporte un curso representativo, conserve el archivo original, restáurelo en un **curso de prueba independiente** y compare las preguntas de los ejercicios, la navegación de la lección, el comportamiento de los prerrequisitos, los debates del foro y los recursos vinculados del libro de calificaciones. No sobrescriba un curso de producción para probar la portabilidad. Los identificadores internos de origen y destino pueden diferir legítimamente; juzgue el resultado por el recurso restaurado y por sus enlaces operativos. La importación desde Moodle sigue sin cubrir todos los tipos de actividad, así que compruebe manualmente los elementos no compatibles e informe de un caso reproducible de recurso ausente con un archivo de prueba **anonimizado**.

## Consejos

* **Copias de seguridad periódicas** — Anime al profesorado a exportar sus cursos periódicamente como copia de seguridad
* **Probar las importaciones** — Al importar contenido desde otra plataforma, pruebe primero la importación en un curso de ensayo para verificar que todo se haya transferido correctamente
* **Portabilidad del contenido** — Utilice el formato Common Cartridge cuando necesite compartir contenido con otras plataformas LMS