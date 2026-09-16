# LDAP

O Chamilo pode autenticar utilizadores junto de um servidor LDAP, incluindo o Microsoft Active Directory. O LDAP é configurado em `config/authentication.yaml`.

## Configuração

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

### Bind e pesquisa

Duas abordagens para localizar o utilizador no diretório:

**Bind direto** — constrói o DN a partir do nome de utilizador de forma direta:

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**Bind por pesquisa** — pesquisa primeiro o diretório com uma conta de serviço e, em seguida, faz o bind como o utilizador encontrado:

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

Para o Active Directory, utilize `sAMAccountName` como `uid_key` e ajuste `query_string` para `(sAMAccountName=%s)`.

### Mapeamento de atributos

Mapeie os atributos LDAP para os campos de utilizador do Chamilo em `data_correspondence`:

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # optional
          locale: preferredLanguage  # optional
```

`firstname`, `lastname` e `email` são obrigatórios. O utilizador é associado a uma conta Chamilo existente pelo e-mail ou pelo nome de utilizador; se não for encontrada correspondência e `allow_create_new_users` for verdadeiro, é criada uma nova conta.

## Dicas

* **Utilize LDAPS em produção** — altere `ldap://` para `ldaps://` (porta 636) para ligações encriptadas.
* **Conta de serviço** — a conta de bind por pesquisa precisa apenas de acesso de leitura às entradas de utilizador.
* **Teste primeiro** — verifique a cadeia de ligação e a consulta com `ldapsearch` antes de configurar o Chamilo.
* **`force_as_login_method: true`** — oculta os outros métodos de início de sessão e força todos os utilizadores a passar pelo LDAP. Deixe-o `false` durante os testes para poder continuar a iniciar sessão como administrador através do formulário padrão.

Para a referência completa de parâmetros, consulte a [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).