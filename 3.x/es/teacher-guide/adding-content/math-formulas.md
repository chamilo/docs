# Fórmulas matemáticas

El editor de texto enriquecido puede componer fórmulas matemáticas. Usted escribe una fórmula en LaTeX y los alumnos la ven renderizada allí donde se muestre el contenido: documentos, anuncios, ejercicios, foros, páginas wiki y cualquier otra herramienta que utilice el editor.

Las fórmulas se almacenan dentro del propio contenido, de modo que viajan con el curso cuando lo copia o lo exporta.

## Activación de la función

El botón de fórmulas está desactivado de forma predeterminada. Un administrador de la plataforma lo activa en **Administración > Configuración > Editor > Enable MathJax** ([`enabled_mathjax`](../../admin-guide/platform-settings/editor-settings.md)).

Una vez activada la opción, el botón aparece en todos los editores de la plataforma. No se necesita ninguna configuración por curso.

## Inserción de una fórmula

1. Coloque el cursor donde debe ir la fórmula
2. Haga clic en el botón **Insert formula** de la barra de herramientas del editor (el icono Σ)
3. Escriba la fórmula en **código LaTeX**
4. Compruebe el resultado renderizado en el recuadro de vista previa debajo del campo
5. Haga clic en **Insert**

La vista previa se actualiza mientras escribe, de modo que puede corregir un error antes de insertar nada.

## Edición de una fórmula

Haga clic en la fórmula en el editor. Se abre de nuevo el mismo diálogo, con su código LaTeX original en el campo. Modifíquelo y haga clic en **Insert** para sustituir la fórmula.

Para eliminar una fórmula, selecciónela en el editor y pulse <kbd>Delete</kbd>, como con cualquier otro elemento.

## Escritura de LaTeX

El campo de fórmula acepta la notación matemática estándar de LaTeX. Algunos ejemplos:

| Lo que escribe | Lo que ven los alumnos |
| --- | --- |
| `x = \frac{-b \pm \sqrt{b^2-4ac}}{2a}` | La fórmula cuadrática |
| `\sum_{i=1}^{n} i = \frac{n(n+1)}{2}` | Una suma con límites |
| `\int_{0}^{\infty} e^{-x} dx = 1` | Una integral definida |
| `\alpha + \beta = \gamma` | Letras griegas |
| `\begin{matrix} a & b \\ c & d \end{matrix}` | Una matriz |

También puede escribir los delimitadores en bruto `\(...\)`, `\[...\]` o `$$...$$` directamente en el editor. El editor los convierte en fórmulas al cargar el contenido.

## Notas

* La biblioteca de fórmulas se carga solo en las páginas que realmente contienen una fórmula, de modo que las páginas sin ella no se ralentizan.
* Todo se renderiza en el navegador del alumno. La plataforma no necesita ningún servicio externo y funciona en una instalación sin acceso a Internet.
* Una fórmula conserva su código fuente LaTeX. Siempre puede reabrirla y leer lo que escribió, incluso años después.