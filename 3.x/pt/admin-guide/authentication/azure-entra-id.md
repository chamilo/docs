# Azure Entra ID

A Microsoft rebatizou o Azure Active Directory (Azure AD) como **Microsoft Entra ID** em 2023 — trata-se do mesmo serviço, e o código e a configuração do Chamilo ainda se referem a ele como `azure`. Esta página aborda as partes específicas do Azure da integração: registo da aplicação, mapeamento de papéis com base em grupos, autenticação por certificado e os comandos dedicados de sincronização de utilizadores/grupos. Para as chaves de configuração partilhadas por todos os fornecedores (`enabled`, `title`, `allow_create_new_users`, e assim por diante) e a estrutura geral de `authentication.yaml`, consulte [OAuth2](oauth2.md).

## Registar o Chamilo no Microsoft Entra ID

1. No centro de administração do Entra, crie um **App registration** para o Chamilo.
2. Defina o URI de redirecionamento (tipo de plataforma **Web**) para:

   ```
   https://your-chamilo-url/connect/azure/check
   ```

3. Anote o **Application (client) ID** e o **Directory (tenant) ID** — precisará de ambos.
4. Em **Certificates & secrets**, crie um segredo de cliente ou carregue um certificado (veja [Autenticação por certificado](#certificate-authentication) abaixo).
5. Em **API permissions**, adicione as permissões do Microsoft Graph abaixo e conceda o consentimento de administrador.

| Permissão | Tipo | Necessário para |
|------------|------|-------------|
| `User.Read` | Delegated | Início de sessão básico |
| `GroupMember.Read.All` | Delegated | Mapeamento de papéis com base em grupos no início de sessão |
| `User.Read.All` | Application | `app:azure-sync-users` |
| `GroupMember.Read.All` ou `Group.Read.All` | Application | `app:azure-sync-users` e `app:azure-sync-usergroups` |

As permissões de aplicação exigem consentimento de administrador e são usadas apenas pelos comandos de consola de sincronização (através da concessão `client_credentials`), nunca pelo início de sessão interativo de um utilizador.

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

### Multi-inquilino vs. inquilino único

O valor de `tenant` deve corresponder à forma como os «tipos de conta suportados» do registo da aplicação foram definidos:

* Um GUID de inquilino específico — inquilino único; apenas as contas dessa organização podem iniciar sessão
* `organizations` — qualquer inquilino Entra ID
* `common` — qualquer inquilino Entra ID mais contas Microsoft pessoais

## Atributos de utilizador obrigatórios

Todos os utilizadores Entra ID que precisem de iniciar sessão no Chamilo devem ter `mail` e `mailNickname` preenchidos — o início de sessão gera um erro se algum estiver vazio (juntamente com o ID de objeto Entra imutável, que está sempre presente). O mapeamento de campos do Microsoft Graph para o Chamilo é **fixo** para o Azure (ao contrário do fornecedor OAuth2 genérico, que permite configurar o mapeamento de campos):

| Campo Chamilo | Origem Microsoft Graph |
|---------------|------------------------|
| Nome próprio | `givenName` |
| Apelido | `surname` |
| E-mail | `mail` |
| Nome de utilizador | `userPrincipalName` |
| Telefone | `telephoneNumber`, depois `businessPhones[0]`, depois `mobilePhone` |
| Ativo | `accountEnabled` |
| Idioma da interface | `preferredLanguage` (correspondido a um idioma Chamilo instalado, com recurso ao predefinido da plataforma) |

Três campos extra também são escritos em cada início de sessão bem-sucedido: `organisationemail` (= `mail`), `azure_id` (= `mailNickname`) e `azure_uid` (= o ID de objeto Entra). Estes sustentam a lógica de correspondência de contas abaixo.

## Correspondência de inícios de sessão a contas Chamilo existentes

Defina `existing_user_verification_order` como uma lista de dígitos `1`–`3` separados por vírgulas para controlar como um início de sessão Entra ID de entrada é correspondido a uma conta Chamilo existente:

| Valor | Corresponde a |
|-------|------------------|
| `1` | Campo extra `organisationemail` == Entra `mail` |
| `2` | Campo extra `azure_id` == Entra `mailNickname` |
| `3` | Campo extra `azure_uid` == ID de objeto Entra |

As posições são tentadas na ordem listada; a primeira correspondência ativa (não eliminada logicamente) prevalece. Um valor inválido ou vazio assume o predefinido `1,2,3`. Se nenhuma das posições configuradas corresponder — o que acontece sempre na primeira vez que um determinado utilizador inicia sessão, uma vez que esses campos extra só são preenchidos *após* um início de sessão bem-sucedido — o Chamilo recorre a corresponder o próprio campo `email` do Chamilo ao Entra `mail`, depois `username` a `userPrincipalName`, independentemente do que configurou.

## Mapeamento de Funções Baseado em Grupos

Mapeie grupos de segurança do Entra ID para funções do Chamilo com os respetivos Object IDs (GUIDs):

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

Em cada início de sessão, o Chamilo chama o Microsoft Graph `/v1.0/me/memberOf` com o token de acesso do próprio utilizador e compara os grupos devolvidos com estes três IDs, pela ordem **admin → session_admin → teacher**. A primeira correspondência prevalece — um utilizador que pertença simultaneamente aos grupos de administrador e de professor é promovido apenas a administrador. Quem não pertencer a nenhum grupo configurado mantém a função existente (ou a função predefinida de estudante, no primeiro início de sessão). Isto requer a permissão delegada `GroupMember.Read.All` indicada acima.

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

Carregue o certificado público correspondente em **Certificates & secrets** no registo da aplicação e copie a respetiva impressão digital (mostrada em hexadecimal no portal) para `client_certificate_thumbprint`. Quando ambas as chaves estão definidas, o Chamilo constrói uma asserção de cliente JWT assinada (RS256) em vez de enviar `client_secret` — isto aplica-se tanto aos inícios de sessão interativos como à autenticação apenas de aplicação dos comandos de sincronização.

## Sincronização de Utilizadores e Grupos a partir do Entra ID

Dois comandos de consola provisionam e mantêm contas Chamilo diretamente a partir do Entra ID, independentemente de alguém iniciar sessão de forma interativa. Ambos autenticam apenas como aplicação (`client_credentials`), pelo que necessitam das permissões Graph de **aplicação** listadas acima, e ambos se destinam a ser agendados em cron em vez de executados manualmente.

### `app:azure-sync-users`

Obtém utilizadores do Microsoft Graph e provisiona/atualiza as contas Chamilo correspondentes, utilizando o mesmo mapeamento de campos e a mesma lógica de correspondência de contas de um início de sessão interativo.

* Por predefinição, obtém a lista completa de utilizadores (`/v1.0/users`, paginada). Defina `script_users_delta: true` para usar `/v1.0/users/delta` em vez disso — o Chamilo persiste a ligação delta entre execuções, pelo que as execuções seguintes apenas obtêm o que mudou.
* Defina `deactivate_nonexisting_users: true` para desativar contas Chamilo (com origem de autenticação Azure) que já não apareçam na extração do Entra ID. Isto só funciona no modo de extração completa — o modo delta nunca devolve a lista completa de utilizadores, pelo que esta definição é ignorada quando `script_users_delta` está ativado.
* O mapeamento de funções por grupo (acima) é reaplicado a cada utilizador sincronizado durante esta execução, e não apenas no início de sessão.

### `app:azure-sync-usergroups`

Obtém grupos do Entra ID e replica-os como classes Chamilo (`Usergroup`).

* Obtém a lista completa de grupos (`/v1.0/groups`) ou, com `script_usergroups_delta: true`, o endpoint delta, com a sua própria ligação delta acompanhada em separado.
* `group_filter_regex` restringe quais os grupos sincronizados, com correspondência no nome de apresentação do grupo.
* **Cada execução limpa primeiro todos os membros existentes da classe Chamilo correspondente**, e depois reinscreve os membros que o Graph devolve atualmente. Os membros são correspondidos apenas a utilizadores Chamilo *já existentes*, utilizando a mesma [lógica de correspondência de contas](#matching-logins-to-existing-chamilo-accounts) do início de sessão — este comando nunca cria novas contas de utilizador, e qualquer membro de grupo que não consiga corresponder a uma conta Chamilo existente é silenciosamente ignorado.

## Limitações Conhecidas

* **Sem encerramento de sessão único.** Sair do Chamilo não encerra a sessão do utilizador no Entra ID nem noutras aplicações ligadas. Existe uma chave de configuração `force_logout` em `authentication.yaml`, mas não está atualmente implementada — trate-a como reservada, não funcional.
* **A redefinição de palavra-passe não faz sentido para contas Azure.** Como a autenticação ocorre inteiramente através do Entra ID, o Chamilo não mantém uma palavra-passe local utilizável para estas contas.

## Resolução de Problemas

* Falhas de início de sessão (atributos obrigatórios em falta, erros da Graph API) são apresentadas ao utilizador como uma mensagem flash na página de início de sessão.
* Os comandos de sincronização registam problemas por registo com avisos e continuam a processar o resto do lote em vez de abortar no primeiro erro — verifique a saída da consola do comando (ou o destino em que o cron a captura) após cada execução.
* Mantenha o formulário de início de sessão padrão do Chamilo ativado para que os administradores tenham sempre uma forma de entrar se a integração com o Entra ID falhar.