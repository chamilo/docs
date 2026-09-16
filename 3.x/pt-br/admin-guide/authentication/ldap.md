# LDAP

O Chamilo pode autenticar usuários em um servidor LDAP, incluindo o Microsoft Active Directory. O LDAP é configurado em `config/authentication.yaml`.

## Configuration

```yaml
authentication:
  1:
    ldap:
      main:
        enabled: true
        title: "Sign in with LDAP"
        connection_string: "ldap://ldap.yourorg.com:389"
        protocol_version: 3
        referrals: false
        force_as_login_method: false
```

### Bind and search

Duas abordagens para localizar o usuário no diretório:

**Direct bind** — constrói o DN a partir do nome de usuário diretamente:

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**Search bind** — pesquisa o diretório primeiro com uma conta de serviço e, em seguida, faz o bind como o usuário encontrado:

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

Para o Active Directory, use `sAMAccountName` como `uid_key` e ajuste `query_string` para `(sAMAccountName=%s)`.

### Attribute mapping

Mapeie atributos LDAP para os campos de usuário do Chamilo em `data_correspondence`:

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # optional
          locale: preferredLanguage  # optional
```

`firstname`, `lastname` e `email` são obrigatórios. O usuário é associado a uma conta existente do Chamilo pelo e-mail ou pelo nome de usuário; se nenhuma correspondência for encontrada e `allow_create_new_users` for true, uma nova conta é criada.

## Tips

* **Use LDAPS in production** — altere `ldap://` para `ldaps://` (porta 636) para conexões criptografadas.
* **Service account** — a conta de search bind precisa apenas de acesso de leitura às entradas de usuário.
* **Test first** — verifique a connection string e a consulta com `ldapsearch` antes de configurar o Chamilo.
* **`force_as_login_method: true`** — oculta os demais métodos de login e força todos os usuários a passarem pelo LDAP. Deixe como `false` durante os testes para que você ainda possa entrar como administrador pelo formulário padrão.

Para a referência completa de parâmetros, consulte a [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).