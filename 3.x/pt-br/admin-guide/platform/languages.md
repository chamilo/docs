# Idiomas

Esta ferramenta gerencia quais idiomas de interface os usuários podem escolher — ela não gerencia as próprias cadeias de tradução (estas vêm dos pacotes de idioma fornecidos com o Chamilo, e não de nada editável aqui).

## Acessando os idiomas

No painel de administração, clique em **Plataforma > Idiomas**.

## O que você pode fazer

* **Alternar a disponibilidade** — Ativar ou desativar cada um dos idiomas fornecidos como opção na página de login e nas configurações do perfil do usuário, com um simples interruptor liga/desliga por linha
* **Definir o idioma padrão da plataforma** — Escolher qual idioma é usado quando nenhuma preferência do usuário se aplica; o padrão atual é marcado com um ícone próprio e não pode ser ocultado
* **Desativar todos, exceto o padrão** — Uma única ação em massa para reduzir o seletor de idiomas apenas ao idioma padrão da sua plataforma
* **Editar o nome nativo** — Ajustar como o próprio nome de um idioma é exibido (seu “nome original”) no seletor

## Desativar um idioma em uso

Se você desativar um idioma que usuários ativos já selecionaram como idioma de interface, o Chamilo pede confirmação e — se você confirmar — migra todos os usuários afetados para o idioma padrão da plataforma. Não há estado parcial em que um usuário fique com um idioma agora oculto selecionado.

## Idiomas da direita para a esquerda

Idiomas da direita para a esquerda (como árabe, hebraico ou persa) alternam automaticamente a interface para um layout da direita para a esquerda quando selecionados — não há nada a configurar aqui ou em outro lugar para que isso aconteça. O suporte a RTL foi substancialmente aprimorado nas versões recentes.

## Subidiomas

Se a configuração **Permitir subidiomas** estiver ativada, ações adicionais aparecem para criar “subidiomas” — substituições parciais de um idioma pai, historicamente usadas para dialetos regionais ou ajustes de terminologia específicos da organização. Este é um recurso legado; a maioria das instalações não precisará dele.