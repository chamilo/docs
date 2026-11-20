# BuyCourses: Pagamentos e serviços recorrentes

O plugin **BuyCourses** vende acesso a cursos e sessões e pode oferecer serviços pagos. Os métodos de pagamento dependem dos gateways que tiverem sido configurados para a instalação.

## Configuração de pagamentos

Abra **Administração > Plugins > BuyCourses** e aceda à respetiva área de configuração de pagamentos. Mantenha as credenciais dos gateways no servidor, e não numa página visível para os alunos. Os métodos existentes, como Stripe e PayPal, continuam a funcionar de forma independente do BTCPay Server.

### BTCPay Server (compras de cursos e sessões)

O plugin também suporta o **BTCPay Server** para compras de cursos e sessões:

1. Ative o método de pagamento BTCPay na configuração do BuyCourses.
2. Defina o **URL do servidor**, o **ID da loja**, a **chave da API Greenfield** e o **segredo do webhook** do BTCPay.
3. Utilize o **teste de ligação** da configuração de pagamentos para confirmar o acesso à API Greenfield.
4. Configure o webhook no lado do BTCPay utilizando o URL do webhook apresentado pelo plugin e o mesmo segredo.
5. Conclua uma pequena compra de teste antes de disponibilizar esta opção aos alunos.

O comprador é redirecionado para o checkout alojado no BTCPay. O Chamilo verifica as assinaturas dos webhooks e obtém novamente a fatura para validar a **loja, o montante, a moeda e os detalhes da encomenda** antes de marcar a encomenda como paga e inscrever o comprador. Um regresso pelo navegador pode reconciliar um webhook em falta ou atrasado. Notificações repetidas não criam um cumprimento duplicado.

Apenas pagamentos liquidados verificados (incluindo pagamentos em excesso aceites e faturas liquidadas explicitamente marcadas pelo administrador) concedem acesso. **Pagamentos parciais, tardios, expirados ou inválidos não devem ser tratados como automaticamente cumpridos**; pagamentos excecionais exigem revisão manual.

**Instalações existentes:** Execute uma vez o procedimento de atualização do plugin para criar `plugin_buycourses_btcpay_account`. Um administrador pode abrir `/plugin/BuyCourses/update.php` ou guardar a configuração de pagamento BTCPay, o que também garante que a tabela do plugin existe. Esta atualização é específica do BuyCourses e não uma migração global da base de dados.

O BTCPay **não** está documentado aqui como gateway de serviços recorrentes; não assuma que implementa renovações automáticas de subscrição no estilo Stripe/PayPal.

## Ciclo de vida dos serviços recorrentes

Os alunos podem utilizar **Os meus serviços** para ver os seus serviços recorrentes ativos e o respetivo histórico de compras/pagamentos. Para serviços com renovações automáticas suportadas:

* Cada pagamento de renovação tem o seu próprio registo histórico e recibo.
* Cancelar uma renovação impede cobranças futuras, mas mantém o serviço pago acessível até expirar o período pago atual.
* Os administradores também podem cancelar renovações a partir do **relatório de vendas de serviços**.
* Uma subscrição recorrente ativa, pendente ou de outro modo em vigor está protegida contra compras duplicadas.
* Um serviço expirado ou totalmente cancelado pode ser comprado novamente.

O **histórico de compras** e o **histórico de pagamentos** são distintos: uma única compra de serviço pode ter vários pagamentos de renovação. Não infira que um pagamento renovado é uma segunda compra.

## Totais de pagamento das vendas de serviços

No **relatório de vendas de serviços** do administrador, duas colunas ajudam a distinguir o montante original da encomenda dos pagamentos cobrados ao longo do tempo:

* **Último pagamento** apresenta a data do pagamento bem-sucedido mais recente registado para essa venda de serviço. Se não estiver disponível nenhuma data de pagamento, o relatório mostra um travessão.
* **Total cobrado** mostra o montante inicial cobrado da compra mais os montantes de renovação bem-sucedidos registados, formatados na moeda do serviço. Não é o mesmo que o preço de um único período de faturação.

O cálculo utiliza o histórico de auditoria da venda do serviço, evita contar eventos de renovação duplicados e contabiliza a cobrança inicial da subscrição Stripe sem a contar duas vezes. Em casos excecionais de pagamento ou reembolso, reconcilie o relatório com o fornecedor de pagamentos; o montante apresentado não é um pagamento do gateway nem um livro-razão de reembolsos separado.

## Subscrições Stripe históricas

O BuyCourses pode reconciliar o histórico de faturas Stripe de serviços recorrentes mais antigos cujas transações de renovação não foram totalmente registadas no registo de auditoria do plugin. A vista **Os meus serviços** e o relatório de vendas de serviços podem atualizar esses registos e atualizar o período pago e os totais conhecidos localmente. Os administradores devem verificar diferenças excecionais do histórico de pagamentos junto do Stripe, em vez de editar as vendas diretamente.

## Filtragem de relatórios de vendas

O **relatório de vendas de cursos e sessões** pode ser filtrado por estado da encomenda, utilizador, intervalo de datas ou correio eletrónico. Filtros opcionais de produto permitem restringir os resultados por tipo de produto e nome do produto. O **relatório de vendas de serviços** suporta filtragem por estado, bem como pesquisa por utilizador/correio eletrónico/nome/referência da encomenda e uma pesquisa por nome do serviço. Reveja os filtros ativos antes de exportar ou reconciliar vendas; os dois ecrãs de relatório têm controlos de filtro diferentes.

Consulte [Filtros de vendas do BuyCourses PR #9387](https://github.com/chamilo/chamilo-lms/pull/9387).

---
## Ciclo de vida dos cursos associados a subscrições e salvaguardas de eliminação

O BuyCourses pode encerrar, ocultar e reativar cursos associados a subscrições de serviços recorrentes à medida que o respetivo estado de pagamento muda. No **JSON de comportamento da subscrição** de um serviço, `hide_after_days` especifica o atraso após o encerramento antes de ocultar um curso (predefinição: 30 dias), enquanto `delete_after_days` especifica o atraso após a ocultação antes da eliminação permanente. A eliminação está desativada por predefinição (`null`); apenas um valor positivo torna um curso elegível.

Os administradores podem rever os cursos elegíveis, pendentes e bloqueados em `/admin/buycourses/course-lifecycle`. A interface suporta uma simulação não destrutiva e a eliminação direcionada de **um curso elegível por execução**, protegida por confirmação explícita. O processador de CLI `chamilo:buycourses:process-recurring-subscriptions` também suporta `--dry-run`, `--delete-expired` e `--max-deletions` (1–25). Sem `--delete-expired`, não elimina cursos de forma permanente.

**A eliminação permanente é destrutiva.** Mantenha cópias de segurança e teste primeiro com cursos descartáveis. As verificações de elegibilidade protegem vendas ativas, cursos associados a sessões e titularidade inconsistente; a eliminação automática está bloqueada em instalações com vários URL de acesso. Reveja o comportamento concorrente de renovação/eliminação antes de agendar uma limpeza destrutiva em produção. Consulte [PR do ciclo de vida dos cursos de subscrição #9442](https://github.com/chamilo/chamilo-lms/pull/9442).

## Verificações operacionais

Após a atualização, teste uma compra completa de curso, uma compra de sessão se for comercializada, um webhook atrasado/reproduzido, faturas BTCPay expiradas e parciais, uma renovação automática e um cancelamento com acesso até ao fim do período pago. Mantenha credenciais e segredos de webhook fora de capturas de ecrã, registos e pedidos de suporte.

## Reforço da segurança dos pagamentos

### Verificação do montante da gateway (Redsys / Cecabank)

Quando o banco notifica a plataforma de que um pagamento foi bem-sucedido, o BuyCourses compara o montante cobrado pelo banco (em cêntimos, a partir da notificação assinada) com o preço da venda. Se diferirem, a notificação é recusada, a venda permanece pendente e é escrita uma linha `[BuyCourses] Redsys notification refused` ou `[BuyCourses] Cecabank notification refused` no registo de erros do PHP. Os pagamentos normais não são afetados.

Se uma venda permanecer pendente apesar de o comprador ter pago, verifique o registo: uma alteração de preço após a criação da encomenda, ou um pagamento parcial, aparecerá aí. Conclua essa venda manualmente a partir do relatório de vendas, depois de verificada.

### Tokens de segurança

* Os formulários de cupões (adicionar / configurar), o formulário público de cartões de planos e as ações de payout utilizam o mesmo token de administração do BuyCourses que todas as outras páginas de administração do plugin. Um formulário deixado aberto durante muito tempo continua a funcionar enquanto a sessão estiver ativa; depois de terminar a sessão e iniciar sessão novamente, recarregue a página antes de guardar (caso contrário, é apresentada a mensagem "Not validated").
* A página «pedir fatura» (`request_invoice.php`) e o acionador web de `process_recurring_subscriptions.php` necessitam do token na ligação (`buycourses_admin_sec_token=...`). As ligações marcadas ou enviadas por correio sem o token apresentam "Not validated". A execução em linha de comandos/cron (`php .../process_recurring_subscriptions.php` ou o comando de consola) permanece inalterada e não necessita de token.
* As páginas de sucesso (PayPal, Stripe, subscrições, serviços) só mostram uma venda ao utilizador que a comprou.
* As ações de payout (pagamento em massa do PayPal, cancelamento de um payout) estão restritas aos administradores da plataforma (os administradores de sessão deixaram de ser aceites) e têm de ser enviadas como POST com o token.

### Datas

A data de fim de uma venda de subscrição é agora sempre calculada em UTC, tal como a data da venda, independentemente do fuso horário do servidor.

### Limites multi-URL

Os limites de criação de cursos e de alojamento aplicados quando um serviço expira seguem a mesma regra que o resto da plataforma: uma definição bloqueada, ou marcada como não alterável, no URL principal não pode ser substituída por outro URL.

Alterações: [BTCPay #9286](https://github.com/chamilo/chamilo-lms/pull/9286), [serviços recorrentes #9288](https://github.com/chamilo/chamilo-lms/pull/9288), [reconciliação Stripe #9293](https://github.com/chamilo/chamilo-lms/pull/9293), [totais de vendas de serviços #9220](https://github.com/chamilo/chamilo-lms/pull/9220).