# Perfilado de usuarios

Chamilo le permite definir campos de perfil personalizados (campos extra) para capturar información adicional sobre los usuarios más allá del nombre, el correo electrónico y el rol estándar.

## Campos extra de perfil

![La lista de campos extra de perfil que muestra campos personalizados con nombre, tipo y ajustes de visibilidad](/.gitbook/assets/admin-extra-fields-list.png)

Los campos extra le permiten almacenar metadatos específicos de su organización, como:

* ID de empleado
* Departamento
* Cargo
* Ubicación/oficina
* Número de teléfono
* Identificadores personalizados

## Creación de campos extra

1. Desde el panel de administración, vaya a **Extra fields** o **Profile fields**
2. Haga clic en **Add**
3. Configure el campo:
   * **Name** — El título del campo que se muestra a los usuarios
   * **Description** — Descripción opcional
   * **Helper text** — Texto de ayuda que se mostrará bajo el campo en cualquier formulario que lo incluya
   * **Field type** — Texto, desplegable, fecha, casilla de verificación, etc.
   * **Field label** — El nombre interno del campo, para la integración de plugins
   * **Possible values** — Si el campo es un selector entre esos valores
   * **Default value** — Un valor predeterminado opcional
   * **Visible to self** — Si el campo es visible en el perfil del usuario por el propio usuario
   * **Visible to others** — Si el campo es visible para otros usuarios de la plataforma
   * **Can change** — Si el usuario puede cambiar su propio campo por sí mismo (o si solo pueden hacerlo los administradores)
   * **Filter** — Si se trata de un campo de tipo selector, si incluirlo como filtro en las páginas administrativas (p. ej., para inscribir usuarios en cursos o sesiones)
   * **Order** — Si desea gestionar el orden de visualización de los campos, deberá asignar un orden numérico a cada campo
   * **Remove on anonymization** — Importante para las normas y leyes de privacidad: si el usuario se anonimiza pero no se elimina, ¿debe considerarse este campo como posible contenedor de datos de identificación personal?
4. Guarde

## Tipos de campo

El motor de campos extra admite un amplio conjunto de tipos de entrada. Los más habituales incluyen:

| Type | Description |
|------|-------------|
| **Text** | Un campo de texto de una sola línea |
| **Textarea** | Un campo de texto de varias líneas |
| **Radio** | Un grupo de botones de opción de elección única |
| **Dropdown / Dropdown multiple** | Una lista de opciones predefinidas (selección única o múltiple) |
| **Double select** | Dos desplegables dependientes (p. ej., país → ciudad) |
| **Checkbox** | Un conmutador sí/no |
| **Date / Date and time** | Selector de fecha o de fecha y hora |
| **Integer** | Un campo numérico |
| **Tag** | Varios valores de etiqueta de forma libre |
| **File** | Campo de carga de archivos |
| **Video URL** | Una URL que apunta a un vídeo |
| **Mobile phone number** | Un campo de número de teléfono con formato |
| **Timezone** | Un selector de zona horaria |
| **Social profile** | Un enlace a un perfil de red social |
| **Divider** | Un separador visual dentro del formulario (sin valor) |

El conjunto exacto de tipos utilizables depende de la versión de Chamilo; el desplegable de tipo de campo en la página de administración **Extra fields** es la fuente de verdad.

## Uso de los campos extra

Los campos extra aparecen:

* En los formularios de creación (si son visibles para el propio usuario) y de edición de usuarios
* En las páginas de perfil de usuario (si son visibles para el propio usuario)
* En las importaciones de usuarios (puede incluir valores de campos extra en importaciones CSV)
* En exportaciones e informes (filtrar o agrupar por valores de campos extra)

## Consejos

* **Planifique antes de crear** — Defina qué información necesita antes de crear campos, ya que cambiar los tipos de campo después de haber introducido datos puede ser problemático
* **Use desplegables para la coherencia** — Cuando un campo tiene un conjunto conocido de valores posibles, use un desplegable en lugar de texto libre para garantizar la coherencia de los datos
* **Úselos para informes** — Los campos extra son útiles para filtrar informes (p. ej., «mostrar todos los usuarios del Departamento X que completaron la Formación Y»)