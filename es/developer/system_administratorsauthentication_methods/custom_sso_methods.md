## Custom SSO methods

Siempre que conecte Chamilo for Single Sign On a una solución de terceros que no ofrece
compatibilidad con cualquiera de los métodos admitidos, querrá verificar main/auth/sso/ y
"extender" (en PHP) el sso.class.php (como el ejemplo de Drupal).

Estos archivos contienen explicaciones de lo que necesita agregar a su base de datos para admitir
método y cómo debe llamarlo.

Si pierde inspiración para su lado del SSO (solución de terceros), puede verificar
Código [Drupal-Chamilo project](https://www.drupal.org/project/chamilo) aquí: [http://cgit.drupalcode.org/chamilo/tree/chamilo.module#n42](http://cgit.drupalcode.org/chamilo/tree/chamilo.module#n42)

Finalmente, es posible que deba verificar en main/inc/local.inc.php el término "sso" para encontrar dónde está todo se gestiona en el proceso de inicio de sesión de Chamilo.