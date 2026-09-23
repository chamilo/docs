# Documentos

A ferramenta de documentos é o repositório de ficheiros do seu curso. Pode carregar ficheiros, criar documentos em formato HTML, organizar o conteúdo em pastas e dar aos formandos acesso a todos os materiais de que necessitam.

## Aceder à ferramenta Documentos

Abra a ferramenta **Documentos** <img src="../../.gitbook/assets/icons/mdi-bookshelf.svg" alt="Documentos" data-size="line"> a partir da página inicial do curso. Verá um explorador de ficheiros que mostra a pasta raiz da biblioteca de documentos do seu curso.

![O explorador de ficheiros de documentos a mostrar pastas e ficheiros com ícones de ação](../../.gitbook/assets/documents-file-browser.png)

## Carregar ficheiros

1. Clique no botão **Carregar** <img src="../../.gitbook/assets/icons/mdi-upload.svg" alt="Carregar" data-size="line">
2. Selecione um ou mais ficheiros no seu computador (pode arrastar e largar ficheiros na área de carregamento)
3. Os ficheiros são carregados e aparecem na pasta atual

O Chamilo suporta a maioria dos tipos de ficheiro comuns: PDF, documentos de escritório (.docx, .odt), apresentações (.pptx, .odp), folhas de cálculo (.xlsx, .ods), imagens (PNG, JPG, SVG, GIF), ficheiros de áudio, ficheiros de vídeo (incluindo WEBM), ficheiros HTML e outros.

Alguns formatos podem ser proibidos pelo administrador do portal através de uma definição de filtragem por lista branca/lista negra na secção de segurança da administração.

Para uma melhor legibilidade pelos formandos, recomendamos o carregamento de ficheiros que um navegador consiga visualizar ou abrir sem ferramentas adicionais. Isto torna o seu curso mais portátil e, como tal, mais acessível a dispositivos móveis e mais legível para pessoas com necessidades especiais.

## Criar conteúdo

Além de carregar ficheiros, pode criar conteúdo diretamente no Chamilo:

### Páginas Web

1. Clique em **Novo documento**
2. Utilize o editor de texto avançado para escrever o seu conteúdo com formatação, imagens, tabelas e ligações
3. Introduza um **título** para a página
4. Guarde

O editor de texto avançado (TinyMCE) oferece funcionalidades semelhantes às de um processador de texto, incluindo:

* Formatação de texto (negrito, itálico, títulos, listas)
* Tabelas
* Imagens (carregar ou ligar a imagens existentes)
* Vídeos e áudio incorporados
* Ligações para outros recursos
* Edição da origem HTML para utilizadores avançados

### Geração de média por IA

Quando os assistentes de IA estão ativados na plataforma, pode pedir à IA que gere uma **imagem** ou um **vídeo curto** para ilustrar um parágrafo no documento que está a editar. Selecione um parágrafo, abra a caixa de diálogo **Gerar média com IA** e a IA produzirá um item de média que pode rever e inserir. A caixa de diálogo respeita as permissões ao nível do curso e só aparece em cursos em que a geração de média por IA é permitida.

### Gravação de áudio

Se o seu navegador o suportar, pode gravar áudio diretamente na ferramenta de documentos — útil para criar instruções em áudio ou conteúdo de aprendizagem de línguas. Isto requer uma configuração HTTPS para o Chamilo, uma vez que a gravação de áudio utiliza tecnologia que o navegador só permite se a ligação for segura.

## Organizar com pastas

Mantenha a sua biblioteca de documentos organizada utilizando pastas:

1. Clique em **Nova pasta** <img src="../../.gitbook/assets/icons/mdi-folder-plus.svg" alt="Nova pasta" data-size="line">
2. Introduza um nome de pasta
3. Guarde

Pode criar pastas aninhadas para construir uma hierarquia lógica de conteúdo (por exemplo, `Module 1 > Week 1 > Readings`).

### Mover ficheiros

* Localize o ficheiro na lista
* Clique em **Mover** <img src="../../.gitbook/assets/icons/mdi-folder-move.svg" alt="Mover" data-size="line">
* Selecione a pasta de destino
* Confirme

## Gerir documentos

Para cada ficheiro ou pasta, pode:

| Ação | Ícone | Descrição |
|--------|------|-------------|
| **Editar** | <img src="../../.gitbook/assets/icons/mdi-pencil.svg" alt="Editar" data-size="line"> | Mudar o nome do ficheiro ou editar o seu conteúdo (para páginas Web) |
| **Eliminar** | <img src="../../.gitbook/assets/icons/mdi-delete.svg" alt="Eliminar" data-size="line"> | Remover o ficheiro ou a pasta |
| **Descarregar** | <img src="../../.gitbook/assets/icons/mdi-download-box.svg" alt="Descarregar" data-size="line"> | Descarregar o ficheiro para o seu computador |
| **Visibilidade** | <img src="../../.gitbook/assets/icons/mdi-eye.svg" alt="Visibilidade" data-size="line"> | Ocultar ou mostrar o ficheiro aos formandos |
| **Substituir** | <img src="../../.gitbook/assets/icons/mdi-file-replace.svg" alt="Substituir" data-size="line"> | Substituir o ficheiro por uma versão atualizada |
| **Mover** | <img src="../../.gitbook/assets/icons/mdi-folder-move.svg" alt="Mover" data-size="line"> | Mover para uma pasta diferente |

Substituir um ficheiro é uma funcionalidade importante quando utiliza documentos para construir percursos de aprendizagem, pois a substituição do documento permite atualizá-lo sem que os formandos percam o progresso guardado para esse documento.

### Ações em lote

Selecione vários ficheiros utilizando as caixas de verificação e, em seguida, utilize a barra de ferramentas para eliminar ou descarregar todos os itens selecionados de uma só vez.

## Integração OnlyOffice

Se o administrador tiver configurado o plugin **OnlyOffice**, pode editar ficheiros Word, Excel e PowerPoint (ou LibreOffice) diretamente no navegador, sem os descarregar. Procure a opção **Edit with OnlyOffice** <img src="../../.gitbook/assets/icons/mdi-file-document-edit-outline.svg" alt="OnlyOffice" data-size="line"> ao visualizar um ficheiro suportado.

Os documentos são armazenados no Chamilo; o OnlyOffice é utilizado apenas para **visualizar** ou editar os documentos no navegador, sem necessidade de qualquer ferramenta adicional.

## Ficheiros na nuvem

Se utilizar armazenamento na nuvem (Azure Blob, AWS S3 ou Google Cloud) para os seus ficheiros, estes são guardados na nuvem, mas pode ligá-los a partir daqui. Isto é transparente para si e para os seus formandos — a ferramenta de documentos funciona da mesma forma, independentemente do backend de armazenamento.

## Dicas

* **Organize cedo** — Crie a estrutura de pastas antes de carregar conteúdo, para não ter de reorganizar mais tarde. Se tiver criado outros cursos com a estrutura adequada, pode utilizá-los como modelo posteriormente
* **Use nomes de ficheiro descritivos** — Ajude os formandos a encontrar o que precisam com nomes claros e significativos
* **Oculte trabalho em curso** — Utilize o interruptor de visibilidade para ocultar documentos que ainda está a preparar
* **Ligue a partir de percursos de aprendizagem** — Referencie documentos nos seus percursos de aprendizagem para criar sequências de aprendizagem guiadas
* **Verifique a quota de disco** — Se o seu curso tiver um limite de armazenamento, remova ficheiros desatualizados para libertar espaço