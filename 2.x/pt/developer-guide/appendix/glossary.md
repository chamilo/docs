# Glossário

Termos focados em desenvolvimento utilizados ao longo deste guia.

| Termo | Definição |
|-------|-----------|
| **API Platform** | Um framework PHP para construir APIs REST e GraphQL, integrado ao Symfony. O Chamilo o utiliza para gerar automaticamente endpoints de API a partir de entidades Doctrine. |
| **Bundle** | Uma unidade organizacional do Symfony semelhante a um plugin ou módulo. O Chamilo possui três: CoreBundle, CourseBundle, LtiBundle. |
| **Composable** | Um padrão do Vue 3 para extrair e reutilizar lógica reativa. Armazenado em `assets/vue/composables/`. |
| **Doctrine ORM** | O mapeador objeto-relacional PHP utilizado pelo Chamilo. Mapeia classes de entidade PHP para tabelas de banco de dados. |
| **Entity** | Uma classe PHP anotada com atributos do Doctrine que mapeia para uma tabela de banco de dados. |
| **Encore** | Symfony Webpack Encore — um wrapper ao redor do Webpack que simplifica a configuração de build de frontend. |
| **Flysystem** | Uma biblioteca de abstração de sistema de arquivos PHP. O Chamilo a utiliza para suportar armazenamento local, S3, Azure e GCS. |
| **JWT** | JSON Web Token — o mecanismo de autenticação para a API REST. |
| **Pinia** | A biblioteca de gerenciamento de estado recomendada para Vue 3. Usada para novos stores no Chamilo; stores legados do Vuex permanecem ao lado dela. |
| **PrimeVue** | A biblioteca de componentes de interface do usuário Vue 3 utilizada pelo Chamilo. Fornece botões, tabelas, diálogos, etc. |
| **ResourceNode** | A entidade central no sistema de recursos do Chamilo. Cada peça de conteúdo do curso possui um ResourceNode. |
| **ResourceFile** | Uma entidade que representa um arquivo anexado a um ResourceNode. Armazenado via Flysystem. |
| **ResourceLink** | Uma entidade que controla a visibilidade e o acesso por contexto de curso/sessão/grupo. |
| **SCORM** | Sharable Content Object Reference Model. Um padrão de e-learning para empacotamento de conteúdo. |
| **Settings Schema** | Uma classe PHP que define uma categoria de configurações da plataforma (por exemplo, SecuritySettingsSchema). |
| **Voter** | Um componente de segurança do Symfony que decide se um usuário pode realizar uma ação em um recurso. |
| **Webpack** | O bundler de módulos JavaScript que compila componentes Vue, SCSS e TypeScript em pacotes prontos para o navegador. |