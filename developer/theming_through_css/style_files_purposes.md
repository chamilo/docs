## Propósitos de archivos de estilo

### El archivo bootstrap.min.css

Bootstrap es la infame hoja de estilo CSS abierta de Twitter. Es un contenedor para las mejores prácticas de diseño y ayuda a darle a su sitio web una apariencia agradable con solo incluirlo.

El archivo bootstrap.min.css es una versión minificada (comprimida) de la biblioteca.

NO DEBE cambiar el archivo bootstrap.css, ya que este es el original, tal como lo proporciona Twitter, y como podríamos actualizarlo en el futuro con versiones más recientes de Twitter.

### El archivo base.css

El archivo base.css define una serie de elementos CSS que son la base del resto (aunque se basa en Bootstrap 3). Todo lo que da a un portal que «Chamilo touch» se concentra aquí, por lo que es una buena idea incluir (importar) este archivo desde un CSS más específico.

No debe cambiar este archivo, ya que hacerlo podría alterar la apariencia de otros estilos utilizados en Chamilo.

### El archivo [theme]/default.css

Este archivo es específico para su tema CSS y define elementos muy específicos para la apariencia general que desea para su portal.

Este es el archivo que deberá actualizar para cambiar el estilo de su instalación de Chamilo.

Contiene los estilos para los logotipos de encabezado, la barra de navegación, el pie de página, etc., además de lo que se ha definido en base.css.

### El archivo print.css

El estilo print.css rara vez se usa en Chamilo. **Debería** usarse mucho más, pero primero tenemos otras cosas para ponernos al día.

Normalmente, el archivo print.css contiene todos los detalles para hacer que una página web sea imprimible (como ... en una impresora o dentro de un PDF). Nos encantaría recibir contribuciones de ese lado.

### Otras hojas de estilo en su carpeta de estilos

Algunos otros archivos se pueden encontrar en la carpeta **app/Resources/public/css/themes/[your-style]/**, como scorm.css, frames.css, dataTable.css y cosas por el estilo. Estos se usan solo para partes específicas de la aplicación y llevan un nombre que es relativamente representativo de la característica que cubren.

### Hojas de estilo específicas de funciones

Finalmente, hay una serie de otros archivos disponibles fuera de la carpeta app/Resources/public/css/. Estas son características específicas y generalmente vienen con una nueva biblioteca de software gratuito o función que incluimos dentro de Chamilo.

Este es el caso, por ejemplo, con markdown.css.

Estos archivos **no deberían** actualizarse, ya que es probable que los sobrescribamos con versiones más recientes en futuras versiones de Chamilo. Sin embargo, todavía hay algo por hacer a nivel del sistema para permitir que se cargue un estilo personalizado después de estos.