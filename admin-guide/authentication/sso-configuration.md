# Configuração de SSO

Esta página aborda tópicos que se aplicam a diferentes métodos de autenticação.

## Múltiplos provedores

Você pode habilitar mais de um método de autenticação ao mesmo tempo. Cada provedor habilitado exibe seu próprio botão na página de login, ao lado do formulário padrão de nome de usuário/senha. Os usuários escolhem o método de sua preferência.

Mantenha o formulário padrão habilitado para que os administradores da plataforma possam sempre fazer login, mesmo que um provedor externo esteja configurado incorretamente.

## Prioridade de autenticação

Quando vários métodos estão ativos, o sistema verifica as credenciais nesta ordem:

1. LDAP (se `force_as_login_method` estiver definido)
2. Provedores OAuth2 (na ordem em que aparecem em `authentication.yaml`)
3. Banco de dados interno do Chamilo

## Tokens JWT para acesso à API

O Chamilo utiliza JWT (JSON Web Tokens) para sua API REST. A duração do token e o comportamento de atualização são configurados em `config/packages/lexik_jwt_authentication.yaml`. Isso é separado do fluxo de login SSO e aplica-se apenas a clientes da API.

## Solução de problemas

### Botão de login não aparece após a configuração

O cache deve ser limpo após cada alteração em `authentication.yaml`:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### Usuários não conseguem fazer login via SSO

* **Incompatibilidade de URI de redirecionamento** — O URI registrado no seu provedor de identidade deve corresponder exatamente a `https://your-chamilo-url/connect/<provider>/check`.
* **Desvio de relógio** — Os tokens SSO são sensíveis ao tempo. Certifique-se de que o relógio do seu servidor está sincronizado (NTP).
* **Certificado SSL** — O Chamilo deve confiar no certificado do provedor de identidade. Verifique se há problemas com certificados autoassinados.
* **Logs** — Revise `var/log/` e os logs do seu provedor de identidade para mensagens de erro específicas.

### Usuários são criados com o papel errado

Verifique a configuração de mapeamento de papéis para o provedor. Novos usuários recebem por padrão o papel de estudante, a menos que um mapeamento de grupo ou atributo os promova.

### Usuários existem no provedor, mas não conseguem acessar o Chamilo

* Se `allow_create_new_users` estiver definido como falso, o usuário deve já ter uma conta no Chamilo cujo e-mail ou nome de usuário corresponda aos dados do provedor.
* Verifique se o usuário não está desativado no Chamilo.
* Para Azure, revise `existing_user_verification_order` para entender como o Chamilo associa usuários recebidos a contas existentes.