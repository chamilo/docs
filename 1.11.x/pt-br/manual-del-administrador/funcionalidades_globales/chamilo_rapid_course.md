# Chamilo Rapid \(admin/conversion ppt\)

La capacidad de convertir las presentaciones _PowerPoint_ o _LibreOffice_ _Impress_ en una ruta de aprendizaje es bastante compleja de instalar. Solo hay un acceso directo conocido: haber instalado una versión de LibreOffice así como la aplicación _GNU_ _screen_ en su servidor y ejecutar el siguiente comando en una _screen_:

sudo soffice -nologo -nofirststartwizard -headless -norestore -invisible "-accept = socket, host = localhost, port = 2002, tcpNoDelay = 1; urp;"

Cualquier explicación más detallada estaría en gran medida fuera del contexto de esta guía, pero la fórmula funciona bajo Ubuntu Server. Tenga en cuenta que la instalación del servidor de videoconferencia _BigBlueButton_ ya cubre la instalación y el inicio \(en el puerto 8100\) del servidor _LibreOffice \__.

Si no puede instalarlo, no dude en ponerse en contacto con los proveedores oficiales de Chamilo que lo asistirán o rentarán voluntariamente el acceso a sus servidores de conversión preconfigurados.

