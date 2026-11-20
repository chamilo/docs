# Criação de usuários

`POST /api/access_urls/{id}/user` cria um usuário da plataforma e o adiciona à URL de acesso `{id}`. É a substituição no Chamilo 3 da ação `save_user_json` do webservice `webservices/api/v2.php` da versão 1.11.x, e destina-se a integrações que criam contas de estudantes (lojas, sistemas de RH, portais de matrícula).

## Acesso

| Chamador | Permitido |
|--------|---------|
| `ROLE_ADMIN` | Sim |
| `ROLE_SESSION_MANAGER` | Sim |
| Qualquer outro | `403 Forbidden` |

Autentique-se com um JWT ou uma chave de API externa, conforme descrito em [Autenticação](authentication.md).

## Requisição

```http
POST /api/access_urls/1/user
Authorization: Bearer <token>
Content-Type: application/json
```

```json
{
  "username": "jdoe-20261022",
  "email": "jane.doe@example.com",
  "firstname": "Jane",
  "lastname": "Doe",
  "password": "S3cret!pass",
  "sendEmail": true,
  "extraFields": { "my_user_field": "value" }
}
```

| Campo | Obrigatório | Descrição |
|-------|----------|-------------|
| `username` | Sim | Login do novo usuário. Não pode já estar em uso por outra conta (comparação sem distinção entre maiúsculas e minúsculas). |
| `email` | Sim | Um endereço de e-mail válido. Várias contas podem compartilhar o mesmo endereço, a menos que `checkEmailDuplicates` seja `true`. |
| `firstname`, `lastname` | Não | Nome e sobrenome. |
| `password` | Não | Senha inicial. Quando estiver vazia e `sendEmail` for `true`, o e-mail contém um link para definir uma senha. |
| `locale` | Não | Idioma da interface, por exemplo `fr_FR`. O padrão é o idioma da plataforma. |
| `timezone` | Não | O padrão é o fuso horário da plataforma. |
| `status` | Não | `5` (estudante) por padrão; `1` para um professor. |
| `sendEmail` | Não | `true` por padrão. Envia ao usuário uma mensagem e um e-mail com os dados de acesso. |
| `checkEmailDuplicates` | Não | `false` por padrão. Quando `true`, a requisição é recusada com `409 email_already_exists` se alguma conta já utilizar este endereço de e-mail (comparação sem distinção entre maiúsculas e minúsculas). Mesmo comportamento do parâmetro `check_email_duplicates` de `save_user_json`. |
| `extraFields` | Não | Valores de campos extras do usuário indexados pela variável do campo. Cada variável deve corresponder a um campo extra de usuário existente. |

### Endereços de e-mail compartilhados

O Chamilo não exige que os endereços de e-mail sejam únicos: o formulário de criação de usuários do administrador aceita um endereço já utilizado por outra conta, a importação de usuários só o recusa quando a opção **Verificar e-mail único** está marcada, e não há uma configuração da plataforma para alterar isso. Um caso comum é um estudante rematriculado com um novo identificador que mantém o mesmo endereço. Envie `checkEmailDuplicates: true` somente quando a sua integração quiser tratar um endereço existente como um erro.

Quando a configuração **O login é o e-mail** está habilitada, o nome de usuário é o endereço de e-mail, de modo que a verificação do nome de usuário já rejeita duplicatas.

## Resposta

`201 Created` com o novo usuário (grupo de serialização `user:read`), incluindo o seu `id`.

## Erros

| Status | Corpo | Quando |
|--------|------|------|
| `401` | | Credenciais ausentes ou inválidas |
| `403` | | O chamador não é administrador nem administrador de sessão |
| `409` | `{"error": "username_already_exists"}` | O nome de usuário já está em uso |
| `409` | `{"error": "email_already_exists"}` | `checkEmailDuplicates` é `true` e o endereço de e-mail já está em uso |
| `422` | | `username` ou `email` ausente, ou endereço de e-mail inválido |

## Implementação

* Operação: o recurso `AccessUrlUser` declarado em `src/CoreBundle/Entity/User.php`
* Entrada: `src/CoreBundle/Dto/CreateUserOnAccessUrlInput.php`
* Controlador: `src/CoreBundle/Controller/Api/CreateUserOnAccessUrlAction.php`
* A página **Registrar estudante** do administrador de sessão (`/admin-dashboard/register/{courseId}`) utiliza este endpoint com `checkEmailDuplicates: true`, de modo que alerta quando o endereço já está em uso.