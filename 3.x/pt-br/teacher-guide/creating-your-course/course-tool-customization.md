# Personalizar nomes e ícones das ferramentas do curso

O Chamilo 3.1 permite que editores de curso autorizados personalizem o **nome** e o **ícone SVG** exibidos para uma ferramenta na página inicial do curso. Essas alterações são restritas ao curso e preservam os destinos existentes das ferramentas.

## Personalizar uma ferramenta

1. Abra a página inicial do curso como um usuário autorizado a editar o curso.
2. Ative o modo **Personalizar** na grade de ferramentas.
3. Abra o formulário de personalização da ferramenta que deseja alterar.
4. Informe o **Nome** desejado e, se necessário, selecione um arquivo SVG de **Ícone**.
5. Selecione **Salvar** e verifique a ferramenta atualizada na grade da página inicial.

A personalização de ferramentas é distinta dos modos **Ordenar**, **Mostrar tudo** e **Ocultar tudo** da grade. Alterar o rótulo ou o ícone de uma ferramenta não cria uma nova ferramenta, não altera a URL subjacente nem concede acesso adicional aos estudantes.

## Requisitos e segurança de SVG

Use um arquivo SVG de uma fonte confiável. O Chamilo valida o conteúdo SVG enviado e rejeita arquivos inseguros. Se um arquivo for rejeitado, simplifique-o ou exporte-o novamente como um SVG limpo, em vez de tentar contornar a validação.

Confirme o ícone e o nome resultantes tanto como professor quanto como estudante e verifique se outro curso permanece inalterado. Os estudantes não podem personalizar ferramentas, a menos que tenham as permissões necessárias de edição do curso.

Consulte [Página inicial do curso](course-homepage.md). Implementação: [PR #9374](https://github.com/chamilo/chamilo-lms/pull/9374).