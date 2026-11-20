# Certificados de Aproveitamento (Geração em Lote)

O Chamilo pode gerar automaticamente o certificado de aproveitamento de um curso para cada estudante que o tenha concluído — num curso base e em qualquer sessão que o reutilize — sem que um professor precise abrir cada curso individualmente. Dois comandos de console cobrem este processo, um para um único curso e outro para toda a plataforma, e nenhum deles é uma operação intensiva na base de dados que exija supervisão constante: ambos funcionam em lotes delimitados, suportam uma execução simulada (dry run) e podem ser retomados com segurança se forem interrompidos.

## Comando para toda a plataforma

```bash
php bin/console chamilo:gradebook:process-achievement-certificates [options]
```

Para cada curso que possua uma categoria raiz elegível do livro de notas — de nível superior, e não uma subcategoria, com **Gerar certificados** ativado — o comando avalia cada estudante inscrito que ainda não tenha um certificado para essa categoria e gera um para quem tiver cumprido o requisito de conclusão. Um curso pode contribuir com **mais de um** contexto: a sua inscrição de base e, separadamente, um contexto por sessão que o reutilize, uma vez que uma sessão pode ter a sua própria categoria raiz e o seu próprio limiar de aprovação.

Um curso, ou um dos seus contextos de sessão, é ignorado — e não tratado como um erro — quando não é elegível para processamento automatizado: nenhuma regra de conclusão configurada, mais de uma categoria raiz elegível para esse contexto (ambíguo, exige uma escolha manual) ou conteúdo de notificação de certificado em falta. O resumo da execução, no final, indica quantos contextos se enquadraram em cada caso, para que nada seja ignorado sem ser assinalado.

### Fonte de conclusão

* `--completion-mode=course-rule` (padrão): utiliza a regra de conclusão configurada para o curso.
* `--completion-mode=gradebook`: utiliza diretamente a pontuação nativa do livro de notas para esse contexto.
  Apenas um contexto com exatamente uma categoria raiz elegível se qualifica neste modo — um contexto com várias
  é ignorado e reportado, para ser processado individualmente (ver abaixo).

### Opções de segurança

| Opção                     | Finalidade                                                                                                                                 |
| --------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`                 | Avalia e reporta sem criar certificados nem enviar notificações. Execute sempre esta opção primeiro.                                      |
| `--send-notification`       | Obrigatória para uma execução real (que não seja dry run). Envia a mensagem interna e o e-mail configurados no curso depois de cada certificado ser criado. |
| `--sender-id=<id>`          | Administrador ativo da plataforma usado como remetente da notificação. Obrigatório em conjunto com `--send-notification`.                            |
| `--limit=<n>`                | Número máximo de certificados gerados (ou, em dry run, reportados) numa execução. `0` = ilimitado. Padrão: `100`.                                    |
| `--scan-limit=<n>`           | Número máximo de estudantes avaliados numa execução, em todos os cursos e sessões. `0` = ilimitado. Padrão: `1000`.                                 |
| `--batch-size=<n>`           | Estudantes carregados por lote da base de dados dentro de um contexto de curso/sessão. Padrão: `25`.                                                     |
| `--course-batch-size=<n>`    | Cursos carregados por lote da base de dados. Padrão: `50`.                                                                                         |
| `--after-course-id=<id>`     | Retoma a análise após este ID de curso. Pode ser reutilizado com segurança após uma execução interrompida — um curso nunca regenera um certificado para um estudante que já possua um. |
| `--user-id=<id>`             | Restringe a execução a um estudante, verificado em todos os cursos e sessões elegíveis — útil para validar o comportamento antes de uma execução em toda a plataforma. |
| `--regenerate-empty`         | Processa também estudantes cujo registro de certificado existe, mas não tem arquivo de certificado armazenado — por exemplo, após uma geração que falhou a meio — e gera novamente esse certificado. Estudantes com um certificado completo nunca são alterados. |

### Exemplos

Execute primeiro um dry-run de toda a plataforma, para ver o que seria gerado:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates --dry-run
```

Execução real, notificando os estudantes, com o administrador de ID 1 como remetente:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1
```

Retome uma execução interrompida após o curso 480:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1 --after-course-id=480
```

Gere novamente os certificados cujo registro existe, mas cujo arquivo nunca foi armazenado (execute primeiro um dry-run para listá-los):

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --dry-run
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --send-notification --sender-id=1
```

### Agendamento como tarefa cron

```cron
# Every night at 2 AM
0 2 * * * php /path/to/chamilo/bin/console chamilo:gradebook:process-achievement-certificates --send-notification --sender-id=1 -e prod --no-interaction >> /path/to/chamilo/var/log/achievement-certificates.log 2>&1
```

## Processamento de um curso individualmente

`chamilo:migration:process-achievement-certificates --course-id=<id>` oferece as mesmas opções de dry-run, notificação e paginação do comando para toda a plataforma, restritas apenas ao curso base (não às suas sessões), com um `--category-id` explícito para desambiguar quando um curso possui mais de uma categoria raiz elegível:

```bash
php bin/console chamilo:migration:process-achievement-certificates \
  --course-id=42 --category-id=7 --dry-run
```

Use-o para testar um único curso antes de uma execução em toda a plataforma, ou para processar um curso que a execução em toda a plataforma tenha reportado como ignorado por categoria ambígua.

## Códigos de saída

Ambos os comandos terminam com status de falha se pelo menos uma geração de certificado tiver de fato falhado durante uma execução real (consulte `var/log/dev.log` — ou o log de produção equivalente — para o erro subjacente). Contextos ignorados por razões estruturais (sem regra, categoria ambígua, configuração de notificação ausente) não causam um código de saída de falha; são reportados no resumo.

## Relacionado: estudantes bloqueados abaixo de 100% em um percurso de aprendizagem pré-requisito

Se a regra de conclusão de um curso exigir que um percurso de aprendizagem atinja 100%, um estudante que concluiu todas as etapas, mas nunca abriu a página final «Parabéns» do percurso, permanece bloqueado pouco abaixo de 100% e nunca se torna elegível aqui. Consulte [Conclusão dos itens finais bloqueados de percursos de aprendizagem](learning-path-final-items.md) — execute-o primeiro se faltarem certificados a estudantes que se esperaria que já os tivessem obtido.

## Substituído: o script cron legado

`public/main/cron/add_gradebook_certificates.php` não é mais recomendado. Ele carrega todos os resultados do caderno de notas da plataforma na memória em uma única consulta sem limite e nunca os libera durante o loop, podendo esgotar a memória em uma instância com um número considerável de cursos ou exercícios, e nunca envia a notificação «você obteve um certificado». Use `chamilo:gradebook:process-achievement-certificates` em seu lugar.