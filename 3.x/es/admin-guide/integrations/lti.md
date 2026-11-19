# LTI 1.3

**LTI** (Learning Tools Interoperability) es un estándar que permite integrar herramientas de aprendizaje externas en Chamilo. La versión 1.3 es la versión más reciente y segura del estándar.

Esta herramienta también está disponible desde el bloque [Plataforma](../platform/README.md) del panel de administración, como **Herramientas externas (LTI)**.

## Qué permite LTI

Con LTI puede integrar herramientas externas en los cursos de Chamilo. Ejemplos:

* Simulaciones interactivas
* Herramientas de evaluación especializadas
* Herramientas de creación de contenidos
* Laboratorios virtuales
* Bibliotecas de contenidos de terceros

La herramienta externa aparece de forma integrada en la interfaz de Chamilo.

## Configuración de una herramienta LTI

### Como administrador

1. Acceda a la configuración de LTI en el panel de administración
2. **Registre la herramienta externa** proporcionando:
   * **Nombre de la herramienta** — Un nombre descriptivo
   * **URL de inicio de sesión** — La URL de inicio de sesión OIDC de la herramienta externa
   * **URL de redirección** — La URL de lanzamiento a la que la herramienta vuelve tras el inicio de sesión
   * **ID de cliente** — Proporcionado por el proveedor de la herramienta
   * **URL del conjunto de claves públicas (URL JWKS)** — El punto de conexión JWKS de la herramienta para el intercambio de claves de seguridad
3. Configure la **devolución de calificaciones** — Si la herramienta puede enviar calificaciones a Chamilo
4. Guarde

### Como docente

Una vez habilitado el complemento **ImsLti**, los docentes con permisos de edición del curso pueden configurar herramientas externas en su curso:

1. Abra la configuración de **Herramientas externas (LTI)** del curso. El formulario específico del curso admite tanto integraciones **LTI 1.3** como las heredadas **LTI 1.0/1.1**; elija la versión que corresponda al proveedor de la herramienta.
2. Añada una herramienta o seleccione una herramienta reutilizable puesta a disposición por el administrador. Para LTI 1.3, introduzca la información de lanzamiento y autenticación del proveedor; el formulario admite una URL de conjunto de claves públicas o una clave RSA, así como los servicios opcionales Assignment and Grade Services (AGS) y Names and Role Provisioning Services (NRPS).
3. Guarde la herramienta. Según su configuración de enlace profundo, Chamilo añade el acceso directo correspondiente al curso. Las herramientas ya añadidas se muestran por separado de las herramientas globales disponibles.
4. Para modificar una herramienta existente, utilice su acción **Editar** desde el mismo contexto del curso. La configuración comprueba que la herramienta pertenece al curso; una herramienta asociada a otro curso no puede editarse indicando su ID.

El formulario conserva el contexto del curso al volver de las acciones de añadir o editar y muestra la información de validación en la página de configuración.

## Seguridad

LTI 1.3 utiliza:

* **OAuth 2.0** para la autenticación
* **JSON Web Tokens (JWT)** para la firma de mensajes
* **Pares de claves pública y privada** para la verificación

Esto significa que las credenciales nunca se comparten directamente entre Chamilo y la herramienta externa.

## Devolución de calificaciones y evaluaciones

Las herramientas LTI pueden enviar calificaciones a Chamilo, que pueden integrarse en las **Evaluaciones** (Gradebook) del curso. Para LTI 1.3, configure la opción **Assignment and Grade Services (AGS)** del proveedor al crear o editar la herramienta externa. Debe existir ya una evaluación del curso si desea vincularla a una evaluación del Gradebook.

La acción **Añadir al Gradebook** del complemento abre la vista moderna del Gradebook en el **contexto actual del curso o de la sesión**. Muestra un formulario de evaluación con un desplegable **Herramienta**, en lugar del formulario de evaluación heredado anterior. Seleccione una herramienta LTI disponible, compruebe el título y los valores de calificación, y guarde.

* Una herramienta solo se ofrece cuando está asignada al contexto actual del curso o de la sesión y aún no está vinculada a una evaluación del Gradebook.
* Una evaluación del Gradebook puede vincularse a una herramienta LTI **al crearla**, no cambiando una evaluación existente a otra herramienta.
* Si no se encuentran herramientas elegibles, el formulario no ofrece una herramienta no relacionada de otro curso.

Consulte [Evaluaciones](../../teacher-guide/assessing-learners/gradebook.md) para el flujo de trabajo habitual de calificación. Las correcciones de la integración del contexto del curso y del Gradebook se registran en [PR #9196](https://github.com/chamilo/chamilo-lms/pull/9196) y [PR #9197](https://github.com/chamilo/chamilo-lms/pull/9197).

## Consejos

* **Compruebe la compatibilidad de la herramienta** — Prefiera LTI 1.3 para las nuevas integraciones; Chamilo también expone la configuración heredada de LTI 1.0/1.1 cuando una herramienta lo requiere.
* **Pruebe en un entorno de pruebas** — Pruebe la integración LTI en un curso de prueba antes de usarla en producción
* **Supervise el rendimiento** — Las herramientas externas añaden dependencias de red. Asegúrese de que la herramienta sea ágil y fiable.