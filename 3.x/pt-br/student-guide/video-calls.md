# Chamadas de Vídeo Individuais

O Chamilo inclui **chamadas de vídeo individuais** opcionais no **chat flutuante da plataforma**. Ele usa o suporte a WebRTC do navegador para conectar duas pessoas que estão usando o Chamilo. Isso é diferente da **ferramenta de Chat do curso** e das reuniões criadas com BigBlueButton ou Zoom.

Este recurso foi introduzido e aprimorado para a [issue #3777](https://github.com/chamilo/chamilo-lms/issues/3777) nos PRs [#9102](https://github.com/chamilo/chamilo-lms/pull/9102), [#9110](https://github.com/chamilo/chamilo-lms/pull/9110), [#9112](https://github.com/chamilo/chamilo-lms/pull/9112), [#9127](https://github.com/chamilo/chamilo-lms/pull/9127) e [#9128](https://github.com/chamilo/chamilo-lms/pull/9128).

## Antes de Começar

* O administrador deve permitir o uso do chat flutuante da plataforma e definir **Ocultar a opção de videochat no chat global** (`chat.hide_chat_video`) como **Não**. Ela fica oculta por padrão. Consulte [Configurações de chat](../admin-guide/platform-settings/chat-settings.md).
* Use um navegador compatível com WebRTC, com permissão para acessar a câmera e o microfone. O acesso a mídia do navegador normalmente exige HTTPS (ou um contexto local de desenvolvimento confiável).
* Esteja conectado e defina seu status de chat como **online**. Escolha um contato de usuário comum; o botão de vídeo não aparece para um bot ou quando o recurso está desativado.
* O outro usuário deve estar disponível para receber e aceitar a chamada.

## Iniciando uma Chamada

1. Abra o **painel de chat flutuante** na parte inferior do Chamilo (não a página de Chat do próprio curso).
2. Selecione a pessoa com quem deseja entrar em contato.
3. No cabeçalho da conversa, clique no ícone de câmera **Iniciar chamada de vídeo**.
4. Conceda acesso à câmera e ao microfone quando o navegador solicitar.
5. A chamada exibe **Chamando...** enquanto o Chamilo aguarda o outro usuário. Quando ele aceita, o status muda de **Conectando...** para **Conectado** depois que a conexão entre pares é estabelecida.

Uma chamada não atendida expira em vez de continuar indefinidamente. Se o outro usuário recusar ou cancelar, o chat exibe uma mensagem de status explicativa.

## Recebendo e Gerenciando uma Chamada

Quando um contato liga, o chat flutuante exibe uma caixa de diálogo **Chamada de vídeo recebida**. Escolha **Aceitar** para participar ou **Rejeitar** para recusar. Aceitar também pode solicitar permissão para usar a câmera e o microfone.

Durante uma chamada, você pode **silenciar ou reativar o microfone**, **ligar ou desligar a câmera** e **desligar**. Uma pequena pré-visualização mostra o seu vídeo local, enquanto a área principal mostra a outra pessoa. Fechar ou encerrar a chamada libera os fluxos locais de áudio/vídeo.

Esta é uma **chamada privada entre dois usuários**, não uma reunião de todo o curso. Para realizar uma sessão em grupo agendada com gravação ou ferramentas de colaboração, use a integração de [Videoconferência](../teacher-guide/collaboration-and-communication/video-conferencing.md) da sua organização.

## Se a Chamada de Vídeo Não Estiver Disponível

* **Sem o ícone Iniciar chamada de vídeo:** Verifique a configuração `chat.hide_chat_video` da plataforma, se o chat flutuante está disponível, seu status online e o suporte a WebRTC do navegador.
* **Erro de câmera ou microfone:** Permita as permissões de mídia no navegador e verifique se o hardware está presente e não está sendo usado por outro aplicativo.
* **Sem resposta:** Peça ao seu contato para abrir o Chamilo e verificar a disponibilidade. A solicitação de saída tem um tempo limite.
* **A conexão falha após a aceitação:** Tente outra rede e verifique as permissões do navegador ou restrições de firewall. A implementação atual de WebRTC usa um servidor STUN público e não configura um relay TURN, portanto a conectividade pode falhar em redes restritivas. O chat de texto ainda pode funcionar se a sinalização de vídeo falhar.

Não é necessário configurar o BigBlueButton ou o Zoom para este recurso de chamada direta; essas integrações oferecem um tipo separado de reunião.