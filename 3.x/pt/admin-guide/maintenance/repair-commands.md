# Comandos de reparação e conversão

> **Alteração incompatível.** Os comandos de manutenção abaixo escreviam na base de dados assim que eram executados. Passam agora a ser **somente leitura (dry-run) por predefinição** e só escrevem quando é indicado `--apply`, seguindo o modelo de `chamilo:migration:repair-quiz-relations-from-legacy`.

| Comando | Notas |
|---------|-------|
| `chamilo:migration:repair-group-forums-without-item-property` | |
| `chamilo:migration:repair-forum-posts-without-item-property` | |
| `chamilo:migration:repair-quiz-questions-without-resource-node` | |
| `chamilo:migration:repair-gradebook-structure` | |
| `chamilo:migration:repair-translatehtml-language-blocks` | |
| `chamilo:migration:repair-legacy-certificate-history` | |
| `app:multi-url:convert` | sem `--expected-count` (operação única, tudo ou nada) |

## O que mudou para os administradores

1. Execute o comando sem opções: indica o que faria, não escreve nada e apresenta a linha exacta
   `--apply --expected-count=N` a utilizar.
2. Para escrever, execute-o novamente com `--apply --expected-count=N`, em que N é o número indicado pela execução somente leitura.
   Se o número de linhas que seriam alteradas diferir de N (os dados mudaram entretanto), o comando recusa
   e não escreve nada.
3. `--dry-run` continua a ser aceite (é agora a predefinição e não faz nada); combiná-lo com `--apply` é um erro.
4. Scripts e tarefas cron que executavam estes comandos sem argumentos e dependiam de que escrevessem devem agora passar
   `--apply --expected-count=N`. Os códigos de saída mantêm-se inalterados (0 sucesso, 1 falha, 2 utilização inválida).

Exemplo:

```bash
php bin/console chamilo:migration:repair-translatehtml-language-blocks
# ... "To write, re-run with --apply --expected-count=12"
php bin/console chamilo:migration:repair-translatehtml-language-blocks --apply --expected-count=12
```

```bash
php bin/console app:multi-url:convert "https://admin.example.com/"          # plan only
php bin/console app:multi-url:convert "https://admin.example.com/" --apply  # convert
```

## Novo comando: `app:repair-user-tag-counters`

Recalcula o contador de utilização (`tag.count`) das etiquetas a partir das linhas de relação que as utilizam (etiquetas de utilizador, etiquetas de campos extra,
etiquetas de portefólio). Versões anteriores permitiam que os contadores se desviassem. O mesmo modelo: execute-o sem opções para listar as etiquetas desviadas
e obter a linha `--apply --expected-count=N` e, em seguida, execute essa linha para escrever. Não está envolvida qualquer migração: execute-o
quando pretender que os contadores sejam ressincronizados.