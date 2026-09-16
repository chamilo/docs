# Exportación de encuestas a TXT

Survey Export TXT <img src="/.gitbook/assets/icons/mdi-file-outline.svg" alt="Exportación de encuestas a TXT" data-size="line"> exporta los resultados de una encuesta a un archivo de texto plano legible — un bloque por encuestado, con cada pregunta, la(s) respuesta(s) elegida(s) y cualquier respuesta de texto libre, en lugar de las filas y columnas de un CSV.

## Exportar una encuesta

Una vez habilitado, la lista de la herramienta **Encuesta** de su curso muestra un icono **Exportar** en cada fila de encuesta. Haga clic en él para descargar los resultados como un archivo `.txt`.

## Qué contiene el archivo

* Las encuestas anónimas muestran «Anonymous» en lugar de datos de identidad; las encuestas no anónimas incluyen el nombre y el nombre de usuario del encuestado
* Las respuestas de cada encuestado se separan con una línea divisoria, lo que facilita la lectura del archivo de arriba abajo
* Si ninguna respuesta cumple los requisitos para la exportación, el archivo simplemente lo indica en lugar de fallar

## Consejos

* **Mejor para lectura, CSV para análisis** — Use este formato cuando desee leer las respuestas directamente; use [Exportación de encuestas a CSV](survey-export-csv.md) si planea abrir los resultados en una hoja de cálculo