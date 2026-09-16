# Caminhos de Aprendizagem

Os caminhos de aprendizagem permitem criar sequências estruturadas de atividades de aprendizado. Um caminho de aprendizagem orienta seus alunos por uma ordem específica de documentos, exercícios, links e outros recursos, com pré-requisitos opcionais e acompanhamento de progresso.

Esta ferramenta é, sem dúvida, a mais utilizada no curso, pois atua como um compositor para muitas outras ferramentas e pode ser, de fato, a ***única*** ferramenta voltada para os alunos.

## Por que Usar Caminhos de Aprendizagem?

Os caminhos de aprendizagem são úteis quando você deseja:

* **Controlar a ordem** de consumo de conteúdo — garantir que os alunos concluam o material básico antes de avançar
* **Acompanhar o progresso** — ver exatamente onde cada aluno está na sequência
* **Definir pré-requisitos** — exigir que os alunos passem em um exercício antes de acessar a próxima seção
* **Conceder conclusão** — vincular a conclusão do caminho de aprendizagem ao livro de notas e certificados
* **Empacotar conteúdo** — criar módulos de aprendizagem autônomos que os alunos possam trabalhar no seu próprio ritmo

## Criando um Caminho de Aprendizagem

1. Abra a ferramenta **Caminhos de aprendizagem** <img src="/.gitbook/assets/icons/mdi-map-marker-path.svg" alt="Caminhos de aprendizagem" data-size="line"> na página inicial do curso
2. Clique em **Criar um caminho de aprendizagem**
3. Insira um **título** e uma descrição opcional
4. Salve — você será levado ao editor de caminho de aprendizagem

## O Editor de Caminho de Aprendizagem

![O editor de caminho de aprendizagem com a árvore de itens à esquerda e a pré-visualização do conteúdo à direita](/.gitbook/assets/learning-path-editor.png)

O editor possui duas áreas principais:

* **Painel esquerdo** — A lista de itens (etapas) no caminho de aprendizagem, exibida como uma estrutura em árvore
* **Painel direito** — O conteúdo do item selecionado

### Adicionando Itens

Clique em **Adicionar um item** e escolha o que adicionar:

| Tipo de Item | Descrição |
|--------------|-----------|
| **Seção** | Um cabeçalho que agrupa itens relacionados (como um título de capítulo). As seções não contêm conteúdo por si mesmas. |
| **Documento** | Um arquivo ou página da web da ferramenta Documentos do seu curso |
| **Exercício** | Um questionário ou teste da ferramenta Exercícios |
| **Link** | Uma URL externa |
| **Tarefa** | Uma publicação de aluno da ferramenta Tarefas |
| **Fórum** | Um link para um fórum do curso |
| **Pesquisa** | Um link para uma pesquisa |
| **Certificado** | Uma página especial para disparar a geração de um certificado de conclusão ou a concessão de competências |

### Organizando Itens

* **Arraste e solte** itens para reordená-los
* **Aninhe itens** sob seções arrastando-os para a direita
* **Exclua** itens que não são mais necessários

### Definindo Pré-requisitos

Os pré-requisitos garantem que os alunos concluam certas etapas antes de acessar outras:

1. Selecione um item no caminho de aprendizagem
2. Abra as configurações de **pré-requisitos**
3. Escolha qual(is) item(ns) anterior(es) deve(m) ser concluído(s) primeiro
4. Para exercícios, você pode exigir uma **pontuação mínima** (por exemplo, "Deve obter pelo menos 70% no Questionário 1 antes de acessar o Módulo 2")

## Experiência do Aluno

Quando um aluno abre um caminho de aprendizagem:

* Ele vê a lista de itens no painel esquerdo
* Itens concluídos são marcados com um sinal de verificação
* Itens com pré-requisitos não atendidos estão bloqueados
* O progresso é rastreado automaticamente — se um aluno sair e voltar, ele retoma de onde parou
* Uma barra de progresso mostra a porcentagem de conclusão geral

## Conteúdo SCORM

A ferramenta de caminho de aprendizagem do Chamilo pode importar pacotes **SCORM 1.2** — o padrão de e-learning mais amplamente utilizado. Faça upload de um arquivo ZIP SCORM e o Chamilo criará um caminho de aprendizagem a partir dele, rastreando progresso e pontuações de acordo com a especificação SCORM.

Para importar um pacote SCORM:

1. Na ferramenta Caminhos de aprendizagem, abra o menu de ações e clique em **Upload**
2. Faça upload do arquivo ZIP
3. O Chamilo descompacta e cria o caminho de aprendizagem automaticamente

### Pacotes CMI5 / xAPI

Pacotes CMI5 (o sucessor moderno baseado em xAPI do SCORM) são suportados por meio do plugin **XApi**. Uma vez que o plugin é habilitado pelo seu administrador, você pode importar um pacote CMI5 e os alunos podem iniciá-lo a partir do curso; suas declarações são encaminhadas para o Learning Record Store configurado.

## Configurações do Caminho de Aprendizagem

Configure como o caminho de aprendizagem se comporta:

| Configuração | Descrição |
|--------------|-----------|
| **Visibilidade** | Ocultar ou mostrar o caminho de aprendizagem para os alunos |
| **Pré-requisitos** | Exigir a conclusão de outros caminhos de aprendizagem antes deste |
| **Início automático** | Abrir automaticamente este caminho de aprendizagem quando os alunos entrarem no curso |
| **Tempo SCORM acumulado** | Se deve acumular tempo ao longo de várias sessões |

## Vinculando ao Livro de Notas

Você pode incluir a conclusão do caminho de aprendizagem como uma atividade avaliada no Livro de Notas. Isso permite que o progresso no caminho de aprendizagem contribua para a nota geral do curso do aluno e para a elegibilidade ao certificado.

## Usando IA

Se o administrador tiver habilitado a geração de caminhos de aprendizagem assistidos por IA, você encontrará uma opção de gerador de IA no menu suspenso de ações. Forneça à IA um contexto tão preciso quanto desejar para o seu caminho de aprendizagem, solicite um número de páginas e um número aproximado de palavras por página, e então informe se deseja preenchê-lo com testes e lançá-lo. Alguns minutos depois, você estará olhando para um caminho de aprendizagem completo, baseado em texto.

Edite os documentos para gerar ilustrações com mais IA e você terá apenas algumas revisões a fazer antes de compartilhá-lo com seus alunos.

## Dicas

* **Comece com um esboço** — Planeje suas seções e itens antes de construir o caminho
* **Use seções como capítulos** — Agrupe itens relacionados sob títulos de seção para maior clareza
* **Defina pré-requisitos para avaliações** — Exija que os alunos estudem o conteúdo antes de fazer um teste
* **Misture tipos de conteúdo** — Combine materiais de leitura, vídeos, exercícios interativos e recursos externos para uma experiência de aprendizagem envolvente
* **Verifique a visão do aluno** — Use o recurso de Visualização do Aluno para experimentar o caminho de aprendizagem como um aluno o faria
* **Use SCORM para interatividade** — Se você tiver acesso a ferramentas de autoria SCORM (como Articulate, iSpring ou similares), crie conteúdo interativo rico e importe-o para o Chamilo