# Conclusão de itens finais de percursos de aprendizagem travados

A última etapa de um percurso de aprendizagem — a página "Parabéns", que contém os blocos de certificado e de competência — só conta como concluída quando o aluno realmente a abre. Um aluno que termina todas as outras etapas, mas nunca clica até essa última página, permanece travado logo abaixo de 100% para sempre e, como a elegibilidade ao certificado de conquista (e a atribuição de competências) depende de o percurso de aprendizagem atingir 100%, ele nunca recebe um certificado ou uma competência que, de outro modo, já teria conquistado.

```bash
php bin/console chamilo:learning-path:complete-final-items [options]
```

Para cada percurso de aprendizagem da plataforma cuja última etapa seja do tipo **Final item**, o comando verifica cada aluno com uma tentativa em andamento (abaixo de 100%) que tenha concluído todas as outras etapas — em todos os cursos e em todas as sessões que reutilizam o percurso de aprendizagem. Se for o caso, ele conclui o item final para esse aluno exatamente como se ele mesmo o tivesse aberto: registra a mesma visualização do item, executa o mesmo recálculo de progresso e dispara a mesma geração de certificado e atribuição de competências que uma visita real dispararia.

Assim como `chamilo:gradebook:process-achievement-certificates` (consulte
[Certificados de conquista](achievement-certificates.md)), ele trabalha em lotes limitados, oferece suporte a execução de simulação e pode ser retomado com segurança se for interrompido — um aluno cujo item final já esteja concluído nunca é alterado novamente em uma execução posterior.

## Opções

| Option                 | Purpose                                                                                                            |
| ----------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`             | Avalia e informa sem concluir nada. Execute sempre esta opção primeiro.                                           |
| `--sender-id=<id>`      | ID de um administrador ativo da plataforma, usado como criador do recurso quando a conclusão de um item final dispara a geração de certificado ou a atribuição de competências. Obrigatório para uma execução real (que não seja de simulação). |
| `--limit=<n>`           | Número máximo de itens finais concluídos (ou, na simulação, informados) em uma execução. `0` = ilimitado. Padrão `500`.              |
| `--scan-limit=<n>`      | Número máximo de registros de progresso de alunos examinados em uma execução, em todos os percursos de aprendizagem. `0` = ilimitado. Padrão `5000`. |
| `--batch-size=<n>`      | Registros de progresso de alunos carregados por lote do banco de dados, dentro de um percurso de aprendizagem. Padrão `50`.                       |
| `--lp-batch-size=<n>`   | Percursos de aprendizagem carregados por lote do banco de dados. Padrão `50`.                                                            |
| `--after-lp-id=<id>`    | Retoma a varredura após este ID de percurso de aprendizagem.                                                                       |

## Exemplos

Execute primeiro uma simulação em toda a plataforma, para ver quem seria concluído:

```bash
php bin/console chamilo:learning-path:complete-final-items --dry-run
```

Execução real, com o administrador de ID 1 como criador do recurso:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1
```

Retome uma execução interrompida após o percurso de aprendizagem 480:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1 --after-lp-id=480
```

## Códigos de saída

O comando encerra com status de falha se pelo menos um item final realmente não tiver sido concluído durante uma execução real — a tabela de resumo indica o percurso de aprendizagem, o aluno e o motivo; o log da aplicação contém a exceção completa. Um aluno corretamente excluído (item final já concluído, ou outra etapa ainda incompleta) não é um erro e nunca provoca um código de saída de falha.

## Pontuação do livro de notas após a conclusão

A pontuação exibida para um percurso de aprendizagem na tabela do livro de notas nunca é armazenada — ela é calculada em tempo real a partir do progresso atual do aluno sempre que a página é carregada; portanto, reflete os 100% imediatamente, sem nenhuma etapa extra.

O **certificado** de um aluno, se já existia antes de ele atingir 100% (com uma pontuação mais antiga e mais baixa incorporada a ele), só tem sua pontuação armazenada e o HTML renderizado atualizados se a própria regeneração do certificado for bem-sucedida quando este comando concluir o item final — a mesma chamada que uma visita real dispararia. Se a geração do certificado falhar por qualquer motivo (consulte
[Certificados de conquista](achievement-certificates.md) para causas comuns, por exemplo, permissões de armazenamento de arquivos), o progresso do aluno ainda atinge corretamente 100% e a tabela do livro de notas ainda o exibe — apenas o certificado permanece com a pontuação antiga e, como o comando nunca revisita um aluno que já esteja em 100%, ele não tentará novamente em uma execução posterior. Regenere esse certificado manualmente (a ação **Generate** na lista de certificados) depois que o problema subjacente for corrigido.

`--sender-id` existe especificamente para evitar uma causa comum dessa falha: concluir um item final fora de uma requisição real não tem um usuário autenticado para o recurso de certificado registrar como seu criador, e a geração falha imediatamente sem um.