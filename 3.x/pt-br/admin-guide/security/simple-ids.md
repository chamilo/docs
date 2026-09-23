# Simple IDS

O Chamilo inclui um sistema de detecção de intrusão (IDS) leve, integrado à aplicação. Em cada requisição, ele analisa os parâmetros de consulta da URL, o caminho da requisição e alguns cabeçalhos (`User-Agent`, `Referer`) em busca de assinaturas comuns de ataque — por exemplo, payloads XSS ou padrões de path-traversal — e registra qualquer coisa suspeita. A página Simple IDS permite revisar o que foi sinalizado.

Os **corpos** das requisições intencionalmente não são analisados, para evitar falsos positivos provenientes do conteúdo de editores de texto rico (o texto dos cursos contém legitimamente marcação semelhante a HTML/JavaScript).

## Acessando o Simple IDS

No painel de administração, clique em **Segurança > Simple IDS**.

## O que é exibido

![A página Simple IDS mostrando gráficos de eventos por dia, eventos por tipo e principais IPs atacantes, seguida de uma tabela de eventos IDS sinalizados com data, IP, tipo de detecção, parâmetro, URI e detalhe](../../.gitbook/assets/admin-security-simple-ids.png)

* **Eventos por dia (últimos 7 dias)**, **Eventos por tipo (últimos 30 dias)** e **Principais IPs atacantes (últimos 30 dias)** — Gráficos resumidos
* **Tabela de eventos IDS sinalizados** — Cada entrada mostra a data, o IP de origem, o tipo de detecção (por exemplo `XSS`), o parâmetro afetado, o URI da requisição e uma breve descrição do que foi detectado

Use os filtros de **IP**, tipo de evento e intervalo de datas acima dos gráficos para restringir os resultados.

## Como funciona

* Toda requisição é analisada na entrada; as correspondências são anexadas a `var/logs/ids/ids_events.log`
* Na saída, o mesmo subscriber adiciona cabeçalhos de segurança recomendados pela OWASP à resposta
* Se o bloqueio estiver habilitado, uma requisição que corresponda a uma assinatura é interrompida imediatamente com uma resposta HTTP 400, em vez de chegar ao código da aplicação

## Configuração

O Simple IDS é controlado por variáveis de ambiente, definidas em `config/packages/chamilo_ids.yaml`:

| Variável | Finalidade |
|----------|---------|
| `IDS_ENABLED` | Ativa ou desativa a análise e o registro das requisições |
| `IDS_BLOCK` | Quando habilitado, uma requisição detectada é rejeitada (HTTP 400) em vez de apenas registrada |
| `IDS_SECURITY_HEADERS` | Controla se os cabeçalhos de resposta recomendados pela OWASP são adicionados |

Este é um detector leve, de melhor esforço, destinado a capturar tentativas óbvias de varredura e exploração — ele não substitui um firewall de aplicação web (WAF) dedicado em implantações de alto risco.