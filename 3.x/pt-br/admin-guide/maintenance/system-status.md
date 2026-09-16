# Status do Sistema

A página de status do sistema ajuda você a verificar se o servidor Chamilo está configurado corretamente e a identificar possíveis problemas.

## Acessando o Status do Sistema

No painel de administração, clique em **Status do sistema** (ou **Informações do sistema**).

## O Que Ela Mostra

![A página de status do sistema mostrando a configuração do PHP, o status do banco de dados, as permissões de arquivos e as informações do servidor](/.gitbook/assets/admin-system-status.png)

### Configuração do PHP

* **Versão do PHP** — O Chamilo 3.0 é compatível com PHP 8.3, 8.4 e 8.5
* **Extensões obrigatórias** — Verifica se todas as extensões PHP necessárias estão instaladas
* **Configurações do PHP** — Verifica configurações importantes do PHP, como limite de memória, limites de upload e tempo de execução

### Status do Banco de Dados

* **Conexão com o banco de dados** — Confirma que o banco de dados está acessível
* **Versão do banco de dados** — Exibe a versão do servidor de banco de dados

### Permissões de Arquivos

* **Diretórios graváveis** — Verifica se o Chamilo consegue gravar nos diretórios necessários (cache, uploads, logs)

### Informações do Servidor

* **Sistema operacional** — Detalhes do SO do servidor
* **Servidor web** — Apache, Nginx ou outro
* **Espaço em disco** — Armazenamento disponível

## Verificações Recomendadas

Realize estas verificações regularmente:

* **Após a instalação** — Verifique se todos os requisitos foram atendidos
* **Após atualizações** — Assegure-se de que a versão do PHP e as extensões ainda sejam compatíveis
* **Quando surgirem problemas** — Consulte primeiro o status do sistema ao solucionar problemas