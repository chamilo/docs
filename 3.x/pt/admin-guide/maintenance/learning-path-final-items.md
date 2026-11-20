# Conclusão de itens finais bloqueados de percursos de aprendizagem

O último passo de um percurso de aprendizagem — a página «Parabéns», que contém os blocos de certificado e de competência — só conta como concluído quando o formando o abre de facto. Um formando que termina todos os outros passos, mas nunca avança até essa última página, permanece indefinidamente ligeiramente abaixo de 100% e, como a elegibilidade para o certificado de aproveitamento (e a atribuição de competências) depende de o percurso de aprendizagem atingir 100%, nunca recebe um certificado ou uma competência que, de resto, já conquistou.

```bash
php bin/console chamilo:learning-path:complete-final-items [options]
```

Para cada percurso de aprendizagem da plataforma cujo último passo é do tipo **Final item**, o comando verifica cada formando com uma tentativa em curso (abaixo de 100%) que tenha concluído todos os outros passos — em todos os cursos e em todas as sessões que reutilizam o percurso de aprendizagem. Se for esse o caso, conclui o item final por ele exactamente como se o tivesse aberto: regista a mesma visualização do item, executa o mesmo recálculo do progresso e desencadeia a mesma geração de certificado e atribuição de competências que uma visita real provocaria.

Tal como `chamilo:gradebook:process-achievement-certificates` (ver
[Certificados de aproveitamento](achievement-certificates.md)), funciona em lotes delimitados, suporta uma execução de simulação e pode ser retomado em segurança se for interrompido — um formando cujo item final já esteja concluído nunca volta a ser alterado numa execução posterior.

## Opções

| Option                 | Purpose                                                                                                            |
| ----------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`             | Avalia e reporta sem concluir nada. Execute sempre esta opção em primeiro lugar.                                  |
| `--sender-id=<id>`      | ID de um administrador activo da plataforma, utilizado como criador do recurso quando a conclusão de um item final desencadeia a geração de um certificado ou a atribuição de uma competência. Obrigatório numa execução real (que não seja de simulação). |
| `--limit=<n>`           | Número máximo de itens finais concluídos (ou, em simulação, reportados) numa execução. `0` = ilimitado. Predefinição `500`. |
| `--scan-limit=<n>`      | Número máximo de registos de progresso de formandos analisados numa execução, em todos os percursos de aprendizagem. `0` = ilimitado. Predefinição `5000`. |
| `--batch-size=<n>`      | Registos de progresso de formandos carregados por lote da base de dados, dentro de um percurso de aprendizagem. Predefinição `50`. |
| `--lp-batch-size=<n>`   | Percursos de aprendizagem carregados por lote da base de dados. Predefinição `50`.                                 |
| `--after-lp-id=<id>`    | Retoma a análise após este ID de percurso de aprendizagem.                                                         |

## Exemplos

Execute primeiro uma simulação em toda a plataforma, para ver quem seria concluído:

```bash
php bin/console chamilo:learning-path:complete-final-items --dry-run
```

Execução real, com o administrador de ID 1 como criador do recurso:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1
```

Retomar uma execução interrompida após o percurso de aprendizagem 480:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1 --after-lp-id=480
```

## Códigos de saída

O comando termina com um estado de falha se pelo menos um item final não tiver sido efectivamente concluído durante uma execução real — a tabela de resumo indica o percurso de aprendizagem, o formando e o motivo; o registo da aplicação contém a excepção completa. Um formando correctamente excluído (item final já concluído, ou outro passo ainda incompleto) não constitui um erro e nunca provoca um código de saída de falha.

## Pontuação no livro de notas após a conclusão

A pontuação apresentada para um percurso de aprendizagem na tabela do livro de notas nunca é armazenada — é calculada em tempo real a partir do progresso actual do formando sempre que a página é carregada, pelo que reflecte os 100% de imediato, sem qualquer passo adicional.

O **certificado** de um formando, se já existia antes de atingir 100% (com uma pontuação anterior, mais baixa, incorporada), só vê a pontuação armazenada e o HTML renderizado actualizados se a própria regeneração do certificado for bem-sucedida quando este comando conclui o item final — a mesma chamada que uma visita real desencadearia. Se a geração do certificado falhar por qualquer motivo (ver
[Certificados de aproveitamento](achievement-certificates.md) para causas comuns, p. ex. permissões de armazenamento de ficheiros), o progresso do formando atinge correctamente 100% e a tabela do livro de notas continua a mostrá-lo — apenas o certificado permanece com a pontuação antiga e, como o comando nunca volta a analisar um formando que já esteja a 100%, não tentará de novo numa execução posterior. Regenere esse certificado manualmente (a acção **Gerar** na lista de Certificados) depois de corrigido o problema subjacente.

`--sender-id` existe especificamente para evitar uma causa comum dessa falha: concluir um item final fora de um pedido real não tem um utilizador autenticado para o recurso de certificado registar como criador, e a geração falha de imediato sem um.