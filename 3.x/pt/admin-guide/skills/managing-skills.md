# Gestão de Competências

Esta página aborda as três entradas do painel utilizadas para construir o catálogo de competências da plataforma: importação de competências em massa, gestão das próprias definições de competências e atribuição de cada competência a uma escala de níveis.

## Skills Import

**Skills > Skills import** permite criar em massa uma hierarquia de competências a partir de um ficheiro CSV ou XML, em vez de criar as competências uma a uma. Cada linha precisa, no mínimo, de um `id`, um `parent_id` (para construir a árvore) e um `title`. Está disponível um modelo de exemplo para basear o seu ficheiro.

## Manage Skills

**Skills > Manage skills** é o catálogo principal de competências: criar, editar, ativar/desativar e eliminar competências. Cada competência tem um título, um código curto, uma descrição, um ícone e uma descrição opcional de critérios (o que um formando precisa de fazer para a obter). As competências podem ser aninhadas — uma competência pode ter competências filhas — o que é visualizado pela [Roda de Competências](skills-wheel.md).

## Manage Skills Levels

**Skills > Manage skills levels** é um ecrã separado e mais reduzido: lista as competências existentes e permite atribuir cada uma a um **perfil de níveis** — um conjunto nomeado e ordenado de níveis (por exemplo Bronze/Prata/Ouro) face ao qual a competência é medida. Em resumo: utilize **Manage skills** para definir o que uma competência *é*, e **Manage skills levels** para definir em que escala é medida.

## Como as Competências São Atribuídas

Uma competência é atribuída a um utilizador (registada como competência emitida, com uma data) através de um dos seguintes caminhos:

* Automaticamente, quando um formando atinge o limiar de uma categoria do boletim de notas — configurado na página [Competências e Avaliações](skills-assessments.md)
* Automaticamente, ao concluir cursos específicos aos quais a competência está associada
* Manualmente, por um professor (se **Teachers can assign skills** estiver ativado) ou por um administrador