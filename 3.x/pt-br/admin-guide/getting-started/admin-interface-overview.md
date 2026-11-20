# Visão Geral da Interface de Administração

O painel de administração é o seu centro de comando para gerenciar a plataforma Chamilo. Acesse-o clicando em **Administração** <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> na barra lateral.

## Painel de Administração

![O painel de administração mostrando blocos funcionais para Usuários, Cursos, Sessões e Configurações](/.gitbook/assets/admin-dashboard-overview.png)

O painel de administração está organizado em blocos funcionais. Cada bloco agrupa ferramentas de gerenciamento relacionadas:

### Usuários

* **Lista de usuários** — Visualizar, pesquisar, editar e gerenciar todos os usuários da plataforma
* **Adicionar um usuário** — Criar contas de usuário individuais
* **Turmas** — Gerenciar turmas de usuários para matrícula em massa em sessões

Consulte o capítulo [Usuários](../users/README.md) para mais detalhes.

### Cursos

* **Lista de cursos** — Visualizar e gerenciar todos os cursos da plataforma
* **Criar um curso** — Criar um novo curso
* **Categorias de cursos** — Organizar cursos em categorias para o catálogo

Consulte o capítulo [Cursos](../courses/README.md) para mais detalhes.

### Sessões

* **Lista de sessões** — Visualizar e gerenciar sessões de formação
* **Criar uma sessão** — Configurar uma nova sessão com cursos e matrícula
* **Categorias de sessões** — Organizar sessões em categorias
* **Carreiras e promoções** — Gerenciar percursos de carreira e fluxos de promoção

Consulte o capítulo [Sessões](../sessions/README.md) para mais detalhes.

### Plataforma

* **Configurações**, **Idiomas**, **Notícias do portal**, **Agenda global**, **Páginas**, **Campos extras**, **Modelos de e-mail**, **Categorias do formulário de contato** e mais — consulte o capítulo [Plataforma](../platform/README.md) para mais detalhes. O link "Configurações" é o ponto de entrada para o capítulo separado [Configurações da Plataforma](../platform-settings/README.md).

### Analytics

* **Estatísticas globais**, **Catálogo de relatórios**, **Learning analytics**, **Relatório trimestral**, **Relatório de tempo dos professores**, **Relatório corporativo**, **Exportações especiais**, **Tickets** — Estatísticas e relatórios da plataforma; consulte o capítulo [Analytics](../analytics/README.md) para mais detalhes

### Competências

* **Roda de competências**, **Importação de competências**, **Gerenciar competências**, **Gerenciar níveis de competências**, **Ranking de competências**, **Competências e avaliações** — Distintivos de competência vinculados a resultados do boletim; consulte o capítulo [Competências](../skills/README.md) para mais detalhes

### Sistema

* **Limpar arquivos temporários**, **Status do sistema**, **Atualização do sistema**, **Cores**, **Informações de arquivos**, **Recursos por tipo**, **Listar ícones** — Manutenção do servidor, autoatualização e identidade visual; consulte o capítulo [Sistema](../system/README.md) para mais detalhes

### Salas

* **Filiais**, **Salas**, **Localizador de disponibilidade de salas** — Locais físicos e salas de formação reserváveis; consulte o capítulo [Salas](../rooms/README.md) para mais detalhes

### Segurança

* **Auditoria de atividades**, **Tentativas de login**, **IDS simples**, **Verificador de força de senha**, **Integridade de arquivos** — Ferramentas de monitoramento e auditoria de segurança; consulte o capítulo [Segurança](../security/README.md) para mais detalhes

### Plugins

* Atalhos para plugins instalados que declaram uma página de menu de administração, além do gerenciamento geral de plugins — consulte o capítulo [Plugins](../plugins/README.md) para mais detalhes

### Health Check

* Verificações ao vivo de aprovação/falha (configurações de e-mail, atribuição de URL de administração, permissões de arquivos) — consulte a página [Health Check](../health-check.md) para mais detalhes

### Outros Blocos

* **Chamilo.org**, **Verificação de versão**, **Suporte profissional**, **Notícias do Chamilo** — links e painéis de status que obtêm conteúdo do projeto Chamilo; consulte [Outros Blocos de Administração](../other-admin-blocks/README.md) para mais detalhes

Cada seção é abordada em detalhe no capítulo correspondente deste guia.

Métodos de autenticação como OAuth2, LDAP, CAS e outros provedores de autenticação externa não são configurados no painel de administração, mas em `config/authentication.yaml`.