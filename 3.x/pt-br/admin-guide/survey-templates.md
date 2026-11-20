# Modelos de questionário

Os administradores podem criar questionários reutilizáveis e oferecê-los aos professores ou atribuí-los diretamente a cursos e sessões. Este recurso foi implementado no [PR #9208](https://github.com/chamilo/chamilo-lms/pull/9208) para a [issue #8760](https://github.com/chamilo/chamilo-lms/issues/8760).

## Criar e manter modelos

1. No painel de administração, abra **Modelos de questionário** e escolha **Criar**.
2. Informe um título e um subtítulo opcional; configure o anonimato, o layout das perguntas, a ordem aleatória, a duração, o texto de introdução e o texto de agradecimento.
3. Salve e adicione ou edite as perguntas reutilizáveis no editor de perguntas do modelo.
4. Ative **Visível como modelo** se os professores devem poder vê-lo e reutilizá-lo. Um modelo invisível permanece disponível para o administrador.

Os modelos pertencem à URL de acesso atual. Somente os administradores da plataforma podem criar, editar ou excluir o modelo mestre. Os professores podem usar modelos visíveis, mas não podem alterar sua definição mestre.

## Reutilizar um modelo em um curso ou sessão

Em um curso ou sessão autorizado, um professor pode escolher um modelo visível ao criar um novo questionário. O resultado é um questionário nesse contexto de curso, e não uma modificação do modelo mestre reutilizável. O professor pode revisar as perguntas e seguir o fluxo habitual de publicação e convite.

Na lista de modelos da administração, um administrador pode, em vez disso, atribuir um modelo diretamente a um **curso** selecionado e, opcionalmente, a uma das **sessões** desse curso. O Chamilo verifica se o curso pertence ao portal atual e se a sessão selecionada realmente contém o curso. A interface do professor não pode ser usada para atribuir um modelo ao curso ou à sessão de outra pessoa.

O novo questionário não é publicado automaticamente apenas por ter sido criado a partir de um modelo; revise-o antes de convidar os participantes. Consulte [Questionários](../teacher-guide/assessing-learners/surveys.md) para o fluxo padrão de questionários.

## Ocultar resultados sensíveis de professores ou tutores

Ao editar um questionário real, um administrador da plataforma pode ativar **Resultados ocultos do professor/tutor**. Essa restrição por questionário destina-se a questionários sensíveis, como avaliações do corpo docente. Professores e tutores ainda podem consultar as contagens de respostas e enviar lembretes, mas **não podem abrir as visualizações de relatório nem exportar os resultados**. Os administradores da plataforma mantêm o acesso aos relatórios, sujeito a outras configurações da plataforma.

Essa opção difere do campo normal **Visibilidade dos resultados** e da configuração de toda a plataforma **Ocultar botão de relatório de questionário**. Somente um administrador pode alterar o indicador de resultados restritos.

## Permissões e escopo

* **Administrador:** gerenciar modelos, definir a visibilidade dos modelos, atribuir a cursos/sessões elegíveis e controlar o acesso restrito aos resultados.
* **Professor / professor de sessão:** ver e instanciar apenas modelos visíveis dentro do contexto de curso autorizado.
* **URLs de acesso:** o catálogo de modelos e a atribuição aplicam a URL de acesso atual; modelos de outros portais não podem ser instanciados além desse limite.

Se os modelos não aparecerem para os professores, verifique **Visível como modelo** e o contexto de curso/sessão. Se um modelo não puder ser instanciado, verifique as restrições globais de criação de questionários e o curso/sessão de destino pretendido.