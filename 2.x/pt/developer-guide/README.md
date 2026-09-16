# Guia do Desenvolvedor

Bem-vindo ao Guia do Desenvolvedor do Chamilo 2.0. Este guia é destinado a desenvolvedores que desejam compreender a arquitetura do Chamilo, estender a plataforma com plugins, utilizar a API, personalizar a interface ou contribuir para o projeto.

## Arquitetura em Resumo

O Chamilo 2.0 é construído com base em:

* **Backend**: Symfony 6.4 (PHP 8.2+) com Doctrine ORM e API Platform 3.0
* **Frontend**: Vue 3 com PrimeVue, gerenciamento de estado Pinia e Vue Router
* **Sistema de build**: Webpack 5 via Symfony Webpack Encore, com Tailwind CSS
* **Autenticação**: Tokens JWT (lexik/jwt-authentication-bundle)
* **Armazenamento de arquivos**: Flysystem (suporta local, AWS S3, Azure Blob, Google Cloud)

O código-fonte está organizado em três bundles do Symfony:

| Bundle | Finalidade |
|--------|------------|
| **CoreBundle** | Núcleo da plataforma: usuários, configurações, recursos, administração, provedores de IA, segurança |
| **CourseBundle** | Funcionalidades específicas de cursos: documentos, exercícios, trilhas de aprendizado, fóruns, etc. |
| **LtiBundle** | Integração LTI 1.3 para ferramentas de aprendizado externas |

## Como Este Guia Está Organizado

1. **Primeiros Passos** — Pilha tecnológica, configuração de desenvolvimento, estrutura do projeto
2. **Backend** — Arquitetura Symfony, entidades, sistema de recursos, controladores, configurações
3. **API** — API REST via API Platform, autenticação JWT, ações personalizadas
4. **Frontend** — Componentes Vue, visualizações, roteamento, gerenciamento de estado, sistema de build
5. **Temas** — Temas de cores, CSS/Tailwind, templates Twig
6. **Plugins** — Arquitetura e desenvolvimento de plugins
7. **Contribuição** — Convenções de codificação, fluxo de trabalho com git, testes