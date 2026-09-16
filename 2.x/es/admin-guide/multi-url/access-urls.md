# URLs de Acceso

Las URLs de acceso permiten que una única instalación de Chamilo sirva múltiples portales separados.

## Casos de Uso

* **Despliegues multiinquilino** — Alojar portales de formación separados para diferentes organizaciones en un solo servidor
* **Portales departamentales** — Dar a cada departamento su propio portal personalizado (por ejemplo, `hr.training.company.com`, `it.training.company.com`)
* **Portales regionales** — Portales separados para diferentes regiones o idiomas

## Cómo Funciona

Cada URL de acceso es un punto de entrada separado a la misma instalación de Chamilo:

* Los usuarios pueden ser asignados a una o más URLs de acceso
* Los cursos y sesiones pertenecen a URLs de acceso específicas
* Las configuraciones de la plataforma pueden personalizarse por URL de acceso
* La marca y los temas pueden diferir por URL
* Los usuarios de un portal no pueden ver a los usuarios ni los cursos de otro (a menos que se compartan explícitamente)

## Configuración

### Habilitar Multi-URL

La funcionalidad Multi-URL debe habilitarse en la configuración de Chamilo (generalmente en los ajustes del entorno). Esto suele hacerse durante la configuración inicial.

### Crear una URL de Acceso

1. Desde el panel de administración, navega a **URLs de Acceso**
2. Haz clic en **Agregar una URL**
3. Ingresa la URL (por ejemplo, `https://portal2.yoursite.com`)
4. Configura los ajustes específicos para esta URL
5. Guarda los cambios

### Asignar Usuarios y Cursos

* **Usuarios** — Asigna usuarios a URLs de acceso específicas. Un usuario puede pertenecer a múltiples URLs.
* **Cursos** — Asigna cursos a URLs de acceso específicas
* **Sesiones** — Asigna sesiones a URLs de acceso específicas

### Ajustes por URL

Cada URL de acceso puede tener sus propios:

* **Tema de color** — Diferente marca visual
* **Nombre y logotipo de la plataforma** — Identidad personalizada
* **Ajustes personalizados** — Ciertos ajustes de la plataforma pueden personalizarse por URL

## Consejos

* **Decide temprano** — Si optas por una configuración multi-URL, deberías hacerlo al inicio de tu proyecto de Chamilo, ya que requiere dejar la primera URL relativamente vacía de contenido. Habilitar multi-URL después es más complicado (requiere cambios manuales en las bases de datos).
* **Planifica la estructura de URLs** — Decide el esquema de tus URLs antes de crear las URLs de acceso, ya que cambiar las URLs más tarde afecta todos los enlaces y marcadores existentes
* **Configuración de DNS** — Cada URL de acceso debe resolverse al mismo servidor de Chamilo. Configura los registros DNS accordingly.
* **Administrador global** — Usa el rol de Administrador Global para gestionar todas las URLs de acceso