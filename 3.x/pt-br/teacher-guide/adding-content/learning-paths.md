# Trilhas de Aprendizagem

As trilhas de aprendizagem permitem criar sequências estruturadas de atividades de aprendizagem. Uma trilha de aprendizagem conduz os alunos por uma ordem específica de documentos, exercícios, links e outros recursos, com pré-requisitos opcionais e acompanhamento de progresso.

Esta ferramenta é, provavelmente, a ferramenta de curso mais utilizada, porque atua como um compositor para muitas outras ferramentas e pode ser, em grande medida, a ***única*** ferramenta visível aos alunos.

## Por que usar trilhas de aprendizagem?

As trilhas de aprendizagem são úteis quando você deseja:

* **Controlar a ordem** de consumo do conteúdo — garantir que os alunos concluam o material fundamental antes de avançar
* **Acompanhar o progresso** — ver exatamente em que ponto cada aluno está na sequência
* **Definir pré-requisitos** — exigir que os alunos sejam aprovados em um exercício antes de acessar a seção seguinte
* **Conceder conclusão** — vincular a conclusão da trilha de aprendizagem ao boletim e aos certificados
* **Empacotar conteúdo** — criar módulos de aprendizagem autônomos que os alunos podem percorrer no próprio ritmo

## Criando uma trilha de aprendizagem

1. Abra a ferramenta **Trilhas de aprendizagem** <img src="/.gitbook/assets/icons/mdi-map-marker-path.svg" alt="Trilhas de aprendizagem" data-size="line"> na página inicial do curso
2. Clique em **Criar uma trilha de aprendizagem**
3. Informe um **título** e uma descrição opcional
4. Salve — você será levado ao editor da trilha de aprendizagem

## O editor da trilha de aprendizagem

![O editor da trilha de aprendizagem com a árvore de itens à esquerda e a pré-visualização do conteúdo à direita](/.gitbook/assets/learning-path-editor.png)

O editor tem duas áreas principais:

* **Painel esquerdo** — A lista de itens (etapas) da trilha de aprendizagem, exibida como uma estrutura em árvore
* **Painel direito** — O conteúdo do item selecionado

### Adicionando itens

Clique em **Adicionar um item** e escolha o que adicionar:

| Tipo de item | Descrição |
|-----------|-------------|
| **Seção** | Um cabeçalho que agrupa itens relacionados (como o título de um capítulo). As seções não contêm conteúdo por si mesmas. |
| **Documento** | Um arquivo ou página web da ferramenta Documentos do seu curso |
| **Exercício** | Um questionário ou teste da ferramenta Exercícios |
| **Link** | Um URL externo |
| **Tarefa** | Uma publicação de aluno da ferramenta Tarefas |
| **Fórum** | Um link para um fórum do curso |
| **Pesquisa** | Um link para uma pesquisa |
| **Certificado** | Uma página especial para acionar a geração de um certificado de conclusão ou a concessão de competências |

### Organizando itens

* **Arraste e solte** itens para reordená-los
* **Aninhe itens** sob seções arrastando-os para a direita
* **Exclua** itens de que você não precisa mais

### Definindo pré-requisitos

Os pré-requisitos garantem que os alunos concluam determinadas etapas antes de acessar outras:

1. Selecione um item na trilha de aprendizagem
2. Abra as configurações de **pré-requisitos**
3. Escolha qual(is) item(ns) precedente(s) deve(m) ser concluído(s) primeiro
4. Para exercícios, você pode exigir uma **pontuação mínima** (por exemplo, "Deve obter pelo menos 70% no Quiz 1 antes de acessar o Módulo 2")

## Experiência do aluno

Quando um aluno abre uma trilha de aprendizagem:

* Ele vê a lista de itens no painel esquerdo
* Os itens concluídos são marcados com um visto
* Os itens com pré-requisitos não atendidos ficam bloqueados
* O progresso é acompanhado automaticamente — se o aluno sair e voltar, ele retoma de onde parou
* Uma barra de progresso mostra o percentual geral de conclusão

## Conteúdo SCORM

A ferramenta de trilha de aprendizagem do Chamilo pode importar pacotes **SCORM 1.2** — o padrão de e-learning mais amplamente utilizado. Envie um arquivo ZIP SCORM e o Chamilo criará uma trilha de aprendizagem a partir dele, acompanhando o progresso e as pontuações de acordo com a especificação SCORM.

Para importar um pacote SCORM:

1. Na ferramenta Trilhas de aprendizagem, abra o menu de ações e clique em **Enviar**
2. Envie o arquivo ZIP
3. O Chamilo descompacta e cria a trilha de aprendizagem automaticamente

### Pacotes CMI5 / xAPI

Pacotes CMI5 (o sucessor moderno do SCORM baseado em xAPI) são suportados por meio do plugin **XApi**. Depois que o plugin for habilitado pelo administrador, você pode importar um pacote CMI5 e os alunos podem iniciá-lo a partir do curso; suas declarações (*statements*) são encaminhadas ao Learning Record Store configurado.

## Autoria de conteúdo com C-Studio

*Disponível se o administrador tiver habilitado o plugin C-Studio.*

O C-Studio adiciona um editor visual integrado, do tipo arrastar e soltar, para criar conteúdo interativo diretamente dentro de uma trilha de aprendizagem — uma alternativa à importação de um pacote SCORM quando você não tem (ou não quer aprender) uma ferramenta de autoria separada, como Articulate ou iSpring. Você constrói o conteúdo página a página no próprio Chamilo, e ele é armazenado e acompanhado como qualquer outro item de trilha de aprendizagem.

### Iniciando um Projeto C-Studio

Quando o plugin está ativo, a lista de Percursos de Aprendizagem exibe um botão extra ao lado do menu de ações usual, marcado com um "+" e com a dica de ferramenta "Studio Tools":

![A lista de percursos de aprendizagem mostrando o botão "Studio Tools" do C-Studio ao lado do menu de ações padrão](/.gitbook/assets/cstudio-lp-button.png)

Clique nele para começar. Será solicitado que você crie um novo projeto do zero ou importe um existente:

![A tela inicial do C-Studio oferecendo criar um novo projeto ou importar um existente](/.gitbook/assets/cstudio-start-screen.png)

Esta tela em particular está disponível atualmente apenas em francês, independentemente do idioma da sua plataforma ou do curso — uma limitação conhecida da versão do plugin em uso. Dê um título ao seu projeto e ele abre diretamente no editor.

### O Editor

![O editor visual do C-Studio, mostrando a tela da página, a paleta de ferramentas à direita e o painel do projeto à esquerda](/.gitbook/assets/cstudio-editor.png)

O editor é um construtor visual página a página:

* **Painel esquerdo** — as páginas do seu projeto, com um "+" para adicionar mais, e uma seção **Tools** na parte inferior (Clean data, Preview, Colors, Options, Quit)
* **Tela central** — a página que você está construindo; clique em qualquer elemento para editá-lo no local
* **Painel direito** — a paleta de componentes, arrastados para a tela

A paleta cobre blocos de construção básicos (colunas, imagens, áudio, títulos, texto, botões, cartões), bem como vários tipos de exercícios interativos: **Drag Drop**, **Fill text**, **Hotspot Img**, **Mark Words**, **Find Words** e **Sort paragraphs**, além de um bloco **iframe** para incorporar conteúdo externo e um bloco **Quiz**.

### Idioma

A própria interface do C-Studio pode iniciar em francês na primeira vez que você a abrir, independentemente do idioma da interface do Chamilo ou do idioma do curso. Se isso ocorrer, vá em **File > UI language** e escolha o seu idioma — o editor recarrega imediatamente e lembra da sua escolha depois.

![O menu File aberto, mostrando a opção "UI language"](/.gitbook/assets/cstudio-file-menu.png)

### Salvando e Exportando

Use **File > Save** enquanto trabalha. **File > Export...** empacota o seu projeto como um arquivo SCORM que você pode baixar, fazer backup ou reutilizar em outro lugar via **Import...**. **File > Quit** retorna você à lista de percursos de aprendizagem, onde o seu projeto C-Studio agora aparece como um item regular.

## Configurações do Percurso de Aprendizagem

Configure como o percurso de aprendizagem se comporta:

| Setting | Description |
|---------|-------------|
| **Visibility** | Ocultar ou exibir o percurso de aprendizagem para os alunos |
| **Prerequisites** | Exigir a conclusão de outros percursos de aprendizagem antes deste |
| **Auto-launch** | Abrir automaticamente este percurso de aprendizagem quando os alunos entram no curso |
| **Accumulated SCORM time** | Se o tempo deve ser acumulado ao longo de várias sessões |

## Vinculação ao Boletim de Notas

Você pode incluir a conclusão do percurso de aprendizagem como uma atividade avaliada no Boletim de Notas. Isso permite que o progresso no percurso de aprendizagem contribua para a nota geral do aluno no curso e para a elegibilidade ao certificado.

## Usando IA

Se o administrador habilitou a geração de percursos de aprendizagem assistida por IA, você encontrará uma opção de gerador de IA no menu suspenso de ações. Forneça à IA um contexto tão preciso quanto desejar para o seu percurso de aprendizagem, peça um número de páginas e um número aproximado de palavras por página, depois indique se deseja preenchê-lo com testes e inicie. Alguns minutos depois, você estará diante de um percurso de aprendizagem completo, baseado em texto.

Edite os documentos para gerar ilustrações com mais IA e restará apenas alguma revisão antes de compartilhá-lo com os seus alunos.

## Dicas

* **Comece com um esboço** — Planeje as suas seções e itens antes de construir o percurso
* **Use seções como capítulos** — Agrupe itens relacionados sob títulos de seção para maior clareza
* **Defina pré-requisitos para as avaliações** — Exija que os alunos estudem o conteúdo antes de fazer um questionário
* **Misture tipos de conteúdo** — Combine materiais de leitura, vídeos, exercícios interativos e recursos externos para uma experiência de aprendizagem envolvente
* **Verifique a visão do aluno** — Use o recurso Visão do Aluno para vivenciar o percurso de aprendizagem como um aluno faria
* **Use SCORM para interatividade** — Se você tiver acesso a ferramentas de autoria SCORM (como Articulate, iSpring ou similares), crie conteúdo interativo rico e importe-o para o Chamilo. Se o seu administrador habilitou o plugin C-Studio, você pode construir conteúdo interativo semelhante diretamente no Chamilo — consulte [Autoria de Conteúdo com C-Studio](#content-authoring-with-c-studio) acima