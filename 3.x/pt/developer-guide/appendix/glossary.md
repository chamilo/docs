# Glossário

Termos orientados a programadores utilizados ao longo deste guia.

| Termo | Definição |
|------|-----------|
| **API Platform** | Um framework PHP para construir APIs REST e GraphQL, integrado com o Symfony. O Chamilo utiliza-o para gerar automaticamente endpoints de API a partir de entidades Doctrine. |
| **Bundle** | Uma unidade organizacional do Symfony semelhante a um plugin ou módulo. O Chamilo tem três: CoreBundle, CourseBundle, LtiBundle. |
| **Composable** | Um padrão do Vue 3 para extrair e reutilizar lógica reativa. Armazenado em `assets/vue/composables/`. |
| **Doctrine ORM** | O mapeador objeto-relacional PHP utilizado pelo Chamilo. Mapeia classes de entidades PHP para tabelas da base de dados. |
| **Entity** | Uma classe PHP anotada com atributos Doctrine que mapeia para uma tabela da base de dados. |
| **Encore** | Symfony Webpack Encore — um invólucro em torno do Webpack que simplifica a configuração de compilação do frontend. |
| **Flysystem** | Uma biblioteca PHP de abstração de sistema de ficheiros. O Chamilo utiliza-a para suportar armazenamento local, S3, Azure e GCS. |
| **JWT** | JSON Web Token — o mecanismo de autenticação da API REST. |
| **Pinia** | A biblioteca de gestão de estado recomendada para o Vue 3. Utilizada para as novas stores no Chamilo; as stores Vuex legadas permanecem em paralelo. |
| **PrimeVue** | A biblioteca de componentes de UI do Vue 3 utilizada pelo Chamilo. Fornece botões, tabelas, diálogos, etc. |
| **ResourceNode** | A entidade central no sistema de recursos do Chamilo. Cada elemento de conteúdo de um curso tem um ResourceNode. |
| **ResourceFile** | Uma entidade que representa um ficheiro associado a um ResourceNode. Armazenado via Flysystem. |
| **ResourceLink** | Uma entidade que controla a visibilidade e o acesso por contexto de curso/sessão/grupo. |
| **SCORM** | Sharable Content Object Reference Model. Um padrão de e-learning para empacotar conteúdos. |
| **Settings Schema** | Uma classe PHP que define uma categoria de definições da plataforma (por exemplo, SecuritySettingsSchema). |
| **Voter** | Um componente de segurança do Symfony que decide se um utilizador pode executar uma ação sobre um recurso. |
| **Webpack** | O empacotador de módulos JavaScript que compila componentes Vue, SCSS e TypeScript em bundles prontos para o browser. |