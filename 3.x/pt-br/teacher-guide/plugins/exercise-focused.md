# Foco no Exercício

Foco no Exercício <img src="../../.gitbook/assets/icons/mdi-eye-outline.svg" alt="Foco no Exercício" data-size="line"> é um recurso anticola para exames. Se o navegador de um aluno perder o foco durante um teste sinalizado — ao mudar para outra aba ou janela — o Chamilo exibe um aviso em tela cheia pedindo que ele retorne e pode enviar automaticamente a tentativa se ele não o fizer.

## Sinalizando um Teste

Abra as configurações do teste e marque a opção **Exercise Focused**. Uma vez sinalizado, cada tentativa nesse teste é monitorada quanto à perda de foco, e cada evento é registrado.

## O Que os Alunos Veem

Quando um aluno monitorado sai da janela do exame, um overlay aparece pedindo que ele retorne e conclua o teste. Dependendo de como o administrador configurou o plugin, isso também pode iniciar uma contagem regressiva que envia automaticamente a tentativa e/ou enviar automaticamente após um número definido de eventos de perda de foco.

## Revisando os Resultados

Um teste sinalizado recebe um ícone de relatórios que abre um relatório com três abas:

* Um resumo por tentativa
* Uma visualização filtrável e pesquisável com exportação para Excel
* Uma aba de amostragem aleatória para verificação pontual das tentativas

## Dicas

* **O comportamento em si é em toda a plataforma** — Como professor, você apenas escolhe quais testes são sinalizados; a duração da contagem regressiva do aviso e o número de eventos de perda de foco permitidos antes do envio automático são definidos uma vez pelo administrador
* **Avise os alunos com antecedência** — Informe os aprendizes de que um teste é monitorado dessa forma antes de começarem, para que uma notificação do navegador ou um clique acidental não lhes custe a tentativa
* **Cobre apenas a tela padrão de realização do teste** — Se a sua plataforma aplicar testes por outro caminho, a detecção de perda de foco pode não se aplicar nesse caso