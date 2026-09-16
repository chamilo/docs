# Idiomas

Esta herramienta gestiona qué idiomas de interfaz pueden elegir los usuarios; no gestiona las cadenas de traducción en sí (estas proceden de los paquetes de idioma incluidos con Chamilo, no de nada editable aquí).

## Acceso a Idiomas

Desde el panel de administración, haga clic en **Plataforma > Idiomas**.

## Qué puede hacer

* **Activar o desactivar la disponibilidad** — Habilite o deshabilite cada uno de los idiomas incluidos como opción en la página de inicio de sesión y en la configuración del perfil de usuario, con un simple interruptor de encendido/apagado por fila
* **Establecer el idioma predeterminado de la plataforma** — Elija qué idioma se usa cuando no aplica ninguna preferencia de usuario; el predeterminado actual se marca con su propio icono y no se puede ocultar
* **Deshabilitar todos excepto el predeterminado** — Una única acción masiva para reducir el selector de idiomas únicamente al idioma predeterminado de su plataforma
* **Editar el nombre nativo** — Ajuste cómo se muestra el propio nombre de un idioma (su «nombre original») en el selector

## Deshabilitar un idioma en uso

Si deshabilita un idioma que usuarios activos ya han seleccionado como idioma de interfaz, Chamilo solicita confirmación y —si confirma— migra a todos los usuarios afectados al idioma predeterminado de la plataforma. No existe un estado parcial en el que un usuario quede con un idioma ahora oculto seleccionado.

## Idiomas de derecha a izquierda

Los idiomas de derecha a izquierda (como el árabe, el hebreo o el persa) cambian automáticamente la interfaz a un diseño de derecha a izquierda cuando se seleccionan; no hay nada que configurar aquí ni en otro lugar para que esto ocurra. El soporte RTL se ha mejorado sustancialmente en versiones recientes.

## Subidiomas

Si el ajuste **Permitir subidiomas** está habilitado, aparecen acciones adicionales para crear «subidiomas»: anulaciones parciales de un idioma padre, usadas históricamente para dialectos regionales o ajustes de terminología específicos de la organización. Esta es una función heredada; la mayoría de las instalaciones no la necesitarán.