# Copia de seguridad fuera de Chamilo

## Copias de seguridad externas <a id="copias-de-seguridad-externas"></a>

### PhpMyAdmin <a id="phpmyadmin"></a>

La base de datos puede ser guardada desde la interfaz de [P](http://fr.wikipedia.org/wiki/PhpMyAdmin)[hpMyAdmin](http://fr.wikipedia.org/wiki/PhpMyAdmin), que se conecta con el usuario y contraseña creados durante la instalación del servidor [LAMP](http://fr.wikipedia.org/wiki/LAMP), la instalación de la base de datos, o con los datos facilitados por su proveedor de hosting.

![](../../.gitbook/assets/images115.png)

_Ilustración 12: Administración - PHPMyAdmin_

Una vez en la interfaz gráfica de PhpMyAdmin, vaya a la pestaña _exportar_ y seleccione la base de datos a exportar.

![](../../.gitbook/assets/images116.png)_Ilustración 13: Administración - Exportación a través de PHPMyAdmin_

Es posible que desee cambiar el formato de salida del archivo de copia de seguridad. Para guardar, elija el formato deseado debajo de la base de datos que quiera exportar. En el presente ejemplo se optó por SQL.

El nombre del archivo guardado puede cambiarse en la parte inferior de la página de exportación. También puede ser comprimido en tres tipos de formato. No olvide seleccionar el archivo de exportación, pues si no lo hace sólo se imprimirá el resultado del backup en la pantalla y no se producirá la copia.

![](../../.gitbook/assets/images118.png)_Ilustración 14: Administración - Exportación a través de PHPMyAdmin \(continuación\)_

El archivo se guarda de forma predeterminada en el directorio de descargas o en el escritorio, dependiendo de la configuración de su navegador.

El archivo guardado estará en formato SQL \(.sql\) pudiéndose importar posteriormente a través de phpMyAdmin, en caso de surgir algún problema.

### El directorio root <a id="el-directorio-root"></a>

El directorio root es \(en este contexto\) el directorio que contiene los archivos de Chamilo. A modo de ejemplo en este manual, vamos a considerar que se ha instalado en /var/www/chamilo y está disponible a través de [_http://localhost/chamilo/_](http://localhost/chamilo/)\(para un servidor remoto, tendremos que usar FTP o SSH/ SFTP \).

Para guardar su contenido se puede comprimir su contenido mediante un terminal dirigiéndose al directorio _/var/www/_.

user@server:cd /var/www

Comprimir el directorio usando el comando “tar” para generar el archivo tar.gz :

user@server:/var/www$ sudo tar cvfj backup\_chamilo chamilo/

Después mover este backup al directorio deseado. Para ello usar el comando “mv” :

user@server:/var/www$ sudo mv backup\_chamilo /home/user/Desktop/

Puede ser práctico dar un nombre compuesto con la fecha al archivo comprimido resultante, por ejemplo, 2015-11-07-backup-chamilo. De esta manera, si se almacenan varios archivos de copia de seguridad será fácil ordenarlos por fecha.

![](../../.gitbook/assets/images121.png)

_Ilustración 15: Terminal - Moviendo archivos_

Esta copia de seguridad contendrá toda la información de la base de datos de Chamilo y todas sus configuraciones. Constituye la única manera fiable de reconstruir su servidor Chamilo si se produce algún problema importante, tal es el caso de una pérdida de datos o de una incursión no deseada en su servidor.

Generalmente, esta copia de seguridad se realiza automáticamente en el servidor por un sistema de programación \(proceso cron en GNU/Linux\). En el caso de que el servidor no la realice correctamente las primeras veces deberá ejecutarla manualmente.

También podrá realizar una copia de seguridad mediante _FTP_ que, en el caso de no comprimir los archivos, le puede llevar mucho más tiempo y espacio.

