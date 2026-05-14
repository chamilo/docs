# Gerenciando Plugins

## Acessando o Gerenciador de Plugins

![O gerenciador de plugins mostrando uma lista de plugins disponíveis com opções de ativação e configuração](/.gitbook/assets/admin-plugin-manager.png)

No painel de administração, clique em **Gerenciar plugins** para ver a lista de plugins disponíveis.

## Estados dos Plugins

Cada plugin pode estar em um dos dois estados:

* **Ativo** — O plugin está habilitado e suas funcionalidades estão disponíveis na plataforma
* **Inativo** — O plugin está instalado, mas desabilitado

## Ativando um Plugin

1. Encontre o plugin na lista
2. Clique em **Instalar**, depois em **Habilitar** ou ative-o pelo interruptor
3. Configure as opções do plugin (se aplicável, localize o botão **Configurar**)
4. Salve
5. Se recomendado no README, habilite-o em uma **região** específica

Alguns plugins adicionam ferramentas aos cursos, novas páginas à plataforma ou funcionalidades adicionais a recursos existentes.

## Configurando um Plugin

Muitos plugins possuem opções de configuração. Após ativar um plugin:

1. Clique no botão **Configurar** ao lado do plugin
2. Preencha as configurações necessárias (chaves de API, URLs, opções, etc.)
3. Salve

## Desativando um Plugin

1. Encontre o plugin na lista
2. Clique em **Desabilitar** ou desative-o pelo interruptor
3. As funcionalidades do plugin são imediatamente removidas da plataforma, mas o plugin permanece instalado e mantém sua configuração até que você o **Desinstale**

Desativar um plugin não exclui seus dados. Se você o ativar novamente mais tarde, os dados ainda estarão disponíveis.

## Dicas

* **Ative apenas o que você precisa** — Cada plugin ativo adiciona uma sobrecarga. Mantenha plugins não utilizados desativados.
* **Teste antes da produção** — Ative novos plugins primeiro em um ambiente de teste
* **Verifique a compatibilidade** — Após atualizar o Chamilo, confirme que todos os plugins ativos ainda funcionam corretamente