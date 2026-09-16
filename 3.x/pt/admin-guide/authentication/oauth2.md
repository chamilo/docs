# OAuth2

A autenticação OAuth2 é configurada em `config/authentication.yaml`. O Chamilo inclui suporte nativo para Azure AD, Keycloak, Facebook e qualquer fornecedor genérico compatível com OAuth2.

## Passo 1 — Registar o Chamilo no seu fornecedor de identidade

Crie uma aplicação no painel de administração do seu fornecedor e defina o **URI de redirecionamento** para:

```
https://your-chamilo-url/connect/<provider>/check
```

Em que `<provider>` é `azure`, `keycloak`, `facebook` ou o nome que atribuir a um fornecedor genérico. Anote o **Client ID** e o **Client Secret**.

## Passo 2 — Configurar o authentication.yaml

Ative o fornecedor e indique as respetivas credenciais. Todos os fornecedores partilham estas chaves comuns:

| Key | Description |
|-----|-------------|
| `enabled` | `true` para ativar |
| `title` | Rótulo apresentado no botão de início de sessão |
| `client_id` | Do seu fornecedor de identidade |
| `client_secret` | Do seu fornecedor de identidade |
| `allow_create_new_users` | Criar automaticamente uma conta Chamilo no primeiro início de sessão |
| `allow_update_user_info` | Sincronizar os dados do utilizador em cada início de sessão |
| `force_as_login_method` | Ocultar os outros métodos e mostrar apenas o botão deste fornecedor |
| `force_redirect` | Enviar automaticamente um visitante anónimo para este fornecedor, sem botão para clicar |
| `skip_force_redirect_in` | Lista de fragmentos de URL que o `force_redirect` deixa de lado |

### Azure AD (Microsoft Entra ID)

O Azure tem uma página dedicada que cobre o registo da aplicação, o mapeamento de papéis com base em grupos, a autenticação por certificado e os comandos de sincronização de aprovisionamento de contas — consulte [Azure Entra ID](azure-entra-id.md).

### Keycloak

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Sign in with Keycloak"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        auth_server_url: "https://keycloak.yourorg.com"
        realm: "your-realm"
        allow_create_new_users: true
```

### Facebook

```yaml
authentication:
  1:
    oauth2:
      facebook:
        enabled: true
        title: "Sign in with Facebook"
        client_id: "<app-id>"
        client_secret: "<app-secret>"
        graph_api_version: "v20.0"
        allow_create_new_users: true
```

### OAuth2 genérico

Utilize esta opção para Google, GitLab ou qualquer fornecedor compatível com OAuth2:

```yaml
authentication:
  1:
    oauth2:
      myprovider:
        enabled: true
        title: "Sign in with MyProvider"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        urlAuthorize: "https://provider.example.com/oauth/authorize"
        urlAccessToken: "https://provider.example.com/oauth/token"
        urlResourceOwnerDetails: "https://provider.example.com/api/user"
        scopes: ["openid", "email", "profile"]
        allow_create_new_users: true
```

O mapeamento de campos (como os atributos do fornecedor se correspondem a `firstname`, `lastname`, `email`, etc. do Chamilo) e o mapeamento de papéis também são configuráveis. Consulte a [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) para a lista completa de chaves de mapeamento.

## Opcional — Enviar automaticamente todos os visitantes para o fornecedor

Duas chaves controlam quanto da página de início de sessão o visitante ainda vê. São independentes e respondem a necessidades diferentes:

| Key | What the visitor sees |
|-----|-----------------------|
| `force_as_login_method: true` | A página de início de sessão, reduzida ao botão deste fornecedor. O visitante clica nele. |
| `force_redirect: true` | Nenhuma página de início de sessão. O browser vai sozinho para o fornecedor. |

Utilize `force_redirect` quando o fornecedor de identidade é dono de todas as contas e o formulário de início de sessão local não tem utilidade:

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Sign in with Keycloak"
        force_redirect: true
        skip_force_redirect_in: ['/catalogue']
```

Apenas um fornecedor pode forçar o redirecionamento. Se vários o declararem, prevalece o primeiro que estiver ativado. O LDAP não o pode declarar, porque autentica através do formulário local.

O redirecionamento aplica-se a uma página que o browser apresenta, e a mais nada. Estes pedidos permanecem sempre onde estão:

* Uma chamada API, SCIM, MCP ou XHR, que não pode seguir um handshake pensado para um browser.
* Uma imagem, uma folha de estilos ou uma transferência de ficheiro.
* Qualquer escrita (POST, PUT, DELETE), porque um browser reproduz uma escrita redirecionada como GET e descarta o corpo.
* O próprio handshake do fornecedor (`/connect/...`) e `/logout`, que de outro modo criariam um ciclo infinito.
* Um visitante que já tem uma sessão, incluindo a conta anónima de um curso público.

Adicione um fragmento de URL a `skip_force_redirect_in` para cada área pública que deve permanecer aberta, como um catálogo de cursos.

### A válvula de escape

Um fornecedor inacessível bloquearia todas as contas, incluindo a do administrador local. Acrescente `skipForcedRedirect=1` a qualquer URL para aceder mesmo assim ao formulário de início de sessão local:

```
https://your-chamilo-url/login?skipForcedRedirect=1
```

A escolha permanece na sessão, pelo que as páginas seguintes continuam a mostrar o formulário. Também cancela `force_as_login_method` para essa sessão, o que volta a colocar todos os métodos de início de sessão na página. Para devolver a plataforma ao fornecedor, use `?skipForcedRedirect=0`, ou feche a sessão do navegador.

O parâmetro pertence apenas a `force_redirect`. Enquanto nenhum fornecedor declarar essa chave, o parâmetro não faz absolutamente nada, e `force_as_login_method` mantém o seu único botão.

Guarde este URL nas suas notas de recuperação. Teste-o antes de ativar `force_redirect` em produção.

## Passo 3 — Limpar a cache e testar

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Termine a sessão no Chamilo. O botão do fornecedor configurado deverá aparecer na página de início de sessão. Teste com uma conta dedicada antes de disponibilizar a todos os utilizadores.

## Dicas

* Mantenha o formulário de início de sessão padrão ativado para que os administradores possam sempre iniciar sessão se o OAuth2 tiver problemas. Se definir `force_redirect`, aprenda em vez disso o URL `?skipForcedRedirect=1`: é a única forma de regressar a esse formulário.
* A atribuição de papéis assume por omissão o de estudante; use o mapeamento de grupos (Azure) para promover automaticamente os utilizadores a papéis de professor ou administrador — consulte [Azure Entra ID](azure-entra-id.md) para pormenores sobre isso e sobre a correspondência de utilizadores recebidos com contas existentes.