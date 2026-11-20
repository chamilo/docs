# Modelos de inquéritos

Os administradores podem criar questionários de inquérito reutilizáveis e disponibilizá-los aos professores ou atribuí-los diretamente a cursos e sessões. Esta funcionalidade foi implementada no [PR #9208](https://github.com/chamilo/chamilo-lms/pull/9208) para a [issue #8760](https://github.com/chamilo/chamilo-lms/issues/8760).

## Criar e manter modelos

1. No painel de administração, abra **Modelos de inquéritos** e escolha **Criar**.
2. Introduza um título e um subtítulo opcional; configure o anonimato, a disposição das perguntas, a ordem aleatória, a duração, o texto de introdução e o texto de agradecimento.
3. Guarde e adicione ou edite as perguntas reutilizáveis no editor de perguntas do modelo.
4. Ative **Visível como modelo** se os professores deverem poder vê-lo e reutilizá-lo. Um modelo invisível permanece disponível para o administrador.

Os modelos pertencem ao URL de acesso atual. Apenas os administradores da plataforma podem criar, editar ou eliminar o modelo principal. Os professores podem utilizar modelos visíveis, mas não podem alterar a sua definição principal.

## Reutilizar um modelo num curso ou sessão

Num curso ou sessão autorizados, um professor pode escolher um modelo visível ao criar um novo inquérito. O resultado é um inquérito nesse contexto de curso, e não uma modificação do modelo principal reutilizável. O professor pode rever as perguntas e seguir o fluxo habitual de publicação e de convites.

A partir da lista de modelos da administração, um administrador pode, em alternativa, atribuir um modelo diretamente a um **curso** selecionado e, opcionalmente, a uma das **sessões** desse curso. O Chamilo verifica se o curso pertence ao portal atual e se a sessão selecionada contém efetivamente o curso. A interface do professor não pode ser utilizada para atribuir um modelo ao curso ou à sessão de outra pessoa.

O novo inquérito não é publicado automaticamente apenas por ter sido criado a partir de um modelo; reveja-o antes de convidar os participantes. Consulte [Inquéritos](../teacher-guide/assessing-learners/surveys.md) para o fluxo de trabalho padrão dos inquéritos.

## Ocultar resultados sensíveis aos professores ou tutores

Ao editar um inquérito real, um administrador da plataforma pode ativar **Resultados ocultos ao professor/tutor**. Esta restrição por inquérito destina-se a questionários sensíveis, tais como avaliações do corpo docente. Os professores e tutores podem ainda consultar as contagens de respostas e enviar lembretes, mas **não podem abrir vistas de relatórios nem exportar os resultados**. Os administradores da plataforma mantêm o acesso aos relatórios, sujeito a outras definições da plataforma.

Esta opção difere do campo normal **Visibilidade dos resultados** e da definição ao nível da plataforma **Ocultar o botão de relatórios de inquéritos**. Apenas um administrador pode alterar o indicador de resultados restritos.

## Permissões e âmbito

* **Administrador:** gerir modelos, definir a visibilidade dos modelos, atribuir a cursos/sessões elegíveis e controlar o acesso restrito aos resultados.
* **Professor / professor de sessão:** ver e instanciar apenas modelos visíveis no respetivo contexto de curso autorizado.
* **URLs de acesso:** o catálogo de modelos e a atribuição aplicam o URL de acesso atual; os modelos de outros portais não podem ser instanciados para além desse limite.

Se os modelos não aparecerem aos professores, verifique **Visível como modelo** e o respetivo contexto de curso/sessão. Se um modelo não puder ser instanciado, verifique as restrições globais de criação de inquéritos e o curso/sessão de destino pretendido.