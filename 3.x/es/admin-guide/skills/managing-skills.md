# Gestión de competencias

Esta página cubre las tres entradas del panel de control utilizadas para construir el catálogo de competencias de la plataforma: importar competencias de forma masiva, gestionar las definiciones de las competencias y asignar cada competencia a una escala de niveles.

## Skills Import

**Skills > Skills import** le permite crear de forma masiva una jerarquía de competencias a partir de un archivo CSV o XML, en lugar de crear las competencias una a una. Cada fila necesita como mínimo un `id`, un `parent_id` (para construir el árbol) y un `title`. Hay una plantilla de ejemplo disponible en la que basar su archivo.

## Manage Skills

**Skills > Manage skills** es el catálogo principal de competencias: crear, editar, activar/desactivar y eliminar competencias. Cada competencia tiene un título, un código corto, una descripción, un icono y una descripción opcional de criterios (lo que un estudiante debe hacer para obtenerla). Las competencias pueden anidarse — una competencia puede tener competencias hijas —, que es lo que visualiza la [Rueda de competencias](skills-wheel.md).

## Manage Skills Levels

**Skills > Manage skills levels** es una pantalla independiente y más reducida: enumera las competencias existentes y le permite asignar cada una a un **perfil de nivel** — un conjunto de niveles con nombre y ordenado (por ejemplo Bronce/Plata/Oro) frente al cual se mide la competencia. En resumen: use **Manage skills** para definir qué *es* una competencia, y **Manage skills levels** para definir en qué escala se mide.

## Cómo se otorgan las competencias

Una competencia se otorga a un usuario (registrada como competencia emitida, con una fecha) a través de una de varias vías:

* Automáticamente, cuando un estudiante alcanza el umbral de una categoría del libro de calificaciones — configurado en la página [Competencias y evaluaciones](skills-assessments.md)
* Automáticamente, al completar cursos específicos a los que está vinculada la competencia
* Manualmente, por un profesor (si **Teachers can assign skills** está habilitado) o un administrador