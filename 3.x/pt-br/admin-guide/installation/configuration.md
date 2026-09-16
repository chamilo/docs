# Configuração

O Chamilo 3.0 utiliza variáveis de ambiente e arquivos de configuração do Symfony para suas definições principais. Esta página aborda os arquivos e as variáveis de configuração essenciais.

## Variáveis de Ambiente (.env)

O arquivo de configuração principal é o `.env` no diretório raiz do Chamilo. Este arquivo contém definições específicas do ambiente que não devem ser enviadas ao controle de versão.

Um arquivo `.env.dist` padrão é distribuído com o Chamilo e contém os valores padrão documentados. Crie o `.env` (necessário para iniciar a instalação) para sobrescrever os valores do seu ambiente.

### Variáveis Principais

| Variável | Descrição | Exemplo |
|----------|-------------|---------|
| `APP_ENV` | O ambiente da aplicação, no nível do Symfony. Use `prod` para produção, `dev` para desenvolvimento, 'test' para testes. | `prod` |
| `APP_SECRET` | Uma cadeia aleatória usada para tokens CSRF, assinatura de cookies e outras operações criptográficas. O Chamilo gera um valor exclusivo para cada instalação. Não o modifique. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | O host do banco de dados. O padrão é localhost | `localhost` |
| `DATABASE_PORT` | A porta do banco de dados. O padrão é 3306 para MySQL/MariaDB | `3306` |
| `DATABASE_NAME` | O nome do banco de dados, conforme informado por você no assistente de instalação. | Veja abaixo. |
| `DATABASE_USER` | O nome de usuário do banco de dados, conforme informado por você no assistente de instalação. | Veja abaixo. |
| `DATABASE_PASSWORD` | A senha do usuário do banco de dados, conforme informada por você no assistente de instalação. | Veja abaixo. |
| `TRUSTED_PROXIES` | (Opcional) Se você estiver hospedando o Chamilo atrás de um proxy reverso, é necessário informar o(s) IP(s) do proxy reverso aqui para que o Chamilo consiga interpretar as chamadas e gerar as respostas corretamente. | |
| `APP_ENABLE_API_ENTRYPOINT` | (Opcional) Expõe a documentação interativa da API (Swagger/OpenAPI) em `/api`. Desativado por padrão. Exige limpeza de cache para ter efeito — veja [Ativar a Documentação da API](#enable-the-api-documentation) abaixo. | `true` |

As demais definições em .env são relativamente raramente modificadas.

Observe que, em versões futuras, as definições DATABASE_* serão combinadas em uma única variável `DATABASE_URL`.

A configuração de envio de e-mail é apresentada durante a instalação, mas pode ser modificada posteriormente na seção `Configurações da plataforma` do painel de administração.

## Configuração do Symfony (diretório config/)

A configuração no nível do Symfony fica no diretório `config/`. Esses arquivos YAML controlam o comportamento do framework, as definições de serviços e as configurações específicas de pacotes.

O diretório `config/` inteiro é distribuído com cada pacote do Chamilo e com cada atualização — ao contrário, por exemplo, do `.env`, ele não é excluído nem preservado de forma especial durante uma atualização. **Qualquer alteração feita diretamente em um arquivo em `config/` ou `config/packages/` será sobrescrita silenciosamente na próxima vez que você atualizar o Chamilo.** Veja [Sobrescritas Específicas do Ambiente](#environment-specific-overrides) abaixo para a forma suportada de personalizar a configuração sem perder suas alterações.

Não é frequente ter de modificar esses arquivos, e alterá-los pode tornar o portal inoperante, portanto não tente modificá-los se você precisar garantir a disponibilidade do sistema.

### Arquivos de Configuração Principais

| Arquivo | Finalidade |
|------|---------|
| `config/authentication.yaml` | Configuração dos métodos de autenticação. |
| `config/packages/doctrine.yaml` | Configuração do banco de dados e do ORM. |
| `config/packages/security.yaml` | Autenticação, firewalls, controle de acesso e hierarquias de papéis. |
| `config/packages/cache.yaml` | Configuração do adaptador de cache (sistema de arquivos, APCu, Redis). |
| `config/packages/framework.yaml` | Definições gerais do framework Symfony (sessão, CSRF, roteador, cache HTTP). |
| `config/packages/twig.yaml` | Configuração do motor de templates. |
| `config/services.yaml` | Definições de serviços da aplicação e injeção de dependência. |

### Sobrescritas Específicas do Ambiente

O Symfony oferece suporte a configuração por ambiente. Arquivos em `config/packages/prod/` sobrescrevem os padrões quando `APP_ENV=prod`, e `config/packages/dev/` sobrescreve quando `APP_ENV=dev`.

Por exemplo, `config/packages/prod/monolog.yaml` normalmente configura um registro de logs menos verboso do que o equivalente de desenvolvimento.

O Chamilo não define nenhuma configuração em `config/packages/prod/` no próprio software, portanto, se você quiser personalizar uma definição de `config/packages/*.yaml`, **não edite o arquivo base** — crie um arquivo de mesmo nome dentro de `config/packages/prod/` (ou `dev/`/`test/`, correspondente ao ambiente que deseja afetar) contendo apenas as chaves que deseja sobrescrever, e coloque suas alterações ali.

Isso é importante porque os arquivos base `config/packages/*.yaml` fazem parte do pacote do Chamilo: cada atualização os distribui novamente e sobrescreve o que estiver lá, de modo que edições feitas diretamente neles não sobrevivem a uma atualização. Como o Chamilo nunca distribui nada em `config/packages/prod/` (nem em `dev/`/`test/`), esse diretório está a salvo de ser sobrescrito por uma atualização e é o local suportado para manter personalizações locais.

## Permissões de Arquivos

Empregamos esforços na versão 2.0+ para garantir que apenas um único diretório precisasse de permissões, e isso permanece verdadeiro na 3.0. Trata-se do diretório `var/`, e, para evitar problemas complexos, basta definir a pasta inteira como gravável pelo usuário de sistema do servidor web.

Defina as permissões adequadamente em sistemas baseados em Debian:

```bash
# For systems where the web server runs as www-data
chown -R www-data:www-data var/
chmod -R 775 var/
```

## Tarefas Comuns de Configuração

### Alternar para o Modo de Produção

```bash
# In .env
APP_ENV=prod
APP_DEBUG=0
```

Em seguida, limpe e aqueça o cache:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### Habilitar a Documentação da API

```bash
# In .env
APP_ENABLE_API_ENTRYPOINT=true
```

Em seguida, limpe o cache para que a alteração tenha efeito:

```bash
php bin/console cache:clear
```

A documentação interativa da API (Swagger/OpenAPI) fica então disponível em `/api`. Editar apenas o `.env` não é suficiente: o valor resolvido é incorporado ao cache compilado do Symfony, de modo que `/api` continua retornando o estado anterior (habilitado ou não) até que o cache seja limpo. A ação **Sistema > Limpar arquivos temporários** no painel de administração *não* faz isso — veja [Ferramentas do Sistema](../system/system-tools.md#clean-temporary-files) para saber o motivo — portanto, essa alteração específica exige acesso ao shell para executar `cache:clear`.

### Configurar Proxies Confiáveis

Se o Chamilo for executado atrás de um proxy reverso ou balanceador de carga, configure os proxies confiáveis para que a detecção de HTTPS e a resolução do IP do cliente funcionem corretamente:

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### Configurar o Armazenamento de Sessões

Por padrão, as sessões são armazenadas no sistema de arquivos. Para implantações com vários servidores, configure sessões no Redis ou no banco de dados:

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

## Dicas

* **Nunca edite o `.env.dist` diretamente** -- Use sempre o `.env` para as suas substituições. O arquivo `.env.dist` pode ser sobrescrito durante as atualizações.
* **Mantenha `APP_DEBUG=0` em produção** -- O modo de depuração expõe informações sensíveis nas páginas de erro.
* **Faça backup do `.env`** separadamente do código-fonte, pois ele contém credenciais e está excluído do controle de versão.