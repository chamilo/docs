# Guia do Desenvolvedor

Bem-vindo ao Guia do Desenvolvedor do Chamilo 3.0. Este guia destina-se a desenvolvedores que desejam compreender a arquitetura do Chamilo, estender a plataforma com plugins, utilizar a API, personalizar a interface ou contribuir para o projeto.

## Arquitetura em Resumo

O Chamilo 3.0 é construído sobre:

* **Backend**: Symfony 7.4 (PHP 8.3–8.5) com Doctrine ORM e API Platform 4
* **Frontend**: Vue 3 com PrimeVue, gerenciamento de estado Pinia e Vue Router
* **Sistema de build**: Webpack 5 via Symfony Webpack Encore, com Tailwind CSS
* **Autenticação**: tokens JWT (lexik/jwt-authentication-bundle)
* **Armazenamento de arquivos**: Flysystem (suporta local, AWS S3, Azure Blob, Google Cloud)

O código-fonte está organizado em três bundles Symfony:

| Bundle | Finalidade |
|--------|---------|
| **CoreBundle** | Núcleo da plataforma: usuários, configurações, recursos, administração, provedores de IA, segurança |
| **CourseBundle** | Recursos específicos de curso: documentos, exercícios, percursos de aprendizagem, fóruns etc. |
| **LtiBundle** | Integração LTI 1.3 para ferramentas de aprendizagem externas |

## Como Este Guia Está Organizado

1. **Primeiros Passos** — Stack tecnológica, ambiente de desenvolvimento, estrutura do projeto
2. **Backend** — Arquitetura Symfony, entidades, sistema de recursos, controladores, configurações
3. **API** — REST API via API Platform, autenticação JWT, ações personalizadas
4. **Frontend** — Componentes Vue, views, roteamento, gerenciamento de estado, sistema de build
5. **Temas** — Temas de cores, CSS/Tailwind, templates Twig
6. **Plugins** — Arquitetura e desenvolvimento de plugins
7. **Contribuição** — Convenções de código, fluxo de trabalho git, testes