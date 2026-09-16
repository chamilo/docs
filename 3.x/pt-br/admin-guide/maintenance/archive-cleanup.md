# Limpeza de Arquivos

Com o tempo, o Chamilo acumula arquivos temporários em seus diretórios de cache e de arquivos. A limpeza regular evita problemas de espaço em disco.

## O Que Pode Ser Limpo

* **Arquivos temporários de upload** — Arquivos gerados durante exportação, importação e outras operações, além de arquivos obsoletos de build do frontend legado
* **Cache da aplicação Symfony** — Container compilado, configuração em cache e dados de roteamento. Isso *não* é coberto pela ação do painel de administração abaixo — consulte [Pela Linha de Comando](#from-the-command-line).
* **Dados de sessão** — Arquivos de sessão PHP expirados
* **Arquivos de log** — Arquivos de log antigos que não são mais necessários

## Realizando a Limpeza

### Pelo Painel de Administração

Navegue até **Sistema > Limpar arquivos temporários** no painel de administração (consulte [Ferramentas do Sistema](../system/system-tools.md#clean-temporary-files)). Ele informa quantos arquivos temporários existem e quanto espaço ocupam, e então permite purgar tudo ou apenas arquivos mais antigos que uma idade escolhida, com uma pré-visualização em dry-run. Também remove arquivos obsoletos de build legado e regenera os assets CSS compilados.

Essa ação exclui deliberadamente os próprios diretórios de cache do Symfony (`var/cache/dev`, `var/cache/prod`, `var/cache/test` e pools de cache), portanto não fará com que uma alteração em `.env` ou `config/` entre em vigor — use a linha de comando para isso.

### Pela Linha de Comando

Para mais controle, e para de fato limpar o cache da aplicação Symfony, use os comandos do console Symfony:

```bash
# Clear the Symfony cache
php bin/console cache:clear

# Clear only the production cache
php bin/console cache:clear --env=prod
```

## Dicas

* **Agende limpezas regulares** — Configure um cron job semanal ou mensal para limpar arquivos temporários
* **Monitore o uso de disco** — Acompanhe o tamanho do diretório `var/`, pois ele cresce com arquivos de cache e de log
* **Tenha cuidado com os logs** — Antes de excluir arquivos de log, verifique se eles contêm informações que você possa precisar para solução de problemas