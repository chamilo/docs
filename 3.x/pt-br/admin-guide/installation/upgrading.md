# Atualização

Nota: Nesta página, usamos 3.0.0 como número de versão estrito e 3.x para identificar todas as versões que começam com o número 3 (3.0.0, 3.0.1, 3.1.0 etc.). A mesma convenção se aplica a 2.x.

O processo de atualização a partir de 1.11.x também está descrito no arquivo `public/documentation/installation_guide.html`, dentro do código do Chamilo.
As informações aqui são em grande parte redundantes. Você pode vê-las on-line em `https://campus.chamilo.net/documentation/installation_guide.html`.

**Atualize para 3.0, não para 2.x.** A versão 3.0 é a versão atual, e algumas configurações de 1.11.x ainda não tinham equivalente em 2.0.0. Um sistema 1.11.x, portanto, vai direto para 3.0. Testamos migrações semelhantes de forma extensiva, mas cada plataforma carrega sua própria história: experimente primeiro em um ambiente de teste e considere ser acompanhado profissionalmente pelos [provedores oficiais do Chamilo](https://chamilo.org/providers) neste empreendimento.

## Atualização de 1.11.x para 3.0

A atualização do Chamilo 1.11.x para 3.0 é uma **migração importante**, não uma simples atualização. O Chamilo 2.0 foi reconstruído sobre o framework Symfony, com um esquema de banco de dados reestruturado, nova API e organização de arquivos diferente, e o 3.0 continua essa linha. Planeje esta migração com cuidado e experimente-a em um ambiente de teste antes de implantá-la em produção.

### Antes de começar

1. **Leia as notas de versão** do Chamilo 3.x para entender o que mudou, o que é novo e quais recursos de 1.11.x ainda podem não estar disponíveis.
2. **Faça backup de tudo**:
   - Dump completo do banco de dados (`mysqldump` ou equivalente).
   - Todos os arquivos no diretório de instalação do Chamilo 1.11.x, especialmente `app/upload/`, `app/courses/` e `main/`.
   - Seu arquivo `configuration.php`.
3. **Teste primeiro em um servidor de homologação.** Nunca execute a migração diretamente no servidor de produção.
4. **Verifique os requisitos do servidor.** O Chamilo 3.x tem requisitos diferentes dos de 1.11.x (notavelmente, PHP 8.3 ou posterior — o instalador recusa qualquer versão mais antiga). Consulte [Requisitos do servidor](server-requirements.md).
5. **Exclua a tabela `version` do banco de dados 1.11.x.** Esta etapa é obrigatória. O Chamilo 2.x e posteriores armazenam o histórico de migrações do Doctrine em uma tabela com esse nome, com outras colunas. Se você deixar a tabela 1.11.x no lugar, a atualização para imediatamente. A tabela não é necessária para o funcionamento do Chamilo 1.11.x.
6. **Descompacte o código novo em um novo diretório.** Os arquivos 1.11.x permanecem onde estão. O instalador os lê como origem dos seus cursos e uploads e grava o resultado na nova árvore.

### Executando a atualização

Você pode executar a atualização pelo assistente web ou pela linha de comando.

#### Assistente web

1. Aponte o `DocumentRoot` do seu host virtual para o subdiretório `public/` da nova árvore.
2. Abra sua URL. O assistente inicia, porque a nova árvore ainda não tem um arquivo `.env`.
3. Na etapa 2, selecione a opção de atualização e informe o caminho raiz da sua instalação 1.11.x.
4. Siga o assistente até o fim.

#### Linha de comando

Defina `UPDATE_PATH` para a raiz da sua instalação 1.11.x e, em seguida, execute as migrações:

```bash
UPDATE_PATH=/path/to/chamilo-1.11 php bin/console doctrine:migrations:migrate --no-interaction
```

Aumente primeiro `memory_limit` e `max_execution_time`. A migração lê cada arquivo de curso, portanto precisa de muito mais do que os valores padrão.

#### Quanto tempo leva

A duração segue o tamanho do seu banco de dados e dos seus arquivos de curso. Como ponto de referência, uma plataforma 1.11.28 com 238 tabelas, 11 cursos, 63 usuários e 1489 arquivos de curso levou **6 minutos** e 1,7 GB de memória e executou 393 migrações. Uma plataforma de produção grande leva horas. Planeje uma janela de manutenção e leia o [fórum do Chamilo](https://chamilo.org) ou entre em contato com um [provedor oficial](https://chamilo.org/providers) antes de executá-la em produção.

### O que pode exigir atenção manual

| Área | Observações |
|------|-------|
| **Plugins personalizados** | Plugins 1.11.x não funcionam em 2.x ou 3.x. Devem ser reescritos ou substituídos. Os oficiais foram portados progressivamente desde 2.0 — verifique a lista de plugins da sua versão para ver quais estão disponíveis. |
| **Temas personalizados** | Temas 1.11.x não funcionam em 2.x ou 3.x. Recrie sua identidade visual usando o sistema de temas 3.x. |
| **Modificações personalizadas no banco de dados** | Quaisquer modificações diretas no banco de dados fora do Chamilo podem não ser migradas. |
| **Pacotes SCORM** | O conteúdo SCORM deve migrar, mas teste os pacotes individualmente para verificar a reprodução. |
| **Integrações externas** | Quaisquer integrações que usem a API ou os serviços web 1.11.x precisam ser atualizadas para usar a API exclusiva REST 2.x com [API Platform](https://github.com/api-platform/api-platform). |

## Atualização de 2.x para 3.0

Esta atualização mantém o diretório existente e o banco de dados existente. Você copia o código novo sobre a árvore antiga e, em seguida, executa as migrações, pelo assistente web ou pela linha de comando.

### Semear primeiro o histórico de migrações

O Chamilo instala o esquema do banco de dados diretamente a partir das definições das entidades, de modo que uma instalação criada pelo instalador contém o esquema final, mas um **histórico de migrações vazio**. Instalações criadas antes do Chamilo 3.0 nunca receberam esse histórico. Duas coisas dependem dele:

* `doctrine:migrations:migrate` decide o que executar a partir dele. Com um histórico vazio, tenta reproduzir todas as migrações desde o início sobre um esquema que já está atualizado.
* O instalador web decide a partir dele se há uma atualização pendente. Com um histórico vazio, recusa a solicitação, porque nada prova que uma atualização é devida.

Portanto, semeie-o uma vez e observe a ordem abaixo.

> **Aviso: semeie o histórico antes de copiar o código novo.** Os comandos marcam todas as migrações que o código **implantado** carrega como já executadas. Se você os executar depois de copiar o código 3.0, eles também marcam as migrações 3.0, e sua atualização nunca é executada.

Com a sua versão atual ainda no lugar, execute:

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

O primeiro comando cria a tabela de histórico. O segundo marca as migrações da sua versão atual. `doctrine:migrations:version` falha sozinho se a tabela ainda não existir, portanto não pule o primeiro.

Verifique o resultado:

```bash
php bin/console doctrine:migrations:status
```

`Executed` deve ser igual a `Available`, e `New` deve ser 0. Agora copie o código 3.0.

### Executar a atualização

Copie o código novo e, em seguida, abra a sua URL e siga o assistente, ou execute as migrações a partir da linha de comando:

```bash
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

O assistente web abre somente enquanto houver migrações pendentes. Quando a atualização termina, ele responde `409 Conflict` novamente, o que o protege: o assistente não tem login próprio.

## Atualizando o Chamilo 3.0.x

Atualizações menores dentro do ramo 3.0 são mais diretas.

### Processo de atualização

#### Usando um pacote

1. **Faça backup** do banco de dados e dos arquivos.

2. **Baixe a versão 3.0.x mais recente** em [chamilo.org](https://chamilo.org/download):

3. **Descompacte localmente**

Por exemplo (adapte à versão baixada)
   ```bash
   unzip chamilo-3.0.1.zip
   ```

4. **Copie os arquivos sobre a sua instalação existente do Chamilo**
   ```bash
   cp -r chamilo/* [your-chamilo-installation-path]/
   cp -r chamilo/.* [your-chamilo-installation-path]/
   ```

5. **Execute as migrações do banco de dados:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Limpe o cache:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Altere as permissões**

Adapte ao usuário do seu servidor web:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Verifique** se a plataforma carrega corretamente e faça uma verificação pontual das funcionalidades principais.

#### Usando Git

Se você instalou o Chamilo usando Git, pode seguir estas instruções em vez disso.

1. **Faça backup** do banco de dados e dos arquivos.

2. **Obtenha o código mais recente** (ou baixe a nova versão):
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

5. **Execute as migrações do banco de dados:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Limpe o cache:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Altere as permissões**

Adapte ao usuário do seu servidor web:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Verifique** se a plataforma carrega corretamente e faça uma verificação pontual das funcionalidades principais.

### Automatizando atualizações

Para organizações que gerenciam várias instâncias do Chamilo, considere automatizar o processo de atualização com um script:

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

* **Sempre faça backup antes de atualizar.** As migrações de banco de dados não são reversíveis pela interface do Chamilo.
* **Teste primeiro em um ambiente de homologação** -- especialmente na migração de 1.11.x para 3.0, que envolve transformação significativa de dados.
* **Agende as atualizações em janelas de manutenção** quando os usuários não estiverem usando ativamente a plataforma.
* **Inscreva-se nas releases do GitHub** em [Github](https://github.com/chamilo/chamilo-lms/releases) usando o ícone de sino para ser notificado de novas versões e correções de segurança.
* **Se o assistente responder `Chamilo is already installed`**, ele não encontrou nenhuma migração pendente. Execute `php bin/console doctrine:migrations:status` para verificar. Se `Executed` for 0 em uma plataforma que funciona, o histórico de migrações nunca foi inicializado — consulte [Seed the migration history first](#seed-the-migration-history-first).
* **O download automático de novas versões** ainda não está disponível no Chamilo 3.0, mas este é um projeto em andamento que esperamos lançar em breve. A própria atualização já é executada a partir do assistente web.