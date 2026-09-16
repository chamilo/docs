# LTI 1.3

**LTI** (Learning Tools Interoperability) es un estándar que permite incrustar herramientas de aprendizaje externas dentro de Chamilo. La versión 1.3 es la más reciente y la más segura del estándar.

Esta herramienta también es accesible desde el bloque [Plataforma](../platform/README.md) del panel de administración, como **Herramientas externas (LTI)**.

## Qué permite LTI

Con LTI puede incrustar herramientas externas dentro de los cursos de Chamilo. Ejemplos:

* Simulaciones interactivas
* Herramientas de evaluación especializadas
* Herramientas de creación de contenidos
* Laboratorios virtuales
* Bibliotecas de contenidos de terceros

La herramienta externa aparece de forma integrada en la interfaz de Chamilo.

## Configuración de una herramienta LTI

### Como administrador

1. Acceda a la configuración de LTI en el panel de administración
2. **Registre la herramienta externa** indicando:
   * **Nombre de la herramienta** — Un nombre descriptivo
   * **Login URL** — La URL de inicio de sesión OIDC de la herramienta externa
   * **Redirect URL** — La URL de lanzamiento a la que la herramienta vuelve tras el inicio de sesión
   * **Client ID** — Proporcionado por el proveedor de la herramienta
   * **Public keyset URL (JWKS URL)** — El endpoint JWKS de la herramienta para el intercambio de claves de seguridad
3. Configure el **grade passback** — Si la herramienta puede devolver calificaciones a Chamilo
4. Guarde

### Como profesor

Una vez que el administrador ha registrado una herramienta LTI, los profesores pueden añadirla a sus cursos:

1. En el curso, busque la opción para añadir una herramienta externa
2. Seleccione entre las herramientas LTI registradas
3. La herramienta aparece como herramienta del curso en la página de inicio

## Seguridad

LTI 1.3 utiliza:

* **OAuth 2.0** para la autenticación
* **JSON Web Tokens (JWT)** para la firma de mensajes
* **Pares de claves pública/privada** para la verificación

Esto significa que las credenciales nunca se comparten de forma directa entre Chamilo y la herramienta externa.

## Grade passback

Las herramientas LTI pueden devolver calificaciones a Chamilo, que pueden integrarse en el libro de calificaciones del curso. Esto se configura por herramienta durante el registro.

## Consejos

* **Verifique la compatibilidad de la herramienta** — Asegúrese de que la herramienta externa admite LTI 1.3 (no solo versiones anteriores)
* **Pruebe en un entorno de pruebas** — Pruebe la integración LTI en un curso de prueba antes de usarla en producción
* **Supervise el rendimiento** — Las herramientas externas añaden dependencias de red. Asegúrese de que la herramienta sea rápida y fiable.