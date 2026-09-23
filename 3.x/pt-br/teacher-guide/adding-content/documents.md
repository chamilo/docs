# Documentos

A ferramenta de documentos é o repositório de arquivos do seu curso. Você pode enviar arquivos, criar documentos em formato HTML, organizar o conteúdo em pastas e dar aos alunos acesso a todos os materiais de que precisam.

## Acessando a Ferramenta Documentos

Abra a ferramenta **Documentos** <img src="../../.gitbook/assets/icons/mdi-bookshelf.svg" alt="Documentos" data-size="line"> na página inicial do curso. Você verá um navegador de arquivos mostrando a pasta raiz da biblioteca de documentos do seu curso.

![O navegador de arquivos de documentos mostrando pastas e arquivos com ícones de ação](../../.gitbook/assets/documents-file-browser.png)

## Enviando Arquivos

1. Clique no botão **Enviar** <img src="../../.gitbook/assets/icons/mdi-upload.svg" alt="Enviar" data-size="line">
2. Selecione um ou mais arquivos no seu computador (você pode arrastar e soltar arquivos na área de envio)
3. Os arquivos são enviados e aparecem na pasta atual

O Chamilo oferece suporte à maioria dos tipos de arquivo comuns: PDF, documentos de escritório (.docx, .odt), apresentações (.pptx, .odp), planilhas (.xlsx, .ods), imagens (PNG, JPG, SVG, GIF), arquivos de áudio, arquivos de vídeo (incluindo WEBM), arquivos HTML e outros.

Alguns formatos podem ser proibidos pelo administrador do portal por meio de uma configuração de filtragem de lista de permissão/lista de bloqueio na seção de segurança da administração.

Para melhor legibilidade pelos alunos, recomendamos o envio de arquivos que um navegador possa visualizar ou abrir sem ferramentas adicionais. Isso torna o seu curso mais portátil e, portanto, mais acessível a dispositivos móveis e mais legível para pessoas com necessidades especiais.

## Criando Conteúdo

Além de enviar arquivos, você pode criar conteúdo diretamente no Chamilo:

### Páginas Web

1. Clique em **Novo documento**
2. Use o editor de texto avançado para escrever o seu conteúdo com formatação, imagens, tabelas e links
3. Informe um **título** para a página
4. Salve

O editor de texto avançado (TinyMCE) oferece recursos semelhantes aos de um processador de texto, incluindo:

* Formatação de texto (negrito, itálico, títulos, listas)
* Tabelas
* Imagens (enviar ou vincular a imagens existentes)
* Vídeos e áudio incorporados
* Links para outros recursos
* Edição do código-fonte HTML para usuários avançados

### Geração de mídia por IA

Quando os assistentes de IA estão habilitados na plataforma, você pode pedir à IA que gere uma **imagem** ou um **vídeo curto** para ilustrar um parágrafo no documento que você está editando. Selecione um parágrafo, abra o diálogo **Gerar mídia com IA** e a IA produzirá um item de mídia que você pode revisar e inserir. O diálogo respeita as permissões no nível do curso e só aparece em cursos em que a geração de mídia por IA é permitida.

### Gravação de Áudio

Se o seu navegador oferecer suporte, você pode gravar áudio diretamente na ferramenta de documentos — útil para criar instruções em áudio ou conteúdo de aprendizagem de idiomas. Isso exige uma configuração HTTPS para o Chamilo, pois a gravação de áudio usa tecnologia que o navegador só permite se a conexão for segura.

## Organizando com Pastas

Mantenha a sua biblioteca de documentos organizada usando pastas:

1. Clique em **Nova pasta** <img src="../../.gitbook/assets/icons/mdi-folder-plus.svg" alt="Nova pasta" data-size="line">
2. Informe um nome de pasta
3. Salve

Você pode criar pastas aninhadas para construir uma hierarquia lógica de conteúdo (por exemplo, `Module 1 > Week 1 > Readings`).

### Movendo Arquivos

* Localize o arquivo na lista
* Clique em **Mover** <img src="../../.gitbook/assets/icons/mdi-folder-move.svg" alt="Mover" data-size="line">
* Selecione a pasta de destino
* Confirme

## Gerenciando Documentos

Para cada arquivo ou pasta, você pode:

| Ação | Ícone | Descrição |
|--------|------|-------------|
| **Editar** | <img src="../../.gitbook/assets/icons/mdi-pencil.svg" alt="Editar" data-size="line"> | Renomear o arquivo ou editar o seu conteúdo (para páginas web) |
| **Excluir** | <img src="../../.gitbook/assets/icons/mdi-delete.svg" alt="Excluir" data-size="line"> | Remover o arquivo ou a pasta |
| **Baixar** | <img src="../../.gitbook/assets/icons/mdi-download-box.svg" alt="Baixar" data-size="line"> | Baixar o arquivo para o seu computador |
| **Visibilidade** | <img src="../../.gitbook/assets/icons/mdi-eye.svg" alt="Visibilidade" data-size="line"> | Ocultar ou mostrar o arquivo aos alunos |
| **Substituir** | <img src="../../.gitbook/assets/icons/mdi-file-replace.svg" alt="Substituir" data-size="line"> | Substituir o arquivo por uma versão atualizada |
| **Mover** | <img src="../../.gitbook/assets/icons/mdi-folder-move.svg" alt="Mover" data-size="line"> | Mover para outra pasta |

Substituir um arquivo é um recurso importante quando você usa documentos para construir percursos de aprendizagem, pois a substituição do documento permite que ele seja atualizado sem que os alunos percam o progresso salvo para aquele documento.

### Ações em Lote

Selecione vários arquivos usando as caixas de seleção e, em seguida, use a barra de ferramentas para excluir ou baixar todos os itens selecionados de uma só vez.

## Integração com o OnlyOffice

Se o administrador tiver configurado o plugin **OnlyOffice**, você pode editar arquivos Word, Excel e PowerPoint (ou LibreOffice) diretamente no navegador, sem baixá-los. Procure a opção **Editar com OnlyOffice** <img src="../../.gitbook/assets/icons/mdi-file-document-edit-outline.svg" alt="OnlyOffice" data-size="line"> ao visualizar um arquivo compatível.

Os documentos são armazenados no Chamilo; o OnlyOffice é usado apenas para **visualizar** ou editar os documentos no navegador, sem necessidade de nenhuma ferramenta adicional.

## Arquivos na nuvem

Se você usa armazenamento em nuvem (Azure Blob, AWS S3 ou Google Cloud) para seus arquivos, eles ficam armazenados na nuvem, mas você pode vinculá-los a partir daqui. Isso é transparente para você e para os alunos — a ferramenta de documentos funciona da mesma forma, independentemente do backend de armazenamento.

## Dicas

* **Organize cedo** — Crie a estrutura de pastas antes de enviar o conteúdo, para não precisar reorganizar depois. Se você já criou outros cursos com a estrutura adequada, poderá usá-los como modelo mais adiante
* **Use nomes de arquivo descritivos** — Ajude os alunos a encontrar o que precisam com nomes claros e significativos
* **Oculte o trabalho em andamento** — Use o controle de visibilidade para ocultar documentos que ainda está preparando
* **Vincule a partir de percursos de aprendizagem** — Referencie documentos dentro dos percursos de aprendizagem para criar sequências de aprendizagem guiadas
* **Verifique a cota de disco** — Se o curso tiver limite de armazenamento, remova arquivos desatualizados para liberar espaço