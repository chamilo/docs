# Instalación

Esta sección cubre todo lo que necesita para instalar y configurar Chamilo 3.0 en su servidor.

Chamilo 3.0 es una aplicación PHP construida sobre el framework Symfony. Puede ejecutarse en la mayoría de los servidores basados en Linux, se ha instalado y funciona en Windows Server con IIS, y admite backends MySQL y MariaDB.

## Pasos de instalación

1. **[Requisitos del servidor](server-requirements.md)** — Verifique que su servidor cumpla los requisitos mínimos
2. **[Asistente de instalación](installation-wizard.md)** — Ejecute el asistente de instalación basado en web
3. **[Configuración](configuration.md)** — Configure las variables de entorno y los ajustes de Symfony
4. **[Almacenamiento en la nube](cloud-storage.md)** — Configure backends de almacenamiento en la nube (opcional)
5. **[Configuración de correo electrónico](email-configuration.md)** — Configure la entrega de correo electrónico
6. **[Actualización](upgrading.md)** — Actualice desde una versión anterior

## Resumen rápido

El proceso básico de instalación es:

1. Descargue o clone el código fuente de Chamilo
2. Instale las dependencias PHP con Composer si prepara desde el código fuente
3. Instale las dependencias JavaScript con npm/yarn y compile los recursos del frontend
4. Cree un archivo `.env` vacío para almacenar más adelante las credenciales de la base de datos y otros ajustes
5. Cambie los permisos (escribible por el servidor web) en *var/*, *config/* y *.env*
6. Ejecute el asistente de instalación basado en web
7. Conéctese con su primera cuenta de administrador
8. Restablezca los permisos en *config/* y *.env*

Las instrucciones detalladas de cada paso se encuentran en las páginas enlazadas más arriba.