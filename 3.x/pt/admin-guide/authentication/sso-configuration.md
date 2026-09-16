# Configuração de SSO

Esta página aborda tópicos que se aplicam a todos os métodos de autenticação.

## Vários fornecedores

Pode ativar mais do que um método de autenticação ao mesmo tempo. Cada fornecedor ativado apresenta o seu próprio botão na página de início de sessão, juntamente com o formulário padrão de nome de utilizador/palavra-passe. Os utilizadores escolhem o método preferido.

Mantenha o formulário padrão ativado para que os administradores da plataforma possam sempre iniciar sessão, mesmo que um fornecedor externo esteja mal configurado.

## Prioridade de autenticação

Quando vários métodos estão ativos, o sistema verifica as credenciais nesta ordem:

1. LDAP (se `force_as_login_method` estiver definido)
2. Fornecedores OAuth2 (pela ordem em que aparecem em `authentication.yaml`)
3. Base de dados interna do Chamilo

## Tokens JWT para acesso à API

O Chamilo utiliza JWT (JSON Web Tokens) para a sua REST API. O tempo de vida do token e o comportamento de atualização são configurados em `config/packages/lexik_jwt_authentication.yaml`. Isto é independente do fluxo de início de sessão SSO e aplica-se apenas a clientes da API.

## Resolução de problemas

### O botão de início de sessão não aparece após a configuração

A cache deve ser limpa após cada alteração a `authentication.yaml`:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### Os utilizadores não conseguem iniciar sessão via SSO

* **Incompatibilidade do URI de redirecionamento** — O URI registado no seu fornecedor de identidade deve corresponder exatamente a `https://your-chamilo-url/connect/<provider>/check`.
* **Desvio de relógio** — Os tokens SSO são sensíveis ao tempo. Certifique-se de que o relógio do servidor está sincronizado (NTP).
* **Certificado SSL** — O Chamilo deve confiar no certificado do fornecedor de identidade. Verifique problemas com certificados autoassinados.
* **Registos** — Consulte `var/log/` e os registos do seu fornecedor de identidade para mensagens de erro específicas.

### Os utilizadores são criados com o papel errado

Verifique a configuração de mapeamento de papéis do fornecedor. Os novos utilizadores recebem por omissão o papel de estudante, a menos que um mapeamento de grupo ou atributo os promova.

### Os utilizadores existem no fornecedor mas não conseguem aceder ao Chamilo

* Se `allow_create_new_users` for false, o utilizador já deve ter uma conta Chamilo cujo e-mail ou nome de utilizador coincida com os dados do fornecedor.
* Verifique se o utilizador não está desativado no Chamilo.
* Para o Azure, reveja `existing_user_verification_order` para compreender como o Chamilo associa os utilizadores recebidos a contas existentes.