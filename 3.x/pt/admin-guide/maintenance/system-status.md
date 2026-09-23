# Estado do Sistema

A página de estado do sistema ajuda a verificar se o servidor Chamilo está corretamente configurado e a identificar possíveis problemas.

## Aceder ao Estado do Sistema

No painel de administração, clique em **Estado do sistema** (ou **Informação do sistema**).

## O Que É Apresentado

![A página de estado do sistema a mostrar a configuração PHP, o estado da base de dados, as permissões de ficheiros e a informação do servidor](../../.gitbook/assets/admin-system-status.png)

### Configuração PHP

* **Versão PHP** — O Chamilo 3.0 suporta PHP 8.3, 8.4 e 8.5
* **Extensões obrigatórias** — Verifica se todas as extensões PHP necessárias estão instaladas
* **Definições PHP** — Verifica definições PHP importantes, como o limite de memória, os limites de carregamento e o tempo de execução

### Estado da Base de Dados

* **Ligação à base de dados** — Confirma que a base de dados está acessível
* **Versão da base de dados** — Mostra a versão do servidor de base de dados

### Permissões de Ficheiros

* **Diretórios graváveis** — Verifica se o Chamilo consegue escrever nos diretórios necessários (cache, uploads, logs)

### Informação do Servidor

* **Sistema operativo** — Detalhes do SO do servidor
* **Servidor web** — Apache, Nginx ou outro
* **Espaço em disco** — Armazenamento disponível

## Verificações Recomendadas

Realize estas verificações regularmente:

* **Após a instalação** — Confirme que todos os requisitos estão cumpridos
* **Após atualizações** — Assegure que a versão PHP e as extensões continuam compatíveis
* **Quando surgem problemas** — Consulte primeiro o estado do sistema ao diagnosticar problemas