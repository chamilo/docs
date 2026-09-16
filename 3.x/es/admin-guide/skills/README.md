# Competencias

El bloque **Competencias** del panel de administración agrupa las herramientas para definir, organizar y hacer seguimiento de las insignias de competencia («skills») en toda la plataforma. Una competencia puede otorgarse automáticamente cuando un alumno alcanza un umbral del libro de calificaciones, completa cursos específicos, o de forma manual por un profesor, y puede llevar un icono tipo insignia y un nivel (por ejemplo Bronce/Plata/Oro).

![El bloque Competencias en el panel de administración, que enumera Rueda de competencias, Importación de competencias, Gestionar competencias, Gestionar niveles de competencias, Clasificación de competencias, y Competencias y evaluaciones](/.gitbook/assets/admin-skills-block.png)

El bloque completo solo aparece si el ajuste **Enable skills tool** (`skill.allow_skills_tool`, en Configuration Settings > Skills) está activado; está habilitado de forma predeterminada.

## Acceso al bloque Competencias

Desde el panel de administración, el bloque **Competencias** aparece junto a los demás bloques del panel. Haga clic en cualquiera de sus enlaces para abrir la herramienta correspondiente.

## Contenido del bloque

* **[Gestión de competencias](managing-skills.md)** — Crear competencias, importarlas de forma masiva y asignar cada una a una escala de niveles
* **[Rueda de competencias](skills-wheel.md)** — Un mapa visual con zoom de todo el árbol de competencias
* **[Clasificación de competencias](skills-ranking.md)** — Una tabla de clasificación de usuarios según las competencias adquiridas
* **[Competencias y evaluaciones](skills-assessments.md)** — Vincular categorías del libro de calificaciones con las competencias que otorgan

## Ajustes relacionados

Otros ajustes en Configuration Settings > Skills modifican quién puede hacer qué con este bloque:

* **Allow HR skills management** (`allow_hr_skills_management`) — Permite que los usuarios Human Resources Manager gestionen competencias junto con los administradores
* **Allow private skills** (`allow_private_skills`)
* **Teachers can assign skills** (`skills_teachers_can_assign_skills`)
* **Hide skill levels** (`hide_skill_levels`)
* **Show full skill name on skill wheel** (`show_full_skill_name_on_skill_wheel`)