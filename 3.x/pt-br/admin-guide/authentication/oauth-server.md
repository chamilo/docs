# Servidor de autorização OAuth 2.1 e clientes MCP

O Chamilo pode atuar como um **servidor de autorização OAuth** para clientes que se conectam aos seus recursos protegidos. Este é um recurso diferente do [login OAuth2](oauth2.md), no qual o Chamilo utiliza um provedor de identidade externo para autenticar os usuários.

## Habilitar e configurar

Em **Administração > Parâmetros de configuração > Segurança**, habilite `security.oauth_server_enabled`. O acesso MCP também depende da configuração existente `security.mcp_enabled` e do papel MCP permitido ao usuário.

O servidor expõe rotas padrão de autorização, token, registro e revogação (`/oauth/authorize`, `/oauth/token`, `/oauth/register`, `/oauth/revoke`) e metadados de descoberta. Somente HTTPS deve ser usado para clientes de produção.

## Registrar um cliente

O Chamilo oferece suporte a clientes públicos de código de autorização com PKCE e a clientes confidenciais registrados. O registro dinâmico de clientes (DCR) usa `/oauth/register` e é limitado por taxa. A configuração `security.dynamic_client_registration` está **desabilitada por padrão**; o endpoint permanece disponível para o fluxo de registro MCP suportado, enquanto a configuração controla os escopos adicionais de cliente aceitos pelo registro. Não presuma que ativar a configuração torne disponíveis APIs protegidas arbitrárias.

Os clientes registrados possuem uma lista de **recursos permitidos** no lado do servidor. Atualmente, o registro de recursos define apenas o recurso **MCP** e o escopo `mcp`. Novos recursos protegidos exigem implementação explícita no servidor e decisões de permissão, e não apenas a inclusão de uma URL não reconhecida em uma solicitação. O Chamilo valida os parâmetros `resource` da RFC 8707 em todo o tratamento de autorização e de tokens.

## Consentimento do usuário e auditoria

1. Um cliente inicia uma solicitação de código de autorização com PKCE (`S256`) e o escopo/recurso solicitado.
2. O usuário se autentica com seu login comum do Chamilo, se necessário.
3. O Chamilo exibe a identidade do cliente, os detalhes do registro e o acesso solicitado em uma tela de consentimento.
4. O usuário seleciona **Permitir** ou **Negar**. Uma aprovação é registrada como parte do histórico de consentimento do servidor, e informações de aprovações anteriores podem ser exibidas em solicitações posteriores.

O consentimento está vinculado à solicitação apresentada ao usuário. Uma solicitação aprovada não concede outros recursos protegidos nem acesso arbitrário além das permissões solicitadas.

## Notas de implantação e segurança

As atualizações do OAuth 2.1 introduzem um campo de recursos permitidos para clientes e registros persistentes de consentimento do cliente. Aplique as **migrações específicas do banco de dados do Chamilo** fornecidas com a versão antes de habilitar o fluxo atualizado. Mantenha as URLs de callback e os segredos de cliente OAuth em sigilo. O registro de clientes não concede acesso irrestrito a usuários ou cursos do Chamilo.

Referência de implementação: [Registro e consentimento de clientes OAuth, PR #9231](https://github.com/chamilo/chamilo-lms/pull/9231).