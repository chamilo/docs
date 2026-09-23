# Status do Sistema

A página de status do sistema ajuda a verificar se o seu servidor Chamilo está configurado corretamente e a identificar possíveis problemas.

## Acessando o Status do Sistema

No painel de administração, clique em **Status do sistema** (ou **Informações do sistema**).

## O Que É Exibido

![A página de status do sistema mostrando a configuração do PHP, status do banco de dados, permissões de arquivos e informações do servidor](../../.gitbook/assets/admin-system-status.png)

### Configuração do PHP

* **Versão do PHP** — O Chamilo 2.0 requer PHP 8.2 ou superior
* **Extensões necessárias** — Verifica se todas as extensões PHP necessárias estão instaladas
* **Configurações do PHP** — Confirma configurações importantes do PHP, como limite de memória, limites de upload e tempo de execução

### Status do Banco de Dados

* **Conexão com o banco de dados** — Confirma que o banco de dados está acessível
* **Versão do banco de dados** — Mostra a versão do servidor de banco de dados

### Permissões de Arquivos

* **Diretórios graváveis** — Verifica se o Chamilo pode gravar nos diretórios necessários (cache, uploads, logs)

### Informações do Servidor

* **Sistema operacional** — Detalhes do sistema operacional do servidor
* **Servidor web** — Apache, Nginx ou outro
* **Espaço em disco** — Armazenamento disponível

## Verificações Recomendadas

Realize essas verificações regularmente:

* **Após a instalação** — Verifique se todos os requisitos foram atendidos
* **Após atualizações** — Certifique-se de que a versão do PHP e as extensões ainda são compatíveis
* **Quando surgirem problemas** — Consulte o status do sistema primeiro ao solucionar problemas