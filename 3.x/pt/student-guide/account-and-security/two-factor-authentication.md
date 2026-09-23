# Autenticação de dois fatores

A autenticação de dois fatores (2FA) acrescenta um segundo passo ao início de sessão — um código de 6 dígitos de uma aplicação no seu telemóvel, além da sua palavra-passe — de modo que conhecer apenas a palavra-passe não seja suficiente para aceder à sua conta.

Esta funcionalidade só aparece se o administrador a tiver ativado em toda a plataforma. Se não a vir na página da sua conta, ainda não foi ativada na sua plataforma.

## Ativar a 2FA

1. Abra o **menu do avatar** e clique em **O meu perfil**.
2. Clique em **Alterar palavra-passe**.
3. Introduza a **palavra-passe atual**, marque a caixa **Ativar autenticação de dois fatores (2FA)** e clique em **Atualizar definições**.
4. A página recarrega com um código QR e a mensagem "Scan the QR code to enable 2FA." Digitalize-o com uma aplicação autenticadora no seu telemóvel (qualquer aplicação compatível com TOTP funciona, como Google Authenticator, Microsoft Authenticator ou Authy).

![O formulário Alterar palavra-passe após o envio, mostrando o código QR a digitalizar e o campo do código 2FA](../../.gitbook/assets/student-2fa-qr-code.png)

5. Introduza novamente a palavra-passe atual, juntamente com o código de 6 dígitos que a aplicação agora mostra, no campo **Código 2FA**, e clique outra vez em **Atualizar definições**. Verá uma confirmação de que a 2FA foi ativada.

Marcar a caixa por si só não revela o código QR — só o vê após esse primeiro envio, e os campos da palavra-passe são limpos cada vez que a página recarrega, pelo que terá de voltar a introduzir a palavra-passe atual também neste segundo envio.

## Iniciar sessão com a 2FA ativada

Depois de introduzir o nome de utilizador e a palavra-passe como habitualmente, o formulário de início de sessão mostra um campo extra **Código 2FA** no mesmo ecrã — introduza o código atual de 6 dígitos da sua aplicação autenticadora e envie (o botão passa a ler **Enviar código** em vez de **Iniciar sessão** neste ponto).

## Se perder o acesso à aplicação autenticadora

O Chamilo não gera códigos de reserva ou de recuperação para a 2FA. Se perder o dispositivo com a aplicação autenticadora, não conseguirá produzir um código válido por si — contacte o administrador da plataforma, que pode desativar a 2FA na sua conta para que possa voltar a iniciar sessão e, se quiser, configurá-la num dispositivo novo.

## Desativar a 2FA

Volte a **Alterar palavra-passe**, desmarque **Ativar autenticação de dois fatores (2FA)**, introduza a palavra-passe atual e envie.

## Dicas

* **Configure-a antes de precisar dela** — ativar a 2FA demora um minuto e protege de forma significativa a sua conta.
* **Mantenha a aplicação autenticadora acessível** — perdê-la significa depender do administrador para voltar a entrar, uma vez que não existem códigos de reserva.
* **Não partilhe os seus códigos 2FA** — qualquer pessoa com a sua palavra-passe e um código válido pode iniciar sessão como se fosse você.