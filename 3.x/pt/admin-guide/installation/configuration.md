# Configuração

O Chamilo 3.0 utiliza variáveis de ambiente e ficheiros de configuração do Symfony para as suas definições principais. Esta página aborda os ficheiros e as variáveis de configuração essenciais.

## Variáveis de Ambiente (.env)

O ficheiro de configuração principal é o `.env` no diretório raiz do Chamilo. Este ficheiro contém definições específicas do ambiente que não devem ser submetidas ao controlo de versões.

Um ficheiro `.env.dist` predefinido é fornecido com o Chamilo e contém valores predefinidos documentados. Crie o `.env` (necessário para iniciar a instalação) para substituir os valores do seu ambiente.

### Variáveis Principais

| Variable | Description | Example |
|----------|-------------|---------|
| `APP_ENV` | The application environment, at the Symfony level. Use `prod` for production, `dev` for development, 'test' for testing. | `prod` |
| `APP_SECRET` | A random string used for CSRF tokens, cookie signing, and other cryptographic operations. Chamilo generates a unique value for each installation. Don't modify it. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | The database host. Defaults to localhost | `localhost` |
| `DATABASE_PORT` | The database port. Defaults to 3306 for MySQL/MariaDB | `3306` |
| `DATABASE_NAME` | The database name, as given by you to the installation wizard. | See below. |
| `DATABASE_USER` | The database username, as given by you to the installation wizard. | See below. |
| `DATABASE_PASSWORD` | The database user's password, as given by you to the installation wizard. | See below. |
| `TRUSTED_PROXIES` | (Optional) If you are hosting Chamilo behind a reverse proxy, you need to provide the IP(s) of the reverse proxy here for Chamilo to be able to interpret calls and generate responses correctly. | |
| `APP_ENABLE_API_ENTRYPOINT` | (Optional) Exposes the interactive API documentation (Swagger/OpenAPI) at `/api`. Off by default. Requires a cache clear to take effect — see [Enable the API Documentation](#enable-the-api-documentation) below. | `true` |

Outras definições no .env são relativamente raramente modificadas.

Note que, em versões futuras, as definições DATABASE_* serão combinadas numa única variável `DATABASE_URL`.

A configuração de envio de correio eletrónico é apresentada durante a instalação, mas pode ser modificada posteriormente na secção `Platform settings` do painel de administração.

## Configuração Symfony (diretório config/)

A configuração ao nível do Symfony encontra-se no diretório `config/`. Estes ficheiros YAML controlam o comportamento da framework, as definições de serviços e as definições específicas de pacotes.

O diretório `config/` completo é fornecido com cada pacote Chamilo e com cada atualização — ao contrário, por exemplo, do `.env`, não é excluído nem preservado de forma especial durante uma atualização. **Qualquer alteração feita diretamente a um ficheiro em `config/` ou `config/packages/` será silenciosamente substituída na próxima vez que atualizar o Chamilo.** Consulte [Substituições Específicas do Ambiente](#environment-specific-overrides) abaixo para o método suportado de personalizar a configuração sem perder as suas alterações.

Não é frequente ter de modificar esses ficheiros, e alterá-los pode tornar o seu portal inoperante, pelo que não tente modificá-los se tiver de garantir a disponibilidade do sistema.

### Ficheiros de Configuração Principais

| File | Purpose |
|------|---------|
| `config/authentication.yaml` | Authentication methods configuration. |
| `config/packages/doctrine.yaml` | Database and ORM configuration. |
| `config/packages/security.yaml` | Authentication, firewalls, access control, and role hierarchies. |
| `config/packages/cache.yaml` | Cache adapter configuration (filesystem, APCu, Redis). |
| `config/packages/framework.yaml` | General Symfony framework settings (session, CSRF, router, HTTP caching). |
| `config/packages/twig.yaml` | Template engine configuration. |
| `config/services.yaml` | Application service definitions and dependency injection. |

### Substituições Específicas do Ambiente

O Symfony suporta configuração por ambiente. Os ficheiros em `config/packages/prod/` substituem os valores predefinidos quando `APP_ENV=prod`, e `config/packages/dev/` substitui quando `APP_ENV=dev`.

Por exemplo, `config/packages/prod/monolog.yaml` configura normalmente um registo menos verboso do que o equivalente de desenvolvimento.

O Chamilo não define qualquer configuração em `config/packages/prod/` no próprio software, pelo que, se pretender personalizar uma definição de `config/packages/*.yaml`, **não edite o ficheiro base** — crie um ficheiro com o mesmo nome dentro de `config/packages/prod/` (ou `dev/`/`test/`, correspondente ao ambiente que pretende afetar) contendo apenas as chaves que pretende substituir, e coloque aí as suas alterações.

Isto é importante porque os ficheiros base `config/packages/*.yaml` fazem parte do pacote Chamilo: cada atualização volta a fornecê-los e substitui o que lá estiver, pelo que as edições feitas diretamente neles não sobrevivem a uma atualização. Como o Chamilo nunca fornece nada em `config/packages/prod/` (nem em `dev/`/`test/`), esse diretório está a salvo de ser substituído por uma atualização e é o local suportado para manter personalizações locais.

## Permissões de Ficheiros

Em 2.0+ esforçámo-nos por garantir que apenas um diretório necessitava de permissões, e isto permanece verdadeiro na 3.0. Trata-se do diretório `var/` e, para evitar problemas complexos, basta definir toda a pasta como gravável pelo utilizador de sistema do servidor web.

Defina as permissões de forma adequada em sistemas baseados em Debian:

```bash
# For systems where the web server runs as www-data
chown -R www-data:www-data var/
chmod -R 775 var/
```

## Tarefas Comuns de Configuração

### Mudar para o Modo de Produção

```bash
# In .env
APP_ENV=prod
APP_DEBUG=0
```

Em seguida, limpe e aqueça a cache:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### Ativar a Documentação da API

```bash
# In .env
APP_ENABLE_API_ENTRYPOINT=true
```

Em seguida, limpe a cache para que a alteração tenha efeito:

```bash
php bin/console cache:clear
```

A documentação interativa da API (Swagger/OpenAPI) fica então disponível em `/api`. Editar apenas o `.env` não é suficiente: o valor resolvido é incorporado na cache compilada do Symfony, pelo que `/api` continua a devolver o estado anterior (ativado ou não) até a cache ser limpa. A ação **Sistema > Limpar ficheiros temporários** no painel de administração *não* o faz — consulte [Ferramentas de Sistema](../system/system-tools.md#clean-temporary-files) para saber porquê — pelo que esta alteração específica requer acesso à consola para executar `cache:clear`.

### Configurar Proxies de Confiança

Se o Chamilo for executado atrás de um proxy reverso ou de um balanceador de carga, configure os proxies de confiança para que a deteção de HTTPS e a resolução do IP do cliente funcionem corretamente:

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### Configurar o Armazenamento de Sessões

Por predefinição, as sessões são armazenadas no sistema de ficheiros. Para implementações com vários servidores, configure sessões em Redis ou na base de dados:

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

## Dicas

* **Nunca edite `.env.dist` diretamente** -- Utilize sempre `.env` para as suas substituições. O ficheiro `.env.dist` pode ser sobrescrito durante as atualizações.
* **Mantenha `APP_DEBUG=0` em produção** -- O modo de depuração expõe informações sensíveis nas páginas de erro.
* **Faça uma cópia de segurança de `.env`** separadamente do código-fonte, uma vez que contém credenciais e está excluído do controlo de versões.