# LDAP

O Chamilo pode autenticar usuários contra um servidor LDAP, incluindo o Microsoft Active Directory. O LDAP é configurado no arquivo `config/authentication.yaml`.

## Configuração

```yaml
authentication:
  1:
    ldap:
      main:
        enabled: true
        title: "Entrar com LDAP"
        connection_string: "ldap://ldap.yourorg.com:389"
        protocol_version: 3
        referrals: false
        force_as_login_method: false
```

### Vinculação e pesquisa

Existem duas abordagens para localizar o usuário no diretório:

**Vinculação direta** — constrói o DN a partir do nome de usuário diretamente:

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**Vinculação por pesquisa** — pesquisa o diretório com uma conta de serviço primeiro, depois realiza a vinculação como o usuário encontrado:

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

Para o Active Directory, use `sAMAccountName` como `uid_key` e ajuste `query_string` para `(sAMAccountName=%s)`.

### Mapeamento de atributos

Mapeie os atributos LDAP para os campos de usuário do Chamilo sob `data_correspondence`:

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # opcional
          locale: preferredLanguage  # opcional
```

`firstname`, `lastname` e `email` são obrigatórios. O usuário é correspondido a uma conta existente no Chamilo pelo e-mail ou nome de usuário; se não houver correspondência e `allow_create_new_users` estiver definido como true, uma nova conta será criada.

## Dicas

* **Use LDAPS em produção** — altere `ldap://` para `ldaps://` (porta 636) para conexões criptografadas.
* **Conta de serviço** — a conta de vinculação por pesquisa precisa apenas de acesso de leitura às entradas de usuário.
* **Teste primeiro** — verifique sua string de conexão e consulta com `ldapsearch` antes de configurar o Chamilo.
* **`force_as_login_method: true`** — oculta outros métodos de login e força todos os usuários a usarem o LDAP. Mantenha como `false` durante os testes para que você ainda possa fazer login como administrador pelo formulário padrão.

Para a referência completa de parâmetros, consulte o [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).