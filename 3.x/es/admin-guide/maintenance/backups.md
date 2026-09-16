# Copias de seguridad

Las copias de seguridad periódicas son esenciales para proteger los datos de Chamilo. Esta página cubre qué respaldar y cómo hacerlo.

## Qué respaldar

### 1. Base de datos

La base de datos de Chamilo contiene todos los datos de la plataforma: usuarios, cursos, seguimiento, calificaciones, mensajes y ajustes. Este es el componente más crítico que se debe respaldar.

**Cómo realizar la copia de seguridad:**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. Archivos

Chamilo almacena los archivos subidos (documentos, imágenes, paquetes SCORM) en el sistema de archivos. Los directorios clave que se deben respaldar:

* `var/` — Archivos y recursos subidos
* `public/plugin/` — Archivos de plugins (solo si ha añadido plugins personalizados)

Si utiliza almacenamiento en la nube (S3, Azure Blob), asegúrese de que las copias de seguridad o el versionado de su proveedor de nube estén habilitados.

### 3. Configuración

* `.env` — Su configuración de entorno
* `config/` — Cualquier archivo de configuración personalizado

## Programación de copias de seguridad

| Componente | Frecuencia recomendada |
|-----------|---------------------|
| Base de datos | Diaria |
| Archivos | Diaria o semanal (según la actividad de subida) |
| Configuración | Tras cualquier cambio de configuración |

## Restauración

Para restaurar a partir de una copia de seguridad:

1. Restaure la base de datos a partir del volcado SQL
2. Restaure los directorios de archivos
3. Restaure los archivos de configuración
4. Vacíe la caché de Symfony: `php bin/console cache:clear`

## Consejos

* **Automatice las copias de seguridad** — Utilice trabajos cron para ejecutar las copias de seguridad de forma automática
* **Almacene fuera del sitio** — Conserve copias de seguridad en un servidor independiente o en almacenamiento en la nube
* **Pruebe la restauración** — Compruebe periódicamente que puede restaurar con éxito a partir de una copia de seguridad
* **Documente el proceso** — Conserve instrucciones escritas del proceso de restauración para que cualquier miembro del equipo pueda llevarlo a cabo