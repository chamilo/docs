# Pilha Tecnológica

A seguir, descreve-se a pilha tecnológica do Chamilo 2.0. Todas as versões mencionadas aqui estão sujeitas a alterações à medida que novas versões do Chamilo são lançadas. Os números de versão utilizam a [notação de versões do Composer](https://getcomposer.org/doc/articles/versions.md), que estabelece regras para permitir certa flexibilidade em relação às versões.

Incluindo dependências hierárquicas, o Chamilo utiliza várias centenas de bibliotecas de Software Livre. Esta lista inclui apenas aquelas que usamos com mais frequência e que provavelmente afetarão o trabalho de um desenvolvedor do Chamilo semanalmente. Somos gratos a todos os outros desenvolvedores de Software Livre que tornam nosso trabalho mais fácil, sustentável e seguro.

## Backend

| Tecnologia | Versão | Finalidade |
|-----------|---------|---------|
| PHP | 8.2+ | Ambiente de execução |
| Symfony | 6.4.* | Framework |
| Doctrine ORM | ^2.16 | Abstração de banco de dados |
| API Platform | ^3.0 | Framework para API REST |
| oneup/flysystem-bundle | ~4.0 | Abstração de armazenamento de arquivos |
| vich/uploader-bundle | ^2.8 | Gerenciamento de upload de arquivos |
| stof/doctrine-extensions-bundle | ^1.12 | Extensões do Doctrine (árvore, timestampable, sluggable) |
| lexik/jwt-authentication-bundle | ^2.20 | Autenticação JWT |
| nelmio/cors-bundle | ^2.2 | Cabeçalhos CORS |
| mpdf/mpdf | ~8.0 | Geração de PDF |
| phpoffice/phpspreadsheet | ~1.16 | Manipulação de planilhas Excel |
| firebase/php-jwt | ^7.0 | Manipulação de tokens JWT |
| bigbluebutton/bigbluebutton-api-php | ^2.0 | Integração com BigBlueButton |
| packbackbooks/lti-1p3-tool | ^6.4 | Implementação de LTI 1.3 |

## Frontend

| Tecnologia | Versão | Finalidade |
|-----------|---------|---------|
| Vue.js | ^3.5 | Framework de interface do usuário |
| PrimeVue | ^4.5 | Biblioteca de componentes |
| Pinia | ^3.0 | Gerenciamento de estado |
| Vue Router | 5.0 | Roteamento do lado do cliente |
| Vue I18n | 11.3 | Internacionalização |
| Axios | ^1.13 | Cliente HTTP |
| TinyMCE | ^5.10 | Editor de texto rico |
| Chart.js | ^4.5 | Gráficos e visualizações |
| FullCalendar | ^6.1 | Componente de calendário |
| Uppy | ^4.5 | Widget de upload de arquivos |
| PrimeFlex | ^4.0 | Framework de utilitários CSS |

## Ferramentas de Build

| Tecnologia | Versão | Finalidade |
|-----------|---------|---------|
| Composer | ^2.8 | Gerenciador de dependências PHP |
| Webpack | ^5.105 | Empacotador de módulos |
| Symfony Webpack Encore | ^5.3 | Wrapper do Webpack para Symfony |
| Tailwind CSS | ^3.4 | Framework CSS utilitário |
| Sass | ^1.98 | Pré-processador CSS |
| TypeScript | ^5.9 | JavaScript com tipagem segura |
| ESLint | ^10.0 | Linting |
| Prettier | 3.8 | Formatação de código |

## Ícones

| Biblioteca | Versão | Uso |
|---------|---------|-------|
| @mdi/font | 7.4.47 | Material Design Icons (classes CSS `mdi mdi-*`) |

## Banco de Dados

O Chamilo suporta:

* MySQL 5.7+
* MariaDB 10.11.2+

## Armazenamento em Nuvem

Via adaptadores Flysystem:

* Sistema de arquivos local (padrão)
* AWS S3 (`league/flysystem-aws-s3-v3`)
* Azure Blob Storage (`league/flysystem-azure-blob-storage`)
* Google Cloud Storage (`league/flysystem-google-cloud-storage`)