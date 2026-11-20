# Plantas baixas de filiais e mapas de salas

O Chamilo 3.1 pode associar uma imagem de planta baixa a uma filial e marcar as posições das salas nessa imagem com polígonos interativos. O recurso ajuda os estudantes a localizar as salas atribuídas; **não** se trata de um mapa geográfico de GPS.

## Anexar uma planta baixa da filial

1. Abra a área de administração de **Filiais** e edite a filial desejada.
2. Localize o painel **Planta baixa**.
3. Escolha ou envie a imagem e selecione **Anexar planta baixa** (ou **Alterar planta baixa**, se já existir uma).
4. Salve ou confirme as alterações da filial conforme necessário e, em seguida, verifique se a imagem da planta baixa é carregada.

Se uma planta não for mais válida, use **Remover planta baixa** depois de verificar quais salas fazem referência a ela. Envie apenas conteúdo confiável e siga as permissões da tela de administração de filiais.

## Delimitar salas

1. Edite uma sala atribuída a essa filial.
2. Localize **Sala na planta baixa** no formulário da sala.
3. Use a ferramenta de polígono para traçar o contorno da sala. Use **Editar** para ajustar os vértices; todos os pontos devem permanecer dentro da imagem.
4. Selecione **Salvar área da sala** e, em seguida, salve o formulário da sala para persistir as alterações.
5. Abra um visualizador de sala para confirmar a posição correta. Use **Limpar área da sala** se o mapeamento precisar ser removido.

Uma sala tem um polígono editável por vez. O mapeamento da sala é independente da imagem no nível da filial; portanto, atualizar a imagem pode exigir a verificação dos contornos existentes das salas.

## Onde os mapas aparecem

Usuários autorizados podem visualizar as plantas baixas das salas quando as salas são selecionadas ou exibidas nas informações do curso, em eventos do calendário e em fluxos relacionados à frequência. Verifique a visibilidade usando os papéis que realmente visualizarão as informações, especialmente estudantes e participantes de sessões.

As permissões de acesso de filiais e salas também se aplicam aos recursos de planta baixa. Em instalações com múltiplas URLs, verifique o isolamento correto de portal/filial antes de publicar os mapas.

Consulte [Gerenciamento de salas](managing-rooms.md) e [Localizador de disponibilidade de salas](room-availability-finder.md). Implementações: [PR #9321](https://github.com/chamilo/chamilo-lms/pull/9321), [PR #9451](https://github.com/chamilo/chamilo-lms/pull/9451).