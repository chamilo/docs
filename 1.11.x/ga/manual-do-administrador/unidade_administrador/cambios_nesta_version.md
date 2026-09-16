# Cambios nesta versión

La versión 1.10 trae unos cambios importantes que son necesarios conocer como administrador:

* se abandona el soporte de PHP 5.3 e inferiores, para soportar únicamente PHP 5.4 y superiores.
* se abandona el soporte de Internet Explorer en sus versiones 8 e inferiores. Esto significa que no solo la apariencia de Chamilo, sino también algunas funcionalidades, serán muy distintas o no-funcionales para usuarios de Internet Explorer 5, 6, 7 y 8. Este cambio se hace para permitir el soporte de diseños compatibles con dispositivos móviles \(aka “Responsive design”\)
* algunos idiomas se reconfiguran para ser considerados idiomas “hijos” y así poder usar términos definidos en el idioma “padre” cuando no han sido traducidos con exactitud todavía. Es el caso del Catalán y del Gallego, que toman el Castellano como idioma “padre”
* la codificación de caracteres, anteriormente modificable a nivel de la plataforma, se restringe a _únicamente_ UTF-8, que es la codificación más común para todo lo que es lenguajes humanos
* la estructura de carpetas se modifica. Los archivos de configuración ahora se encuentra en app/config/ y las hojas de estilos en app/Resources/public/css/themes/. No obstante, debido al uso de una estructura más cercana a Symfony 2, estas hojas de estilo se duplican en web/css/ para su uso de cara a Internet
* a partir de esta versión, la eliminación de un curso conlleva la eliminación completa de la carpeta del curso. Esto no era el caso anteriormente, y generaba \(para portales con una alta tasa de cambios\) una sobrecarga en volúmenes almacenados en el disco
* las preguntas de tipo HotSpot no funcionan más \(esto es temporal y se arreglará tan pronto como posible\). Sin embargo, no se “rompen” las preguntas almacenadas en el sistema en versiones anteriores. Solo dejan de ser usables.

## Otros cambios <a id="otros-cambios"></a>

Todos los cambios de esta versión \(arreglos de bugs como nuevas funcionalidades\) se pueden encontrar en el archivo /documentation/changelog.html de su instalación de Chamilo.

