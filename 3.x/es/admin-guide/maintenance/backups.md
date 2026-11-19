# Copias de seguridad

Las copias de seguridad periódicas son esenciales para proteger los datos de Chamilo. Esta página describe qué respaldar y cómo hacerlo.

## Qué respaldar

### 1. Base de datos

La base de datos de Chamilo contiene todos los datos de la plataforma: usuarios, cursos, seguimiento, calificaciones, mensajes y configuración. Es el componente más crítico que se debe respaldar.

**Cómo realizar la copia de seguridad:**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. Archivos

Chamilo almacena los archivos cargados (documentos, imágenes, paquetes SCORM) en el sistema de archivos. Los directorios clave que se deben respaldar son:

* `var/` — Archivos y recursos cargados. Incluye `var/certificate-issuer/`, la clave que firma las credenciales de los certificados y las [actas oficiales](../users/academic-transcripts.md): sin ella, los documentos ya emitidos ya no pueden verificarse
* `public/plugin/` — Archivos de complementos (solo si ha añadido complementos personalizados)

Si utiliza almacenamiento en la nube (S3, Azure Blob), asegúrese de que la copia de seguridad o el control de versiones de su proveedor de nube estén habilitados.

### 3. Configuración

* `.env` — Su configuración de entorno
* `config/` — Cualquier archivo de configuración personalizado

## Calendario de copias de seguridad

| Componente | Frecuencia recomendada |
|-----------|---------------------|
| Base de datos | Diaria |
| Archivos | Diaria o semanal (según la actividad de carga) |
| Configuración | Después de cualquier cambio de configuración |

## Restauración

Para restaurar a partir de una copia de seguridad:

1. Restaure la base de datos a partir del volcado SQL
2. Restaure los directorios de archivos
3. Restaure los archivos de configuración
4. Limpie la caché de Symfony: `php bin/console cache:clear`

## Consejos

* **Automatice las copias de seguridad** — Utilice tareas cron para ejecutar las copias de seguridad de forma automática
* **Almacene fuera del sitio** — Conserve copias de seguridad en un servidor independiente o en almacenamiento en la nube
* **Pruebe la restauración** — Compruebe periódicamente que puede restaurar correctamente a partir de una copia de seguridad
* **Documente su proceso** — Conserve instrucciones escritas del proceso de restauración para que cualquier miembro del equipo pueda llevarlo a cabo