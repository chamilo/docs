# Plantas de piso de filiais e mapas de salas

O Chamilo 3.1 pode associar uma imagem de planta de piso a uma filial e marcar as posições das salas nessa imagem com polígonos interativos. A funcionalidade ajuda os estudantes a localizar as salas atribuídas; **não** é um mapa geográfico GPS.

## Anexar uma planta de piso da filial

1. Abra a área de administração de **Filiais** e edite a filial pretendida.
2. Localize o painel **Planta de piso**.
3. Escolha ou carregue a imagem e selecione **Anexar planta de piso** (ou **Alterar planta de piso**, se já existir uma).
4. Guarde ou confirme as alterações da filial, conforme necessário, e verifique se a imagem da planta de piso é carregada.

Se uma planta deixar de ser válida, utilize **Remover planta de piso** depois de verificar quais salas lhe fazem referência. Carregue apenas conteúdo fidedigno e respeite as permissões do ecrã de administração de filiais.

## Delimitar salas

1. Edite uma sala atribuída a essa filial.
2. Localize **Sala na planta de piso** no formulário da sala.
3. Utilize a ferramenta de polígono para traçar o contorno da sala. Utilize **Editar** para ajustar os vértices; todos os pontos devem permanecer dentro da imagem.
4. Selecione **Guardar área da sala** e, em seguida, guarde o formulário da sala para persistir as alterações.
5. Abra um visualizador de sala para confirmar a posição correta. Utilize **Limpar área da sala** se o mapeamento dever ser removido.

Uma sala tem um único polígono editável de cada vez. O mapeamento da sala é independente da imagem ao nível da filial, pelo que a atualização da imagem pode exigir a verificação dos contornos de sala existentes.

## Onde os mapas aparecem

Os utilizadores autorizados podem visualizar as plantas de piso das salas quando estas são selecionadas ou apresentadas nas informações do curso, nos eventos do calendário e nos fluxos relacionados com a assiduidade. Verifique a visibilidade com os papéis que irão efetivamente consultar a informação, em especial estudantes e participantes de sessões.

As permissões de acesso a filiais e salas aplicam-se também aos recursos de planta de piso. Em instalações multi-URL, verifique o isolamento correto do portal/filial antes de publicar os mapas.

Consulte [Gerir salas](managing-rooms.md) e [Localizador de disponibilidade de salas](room-availability-finder.md). Implementações: [PR #9321](https://github.com/chamilo/chamilo-lms/pull/9321), [PR #9451](https://github.com/chamilo/chamilo-lms/pull/9451).