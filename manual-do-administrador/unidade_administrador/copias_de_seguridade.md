# Copias de seguridade

## Copias de seguridad externas <a id="copias-de-seguridad-externas"></a>

### PhpMyAdmin <a id="phpmyadmin"></a>

La base de datos puede ser guardada desde la interfaz de [P](http://fr.wikipedia.org/wiki/PhpMyAdmin)[hpMyAdmin](http://fr.wikipedia.org/wiki/PhpMyAdmin), que se conecta con el usuario y contraseña creados durante la instalación del servidor [LAMP](http://fr.wikipedia.org/wiki/LAMP), la instalación de la base de datos, o con los datos facilitados por su proveedor de hosting.

![](../../.gitbook/assets/images115.png)Ilustración 12: Administración - PHPMyAdmin

Una vez en la interfaz gráfica de PhpMyAdmin, vaya a la pestaña _exportar_ y seleccione la base de datos a exportar.

![](../../.gitbook/assets/images116.png)Ilustración 13: Administración - Exportación a través de PHPMyAdmin

Es posible que desee cambiar el formato de salida del archivo de copia de seguridad. Para guardar, elija el formato deseado debajo de la base de datos que quiera exportar. En el presente ejemplo se optó por SQL.

El nombre del archivo guardado puede cambiarse en la parte inferior de la página de exportación. También puede ser comprimido en tres tipos de formato. No olvide seleccionar el archivo de exportación, pues si no lo hace sólo se imprimirá el resultado del backup en la pantalla y no se producirá la copia.

![](../../.gitbook/assets/images118.png)Ilustración 14: Administración - Exportación a través de PHPMyAdmin \(continuación\)

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

![](../../.gitbook/assets/images121.png)Ilustración 15: Terminal - Moviendo archivos

Esta copia de seguridad contendrá toda la información de la base de datos de Chamilo y todas sus configuraciones. Constituye la única manera fiable de reconstruir su servidor Chamilo si se produce algún problema importante, tal es el caso de una pérdida de datos o de una incursión no deseada en su servidor.

Generalmente, esta copia de seguridad se realiza automáticamente en el servidor por un sistema de programación \(proceso cron en GNU/Linux\). En el caso de que el servidor no la realice correctamente las primeras veces deberá ejecutarla manualmente.

También podrá realizar una copia de seguridad mediante _FTP_ que, en el caso de no comprimir los archivos, le puede llevar mucho más tiempo y espacio.

## Copias de seguridad <a id="copias-de-seguridad-0"></a>

Chamilo ofrece distintas maneras de sacar copias de seguridad de sus datos. Si es administrador o docente, podrá guardar un curso completo \(salvo algún elemento\) o un elemento de un curso en particular.

### Exportar una lección <a id="exportar-una-lecci-n"></a>

Para exportar una lección, ir a la pestaña Mis cursos.

![](../../.gitbook/assets/images123.png)Ilustración 16: Interfaz - Lista de cursos

Aquí, puede ver los cursos en los que usted es el docente \(junto a cada uno aparecerá un icono en forma de lápiz\). Para continuar, haga clic en uno de ellos y entre en la herramienta de lecciones.

![](../../.gitbook/assets/images124.png)Ilustración 17: Interfaz - Lista de herramientas del curso

Una vez en la lista de lecciones o secuencias de aprendizaje, haga clic en el icono en forma de CD para generar un archivo de copia de seguridad de esa lección.

![](../../.gitbook/assets/images125.png)Ilustración 18: Interfaz - Exportar lecciones

En esta etapa, sólo tiene que seleccionar dónde guardar el archivo. La exportación está disponible como un archivo .zip.

Esta exportación se genera en el formato SCORM 1.2 \(lo que también implica que estará comprimido en un .zip\) que podrá utilizar en otra plataforma Chamilo o en cualquier otro LMS compatible con SCORM 1.2. Esta copia de seguridad no podrá volver a ser modificada en la mayoría de los casos.

### **Copia de seguridad de un curso** <a id="copia-de-seguridad-de-un-curso"></a>

Si usted es administrador de la plataforma podrá guardar cualquier curso usando el menú de Administración de la plataforma y la interfaz de cursos.

1. Ir a : " Administración " → " Lista de cursos " :

![](../../.gitbook/assets/images126.png)Ilustración 19: Administración - Bloque cursos

1. Haga clic sobre el icono en forma de CD.

![](../../.gitbook/assets/images127.png)Ilustración 20: Administración - Lista de cursos – Copia de seguridad

1. Chamilo ofrecerá la posibilidad de crear o importar una copia de seguridad. Haga clic en “Crear copia de seguridad”.

![](../../.gitbook/assets/images128.png)Ilustración 21: Administración – Copia de seguridad

1. Según sus necesidades, podrá elegir entre una copia de seguridad completa y una selección de herramientas específicas. Vamos a elegir una copia de seguridad completa para el ejemplo.

![](../../.gitbook/assets/images129.png)Ilustración 22: Administración - Opciones de copia de seguridad

1. La copia de seguridad es generada, tras lo cual sólo habrá que hacer clic en el botón descargar.

![](../../.gitbook/assets/images130.png)Ilustración 23: Administración - Resultados de la generación de una copia de seguridad

1. Al hacer clic en el botón “Crear una copia de seguridad”, Chamilo genera un archivo de backup en el directorio chamilo/archive/ que podrá recuperar simplemente mediante un acceso directo. Sin embargo, otras personas también podrían hacerlo si adivinaran su nombre \(código del curso + tiempo en segundos en que se ha generado\), por lo que como administrador responsable, debe limpiar regularmente este directorio \(se propone un proceso en main/cron pero tiene que ejecutarlo usted\) y establecer una configuración que evite la navegación dentro del directorio main/archive/, utilizando para ello un archivo .htaccess o configurando adecuadamente el VirtualHost.

Otra forma de realizar una copia de seguridad de un curso, que también está permitida a los docentes de un curso concreto es la siguiente:

Haga clic en la pestaña _Mis cursos_ y seleccione uno de los cursos disponibles. Haga clic en la herramienta _Administración del curso._

![](../../.gitbook/assets/images131.png)Ilustración 24: Interfaz - Herramientas de administración del curso

Seleccione la opción _Mantenimiento del curso._

![](../../.gitbook/assets/images132.png)Ilustración 25: Interfaz - Opciones mantenimiento de un curso

Las opciones de mantenimiento del curso, además de la copia de seguridad, le permiten realizar tres funciones adicionales:

* **Copiar el curso** posibilita duplicar la totalidad o parte de un curso en otro que previamente es preferible que esté vacío. Sólo se requiere que el curso origen tenga algún contenido que copiar y que el curso de destino no contenga ya elementos del original.
* **Reciclar este curso** permite vaciar todo el contenido de un curso. Supongamos que desea organizar un nuevo curso reutilizando uno ya existente, por lo que necesitará eliminar todos los recursos creados previamente en el mismo. No olvide que no hay posibilidad de recuperar los elementos borrados, así que antes de hacerlo es posible que desee realizar una copia de seguridad del curso.
* **Suprimir** permite eliminar todo el curso. La confirmación es necesaria, pero una vez eliminado, no espere que esté disponible como una copia de seguridad en algún lugar ...

**Nota**: al abrir la copia de seguridad del archivo .zip, usted encontrará una gran similitud con la herramienta _documentos_ de la jerarquía de los documentos. Para su información, el valor predeterminado .zip para un curso creado inicialmente con el contenido de ejemplo ocupa alrededor de 10MB.

Este fichero contiene:

* Una estructura interna de archivos denominada course\_info.dat
* Un directorio llamado _Document_
* Una serie de archivos y carpetas que contienen los documentos del curso, no todo lo relacionado con los usuarios \(las tareas y otros elementos relacionados con los usuarios no son guardados\)

El directorio _Document_ tiene una estructura similar a la que se presenta en la ilustración 7, que reproduce la estructura de la herramienta documentos como se muestra en la ilustración 2.

![](../../.gitbook/assets/images133.png)Ilustración 26: Copia de seguridad - Estructura de archivos de la copia de seguridad

![](../../.gitbook/assets/images134.png)Ilustración 27: Interfaz - Lista de documentos

Estos documentos son los contenidos por defecto en el curso.

Por otro lado, piense que la copia de seguridad sólo recuperará los documentos \(imágenes, vídeos, etc\) relacionados con el curso.

## Recuperar una copia de seguridad <a id="recuperar-una-copia-de-seguridad"></a>

### Lecciones <a id="lecciones"></a>

Después de exportar las lecciones, es posible que desee saber cómo importarlas.

Una vez en el curso receptor haga clic en _Lecciones._

En la herramienta lecciones hay tres opciones \(La última solo aparecerá si se activó _Chamilo Rapid_ – ver 8.3Chamilo Rapid de la página 89 para más información\):

* " Crear una lección " \(1er icono\),
* " Importación [SCORM](http://fr.wikipedia.org/wiki/Sharable_Content_Object_Reference_Model) " \(2do icono\),
* " Chamilo Rapid " \(3er icono\)

![](../../.gitbook/assets/images135.png)Ilustración 28: Interfaz - Importar lecciones

Para importar una lección previamente exportada, haga clic en _Importación SCORM_ \(2do icono\).

![](../../.gitbook/assets/images136.png)Ilustración 29: Interfaz - Importación SCORM

El archivo .zip que se vaya a exportar, obviamente debe tener un contenido en formato SCORM. En concreto con SCORM 1.2. Chamilo no es totalmente compatible con SCORM 2004, por lo que si realiza una importación en este formato es probable que aparentemente no se presenten dificultades, pero la importación no será funcional en la mayoría de los casos. Su paquete de lección también puede ser compatible con AICC.

Si creó el archivo SCORM mediante la herramienta Chamilo “Lecciones”, recuerde que el campo de _autoría_ sólo es un campo informativo y no genera ninguna modificación cuando se reproduzca el archivo.

### Cursos <a id="cursos"></a>

Hay dos caminos para importar un curso mediante el interfaz de Chamilo:

* importar un archivo de copia de seguridad o backup desde su ordenador
* importar un archivo de copia de seguridad o backup directamente desde el servidor

Las dos opciones son muy fáciles de usar desde la _herramienta de importación_ _de copias de seguridad_ de cualquier curso.

### Recuperación externa y completa <a id="recuperaci-n-externa-y-completa"></a>

Este procedimiento según las distintas configuraciones de los usuarios puede variar considerablemente respecto a este ejemplo. Aquí vamos a utilizar un ejemplo de instalación en un servidor local, utilizando PhpMyAdmin y una copia de seguridad del directorio raíz de Chamilo. Para un servidor remoto, se requeriría SSH / SFTP o FTP para el acceso al servidor.

Esta recuperación puede ser necesaria después de que por error, se hayan borrado todas o algunas de las bases de datos de Chamilo, o después de que se hayan producido graves daños en su servidor por la acción de un cracker.

1. Copie el archivo de copia de seguridad en el directorio raíz \(/var/www/\) y descomprímalo. Recuerde que debe mantener la misma estructura de directorios para que no se pierda la ruta de acceso pre configurada para algunos datos.
2. Importe la copia de seguridad de la base de datos de PhpMyAdmin. Previamente, no olvide eliminar las bases de datos de Chamilo existentes si aún persisten.
3. Conéctese a su sitio y compruebe que todo está en orden.

La copia de seguridad contiene los usuarios, contraseñas, cursos, lecciones y todos los recursos de su portal. En servidores críticos se recomienda realizar copias de seguridad automáticas en otro servidor al menos una vez al día.

