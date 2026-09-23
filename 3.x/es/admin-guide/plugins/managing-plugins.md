# Gestión de plugins

## Acceso al gestor de plugins

![El gestor de plugins mostrando una lista de plugins disponibles con interruptores de activación y opciones de configuración](../../.gitbook/assets/admin-plugin-manager.png)

Desde el panel de administración, haga clic en **Manage plugins** para ver la lista de plugins disponibles.

## Estados de un plugin

Cada plugin tiene uno de estos dos estados:

* **Active** — El plugin está habilitado y sus funciones están disponibles en la plataforma
* **Inactive** — El plugin está instalado pero deshabilitado

## Activación de un plugin

1. Localice el plugin en la lista
2. Haga clic en **Install**, luego en **Enable** o actívelo con el interruptor
3. Configure los ajustes del plugin (si corresponde, busque el botón **Configure**)
4. Guarde
5. Si se recomienda en el README, habilítelo en una **region** específica

Algunos plugins añaden herramientas a los cursos, nuevas páginas a la plataforma o funcionalidad adicional a características existentes.

## Configuración de un plugin

Muchos plugins disponen de opciones de configuración. Tras activar un plugin:

1. Haga clic en el botón **Configure** junto al plugin
2. Complete la configuración requerida (claves de API, URL, opciones, etc.)
3. Guarde

## Desactivación de un plugin

1. Localice el plugin en la lista
2. Haga clic en **Disable** o desactívelo con el interruptor
3. Las funciones del plugin se retiran de inmediato de la plataforma, pero el plugin sigue instalado y conserva su configuración hasta que lo **Uninstall**

Deshabilitar un plugin no elimina sus datos. Si lo vuelve a habilitar más adelante, los datos siguen disponibles.

## Consejos

* **Active solo lo que necesite** — Cada plugin activo añade cierta sobrecarga. Mantenga desactivados los plugins no utilizados.
* **Pruebe antes de producción** — Active los plugins nuevos primero en un entorno de pruebas
* **Compruebe la compatibilidad** — Tras actualizar Chamilo, verifique que todos los plugins activos siguen funcionando correctamente