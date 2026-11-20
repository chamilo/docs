# Mapeamento de competências do curso assistido por IA

O Chamilo 3.1 pode sugerir competências associadas a um curso e permitir que utilizadores autorizados revejam e apliquem essas sugestões ao referencial de competências e ao Gradebook. Uma sugestão de IA **não é aplicada automaticamente**; deve ser selecionada e aprovada.

## Gerar sugestões

1. Abra a página de **mapeamento de competências assistido por IA** do curso relevante. A rota da aplicação é `/course/{courseId}/skills`, substituindo `{courseId}` pelo ID real do curso.
2. Se o curso fizer parte de uma sessão, abra a página no contexto de sessão correto.
3. Escolha um **fornecedor de IA** disponível.
4. Selecione **Sugerir competências para este curso** e reveja os resultados devolvidos.

Os fornecedores de IA devem estar disponíveis e configurados pela administração da plataforma. As sugestões podem referir-se a entradas de **Competência existente** ou recomendar uma **Nova competência** sob uma competência principal. Cada entrada pode incluir a sua descrição, critérios e uma explicação da sugestão.

## Rever e aprovar

1. Leia cada sugestão de forma crítica e compare-a com os objetivos e conteúdos do curso.
2. Selecione apenas as competências válidas através das respetivas caixas de seleção.
3. Se tiver a autorização necessária, escolha **Adicionar competências selecionadas ao referencial e ao Gradebook**.
4. Verifique as competências resultantes e as associações ao Gradebook no curso.

Os utilizadores sem privilégios de atribuição podem rever sugestões, mas não podem associá-las. A criação de novas competências requer permissões de administrador da plataforma. As sugestões podem expirar; gere um novo conjunto se a aplicação indicar que as anteriores já não são válidas.

## Boas práticas

As competências geradas por IA são candidatas, não requisitos curriculares autoritativos. Reveja a redação, a duplicação, a colocação na competência principal e os critérios antes da aprovação. Evite introduzir informações confidenciais dos formandos nos pedidos à IA.

Consulte [Competências e avaliações](../../admin-guide/skills/skills-assessments.md) e [Caixa de ferramentas de IA](toolbox-ai.md). Implementação: [PR #9409](https://github.com/chamilo/chamilo-lms/pull/9409).