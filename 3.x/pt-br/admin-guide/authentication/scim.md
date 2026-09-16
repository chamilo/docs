# SCIM

**SCIM** (System for Cross-domain Identity Management) automatiza o provisionamento de usuários — criando, atualizando e desativando contas do Chamilo com base em alterações no seu provedor de identidade. Diferentemente do OAuth2 ou do LDAP, o SCIM trata do provisionamento, não do login.

| Cenário | Ação SCIM |
|----------|-------------|
| Um novo funcionário ingressa | Cria uma conta no Chamilo |
| O nome ou a função de um funcionário muda | Atualiza a conta no Chamilo |
| Um funcionário sai | Desativa ou exclui a conta no Chamilo |

## Configuration

### 1. Set the SCIM token

No arquivo `.env` (ou `.env.local`), defina um token aleatório seguro:

```
SCIM_TOKEN=your-secure-random-token
```

Esse token é usado pelo seu provedor de identidade para autenticar as solicitações aos endpoints SCIM do Chamilo.

### 2. Enable SCIM in authentication.yaml

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

Limpe e aqueça o cache após a edição:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. Configure your identity provider

No seu provedor de identidade (Azure AD, Okta etc.):

1. Adicione o Chamilo como um aplicativo SCIM
2. Defina a URL base do SCIM como `https://your-chamilo-url/scim/v2/`
3. Informe o token da etapa 1 como bearer token
4. Mapeie os atributos do provedor para os campos padrão do SCIM (userName, name.givenName, name.familyName, emails)
5. Ative o provisionamento automático

## SCIM endpoints

O Chamilo implementa o SCIM 2.0:

| Endpoint | Method | Action |
|----------|--------|--------|
| `/scim/v2/Users` | GET | Listar usuários |
| `/scim/v2/Users` | POST | Criar um usuário |
| `/scim/v2/Users/{id}` | GET | Obter um usuário |
| `/scim/v2/Users/{id}` | PUT | Substituir um usuário |
| `/scim/v2/Users/{id}` | PATCH | Atualizar um usuário |
| `/scim/v2/Users/{id}` | DELETE | Remover um usuário |

## Tips

* **Comece com um grupo de teste** — provisione um conjunto pequeno de usuários antes de ativar o SCIM para toda a organização.
* **Combine com OAuth2** — uma configuração comum usa Azure AD OAuth2 para login e Azure AD SCIM para provisionamento.
* **Monitore os logs** — verifique tanto os logs do Chamilo (`var/log/`) quanto os logs de provisionamento do seu provedor de identidade em busca de erros.