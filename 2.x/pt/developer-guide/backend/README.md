# Backend

O backend do Chamilo 2.0 é construído com Symfony 6.4, utilizando Doctrine ORM e API Platform.

* **[Arquitetura Symfony](symfony-architecture.md)** — Bundles, serviços e a estrutura geral do backend
* **[Entidades e Doctrine](entities-and-doctrine.md)** — As classes de entidade Doctrine e como elas se relacionam
* **[Sistema de Recursos](resource-system.md)** — A abstração ResourceNode/ResourceFile (conceito arquitetural chave)
* **[Controladores](controllers.md)** — Organização de controladores e padrões de roteamento
* **[Eventos e Listeners](events-and-listeners.md)** — Como o Chamilo utiliza o sistema de eventos do Symfony
* **[Sistema de Configurações](settings-system.md)** — Os esquemas de configurações em `src/CoreBundle/Settings/` e como funciona a configuração da plataforma