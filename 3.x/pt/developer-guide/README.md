# Guia do Programador

Bem-vindo ao Guia do Programador do Chamilo 3.0. Este guia destina-se a programadores que pretendem compreender a arquitetura do Chamilo, alargar a plataforma com plugins, utilizar a API, personalizar a interface ou contribuir para o projeto.

## Arquitetura em síntese

O Chamilo 3.0 é construído sobre:

* **Backend**: Symfony 7.4 (PHP 8.3–8.5) com Doctrine ORM e API Platform 4
* **Frontend**: Vue 3 com PrimeVue, gestão de estado Pinia e Vue Router
* **Sistema de compilação**: Webpack 5 via Symfony Webpack Encore, com Tailwind CSS
* **Autenticação**: tokens JWT (lexik/jwt-authentication-bundle)
* **Armazenamento de ficheiros**: Flysystem (suporta local, AWS S3, Azure Blob, Google Cloud)

O código-fonte está organizado em três bundles Symfony:

| Bundle | Finalidade |
|--------|---------|
| **CoreBundle** | Núcleo da plataforma: utilizadores, definições, recursos, administração, fornecedores de IA, segurança |
| **CourseBundle** | Funcionalidades específicas de curso: documentos, exercícios, percursos de aprendizagem, fóruns, etc. |
| **LtiBundle** | Integração LTI 1.3 para ferramentas de aprendizagem externas |

## Como este guia está organizado

1. **Primeiros passos** — Stack tecnológica, configuração de desenvolvimento, estrutura do projeto
2. **Backend** — Arquitetura Symfony, entidades, sistema de recursos, controladores, definições
3. **API** — REST API via API Platform, autenticação JWT, ações personalizadas
4. **Frontend** — Componentes Vue, vistas, routing, gestão de estado, sistema de compilação
5. **Temas** — Temas de cores, CSS/Tailwind, templates Twig
6. **Plugins** — Arquitetura e desenvolvimento de plugins
7. **Contribuir** — Convenções de código, fluxo de trabalho git, testes