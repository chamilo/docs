# Personalizar nomes e ícones das ferramentas do curso

O Chamilo 3.1 permite que editores de curso autorizados personalizem o **nome** e o **ícone SVG** apresentados para uma ferramenta na página inicial do curso. Estas alterações limitam-se ao curso e preservam os destinos existentes das ferramentas.

## Personalizar uma ferramenta

1. Abra a página inicial do curso como um utilizador autorizado a editar o curso.
2. Ative o modo **Personalizar** na grelha de ferramentas.
3. Abra o formulário de personalização da ferramenta que pretende alterar.
4. Introduza o **Nome** pretendido e, se necessário, selecione um ficheiro SVG de **Ícone**.
5. Selecione **Guardar** e verifique a ferramenta atualizada na grelha da página inicial.

A personalização de ferramentas é distinta dos modos **Ordenar**, **Mostrar tudo** e **Ocultar tudo** da grelha. Alterar a etiqueta ou o ícone de uma ferramenta não cria uma nova ferramenta, não altera o URL subjacente nem concede acesso adicional aos formandos.

## Requisitos e segurança do SVG

Utilize um ficheiro SVG de uma fonte fidedigna. O Chamilo valida o conteúdo SVG carregado e rejeita ficheiros inseguros. Se um ficheiro for rejeitado, simplifique-o ou volte a exportá-lo como um SVG limpo, em vez de tentar contornar a validação.

Confirme o ícone e o nome resultantes tanto como docente como como estudante, e verifique se outro curso permanece inalterado. Os estudantes não podem personalizar ferramentas, a menos que disponham das permissões de edição do curso necessárias.

Consulte [Página inicial do curso](course-homepage.md). Implementação: [PR #9374](https://github.com/chamilo/chamilo-lms/pull/9374).