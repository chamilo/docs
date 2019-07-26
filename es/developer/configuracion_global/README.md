# Global settings

![](../assets/images26.png)

La configuración global en Chamilo es una forma de configurar algún tipo de comportamiento del sistema en el nivel de la plataforma, que afectará a todos los cursos y a todos los usuarios, si corresponde.

Todos estos ajustes se guardan en una de las 2 ubicaciones:

1.  El archivo de configuración, si pensamos que esta configuración debe ser controlada por el administrador del sistema pero no por el administrador de Chamilo (se mantiene una pequeña cantidad de configuraciones allí)

2.   Las tablas settings_current (y settings_option), cuando queremos que esas configuraciones aparezcan dentro de la página de configuración de la plataforma

Como se indicó en los primeros capítulos, la base de datos no puede cambiar entre versiones secundarias de Chamilo, por lo que cuando desarrollamos una función opcional en una versión secundaria, a menudo usamos el archivo de configuración para almacenar la configuración hasta que lleguemos a la siguiente versión principal.

A completar…