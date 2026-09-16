# Glossário

Termos-chave usados na administração do Chamilo 2.0.

## Conceitos da Plataforma

| Termo | Definição |
|-------|-----------|
| **URL de Acesso** | Em uma configuração multi-URL, cada URL de acesso é um portal virtual separado que compartilha a mesma instalação e banco de dados do Chamilo. Cada URL pode ter sua própria identidade visual, usuários, cursos e configurações. |
| **Curso** | O contêiner fundamental de conteúdo no Chamilo. Um curso contém materiais de aprendizagem, exercícios, fóruns e outras ferramentas. Os cursos podem existir de forma independente ou serem atribuídos a sessões. |
| **Sessão** | Uma instância limitada no tempo de um ou mais cursos. As sessões permitem que o mesmo conteúdo de curso seja entregue a diferentes grupos de alunos com rastreamento separado e orientadores independentes. |
| **Caminho de Aprendizagem** | Uma sequência estruturada de itens de conteúdo (documentos, exercícios, links, módulos SCORM) que guia os alunos pelo material em uma ordem definida. |
| **Boletim de Notas** | Uma ferramenta de agregação que combina pontuações de exercícios, tarefas e outras atividades em uma nota final ponderada para um curso. |
| **Habilidade** | Uma competência ou distintivo que pode ser concedido aos alunos ao completarem cursos específicos, exercícios ou atingirem limites no boletim de notas. |
| **Campo Extra** | Um campo de dados personalizado adicionado por administradores a usuários, cursos ou sessões para capturar metadados específicos da organização. |
| **Plugin** | Uma extensão que adiciona funcionalidades ao Chamilo sem modificar o código principal. Plugins podem adicionar páginas, ferramentas ou integrações. |
| **Catálogo** | Uma lista navegável de cursos disponíveis onde os usuários podem visualizar descrições e se inscrever por conta própria. |

## Funções de Usuário

| Termo | Definição |
|-------|-----------|
| **Aluno (Estudante)** | A função padrão do usuário. Pode se inscrever em cursos e consumir conteúdo. |
| **Professor (Instrutor)** | Pode criar e gerenciar cursos, adicionar conteúdo e avaliar alunos. |
| **Administrador de Sessão** | Pode criar e gerenciar sessões e inscrições. |
| **Gerente de Recursos Humanos (HRM)** | Pode visualizar dados de rastreamento e relatórios para usuários atribuídos. |
| **Administrador do Portal** | Acesso completo a todos os recursos de administração da plataforma. |
| **Administrador Global** | Administrador do portal com acesso a todas as URLs de acesso em uma configuração multi-URL. |
| **Orientador/Tutor** | Uma função no nível de sessão. Os orientadores de sessão supervisionam todos os cursos em uma sessão; os orientadores de curso gerenciam um curso específico dentro de uma sessão. Todas as referências a orientadores devem ser renomeadas para tutores no longo prazo. |

## Padrões e Protocolos

| Termo | Definição |
|-------|-----------|
| **SCORM** | Sharable Content Object Reference Model. Um padrão de embalagem de e-learning que permite a importação e rastreamento de cursos. O Chamilo suporta SCORM 1.2 e 2004. |
| **xAPI (Tin Can API)** | Uma especificação de e-learning para rastrear experiências de aprendizagem. Mais ampla que o SCORM, pode registrar atividades que ocorrem fora do LMS. Declarações xAPI são armazenadas em um Learning Record Store (LRS). |
| **LTI** | Learning Tools Interoperability. Um padrão da IMS Global que permite que ferramentas e conteúdos externos sejam incorporados dentro de um LMS. O Chamilo suporta LTI 1.1 e 1.3 como consumidor e provedor. |
| **SCIM** | System for Cross-domain Identity Management. Um padrão para automatizar o provisionamento e desprovisionamento de usuários entre provedores de identidade e aplicativos. |
| **OAuth2** | Um framework de autorização que permite que aplicativos de terceiros acessem o Chamilo em nome de um usuário sem compartilhar senhas. Usado para acesso à API e integrações SSO. |
| **LDAP** | Lightweight Directory Access Protocol. Um protocolo para acessar serviços de diretório (por exemplo, Active Directory) para autenticar usuários e sincronizar dados de conta. |
| **CAS** | Central Authentication Service. Um protocolo de autenticação única que permite que os usuários se autentiquem uma vez e acessem múltiplos aplicativos. |
| **JWT** | JSON Web Token. Um formato de token compacto e assinado usado para autenticação de API e gerenciamento de sessões. |
| **SAML** | Security Assertion Markup Language. Um padrão baseado em XML para trocar dados de autenticação entre um provedor de identidade e um provedor de serviço. |

---
## Termos Técnicos

| Termo | Definição |
|-------|-----------|
| **Symfony** | O framework PHP no qual o Chamilo 2.0 é construído. O Symfony fornece roteamento, injeção de dependências, ORM (Doctrine), templating (Twig) e outras infraestruturas. |
| **Doctrine** | O mapeador objeto-relacional (ORM) usado pelo Chamilo para interagir com o banco de dados. O Doctrine mapeia objetos PHP para tabelas de banco de dados. |
| **Twig** | O motor de templates usado pelo Symfony e pelo Chamilo para renderizar HTML. |
| **Flysystem** | Uma camada de abstração de sistema de arquivos em PHP. O Chamilo utiliza o Flysystem para suportar armazenamento local, Amazon S3, Azure Blob e Google Cloud Storage de forma intercambiável. |
| **Composer** | O gerenciador de dependências PHP. Usado para instalar e atualizar as bibliotecas PHP do Chamilo. |
| **Mailer DSN** | Nome da Fonte de Dados (Data Source Name) para o transporte de e-mails. Uma string de conexão que instrui o Symfony sobre como enviar e-mails (por exemplo, via SMTP, Amazon SES ou Mailjet). |
| **OPcache** | O cache de opcode integrado ao PHP. Compila scripts PHP em bytecode e os armazena em memória, melhorando significativamente o desempenho. |
| **APCu** | Uma extensão PHP que fornece um cache em memória de nível de usuário. Usado pelo Symfony para armazenar metadados e configurações em cache. |

## Siglas

| Sigla | Forma Completa |
|-------|----------------|
| **LMS** | Sistema de Gestão de Aprendizagem (Learning Management System) |
| **LRS** | Repositório de Registros de Aprendizagem (Learning Record Store, para declarações xAPI) |
| **SSO** | Autenticação Única (Single Sign-On) |
| **CSV** | Valores Separados por Vírgula (Comma-Separated Values, usado para importação de usuários/cursos) |
| **API** | Interface de Programação de Aplicativos (Application Programming Interface) |
| **REST** | Transferência de Estado Representacional (Representational State Transfer, estilo de arquitetura de API) |
| **GDPR** | Regulamento Geral de Proteção de Dados (General Data Protection Regulation, lei de privacidade de dados da UE) |
| **HSTS** | Segurança de Transporte Estrita HTTP (HTTP Strict Transport Security) |
| **CDN** | Rede de Distribuição de Conteúdo (Content Delivery Network) |
| **DNS** | Sistema de Nomes de Domínio (Domain Name System) |
| **SPF** | Estrutura de Política de Remetente (Sender Policy Framework, autenticação de e-mail) |
| **DKIM** | Correio Identificado por Chaves de Domínio (DomainKeys Identified Mail, autenticação de e-mail) |
| **DMARC** | Autenticação, Relatório e Conformidade de Mensagens Baseadas em Domínio (Domain-based Message Authentication, Reporting, and Conformance) |