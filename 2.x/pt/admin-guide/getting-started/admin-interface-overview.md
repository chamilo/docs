# Visão Geral da Interface de Administração

O painel de administração é o seu centro de comando para gerenciar a plataforma Chamilo. Acesse-o clicando em **Administração** <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Administração" data-size="line"> na barra lateral.

## Painel de Administração

![O painel de administração exibindo blocos funcionais para Usuários, Cursos, Sessões e Configurações](/.gitbook/assets/admin-dashboard-overview.png)

O painel de administração está organizado em blocos funcionais. Cada bloco agrupa ferramentas de gerenciamento relacionadas:

### Usuários

* **Lista de usuários** — Visualize, pesquise, edite e gerencie todos os usuários na plataforma
* **Adicionar um usuário** — Crie contas de usuário individuais
* **Grupos de usuários** — Gerencie grupos de usuários para fins organizacionais
* **Turmas** — Gerencie turmas de usuários para inscrição em massa em sessões

### Cursos

* **Lista de cursos** — Visualize e gerencie todos os cursos na plataforma
* **Criar um curso** — Crie um novo curso
* **Categorias de cursos** — Organize cursos em categorias para o catálogo

### Sessões

* **Lista de sessões** — Visualize e gerencie sessões de treinamento
* **Criar uma sessão** — Configure uma nova sessão com cursos e inscrições
* **Categorias de sessões** — Organize sessões em categorias
* **Carreiras e promoções** — Gerencie trajetórias de carreira e fluxos de promoção

### Configurações da Plataforma

* **Configurações de configuração** — Acesse o painel abrangente de configurações da plataforma com categorias para portal, cursos, sessões, usuários, segurança e mais

### Plugins

* **Gerenciar plugins** — Instale, ative, configure e desative plugins da plataforma

### Sistema

* **Status do sistema** — Verifique a configuração do PHP, o status do banco de dados e a saúde do servidor
* **Limpeza de arquivo** — Gerencie arquivos temporários e caches

### Marca

* **Cores** — Personalize a aparência visual da plataforma
* **Personalização do portal** — Configure a página inicial do portal, notícias e elementos de marca

Cada seção é abordada em detalhes no capítulo correspondente deste guia.

Métodos de autenticação como OAuth2, LDAP, CAS e outros provedores de autenticação externos não são configurados no painel de administração, mas sim em `config/authentication.yaml`.