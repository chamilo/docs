# Políticas globais de definições do curso

Os administradores da plataforma podem definir valores predefinidos centralizados para as definições do curso e controlar se os professores podem substituí-los. As políticas aplicam-se à funcionalidade existente dos cursos, preservando as configurações específicas do curso que sejam compatíveis.

## Abrir a página de políticas

No **URL de acesso principal**, abra **Administração > Definições > Definições do curso** ou navegue para `/admin/settings/course-settings` na sua instalação. Esta página de administração está reservada a administradores autorizados da plataforma no URL de acesso principal. Não utilize um portal secundário para editar políticas globais.

## Configurar uma política

1. Utilize o campo **Pesquisar** se precisar de uma chave específica de definição do curso.
2. Para cada definição, verifique o nome exato da variável apresentado sob o respetivo título.
3. Marque ou desmarque **Editável no curso** para controlar se os editores do curso podem alterar essa definição.
4. Escolha ou introduza um **Valor predefinido da plataforma**. Algumas definições oferecem uma lista pendente de valores permitidos; outras aceitam texto.
5. Guarde as alterações e verifique o comportamento efetivo num curso de teste.

As definições que reutilizam o mesmo nome de variável em categorias diferentes são apresentadas separadamente, quando necessário. Não presuma que dois nomes visualmente semelhantes controlam a mesma funcionalidade do curso.

## Verificar com dois papéis

Como administrador, confirme o valor predefinido armazenado e se este é editável. Como professor do curso, abra a definição correspondente do curso e verifique se o valor efetivo e a restrição de edição correspondem à política. Sempre que possível, teste tanto um curso existente como um curso novo.

Alterar um valor predefinido global pode afetar muitos cursos. Analise o respetivo impacto antes de desativar as substituições dos professores e registe os valores anteriores da política, para que possam ser restaurados, se necessário.

Consulte [Gestão de cursos](managing-courses.md) e [Definições do curso](../../teacher-guide/creating-your-course/course-settings.md). Implementação: [PR #9328](https://github.com/chamilo/chamilo-lms/pull/9328).