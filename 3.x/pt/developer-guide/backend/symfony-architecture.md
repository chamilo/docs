# Arquitetura Symfony

## Bundles

O Chamilo 3.0 está estruturado em três bundles Symfony:

### CoreBundle (`src/CoreBundle/`)

O maior bundle, responsável por todas as preocupações de âmbito da plataforma:

* **Utilizadores e autenticação** — Entidade User, papéis, tokens JWT, fornecedores OAuth2
* **Sistema de recursos** — ResourceNode e ResourceFile (a abstração unificada de conteúdo)
* **Definições da plataforma** — esquemas de definições em `src/CoreBundle/Settings/` que abrangem todos os aspetos configuráveis
* **Administração** — Controladores de administração para gestão de utilizadores, cursos, sessões e plugins
* **Fornecedores de IA** — Padrão Factory para OpenAI, Gemini, Mistral, DeepSeek, Grok
* **Armazenamento de ficheiros** — Adaptadores de armazenamento baseados em Flysystem (local, S3, Azure, GCS)
* **Segurança** — Voters, controlo de acesso, hierarquia de papéis
* **Ferramentas** — definições de ferramentas de curso registadas através do sistema de ferramentas

### CourseBundle (`src/CourseBundle/`)

Tudo o que é específico do conteúdo de curso:

* **Entidades de conteúdo** — 101 entidades para documentos, exercícios, percursos de aprendizagem, fóruns, glossários, inquéritos, assiduidade, blogs, trabalhos e mais
* **Cópia de curso** — Importação/exportação com suporte a Common Cartridge 1.3 e formato Moodle
* **Definições de curso** — Esquemas de definições ao nível do curso

### LtiBundle (`src/LtiBundle/`)

Implementação da norma LTI 1.3:

* **Registo de plataforma e ferramenta** — Gestão de ligações a ferramentas externas
* **Tratamento de lançamento** — Controladores do fluxo de lançamento LTI
* **Devolução de notas** — Devolução de notas das ferramentas externas para o Chamilo

## Contentor de serviços

O Chamilo utiliza o contentor de injeção de dependências do Symfony. Os serviços são configurados em:

* `config/services.yaml` — Definições globais de serviços
* Diretório `DependencyInjection/` de cada bundle — Serviços específicos do bundle

## Arquitetura de segurança

O sistema de segurança é configurado em `config/packages/security.yaml`:

* **Hash de palavras-passe** — Suporta bcrypt (predefinição), com migração a partir de SHA1 e MD5 legados
* **Hierarquia de papéis** — 18 papéis organizados hierarquicamente (ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER; papéis adicionais incluem ROLE_HR, ROLE_INVITEE, ROLE_STUDENT_BOSS, ROLE_SESSION_MANAGER, ROLE_QUESTION_MANAGER)
* **Papéis sensíveis ao contexto** — Papéis ao nível do curso (ROLE_CURRENT_COURSE_TEACHER, ROLE_CURRENT_COURSE_STUDENT) são calculados por pedido com base na inscrição
* **Firewall** — Autenticação JWT para a API, baseada em sessão para a interface web
* **Voters** — Controlo de acesso ao nível do recurso através de voters Symfony

## Código legado

Algumas funcionalidades ainda utilizam código PHP legado em `public/main/`:

* Renderização e interação de exercícios
* Leitor de percursos de aprendizagem
* Algumas ferramentas de administração

Estas estão a ser progressivamente migradas para a arquitetura Symfony+Vue. As páginas legadas são servidas através de uma camada de compatibilidade que inicia o kernel Symfony.