# Criação de utilizadores

`POST /api/access_urls/{id}/user` cria um utilizador da plataforma e adiciona-o ao URL de acesso `{id}`. É a substituição no Chamilo 3 da ação `save_user_json` do serviço web `webservices/api/v2.php` da versão 1.11.x, e destina-se a integrações que criam contas de alunos (lojas, sistemas de RH, portais de inscrição).

## Acesso

| Chamador | Permitido |
|--------|---------|
| `ROLE_ADMIN` | Sim |
| `ROLE_SESSION_MANAGER` | Sim |
| Qualquer outro | `403 Forbidden` |

Autentique-se com um JWT ou uma chave de API externa, conforme descrito em [Autenticação](authentication.md).

## Pedido

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
| `username` | Sim | Nome de utilizador do novo utilizador. Não pode já estar a ser utilizado por outra conta (comparação sem distinção de maiúsculas e minúsculas). |
| `email` | Sim | Um endereço de e-mail válido. Várias contas podem partilhar o mesmo endereço, a menos que `checkEmailDuplicates` seja `true`. |
| `firstname`, `lastname` | Não | Nome próprio e apelido. |
| `password` | Não | Palavra-passe inicial. Quando está vazia e `sendEmail` é `true`, o e-mail contém uma ligação para definir uma palavra-passe, em vez da palavra-passe. |
| `locale` | Não | Idioma da interface, p. ex. `fr_FR`. Por omissão, o idioma da plataforma. |
| `timezone` | Não | Por omissão, o fuso horário da plataforma. |
| `status` | Não | `5` (aluno) por omissão; `1` para um professor. |
| `sendEmail` | Não | `true` por omissão. Envia ao utilizador uma mensagem e um e-mail com os respetivos dados de acesso. |
| `checkEmailDuplicates` | Não | `false` por omissão. Quando é `true`, o pedido é recusado com `409 email_already_exists` se alguma conta já utilizar este endereço de e-mail (comparação sem distinção de maiúsculas e minúsculas). O mesmo comportamento do parâmetro `check_email_duplicates` de `save_user_json`. |
| `extraFields` | Não | Valores de campos extra do utilizador, indexados pela variável do campo. Cada variável tem de corresponder a um campo extra de utilizador existente. |

### Endereços de e-mail partilhados

O Chamilo não exige que os endereços de e-mail sejam únicos: o formulário de criação de utilizadores do administrador aceita um endereço que outra conta já utiliza, a importação de utilizadores só o recusa quando a opção **Verificar e-mail único** está assinalada, e não existe uma definição da plataforma para alterar este comportamento. Um caso comum é um aluno reinscrito com um novo identificador que mantém o mesmo endereço. Envie `checkEmailDuplicates: true` apenas quando a sua integração pretender tratar um endereço existente como um erro.

Quando a definição **O início de sessão é o e-mail** está ativada, o nome de utilizador é o endereço de e-mail, pelo que a verificação do nome de utilizador já rejeita duplicados.

## Resposta

`201 Created` com o novo utilizador (grupo de serialização `user:read`), incluindo o respetivo `id`.

## Erros

| Estado | Corpo | Quando |
|--------|------|------|
| `401` | | Credenciais ausentes ou inválidas |
| `403` | | O chamador não é administrador nem administrador de sessão |
| `409` | `{"error": "username_already_exists"}` | O nome de utilizador já está a ser utilizado |
| `409` | `{"error": "email_already_exists"}` | `checkEmailDuplicates` é `true` e o endereço de e-mail já está a ser utilizado |
| `422` | | `username` ou `email` em falta, ou endereço de e-mail inválido |

## Implementação

* Operação: o recurso `AccessUrlUser` declarado em `src/CoreBundle/Entity/User.php`
* Entrada: `src/CoreBundle/Dto/CreateUserOnAccessUrlInput.php`
* Controlador: `src/CoreBundle/Controller/Api/CreateUserOnAccessUrlAction.php`
* A página **Registar aluno** do administrador de sessão (`/admin-dashboard/register/{courseId}`) utiliza este endpoint com `checkEmailDuplicates: true`, pelo que avisa quando o endereço já está em uso.