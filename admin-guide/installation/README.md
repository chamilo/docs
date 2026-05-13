# Instalación

Esta sección cubre todo lo que necesitas para instalar y configurar Chamilo 2.0 en tu servidor.

Chamilo 2.0 es una aplicación PHP construida sobre el framework Symfony. Puede ejecutarse en la mayoría de los servidores basados en Linux, ha sido instalada y funciona en Windows Server con IIS, y soporta bases de datos MySQL y MariaDB.

## Pasos de Instalación

1. **[Requisitos del Servidor](server-requirements.md)** — Verifica que tu servidor cumpla con los requisitos mínimos
2. **[Asistente de Instalación](installation-wizard.md)** — Ejecuta el asistente de instalación basado en web
3. **[Configuración](configuration.md)** — Configura variables de entorno y ajustes de Symfony
4. **[Almacenamiento en la Nube](cloud-storage.md)** — Configura backends de almacenamiento en la nube (opcional)
5. **[Configuración de Correo Electrónico](email-configuration.md)** — Configura el envío de correos electrónicos
6. **[Actualización](upgrading.md)** — Actualiza desde una versión anterior

## Resumen Rápido

El proceso básico de instalación es:

1. Descarga o clona el código fuente de Chamilo
2. Instala las dependencias de PHP con Composer si estás preparando desde el código fuente
3. Instala las dependencias de JavaScript con npm/yarn y construye los activos del frontend
4. Crea un archivo `.env` vacío para almacenar tus credenciales de base de datos y otros ajustes más adelante
5. Cambia los permisos (escribible por el servidor web) en *var/*, *config/* y *.env*
6. Ejecuta el asistente de instalación basado en web
7. Conéctate con tu primera cuenta de administrador
8. Revierte los permisos en *config/* y *.env*

Las instrucciones detalladas para cada paso se encuentran en las páginas vinculadas arriba.