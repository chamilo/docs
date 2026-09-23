# Gerenciando Plugins

## Acessando o Gerenciador de Plugins

![O gerenciador de plugins exibindo uma lista de plugins disponíveis com interruptores de ativação e opções de configuração](../../.gitbook/assets/admin-plugin-manager.png)

No painel de administração, clique em **Gerenciar plugins** para ver a lista de plugins disponíveis.

## Estados do Plugin

Cada plugin possui um de dois estados:

* **Ativo** — O plugin está habilitado e seus recursos estão disponíveis na plataforma
* **Inativo** — O plugin está instalado, mas desabilitado

## Ativando um Plugin

1. Encontre o plugin na lista
2. Clique em **Instalar**, depois em **Habilitar** ou ative o interruptor
3. Configure as definições do plugin (se aplicável, encontre o botão **Configurar**)
4. Salve
5. Se recomendado no README, habilite-o em uma **região** específica

Alguns plugins adicionam ferramentas aos cursos, novas páginas à plataforma ou funcionalidades extras a recursos existentes.

## Configurando um Plugin

Muitos plugins possuem opções de configuração. Após ativar um plugin:

1. Clique no botão **Configurar** ao lado do plugin
2. Preencha a configuração necessária (chaves de API, URLs, opções etc.)
3. Salve

## Desativando um Plugin

1. Encontre o plugin na lista
2. Clique em **Desabilitar** ou desative o interruptor
3. Os recursos do plugin são imediatamente removidos da plataforma, mas o plugin permanece instalado e mantém sua configuração até que você o **Desinstale**

Desabilitar um plugin não exclui seus dados. Se você habilitá-lo mais tarde, os dados ainda estarão disponíveis.

## Dicas

* **Ative apenas o que você precisa** — Cada plugin ativo adiciona alguma sobrecarga. Mantenha os plugins não utilizados desativados.
* **Teste antes da produção** — Ative novos plugins primeiro em um ambiente de teste
* **Verifique a compatibilidade** — Após atualizar o Chamilo, verifique se todos os plugins ativos ainda funcionam corretamente