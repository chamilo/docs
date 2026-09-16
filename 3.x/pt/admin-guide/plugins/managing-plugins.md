# Gestão de Plugins

## Acesso ao Gestor de Plugins

![O gestor de plugins a mostrar uma lista de plugins disponíveis com interruptores de ativação e opções de configuração](/.gitbook/assets/admin-plugin-manager.png)

No painel de administração, clique em **Manage plugins** para ver a lista de plugins disponíveis.

## Estados dos Plugins

Cada plugin tem um de dois estados:

* **Active** — O plugin está ativado e as suas funcionalidades estão disponíveis na plataforma
* **Inactive** — O plugin está instalado, mas desativado

## Ativação de um Plugin

1. Localize o plugin na lista
2. Clique em **Install**, depois em **Enable** ou ative o interruptor
3. Configure as definições do plugin (se aplicável, encontre o botão **Configure**)
4. Guarde
5. Se for recomendado no README, ative-o numa **region** específica

Alguns plugins acrescentam ferramentas aos cursos, novas páginas à plataforma ou funcionalidades adicionais a recursos já existentes.

## Configuração de um Plugin

Muitos plugins têm opções de configuração. Depois de ativar um plugin:

1. Clique no botão **Configure** junto ao plugin
2. Preencha a configuração necessária (chaves de API, URLs, opções, etc.)
3. Guarde

## Desativação de um Plugin

1. Localize o plugin na lista
2. Clique em **Disable** ou desative o interruptor
3. As funcionalidades do plugin são imediatamente removidas da plataforma, mas o plugin permanece instalado e conserva a sua configuração até que o **Uninstall**

Desativar um plugin não elimina os seus dados. Se o voltar a ativar mais tarde, os dados continuam disponíveis.

## Sugestões

* **Ative apenas o que precisa** — Cada plugin ativo acrescenta alguma sobrecarga. Mantenha os plugins não utilizados desativados.
* **Teste antes da produção** — Ative novos plugins primeiro num ambiente de teste
* **Verifique a compatibilidade** — Após atualizar o Chamilo, confirme que todos os plugins ativos continuam a funcionar corretamente