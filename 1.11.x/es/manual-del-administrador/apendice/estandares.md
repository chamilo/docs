# Estándares soportados

Un software libre siempre tendrá interés en implementar estándares abiertos en sus funcionalidades.

De un lado porque permite intercambiar informaciones y procesos con otros sistemas, de otro lado porque los estándares 
abiertos son el fruto de un trabajo considerable de distintos grupos de personas con una voluntad de mejorar las
integraciones y los intercambios en el beneficio del mayor número de personas, y el software libre también busca esto,
así que hay una correspondencia fuerte entre software libre y estándares abiertos.

Qué son los estándares abiertos? Son estándares que tienen especificaciones libremente accesibles. Que no requieren
pago de licencia ni firmar documentos para poder usarlos. Se considera un bien para la humanidad.


## Estándares de comunicación / intercambio

La lista siguiente es ordenada alfabéticamente

### IMS/LTI

IMS/LTI (para Learning Tools Integration) es un estándar de comunicación entre actividades y plataformas.
Chamilo 1.11.22 puede integrar actividades LTI compartidas desde un sistema externo como actividades de sus cursos.
También permite compartir una actividad (ejercicio, lección, etc) usand el estándar LTI para que esté usada desde otra 
plataforma.
El uso de LTI se hace a través de 2 plugins (LTI y LTI Provider).

### PENS

PENS es un formato de intercambio de descripción de cursos, para que distintas plataformas puedan compartir un catálogo
de curso más ámplio, pero no permite directamente inscribirse a un curso. Es un poco como un registro de biblioteca que
diría donde tal curso puede ser encontrado, pero alguién tiene que ofrecer este registro de biblioteca al público.

### REST

REST es un protocolo de servicios web. Chamilo ofrece una amplia lista de servicios web accesibles en REST. 
Para una lista actualizada, ver https://github.com/chamilo/chamilo-lms/wiki/rest-webservices

### SOAP

SOAP es un protocolo de servicios web. Si REST es más popular ahora, hubo un momento en que SOAP era el protocolo más 
popular. Para una lista actualizada, ver el archivo "main/webservices/registration.soap.php" en su propia instalación
de Chamilo.

## Estándares de formatos (importación/exportación)

La lista siguiente es ordenada alfabéticamente

### AICC/HACP

HACP es como el ancestro de SCORM. Es muy poco usado hoy en día, pero está soportado en Chamilo. El problema es que
mucho del contenido todavía disponible en este formato usa Flash, una tecnología de animaciones via el navegador, que 
ya no está disponible (fue remplazado por HTML5 y CSS3) en los navegadores modernos.

### Aiken

Aiken es un formato super sencillo de descripción de preguntas. Basta con unas líneas de texto en un simple editor
de textos básico para describir una pregunta e insertarla en Chamilo. Ver el icono de Word en la herramienta de 
ejercicios.

### Chamilo course export

Chamilo tiene su propio formato de exportación de cursos, que se pueden intercambiar con otras plataformas Chamilo.

Estas exportaciones no incluyen las interacciones de los alumnos. Solo los contenidos creados por el profesor. 

### Excel / CSV / XML / PDF

Muchos reportes pueden ser descargados en una combinación de formatos Excel, CSV y/o XML.

Estos formatos no son "estándares" en sí, y no tenemos un listado preciso
de qué reporte permite una exportación en qué formato: estos reportes y formatos fueron añadidos progresivamente en el 
código de Chamilo a lo largo de sus más de 20 años de existencia, pero todos los reportes (o quasi) de Chamilo tienen
una posibilidad de exportación de datos.

Hemos iniciado un catálogo de reportes en nuestro wiki: https://github.com/chamilo/chamilo-lms/wiki/Reports-dictionary, 
al cual puedes contribuir si te da la gana. 

### HotPotatoes

HotPotatoes es un formato antiguo (pero todavía usado) para la descripción de ejercicios y el intercambio de información
(resultados) con una plataforma LMS. Encontrarás la opción de importar en formato HotPotatoes con un icono de patata en
la herramienta de ejercicios.

### iCal

iCal es un formato XML de representación de un evento de calendario. Chamilo permite exportar formatos iCal
dentro de la herramienta Agenda global o Agenda del curso.

### IMS/QTI2

QTI2 es un formato XML de descripción de preguntas. Puedes general preguntas en formato QTI desde herramientas
especializadas, e importarlas dentro de un ejercicio de Chamilo.

### Moodle course export

Chamilo 1.11.18 (y siguientes) soporta importar el formato de exportación de cursos de Moodle.
Usa la herramienta de "Mantenimiento" en el curso para acceder a esta funcionalidad.

### SCORM

SCORM es posiblemente el formato de curso ("Lección" en Chamilo) más popular usado por creadores de contenido para
compartir su contenido con plataformas de e-learning. SCORM viene en 3 versiones: 1.1, 1.2 y 1.3 (o "2004").
Chamilo soporta SCORM 1.2 y, extra-oficialmente, parte de SCORM 1.3.

Usa el icono de importación de SCORM dentro de la herramienta de lecciones de tu curso para importar contenido SCORM.

### vCard

vCard es un formato digital de tarjetas personales. Puedes exportar tarjetas personales de contactos desde la sección
de red social de Chamilo si eres "amigo" de estos contactos.

Es de lo más útil cuando usas Chamilo a través de un dispositivo móvil, dado que puede importar el contacto directamente
en el dispositivo con solo darle clic al icono de vCard.

### xAPI

xAPI es un estándar relativamente nuevo que busca compilar un registro más completo de las actividades de aprendizaje
de un alumno, dando seguimiento de sus actividades (leer sitios web, documentos, bibliotecas,
conferencias, etc) a través de cualquier sistema que soporte el protocolo xAPI, y un sistema central (LRS o Learning 
Record Store) que permite al alumno decidir donde guardar esta información.

Chamilo actua como sistema compatible con xAPI (sus actividades pueden ser registradas en un LRS externo) y como LRS 
(en caso se decida elegirlo como LRS).

### xAPI CMI5

CMI5 es una subparte de xAPI que intenta remplazar el formato SCORM dentro del marco de xAPI.
Su adopción es algo lenta, pero tiene potencial.
Se pueden importar paquetes CMI5 como paquetes SCORM en Chamilo 1.11.18 y siguientes.

## Estándares cerrados

Cuando hablamos de estándares de certificación ISO, por ejemplo, es importante entender que la mayoría de ellos *no son*
libres. Han sido elaborados por círculos cerrados de empresas que buscan lograr una mejora de calidad a través de
procesos definidos por ellos, con el objetivo único, muchas veces, de aumentar sus ventas. No persiguen los mismos
objetivos perseguidos por el software libre. Si bien no hay ningún daño en mejorar la calidad de procesos, no podemos
generar una dependencia a un sistema cerrado para una escuela remota que desearía usar Chamilo, solo porque usamos 
dentro de Chamilo términos específicos que provienen de estos estándares.

Chamilo es libre para todos y tiene que 
permanecerlo, así que rechazar la adopción de estándares cerrados es una obligación, aunque a veces pueda impactar 
la compatibilidad del software con los ambientes profesionales de ciertas empresas.

El no adoptar un estándar cerrado tampoco significa que Chamilo no adopte otro similar que sea abierto. 