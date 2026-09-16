# Autenticação

Chamilo suporta múltiplos métodos de autenticação, desde o sistema integrado de nome de usuário/senha até soluções de single sign-on corporativas.

## Arquivo de Configuração

Todos os métodos de autenticação externos são configurados em `config/authentication.yaml`. Um modelo está disponível em `config/authentication.dist.yaml`. A estrutura geral é:

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

Após editar o arquivo, limpe e aqueça o cache:

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

Botões de login externos aparecerão na página de login após a atualização do cache.

## Métodos Suportados

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook e provedores genéricos de OAuth2
* **[LDAP](ldap.md)** — Autenticação contra um servidor LDAP ou Active Directory
* **[CAS](cas.md)** — Central Authentication Service (obsoleto, não funcional na versão 2.x)
* **[SCIM](scim.md)** — Provisionamento automatizado de usuários a partir de provedores de identidade externos
* **[Configuração SSO](sso-configuration.md)** — Solução de problemas e notas sobre diferentes métodos

## Autenticação Padrão

Por padrão, o Chamilo utiliza seu próprio sistema interno — os usuários fazem login com um nome de usuário e senha armazenados no banco de dados do Chamilo. Métodos externos são complementares: o formulário de login padrão permanece disponível ao lado de quaisquer provedores configurados.

## Referência Adicional

Para uma referência completa de parâmetros e cenários avançados, consulte a [página wiki de configuração de Autenticação Externa](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).