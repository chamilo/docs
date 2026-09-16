# Gestión de aulas

Las aulas en Chamilo se organizan bajo sedes: una sede es un emplazamiento físico y cada aula pertenece exactamente a una sede.

## Sedes

**Aulas > Sedes** gestiona los emplazamientos físicos de su organización: un edificio, un campus o una oficina. Las sedes pueden anidarse (una sede puede tener sedes hijas), de modo que puede modelar algo como «Campus principal > Edificio A».

Campos que puede definir para una sede:

* **Título** y **Descripción**
* **Sede padre** — Para organizar las sedes de forma jerárquica
* **Dirección IP** — Opcional, para identificación basada en la red
* **Latitud / Longitud** — Para cartografía
* **Velocidad de descarga / subida** y **Retraso** — Metadatos opcionales de calidad de red
* **Correo electrónico, nombre y teléfono del administrador** — Datos de contacto de quien gestiona ese emplazamiento

## Aulas

**Aulas > Aulas** gestiona los espacios reservables reales dentro de una sede, normalmente un aula o una sala de formación. Toda aula debe pertenecer a una sede.

Campos que puede definir para un aula:

* **Título** y **Descripción**
* **Sede** — A qué sede pertenece esta aula (obligatorio)
* **Número de planta**
* **Capacidad** — Debe ser un número positivo
* **Geolocalización**, **Dirección IP** y **Máscara IP** — Campos avanzados opcionales

Cada aula también tiene una vista de calendario de «Ocupación» que muestra sus reservas, y un recuento de los cursos que la utilizan.

## Relacionado

Para encontrar un aula libre en un intervalo horario concreto en lugar de recorrer la lista, consulte [Buscador de disponibilidad de aulas](room-availability-finder.md).