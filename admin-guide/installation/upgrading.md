# Atualização

Nota: Nesta página, usamos 2.0.0 como um número de versão estrito e 2.x para identificar todas as versões que começam com o número 2 (2.0.0, 2.0.1, 2.1.0, etc.).

O processo de atualização de 1.11.x para 2.x está descrito no arquivo `public/documentation/installation_guide.html`, dentro do código do Chamilo.
As informações aqui são amplamente redundantes. Você pode visualizá-las online em `https://campus.chamilo.net/documentation/installation_guide.html`.
Embora tenhamos realizado testes extensivos em migrações semelhantes, como algumas configurações do 1.11.x ainda não eram suportadas no 2.0.0, recomendamos aguardar a versão 2.1 antes de atualizar um sistema 1.11.x, ou buscar acompanhamento profissional de [fornecedores oficiais do Chamilo](https://chamilo.org/providers) para essa tarefa.

## Atualização de 1.11.x para 2.x

A atualização do Chamilo 1.11.x para 2.x é uma **migração significativa**, não apenas uma simples atualização. O Chamilo 2.0 foi reconstruído no framework Symfony com um esquema de banco de dados reestruturado, nova API e uma organização de arquivos diferente. Planeje essa migração com cuidado e teste-a em um ambiente de teste antes de implementá-la em produção.

### Antes de Começar

1. **Leia as notas de lançamento** do Chamilo 2.x para entender o que mudou, o que há de novo e quais funcionalidades do 1.11.x podem ainda não estar disponíveis.
2. **Faça backup de tudo**:
   - Dump completo do banco de dados (`mysqldump` ou equivalente).
   - Todos os arquivos no diretório de instalação do Chamilo 1.11.x, especialmente `app/upload/`, `app/courses/` e `main/`.
   - Seu arquivo `configuration.php`.
3. **Teste primeiro em um servidor de staging.** Nunca execute a migração diretamente no servidor de produção.
4. **Verifique os requisitos do servidor.** O Chamilo 2.x tem requisitos diferentes do 1.11.x (notavelmente, PHP 8.2+). Consulte [Requisitos do Servidor](server-requirements.md).

### O que Pode Exigir Atenção Manual

| Área | Observações |
|------|-------------|
| **Plugins personalizados** | Plugins do 1.11.x não são compatíveis com o 2.x. Eles devem ser reescritos ou substituídos, o que foi parcialmente feito no 2.0 e deve estar concluído no 2.1 para plugins oficiais. |
| **Temas personalizados** | Temas do 1.11.x não funcionam no 2.x. Recrie sua identidade visual usando o sistema de temas do 2.x. |
| **Modificações personalizadas no banco de dados** | Quaisquer modificações diretas no banco de dados fora do Chamilo podem não ser migradas. |
| **Pacotes SCORM** | O conteúdo SCORM deve ser migrado, mas teste os pacotes individualmente para verificar a reprodução. |
| **Integrações externas** | Quaisquer integrações que utilizem a API ou serviços web do 1.11.x precisam ser atualizadas para usar a API REST exclusiva do 2.x com [API Platform](https://github.com/api-platform/api-platform). |

## Atualização do Chamilo 2.0.x

Atualizações menores dentro da branch 2.0 são mais simples.

### Processo de Atualização

#### Usando um pacote

1. **Faça backup** do banco de dados e dos arquivos.

2. **Baixe a versão mais recente do 2.0.x** em [chamilo.org](https://chamilo.org/download):

3. **Expanda localmente**

Por exemplo (adapte à versão baixada):
   ```bash
   unzip chamilo-2.0.1.zip
   ```

4. **Copie os arquivos para sua instalação existente do Chamilo**
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

8. **Verifique** se a plataforma carrega corretamente e teste funcionalidades-chave.

#### Usando Git

Se você instalou o Chamilo usando Git, pode seguir estas instruções.

1. **Faça backup** do banco de dados e dos arquivos.

2. **Atualize o código mais recente** (ou baixe a nova versão):
   ```bash
   git pull origin 2.0
   ```

3. **Atualize as dependências do PHP:**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **Atualize as dependências JavaScript e reconstrua os ativos:**
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

8. **Verifique** se a plataforma carrega corretamente e teste funcionalidades-chave.

### Automatizando Atualizações

Para organizações que gerenciam várias instâncias do Chamilo, considere criar scripts para o processo de atualização:

```bash
#!/bin/bash
set -e

# Atualizar código
git pull origin 2.0

# Dependências
composer install --no-dev --optimize-autoloader
yarn install && yarn build

# Banco de dados
php bin/console doctrine:migrations:migrate --no-interaction

# Cache
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

echo "Atualização concluída."
```

---
## Dicas

* **Faça sempre um backup antes de atualizar.** As migrações de banco de dados não são reversíveis pela interface do Chamilo.
* **Teste primeiro em um ambiente de staging** -- especialmente para a migração de 1.11.x para 2.0, que envolve uma transformação significativa de dados.
* **Programe as atualizações durante janelas de manutenção** quando os usuários não estiverem utilizando ativamente a plataforma.
* **Inscreva-se para receber notificações de lançamentos no GitHub** em [Github](https://github.com/chamilo/chamilo-lms/releases) usando o ícone de sino para ser informado sobre novas versões e correções de segurança.
* **Atualizações via web** ainda não estão disponíveis no Chamilo 2.0, mas este é um projeto em andamento que esperamos lançar em breve.