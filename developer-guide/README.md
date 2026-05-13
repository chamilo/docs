# Guía para Desarrolladores

Bienvenido a la Guía para Desarrolladores de Chamilo 2.0. Esta guía está dirigida a desarrolladores que desean comprender la arquitectura de Chamilo, extender la plataforma con complementos, utilizar la API, personalizar la interfaz o contribuir al proyecto.

## Arquitectura de un Vistazo

Chamilo 2.0 está construido sobre:

* **Backend**: Symfony 6.4 (PHP 8.2+) con Doctrine ORM y API Platform 3.0
* **Frontend**: Vue 3 con PrimeVue, gestión de estado con Pinia y Vue Router
* **Sistema de compilación**: Webpack 5 a través de Symfony Webpack Encore, con Tailwind CSS
* **Autenticación**: Tokens JWT (lexik/jwt-authentication-bundle)
* **Almacenamiento de archivos**: Flysystem (soporta local, AWS S3, Azure Blob, Google Cloud)

El código base está organizado en tres bundles de Symfony:

| Bundle | Propósito |
|--------|-----------|
| **CoreBundle** | Núcleo de la plataforma: usuarios, configuraciones, recursos, administración, proveedores de IA, seguridad |
| **CourseBundle** | Funcionalidades específicas de cursos: documentos, ejercicios, rutas de aprendizaje, foros, etc. |
| **LtiBundle** | Integración de LTI 1.3 para herramientas de aprendizaje externas |

## Cómo Está Organizada Esta Guía

1. **Primeros Pasos** — Pila tecnológica, configuración de desarrollo, estructura del proyecto
2. **Backend** — Arquitectura de Symfony, entidades, sistema de recursos, controladores, configuraciones
3. **API** — API REST a través de API Platform, autenticación JWT, acciones personalizadas
4. **Frontend** — Componentes de Vue, vistas, enrutamiento, gestión de estado, sistema de compilación
5. **Temas** — Temas de color, CSS/Tailwind, plantillas Twig
6. **Complementos** — Arquitectura y desarrollo de complementos
7. **Contribuir** — Convenciones de codificación, flujo de trabajo con git, pruebas