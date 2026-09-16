# Atualização

Nota: Nesta página, utilizamos 3.0.0 como número de versão estrito e 3.x para identificar todas as versões que começam com o número 3 (3.0.0, 3.0.1, 3.1.0, etc.). A mesma convenção aplica-se a 2.x.

O processo de atualização a partir de 1.11.x também está descrito no ficheiro `public/documentation/installation_guide.html`, no código do Chamilo.
A informação aqui é, em grande medida, redundante. Pode consultá-la em linha em `https://campus.chamilo.net/documentation/installation_guide.html`.

**Atualize para 3.0, não para 2.x.** A versão 3.0 é a versão atual, e algumas definições de 1.11.x ainda não tinham equivalente em 2.0.0. Um sistema 1.11.x passa, portanto, diretamente para 3.0. Testámos migrações semelhantes de forma extensiva, mas cada plataforma tem a sua própria história: experimente primeiro num ambiente de teste e considere ser acompanhado profissionalmente pelos [fornecedores oficiais do Chamilo](https://chamilo.org/providers) neste processo.

## Atualização de 1.11.x para 3.0

A atualização do Chamilo 1.11.x para 3.0 é uma **migração major**, não uma simples atualização. O Chamilo 2.0 foi reconstruído sobre o framework Symfony, com um esquema de base de dados reestruturado, uma nova API e uma organização de ficheiros diferente, e o 3.0 continua essa linha. Planeie esta migração com cuidado e experimente-a num ambiente de teste antes de a aplicar em produção.

### Antes de começar

1. **Leia as notas de lançamento** do Chamilo 3.x para compreender o que mudou, o que é novo e que funcionalidades de 1.11.x poderão ainda não estar disponíveis.
2. **Faça uma cópia de segurança de tudo**:
   - Dump completo da base de dados (`mysqldump` ou equivalente).
   - Todos os ficheiros no diretório de instalação do Chamilo 1.11.x, especialmente `app/upload/`, `app/courses/` e `main/`.
   - O seu ficheiro `configuration.php`.
3. **Teste primeiro num servidor de staging.** Nunca execute a migração diretamente no servidor de produção.
4. **Verifique os requisitos do servidor.** O Chamilo 3.x tem requisitos diferentes dos de 1.11.x (nomeadamente, PHP 8.3 ou posterior — o instalador recusa qualquer versão mais antiga). Consulte [Requisitos do servidor](server-requirements.md).
5. **Elimine a tabela `version` da base de dados 1.11.x.** Este passo é obrigatório. O Chamilo 2.x e posteriores armazenam o histórico de migrações do Doctrine numa tabela com esse nome, com outras colunas. Se deixar a tabela de 1.11.x no lugar, a atualização interrompe-se imediatamente. A tabela não é necessária para o funcionamento do Chamilo 1.11.x.
6. **Descompacte o código novo num diretório novo.** Os ficheiros de 1.11.x permanecem onde estão. O instalador lê-os como origem dos seus cursos e carregamentos e escreve o resultado na nova árvore.

### Executar a atualização

Pode executar a atualização através do assistente web ou da linha de comandos.

#### Assistente web

1. Aponte o `DocumentRoot` do seu virtual host para o subdiretório `public/` da nova árvore.
2. Abra o seu URL. O assistente inicia-se, porque a nova árvore ainda não tem ficheiro `.env`.
3. No passo 2, selecione a opção de atualização e indique o caminho raiz da sua instalação 1.11.x.
4. Siga o assistente até ao fim.

#### Linha de comandos

Defina `UPDATE_PATH` para a raiz da sua instalação 1.11.x e, em seguida, execute as migrações:

```bash
UPDATE_PATH=/path/to/chamilo-1.11 php bin/console doctrine:migrations:migrate --no-interaction
```

Aumente primeiro `memory_limit` e `max_execution_time`. A migração lê todos os ficheiros de curso, pelo que precisa de muito mais do que os valores predefinidos.

#### Quanto tempo demora

A duração depende do tamanho da base de dados e dos ficheiros de curso. Como ponto de referência, uma plataforma 1.11.28 com 238 tabelas, 11 cursos, 63 utilizadores e 1489 ficheiros de curso demorou **6 minutos** e 1,7 GB de memória, e executou 393 migrações. Uma plataforma de produção de grande dimensão demora horas. Planeie uma janela de manutenção e leia o [fórum do Chamilo](https://chamilo.org) ou contacte um [fornecedor oficial](https://chamilo.org/providers) antes de a executar em produção.

### O que pode exigir atenção manual

| Área | Notas |
|------|-------|
| **Plugins personalizados** | Os plugins de 1.11.x não funcionam em 2.x nem em 3.x. Têm de ser reescritos ou substituídos. Os oficiais têm sido portados progressivamente desde 2.0 — consulte a lista de plugins da sua versão para ver quais estão disponíveis. |
| **Temas personalizados** | Os temas de 1.11.x não funcionam em 2.x nem em 3.x. Recrie a sua identidade visual com o sistema de temas de 3.x. |
| **Modificações personalizadas na base de dados** | Quaisquer modificações diretas na base de dados fora do Chamilo poderão não ser migradas. |
| **Pacotes SCORM** | O conteúdo SCORM deve migrar, mas teste os pacotes individualmente para verificar a reprodução. |
| **Integrações externas** | Quaisquer integrações que utilizem a API ou os serviços web de 1.11.x precisam de ser atualizadas para a API exclusivamente REST de 2.x, com [API Platform](https://github.com/api-platform/api-platform). |

## Atualização de 2.x para 3.0

Esta atualização mantém o diretório existente e a base de dados existente. Copia o código novo sobre a árvore antiga e, em seguida, executa as migrações, através do assistente web ou da linha de comandos.

### Semear primeiro o histórico de migrações

O Chamilo instala o esquema da base de dados diretamente a partir das definições das entidades, pelo que uma instalação criada pelo instalador contém o esquema final, mas um **histórico de migrações vazio**. As instalações criadas antes do Chamilo 3.0 nunca receberam esse histórico. Duas coisas dependem dele:

* `doctrine:migrations:migrate` decide o que executar a partir dele. Com um histórico vazio tenta reproduzir todas as migrações desde o início sobre um esquema que já está atualizado.
* O instalador web decide a partir dele se uma atualização está pendente. Com um histórico vazio recusa o pedido, porque nada prova que uma atualização é devida.

Por isso, semeie-o uma vez e observe a ordem abaixo.

> **Aviso: semeie o histórico antes de copiar o código novo.** Os comandos marcam todas as migrações que o código **implantado** transporta como já executadas. Se os executar depois de copiar o código 3.0, marcam também as migrações 3.0 e a sua atualização nunca é executada.

Com a sua versão atual ainda no lugar, execute:

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

O primeiro comando cria a tabela de histórico. O segundo marca as migrações da sua versão atual. `doctrine:migrations:version` falha por si só se a tabela ainda não existir, por isso não omita o primeiro.

Verifique o resultado:

```bash
php bin/console doctrine:migrations:status
```

`Executed` deve ser igual a `Available`, e `New` deve ser 0. Agora copie o código 3.0.

### Executar a atualização

Copie o código novo e, em seguida, abra o seu URL e siga o assistente, ou execute as migrações a partir da linha de comandos:

```bash
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

O assistente web abre apenas enquanto as migrações estão pendentes. Quando a atualização termina, responde novamente `409 Conflict`, que é o que o protege: o assistente não tem autenticação própria.

## Atualizar o Chamilo 3.0.x

As atualizações menores dentro do ramo 3.0 são mais diretas.

### Processo de atualização

#### Utilizar um pacote

1. **Faça uma cópia de segurança** da base de dados e dos ficheiros.

2. **Descarregue a versão 3.0.x mais recente** em [chamilo.org](https://chamilo.org/download):

3. **Expanda localmente**

Por exemplo (adapte à versão descarregada)
   ```bash
   unzip chamilo-3.0.1.zip
   ```

4. **Copie os ficheiros sobre a sua instalação existente do Chamilo**
   ```bash
   cp -r chamilo/* [your-chamilo-installation-path]/
   cp -r chamilo/.* [your-chamilo-installation-path]/
   ```

5. **Execute as migrações da base de dados:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Limpe a cache:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Altere as permissões**

Adapte ao utilizador do seu servidor web:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Verifique** se a plataforma carrega corretamente e faça uma verificação pontual das funcionalidades principais.

#### Utilizar Git

Se instalou o Chamilo com Git, pode seguir estas instruções em alternativa.

1. **Faça uma cópia de segurança** da base de dados e dos ficheiros.

2. **Obtenha o código mais recente** (ou descarregue a nova versão):
   ```bash
   git pull origin 3.0
   ```

3. **Atualize as dependências PHP:**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **Atualize as dependências JavaScript e reconstrua os assets:**
   ```bash
   yarn install && yarn build
   ```

5. **Execute as migrações da base de dados:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Limpe a cache:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Altere as permissões**

Adapte ao utilizador do seu servidor web:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Verifique** se a plataforma carrega corretamente e faça uma verificação pontual das funcionalidades principais.

### Automatizar atualizações

Para organizações que gerem várias instâncias do Chamilo, considere automatizar o processo de atualização com um script:

```bash
#!/bin/bash
set -e

# Pull code
git pull origin 3.0

# Dependencies
composer install --no-dev --optimize-autoloader
yarn install && yarn build

# Database
php bin/console doctrine:migrations:migrate --no-interaction

# Cache
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

echo "Update complete."
```

## Dicas

* **Faça sempre uma cópia de segurança antes de atualizar.** As migrações da base de dados não são reversíveis através da interface do Chamilo.
* **Teste primeiro em ambiente de staging** -- especialmente na migração de 1.11.x para 3.0, que envolve uma transformação significativa de dados.
* **Agende as atualizações durante janelas de manutenção** quando os utilizadores não estejam a usar ativamente a plataforma.
* **Subscreva as releases do GitHub** em [Github](https://github.com/chamilo/chamilo-lms/releases) utilizando o ícone do sino para ser notificado de novas versões e correções de segurança.
* **Se o assistente responder `Chamilo is already installed`**, não encontrou nenhuma migração pendente. Execute `php bin/console doctrine:migrations:status` para verificar. Se `Executed` for 0 numa plataforma que funciona, o histórico de migrações nunca foi inicializado — consulte [Seed the migration history first](#seed-the-migration-history-first).
* **A transferência automática de novas versões** ainda não está disponível no Chamilo 3.0, mas trata-se de um projeto em curso que esperamos disponibilizar em breve. A própria atualização já é executada a partir do assistente web.