# LTI 1.3

**LTI** (Interoperabilidad de Herramientas de Aprendizaje) es un estándar que permite integrar herramientas de aprendizaje externas dentro de Chamilo. La versión 1.3 es la más reciente y segura de este estándar.

## Qué permite LTI

Con LTI, puedes integrar herramientas externas dentro de los cursos de Chamilo. Ejemplos:

* Simulaciones interactivas
* Herramientas de evaluación especializadas
* Herramientas de creación de contenido
* Laboratorios virtuales
* Bibliotecas de contenido de terceros

La herramienta externa se muestra de manera fluida dentro de la interfaz de Chamilo.

## Configuración de una herramienta LTI

### Como administrador

1. Navega a la configuración de LTI en el panel de administración
2. **Registra la herramienta externa** proporcionando:
   * **Nombre de la herramienta** — Un nombre descriptivo
   * **URL de inicio de sesión** — La URL de inicio de OIDC de la herramienta externa
   * **URL de redirección** — La URL de lanzamiento a la que la herramienta regresa después del inicio de sesión
   * **Client ID** — Proporcionado por el proveedor de la herramienta
   * **URL del conjunto de claves públicas (JWKS URL)** — El endpoint JWKS de la herramienta para el intercambio de claves de seguridad
3. Configura el **envío de calificaciones** — Si la herramienta puede enviar calificaciones de vuelta a Chamilo
4. Guarda los cambios

### Como docente

Una vez que una herramienta LTI ha sido registrada por el administrador, los docentes pueden añadirla a sus cursos:

1. En el curso, busca la opción para agregar una herramienta externa
2. Selecciona una de las herramientas LTI registradas
3. La herramienta aparecerá como una herramienta del curso en la página principal

## Seguridad

LTI 1.3 utiliza:

* **OAuth 2.0** para la autenticación
* **JSON Web Tokens (JWT)** para la firma de mensajes
* **Pares de claves públicas/privadas** para la verificación

Esto significa que las credenciales nunca se comparten directamente entre Chamilo y la herramienta externa.

## Envío de calificaciones

Las herramientas LTI pueden enviar calificaciones de vuelta a Chamilo, las cuales pueden integrarse en el libro de calificaciones del curso. Esto se configura por herramienta durante el registro.

## Consejos

* **Verifica la compatibilidad de la herramienta** — Asegúrate de que la herramienta externa sea compatible con LTI 1.3 (no solo con versiones anteriores)
* **Prueba en un entorno de pruebas** — Evalúa la integración de LTI en un curso de prueba antes de usarlo en producción
* **Monitorea el rendimiento** — Las herramientas externas añaden dependencias de red. Asegúrate de que la herramienta sea receptiva y confiable.