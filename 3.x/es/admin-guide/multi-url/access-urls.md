# URLs de acceso

Las URLs de acceso permiten que una única instalación de Chamilo sirva varios portales independientes.

Esta herramienta también es accesible desde el bloque [Plataforma](../platform/README.md) del panel de administración, como **Configurar múltiples URL de acceso**.


## Casos de uso

* **Despliegues multiinquilino** — Alojar portales de formación independientes para distintas organizaciones en un único servidor
* **Portales departamentales** — Dar a cada departamento su propio portal con marca (p. ej., `hr.training.company.com`, `it.training.company.com`)
* **Portales regionales** — Portales separados para distintas regiones o idiomas

## Cómo funciona

Cada URL de acceso es un punto de entrada independiente a la misma instalación de Chamilo:

* Los usuarios pueden asignarse a una o más URLs de acceso
* Los cursos y las sesiones pertenecen a URLs de acceso concretas
* Los ajustes de la plataforma pueden personalizarse por URL de acceso
* La marca y los temas pueden diferir por URL
* Los usuarios de un portal no pueden ver usuarios ni cursos de otro (salvo que se compartan de forma explícita)

## Configuración

### Activación de múltiples URL

Las múltiples URL deben activarse en la configuración de Chamilo (normalmente en los ajustes de entorno). Esto suele hacerse durante la instalación inicial.

### Creación de una URL de acceso

1. Desde el panel de administración, vaya a **URLs de acceso**
2. Haga clic en **Añadir URL**
3. Introduzca la URL (p. ej., `https://portal2.yoursite.com`) y una descripción
4. Opcionalmente, elija una **URL padre** para anidar esta URL bajo otra — véase [Jerarquía de URL](#url-hierarchy) más abajo
5. Guarde

### Asignación de usuarios y cursos

* **Usuarios** — Asigne usuarios a URLs de acceso concretas. Un usuario puede pertenecer a varias URLs.
* **Cursos** — Asigne cursos a URLs de acceso concretas
* **Sesiones** — Asigne sesiones a URLs de acceso concretas

### Ajustes por URL

Cada URL de acceso puede tener los suyos:

* **Tema de color** — Distinta identidad visual
* **Nombre y logotipo de la plataforma** — Identidad personalizada
* **Sobrescrituras de ajustes** — Determinados ajustes de la plataforma pueden personalizarse por URL

## Jerarquía de URL

Las URLs de acceso pueden organizarse en un árbol padre/hijo en lugar de una lista plana. Al crear o editar una URL, un administrador global sin restricciones (véase [Administradores de subárbol](#subtree-administrators) más abajo) puede elegir cualquier otra URL como **URL padre**:

![Diálogo de edición de URL con el desplegable URL padre abierto, que enumera las demás URLs de acceso disponibles como padre](/.gitbook/assets/admin-access-url-parent-select.png)

* El desplegable nunca ofrece la URL que se está editando, ni ninguno de sus propios descendientes, como posible padre — esto evita crear un ciclo. El backend vuelve a validarlo con independencia de lo que muestre la interfaz.
* Si se crea una URL sin elegir un padre, se asigna por defecto a la **URL solo de inicio de sesión** si existe (véase [Ajustes por URL](#per-url-settings) más arriba), o en caso contrario a la primera URL de acceso — el mismo comportamiento por defecto que existía antes de esta funcionalidad.
* La URL más alta de un árbol — la que no tiene padre — es la **raíz** de ese árbol. Una única instalación de Chamilo puede alojar más de un árbol independiente.

Donde se listan las URLs de acceso — el panel de múltiples URL y la página de gestión de URLs de acceso — el árbol se muestra mediante sangría, un padre seguido inmediatamente de sus propios hijos (hermanos ordenados alfabéticamente), en lugar de una columna «Padre» independiente:

![Lista de URLs de acceso que muestra una URL raíz con dos URLs hijas, una de las cuales tiene su propia URL hija, sangradas para reflejar la jerarquía](/.gitbook/assets/admin-access-url-hierarchy-list.png)

## Administradores de subárbol

La jerarquía de URL también determina lo que puede gestionar un [administrador global](../users/user-roles.md):

* Uno registrado en la URL **raíz** de un árbol es **sin restricciones**: gestiona todas las URLs de acceso, exactamente igual que antes de existir esta funcionalidad.
* Uno registrado solo en una URL **no raíz** está **acotado**: las páginas de múltiples URL y de URLs de acceso solo muestran esa URL y sus descendientes, y el gráfico de inicios de sesión del panel de múltiples URL indica «Inicios de sesión (sus URLs)» en lugar de «Inicios de sesión (todas las URLs combinadas)».

Con independencia del alcance, lo siguiente queda reservado a un administrador global **sin restricciones** — un administrador acotado no puede realizarlo ni siquiera para las URLs de su propio subárbol:

* Crear una nueva URL de acceso
* Editar la propia URL, la descripción o el padre de una URL de acceso
* Activar o desactivar una URL de acceso
* Eliminar una URL de acceso (la URL raíz de toda la instalación no puede eliminarse nunca, por nadie)
* Registrarse a sí mismos en todas las URLs de acceso a la vez

Un administrador acotado sigue pudiendo gestionar todo lo *asignado a* las URLs de su subárbol — usuarios, cursos, sesiones, marca y ajustes — pero no las entradas de las URLs de acceso en sí.

## Consejos

* **Decida con antelación** — Si elige una configuración de múltiples URL, debe hacerlo al inicio de su proyecto Chamilo, ya que requiere dejar la primera URL relativamente vacía de contenido. Habilitar múltiples URL a posteriori es más complicado (requiere cambios manuales en las bases de datos).
* **Planifique la estructura de URL** — Decida el esquema de URL antes de crear las URL de acceso, ya que cambiar las URL más adelante afecta a todos los enlaces y marcadores existentes
* **Configuración DNS** — Cada URL de acceso debe resolverse hacia el mismo servidor Chamilo. Configure los registros DNS en consecuencia.
* **Administrador global** — Utilice el rol de Administrador global para gestionar todas las URL de acceso. Para delegar la gestión de una sola rama, registre al administrador en una URL que no sea la raíz — consulte [Administradores de subárbol](#subtree-administrators)