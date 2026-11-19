# Emisión y verificación de Open Badges 2.0

Chamilo 3.1 puede publicar credenciales **Open Badges 2.0** para las competencias adquiridas, incluida una imagen de insignia que incorpora una aserción incrustada en los metadatos PNG. La verificación de insignias utiliza puntos de acceso públicos de insignia, aserción y emisor.

## Configurar el emisor y las competencias

1. Establezca el **nombre de la institución** de la plataforma y un **correo electrónico de contacto del administrador** válido; ambos son obligatorios en el perfil del emisor.
2. Configure la competencia con un título, una descripción y los criterios de la insignia.
3. Adjunte una imagen de insignia PNG válida cuando corresponda. Chamilo también puede utilizar su imagen de insignia predeterminada si la competencia no tiene un recurso personalizado.
4. Otorgue o valide la adquisición de la competencia para el estudiante mediante el flujo de trabajo habitual de competencias.

Las credenciales dependen de la relación de competencia adquirida. Una aserción de competencia revocada o que ya no está adquirida se notifica como revocada. Los recursos de competencia e insignia se limitan a la URL de acceso correspondiente.

## Datos públicos de verificación

Cada emisión dispone de una aserción alojada. Las URL relacionadas se derivan de la raíz pública de la aplicación e incluyen:

- `main/skills/assertion.php?issue=<issue-id>` — aserción JSON de una emisión de competencia concreta.
- `main/skills/class.php?id=<skill-id>` — metadatos de la clase de insignia, incluidos los criterios y la referencia del emisor.
- `main/skills/issuer.php` — perfil de la institución emisora.
- `main/skills/image.php?id=<skill-id>` — recurso de imagen de la insignia.

Las URL generadas exactas dependen de la ruta base pública de la instalación. La aserción incluye un hash con sal del correo electrónico del destinatario en lugar de publicar la dirección de correo en texto plano, e identifica al emisor y la competencia adquirida. El PNG de la insignia puede incluir la aserción en un fragmento iTXt `openbadges`.

## Validar una insignia emitida

Abra los puntos de acceso de la aserción alojada, la clase de insignia y el emisor sin una sesión iniciada. Deben devolver una credencial vinculada coherente. Descargue el PNG emitido mediante el flujo de exportación compatible de la competencia y compruebe que su aserción incrustada coincide con la representación alojada. Si la competencia está revocada, compruebe que la verificación refleje su estado revocado.

Un PNG que solo contiene el diseño visual de la insignia **no** demuestra una credencial válida. No confunda la emisión de Open Badges 2.0 con la funcionalidad no relacionada de certificados o PDF firmados.

Consulte [Gestión de competencias](managing-skills.md) y [Verificación de certificados firmados](../maintenance/signed-certificate-verification.md). Implementación: [PR #9346](https://github.com/chamilo/chamilo-lms/pull/9346).