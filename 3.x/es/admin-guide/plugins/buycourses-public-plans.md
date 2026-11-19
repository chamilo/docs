# Planes públicos y promocionales de BuyCourses

El complemento **BuyCourses** puede mostrar un plan gratuito público junto con tarjetas promocionales que conducen a ofertas externas. Esto es independiente del flujo de compra de cursos o sesiones de pago del complemento y de la configuración de pago de los servicios recurrentes.

## Configurar planes públicos

1. Abra el área de administración de BuyCourses y su editor de tarjetas de planes públicos.
2. En el plan **Gratuito**, elija si **Mostrar gratuito** está habilitado.
3. Introduzca el título, la descripción y la lista de características traducidos del plan gratuito mediante las pestañas de idioma.
4. Añada tarjetas promocionales según sea necesario. Configure el estado de habilitación, la posición, la URL de destino, la URL de imagen opcional y el título, la descripción, las características y el texto del botón traducidos de cada tarjeta.
5. Guarde y, a continuación, utilice el enlace de vista previa o catálogo disponible para revisar la presentación pública en cada idioma configurado.

El editor guarda el contenido traducido para varios idiomas. Una tarjeta promocional es un **enlace a una oferta externa**, no una prueba de un pago completado ni una suscripción automática en Chamilo.

## Límites de creación de cursos

El plan gratuito utiliza los límites estándar de creación de cursos de la plataforma. BuyCourses distingue las asignaciones estándar de cursos de las asignaciones de cursos de pago. Cuando se configura un límite finito, la interfaz de creación de cursos puede mostrar el uso y el progreso; los planes ilimitados no necesitan un indicador de porcentaje.

Pruebe los límites con una cuenta que solo tenga la asignación estándar y con una que tenga la asignación de pago aplicable. Una tarjeta promocional pública nunca debe eludir los permisos de creación de cursos del lado del servidor.

## Comportamiento de los pagos

Las tarjetas de planes públicos no sustituyen a BTCPay, Stripe, PayPal ni los flujos establecidos de compra de cursos y servicios recurrentes del complemento. Siga gestionando y probando las pasarelas de pago en la configuración existente de BuyCourses.

Consulte [BuyCourses: pagos y servicios recurrentes](buycourses.md). Implementación: [PR #9369](https://github.com/chamilo/chamilo-lms/pull/9369).