# BuyCourses: pagamentos e serviços recorrentes

O plugin **BuyCourses** vende acesso a cursos e sessões e pode oferecer serviços pagos. Os métodos de pagamento dependem dos gateways configurados para a instalação.

## Configuração de pagamento

Abra **Administração > Plugins > BuyCourses** e acesse a área de configuração de pagamento. Mantenha as credenciais do gateway no servidor, não em uma página voltada ao aluno. Métodos existentes, como Stripe e PayPal, continuam a operar de forma independente do BTCPay Server.

### BTCPay Server (compras de cursos e sessões)

O plugin também oferece suporte ao **BTCPay Server** para compras de cursos e sessões:

1. Ative o método de pagamento BTCPay na configuração do BuyCourses.
2. Defina a **Server URL**, o **Store ID**, a **Greenfield API key** e o **webhook secret** do BTCPay.
3. Use o **teste de conexão** da configuração de pagamento para confirmar o acesso à API Greenfield.
4. Configure o webhook no lado do BTCPay usando a URL de webhook exibida pelo plugin e o mesmo segredo.
5. Conclua uma pequena compra de teste antes de oferecer essa opção aos alunos.

O comprador é redirecionado para o checkout hospedado pelo BTCPay. O Chamilo verifica as assinaturas do webhook e recupera a fatura novamente para validar a **loja, o valor, a moeda e os detalhes do pedido** antes de marcar o pedido como pago e matricular o comprador. O retorno pelo navegador pode reconciliar um webhook perdido ou atrasado. Notificações repetidas não geram cumprimento duplicado.

Somente pagamentos liquidados verificados (incluindo pagamentos a maior aceitos e faturas liquidadas explicitamente marcadas pelo administrador) concedem acesso. **Pagamentos parciais, atrasados, expirados ou inválidos não devem ser tratados como automaticamente cumpridos**; pagamentos excepcionais exigem revisão manual.

**Instalações existentes:** execute o procedimento de atualização do plugin uma vez para criar `plugin_buycourses_btcpay_account`. Um administrador pode abrir `/plugin/BuyCourses/update.php` ou salvar a configuração de pagamento do BTCPay, o que também garante a existência da tabela do plugin. Essa atualização é específica do BuyCourses, não uma migração global do banco de dados.

O BTCPay **não** está documentado aqui como gateway de serviços recorrentes; não presuma que ele implemente renovações automáticas de assinatura no estilo Stripe/PayPal.

## Ciclo de vida do serviço recorrente

Os alunos podem usar **Meus serviços** para visualizar seus serviços recorrentes ativos e o histórico de compras/pagamentos. Para serviços com renovações automáticas compatíveis:

* Cada pagamento de renovação tem seu próprio registro histórico e recibo.
* Cancelar uma renovação impede cobranças futuras, mas mantém o serviço pago acessível até o término do período pago atual.
* Os administradores também podem cancelar renovações no **relatório de vendas de serviços**.
* Uma assinatura recorrente ativa, pendente ou de outra forma vigente é protegida contra compras duplicadas.
* Um serviço expirado ou totalmente cancelado pode ser comprado novamente.

O **histórico de compras** e o **histórico de pagamentos** são distintos: uma única compra de serviço pode ter vários pagamentos de renovação. Não infira que um pagamento renovado seja uma segunda compra.

## Totais de pagamento das vendas de serviços

No **relatório de vendas de serviços** do administrador, duas colunas ajudam a distinguir o valor original do pedido dos pagamentos arrecadados ao longo do tempo:

* **Último pagamento** exibe a data do pagamento bem-sucedido mais recente registrado para aquela venda de serviço. Se nenhuma data de pagamento estiver disponível, o relatório mostra um traço.
* **Total arrecadado** mostra o valor inicial arrecadado da compra mais os valores de renovação bem-sucedidos registrados, formatados na moeda do serviço. Não é o mesmo que o preço de um único período de cobrança.

O cálculo usa o histórico de auditoria da venda do serviço, evita contar eventos de renovação duplicados e considera a cobrança inicial da assinatura Stripe sem contá-la duas vezes. Em casos excepcionais de pagamento ou reembolso, reconcilie o relatório com o provedor de pagamento; o valor exibido não é um repasse do gateway nem um livro-razão separado de reembolsos.

## Assinaturas históricas do Stripe

O BuyCourses pode reconciliar o histórico de faturas do Stripe para serviços recorrentes mais antigos cujas transações de renovação não foram totalmente registradas no log de auditoria do plugin. A visualização **Meus serviços** e o relatório de vendas de serviços podem atualizar esses registros e atualizar o período pago e os totais conhecidos localmente. Os administradores devem verificar diferenças excepcionais no histórico de pagamentos junto ao Stripe, em vez de editar as vendas diretamente.

## Filtragem de relatórios de vendas

O **relatório de vendas de cursos e sessões** pode ser filtrado por status do pedido, usuário, intervalo de datas ou e-mail. Filtros opcionais de produto permitem restringir os resultados por tipo e nome do produto. O **relatório de vendas de serviços** oferece filtragem por status, além de busca por usuário/e-mail/nome/referência do pedido e busca por nome do serviço. Revise os filtros ativos antes de exportar ou reconciliar as vendas; as duas telas de relatório têm controles de filtro diferentes.

Consulte [Filtros de vendas do BuyCourses PR #9387](https://github.com/chamilo/chamilo-lms/pull/9387).

## Ciclo de vida de cursos vinculados a assinaturas e salvaguardas de exclusão

O BuyCourses pode encerrar, ocultar e reativar cursos associados a assinaturas recorrentes de serviços conforme o status de pagamento muda. No **Subscription behavior JSON** de um serviço, `hide_after_days` especifica o atraso após o encerramento antes de ocultar um curso (padrão de 30 dias), enquanto `delete_after_days` especifica o atraso após a ocultação antes da exclusão permanente. A exclusão fica desativada por padrão (`null`); somente um valor positivo torna um curso elegível.

Os administradores podem revisar cursos elegíveis, pendentes e bloqueados em `/admin/buycourses/course-lifecycle`. A interface oferece uma simulação não destrutiva e a exclusão direcionada de **um curso elegível por execução**, protegida por confirmação explícita. O processador de CLI `chamilo:buycourses:process-recurring-subscriptions` também oferece suporte a `--dry-run`, `--delete-expired` e `--max-deletions` (1–25). Sem `--delete-expired`, ele não exclui cursos permanentemente.

**A exclusão permanente é destrutiva.** Mantenha backups e teste primeiro com cursos descartáveis. As verificações de elegibilidade protegem vendas ativas, cursos vinculados a sessões e titularidade inconsistente; a exclusão automática é bloqueada em instalações com múltiplas URLs de acesso. Revise o comportamento concorrente de renovação/exclusão antes de agendar uma limpeza destrutiva em produção. Consulte [PR do ciclo de vida de cursos de assinatura #9442](https://github.com/chamilo/chamilo-lms/pull/9442).

## Verificações operacionais

Após a atualização, teste uma compra completa de curso, uma compra de sessão se estiver à venda, um webhook atrasado/reproduzido, faturas BTCPay expiradas e parciais, uma renovação automática e o cancelamento com acesso vigente até o fim do período pago. Mantenha credenciais e segredos de webhook fora de capturas de tela, logs e chamados de suporte.

## Reforço de pagamentos

### Verificação do valor do gateway (Redsys / Cecabank)

Quando o banco notifica a plataforma de que um pagamento foi bem-sucedido, o BuyCourses compara o valor cobrado pelo banco (em centavos, a partir da notificação assinada) com o preço da venda. Se forem diferentes, a notificação é recusada, a venda permanece pendente e uma linha `[BuyCourses] Redsys notification refused` ou `[BuyCourses] Cecabank notification refused` é gravada no log de erros do PHP. Pagamentos normais não são afetados.

Se uma venda permanecer pendente embora o comprador tenha pago, verifique o log: uma alteração de preço após a criação do pedido, ou um pagamento parcial, aparecerá ali. Conclua essa venda manualmente a partir do relatório de vendas, depois de verificada.

### Tokens de segurança

* Os formulários de cupom (adicionar / configurar), o formulário público de cartões de planos e as ações de pagamento usam o mesmo token de administração do BuyCourses de todas as outras páginas de administração do plugin. Um formulário deixado aberto por muito tempo continua funcionando enquanto a sessão estiver ativa; após sair e entrar novamente, recarregue a página antes de salvar (caso contrário, é exibida a mensagem "Not validated").
* A página "solicitar fatura" (`request_invoice.php`) e o acionamento web de `process_recurring_subscriptions.php` exigem o token no link (`buycourses_admin_sec_token=...`). Links marcados ou enviados por e-mail sem ele exibem "Not validated". A execução por linha de comando/cron (`php .../process_recurring_subscriptions.php` ou o comando de console) permanece inalterada e não exige token.
* As páginas de sucesso (PayPal, Stripe, assinaturas, serviços) só exibem uma venda ao usuário que a comprou.
* As ações de pagamento (pagamento em massa do PayPal, cancelamento de um pagamento) são restritas a administradores da plataforma (administradores de sessão não são mais aceitos) e devem ser enviadas como POST com o token.

### Datas

A data de término de uma venda de assinatura agora é sempre calculada em UTC, como a data da venda, independentemente do fuso horário do servidor.

### Limites de múltiplas URLs

Os limites de criação de cursos e de hospedagem aplicados quando um serviço expira seguem a mesma regra do restante da plataforma: uma configuração bloqueada, ou marcada como não alterável, na URL principal não pode ser substituída por outra URL.

Alterações: [BTCPay #9286](https://github.com/chamilo/chamilo-lms/pull/9286), [serviços recorrentes #9288](https://github.com/chamilo/chamilo-lms/pull/9288), [reconciliação Stripe #9293](https://github.com/chamilo/chamilo-lms/pull/9293), [totais de vendas de serviços #9220](https://github.com/chamilo/chamilo-lms/pull/9220).