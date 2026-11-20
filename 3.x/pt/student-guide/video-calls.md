# Chamadas de Vídeo Um para Um

O Chamilo inclui **chamadas de vídeo um para um** opcionais no **chat flutuante da plataforma**. Utiliza o suporte WebRTC do navegador para ligar duas pessoas que estão a utilizar o Chamilo. Isto é diferente da **ferramenta de Chat do curso** e das reuniões criadas com o BigBlueButton ou o Zoom.

Esta funcionalidade foi introduzida e melhorada para a [issue #3777](https://github.com/chamilo/chamilo-lms/issues/3777) nos PRs [#9102](https://github.com/chamilo/chamilo-lms/pull/9102), [#9110](https://github.com/chamilo/chamilo-lms/pull/9110), [#9112](https://github.com/chamilo/chamilo-lms/pull/9112), [#9127](https://github.com/chamilo/chamilo-lms/pull/9127) e [#9128](https://github.com/chamilo/chamilo-lms/pull/9128).

## Antes de Começar

* O administrador deve permitir a utilização do chat flutuante da plataforma e definir **Ocultar a opção de videochat no chat global** (`chat.hide_chat_video`) como **Não**. Está oculta por predefinição. Consulte [Definições do Chat](../admin-guide/platform-settings/chat-settings.md).
* Utilize um navegador que suporte WebRTC, com permissão para aceder à câmara e ao microfone. O acesso aos meios do navegador exige normalmente HTTPS (ou um contexto de desenvolvimento local de confiança).
* Inicie sessão e defina o seu estado de chat como **online**. Escolha um contacto de utilizador comum; o botão de vídeo não aparece para um bot nem quando a funcionalidade está desativada.
* O outro utilizador tem de estar disponível para receber e aceitar a chamada.

## Iniciar uma Chamada

1. Abra o **painel de chat flutuante** na parte inferior do Chamilo (não a página de Chat do próprio curso).
2. Selecione a pessoa que pretende contactar.
3. No cabeçalho da conversa, clique no ícone de câmara **Iniciar chamada de vídeo**.
4. Conceda acesso à câmara e ao microfone quando o navegador o solicitar.
5. A chamada apresenta **A chamar...** enquanto o Chamilo aguarda o outro utilizador. Quando este aceita, o estado passa por **A ligar...** até **Ligado** depois de a ligação entre pares ser estabelecida com êxito.

Uma chamada não atendida atinge o tempo limite em vez de continuar indefinidamente. Se o outro utilizador recusar ou cancelar, o chat apresenta uma mensagem de estado explicativa.

## Receber e Gerir uma Chamada

Quando um contacto liga, o chat flutuante apresenta uma caixa de diálogo **Chamada de vídeo recebida**. Escolha **Aceitar** para participar ou **Rejeitar** para recusar. Aceitar pode também solicitar permissão para utilizar a câmara e o microfone.

Durante uma chamada, pode **silenciar ou reativar o microfone**, **ligar ou desligar a câmara** e **desligar**. Uma pequena pré-visualização mostra o seu vídeo local, enquanto a área principal mostra a outra pessoa. Fechar ou terminar a chamada liberta os fluxos locais de áudio/vídeo.

Trata-se de uma **chamada privada entre dois utilizadores**, não de uma reunião à escala do curso. Para realizar uma sessão de grupo agendada com gravação ou ferramentas de colaboração, utilize a integração de [Videoconferência](../teacher-guide/collaboration-and-communication/video-conferencing.md) da sua organização.

## Se a Chamada de Vídeo Não Estiver Disponível

* **Sem ícone Iniciar chamada de vídeo:** Verifique a definição `chat.hide_chat_video` da plataforma, se o chat flutuante está disponível, o seu estado online e o suporte WebRTC do navegador.
* **Erro de câmara ou microfone:** Permita as permissões de multimédia no navegador e verifique se o hardware está presente e não está a ser utilizado por outra aplicação.
* **Sem resposta:** Peça ao seu contacto para abrir o Chamilo e verificar a respetiva disponibilidade. O pedido efetuado tem um tempo limite.
* **A ligação falha após a aceitação:** Experimente outra rede e verifique as permissões do navegador ou as restrições da firewall. A implementação WebRTC atual utiliza um servidor STUN público e não configura um reencaminhador TURN, pelo que a conectividade pode falhar em redes restritivas. O chat de texto pode continuar a funcionar se a sinalização de vídeo falhar.

Não é necessário configurar o BigBlueButton ou o Zoom para esta funcionalidade de chamada direta; essas integrações disponibilizam um tipo de reunião distinto.