# Tempo de conexão do usuário

`GET /api/users/{id}/connection-time` retorna o tempo total que um usuário permaneceu conectado à plataforma. Substitui a ação `get_user_total_connexion_time` do webservice `webservices/api/v2.php` da versão 1.11.x e pode ser restringido a um período.

## Acesso

| Chamador | Permitido |
|--------|---------|
| `ROLE_ADMIN` | Qualquer usuário do URL de acesso atual |
| Qualquer usuário autenticado | Apenas o próprio tempo de conexão |
| Qualquer outra pessoa | `403 Forbidden` |

O endpoint recebe o identificador numérico do usuário. Para partir de um nome de usuário, consulte primeiro o usuário com `GET /api/users?username=...`.

## Requisição

```http
GET /api/users/42/connection-time?startDate=2026-10-01T00:00:00%2B02:00&endDate=2026-12-15T23:59:59%2B01:00
Authorization: Bearer <token>
```

| Parâmetro de consulta | Obrigatório | Descrição |
|-----------------|----------|-------------|
| `startDate` | Não | Data e hora ISO 8601. Apenas as conexões que **começaram** neste momento ou depois são contabilizadas. |
| `endDate` | Não | Data e hora ISO 8601, não anterior a `startDate`. Apenas as conexões que **terminaram** neste momento ou antes são contabilizadas. |

Sem nenhum dos parâmetros, todas as conexões são contabilizadas. Apenas com `startDate`, as conexões são contabilizadas a partir dessa data, sem limite final. Apenas com `endDate`, as conexões são contabilizadas até essa data, sem limite inicial.

Uma conexão que ultrapassa um limite (por exemplo, uma que começou antes de `startDate`) não é contabilizada de forma alguma: os tempos de conexão nunca são divididos. Esta é a mesma regra do filtro de período personalizado dos relatórios da versão 1.11.x.

Inclua o deslocamento do fuso horário. Num URL, `+` deve ser codificado como `%2B`. Um valor sem deslocamento é lido no fuso horário do servidor.

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
| `totalConnectionTimeFormatted` | O mesmo total no formato `HH:MM:SS`, o formato retornado pelo webservice da versão 1.11.x. As horas podem exceder 24. |

## Erros

| Estado | Quando |
|--------|------|
| `400` | Uma data que não pode ser analisada, ou `endDate` anterior a `startDate` |
| `401` | Credenciais ausentes ou inválidas |
| `403` | O chamador não é nem administrador nem o usuário em questão |
| `404` | O usuário não existe ou não pertence ao URL de acesso atual |

## Como o tempo é calculado

O total é a soma de `logout_date − login_date` sobre as linhas do usuário na tabela `track_e_login`.

Uma conexão começa no login e é prolongada enquanto o usuário está ativo: a página que o usuário tem aberta envia um sinal de presença a cada minuto enquanto a aba está visível, tal como cada visualização de página fazia no Chamilo 1.11.x. Após uma inatividade superior ao tempo de vida da sessão, a atividade seguinte abre uma nova conexão, de modo que o intervalo de inatividade não é contabilizado. Terminar a sessão fecha a conexão atual. O tempo gasto por um administrador ao usar **Login as** não é adicionado ao usuário.

> **Nota:** As conexões registradas antes de este rastreamento ser restaurado podem não ter data de logout. Contam como zero, de modo que os totais de períodos anteriores à atualização podem ser inferiores ao tempo realmente gasto.