# Configuração de SSO

Esta página aborda tópicos que se aplicam a todos os métodos de autenticação.

## Vários provedores

Você pode habilitar mais de um método de autenticação ao mesmo tempo. Cada provedor habilitado exibe o respectivo botão na página de login, ao lado do formulário padrão de nome de usuário/senha. Os usuários escolhem o método de sua preferência.

Mantenha o formulário padrão habilitado para que os administradores da plataforma possam sempre entrar, mesmo que um provedor externo esteja mal configurado.

## Prioridade de autenticação

Quando vários métodos estão ativos, o sistema verifica as credenciais nesta ordem:

1. LDAP (se `force_as_login_method` estiver definido)
2. Provedores OAuth2 (na ordem em que aparecem em `authentication.yaml`)
3. Banco de dados interno do Chamilo

## Tokens JWT para acesso à API

O Chamilo usa JWT (JSON Web Tokens) para a sua API REST. O tempo de vida do token e o comportamento de renovação são configurados em `config/packages/lexik_jwt_authentication.yaml`. Isso é independente do fluxo de login SSO e aplica-se apenas a clientes da API.

## Solução de problemas

### O botão de login não aparece após a configuração

O cache deve ser limpo após cada alteração em `authentication.yaml`:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### Os usuários não conseguem entrar via SSO

* **Incompatibilidade de URI de redirecionamento** — A URI registrada no provedor de identidade deve coincidir exatamente com `https://your-chamilo-url/connect/<provider>/check`.
* **Dessincronização de relógio** — Os tokens SSO são sensíveis ao tempo. Certifique-se de que o relógio do servidor esteja sincronizado (NTP).
* **Certificado SSL** — O Chamilo deve confiar no certificado do provedor de identidade. Verifique problemas com certificados autoassinados.
* **Logs** — Consulte `var/log/` e os logs do provedor de identidade em busca de mensagens de erro específicas.

### Os usuários são criados com o papel errado

Verifique a configuração de mapeamento de papéis do provedor. Novos usuários recebem por padrão o papel de aluno, a menos que um mapeamento de grupo ou atributo os promova.

### Os usuários existem no provedor, mas não conseguem acessar o Chamilo

* Se `allow_create_new_users` for false, o usuário já deve ter uma conta no Chamilo cujo e-mail ou nome de usuário coincida com os dados do provedor.
* Verifique se o usuário não está desativado no Chamilo.
* No Azure, revise `existing_user_verification_order` para entender como o Chamilo associa usuários recebidos a contas existentes.