# Videoconferencia

Chamilo se integra con plataformas de videoconferencia para permitir sesiones en vivo dentro de los cursos.

## Plataformas Compatibles

### BigBlueButton

**BigBlueButton** (BBB) es un sistema de conferencias web de código abierto diseñado para el aprendizaje en línea. Es la solución de videoconferencia más comúnmente utilizada con Chamilo.

#### Configuración

1. Instale BigBlueButton en un servidor separado (consulte la [documentación de BigBlueButton](https://docs.bigbluebutton.org/))
2. Use el comando bbb-conf --salt en el servidor BBB para obtener los detalles de integración
3. En la configuración de la plataforma Chamilo, en **Plugins**, instale el plugin de Videoconference e ingrese su configuración para establecer:
   * **URL del servidor BBB** — La dirección de su servidor BBB
   * **Salt/secret de BBB** — El secreto de la API de su servidor BBB
4. Guarde los cambios
5. **Habilite** el plugin de Videoconference
6. Algunas funciones especiales están disponibles para los administradores, así que asegúrese de habilitarlo en la región *admin_page*

#### Funciones Disponibles en Chamilo

* Iniciar/unirse a reuniones desde dentro de un curso
* Creación automática de salas por curso
* Grabaciones de reuniones (si están habilitadas)
* Compartir pantalla, pizarra, salas de trabajo en grupo
* Chat junto al video

### Zoom

Chamilo también puede integrarse con **Zoom** para videoconferencias.

#### Configuración

1. Cree una aplicación de Zoom en el Zoom Marketplace
2. En Chamilo, configure las credenciales de la API de Zoom
3. Habilite la integración con Zoom

#### Cómo Funciona

Cuando Zoom está configurado, los profesores pueden crear y lanzar reuniones de Zoom desde dentro de su curso. Los estudiantes se unen a través de la interfaz de Chamilo.

## Elegir entre BBB y Zoom

| Característica | BigBlueButton | Zoom |
|---------------|--------------|------|
| Costo | Gratuito (código abierto), pero requiere su propio servidor | Requiere una suscripción a Zoom |
| Alojamiento | Autoalojado | Alojado en la nube por Zoom |
| Profundidad de integración | Profunda (diseñado para uso en LMS) | Estándar |
| Grabación | Lado del servidor, almacenado en su infraestructura | Nube de Zoom o local |
| Pizarra | Integrada | Integrada |
| Salas de trabajo en grupo | Sí | Sí |

## Consejos

* **Servidor separado para BBB** — BigBlueButton debe ejecutarse en un servidor dedicado propio para un mejor rendimiento, no en el mismo servidor que Chamilo
* **Pruebe antes de las clases** — Siempre pruebe la configuración de videoconferencia antes de una sesión en vivo
* **Verifique el ancho de banda** — Asegúrese de que su servidor y red puedan manejar el número esperado de usuarios concurrentes