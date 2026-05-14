# Documentos

A ferramenta de documentos é o repositório de arquivos do seu curso. Você pode fazer upload de arquivos, criar documentos em formato HTML, organizar conteúdo em pastas e fornecer aos alunos acesso a todos os materiais necessários.

## Acessando a Ferramenta de Documentos

Abra a ferramenta **Documentos** <img src="/.gitbook/assets/icons/mdi-bookshelf.svg" alt="Documentos" data-size="line"> na página inicial do curso. Você verá um navegador de arquivos exibindo a pasta raiz da biblioteca de documentos do seu curso.

![O navegador de arquivos de documentos mostrando pastas e arquivos com ícones de ação](/.gitbook/assets/documents-file-browser.png)

## Fazendo Upload de Arquivos

1. Clique no botão **Upload** <img src="/.gitbook/assets/icons/mdi-upload.svg" alt="Upload" data-size="line">
2. Selecione um ou mais arquivos do seu computador (você pode arrastar e soltar arquivos na área de upload)
3. Os arquivos são enviados e aparecem na pasta atual

O Chamilo suporta a maioria dos tipos de arquivo comuns: PDF, documentos de escritório (.docx, .odt), apresentações (.pptx, .odp), planilhas (.xlsx, .ods), imagens (PNG, JPG, SVG, GIF), arquivos de áudio, arquivos de vídeo (incluindo WEBM), arquivos HTML e mais.

Alguns formatos podem ser proibidos pelo administrador do portal por meio de configurações de filtro de lista branca/negra na seção de segurança da administração.

Para melhor legibilidade pelos alunos, recomendamos fazer upload de arquivos que um navegador possa visualizar ou abrir sem ferramentas adicionais. Isso torna seu curso mais portátil e, consequentemente, mais acessível a dispositivos móveis e mais legível para pessoas com necessidades especiais.

## Criando Conteúdo

Além de fazer upload de arquivos, você pode criar conteúdo diretamente no Chamilo:

### Páginas Web

1. Clique em **Novo documento**
2. Use o editor de texto rico para escrever seu conteúdo com formatação, imagens, tabelas e links
3. Insira um **título** para a página
4. Salve

O editor de texto rico (TinyMCE) oferece recursos semelhantes a um processador de texto, incluindo:

* Formatação de texto (negrito, itálico, títulos, listas)
* Tabelas
* Imagens (fazer upload ou vincular a imagens existentes)
* Vídeos e áudios incorporados
* Links para outros recursos
* Edição de código-fonte HTML para usuários avançados

### Geração de Mídia por IA

Quando os assistentes de IA estão habilitados na plataforma, você pode solicitar à IA que gere uma **imagem** ou um **vídeo curto** para ilustrar um parágrafo no documento que está editando. Selecione um parágrafo, abra o diálogo **Gerar mídia por IA**, e a IA produzirá um item de mídia que você pode revisar e inserir. O diálogo respeita as permissões no nível do curso e só aparece em cursos onde a geração de mídia por IA é permitida.

### Gravação de Áudio

Se o seu navegador suportar, você pode gravar áudio diretamente na ferramenta de documentos — útil para criar instruções em áudio ou conteúdo para aprendizado de idiomas. Isso requer uma configuração HTTPS para o Chamilo, pois a gravação de áudio utiliza tecnologia que o navegador só permite se a conexão for segura.

## Organizando com Pastas

Mantenha sua biblioteca de documentos organizada usando pastas:

1. Clique em **Nova pasta** <img src="/.gitbook/assets/icons/mdi-folder-plus.svg" alt="Nova pasta" data-size="line">
2. Insira um nome para a pasta
3. Salve

Você pode criar pastas aninhadas para construir uma hierarquia lógica de conteúdo (por exemplo, `Módulo 1 > Semana 1 > Leituras`).

### Movendo Arquivos

* Localize seu arquivo na lista
* Clique em **Mover** <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Mover" data-size="line">
* Selecione a pasta de destino
* Confirme

## Gerenciando Documentos

Para cada arquivo ou pasta, você pode:

| Ação | Ícone | Descrição |
|------|-------|-----------|
| **Editar** | <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="Editar" data-size="line"> | Renomear o arquivo ou editar seu conteúdo (para páginas web) |
| **Excluir** | <img src="/.gitbook/assets/icons/mdi-delete.svg" alt="Excluir" data-size="line"> | Remover o arquivo ou pasta |
| **Baixar** | <img src="/.gitbook/assets/icons/mdi-download-box.svg" alt="Baixar" data-size="line"> | Baixar o arquivo para o seu computador |
| **Visibilidade** | <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="Visibilidade" data-size="line"> | Ocultar ou mostrar o arquivo para os alunos |
| **Substituir** | <img src="/.gitbook/assets/icons/mdi-file-replace.svg" alt="Substituir" data-size="line"> | Substituir o arquivo por uma versão atualizada |
| **Mover** | <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Mover" data-size="line"> | Mover para uma pasta diferente |

Substituir um arquivo é um recurso importante quando você usa documentos para construir caminhos de aprendizado, pois substituir o documento permitirá que ele seja atualizado sem que os alunos percam o progresso salvo para esse documento.

### Ações em Massa

Selecione vários arquivos usando caixas de seleção, então use a barra de ferramentas para excluir ou baixar todos os itens selecionados de uma só vez.

---
## Integração com OnlyOffice

Se o seu administrador configurou o plugin **OnlyOffice**, você pode editar arquivos do Word, Excel e PowerPoint (ou LibreOffice) diretamente no navegador sem precisar baixá-los. Procure pela opção **Editar com OnlyOffice** <img src="/.gitbook/assets/icons/mdi-file-document-edit-outline.svg" alt="OnlyOffice" data-size="line"> ao visualizar um arquivo compatível.

Os documentos são armazenados no Chamilo, o OnlyOffice é usado apenas para **visualizar** ou editar os documentos no navegador, sem a necessidade de ferramentas adicionais.

## Arquivos na Nuvem

Se você utiliza armazenamento em nuvem (Azure Blob, AWS S3 ou Google Cloud) para seus arquivos, eles são armazenados na nuvem, mas você pode vinculá-los a partir daqui. Isso é transparente para você e seus alunos — a ferramenta de documentos funciona da mesma forma, independentemente do backend de armazenamento.

## Dicas

* **Organize desde o início** — Crie a estrutura de pastas antes de fazer upload de conteúdo para evitar reorganizar depois. Se você já criou outros cursos com a estrutura correta, pode usá-los como modelo posteriormente
* **Use nomes de arquivo descritivos** — Ajude os alunos a encontrar o que precisam com nomes claros e significativos
* **Oculte trabalhos em andamento** — Use o alternador de visibilidade para esconder documentos que ainda está preparando
* **Vincule a partir de trilhas de aprendizagem** — Referencie documentos dentro de suas trilhas de aprendizagem para criar sequências de aprendizado guiadas
* **Verifique a cota de disco** — Se o seu curso tiver um limite de armazenamento, remova arquivos desatualizados para liberar espaço