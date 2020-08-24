## Imagen de curso predeterminada

De manera similar al reemplazo de iconos predeterminado descrito en la sección anterior, la imagen predeterminada para el curso, que aparece en el catálogo o en el vista de cuadrícula de cursos, puede ser reemplazado.

Para hacer esto, deberá tomar ***main/img/session_default.png*** (400x224 en v1.11.10) y **main/img/session_default_small.png*** (85x48 en v1.11.10) dimensiones de imágenes como punto de partida, y desarrollar una nueva imagen que encaje en estos.

Luego, en lugar de reemplazar las imágenes directamente en ***main/img/*** (lo que eliminaría el personalización durante cada actualización posterior de Chamilo), simplemente puede colocar esas 2 nuevas imágenes en la carpeta raíz de tu CSS personalizado.

Por ejemplo, si ha colocado (como se sugirió en secciones anteriores) su CSS en una carpeta llamado "***myCustomCSS/***", las dos imágenes se colocarían respectivamente en "***myCustomCSS/session_default.png***" y "***myCustomCSS/session_default_small.png***".

