# Grading Electronic

Grading Electronic <img src="../../.gitbook/assets/icons/mdi-export.svg" alt="Grading Electronic" data-size="line"> exporta los estudiantes que aprobaron su curso, con su puntuación del libro de calificaciones, al archivo que importa un organismo de certificación externo: un archivo de texto de formato fijo o una hoja de cálculo de la lista.

## Apertura del bloque de exportación

Una vez habilitada, la barra de herramientas de la herramienta **Evaluaciones** (libro de calificaciones) de su curso muestra un icono **Exportar**. Haga clic en él para mostrar el bloque **Grading Electronic** en la misma página; haga clic de nuevo para ocultarlo.

El bloque tiene tres campos:

* **Vista previa** — marcada de forma predeterminada. Mientras está marcada, no se guarda nada: el bloque solo muestra lo que contendría la exportación
* **Intervalo de fechas** — las fechas de inicio y de fin del curso. La fecha de inicio figura en la línea de encabezado del archivo de texto; la fecha de fin es la fecha en que cada estudiante aprobó
* **ID del curso** — el identificador del curso en el organismo de certificación. Se rellena previamente con el valor utilizado en la exportación anterior

## Vista previa de la exportación

Con **Vista previa** marcada, el bloque ofrece un único botón **Vista previa**. Enumera a cada estudiante del curso (o de la sesión en la que se encuentra) con su puntuación y un estado **PASS** o **SKIP**, y muestra el contenido del archivo de texto. Solo los estudiantes que cumplen los criterios de aprobación del libro de calificaciones se marcan como **PASS**; los demás quedan fuera de la exportación.

## Generación del archivo

Desmarque **Vista previa** para sustituir el botón **Vista previa** por dos botones:

* **Generar TXT** — descarga el archivo de texto de formato fijo: una línea de encabezado con el ID del proveedor, el ID del curso y la fecha de inicio, y después una línea por cada estudiante que aprobó
* **Generar XLSX** — descarga la hoja de cálculo de la lista, con una fila por cada estudiante que aprobó y las columnas **FireTRAQ ID**, **First Name**, **Last Name**, **Score**, **Grade**, **Date Earned** y **Comment**

Ambos botones hacen lo mismo además del archivo: guardan el **ID del curso** para la próxima exportación y, si el libro de calificaciones genera certificados, generan el certificado de cada estudiante que aprobó.

## Contenido de la hoja de cálculo

* **FireTRAQ ID** — el ID del estudiante en el organismo de certificación, leído de su campo de perfil `fcdice_or_acadis_student_id`
* **Score** — la puntuación del libro de calificaciones como porcentaje entero (de 0 a 100), sea cual sea el peso total del libro de calificaciones
* **Grade** — siempre **Pass**, ya que solo se exportan los estudiantes que aprobaron. La celda sigue ofreciendo las opciones **Pass**, **Fail** e **Incomplete** si necesita editar el archivo
* **Date Earned** — la fecha de fin del intervalo de fechas
* **Comment** — se deja vacío

## Consejos

* **Compruebe primero los ID de los estudiantes** — Un estudiante sin ID en su perfil se exporta igualmente, con **FireTRAQ ID** vacío. Use la vista previa para localizarlos antes de generar el archivo
* **El ID del proveedor y las horas del curso** proceden de los campos adicionales del curso, establecidos por su administrador cuando se instaló el complemento