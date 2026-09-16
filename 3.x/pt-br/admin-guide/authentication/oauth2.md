# OAuth2

A autenticação OAuth2 é configurada em `config/authentication.yaml`. O Chamilo inclui suporte nativo para Azure AD, Keycloak, Facebook e qualquer provedor genérico compatível com OAuth2.

## Step 1 — Registrar o Chamilo no provedor de identidade

Crie um aplicativo no painel administrativo do provedor e defina o **URI de redirecionamento** como:

```
https://your-chamilo-url/connect/<provider>/check
```

Em que `<provider>` é `azure`, `keycloak`, `facebook` ou o nome que você atribuir a um provedor genérico. Anote o **Client ID** e o **Client Secret**.

## Step 2 — Configurar o authentication.yaml

Ative o provedor e informe as credenciais. Todos os provedores compartilham estas chaves comuns:

| Key | Description |
|-----|-------------|
| `enabled` | `true` para ativar |
| `title` | Rótulo exibido no botão de login |
| `client_id` | Fornecido pelo provedor de identidade |
| `client_secret` | Fornecido pelo provedor de identidade |
| `allow_create_new_users` | Criar automaticamente uma conta Chamilo no primeiro login |
| `allow_update_user_info` | Sincronizar os dados do usuário a cada login |
| `force_as_login_method` | Ocultar os demais métodos e exibir apenas o botão deste provedor |
| `force_redirect` | Enviar um visitante anônimo a este provedor automaticamente, sem botão para clicar |
| `skip_force_redirect_in` | Lista de fragmentos de URL que o `force_redirect` deixa intactos |

### Azure AD (Microsoft Entra ID)

O Azure possui uma página dedicada que cobre o registro do aplicativo, o mapeamento de papéis com base em grupos, a autenticação por certificado e os comandos de sincronização de provisionamento de contas — consulte [Azure Entra ID](azure-entra-id.md).

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

Use esta opção para Google, GitLab ou qualquer provedor compatível com OAuth2:

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

O mapeamento de campos (como os atributos do provedor são mapeados para `firstname`, `lastname`, `email` etc. do Chamilo) e o mapeamento de papéis também são configuráveis. Consulte a [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) para a lista completa de chaves de mapeamento.

## Opcional — Enviar automaticamente todo visitante ao provedor

Duas chaves controlam quanto da página de login o visitante ainda vê. Elas são independentes e atendem a necessidades distintas:

| Key | What the visitor sees |
|-----|-----------------------|
| `force_as_login_method: true` | A página de login, reduzida ao botão deste provedor. O visitante clica nele. |
| `force_redirect: true` | Nenhuma página de login. O navegador vai ao provedor por conta própria. |

Use `force_redirect` quando o provedor de identidade for dono de todas as contas e o formulário de login local não tiver finalidade:

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

Apenas um provedor pode forçar o redirecionamento. Se vários o declararem, o primeiro habilitado prevalece. O LDAP não pode declará-lo, porque autentica por meio do formulário local.

O redirecionamento aplica-se a uma página que o navegador exibe, e a nada mais. Estas requisições permanecem sempre onde estão:

* Uma chamada de API, SCIM, MCP ou XHR, que não pode seguir um handshake destinado a um navegador.
* Uma imagem, uma folha de estilo ou um download de arquivo.
* Qualquer escrita (POST, PUT, DELETE), porque o navegador reproduz uma escrita redirecionada como GET e descarta o corpo.
* O próprio handshake do provedor (`/connect/...`) e `/logout`, que de outro modo formariam um loop infinito.
* Um visitante que já possui sessão, inclusive a conta anônima de um curso público.

Adicione um fragmento de URL a `skip_force_redirect_in` para cada área pública que deve permanecer aberta, como um catálogo de cursos.

### A saída de emergência

Um provedor inacessível bloquearia todas as contas, inclusive a do administrador local. Acrescente `skipForcedRedirect=1` a qualquer URL para chegar ao formulário de login local mesmo assim:

```
https://your-chamilo-url/login?skipForcedRedirect=1
```

A escolha permanece na sessão, de modo que as páginas seguintes continuam exibindo o formulário. Isso também cancela `force_as_login_method` para essa sessão, o que recoloca todos os métodos de login na página. Para devolver a plataforma ao provedor, use `?skipForcedRedirect=0`, ou encerre a sessão do navegador.

O parâmetro pertence somente a `force_redirect`. Enquanto nenhum provedor declarar essa chave, o parâmetro não faz nada, e `force_as_login_method` mantém seu único botão.

Guarde esta URL junto com suas anotações de recuperação. Teste-a antes de ativar `force_redirect` em produção.

## Step 3 — Clear cache and test

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Saia do Chamilo. O botão do provedor configurado deve aparecer na página de login. Teste com uma conta dedicada antes de disponibilizar a todos os usuários.

## Dicas

* Mantenha o formulário de login padrão habilitado para que os administradores sempre possam entrar se o OAuth2 apresentar problemas. Se você definir `force_redirect`, aprenda a URL `?skipForcedRedirect=1` em vez disso: é o único caminho de volta a esse formulário.
* A atribuição de papéis tem como padrão o aluno; use o mapeamento de grupos (Azure) para promover usuários automaticamente a papéis de professor ou administrador — consulte [Azure Entra ID](azure-entra-id.md) para detalhes sobre isso e sobre a correspondência de usuários recebidos com contas existentes.