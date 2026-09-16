# Simple IDS

O Chamilo inclui um sistema de deteção de intrusões (IDS) leve, integrado na aplicação. Em cada pedido, analisa os parâmetros da query do URL, o caminho do pedido e alguns cabeçalhos (`User-Agent`, `Referer`) em busca de assinaturas de ataque comuns — por exemplo payloads XSS ou padrões de path-traversal — e regista tudo o que for suspeito. A página Simple IDS permite rever o que foi assinalado.

Os **corpos** dos pedidos não são analisados de propósito, para evitar falsos positivos provenientes de conteúdo de editores de texto rico (o texto dos cursos contém legitimamente marcação semelhante a HTML/JavaScript).

## Aceder ao Simple IDS

No painel de administração, clique em **Segurança > Simple IDS**.

## O que mostra

![A página Simple IDS a mostrar gráficos de eventos por dia, eventos por tipo e IPs atacantes principais, seguida de uma tabela de eventos IDS assinalados com data, IP, tipo de deteção, parâmetro, URI e detalhe](/.gitbook/assets/admin-security-simple-ids.png)

* **Eventos por dia (últimos 7 dias)**, **Eventos por tipo (últimos 30 dias)** e **IPs atacantes principais (últimos 30 dias)** — Gráficos de resumo
* **Tabela de eventos IDS assinalados** — Cada entrada mostra a data, o IP de origem, o tipo de deteção (por exemplo `XSS`), o parâmetro afetado, o URI do pedido e uma breve descrição do que foi detetado

Utilize os filtros de **IP**, tipo de evento e intervalo de datas acima dos gráficos para restringir os resultados.

## Como funciona

* Cada pedido é analisado à entrada; as correspondências são acrescentadas a `var/logs/ids/ids_events.log`
* À saída, o mesmo subscriber adiciona cabeçalhos de segurança recomendados pela OWASP à resposta
* Se o bloqueio estiver ativado, um pedido que corresponda a uma assinatura é interrompido imediatamente com uma resposta HTTP 400, em vez de chegar ao código da aplicação

## Configuração

O Simple IDS é controlado por variáveis de ambiente, definidas em `config/packages/chamilo_ids.yaml`:

| Variável | Finalidade |
|----------|---------|
| `IDS_ENABLED` | Ativa ou desativa a análise e o registo de pedidos |
| `IDS_BLOCK` | Quando ativado, um pedido detetado é rejeitado (HTTP 400) em vez de ser apenas registado |
| `IDS_SECURITY_HEADERS` | Controla se os cabeçalhos de resposta recomendados pela OWASP são adicionados |

Este é um detetor leve, de melhor esforço, destinado a captar tentativas óbvias de varrimento e exploração — não substitui um web application firewall (WAF) dedicado em instalações de elevado risco.