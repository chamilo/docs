# Certificado Personalizado

O plugin Custom Certificate <img src="/.gitbook/assets/icons/mdi-certificate.svg" alt="Certificado Personalizado" data-size="line"> permite substituir o [certificado do boletim](../assessing-learners/gradebook.md) padrão pelo seu próprio design — logotipos, um selo, até quatro imagens de assinatura com legendas, uma imagem de fundo, margens e conteúdo construído a partir de tags de espaço reservado.

## Ativando no seu curso

Depois que o administrador habilitar o plugin e definir um modelo padrão, ative-o por curso em **Configurações do curso**:

* **Custom certificate enable in course** — Ativa o recurso neste curso
* **Use default custom certificate** — Usa o modelo padrão da plataforma em vez de criar o seu próprio (essas duas opções são mutuamente exclusivas; o Chamilo avisa se você tentar habilitar as duas)

Isso disponibiliza a ferramenta **Certificate setting** no seu curso, onde você cria ou edita o modelo.

## Criando o certificado

O editor de certificados usa tags que são substituídas por dados reais quando o certificado de um aluno é gerado, por exemplo `((user_firstname))`, `((course_title))`, `((gradebook_grade))` e `((date_certificate))`. Além do conteúdo, você pode definir:

* Até três logotipos, uma imagem de selo e uma imagem de fundo
* Até quatro imagens de assinatura, cada uma com a respectiva legenda
* Margens e a data e o local de emissão/expedição exibidos no certificado

Use **Certificate** para pré-visualizar o design ou **Delete certificate** para remover o modelo personalizado de um curso.

## Dicas

* **Os alunos não veem nada diferente** — Eles continuam baixando o certificado da forma usual no Boletim; ele apenas usa o seu modelo
* **Pré-visualize antes de depender dele** — Verifique a pré-visualização com dados reais nos espaços reservados para detectar problemas de layout antes que os alunos comecem a gerar certificados
* **Coordene com o administrador** — Se você quiser um modelo padrão para toda a plataforma em vez de um específico por curso, isso é configurado primeiro pelo administrador