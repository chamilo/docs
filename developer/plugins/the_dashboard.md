## El Dashboard

Por el momento, eliminamos el panel de la vista del profesor/alumno porque *algunos* de los gráficos
que muestran que son *muy* lentos cuando tienes muchos datos, y creemos que sería un mal idea de mostrarlo a todos los usuarios. Recientemente, sin embargo, comenzamos a hacer un pequeño cambio para permitir administrador de la plataforma para ver un gráfico más que los otros administradores, por lo que hay un comienzo para hacerlo cambios basados en roles.

Si desea desbloquear completamente el tablero para todos los usuarios, puede desbloquear los permisos en ***main/inc/lib/banner.lib.php***, alrededor de la línea 319, donde tiene controles en api_is_platform_admin (), api_is_drh () y api_is_session_admin (). Elimina esta línea y podrás consíguelo para estudiantes y profesores con indiferencia.