# Automação de cursos (acionamentos manuais)

A secção **Automation** dos Relatórios do curso permite que professores autorizados configurem ações para o início e o fim de um curso. Na implementação atual do Chamilo 3.1, as ações são **acionadas manualmente**: não assuma que são executadas automaticamente numa data de calendário ou via cron.

## Configurar ações

1. Abra um curso como professor ou como outro utilizador autorizado a gerir os relatórios do curso.
2. Abra **Reporting** e localize a secção **Automation**.
3. Selecione o evento (**Course opens now** ou **Course ends now**) e um tipo de ação.
4. Indique o destino exigido por essa ação e, em seguida, selecione **Add action**.
5. Reveja a lista **Configured actions**; remova uma entrada indesejada com a respetiva ação **Delete**.

As ações suportadas incluem publicar ou ocultar recursos do curso, enviar convites para inquéritos, entregar certificados existentes e alterar a visibilidade do curso. Os recursos, os inquéritos, as opções do Gradebook e os valores de visibilidade disponíveis dependem do curso e das permissões do utilizador atual.

## Executar o evento configurado

Escolha **Course opens now** ou **Course ends now** e confirme a operação. Verifique o resultado apresentado. O Chamilo regista as execuções concluídas, impede configurações duplicadas e ignora, em execuções posteriores, as ações que já tenham sido concluídas com êxito. Um segundo clique não deve ser tratado como forma de reenviar uma ação já concluída.

Para a entrega de certificados, prepare e teste primeiro o certificado relevante. Para os convites de inquérito, verifique se o inquérito está configurado e se os formandos pretendidos pertencem ao contexto atual do curso ou da sessão.

## Limitações importantes

- Esta interface proporciona **execução manual**, não automação agendada.
- As ações operam no contexto atual do curso/sessão; teste o acesso e os destinos em ambos os contextos, quando aplicável.
- As ações concluídas com êxito não são repetidas automaticamente em execuções posteriores.
- À data do PR da funcionalidade, a entrega de certificados, as alterações de visibilidade do curso e a execução específica de sessão tinham sido revistas ao nível do código, mas não verificadas funcionalmente nesse PR. Teste-as na sua instalação antes de depender delas operacionalmente.

Consulte [Relatórios do curso](course-reports.md) e [Certificados e competências](certificates-and-skills.md). Implementação: [PR #9464](https://github.com/chamilo/chamilo-lms/pull/9464).