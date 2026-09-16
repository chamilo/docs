# Armazenamento em Nuvem

O Chamilo 3.0 oferece suporte a backends de armazenamento em nuvem para arquivos enviados pelos usuários por meio do **Flysystem**, uma biblioteca de abstração de sistema de arquivos em PHP integrada ao Symfony. Isso permite armazenar arquivos em serviços de nuvem em vez de (ou além de) o sistema de arquivos local.

## Por que usar armazenamento em nuvem?

* **Escalabilidade** -- O armazenamento em nuvem cresce com a sua plataforma sem gerenciar espaço em disco.
* **Implantações com vários servidores** -- Ao executar vários servidores web atrás de um balanceador de carga, o armazenamento em nuvem garante que todos os servidores acessem os mesmos arquivos.
* **Durabilidade** -- Os provedores de nuvem oferecem redundância e backup integrados.
* **Custo** -- O armazenamento de objetos costuma ser mais barato por gigabyte do que o armazenamento em bloco anexado aos servidores.

## Provedores suportados

| Provedor | Adaptador Flysystem |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `azure-oss/storage-blob-flysystem` |
| **MinIO** (compatível com S3) | Usa o adaptador S3 com um endpoint personalizado |
| **DigitalOcean Spaces** (compatível com S3) | Usa o adaptador S3 com um endpoint personalizado |
| **Sistema de arquivos local** | Padrão, nenhum pacote adicional necessário |

## Instalação

O Chamilo já vem com os seguintes provedores pré-instalados:

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
azure-oss/storage-blob-flysystem
```

## Configuração

O Chamilo divide seus arquivos em vários mounts do Flysystem — **assets**, **assets cache**, **resources**, **resources cache**, **themes** e **plugins**. Cada mount pode apontar para um bucket ou container diferente. A configuração de nuvem em `config/packages/oneup_flysystem.yaml` é selecionada por ambiente usando condições `when@` e lê as variáveis definidas em `.env`.

### Amazon S3

```bash
# .env — common credentials
AWS_S3_STORAGE_VERSION=latest
AWS_S3_STORAGE_REGION=eu-central-1
AWS_S3_STORAGE_ACCESS_KEY=your-access-key
AWS_S3_STORAGE_ACCESS_SECRET=your-secret-key

# Per-mount buckets (each mount can be a different bucket)
AWS_S3_STORAGE_ASSET_BUCKET=chamilo-assets
AWS_S3_STORAGE_ASSET_CACHE_BUCKET=chamilo-asset-cache
AWS_S3_STORAGE_RESOURCE_BUCKET=chamilo-resources
AWS_S3_STORAGE_RESOURCE_CACHE_BUCKET=chamilo-resource-cache
AWS_S3_STORAGE_THEMES_BUCKET=chamilo-themes
AWS_S3_STORAGE_PLUGINS_BUCKET=chamilo-plugins

# Optional path prefixes inside a bucket — useful to share buckets across portals
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
# Optional prefixes
AZURE_STORAGE_ASSET_PREFIX=optional/prefix
```

### Google Cloud Storage

Configure o GCS da mesma forma que o S3, usando variáveis de ambiente específicas do GCS e um bucket por mount. Consulte o `oneup_flysystem.yaml` fornecido com a sua versão para os nomes exatos das variáveis — eles também estão documentados em `.env`.

### MinIO (compatível com S3)

O MinIO funciona por meio do adaptador S3 com um endpoint personalizado e endereçamento no estilo path — defina `AWS_S3_STORAGE_*` como no S3 e adicione o endpoint do MinIO e as flags de path-style suportadas pelo bundle.

### DigitalOcean Spaces (compatível com S3)

O DigitalOcean Spaces é um serviço hospedado separado do MinIO — não é MinIO por baixo, mas expõe a mesma API compatível com S3, portanto também funciona por meio do adaptador S3: defina `AWS_S3_STORAGE_*` como no S3 e aponte `AWS_S3_STORAGE_ENDPOINT` (ou a variável de endpoint equivalente do bundle) para o endpoint regional do seu Space, por exemplo `https://<region>.digitaloceanspaces.com`.

> O conjunto completo de nomes de variáveis está listado no arquivo `.env.dist` fornecido com o Chamilo. Copie apenas as linhas do provedor que você realmente usa para o seu `.env` e descomente-as.

## Temas

A montagem de **temas** se comporta de forma diferente das demais: os temas fornecidos com o Chamilo (`chamilo`, `chamilo3`) fazem parte do código e residem em `var/themes`, que é exatamente o diretório atendido pelo adaptador local padrão. Quando você aponta a montagem de temas para um contêiner na nuvem, esse contêiner começa vazio, de modo que logotipos, cores e imagens de tema ficam ausentes e a interface é renderizada sem estilo.

Envie os temas incluídos para o armazenamento configurado com:

```bash
php bin/console chamilo:remote-storage:upload-themes
```

| Opção | Efeito |
|--------|--------|
| `--dry-run` | Relata o que seria enviado, sem gravar nada |
| `--overwrite` | Substitui arquivos que já existem no armazenamento remoto |

Os arquivos já presentes no sistema de arquivos de temas são mantidos, a menos que `--overwrite` seja informado, de modo que executar o comando novamente nunca descarta os logotipos ou temas de cores que um administrador enviou em **Administração > Configuração > Cores**. Quando o sistema de arquivos de temas é o diretório local `var/themes`, o comando detecta isso e não faz nada, portanto é seguro executá-lo em qualquer instalação.

O Chamilo executa este comando por conta própria ao final do assistente de instalação e novamente após uma migração de banco de dados bem-sucedida ao atualizar, de modo que os novos arquivos de tema chegam ao armazenamento em nuvem sem nenhum passo manual.

Dois casos ainda exigem que você o execute manualmente:

* **Migrar uma plataforma existente para armazenamento em nuvem**, pois nenhuma instalação ou atualização ocorre nesse momento.
* **Atualizar arquivos de tema que mudaram em uma nova versão**, com `--overwrite`. As execuções automáticas nunca sobrescrevem, precisamente para que não revertam um logotipo que um administrador enviou para um tema incluído; o custo é que um `colors.css` ou `tiny-settings.js` enviado pela nova versão não substitui a cópia já presente no contêiner.

## Migrando arquivos existentes

Se você estiver migrando de armazenamento local para armazenamento em nuvem em uma plataforma existente, deve migrar os arquivos existentes:

1. Configure o novo adaptador de armazenamento conforme descrito acima.
2. Copie os arquivos existentes do diretório local `var/upload/` para o bucket de armazenamento em nuvem, preservando a estrutura de diretórios.
3. Execute `php bin/console chamilo:remote-storage:upload-themes` para enviar os temas incluídos, conforme descrito acima.
4. Verifique se os arquivos estão acessíveis pela plataforma após a migração.

## Permissões e acesso

Garanta que o bucket de armazenamento em nuvem **não esteja acessível publicamente**, a menos que você precise explicitamente de URLs públicas de arquivos. O Chamilo serve os arquivos por meio de sua própria camada de controle de acesso, portanto o acesso público direto ao bucket é desnecessário e representa um risco de segurança.

Para S3, use uma política de bucket que restrinja o acesso às credenciais IAM configuradas acima.

## Dicas

* **Teste com MinIO localmente** antes de implantar em um provedor de nuvem -- o MinIO é um servidor gratuito, compatível com S3, que você pode executar na sua própria máquina.
* **DigitalOcean Spaces** é uma alternativa hospedada compatível com S3 em relação ao Amazon S3, confirmada como funcional com o adaptador S3 do Chamilo.
* **Use um bucket dedicado** para o Chamilo em vez de compartilhar um bucket com outras aplicações.
* **Configure políticas de ciclo de vida** no bucket em nuvem para gerenciar os custos de armazenamento (por exemplo, mover arquivos antigos para camadas de armazenamento mais baratas).