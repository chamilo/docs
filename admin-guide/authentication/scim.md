# SCIM

**SCIM** (Sistema para Gerenciamento de Identidade entre Domínios) automatiza o provisionamento de usuários — criando, atualizando e desativando contas no Chamilo com base em alterações no seu provedor de identidade. Diferentemente do OAuth2 ou LDAP, o SCIM gerencia o provisionamento, não o login.

| Cenário | Ação do SCIM |
|----------|--------------|
| Um novo funcionário ingressa | Cria uma conta no Chamilo |
| O nome ou cargo de um funcionário muda | Atualiza a conta no Chamilo |
| Um funcionário sai | Desativa ou exclui a conta no Chamilo |

## Configuração

### 1. Definir o token SCIM

No seu arquivo `.env` (ou `.env.local`), defina um token aleatório seguro:

```
SCIM_TOKEN=your-secure-random-token
```

Esse token é usado pelo seu provedor de identidade para autenticar suas solicitações aos endpoints SCIM do Chamilo.

### 2. Habilitar o SCIM em authentication.yaml

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

### 3. Configurar seu provedor de identidade

No seu provedor de identidade (Azure AD, Okta, etc.):

1. Adicione o Chamilo como uma aplicação SCIM
2. Defina a URL base do SCIM como `https://your-chamilo-url/scim/v2/`
3. Insira o token do passo 1 como o token de portador (bearer token)
4. Mapeie os atributos do provedor para os campos padrão do SCIM (userName, name.givenName, name.familyName, emails)
5. Habilite o provisionamento automático

## Endpoints SCIM

O Chamilo implementa o SCIM 2.0:

| Endpoint | Método | Ação |
|----------|--------|------|
| `/scim/v2/Users` | GET | Listar usuários |
| `/scim/v2/Users` | POST | Criar um usuário |
| `/scim/v2/Users/{id}` | GET | Obter um usuário |
| `/scim/v2/Users/{id}` | PUT | Substituir um usuário |
| `/scim/v2/Users/{id}` | PATCH | Atualizar um usuário |
| `/scim/v2/Users/{id}` | DELETE | Remover um usuário |

## Dicas

* **Comece com um grupo de teste** — provisione um pequeno conjunto de usuários antes de habilitar o SCIM para toda a organização.
* **Combine com OAuth2** — uma configuração comum utiliza o Azure AD OAuth2 para login e o Azure AD SCIM para provisionamento.
* **Monitore os logs** — verifique tanto os logs do Chamilo (`var/log/`) quanto os logs de provisionamento do seu provedor de identidade para identificar erros.