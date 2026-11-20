# Comandos de reparo e conversão

> **Mudança incompatível.** Os comandos de manutenção abaixo costumavam gravar no banco de dados assim que eram executados. Agora eles são **somente leitura (dry-run) por padrão** e só gravam quando `--apply` é informado, seguindo o modelo de `chamilo:migration:repair-quiz-relations-from-legacy`.

| Comando | Observações |
|---------|-------|
| `chamilo:migration:repair-group-forums-without-item-property` | |
| `chamilo:migration:repair-forum-posts-without-item-property` | |
| `chamilo:migration:repair-quiz-questions-without-resource-node` | |
| `chamilo:migration:repair-gradebook-structure` | |
| `chamilo:migration:repair-translatehtml-language-blocks` | |
| `chamilo:migration:repair-legacy-certificate-history` | |
| `app:multi-url:convert` | sem `--expected-count` (operação única do tipo tudo ou nada) |

## O que mudou para os administradores

1. Execute o comando sem opções: ele informa o que faria, não grava nada e imprime a linha exata
   `--apply --expected-count=N` a ser usada.
2. Para gravar, execute-o novamente com `--apply --expected-count=N`, em que N é o número informado pela execução somente leitura.
   Se o número de linhas que seriam alteradas diferir de N (os dados mudaram nesse intervalo), o comando recusa
   e não grava nada.
3. `--dry-run` continua aceito (agora é o padrão e não faz nada); combiná-lo com `--apply` é um erro.
4. Scripts e jobs cron que executavam esses comandos sem argumentos e dependiam de eles gravarem agora devem passar
   `--apply --expected-count=N`. Os códigos de saída permanecem inalterados (0 sucesso, 1 falha, 2 uso inválido).

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

Recalcula o contador de uso (`tag.count`) das tags a partir das linhas de relação que as utilizam (tags de usuário, tags de campo extra,
tags de portfólio). Versões anteriores permitiam que os contadores se dessincronizassem. Mesmo modelo: execute-o sem opções para listar as tags
dessincronizadas e obter a linha `--apply --expected-count=N` e, em seguida, execute essa linha para gravar. Nenhuma migração está envolvida: execute-o
quando quiser que os contadores sejam ressincronizados.