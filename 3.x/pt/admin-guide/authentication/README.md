# Autenticação

O Chamilo suporta vários métodos de autenticação, desde o sistema integrado de nome de utilizador/palavra-passe até soluções empresariais de início de sessão único.

## Ficheiro de configuração

Todos os métodos de autenticação externos são configurados em `config/authentication.yaml`. É fornecido um modelo em `config/authentication.dist.yaml`. A estrutura geral é:

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

Após editar o ficheiro, limpe e aqueça a cache:

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

Os botões de início de sessão externos aparecem na página de início de sessão depois de a cache ser atualizada.

## Métodos suportados

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook e fornecedores OAuth2 genéricos
* **[Azure Entra ID](azure-entra-id.md)** — Configuração detalhada do Azure/Entra ID: registo da aplicação, mapeamento de funções com base em grupos, autenticação por certificado e comandos de sincronização de utilizadores/grupos
* **[LDAP](ldap.md)** — Autenticar contra um servidor LDAP ou Active Directory
* **[CAS](cas.md)** — Central Authentication Service (legado, não funcional na 3.x)
* **[SCIM](scim.md)** — Provisionamento automático de utilizadores a partir de fornecedores de identidade externos
* **[Configuração SSO](sso-configuration.md)** — Resolução de problemas e notas entre métodos

## Autenticação predefinida

Por predefinição, o Chamilo utiliza o seu próprio sistema interno — os utilizadores iniciam sessão com um nome de utilizador e uma palavra-passe armazenados na base de dados do Chamilo. Os métodos externos são aditivos: o formulário de início de sessão padrão permanece disponível juntamente com quaisquer fornecedores configurados.

## Referência adicional

Para a referência completa de parâmetros e cenários avançados, consulte a [página wiki de configuração de autenticação externa](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).