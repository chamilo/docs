# Idiomas

Esta herramienta gestiona qué idiomas de la interfaz pueden elegir los usuarios; no gestiona las cadenas de traducción en sí (estas proceden de los paquetes de idioma incluidos con Chamilo, no de nada editable aquí).

## Acceso a los idiomas

Desde el panel de administración, haga clic en **Plataforma > Idiomas**.

## Qué puede hacer

* **Activar o desactivar la disponibilidad** — Active o desactive cada uno de los idiomas incluidos como opción en la página de inicio de sesión y en la configuración del perfil de usuario, mediante un simple interruptor de encendido/apagado por fila
* **Establecer el idioma predeterminado de la plataforma** — Elija qué idioma se utiliza cuando no se aplica ninguna preferencia del usuario; el predeterminado actual se marca con su propio icono y no se puede ocultar
* **Desactivar todos excepto el predeterminado** — Una única acción masiva para reducir el selector de idiomas únicamente al idioma predeterminado de la plataforma
* **Editar el nombre nativo** — Ajuste cómo se muestra el nombre propio de un idioma (su «nombre original») en el selector

## Desactivar un idioma en uso

Si desactiva un idioma que los usuarios activos ya han seleccionado como idioma de su interfaz, Chamilo solicita confirmación y, si confirma, migra a cada usuario afectado al idioma predeterminado de la plataforma. No existe un estado parcial en el que un usuario quede con un idioma ahora oculto seleccionado.

## Idiomas de derecha a izquierda

Los idiomas de derecha a izquierda (como el árabe, el hebreo o el persa) cambian automáticamente la interfaz a una disposición de derecha a izquierda cuando se seleccionan; no hay nada que configurar aquí ni en ningún otro lugar para que esto ocurra. La compatibilidad con RTL se ha mejorado sustancialmente en las versiones recientes.

## Subidiomas

Si el ajuste **Permitir subidiomas** está activado, aparecen acciones adicionales para crear «subidiomas»: sustituciones parciales de un idioma principal, utilizadas históricamente para dialectos regionales o ajustes de terminología específicos de una organización. Se trata de una función heredada; la mayoría de las instalaciones no la necesitarán.

## Orden de los nombres de las personas

Chamilo muestra y ordena los nombres de las personas según la convención del idioma de la interfaz en uso.

* **Nombre de pila primero** (por ejemplo, «Maria Garcia»), ordenados por el nombre de pila: español (es, es_MX), gallego (gl), malayo (ms_MY) y todos los demás idiomas no enumerados a continuación.
* **Apellido primero** (por ejemplo, «Yamada Taro»), ordenados por el apellido: japonés, coreano, chino (simplificado y tradicional), vietnamita y húngaro.

El español, el español (México), el gallego y el malayo se trataban anteriormente como idiomas con el apellido primero; ahora siguen el orden de nombre de pila primero. La convención está integrada en las definiciones de idioma de la plataforma (no se almacena por instalación), por lo que no se requiere ninguna acción del administrador al actualizar.