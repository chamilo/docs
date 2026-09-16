# Limpeza de Arquivos Temporários

Com o tempo, o Chamilo acumula arquivos temporários em seus diretórios de cache e arquivos. Uma limpeza regular evita problemas de espaço em disco.

## O Que Pode Ser Limpo

* **Cache do Symfony** — Modelos compilados, configurações em cache e dados de roteamento
* **Arquivos temporários** — Arquivos gerados durante exportação, importação e outras operações
* **Dados de sessão** — Arquivos de sessão PHP expirados
* **Arquivos de log** — Arquivos de log antigos que não são mais necessários

## Realizando a Limpeza

### Pelo Painel de Administração

Navegue até **Limpeza de arquivos temporários** no painel de administração. Clique no botão de limpeza para remover os arquivos temporários.

### Pela Linha de Comando

Para maior controle, use os comandos do console do Symfony:

```bash
# Limpar o cache do Symfony
php bin/console cache:clear

# Limpar apenas o cache de produção
php bin/console cache:clear --env=prod
```

## Dicas

* **Agende limpezas regulares** — Configure um trabalho cron semanal ou mensal para limpar arquivos temporários
* **Monitore o uso do disco** — Fique atento ao tamanho do diretório `var/`, pois ele cresce com arquivos de cache e log
* **Tenha cuidado com os logs** — Antes de excluir arquivos de log, verifique se eles contêm informações que você pode precisar para solução de problemas