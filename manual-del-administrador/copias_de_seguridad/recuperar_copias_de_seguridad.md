# Recuperando copias de seguridad

## Lecciones <a id="lecciones"></a>

Después de exportar las lecciones, es posible que desee saber cómo importarlas.

Una vez en el curso receptor haga clic en _Lecciones._

En la herramienta lecciones hay tres opciones \(La última solo aparecerá si se activó _Chamilo Rapid_ – ver 8.3Chamilo Rapid de la página 89 para más información\):

* " Crear una lección " \(1er icono\),
* " Importación [SCORM](http://fr.wikipedia.org/wiki/Sharable_Content_Object_Reference_Model) " \(2do icono\),
* " Chamilo Rapid " \(3er icono\)

![](../../.gitbook/assets/images135.png)_Ilustración 28: Interfaz - Importar lecciones_

Para importar una lección previamente exportada, haga clic en _Importación SCORM_ \(2do icono\).

![](../../.gitbook/assets/images136.png)_Ilustración 29: Interfaz - Importación SCORM_

El archivo .zip que se vaya a exportar, obviamente debe tener un contenido en formato SCORM. En concreto con SCORM 1.2. Chamilo no es totalmente compatible con SCORM 2004, por lo que si realiza una importación en este formato es probable que aparentemente no se presenten dificultades, pero la importación no será funcional en la mayoría de los casos. Su paquete de lección también puede ser compatible con AICC.

Si creó el archivo SCORM mediante la herramienta Chamilo “Lecciones”, recuerde que el campo de _autoría_ sólo es un campo informativo y no genera ninguna modificación cuando se reproduzca el archivo.

## Cursos <a id="cursos"></a>

Hay dos caminos para importar un curso mediante el interfaz de Chamilo:

* importar un archivo de copia de seguridad o backup desde su ordenador
* importar un archivo de copia de seguridad o backup directamente desde el servidor

Las dos opciones son muy fáciles de usar desde la _herramienta de importación_ _de copias de seguridad_ de cualquier curso.

## Recuperación externa y completa <a id="recuperaci-n-externa-y-completa"></a>

Este procedimiento según las distintas configuraciones de los usuarios puede variar considerablemente respecto a este ejemplo. Aquí vamos a utilizar un ejemplo de instalación en un servidor local, utilizando PhpMyAdmin y una copia de seguridad del directorio raíz de Chamilo. Para un servidor remoto, se requeriría SSH / SFTP o FTP para el acceso al servidor.

Esta recuperación puede ser necesaria después de que por error, se hayan borrado todas o algunas de las bases de datos de Chamilo, o después de que se hayan producido graves daños en su servidor por la acción de un cracker.

1. Copie el archivo de copia de seguridad en el directorio raíz \(/var/www/\) y descomprímalo. Recuerde que debe mantener la misma estructura de directorios para que no se pierda la ruta de acceso pre configurada para algunos datos.
2. Importe la copia de seguridad de la base de datos de PhpMyAdmin. Previamente, no olvide eliminar las bases de datos de Chamilo existentes si aún persisten.
3. Conéctese a su sitio y compruebe que todo está en orden.

La copia de seguridad contiene los usuarios, contraseñas, cursos, lecciones y todos los recursos de su portal. En servidores críticos se recomienda realizar copias de seguridad automáticas en otro servidor al menos una vez al día.

