# Automação de cursos (acionamentos manuais)

A seção **Automação** dos Relatórios do curso permite que professores autorizados configurem ações para o início e o fim de um curso. Na implementação atual do Chamilo 3.1, as ações são **acionadas manualmente**: não presuma que elas sejam executadas automaticamente em uma data do calendário ou via cron.

## Configurar ações

1. Abra um curso como professor ou como outro usuário autorizado a gerenciar os relatórios do curso.
2. Abra **Relatórios** e localize a seção **Automação**.
3. Selecione o evento (**O curso abre agora** ou **O curso termina agora**) e um tipo de ação.
4. Informe o destino exigido por essa ação e, em seguida, selecione **Adicionar ação**.
5. Revise a lista **Ações configuradas**; remova uma entrada indesejada com a ação **Excluir**.

As ações compatíveis incluem publicar ou ocultar recursos do curso, enviar convites de pesquisa, entregar certificados existentes e alterar a visibilidade do curso. Os recursos, as pesquisas, as opções do Gradebook e os valores de visibilidade disponíveis dependem do curso e das permissões do usuário atual.

## Executar o evento configurado

Escolha **O curso abre agora** ou **O curso termina agora** e confirme a operação. Verifique o resultado informado. O Chamilo registra as execuções concluídas, impede configurações duplicadas e ignora ações que já foram concluídas com sucesso em execuções posteriores. Um segundo clique não deve ser tratado como uma forma de reenviar uma ação concluída.

Para a entrega de certificados, prepare e teste primeiro o certificado relevante. Para convites de pesquisa, verifique se a pesquisa está configurada e se os estudantes pretendidos pertencem ao contexto atual do curso ou da sessão.

## Limitações importantes

- Esta interface oferece **execução manual**, não automação agendada.
- As ações operam no contexto atual do curso/sessão; teste o acesso e os destinos em ambos os contextos, quando aplicável.
- Ações concluídas com sucesso não são repetidas automaticamente em execuções posteriores.
- No momento do PR da funcionalidade, a entrega de certificados, as alterações de visibilidade do curso e a execução específica da sessão foram revisadas no código, mas não verificadas funcionalmente nesse PR. Teste-as na sua instalação antes de depender delas operacionalmente.

Consulte [Relatórios do curso](course-reports.md) e [Certificados e competências](certificates-and-skills.md). Implementação: [PR #9464](https://github.com/chamilo/chamilo-lms/pull/9464).