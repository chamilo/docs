## Video conferencia {#vid-oconf-rence}

Como se señaló anteriormente en la sección _plugins_ de esta guía, la videoconferencia es una herramienta independiente de Chamilo. Puede instalarlo fácilmente y vincularlo a Chamilo con el complemento _BigBlueButton_, pero requiere un servidor dedicado (o al menos un servidor dedicado para otra cosa que le sobren recursos).

Para instalar el servidor de videoconferencia _BigBlueButton_, le recomendamos que siga las instrucciones en la página del proyecto: http://code.google.com/p/bigbluebutton/wiki/InstallationUbuntu

Una vez que la videoconferencia esté instalada y sea funcional, deberá conocer la URL pública (a veces una simple dirección IP) y la clave secreta.

Encontrará la clave secreta en _/var/lib/tomcat6/webapps/bigbluebutton/WEB-INF/classes/bigbluebutton.properties_ (cherchez _Salt_).

Una vez que se conozcan estos dos datos, vaya a la página de configuración de Chamilo, sección _Plugins._ Active el complemento _BigBlueButton_ y guárdelo. **Recargue la página ** (para que aparezca el nuevo elemento de menú) y haga clic en el icono de la nueva sección llamada "Extra". Allí, ingrese la información de su servidor de videoconferencia.

En las siguientes versiones, el complemento de videoconferencia se ha ampliado con nuevas características:

- version 2.4 de 2016-05 
  - Se agregó soporte para conferencias globales (fuera del contexto del curso)
  - Añadió la posibilidad de dar clases a nivel grupal en los cursos.
- version 2.5 de 2016-07
  - Posibilidad de que cada usuario lance una conferencia global independiente.
- version 2.6 de 2017-05
  - Posibilidad de establecer límites para el número de participantes en las salas de conferencias.
- version 2.7 de 2018-07
  - Posibilidad de elegir entre la interfaz de HTML5 o Flash en el nivel del complemento o dar la opción a los usuarios (requiere una plataforma BBB versión 2.0 Beta o superior)

Todo lo que tiene que hacer es navegar a través de uno de sus cursos o en la página de inicio si tiene conferencias globales habilitadas para probar la integración.

En el contexto de un curso, los profesores son los únicos que pueden iniciar una sala de videoconferencia. También son los únicos que tienen estatus de moderador en Chamilo.

Los alumnos solo pueden conectarse a una videoconferencia de un curso si su profesor ha iniciado una sala previamente (de lo contrario, hacer clic en el enlace de la videoconferencia no tiene efecto).

Si no puede instalarlo, no dude en ponerse en contacto con los proveedores oficiales de Chamilo, quienes con gusto le alquilarán el acceso a sus servidores de videoconferencia preconfigurados.