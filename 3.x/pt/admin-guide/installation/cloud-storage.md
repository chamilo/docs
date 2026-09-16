# Armazenamento na nuvem

O Chamilo 3.0 suporta backends de armazenamento na nuvem para ficheiros carregados pelos utilizadores através do **Flysystem**, uma biblioteca PHP de abstração do sistema de ficheiros integrada no Symfony. Isto permite armazenar ficheiros em serviços na nuvem em vez de (ou em complemento a) o sistema de ficheiros local.

## Porquê utilizar armazenamento na nuvem?

* **Escalabilidade** -- O armazenamento na nuvem cresce com a sua plataforma sem gerir espaço em disco.
* **Implantações com vários servidores** -- Ao executar vários servidores web atrás de um balanceador de carga, o armazenamento na nuvem garante que todos os servidores acedem aos mesmos ficheiros.
* **Durabilidade** -- Os fornecedores na nuvem oferecem redundância e cópia de segurança integradas.
* **Custo** -- O armazenamento de objetos é frequentemente mais barato por gigabyte do que o armazenamento em bloco associado aos servidores.

## Fornecedores suportados

| Fornecedor | Adaptador Flysystem |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `azure-oss/storage-blob-flysystem` |
| **MinIO** (compatível com S3) | Utiliza o adaptador S3 com um endpoint personalizado |
| **DigitalOcean Spaces** (compatível com S3) | Utiliza o adaptador S3 com um endpoint personalizado |
| **Sistema de ficheiros local** | Predefinido, sem pacotes adicionais necessários |

## Instalação

O Chamilo já inclui os seguintes fornecedores pré-instalados:

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
azure-oss/storage-blob-flysystem
```

## Configuração

O Chamilo divide os seus ficheiros por vários mounts Flysystem — **assets**, **assets cache**, **resources**, **resources cache**, **themes** e **plugins**. Cada mount pode apontar para um bucket ou contentor diferente. A configuração na nuvem em `config/packages/oneup_flysystem.yaml` é selecionada por ambiente através de condições `when@` e lê as variáveis que definir em `.env`.

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

Configure o GCS da mesma forma que o S3, utilizando variáveis de ambiente específicas do GCS e um bucket por mount. Consulte o `oneup_flysystem.yaml` incluído na sua versão para os nomes exatos das variáveis — também estão documentados em `.env`.

### MinIO (compatível com S3)

O MinIO funciona através do adaptador S3 com um endpoint personalizado e endereçamento no estilo de caminho — defina `AWS_S3_STORAGE_*` como para o S3 e adicione o endpoint MinIO e as flags de path-style suportadas pelo bundle.

### DigitalOcean Spaces (compatível com S3)

O DigitalOcean Spaces é um serviço alojado distinto do MinIO — não é MinIO por baixo, mas expõe a mesma API compatível com S3, pelo que também funciona através do adaptador S3: defina `AWS_S3_STORAGE_*` como para o S3 e aponte `AWS_S3_STORAGE_ENDPOINT` (ou a variável de endpoint equivalente do bundle) para o endpoint regional do seu Space, por exemplo `https://<region>.digitaloceanspaces.com`.

> O conjunto completo de nomes de variáveis está listado no ficheiro `.env.dist` incluído com o Chamilo. Copie apenas as linhas do fornecedor que realmente utiliza para o seu `.env` e descomente-as.

## Temas

O montagem de **temas** comporta-se de forma diferente das restantes: os temas fornecidos com o Chamilo (`chamilo`, `chamilo3`) fazem parte do código e residem em `var/themes`, que é exatamente o diretório servido pelo adaptador local predefinido. Quando aponta a montagem de temas para um contentor na nuvem, esse contentor começa vazio, pelo que logótipos, cores e imagens de tema estão em falta e a interface é apresentada sem estilo.

Carregue os temas incluídos para o armazenamento configurado com:

```bash
php bin/console chamilo:remote-storage:upload-themes
```

| Option | Effect |
|--------|--------|
| `--dry-run` | Report what would be uploaded, without writing anything |
| `--overwrite` | Replace files that already exist on the remote storage |

Os ficheiros já presentes no sistema de ficheiros de temas são mantidos a menos que seja indicado `--overwrite`, pelo que voltar a executar o comando nunca descarta os logótipos ou temas de cores que um administrador carregou através de **Administração > Configuração > Cores**. Quando o sistema de ficheiros de temas é o diretório local `var/themes`, o comando deteta-o e não faz nada, pelo que é seguro executá-lo em qualquer instalação.

O Chamilo executa este comando por si próprio no final do assistente de instalação e novamente após uma migração de base de dados bem-sucedida ao atualizar, de modo que os novos ficheiros de tema chegam ao armazenamento na nuvem sem qualquer passo manual.

Dois casos ainda exigem que o execute manualmente:

* **Mudar uma plataforma existente para armazenamento na nuvem**, uma vez que nesse momento não ocorre instalação nem atualização.
* **Atualizar ficheiros de tema que mudaram numa nova versão**, com `--overwrite`. As execuções automáticas nunca substituem, precisamente para não reverterem um logótipo que um administrador carregou para um tema incluído; o preço é que um `colors.css` ou `tiny-settings.js` enviado pela nova versão não substitui a cópia já existente no contentor.

## Migrar ficheiros existentes

Se estiver a mudar de armazenamento local para armazenamento na nuvem numa plataforma existente, deve migrar os ficheiros existentes:

1. Configure o novo adaptador de armazenamento conforme descrito acima.
2. Copie os ficheiros existentes do diretório local `var/upload/` para o bucket de armazenamento na nuvem, preservando a estrutura de diretórios.
3. Execute `php bin/console chamilo:remote-storage:upload-themes` para carregar os temas incluídos, conforme descrito acima.
4. Verifique se os ficheiros estão acessíveis através da plataforma após a migração.

## Permissões e acesso

Garanta que o bucket de armazenamento na nuvem **não está acessível publicamente**, a menos que necessite explicitamente de URLs de ficheiros públicos. O Chamilo serve os ficheiros através da sua própria camada de controlo de acesso, pelo que o acesso público direto ao bucket é desnecessário e constitui um risco de segurança.

Para S3, utilize uma política de bucket que restrinja o acesso às credenciais IAM configuradas acima.

## Dicas

* **Teste com MinIO localmente** antes de implementar num fornecedor na nuvem -- o MinIO é um servidor gratuito, compatível com S3, que pode executar na sua própria máquina.
* **DigitalOcean Spaces** é uma alternativa alojada compatível com S3 à Amazon S3, confirmada como funcional com o adaptador S3 do Chamilo.
* **Utilize um bucket dedicado** para o Chamilo em vez de partilhar um bucket com outras aplicações.
* **Configure políticas de ciclo de vida** no seu bucket na nuvem para gerir os custos de armazenamento (por exemplo, mover ficheiros antigos para níveis de armazenamento mais baratos).