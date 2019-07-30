## La estructura en cascada

Como se puede entender mirando la sección **Etiqueta HTML ilegal eliminada:** de cualquier página de Chamilo, los archivos CSS se cargan de esta manera (hemos reemplazado intencionalmente el nombre de dominio por el marcador [.] para facilitar la lectura, y usó el estilo activo predeterminado de main/css/chamilo /):

O, en resumen, los cargamos en este orden:

1.  web/assets/bootstrap/dist/css/bootstrap.min.css

2.  web/assets/bootstrap-daterangepicker/daterangepicker-bs3.css

3.  web/assets/fontawesome/css/font-awesome.min.css

4.  jquery stuff

5.  (minor-importance CSS here)

6.  web/css/base.css (El núcleo del estilo css de Chamilo esta por encima de Bootstrap)

7.  web/css/themes/chamilo/default.css (personalización del tema CSS, modificable en Chamilo)

8.  web/css/themes/chamilo/print.css (Una versión especial del estilo para cuando lo imprimas)

No analizaremos los archivos CSS menos importantes aquí, pero debe tener en cuenta que generalmente son específicos de las características, como los elegidos (una barra de menú desplegable JS, con capacidad de búsqueda).

Como dicta CSS, un CSS que aparece primero en la lista se cargará primero, luego los siguientes "sobrescribirán" la configuración anterior si es necesario.

### Versiones más antiguas

También debe saber que, en algunos casos en versiones anteriores de Chamilo, utilizamos la función @import url () de CSS para cargar más CSS «predeterminado». Por ejemplo, para todos los estilos de tipo Chamilo, habría encontrado un bloque como este al principio:

```
/* Adding default style for the chamilo_X themes */

@import url('../base_chamilo.css');
```

Esto se ha eliminado de los estilos desde 1.10.0, por lo que ya no debería encontrar (ni usar) ninguno de estos.

Con toda esta información en mente, estamos listos para abordar la siguiente sección: analizar el propósito de cada archivo.