# Backend

O backend do Chamilo 3.0 é construído sobre Symfony 7.4 com Doctrine ORM e API Platform.

* **[Arquitetura Symfony](symfony-architecture.md)** — Bundles, serviços e a estrutura geral do backend
* **[Entidades e Doctrine](entities-and-doctrine.md)** — As classes de entidade Doctrine e como se relacionam
* **[Sistema de Recursos](resource-system.md)** — A abstração ResourceNode/ResourceFile (conceito arquitetural-chave)
* **[Controllers](controllers.md)** — Organização dos controllers e padrões de routing
* **[Eventos e Listeners](events-and-listeners.md)** — Como o Chamilo utiliza o sistema de eventos do Symfony
* **[Sistema de Definições](settings-system.md)** — Os schemas de definições em `src/CoreBundle/Settings/` e o funcionamento da configuração da plataforma