# Atividades Hot Potatoes

O Chamilo 3.1 permite importar atividades HTML do Hot Potatoes para a ferramenta moderna de Exercícios e usar atividades individuais nos Percursos de aprendizagem.

## Importar uma atividade

1. Abra a ferramenta **Exercícios** do curso e acesse **Hot Potatoes**.
2. Em **Importar Hot Potatoes**, selecione um pacote **ZIP** do Hot Potatoes ou uma exportação **HTML** independente.
3. Quando uma atividade depender de imagens vinculadas, mídia ou outros arquivos, inclua esses recursos no ZIP.
4. Selecione **Importar** e verifique se a atividade importada abre e é exibida corretamente.

## Gerenciar e reutilizar atividades

Na lista do Hot Potatoes, use **Abrir** para visualizar a atividade, **Editar** para alterar seu título, **Publicar** ou **Ocultar** para controlar a visibilidade e **Excluir** para removê-la quando permitido. O construtor de Percursos de aprendizagem pode incluir atividades individuais do Hot Potatoes entre seus recursos.

## Revisar tentativas dos estudantes

A ação **Tentativas** exibe as tentativas registradas para revisão do professor. Os professores podem atribuir uma pontuação percentual revisada de 0 a 100. A tela atualmente mostra até as 100 tentativas mais recentes. Use o resultado efetivamente exibido da atividade como evidência de apoio ao avaliar um estudante.

**A pontuação automática e a sincronização com o Caderno de notas não estão implementadas.** As pontuações exibidas pelo próprio pacote Hot Potatoes não devem ser tratadas como notas verificadas no servidor. Os resultados revisados pelo professor são armazenados separadamente.

## Solução de problemas

Se a mídia estiver ausente, exporte novamente a atividade com todos os recursos vinculados em seu ZIP. Se uma exportação HTML funcionar em um computador local, mas não no Chamilo, verifique referências a arquivos externos ou conteúdo incorporado incompatível. Teste a visibilidade da atividade tanto com uma conta de estudante quanto com uma conta de professor.

Consulte [Exercícios](exercises.md) e [Percursos de aprendizagem](../adding-content/learning-paths.md). Implementação: [PR #9380](https://github.com/chamilo/chamilo-lms/pull/9380).