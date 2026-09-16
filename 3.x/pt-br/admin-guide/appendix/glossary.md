# Glossário

Termos-chave utilizados na administração do Chamilo 3.0.

## Conceitos da plataforma

| Termo | Definição |
|------|------------|
| **Access URL** | Em uma configuração multi-URL, cada access URL é um portal virtual separado que compartilha a mesma instalação e o mesmo banco de dados do Chamilo. Cada URL pode ter sua própria identidade visual, usuários, cursos e configurações. |
| **Course** | O contêiner fundamental de conteúdo no Chamilo. Um curso reúne materiais de aprendizagem, exercícios, fóruns e outras ferramentas. Os cursos podem existir de forma independente ou ser atribuídos a sessões. |
| **Session** | Uma instância limitada no tempo de um ou mais cursos. As sessões permitem que o mesmo conteúdo do curso seja oferecido a diferentes grupos de aprendizes, com acompanhamento separado e tutores independentes. |
| **Learning path** | Uma sequência estruturada de itens de conteúdo (documentos, exercícios, links, módulos SCORM) que orienta os aprendizes pelo material em uma ordem definida. |
| **Gradebook** | Uma ferramenta de agregação que combina pontuações de exercícios, tarefas e outras atividades em uma nota final ponderada para um curso. |
| **Skill** | Uma competência ou distintivo (badge) que pode ser concedido aos aprendizes ao concluírem cursos específicos, exercícios ou ao atingirem limiares do gradebook. |
| **Extra field** | Um campo de dados personalizado adicionado pelos administradores a usuários, cursos ou sessões para capturar metadados específicos da organização. |
| **Plugin** | Uma extensão que adiciona funcionalidades ao Chamilo sem modificar o código-fonte. Plugins podem adicionar páginas, ferramentas ou integrações. |
| **Catalog** | Uma listagem navegável dos cursos disponíveis, na qual os usuários podem visualizar descrições e se inscrever por conta própria. |

## Papéis de usuário

| Termo | Definição |
|------|------------|
| **Learner (Student)** | O papel de usuário padrão. Pode se inscrever em cursos e consumir conteúdo. |
| **Teacher (Trainer)** | Pode criar e gerenciar cursos, adicionar conteúdo e avaliar aprendizes. |
| **Session administrator** | Pode criar e gerenciar sessões e inscrições. |
| **Human Resources Manager (HRM)** | Pode visualizar dados de acompanhamento e relatórios dos usuários atribuídos. |
| **Portal administrator** | Acesso completo a todos os recursos de administração da plataforma. |
| **Global administrator** | Administrador do portal com acesso a todas as access URLs em uma configuração multi-URL. |
| **Tutor** | Um papel no nível da sessão. Tutores de sessão supervisionam todos os cursos de uma sessão; tutores de curso gerenciam um curso específico dentro de uma sessão. Chamado de "coach" nas versões do Chamilo anteriores à 3.0. |

## Padrões e protocolos

| Termo | Definição |
|------|------------|
| **SCORM** | Sharable Content Object Reference Model. Um padrão de empacotamento de e-learning que permite importar e acompanhar cursos. O Chamilo oferece suporte a SCORM 1.2 e 2004. |
| **xAPI (Tin Can API)** | Uma especificação de e-learning para o acompanhamento de experiências de aprendizagem. Mais abrangente que o SCORM, pode registrar atividades que ocorrem fora do LMS. As declarações xAPI são armazenadas em um Learning Record Store (LRS). |
| **LTI** | Learning Tools Interoperability. Um padrão IMS Global que permite incorporar ferramentas e conteúdos externos em um LMS. O Chamilo oferece suporte a LTI 1.1 e 1.3 tanto como consumidor quanto como provedor. |
| **SCIM** | System for Cross-domain Identity Management. Um padrão para automatizar o provisionamento e o desprovisionamento de usuários entre provedores de identidade e aplicações. |
| **OAuth2** | Um framework de autorização que permite que aplicações de terceiros acessem o Chamilo em nome de um usuário sem compartilhar senhas. Utilizado para acesso à API e integrações de SSO. |
| **LDAP** | Lightweight Directory Access Protocol. Um protocolo para acessar serviços de diretório (por exemplo, Active Directory) a fim de autenticar usuários e sincronizar dados de contas. |
| **CAS** | Central Authentication Service. Um protocolo de autenticação única (single sign-on) que permite que os usuários se autentiquem uma vez e acessem várias aplicações. |
| **JWT** | JSON Web Token. Um formato compacto de token assinado, utilizado para autenticação de API e gerenciamento de sessão. |
| **SAML** | Security Assertion Markup Language. Um padrão baseado em XML para a troca de dados de autenticação entre um provedor de identidade e um provedor de serviços. |

## Termos Técnicos

| Termo | Definição |
|------|------------|
| **Symfony** | O framework PHP sobre o qual o Chamilo 3.0 é construído. O Symfony fornece roteamento, injeção de dependências, ORM (Doctrine), templates (Twig) e outras infraestruturas. |
| **Doctrine** | O mapeador objeto-relacional (ORM) usado pelo Chamilo para interagir com o banco de dados. O Doctrine mapeia objetos PHP para tabelas do banco de dados. |
| **Twig** | O motor de templates usado pelo Symfony e pelo Chamilo para renderizar HTML. |
| **Flysystem** | Uma camada de abstração de sistema de arquivos em PHP. O Chamilo usa o Flysystem para dar suporte de forma intercambiável a armazenamento local, Amazon S3, Azure Blob e Google Cloud Storage. |
| **Composer** | O gerenciador de dependências PHP. Usado para instalar e atualizar as bibliotecas PHP do Chamilo. |
| **Mailer DSN** | Data Source Name para o transporte de e-mail. Uma string de conexão que informa ao Symfony como enviar e-mails (por exemplo, via SMTP, Amazon SES ou Mailjet). |
| **OPcache** | O cache de opcode integrado do PHP. Compila scripts PHP em bytecode e os armazena em cache na memória, melhorando significativamente o desempenho. |
| **APCu** | Uma extensão PHP que fornece um cache em memória no nível do usuário. Usada pelo Symfony para armazenar em cache metadados e configuração. |

## Siglas

| Sigla | Forma por extenso |
|---------|-----------|
| **LMS** | Learning Management System (Sistema de Gestão da Aprendizagem) |
| **LRS** | Learning Record Store (para declarações xAPI) |
| **SSO** | Single Sign-On (autenticação única) |
| **CSV** | Comma-Separated Values (usado para importações de usuários/cursos) |
| **API** | Application Programming Interface |
| **REST** | Representational State Transfer (estilo de arquitetura de API) |
| **GDPR** | General Data Protection Regulation (lei de privacidade de dados da UE) |
| **HSTS** | HTTP Strict Transport Security |
| **CDN** | Content Delivery Network (rede de distribuição de conteúdo) |
| **DNS** | Domain Name System |
| **SPF** | Sender Policy Framework (autenticação de e-mail) |
| **DKIM** | DomainKeys Identified Mail (autenticação de e-mail) |
| **DMARC** | Domain-based Message Authentication, Reporting, and Conformance |