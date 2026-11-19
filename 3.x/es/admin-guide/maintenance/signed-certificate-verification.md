# Verificación de certificados firmados

Chamilo puede emitir **credenciales firmadas digitalmente** para los certificados del libro de calificaciones y, opcionalmente, anclar una huella digital de la credencial en la **red de pruebas Sepolia de Ethereum**. La firma y la página de verificación son distintas de los certificados PDF ordinarios.

## Habilitar credenciales firmadas

En **Administración > Parámetros de configuración > Certificados**, habilite `certificate.blockchain_verification_enabled` si su institución pretende utilizar esta función. Está deshabilitada de forma predeterminada. El portal debe utilizar HTTPS para emitir credenciales.

## El consentimiento del estudiante es prioritario

El titular de un certificado abre **Mis certificados** y elige explícitamente **Aprobar publicación**. El consentimiento abarca una credencial verificable públicamente que muestra el nombre del titular, el curso, la puntuación y la fecha de emisión, y opcionalmente la huella digital SHA-256 en Sepolia. La aprobación no es automática. El estudiante puede seleccionar posteriormente **Retirar consentimiento**; la retirada afecta a la validez mostrada por la página de verificación, pero **no puede borrar una huella digital de blockchain ya confirmada**.

## Emitir, verificar y revocar

Un administrador de la plataforma autenticado directamente puede utilizar la lista **Certificados** del libro de calificaciones para emitir la credencial firmada una vez que su titular haya dado su consentimiento. El enlace de verificación resultante utiliza `/certificates/verify/{token}`; también está disponible una respuesta de verificación `.json`. La página comprueba la firma criptográfica, el consentimiento, la revocación, la caducidad y si la información del certificado subyacente sigue coincidiendo con la fuente firmada.

Si una credencial se revoca, se retira el consentimiento, el certificado cambia o la firma no es válida, el verificador indica ese estado en lugar de informar de una credencial válida.

## Anclaje opcional en Sepolia

Un administrador puede elegir **Anclar en la red de pruebas Sepolia** mediante un monedero de navegador compatible o **Confirmar transacción existente de Sepolia** para conciliar una transacción pendiente. El monedero debe estar conectado a Sepolia (identificador de cadena `11155111`). La aplicación confirma la transacción mediante un **punto de conexión RPC HTTPS de Sepolia** configurado en el servidor (`CHAMILO_CERTIFICATE_SEPOLIA_RPC_URL`). No se acepta ninguna URL de RPC suministrada en la solicitud.

Solo se ancla la huella digital de la credencial; los datos personales no se envían como datos de la transacción. Sepolia es una **red de pruebas**. Sus registros y su disponibilidad no deben presentarse como una garantía de blockchain pública de nivel de producción. Almacene de forma segura las claves de la institución y la configuración RPC, y planifique procedimientos de recuperación de claves y de revocación de credenciales.

Implementación: [Verificación de credenciales de certificados #9298](https://github.com/chamilo/chamilo-lms/pull/9298).