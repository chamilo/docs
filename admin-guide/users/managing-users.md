# Gestión de Usuarios

Esta página cubre las tareas diarias de creación, edición y gestión de cuentas de usuario.

## Lista de Usuarios

![La lista de usuarios mostrando cuentas con columnas de nombre, correo electrónico, rol y estado](/.gitbook/assets/admin-user-list.png)

Desde el panel de administración, haz clic en **Lista de usuarios** para ver todos los usuarios de la plataforma. La lista muestra:

* Avatar
* Nombre
* Nombre de usuario
* Dirección de correo electrónico
* Roles
* Estado activo/inactivo
* Fecha de registro
* Fecha del último inicio de sesión

Utiliza la herramienta de **Búsqueda avanzada** para encontrar usuarios específicos por nombre, correo electrónico, rol u otros criterios.

## Crear un Usuario

![El formulario de creación de usuario con campos para nombre, correo electrónico, nombre de usuario, contraseña, rol e idioma](/.gitbook/assets/admin-user-create-form.png)

1. Haz clic en **Agregar un usuario** desde el panel de administración
2. Completa los campos obligatorios:
   * **Nombre** y **Apellido**
   * **Correo electrónico** — Debe ser único en la plataforma
   * **Nombre de usuario** — El nombre de inicio de sesión (debe ser único)
   * **Contraseña** — Establece una contraseña inicial
   * **Roles** — Selecciona el/los rol(es) del usuario en la plataforma (estudiante, profesor, administrador, etc.)
   * **Idioma** — El idioma preferido de la interfaz del usuario
3. Opcionalmente, completa campos adicionales:
   * Código oficial (por ejemplo, ID único en la organización)
   * Número de teléfono
   * Fecha de vencimiento — Desactiva automáticamente la cuenta después de una fecha
   * Estado activo/inactivo
   * Campos de perfil adicionales (si están configurados)
4. Guardar

## Importar Usuarios

![La interfaz de importación de usuarios para cargar archivos CSV o XML con datos de usuario](/.gitbook/assets/admin-user-import.png)

Para la creación masiva de usuarios, puedes importar usuarios desde un archivo:

1. Haz clic en **Importar usuarios** desde el panel de administración
2. Sube un archivo **CSV** o **XML** con datos de usuario
3. Asocia las columnas del archivo con los campos de usuario de Chamilo
4. Elige cómo manejar usuarios existentes (actualizar o omitir)
5. Importar

El archivo de importación debe contener columnas para al menos: nombre, apellido, correo electrónico, nombre de usuario y contraseña.

Nota: La columna **Estado** es el nombre antiguo de **Rol** y solo acepta algunos valores, como 1 para profesor, 5 para estudiante. Un ajuste más detallado de los roles solo puede realizarse manualmente más adelante, editando el usuario.

## Exportar Usuarios

Haz clic en **Exportar usuarios** para descargar la lista de usuarios como un archivo CSV o XML. Puedes filtrar qué usuarios exportar por rol, fecha de registro u otros criterios.

## Editar un Usuario

Haz clic en el nombre de un usuario en la lista de usuarios para editar su cuenta. Puedes modificar:

* Información personal (nombre, correo electrónico, teléfono)
* Roles
* Contraseña (restablecer)
* Estado activo/inactivo
* Fecha de vencimiento
* Campos de perfil adicionales

## Eliminar un Usuario

Cuando eliminas usuarios (generalmente profesores) que han creado contenido en la plataforma, el sistema podría impedirte eliminarlos permanentemente y mostrará un mensaje de advertencia explicando que el usuario aún está vinculado a algunos recursos. Si confirmas la eliminación, el sistema no eliminará el contenido en sí, sino que lo asociará a un usuario neutral (lo llamamos "Usuario de respaldo") por razones de consistencia de datos.

Para evitar esto, revisa los detalles del usuario, elimina cada uno de sus cursos uno por uno y luego elimina al usuario.

## Acciones de Usuario

| Acción | Descripción |
|--------|-------------|
| **Desactivar** | Deshabilita la cuenta de un usuario sin eliminarla. El usuario no puede iniciar sesión, pero sus datos se conservan. |
| **Activar** | Reactiva una cuenta previamente desactivada. |
| **Iniciar sesión como** | Inicia sesión en la plataforma como este usuario (suplantación). Útil para la resolución de problemas. |
| **Anonimizar** | Borra toda la información personal de la cuenta, según lo definido por el GDPR de la UE. |
| **Eliminar** | Elimina de forma suave la cuenta del usuario. Usa la pestaña **Usuarios eliminados** para eliminar permanentemente la cuenta y los datos asociados. |

> **Iniciar sesión como** es una función poderosa. Úsala de manera responsable y solo con fines legítimos de soporte.

## Operaciones por Lotes

Selecciona varios usuarios en la lista de usuarios para realizar acciones por lotes:

* Activar o desactivar varios usuarios a la vez
* Eliminar varios usuarios
* Asignar usuarios a un curso o sesión

## Consejos

* **Usa la importación CSV para inscripciones masivas** — Al incorporar muchos usuarios al inicio de un programa de formación, prepara un archivo CSV e importa en masa
* **Establece fechas de vencimiento** — Para usuarios temporales (participantes de talleres, usuarios de prueba), establece una fecha de vencimiento para desactivar automáticamente sus cuentas
* **Desactiva en lugar de eliminar** — Cuando un usuario se va, desactiva su cuenta primero. Esto preserva sus registros de formación. Elimina solo si estás seguro de que los datos ya no son necesarios.