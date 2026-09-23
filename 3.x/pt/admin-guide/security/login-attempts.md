# Tentativas de Início de Sessão

O relatório Tentativas de Início de Sessão apresenta um registo das tentativas de início de sessão falhadas, com gráficos que ajudam a identificar padrões de força bruta ou de credential-stuffing.

## Aceder às Tentativas de Início de Sessão

No painel de administração, clique em **Segurança > Tentativas de início de sessão**.

## O Que Mostra

![A página Tentativas de início de sessão, com gráficos de tentativas por dia, IPs principais, tentativas falhadas por mês, inícios de sessão bem-sucedidos vs. falhados, tentativas por hora e IPs únicos por dia, seguida de uma tabela de tentativas de início de sessão falhadas](../../.gitbook/assets/admin-security-login-attempts.png)

* **Tentativas por dia (últimos 7 dias)** — Contagem diária de tentativas falhadas
* **IPs principais (últimos 30 dias)** — Quais endereços IP geraram mais tentativas
* **Tentativas falhadas por mês (últimos 12 meses)** — Tendência a mais longo prazo
* **Bem-sucedidos vs. falhados (últimos 30 dias)** — Distribuição diária de inícios de sessão bem-sucedidos versus falhados
* **Tentativas por hora (últimos 7 dias)** — Distribuição por hora do dia, útil para identificar tentativas automatizadas/por script
* **IPs únicos por dia (últimos 30 dias)** — Quantos IPs distintos tentaram iniciar sessão em cada dia
* **Tabela de tentativas de início de sessão falhadas** — Cada tentativa falhada, com data, endereço IP e nome de utilizador tentado

Utilize os campos **Nome de utilizador**, **IP** e intervalo de datas acima dos gráficos para filtrar o relatório.

## Definições Relacionadas

Este relatório é uma ferramenta de monitorização; as proteções efetivas contra força bruta são configuradas em [Definições de Segurança](../platform-settings/security-settings.md):

* **Máximo de tentativas de início de sessão antes do bloqueio** (`login_max_attempt_before_blocking_account`) — Bloqueia uma conta após demasiadas tentativas falhadas
* **CAPTCHA** (`allow_captcha`) e **Margem de erros de CAPTCHA** (`captcha_number_mistakes_to_block_account`) — Abrandam tentativas automatizadas e bloqueiam contas que continuam a falhar o CAPTCHA

Consulte também o [Guia de Segurança](../appendix/security-guide.md) para proteção contra força bruta ao nível do servidor (fail2ban).