# Configuração

O Chamilo 2.0 utiliza variáveis de ambiente e arquivos de configuração do Symfony para suas configurações principais. Esta página aborda os principais arquivos de configuração e variáveis.

## Variáveis de Ambiente (.env)

O arquivo de configuração principal é o `.env`, localizado no diretório raiz do Chamilo. Este arquivo contém configurações específicas do ambiente que não devem ser incluídas no controle de versão.

Um arquivo padrão `.env.dist` é fornecido com o Chamilo e contém valores padrão documentados. Crie o arquivo `.env` (necessário para iniciar a instalação) para sobrescrever os valores conforme o seu ambiente.

### Variáveis Principais

| Variável | Descrição | Exemplo |
|----------|-----------|---------|
| `APP_ENV` | O ambiente da aplicação, no nível do Symfony. Use `prod` para produção, `dev` para desenvolvimento, 'test' para testes. | `prod` |
| `APP_SECRET` | Uma string aleatória usada para tokens CSRF, assinatura de cookies e outras operações criptográficas. O Chamilo gera um valor único para cada instalação. Não o modifique. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | O host do banco de dados. O padrão é localhost. | `localhost` |
| `DATABASE_PORT` | A porta do banco de dados. O padrão é 3306 para MySQL/MariaDB. | `3306` |
| `DATABASE_NAME` | O nome do banco de dados, conforme fornecido por você ao assistente de instalação. | Veja abaixo. |
| `DATABASE_USER` | O nome de usuário do banco de dados, conforme fornecido por você ao assistente de instalação. | Veja abaixo. |
| `DATABASE_PASSWORD` | A senha do usuário do banco de dados, conforme fornecida por você ao assistente de instalação. | Veja abaixo. |
| `TRUSTED_PROXIES` | (Opcional) Se você estiver hospedando o Chamilo atrás de um proxy reverso, precisará fornecer o(s) IP(s) do proxy reverso aqui para que o Chamilo possa interpretar chamadas e gerar respostas corretamente. | |

Outras configurações no arquivo `.env` são raramente modificadas.

Observe que, em versões futuras, as configurações `DATABASE_*` serão combinadas em uma única variável `DATABASE_URL`.

A configuração de envio de e-mails é apresentada durante a instalação, mas pode ser modificada posteriormente na seção `Configurações da Plataforma` do painel de administração.

## Configuração do Symfony (diretório config/)

A configuração no nível do Symfony está localizada no diretório `config/`. Esses arquivos YAML controlam o comportamento do framework, definições de serviços e configurações específicas de pacotes.

Não é comum precisar modificar esses arquivos, e alterá-los pode tornar seu portal inoperante, então, por favor, não tente modificá-los se precisar garantir a disponibilidade do sistema.

### Arquivos de Configuração Principais

| Arquivo | Finalidade |
|------|------------|
| `config/authentication.yaml` | Configuração dos métodos de autenticação. |
| `config/packages/doctrine.yaml` | Configuração do banco de dados e ORM. |
| `config/packages/security.yaml` | Autenticação, firewalls, controle de acesso e hierarquias de papéis. |
| `config/packages/cache.yaml` | Configuração do adaptador de cache (sistema de arquivos, APCu, Redis). |
| `config/packages/framework.yaml` | Configurações gerais do framework Symfony (sessão, CSRF, roteador, cache HTTP). |
| `config/packages/twig.yaml` | Configuração do motor de templates. |
| `config/services.yaml` | Definições de serviços da aplicação e injeção de dependências. |

### Sobrescritas Específicas por Ambiente

O Symfony suporta configurações por ambiente. Arquivos em `config/packages/prod/` sobrescrevem os padrões quando `APP_ENV=prod`, e `config/packages/dev/` sobrescreve quando `APP_ENV=dev`.

Por exemplo, `config/packages/prod/monolog.yaml` geralmente configura um registro de logs menos detalhado do que o equivalente no ambiente de desenvolvimento.

O Chamilo não define nenhuma configuração em `config/packages/prod/` no próprio software, então, se você quiser personalizar configurações de `config/packages/*.yaml`, basta criar uma cópia do arquivo YAML dentro desse diretório e alterar as configurações lá.

## Permissões de Arquivos

Fizemos esforços na versão 2.0+ para garantir que apenas um diretório precise de permissões. Este é o diretório `var/`, e para evitar problemas complexos, basta definir a pasta inteira como gravável pelo usuário do sistema do servidor web.

Defina as permissões apropriadamente em sistemas baseados em Debian:

```bash
# Para sistemas onde o servidor web roda como www-data
chown -R www-data:www-data var/
chmod -R 775 var/
```

## Tarefas Comuns de Configuração

### Mudar para o Modo de Produção

```bash
# No arquivo .env
APP_ENV=prod
APP_DEBUG=0
```

Em seguida, limpe e aqueça o cache:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### Configurar Proxies Confiáveis

Se o Chamilo estiver rodando atrás de um proxy reverso ou balanceador de carga, configure os proxies confiáveis para que a detecção de HTTPS e a resolução de IP do cliente funcionem corretamente:

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### Configurar Armazenamento de Sessões

Por padrão, as sessões são armazenadas no sistema de arquivos. Para implantações em múltiplos servidores, configure sessões baseadas em Redis ou banco de dados:

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

---
## Dicas

* **Nunca edite `.env.dist` diretamente** -- Sempre use `.env` para suas personalizações. O arquivo `.env.dist` pode ser sobrescrito durante atualizações.
* **Mantenha `APP_DEBUG=0` em produção** -- O modo de depuração expõe informações sensíveis nas páginas de erro.
* **Faça backup de `.env`** separadamente do código-fonte, pois ele contém credenciais e é excluído do controle de versão.