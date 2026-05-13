# Perfilado de Usuarios

Chamilo permite definir campos de perfil personalizados (campos adicionales) para capturar información adicional sobre los usuarios más allá del nombre, correo electrónico y rol estándar.

## Campos de Perfil Adicionales

![Lista de campos de perfil adicionales que muestra campos personalizados con nombre, tipo y configuraciones de visibilidad](/.gitbook/assets/admin-extra-fields-list.png)

Los campos adicionales te permiten almacenar metadatos específicos de tu organización, como:

* ID de empleado
* Departamento
* Cargo
* Ubicación/oficina
* Número de teléfono
* Identificadores personalizados

## Creación de Campos Adicionales

1. Desde el panel de administración, navega a **Campos adicionales** o **Campos de perfil**
2. Haz clic en **Agregar**
3. Configura el campo:
   * **Nombre** — El título del campo que se muestra a los usuarios
   * **Descripción** — Descripción opcional
   * **Texto de ayuda** — Se muestra debajo del campo en cualquier formulario que lo incluya
   * **Tipo de campo** — Texto, desplegable, fecha, casilla de verificación, etc.
   * **Etiqueta del campo** — El nombre interno del campo, para la integración con plugins
   * **Valores posibles** — Si el campo es un selector entre esos valores
   * **Valor predeterminado** — Un valor predeterminado opcional
   * **Visible para sí mismo** — Si el campo es visible en el perfil del usuario por el propio usuario
   * **Visible para otros** — Si el campo es visible para otros usuarios de la plataforma
   * **Puede cambiar** — Si el usuario puede cambiar su propio campo por sí mismo (o si solo los administradores pueden hacerlo)
   * **Filtro** — Si este es un campo de tipo selector, si se debe incluir como filtro en las páginas administrativas (por ejemplo, para inscribir usuarios en cursos o sesiones)
   * **Orden** — Si deseas gestionar el orden de visualización de los campos, deberás asignar un orden numérico a cada campo
   * **Eliminar al anonimizar** — Importante para las normas y leyes de privacidad: Si el usuario es anonimizado pero no eliminado, ¿debería considerarse este campo como un posible contenedor de datos de identificación personal?
4. Guardar

## Tipos de Campos

El motor de campos adicionales admite un amplio conjunto de tipos de entrada. Los más comunes incluyen:

| Tipo | Descripción |
|------|-------------|
| **Texto** | Entrada de texto de una sola línea |
| **Área de texto** | Entrada de texto de varias líneas |
| **Radio** | Grupo de opciones de selección única |
| **Desplegable / Desplegable múltiple** | Una lista de opciones predefinidas (selección única o múltiple) |
| **Selección doble** | Dos desplegables dependientes (por ejemplo, país → ciudad) |
| **Casilla de verificación** | Un interruptor de sí/no |
| **Fecha / Fecha y hora** | Selector de fecha o fecha+hora |
| **Entero** | Entrada numérica |
| **Etiqueta** | Múltiples valores de etiquetas de forma libre |
| **Archivo** | Campo de carga de archivos |
| **URL de video** | Una URL que apunta a un video |
| **Número de teléfono móvil** | Un campo de número de teléfono formateado |
| **Zona horaria** | Un selector de zona horaria |
| **Perfil social** | Un enlace a un perfil de red social |
| **Divisor** | Un separador visual dentro del formulario (sin valor) |

El conjunto exacto de tipos utilizables depende de la versión de Chamilo; el desplegable de tipo de campo en la página de administración de **Campos adicionales** es la fuente de información definitiva.

## Uso de Campos Adicionales

Los campos adicionales aparecen:

* En los formularios de creación (si son visibles para sí mismo) y edición de usuarios
* En las páginas de perfil de usuario (si son visibles para sí mismo)
* En las importaciones de usuarios (puedes incluir valores de campos adicionales en importaciones CSV)
* En exportaciones e informes (filtrar o agrupar por valores de campos adicionales)

## Consejos

* **Planifica antes de crear** — Define qué información necesitas antes de crear campos, ya que cambiar los tipos de campo después de que se hayan ingresado datos puede ser problemático
* **Usa desplegables para consistencia** — Cuando un campo tiene un conjunto conocido de valores posibles, usa un desplegable en lugar de texto libre para garantizar la consistencia de los datos
* **Úsalos para informes** — Los campos adicionales son útiles para filtrar informes (por ejemplo, "mostrar todos los usuarios del Departamento X que completaron la Capacitación Y")