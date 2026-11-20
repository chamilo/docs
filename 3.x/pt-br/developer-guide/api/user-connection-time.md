# Tempo de conexão do usuário

`GET /api/users/{id}/connection-time` retorna o tempo total que um usuário permaneceu conectado à plataforma. Substitui a ação `get_user_total_connexion_time` do webservice `webservices/api/v2.php` da versão 1.11.x e pode ser restrito a um período.

## Acesso

| Chamador | Permitido |
|--------|---------|
| `ROLE_ADMIN` | Qualquer usuário da URL de acesso atual |
| Qualquer usuário autenticado | Apenas o próprio tempo de conexão |
| Qualquer outra pessoa | `403 Forbidden` |

O endpoint recebe o id numérico do usuário. Para partir de um nome de usuário, consulte primeiro o usuário com `GET /api/users?username=...`.

## Requisição

```http
GET /api/users/42/connection-time?startDate=2026-10-01T00:00:00%2B02:00&endDate=2026-12-15T23:59:59%2B01:00
Authorization: Bearer <token>
```

| Parâmetro de consulta | Obrigatório | Descrição |
|-----------------|----------|-------------|
| `startDate` | Não | Data e hora no formato ISO 8601. Somente conexões que **começaram** nesse momento ou depois são contabilizadas. |
| `endDate` | Não | Data e hora no formato ISO 8601, não anterior a `startDate`. Somente conexões que **terminaram** nesse momento ou antes são contabilizadas. |

Sem nenhum dos parâmetros, todas as conexões são contabilizadas. Com apenas `startDate`, as conexões são contabilizadas a partir dessa data, sem limite final. Com apenas `endDate`, as conexões são contabilizadas até essa data, sem limite inicial.

Uma conexão que ultrapassa um limite (por exemplo, uma que começou antes de `startDate`) não é contabilizada de forma alguma: os tempos de conexão nunca são divididos. Esta é a mesma regra do filtro de período personalizado dos relatórios da versão 1.11.x.

Inclua o deslocamento de fuso horário. Em uma URL, `+` deve ser codificado como `%2B`. Um valor sem deslocamento é interpretado no fuso horário do servidor.

## Resposta

```json
{
  "id": 42,
  "username": "jdupont",
  "totalConnectionTime": 5025,
  "totalConnectionTimeFormatted": "01:23:45"
}
```

| Campo | Descrição |
|-------|-------------|
| `totalConnectionTime` | Total em segundos |
| `totalConnectionTimeFormatted` | O mesmo total no formato `HH:MM:SS`, o formato retornado pelo webservice da versão 1.11.x. As horas podem ultrapassar 24. |

## Erros

| Status | Quando |
|--------|------|
| `400` | Uma data que não pode ser interpretada, ou `endDate` anterior a `startDate` |
| `401` | Credenciais ausentes ou inválidas |
| `403` | O chamador não é administrador nem o usuário em questão |
| `404` | O usuário não existe ou não pertence à URL de acesso atual |

## Como o tempo é calculado

O total é a soma de `logout_date − login_date` sobre as linhas do usuário na tabela `track_e_login`.

Uma conexão começa no login e é estendida enquanto o usuário está ativo: a página que o usuário tem aberta envia um sinal de presença a cada minuto enquanto a aba está visível, como toda visualização de página fazia no Chamilo 1.11.x. Após uma inatividade maior que o tempo de vida da sessão, a próxima atividade abre uma nova conexão, de modo que o intervalo ocioso não é contabilizado. Encerrar a sessão fecha a conexão atual. O tempo gasto por um administrador usando **Entrar como** não é adicionado ao usuário.

> **Nota:** Conexões registradas antes da restauração deste rastreamento podem não ter data de logout. Elas contam como zero, portanto os totais de períodos anteriores à atualização podem ser inferiores ao tempo efetivamente gasto.