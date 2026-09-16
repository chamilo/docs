# Limpeza de Arquivos

Com o tempo, o Chamilo acumula ficheiros temporários nas suas diretórias de cache e de arquivo. A limpeza regular evita problemas de espaço em disco.

## O Que Pode Ser Limpo

* **Ficheiros temporários de carregamento** — Ficheiros gerados durante exportação, importação e outras operações, bem como ficheiros obsoletos de compilação do frontend legado
* **Cache da aplicação Symfony** — Contentor compilado, configuração em cache e dados de encaminhamento. Isto *não* é abrangido pela ação do painel de administração abaixo — consulte [A partir da linha de comandos](#from-the-command-line).
* **Dados de sessão** — Ficheiros de sessão PHP expirados
* **Ficheiros de registo** — Ficheiros de registo antigos que já não são necessários

## Executar a Limpeza

### A partir do Painel de Administração

Navegue até **Sistema > Limpar ficheiros temporários** no painel de administração (consulte [Ferramentas do Sistema](../system/system-tools.md#clean-temporary-files)). É indicado quantos ficheiros temporários existem e quanto espaço ocupam, e depois pode eliminar tudo ou apenas ficheiros mais antigos do que uma idade escolhida, com uma pré-visualização em modo de simulação. Também remove ficheiros obsoletos de compilação legado e regenera os recursos CSS compilados.

Esta ação exclui deliberadamente as próprias diretórias de cache do Symfony (`var/cache/dev`, `var/cache/prod`, `var/cache/test` e pools de cache), pelo que não fará com que uma alteração em `.env` ou `config/` entre em vigor — utilize a linha de comandos para isso.

### A partir da Linha de Comandos

Para mais controlo, e para limpar efetivamente a cache da aplicação Symfony, utilize os comandos da consola Symfony:

```bash
# Clear the Symfony cache
php bin/console cache:clear

# Clear only the production cache
php bin/console cache:clear --env=prod
```

## Sugestões

* **Agende limpezas regulares** — Configure um cron job semanal ou mensal para limpar os ficheiros temporários
* **Monitorize o uso de disco** — Acompanhe o tamanho da diretória `var/`, pois esta cresce com ficheiros de cache e de registo
* **Tenha cuidado com os registos** — Antes de eliminar ficheiros de registo, verifique se contêm informação de que possa precisar para resolução de problemas