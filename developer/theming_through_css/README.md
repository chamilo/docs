# Theming through CSS {#theming-through-css}

Las hojas de estilo en cascada son una herramienta formidable para "marcar" cualquier portal web. Desde Chamilo LMS 1.10.0, hemos hecho un progreso considerable en comparación con las versiones anteriores, en términos de reutilización de CSS.

En particular, utilizamos el marco Bootstrap (versión 3 en Chamilo <2.0, luego Bootstrap versión 4), que se promociona como un marco "móvil primero". Esto significa que, si lo extiende bien (lo que nos llevó aproximadamente 300 horas de trabajo en total para migrar), su aplicación web debería responder muy bien a todo tipo de cambios en las dimensiones de los dispositivos.

Chamilo utiliza ampliamente el concepto de "cascada". Para cada tema utilizado, utilizamos una base común y redefinimos elementos específicos localmente.