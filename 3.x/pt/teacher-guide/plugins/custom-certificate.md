# Certificado Personalizado

O plugin Custom Certificate <img src="../../.gitbook/assets/icons/mdi-certificate.svg" alt="Certificado Personalizado" data-size="line"> permite substituir o [certificado do boletim de notas](../assessing-learners/gradebook.md) padrão pelo seu próprio design — logótipos, um selo, até quatro imagens de assinatura com legendas, uma imagem de fundo, margens e conteúdo construído a partir de etiquetas de marcador de posição.

## Ativar no seu curso

Depois de o administrador ativar o plugin e definir um modelo predefinido, ative-o por curso em **Definições do curso**:

* **Custom certificate enable in course** — Ativa a funcionalidade neste curso
* **Use default custom certificate** — Utiliza o modelo predefinido da plataforma em vez de conceber o seu próprio (estas duas opções são mutuamente exclusivas; o Chamilo avisa-o se tentar ativar ambas)

Isto disponibiliza uma ferramenta **Certificate setting** no seu curso, onde concebe ou edita o modelo.

## Conceber o certificado

O editor de certificados utiliza etiquetas que são substituídas por dados reais quando o certificado de um formando é gerado, por exemplo `((user_firstname))`, `((course_title))`, `((gradebook_grade))` e `((date_certificate))`. Para além do conteúdo, pode definir:

* Até três logótipos, uma imagem de selo e uma imagem de fundo
* Até quatro imagens de assinatura, cada uma com a sua própria legenda
* Margens e a data e o local de entrega/expedição apresentados no certificado

Utilize **Certificate** para pré-visualizar o seu design, ou **Delete certificate** para remover o modelo personalizado de um curso.

## Sugestões

* **Os estudantes não veem nada de diferente** — Continuam a descarregar o certificado da forma habitual a partir do Gradebook; este passa simplesmente a utilizar o seu modelo
* **Pré-visualize antes de depender dele** — Verifique a pré-visualização com dados reais de marcadores de posição para detetar problemas de disposição antes de os formandos começarem a gerar certificados
* **Coordene com o seu administrador** — Se pretender um modelo predefinido para toda a plataforma em vez de um modelo pontual por curso, isso é configurado primeiro pelo administrador