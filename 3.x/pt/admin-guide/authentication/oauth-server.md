# Servidor de autorização OAuth 2.1 e clientes MCP

O Chamilo pode atuar como um **servidor de autorização OAuth** para clientes que se ligam aos seus recursos protegidos. Esta é uma funcionalidade distinta do [início de sessão OAuth2](oauth2.md), em que o Chamilo utiliza um fornecedor de identidade externo para iniciar a sessão dos utilizadores.

## Ativar e configurar

Em **Administração > Definições de configuração > Segurança**, ative `security.oauth_server_enabled`. O acesso MCP depende também da configuração existente `security.mcp_enabled` e do papel MCP permitido ao utilizador.

O servidor expõe as rotas padrão de autorização, token, registo e revogação (`/oauth/authorize`, `/oauth/token`, `/oauth/register`, `/oauth/revoke`) e metadados de descoberta. Em produção, os clientes devem utilizar apenas HTTPS.

## Registar um cliente

O Chamilo suporta clientes públicos de código de autorização com PKCE e clientes confidenciais registados. O registo dinâmico de clientes (DCR) utiliza `/oauth/register` e está sujeito a limitação de taxa. A definição `security.dynamic_client_registration` está **desativada por predefinição**; o endpoint permanece disponível para o fluxo de registo MCP suportado, enquanto a definição controla os âmbitos de cliente adicionais aceites pelo registo. Não presuma que a ativação da definição torna disponíveis APIs protegidas arbitrárias.

Os clientes registados têm uma lista, do lado do servidor, de **recursos permitidos**. Atualmente, o registo de recursos define apenas o recurso **MCP** e o âmbito `mcp`. Novos recursos protegidos exigem implementação explícita no servidor e decisões de permissão, e não apenas a adição de um URL não reconhecido a um pedido. O Chamilo valida os parâmetros `resource` da RFC 8707 ao longo da autorização e do tratamento de tokens.

## Consentimento do utilizador e auditoria

1. Um cliente inicia um pedido de código de autorização com PKCE (`S256`) e o âmbito/recurso solicitado.
2. O utilizador autentica-se com o seu início de sessão habitual no Chamilo, se necessário.
3. O Chamilo apresenta a identidade do cliente, os detalhes de registo e o acesso solicitado num ecrã de consentimento.
4. O utilizador seleciona **Permitir** ou **Recusar**. Uma aprovação fica registada como parte do histórico de consentimento do servidor, e as informações de aprovações anteriores podem ser apresentadas em pedidos posteriores.

O consentimento está associado ao pedido apresentado ao utilizador. Um pedido aprovado não concede outros recursos protegidos nem acesso arbitrário para além das permissões solicitadas.

## Notas de implantação e segurança

As atualizações do OAuth 2.1 introduzem um campo de recursos permitidos para os clientes e registos persistentes de consentimento do cliente. Aplique as **migrações específicas da base de dados do Chamilo** fornecidas com a versão antes de ativar o fluxo atualizado. Mantenha privados os URLs de callback e os segredos dos clientes OAuth. O registo de clientes não concede acesso irrestrito aos utilizadores ou cursos do Chamilo.

Referência de implementação: [Registo de clientes OAuth e consentimento, PR #9231](https://github.com/chamilo/chamilo-lms/pull/9231).