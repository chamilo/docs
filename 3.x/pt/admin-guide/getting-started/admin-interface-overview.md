# Visão Geral da Interface de Administração

O painel de administração é o seu centro de comando para gerir a plataforma Chamilo. Aceda-lhe clicando em **Administration** <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> na barra lateral.

## Painel de Administração

![O painel de administração a mostrar blocos funcionais para Utilizadores, Cursos, Sessões e Definições](/.gitbook/assets/admin-dashboard-overview.png)

O painel de administração está organizado em blocos funcionais. Cada bloco agrupa ferramentas de gestão relacionadas:

### Users

* **User list** — Ver, pesquisar, editar e gerir todos os utilizadores da plataforma
* **Add a user** — Criar contas de utilizador individuais
* **Classes** — Gerir turmas de utilizadores para inscrição em massa em sessões

Consulte o capítulo [Users](../users/README.md) para mais pormenores.

### Courses

* **Course list** — Ver e gerir todos os cursos da plataforma
* **Create a course** — Criar um novo curso
* **Course categories** — Organizar os cursos em categorias para o catálogo

Consulte o capítulo [Courses](../courses/README.md) para mais pormenores.

### Sessions

* **Session list** — Ver e gerir sessões de formação
* **Create a session** — Configurar uma nova sessão com cursos e inscrição
* **Session categories** — Organizar as sessões em categorias
* **Careers and promotions** — Gerir percursos de carreira e fluxos de promoção

Consulte o capítulo [Sessions](../sessions/README.md) para mais pormenores.

### Platform

* **Configuration settings**, **Languages**, **Portal news**, **Global agenda**, **Pages**, **Extra fields**, **Mail templates**, **Contact form categories**, e mais — consulte o capítulo [Platform](../platform/README.md) para mais pormenores. A ligação "Configuration settings" é o ponto de entrada para o capítulo separado [Platform Settings](../platform-settings/README.md).

### Analytics

* **Global statistics**, **Reports catalog**, **Learning analytics**, **Quarterly report**, **Teachers time report**, **Corporate report**, **Special exports**, **Tickets** — Estatísticas e relatórios da plataforma; consulte o capítulo [Analytics](../analytics/README.md) para mais pormenores

### Skills

* **Skills wheel**, **Skills import**, **Manage skills**, **Manage skills levels**, **Skills ranking**, **Skills and assessments** — Distintivos de competências associados a resultados do livro de notas; consulte o capítulo [Skills](../skills/README.md) para mais pormenores

### System

* **Clean temporary files**, **System status**, **System update**, **Colors**, **File info**, **Resources by type**, **List icons** — Manutenção do servidor, autoatualização e identidade visual; consulte o capítulo [System](../system/README.md) para mais pormenores

### Rooms

* **Branches**, **Rooms**, **Room availability finder** — Instalações físicas e salas de formação reserváveis; consulte o capítulo [Rooms](../rooms/README.md) para mais pormenores

### Security

* **Activities audit**, **Login attempts**, **Simple IDS**, **Password strength checker**, **File integrity** — Ferramentas de monitorização e auditoria de segurança; consulte o capítulo [Security](../security/README.md) para mais pormenores

### Plugins

* Atalhos para plugins instalados que declaram uma página de menu de administração, além da gestão geral de plugins — consulte o capítulo [Plugins](../plugins/README.md) para mais pormenores

### Health Check

* Verificações em tempo real de aprovação/reprovação (definições de correio, atribuição do URL de administração, permissões de ficheiros) — consulte a página [Health Check](../health-check.md) para mais pormenores

### Other Blocks

* **Chamilo.org**, **Version check**, **Professional support**, **News from Chamilo** — ligações e painéis de estado que obtêm conteúdo do projeto Chamilo; consulte [Other Admin Blocks](../other-admin-blocks/README.md) para mais pormenores

Cada secção é abordada em pormenor no capítulo correspondente deste guia.

Métodos de autenticação como OAuth2, LDAP, CAS e outros fornecedores de autenticação externos não são configurados no painel de administração, mas em `config/authentication.yaml`.