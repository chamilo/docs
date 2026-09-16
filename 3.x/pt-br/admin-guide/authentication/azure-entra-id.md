# Azure Entra ID

A Microsoft rebatizou o Azure Active Directory (Azure AD) como **Microsoft Entra ID** em 2023 — trata-se do mesmo serviço, e o código e a configuração do Chamilo ainda se referem a ele como `azure`. Esta página aborda as partes específicas do Azure da integração: registro do aplicativo, mapeamento de papéis baseado em grupos, autenticação por certificado e os comandos dedicados de sincronização de usuários/grupos. Para as chaves de configuração compartilhadas por todos os provedores (`enabled`, `title`, `allow_create_new_users` e assim por diante) e a estrutura geral de `authentication.yaml`, consulte [OAuth2](oauth2.md).

## Registrando o Chamilo no Microsoft Entra ID

1. No centro de administração do Entra, crie um **App registration** para o Chamilo.
2. Defina o URI de redirecionamento (tipo de plataforma **Web**) como:

   ```
   https://your-chamilo-url/connect/azure/check
   ```

3. Anote o **Application (client) ID** e o **Directory (tenant) ID** — você precisará de ambos.
4. Em **Certificates & secrets**, crie um segredo de cliente ou envie um certificado (veja [Autenticação por certificado](#certificate-authentication) abaixo).
5. Em **API permissions**, adicione as permissões do Microsoft Graph abaixo e conceda o consentimento de administrador.

| Permissão | Tipo | Necessária para |
|------------|------|-------------|
| `User.Read` | Delegated | Login básico |
| `GroupMember.Read.All` | Delegated | Mapeamento de papéis baseado em grupos no login |
| `User.Read.All` | Application | `app:azure-sync-users` |
| `GroupMember.Read.All` ou `Group.Read.All` | Application | `app:azure-sync-users` e `app:azure-sync-usergroups` |

As permissões de aplicativo exigem consentimento de administrador e são usadas apenas pelos comandos de console de sincronização (via concessão `client_credentials`), nunca pelo login interativo de um usuário.

## Configuração básica

```yaml
authentication:
  1:
    oauth2:
      azure:
        enabled: true
        title: "Sign in with Microsoft"
        client_id: "<application-client-id>"
        client_secret: "<client-secret>"
        tenant: "<tenant-id>"
        url_login: "https://login.microsoftonline.com"
        path_authorize: "/<tenant-id>/oauth2/v2.0/authorize"
        path_token: "/<tenant-id>/oauth2/v2.0/token"
        url_api: "https://graph.microsoft.com"
        allow_create_new_users: true
        allow_update_user_info: true
```

### Multilocatário vs. locatário único

O valor de `tenant` deve corresponder à forma como os "tipos de conta suportados" do registro do aplicativo foram definidos:

* Um GUID de locatário específico — locatário único; somente as contas dessa organização podem entrar
* `organizations` — qualquer locatário Entra ID
* `common` — qualquer locatário Entra ID mais contas Microsoft pessoais

## Atributos de usuário obrigatórios

Todo usuário do Entra ID que precise entrar no Chamilo deve ter `mail` e `mailNickname` preenchidos — o login gera um erro se qualquer um estiver vazio (junto com o ID de objeto imutável do Entra, que está sempre presente). O mapeamento de campos do Microsoft Graph para o Chamilo é **fixo** para o Azure (ao contrário do provedor OAuth2 genérico, que permite configurar o mapeamento de campos):

| Campo do Chamilo | Origem no Microsoft Graph |
|---------------|------------------------|
| Nome | `givenName` |
| Sobrenome | `surname` |
| E-mail | `mail` |
| Nome de usuário | `userPrincipalName` |
| Telefone | `telephoneNumber`, depois `businessPhones[0]`, depois `mobilePhone` |
| Ativo | `accountEnabled` |
| Idioma da interface | `preferredLanguage` (correspondido a um idioma instalado do Chamilo, com fallback para o padrão da plataforma) |

Três campos extras também são gravados a cada login bem-sucedido: `organisationemail` (= `mail`), `azure_id` (= `mailNickname`) e `azure_uid` (= o ID de objeto do Entra). Eles sustentam a lógica de correspondência de contas abaixo.

## Correspondência de logins a contas existentes do Chamilo

Defina `existing_user_verification_order` como uma lista separada por vírgulas dos dígitos `1`–`3` para controlar como um login Entra ID de entrada é correspondido a uma conta existente do Chamilo:

| Valor | Corresponde a |
|-------|------------------|
| `1` | Campo extra `organisationemail` == `mail` do Entra |
| `2` | Campo extra `azure_id` == `mailNickname` do Entra |
| `3` | Campo extra `azure_uid` == ID de objeto do Entra |

As posições são tentadas na ordem listada; a primeira correspondência ativa (não excluída logicamente) prevalece. Um valor inválido ou vazio assume o padrão `1,2,3`. Se nenhuma das posições configuradas corresponder — o que sempre ocorre na primeira vez que um determinado usuário entra, pois esses campos extras só são preenchidos *após* um login bem-sucedido — o Chamilo recorre à correspondência do próprio campo `email` do Chamilo com o `mail` do Entra e, em seguida, de `username` com `userPrincipalName`, independentemente do que você tenha configurado.

## Mapeamento de Funções Baseado em Grupos

Mapeie grupos de segurança do Entra ID para funções do Chamilo com seus Object IDs (GUIDs):

```yaml
authentication:
  1:
    oauth2:
      azure:
        group_id:
          admin: "<entra-group-object-id>"
          session_admin: "<entra-group-object-id>"
          teacher: "<entra-group-object-id>"
```

A cada login, o Chamilo chama o Microsoft Graph `/v1.0/me/memberOf` com o token de acesso do próprio usuário e compara os grupos retornados com esses três IDs, na ordem **admin → session_admin → teacher**. A primeira correspondência prevalece — um usuário que esteja nos grupos de admin e de teacher é promovido apenas a admin. Quem não estiver em nenhum grupo configurado mantém a função existente (ou a função padrão de estudante, no primeiro login). Isso exige a permissão delegada `GroupMember.Read.All` listada acima.

## Autenticação por Certificado

Como alternativa a `client_secret`, autentique com um certificado:

```yaml
authentication:
  1:
    oauth2:
      azure:
        client_certificate_private_key: "<PEM private key, single line, with \\n for line breaks>"
        client_certificate_thumbprint: "<hex SHA1 thumbprint>"
```

Envie o certificado público correspondente em **Certificates & secrets** no registro do aplicativo e copie a impressão digital (exibida em hexadecimal no portal) para `client_certificate_thumbprint`. Quando ambas as chaves estão definidas, o Chamilo constrói uma asserção JWT de cliente assinada (RS256) em vez de enviar `client_secret` — isso se aplica tanto aos logins interativos quanto à autenticação somente de aplicativo dos comandos de sincronização.

## Sincronização de Usuários e Grupos a partir do Entra ID

Dois comandos de console provisionam e mantêm contas do Chamilo diretamente a partir do Entra ID, independentemente de alguém fazer login interativo. Ambos autenticam somente como aplicativo (`client_credentials`), portanto precisam das permissões de Graph de **aplicativo** listadas acima, e ambos devem ser agendados no cron em vez de executados manualmente.

### `app:azure-sync-users`

Obtém usuários do Microsoft Graph e provisiona/atualiza as contas correspondentes no Chamilo usando o mesmo mapeamento de campos e a mesma lógica de correspondência de contas de um login interativo.

* Por padrão, obtém a lista completa de usuários (`/v1.0/users`, paginada). Defina `script_users_delta: true` para usar `/v1.0/users/delta` — o Chamilo persiste o link delta entre execuções, de modo que as execuções seguintes buscam apenas o que mudou.
* Defina `deactivate_nonexisting_users: true` para desativar contas do Chamilo (com origem de autenticação Azure) que não apareçam mais na obtenção do Entra ID. Isso só funciona no modo de obtenção completa — o modo delta nunca retorna a lista completa de usuários, portanto essa configuração é ignorada quando `script_users_delta` está habilitado.
* O mapeamento de funções por grupo (acima) é reaplicado a cada usuário sincronizado nesta execução, não apenas no login.

### `app:azure-sync-usergroups`

Obtém grupos do Entra ID e os espelha como classes do Chamilo (`Usergroup`).

* Obtém a lista completa de grupos (`/v1.0/groups`) ou, com `script_usergroups_delta: true`, o endpoint delta, com seu próprio link delta rastreado separadamente.
* `group_filter_regex` restringe quais grupos são sincronizados, comparando com o nome de exibição do grupo.
* **Cada execução limpa primeiro todos os membros existentes da classe correspondente no Chamilo** e, em seguida, reinscreve os membros que o Graph retorna no momento. Os membros são correspondidos apenas a usuários *já existentes* no Chamilo, usando a mesma [lógica de correspondência de contas](#matching-logins-to-existing-chamilo-accounts) do login — este comando nunca cria novas contas de usuário, e qualquer membro de grupo que não possa ser correspondente a uma conta existente no Chamilo é ignorado silenciosamente.

## Limitações Conhecidas

* **Sem logout único.** Sair do Chamilo não desconecta o usuário do Entra ID nem de outros aplicativos conectados. Existe uma chave de configuração `force_logout` em `authentication.yaml`, mas ela não está implementada no momento — trate-a como reservada, não funcional.
* **Redefinição de senha não faz sentido para contas Azure.** Como a autenticação ocorre inteiramente pelo Entra ID, o Chamilo não mantém uma senha local utilizável para essas contas.

## Solução de Problemas

* Falhas de login (atributos obrigatórios ausentes, erros da Graph API) aparecem para o usuário como uma mensagem flash na página de login.
* Os comandos de sincronização registram problemas por registro com avisos e continuam processando o restante do lote em vez de interromper no primeiro erro — verifique a saída do console do comando (ou o destino em que o cron a captura) após cada execução.
* Mantenha o formulário de login padrão do Chamilo habilitado para que os administradores sempre tenham um meio de acesso se a integração com o Entra ID falhar.