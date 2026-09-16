# Glosario

Términos enfocados en desarrolladores utilizados a lo largo de esta guía.

| Término | Definición |
|---------|------------|
| **API Platform** | Un framework de PHP para construir APIs REST y GraphQL, integrado con Symfony. Chamilo lo utiliza para generar automáticamente endpoints de API a partir de entidades Doctrine. |
| **Bundle** | Una unidad organizativa de Symfony similar a un plugin o módulo. Chamilo tiene tres: CoreBundle, CourseBundle, LtiBundle. |
| **Composable** | Un patrón de Vue 3 para extraer y reutilizar lógica reactiva. Se almacena en `assets/vue/composables/`. |
| **Doctrine ORM** | El mapeador objeto-relacional de PHP utilizado por Chamilo. Mapea clases de entidades PHP a tablas de base de datos. |
| **Entity** | Una clase PHP anotada con atributos de Doctrine que se mapea a una tabla de base de datos. |
| **Encore** | Symfony Webpack Encore — un envoltorio alrededor de Webpack que simplifica la configuración de compilación del frontend. |
| **Flysystem** | Una biblioteca de abstracción de sistema de archivos de PHP. Chamilo la usa para soportar almacenamiento local, S3, Azure y GCS. |
| **JWT** | JSON Web Token — el mecanismo de autenticación para la API REST. |
| **Pinia** | La biblioteca de gestión de estado recomendada para Vue 3. Utilizada para nuevas tiendas en Chamilo; las tiendas legacy de Vuex permanecen junto a ella. |
| **PrimeVue** | La biblioteca de componentes de interfaz de usuario de Vue 3 utilizada por Chamilo. Proporciona botones, tablas, diálogos, etc. |
| **ResourceNode** | La entidad central en el sistema de recursos de Chamilo. Cada pieza de contenido del curso tiene un ResourceNode. |
| **ResourceFile** | Una entidad que representa un archivo adjunto a un ResourceNode. Almacenado mediante Flysystem. |
| **ResourceLink** | Una entidad que controla la visibilidad y el acceso por contexto de curso/sesión/grupo. |
| **SCORM** | Sharable Content Object Reference Model. Un estándar de e-learning para empaquetar contenido. |
| **Settings Schema** | Una clase PHP que define una categoría de configuraciones de la plataforma (por ejemplo, SecuritySettingsSchema). |
| **Voter** | Un componente de seguridad de Symfony que decide si un usuario puede realizar una acción sobre un recurso. |
| **Webpack** | El empaquetador de módulos de JavaScript que compila componentes Vue, SCSS y TypeScript en paquetes listos para el navegador. |