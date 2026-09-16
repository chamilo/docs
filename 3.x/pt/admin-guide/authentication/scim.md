# SCIM

**SCIM** (System for Cross-domain Identity Management) automatiza o aprovisionamento de utilizadores — criar, atualizar e desativar contas Chamilo com base em alterações no seu fornecedor de identidade. Ao contrário do OAuth2 ou do LDAP, o SCIM trata do aprovisionamento, não do início de sessão.

| Cenário | Ação SCIM |
|----------|-------------|
| Um novo colaborador entra | Cria uma conta Chamilo |
| O nome ou a função de um colaborador muda | Atualiza a conta Chamilo |
| Um colaborador sai | Desativa ou elimina a conta Chamilo |

## Configuração

### 1. Definir o token SCIM

No ficheiro `.env` (ou `.env.local`), defina um token aleatório seguro:

```
SCIM_TOKEN=your-secure-random-token
```

Este token é utilizado pelo seu fornecedor de identidade para autenticar os pedidos aos endpoints SCIM do Chamilo.

### 2. Ativar o SCIM em authentication.yaml

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

Limpe e aqueça a cache após a edição:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. Configurar o fornecedor de identidade

No seu fornecedor de identidade (Azure AD, Okta, etc.):

1. Adicione o Chamilo como aplicação SCIM
2. Defina o URL base SCIM como `https://your-chamilo-url/scim/v2/`
3. Introduza o token do passo 1 como bearer token
4. Mapeie os atributos do fornecedor para os campos padrão SCIM (userName, name.givenName, name.familyName, emails)
5. Ative o aprovisionamento automático

## Endpoints SCIM

O Chamilo implementa SCIM 2.0:

| Endpoint | Método | Ação |
|----------|--------|--------|
| `/scim/v2/Users` | GET | Listar utilizadores |
| `/scim/v2/Users` | POST | Criar um utilizador |
| `/scim/v2/Users/{id}` | GET | Obter um utilizador |
| `/scim/v2/Users/{id}` | PUT | Substituir um utilizador |
| `/scim/v2/Users/{id}` | PATCH | Atualizar um utilizador |
| `/scim/v2/Users/{id}` | DELETE | Remover um utilizador |

## Dicas

* **Comece com um grupo de teste** — aprovisione um conjunto reduzido de utilizadores antes de ativar o SCIM para toda a organização.
* **Combine com OAuth2** — uma configuração comum utiliza Azure AD OAuth2 para o início de sessão e Azure AD SCIM para o aprovisionamento.
* **Monitorize os registos** — verifique tanto os do Chamilo (`var/log/`) como os de aprovisionamento do seu fornecedor de identidade para detetar erros.