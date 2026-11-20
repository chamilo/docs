# Políticas globais de configuração de cursos

Administradores da plataforma podem definir padrões centralizados para as configurações de cursos e controlar se os professores podem substituí-los. As políticas se aplicam à funcionalidade existente dos cursos, preservando configurações específicas de cursos compatíveis.

## Abrir a página de políticas

Na **URL de acesso principal**, abra **Administração > Configurações > Configurações do curso** ou navegue até `/admin/settings/course-settings` na sua instalação. Esta página de administração é reservada a administradores autorizados da plataforma na URL de acesso principal. Não use um portal secundário para editar políticas globais.

## Configurar uma política

1. Use o campo **Pesquisar** se precisar de uma chave específica de configuração de curso.
2. Para cada configuração, verifique o nome exato da variável exibido sob o respectivo título.
3. Marque ou desmarque **Editável no curso** para controlar se os editores do curso podem alterar essa configuração.
4. Escolha ou informe um **Valor padrão da plataforma**. Algumas configurações oferecem uma lista suspensa de valores permitidos; outras aceitam texto.
5. Salve as alterações e verifique o comportamento efetivo em um curso de teste.

Configurações que reutilizam o mesmo nome de variável em categorias diferentes são exibidas separadamente quando necessário. Não presuma que dois nomes visualmente semelhantes controlam o mesmo recurso do curso.

## Verificar com dois papéis

Como administrador, confirme o padrão armazenado e se ele é editável. Como professor do curso, abra a configuração correspondente do curso e verifique se o valor efetivo e a restrição de edição correspondem à política. Teste tanto um curso existente quanto um curso novo, quando possível.

Alterar um padrão global pode afetar muitos cursos. Revise o impacto antes de desativar as substituições dos professores e registre os valores anteriores da política para que possam ser restaurados, se necessário.

Consulte [Gerenciamento de cursos](managing-courses.md) e [Configurações do curso](../../teacher-guide/creating-your-course/course-settings.md). Implementação: [PR #9328](https://github.com/chamilo/chamilo-lms/pull/9328).