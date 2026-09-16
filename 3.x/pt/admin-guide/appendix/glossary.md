# Glossário

Termos-chave utilizados na administração do Chamilo 3.0.

## Conceitos da plataforma

| Term | Definition |
|------|------------|
| **Access URL** | Numa configuração multi-URL, cada URL de acesso é um portal virtual separado que partilha a mesma instalação e base de dados do Chamilo. Cada URL pode ter a sua própria identidade visual, utilizadores, cursos e definições. |
| **Course** | O contentor fundamental de conteúdos no Chamilo. Um curso contém materiais de aprendizagem, exercícios, fóruns e outras ferramentas. Os cursos podem existir de forma independente ou ser atribuídos a sessões. |
| **Session** | Uma instância limitada no tempo de um ou mais cursos. As sessões permitem que o mesmo conteúdo de curso seja ministrado a diferentes grupos de aprendizes, com acompanhamento separado e tutores independentes. |
| **Learning path** | Uma sequência estruturada de itens de conteúdo (documentos, exercícios, ligações, módulos SCORM) que orienta os aprendizes pelo material numa ordem definida. |
| **Gradebook** | Uma ferramenta de agregação que combina pontuações de exercícios, trabalhos e outras atividades numa nota final ponderada para um curso. |
| **Skill** | Uma competência ou distintivo que pode ser atribuído aos aprendizes após a conclusão de cursos específicos, exercícios ou o cumprimento de limiares do gradebook. |
| **Extra field** | Um campo de dados personalizado adicionado pelos administradores a utilizadores, cursos ou sessões para capturar metadados específicos da organização. |
| **Plugin** | Uma extensão que acrescenta funcionalidade ao Chamilo sem modificar o código principal. Os plugins podem adicionar páginas, ferramentas ou integrações. |
| **Catalog** | Uma listagem navegável dos cursos disponíveis, onde os utilizadores podem consultar descrições e inscrever-se autonomamente. |

## Papéis de utilizador

| Term | Definition |
|------|------------|
| **Learner (Student)** | O papel de utilizador predefinido. Pode inscrever-se em cursos e consumir conteúdos. |
| **Teacher (Trainer)** | Pode criar e gerir cursos, adicionar conteúdos e avaliar aprendizes. |
| **Session administrator** | Pode criar e gerir sessões e inscrições. |
| **Human Resources Manager (HRM)** | Pode consultar dados de acompanhamento e relatórios dos utilizadores atribuídos. |
| **Portal administrator** | Acesso completo a todas as funcionalidades de administração da plataforma. |
| **Global administrator** | Administrador do portal com acesso a todos os URLs de acesso numa configuração multi-URL. |
| **Tutor** | Um papel ao nível da sessão. Os tutores de sessão supervisionam todos os cursos de uma sessão; os tutores de curso gerem um curso específico dentro de uma sessão. Designado «coach» nas versões do Chamilo anteriores à 3.0. |

## Normas e protocolos

| Term | Definition |
|------|------------|
| **SCORM** | Sharable Content Object Reference Model. Uma norma de empacotamento de e-learning que permite importar e acompanhar cursos. O Chamilo suporta SCORM 1.2 e 2004. |
| **xAPI (Tin Can API)** | Uma especificação de e-learning para o acompanhamento de experiências de aprendizagem. Mais abrangente do que o SCORM, pode registar atividades que ocorrem fora do LMS. As declarações xAPI são armazenadas num Learning Record Store (LRS). |
| **LTI** | Learning Tools Interoperability. Uma norma IMS Global que permite incorporar ferramentas e conteúdos externos num LMS. O Chamilo suporta LTI 1.1 e 1.3 tanto como consumidor como como fornecedor. |
| **SCIM** | System for Cross-domain Identity Management. Uma norma para automatizar o aprovisionamento e o desaprovisionamento de utilizadores entre fornecedores de identidade e aplicações. |
| **OAuth2** | Um enquadramento de autorização que permite a aplicações de terceiros aceder ao Chamilo em nome de um utilizador sem partilhar palavras-passe. Utilizado para acesso à API e integrações de SSO. |
| **LDAP** | Lightweight Directory Access Protocol. Um protocolo para aceder a serviços de diretório (por exemplo, Active Directory) para autenticar utilizadores e sincronizar dados de contas. |
| **CAS** | Central Authentication Service. Um protocolo de início de sessão único que permite aos utilizadores autenticar-se uma vez e aceder a várias aplicações. |
| **JWT** | JSON Web Token. Um formato compacto de token assinado utilizado para autenticação de API e gestão de sessões. |
| **SAML** | Security Assertion Markup Language. Uma norma baseada em XML para a troca de dados de autenticação entre um fornecedor de identidade e um fornecedor de serviços. |

## Termos Técnicos

| Termo | Definição |
|------|------------|
| **Symfony** | O framework PHP sobre o qual o Chamilo 3.0 é construído. O Symfony fornece roteamento, injeção de dependências, ORM (Doctrine), templates (Twig) e outras infraestruturas. |
| **Doctrine** | O mapeador objeto-relacional (ORM) utilizado pelo Chamilo para interagir com a base de dados. O Doctrine mapeia objetos PHP para tabelas da base de dados. |
| **Twig** | O motor de templates utilizado pelo Symfony e pelo Chamilo para a renderização de HTML. |
| **Flysystem** | Uma camada de abstração de sistema de ficheiros em PHP. O Chamilo utiliza o Flysystem para suportar de forma intercambiável armazenamento local, Amazon S3, Azure Blob e Google Cloud Storage. |
| **Composer** | O gestor de dependências PHP. Utilizado para instalar e atualizar as bibliotecas PHP do Chamilo. |
| **Mailer DSN** | Data Source Name para o transporte de correio eletrónico. Uma cadeia de ligação que indica ao Symfony como enviar e-mails (por exemplo, via SMTP, Amazon SES ou Mailjet). |
| **OPcache** | A cache de opcodes integrada do PHP. Compila scripts PHP em bytecode e armazena-os em memória, melhorando significativamente o desempenho. |
| **APCu** | Uma extensão PHP que fornece uma cache em memória ao nível do utilizador. Utilizada pelo Symfony para armazenar em cache metadados e configuração. |

## Siglas

| Sigla | Forma Completa |
|---------|-----------|
| **LMS** | Learning Management System (Sistema de Gestão da Aprendizagem) |
| **LRS** | Learning Record Store (para declarações xAPI) |
| **SSO** | Single Sign-On (autenticação única) |
| **CSV** | Comma-Separated Values (utilizado para importações de utilizadores/cursos) |
| **API** | Application Programming Interface |
| **REST** | Representational State Transfer (estilo de arquitetura de API) |
| **GDPR** | General Data Protection Regulation (regulamento da UE sobre privacidade de dados) |
| **HSTS** | HTTP Strict Transport Security |
| **CDN** | Content Delivery Network |
| **DNS** | Domain Name System |
| **SPF** | Sender Policy Framework (autenticação de e-mail) |
| **DKIM** | DomainKeys Identified Mail (autenticação de e-mail) |
| **DMARC** | Domain-based Message Authentication, Reporting, and Conformance |