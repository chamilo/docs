# Gestión de habilidades

Esta página cubre las tres entradas del panel de control utilizadas para construir el catálogo de habilidades de la plataforma: importar habilidades de forma masiva, gestionar las definiciones de las habilidades y asignar cada habilidad a una escala de niveles.

## Importación de habilidades

**Skills > Skills import** permite crear de forma masiva una jerarquía de habilidades a partir de un archivo CSV o XML, en lugar de crear las habilidades una por una. Cada fila necesita, como mínimo, un `id`, un `parent_id` (para construir el árbol) y un `title`. Hay disponible una plantilla de ejemplo para basar en ella su archivo.

## Gestionar habilidades

**Skills > Manage skills** es el catálogo principal de habilidades: crear, editar, habilitar/deshabilitar y eliminar habilidades. Cada habilidad tiene un título, un código corto, una descripción, un icono y una descripción opcional de los criterios (lo que un estudiante debe hacer para obtenerla). Las habilidades pueden anidarse — una habilidad puede tener habilidades hijas —, que es lo que visualiza la [Rueda de habilidades](skills-wheel.md).

### Habilidades adquiribles frente a habilidades estructurales

Al crear o editar una habilidad, utilice **Acquirable** para indicar si los estudiantes pueden obtenerla realmente. Está habilitada de forma predeterminada. Desactívela para una categoría padre u organizativa que exista únicamente para agrupar otras habilidades: dicha habilidad permanece en la jerarquía, pero no puede otorgarse mediante la asignación manual ni mediante los flujos de trabajo de Exercise, Learning Path o Gradebook. Las relaciones de habilidades existentes y su historial se conservan. Este comportamiento se añadió en [PR #9206](https://github.com/chamilo/chamilo-lms/pull/9206) (issue #8179).

## Asignación manual de habilidades

Cuando la asignación manual de habilidades esté disponible para su rol, abra **Assign skill** para el usuario, seleccione la **Skill**, elija un **Level acquired** cuando se utilicen niveles y proporcione la **Argumentation** requerida que explique por qué se otorga la habilidad.

Cuando **Assigning skills to user: sub-skills auto-loading** (`manual_assignment_subskill_autoload`) está habilitado, la lista **Skill** solo muestra las habilidades del primer nivel del árbol. Al seleccionar una, se muestra una segunda lista con sus subhabilidades, luego una tercera, y así sucesivamente. Deténgase en el nivel de la habilidad que desea asignar y deje vacía la lista siguiente; para subir un nivel, borre la lista. Una habilidad que no es **Acquirable** puede seleccionarse para llegar a sus subhabilidades, pero el formulario indica que no puede adquirirse y no permite guardarla.

Para una asignación manual existente que pueda eliminarse, seleccione la habilidad y haga clic en **Remove**; a continuación, confirme la acción. Las asignaciones eliminadas ya no cuentan como habilidades adquiridas. Las asignaciones cuya fuente no permite la eliminación manual no muestran esta acción.

Desde los detalles de los informes de un estudiante, un usuario autorizado puede seguir el **skill badge/link** hasta los detalles de la asignación y, a continuación, utilizar la acción de eliminación existente cuando la habilidad se asignó manualmente. El historial de asignaciones permanece disponible después de la eliminación y la reasignación; eliminar una habilidad no borra su pista de auditoría. Vuelva al informe del estudiante mediante el enlace de navegación disponible.

## Gestionar niveles de habilidades

**Skills > Manage skills levels** es una pantalla independiente y más reducida: enumera las habilidades existentes y permite asignar cada una a un **level profile** — un conjunto ordenado y con nombre de niveles (por ejemplo, Bronze/Silver/Gold) con el que se mide la habilidad. En resumen: utilice **Manage skills** para definir qué *es* una habilidad y **Manage skills levels** para definir la escala con la que se mide.

### Descripciones de niveles y perfiles disponibles

Los niveles individuales de un perfil de niveles disponen ahora de un campo **Description**, editable desde **Manage skills levels**, además del título del nivel y del título corto. Los fixtures de niveles de habilidad incluidos definen escalas de ejemplo con descripciones para **CEFR**, el **modelo de Dreyfus**, la **taxonomía de Bloom** y **SFIA**. En una instalación existente, los perfiles presentes dependen del estado de los fixtures y de la actualización; no dé por sentado que añadir el campo crea o sustituye automáticamente los perfiles existentes.

## Cómo se otorgan las habilidades

Una habilidad se otorga a un usuario (registrada como una habilidad emitida, con una fecha) a través de una de varias vías:

* Automáticamente, cuando un estudiante alcanza el umbral de una categoría del libro de calificaciones — configurado en la página [Habilidades y evaluaciones](skills-assessments.md)
* Automáticamente, al completar cursos específicos a los que está vinculada la habilidad
* Manualmente, por un docente (si **Teachers can assign skills** está habilitado) o por un administrador