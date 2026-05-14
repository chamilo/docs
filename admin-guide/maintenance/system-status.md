# Estado do Sistema

A página de estado do sistema ajuda a verificar se o seu servidor Chamilo está corretamente configurado e a identificar possíveis problemas.

## Acessando o Estado do Sistema

No painel de administração, clique em **Estado do sistema** (ou **Informações do sistema**).

## O Que É Mostrado

![A página de estado do sistema exibindo a configuração do PHP, o status do banco de dados, permissões de arquivos e informações do servidor](/.gitbook/assets/admin-system-status.png)

### Configuração do PHP

* **Versão do PHP** — Chamilo 2.0 requer PHP 8.2 ou superior
* **Extensões necessárias** — Verifica se todas as extensões PHP necessárias estão instaladas
* **Configurações do PHP** — Verifica configurações importantes do PHP, como limite de memória, limites de upload e tempo de execução

### Status do Banco de Dados

* **Conexão com o banco de dados** — Confirma se o banco de dados está acessível
* **Versão do banco de dados** — Mostra a versão do servidor de banco de dados

### Permissões de Arquivos

* **Diretórios graváveis** — Verifica se o Chamilo pode gravar nos diretórios necessários (cache, uploads, logs)

### Informações do Servidor

* **Sistema operacional** — Detalhes do SO do servidor
* **Servidor web** — Apache, Nginx ou outro
* **Espaço em disco** — Armazenamento disponível

## Verificações Recomendadas

Realize estas verificações regularmente:

* **Após a instalação** — Verifique se todos os requisitos foram atendidos
* **Após atualizações** — Certifique-se de que a versão do PHP e as extensões ainda são compatíveis
* **Quando surgirem problemas** — Verifique o estado do sistema primeiro ao solucionar problemas