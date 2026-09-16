# Copias de seguridad

Las copias de seguridad regulares son esenciales para proteger los datos de Chamilo. Esta página cubre qué respaldar y cómo hacerlo.

## Qué respaldar

### 1. Base de datos

La base de datos de Chamilo contiene todos los datos de la plataforma: usuarios, cursos, seguimiento, calificaciones, mensajes y configuraciones. Este es el componente más crítico para respaldar.

**Cómo hacer una copia de seguridad:**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. Archivos

Chamilo almacena archivos subidos (documentos, imágenes, paquetes SCORM) en el sistema de archivos. Los directorios clave para respaldar son:

* `var/` — Archivos y recursos subidos
* `public/plugin/` — Archivos de complementos (solo si has añadido complementos personalizados)

Si utilizas almacenamiento en la nube (S3, Azure Blob), asegúrate de que las opciones de copia de seguridad/versionado de tu proveedor de nube estén habilitadas.

### 3. Configuración

* `.env` — Tu configuración de entorno
* `config/` — Cualquier archivo de configuración personalizado

## Programación de copias de seguridad

| Componente | Frecuencia recomendada |
|------------|------------------------|
| Base de datos | Diaria |
| Archivos | Diaria o semanal (dependiendo de la actividad de carga) |
| Configuración | Después de cualquier cambio en la configuración |

## Restauración

Para restaurar desde una copia de seguridad:

1. Restaura la base de datos desde el volcado SQL
2. Restaura los directorios de archivos
3. Restaura los archivos de configuración
4. Limpia la caché de Symfony: `php bin/console cache:clear`

## Consejos

* **Automatiza las copias de seguridad** — Usa tareas cron para ejecutar copias de seguridad automáticamente
* **Almacena fuera del sitio** — Mantén copias de seguridad en un servidor separado o en almacenamiento en la nube
* **Prueba la restauración** — Verifica periódicamente que puedes restaurar desde una copia de seguridad con éxito
* **Documenta tu proceso** — Mantén instrucciones escritas para el proceso de restauración para que cualquier miembro del equipo pueda realizarlo