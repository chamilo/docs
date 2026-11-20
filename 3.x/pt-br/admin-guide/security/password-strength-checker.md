# Verificador de Força de Senha

O Verificador de Força de Senha compara os hashes de senha armazenados dos usuários ativos com uma lista curta de senhas comumente usadas (`123456`, `password`, `qwerty123` e semelhantes). Ele nunca exibe nem transmite as senhas em si — apenas se a senha atual de um usuário corresponde a um dos candidatos conhecidamente fracos.

## Acessando o Verificador de Força de Senha

No painel de administração, clique em **Segurança > Verificador de força de senha**.

## Executando uma verificação

![A página do verificador de força de senha, com um campo para IDs de usuário a verificar e um botão para executar a verificação](/.gitbook/assets/admin-security-password-strength.png)

* Deixe **IDs de usuário a verificar** vazio para verificar todos os usuários ativos, ou informe uma lista de IDs de usuário separados por vírgula para verificar um subconjunto
* Clique em **Executar verificação de força de senha**

A verificação é executada de forma assíncrona em segundo plano para não congelar a página, exibindo o progresso em tempo real (usuários verificados até o momento, do total, e quantas senhas fracas foram encontradas). Como cada senha candidata precisa ser conferida com o hash de cada usuário selecionado, verificar todos os usuários em uma plataforma grande pode demorar — a lista de candidatos é mantida intencionalmente curta para limitar esse custo.

## Agindo sobre os resultados

![Os resultados da verificação concluída, listando um usuário sinalizado com as colunas Nome, Nome de usuário e E-mail, e ações por linha para solicitar alteração de senha ou forçar redefinição de senha](/.gitbook/assets/admin-security-password-strength-results.png)

Quando a verificação termina, os usuários sinalizados são listados com duas ações disponíveis, por usuário ou como ação em massa para todos os usuários selecionados:

* **Solicitar alteração de senha** (ícone de envelope) — Envia ao usuário um e-mail pedindo que altere a senha
* **Forçar redefinição de senha** (ícone de redefinição) — Invalida imediatamente a senha atual do usuário e envia a ele uma nova por e-mail

Ambas as ações reverificam os usuários selecionados em relação à lista de senhas fracas antes de agir, de modo que uma solicitação desatualizada ou adulterada não possa ser usada para redefinir uma conta que já não tenha senha fraca.

## Uso recomendado

* Execute esta verificação periodicamente, especialmente após uma importação em massa de usuários (contas importadas às vezes vêm com senhas padrão simples)
* Combine-a com as configurações **Requisitos mínimos de sintaxe de senha** e **Intervalo de rotação de senha** em [Configurações de segurança](../platform-settings/security-settings.md) para impedir que senhas fracas sejam definidas desde o início, em vez de apenas detectá-las depois do fato