# Gerenciamento de Competências

Esta página aborda as três entradas do painel usadas para construir o catálogo de competências da plataforma: importação de competências em lote, gerenciamento das definições das próprias competências e atribuição de cada competência a uma escala de níveis.

## Importação de Competências

**Skills > Skills import** permite criar em lote uma hierarquia de competências a partir de um arquivo CSV ou XML, em vez de criar competências uma a uma. Cada linha precisa, no mínimo, de um `id`, um `parent_id` (para construir a árvore) e um `title`. Um modelo de exemplo está disponível para servir de base ao seu arquivo.

## Gerenciar Competências

**Skills > Manage skills** é o catálogo principal de competências: criar, editar, ativar/desativar e excluir competências. Cada competência possui um título, um código curto, uma descrição, um ícone e uma descrição opcional de critérios (o que o aluno precisa fazer para obtê-la). As competências podem ser aninhadas — uma competência pode ter competências filhas — o que é visualizado pela [Roda de Competências](skills-wheel.md).

## Gerenciar Níveis de Competências

**Skills > Manage skills levels** é uma tela separada e menor: lista as competências existentes e permite atribuir cada uma a um **perfil de nível** — um conjunto nomeado e ordenado de níveis (por exemplo Bronze/Prata/Ouro) em relação ao qual a competência é medida. Em resumo: use **Manage skills** para definir o que uma competência *é*, e **Manage skills levels** para definir em qual escala ela é medida.

## Como as Competências São Concedidas

Uma competência é concedida a um usuário (registrada como uma competência emitida, com uma data) por um dos seguintes caminhos:

* Automaticamente, quando um aluno atinge o limiar de uma categoria do boletim — configurado na página [Competências e Avaliações](skills-assessments.md)
* Automaticamente, ao concluir cursos específicos aos quais a competência está vinculada
* Manualmente, por um professor (se **Teachers can assign skills** estiver habilitado) ou por um administrador