# Páginas

Páginas es la herramienta integrada de Chamilo, de tipo CMS, para los bloques de contenido que conforman las áreas públicas de su portal — la página de inicio, el pie de página, los menús de navegación y ubicaciones similares — sin necesidad de modificar un archivo de plantilla.

## Acceso a Páginas

Desde el panel de administración, haga clic en **Plataforma > Páginas**.

## Cómo funcionan las páginas

Cada página tiene:

* **Título** y **contenido** de texto enriquecido
* Un **slug**, generado automáticamente a partir del título
* **Habilitada** — si la página está visible en este momento
* **Posición** — ordenación mediante arrastrar y soltar dentro de su categoría
* **Configuración regional** — el contenido es por idioma: la misma ubicación puede contener una página por idioma, y el sitio recurre al idioma predeterminado de la plataforma si no existe una página para el idioma del visitante
* Una **categoría** — esto es lo que determina *dónde* se renderiza la página (por ejemplo `index`, `home`, `footer_public` o `menu_links`); Chamilo crea automáticamente las categorías que necesita

En una instalación de varias URL (varios portales), las páginas también están acotadas por URL de acceso, de modo que cada portal gestiona su propio contenido.

## La página de introducción al registro

**Plataforma > Configurar la página de registro** es un acceso directo al mismo sistema de Páginas para una ubicación concreta: el texto introductorio que se muestra encima del formulario público de inscripción. Está restringido a los administradores del portal. Al hacer clic:

* Se abre la página de introducción existente para editarla, si ya existe una para su URL de acceso e idioma, o
* Se crea la ubicación sobre la marcha y se le lleva directamente a crear su contenido

Lo que guarde aquí se renderiza como un recuadro informativo justo encima del formulario de registro — un lugar natural para instrucciones, condiciones específicas de su organización o el contexto que los usuarios potenciales deberían leer antes de inscribirse. Déjela deshabilitada (o no la cree nunca) para mostrar el formulario de registro simple, sin texto introductorio.