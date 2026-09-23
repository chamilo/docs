# Percursos de aprendizagem

Os percursos de aprendizagem permitem criar sequências estruturadas de atividades de aprendizagem. Um percurso de aprendizagem orienta os seus formandos através de uma ordem específica de documentos, exercícios, ligações e outros recursos, com pré-requisitos opcionais e acompanhamento do progresso.

Esta ferramenta é, provavelmente, a ferramenta de curso mais utilizada, porque funciona como um compositor para muitas outras ferramentas e pode ser, em grande medida, a ***única*** ferramenta visível para os formandos.

## Porquê utilizar percursos de aprendizagem?

Os percursos de aprendizagem são úteis quando pretende:

* **Controlar a ordem** de consumo dos conteúdos — garantir que os formandos concluem o material de base antes de avançar
* **Acompanhar o progresso** — ver exatamente onde cada formando se encontra na sequência
* **Definir pré-requisitos** — exigir que os formandos passem num exercício antes de aceder à secção seguinte
* **Atribuir a conclusão** — associar a conclusão do percurso de aprendizagem ao boletim de notas e aos certificados
* **Empacotar conteúdos** — criar módulos de aprendizagem autónomos que os formandos podem percorrer ao seu próprio ritmo

## Criar um percurso de aprendizagem

1. Abra a ferramenta **Percursos de aprendizagem** <img src="../../.gitbook/assets/icons/mdi-map-marker-path.svg" alt="Percursos de aprendizagem" data-size="line"> a partir da página inicial do curso
2. Clique em **Criar um percurso de aprendizagem**
3. Introduza um **título** e, opcionalmente, uma descrição
4. Guarde — será encaminhado para o editor do percurso de aprendizagem

## O editor do percurso de aprendizagem

![O editor do percurso de aprendizagem com a árvore de itens à esquerda e a pré-visualização do conteúdo à direita](../../.gitbook/assets/learning-path-editor.png)

O editor tem duas áreas principais:

* **Painel esquerdo** — A lista de itens (passos) no percurso de aprendizagem, apresentada como uma estrutura em árvore
* **Painel direito** — O conteúdo do item selecionado

### Adicionar itens

Clique em **Adicionar um item** e escolha o que pretende adicionar:

| Tipo de item | Descrição |
|-----------|-------------|
| **Secção** | Um cabeçalho que agrupa itens relacionados (como o título de um capítulo). As secções não contêm conteúdo por si próprias. |
| **Documento** | Um ficheiro ou página web da ferramenta Documentos do seu curso |
| **Exercício** | Um questionário ou teste da ferramenta Exercícios |
| **Ligação** | Um URL externo |
| **Trabalho** | Uma publicação de estudante da ferramenta Trabalhos |
| **Fórum** | Uma ligação para um fórum do curso |
| **Inquérito** | Uma ligação para um inquérito |
| **Certificado** | Uma página especial para desencadear a geração de um certificado de conclusão ou a atribuição de competências |

### Organizar itens

* **Arraste e largue** itens para os reordenar
* **Aninhe itens** sob secções arrastando-os para a direita
* **Elimine** itens de que já não necessita

### Definir pré-requisitos

Os pré-requisitos garantem que os formandos concluem determinados passos antes de aceder a outros:

1. Selecione um item no percurso de aprendizagem
2. Abra as respetivas definições de **pré-requisitos**
3. Escolha qual(is) o(s) item(ns) precedente(s) que deve(m) ser concluído(s) primeiro
4. Para exercícios, pode exigir uma **pontuação mínima** (por exemplo, «Deve obter pelo menos 70% no Questionário 1 antes de aceder ao Módulo 2»)

## Experiência do formando

Quando um formando abre um percurso de aprendizagem:

* Vê a lista de itens no painel esquerdo
* Os itens concluídos são marcados com um visto
* Os itens com pré-requisitos não cumpridos estão bloqueados
* O progresso é acompanhado automaticamente — se um formando sair e regressar, retoma de onde parou
* Uma barra de progresso mostra a percentagem global de conclusão

## Conteúdo SCORM

A ferramenta de percursos de aprendizagem do Chamilo pode importar pacotes **SCORM 1.2** — o padrão de e-learning mais amplamente utilizado. Carregue um ficheiro ZIP SCORM e o Chamilo criará a partir dele um percurso de aprendizagem, acompanhando o progresso e as pontuações de acordo com a especificação SCORM.

Para importar um pacote SCORM:

1. Na ferramenta Percursos de aprendizagem, abra o menu de ações e clique em **Carregar**
2. Carregue o ficheiro ZIP
3. O Chamilo descompacta e cria o percurso de aprendizagem automaticamente

### Pacotes CMI5 / xAPI

Os pacotes CMI5 (o sucessor moderno do SCORM baseado em xAPI) são suportados através do plugin **XApi**. Depois de o plugin ser ativado pelo seu administrador, pode importar um pacote CMI5 e os formandos podem iniciá-lo a partir do curso; as respetivas declarações são reencaminhadas para o Learning Record Store configurado.

## Autoria de conteúdos com C-Studio

*Disponível se o seu administrador tiver ativado o plugin C-Studio.*

O C-Studio acrescenta um editor visual integrado, de arrastar e largar, para criar conteúdos interativos diretamente dentro de um percurso de aprendizagem — uma alternativa à importação de um pacote SCORM quando não tem (ou não quer aprender) uma ferramenta de autoria separada como Articulate ou iSpring. Constrói o conteúdo página a página no próprio Chamilo, e este é armazenado e acompanhado como qualquer outro item de percurso de aprendizagem.

### Iniciar um Projeto C-Studio

Quando o plugin está ativo, a lista de Percursos de Aprendizagem mostra um botão extra junto ao menu de ações habitual, marcado com um "+" e uma dica de ferramenta "Studio Tools":

![A lista de percursos de aprendizagem a mostrar o botão "Studio Tools" do C-Studio junto ao menu de ações padrão](../../.gitbook/assets/cstudio-lp-button.png)

Clique nele para começar. Ser-lhe-á pedido que crie um novo projeto de raiz ou que importe um existente:

![O ecrã inicial do C-Studio a oferecer criar um novo projeto ou importar um existente](../../.gitbook/assets/cstudio-start-screen.png)

Este ecrã em particular está atualmente disponível apenas em francês, independentemente do idioma da plataforma ou do curso — uma limitação conhecida da versão do plugin em uso. Dê um título ao seu projeto e este abre diretamente no editor.

### O Editor

![O editor visual do C-Studio, a mostrar a tela da página, a paleta de ferramentas à direita e o painel do projeto à esquerda](../../.gitbook/assets/cstudio-editor.png)

O editor é um construtor visual página a página:

* **Painel esquerdo** — as páginas do seu projeto, com um "+" para adicionar mais, e uma secção **Tools** na parte inferior (Clean data, Preview, Colors, Options, Quit)
* **Tela central** — a página que está a construir; clique em qualquer elemento para o editar no local
* **Painel direito** — a paleta de componentes, arrastados para a tela

A paleta cobre blocos de construção básicos (colunas, imagens, áudio, títulos, texto, botões, cartões), bem como vários tipos de exercícios interativos: **Drag Drop**, **Fill text**, **Hotspot Img**, **Mark Words**, **Find Words** e **Sort paragraphs**, além de um bloco **iframe** para incorporar conteúdo externo e um bloco **Quiz**.

### Idioma

A interface do próprio C-Studio pode predefinir-se para francês na primeira vez que a abrir, independentemente do idioma da interface do Chamilo ou do idioma do curso. Se for o caso, vá a **File > UI language** e escolha o seu idioma — o editor recarrega imediatamente e memoriza a sua escolha daí em diante.

![O menu File aberto, a mostrar a opção "UI language"](../../.gitbook/assets/cstudio-file-menu.png)

### Guardar e Exportar

Utilize **File > Save** enquanto trabalha. **File > Export...** empacota o seu projeto como um ficheiro SCORM que pode descarregar, guardar em cópia de segurança ou reutilizar noutro local através de **Import...**. **File > Quit** devolve-o à lista de percursos de aprendizagem, onde o seu projeto C-Studio aparece agora como um item regular.

## Definições do Percurso de Aprendizagem

Configure o comportamento do percurso de aprendizagem:

| Definição | Descrição |
|---------|-------------|
| **Visibility** | Ocultar ou mostrar o percurso de aprendizagem aos formandos |
| **Prerequisites** | Exigir a conclusão de outros percursos de aprendizagem antes deste |
| **Auto-launch** | Abrir automaticamente este percurso de aprendizagem quando os formandos entram no curso |
| **Accumulated SCORM time** | Se o tempo deve ser acumulado ao longo de várias sessões |

## Ligação ao Livro de Notas

Pode incluir a conclusão do percurso de aprendizagem como uma atividade classificada no Livro de Notas. Isto permite que o progresso no percurso de aprendizagem contribua para a nota global do curso do formando e para a elegibilidade para o certificado.

## Utilizar IA

Se o administrador tiver ativado a geração de percursos de aprendizagem assistida por IA, encontrará uma opção de gerador de IA no menu pendente de ações. Dê à IA um contexto tão preciso quanto pretender para o seu percurso de aprendizagem, peça um número de páginas e um número aproximado de palavras por página, indique se deseja preenchê-lo com testes e inicie. Alguns minutos depois, terá à frente um percurso de aprendizagem completo, baseado em texto.

Edite os documentos para gerar ilustrações com mais IA e só lhe restará alguma revisão antes de o partilhar com os seus formandos.

## Dicas

* **Comece com um esboço** — Planeie as suas secções e itens antes de construir o percurso
* **Utilize secções como capítulos** — Agrupe itens relacionados sob títulos de secção para maior clareza
* **Defina pré-requisitos para as avaliações** — Exija que os formandos estudem o conteúdo antes de realizarem um teste
* **Misture tipos de conteúdo** — Combine materiais de leitura, vídeos, exercícios interativos e recursos externos para uma experiência de aprendizagem envolvente
* **Verifique a vista do formando** — Utilize a funcionalidade Vista de Estudante para experienciar o percurso de aprendizagem como um formando o faria
* **Utilize SCORM para interatividade** — Se tiver acesso a ferramentas de autoria SCORM (como Articulate, iSpring ou semelhantes), crie conteúdo interativo rico e importe-o para o Chamilo. Se o seu administrador tiver ativado o plugin C-Studio, pode construir conteúdo interativo semelhante diretamente no Chamilo — consulte [Autoria de Conteúdos com C-Studio](#content-authoring-with-c-studio) acima