# Armazenamento em Nuvem

O Chamilo 2.0 suporta backends de armazenamento em nuvem para arquivos enviados por usuários através do **Flysystem**, uma biblioteca de abstração de sistema de arquivos PHP integrada ao Symfony. Isso permite que você armazene arquivos em serviços de nuvem em vez de (ou além de) o sistema de arquivos local.

## Por que Usar Armazenamento em Nuvem?

* **Escalabilidade** -- O armazenamento em nuvem cresce com sua plataforma sem a necessidade de gerenciar espaço em disco.
* **Implantações em múltiplos servidores** -- Ao executar vários servidores web atrás de um balanceador de carga, o armazenamento em nuvem garante que todos os servidores acessem os mesmos arquivos.
* **Durabilidade** -- Os provedores de nuvem oferecem redundância e backup integrados.
* **Custo** -- O armazenamento de objetos é frequentemente mais barato por gigabyte do que o armazenamento em bloco conectado a servidores.

## Provedores Suportados

| Provedor | Adaptador Flysystem |
|----------|---------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `league/flysystem-azure-blob-storage` |
| **MinIO** (compatível com S3) | Usa o adaptador S3 com um endpoint personalizado |
| **Sistema de arquivos local** | Padrão, não requer pacotes adicionais |

## Instalação

O Chamilo já vem com os seguintes provedores pré-instalados:

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
league/flysystem-azure-blob-storage
```

## Configuração

O Chamilo divide seus arquivos em vários mounts do Flysystem — **assets**, **assets cache**, **resources**, **resources cache**, **themes** e **plugins**. Cada mount pode ser direcionado a um bucket ou contêiner diferente. A configuração de nuvem em `config/packages/oneup_flysystem.yaml` é selecionada por ambiente usando condições `when@` e lê as variáveis que você define em `.env`.

### Amazon S3

```bash
# .env — credenciais comuns
AWS_S3_STORAGE_VERSION=latest
AWS_S3_STORAGE_REGION=eu-central-1
AWS_S3_STORAGE_ACCESS_KEY=your-access-key
AWS_S3_STORAGE_ACCESS_SECRET=your-secret-key

# Buckets por mount (cada mount pode ser um bucket diferente)
AWS_S3_STORAGE_ASSET_BUCKET=chamilo-assets
AWS_S3_STORAGE_ASSET_CACHE_BUCKET=chamilo-asset-cache
AWS_S3_STORAGE_RESOURCE_BUCKET=chamilo-resources
AWS_S3_STORAGE_RESOURCE_CACHE_BUCKET=chamilo-resource-cache
AWS_S3_STORAGE_THEMES_BUCKET=chamilo-themes
AWS_S3_STORAGE_PLUGINS_BUCKET=chamilo-plugins

# Prefixos de caminho opcionais dentro de um bucket — útil para compartilhar buckets entre portais
AWS_S3_STORAGE_ASSET_PREFIX=portal1/assets
AWS_S3_STORAGE_RESOURCE_PREFIX=portal1/resources
```

### Azure Blob Storage

```bash
# .env
AZURE_STORAGE_CONNECTION_STRING='DefaultEndpointsProtocol=https;AccountName=...;AccountKey=...'
AZURE_STORAGE_ASSET_CONTAINER=asset-container
AZURE_STORAGE_ASSET_CACHE_CONTAINER=asset-cache-container
AZURE_STORAGE_RESOURCE_CONTAINER=resources-container
AZURE_STORAGE_RESOURCE_CACHE_CONTAINER=resources-cache-container
AZURE_STORAGE_THEMES_CONTAINER=themes-container
# Prefixos opcionais
AZURE_STORAGE_ASSET_PREFIX=optional/prefix
```

### Google Cloud Storage

Configure o GCS da mesma forma que o S3, usando variáveis de ambiente específicas do GCS e um bucket por mount. Consulte o arquivo `oneup_flysystem.yaml` fornecido com sua versão para os nomes exatos das variáveis — eles também estão documentados em `.env`.

### MinIO (Compatível com S3)

O MinIO funciona através do adaptador S3 com um endpoint personalizado e endereçamento no estilo de caminho — defina `AWS_S3_STORAGE_*` como para o S3 e adicione o endpoint do MinIO e os sinalizadores de estilo de caminho suportados pelo bundle.

> O conjunto completo de nomes de variáveis está listado no arquivo `.env.dist` fornecido com o Chamilo. Copie apenas as linhas do provedor que você realmente usa para o seu `.env` e descomente-as.

## Migrando Arquivos Existentes

Se você está mudando de armazenamento local para armazenamento em nuvem em uma plataforma existente, deve migrar os arquivos existentes:

1. Configure o novo adaptador de armazenamento conforme descrito acima.
2. Copie os arquivos existentes do diretório local `var/upload/` para o seu bucket de armazenamento em nuvem, preservando a estrutura de diretórios.
3. Verifique se os arquivos estão acessíveis através da plataforma após a migração.

## Permissões e Acesso

Certifique-se de que seu bucket de armazenamento em nuvem **não seja publicamente acessível**, a menos que você explicitamente precise de URLs de arquivos públicos. O Chamilo serve arquivos através de sua própria camada de controle de acesso, então o acesso público direto ao bucket é desnecessário e representa um risco de segurança.

Para o S3, use uma política de bucket que restrinja o acesso às credenciais IAM configuradas acima.

## Dicas

* **Teste com MinIO localmente** antes de implantar em um provedor de nuvem — o MinIO é um servidor gratuito e compatível com S3 que você pode executar em sua própria máquina.
* **Use um bucket dedicado** para o Chamilo, em vez de compartilhar um bucket com outras aplicações.
* **Configure políticas de ciclo de vida** no seu bucket de nuvem para gerenciar custos de armazenamento (por exemplo, mover arquivos antigos para camadas de armazenamento mais baratas).