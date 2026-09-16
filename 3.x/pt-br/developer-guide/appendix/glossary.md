# Glossário

Termos voltados a desenvolvedores utilizados ao longo deste guia.

| Termo | Definição |
|------|-----------|
| **API Platform** | Um framework PHP para construção de APIs REST e GraphQL, integrado ao Symfony. O Chamilo o utiliza para gerar automaticamente endpoints de API a partir de entidades Doctrine. |
| **Bundle** | Uma unidade organizacional do Symfony semelhante a um plugin ou módulo. O Chamilo possui três: CoreBundle, CourseBundle, LtiBundle. |
| **Composable** | Um padrão do Vue 3 para extrair e reutilizar lógica reativa. Armazenado em `assets/vue/composables/`. |
| **Doctrine ORM** | O mapeador objeto-relacional PHP utilizado pelo Chamilo. Mapeia classes de entidade PHP para tabelas do banco de dados. |
| **Entity** | Uma classe PHP anotada com atributos Doctrine que mapeia para uma tabela do banco de dados. |
| **Encore** | Symfony Webpack Encore — um encapsulamento em torno do Webpack que simplifica a configuração de build do frontend. |
| **Flysystem** | Uma biblioteca PHP de abstração de sistema de arquivos. O Chamilo a utiliza para dar suporte a armazenamento local, S3, Azure e GCS. |
| **JWT** | JSON Web Token — o mecanismo de autenticação da API REST. |
| **Pinia** | A biblioteca recomendada de gerenciamento de estado para Vue 3. Utilizada para novas stores no Chamilo; stores Vuex legadas permanecem em paralelo. |
| **PrimeVue** | A biblioteca de componentes de UI Vue 3 utilizada pelo Chamilo. Fornece botões, tabelas, diálogos etc. |
| **ResourceNode** | A entidade central no sistema de recursos do Chamilo. Cada item de conteúdo de curso possui um ResourceNode. |
| **ResourceFile** | Uma entidade que representa um arquivo anexado a um ResourceNode. Armazenado via Flysystem. |
| **ResourceLink** | Uma entidade que controla visibilidade e acesso por contexto de curso/sessão/grupo. |
| **SCORM** | Sharable Content Object Reference Model. Um padrão de e-learning para empacotamento de conteúdo. |
| **Settings Schema** | Uma classe PHP que define uma categoria de configurações da plataforma (por exemplo, SecuritySettingsSchema). |
| **Voter** | Um componente de segurança do Symfony que decide se um usuário pode executar uma ação sobre um recurso. |
| **Webpack** | O empacotador de módulos JavaScript que compila componentes Vue, SCSS e TypeScript em bundles prontos para o navegador. |