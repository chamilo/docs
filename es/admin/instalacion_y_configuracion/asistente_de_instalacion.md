### Asistente de instalación {#asistente-de-instalaci-n}

Descargar el código desde la página de descarga de [Chamilo](https://chamilo.org/es/chamilo-lms) y descomprimirlo (con una herramienta como 7-zip[^5] bajo Windows o _tar_y _gunzip_ bajo Linux/MacOS).

- Si se trata de un servidor remoto (aquel que no está directamente conectado al ordenador por un teclado y una pantalla), envíe el archivo a través de FTP (o SSH) al espacio en línea.

  Al enviar todos los archivos que se encuentren en el directorio de _Chamilo_ asegúrese de que todos ellos han sido transferidos, para ello compruebe el registro y envíelos una segunda vez marcando la opción no sobrescribir los archivos existentes en su cliente FTP. Debe tener cuidado, porque una transferencia FTP puede interrumpirse inesperadamente y la instalación no se completaría.

- Si se trata de una instalación local, solo tiene que copiar los archivos en la carpeta raíz del servidor web (en Ubuntu, está dentro de /var/www).

Ex.: user@server:(sudo) mv /home/_user_/Bureau/chamilo /var/www

> **Nota** : Es posible que desee cambiar el nombre del directorio una vez descomprimido.

Chamilo puede instalarse en cualquier directorio. Elija el directorio raíz del sitio para poder acceder directamente a la plataforma través de la dirección &quot;[http://www.mydomain.com/](http://www.mydomain.com/)&quot;.

El directorio donde los archivos se copian debe tener permisos de escritura para el usuario del sistema que ejecuta el servidor web (_www-data_ en Ubuntu, _httpd_ o _nobody_ en otros sistemas operativos basado en UNIX). Usted debe ser capaz de cambiar los permisos de los archivos y carpetas en modo remoto a través de [FTP](http://fr.wikipedia.org/wiki/FileZilla), [SSH](http://fr.wikipedia.org/wiki/Secure_Shell) o cualquier otro tipo de acceso.

#### Inicio del asistente de Instalación {#inicio-del-asistente-de-instalaci-n}

Una vez que los archivos han sido copiados en el servidor dirija su navegador a &quot;http://www.mydomain.com/chamilo&quot; o, si está en modo local, a &quot;http://localhost/chamilo&quot;, dependiendo de donde exactamente esté su directorio.

Si pudo configurar un VirtualHost en la configuración de su servidor web, es probable que lo cargue directamente, sin el sufijo chamilo, de esta forma: &quot;[http://www.virtualhost.com/](http://www.virtualhost.com/)&quot;.

![](/var/www/docs/es/admin/assets/images182.png)*Ilustración 1: Instalación - Pantalla de inicio*

A continuación, debe seguir una serie de pasos para indicar los diferentes parámetros de la plataforma. Estos pasos son casi idénticos en la instalación en forma local y en forma remota.

Recuerde que **en cada página** del instalador puede dejar el proceso y consultar la guía de instalación. Por favor, asegúrese de revisarla si tiene cualquier problema al instalar, ya que evitará distraer a los desarrolladores y el equipo de apoyo de Chamilo para temas particulares de cada uno.

##### Paso 1 de 6: Idioma {#paso-1-de-6-idioma}

Esta pantalla le pide que elija el idioma de la instalación. Desde la versión 1.8.8, su idioma es detectado automáticamente a través de los parámetros de su navegador, por lo que esta pantalla simplemente requiere que confirme si el idioma detectado es el correcto.

Tenga en cuenta que este no es el idioma en el que finalmente quedará instalada la plataforma, sino solamente el elegido para el proceso de instalación.

![](../assets/images106.png)*Ilustración 2: Instalación - Cambiar el idioma*

##### Paso 2 de 6: Requisitos {#paso-2-de-6-requisitos}

Este paso comprueba si su servidor tiene todos los elementos necesarios para una instalación correcta y completa de Chamilo.

![](../assets/images109.png)*Ilustración 3: Instalación – Requisitos de módulos*

Los requisitos previos que ya cumple su sistema están marcados en **verde**, mientras que los requisitos obligatorios no satisfechos por su sistema aparecerán marcados en **rojo**. En **naranja** aparecerán los requisitos no satisfechos pero que no son imprescindibles.

![](../assets/image2.png)

*Ilustración 4: Instalación – Requisitos de configuración*

Para ampliar la información sobre los prerrequisitos relacionados con la instalación de PHP también dispone de los enlaces respectivos a Internet. Los parámetros recomendados representan las variables que se pueden modificar en la configuración de PHP (_php.ini_[^6]) o dentro de la configuración del VirtualHost.

Al final de la página de prerrequisitos figuran los permisos _sobre los directorios y archivos_.

![](../assets/images108.png)

*Ilustración 5: Instalación - Requisitos (continuación)*

En GNU/Linux la escritura en los directorios no está autorizada por defecto. Debe cambiar los archivos de accesos para optimizar la seguridad y otorgar los permisos suficientes al usuario que ejecuta el servidor web. Con ello se garantiza el confinamiento de los permisos durante la ejecución de un servicio (en este caso Apache) y evitará que un cracker pueda tomar el control de su servidor con demasiada facilidad.

Bajo Windows, esto suele ser más fácil (pero mucho menos seguro) ya que los permisos por defecto son suficientes (quizá en exceso).

> **Nota**: Chamilo es revisado frecuentemente (al menos una vez al año) contra fallos de seguridad que pudieran poner en peligro su servidor. Usted puede mantenerse al tanto de los errores de seguridad más recientes y de su reparación, mediante su suscripción a nuestra lista de correo dedicada a la seguridad: [http://lists.chamilo.org/listinfo/](http://lists.chamilo.org/listinfo/security)[security](http://lists.chamilo.org/listinfo/security) o en [http://support.chamilo.org/projects/chamilo-18/wiki/Security_issues](http://support.chamilo.org/projects/chamilo-18/wiki/Security_issues). Alternativamente, disponemos de un Twitter Feed de noticias de seguridad: [http://twitter.com/chamilosecurity](http://twitter.com/chamilosecurity)

En una instalación en modo local en Ubuntu, ir al directorio donde está _Chamilo_. Proporciónele los permisos necesarios para el usuario _www-data_ (el usuario del servidor web en Ubuntu) y vuelva a cargar la página en el navegador. Si utiliza otro sistema operativo, puede que tenga que modificar un poco la siguiente orden:

Ex.: user@server:/var/www$ chown -R www-data:www-data chamilo/

Clic en “ + _Nueva instalación “_.

> **_Nota_**: si se ejecuta una actualización de una versión anterior de Chamilo, este capítulo no es el adecuado. Usted debería consultar el capítulo 2.3: Actualización de Chamilo. También le recomendamos que lea la Guía de instalación y actualización de Chamilo, disponible en el directorio de **documentación** de su paquete de Chamilo.

##### Paso 3 de 6: Licencia {#paso-3-de-6-licencia}

Chamilo explica aquí la distribución libre del software bajo los términos de la GNU GPL(Licencia Pública General) (versión 3) y que parte de este **contenido** es publicado bajo [BY-SA ](http://creativecommons.org/licenses/by-sa/3.0/deed.fr)[Creative Commons](http://creativecommons.org/licenses/by-sa/3.0/deed.fr)[.](http://creativecommons.org/licenses/by-sa/3.0/deed.fr)

Para ir al siguiente paso tendrá que leer la licencia y aprobarla (de lo contrario no está autorizado a utilizar el software). Encontrará otras versiones de esta licencia (probablemente en su propio idioma), conectándose con la Free Software Foundation[^7], que es la organización que publica esta licencia.

![](../assets/images207.png)*Ilustración 6: Instalación - Licencia*

**Nota**: _Desde la versión 1.8.8, también encontrará un formulario opcional debajo de la aprobación de la licencia. Este formulario nos permite tener algunos datos para contactar con usted y poder informarle de cualquier evento organizado por la Asociación Chamilo o relacionado con sus miembros, que tenga lugar cerca de donde se encuentre ubicado. Trataremos sus datos con cuidado y no los proporcionaremos a terceros. Se mantendrán dentro de la asociación. De acuerdo con las leyes de privacidad, usted tiene derecho a que sus datos sean borrados o actualizados en nuestra base de datos mediante el envío de un correo electrónico a info@chamilo.org_

##### Paso 4 de 6 : Parámetros de la base de datos MySQL {#paso-4-de-6-par-metros-de-la-base-de-datos-mysql}

En este paso vamos a comprobar el sistema de gestión de bases de datos (DBMS) con el que trabaja y la configuración requerida:

![](../assets/images107.png)*Ilustración 7: Instalación - Opciones de MySQL*

Para permitir la comprobación de valores, deberá cumplimentar todos los campos requeridos. Estos datos, probablemente le fueron proporcionados cuando alquiló su servicio de alojamiento por primera vez, o fueron asignados por usted cuando realizó la configuración del servidor [LAMP](http://fr.wikipedia.org/wiki/LAMP) en modo local.

- _Servidor de base de datos:_ es el nombre del servidor SQL. Si la instalación es local, el servidor MySQL probablemente estará instalado en modo local y su nombre será _localhost_.
- Puerto: es el puerto en el cual se conectará a la base de datos. Déjelo en 3306 si es que no conoce este dato. Este parámetro es nuevo en la versión 1.10.
- _Usuario de base de datos :_ es el nombre del usuario de la base de datos. Si se trata de una instalación local, el nombre probablemente será root por defecto, pero se recomienda la creación de otro usuario para bases de datos de Chamilo ya que usar _root_ representa un riesgo de seguridad para otras bases de datos del servidor.
- _Contraseña de base de datos:_ es la contraseña que se le ha dado/creado durante la contratación/creación de la base de datos, al mismo tiempo que el usuario. A nivel local, la contraseña está generalmente vacía por defecto, pero una vez más por razones de seguridad, se recomienda que defina su propia contraseña.
- Nombre de base de datos: es el nombre de **la** base de datos que se usará y sobre la cual el usuario indicado tiene los permisos de creación, modificación y consulta de tablas e índices

> **Nota :** En versiones anteriores a la 1.9, era posible seleccionar una o varias bases de datos. Sin embargo, esta elección conllevaba considerables problemas de eficiencia para grandes portales, y un dolor de cabeza inmenso para los desarrolladores. Desde la versión 1.9, todo esto ha sido simplificado y ordenado, así que ya no le hacemos esta pregunta en el instalador.

Compruebe los datos introducidos en el formulario y luego haga clic en el botón _comprobar conexión de base de datos_. Si aparece un mensaje de error, revise los datos de nuevo. Tal vez la contraseña no sea la correcta.

Una vez que todo sea correcto pase al siguiente paso.

**Nota:**Si el mensaje siguiente aparece, es que ya existe una base de datos con este nombre, pero que el usuario de base de datos indicado tiene los permisos para eliminarla. Mucho cuidado con esto, ya que podría eliminar una base de datos que sí importa!

##### Paso 5 de 6: Opciones de configuración {#paso-5-de-6-opciones-de-configuraci-n}

Todos los ajustes de este paso, excepto el método de cifrado y la URL del portal, pueden ser modificados después de la instalación a través de la página de administración de Chamilo.

Después de la instalación es casi imposible cambiar el método de cifrado, pues supondría volver a generar nuevas contraseñas para todos los usuarios y enviarlas por e-mail. Por su parte, la URL del portal podría ser actualizada con cierta dificultad, a través del fichero de configuración. Así pues, tómese un momento para pensar la configuración más adecuada de ambos durante la instalación.

![](../assets/images110.png)*Ilustración 8: Instalación - Opciones generales de configuración*

- _Nombre de u__suario y Contraseña del Administrador:_ **_I_**MPORTANTE – le permitirán conectarse a su portal como administrador. Una opción es crear una cuenta global de administración desde aquí (con el nombre &quot;admin&quot;) y tener varios administradores utilizando esta cuenta; sin embargo, se recomienda crear una cuenta para cada administrador (por lo que esta primera de la instalación debe ser la suya), para poder hacer un seguimiento de todas las acciones tomadas por otros administradores.
- _Nombres_ _y apellidos_ _del administrador:_ son los datos que se mostrarán en el pie de página del portal como el enlace a la dirección de correo electrónico del administrador. En su lugar puede poner cualquier tipo de texto alternativo, como por ejemplo: &quot;Soporte técnico”.
- _E-mail del administrador:_ es el correo electrónico de contacto de la persona o equipo que administre el portal. Aparecerá en el pié de página del portal.
- _Teléfono_ _del administrador:_ opcional. Si se indica, aparecerá en el pié de página del portal.
- _Idioma principal:_ es el idioma por defecto que tendrá su portal.
- _URL de Chamilo:_ es la URL de su portal de Chamilo (en modo local: http://localhost/chamilo; en modo remoto: http://www.mydomain.com/chamilo).
- _Nombre de su plataforma y organización:_presentará estos datos en todas las páginas en la esquina superior izquierda de la plataforma. Sólo será visible en algunos temas visuales.
- _Método de encriptación:_ hash y funciones criptográficas que se utilizarán para asegurar las contraseñas de los usuarios de su base de datos. Le recomendamos la más segura disponible en Chamilo: SHA1.
- _Permitir que los propios usuarios puedan registrarse:_ posibilita que un usuario pueda registrarse por sí mismo. En un portal privado debe establecerse como NO.
- _Permitir que los propios usuarios puedan registrarse como creadores de cursos:_ posibilita que un usuario pueda registrarse por sí mismo como docente y por tanto poder crear nuevos cursos. Solo se tiene en cuenta si la configuración que se ha realizado anteriormente para los usuarios ha sido establecida como SI.

> **Nota** : Lo definido por el usuario en esta pantalla tendrá todos los permisos de administración, por lo que más tarde podrá actualizar la configuración de esta página.

##### Paso 6 de 6 : Última revisión antes de la instalación {#paso-6-de-6-ltima-revisi-n-antes-de-la-instalaci-n}

Aquí se pueden ver todos los ajustes realizados antes de iniciar la instalación. Le recomendamos que tome una captura de pantalla o la imprima y guárdela en un lugar seguro. Estos datos podrían ser útiles cuando informe de un error a la comunidad Chamilo, o en caso de perder por accidente la configuración que estableció durante la instalación. Si encuentra algún error en la configuración, sólo tiene que volver atrás y subsanarlo; en caso contrario, haga clic en el botón _Instalar Chamilo_ y proceda ...

![](../assets/images111.png)*Ilustración 9: Instalación - Revisión*

Cuando la instalación haya terminado, bastará con ir a la página principal de la plataforma y entrar en ella con la cuenta que acaba de establecer.

