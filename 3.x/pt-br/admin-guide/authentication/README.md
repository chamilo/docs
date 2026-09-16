# Autenticação

O Chamilo oferece suporte a vários métodos de autenticação, desde o sistema interno de nome de usuário/senha até soluções empresariais de single sign-on.

## Arquivo de configuração

Todos os métodos de autenticação externa são configurados em `config/authentication.yaml`. Um modelo é fornecido em `config/authentication.dist.yaml`. A estrutura geral é:

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

Os botões de login externo aparecem na página de login após a atualização do cache.

## Métodos suportados

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook e provedores OAuth2 genéricos
* **[Azure Entra ID](azure-entra-id.md)** — Configuração detalhada do Azure/Entra ID: registro de aplicativo, mapeamento de papéis baseado em grupos, autenticação por certificado e comandos de sincronização de usuários/grupos
* **[LDAP](ldap.md)** — Autenticar contra um servidor LDAP ou Active Directory
* **[CAS](cas.md)** — Central Authentication Service (legado, não funcional na 3.x)
* **[SCIM](scim.md)** — Provisionamento automatizado de usuários a partir de provedores de identidade externos
* **[SSO Configuration](sso-configuration.md)** — Solução de problemas e notas entre métodos

## Autenticação padrão

Por padrão, o Chamilo usa seu próprio sistema interno — os usuários entram com um nome de usuário e uma senha armazenados no banco de dados do Chamilo. Os métodos externos são aditivos: o formulário de login padrão permanece disponível juntamente com quaisquer provedores configurados.

## Referência adicional

Para a referência completa de parâmetros e cenários avançados, consulte a [página wiki de configuração de autenticação externa](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).