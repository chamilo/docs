# Autenticação de dois fatores

A autenticação de dois fatores (2FA) acrescenta uma segunda etapa ao acesso — um código de 6 dígitos de um aplicativo no seu telefone, além da senha — de modo que conhecer apenas a senha não seja suficiente para acessar a sua conta.

Este recurso só aparece se o administrador o tiver habilitado em toda a plataforma. Se você não o vir na página da sua conta, ele não foi ativado na sua plataforma.

## Ativando a 2FA

1. Abra o **menu do avatar** e clique em **Meu perfil**.
2. Clique em **Alterar senha**.
3. Digite a **senha atual**, marque a caixa **Ativar autenticação de dois fatores (2FA)** e clique em **Atualizar configurações**.
4. A página recarrega com um código QR e a mensagem "Scan the QR code to enable 2FA." Escaneie-o com um aplicativo autenticador no seu telefone (qualquer aplicativo compatível com TOTP funciona, como Google Authenticator, Microsoft Authenticator ou Authy).

![O formulário Alterar senha após o envio, mostrando o código QR para escanear e o campo de código 2FA](/.gitbook/assets/student-2fa-qr-code.png)

5. Digite novamente a senha atual, juntamente com o código de 6 dígitos que o aplicativo agora exibe, no campo **Código 2FA**, e clique em **Atualizar configurações** mais uma vez. Você verá uma confirmação de que a 2FA foi ativada.

Marcar a caixa sozinha não revela o código QR — você só o vê após esse primeiro envio, e os campos de senha são limpos cada vez que a página recarrega, portanto você precisará redigitar a senha atual também neste segundo envio.

## Entrando com a 2FA ativada

Após inserir o nome de usuário e a senha como de costume, o formulário de login exibe um campo extra **Código 2FA** na mesma tela — digite o código atual de 6 dígitos do seu aplicativo autenticador e envie (o botão passa a ler **Enviar código** em vez de **Entrar** neste momento).

## Se você perder o acesso ao aplicativo autenticador

O Chamilo não gera códigos de backup ou de recuperação para a 2FA. Se você perder o dispositivo com o aplicativo autenticador, não conseguirá produzir um código válido por conta própria — entre em contato com o administrador da plataforma, que pode desativar a 2FA na sua conta para que você possa entrar novamente e, se quiser, configurá-la em um novo dispositivo.

## Desativando a 2FA

Volte a **Alterar senha**, desmarque **Ativar autenticação de dois fatores (2FA)**, digite a senha atual e envie.

## Dicas

* **Configure antes de precisar** — ativar a 2FA leva um minuto e protege de forma significativa a sua conta.
* **Mantenha o aplicativo autenticador acessível** — perdê-lo significa depender do administrador para voltar a entrar, pois não há códigos de backup.
* **Não compartilhe seus códigos 2FA** — qualquer pessoa com a sua senha e um código válido pode entrar como você.