# Comprobador de fortaleza de contraseñas

El Comprobador de fortaleza de contraseñas compara los hashes de contraseña almacenados de los usuarios activos con una lista breve de contraseñas de uso habitual (`123456`, `password`, `qwerty123` y similares). Nunca muestra ni transmite las contraseñas en sí: solo indica si la contraseña actual de un usuario coincide con uno de los candidatos conocidos como débiles.

## Acceso al Comprobador de fortaleza de contraseñas

Desde el panel de administración, haga clic en **Seguridad > Comprobador de fortaleza de contraseñas**.

## Ejecución de un análisis

![La página del comprobador de fortaleza de contraseñas, con un campo para los ID de usuario que se van a analizar y un botón para ejecutar el análisis](/.gitbook/assets/admin-security-password-strength.png)

* Deje **ID de usuario que analizar** vacío para analizar a todos los usuarios activos, o introduzca una lista de ID de usuario separados por comas para comprobar un subconjunto
* Haga clic en **Ejecutar análisis de fortaleza de contraseñas**

El análisis se ejecuta de forma asíncrona en segundo plano para no bloquear la página y muestra el progreso en tiempo real (usuarios verificados hasta el momento, respecto al total, y cuántas contraseñas débiles se han encontrado). Dado que cada contraseña candidata debe comprobarse frente al hash de cada usuario seleccionado, analizar a todos los usuarios en una plataforma grande puede tardar un tiempo: la lista de candidatos se mantiene deliberadamente corta para limitar este coste.

## Actuación sobre los resultados

![Los resultados del análisis completado, con un usuario marcado que muestra las columnas Nombre, Nombre de usuario y Correo electrónico, y acciones por fila para solicitar un cambio de contraseña o forzar un restablecimiento de contraseña](/.gitbook/assets/admin-security-password-strength-results.png)

Cuando el análisis termina, los usuarios marcados se listan con dos acciones disponibles, ya sea por usuario o como acción masiva para todos los usuarios seleccionados:

* **Solicitar cambio de contraseña** (icono de sobre) — Envía al usuario un correo electrónico pidiéndole que cambie su contraseña
* **Forzar restablecimiento de contraseña** (icono de restablecimiento) — Invalida de inmediato la contraseña actual del usuario y le envía por correo electrónico una nueva

Ambas acciones vuelven a verificar a los usuarios seleccionados frente a la lista de contraseñas débiles antes de actuar, de modo que una solicitud obsoleta o manipulada no pueda usarse para restablecer una cuenta que ya no tenga una contraseña débil.

## Uso recomendado

* Ejecute este análisis periódicamente, especialmente después de una importación masiva de usuarios (las cuentas importadas a veces llegan con contraseñas predeterminadas simples)
* Combínelo con los ajustes **Requisitos mínimos de sintaxis de contraseña** e **Intervalo de rotación de contraseñas** en [Ajustes de seguridad](../platform-settings/security-settings.md) para evitar que se establezcan contraseñas débiles de antemano, en lugar de detectarlas solo a posteriori