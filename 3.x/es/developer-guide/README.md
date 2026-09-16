# Guía para desarrolladores

Bienvenido a la Guía para desarrolladores de Chamilo 3.0. Esta guía está dirigida a desarrolladores que deseen comprender la arquitectura de Chamilo, ampliar la plataforma con plugins, utilizar la API, personalizar la interfaz o contribuir al proyecto.

## Arquitectura de un vistazo

Chamilo 3.0 se basa en:

* **Backend**: Symfony 7.4 (PHP 8.3–8.5) con Doctrine ORM y API Platform 4
* **Frontend**: Vue 3 con PrimeVue, gestión de estado Pinia y Vue Router
* **Sistema de compilación**: Webpack 5 mediante Symfony Webpack Encore, con Tailwind CSS
* **Autenticación**: tokens JWT (lexik/jwt-authentication-bundle)
* **Almacenamiento de archivos**: Flysystem (admite local, AWS S3, Azure Blob, Google Cloud)

El código fuente se organiza en tres bundles de Symfony:

| Bundle | Propósito |
|--------|---------|
| **CoreBundle** | Núcleo de la plataforma: usuarios, ajustes, recursos, administración, proveedores de IA, seguridad |
| **CourseBundle** | Funcionalidades específicas de curso: documentos, ejercicios, itinerarios de aprendizaje, foros, etc. |
| **LtiBundle** | Integración LTI 1.3 para herramientas de aprendizaje externas |

## Cómo está organizada esta guía

1. **Primeros pasos** — Pila tecnológica, entorno de desarrollo, estructura del proyecto
2. **Backend** — Arquitectura Symfony, entidades, sistema de recursos, controladores, ajustes
3. **API** — REST API mediante API Platform, autenticación JWT, acciones personalizadas
4. **Frontend** — Componentes Vue, vistas, enrutamiento, gestión de estado, sistema de compilación
5. **Temas** — Temas de color, CSS/Tailwind, plantillas Twig
6. **Plugins** — Arquitectura y desarrollo de plugins
7. **Contribuir** — Convenciones de código, flujo de trabajo git, pruebas