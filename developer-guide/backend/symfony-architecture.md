# Arquitetura Symfony

## Bundles

O Chamilo 2.0 está estruturado em três bundles Symfony:

### CoreBundle (`src/CoreBundle/`)

O maior bundle, responsável por todas as questões de abrangência da plataforma:

* **Usuários e autenticação** — Entidade de usuário, papéis, tokens JWT, provedores OAuth2
* **Sistema de recursos** — ResourceNode e ResourceFile (a abstração unificada de conteúdo)
* **Configurações da plataforma** — Esquemas de configurações em `src/CoreBundle/Settings/` cobrindo todos os aspectos configuráveis
* **Administração** — Controladores de administração para gerenciamento de usuários, cursos, sessões e plugins
* **Provedores de IA** — Padrão Factory para OpenAI, Gemini, Mistral, DeepSeek, Grok
* **Armazenamento de arquivos** — Adaptadores de armazenamento baseados em Flysystem (local, S3, Azure, GCS)
* **Segurança** — Voters, controle de acesso, hierarquia de papéis
* **Ferramentas** — Definições de ferramentas de curso registradas pelo sistema de ferramentas

### CourseBundle (`src/CourseBundle/`)

Tudo relacionado ao conteúdo do curso:

* **Entidades de conteúdo** — 101 entidades para documentos, exercícios, caminhos de aprendizagem, fóruns, glossários, enquetes, frequência, blogs, tarefas e mais
* **Cópia de curso** — Importação/exportação com suporte ao formato Common Cartridge 1.3 e Moodle
* **Configurações de curso** — Esquemas de configurações no nível do curso

### LtiBundle (`src/LtiBundle/`)

Implementação do padrão LTI 1.3:

* **Registro de plataforma e ferramenta** — Gerenciamento de conexões com ferramentas externas
* **Gerenciamento de lançamento** — Controladores de fluxo de lançamento LTI
* **Retorno de notas** — Envio de notas de ferramentas externas para o Chamilo

## Contêiner de Serviços

O Chamilo utiliza o contêiner de injeção de dependência do Symfony. Os serviços são configurados em:

* `config/services.yaml` — Definições globais de serviços
* Diretório `DependencyInjection/` de cada bundle — Serviços específicos de cada bundle

## Arquitetura de Segurança

O sistema de segurança é configurado em `config/packages/security.yaml`:

* **Hash de senhas** — Suporta bcrypt (padrão), com migração de SHA1 e MD5 legados
* **Hierarquia de papéis** — 18 papéis organizados hierarquicamente (ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER; papéis adicionais incluem ROLE_HR, ROLE_INVITEE, ROLE_STUDENT_BOSS, ROLE_SESSION_MANAGER, ROLE_QUESTION_MANAGER)
* **Papéis sensíveis ao contexto** — Papéis no nível do curso (ROLE_CURRENT_COURSE_TEACHER, ROLE_CURRENT_COURSE_STUDENT) são calculados por solicitação com base na matrícula
* **Firewall** — Autenticação JWT para API, baseada em sessão para interface web
* **Voters** — Controle de acesso no nível de recurso por meio de voters do Symfony

## Código Legado

Alguns recursos ainda utilizam código PHP legado em `public/main/`:

* Renderização e interação de exercícios
* Player de caminho de aprendizagem
* Algumas ferramentas administrativas

Esses recursos estão sendo progressivamente migrados para a arquitetura Symfony+Vue. Páginas legadas são servidas por meio de uma camada de compatibilidade que inicializa o kernel do Symfony.