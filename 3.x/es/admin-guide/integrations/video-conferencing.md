# Videoconferencia

Chamilo se integra con plataformas de videoconferencia para habilitar sesiones en directo dentro de los cursos.

## Plataformas compatibles

### BigBlueButton

**BigBlueButton** (BBB) es un sistema de webconferencia de código abierto diseñado para el aprendizaje en línea. Es la solución de videoconferencia más utilizada con Chamilo.

#### Configuración

1. Instale BigBlueButton en un servidor independiente (consulte la [documentación de BigBlueButton](https://docs.bigbluebutton.org/))
2. Use bbb-conf --salt en el servidor BBB para obtener los datos de integración
3. En la configuración de la plataforma Chamilo, **Plugins**, instale el plugin Videoconference e introduzca su configuración para definir:
   * **BBB server URL** — La dirección de su servidor BBB
   * **BBB salt/secret** — El secreto de la API de su servidor BBB
4. Guarde
5. **Active** el plugin Videoconference
6. Algunas funciones especiales están disponibles para los administradores, así que asegúrese de activarlo en la región *admin_page*

#### Funcionalidades disponibles en Chamilo

* Iniciar/unirse a reuniones desde un curso
* Creación automática de salas por curso
* Grabaciones de reuniones (si están habilitadas)
* Compartir pantalla, pizarra, salas de trabajo en grupo
* Chat junto al vídeo

### Zoom

Chamilo también puede integrarse con **Zoom** para videoconferencia.

#### Configuración

1. Cree una aplicación Zoom en Zoom Marketplace
2. En Chamilo, configure las credenciales de la API de Zoom
3. Active la integración con Zoom

#### Cómo funciona

Cuando Zoom está configurado, los profesores pueden crear e iniciar reuniones de Zoom desde su curso. Los alumnos se unen a través de la interfaz de Chamilo.

## Elegir entre BBB y Zoom

| Función | BigBlueButton | Zoom |
|---------|--------------|------|
| Coste | Gratuito (código abierto), pero requiere su propio servidor | Requiere una suscripción a Zoom |
| Alojamiento | Autohospedado | Alojado en la nube por Zoom |
| Profundidad de integración | Profunda (pensada para uso en LMS) | Estándar |
| Grabación | En el servidor, almacenada en su infraestructura | Nube de Zoom o local |
| Pizarra | Integrada | Integrada |
| Salas de trabajo en grupo | Sí | Sí |

## Consejos

* **Servidor independiente para BBB** — BigBlueButton debe ejecutarse en su propio servidor dedicado para un mejor rendimiento, no en el mismo servidor que Chamilo
* **Pruebe antes de las clases** — Pruebe siempre la configuración de videoconferencia antes de una sesión en directo
* **Compruebe el ancho de banda** — Asegúrese de que su servidor y su red pueden soportar el número previsto de usuarios concurrentes