# Stack tecnológico

A seguir descreve-se a stack tecnológica do Chamilo 3.0. Todas as versões indicadas aqui provavelmente mudarão à medida que novas versões do Chamilo forem lançadas. Os números de versão usam a [notação de versões do Composer](https://getcomposer.org/doc/articles/versions.md), que define regras para permitir alguma flexibilidade em torno das versões.

Incluindo dependências hierárquicas, o Chamilo utiliza várias centenas de bibliotecas de Software Livre. Esta lista inclui apenas as que usamos com mais frequência e que provavelmente afetarão o trabalho de um desenvolvedor Chamilo a cada semana ou algo próximo disso. Somos gratos a todos os demais desenvolvedores de Software Livre que tornam nosso trabalho mais fácil, mais sustentável e mais seguro.

## Backend

| Technology | Version | Purpose |
|-----------|---------|---------|
| PHP | 8.3 – 8.5 | Runtime |
| Symfony | 7.4.* | Framework |
| Doctrine ORM | ^3.3 | Abstração de banco de dados |
| API Platform | ^4.2 | Framework de API REST |
| oneup/flysystem-bundle | ~4.0 | Abstração de armazenamento de arquivos |
| vich/uploader-bundle | ^2.8 | Tratamento de upload de arquivos |
| stof/doctrine-extensions-bundle | ^1.12 | Extensões do Doctrine (tree, timestampable, sluggable) |
| lexik/jwt-authentication-bundle | ^2.20 | Autenticação JWT |
| nelmio/cors-bundle | ^2.2 | Cabeçalhos CORS |
| mpdf/mpdf | ~8.0 | Geração de PDF |
| phpoffice/phpspreadsheet | ~1.16 | Manipulação de Excel/planilhas |
| firebase/php-jwt | ^7.0 | Manipulação de tokens JWT |
| bigbluebutton/bigbluebutton-api-php | ^2.0 | Integração com BigBlueButton |
| packbackbooks/lti-1p3-tool | ^6.4 | Implementação LTI 1.3 |

## Frontend

| Technology | Version | Purpose |
|-----------|---------|---------|
| Vue.js | ^3.5 | Framework de interface |
| PrimeVue | ^4.5 | Biblioteca de componentes |
| Pinia | ^3.0 | Gerenciamento de estado |
| Vue Router | ^5.1 | Roteamento no cliente |
| Vue I18n | ^11.4 | Internacionalização |
| Axios | ^1.16 | Cliente HTTP |
| TinyMCE | ^5.10 | Editor de texto rico |
| Chart.js | ^4.5 | Gráficos e visualizações |
| FullCalendar | ^6.1 | Componente de calendário |
| Uppy | ^4.5 | Widget de upload de arquivos |

## Ferramentas de build

| Technology | Version | Purpose |
|-----------|---------|---------|
| Composer | ^2.8 | Gerenciador de dependências PHP |
| Webpack | ^5.107 | Empacotador de módulos |
| Symfony Webpack Encore | ^5.3 | Wrapper do Webpack para Symfony |
| Tailwind CSS | ^3.4 | Framework CSS utility-first |
| Sass | ^1.100 | Pré-processador CSS |
| TypeScript | ^5.9 | JavaScript com tipagem segura |
| ESLint | ^10.0 | Linting |
| Prettier | 3.8 | Formatação de código |

## Ícones

| Library | Version | Usage |
|---------|---------|-------|
| @mdi/font | 7.4.47 | Material Design Icons (classes CSS `mdi mdi-*`) |

## Banco de dados

O Chamilo é compatível com:

* MySQL 5.7+
* MariaDB 10.11.2+

## Armazenamento em nuvem

Por meio de adaptadores Flysystem:

* Sistema de arquivos local (padrão)
* AWS S3 (`league/flysystem-aws-s3-v3`)
* Azure Blob Storage (`azure-oss/storage-blob-flysystem`)
* Google Cloud Storage (`league/flysystem-google-cloud-storage`)