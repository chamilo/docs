# Gerador de Imagem do Curso

O gerador de imagem do curso com IA permite criar uma miniatura para o seu curso diretamente no ecrã de definições do curso, em vez de a obter ou conceber você mesmo. Esta é a imagem apresentada para o seu curso nas listagens e no [catálogo de cursos](../assessing-learners/subscribing-users.md#self-enrollment-via-the-course-catalog).

## Aceder ao Gerador

O botão **Generate with AI** <img src="/.gitbook/assets/icons/mdi-robot.svg" alt="Generate with AI" data-size="line"> está disponível junto ao campo **Course picture**, desde que:

1. Os assistentes de IA estejam ativados ao nível da plataforma
2. Pelo menos um fornecedor de IA configurado na sua plataforma suporte a geração de imagens
3. A funcionalidade esteja permitida no seu curso (consulte **AI Helpers Settings** em [Definições do Curso](../creating-your-course/course-settings.md))

Abra as **Settings** <img src="/.gitbook/assets/icons/mdi-cog.svg" alt="Settings" data-size="line"> do seu curso e desloque-se até ao campo **Course picture**:

![O campo Course picture nas Definições do Curso, com um botão Choose File e um botão Generate with AI por baixo](/.gitbook/assets/course-picture-ai-button.png)

## Como Gerar uma Imagem

1. Clique em **Generate with AI**
2. Abre-se uma caixa de diálogo com um campo **Prompt** pré-preenchido com uma descrição predefinida; edite-o para descrever a ilustração pretendida ou deixe o valor predefinido

![A caixa de diálogo Generate with AI a mostrar o campo Prompt com o texto predefinido e os botões Cancel/Generate](/.gitbook/assets/course-picture-ai-modal.png)

3. Clique em **Generate** e aguarde — a geração da imagem pode demorar alguns segundos
4. A imagem gerada é automaticamente colocada no campo **Course picture**, substituindo o que aí tivesse selecionado
5. Pré-visualize-a no painel **Preview** e, em seguida, clique no botão **Save** do formulário para a aplicar efetivamente ao curso — gerar a imagem não a guarda por si só

Se não gostar do resultado, pode gerar novamente com um prompt diferente tantas vezes quantas quiser antes de guardar.

## O Que Entra no Prompt

Para além do que escreve, o Chamilo adiciona automaticamente contexto para ajudar a IA a produzir uma imagem relevante e alinhada com a marca:

* O título do seu curso
* A primeira secção da [Descrição do Curso](../creating-your-course/course-description.md) do seu curso, se a tiver preenchido — dando à IA uma noção da matéria efetiva
* O tema de cores da sua plataforma (primária, secundária, terciária), para que a ilustração utilize cores consistentes com o seu portal

A imagem é gerada em estilo de ilustração plana, em ecrã panorâmico (16:9), sem texto legível, logótipos ou pessoas fotorrealistas — correspondendo ao formato esperado para uma miniatura de curso.

## Dicas

* **Preencha primeiro uma Descrição do Curso** — como alimenta o prompt, um curso com uma descrição real tende a obter uma ilustração mais relevante do que um sem nenhuma
* **Seja específico quanto ao estilo, não ao conteúdo** — o título e a descrição do curso já ancoram o tema; use o prompt para pistas de estilo (atmosfera de cor, metáfora, composição) em vez de redescrever o tópico
* **Regenere em vez de se contentar** — cada clique produz uma nova tentativa sem passo extra; experimente algumas variações antes de escolher uma
* **Lembre-se de guardar** — o botão apenas preenche o campo da imagem; se sair sem guardar, a imagem gerada perde-se
* **Se a geração falhar, contacte o administrador** — uma funcionalidade desativada, um fornecedor de imagens não configurado ou uma quota mensal de utilização de IA esgotada produzem aqui uma mensagem de erro; o administrador pode verificar a [Configuração de IA](../../admin-guide/integrations/ai-configuration.md)