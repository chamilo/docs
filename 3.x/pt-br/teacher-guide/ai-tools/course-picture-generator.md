# Gerador de Imagem do Curso

O gerador de imagem do curso por IA permite criar uma miniatura para o seu curso diretamente na tela de configurações do curso, em vez de buscar ou projetar uma você mesmo. Esta é a imagem exibida para o seu curso nas listagens e no [catálogo de cursos](../assessing-learners/subscribing-users.md#self-enrollment-via-the-course-catalog).

## Acessando o Gerador

O botão **Gerar com IA** <img src="/.gitbook/assets/icons/mdi-robot.svg" alt="Gerar com IA" data-size="line"> está disponível ao lado do campo **Imagem do curso**, desde que:

1. Os auxiliares de IA estejam habilitados no nível da plataforma
2. Pelo menos um provedor de IA configurado na sua plataforma suporte geração de imagens
3. O recurso esteja permitido no seu curso (consulte **Configurações dos Auxiliares de IA** em [Configurações do Curso](../creating-your-course/course-settings.md))

Abra as **Configurações** <img src="/.gitbook/assets/icons/mdi-cog.svg" alt="Configurações" data-size="line"> do seu curso e role até o campo **Imagem do curso**:

![O campo Imagem do curso nas Configurações do Curso, com um botão Escolher Arquivo e um botão Gerar com IA abaixo dele](/.gitbook/assets/course-picture-ai-button.png)

## Como Gerar uma Imagem

1. Clique em **Gerar com IA**
2. Um diálogo é aberto com um campo **Prompt** pré-preenchido com uma descrição padrão; edite-o para descrever a ilustração desejada ou deixe o padrão como está

![O diálogo Gerar com IA mostrando o campo Prompt com o texto padrão e os botões Cancelar/Gerar](/.gitbook/assets/course-picture-ai-modal.png)

3. Clique em **Gerar** e aguarde — a geração da imagem pode levar alguns segundos
4. A imagem gerada é automaticamente colocada no campo **Imagem do curso**, substituindo qualquer coisa que você tivesse selecionado ali
5. Visualize-a no painel **Pré-visualização** e, em seguida, clique no botão **Salvar** do formulário para de fato aplicá-la ao seu curso — gerar a imagem não a salva por si só

Se você não gostar do resultado, pode gerar novamente com um prompt diferente quantas vezes quiser antes de salvar.

## O Que Entra no Prompt

Além do que você digita, o Chamilo adiciona automaticamente contexto para ajudar a IA a produzir uma imagem relevante e alinhada à marca:

* O título do seu curso
* A primeira seção da [Descrição do Curso](../creating-your-course/course-description.md) do seu curso, se você tiver preenchido uma — dando à IA uma noção do assunto real
* O tema de cores da sua plataforma (primária, secundária, terciária), para que a ilustração use cores consistentes com o seu portal

A imagem é gerada em estilo de ilustração plana, widescreen (16:9), sem texto legível, logotipos ou pessoas fotorrealistas — correspondendo ao formato esperado para uma miniatura de curso.

## Dicas

* **Preencha primeiro uma Descrição do Curso** — como ela alimenta o prompt, um curso com uma descrição real tende a obter uma ilustração mais relevante do que um sem nenhuma
* **Seja específico sobre o estilo, não sobre o conteúdo** — o título e a descrição do curso já ancoram o assunto; use o prompt para pistas de estilo (clima de cor, metáfora, composição) em vez de redescrever o tópico
* **Regenere em vez de se contentar** — cada clique produz uma nova tentativa sem etapa extra; experimente algumas variações antes de escolher uma
* **Lembre-se de salvar** — o botão apenas preenche o campo da imagem; saia sem salvar e a imagem gerada será perdida
* **Se a geração falhar, peça ao seu administrador** — um recurso desabilitado, um provedor de imagens não configurado ou uma cota mensal de uso de IA esgotada produzem uma mensagem de erro aqui; seu administrador pode verificar a [Configuração de IA](../../admin-guide/integrations/ai-configuration.md)