# Cifrado en reposo de los campos del perfil de usuario

Chamilo 3.1 puede cifrar opcionalmente determinados campos personales del perfil antes de almacenarlos en la base de datos. Esta primera implementación cubre **biografía**, **teléfono** y **dirección**. El cifrado está **desactivado de forma predeterminada** y requiere una clave de cifrado privada. No cifra toda la información del usuario ni sustituye la seguridad del disco, de la base de datos, del transporte ni de las copias de seguridad.

## Antes de activar el cifrado

Solo un administrador de la plataforma con acceso al servidor debe realizar el despliegue. En primer lugar, confirme que la instalación incluye las migraciones de Chamilo 3.1 para el almacenamiento de campos cifrados, realice una copia de seguridad recuperable de la base de datos y planifique una copia de seguridad segura de la clave de cifrado **por separado de la base de datos**. Pruebe los procedimientos de restauración antes de modificar los datos de producción.

La clave se almacena en `var/data-at-rest/master.key`, fuera de la raíz web pública. Nunca la publique, la pegue en una solicitud de soporte ni la confirme en Git. Perder la clave original puede hacer que los datos cifrados sean ilegibles. No genere una clave de sustitución si ya hay datos de usuario cifrados.

## Inicializar la clave

Ejecute el comando una vez en modo de vista previa:

```bash
php bin/console chamilo:security:initialize-at-rest-key
```

Si indica que no existen datos cifrados y que la clave puede aprovisionarse, inicialícela de forma explícita:

```bash
php bin/console chamilo:security:initialize-at-rest-key --apply
```

Si el comando informa de una clave compatible existente, no se realiza ninguna sustitución. Si existen filas cifradas pero la clave falta o no coincide, **deténgase** y recupere la clave original.

## Elegir los campos protegidos

Abra **Administración > Configuración > Seguridad** y seleccione **Biografía**, **Teléfono** y/o **Dirección** en el ajuste de campos de usuario cifrados. Seleccione solo los campos que pretenda proteger. Las nuevas escrituras en los campos seleccionados utilizan cifrado autenticado (libsodium XChaCha20-Poly1305); los registros heredados en texto claro siguen siendo legibles hasta que se rellenen de forma explícita.

## Inspeccionar y rellenar los datos existentes

Los comandos de relleno no modifican los registros sin `--apply`. Prefiera un único usuario de control de calidad antes de un lote más amplio:

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=address --user-id=102
```

Tras verificar la disponibilidad de la clave, la selección de campos, las copias de seguridad y la cuenta de control de calidad, ejecute una prueba piloto intencionada:

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102 --apply
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102 --apply
```

Sustituya `102` por un identificador real de usuario de prueba. Para conjuntos de datos más grandes, utilice el argumento opcional `--batch-size` (1–500), revise la salida del comando y el comportamiento de la aplicación, y planifique los lotes durante una ventana de mantenimiento. No ejecute un relleno de toda la base de datos sin una estrategia de reversión probada.

## Limitaciones operativas

- Esta es la primera fase del cifrado a nivel de campo, no un cifrado completo de la base de datos.
- Las integraciones y exportaciones antiguas mediante SQL directo pueden no saber cómo leer los valores cifrados; verifíquelas antes del despliegue.
- Una copia de seguridad de la base de datos **sin** una clave recuperable correspondiente es insuficiente.
- No registre el contenido en bruto de los campos ni incluya material de la clave en los diagnósticos.
- Revertir únicamente el código de la aplicación no descifra los valores almacenados.

Consulte [Configuración de seguridad](../platform-settings/security-settings.md) para conocer las opciones generales de seguridad de la plataforma. Implementación: [Chamilo LMS PR #9491](https://github.com/chamilo/chamilo-lms/pull/9491).