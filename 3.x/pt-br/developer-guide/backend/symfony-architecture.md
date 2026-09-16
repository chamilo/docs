# Arquitetura Symfony

## Bundles

O Chamilo 3.0 está estruturado em três bundles Symfony:

### CoreBundle (`src/CoreBundle/`)

O maior bundle, responsável por todas as preocupações da plataforma como um todo:

* **Usuários e autenticação** — Entidade User, papéis, tokens JWT, provedores OAuth2
* **Sistema de recursos** — ResourceNode e ResourceFile (a abstração unificada de conteúdo)
* **Configurações da plataforma** — esquemas de configurações em `src/CoreBundle/Settings/` cobrindo todos os aspectos configuráveis
* **Administração** — Controladores de administração para gerenciamento de usuários, cursos, sessões e plugins
* **Provedores de IA** — Padrão Factory para OpenAI, Gemini, Mistral, DeepSeek, Grok
* **Armazenamento de arquivos** — Adaptadores de armazenamento baseados em Flysystem (local, S3, Azure, GCS)
* **Segurança** — Voters, controle de acesso, hierarquia de papéis
* **Ferramentas** — definições de ferramentas de curso registradas por meio do sistema de ferramentas

### CourseBundle (`src/CourseBundle/`)

Tudo o que é específico do conteúdo de curso:

* **Entidades de conteúdo** — 101 entidades para documentos, exercícios, percursos de aprendizagem, fóruns, glossários, pesquisas, frequência, blogs, tarefas e muito mais
* **Cópia de curso** — Importação/exportação com suporte a Common Cartridge 1.3 e formato Moodle
* **Configurações de curso** — Esquemas de configuração no nível do curso

### LtiBundle (`src/LtiBundle/`)

Implementação do padrão LTI 1.3:

* **Registro de plataforma e ferramenta** — Gerenciar conexões com ferramentas externas
* **Tratamento de launch** — Controladores do fluxo de launch LTI
* **Devolução de notas (grade passback)** — Devolver notas de ferramentas externas ao Chamilo

## Contêiner de Serviços

O Chamilo utiliza o contêiner de injeção de dependências do Symfony. Os serviços são configurados em:

* `config/services.yaml` — Definições globais de serviços
* Diretório `DependencyInjection/` de cada bundle — Serviços específicos do bundle

## Arquitetura de Segurança

O sistema de segurança é configurado em `config/packages/security.yaml`:

* **Hash de senhas** — Suporta bcrypt (padrão), com migração a partir de SHA1 e MD5 legados
* **Hierarquia de papéis** — 18 papéis organizados hierarquicamente (ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER; papéis adicionais incluem ROLE_HR, ROLE_INVITEE, ROLE_STUDENT_BOSS, ROLE_SESSION_MANAGER, ROLE_QUESTION_MANAGER)
* **Papéis sensíveis ao contexto** — Papéis no nível do curso (ROLE_CURRENT_COURSE_TEACHER, ROLE_CURRENT_COURSE_STUDENT) são calculados por requisição com base na matrícula
* **Firewall** — Autenticação JWT para a API, baseada em sessão para a interface web
* **Voters** — Controle de acesso no nível de recurso por meio de voters do Symfony

## Código legado

Alguns recursos ainda utilizam código PHP legado em `public/main/`:

* Renderização e interação de exercícios
* Player de percursos de aprendizagem
* Algumas ferramentas de administração

Esses recursos estão sendo progressivamente migrados para a arquitetura Symfony+Vue. As páginas legadas são servidas por uma camada de compatibilidade que inicializa o kernel do Symfony.