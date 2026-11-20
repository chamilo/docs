# Mapeamento de competências do curso com assistência de IA

O Chamilo 3.1 pode sugerir competências associadas a um curso e permitir que usuários autorizados revisem e apliquem essas sugestões ao referencial de competências e ao Gradebook. Uma sugestão de IA **não é aplicada automaticamente**; ela deve ser selecionada e aprovada.

## Gerar sugestões

1. Abra a página **Mapeamento de competências com assistência de IA** do curso correspondente. A rota da aplicação é `/course/{courseId}/skills`, com o ID real do curso substituindo `{courseId}`.
2. Se o curso fizer parte de uma sessão, abra a página no contexto correto da sessão.
3. Escolha um **provedor de IA** disponível.
4. Selecione **Sugerir competências para este curso** e revise os resultados retornados.

Os provedores de IA devem estar disponíveis e configurados pela administração da plataforma. As sugestões podem se referir a entradas de **Competência existente** ou recomendar uma **Nova competência** sob uma competência pai. Cada entrada pode incluir sua descrição, critérios e uma explicação da sugestão.

## Revisar e aprovar

1. Leia cada sugestão de forma crítica e compare-a com os objetivos e os conteúdos do curso.
2. Selecione apenas as competências válidas usando as respectivas caixas de seleção.
3. Se você tiver a autorização necessária, escolha **Adicionar competências selecionadas ao referencial e ao Gradebook**.
4. Verifique as competências resultantes e as associações no Gradebook do curso.

Usuários sem privilégios de atribuição podem revisar sugestões, mas não podem associá-las. A criação de novas competências exige permissões de administrador da plataforma. As sugestões podem expirar; gere um novo conjunto se a aplicação informar que as anteriores não são mais válidas.

## Boas práticas

Competências geradas por IA são candidatas, não requisitos curriculares autoritativos. Revise a redação, a duplicação, o posicionamento na competência pai e os critérios antes da aprovação. Evite inserir informações confidenciais de estudantes em prompts de IA.

Consulte [Competências e avaliações](../../admin-guide/skills/skills-assessments.md) e [Caixa de ferramentas de IA](toolbox-ai.md). Implementação: [PR #9409](https://github.com/chamilo/chamilo-lms/pull/9409).