# Exportación de encuestas a CSV

Survey Export CSV <img src="../../.gitbook/assets/icons/mdi-file-delimited-outline.svg" alt="Exportación de encuestas a CSV" data-size="line"> añade una exportación con un solo clic de los resultados de una encuesta a un archivo CSV compacto, con una fila por encuestado y una columna por pregunta.

## Exportar una encuesta

Una vez habilitado, la lista de la herramienta **Encuesta** de su curso obtiene una columna **Exportar** con un icono CSV en cada fila de encuesta. Haga clic en él para descargar los resultados de inmediato, sin pasos adicionales.

## Qué contiene el archivo

* Las encuestas anónimas se exportan sin columnas de identidad
* Las encuestas no anónimas incluyen la identidad del encuestado junto con sus respuestas
* Si se incluyen o no las respuestas incompletas (no finalizadas) lo controla su administrador, no este botón de exportación

## Consejos

* **Las encuestas grandes pueden tardar un momento** — Los conjuntos de respuestas muy grandes pueden ser más lentos de exportar; se trata de una consideración de rendimiento de la base de datos que su administrador puede ajustar si es necesario
* **Combine con Survey Export TXT** — Si también tiene habilitado el complemento [Survey Export TXT](survey-export-txt.md), verá dos iconos de exportación; elija el formato que mejor se adapte a cómo planea usar los datos