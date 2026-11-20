# Tentativas de Login

O relatório Tentativas de Login mostra um registro das tentativas de login malsucedidas, com gráficos para ajudar a identificar padrões de força bruta ou *credential stuffing*.

## Acessando as Tentativas de Login

No painel de administração, clique em **Segurança > Tentativas de login**.

## O que ele mostra

![A página Tentativas de login mostrando gráficos de tentativas por dia, IPs principais, tentativas malsucedidas por mês, logins bem-sucedidos versus malsucedidos, tentativas por hora e IPs únicos por dia, seguida de uma tabela de tentativas de login malsucedidas](/.gitbook/assets/admin-security-login-attempts.png)

* **Tentativas por dia (últimos 7 dias)** — Contagem diária de tentativas malsucedidas
* **IPs principais (últimos 30 dias)** — Quais endereços IP geraram o maior número de tentativas
* **Tentativas malsucedidas por mês (últimos 12 meses)** — Tendência de mais longo prazo
* **Bem-sucedidos versus malsucedidos (últimos 30 dias)** — Detalhamento diário de logins bem-sucedidos versus malsucedidos
* **Tentativas por hora (últimos 7 dias)** — Distribuição por horário do dia, útil para identificar tentativas automatizadas/por script
* **IPs únicos por dia (últimos 30 dias)** — Quantos IPs distintos tentaram login a cada dia
* **Tabela de tentativas de login malsucedidas** — Cada tentativa malsucedida, com data, endereço IP e nome de usuário tentado

Use os campos **Nome de usuário**, **IP** e intervalo de datas acima dos gráficos para filtrar o relatório.

## Configurações relacionadas

Este relatório é uma ferramenta de monitoramento; as proteções reais contra força bruta são configuradas em [Configurações de Segurança](../platform-settings/security-settings.md):

* **Máximo de tentativas de login antes do bloqueio** (`login_max_attempt_before_blocking_account`) — Bloqueia uma conta após demasiadas tentativas malsucedidas
* **CAPTCHA** (`allow_captcha`) e **Tolerância de erros de CAPTCHA** (`captcha_number_mistakes_to_block_account`) — Desacelera tentativas automatizadas e bloqueia contas que continuam falhando no CAPTCHA

Consulte também o [Guia de Segurança](../appendix/security-guide.md) para proteção contra força bruta no nível do servidor (fail2ban).