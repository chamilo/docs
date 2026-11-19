# BuyCourses: pagos y servicios recurrentes

El complemento **BuyCourses** vende el acceso a cursos y sesiones y puede ofrecer servicios de pago. Los métodos de pago dependen de las pasarelas que se hayan configurado para la instalación.

## Configuración de pagos

Abra **Administración > Complementos > BuyCourses** y acceda a su área de configuración de pagos. Mantenga las credenciales de la pasarela en el servidor, no en una página visible para el alumnado. Los métodos existentes, como Stripe y PayPal, siguen funcionando de forma independiente de BTCPay Server.

### BTCPay Server (compras de cursos y sesiones)

El complemento también admite **BTCPay Server** para la compra de cursos y sesiones:

1. Active el método de pago BTCPay en la configuración de BuyCourses.
2. Establezca la **URL del servidor**, el **ID de la tienda**, la **clave de API Greenfield** y el **secreto del webhook** de BTCPay.
3. Utilice la **prueba de conexión** de la configuración de pagos para confirmar el acceso a la API Greenfield.
4. Configure el webhook en el extremo de BTCPay utilizando la URL de webhook que muestra el complemento y el mismo secreto.
5. Complete una compra de prueba de importe reducido antes de ofrecer esta opción al alumnado.

El comprador es redirigido al proceso de pago alojado en BTCPay. Chamilo verifica las firmas del webhook y vuelve a recuperar la factura para validar la **tienda, el importe, la moneda y los datos del pedido** antes de marcar el pedido como pagado e inscribir al comprador. El retorno del navegador puede conciliar un webhook omitido o retrasado. Las notificaciones repetidas no generan un cumplimiento duplicado.

Solo los pagos liquidados verificados (incluidos los sobrepagos aceptados y las facturas liquidadas marcadas explícitamente por un administrador) conceden acceso. **Los pagos parciales, tardíos, caducados o no válidos no deben tratarse como cumplidos automáticamente**; los pagos excepcionales requieren una revisión manual.

**Instalaciones existentes:** ejecute una vez el procedimiento de actualización del complemento para crear `plugin_buycourses_btcpay_account`. Un administrador puede abrir `/plugin/BuyCourses/update.php` o guardar la configuración de pago de BTCPay, lo que también garantiza que exista la tabla del complemento. Esta actualización es específica de BuyCourses y no constituye una migración global de la base de datos.

BTCPay **no** se documenta aquí como pasarela de servicios recurrentes; no dé por supuesto que implementa renovaciones automáticas de suscripción al estilo de Stripe o PayPal.

## Ciclo de vida de los servicios recurrentes

El alumnado puede utilizar **Mis servicios** para consultar sus servicios recurrentes activos y su historial de compras y pagos. En el caso de los servicios con renovaciones automáticas admitidas:

* Cada pago de renovación tiene su propio registro histórico y su propio recibo.
* Cancelar una renovación impide cargos futuros, pero deja el servicio de pago accesible hasta que expire el periodo ya abonado.
* Los administradores también pueden cancelar renovaciones desde el **informe de ventas de servicios**.
* Una suscripción recurrente activa, pendiente o de otro modo vigente está protegida frente a compras duplicadas.
* Un servicio caducado o cancelado por completo puede volver a comprarse.

El **historial de compras** y el **historial de pagos** son independientes: una sola compra de servicio puede tener varios pagos de renovación. No deduzca que un pago renovado constituye una segunda compra.

## Totales de pago de las ventas de servicios

En el **informe de ventas de servicios** del administrador, dos columnas ayudan a distinguir el importe original del pedido de los pagos cobrados a lo largo del tiempo:

* **Último pago** muestra la fecha del pago correcto más reciente registrado para esa venta de servicio. Si no hay ninguna fecha de pago disponible, el informe muestra un guion.
* **Total cobrado** muestra el importe inicial de la compra cobrado más los importes de renovación correctos registrados, con el formato de la moneda del servicio. No equivale al precio de un único periodo de facturación.

El cálculo utiliza el historial de auditoría de la venta del servicio, evita contar eventos de renovación duplicados y tiene en cuenta el cargo inicial de la suscripción de Stripe sin contabilizarlo dos veces. En casos excepcionales de pago o reembolso, concilie el informe con el proveedor de pagos; el importe mostrado no es un pago de la pasarela ni un libro mayor de reembolsos independiente.

## Suscripciones históricas de Stripe

BuyCourses puede conciliar el historial de facturas de Stripe de servicios recurrentes antiguos cuyas transacciones de renovación no se registraron por completo en el registro de auditoría del complemento. La vista **Mis servicios** y el informe de ventas de servicios pueden actualizar esos registros y el periodo abonado y los totales conocidos localmente. Los administradores deben verificar las diferencias excepcionales del historial de pagos con Stripe en lugar de editar las ventas directamente.

## Filtrado de los informes de ventas

El **informe de ventas de cursos y sesiones** puede filtrarse por estado del pedido, usuario, intervalo de fechas o correo electrónico. Los filtros opcionales de producto permiten acotar los resultados por tipo de producto y nombre de producto. El **informe de ventas de servicios** admite el filtrado por estado, además de la búsqueda por usuario, correo electrónico, nombre o referencia de pedido, y una búsqueda por nombre de servicio. Revise los filtros activos antes de exportar o conciliar las ventas; las dos pantallas de informe tienen controles de filtro distintos.

Consulte [Filtros de ventas de BuyCourses, PR #9387](https://github.com/chamilo/chamilo-lms/pull/9387).

## Ciclo de vida de los cursos vinculados a suscripciones y salvaguardas de eliminación

BuyCourses puede cerrar, ocultar y reactivar los cursos asociados a suscripciones de servicios recurrentes a medida que cambia su estado de pago. En el **Subscription behavior JSON** de un servicio, `hide_after_days` especifica el retraso tras el cierre antes de ocultar un curso (30 días de forma predeterminada), mientras que `delete_after_days` especifica el retraso tras ocultarlo antes de la eliminación permanente. La eliminación está desactivada de forma predeterminada (`null`); solo un valor positivo hace que un curso sea elegible.

Los administradores pueden revisar los cursos elegibles, pendientes y bloqueados en `/admin/buycourses/course-lifecycle`. La interfaz admite una simulación no destructiva y la eliminación selectiva de **un curso elegible por ejecución**, protegida por una confirmación explícita. El procesador de CLI `chamilo:buycourses:process-recurring-subscriptions` también admite `--dry-run`, `--delete-expired` y `--max-deletions` (1–25). Sin `--delete-expired`, no elimina cursos de forma permanente.

**La eliminación permanente es destructiva.** Conserve copias de seguridad y pruebe primero con cursos desechables. Las comprobaciones de elegibilidad protegen las ventas activas, los cursos vinculados a sesiones y la titularidad inconsistente; la eliminación automática está bloqueada en instalaciones con varias URL de acceso. Revise el comportamiento concurrente de renovación y eliminación antes de programar una limpieza destructiva en producción. Consulte [PR del ciclo de vida de cursos de suscripción #9442](https://github.com/chamilo/chamilo-lms/pull/9442).

## Comprobaciones operativas

Tras actualizar, pruebe una compra completa de curso, una compra de sesión si se vende, un webhook retrasado o reproducido, facturas de BTCPay caducadas y parciales, una renovación automática y una cancelación con acceso vigente hasta el final del periodo pagado. Mantenga las credenciales y los secretos de webhook fuera de capturas de pantalla, registros y tickets de soporte.

## Endurecimiento de los pagos

### Comprobación del importe de la pasarela (Redsys / Cecabank)

Cuando el banco notifica a la plataforma que un pago se ha realizado correctamente, BuyCourses compara el importe cobrado por el banco (en céntimos, a partir de la notificación firmada) con el precio de la venta. Si difieren, la notificación se rechaza, la venta permanece pendiente y se escribe una línea `[BuyCourses] Redsys notification refused` o `[BuyCourses] Cecabank notification refused` en el registro de errores de PHP. Los pagos normales no se ven afectados.

Si una venta permanece pendiente aunque el comprador haya pagado, revise el registro: un precio modificado después de crear el pedido, o un pago parcial, aparecerá allí. Complete dicha venta manualmente desde el informe de ventas una vez verificada.

### Tokens de seguridad

* Los formularios de cupones (añadir / configurar), el formulario público de tarjetas de planes y las acciones de liquidación utilizan el mismo token de administración de BuyCourses que cualquier otra página de administración del plugin. Un formulario dejado abierto durante mucho tiempo sigue funcionando mientras la sesión esté activa; tras cerrar sesión y volver a iniciarla, recargue la página antes de guardar (de lo contrario, se muestra el mensaje «Not validated»).
* La página «solicitar factura» (`request_invoice.php`) y el disparador web de `process_recurring_subscriptions.php` necesitan el token en el enlace (`buycourses_admin_sec_token=...`). Los enlaces que se hayan marcado como favoritos o enviado por correo sin él muestran «Not validated». La ejecución por línea de comandos/cron (`php .../process_recurring_subscriptions.php` o el comando de consola) no cambia y no necesita token.
* Las páginas de éxito (PayPal, Stripe, suscripciones, servicios) solo muestran una venta al usuario que la compró.
* Las acciones de liquidación (pago masivo de PayPal, cancelación de una liquidación) están restringidas a los administradores de la plataforma (los administradores de sesión ya no se aceptan) y deben enviarse como POST con el token.

### Fechas

La fecha de finalización de una venta de suscripción se calcula ahora siempre en UTC, al igual que la fecha de la venta, sea cual sea la zona horaria del servidor.

### Límites multi-URL

Los límites de creación de cursos y de alojamiento aplicados cuando un servicio caduca siguen la misma regla que el resto de la plataforma: un ajuste bloqueado, o marcado como no modificable, en la URL principal no puede ser anulado por otra URL.

Cambios: [BTCPay #9286](https://github.com/chamilo/chamilo-lms/pull/9286), [servicios recurrentes #9288](https://github.com/chamilo/chamilo-lms/pull/9288), [conciliación de Stripe #9293](https://github.com/chamilo/chamilo-lms/pull/9293), [totales de ventas de servicios #9220](https://github.com/chamilo/chamilo-lms/pull/9220).